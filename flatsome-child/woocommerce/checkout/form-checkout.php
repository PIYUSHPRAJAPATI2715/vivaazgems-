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

        <?php else : ?>

          <div id="customer_details">
            <div class="billing-fields-box">
              <h3 class="checkout-section-title" style="font-size: 14px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 16px;">Shipping & Billing Address</h3>
              <div style="display: flex; flex-direction: column; gap: 14px;">
                <div>
                  <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">Full Name <span style="color: red;">*</span></label>
                  <input type="text" name="billing_first_name" required placeholder="Enter full name" style="width: 100%; padding: 10px 12px; border: 1px solid var(--color-border-light); font-size: 13px;" />
                </div>
                <div>
                  <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">Company / Studio Name (optional)</label>
                  <input type="text" name="billing_company" placeholder="Jeweler / Workshop name" style="width: 100%; padding: 10px 12px; border: 1px solid var(--color-border-light); font-size: 13px;" />
                </div>
                <div>
                  <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">Street Address <span style="color: red;">*</span></label>
                  <input type="text" name="billing_address_1" required placeholder="House number, building, street" style="width: 100%; padding: 10px 12px; border: 1px solid var(--color-border-light); font-size: 13px; margin-bottom: 6px;" />
                  <input type="text" name="billing_address_2" placeholder="Apartment, suite, unit (optional)" style="width: 100%; padding: 10px 12px; border: 1px solid var(--color-border-light); font-size: 13px;" />
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                  <div>
                    <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">Town / City <span style="color: red;">*</span></label>
                    <input type="text" name="billing_city" required placeholder="City" style="width: 100%; padding: 10px 12px; border: 1px solid var(--color-border-light); font-size: 13px;" />
                  </div>
                  <div>
                    <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">State / Province <span style="color: red;">*</span></label>
                    <input type="text" name="billing_state" required placeholder="State" style="width: 100%; padding: 10px 12px; border: 1px solid var(--color-border-light); font-size: 13px;" />
                  </div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                  <div>
                    <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">PIN / Postcode <span style="color: red;">*</span></label>
                    <input type="text" name="billing_postcode" required placeholder="Postcode" style="width: 100%; padding: 10px 12px; border: 1px solid var(--color-border-light); font-size: 13px;" />
                  </div>
                  <div>
                    <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">Country <span style="color: red;">*</span></label>
                    <input type="text" name="billing_country" required value="India" placeholder="Country" style="width: 100%; padding: 10px 12px; border: 1px solid var(--color-border-light); font-size: 13px;" />
                  </div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                  <div>
                    <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">Phone (WhatsApp) <span style="color: red;">*</span></label>
                    <input type="tel" name="billing_phone" required placeholder="Mobile number" style="width: 100%; padding: 10px 12px; border: 1px solid var(--color-border-light); font-size: 13px;" />
                  </div>
                  <div>
                    <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">Email address <span style="color: red;">*</span></label>
                    <input type="email" name="billing_email" required placeholder="Email" style="width: 100%; padding: 10px 12px; border: 1px solid var(--color-border-light); font-size: 13px;" />
                  </div>
                </div>
                <div>
                  <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">Order Notes (optional)</label>
                  <textarea name="order_comments" rows="3" placeholder="Notes about your order, e.g. special cuts, certificate request, delivery instructions." style="width: 100%; padding: 10px 12px; border: 1px solid var(--color-border-light); font-size: 13px;"></textarea>
                </div>
              </div>
            </div>
          </div>

        <?php endif; ?>
      </div>

      <!-- Right Column: Order Review & Payment -->
      <div class="checkout-summary-section">
        <div class="checkout-order-card" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 28px;">
          <h3 id="order_review_heading" class="checkout-section-title" style="font-size: 14px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin: 0 0 16px; padding-bottom: 10px; border-bottom: 1px solid var(--color-border-light);">Your Selection</h3>

          <?php do_action('woocommerce_checkout_before_order_review'); ?>

          <div id="order_review" class="woocommerce-checkout-review-order">
            <?php
            ob_start();
            do_action('woocommerce_checkout_order_review');
            $review_html = ob_get_clean();
            if (!empty(trim($review_html))) {
                echo $review_html;
            } else {
                ?>
                <table class="shop_table woocommerce-checkout-review-order-table" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                  <thead>
                    <tr style="border-bottom: 1px solid var(--color-border-light);">
                      <th style="text-align: left; padding: 10px 0; font-size: 11px; text-transform: uppercase;">Product</th>
                      <th style="text-align: right; padding: 10px 0; font-size: 11px; text-transform: uppercase;">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody id="checkout-review-tbody">
                    <tr style="border-bottom: 1px solid var(--color-border-light);">
                      <td style="padding: 12px 0; font-size: 13px;">Rainbow Moonstone Oval Cabochon (6×8 mm × 12 pcs)</td>
                      <td style="padding: 12px 0; font-size: 13px; text-align: right; font-weight: 600;">₹ 1,260</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr style="border-bottom: 1px solid var(--color-border-light);">
                      <th style="padding: 10px 0; font-size: 12px; text-align: left;">Shipping</th>
                      <td style="padding: 10px 0; font-size: 12px; text-align: right; color: #1E9E52; font-weight: 600;">Free / Insured Express</td>
                    </tr>
                    <tr>
                      <th style="padding: 14px 0; font-size: 14px; text-align: left;">Total</th>
                      <td style="padding: 14px 0; font-size: 16px; text-align: right; font-weight: 700; color: var(--color-gold-label);">₹ 1,260</td>
                    </tr>
                  </tfoot>
                </table>
                <div id="payment" class="woocommerce-checkout-payment">
                  <ul class="wc_payment_methods payment_methods methods" style="list-style: none; padding: 0; margin-bottom: 18px;">
                    <li style="margin-bottom: 10px;">
                      <label style="cursor: pointer; font-size: 13px;"><input type="radio" name="payment_method" value="online" checked="checked" /> Online Payment (UPI / Credit Card / Debit Card / NetBanking)</label>
                    </li>
                    <li style="margin-bottom: 10px;">
                      <label style="cursor: pointer; font-size: 13px;"><input type="radio" name="payment_method" value="wire" /> Direct Bank Wire / RTGS / NEFT</label>
                    </li>
                  </ul>
                  <button type="submit" class="btn-square-dark-full" name="woocommerce_checkout_place_order" id="place_order" value="Place order" style="width: 100%; padding: 14px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; border: none; cursor: pointer;">PLACE ORDER →</button>
                </div>
                <?php
            }
            ?>
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
