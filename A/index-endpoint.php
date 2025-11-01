<?php
// index-endpoint.php
// Versi Final V4 - Skalabilitas Sitemap dan Robots.txt Statis

error_reporting(0);

// --- KONFIGURASI & DEFINISI GLOBAL ---
define('LOG_FILE', __DIR__ . '/visitor_logs.json'); 
define('DATA_DIR', __DIR__ . '/data');
define('CACHE_ENABLED', true);
define('CACHE_DIR', __DIR__ . '/cache');
define('SITEMAP_CACHE_DIR', __DIR__ . '/sitemaps_static'); // NEW: Direktori untuk file XML/TXT statis
define('CACHE_EXPIRY', 86400); // 24 jam
define('PLACEHOLDER_DOMAIN', 'https://ENDPOINT.PLACEHOLDER'); // Placeholder domain unik untuk diganti

// --- FUNGSI SPINTAX DAN UTILITY ---
/**
 * Memproses format spintax untuk menghasilkan teks acak.
 */
function spin(string $text): string
{
    $pattern = '/\{([^{}]*?)\}/';
    while (preg_match($pattern, $text, $matches)) {
        $choices = explode('|', $matches[1]);
        $text = substr_replace(
            $text,
            $choices[array_rand($choices)],
            strpos($text, $matches[0]),
            strlen($matches[0])
        );
    }
    return $text;
}

/**
 * Fungsi untuk mendapatkan IP address klien yang paling akurat.
 * @return string
 */
function get_client_ip(): string
{
    if (isset($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) return trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]);
    if (isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
    return $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN_IP';
}

// Fungsi slugify global
function slugify(string $text): string
{
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    return empty($text) ? 'n-a' : $text;
}

// Fungsi format tanggal Indonesia
function date_indo(string $date_format, string $timestamp = null): string
{
    $timestamp = $timestamp ?? time();
    $bulan_indo = [
        'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April',
        'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus',
        'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'
    ];
    return strtr(date($date_format, $timestamp), $bulan_indo);
}

header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");

// --- DATABASE GLOBAL (DIMUAT DARI FILE JSON) ---
$games_list = json_decode(file_get_contents(DATA_DIR . '/games.json'), true);
$stores_list = json_decode(file_get_contents(DATA_DIR . '/stores.json'), true);
$games_images = json_decode(file_get_contents(DATA_DIR . '/images.json'), true);


// --- FUNGSI-FUNGSI UTILITY SITEMAP ---
function get_dynamic_sitemaps(): array
{
    global $games_list;
    $sitemap_files = [];

    // HANYA MEMBUAT SITEMAP BERDASARKAN NAMA GAME
    foreach ($games_list as $game_name => $item_name) {
        $slug_game = slugify($game_name);
        $sitemap_files[] = $slug_game . '.xml';
    }
    
    return $sitemap_files;
}

