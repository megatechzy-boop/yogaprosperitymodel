<?php
/**
 * Yoga Prosperity Model - Site Configuration
 * ---------------------------------------------------------
 * IMPORTANT: Fill in your real database details below after
 * creating the database in cPanel > MySQL Databases.
 * ---------------------------------------------------------
 */

// ----- DATABASE SETTINGS (edit these) -----
define('DB_HOST', 'localhost');
define('DB_NAME', 'yogaprosp_admin');      // Database name created in phpMyAdmin
define('DB_USER', 'root');                // Default XAMPP MySQL username
define('DB_PASS', '');                    // Default XAMPP MySQL password (empty)

// ----- SITE SETTINGS -----
define('SITE_URL', 'http://localhost/ypm-admin-system');

// Fallback notification email used if a landing page doesn't set its own.
// You said you'll create a dedicated inbox for this - put it here.
define('DEFAULT_NOTIFY_EMAIL', 'leads@yogaprosperitymodel.com');

// "From" address used when the system sends emails (should match your domain
// to avoid spam folders - e.g. noreply@yogaprosperitymodel.com)
define('MAIL_FROM_EMAIL', 'noreply@yogaprosperitymodel.com');
define('MAIL_FROM_NAME', 'Yoga Prosperity Model');

// ----- DO NOT EDIT BELOW THIS LINE -----
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
