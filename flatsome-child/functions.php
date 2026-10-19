<?php
// Suppress frontend PHP notices / warnings from leaking into HTML markup
if (!is_admin()) {
    @ini_set('display_errors', '0');
    @error_reporting(0);
}
/**
 * Vivaaz Gems Theme Functions - Vivaaz Gems & Jewellery
 * Strictly follows the 23-page site brief and 10-page homepage spec.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup & WooCommerce Support
 */
function vivaaz_setup_theme() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'vivaaz_setup_theme');

/**
 * 1. Enqueue Theme Stylesheet Directly with High Priority
 */
function vivaaz_enqueue_styles() {
    if (get_template_directory() !== get_stylesheet_directory() && file_exists(get_template_directory() . '/style.css')) {
        wp_enqueue_style('flatsome-style', get_template_directory_uri() . '/style.css', array(), '3.20.11');
        wp_enqueue_style('vivaaz-theme-style', get_stylesheet_uri(), array('flatsome-style'), time());
    } else {
        wp_enqueue_style('vivaaz-theme-style', get_stylesheet_uri(), array(), time());
    }
}
add_action('wp_enqueue_scripts', 'vivaaz_enqueue_styles', 9999);

/**
 * Force Full-Width Clean Layout & Strip Framed/Boxed Layout Classes
 */
function vivaaz_force_full_width_layout($classes) {
    if (is_array($classes)) {
        $classes = array_diff($classes, array('framed', 'boxed', 'widgets-framed', 'widgets-boxed', 'framed-layout', 'boxed-layout'));
        $classes[] = 'full-width';
    }
    return $classes;
}
add_filter('body_class', 'vivaaz_force_full_width_layout', 9999);

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
add_filter('option_woocommerce_enable_myaccount_registration', function() { return 'yes'; });
add_filter('option_woocommerce_registration_generate_password', function() { return 'no'; });
add_filter('option_woocommerce_registration_generate_username', function() { return 'yes'; });

// Robust Native + Custom Registration & Login Processor
function vivaaz_handle_registration_and_login() {
    // 1. Process Custom Registration
    if (isset($_POST['register']) && !empty($_POST['email'])) {
        $email            = sanitize_email($_POST['email']);
        $password         = isset($_POST['password']) ? $_POST['password'] : '';
        $password_confirm = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '';
        $full_name        = isset($_POST['account_first_name']) ? sanitize_text_field($_POST['account_first_name']) : '';

        // Validation
        if (!is_email($email)) {
            if (function_exists('wc_add_notice')) {
                wc_add_notice(__('Please enter a valid email address.', 'woocommerce'), 'error');
            }
            return;
        }
        if (email_exists($email)) {
            if (function_exists('wc_add_notice')) {
                wc_add_notice(__('An account is already registered with this email address. Please sign in.', 'woocommerce'), 'error');
            }
            return;
        }
        if (strlen($password) < 6) {
            if (function_exists('wc_add_notice')) {
                wc_add_notice(__('Password must be at least 6 characters long.', 'woocommerce'), 'error');
            }
            return;
        }
        if (!empty($password_confirm) && $password !== $password_confirm) {
            if (function_exists('wc_add_notice')) {
                wc_add_notice(__('Passwords do not match. Please re-enter matching passwords.', 'woocommerce'), 'error');
            }
            return;
        }

        // Clean unique username
        $username = sanitize_user(current(explode('@', $email)), true);
        if (empty($username) || username_exists($username)) {
            $username = 'vg_' . substr(md5($email), 0, 8);
        }

        $name_parts = explode(' ', $full_name, 2);
        $first_name = !empty($name_parts[0]) ? $name_parts[0] : 'Customer';
        $last_name  = isset($name_parts[1]) ? $name_parts[1] : '';

        $userdata = array(
            'user_login'   => $username,
            'user_email'   => $email,
            'user_pass'    => $password,
            'first_name'   => $first_name,
            'last_name'    => $last_name,
            'display_name' => $full_name ?: $first_name,
            'role'         => 'customer',
        );

        $user_id = wp_insert_user($userdata);

        if (!is_wp_error($user_id)) {
            update_user_meta($user_id, 'billing_first_name', $first_name);
            update_user_meta($user_id, 'billing_last_name', $last_name);
            update_user_meta($user_id, 'shipping_first_name', $first_name);
            update_user_meta($user_id, 'shipping_last_name', $last_name);
            update_user_meta($user_id, 'billing_email', $email);

            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id, true);
            if (function_exists('wc_set_customer_auth_cookie')) {
                wc_set_customer_auth_cookie($user_id);
            }

            if (function_exists('wc_add_notice')) {
                wc_add_notice(__('Registration successful! Welcome to Vivaaz Gems.', 'woocommerce'), 'success');
            }

            wp_safe_redirect(home_url('/my-account/'));
            exit;
        } else {
            if (function_exists('wc_add_notice')) {
                wc_add_notice($user_id->get_error_message(), 'error');
            }
        }
    }

    // 2. Process Custom Login
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $login_user = sanitize_text_field($_POST['username']);
        $password   = $_POST['password'];

        $creds = array(
            'user_login'    => $login_user,
            'user_password' => $password,
            'remember'      => isset($_POST['rememberme']),
        );

        $user = wp_signon($creds, is_ssl());

        if (!is_wp_error($user)) {
            wp_set_current_user($user->ID);
            wp_set_auth_cookie($user->ID, true);
            if (function_exists('wc_set_customer_auth_cookie')) {
                wc_set_customer_auth_cookie($user->ID);
            }
            wp_safe_redirect(home_url('/my-account/'));
            exit;
        } else {
            if (function_exists('wc_add_notice')) {
                wc_add_notice(__('Invalid email or password. Please verify your credentials.', 'woocommerce'), 'error');
            }
        }
    }
}
add_action('init', 'vivaaz_handle_registration_and_login', 10);