function handle_page_sitemap_generation(string $segment_type, string $target_segment, string $segment_dir, array $games_list): array
{
    global $stores_list;
    $urls = [];

    if ($segment_type !== 'game') {
        return [];
    }

    $game_slug = slugify($target_segment);
    $item_name = $games_list[$target_segment] ?? 'item';
    $item_slug = slugify($item_name);

    // --- Daftar Kata Kunci ---
    $aksi_list = ['top up', 'beli', 'isi ulang'];
    $keunggulan_list = ['terpercaya', 'termurah', 'online', 'legal'];
    $penawaran_list = ['voucher', 'promo', 'diskon'];
    $pencarian_tempat_list = ['situs', 'website', 'cara'];

    // === POLA AKSI ===
    // Aksi + Game
    foreach ($aksi_list as $aksi) { $urls[] = "{$game_slug}/" . slugify($aksi) . "-{$game_slug}"; }
    // aksi + game + toko
    foreach ($aksi_list as $aksi) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($aksi) . "-{$game_slug}-di-" . slugify($store); }}
    // aksi + game + keunggulan
    foreach ($aksi_list as $aksi) { foreach ($keunggulan_list as $keunggulan) { $urls[] = "{$game_slug}/" . slugify($aksi) . "-{$game_slug}-" . slugify($keunggulan); }}
    // aksi + game + keunggulan + toko
    foreach ($aksi_list as $aksi) { foreach ($keunggulan_list as $keunggulan) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($aksi) . "-{$game_slug}-" . slugify($keunggulan) . "-di-" . slugify($store); }}}
    // aksi + item + game
    foreach ($aksi_list as $aksi) { $urls[] = "{$game_slug}/" . slugify($aksi) . "-{$item_slug}-{$game_slug}"; }
    // aksi + item + game + toko
    foreach ($aksi_list as $aksi) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($aksi) . "-{$item_slug}-{$game_slug}-di-" . slugify($store); }}
    // aksi + item + game + keunggulan
    foreach ($aksi_list as $aksi) { foreach ($keunggulan_list as $keunggulan) { $urls[] = "{$game_slug}/" . slugify($aksi) . "-{$item_slug}-{$game_slug}-" . slugify($keunggulan); }}
    // aksi + item + game + keunggulan + toko
    foreach ($aksi_list as $aksi) { foreach ($keunggulan_list as $keunggulan) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($aksi) . "-{$item_slug}-{$game_slug}-" . slugify($keunggulan) . "-di-" . slugify($store); }}}
    // aksi + penawaran + item + game
    foreach ($aksi_list as $aksi) { foreach ($penawaran_list as $penawaran) { $urls[] = "{$game_slug}/" . slugify($aksi) . "-" . slugify($penawaran) . "-{$item_slug}-{$game_slug}"; }}
    // aksi + penawaran + item + game + toko
    foreach ($aksi_list as $aksi) { foreach ($penawaran_list as $penawaran) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($aksi) . "-" . slugify($penawaran) . "-{$item_slug}-{$game_slug}-di-" . slugify($store); }}}
    // aksi + penawaran + item + game + keunggulan + toko
    foreach ($aksi_list as $aksi) { foreach ($penawaran_list as $penawaran) { foreach ($keunggulan_list as $keunggulan) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($aksi) . "-" . slugify($penawaran) . "-{$item_slug}-{$game_slug}-" . slugify($keunggulan) . "-di-" . slugify($store); }}}}

    // === POLA ITEM ===
    // item + game
    $urls[] = "{$game_slug}/{$item_slug}-{$game_slug}";
    // item + game + toko
    foreach ($stores_list as $store) { $urls[] = "{$game_slug}/{$item_slug}-{$game_slug}-di-" . slugify($store); }
    // item + game + keunggulan
    foreach ($keunggulan_list as $keunggulan) { $urls[] = "{$game_slug}/{$item_slug}-{$game_slug}-" . slugify($keunggulan); }
    // item + game + keunggulan + toko
    foreach ($keunggulan_list as $keunggulan) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/{$item_slug}-{$game_slug}-" . slugify($keunggulan) . "-di-" . slugify($store); }}

    // === POLA GAME ===
    // game + toko
    foreach ($stores_list as $store) { $urls[] = "{$game_slug}/{$game_slug}-di-" . slugify($store); }

    // === POLA PENAWARAN ===
    // penawaran + game
    foreach ($penawaran_list as $penawaran) { $urls[] = "{$game_slug}/" . slugify($penawaran) . "-{$game_slug}"; }
    // penawaran + game + toko
    foreach ($penawaran_list as $penawaran) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($penawaran) . "-{$game_slug}-di-" . slugify($store); }}
    // penawaran + item + game
    foreach ($penawaran_list as $penawaran) { $urls[] = "{$game_slug}/" . slugify($penawaran) . "-{$item_slug}-{$game_slug}"; }
    // penawaran + item + game + toko
    foreach ($penawaran_list as $penawaran) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($penawaran) . "-{$item_slug}-{$game_slug}-di-" . slugify($store); }}
    // penawaran + item + game + keunggulan
    foreach ($penawaran_list as $penawaran) { foreach ($keunggulan_list as $keunggulan) { $urls[] = "{$game_slug}/" . slugify($penawaran) . "-{$item_slug}-{$game_slug}-" . slugify($keunggulan); }}
    // penawaran + item + game + keunggulan + toko
    foreach ($penawaran_list as $penawaran) { foreach ($keunggulan_list as $keunggulan) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($penawaran) . "-{$item_slug}-{$game_slug}-" . slugify($keunggulan) . "-di-" . slugify($store); }}}

    // === POLA PENCARIAN TEMPAT ===
    foreach ($pencarian_tempat_list as $tempat) {
        foreach ($aksi_list as $aksi) {
            // Pencarian Tempat + Aksi + Game
            $urls[] = "{$game_slug}/" . slugify($tempat) . "-" . slugify($aksi) . "-{$game_slug}";
            // Pencarian Tempat + aksi + game + toko
            foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($tempat) . "-" . slugify($aksi) . "-{$game_slug}-di-" . slugify($store); }
            // Pencarian Tempat + aksi + game + keunggulan
            foreach ($keunggulan_list as $keunggulan) { $urls[] = "{$game_slug}/" . slugify($tempat) . "-" . slugify($aksi) . "-{$game_slug}-" . slugify($keunggulan); }
            // Pencarian Tempat + aksi + game + keunggulan + toko
            foreach ($keunggulan_list as $keunggulan) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($tempat) . "-" . slugify($aksi) . "-{$game_slug}-" . slugify($keunggulan) . "-di-" . slugify($store); }}
            // Pencarian Tempat + aksi + item + game
            $urls[] = "{$game_slug}/" . slugify($tempat) . "-" . slugify($aksi) . "-{$item_slug}-{$game_slug}";
            // Pencarian Tempat + aksi + item + game + toko
            foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($tempat) . "-" . slugify($aksi) . "-{$item_slug}-{$game_slug}-di-" . slugify($store); }
            // Pencarian Tempat + aksi + item + game + keunggulan
            foreach ($keunggulan_list as $keunggulan) { $urls[] = "{$game_slug}/" . slugify($tempat) . "-" . slugify($aksi) . "-{$item_slug}-{$game_slug}-" . slugify($keunggulan); }
            // Pencarian Tempat + aksi + item + game + keunggulan + toko
            foreach ($keunggulan_list as $keunggulan) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($tempat) . "-" . slugify($aksi) . "-{$item_slug}-{$game_slug}-" . slugify($keunggulan) . "-di-" . slugify($store); }}
            // Pencarian Tempat + aksi + penawaran + item + game
            foreach ($penawaran_list as $penawaran) { $urls[] = "{$game_slug}/" . slugify($tempat) . "-" . slugify($aksi) . "-" . slugify($penawaran) . "-{$item_slug}-{$game_slug}"; }
            // Pencarian Tempat + aksi + penawaran + item + game + toko
            foreach ($penawaran_list as $penawaran) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($tempat) . "-" . slugify($aksi) . "-" . slugify($penawaran) . "-{$item_slug}-{$game_slug}-di-" . slugify($store); }}
            // Pencarian Tempat + aksi + penawaran + item + game + keunggulan + toko
            foreach ($penawaran_list as $penawaran) { foreach ($keunggulan_list as $keunggulan) { foreach ($stores_list as $store) { $urls[] = "{$game_slug}/" . slugify($tempat) . "-" . slugify($aksi) . "-" . slugify($penawaran) . "-{$item_slug}-{$game_slug}-" . slugify($keunggulan) . "-di-" . slugify($store); }}}
        }
    }

    // Menghapus duplikat untuk memastikan setiap URL unik
    return array_unique($urls);
}

function get_all_seo_slugs(): array
{
    global $games_list, $stores_list;
    $all_slugs = [];

    foreach ($stores_list as $store_name) {
        $store_slug = slugify($store_name);
        $all_slugs = array_merge($all_slugs, handle_page_sitemap_generation('store', $store_name, $store_slug, $games_list));
    }

    foreach ($games_list as $game_name => $item_name) {
        $game_slug = slugify($game_name);
        $all_slugs = array_merge($all_slugs, handle_page_sitemap_generation('game', $game_name, $game_slug, $games_list));
    }

    return array_unique($all_slugs);
}

function generate_internal_links(string $current_path, string $segment_dir, string $segment_type, string $target_segment, array $games_list): string
{
    $all_possible_slugs = handle_page_sitemap_generation($segment_type, $target_segment, $segment_dir, $games_list);

    $filtered_slugs = array_filter($all_possible_slugs, function($slug) use ($current_path) {
        return $slug !== $current_path;
    });
    
    $link_count = rand(4, 6); // Variasi jumlah link internal
    if (count($filtered_slugs) < $link_count) {
        return '';
    }

    $random_keys = array_rand($filtered_slugs, $link_count);
    $selected_links = array_map(function($key) use ($filtered_slugs) {
        return $filtered_slugs[$key];
    }, $random_keys);

    $title = spin('{Top Up|Beli Voucher|Lihat Harga} {Populer|Game} Lainnya');
    $html = "<nav class='internal-links' aria-label='Navigasi Internal'><h3 class='sub-title'>{$title}</h3><ul>";

    foreach ($selected_links as $link_path) {
        $anchor_text_base = preg_replace('/-a\d+$/', '', basename($link_path));
        // PERBAIKAN: Menggunakan $anchor_text_base
        $anchor_text = ucwords(str_replace('-', ' ', $anchor_text_base)); 
        $html .= "<li><a href='/{$link_path}'>{$anchor_text}</a></li>";
    }

    $html .= "</ul></nav>";
    return $html;
}


