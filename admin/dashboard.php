<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

define('CACHE_DIR', __DIR__ . '/../cache');
define('LOG_FILE', __DIR__ . '/../visitor_logs.json');

$notification = $_SESSION['notification'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['notification'], $_SESSION['error']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'clear_cache') {
    $files = glob(CACHE_DIR . '/*.html');
    $count = 0;
    foreach ($files as $f) {
        if (is_file($f)) {
            unlink($f);
            $count++;
        }
    }
    $_SESSION['notification'] = "<strong>{$count} file cache</strong> berhasil dihapus!";
    header('Location: dashboard.php');
    exit;
}

function get_stats() {
    $stats = ['total_visitors' => 0, 'domain_breakdown' => []];
    if (file_exists(LOG_FILE)) {
        $log_content = file_get_contents(LOG_FILE);
        $log_lines = explode(",\n", trim($log_content, ",\n"));
        
        $log_data = [];
        foreach ($log_lines as $line) {
            if (empty($line)) continue;
            $data = json_decode(trim($line), true);
            if ($data && isset($data['domain'])) {
                $log_data[] = $data;
            }
        }

        $stats['total_visitors'] = count($log_data);

        $domain_breakdown = [];
        foreach ($log_data as $entry) {
            $domain_name = parse_url($entry['domain'], PHP_URL_HOST) ?? $entry['domain'];
            @$domain_breakdown[$domain_name]++;
        }
        arsort($domain_breakdown);
        $stats['domain_breakdown'] = $domain_breakdown;
    }
    return $stats;
}

$stats = get_stats();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Statistik</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Dasbor Utama</h1>
            <div>
                <a href="manage_content.php" class="btn-nav">Manajemen Konten</a>
                <a href="?logout=1" class="logout">Logout</a>
            </div>
        </header>

        <?php if ($notification): ?><div class='notification'><?php echo $notification; ?></div><?php endif; ?>
        <?php if ($error): ?><div class='error'><?php echo $error; ?></div><?php endif; ?>

        <div class="grid">
            <div class="card">
                <h2>Statistik Visitor per Domain</h2>
                <div class="content">
                    <p style="font-size: 1.2rem;"><strong>Total Visitor:</strong> <?php echo $stats['total_visitors']; ?></p>
                    <table id="stats-table">
                        <thead><tr><th>DOMAIN</th><th>VISITOR</th></tr></thead>
                        <tbody>
                        <?php if (!empty($stats['domain_breakdown'])): ?>
                            <?php foreach($stats['domain_breakdown'] as $domain => $count): ?>
                            <tr><td><?php echo htmlspecialchars($domain); ?></td><td><?php echo $count; ?></td></tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="2">Belum ada data visitor.</td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <h2>Manajemen Cache</h2>
                <div class="content">
                    <p>Menghapus cache akan memaksa semua halaman untuk dibuat ulang. Lakukan ini setelah Anda mengubah data.</p>
                    <form method="POST" action="dashboard.php">
                        <input type="hidden" name="action" value="clear_cache">
                        <button type="submit" class="btn-cache">Hapus Semua Cache</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card" style="margin-top: 2rem;">
            <h2>Google SERP Preview</h2>
            <div class="content">
                <p>Masukkan salah satu URL SEO Anda untuk melihat pratinjau tampilannya di hasil pencarian Google.</p>
                <div class="serp-form">
                    <input type="text" id="serp-url-input" placeholder="Contoh: https://domain-anda.com/mobile-legends-mlbb/top-up-diamonds-termurah-a1">
                    <button id="serp-preview-btn" class="btn btn-save">Lihat Preview</button>
                </div>
                <div id="serp-preview-container">
                    </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('serp-preview-btn').addEventListener('click', function() {
            const urlInput = document.getElementById('serp-url-input').value;
            const previewContainer = document.getElementById('serp-preview-container');

            if (!urlInput) {
                previewContainer.innerHTML = `<p class="serp-error">Silakan masukkan URL.</p>`;
                return;
            }

            try {
                const urlObject = new URL(urlInput);
                const path = urlObject.pathname;
                const domain = `${urlObject.protocol}//${urlObject.hostname}`; // Ekstrak domain klien

                previewContainer.innerHTML = `<p class="serp-loading">Memuat preview...</p>`;

                // ### PERUBAHAN DI SINI: Kirim 'domain' sebagai parameter ###
                fetch(`../index-endpoint.php?action=meta&uri=${path}&domain=${encodeURIComponent(domain)}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            previewContainer.innerHTML = `<p class="serp-error">Error: ${data.error}</p>`;
                            return;
                        }

                        // ### PERUBAHAN DI SINI: Tambahkan tampilan bintang ###
                        const serpHTML = `
                            <div class="serp-result">
                                <span class="serp-url">${data.url.replace(/</g, "&lt;").replace(/>/g, "&gt;")}</span>
                                <h3 class="serp-title">${data.title.replace(/</g, "&lt;").replace(/>/g, "&gt;")}</h3>
                                <div class="serp-rating">
                                    <span class="serp-stars">★★★★★</span>
                                    <span>Rating: ${data.rating_value} · </span>
                                    <span>${data.rating_count} suara</span>
                                </div>
                                <p class="serp-description">${data.description.replace(/</g, "&lt;").replace(/>/g, "&gt;")}</p>
                            </div>
                        `;
                        previewContainer.innerHTML = serpHTML;
                    })
                    .catch(error => {
                        previewContainer.innerHTML = `<p class="serp-error">Gagal memuat preview. Cek koneksi atau URL endpoint.</p>`;
                        console.error('Fetch error:', error);
                    });

            } catch (e) {
                previewContainer.innerHTML = `<p class="serp-error">URL yang Anda masukkan tidak valid.</p>`;
            }
        });
    </script>
</body>
</html>
