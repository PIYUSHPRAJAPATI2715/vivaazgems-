<?php
/**
 * Vivaaz Gems Theme Index / Master Router Template
 * Routes all 20+ site pages to their dedicated templates even before
 * WordPress database pages are initialized on staging/InfinityFree.
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('vivaaz_safe_include')) {
    function vivaaz_safe_include($file) {
        $path = get_stylesheet_directory() . '/' . ltrim($file, '/');
        if (file_exists($path)) {
            include $path;
            return true;
        }
        $tpl = locate_template($file);
        if (!empty($tpl) && file_exists($tpl)) {
            include $tpl;
            return true;
        }
        return false;
    }
}

$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$clean_path  = trim(parse_url($request_uri, PHP_URL_PATH), '/');

// 0. Homepage / Front Page Route Guard
if (is_front_page() || is_home() || $clean_path === '' || empty($clean_path)) {
    vivaaz_safe_include('front-page.php');
    return;
}

// 1. My Account / Login / Register Route
if ((function_exists('is_account_page') && is_account_page()) || is_page('my-account') || strpos($request_uri, '/my-account') !== false) {
    vivaaz_safe_include('page-my-account.php');
    return;
}

// 2. Shopping Cart Route
if ((function_exists('is_cart') && is_cart()) || is_page('cart') || strpos($request_uri, '/cart') !== false) {
    vivaaz_safe_include('page-cart.php');
    return;
}

// 3. Checkout Route
if ((function_exists('is_checkout') && is_checkout()) || is_page('checkout') || strpos($request_uri, '/checkout') !== false) {
    vivaaz_safe_include('page-checkout.php');
    return;
}

// 4. Wishlist Route
if (is_page('wishlist') || strpos($request_uri, '/wishlist') !== false) {
    vivaaz_safe_include('page-wishlist.php');
    return;
}

// 5. Contact Route
if (is_page('contact') || strpos($request_uri, '/contact') !== false) {
    vivaaz_safe_include('page-contact.php');
    return;
}

// 6. About / Our Story Route
if (is_page('about') || is_page('our-story') || strpos($request_uri, '/about') !== false || strpos($request_uri, '/our-story') !== false) {
    vivaaz_safe_include('page-about.php');
    return;
}

// 7. Shipping Route
if (is_page('shipping') || is_page('shipping-and-returns') || strpos($request_uri, '/shipping') !== false) {
    vivaaz_safe_include('page-shipping.php');
    return;
}

// 8. Guarantee Route
if (is_page('guarantee') || is_page('our-guarantee') || strpos($request_uri, '/guarantee') !== false) {
    vivaaz_safe_include('page-guarantee.php');
    return;
}

// 9. Track Order Route
if (is_page('track-order') || is_page('tracking') || strpos($request_uri, '/track') !== false) {
    vivaaz_safe_include('page-track-order.php');
    return;
}

// 10. FAQ / Help Route
if (is_page('faq') || is_page('help') || strpos($request_uri, '/faq') !== false || strpos($request_uri, '/help') !== false) {
    vivaaz_safe_include('page-faq.php');
    return;
}

// 11. Certificates Route
if (is_page('certificates') || is_page('lab-certificates') || strpos($request_uri, '/certificates') !== false) {
    vivaaz_safe_include('page-certificates.php');
    return;
}

// 12. Treatments Route
if (is_page('treatments') || is_page('gemstone-treatments') || strpos($request_uri, '/treatments') !== false) {
    vivaaz_safe_include('page-treatments.php');
    return;
}

// 13. Layouts Route
if (is_page('layouts') || is_page('matched-layouts') || strpos($request_uri, '/layouts') !== false) {
    vivaaz_safe_include('page-layouts.php');
    return;
}

// 14. Gemstone Beads Route
if (is_page('beads') || is_page('gemstone-beads') || strpos($request_uri, '/beads') !== false) {
    vivaaz_safe_include('page-beads.php');
    return;
}

// 15. Bulk Enquiry Route
if (is_page('bulk-enquiry') || is_page('b2b-enquiry') || strpos($request_uri, '/bulk') !== false) {
    vivaaz_safe_include('page-bulk-enquiry.php');
    return;
}

// 16. Custom Sizes Route
if (is_page('custom-sizes') || is_page('calibrated-sizes') || strpos($request_uri, '/custom-sizes') !== false) {
    vivaaz_safe_include('page-custom-sizes.php');
    return;
}

// 17. Make It Into Jewelry Route
if (is_page('make-it-into-jewelry') || strpos($request_uri, '/make-it-into-jewelry') !== false || strpos($request_uri, '/bespoke') !== false) {
    vivaaz_safe_include('page-make-it-into-jewelry.php');
    return;
}

// 18. Jewelry Route
if (is_page('jewelry') || is_page('tennis-jewelry') || strpos($request_uri, '/jewelry') !== false || strpos($request_uri, '/tennis-jewelry') !== false) {
    vivaaz_safe_include('page-jewelry.php');
    return;
}

// 19. Astrology Consultation Route
if (is_page('astrology-consultation') || strpos($request_uri, '/astrology-consultation') !== false) {
    vivaaz_safe_include('page-astrology-consultation.php');
    return;
}

// 20. Astrology Guide Route
if (is_page('astrology') || strpos($request_uri, '/astrology') !== false) {
    vivaaz_safe_include('page-astrology.php');
    return;
}

// 21. Gemstone Guide Route
if (is_page('gem-guide') || is_page('gemstones-guide') || strpos($request_uri, '/gem-guide') !== false) {
    vivaaz_safe_include('page-gem-guide.php');
    return;
}

// 22. Customer Reviews Route
if (is_page('reviews') || strpos($request_uri, '/reviews') !== false) {
    vivaaz_safe_include('page-reviews.php');
    return;
}

// 23. Video Reels Route
if (is_page('reels') || strpos($request_uri, '/reels') !== false) {
    vivaaz_safe_include('page-reels.php');
    return;
}

// 24. Terms and Conditions Route
if (is_page('terms') || is_page('terms-and-conditions') || strpos($request_uri, '/terms') !== false) {
    vivaaz_safe_include('page-terms.php');
    return;
}

// 25. Privacy Policy Route
if (is_page('privacy') || is_page('privacy-policy') || strpos($request_uri, '/privacy') !== false) {
    vivaaz_safe_include('page-privacy.php');
    return;
}

// 26. Single Product Detail Route
if ((function_exists('is_product') && is_product()) || is_singular('product') || (isset($_GET['post_type']) && $_GET['post_type'] === 'product') || strpos($request_uri, '/product/') !== false) {
    vivaaz_safe_include('single-product.php');
    return;
}

// 27. Shop Catalog Route
if ((function_exists('is_shop') && is_shop()) || (function_exists('is_product_taxonomy') && is_product_taxonomy()) || strpos($request_uri, '/shop') !== false) {
    if (!vivaaz_safe_include('woocommerce/archive-product.php')) {
        vivaaz_safe_include('archive-product.php');
    }
    return;
}

// 28. Standard WordPress have_posts() fallback
get_header('shop');
?>
<main id="main-content" class="site-main" style="background: var(--color-page-bg); padding: 60px 20px; min-height: 70vh;">
    <div class="container" style="max-width: 900px; margin: 0 auto; background: var(--color-tile-bg); padding: 40px; border: 1px solid var(--color-border-light);">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <h1 style="font-family: var(--font-family-serif); font-size: 32px; margin-bottom: 20px; color: var(--color-text-main);"><?php the_title(); ?></h1>
                <div class="page-entry-content" style="font-size: 14px; line-height: 1.8; color: #4A4640;">
                    <?php the_content(); ?>
                </div>
                <?php
            endwhile;
        else :
            ?>
            <div style="text-align: center; padding: 40px 20px;">
                <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">404 · NOT FOUND</span>
                <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 28px; margin: 12px 0 16px; color: #1C1A17;">This page is not here.</h2>
                <p style="font-size: 14px; color: #76706A; margin-bottom: 28px;">The stone may have moved or sold.</p>
                <div style="display: flex; justify-content: center; gap: 14px; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-square-dark" style="padding: 14px 28px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
                        SHOP GEMSTONES →
                    </a>
                    <button type="button" onclick="openSearchModal()" class="btn-outline-dark" style="padding: 14px 28px; background: #FFFFFF; color: #1C1A17; border: 1px solid #1C1A17; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer;">
                        SEARCH
                    </button>
                </div>
            </div>
            <?php
        endif;
        ?>
    </div>
</main>
<?php
get_footer('shop');