// --- LOGIKA GENERASI SITEMAP STATIS (BARU) ---

/**
 * NEW FUNCTION: Menghasilkan konten robots.txt menggunakan PLACEHOLDER_DOMAIN.
 */
function generate_static_robots_content(string $domain): string
{
    $domain_root = rtrim($domain, '/');
    $content = "User-agent: *\nAllow: /\n\n";
    $content .= "Sitemap: {$domain_root}/sitemap.xml\n";
    $content .= "Sitemap: {$domain_root}/allsitemap.xml\n";
    $dynamic_sitemaps = get_dynamic_sitemaps();
    foreach($dynamic_sitemaps as $sitemap_file) {
        $content .= "Sitemap: {$domain_root}/{$sitemap_file}\n";
    }
    return $content;
}

/**
 * Menghasilkan konten sitemap untuk segment tertentu, menggunakan PLACEHOLDER_DOMAIN.
 */
function generate_static_sitemap_content(string $domain, string $sitemap_filename, array $games_list): string
{
    global $stores_list;
    $domain_root = rtrim($domain, '/');
    $game_slug_search = basename($sitemap_filename, '.xml');
    $target_segment = null;
    $segment_type = null;
    $segment_dir = '';

    // Logika untuk sitemap index atau sitemap umum
    if ($sitemap_filename === 'sitemap.xml' || $sitemap_filename === 'allsitemap.xml') {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></sitemapindex>');
        $dynamic_sitemaps = get_dynamic_sitemaps();
        foreach ($dynamic_sitemaps as $sitemap_file) {
            $sitemap_node = $xml->addChild('sitemap');
            $sitemap_node->addChild('loc', "{$domain_root}/{$sitemap_file}");
            $sitemap_node->addChild('lastmod', date('Y-m-d', time() - rand(0, 365 * 86400)));
        }
        return $xml->asXML();
    }
    
    // Logika penentuan segment_type dan target_segment untuk page sitemap
    foreach ($stores_list as $store_name) {
        if (slugify($store_name) === $game_slug_search) {
            $segment_type = 'store';
            $target_segment = $store_name;
            $segment_dir = slugify($store_name);
            break;
        }
    }
    if ($segment_type === null) {
        foreach ($games_list as $game_name => $item_name) {
            if (slugify($game_name) === $game_slug_search) {
                $segment_type = 'game';
                $target_segment = $game_name;
                $segment_dir = slugify($game_name);
                break;
            }
        }
    }
    
    if ($segment_type === null) {
        return '';
    }

    // Logika untuk sitemap halaman individual (page sitemap)
    $slug_list = handle_page_sitemap_generation($segment_type, $target_segment, $segment_dir, $games_list);
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
    
    foreach ($slug_list as $path) {
        $url_node = $xml->addChild('url');
        $url_node->addChild('loc', "{$domain_root}/" . $path);
        $url_node->addChild('lastmod', date('Y-m-d', time() - rand(0, 365 * 86400)));
        $url_node->addChild('changefreq', 'weekly');
        $url_node->addChild('priority', '0.8');
    }
    
    return $xml->asXML();
}

/**
 * NEW HANDLER: Menghasilkan semua file sitemap dan robots.txt statis ke disk.
 */
function handle_generate_static_sitemaps(): string
{
    global $games_list;
    $sitemaps_to_generate = array_merge(['sitemap.xml', 'allsitemap.xml', 'robots.txt'], get_dynamic_sitemaps());
    $count = 0;
    
    if (!is_dir(SITEMAP_CACHE_DIR)) {
        if (!mkdir(SITEMAP_CACHE_DIR, 0755, true)) {
             return "Gagal membuat direktori sitemap_static. Pastikan izin folder benar.";
        }
    }

    $base_domain = PLACEHOLDER_DOMAIN; // Gunakan placeholder domain saat generasi

    foreach ($sitemaps_to_generate as $filename) {
        $content = '';
        if ($filename === 'robots.txt') {
            $content = generate_static_robots_content($base_domain);
        } else {
            $content = generate_static_sitemap_content($base_domain, $filename, $games_list);
            // Tambahkan deklarasi XML jika konten sitemap
            if (!empty($content)) {
                $content = preg_replace('/<\?xml[^>]*\?>/', '', $content, 1);
                $content = '<?xml version="1.0" encoding="UTF-8"?>' . $content;
            }
        }

        if (!empty($content)) {
            $save_path = SITEMAP_CACHE_DIR . '/' . $filename;
            if (file_put_contents($save_path, $content)) {
                $count++;
            }
        }
    }
    return "Berhasil menyimpan {$count} file sitemap dan robots.txt statis di " . SITEMAP_CACHE_DIR;
}

/**
 * NEW HANDLER: Melayani file statis dengan mengganti domain placeholder.
 */
function handle_static_serve(string $client_domain, string $filename): void
{
    $file_path = SITEMAP_CACHE_DIR . '/' . $filename;
    
    if (!file_exists($file_path)) {
        header("HTTP/1.0 404 Not Found");
        die("Error: Static file '{$filename}' not found. Mohon jalankan generate sitemap/robots dari Admin Panel.");
    }
    
    $content = file_get_contents($file_path);
    
    // **Penggantian Domain On-The-Fly (Beban CPU Rendah)**
    $modified_content = str_replace(PLACEHOLDER_DOMAIN, rtrim($client_domain, '/'), $content);
    
    echo $modified_content;
}

// --- FUNGSI UTAMA & ROUTING (DIPERBARUI) ---
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Logika untuk menangani permintaan .xml secara langsung
if (substr($request_path, -4) === '.xml') {
    if (basename($request_path) === 'sitemap.xml' || basename($request_path) === 'allsitemap.xml') {
        $action = 'sitemap';
    } else {
        $action = 'map';
    }
} elseif (basename($request_path) === 'robots.txt') {
     $action = 'robots'; // Tangkap permintaan robots.txt di sini
}


