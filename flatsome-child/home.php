<?php
/**
 * Vivaaz Gems - Home Template
 * Ensures the Vivaaz Gems luxury homepage loads under all WordPress Reading settings.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (file_exists(get_stylesheet_directory() . '/front-page.php')) {
    include get_stylesheet_directory() . '/front-page.php';
} else {
    get_header('shop');
    get_footer('shop');
}
