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
              <input id="checkout-name" required value="Anita Rao" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
              <div class="f">
                <label for="checkout-email" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">Email</label>
                <input id="checkout-email" type="email" required value="anita@example.com" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
                <small style="display: block; font-size: 11.5px; color: var(--soft, #76706A); margin-top: 4px;">For the order confirmation</small>
              </div>
              <div class="f">
                <label for="checkout-wa" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">WhatsApp number</label>
                <input id="checkout-wa" required value="+91 98290 00000" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
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
              <input id="checkout-address" required placeholder="House, street, area" value="12 Civil Lines" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
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

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
              <div class="f">
                <label for="checkout-city" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">City</label>
                <input id="checkout-city" required value="Jaipur" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
              </div>
              <div class="f">
                <label for="checkout-pin" id="label-pin" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">PIN code</label>
                <input id="checkout-pin" required value="302001" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
              </div>
            </div>

            <div class="f">
              <label for="checkout-state" id="label-state" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">State</label>
              <input id="checkout-state" required value="Rajasthan" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
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
        <h5 class="cap" style="font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; margin: 0 0 14px; color: var(--ink, #1C1A17);">YOUR ORDER</h5>
        
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

        <p style="font-size: 12.5px; margin: 16px 0 0; line-height: 1.5; color: var(--ink, #1C1A17); border-top: 1px solid var(--line, #EFE9E0); padding-top: 14px;">
          <b>Our guarantee.</b> Replaced or refunded if a stone arrives damaged or not as described.
        </p>
      </aside>

    </div>
  </div>

  <!-- ORDER CONFIRMATION VIEW (done() from Demo) -->
  <div id="checkout-done-view" style="display: none; max-width: 640px; margin: 0 auto; padding: 40px 0 80px; text-align: center;">
    <div style="width: 52px; height: 52px; border-radius: 50%; background: #FAF7F2; border: 1px solid var(--line, #EFE9E0); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 22px; color: #1E9E52;">✓</div>
    <h1 class="h1" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 32px; font-weight: 400; color: var(--ink, #1C1A17); margin: 0 0 12px;">Thank you, your order is placed.</h1>
    <p class="lead" style="font-size: 15px; color: var(--soft, #76706A); margin: 0 auto 30px; line-height: 1.6;">
      Order <b style="color: var(--ink, #1C1A17);">#VG-10482</b>. We pack in 1–2 days and send live photos and tracking on WhatsApp and email.
    </p>

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
      ['UPI, cards, net banking', 'Pay securely in ₹. No extra charge.'],
      ['Bank transfer (NEFT / RTGS)', 'We send the account details after you place the order.']
    ] : [
      ['PayPal or card', 'Pay in your currency. No extra charge.'],
      ['Payoneer', 'We send a payment request by email.'],
      ['Bank transfer (SWIFT / TT)', 'We send the bank details after you place the order.']
    ];

    if (_selectedPayIndex >= pays.length) _selectedPayIndex = 0;

    container.innerHTML = pays.map(function(p, i) {
      var isChecked = (i === _selectedPayIndex);
      return `
        <div class="rad ${isChecked ? 'on' : ''}" onclick="selectPayment(${i});" style="display: flex; gap: 12px; align-items: flex-start; border: 1px solid ${isChecked ? 'var(--ink, #1C1A17)' : 'var(--line2, #E2D7C6)'}; padding: 13px 14px; background: var(--paper, #FFF); cursor: pointer;">
          <i style="width: 16px; height: 16px; border-radius: 50%; border: 1.5px solid var(--ink, #1C1A17); flex: none; margin-top: 2px; position: relative; display: inline-block;">
            ${isChecked ? '<span style="position: absolute; inset: 3px; border-radius: 50%; background: var(--ink, #1C1A17); display: block;"></span>' : ''}
          </i>
          <div>
            <b style="font-size: 13.5px; color: var(--ink, #1C1A17); display: block;">${p[0]}</b>
            <span style="font-size: 12px; color: var(--soft, #76706A); display: block;">${p[1]}</span>
          </div>
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
      if (shipCost) shipCost.textContent = '₹ 150';
      if (coShip) coShip.textContent = '₹ 150';
      if (dutyNote) dutyNote.style.display = 'none';
      if (taxLabel) taxLabel.textContent = 'Taxes';
      if (taxVal) taxVal.textContent = 'Included in price';
      if (gstinWrap) gstinWrap.style.display = 'block';
    } else {
      if (pinLabel) pinLabel.textContent = 'ZIP / postal code';
      if (pinInput) pinInput.value = '94103';
      if (stateLabel) stateLabel.textContent = 'State / province';
      if (stateInput) stateInput.value = 'California';
      if (shipTitle) shipTitle.textContent = 'Insured express · DHL, FedEx or UPS';
      if (shipSub) shipSub.textContent = 'Arrives in about 4–7 days';
      if (shipCost) shipCost.textContent = '$45 (₹3,780)';
      if (coShip) coShip.textContent = '₹ 3,780 ($45)';
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
    if (subEl) subEl.textContent = '₹ ' + sub.toLocaleString('en-IN');
    if (totalEl) totalEl.textContent = '₹ ' + total.toLocaleString('en-IN') + (isInd ? '' : ' (approx $ ' + Math.round(total / 84) + ')');
    if (btn) btn.textContent = 'PLACE ORDER · ₹ ' + total.toLocaleString('en-IN');
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
            <small style="color: var(--soft, #76706A); font-size: 11.5px;">${size} · AAA</small>
          </span>
          <b style="font-size: 13.5px; color: var(--ink, #1C1A17);">₹ ${lineTot.toLocaleString('en-IN')}</b>
        </div>
      `;
    }).join('');

    calculateCheckoutTotals();
  }

  function handlePlaceOrder(e) {
    e.preventDefault();
    // Smoothly show order confirmed view matching demo
    document.getElementById('checkout-main-view').style.display = 'none';
    document.getElementById('checkout-done-view').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
    try {
      localStorage.removeItem('vivaaz_local_cart');
    } catch(err) {}
    if (typeof updateHeaderBagCount === 'function') updateHeaderBagCount();
  }

  document.addEventListener('DOMContentLoaded', function() {
    renderPaymentOptions();
    renderCheckoutSummary();
  });
</script>

<?php
get_footer('shop');
