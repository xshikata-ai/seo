<?php
session_start();
define('ADMIN_PASSWORD', 'xshikata'); // Ganti password ini!

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    if ($_POST['password'] === ADMIN_PASSWORD) {
        $_SESSION['loggedin'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Password yang Anda masukkan salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root { --bg-dark: #1a1c23; --bg-card: #242731; --text-primary: #f0f0f0; --primary-blue: #3498db; --danger-red: #e74c3c; --border-color: #3b4050; }
        body { font-family: 'Poppins', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: var(--bg-dark); margin: 0; }
        .login-container { background: var(--bg-card); padding: 2.5rem; border-radius: 8px; box-shadow: 0 4px 20px rgba(0,0,0,0.2); text-align: center; width: 320px; border: 1px solid var(--border-color); }
        h1 { margin-top: 0; color: var(--text-primary); }
        input[type="password"] { padding: 0.8rem; width: 100%; box-sizing: border-box; background: #2f3341; border: 1px solid var(--border-color); color: var(--text-primary); border-radius: 4px; margin-top: 1rem; }
        button { padding: 0.8rem 1rem; width: 100%; border: none; background-color: var(--primary-blue); color: white; border-radius: 4px; cursor: pointer; margin-top: 1.5rem; font-weight: bold; font-size: 1rem; transition: background .2s; }
        button:hover { background: #2980b9; }
        .error { color: #e74c3c; background: #c0392b20; border: 1px solid #e74c3c; padding: 0.75rem; border-radius: 4px; margin-top: 1rem; text-align: center; }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form method="POST" action="index.php">
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <?php if ($error): ?>
            <p class='error'><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
