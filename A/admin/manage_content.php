<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}

define('DATA_DIR', __DIR__ . '/../data');
define('IMAGES_DIR', __DIR__ . '/../images'); // Path folder images di server
define('IMAGES_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}/images"); // URL publik ke folder images

function slugify($text) {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    return empty($text) ? 'n-a' : $text;
}

function read_json_file($filename) {
    $path = DATA_DIR . '/' . $filename;
    if (!file_exists($path)) return [];
    return json_decode(file_get_contents($path), true);
}

function write_json_file($filename, $data) {
    $path = DATA_DIR . '/' . $filename;
    if ($filename === 'stores.json' && is_array($data)) {
        $data = array_values($data);
    }
    ksort($data);
    return file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'upload_from_url') {
        $game_name = $_POST['game_name'];
        $image_url = filter_var($_POST['image_url'], FILTER_VALIDATE_URL);

        if (!$image_url) {
            $_SESSION['error'] = "URL gambar tidak valid.";
        } else {
            $image_data = @file_get_contents($image_url);
            if ($image_data === false) {
                $_SESSION['error'] = "Gagal mengunduh gambar dari URL yang diberikan.";
            } else {
                $extension = pathinfo(parse_url($image_url, PHP_URL_PATH), PATHINFO_EXTENSION);
                if (empty($extension) || !in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'])) {
                    $extension = 'jpg';
                }

                $new_filename = slugify($game_name) . '.' . $extension;
                $save_path = IMAGES_DIR . '/' . $new_filename;

                if (file_put_contents($save_path, $image_data)) {
                    $images_data = read_json_file('images.json');
                    $images_data[$game_name] = IMAGES_URL . '/' . $new_filename;
                    
                    if(write_json_file('images.json', $images_data)) {
                        $_SESSION['notification'] = "Gambar untuk '{$game_name}' berhasil diunduh dan diterapkan.";
                    } else {
                        $_SESSION['error'] = "Gambar berhasil diunduh, tapi gagal memperbarui file images.json.";
                    }
                } else {
                    $_SESSION['error'] = "Gagal menyimpan gambar. Pastikan folder /images writable.";
                }
            }
        }
    } 
    elseif (in_array($action, ['add', 'edit', 'delete'])) {
        $file = basename($_POST['file']);
        if (in_array($file, ['games.json', 'stores.json', 'images.json'])) {
            $data = read_json_file($file);
            $key = $_POST['key'];

            if ($action === 'delete') {
                unset($data[$key]);
                $_SESSION['notification'] = "Item berhasil dihapus dari {$file}.";
            } else {
                $value = $_POST['value'];
                $new_key = $_POST['new_key'] ?? $key;
                if ($action === 'edit' && $key !== $new_key) unset($data[$key]);
                
                if ($file === 'stores.json') {
                    if ($action === 'add') {
                        $data[] = $key;
                        $_SESSION['notification'] = "Toko '{$key}' berhasil ditambahkan.";
                    } else {
                        $data[$key] = $value;
                        $_SESSION['notification'] = "Toko berhasil diperbarui.";
                    }
                } else {
                    $data[$new_key] = $value;
                    $_SESSION['notification'] = "Item '{$new_key}' berhasil disimpan ke {$file}.";
                }
            }
            if (!write_json_file($file, $data)) {
                $_SESSION['error'] = "Gagal menulis ke file {$file}. Cek file permission.";
            }
        } else {
            $_SESSION['error'] = "Operasi file tidak valid.";
        }
    }
    header('Location: manage_content.php' . (isset($file) ? '#' . ucfirst(str_replace('.json', '', $file)) : ''));
    exit;
}

$notification = $_SESSION['notification'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['notification'], $_SESSION['error']);

$games_data = read_json_file('games.json');
$stores_data = read_json_file('stores.json');
$images_data = read_json_file('images.json');

