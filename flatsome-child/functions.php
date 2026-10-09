<?php
/**
 * Vivaaz Gems Theme Functions - Vivaaz Gems & Jewellery
 * Strictly follows the 23-page site brief and 10-page homepage spec.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * 1. Enqueue Theme Stylesheet Directly with High Priority
 */
function vivaaz_enqueue_styles() {
    wp_enqueue_style('flatsome-style', get_template_directory_uri() . '/style.css', array(), '3.20.11');
    wp_enqueue_style('vivaaz-theme-style', get_stylesheet_uri(), array('flatsome-style'), '4.0.0');
}
add_action('wp_enqueue_scripts', 'vivaaz_enqueue_styles', 9999);

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
    if (isset($fields['billing']['billing_last_name'])) {
        unset($fields['billing']['billing_last_name']);
    }
    if (isset($fields['billing']['billing_first_name'])) {
        $fields['billing']['billing_first_name']['label'] = 'Full Name';
        $fields['billing']['billing_first_name']['placeholder'] = 'Enter your full name';
        $fields['billing']['billing_first_name']['class'] = array('form-row-wide');
    }
    if (isset($fields['billing']['billing_company'])) {
        unset($fields['billing']['billing_company']);
    }
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
 * 5. Dynamic Helper: Robust Image Path Lookup (Theme Assets -> Uploads Fallback)
 */
function vivaaz_get_img_url($filename) {
    // 1. Check child theme assets folder
    $theme_file = get_stylesheet_directory() . '/assets/images/' . $filename;
    if (file_exists($theme_file)) {
        return get_stylesheet_directory_uri() . '/assets/images/' . $filename;
    }
    // 2. Check WordPress uploads base directory
    $upload_dir = wp_upload_dir();
    if (file_exists($upload_dir['basedir'] . '/' . $filename)) {
        return $upload_dir['baseurl'] . '/' . $filename;
    }
    // 3. Check 2026/10 dated uploads folder
    if (file_exists($upload_dir['basedir'] . '/2026/10/' . $filename)) {
        return $upload_dir['baseurl'] . '/2026/10/' . $filename;
    }
    // 4. Default URL fallback to theme assets folder
    return get_stylesheet_directory_uri() . '/assets/images/' . $filename;
}

function vivaaz_custom_woocommerce_placeholder($image_url) {
    return vivaaz_get_img_url('ceylon-sapphire.jpg');
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

/**
 * 7. Custom Registration & Account Handler (Full Name, Password + Confirm Password, DB Sync, Redirect to Dashboard)
 */
add_filter('option_woocommerce_enable_myaccount_registration', '__return_true');
add_filter('option_woocommerce_registration_generate_password', '__return_false');
add_filter('option_woocommerce_registration_generate_username', '__return_true');

// Auto-populate username from email if missing
add_action('wp_loaded', 'vivaaz_prepare_registration_fields', 5);
function vivaaz_prepare_registration_fields() {
    if (isset($_POST['register']) && !empty($_POST['email']) && empty($_POST['username'])) {
        $_POST['username'] = sanitize_user(current(explode('@', $_POST['email'])), true);
    }
}

function vivaaz_validate_extra_register_fields($errors, $username, $email) {
    if (isset($_POST['account_first_name']) && empty(trim($_POST['account_first_name']))) {
        $errors->add('error_account_first_name', __('<strong>Error</strong>: Please enter your full name.', 'woocommerce'));
    }
    if (isset($_POST['password']) && isset($_POST['password_confirm'])) {
        if ($_POST['password'] !== $_POST['password_confirm']) {
            $errors->add('error_password_mismatch', __('<strong>Error</strong>: Passwords do not match. Please enter matching passwords.', 'woocommerce'));
        }
    }
    return $errors;
}
add_filter('woocommerce_process_registration_errors', 'vivaaz_validate_extra_register_fields', 10, 3);

function vivaaz_save_extra_register_fields($customer_id) {
    if (isset($_POST['account_first_name']) && !empty($_POST['account_first_name'])) {
        $full_name  = sanitize_text_field($_POST['account_first_name']);
        $name_parts = explode(' ', $full_name, 2);
        $first_name = $name_parts[0];
        $last_name  = isset($name_parts[1]) ? $name_parts[1] : '';

        wp_update_user(array(
            'ID'           => $customer_id,
            'first_name'   => $first_name,
            'last_name'    => $last_name,
            'display_name' => $full_name,
        ));
        update_user_meta($customer_id, 'billing_first_name', $first_name);
        update_user_meta($customer_id, 'billing_last_name', $last_name);
        update_user_meta($customer_id, 'shipping_first_name', $first_name);
        update_user_meta($customer_id, 'shipping_last_name', $last_name);
    }
}
add_action('woocommerce_created_customer', 'vivaaz_save_extra_register_fields');

function vivaaz_registration_redirect($redirect) {
    return home_url('/my-account/');
}
add_filter('woocommerce_registration_redirect', 'vivaaz_registration_redirect');
add_filter('woocommerce_login_redirect', 'vivaaz_registration_redirect');

/**
 * 8. Permanently Disable WooCommerce Coming Soon / Maintenance Mode Blocking
 */
add_filter('option_woocommerce_coming_soon', '__return_false');
add_filter('option_woocommerce_store_pages_only', '__return_false');
add_filter('pre_option_woocommerce_coming_soon', '__return_false');
add_filter('pre_option_woocommerce_store_pages_only', '__return_false');

/**
 * 9. Allow Mobile Phones on Same Wi-Fi to View Site via Computer IP
 */
if (isset($_SERVER['HTTP_HOST']) && preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $_SERVER['HTTP_HOST'])) {
    $current_ip_url = 'http://' . $_SERVER['HTTP_HOST'];
    add_filter('option_siteurl', function() use ($current_ip_url) { return $current_ip_url; });
    add_filter('option_home', function() use ($current_ip_url) { return $current_ip_url; });
}

/**
 * 10. Dynamic Helper: Get Real Single Product Detail Page URL (Prevents attachment zip download)
 */
function vivaaz_get_sample_product_url() {
    if (function_exists('wc_get_products')) {
        $products = wc_get_products(array(
            'limit'  => 1,
            'status' => 'publish',
            'return' => 'ids',
        ));
        if (!empty($products) && is_array($products)) {
            return get_permalink($products[0]);
        }
    }
    $posts = get_posts(array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'fields'         => 'ids',
    ));
    if (!empty($posts) && is_array($posts)) {
        return get_permalink($posts[0]);
    }
    return home_url('/product/ceylon-blue-sapphire-7x5mm/');
}





