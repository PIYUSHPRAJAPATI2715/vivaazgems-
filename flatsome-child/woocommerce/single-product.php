<?php
/**
 * Vivaaz Gems - Custom WooCommerce Single Product Template
 * Directly renders the product page matching Pages 12-15 of the Master PDF Brief
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop');
?>

<div id="content" class="single-product-page-wrapper" role="main" style="background: var(--color-page-bg); padding: 40px 20px;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">

        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                if (function_exists('wc_get_template_part')) {
                    wc_get_template_part('content', 'single-product');
                } else {
                    include locate_template('woocommerce/content-single-product.php');
                }
            endwhile;
        else :
            if (function_exists('wc_get_template_part')) {
                wc_get_template_part('content', 'single-product');
            } else {
                include locate_template('woocommerce/content-single-product.php');
            }
        endif;
        ?>

    </div>
</div>

<?php
get_footer('shop');
