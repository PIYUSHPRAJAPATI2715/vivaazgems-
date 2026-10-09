<?php
/**
 * Vivaaz Gems - Luxury Logged In My Account Wrapper Template
 * Follows the Master Brief page 17 styling.
 */

if (!defined('ABSPATH')) {
    exit;
}

$current_user = wp_get_current_user();
$first_name = get_user_meta($current_user->ID, 'first_name', true) ?: $current_user->display_name;
?>

<div class="vivaaz-account-dashboard-wrapper">
    <!-- Header Hero Card for Logged In User -->
    <div class="vivaaz-account-hero-card">
        <div class="user-hero-left">
            <div class="user-avatar-badge">
                <?php echo esc_html(strtoupper(substr($first_name ?: 'V', 0, 1))); ?>
            </div>
            <div class="user-info-block">
                <span class="user-greeting-tag">WELCOME TO VIVAAZ GEMS</span>
                <h2 class="user-display-name">Hello, <?php echo esc_html($first_name); ?>!</h2>
                <p class="user-email-text"><?php echo esc_html($current_user->user_email); ?> · Registered Customer</p>
            </div>
        </div>
        <div class="account-hero-actions">
            <a href="<?php echo esc_url(wp_logout_url(home_url('/my-account/'))); ?>" class="btn-logout-hero">Sign Out / Logout →</a>
        </div>
    </div>

    <!-- Navigation & Content Layout Grid -->
    <div class="vivaaz-account-main-grid">
        <aside class="vivaaz-account-sidebar">
            <?php do_action('woocommerce_account_navigation'); ?>
        </aside>
        
        <main class="vivaaz-account-content">
            <?php
            if (function_exists('wc_print_notices')) {
                wc_print_notices();
            }
            do_action('woocommerce_account_content');
            ?>
        </main>
    </div>
</div>