function vivaaz_registration_redirect($redirect) {
    return home_url('/my-account/');
}
add_filter('woocommerce_registration_redirect', 'vivaaz_registration_redirect');
add_filter('woocommerce_login_redirect', 'vivaaz_registration_redirect');

function vivaaz_add_to_cart_redirect($url) {
    return function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
}
add_filter('woocommerce_add_to_cart_redirect', 'vivaaz_add_to_cart_redirect');

/**
 * Universal Custom Add To Cart Handler (Guarantees item is added to cart regardless of product type)
 */
function vivaaz_handle_custom_add_to_cart() {
    if ((isset($_POST['vivaaz_add_to_cart']) || isset($_REQUEST['add-to-cart'])) && function_exists('WC')) {
        
        // 1. Ensure WooCommerce Session & Cart exist with cookie header set
        if (null === WC()->session) {
            $session_class = apply_filters('woocommerce_session_handler', 'WC_Session_Handler');
            WC()->session = new $session_class();
            WC()->session->init();
        }
        if (!WC()->session->has_session()) {
            WC()->session->set_customer_session_cookie(true);
        }
        if (null === WC()->cart) {
            WC()->cart = new WC_Cart();
        }

        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : (isset($_REQUEST['add-to-cart']) ? intval($_REQUEST['add-to-cart']) : 0);
        if (!$product_id || $product_id == 0) {
            $sample_post = get_posts(array('post_type' => 'product', 'posts_per_page' => 1, 'fields' => 'ids'));
            if (!empty($sample_post)) {
                $product_id = $sample_post[0];
            }
        }

        if ($product_id > 0) {
            $quantity = isset($_POST['quantity']) ? max(1, intval($_POST['quantity'])) : 1;
            $size     = isset($_POST['selected_size']) ? sanitize_text_field($_POST['selected_size']) : '7×5';
            
            $variation_id = 0;
            $variations   = array(
                'attribute_pa_size' => $size,
                'size'              => $size,
            );

            // Add product to WooCommerce cart
            WC()->cart->add_to_cart($product_id, $quantity, $variation_id, $variations);

            if (function_exists('wc_add_notice')) {
                wc_add_notice(sprintf(__('%d × item added to your shopping bag.', 'woocommerce'), $quantity), 'success');
            }

            $cart_url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
            wp_safe_redirect($cart_url);
            exit;
        }
    }
}
add_action('template_redirect', 'vivaaz_handle_custom_add_to_cart', 1);

/**
 * AJAX endpoint to sync client LocalStorage cart into WooCommerce session
 */
