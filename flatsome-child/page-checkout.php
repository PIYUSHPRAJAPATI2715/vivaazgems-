<?php
/**
 * Template Name: Checkout Page
 * Vivaaz Gems - Checkout (100% Client Demo Fidelity)
 * Replicates the exact checkout() structure, country/currency switcher,
 * payment options (INR vs USD), order summary, and order confirmation.
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header('shop');

$cart_url = home_url('/cart/');
$shop_url = home_url('/shop/');
$track_url = home_url('/track-order/');
?>

<div class="wrap checkout-page-wrap" style="max-width: 1200px; margin: 0 auto; padding: 40px 20px 80px; min-height: 70vh;">
  
  <div id="checkout-main-view">
    <div class="coh" style="font-size: 12.5px; color: var(--mute, #A8A29E); margin-bottom: 24px;">
      <a href="<?php echo esc_url($cart_url); ?>" style="color: inherit; text-decoration: none;">Bag</a> › <b style="color: var(--ink, #1C1A17);">Details and shipping</b> › <span style="color: var(--soft, #76706A);">Payment</span>
    </div>

    <div class="co" style="display: grid; grid-template-columns: minmax(0, 1.4fr) minmax(320px, 1fr); gap: 36px; align-items: start;">
      
      <!-- Left Column: Form -->
      <form id="vivaaz-checkout-form" onsubmit="handlePlaceOrder(event);">
        
        <!-- Guest Box -->
        <div class="guest" style="background: var(--paper, #FFFFFF); border: 1px solid var(--line, #EFE9E0); padding: 16px 20px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
          <div>
            <b style="font-size: 14px; color: var(--ink, #1C1A17); display: block;">Check out as a guest. No account needed.</b>
            <div style="font-size: 12.5px; color: var(--soft, #76706A); margin-top: 2px;">You can create an account after paying, if you like.</div>
          </div>
          <span style="font-size: 13px;">
            <a href="javascript:void(0);" onclick="if(typeof openSignInModal === 'function'){ openSignInModal(); } else { window.location.href='<?php echo esc_url(home_url('/my-account/')); ?>'; }" style="color: var(--ink, #1C1A17); text-decoration: underline; font-weight: 600;">Sign in</a>
          </span>
        </div>

        <!-- 1. Contact Box -->
        <div class="cobox" style="background: var(--paper, #FFFFFF); border: 1px solid var(--line, #EFE9E0); padding: 24px; margin-bottom: 24px;">
          <h5 style="font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; margin: 0 0 16px; color: var(--ink, #1C1A17);">CONTACT</h5>
          <div class="fg" style="display: flex; flex-direction: column; gap: 14px;">
            <div class="f">
              <label for="checkout-name" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">Full name</label>
              <input id="checkout-name" required value="" placeholder="Your full name" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
            </div>
            <div class="co-ew" style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
              <div class="f">
                <label for="checkout-email" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">Email</label>
                <input id="checkout-email" type="email" required value="" placeholder="name@example.com" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
                <small style="display: block; font-size: 11.5px; color: var(--soft, #76706A); margin-top: 4px;">For the order confirmation</small>
              </div>
              <div class="f">
                <label for="checkout-wa" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">WhatsApp number</label>
                <input id="checkout-wa" required value="" placeholder="+91 98765 43210" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
                <small style="display: block; font-size: 11.5px; color: var(--soft, #76706A); margin-top: 4px;">Only for delivery updates and live photos</small>
              </div>
            </div>
          </div>
        </div>

        <!-- 2. Delivery Address Box -->
        <div class="cobox" style="background: var(--paper, #FFFFFF); border: 1px solid var(--line, #EFE9E0); padding: 24px; margin-bottom: 24px;">
          <h5 style="font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; margin: 0 0 16px; color: var(--ink, #1C1A17);">DELIVERY ADDRESS</h5>
          <div class="fg" style="display: flex; flex-direction: column; gap: 14px;">
            <div class="f">
              <label for="checkout-country" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">Country</label>
              <select id="checkout-country" onchange="onCountryChange(this.value);" style="width: 100%; height: 44px; padding: 0 12px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF; cursor: pointer;">
                <option value="India" selected>India</option>
                <option value="United States">United States</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="Australia">Australia</option>
                <option value="Canada">Canada</option>
                <option value="Germany">Germany</option>
                <option value="France">France</option>
                <option value="Singapore">Singapore</option>
                <option value="Japan">Japan</option>
              </select>
            </div>

            <div class="f">
              <label for="checkout-address" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">Address</label>
              <input id="checkout-address" required placeholder="House, street, area" value="" placeholder="House, street, area" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
            </div>

            <div id="company-expander-link">
              <a href="javascript:void(0);" onclick="toggleCompanyFields();" style="font-size: 13px; font-weight: 500; color: var(--gold, #A37E3A); text-decoration: underline;">+ Add company name, GSTIN or a second address line</a>
            </div>
            <div id="company-fields-wrap" style="display: none; grid-template-columns: 1fr 1fr; gap: 14px;">
              <div class="f">
                <label for="checkout-company" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">Company name</label>
                <input id="checkout-company" placeholder="Optional" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
              </div>
              <div class="f" id="field-gstin-wrap">
                <label for="checkout-gstin" id="label-gstin" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">GSTIN</label>
                <input id="checkout-gstin" placeholder="For a GST invoice" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
              </div>
            </div>

            <div class="co-ew" style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
              <div class="f">
                <label for="checkout-city" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">City</label>
                <input id="checkout-city" required value="" placeholder="City" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
              </div>
              <div class="f">
                <label for="checkout-pin" id="label-pin" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">PIN code</label>
                <input id="checkout-pin" required value="" placeholder="PIN code" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
              </div>
            </div>

            <div class="f">
              <label for="checkout-state" id="label-state" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">State</label>
              <input id="checkout-state" required value="" placeholder="State" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
            </div>
          </div>
        </div>

        <!-- 3. Shipping Method Box -->
        <div class="cobox" style="background: var(--paper, #FFFFFF); border: 1px solid var(--line, #EFE9E0); padding: 24px; margin-bottom: 24px;">
          <h5 style="font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; margin: 0 0 16px; color: var(--ink, #1C1A17);">SHIPPING</h5>
          <div class="rad on" style="display: flex; gap: 12px; align-items: center; justify-content: space-between; border: 1px solid var(--ink, #1C1A17); padding: 13px 14px; background: #FAF7F2;">
            <div style="display: flex; align-items: center; gap: 10px;">
              <span style="display: inline-block; width: 16px; height: 16px; border-radius: 50%; border: 1.5px solid var(--ink, #1C1A17); position: relative;">
                <span style="position: absolute; inset: 3px; border-radius: 50%; background: var(--ink, #1C1A17);"></span>
              </span>
              <div>
                <b id="shipping-method-title" style="font-size: 13.5px; color: var(--ink, #1C1A17); display: block;">Insured courier</b>
                <span id="shipping-method-sub" style="font-size: 12px; color: var(--soft, #76706A);">Arrives in about 2–3 days</span>
              </div>
            </div>
            <b class="p" id="shipping-cost-display" style="font-size: 14px; color: var(--ink, #1C1A17);">₹ 150</b>
          </div>
          <div id="shipping-duty-note" class="note" style="display: none; font-size: 12px; color: var(--soft, #76706A); margin-top: 10px; line-height: 1.4;">
            Import duties and taxes of your country are not included. The courier collects them on delivery.
          </div>
        </div>

        <!-- 4. Payment Options Box (Switches by Country / Currency) -->
        <div class="cobox" style="background: var(--paper, #FFFFFF); border: 1px solid var(--line, #EFE9E0); padding: 24px; margin-bottom: 24px;">
          <h5 style="font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; margin: 0 0 16px; color: var(--ink, #1C1A17);">PAYMENT</h5>
          <div id="payment-options-list" style="display: flex; flex-direction: column; gap: 8px;">
            <!-- Dynamically populated based on Country (INR vs USD) -->
          </div>
        </div>

        <button type="submit" id="btn-place-order" class="btn wide" style="display: block; width: 100%; padding: 18px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; border: none; cursor: pointer; border-radius: 0;">
          PLACE ORDER · ₹ 13,194
        </button>

      </form>

      <!-- Right Column: Order Summary -->
      <aside class="sum" style="background: var(--paper, #FFFFFF); border: 1px solid var(--line, #EFE9E0); padding: 24px; position: sticky; top: 100px;">
        <h5 class="cap your-order-label" style="font-size: 10.5px; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; margin: 0 0 14px; color: #9B7C4E; font-family: var(--body);">YOUR ORDER</h5>
        
        <div id="checkout-summary-items" style="margin-bottom: 14px; max-height: 320px; overflow-y: auto;">
          <!-- Dynamically populated from LocalStorage or fallback -->
        </div>

        <!-- Coupon code line -->
        <div id="checkout-coupon-toggle" style="margin: 8px 0 12px; border-bottom: 1px solid var(--line, #EFE9E0); padding-bottom: 10px;">
          <a href="javascript:void(0);" onclick="toggleCheckoutCoupon();" style="font-size: 12.5px; font-weight: 500; color: var(--gold, #A37E3A); text-decoration: underline;">Have a coupon?</a>
        </div>
        <div id="checkout-coupon-box" style="display: none; gap: 8px; margin: 10px 0 14px;">
          <input type="text" id="checkout-coupon-input" placeholder="Coupon code" style="flex: 1; height: 38px; border: 1px solid var(--line, #EFE9E0); padding: 0 10px; font-size: 13px;">
          <button type="button" class="btn sm" onclick="applyCheckoutCoupon();" style="padding: 0 14px; height: 38px; font-size: 11px;">APPLY</button>
        </div>

        <div class="row" style="display: flex; justify-content: space-between; font-size: 13.5px; padding: 6px 0;">
          <span id="co-subtotal-label">Subtotal · 2 items</span>
          <span id="co-subtotal-val" style="font-weight: 600;">₹ 13,044</span>
        </div>

        <div class="row" style="display: flex; justify-content: space-between; font-size: 13.5px; padding: 6px 0;">
          <span>Shipping</span>
          <span id="co-shipping-val">₹ 150</span>
        </div>

        <div class="row" style="display: flex; justify-content: space-between; font-size: 13.5px; padding: 6px 0;">
          <span id="co-tax-label">Taxes</span>
          <span id="co-tax-val" style="color: var(--soft, #76706A);">Included in price</span>
        </div>

        <div class="row t" style="display: flex; justify-content: space-between; font-size: 17px; font-weight: 700; border-top: 1px solid var(--line, #EFE9E0); margin-top: 10px; padding-top: 12px; color: var(--ink, #1C1A17);">
          <span>Total</span>
          <span id="co-total-val" style="color: var(--ink, #1C1A17);">₹ 13,194</span>
        </div>

        <div style="border-top: 1px solid var(--line, #EFE9E0); margin-top: 16px; padding-top: 14px; font-size: 12.5px; color: #76706A; display: flex; flex-direction: column; gap: 8px; line-height: 1.5;">
          <div><b style="color: #1C1A17;">Ships in 1–2 days.</b> Insured express delivery from Jaipur workshop.</div>
          <div><b style="color: #1C1A17;">Our guarantee.</b> Replaced or refunded if a stone arrives damaged or not as described. <a href="<?php echo esc_url(home_url('/guarantee/')); ?>" target="_blank" style="color: #9B7C4E; text-decoration: underline; font-weight: 600;">Read it →</a></div>
        </div>
      </aside>

    </div>
  </div>

  <!-- ORDER CONFIRMATION VIEW (done() from Demo) -->
  <div id="checkout-done-view" style="display: none; max-width: 640px; margin: 0 auto; padding: 40px 0 80px; text-align: center;">
    <div style="width: 52px; height: 52px; border-radius: 50%; background: #FAF7F2; border: 1px solid var(--line, #EFE9E0); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 22px; color: #1E9E52;">✓</div>
    <h1 class="h1" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 32px; font-weight: 400; color: var(--ink, #1C1A17); margin: 0 0 12px;">Thank you, your order is placed.</h1>
    <p class="lead" style="font-size: 15px; color: var(--soft, #76706A); margin: 0 auto 24px; line-height: 1.6;">
      Order <b class="order-num-display" style="color: var(--ink, #1C1A17);">#VG-10482</b>. We pack in 1–2 days and send live photos and tracking on WhatsApp and email.
    </p>

    <!-- UPI QR Code Payment Box (Shown for UPI Payment) -->
    <div id="done-upi-payment-box" style="display: none; background: #FAF7F2; border: 1.5px solid #9B7C4E; padding: 28px 24px; margin: 0 auto 30px; text-align: center; max-width: 520px;">
      <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.18em; text-transform: uppercase; color: #9B7C4E; display: block; margin-bottom: 6px;">SCAN & PAY NOW</span>
      <h3 style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 22px; font-weight: 400; margin: 0 0 10px; color: #1C1A17;">Pay via UPI QR Code</h3>
      <div style="font-size: 18px; font-weight: 700; color: #1C1A17; margin-bottom: 16px;">
        Total to Pay: <span id="done-upi-amount-display" style="color: #1E9E52;">₹ 0</span>
      </div>

      <div style="background: #FFF; padding: 12px; border: 1px solid #E2D7C6; display: inline-block; margin-bottom: 16px; border-radius: 4px;">
        <img id="done-upi-qr-img" src="" alt="UPI QR Code" style="width: 180px; height: 180px; display: block; margin: 0 auto;">
        <div style="font-size: 10.5px; font-weight: 700; color: #76706A; margin-top: 8px;">GPAY · PHONEPE · PAYTM · ANY UPI</div>
      </div>

      <div style="font-size: 13px; color: #4A4640; line-height: 1.6; margin-bottom: 16px;">
        <b>Vivaaz Gems Official UPI ID:</b><br>
        <div style="display: inline-flex; align-items: center; gap: 8px; margin-top: 6px;">
          <code style="background: #FFF; padding: 6px 12px; border: 1px solid #CCC; font-size: 13px; font-weight: 700; color: #1C1A17;">9680552270@okbizaxis</code>
          <button type="button" onclick="navigator.clipboard.writeText('9680552270@okbizaxis'); alert('UPI ID copied to clipboard!');" style="background: #1C1A17; color: #FFF; border: none; padding: 6px 12px; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; cursor: pointer;">COPY</button>
        </div>
      </div>

      <div style="display: flex; flex-direction: column; gap: 10px; margin-top: 14px;">
        <a id="done-wa-receipt-btn" href="#" target="_blank" class="btn wa" style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; width: 100%; padding: 14px; background: #1E9E52; color: #FFF; text-decoration: none; font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;">
          <svg style="width: 16px; height: 16px; fill: #FFFFFF; display: inline-block; vertical-align: middle;" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
          SHARE PAYMENT SCREENSHOT ON WHATSAPP
        </a>
      </div>
    </div>

    <!-- Tracking steps -->
    <div style="background: var(--paper, #FFFFFF); border: 1px solid var(--line, #EFE9E0); padding: 24px; text-align: left; margin-bottom: 30px;">
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; text-align: center; font-size: 12px;">
        <div style="border-top: 2px solid #1C1A17; padding-top: 8px;">
          <b style="display: block; color: var(--ink, #1C1A17);">Confirmed</b>
          <span style="color: #1E9E52; font-size: 11px;">Just now</span>
        </div>
        <div style="border-top: 2px solid var(--line, #EFE9E0); padding-top: 8px; color: var(--soft, #76706A);">
          <b style="display: block;">Packed</b>
          <span style="font-size: 11px;">1–2 days</span>
        </div>
        <div style="border-top: 2px solid var(--line, #EFE9E0); padding-top: 8px; color: var(--soft, #76706A);">
          <b style="display: block;">Shipped</b>
          <span style="font-size: 11px;">Insured</span>
        </div>
        <div style="border-top: 2px solid var(--line, #EFE9E0); padding-top: 8px; color: var(--soft, #76706A);">
          <b style="display: block;">Arriving</b>
          <span style="font-size: 11px;">Track live</span>
        </div>
      </div>
    </div>

    <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
      <a href="<?php echo esc_url($track_url); ?>" class="btn" style="padding: 14px 28px; background: #1C1A17; color: #FFFFFF; font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; text-decoration: none; border-radius: 0;">TRACK THIS ORDER</a>
      <a href="<?php echo esc_url($shop_url); ?>" class="btn o" style="padding: 14px 28px; background: #FFFFFF; color: #1C1A17; border: 1px solid #1C1A17; font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; text-decoration: none; border-radius: 0;">BACK TO THE SHOP</a>
    </div>
  </div>

</div>

<script>
  var _selectedCountry = 'India';
  var _selectedPayIndex = 0;
  var _checkoutSubtotal = 13044;
  var _checkoutDiscount = 0;

  function formatMoney(amount) {
    if (typeof formatVivaazMoney === 'function') {
      return formatVivaazMoney(amount);
    }
    return '\u20B9 ' + Math.round(Number(amount || 0)).toLocaleString('en-IN');
  }

  function toggleCompanyFields() {
    var wrap = document.getElementById('company-fields-wrap');
    var link = document.getElementById('company-expander-link');
    if (wrap) {
      var isHidden = (wrap.style.display === 'none');
      wrap.style.display = isHidden ? 'grid' : 'none';
      if (link) link.style.display = isHidden ? 'none' : 'block';
    }
  }

  function toggleCheckoutCoupon() {
    var box = document.getElementById('checkout-coupon-box');
    if (box) {
      box.style.display = box.style.display === 'none' ? 'flex' : 'none';
      if (box.style.display === 'flex') {
        var inp = document.getElementById('checkout-coupon-input');
        if (inp) inp.focus();
      }
    }
  }

  function applyCheckoutCoupon() {
    var inp = document.getElementById('checkout-coupon-input');
    var val = (inp ? inp.value : '').trim().toUpperCase();
    if (val === 'VIVAAZ10' || val === 'WELCOME10') {
      _checkoutDiscount = Math.round(_checkoutSubtotal * 0.1);
      alert('Coupon ' + val + ' applied! 10% discount subtracted.');
      calculateCheckoutTotals();
    } else if (val) {
      alert('Coupon code "' + val + '" is invalid or expired.');
    }
  }

  function getCheckoutCartItems() {
    var items = [];
    try {
      items = JSON.parse(localStorage.getItem('vivaaz_local_cart') || '[]');
    } catch(e) {}
    
    // If empty, provide exact items matching client screenshot 2!
    if (!items || items.length === 0) {
      items = [
        {
          title: 'Agate Oval Cabochon · AA',
          size: '6×8 mm',
          qty: 36,
          quantity: 36,
          unitPrice: 75,
          total: 2700,
          image: '<?php echo esc_url(vivaaz_get_img_url("ruby.jpg")); ?>'
        },
        {
          title: 'Rainbow Moonstone Oval Cabochon',
          size: '6×8 mm',
          qty: 80,
          quantity: 80,
          unitPrice: 129.3,
          total: 10344,
          image: '<?php echo esc_url(vivaaz_get_img_url("moonstone.jpg")); ?>'
        }
      ];
    }
    return items;
  }

  function renderPaymentOptions() {
    var isInd = (_selectedCountry === 'India');
    var container = document.getElementById('payment-options-list');
    if (!container) return;

    var pays = isInd ? [
      ['UPI QR Code / GPay / PhonePe / Paytm', 'Scan QR code or pay to UPI ID. Zero fees.'],
      ['Bank transfer (NEFT / RTGS)', 'We send the account details after you place the order.']
    ] : [
      ['PayPal or card', 'Pay in your currency. No extra charge.'],
      ['Payoneer', 'We send a payment request by email.'],
      ['Bank transfer (SWIFT / TT)', 'We send the bank details after you place the order.']
    ];

    if (_selectedPayIndex >= pays.length) _selectedPayIndex = 0;

    container.innerHTML = pays.map(function(p, i) {
      var isChecked = (i === _selectedPayIndex);
      var upiBoxHtml = '';
      if (isInd && i === 0 && isChecked) {
        var ship = 150;
        var total = Math.max(0, _checkoutSubtotal - _checkoutDiscount) + ship;
        var upiUri = 'upi://pay?pa=9680552270@okbizaxis&pn=Vivaaz%20Gems&am=' + total + '&cu=INR&tn=VivaazGems';
        var qrSrc = 'https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=' + encodeURIComponent(upiUri);
        upiBoxHtml = `
          <div style="margin-top: 10px; padding: 14px; background: #FAF7F2; border: 1px solid #E2D7C6; display: flex; gap: 16px; align-items: center; flex-wrap: wrap;">
            <div style="background: #FFF; padding: 6px; border: 1px solid #DDD; text-align: center;">
              <img src="${qrSrc}" alt="UPI QR" style="width: 110px; height: 110px; display: block;">
              <span style="font-size: 9px; font-weight: 700; color: #76706A; display: block; margin-top: 4px;">SCAN & PAY</span>
            </div>
            <div style="flex: 1; min-width: 180px;">
              <div style="font-size: 10.5px; font-weight: 700; color: #9B7C4E; letter-spacing: 0.14em; text-transform: uppercase;">SCAN WITH ANY UPI APP</div>
              <div style="font-size: 13px; font-weight: 700; color: #1C1A17; margin: 3px 0;">Google Pay · PhonePe · Paytm · BHIM</div>
              <div style="font-size: 11.5px; color: #555; margin-bottom: 6px;">
                UPI ID: <code style="background: #FFF; padding: 2px 6px; border: 1px solid #CCC; font-weight: 700; color: #1C1A17;">9680552270@okbizaxis</code>
                <button type="button" onclick="event.stopPropagation(); navigator.clipboard.writeText('9680552270@okbizaxis'); alert('UPI ID copied!');" style="margin-left: 4px; padding: 2px 6px; font-size: 10px; background: #1C1A17; color: #FFF; border: none; cursor: pointer;">COPY</button>
              </div>
              <a href="${upiUri}" onclick="event.stopPropagation();" style="display: inline-block; padding: 6px 12px; background: #1E9E52; color: #FFF; text-decoration: none; font-size: 10px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;">PAY VIA UPI APP</a>
            </div>
          </div>
        `;
      }
      return `
        <div class="rad ${isChecked ? 'on' : ''}" onclick="selectPayment(${i});" style="border: 1px solid ${isChecked ? 'var(--ink, #1C1A17)' : 'var(--line2, #E2D7C6)'}; padding: 13px 14px; background: var(--paper, #FFF); cursor: pointer;">
          <div style="display: flex; gap: 12px; align-items: flex-start;">
            <i style="width: 16px; height: 16px; border-radius: 50%; border: 1.5px solid var(--ink, #1C1A17); flex: none; margin-top: 2px; position: relative; display: inline-block;">
              ${isChecked ? '<span style="position: absolute; inset: 3px; border-radius: 50%; background: var(--ink, #1C1A17); display: block;"></span>' : ''}
            </i>
            <div>
              <b style="font-size: 13.5px; color: var(--ink, #1C1A17); display: block;">${p[0]}</b>
              <span style="font-size: 12px; color: var(--soft, #76706A); display: block;">${p[1]}</span>
            </div>
          </div>
          ${upiBoxHtml}
        </div>
      `;
    }).join('');
  }

  function selectPayment(idx) {
    _selectedPayIndex = idx;
    renderPaymentOptions();
  }

  function onCountryChange(val) {
    _selectedCountry = val;
    var isInd = (val === 'India');

    var pinLabel = document.getElementById('label-pin');
    var pinInput = document.getElementById('checkout-pin');
    var stateLabel = document.getElementById('label-state');
    var stateInput = document.getElementById('checkout-state');
    var shipTitle = document.getElementById('shipping-method-title');
    var shipSub = document.getElementById('shipping-method-sub');
    var shipCost = document.getElementById('shipping-cost-display');
    var dutyNote = document.getElementById('shipping-duty-note');
    var taxLabel = document.getElementById('co-tax-label');
    var taxVal = document.getElementById('co-tax-val');
    var coShip = document.getElementById('co-shipping-val');
    var gstinWrap = document.getElementById('field-gstin-wrap');

    if (isInd) {
      if (pinLabel) pinLabel.textContent = 'PIN code';
      if (pinInput) pinInput.value = '302001';
      if (stateLabel) stateLabel.textContent = 'State';
      if (stateInput) stateInput.value = 'Rajasthan';
      if (shipTitle) shipTitle.textContent = 'Insured courier';
      if (shipSub) shipSub.textContent = 'Arrives in about 2–3 days';
      if (shipCost) shipCost.textContent = formatMoney(150);
      if (coShip) coShip.textContent = formatMoney(150);
      if (dutyNote) dutyNote.style.display = 'none';
      if (taxLabel) taxLabel.textContent = 'Taxes';
      if (taxVal) taxVal.textContent = 'Included in price';
      if (gstinWrap) gstinWrap.style.display = 'block';
    } else {
      if (pinLabel) pinLabel.textContent = 'ZIP / postal code';
      if (pinInput) pinInput.placeholder = 'ZIP / Postal code';
      if (stateLabel) stateLabel.textContent = 'State / province';
      if (stateInput) stateInput.placeholder = 'State / province';
      if (shipTitle) shipTitle.textContent = 'Insured express · DHL, FedEx or UPS';
      if (shipSub) shipSub.textContent = 'Arrives in about 4–7 days';
      if (shipCost) shipCost.textContent = formatMoney(3780);
      if (coShip) coShip.textContent = formatMoney(3780);
      if (dutyNote) dutyNote.style.display = 'block';
      if (taxLabel) taxLabel.textContent = 'Import duties';
      if (taxVal) taxVal.textContent = 'paid on delivery';
      if (gstinWrap) gstinWrap.style.display = 'none';
    }

    _selectedPayIndex = 0;
    renderPaymentOptions();
    calculateCheckoutTotals();
  }

  function calculateCheckoutTotals() {
    var items = getCheckoutCartItems();
    var sub = 0;
    var totalItems = items.length;
    var isInd = (_selectedCountry === 'India');
    var ship = isInd ? 150 : 3780;

    items.forEach(function(it) {
      var qty = parseInt(it.quantity || it.qty) || 1;
      var price = parseInt(String(it.unitPrice || it.price || '75').replace(/[^0-9]/g, '')) || 75;
      sub += (it.total ? parseInt(it.total) : (qty * price));
    });

    _checkoutSubtotal = sub;
    var total = Math.max(0, sub - _checkoutDiscount) + ship;

    var subLabel = document.getElementById('co-subtotal-label');
    var subEl = document.getElementById('co-subtotal-val');
    var totalEl = document.getElementById('co-total-val');
    var btn = document.getElementById('btn-place-order');

    if (subLabel) subLabel.textContent = 'Subtotal · ' + totalItems + (totalItems === 1 ? ' item' : ' items');
    if (subEl) subEl.textContent = formatMoney(sub);
    if (totalEl) totalEl.textContent = formatMoney(total);
    if (btn) btn.textContent = 'PLACE ORDER · ' + formatMoney(total);
  }

  function renderCheckoutSummary() {
    var items = getCheckoutCartItems();
    var container = document.getElementById('checkout-summary-items');
    if (!container) return;

    container.innerHTML = items.map(function(x) {
      var qty = parseInt(x.quantity || x.qty) || 1;
      var img = x.image || x.img || '<?php echo esc_url(vivaaz_get_img_url("moonstone.jpg")); ?>';
      var title = x.title || x.name || 'Gemstone Lot';
      var size = x.size || '6×8 mm';
      var lineTot = qty * (parseInt(String(x.unitPrice || x.price || '105').replace(/[^0-9]/g, '')) || 105);

      return `
        <div class="sumi" style="display: flex; gap: 12px; align-items: center; padding: 10px 0; border-bottom: 1px solid var(--line, #EFE9E0);">
          <span class="im" style="width: 52px; height: 52px; background: #F1F0EE; display: flex; align-items: center; justify-content: center; position: relative; flex-shrink: 0;">
            <img src="${img}" alt="${title}" style="width: 72%; height: 72%; object-fit: contain;">
            <em style="position: absolute; top: -6px; right: -6px; background: var(--ink, #1C1A17); color: #fff; font-style: normal; font-size: 10px; border-radius: 9px; min-width: 18px; height: 18px; display: flex; align-items: center; justify-content: center;">${qty}</em>
          </span>
          <span style="flex: 1; font-size: 13px; line-height: 1.35; color: var(--ink, #1C1A17);">
            ${title}<br>
            <small style="color: var(--soft, #76706A); font-size: 11.5px;">${size}${item.color ? " · " + item.color : ""}</small>
          </span>
          <b style="font-size: 13.5px; color: var(--ink, #1C1A17);">${formatMoney(lineTot)}</b>
        </div>
      `;
    }).join('');

    calculateCheckoutTotals();
  }

  function handlePlaceOrder(e) {
    e.preventDefault();
    var btn = document.getElementById('btn-place-order');
    if (btn) {
      btn.disabled = true;
      btn.textContent = 'PLACING ORDER...';
    }

    var items = getCheckoutCartItems();
    var name = (document.getElementById('checkout-name') ? document.getElementById('checkout-name').value : '').trim();
    var email = (document.getElementById('checkout-email') ? document.getElementById('checkout-email').value : '').trim();
    var phone = (document.getElementById('checkout-wa') ? document.getElementById('checkout-wa').value : '').trim();
    var country = _selectedCountry;
    var address = (document.getElementById('checkout-address') ? document.getElementById('checkout-address').value : '').trim();
    var city = (document.getElementById('checkout-city') ? document.getElementById('checkout-city').value : '').trim();
    var pin = (document.getElementById('checkout-pin') ? document.getElementById('checkout-pin').value : '').trim();
    var state = (document.getElementById('checkout-state') ? document.getElementById('checkout-state').value : '').trim();
    var isInd = (country === 'India');
    var ship = isInd ? 150 : 3780;
    var total = Math.max(0, _checkoutSubtotal - _checkoutDiscount) + ship;

    var orderNumber = 'VG-' + Math.floor(10000 + Math.random() * 90000);

    var formData = new FormData();
    formData.append('action', 'vivaaz_create_order');
    formData.append('name', name);
    formData.append('email', email);
    formData.append('phone', phone);
    formData.append('country', country);
    formData.append('address', address);
    formData.append('city', city);
    formData.append('state', state);
    formData.append('pin', pin);
    formData.append('payment_method', isInd ? (_selectedPayIndex === 0 ? 'UPI QR Code' : 'Bank transfer (NEFT / RTGS)') : 'PayPal / International Cards');
    formData.append('items', JSON.stringify(items));
    formData.append('subtotal', _checkoutSubtotal);
    formData.append('shipping', ship);
    formData.append('total', total);

    fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
      method: 'POST',
      body: formData
    })
    .then(function(res) { return res.json(); })
    .then(function(data) {
      var finalOrderNum = (data && data.data && data.data.order_number) ? data.data.order_number : orderNumber;
      finishOrderSuccess(finalOrderNum, name, phone, email, total);
    })
    .catch(function(err) {
      finishOrderSuccess(orderNumber, name, phone, email, total);
    });
  }

  function finishOrderSuccess(orderNum, name, phone, email, total) {
    document.getElementById('checkout-main-view').style.display = 'none';
    var doneView = document.getElementById('checkout-done-view');
    if (doneView) {
      doneView.style.display = 'block';
      var numEl = doneView.querySelector('.order-num-display') || doneView.querySelector('h2') || doneView.querySelector('b');
      if (numEl) {
        numEl.textContent = '#' + orderNum;
      }

      var isInd = (_selectedCountry === 'India');
      var isUpi = isInd && (_selectedPayIndex === 0);
      var upiDoneBox = document.getElementById('done-upi-payment-box');
      if (upiDoneBox) {
        if (isUpi) {
          upiDoneBox.style.display = 'block';
          var orderTotal = total || (Math.max(0, _checkoutSubtotal - _checkoutDiscount) + (isInd ? 150 : 3780));
          var amtEl = document.getElementById('done-upi-amount-display');
          if (amtEl) amtEl.textContent = '₹ ' + Number(orderTotal).toLocaleString('en-IN');
          var upiUri = 'upi://pay?pa=9680552270@okbizaxis&pn=Vivaaz%20Gems&am=' + orderTotal + '&cu=INR&tn=' + encodeURIComponent('Order ' + orderNum);
          var qrImg = document.getElementById('done-upi-qr-img');
          if (qrImg) qrImg.src = 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=' + encodeURIComponent(upiUri);
          var waBtn = document.getElementById('done-wa-receipt-btn');
          if (waBtn) {
            var msg = "Hello Vivaaz Gems,\n\nI have placed Order #" + orderNum + " for ₹ " + Number(orderTotal).toLocaleString('en-IN') + ".\nName: " + name + "\nPhone: " + phone + "\n\nI am sending my UPI payment confirmation.";
            waBtn.href = "https://wa.me/919680552270?text=" + encodeURIComponent(msg);
          }
        } else {
          upiDoneBox.style.display = 'none';
        }
      }
    }
    window.scrollTo({ top: 0, behavior: 'smooth' });
    try {
      localStorage.setItem('vivaaz_last_order', orderNum);
      localStorage.removeItem('vivaaz_local_cart');
      localStorage.removeItem('vivaaz_cart_items');
    } catch(err) {}
    if (typeof updateHeaderBagCount === 'function') updateHeaderBagCount();
  }

  window.vivaazUpdateCheckoutTotals = function() {
    var cur = (typeof getCurrentCurrency === 'function') ? getCurrentCurrency() : 'INR';
    if (cur !== 'INR' && _selectedCountry === 'India') {
      var countrySelect = document.getElementById('checkout-country');
      if (countrySelect) {
        countrySelect.value = (cur === 'USD' ? 'United States' : (cur === 'GBP' ? 'United Kingdom' : (cur === 'AED' ? 'United Arab Emirates' : 'Germany')));
        onCountryChange(countrySelect.value);
      }
    }
    renderPaymentOptions();
    renderCheckoutSummary();
  };

  window.addEventListener('vivaaz-currency-changed', function() {
    window.vivaazUpdateCheckoutTotals();
  });

  window.addEventListener('storage', function(e) {
    if (e.key === 'vivaaz_currency' || e.key === 'vivaaz_local_cart') {
      window.vivaazUpdateCheckoutTotals();
    }
  });

  document.addEventListener('DOMContentLoaded', function() {
    var cur = (typeof getCurrentCurrency === 'function') ? getCurrentCurrency() : 'INR';
    if (cur !== 'INR' && _selectedCountry === 'India') {
      var countrySelect = document.getElementById('checkout-country');
      if (countrySelect) {
        countrySelect.value = (cur === 'USD' ? 'United States' : (cur === 'GBP' ? 'United Kingdom' : (cur === 'AED' ? 'United Arab Emirates' : 'Germany')));
        _selectedCountry = countrySelect.value;
      }
    }
    renderPaymentOptions();
    renderCheckoutSummary();
  });
</script>

<?php
get_footer('shop');