$games_without_images = array_diff_key($games_data, $images_data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Konten</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Manajemen Konten</h1>
            <div>
                <a href="dashboard.php" class="btn-nav">Kembali ke Statistik</a>
                <a href="?logout=1" class="logout">Logout</a>
            </div>
        </header>

        <?php if ($notification): ?><div class='notification'><?php echo $notification; ?></div><?php endif; ?>
        <?php if ($error): ?><div class='error'><?php echo $error; ?></div><?php endif; ?>
        
        <div class="tabs">
            <button class="tab-link" data-tab="Games" onclick="openTab(event, 'Games')">Games</button>
            <button class="tab-link" data-tab="Stores" onclick="openTab(event, 'Stores')">Stores</button>
            <button class="tab-link" data-tab="Images" onclick="openTab(event, 'Images')">Images</button>
        </div>

        <div id="Games" class="tab-content">
            <div class="card">
                <h2>Manajemen Games (games.json)</h2>
                <div class="content">
                    <form method="POST" action="manage_content.php" class="add-form">
                        <input type="hidden" name="action" value="add"><input type="hidden" name="file" value="games.json">
                        <div class="form-group"><label>Nama Game Baru</label><input type="text" name="key" placeholder="Contoh: Valorant" required></div>
                        <div class="form-group"><label>Nama Item Baru</label><input type="text" name="value" placeholder="Contoh: Points" required></div>
                        <button type="submit" class="btn btn-add">Tambah Game</button>
                    </form>
                    <table class="content-table">
                        <thead><tr><th>Nama Game</th><th>Nama Item</th><th>Aksi</th></tr></thead>
                        <tbody>
                            <?php foreach($games_data as $key => $value): ?>
                            <tr>
                                <form method="POST" action="manage_content.php">
                                    <input type="hidden" name="file" value="games.json"><input type="hidden" name="key" value="<?php echo htmlspecialchars($key); ?>">
                                    <td><input type="text" name="new_key" value="<?php echo htmlspecialchars($key); ?>"></td>
                                    <td><input type="text" name="value" value="<?php echo htmlspecialchars($value); ?>"></td>
                                    <td><div class="actions"><button type="submit" name="action" value="edit" class="btn btn-save">Simpan</button><button type="submit" name="action" value="delete" class="btn btn-delete" onclick="return confirm('Yakin?')">Hapus</button></div></td>
                                </form>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div id="Stores" class="tab-content">
            <div class="card">
                 <h2>Manajemen Stores (stores.json)</h2>
                 <div class="content">
                    <form method="POST" action="manage_content.php" class="add-form">
                        <input type="hidden" name="action" value="add"><input type="hidden" name="file" value="stores.json">
                        <div class="form-group" style="flex: 2;"><label>Nama Toko Baru</label><input type="text" name="key" placeholder="Contoh: Lapakgaming" required></div>
                        <button type="submit" class="btn btn-add">Tambah Toko</button>
                    </form>
                    <table class="content-table">
                        <thead><tr><th>Nama Toko</th><th>Aksi</th></tr></thead>
                        <tbody>
                            <?php foreach($stores_data as $index => $value): ?>
                            <tr>
                                <form method="POST" action="manage_content.php">
                                    <input type="hidden" name="file" value="stores.json"><input type="hidden" name="key" value="<?php echo $index; ?>">
                                    <td><input type="text" name="value" value="<?php echo htmlspecialchars($value); ?>"></td>
                                    <td><div class="actions"><button type="submit" name="action" value="edit" class="btn btn-save">Simpan</button><button type="submit" name="action" value="delete" class="btn btn-delete" onclick="return confirm('Yakin?')">Hapus</button></div></td>
                                </form>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
        
        <div id="Images" class="tab-content">
            <?php if (!empty($games_without_images)): ?>
            <div class="card">
                <h2>Games Tanpa Gambar</h2>
                <div class="content">
                    <p>Daftar game berikut belum memiliki gambar. Masukkan URL untuk mengunduh & menyimpannya secara otomatis.</p>
                    <table class="content-table">
                        <thead><tr><th>Nama Game</th><th>URL Gambar</th><th>Aksi</th></tr></thead>
                        <tbody>
                            <?php foreach($games_without_images as $key => $value): ?>
                            <tr>
                                <form method="POST" action="manage_content.php">
                                    <input type="hidden" name="action" value="upload_from_url"><input type="hidden" name="game_name" value="<?php echo htmlspecialchars($key); ?>">
                                    <td><?php echo htmlspecialchars($key); ?></td>
                                    <td><input type="text" name="image_url" placeholder="https://..." required></td>
                                    <td><div class="actions"><button type="submit" class="btn btn-save">Simpan Gambar</button></div></td>
                                </form>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>

            <div class="card">
                <h2>Manajemen Gambar (images.json)</h2>
                <div class="content">
                    <table class="content-table">
                         <thead><tr><th>Nama Game</th><th>URL Gambar Tersimpan</th><th>Aksi</th></tr></thead>
                         <tbody>
                            <?php foreach($images_data as $key => $value): ?>
                            <tr>
                                <form method="POST" action="manage_content.php">
                                    <input type="hidden" name="action" value="edit"><input type="hidden" name="file" value="images.json"><input type="hidden" name="key" value="<?php echo htmlspecialchars($key); ?>"><input type="hidden" name="new_key" value="<?php echo htmlspecialchars($key); ?>">
                                    <td><?php echo htmlspecialchars($key); ?></td>
                                    <td><input type="text" name="value" value="<?php echo htmlspecialchars($value); ?>"></td>
                                    <td><div class="actions"><button type="submit" class="btn btn-save">Simpan</button><button type="submit" name="action" value="delete" class="btn btn-delete" onclick="return confirm('Yakin?')">Hapus</button></div></td>
                                </form>
                            </tr>
                            <?php endforeach; ?>
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openTab(evt, tabName) {
            let i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tab-link");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.classList.add("active");
            // Simpan tab yang aktif ke URL hash
            window.location.hash = tabName;
        }
        
        document.addEventListener("DOMContentLoaded", function() {
            // Cek hash di URL untuk menentukan tab mana yang harus aktif
            const activeTab = window.location.hash.substring(1) || 'Games';
            const tabButton = document.querySelector(`.tab-link[data-tab="${activeTab}"]`);
            
            if(tabButton) {
                tabButton.click();
            } else {
                // Jika hash tidak valid, buka tab pertama
                document.querySelector('.tab-link').click();
            }
        });
    </script>
</body>
</html>