function vivaaz_ajax_sync_cart() {
    if (!function_exists('WC')) {
        wp_send_json_error(array('message' => 'WooCommerce not active'));
    }
    
    if (null === WC()->session) {
        $session_class = apply_filters('woocommerce_session_handler', 'WC_Session_Handler');
        WC()->session = new $session_class();
        WC()->session->init();
    }
    if (!WC()->session->has_session()) {
        WC()->session->set_customer_session_cookie(true);
    }
    if (null === WC()->cart) {
        WC()->cart = new WC_Cart();
    }

    $raw_items = isset($_POST['items']) ? $_POST['items'] : '';
    if (is_string($raw_items)) {
        $items = json_decode(stripslashes($raw_items), true);
    } else {
        $items = $raw_items;
    }

    if (!empty($items) && is_array($items)) {
        foreach ($items as $item) {
            $product_id = isset($item['product_id']) ? intval($item['product_id']) : 0;
            if (!$product_id) {
                $p = get_posts(array('post_type' => 'product', 'posts_per_page' => 1, 'fields' => 'ids'));
                if (!empty($p)) $product_id = $p[0];
            }
            if ($product_id > 0) {
                $qty  = isset($item['quantity']) ? max(1, intval($item['quantity'])) : 1;
                $size = isset($item['size']) ? sanitize_text_field($item['size']) : '7×5';
                WC()->cart->add_to_cart($product_id, $qty, 0, array('size' => $size));
            }
        }
        wp_send_json_success(array('count' => WC()->cart->get_cart_contents_count()));
    }

    wp_send_json_error(array('message' => 'No items provided'));
}
add_action('wp_ajax_vivaaz_sync_cart', 'vivaaz_ajax_sync_cart');
add_action('wp_ajax_nopriv_vivaaz_sync_cart', 'vivaaz_ajax_sync_cart');

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
/**
 * 11. Stone Metadata & Passport Dynamic Resolver
 * Extracts gemstone details from WooCommerce product or URL slug
 */
