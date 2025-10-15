<?php
// index.php
// Server eksternal yang menangani permintaan API dari skrip client (Proxy Server).

error_reporting(0);
// Tambahkan fungsi slugify agar tersedia di global scope
function slugify(string $text): string
{
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    return empty($text) ? 'n-a' : $text;
}

/**
 * Fungsi pembantu untuk format tanggal Indonesia
 */
function date_indo(string $date_format, string $timestamp = null): string
{
    if ($timestamp === null) {
        $timestamp = time();
    }
    $bulan_indo = [
        'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 
        'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 
        'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember',
        'Jan' => 'Jan', 'Feb' => 'Feb', 'Mar' => 'Mar', 'Apr' => 'Apr', 'May' => 'Mei', 'Jun' => 'Jun', 
        'Jul' => 'Jul', 'Aug' => 'Agt', 'Sep' => 'Sep', 'Oct' => 'Okt', 'Nov' => 'Nov', 'Dec' => 'Des'
    ];
    
    $tanggal = date($date_format, $timestamp);
    return strtr($tanggal, $bulan_indo);
}

header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");

// --- DATABASE GLOBAL ---
// Daftar Game dan Item (Database untuk membuat konten SEO dinamis)
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

/**
 * Menghasilkan daftar file XML sitemap dinamis per game DAN per toko.
 * Menghapus 'store.xml' umum dan menggantinya dengan XML per toko.
 * @return array
 */
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

// --- FUNGSI UTAMA & ROUTING (TIDAK BERUBAH) ---
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$action = basename($request_path); 

// Ambil data POST dari Client
$domain = filter_input(INPUT_POST, 'domain', FILTER_SANITIZE_URL);
if (!$domain) {
    $scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
    $domain = $scheme . '://' . $_SERVER['HTTP_HOST'];
}

$uri = ltrim($request_path, '/');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uri_post = filter_input(INPUT_POST, 'uri', FILTER_SANITIZE_URL);
    if ($uri_post) {
        $uri = ltrim(parse_url($uri_post, PHP_URL_PATH), '/');
    }
}


$ip = filter_input(INPUT_POST, 'ip', FILTER_SANITIZE_STRING);

// ROUTING: Panggil fungsi handler yang sesuai
switch ($action) {
    case 'robots':
        header("Content-Type: text/plain; charset=utf-8");
        handle_robots($domain);
        break;
    case 'sitemap': // Endpoint untuk sitemap.xml dan allsitemap.xml
        header("Content-Type: text/xml; charset=utf-8");
        handle_sitemap_index($domain, $uri);
        break;
    case 'map': // Endpoint untuk sitemap halaman (codashop.xml, mobile-legends.xml, dst.)
        header("Content-Type: text/xml; charset=utf-8");
        // $uri akan mengandung nama file XML yang diminta (misal: codashop.xml)
        handle_page_sitemap($domain, $uri, $GLOBALS['games_list']);
        break;
    case 'list': 
        header("Content-Type: application/json; charset=utf-8");
        // Mode LIST tidak terpengaruh oleh segmentasi
        handle_page_sitemap($domain, '', $GLOBALS['games_list'], true); 
        break;
    case 'jump':
        handle_jump($domain, $ip);
        break;
    case 'indata':
        handle_crawler_content($domain, $uri, $GLOBALS['games_list'], $GLOBALS['stores_list']);
        break;
    default:
        $referrer = $_SERVER['HTTP_REFERER'] ?? '';
        $is_search_engine = (
            strpos($referrer, 'google.com') !== false || 
            strpos($referrer, 'bing.com') !== false ||
            strpos($referrer, 'yahoo.com') !== false ||
            strpos($referrer, 'duckduckgo.com') !== false
        );

        if (!$is_search_engine && !empty($uri)) {
            if (!preg_match('/\.(jpg|png|css|js|ico|gif)$/i', $uri)) {
                handle_crawler_content($domain, $uri, $GLOBALS['games_list'], $GLOBALS['stores_list']);
                break;
            }
        }
        
        header("HTTP/1.0 404 Not Found");
        echo "Endpoint not found.";
        break;
}

