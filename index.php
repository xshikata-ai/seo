<?php
include dirname(__FILE__) . '/.private/config.php';
// ============== CONFIGURATION ==================
$db_host = 'localhost';
$db_name = 'qsrufagr_chat';
$db_user = 'qsrufagr_appchat';
$db_pass = 'Tony_@6025@#$';
// =============================================

// --- Database Connection ---
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}

session_start();
$message = '';
$action = $_GET['action'] ?? 'chat'; // Default action

// --- Handle Login/Register Actions ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && $user['password'] == sha1($password)) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_admin'] = $user['is_admin'];
            header("Location: index.php");
            exit();
        } else {
            $message = "Invalid username or password.";
        }
    } elseif (isset($_POST['register'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if (empty($username) || empty($password)) {
            $message = "Username and password are required.";
        } else {
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->execute([$username]);
            if ($stmt->fetch()) {
                $message = "Username is already taken.";
            } else {
                $hashed_password = sha1($password);
                $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                if ($stmt->execute([$username, $hashed_password])) {
                    $_SESSION['user_id'] = $pdo->lastInsertId();
                    $_SESSION['username'] = $username;
                    $_SESSION['is_admin'] = 0; // New users are not admins
                    header("Location: index.php");
                    exit();
                }
            }
        }
    }
}

// --- Handle Logout ---
if ($action === 'logout') {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

// --- Main Page Logic ---
$is_logged_in = isset($_SESSION['user_id']);

if (!$is_logged_in) { // =============== SHOW LOGIN/REGISTER PAGE =================
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="auth-container">
        <h2>Login</h2>
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <?php if ($message): ?><p class="message"><?php echo htmlspecialchars($message); ?></p><?php endif; ?>
        <hr style="margin: 2rem 0;">
        <h2>Create Account</h2>
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="New Username" required>
            <input type="password" name="password" placeholder="New Password" required>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>
</html>
<?php
} else { // =============== SHOW CHAT PAGE =================
    $current_user_id = $_SESSION['user_id'];
    $stmt = $pdo->prepare("SELECT id, username FROM users WHERE id != ?");
    $stmt->execute([$current_user_id]);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Chat App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style-chat.css">
</head>
<body>
    <div class="main-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h3>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h3>
                <?php if ($_SESSION['is_admin'] == 1): ?>
                    <a href="admin/index.php" style="color: #fff; background: #0056b3; padding: 2px 6px; border-radius: 4px;">Admin Panel</a>
                <?php endif; ?>
                <a href="index.php?action=logout">Logout</a>
            </div>
            <div class="user-list">
                <h4>Users</h4>
                <ul>
                    <?php foreach ($users as $user): ?>
                        <li>
                            <a href="#" data-user-id="<?php echo $user['id']; ?>">
                                <?php echo htmlspecialchars($user['username']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </aside>
        <main class="chat-area">
            <div class="no-chat-selected">
                <p>Select a user from the list on the left to start chatting.</p>
            </div>
        </main>
    </div>
    <script src="assets/js/chat.js"></script>
</body>
</html>
<?php
} // End of is_logged_in check
?>
