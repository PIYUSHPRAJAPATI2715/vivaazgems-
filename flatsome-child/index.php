<?php
/**
 * Vivaaz Gems Theme Index / Master Router Template
 */

if (!defined('ABSPATH')) {
    exit;
}

$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

// 1. My Account / Login Route
if ((function_exists('is_account_page') && is_account_page()) || is_page('my-account') || strpos($request_uri, '/my-account/') !== false) {
    include locate_template('page-my-account.php');
    return;
}

// 2. Shopping Cart Route
if ((function_exists('is_cart') && is_cart()) || is_page('cart') || strpos($request_uri, '/cart/') !== false) {
    include locate_template('page-cart.php');
    return;
}

// 3. Checkout Route
if ((function_exists('is_checkout') && is_checkout()) || is_page('checkout') || strpos($request_uri, '/checkout/') !== false) {
    include locate_template('page-checkout.php');
    return;
}

// 4. Wishlist Route
if (is_page('wishlist') || strpos($request_uri, '/wishlist/') !== false) {
    include locate_template('page-wishlist.php');
    return;
}

// 5. Contact Route
if (is_page('contact') || strpos($request_uri, '/contact/') !== false) {
    include locate_template('page-contact.php');
    return;
}

// 6. About Route
if (is_page('about') || is_page('our-story') || strpos($request_uri, '/about/') !== false || strpos($request_uri, '/our-story/') !== false) {
    include locate_template('page-about.php');
    return;
}

// 7. Single Product Detail Route
if ((function_exists('is_product') && is_product()) || is_singular('product') || (isset($_GET['post_type']) && $_GET['post_type'] === 'product') || strpos($request_uri, '/product/') !== false) {
    include locate_template('single-product.php');
    return;
}

// 8. Shop Catalog Route
if ((function_exists('is_shop') && is_shop()) || (function_exists('is_product_taxonomy') && is_product_taxonomy()) || strpos($request_uri, '/shop/') !== false) {
    include locate_template('woocommerce/archive-product.php');
    return;
}

// 9. Generic Page Fallback
get_header('shop');
?>
<main id="main-content" class="site-main" style="background: var(--color-page-bg); padding: 40px 20px;">
    <div class="container" style="max-width: 1100px; margin: 0 auto; background: var(--color-tile-bg); padding: 30px; border: 1px solid var(--color-border-light);">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <h1 style="font-family: var(--font-family-serif); font-size: 28px; margin-bottom: 20px; color: var(--color-text-main);"><?php the_title(); ?></h1>
                <div class="page-entry-content">
                    <?php the_content(); ?>
                </div>
                <?php
            endwhile;
        else :
            echo '<p>Page content coming soon.</p>';
        endif;
        ?>
    </div>
</main>
<?php
get_footer('shop');