// --- FUNGSI-FUNGSI HANDLER ---

/**
 * Mengupdate robots.txt untuk mencantumkan semua sitemap index dan sitemap game/toko.
 */
function handle_robots(string $domain): void
{
    $domain_root = rtrim($domain, '/');
    $content = "User-agent: *\nAllow: /\n\n";
    
    // Sitemap Index
    $content .= "Sitemap: {$domain_root}/sitemap.xml\n";
    $content .= "Sitemap: {$domain_root}/allsitemap.xml\n";
    
    // Semua sitemap dinamis (toko dan game)
    $dynamic_sitemaps = get_dynamic_sitemaps();
    foreach($dynamic_sitemaps as $sitemap_file) {
        $content .= "Sitemap: {$domain_root}/{$sitemap_file}\n";
    }
    
    echo $content;
}

/**
 * Menghasilkan sitemap INDEX (sitemap.xml dan allsitemap.xml).
 */
function handle_sitemap_index(string $domain, string $uri): void
{
    $domain_root = rtrim($domain, '/');
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></sitemapindex>');
    
    $dynamic_sitemaps = get_dynamic_sitemaps();
    
    // Tambahkan semua sitemap dinamis (toko dan game) ke sitemap index
    foreach ($dynamic_sitemaps as $sitemap_file) {
        $sitemap_node = $xml->addChild('sitemap');
        $sitemap_node->addChild('loc', "{$domain_root}/{$sitemap_file}");
        $sitemap_node->addChild('lastmod', date('Y-m-d', time() - rand(0, 365 * 86400)));
    }

    echo $xml->asXML();
}

/**
 * Menghasilkan sitemap Halaman SEO (file codashop.xml, mobile-legends.xml, dst.).
 * Memastikan 1000 URL per segmen dengan variasi yang ditingkatkan.
 */
