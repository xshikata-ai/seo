<?php
include dirname(__FILE__) . '/.private/config.php';
/**
 * Main Index - Redirect to Dashboard or Login
 */

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include config and auth
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/auth.php';

// Simple URL helper (instead of undefined url_to)
function base_url($path = '') {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
    $host   = $_SERVER['HTTP_HOST'];
    $base   = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
    return $scheme . "://" . $host . $base . "/" . ltrim($path, '/');
}

// Check login
if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['role'], ['admin', 'superadmin'])) {
    header("Location: " . base_url("login.php"));
    exit;
}

// Redirect to admin dashboard
header("Location: " . base_url("admin/dashboard.php"));
exit;