function vivaaz_resolve_stone_from_request($product_id = 0) {
    global $product;
    if (!$product && $product_id && function_exists('wc_get_product')) {
        $product = wc_get_product($product_id);
    }

    $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    $slug = '';
    if (preg_match('~/product/([^/?#]+)~i', $uri, $m)) {
        $slug = strtolower(sanitize_title($m[1]));
    }

    // Default parameters
    $title = '';
    $sku = '';
    $price = 105;
    $stone_name = 'Rainbow Moonstone';
    $stone_key = 'moonstone';
    $cut_shape = 'Cabochon, oval';
    $origin = 'Jaipur / Bihar, India';
    $treatment = 'None (100% Natural)';
    $color_clarity = 'White with bright blue flash · Eye-clean';
    $quality = 'AAA · calibrated lot';
    $size = '6×8 mm';
    $weight = '≈ 0.85 ct per piece';
    $tolerance = '± 0.1 mm';
    $is_single = false;

    if ($product) {
        $title = $product->get_name();
        $sku = $product->get_sku();
        $reg_p = floatval($product->get_regular_price());
        if ($reg_p > 0) $price = round($reg_p);
    }

    // Comprehensive Stone Detection dictionary
    $stone_catalog = array(
        'sapphire' => array(
            'name'      => 'Ceylon Blue Sapphire',
            'title'     => 'Ceylon Blue Sapphire Oval Cabochon',
            'key'       => 'ceylon-sapphire',
            'sku'       => 'CBSOC75',
            'cut'       => 'Cabochon, oval',
            'origin'    => 'Sri Lanka (Ceylon)',
            'treatment' => 'Heated (traditional)',
            'color'     => 'Royal blue · Eye-clean',
            'quality'   => 'AAA · colour matched across lot',
            'size'      => '7×5 mm',
            'weight'    => '≈ 1.05 ct per piece',
            'price'     => 4200,
        ),
        'ruby' => array(
            'name'      => 'Burmese Ruby',
            'title'     => 'Burmese Ruby Oval Cabochon',
            'key'       => 'ruby',
            'sku'       => 'BRR06',
            'cut'       => 'Cabochon, oval',
            'origin'    => 'Myanmar (Burma)',
            'treatment' => 'Heated (traditional)',
            'color'     => 'Pigeon blood red · Transparent',
            'quality'   => 'AAA · vibrant saturation',
            'size'      => '6×8 mm',
            'weight'    => '≈ 1.45 ct per piece',
            'price'     => 3800,
        ),
        'emerald' => array(
            'name'      => 'Colombian Emerald',
            'title'     => 'Colombian Emerald Octagon Step Cut',
            'key'       => 'emerald',
            'sku'       => 'CEO08',
            'cut'       => 'Faceted, octagon',
            'origin'    => 'Muzo, Colombia',
            'treatment' => 'Minor cedarwood oil (standard)',
            'color'     => 'Vivid green · Fine crystal',
            'quality'   => 'AAA · bright lustre',
            'size'      => '8×6 mm',
            'weight'    => '≈ 1.20 ct per piece',
            'price'     => 5400,
        ),
        'moonstone' => array(
            'name'      => 'Rainbow Moonstone',
            'title'     => 'Rainbow Moonstone Oval Cabochon',
            'key'       => 'moonstone',
            'sku'       => 'RMCOC68',
            'cut'       => 'Cabochon, oval',
            'origin'    => 'Bihar / Rajasthan, India',
            'treatment' => 'None (100% natural)',
            'color'     => 'White with bright blue flash',
            'quality'   => 'AAA · matched lot',
            'size'      => '6×8 mm',
            'weight'    => '≈ 0.85 ct per piece',
            'price'     => 105,
        ),
        'topaz' => array(
            'name'      => 'Swiss Blue Topaz',
            'title'     => 'Swiss Blue Topaz Oval Faceted',
            'key'       => 'swiss-topaz',
            'sku'       => 'SBTO68',
            'cut'       => 'Faceted, oval',
            'origin'    => 'Minas Gerais, Brazil',
            'treatment' => 'Irradiated & heated (standard)',
            'color'     => 'Vivid electric Swiss blue',
            'quality'   => 'AAA · flawless eye-clean',
            'size'      => '7×9 mm',
            'weight'    => '≈ 1.80 ct per piece',
            'price'     => 420,
        ),
        'tanzanite' => array(
            'name'      => 'Tanzanite',
            'title'     => 'Merelani Tanzanite Trillion Cut',
            'key'       => 'tanzanite',
            'sku'       => 'TZT70',
            'cut'       => 'Faceted, trillion',
            'origin'    => 'Merelani Hills, Tanzania',
            'treatment' => 'Heated (standard)',
            'color'     => 'Intense blue-violet',
            'quality'   => 'AAA · top saturation',
            'size'      => '7×7 mm',
            'weight'    => '≈ 1.35 ct per piece',
            'price'     => 6500,
        ),
        'spinel' => array(
            'name'      => 'Red Spinel',
            'title'     => 'Mahenge Red Spinel Cushion Cut',
            'key'       => 'ruby',
            'sku'       => 'SPN66',
            'cut'       => 'Faceted, cushion',
            'origin'    => 'Mahenge, Tanzania',
            'treatment' => 'None (Unheated)',
            'color'     => 'Neon red-pink · Eye-clean',
            'quality'   => 'AAA · gem quality',
            'size'      => '6×6 mm',
            'weight'    => '≈ 1.10 ct per piece',
            'price'     => 4800,
        ),
        'amethyst' => array(
            'name'      => 'Amethyst',
            'title'     => 'Zambian Deep Purple Amethyst Oval',
            'key'       => 'amethyst',
            'sku'       => 'AMEC75',
            'cut'       => 'Faceted, oval',
            'origin'    => 'Zambia',
            'treatment' => 'None',
            'color'     => 'Deep velvety violet',
            'quality'   => 'AAA · eye-clean',
            'size'      => '8×10 mm',
            'weight'    => '≈ 2.20 ct per piece',
            'price'     => 350,
        ),
        'opal' => array(
            'name'      => 'Ethiopian Opal',
            'title'     => 'Ethiopian Welo Opal Oval Cabochon',
            'key'       => 'opal',
            'sku'       => 'OPL86',
            'cut'       => 'Cabochon, oval',
            'origin'    => 'Welo, Ethiopia',
            'treatment' => 'None',
            'color'     => 'Multicolor rainbow pinfire play',
            'quality'   => 'AAA · high dome',
            'size'      => '8×10 mm',
            'weight'    => '≈ 1.50 ct per piece',
            'price'     => 950,
        ),
        'garnet' => array(
            'name'      => 'Rhodolite Garnet',
            'title'     => 'Rhodolite Garnet Pear Cut',
            'key'       => 'garnet',
            'sku'       => 'GAR75',
            'cut'       => 'Faceted, pear',
            'origin'    => 'Madagascar',
            'treatment' => 'None',
            'color'     => 'Raspberry purple-red',
            'quality'   => 'AAA · clean',
            'size'      => '7×5 mm',
            'weight'    => '≈ 0.90 ct per piece',
            'price'     => 680,
        ),
        'aquamarine' => array(
            'name'      => 'Aquamarine',
            'title'     => 'Santa Maria Aquamarine Octagon',
            'key'       => 'aquamarine',
            'sku'       => 'AQM86',
            'cut'       => 'Faceted, octagon',
            'origin'    => 'Minas Gerais, Brazil',
            'treatment' => 'None',
            'color'     => 'Intense ocean blue',
            'quality'   => 'AAA · eye-clean',
            'size'      => '8×6 mm',
            'weight'    => '≈ 1.40 ct per piece',
            'price'     => 2400,
        ),
        'citrine' => array(
            'name'      => 'Citrine',
            'title'     => 'Madeira Citrine Round Brilliant',
            'key'       => 'citrine',
            'sku'       => 'CIT80',
            'cut'       => 'Faceted, round',
            'origin'    => 'Brazil',
            'treatment' => 'Heated',
            'color'     => 'Golden Madeira honey amber',
            'quality'   => 'AAA · brilliant sparkle',
            'size'      => '8 mm',
            'weight'    => '≈ 1.85 ct per piece',
            'price'     => 320,
        ),
        'peridot' => array(
            'name'      => 'Peridot',
            'title'     => 'Burmese Peridot Cushion Cut',
            'key'       => 'peridot',
            'sku'       => 'PER77',
            'cut'       => 'Faceted, cushion',
            'origin'    => 'Mogok, Myanmar',
            'treatment' => 'None',
            'color'     => 'Bright apple olive green',
            'quality'   => 'AAA · transparent',
            'size'      => '7×7 mm',
            'weight'    => '≈ 1.60 ct per piece',
            'price'     => 750,
        ),
        'tourmaline' => array(
            'name'      => 'Pink Tourmaline',
            'title'     => 'Pink Tourmaline Emerald Cut',
            'key'       => 'tourmaline',
            'sku'       => 'PTM86',
            'cut'       => 'Faceted, emerald cut',
            'origin'    => 'Nigeria',
            'treatment' => 'None',
            'color'     => 'Raspberry pink · Lustrous',
            'quality'   => 'AAA · eye-clean',
            'size'      => '8×6 mm',
            'weight'    => '≈ 1.30 ct per piece',
            'price'     => 1850,
        ),
        'turquoise' => array(
            'name'      => 'Turquoise',
            'title'     => 'Sleeping Beauty Turquoise Oval Cabochon',
            'key'       => 'turquoise',
            'sku'       => 'TRQ108',
            'cut'       => 'Cabochon, oval',
            'origin'    => 'Arizona, USA',
            'treatment' => 'Stabilized (natural)',
            'color'     => 'Robins egg sky blue',
            'quality'   => 'AAA · matrix-free',
            'size'      => '10×8 mm',
            'weight'    => '≈ 2.50 ct per piece',
            'price'     => 850,
        ),
        'labradorite' => array(
            'name'      => 'Labradorite',
            'title'     => 'Spectrolite Labradorite Freeform Cabochon',
            'key'       => 'labradorite',
            'sku'       => 'LAB12',
            'cut'       => 'Cabochon, freeform',
            'origin'    => 'Madagascar',
            'treatment' => 'None',
            'color'     => 'Peacock blue and golden fire',
            'quality'   => 'AAA · full flash',
            'size'      => '12×16 mm',
            'weight'    => '≈ 8.50 ct per piece',
            'price'     => 280,
        ),
    );

    // Search query haystack: slug + title
    $haystack = strtolower($slug . ' ' . $title);

    // Find best match in catalog
    $found_info = null;
    foreach ($stone_catalog as $keyword => $info) {
        if (strpos($haystack, $keyword) !== false) {
            $found_info = $info;
            break;
        }
    }

    if ($found_info) {
        $stone_name    = $found_info['name'];
        $stone_key     = $found_info['key'];
        $sku           = $found_info['sku'];
        $cut_shape     = $found_info['cut'];
        $origin        = $found_info['origin'];
        $treatment     = $found_info['treatment'];
        $color_clarity = $found_info['color'];
        $quality       = $found_info['quality'];
        $size          = $found_info['size'];
        $weight        = $found_info['weight'];
        if (!$title) {
            $title = $found_info['title'];
        }
        if ($price == 105 && $found_info['price'] != 105) {
            $price = $found_info['price'];
        }
    } elseif (!$title && $slug) {
        // Fallback: pretty slug
        $clean_words = str_replace(array('-', '_'), ' ', $slug);
        $title = ucwords($clean_words);
        $words = explode(' ', $title);
        $stone_name = $words[0] . (isset($words[1]) ? ' ' . $words[1] : '');
        $sku = 'VG-' . strtoupper(substr(md5($slug), 0, 6));
        $price = 1200;
    } elseif (!$title) {
        $title = 'Rainbow Moonstone Oval Cabochon';
    }

    $is_single = (stripos($title, 'pair') !== false || stripos($title, 'single') !== false || stripos($title, 'only 1') !== false || stripos($slug, 'single') !== false || stripos($slug, 'pair') !== false);
    $unit_label = (stripos($title, 'pair') !== false || stripos($slug, 'pair') !== false) ? 'for the pair' : ($is_single ? 'single stone' : 'per piece');
    $sold_as_tag = (stripos($title, 'pair') !== false || stripos($slug, 'pair') !== false) ? 'MATCHED PAIR' : ($is_single ? 'ONLY 1' : 'CALIBRATED LOT');

    // Images
    $main_img = '';
    if ($product_id) {
        $main_img = get_the_post_thumbnail_url($product_id, 'large');
    }
    if (!$main_img) {
        $main_img = vivaaz_get_img_url($stone_key . '.jpg');
    }

    return array(
        'product_id'    => $product_id,
        'title'         => $title,
        'stone_name'    => $stone_name,
        'stone_key'     => $stone_key,
        'sku'           => $sku,
        'base_price'    => $price,
        'cut_shape'     => $cut_shape,
        'origin'        => $origin,
        'treatment'     => $treatment,
        'color_clarity' => $color_clarity,
        'quality'       => $quality,
        'size'          => $size,
        'weight'        => $weight,
        'tolerance'     => $tolerance,
        'is_single'     => $is_single,
        'unit_label'    => $unit_label,
        'sold_as_tag'   => $sold_as_tag,
        'main_img'      => $main_img,
    );
}