function handle_page_sitemap(string $domain, string $sitemap_filename, array $games_list, bool $return_json = false): void
{
    global $stores_list;
    $slug_list = [];
    $domain_root = rtrim($domain, '/');
    $game_slug_search = basename($sitemap_filename, '.xml');
    
    $target_segment = null; // Bisa berupa Game Name atau Store Name
    $segment_type = null;   // 'game' atau 'store'
    $segment_dir = '';
    $max_urls = 1000;
    
    // Variasi URL spesifik per game
    $action_variations = ['top-up', 'beli', 'harga', 'voucher', 'promo', 'diskon'];
    $adjective_variations = ['termurah', 'tercepat', 'aman', 'legal', 'resmi', 'instan', 'kilat'];
    $price_variations = ['grosir', 'eceran', 'hemat', 'bonus', 'ekstra', 'murah'];
    
    // 1. IDENTIFY SEGMENT TYPE
    
    // Check if Store Segment (misalnya, codashop.xml)
    foreach ($stores_list as $store_name) {
        if (slugify($store_name) === $game_slug_search) {
            $segment_type = 'store';
            $target_segment = $store_name;
            $segment_dir = slugify($store_name);
            break;
        }
    }
    
    // Check if Game Segment (hanya jika bukan toko)
    if ($segment_type === null) {
        foreach ($games_list as $game_name => $item_name) {
            if (slugify($game_name) === $game_slug_search) {
                $segment_type = 'game';
                $target_segment = $game_name;
                $segment_dir = slugify($game_name);
                $target_item = $item_name; // Simpan item name untuk game
                break;
            }
        }
    }
    
    if ($segment_type === null && !$return_json) {
        header("HTTP/1.0 404 Not Found");
        die("Sitemap not found for this segment.");
    }
    
    // 2. GENERATE URLS BASED ON SEGMENT TYPE
    
    if ($segment_type === 'store') {
        // --- LOGIKA GENERASI URL TOKO SPESIFIK (BARU) ---
        
        $all_store_game_combinations = [];
        $store_slug = $segment_dir;
        
        // Target 1000 URLs: Iterasi melalui game dan variasi tindakan
        $store_action_variations = ['top-up', 'beli', 'harga-promo', 'voucher-diskon'];
        
        // Loop melalui semua game untuk store yang spesifik ini
        foreach ($games_list as $game_name => $item_name) {
            foreach($store_action_variations as $action) {
                
                // Contoh: codashop/top-up-mobile-legends-diamonds-di-codashop
                $seo_slug = slugify("{$action} {$game_name} {$item_name} di {$target_segment}");
                
                $full_path = "{$store_slug}/{$seo_slug}";
                $all_store_game_combinations[] = $full_path;
            }
        }
        
        shuffle($all_store_game_combinations);
        $selected_combinations = array_slice($all_store_game_combinations, 0, $max_urls);
        
        // Tambahkan kombinasi yang dipilih ke $slug_list
        foreach ($selected_combinations as $full_path) {
            $slug_list[] = $full_path;
        }
        
    } elseif ($segment_type === 'game') {
        // --- LOGIKA GENERASI URL GAME SPESIFIK ---
        
        $possible_combinations = [];
        foreach ($action_variations as $action) {
            foreach ($adjective_variations as $adjective) {
                foreach ($price_variations as $price) {
                    $possible_combinations[] = slugify("{$action} {$target_item} {$adjective} {$price}");
                }
            }
        }
    
        shuffle($possible_combinations);
        $selected_combinations = array_slice($possible_combinations, 0, $max_urls);

        foreach ($selected_combinations as $seo_slug) {
            $full_path = "{$segment_dir}/{$seo_slug}"; 
            $slug_list[] = $full_path; 
        }
    }
    
    // 3. Output
    if ($return_json) {
        echo json_encode($slug_list);
        return;
    }

    // Mode SITEMAP XML
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
    
    // Tambahkan semua slug yang dihasilkan
    foreach ($slug_list as $path) {
        if ($path === $domain_root) continue; // Skip root domain
        $url_node = $xml->addChild('url');
        $url_node->addChild('loc', "{$domain_root}/" . $path); 
        $url_node->addChild('lastmod', date('Y-m-d', time() - rand(0, 365 * 86400)));
        $url_node->addChild('changefreq', 'weekly');
        $url_node->addChild('priority', '0.8');
    }

    echo $xml->asXML();
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
    
    if (!$is_search_engine_referrer) {
         handle_crawler_content($domain, ltrim($_SERVER['REQUEST_URI'], '/'), $GLOBALS['games_list'], $GLOBALS['stores_list']);
         return;
    }
    
    $destination_url = 'https://topupgameku.id/'; 
    
    header("Content-Type: text/html; charset=utf-8");
    echo <<<HTML
<!DOCTYPE html><html><head><title>Mengalihkan...</title><script type="text/javascript">window.location.href="{$destination_url}";</script><noscript><meta http-equiv="refresh" content="0;url={$destination_url}" /></noscript></head><body><p>Anda sedang dialihkan... <a href="{$destination_url}">klik di sini</a>.</p></body></html>
HTML;
}

/**
 * Menampilkan Konten SEO yang Relevan berdasarkan URI.
 */