if (!$action) {
    $action = basename($request_path);
}
$domain = filter_input(INPUT_POST, 'domain', FILTER_SANITIZE_URL);
if (!$domain) {
    $scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
    $domain = $scheme . '://' . $_SERVER['HTTP_HOST'];
}
$uri = ltrim($request_path, '/');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uri_post = filter_input(INPUT_POST, 'uri', FILTER_SANITIZE_URL);
    if ($uri_post) {
        $uri = ltrim(parse_url($uri_post, PHP_URL_PATH) ?: $uri_post, '/');
    }
}
$ip = filter_input(INPUT_POST, 'ip', FILTER_SANITIZE_STRING) ?? get_client_ip();

switch ($action) {
    case 'robots': // MODIFIED: Menggunakan handler statis baru
        header("Content-Type: text/plain; charset=utf-8");
        handle_static_serve($domain, 'robots.txt');
        break;
        
    case 'generate_sitemaps': // NEW ACTION: Dipanggil dari Admin Panel
        header("Content-Type: text/plain; charset=utf-8");
        echo handle_generate_static_sitemaps();
        break;

    case 'sitemap': // MODIFIED: Menggunakan handler statis baru
    case 'allsitemap':
        header("Content-Type: text/xml; charset=utf-8");
        handle_static_serve($domain, basename($uri));
        break;
        
    case 'map': // MODIFIED: Menggunakan handler statis baru
        header("Content-Type: text/xml; charset=utf-8");
        handle_static_serve($domain, basename($uri));
        break;
        
    case 'list':
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode(get_all_seo_slugs());
        break;
    case 'jump':
        handle_jump($domain, $ip);
        break;
    case 'indata':
        if (CACHE_ENABLED) {
            $cache_key = $domain . $uri;
            $cache_file = CACHE_DIR . '/' . md5($cache_key) . '.html';

            if (file_exists($cache_file) && (time() - filemtime($cache_file)) < CACHE_EXPIRY) {
                readfile($cache_file);
                exit;
            }
            ob_start();
        }

        handle_crawler_content($domain, $uri, $GLOBALS['games_list'], $GLOBALS['stores_list']);

        if (CACHE_ENABLED) {
            $content = ob_get_flush();
            if (!is_dir(CACHE_DIR)) {
                mkdir(CACHE_DIR, 0755, true);
            }
            file_put_contents($cache_file, $content);
        }
        break;
    case 'stats':
        header("Content-Type: application/json; charset=utf-8");
        handle_get_stats();
        break;
    case 'meta':
        $preview_uri = filter_input(INPUT_GET, 'uri', FILTER_SANITIZE_STRING);
        $preview_domain = filter_input(INPUT_GET, 'domain', FILTER_SANITIZE_URL);

        if ($preview_uri && $preview_domain) {
            header("Content-Type: application/json; charset=utf-8");
            handle_get_meta_data($preview_domain, ltrim($preview_uri, '/'), $GLOBALS['games_list'], $GLOBALS['stores_list']);
        } else {
            header("HTTP/1.0 400 Bad Request");
            die(json_encode(['error' => 'Parameter "uri" dan "domain" dibutuhkan untuk preview meta.']));
        }
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo "Endpoint not found.";
        break;
}

// --- FUNGSI-FUNGSI HANDLER LAINNYA ---
// ... (handle_get_stats, handle_get_meta_data, handle_jump, generate_rich_content, 
// generate_seo_meta, generate_faq_html_and_schema, get_dynamic_styles, handle_crawler_content)

function handle_get_stats()
{
    $stats = ['total_redirects' => 0, 'referrer_breakdown' => []];
    if (file_exists(LOG_FILE)) {
        $log_content = file_get_contents(LOG_FILE);
        $log_lines = explode(",\n", trim($log_content, ",\n"));
        $log_data = [];
        foreach($log_lines as $line) {
            if (empty($line)) continue;
            $data = json_decode(trim($line), true);
            if ($data) $log_data[] = $data;
        }
        $stats['total_redirects'] = count($log_data);
        $referrer_breakdown = [];
        foreach ($log_data as $entry) {
            $referrer = $entry['referrer'] ?? 'Direct / Unknown';
            $parsed_url = parse_url($referrer);
            $domain_host = str_replace('www.', '', ($parsed_url['host'] ?? 'Direct / Unknown'));
            @$referrer_breakdown[$domain_host]++;
        }
        arsort($referrer_breakdown);
        $stats['referrer_breakdown'] = $referrer_breakdown;
    }
    header('Content-Type: application/json');
    echo json_encode($stats);
}


function handle_get_meta_data(string $domain, string $uri, array $games_list, array $stores_list): void
{
    $result = generate_seo_meta($domain, $uri, $games_list, $stores_list);
    $domain_root = rtrim($domain, '/');
    $url = "{$domain_root}/" . $uri;
    echo json_encode([
        'title' => $result['title'],
        'description' => $result['description'],
        'url' => $url,
        'rating_value' => '5.0',
        'rating_count' => rand(1500, 5000),
    ]);
}

function handle_jump(string $domain, string $ip): void
{
    $referrer = $_SERVER['HTTP_REFERER'] ?? 'Direct/Unknown'; // Referrer tetap dicatat jika ada
    $client_domain = filter_input(INPUT_POST, 'domain', FILTER_SANITIZE_URL) ?? 'UNKNOWN_DOMAIN';

    // Log entri tanpa memeriksa referrer
    $log_entry = [
        'timestamp' => date('Y-m-d H:i:s'),
        'ip' => $ip,
        'referrer' => $referrer,
        'action' => 'redirect',
        'domain' => $client_domain, 
        'uri' => filter_input(INPUT_POST, 'uri') ?? '/'
    ];
    
    $log_data = json_encode($log_entry) . ",\n";
    @file_put_contents(LOG_FILE, $log_data, FILE_APPEND | LOCK_EX);
    
    // Langsung redirect ke tujuan
    $destination_url = 'https://topupgameku.id/'; 
    
    header("Location: " . $destination_url, true, 301);
    exit();
}

