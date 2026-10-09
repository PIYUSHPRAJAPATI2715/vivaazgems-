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

        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        else :
            if (function_exists('wc_get_template')) {
                wc_get_template('checkout/form-checkout.php');
            } else {
                $template = locate_template('woocommerce/checkout/form-checkout.php');
                if ($template) include $template;
            }
        endif;
        ?>
    </div>
</div>

<?php
get_footer('shop');
