<?php
/**
 * Vivaaz Gems Theme Index Template
 */

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