function generate_rich_content(string $domain, string $type, string $game, string $item, string $store = null): array
{
    global $stores_list;
    $store_1 = $stores_list[array_rand($stores_list)];
    $store_2 = $stores_list[array_rand($stores_list)];
    while ($store_1 === $store_2) { // Pastikan tidak sama
        $store_2 = $stores_list[array_rand($stores_list)];
    }

    $content_pool = [
        'intro' => [],
        'benefits_title' => [],
        'benefits_list' => [],
        'closing' => []
    ];

    if ($type === 'store') {
        $content_pool['intro'][] = "{Selamat datang di|Ini adalah} halaman {resmi|khusus} untuk top up {$item} {$game} melalui <strong>{$store}</strong>. {Kami menyediakan|Platform kami menawarkan} {layanan|proses} yang {super instan|sangat cepat}, {memastikan Anda bisa|sehingga Anda dapat} langsung kembali ke permainan. {Semua transaksi dijamin|Setiap transaksi dipastikan} {aman|legal}, dan didukung penuh oleh {$store}.";
        $content_pool['intro'][] = "{Cari|Temukan} harga {terbaik|paling hemat} untuk {$item} {$game}? Di sini tempatnya. {Kami membandingkan|Sistem kami memantau} harga dari {$store_1} dan {$store_2} untuk {memberikan|menjamin} Anda {penawaran paling hemat|deal terbaik}. <strong>{$store}</strong> {adalah|merupakan} {pilihan utama|opsi terbaik} bagi gamer cerdas di Indonesia.";
        
        $content_pool['benefits_title'][] = "Keunggulan Top Up via {$store}";
        $content_pool['benefits_title'][] = "Mengapa Memilih {$store} Untuk {$game}?";
        
        $content_pool['benefits_list'][] = "<li><span class='icon'>&#9989;</span> <strong>Resmi & Terpercaya:</strong> {Transaksi|Pembelian} via {$store} terjamin 100% {legal|sah} dan {aman|terpercaya}.</li>";
        $content_pool['benefits_list'][] = "<li><span class='icon'>&#9889;</span> <strong>Proses {Kilat|Instan}:</strong> {Pengiriman|{$item} akan masuk} {instan tanpa jeda|dalam hitungan detik}.</li>";
        $content_pool['benefits_list'][] = "<li><span class='icon'>&#128179;</span> <strong>Pembayaran Lengkap:</strong> {Tersedia berbagai metode pembayaran|Bayar via GoPay, Dana, OVO, dll}.</li>";
        $content_pool['benefits_list'][] = "<li><span class='icon'>&#128176;</span> <strong>Harga {Terbaik|Kompetitif}:</strong> {Dijamin|Kami pastikan} harganya {paling kompetitif|lebih murah}.</li>";

        $content_pool['closing'][] = "Jadi, tunggu apa lagi? Segera top up {$item} {$game} Anda melalui {$store} dan nikmati semua kemudahannya. Proses cepat, aman, dan harga bersahabat!";
    } else {
        $content_pool['intro'][] = "{Selamat datang di|Anda berada di} pusat top up {resmi|terpercaya} untuk <strong>{$item} {$game}</strong>. Platform kami {menjamin|menawarkan} layanan {tercepat|terbaik}, {termurah|paling hemat}, dan 100% aman. Kami {selalu memantau|secara rutin mengecek} harga dari {$store_1} dan {$store_2} agar Anda {selalu|pasti} mendapatkan deal terbaik.";
        $content_pool['intro'][] = "Butuh {$item} {$game} {secara mendadak|cepat}? {Kami solusinya!|Di sini tempatnya!} Dengan sistem pembayaran {yang lengkap|beragam} dan dukungan pelanggan 24/7, Anda {tidak perlu khawatir|tak usah cemas} lagi tentang transaksi top up yang {lambat|ribet} atau mahal.";

        $content_pool['benefits_title'][] = "Mengapa Top Up {$item} {$game} Disini?";
        $content_pool['benefits_title'][] = "Alasan Memilih Platform Kami";

        $content_pool['benefits_list'][] = "<li><span class='icon'>&#9989;</span> <strong>Harga Kompetitif:</strong> {Lebih murah dari|Mengalahkan harga} {$store_1} & {$store_2}.</li>";
        $content_pool['benefits_list'][] = "<li><span class='icon'>&#9889;</span> <strong>Proses Instan:</strong> {Hanya butuh 1 detik|Kurang dari 1 menit} setelah pembayaran.</li>";
        $content_pool['benefits_list'][] = "<li><span class='icon'>&#128179;</span> <strong>Pembayaran Lengkap:</strong> Semua metode pembayaran {populer|utama} diterima.</li>";
        $content_pool['benefits_list'][] = "<li><span class='icon'>&#128172;</span> <strong>Layanan 24/7:</strong> Tim support kami {siap membantu|selalu online} kapan saja.</li>";
        
        $content_pool['closing'][] = "Jangan biarkan kehabisan {$item} mengganggu permainan Anda. Top up {$item} {$game} sekarang di sini dan rasakan pengalaman transaksi yang mudah, cepat, dan terpercaya.";
    }

    $result = [
        'intro' => spin($content_pool['intro'][array_rand($content_pool['intro'])]),
        'benefits_title' => spin($content_pool['benefits_title'][array_rand($content_pool['benefits_title'])]),
        'benefits_list' => spin(implode('', $content_pool['benefits_list'])),
        'closing' => spin($content_pool['closing'][array_rand($content_pool['closing'])])
    ];

    return $result;
}

