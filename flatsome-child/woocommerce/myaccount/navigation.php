<?php
/**
 * Vivaaz Gems - Luxury Navigation Menu for My Account
 */

if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_account_navigation');
?>

<nav class="vivaaz-account-nav">
    <ul class="vivaaz-account-nav-list">
        <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
            <li class="vivaaz-nav-item <?php echo wc_get_account_menu_item_classes($endpoint); ?>">
                <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" class="vivaaz-nav-link">
                    <?php echo esc_html($label); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

<?php do_action('woocommerce_after_account_navigation'); ?>
