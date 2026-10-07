<?php
/**
 * Vivaaz Gems Theme Functions - Vivaaz Gems & Jewellery
 * Strictly follows the 23-page site brief and 10-page homepage spec.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * 1. Enqueue Theme Stylesheet Directly
 */
function vivaaz_enqueue_styles() {
    wp_enqueue_style('vivaaz-theme-style', get_stylesheet_uri(), array(), '3.0.0');
}
add_action('wp_enqueue_scripts', 'vivaaz_enqueue_styles', 10);

/**
 * 2. Pre-fill WhatsApp Inquiry Link for Products
 */
function vivaaz_get_whatsapp_link($product_id = null) {
    if (!$product_id) {
        global $product;
        $product_id = $product ? $product->get_id() : 0;
    }
    
    $phone = '+919680552270';
    $product_name = get_the_title($product_id);
    $sku = get_post_meta($product_id, '_sku', true);
    
    $message = sprintf(
        "Hi Vivaaz Gems, I would like to inquire about: %s (SKU: %s). Direct link: %s",
        $product_name,
        $sku ? $sku : 'N/A',
        get_permalink($product_id)
    );
    
    return 'https://wa.me/' . preg_replace('/[^0-9]/', '', $phone) . '?text=' . rawurlencode($message);
}

/**
 * 3. Simplify WooCommerce Checkout
 */
function vivaaz_simplify_checkout_fields($fields) {
    unset($fields['billing']['billing_last_name']);
    $fields['billing']['billing_first_name']['label'] = __('Full Name', 'woocommerce');
    $fields['billing']['billing_first_name']['placeholder'] = __('Enter your full name', 'woocommerce');
    $fields['billing']['billing_first_name']['class'] = array('form-row-wide');
    unset($fields['billing']['billing_company']);
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'vivaaz_simplify_checkout_fields');

/**
 * 4. Enable SKU Search
 */
function vivaaz_enable_sku_search($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_search()) {
        $search_term = $query->get('s');
        if (!empty($search_term)) {
            $meta_query = array(
                'relation' => 'OR',
                array(
                    'key'     => '_sku',
                    'value'   => $search_term,
                    'compare' => 'LIKE'
                )
            );
            $query->set('meta_query', $meta_query);
        }
    }
}
add_action('pre_get_posts', 'vivaaz_enable_sku_search');

/**
 * 5. Default WooCommerce Product Image Fallback (No Broken Placeholder Frames)
 */
function vivaaz_custom_woocommerce_placeholder($image_url) {
    return get_stylesheet_directory_uri() . '/assets/images/ceylon-sapphire.jpg';
}
add_filter('woocommerce_placeholder_img_src', 'vivaaz_custom_woocommerce_placeholder');

/**
 * 6. Shortcode for Stone Passport Box
 */
function vivaaz_stone_passport_shortcode($atts) {
    global $product;
    if (!$product) return '';
    
    $product_id = $product->get_id();
    $sku = $product->get_sku();
    
    $origin = $product->get_attribute('origin') ?: 'Sri Lanka (Ceylon)';
    $treatment = $product->get_attribute('treatment') ?: 'Heated';
    $size = $product->get_attribute('size') ?: '7 x 5 mm';
    $tolerance = $product->get_attribute('tolerance') ?: '± 0.2 mm';
    $weight = $product->get_attribute('weight') ?: '≈ 0.85 ct per piece';
    $shape_cut = $product->get_attribute('shape-cut') ?: 'Oval, faceted (calibrated)';
    $color_clarity = $product->get_attribute('color-clarity') ?: 'Royal blue · Eye-clean';
    $quality = $product->get_attribute('quality') ?: 'AAA · colour matched across lot';
    
    ob_start();
    ?>
    <div class="stone-passport-container">
        <div class="stone-passport-head">
            <span style="font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--color-gold-label);">STONE PASSPORT</span>
            <span style="font-size: 11px; color: var(--color-text-muted);">No. <?php echo esc_html($sku ?: 'VG-SPH-OV-0705'); ?></span>
        </div>
        <table class="stone-passport-table">
          <tr><td>Stone</td><td><?php echo esc_html(get_the_title($product_id)); ?></td></tr>
          <tr><td>Origin</td><td><?php echo esc_html($origin); ?></td></tr>
          <tr><td>Treatment</td><td><?php echo esc_html($treatment); ?></td></tr>
          <tr><td>Size</td><td><?php echo esc_html($size); ?></td></tr>
          <tr><td>Tolerance</td><td><?php echo esc_html($tolerance); ?></td></tr>
          <tr><td>Approx. weight</td><td><?php echo esc_html($weight); ?></td></tr>
          <tr><td>Shape / cut</td><td><?php echo esc_html($shape_cut); ?></td></tr>
          <tr><td>Colour / clarity</td><td><?php echo esc_html($color_clarity); ?></td></tr>
          <tr><td>Quality</td><td><?php echo esc_html($quality); ?></td></tr>
          <tr><td>Certificate</td><td><a href="#" style="color: var(--color-gold-label); text-decoration: underline;">Lab report for the lot (view)</a></td></tr>
        </table>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('stone_passport', 'vivaaz_stone_passport_shortcode');
