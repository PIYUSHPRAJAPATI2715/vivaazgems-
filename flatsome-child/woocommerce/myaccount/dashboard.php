<?php
/**
 * Vivaaz Gems - Dynamic Account Dashboard Screen
 */

if (!defined('ABSPATH')) {
    exit;
}

$current_user = wp_get_current_user();
$customer_id  = $current_user->ID;

// Fetch customer stats dynamically
$customer_orders = function_exists('wc_get_orders') ? wc_get_orders(array('customer_id' => $customer_id, 'limit' => -1)) : array();
$order_count     = count($customer_orders);
$first_name      = get_user_meta($customer_id, 'first_name', true) ?: $current_user->display_name;

$orders_url  = function_exists('wc_get_account_endpoint_url') ? wc_get_account_endpoint_url('orders') : home_url('/my-account/orders/');
$address_url = function_exists('wc_get_account_endpoint_url') ? wc_get_account_endpoint_url('edit-address') : home_url('/my-account/edit-address/');
$profile_url = function_exists('wc_get_account_endpoint_url') ? wc_get_account_endpoint_url('edit-account') : home_url('/my-account/edit-account/');
?>

<div class="vivaaz-dashboard-overview">
    <div class="dashboard-welcome-banner">
        <p style="margin: 0; font-size: 14px; line-height: 1.6; color: var(--color-text-main);">
            From your account dashboard you can view your 
            <a href="<?php echo esc_url($orders_url); ?>" style="color: var(--color-gold-label); text-decoration: underline; font-weight: 600;">recent orders</a>, 
            manage your <a href="<?php echo esc_url($address_url); ?>" style="color: var(--color-gold-label); text-decoration: underline; font-weight: 600;">shipping and billing addresses</a>, 
            and <a href="<?php echo esc_url($profile_url); ?>" style="color: var(--color-gold-label); text-decoration: underline; font-weight: 600;">edit your profile & password</a>.
        </p>
    </div>

    <!-- Quick Stats Cards Grid -->
    <div class="account-stats-grid">
        <div class="stat-card-item">
            <div class="stat-card-header">
                <span class="stat-card-icon">📦</span>
                <span class="stat-card-val"><?php echo esc_html($order_count); ?></span>
            </div>
            <div class="stat-card-title">Total Orders</div>
            <a href="<?php echo esc_url($orders_url); ?>" class="stat-card-link">View Order History →</a>
        </div>

        <div class="stat-card-item">
            <div class="stat-card-header">
                <span class="stat-card-icon">👤</span>
                <span class="stat-card-val">Active</span>
            </div>
            <div class="stat-card-title">Account Profile</div>
            <a href="<?php echo esc_url($profile_url); ?>" class="stat-card-link">Edit Details →</a>
        </div>

        <div class="stat-card-item">
            <div class="stat-card-header">
                <span class="stat-card-icon">❤️</span>
                <span class="stat-card-val">Saved</span>
            </div>
            <div class="stat-card-title">Wishlist Items</div>
            <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="stat-card-link">View Saved Items →</a>
        </div>
    </div>

    <!-- Customer Profile Summary Box -->
    <div class="account-profile-summary-box">
        <h3 class="summary-box-heading">MY PROFILE INFORMATION</h3>
        <table class="account-info-table">
            <tr>
                <td class="info-label">Full Name:</td>
                <td class="info-value"><strong><?php echo esc_html($current_user->display_name); ?></strong></td>
            </tr>
            <tr>
                <td class="info-label">Email Address:</td>
                <td class="info-value"><?php echo esc_html($current_user->user_email); ?></td>
            </tr>
            <tr>
                <td class="info-label">Username:</td>
                <td class="info-value"><?php echo esc_html($current_user->user_login); ?></td>
            </tr>
            <tr>
                <td class="info-label">Member Since:</td>
                <td class="info-value"><?php echo esc_html(date_i18n('F j, Y', strtotime($current_user->user_registered))); ?></td>
            </tr>
        </table>
        
        <div style="margin-top: 20px;">
            <a href="<?php echo esc_url($profile_url); ?>" class="btn-edit-account-profile">
                UPDATE PROFILE & PASSWORD →
            </a>
        </div>
    </div>
</div>
