<?php
/**
 * Vivaaz Gems Theme Functions - Vivaaz Gems & Jewellery
 * Strictly follows the 23-page site brief.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * 1. Enqueue Theme Stylesheet Directly
 */
function vivaaz_enqueue_styles() {
    wp_enqueue_style('vivaaz-theme-style', get_stylesheet_uri(), array(), '1.0.1');
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
 * 5. Shortcode for Stone Passport Box
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
    <div class="stone-passport-box">
        <div class="stone-passport-header">
            <span class="stone-passport-title">Stone Passport</span>
            <span class="stone-passport-sku">No. <?php echo esc_html($sku ?: 'VG-SPH-OV-0705'); ?></span>
        </div>
        <div class="stone-passport-grid">
            <div class="stone-passport-label">Stone</div>
            <div class="stone-passport-value"><?php echo esc_html(get_the_title($product_id)); ?></div>
            
            <div class="stone-passport-label">Origin</div>
            <div class="stone-passport-value"><?php echo esc_html($origin); ?></div>
            
            <div class="stone-passport-label">Treatment</div>
            <div class="stone-passport-value"><?php echo esc_html($treatment); ?></div>
            
            <div class="stone-passport-label">Size</div>
            <div class="stone-passport-value"><?php echo esc_html($size); ?></div>
            
            <div class="stone-passport-label">Tolerance</div>
            <div class="stone-passport-value"><?php echo esc_html($tolerance); ?></div>
            
            <div class="stone-passport-label">Approx. Weight</div>
            <div class="stone-passport-value"><?php echo esc_html($weight); ?></div>
            
            <div class="stone-passport-label">Shape / Cut</div>
            <div class="stone-passport-value"><?php echo esc_html($shape_cut); ?></div>
            
            <div class="stone-passport-label">Colour / Clarity</div>
            <div class="stone-passport-value"><?php echo esc_html($color_clarity); ?></div>
            
            <div class="stone-passport-label">Quality</div>
            <div class="stone-passport-value"><?php echo esc_html($quality); ?></div>
            
            <div class="stone-passport-label">Certificate</div>
            <div class="stone-passport-value"><a href="#cert-modal" style="color: #C59B27; text-decoration: underline;">Lab report for the lot (view)</a></div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('stone_passport', 'vivaaz_stone_passport_shortcode');
