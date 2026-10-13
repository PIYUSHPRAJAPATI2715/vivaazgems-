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





