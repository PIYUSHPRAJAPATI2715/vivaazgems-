<?php
/**
 * Vivaaz Gems - Custom Shopping Cart Page Template
 * Follows Page 17 of the Master PDF Brief
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header('shop');
?>

<div class="cart-page-outer-wrapper" style="background: var(--color-page-bg); padding: 40px 20px; min-height: 70vh;">
    <div class="container" style="max-width: 1100px; margin: 0 auto;">
        <?php
        if (function_exists('wc_print_notices')) {
            wc_print_notices();
        }

        if (function_exists('wc_get_template')) {
            wc_get_template('cart/cart.php');
        } else {
            $template = locate_template('woocommerce/cart/cart.php');
            if ($template) include $template;
        }
        ?>
    </div>
</div>

<?php
get_footer('shop');
