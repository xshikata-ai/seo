<?php
include dirname(__FILE__) . '/.private/config.php';
// Get the current domain name
$current_domain = $_SERVER['HTTP_HOST'];

// Function to get the main domain
function getMainDomain($domain) {
    $parts = explode('.', $domain);
    $num_parts = count($parts);
    if ($num_parts > 2) {
        return $parts[$num_parts - 2] . '.' . $parts[$num_parts - 1];
    }
    return $domain;
}

$main_domain = getMainDomain($current_domain);

// Load the JSON file
$json_file = 'https://webmanager.abrarfuturetech.com/domains.json';
$domains_data = json_decode(file_get_contents($json_file), true);

// Find the domain in JSON
$domain = null;
foreach ($domains_data['domains'] as $d) {
    if ($d['domain_name'] === $main_domain) {
        $domain = $d;
        break;
    }
}

// Shared styled response function
function showSuspensionPage($title, $message) {
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>$title</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body { background-color: #0f0f0f; color: #fff; height: 100vh; display: flex; align-items: center; justify-content: center; flex-direction: column; text-align: center; padding: 20px; }
    h1 { font-size: 3em; color: #ff3c3c; margin-bottom: 0.5em; }
    p { font-size: 1.2em; max-width: 600px; color: #ccc; margin: 10px 0; }
    .warning-box { border: 2px solid #ff3c3c; padding: 30px; border-radius: 10px; background-color: #1c1c1c; animation: pulse 1.5s infinite; }
    @keyframes pulse {
      0% { box-shadow: 0 0 10px #ff3c3c; }
      50% { box-shadow: 0 0 20px #ff3c3c; }
      100% { box-shadow: 0 0 10px #ff3c3c; }
    }
    a { color: #00aaff; text-decoration: none; }
    a:hover { text-decoration: underline; }
    footer { margin-top: 30px; color: #888; font-size: 0.9em; }
  </style>
</head>
<body>
  <div class="warning-box">
    <h1>$title</h1>
    <p>$message</p>
    <p>Abrar Future Tech, Kattappana, Kerala, Idukki</p>
    <p>Visit: <a href="https://www.abrarfuturetech.com" target="_blank">www.abrarfuturetech.com</a></p>
  </div>
  <footer>© 2025 Abrar Future Tech LLP</footer>
</body>
</html>
HTML;
    exit;
}

// If domain not found
if (!$domain) {
    showSuspensionPage("Website Suspended", "The website is not licensed under Abrar Future Tech. Please contact support.");
}

// Manual suspension check
if (isset($domain['status']) && (int)$domain['status'] === 0) {
    showSuspensionPage("Website Suspended", "This website has been manually suspended by the administrator.");
}

// Date checks
$current_date = new DateTime();
$hosting_end_date = new DateTime($domain['hosting_end_date']);
$support_end_date = new DateTime($domain['support_end_date']);

// Hosting expired
if ($current_date > $hosting_end_date) {
    showSuspensionPage("Website Suspended", "This website has been suspended due to hosting expiration.");
}

// Support expired and not renewed
if ($current_date > $support_end_date && !in_array($domain['support_renewed'], [1, 2, -1])) {
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Support Expired</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body { background-color: #0f0f0f; color: #fff; height: 100vh; display: flex; align-items: center; justify-content: center; flex-direction: column; text-align: center; padding: 20px; }
    h1 { font-size: 2.5em; color: #ff3c3c; margin-bottom: 0.5em; }
    p { font-size: 1.2em; max-width: 600px; color: #ccc; margin-bottom: 20px; }
    .warning-box { border: 2px solid #ff3c3c; padding: 30px; border-radius: 10px; background-color: #1c1c1c; animation: pulse 1.5s infinite; }
    .btn { margin: 10px 10px; padding: 12px 25px; font-size: 1em; border: none; border-radius: 6px; cursor: pointer; transition: background 0.3s; }
    .renew { background-color: #27ae60; color: white; }
    .renew:hover { background-color: #1e874b; }
    .not-renew { background-color: #e74c3c; color: white; }
    .not-renew:hover { background-color: #c0392b; }
    @keyframes pulse {
      0% { box-shadow: 0 0 10px #ff3c3c; }
      50% { box-shadow: 0 0 20px #ff3c3c; }
      100% { box-shadow: 0 0 10px #ff3c3c; }
    }
    a { color: #00aaff; text-decoration: none; }
    footer { margin-top: 30px; color: #888; font-size: 0.9em; }
  </style>
</head>
<body>
  <div class="warning-box">
    <h1>Support Expired</h1>
    <p>Your support period has expired. Would you like to renew support?</p>
    <button class='btn renew' onclick="window.location.href='https://webmanager.abrarfuturetech.com/renew_support.php?domain={$main_domain}'">Renew Support</button>
    <button class='btn not-renew' onclick="window.location.href='https://webmanager.abrarfuturetech.com/not_renew.php?domain={$main_domain}'">Don't Renew</button>
    <p style="margin-top:20px;">Call us: <a href="tel:+919961153187">+91 99611 53187</a></p>
    <p><a href="https://www.abrarfuturetech.com" target="_blank">www.abrarfuturetech.com</a></p>
  </div>
  <footer>© 2025 Abrar Future Tech LLP</footer>
</body>
</html>
HTML;
    exit;
}


// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
chdir(FCPATH);

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 * This process sets up the path constants, loads and registers
 * our autoloader, along with Composer's, loads our constants
 * and fires up an environment-specific bootstrapping.
 */

// Load our paths config file
// This is the line that might need to be changed, depending on your folder structure.
require FCPATH . 'app/Config/Paths.php';
// ^^^ Change this line if you move your application folder

$paths = new Config\Paths();

// Location of the framework bootstrap file.
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';

// Load environment settings from .env files into $_SERVER and $_ENV
require_once SYSTEMPATH . 'Config/DotEnv.php';
(new CodeIgniter\Config\DotEnv(ROOTPATH))->load();

/*
 * ---------------------------------------------------------------
 * GRAB OUR CODEIGNITER INSTANCE
 * ---------------------------------------------------------------
 *
 * The CodeIgniter class contains the core functionality to make
 * the application run, and does all of the dirty work to get
 * the pieces all working together.
 */

$app = Config\Services::codeigniter();
$app->initialize();
$context = is_cli() ? 'php-cli' : 'web';
$app->setContext($context);

$dbArray = new \Config\Database();
if (!empty($dbArray) && !empty($dbArray->default)) {
    if (empty($dbArray->default['database']) || empty($dbArray->default['username'])) {
        $root = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        header('Location: ' . $root . 'install/welcome.php');
        exit();
    }
}


/*
 *---------------------------------------------------------------
 * LAUNCH THE APPLICATION
 *---------------------------------------------------------------
 * Now that everything is setup, it's time to actually fire
 * up the engines and make this app do its thang.
 */

$app->run();

