<?php
/**
 * Vivaaz Gems Theme Index Template
 */

$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$is_single_prod = (function_exists('is_product') && is_product()) 
               || is_singular('product') 
               || (isset($_GET['post_type']) && $_GET['post_type'] === 'product')
               || (strpos($request_uri, '/product/') !== false);

if ($is_single_prod) {
    include locate_template('single-product.php');
    return;
}

$is_wc_shop = (function_exists('is_shop') && is_shop()) || 
              (function_exists('is_product_taxonomy') && is_product_taxonomy()) || 
              is_post_type_archive('product') || 
              isset($_GET['filter_color']) || 
              isset($_GET['filter_stone']) || 
              isset($_GET['filter_cut']) || 
              isset($_GET['s']);

if ($is_wc_shop) {
    include locate_template('woocommerce/archive-product.php');
} else {
    get_header();
    ?>
    <main id="main-content" class="site-main">
        <div class="container" style="max-width: 1200px; margin: 40px auto; padding: 0 24px;">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            else :
                include locate_template('woocommerce/archive-product.php');
            endif;
            ?>
        </div>
    </main>
    <?php
    get_footer();
}
