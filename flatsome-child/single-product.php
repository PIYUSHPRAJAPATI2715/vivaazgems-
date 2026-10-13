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

<div id="content" class="single-product-page-wrapper" role="main">
    <div class="single-product-main-container">

        <?php
        $included = false;

        // 1. Prioritize child theme content-single-product.php
        $child_template = get_stylesheet_directory() . '/content-single-product.php';
        $woo_template   = get_stylesheet_directory() . '/woocommerce/content-single-product.php';

        if (file_exists($child_template)) {
            include $child_template;
            $included = true;
        } elseif (file_exists($woo_template)) {
            include $woo_template;
            $included = true;
        } elseif (function_exists('wc_get_template_part')) {
            wc_get_template_part('content', 'single-product');
            $included = true;
        } else {
            $located = locate_template(array('content-single-product.php', 'woocommerce/content-single-product.php'));
            if (!empty($located) && file_exists($located)) {
                include $located;
                $included = true;
            }
        }
        ?>

    </div>
</div>

<?php
get_footer('shop');