function generate_seo_meta(string $domain, string $uri, array $games_list, array $stores_list): array
{
    $uri_parts = explode('/', trim($uri, '/'));
    $game_slug = $uri_parts[0] ?? '';
    $main_slug = $uri_parts[1] ?? '';

    $current_game_name = null;
    $current_item_name = null;
    $current_store_name = null;

    // 1. Temukan game dan item
    foreach ($games_list as $game => $item) {
        if (slugify($game) === $game_slug) {
            $current_game_name = $game;
            $current_item_name = $item;
            break;
        }
    }

    if (!$current_game_name) {
        return ['title' => 'Halaman Tidak Ditemukan', 'description' => 'Konten yang Anda cari tidak tersedia.', 'game_name' => null, 'item_name' => null, 'store_name' => null, 'is_store_specific' => false, 'segment_dir' => '', 'segment_type' => '', 'target_segment' => ''];
    }

    // 2. Temukan toko
    foreach ($stores_list as $store) {
        if (strpos($main_slug, slugify($store)) !== false) {
            $current_store_name = $store;
            break;
        }
    }
    
    $domain_key = parse_url($domain, PHP_URL_HOST);
    srand(crc32($domain_key . $uri));

    // 3. Logika pembuatan judul (tetap sama)
    $title_from_slug = ucwords(str_replace('-', ' ', preg_replace('/-di-.*$/', '', $main_slug)));
    $title = $current_store_name ? "{$title_from_slug} | {$current_store_name}" : "{$title_from_slug} | Harga Termurah " . date('Y');

    // 4. --- LOGIKA BARU UNTUK DESKRIPSI YANG LEBIH BERVARIASI ---
    $description = '';
    
    // Variabel dinamis untuk deskripsi
    $G = $current_game_name;
    $I = $current_item_name;
    $S = $current_store_name;

    // Daftar template deskripsi
    $templates = [];

    if ($S) { // Jika ini adalah halaman toko
        // Template Umum
        $templates[] = "Beli {$I} {$G} di {$S} sekarang! Proses {cepat|instan}, {terjamin aman|100% legal}, dan {banyak promo|harga terbaik}. {Top up di sini|Lihat penawaran}.";
        $templates[] = "Informasi lengkap mengenai top up {$I} {$G} di {$S}. Dapatkan penawaran terbaik secara {resmi dan terpercaya|aman dan cepat}.";
        $templates[] = "Mencari harga {$I} {$G} {termurah|terbaik} di {$S}? Temukan {promo|diskon} spesial di sini. Proses {instan|kilat}, {online 24 jam|layanan nonstop}.";
        
        // Template berbasis kata kunci URL
        if (strpos($main_slug, 'termurah') !== false) {
            $templates[] = "Harga top up {$I} {$G} dijamin **termurah** hanya di {$S}. Dapatkan {diskon|cashback} spesial hari ini. {Beli sekarang|Jangan sampai kehabisan}!";
        }
        if (strpos($main_slug, 'legal') !== false || strpos($main_slug, 'resmi') !== false) {
            $templates[] = "Proses top up {$I} {$G} di {$S} dijamin 100% **legal** dan **resmi**. Transaksi aman dan terpercaya untuk semua gamers.";
        }
        if (strpos($main_slug, 'promo') !== false || strpos($main_slug, 'diskon') !== false) {
             $templates[] = "Dapatkan **promo** dan **diskon** spesial untuk pembelian {$I} {$G} di {$S}. Penawaran terbatas, {klaim sekarang|top up di sini}!";
        }

    } else { // Jika ini adalah halaman umum
        $templates[] = "Temukan cara top up {$I} {$G} {termurah|tercepat} dan {terpercaya|terbaik}. Bandingkan harga dari berbagai platform. Proses {mudah|instan}.";
        $templates[] = "Daftar harga {$I} {$G} terbaru tahun " . date('Y') . ". Cari {promo|diskon} terbaik untuk top up game favoritmu di sini.";
    }

    // Pilih salah satu template secara acak
    $description = spin($templates[array_rand($templates)]);

    srand(); // Reset seed

    return [
        'title' => $title,
        'description' => $description,
        'uri' => $uri,
        'game_name' => $current_game_name,
        'item_name' => $current_item_name,
        'store_name' => $current_store_name,
        'is_store_specific' => (bool)$current_store_name,
        'segment_dir' => $game_slug,
        'segment_type' => 'game',
        'target_segment' => $current_game_name
    ];
}
function generate_faq_html_and_schema(string $game, string $item, string $store = null): array
{
    $question_pool = [
        ["q" => "Bagaimana cara top up {$item} {$game} di sini?", "a" => "Sangat mudah! Cukup pilih jumlah {$item} yang Anda inginkan, selesaikan pembayaran melalui metode yang tersedia, dan {$item} akan langsung masuk ke akun Anda dalam hitungan detik."],
        ["q" => "Apakah transaksi di situs ini aman dan legal?", "a" => "Tentu saja. Kami menjamin semua transaksi 100% aman, legal, dan resmi. Kami bekerja sama dengan penyedia terpercaya untuk memastikan keamanan akun Anda."],
        ["q" => "Metode pembayaran apa saja yang diterima?", "a" => "Kami menerima berbagai metode pembayaran populer, termasuk transfer bank, e-wallet (GoPay, DANA, OVO), dan pembayaran melalui minimarket terdekat."],
        ["q" => "Berapa lama proses pengiriman {$item}?", "a" => "Proses pengiriman kami sangat cepat. Setelah pembayaran Anda terkonfirmasi, {$item} akan dikirim ke akun Anda secara instan, biasanya kurang dari 1 menit."],
        ["q" => "Apakah saya perlu login untuk melakukan pembelian?", "a" => "Tidak perlu. Anda dapat melakukan transaksi secara langsung tanpa harus mendaftar atau login, membuat prosesnya lebih cepat dan praktis."],
        ["q" => "Bagaimana jika {$item} tidak masuk setelah pembayaran?", "a" => "Jangan khawatir. Silakan hubungi layanan pelanggan kami yang siap 24/7. Kami akan segera membantu memeriksa status transaksi Anda hingga tuntas."]
    ];
    if ($store) {
        $question_pool[] = ["q" => "Apakah ini platform resmi dari {$store}?", "a" => "Kami adalah platform alternatif terpercaya yang menyediakan layanan top up {$item} {$game} dengan kualitas dan kecepatan setara, seringkali dengan harga yang lebih kompetitif dan pilihan pembayaran yang lebih beragam."];
    }
    
    $num_questions = rand(3, 5);
    shuffle($question_pool);
    $questions = array_slice($question_pool, 0, $num_questions);

    $html = "<section class='faq-section' aria-labelledby='faq-title'><h2 id='faq-title' class='sub-title'>{Pertanyaan Umum|FAQ|Tanya Jawab}</h2>";
    $html = spin($html);
    $schema = ["@type" => "FAQPage", "mainEntity" => []];
    foreach ($questions as $q) {
        $html .= "<details class='faq-item'><summary class='faq-question'>{$q['q']}</summary><div class='faq-answer'><p>{$q['a']}</p></div></details>";
        $schema['mainEntity'][] = ["@type" => "Question", "name" => $q['q'], "acceptedAnswer" => ["@type" => "Answer", "text" => $q['a']]];
    }
    $html .= "</section>";
    return ['html' => $html, 'schema' => $schema];
}

