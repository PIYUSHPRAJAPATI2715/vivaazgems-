<?php
/**
 * Vivaaz Gems - Custom Checkout Page Template
 * Follows Page 17 of the Master PDF Brief
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header('shop');
?>

<div class="checkout-page-outer-wrapper" style="background: var(--color-page-bg); padding: 40px 20px; min-height: 70vh;">
    <div class="container" style="max-width: 1100px; margin: 0 auto;">
        <?php
        if (function_exists('wc_print_notices')) {
            wc_print_notices();
        }

        $checkout = (function_exists('WC') && WC()->checkout()) ? WC()->checkout() : null;

        if (function_exists('WC') && WC()->cart && WC()->cart->is_empty()) {
            echo '<div style="text-align: center; padding: 60px 20px;">';
            echo '<h2 style="font-family: var(--font-family-serif); font-size: 26px; margin-bottom: 16px;">Your shopping bag is empty</h2>';
            echo '<p style="font-size: 13px; color: var(--color-text-muted); margin-bottom: 24px;">Add loose gemstones or jewelry to your shopping bag before proceeding to checkout.</p>';
            echo '<a href="' . esc_url(home_url('/shop/')) . '" class="btn-square-dark" style="padding: 12px 24px; background: #1A1A1A; color: #fff; text-decoration: none; font-size: 11px; font-weight: 700; text-transform: uppercase;">EXPLORE GEMSTONES →</a>';
            echo '</div>';
        } else {
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            else :
                if (function_exists('wc_get_template')) {
                    wc_get_template('checkout/form-checkout.php', array('checkout' => $checkout));
                } else {
                    $template = locate_template('woocommerce/checkout/form-checkout.php');
                    if ($template) include $template;
                }
            endif;
        }
        ?>
    </div>
</div>

<?php
get_footer('shop');
