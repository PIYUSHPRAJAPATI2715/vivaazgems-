<?php
/**
 * Vivaaz Gems - Custom Simplified Checkout Template
 * Single Full Name field, clean address inputs, order review sidebar.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!isset($checkout) || !$checkout) {
    if (function_exists('WC') && WC()->checkout()) {
        $checkout = WC()->checkout();
    }
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ($checkout && method_exists($checkout, 'is_registration_enabled')) {
    if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
        echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
        return;
    }
}
?>

<div class="luxury-checkout-page-wrapper">
  
  <div class="checkout-page-header" style="text-align: center; margin-bottom: 30px;">
    <span class="section-tag-divider">CHECKOUT</span>
    <h1 class="font-serif" style="font-size: 32px; font-weight: 400; margin: 8px 0 4px;">Complete your <span class="font-italic text-gold">Order</span></h1>
    <p class="text-muted" style="font-size: 13px;">Fast, secure checkout with insured shipping and order tracking.</p>
  </div>

  <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout/')); ?>" enctype="multipart/form-data">

    <div class="checkout-layout-grid">

      <!-- Left Column: Billing Details -->
      <div class="checkout-billing-section">
        <?php if ($checkout && method_exists($checkout, 'get_checkout_fields') && $checkout->get_checkout_fields()) : ?>

          <?php do_action('woocommerce_checkout_before_customer_details'); ?>

          <div id="customer_details">
            <div class="billing-fields-box">
              <h3 class="checkout-section-title" style="font-size: 14px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 16px;">Shipping & Billing Address</h3>
              <?php do_action('woocommerce_checkout_billing'); ?>
            </div>

            <div class="shipping-fields-box" style="margin-top: 24px;">
              <?php do_action('woocommerce_checkout_shipping'); ?>
            </div>
          </div>

          <?php do_action('woocommerce_checkout_after_customer_details'); ?>

        <?php endif; ?>
      </div>

      <!-- Right Column: Order Review & Payment -->
      <div class="checkout-summary-section">
        <div class="checkout-order-card" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 28px;">
          <h3 id="order_review_heading" class="checkout-section-title" style="font-size: 14px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin: 0 0 16px; padding-bottom: 10px; border-bottom: 1px solid var(--color-border-light);">Your Selection</h3>

          <?php do_action('woocommerce_checkout_before_order_review'); ?>

          <div id="order_review" class="woocommerce-checkout-review-order">
            <?php do_action('woocommerce_checkout_order_review'); ?>
          </div>

          <?php do_action('woocommerce_checkout_after_order_review'); ?>

          <div class="checkout-whatsapp-optin" style="margin-top: 20px; padding: 14px; background: #FAF7F2; border-left: 3px solid var(--color-gold-label); font-size: 12px; line-height: 1.5;">
            💬 <strong>WhatsApp Updates:</strong> Receive tracking updates and lab certificate photos on WhatsApp (+91 96805 52270).
          </div>
        </div>
      </div>

    </div>

  </form>

</div>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
