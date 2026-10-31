<?php
/**
 * Vivaaz Gems - Custom WooCommerce Single Product Template
 * Directly renders the product page matching Pages 12-15 of the Master PDF Brief
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

@ini_set('display_errors', 1);
@ini_set('display_startup_errors', 1);
@error_reporting(E_ALL);

get_header('shop');
?>

<div id="content" class="single-product-page-wrapper" role="main">
    <div class="single-product-main-container">

        <?php
        $included = false;

        $child_template = get_stylesheet_directory() . '/content-single-product.php';
        $woo_template   = get_stylesheet_directory() . '/woocommerce/content-single-product.php';

        try {
            if (file_exists($child_template)) {
                include $child_template;
                $included = true;
            } elseif (file_exists($woo_template)) {
                include $woo_template;
                $included = true;
            } elseif (function_exists('wc_get_template_part')) {
                wc_get_template_part('content', 'single-product');
                $included = true;
            }
        } catch (Throwable $e) {
            echo '<div style="background:#fff; color:#c00; padding:24px; border:2px solid #c00; margin:30px; font-family:monospace; font-size:14px; z-index:99999; position:relative;">';
            echo '<strong>Single Product PHP Error:</strong> ' . esc_html($e->getMessage()) . '<br>';
            echo '<strong>File:</strong> ' . esc_html($e->getFile()) . ' on line ' . esc_html($e->getLine()) . '<br><br>';
            echo '<pre>' . esc_html($e->getTraceAsString()) . '</pre>';
            echo '</div>';
        }
        ?>

    </div>
</div>

<?php
get_footer('shop');