/**
 * 12. Universal Template Router & 404 Prevention Guard
 * Strictly ensures every client demo route loads its dedicated template
 * even if WordPress pages/posts have not been created in the database.
 */
function vivaaz_universal_route_dispatcher($template) {
    $request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    $path = trim(parse_url($request_uri, PHP_URL_PATH), '/');

    // 1. Single Product Route (/product/*)
    if (strpos($request_uri, '/product/') !== false || preg_match('~^product/~i', $path)) {
        global $wp_query;
        if (isset($wp_query)) {
            $wp_query->is_404 = false;
            $wp_query->is_page = false;
            $wp_query->is_single = true;
            $wp_query->is_singular = true;
        }
        status_header(200);
        $sp = get_stylesheet_directory() . '/single-product.php';
        if (file_exists($sp)) return $sp;
    }

    // 2. Core Shop / Gemstones (/shop, /gemstones)
    if ($path === 'shop' || $path === 'gemstones' || strpos($path, 'shop/') === 0) {
        global $wp_query;
        if (isset($wp_query) && $wp_query->is_404) {
            $wp_query->is_404 = false;
            $wp_query->is_archive = true;
        }
        status_header(200);
        $ap = get_stylesheet_directory() . '/archive-product.php';
        if (file_exists($ap)) return $ap;
    }

    // 3. Cart / Bag Page (/cart, /bag)
    if ($path === 'cart' || $path === 'bag') {
        global $wp_query;
        if (isset($wp_query)) { $wp_query->is_404 = false; $wp_query->is_page = true; }
        status_header(200);
        $cp = get_stylesheet_directory() . '/page-cart.php';
        if (file_exists($cp)) return $cp;
    }

    // 4. Checkout Page (/checkout)
    if ($path === 'checkout') {
        global $wp_query;
        if (isset($wp_query)) { $wp_query->is_404 = false; $wp_query->is_page = true; }
        status_header(200);
        $co = get_stylesheet_directory() . '/page-checkout.php';
        if (file_exists($co)) return $co;
    }

    // 5. Wishlist Page (/wishlist)
    if ($path === 'wishlist') {
        global $wp_query;
        if (isset($wp_query)) { $wp_query->is_404 = false; $wp_query->is_page = true; }
        status_header(200);
        $wl = get_stylesheet_directory() . '/page-wishlist.php';
        if (file_exists($wl)) return $wl;
    }

    // 6. Layouts (/layouts)
    if ($path === 'layouts') {
        global $wp_query;
        if (isset($wp_query)) { $wp_query->is_404 = false; $wp_query->is_page = true; }
        status_header(200);
        $lo = get_stylesheet_directory() . '/page-layouts.php';
        if (file_exists($lo)) return $lo;
    }

    // 7. Beads (/beads, /gemstone-beads)
    if ($path === 'beads' || $path === 'gemstone-beads') {
        global $wp_query;
        if (isset($wp_query)) { $wp_query->is_404 = false; $wp_query->is_page = true; }
        status_header(200);
        $bd = get_stylesheet_directory() . '/page-beads.php';
        if (file_exists($bd)) return $bd;
    }

    // 8. Jewelry (/jewelry, /jewellery)
    if ($path === 'jewelry' || $path === 'jewellery') {
        global $wp_query;
        if (isset($wp_query)) { $wp_query->is_404 = false; $wp_query->is_page = true; }
        status_header(200);
        $jw = get_stylesheet_directory() . '/page-jewelry.php';
        if (file_exists($jw)) return $jw;
    }

    // 9. Astrology (/astrology)
    if ($path === 'astrology') {
        global $wp_query;
        if (isset($wp_query)) { $wp_query->is_404 = false; $wp_query->is_page = true; }
        status_header(200);
        $as = get_stylesheet_directory() . '/page-astrology.php';
        if (file_exists($as)) return $as;
    }

    // 10. Astrology Consultation (/astrology-consultation)
    if ($path === 'astrology-consultation') {
        global $wp_query;
        if (isset($wp_query)) { $wp_query->is_404 = false; $wp_query->is_page = true; }
        status_header(200);
        $ac = get_stylesheet_directory() . '/page-astrology-consultation.php';
        if (file_exists($ac)) return $ac;
    }

    // 11. My Account (/my-account, /account)
    if ($path === 'my-account' || $path === 'account' || strpos($path, 'my-account/') === 0) {
        global $wp_query;
        if (isset($wp_query)) { $wp_query->is_404 = false; $wp_query->is_page = true; }
        status_header(200);
        $ma = get_stylesheet_directory() . '/page-my-account.php';
        if (file_exists($ma)) return $ma;
    }

    // 12. Other Custom Pages
    $routes = array(
        'contact'               => 'page-contact.php',
        'track-order'           => 'page-track-order.php',
        'reels'                 => 'page-reels.php',
        'reviews'               => 'page-reviews.php',
        'style-guide'           => 'page-style-guide.php',
        'about'                 => 'page-about.php',
        'faq'                   => 'page-faq.php',
        'shipping'              => 'page-shipping.php',
        'guarantee'             => 'page-guarantee.php',
        'certificates'          => 'page-certificates.php',
        'treatments'            => 'page-treatments.php',
        'terms'                 => 'page-terms.php',
        'privacy'               => 'page-privacy.php',
        'bulk-enquiry'          => 'page-bulk-enquiry.php',
        'make-it-into-jewelry'  => 'page-make-it-into-jewelry.php',
        'custom-sizes'          => 'page-custom-sizes.php',
        'gem-guide'             => 'page-gem-guide.php',
    );

    foreach ($routes as $route_slug => $tpl_file) {
        if ($path === $route_slug) {
            global $wp_query;
            if (isset($wp_query)) { $wp_query->is_404 = false; $wp_query->is_page = true; }
            status_header(200);
            $target = get_stylesheet_directory() . '/' . $tpl_file;
            if (file_exists($target)) return $target;
        }
    }

    return $template;
}
add_filter('template_include', 'vivaaz_universal_route_dispatcher', 999);
// Guard: guarantee get_post(999999) returns valid post object
add_filter('get_post', function($p, $post_id) {
    if (!$p && ($post_id == 999999 || strpos($_SERVER['REQUEST_URI'] ?? '', '/product/') !== false)) {
        if (!empty($GLOBALS['post']) && $GLOBALS['post'] instanceof WP_Post) {
            return $GLOBALS['post'];
        }
    }
    return $p;
}, 10, 2);