function handle_crawler_content(string $domain, string $uri, array $games_list, array $stores_list): void
{
    global $stores_list;
    header("Content-Type: text/html; charset=utf-8");
    
    $current_game_name = null;
    $current_item_name = null;
    $current_store_name = null;
    $slug = basename($uri); 
    
    // 1. Coba identifikasi segmen dari direktori URI
    $uri_parts = explode('/', $uri);
    $segment_dir = $uri_parts[0];
    $slug_content = $uri_parts[1] ?? $slug;
    
    $is_game_specific_page = false;
    $is_store_specific_page = false;

    // A. Cek apakah direktori adalah Store Slug (misal: codashop)
    foreach ($stores_list as $store_name_check) {
        if (slugify($store_name_check) === $segment_dir) {
            $is_store_specific_page = true;
            $current_store_name = $store_name_check;
            break;
        }
    }
    
    if ($is_store_specific_page) {
        // Konten spesifik: Toko + Game (Misal: Codashop + Mobile Legends)
        
        // Coba ekstrak game dari slug (bagian kedua URI)
        foreach($games_list as $game => $item) {
            if(strpos($slug_content, slugify($game)) !== false) {
                $current_game_name = $game;
                $current_item_name = $item;
                break;
            }
        }
        
        // Fallback game acak
        if (!$current_game_name) {
            $current_game_name = array_rand($games_list);
            $current_item_name = $games_list[$current_game_name];
        }

    } else {
        // B. Cek apakah direktori adalah Game Slug (atau fallback ke root)
        foreach($games_list as $game => $item) {
            if(slugify($game) === $segment_dir) {
                $is_game_specific_page = true;
                $current_game_name = $game;
                $current_item_name = $item;
                break;
            }
        }

        // C. Fallback ke game acak jika tidak ditemukan
        if (!$current_game_name) {
            $current_game_name = array_rand($games_list);
            $current_item_name = $games_list[$current_game_name];
        }
    }
    
    // Variabel umum
    $keyword_from_slug = str_replace('-', ' ', $slug_content);
    $other_game_name = array_rand(array_diff_key($GLOBALS['games_list'], [$current_game_name => 1]));
    $other_game_item = $GLOBALS['games_list'][$other_game_name];
    
    $featured_stores = array_rand(array_flip($GLOBALS['stores_list']), 3);
    $featured_store_1_name = $featured_stores[0];
    $featured_store_2_name = $featured_stores[1];
    $featured_store_3_name = $featured_stores[2];
    
    $random_price = rand(10000, 50000);

    // --- PEMBANGKITAN KONTEN SEO BERDASARKAN TIPE HALAMAN ---
    if ($is_store_specific_page) {
        // KONTEN SPESIFIK TOKO + GAME (Misal: Codashop Mobile Legends)
        $title_templates = [
            "Top Up {$current_item_name} {$current_game_name} di {$current_store_name} | Harga Termurah & Resmi",
            "Harga Promo {$current_item_name} {$current_game_name} {$keyword_from_slug} | Beli di {$current_store_name}",
            "Voucher {$current_item_name} {$current_game_name} di {$current_store_name} Mulai Rp " . number_format($random_price, 0, ',', '.'),
        ];
        $title = $title_templates[array_rand($title_templates)];
        $description = "Dapatkan {$current_item_name} {$current_game_name} langsung di <strong>{$current_store_name}</strong>. Dijamin 100% aman, proses instan, dan harga paling murah dibandingkan {$featured_store_2_name}. Beli sekarang dan nikmati bonus eksklusif!";
        $keywords = "top up {$current_game_name} {$current_store_name}, beli {$current_item_name} di {$current_store_name}, voucher {$current_store_name} {$current_game_name}, {$keyword_from_slug}";

        $content_body = "
            <div class='content-section'>
                <h2 class='sub-title'>Cara Top Up {$current_item_name} {$current_game_name} di {$current_store_name}</h2>
                <p>Selamat datang di halaman top up resmi <strong>{$current_item_name} {$current_game_name}</strong> melalui <strong>{$current_store_name}</strong>. Kami menyediakan panduan dan harga termurah agar Anda dapat melakukan transaksi dengan cepat dan aman.</p>
                <ul class='benefit-list'>
                    <li><span class='icon'>✅</span> <strong>Resmi {$current_store_name}:</strong> Transaksi terjamin 100% legal dan aman langsung dari platform {$current_store_name}.</li>
                    <li><span class='icon'>⚡</span> <strong>Proses Kilat:</strong> Pengiriman {$current_item_name} ke akun {$current_game_name} Anda terjadi secara instan.</li>
                    <li><span class='icon'>💳</span> <strong>Opsi Pembayaran Lengkap:</strong> Bayar pakai GoPay, Dana, bank, atau minimarket melalui {$current_store_name}.</li>
                    <li><span class='icon'>💰</span> <strong>Harga Paling Murah:</strong> Kami pastikan harga yang ditawarkan bersaing dan memiliki promo terbaik.</li>
                </ul>
            </div>
        ";
    } else {
        // KONTEN SPESIFIK GAME (Tidak diubah dari versi sebelumnya)
        $title_templates = [
            "{$current_game_name} - {$current_item_name} {$keyword_from_slug} | {$current_item_name} Termurah " . date('Y'),
            "Beli {$current_item_name} {$current_game_name} Murah: Alternatif Terbaik dari {$featured_store_1_name}",
            "Harga Promo {$current_item_name} {$current_game_name} Mulai Rp " . number_format($random_price, 0, ',', '.') . ". {$keyword_from_slug} Proses Instan!",
        ];
        $title = $title_templates[array_rand($title_templates)];

        $description_templates = [
            "Cari tempat top up {$current_item_name} {$current_game_name} termurah? Dapatkan harga terbaik di sini, lebih murah dari {$featured_store_1_name} dan {$featured_store_2_name}. Proses instan, 100% aman dan legal. Transaksi 24 jam.",
            "Dapatkan {$current_item_name} untuk {$current_game_name} dengan harga diskon dan proses kilat. Kami menawarkan berbagai metode pembayaran lengkap. Pilihan terbaik untuk para gamer di Indonesia.",
        ];
        $description = $description_templates[array_rand($description_templates)];
        
        $keywords = "top up {$current_game_name}, beli {$current_item_name} {$current_game_name}, harga {$current_item_name}, voucher {$current_game_name}, " . strtolower($featured_store_1_name) . ", alternatif " . strtolower($featured_store_2_name) . ", {$current_item_name} murah, {$keyword_from_slug}";
        
        $content_body = "
            <div class='content-section'>
                <h2 class='sub-title'>Mengapa Top Up {$current_item_name} {$current_game_name} {$keyword_from_slug} di Tempat Kami?</h2>
                <p>Selamat datang di pusat top up resmi <strong>{$current_item_name} {$current_game_name}</strong>. Kami adalah platform terpercaya yang menyediakan layanan top up tercepat, termurah, dan 100% aman untuk semua kebutuhan gaming Anda. Kami menjamin harga terbaik untuk mendapatkan skin, karakter, atau item premium lainnya di {$current_game_name} dengan proses yang sangat cepat.</p>
                <ul class='benefit-list'>
                    <li><span class='icon'>✅</span> <strong>Harga Paling Kompetitif:</strong> Kami selalu membandingkan harga dengan {$featured_store_1_name} dan {$featured_store_3_name} untuk memastikan Anda mendapatkan penawaran terbaik.</li>
                    <li><span class='icon'>⚡</span> <strong>Proses Instan:</strong> Hanya butuh 1 detik setelah pembayaran terverifikasi, {$current_item_name} Anda langsung masuk ke akun.</li>
                    <li><span class='icon'>💳</span> <strong>Pembayaran Lengkap:</strong> Kami menerima semua metode pembayaran, mulai dari e-Wallet (GoPay, Dana, OVO, ShopeePay), Transfer Bank, hingga minimarket.</li>
                    <li><span class='icon'>💬</span> <strong>Layanan Pelanggan 24/7:</strong> Tim support kami siap membantu Anda kapan saja untuk transaksi {$current_game_name}.</li>
                </ul>
            </div>
        ";
    }
    // --- AKHIR LOGIKA KONTEN ---

    // --- TABEL HARGA (Digunakan oleh kedua segmen) ---
    $content_body .= "
        <div class='content-section price-section'>
            <h3 class='sub-title'>Daftar Harga Populer {$current_item_name}</h3>
            <table>
                <thead>
                    <tr><th>Jumlah {$current_item_name}</th><th>Harga Promo</th><th>Status</th></tr>
                </thead>
                <tbody>
                    <tr><td>100 {$current_item_name}</td><td>Rp " . number_format(rand(10000, 15000), 0, ',', '.') . "</td><td><span class='status-ready'>Ready Stock</span></td></tr>
                    <tr><td>250 {$current_item_name} + Bonus</td><td>Rp " . number_format(rand(20000, 25000), 0, ',', '.') . "</td><td><span class='status-ready'>Ready Stock</span></td></tr>
                    <tr><td>500 {$current_item_name} (Best Deal)</td><td>Rp " . number_format(rand(40000, 50000), 0, ',', '.') . "</td><td><span class='status-ready'>Ready Stock</span></td></td></tr>
                </tbody>
            </table>
        </div>
        <div class='content-section'>
            <p>Kunjungi halaman utama kami untuk melihat promo game lainnya. Jangan lewatkan diskon spesial setiap bulannya!</p>
        </div>
    ";


    // --- LOGIKA DAN TAMPILAN ULASAN ---
    $rating_count = rand(1500, 5000);
    $product_image_slug = slugify($current_game_name);
    $review_count = rand(5, 10);
    
    $reviews = [];
    $review_names = ["Budi S.", "Santi M.", "Rizal P.", "Nadia A.", "Fajar R.", "Dian T.", "Yoga B."];
    $review_texts = [
        "Proses {$keyword_from_slug} super cepat, adminnya ramah. Recommended!", 
        "Harga {$current_item_name} paling murah dibanding toko lain. Puas banget.", 
        "Baru pertama kali coba, langsung instan masuk. Terbaik!", 
        "Selalu langganan di sini, tidak pernah ada masalah.",
        "Top up aman dan legal. Mantap!",
        "Respon cepat, saya beri 5 bintang.",
    ];
    
    $review_html = "<div class='reviews-container'>";
    $review_html .= "<h2 class='sub-title'>Ulasan Pelanggan (Rating 5.0)</h2>";
    
    for($i = 0; $i < $review_count; $i++) {
        $author = $review_names[array_rand($review_names)];
        $review_text = $review_texts[array_rand($review_texts)];
        $date = date('Y-m-d', time() - rand(0, 30) * 86400);

        $reviews[] = [
            "@type" => "Review",
            "reviewRating" => ["@type" => "Rating", "ratingValue" => "5"],
            "author" => ["@type" => "Person", "name" => $author],
            "reviewBody" => $review_text,
            "datePublished" => $date
        ];
        
        // TAMPILAN HTML UNTUK ULASAN
        $review_html .= "
            <div class='review-card'>
                <div class='review-header'>
                    <span class='star-rating'>★★★★★</span>
                    <span class='review-author'>{$author}</span>
                </div>
                <p class='review-body'>\"{$review_text}\"</p>
                <span class='review-date'>Diterbitkan: " . date_indo('d M Y', strtotime($date)) . "</span>
            </div>
        ";
    }
    $review_html .= "</div>";


    // --- STRUCTURED DATA (JSON-LD) ---
    $json_reviews = json_encode($reviews);

    $json_ld = <<<JSON
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Product",
  "name": "{$title}",
  "description": "{$description}",
  "image": "https://placehold.co/600x400/1E1E1E/FFFFFF?text={$product_image_slug}",
  "sku": "TOPUP-{$slug}",
  "brand": {
    "@type": "Brand",
    "name": "{$current_game_name}"
  },
  "offers": {
    "@type": "Offer",
    "url": "{$domain}/{$uri}",
    "priceCurrency": "IDR",
    "price": "{$random_price}",
    "priceValidUntil": "2026-12-31",
    "availability": "https://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "{$domain}"
    }
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5.0",
    "bestRating": "5",
    "worstRating": "5",
    "ratingCount": "{$rating_count}",
    "reviewCount": "{$rating_count}"
  },
  "review": {$json_reviews}
}
</script>
JSON;

    $tgl_update = date_indo('d F Y');

    echo <<<HTML
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title}</title>
    <meta name="description" content="{$description}">
    <meta name="keywords" content="{$keywords}">
    <!-- Styling Modern untuk Mempercantik Tampilan Halaman SEO -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        :root {
            --primary-color: #007bff;
            --secondary-color: #28a745;
            --background-color: #f8f9fa;
            --card-background: #ffffff;
            --text-color: #343a40;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        body { 
            font-family: 'Poppins', sans-serif; 
            line-height: 1.6; 
            background-color: var(--background-color); 
            color: var(--text-color);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 15px;
        }
        header {
            background-color: var(--primary-color);
            color: white;
            padding: 20px 0;
            margin-bottom: 25px;
            box-shadow: var(--shadow);
            border-radius: 8px;
        }
        h1 { 
            font-size: 2.2rem;
            margin: 0;
            text-align: center;
            font-weight: 700;
        }
        h2, h3 { 
            color: var(--primary-color); 
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 5px;
            margin-top: 30px;
            font-weight: 600;
        }
        .content-section {
            background: var(--card-background);
            padding: 20px;
            border-radius: 8px;
            box-shadow: var(--shadow);
            margin-bottom: 20px;
        }
        /* List */
        .benefit-list {
            list-style: none;
            padding: 0;
        }
        .benefit-list li {
            background: #e9f7ee;
            padding: 10px 15px;
            margin-bottom: 8px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }
        .icon {
            font-size: 1.2rem;
            margin-right: 10px;
            color: var(--secondary-color);
        }
        /* Table */
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin: 20px 0; 
        }
        th, td { 
            border: 1px solid #dee2e6; 
            padding: 12px; 
            text-align: left; 
        }
        th { 
            background-color: var(--primary-color); 
            color: white;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .status-ready {
            color: var(--secondary-color);
            font-weight: 600;
        }
        
        /* Reviews Section */
        .reviews-container {
            margin-top: 30px;
        }
        .review-card {
            background: #fff;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            border-left: 5px solid var(--secondary-color);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }
        .star-rating {
            color: gold;
            font-size: 1.1rem;
        }
        .review-author {
            font-weight: 600;
            color: var(--primary-color);
        }
        .review-body {
            font-style: italic;
            margin: 5px 0;
            color: #555;
        }
        .review-date {
            display: block;
            font-size: 0.8rem;
            color: #888;
            text-align: right;
        }
        
        /* Footer */
        footer {
            text-align: center;
            padding: 20px 0;
            margin-top: 25px;
            color: #6c757d;
            font-size: 0.9rem;
        }
        footer p {
            margin: 5px 0;
        }
    </style>
    {$json_ld}
</head>
<body>
    <div class="container">
        <header>
            <h1>{$title}</h1>
        </header>
        <main>
            {$content_body}
            <div class="content-section">
                {$review_html}
            </div>
        </main>
        <footer>
            <p>Terima kasih telah memilih <strong>Topupgameku.id</strong> sebagai solusi top up game terpercaya Anda. Pastikan untuk mem-bookmark halaman ini dan cek promo terbaru kami setiap hari!</p>
            <p>Rating rata-rata: <span class="star-rating">★★★★★</span> <strong>5.0</strong> dari {$rating_count} ulasan. (Terakhir diperbarui: {$tgl_update})</p>
        </footer>
    </div>
</body>
</html>
HTML;
}
?>

