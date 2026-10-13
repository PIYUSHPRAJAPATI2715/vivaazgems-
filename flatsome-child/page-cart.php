<?php
/**
 * Vivaaz Gems - Custom WooCommerce Cart Page Template
 * Matches Page 16 of the Master PDF Brief
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header('shop');
?>

<div class="cart-page-wrapper" style="background: var(--color-page-bg); padding: 40px 20px; min-height: 70vh;">
    <div class="container" style="max-width: 1100px; margin: 0 auto;">
        <?php
        if (function_exists('wc_print_notices')) {
            wc_print_notices();
        }

        $cart_file = get_stylesheet_directory() . '/woocommerce/cart/cart.php';
        if (file_exists($cart_file)) {
            include $cart_file;
        } elseif (function_exists('wc_get_template')) {
            wc_get_template('cart/cart.php');
        } else {
            $template = locate_template('woocommerce/cart/cart.php');
            if (!empty($template) && file_exists($template)) include $template;
        }
        ?>
    </div>
</div>

<?php
get_footer('shop');
