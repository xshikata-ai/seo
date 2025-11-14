<?php
include dirname(__FILE__) . '/.private/config.php';
/**
 * Pivot CRM - Root Index (Auto-redirect)
 * Redirects visitors to appropriate page based on login status
 */

// Start session to check if user is logged in
session_start();

// If user is logged in, redirect to their role dashboard
if (isset($_SESSION['user_id']) && isset($_SESSION['role'])) {
    $role = strtolower($_SESSION['role']);
    
    // Redirect to role-specific dashboard
    switch ($role) {
        case 'super admin':
            header('Location: superadmin/dashboard');
            break;
        case 'admin':
            header('Location: admin/dashboard');
            break;
        case 'consultant':
            header('Location: consultant/dashboard');
            break;
        case 'accountant':
            header('Location: accountant/dashboard');
            break;
        case 'reception':
        case 'receptionist':
            header('Location: reception/dashboard');
            break;
        case 'operations':
            header('Location: operations/dashboard');
            break;
        case 'it':
            header('Location: it/dashboard');
            break;
        default:
            // Unknown role, redirect to login
            header('Location: login');
            break;
    }
    exit;
}

// If not logged in, redirect to login page
header('Location: login');
exit;
?>
