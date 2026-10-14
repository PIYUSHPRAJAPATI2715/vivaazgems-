<?php
/**
 * Vivaaz Gems - Custom Default Page Template
 */

if (!defined('ABSPATH')) {
    exit;
}

$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

// 1. Cart Route Guard
if ((function_exists('is_cart') && is_cart()) || is_page('cart') || strpos($request_uri, '/cart') !== false) {
    include get_stylesheet_directory() . '/page-cart.php';
    return;
}

// 2. Checkout Route Guard
if ((function_exists('is_checkout') && is_checkout()) || is_page('checkout') || strpos($request_uri, '/checkout') !== false) {
    include get_stylesheet_directory() . '/page-checkout.php';
    return;
}

// 3. My Account Route Guard
if ((function_exists('is_account_page') && is_account_page()) || is_page('my-account') || strpos($request_uri, '/my-account') !== false) {
    include get_stylesheet_directory() . '/page-my-account.php';
    return;
}

// 4. Wishlist Route Guard
if (is_page('wishlist') || strpos($request_uri, '/wishlist') !== false) {
    include get_stylesheet_directory() . '/page-wishlist.php';
    return;
}

get_header('shop');
?>

<div class="generic-page-wrapper" style="background: var(--color-page-bg); padding: 40px 20px;">
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
        endif;
        ?>
    </div>
</div>

<?php
get_footer('shop');