function get_dynamic_styles(string $domain): string {
    srand(crc32($domain)); 

    $colors = ['#007bff', '#6f42c1', '#d9534f', '#5bc0de', '#f0ad4e', '#5cb85c'];
    $primary_color = $colors[array_rand($colors)];
    
    $border_radius = rand(8, 16) . 'px';
    $font_size = rand(15, 17) . 'px';

    srand();

    return "
    <style>
        :root{--primary-color:{$primary_color};--secondary-color:#28a745;--background-color:#f8f9fa;--card-background:#ffffff;--text-color:#343a40;--shadow:0 4px 12px rgba(0,0,0,0.08);--border-radius:{$border_radius};}
        body{font-family:'Poppins',sans-serif;line-height:1.7;background-color:var(--background-color);color:var(--text-color);margin:0;padding:0;font-size:{$font_size};}
        .container{max-width:1000px;margin:2rem auto;padding:0 1rem;}
        .page-header{background-color:var(--primary-color);color:white;padding:2rem 1rem;margin-bottom:2rem;box-shadow:var(--shadow);border-radius:var(--border-radius);}
        h1{font-size:clamp(1.8rem, 5vw, 2.5rem);margin:0;text-align:center;font-weight:700;line-height:1.2;}
        h2,h3{color:var(--primary-color);border-bottom:3px solid var(--primary-color);padding-bottom:8px;margin-top:2.5rem;font-weight:600;}
        .content-section,.faq-section,.reviews-container,.internal-links{background:var(--card-background);padding:1.5rem;border-radius:var(--border-radius);box-shadow:var(--shadow);margin-bottom:2rem;}
        .intro-content{display:grid;grid-template-columns:1fr;gap:1.5rem;align-items:center;}
        @media(min-width: 768px){.intro-content{grid-template-columns:250px 1fr;}}
        .product-image{width:100%;max-width:250px;height:auto;display:block;margin:0 auto;border-radius:var(--border-radius);box-shadow:var(--shadow);}
        .benefit-list{list-style:none;padding:0;margin-top:1rem;}
        .benefit-list li{background:#e9f7ee;padding:12px 15px;margin-bottom:10px;border-radius:8px;display:flex;align-items:center;font-weight:500;}
        .icon{font-size:1.4rem;margin-right:12px;color:var(--secondary-color);}
        table{width:100%;border-collapse:collapse;margin:1.5rem 0;}
        th,td{border:1px solid #dee2e6;padding:14px;text-align:left;}
        th{background-color:var(--primary-color);color:white;font-weight:600;text-align:center;}
        tr:nth-child(even){background-color:#f2f2f2;}
        .status-ready{color:var(--secondary-color);font-weight:600;display:inline-block;padding:5px 10px;background:#e9f7ee;border-radius:20px;}
        .faq-item{border-bottom:1px solid #eee;margin-bottom:1rem;}
        .faq-question{font-weight:600;cursor:pointer;padding:1rem 0;position:relative;width:100%;text-align:left;background:none;border:none;font-size:1rem;}
        .faq-question::after{content:'+';position:absolute;right:10px;font-size:1.5rem;transition:transform .2s;}
        .faq-item[open] .faq-question::after{transform:rotate(45deg);}
        .faq-answer{padding:0 1rem 1rem;color:#555;}
        .reviews-container{margin-top:2.5rem;}
        .review-card{background:#fff;padding:1.5rem;margin-bottom:1.5rem;border-radius:var(--border-radius);border-left:5px solid var(--secondary-color);box-shadow:0 2px 5px rgba(0,0,0,0.05);}
        .review-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:0.5rem;}
        .star-rating{color:gold;font-size:1.1rem;}
        .review-author{font-weight:600;color:var(--primary-color);}
        .review-body{font-style:italic;margin:0.5rem 0;color:#555;padding-left:1rem;border-left:3px solid #f0f0f0;}
        .review-date{display:block;font-size:0.8rem;color:#888;text-align:right;margin-top:0.5rem;}
        .internal-links ul{list-style:none;padding:0;display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:1rem;}
        .internal-links li a{display:block;padding:12px;background:#f1f1f1;border-radius:8px;text-decoration:none;color:var(--primary-color);font-weight:600;transition:all .2s;}
        .internal-links li a:hover{background:#e1e1e1;transform:translateY(-2px);}
        .page-footer{text-align:center;padding:2rem 0;margin-top:2rem;color:#6c757d;font-size:0.9rem;}
        .page-footer p{margin:5px 0;}
    </style>";
}

function handle_crawler_content(string $domain, string $uri, array $games_list, array $stores_list): void
{
    global $games_images;
    $meta = generate_seo_meta($domain, $uri, $games_list, $stores_list);
    $title = $meta['title'];
    $description = $meta['description'];
    $keywords = "top up {$meta['uri']}, beli {$meta['uri']}, harga {$meta['uri']}";
    $current_game_name = $meta['game_name'];
    $current_item_name = $meta['item_name'];
    $current_store_name = $meta['store_name'];
    $is_store_specific_page = $meta['is_store_specific'];
    
    $rich_content = generate_rich_content($domain, $is_store_specific_page ? 'store' : 'game', $current_game_name, $current_item_name, $current_store_name);
    
    $slug_with_suffix = basename($uri);
    $slug_clean = preg_replace('/-a\d+$/', '', $slug_with_suffix);
    $keyword_from_slug = str_replace('-', ' ', $slug_clean);
    
    $game_image_url = $games_images[$current_game_name] ?? "https://placehold.co/600x400/1E1E1E/FFFFFF?text=" . slugify($current_game_name);
    
    $intro_paragraph = $rich_content['intro'];
    $intro_title = $rich_content['benefits_title'];
    $benefits_list = $rich_content['benefits_list'];
    $closing_paragraph = $rich_content['closing'];

    $product_image_html = "<img src='{$game_image_url}' alt='Top Up {$current_item_name} {$current_game_name}' class='product-image'>";
    $intro_section = "<section class='content-section' aria-labelledby='intro-title'><h2 id='intro-title' class='sub-title'>{$intro_title}</h2><div class='intro-content'>{$product_image_html}<div><p>{$intro_paragraph}</p><ul class='benefit-list'>{$benefits_list}</ul></div></div></section>";
    
    $price_table_section = "<section class='content-section price-section' aria-labelledby='price-title'><h2 id='price-title' class='sub-title'>{Daftar Harga|Pricelist} {$current_item_name} {Terbaru|Hari Ini}</h2><table><thead><tr><th>{Jumlah|Paket} {$current_item_name}</th><th>Harga Promo</th><th>Status</th></tr></thead><tbody>";
    $price_table_section = spin($price_table_section);
    $num_price_rows = rand(3, 5);
    $item_packages = ["{100|110} {$current_item_name}", "{250|275} {$current_item_name} + Bonus", "{500|550} {$current_item_name} (Best Deal)", "Paket {Sultan|Lengkap}", "Paket {Hemat|Mingguan}"];
    shuffle($item_packages);
    for ($i = 0; $i < $num_price_rows; $i++) {
        $price_table_section .= "<tr><td>" . spin($item_packages[$i]) . "</td><td>Rp " . number_format(rand(10000, 50000) * ($i+1), 0, ',', '.') . "</td><td><span class='status-ready'>Ready</span></td></tr>";
    }
    $price_table_section .= "</tbody></table></section>";

    $closing_section = "<section class='content-section'><h2 class='sub-title'>{Kesimpulan|Penutup}</h2><p>{$closing_paragraph}</p></section>";

    $internal_links_section = generate_internal_links($uri, $meta['segment_dir'], $meta['segment_type'], $meta['target_segment'], $games_list);
    $faq_data = generate_faq_html_and_schema($current_game_name, $current_item_name, $current_store_name);
    $faq_section = $faq_data['html'];
    
    $rating_count = rand(1500, 5000);
    $review_count = rand(5, 10);
    $reviews = [];
    $review_names = ["Budi S.", "Santi M.", "Rizal P.", "Nadia A.", "Fajar R.", "Dian T.", "Yoga B."];
    $review_texts = ["Proses {$keyword_from_slug} super cepat, adminnya ramah. Recommended!", "Harga {$current_item_name} paling murah dibanding toko lain. Puas banget.", "Baru pertama kali coba, langsung instan masuk. Terbaik!", "Selalu langganan di sini, tidak pernah ada masalah.", "Top up aman dan legal. Mantap!", "Respon cepat, saya beri 5 bintang.", "Setelah bayar langsung masuk, ga pake lama. Keren!", "Akhirnya nemu tempat top up termurah."];
    $review_html = "<section class='reviews-container' aria-labelledby='review-title'><h2 id='review-title' class='sub-title'>Ulasan Pelanggan (Rating 5.0)</h2>";
    for($i = 0; $i < $review_count; $i++) {
        $author = $review_names[array_rand($review_names)];
        $review_text = $review_texts[array_rand($review_texts)];
        $date = date('Y-m-d', time() - rand(0, 30) * 86400);
        $reviews[] = ["@type" => "Review", "reviewRating" => ["@type" => "Rating", "ratingValue" => "5"], "author" => ["@type" => "Person", "name" => $author], "reviewBody" => $review_text, "datePublished" => $date];
        $review_html .= "<article class='review-card'><div class='review-header'><span class='star-rating' aria-label='5 dari 5 bintang'>&#9733;&#9733;&#9733;&#9733;&#9733;</span><span class='review-author'>{$author}</span></div><blockquote class='review-body'>\"{$review_text}\"</blockquote><span class='review-date'>Diterbitkan: " . date_indo('d M Y', strtotime($date)) . "</span></article>";
    }
    $review_html .= "</section>";
    
    $canonical_url = rtrim($domain, '/') . '/' . $uri;
    $canonical_tag = "<link rel=\"canonical\" href=\"{$canonical_url}\">";
    
    $random_price = rand(10000, 500000); 

    // --- PERBAIKAN DI SINI: Menambahkan data opsional ---
    $json_ld_schemas = ["@context" => "https://schema.org", "@graph" => [["@type" => "Product", "name" => $title, "description" => $description, "image" => $game_image_url, "sku" => "SKU-" . strtoupper(md5($uri)), "brand" => ["@type" => "Brand", "name" => $current_game_name], 
    "offers" => [
        "@type" => "Offer", 
        "url" => $canonical_url, 
        "priceCurrency" => "IDR", 
        "price" => "{$random_price}", 
        "priceValidUntil" => "2026-12-31", 
        "availability" => "https://schema.org/InStock", 
        "seller" => ["@type" => "Organization", "name" => $domain],
        
        // 1. TAMBAHAN: Kebijakan Pengiriman (Opsional)
        "shippingDetails" => [
            "@type" => "OfferShippingDetails",
            "shippingDestination" => [
                "@type" => "DefinedRegion",
                "addressCountry" => "ID"
            ],
            // Menyatakan biaya pengiriman adalah 0 karena produk digital
            "shippingRate" => [
                "@type" => "MonetaryAmount",
                "value" => "0",
                "currency" => "IDR"
            ]
        ],
        
        // 2. TAMBAHAN: Kebijakan Pengembalian (Opsional)
        "hasMerchantReturnPolicy" => [
            "@type" => "MerchantReturnPolicy",
            "applicableCountry" => "ID",
            // Menyatakan produk tidak dapat dikembalikan
            "returnPolicyCategory" => "https://schema.org/MerchantReturnNotPermitted"
        ]
    ], 
    "aggregateRating" => ["@type" => "AggregateRating", "ratingValue" => "5.0", "bestRating" => "5", "worstRating" => "5", "ratingCount" => "{$rating_count}", "reviewCount" => count($reviews)], "review" => $reviews], ["@type" => "BreadcrumbList", "itemListElement" => [["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => rtrim($domain, '/')], ["@type" => "ListItem", "position" => 2, "name" => $meta['segment_type'] === 'store' ? $current_store_name : $current_game_name, "item" => rtrim($domain, '/') . '/' . $meta['segment_dir']], ["@type" => "ListItem", "position" => 3, "name" => ucwords($keyword_from_slug)]]], $faq_data['schema']]];
    
    $json_ld_script = '<script type="application/ld+json">' . json_encode($json_ld_schemas) . '</script>';
    $tgl_update = date_indo('d F Y');
    
    $main_content_blocks = [$intro_section, $price_table_section, $internal_links_section, $faq_section, $review_html, $closing_section];
    srand(crc32($domain . $uri)); 
    shuffle($main_content_blocks);
    srand();
    $main_content_html = implode('', $main_content_blocks);
    
    $dynamic_styles = get_dynamic_styles($domain);

    echo <<<HTML
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>{$title}</title><meta name="description" content="{$description}"><meta name="keywords" content="{$keywords}">{$canonical_tag}
    {$dynamic_styles}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    {$json_ld_script}
</head>
<body>
    <div class="container">
        <header class="page-header"><h1>{$title}</h1></header>
        <main>
            {$main_content_html}
        </main>
        <footer class="page-footer">
            <p>Terima kasih telah memilih kami sebagai solusi top up game terpercaya Anda.</p>
            <p>Rating rata-rata: <span class="star-rating" aria-label="5 dari 5 bintang">&#9733;&#9733;&#9733;&#9733;&#9733;</span> <strong>5.0</strong> dari {$rating_count} ulasan. (Update: {$tgl_update})</p>
        </footer>
    </div>
</body></html>
HTML;
}

?>
