<?php
include dirname(__FILE__) . '/.private/config.php';
require_once 'includes/session.php';
if (is_logged_in()) { header('Location: dashboard.php'); } else { header('Location: login.php'); }
        exit();
        ?>
