<?php
/**
 * Vivaaz Gems - Custom Checkout Page Template
 * Follows Page 17 of the Master PDF Brief
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header('shop');
?>

<div class="checkout-page-outer-wrapper" style="background: var(--color-page-bg); padding: 40px 20px; min-height: 70vh;">
    <div class="container" style="max-width: 1100px; margin: 0 auto;">
        <?php
        if (function_exists('wc_print_notices')) {
            wc_print_notices();
        }

        $checkout = (function_exists('WC') && WC()->checkout()) ? WC()->checkout() : null;

        if (function_exists('WC') && WC()->cart && WC()->cart->is_empty()) {
            ?>
            <div id="checkout-empty-state" style="text-align: center; padding: 60px 20px;">
                <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 26px; margin-bottom: 16px;">Your shopping bag is empty</h2>
                <p style="font-size: 13px; color: #76706A; margin-bottom: 24px;">Add loose gemstones or jewelry to your shopping bag before proceeding to checkout.</p>
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-square-dark" style="padding: 12px 24px; background: #1C1A17; color: #fff; text-decoration: none; font-size: 11px; font-weight: 700; text-transform: uppercase;">EXPLORE GEMSTONES →</a>
            </div>
            <script>
            // Check if local storage has items and sync immediately
            try {
                var saved = JSON.parse(localStorage.getItem('vivaaz_local_cart') || '[]');
                if (saved && saved.length > 0) {
                    var emptyState = document.getElementById('checkout-empty-state');
                    if (emptyState) emptyState.innerHTML = '<p style="font-size: 14px; color: #9C7C4C;">Restoring your selection...</p>';
                    fetch('/wp-admin/admin-ajax.php?action=vivaaz_sync_cart', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: 'items=' + encodeURIComponent(JSON.stringify(saved))
                    }).then(function() {
                        window.location.reload();
                    });
                }
            } catch(e) {}
            </script>
            <?php
        } else {
            $rendered = '';
            if (have_posts()) {
                ob_start();
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
                $rendered = trim(ob_get_clean());
            }

            if (!empty($rendered) && strlen(strip_tags($rendered)) > 20) {
                echo $rendered;
            } else {
                $chk_file = get_stylesheet_directory() . '/woocommerce/checkout/form-checkout.php';
                if (file_exists($chk_file)) {
                    include $chk_file;
                } elseif (function_exists('wc_get_template')) {
                    wc_get_template('checkout/form-checkout.php', array('checkout' => $checkout));
                } else {
                    $template = locate_template('woocommerce/checkout/form-checkout.php');
                    if (!empty($template) && file_exists($template)) include $template;
                }
            }
        }
        ?>
    </div>
</div>

<?php
get_footer('shop');
