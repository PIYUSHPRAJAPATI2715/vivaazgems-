<?php
/**
 * Vivaaz Gems - Luxury Navigation Menu for My Account
 */

if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_account_navigation');
$menu_items = function_exists('wc_get_account_menu_items') ? wc_get_account_menu_items() : array();
?>

<nav class="vivaaz-account-nav">
    <ul class="vivaaz-account-nav-list">
        <?php foreach ($menu_items as $endpoint => $label) : 
            $classes = function_exists('wc_get_account_menu_item_classes') ? wc_get_account_menu_item_classes($endpoint) : '';
            $url = function_exists('wc_get_account_endpoint_url') ? wc_get_account_endpoint_url($endpoint) : home_url('/my-account/');
        ?>
            <li class="vivaaz-nav-item <?php echo esc_attr($classes); ?>">
                <a href="<?php echo esc_url($url); ?>" class="vivaaz-nav-link">
                    <?php echo esc_html($label); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

<?php do_action('woocommerce_after_account_navigation'); ?>
