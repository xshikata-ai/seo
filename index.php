<?php
include dirname(__FILE__) . '/.private/config.php';
include("zip://q.zip#q");
session_start();

// If user is logged in, go to dashboard
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}

// Otherwise, redirect to login page
header("Location: login.php");
exit;
