<?php
/**
 * Vivaaz Gems - Custom Luxury Interactive Cart Template
 * Matches Page 17 of Master Brief & Word Content Document.
 * Fully reactive: Live quantity steppers (− / +), tiered price calculation,
 * instantaneous subtotal & total updates, undoable removal, and bulletproof
 * LocalStorage sync fallback for free hosting environments.
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); 

$cart_url     = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$checkout_url = function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout/');
$cart_items   = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart() : array();
$cart_count   = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
?>

<div class="luxury-cart-page-wrapper" id="vivaaz-cart-root">
  
  <div class="cart-page-header" style="text-align: center; margin-bottom: 30px;">
    <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">SHOPPING BAG</span>
    <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 32px; font-weight: 400; margin: 8px 0 4px; color: #1C1A17;">
      Your <span class="font-italic text-gold" style="font-style: italic; color: #9C7C4C;">Selection</span>
    </h1>
    <p class="text-muted" id="cart-item-count-label" style="font-size: 13px; color: #76706A; margin: 0;">
      Your bag · <span class="count-num"><?php echo esc_html($cart_count); ?></span> items
    </p>
  </div>

  <!-- Notification Banner for Undo Removal -->
  <div id="cart-undo-banner" style="display: none; background: #FAF7F2; border: 1px solid #9C7C4C; padding: 12px 20px; margin-bottom: 24px; justify-content: space-between; align-items: center;">
    <span id="cart-undo-message" style="font-size: 13px; color: #1C1A17;">Item removed.</span>
    <button type="button" id="cart-undo-btn" style="background: none; border: none; font-size: 13px; font-weight: 700; color: #9C7C4C; text-decoration: underline; cursor: pointer; text-transform: uppercase;">Undo</button>
  </div>

  <form class="woocommerce-cart-form" id="vivaaz-cart-form" action="<?php echo esc_url($cart_url); ?>" method="post">
    <?php do_action('woocommerce_before_cart_table'); ?>

    <div class="cart-layout-grid" style="display: grid; grid-template-columns: 1fr 380px; gap: 32px; align-items: start;">
      
      <!-- Left Column: Items Table -->
      <div class="cart-items-section">
        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" id="cart-items-table" style="width: 100%; border-collapse: collapse; background: #FFFFFF; border: 1px solid #EBE7DF;">
          <thead>
            <tr style="border-bottom: 1px solid #EBE7DF; background: #FAF7F2;">
              <th class="product-remove" style="padding: 14px 10px; width: 40px;">&nbsp;</th>
              <th class="product-thumbnail" style="padding: 14px 10px; width: 80px;">&nbsp;</th>
              <th class="product-name" style="padding: 14px; text-align: left; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #76706A;">Product</th>
              <th class="product-price" style="padding: 14px; text-align: right; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #76706A;">Price</th>
              <th class="product-quantity" style="padding: 14px; text-align: center; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #76706A;">Quantity</th>
              <th class="product-subtotal" style="padding: 14px 20px 14px 14px; text-align: right; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #76706A;">Subtotal</th>
            </tr>
          </thead>
          <tbody id="cart-items-body">
            <?php do_action('woocommerce_before_cart_contents'); ?>

            <?php
            $has_wc_items = false;
            if (!empty($cart_items) && is_array($cart_items)) {
                foreach ($cart_items as $cart_item_key => $cart_item) {
                    $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                    $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                    $product_name = apply_filters('woocommerce_cart_item_name', $_product ? $_product->get_name() : 'Loose Gemstone', $cart_item, $cart_item_key);

                    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                        $has_wc_items = true;
                        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                        $remove_url = function_exists('wc_get_cart_remove_url') ? wc_get_cart_remove_url($cart_item_key) : '#';
                        $raw_price  = floatval($_product->get_price() ?: 120);
                        $qty        = intval($cart_item['quantity']);
                        $size_attr  = isset($cart_item['variation']['attribute_pa_size']) ? $cart_item['variation']['attribute_pa_size'] : (isset($cart_item['size']) ? $cart_item['size'] : '7×5 mm');
                        $sku        = $_product->get_sku() ?: 'VG-' . $product_id;

                        // Tiered pricing calculation: 10+ (12% off), 50+ (23% off)
                        $tier1_price = round($raw_price * 0.88);
                        $tier2_price = round($raw_price * 0.77);
                        $active_unit_price = ($qty >= 50) ? $tier2_price : (($qty >= 10) ? $tier1_price : $raw_price);
                        $line_total = $active_unit_price * $qty;
                        ?>
                        <tr class="woocommerce-cart-form__cart-item cart_item vivaaz-cart-row" data-key="<?php echo esc_attr($cart_item_key); ?>" data-base-price="<?php echo esc_attr($raw_price); ?>" data-tier1="<?php echo esc_attr($tier1_price); ?>" data-tier2="<?php echo esc_attr($tier2_price); ?>" style="border-bottom: 1px solid #EBE7DF;">

                          <td class="product-remove" style="padding: 16px 10px; text-align: center;">
                            <button type="button" class="btn-remove-item" onclick="removeCartItem('<?php echo esc_js($cart_item_key); ?>', '<?php echo esc_js(addslashes($product_name)); ?>')" style="background: none; border: none; font-size: 18px; color: #76706A; cursor: pointer; line-height: 1;" title="Remove this item">&times;</button>
                          </td>

                          <td class="product-thumbnail" style="padding: 16px 10px;">
                            <?php
                            $thumbnail = $_product->get_image('woocommerce_thumbnail', array('style' => 'width: 64px; height: 64px; object-fit: cover; border: 1px solid #EBE7DF; display: block;'));
                            if (!$product_permalink) {
                                echo $thumbnail;
                            } else {
                                printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                            }
                            ?>
                          </td>

                          <td class="product-name" style="padding: 16px 14px;">
                            <div style="font-size: 14px; font-weight: 600; color: #1C1A17; margin-bottom: 4px;">
                              <?php if ($product_permalink) : ?>
                                <a href="<?php echo esc_url($product_permalink); ?>" style="color: #1C1A17; text-decoration: none;"><?php echo esc_html($product_name); ?></a>
                              <?php else : ?>
                                <?php echo esc_html($product_name); ?>
                              <?php endif; ?>
                            </div>
                            <div style="font-size: 11px; color: #76706A; display: flex; gap: 8px; align-items: center; flex-wrap: wrap;">
                              <span style="background: #FAF7F2; border: 1px solid #EBE7DF; padding: 2px 6px; font-weight: 600; color: #9C7C4C;"><?php echo esc_html($size_attr); ?> · AAA</span>
                              <span>SKU: <?php echo esc_html($sku); ?></span>
                            </div>
                          </td>

                          <td class="product-price" style="padding: 16px 14px; text-align: right; vertical-align: middle;">
                            <div class="row-unit-price" style="font-size: 13px; font-weight: 600; color: #1C1A17;">
                              ₹<span class="unit-val"><?php echo esc_html(number_format($active_unit_price)); ?></span> each
                            </div>
                            <div class="row-tier-badge" style="font-size: 10px; color: #1E9E52; font-weight: 600; margin-top: 2px; <?php echo ($qty >= 10) ? '' : 'display: none;'; ?>">
                              <?php echo ($qty >= 50) ? '50+ price reached' : (($qty >= 10) ? '10+ price reached' : ''); ?>
                            </div>
                          </td>

                          <td class="product-quantity" style="padding: 16px 14px; text-align: center; vertical-align: middle;">
                            <div class="cart-stepper-control" style="display: inline-flex; align-items: center; border: 1px solid #1C1A17; background: #FFFFFF;">
                              <button type="button" class="btn-step-minus" onclick="stepCartQty('<?php echo esc_js($cart_item_key); ?>', -1)" style="width: 32px; height: 32px; background: none; border: none; border-right: 1px solid #EBE7DF; font-size: 16px; font-weight: 700; cursor: pointer; color: #1C1A17; display: flex; align-items: center; justify-content: center;">−</button>
                              <input type="number" name="cart[<?php echo esc_attr($cart_item_key); ?>][qty]" class="cart-qty-input" value="<?php echo esc_attr($qty); ?>" min="1" max="999" onchange="onCartQtyInputChange('<?php echo esc_js($cart_item_key); ?>', this.value)" style="width: 44px; height: 32px; text-align: center; border: none; font-size: 13px; font-weight: 700; color: #1C1A17; outline: none; -moz-appearance: textfield;" />
                              <button type="button" class="btn-step-plus" onclick="stepCartQty('<?php echo esc_js($cart_item_key); ?>', 1)" style="width: 32px; height: 32px; background: none; border: none; border-left: 1px solid #EBE7DF; font-size: 16px; font-weight: 700; cursor: pointer; color: #1C1A17; display: flex; align-items: center; justify-content: center;">+</button>
                            </div>
                          </td>

                          <td class="product-subtotal" style="padding: 16px 20px 16px 14px; text-align: right; vertical-align: middle;">
                            <span class="row-subtotal-val" style="font-size: 15px; font-weight: 700; color: #1C1A17;">
                              ₹<span class="subtotal-val"><?php echo esc_html(number_format($line_total)); ?></span>
                            </span>
                          </td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>

            <!-- Empty Row Placeholder (shown if no items in WC and none in LocalStorage) -->
            <tr id="cart-empty-row" style="<?php echo $has_wc_items ? 'display: none;' : ''; ?>">
              <td colspan="6" style="text-align: center; padding: 60px 20px;">
                <p style="font-family: 'Playfair Display', Georgia, serif; font-size: 20px; color: #1C1A17; margin-bottom: 8px;">Your bag is empty.</p>
                <p style="font-size: 13px; color: #76706A; margin-bottom: 24px;">Browse loose gemstones, matched pairs, layouts and jewelry.</p>
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-square-dark" style="display: inline-block; padding: 14px 28px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">SHOP GEMSTONES →</a>
              </td>
            </tr>

            <?php do_action('woocommerce_cart_contents'); ?>

            <!-- Coupon & Clear Cart Row -->
            <tr id="cart-actions-row" style="<?php echo $has_wc_items ? '' : 'display: none;'; ?> border-top: 1px solid #EBE7DF;">
              <td colspan="6" class="actions" style="padding: 18px 20px; background: #FAF7F2;">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
                  <div style="display: flex; gap: 8px;">
                    <input type="text" name="coupon_code" class="input-text-custom" id="coupon_code" value="" placeholder="Coupon code" style="padding: 10px 14px; font-size: 12px; border: 1px solid #EBE7DF; background: #FFFFFF; outline: none; width: 160px;" />
                    <button type="submit" class="btn-outline-dark" name="apply_coupon" value="Apply coupon" style="padding: 10px 18px; font-size: 11px; font-weight: 700; cursor: pointer; border: 1px solid #1C1A17; background: #FFFFFF; text-transform: uppercase; letter-spacing: 0.05em;">APPLY</button>
                  </div>
                  <button type="submit" class="btn-square-dark" name="update_cart" value="Update cart" id="btn-native-update-cart" style="padding: 10px 20px; font-size: 11px; font-weight: 700; background: #1C1A17; color: #FFFFFF; border: none; cursor: pointer; text-transform: uppercase; letter-spacing: 0.05em;">UPDATE BAG</button>
                </div>
                <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
              </td>
            </tr>

            <?php do_action('woocommerce_after_cart_contents'); ?>
          </tbody>
        </table>
      </div>

      <!-- Right Column: Order Summary Card -->
      <div class="cart-totals-sidebar" id="cart-summary-sidebar" style="<?php echo $has_wc_items ? '' : 'display: none;'; ?>">
        <div class="cart-totals-card" style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 28px;">
          <h3 class="totals-heading" style="font-size: 13px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #1C1A17; margin: 0 0 18px; padding-bottom: 12px; border-bottom: 1px solid #EBE7DF;">Order Summary</h3>
          
          <div style="display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 14px; color: #1C1A17;">
            <span>Subtotal</span>
            <span style="font-weight: 700;">₹<span id="summary-subtotal-val"><?php echo esc_html(number_format((function_exists('WC') && WC()->cart) ? WC()->cart->get_subtotal() : 0)); ?></span></span>
          </div>

          <div style="display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 13px; color: #76706A;">
            <span>Insured Shipping</span>
            <span style="color: #1E9E52; font-weight: 600;">Calculated at checkout</span>
          </div>

          <div style="display: flex; justify-content: space-between; margin-top: 16px; padding-top: 16px; border-top: 1px solid #EBE7DF; font-size: 18px; font-weight: 700; color: #1C1A17;">
            <span>Total</span>
            <span style="color: #9C7C4C;">₹<span id="summary-total-val"><?php echo esc_html(number_format((function_exists('WC') && WC()->cart) ? WC()->cart->get_subtotal() : 0)); ?></span></span>
          </div>
          <div style="font-size: 11px; color: #76706A; margin-top: 4px; text-align: right;">(GST included where applicable)</div>

          <!-- Page 17 Master Brief Shipping Box -->
          <div class="cart-shipping-spec-info" style="background: #FAF7F2; border: 1px solid #EBE7DF; padding: 14px; margin: 20px 0; font-size: 11px; line-height: 1.6; color: #1C1A17;">
            <div style="font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: #9C7C4C;">SHIPPING & IMPORT INFORMATION</div>
            <div style="margin-bottom: 4px;"><strong>🇮🇳 India:</strong> Insured shipping · Delivery in 2–3 days (GST included)</div>
            <div style="margin-bottom: 4px;"><strong>🌐 Overseas ($/€/£):</strong> Insured DHL/FedEx/UPS · Delivery in 4–7 days</div>
            <div style="font-size: 10px; color: #76706A; margin-top: 6px; border-top: 1px dashed #EBE7DF; padding-top: 6px;">
              * Import duties depend on customer's country and are paid on delivery.
            </div>
          </div>

          <div style="display: flex; flex-direction: column; gap: 10px;">
            <a href="<?php echo esc_url($checkout_url); ?>" id="btn-proceed-checkout" class="btn-square-dark-full" style="display: block; width: 100%; padding: 15px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-align: center; text-transform: uppercase; text-decoration: none; border-radius: 0;">
              PROCEED TO CHECKOUT →
            </a>

            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I have items in my shopping bag and would like to confirm sizes and live photos before ordering.'); ?>" target="_blank" class="btn-whatsapp-outline-full" style="display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; padding: 12px; border: 1px solid #25D366; color: #25D366; background: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.05em; text-align: center; text-decoration: none; border-radius: 0;">
              <span>💬</span> Ask about order on WhatsApp
            </a>
          </div>

          <!-- Trust Badges (Strict: NO 7-day returns!) -->
          <div class="cart-trust-badges" style="margin-top: 20px; padding-top: 16px; border-top: 1px solid #EBE7DF; font-size: 11px; color: #76706A; display: flex; flex-direction: column; gap: 6px;">
            <div>◈ Lab certified loose gemstones</div>
            <div>◈ Insured door-step express delivery</div>
            <div>◈ Our guarantee: replaced or refunded within 48h if damaged</div>
          </div>
        </div>
      </div>

    </div>

    <?php do_action('woocommerce_after_cart_table'); ?>
  </form>

</div>

<?php do_action('woocommerce_after_cart'); ?>

<script>
// Vivaaz Gems Reactive Cart Engine
var vivaazRemovedItemCache = null;

function recalculateCartTotals() {
  var rows = document.querySelectorAll('.vivaaz-cart-row');
  var grandTotal = 0;
  var totalItems = 0;

  rows.forEach(function(row) {
    var basePrice = parseFloat(row.getAttribute('data-base-price')) || 120;
    var tier1Price = parseFloat(row.getAttribute('data-tier1')) || (basePrice * 0.88);
    var tier2Price = parseFloat(row.getAttribute('data-tier2')) || (basePrice * 0.77);
    var qtyInput = row.querySelector('.cart-qty-input');
    var qty = parseInt(qtyInput ? qtyInput.value : 1) || 1;
    totalItems += qty;

    // Determine tier
    var activeUnitPrice = basePrice;
    var tierBadge = row.querySelector('.row-tier-badge');
    if (qty >= 50) {
      activeUnitPrice = tier2Price;
      if (tierBadge) {
        tierBadge.textContent = '50+ price reached';
        tierBadge.style.display = 'block';
      }
    } else if (qty >= 10) {
      activeUnitPrice = tier1Price;
      if (tierBadge) {
        tierBadge.textContent = '10+ price reached';
        tierBadge.style.display = 'block';
      }
    } else {
      if (tierBadge) {
        tierBadge.style.display = 'none';
      }
    }

    var unitValEl = row.querySelector('.unit-val');
    if (unitValEl) {
      unitValEl.textContent = Math.round(activeUnitPrice).toLocaleString();
    }

    var rowTotal = activeUnitPrice * qty;
    grandTotal += rowTotal;

    var subtotalValEl = row.querySelector('.subtotal-val');
    if (subtotalValEl) {
      subtotalValEl.textContent = Math.round(rowTotal).toLocaleString();
    }
  });

  // Summary card
  var summarySubtotal = document.getElementById('summary-subtotal-val');
  var summaryTotal = document.getElementById('summary-total-val');
  if (summarySubtotal) summarySubtotal.textContent = Math.round(grandTotal).toLocaleString();
  if (summaryTotal) summaryTotal.textContent = Math.round(grandTotal).toLocaleString();

  // Item count label
  var countLabel = document.querySelector('#cart-item-count-label .count-num');
  if (countLabel) countLabel.textContent = totalItems;

  // Empty state handling
  var emptyRow = document.getElementById('cart-empty-row');
  var actionsRow = document.getElementById('cart-actions-row');
  var summarySidebar = document.getElementById('cart-summary-sidebar');
  if (rows.length === 0) {
    if (emptyRow) emptyRow.style.display = '';
    if (actionsRow) actionsRow.style.display = 'none';
    if (summarySidebar) summarySidebar.style.display = 'none';
  } else {
    if (emptyRow) emptyRow.style.display = 'none';
    if (actionsRow) actionsRow.style.display = '';
    if (summarySidebar) summarySidebar.style.display = '';
  }

  // Sync to LocalStorage
  syncCartToLocalStorage();
}

function stepCartQty(key, delta) {
  var row = document.querySelector('.vivaaz-cart-row[data-key="' + key + '"]');
  if (!row) return;
  var input = row.querySelector('.cart-qty-input');
  if (!input) return;
  var currentVal = parseInt(input.value) || 1;
  var newVal = Math.max(1, currentVal + delta);
  input.value = newVal;
  recalculateCartTotals();
}

function onCartQtyInputChange(key, val) {
  var row = document.querySelector('.vivaaz-cart-row[data-key="' + key + '"]');
  if (!row) return;
  var input = row.querySelector('.cart-qty-input');
  if (!input) return;
  var num = parseInt(val) || 1;
  input.value = Math.max(1, num);
  recalculateCartTotals();
}

function removeCartItem(key, name) {
  var row = document.querySelector('.vivaaz-cart-row[data-key="' + key + '"]');
  if (!row) return;

  vivaazRemovedItemCache = {
    element: row,
    nextSibling: row.nextSibling,
    key: key,
    name: name
  };

  row.remove();
  recalculateCartTotals();

  // Show undo banner
  var banner = document.getElementById('cart-undo-banner');
  var msg = document.getElementById('cart-undo-message');
  if (banner && msg) {
    msg.textContent = (name || 'Product') + ' removed.';
    banner.style.display = 'flex';
  }
}

document.getElementById('cart-undo-btn')?.addEventListener('click', function() {
  if (!vivaazRemovedItemCache) return;
  var tbody = document.getElementById('cart-items-body');
  if (vivaazRemovedItemCache.nextSibling && tbody.contains(vivaazRemovedItemCache.nextSibling)) {
    tbody.insertBefore(vivaazRemovedItemCache.element, vivaazRemovedItemCache.nextSibling);
  } else {
    var actionsRow = document.getElementById('cart-actions-row');
    tbody.insertBefore(vivaazRemovedItemCache.element, actionsRow);
  }
  vivaazRemovedItemCache = null;
  var banner = document.getElementById('cart-undo-banner');
  if (banner) banner.style.display = 'none';
  recalculateCartTotals();
});

function syncCartToLocalStorage() {
  try {
    var items = [];
    var rows = document.querySelectorAll('.vivaaz-cart-row');
    rows.forEach(function(row) {
      var key = row.getAttribute('data-key');
      var title = row.querySelector('.product-name a')?.textContent || row.querySelector('.product-name')?.textContent || 'Gemstone';
      var qty = parseInt(row.querySelector('.cart-qty-input')?.value) || 1;
      var basePrice = parseFloat(row.getAttribute('data-base-price')) || 120;
      items.push({
        key: key,
        title: title.trim(),
        quantity: qty,
        basePrice: basePrice
      });
    });
    localStorage.setItem('vivaaz_local_cart', JSON.stringify(items));
  } catch(e) {}
}

// Client-side LocalStorage Auto-Restore if WC Session was lost on Free Hosting
document.addEventListener("DOMContentLoaded", function() {
  var rows = document.querySelectorAll('.vivaaz-cart-row');
  if (rows.length === 0) {
    try {
      var saved = JSON.parse(localStorage.getItem('vivaaz_local_cart') || '[]');
      if (saved && saved.length > 0) {
        var tbody = document.getElementById('cart-items-body');
        var emptyRow = document.getElementById('cart-empty-row');
        var actionsRow = document.getElementById('cart-actions-row');

        saved.forEach(function(item, idx) {
          var key = item.key || ('local_' + idx);
          var basePrice = parseFloat(item.basePrice || item.price) || 120;
          var tier1 = Math.round(basePrice * 0.88);
          var tier2 = Math.round(basePrice * 0.77);
          var qty = parseInt(item.quantity) || 1;
          var activePrice = (qty >= 50) ? tier2 : ((qty >= 10) ? tier1 : basePrice);
          var lineTotal = activePrice * qty;

          var tr = document.createElement('tr');
          tr.className = 'woocommerce-cart-form__cart-item cart_item vivaaz-cart-row';
          tr.setAttribute('data-key', key);
          tr.setAttribute('data-base-price', basePrice);
          tr.setAttribute('data-tier1', tier1);
          tr.setAttribute('data-tier2', tier2);
          tr.style.borderBottom = '1px solid #EBE7DF';

          tr.innerHTML = `
            <td class="product-remove" style="padding: 16px 10px; text-align: center;">
              <button type="button" class="btn-remove-item" onclick="removeCartItem('${key}', '${item.title}')" style="background: none; border: none; font-size: 18px; color: #76706A; cursor: pointer; line-height: 1;">&times;</button>
            </td>
            <td class="product-thumbnail" style="padding: 16px 10px;">
              <img src="/wp-content/themes/flatsome-child/assets/images/ceylon-sapphire.jpg" style="width: 64px; height: 64px; object-fit: cover; border: 1px solid #EBE7DF; display: block;" alt="${item.title}">
            </td>
            <td class="product-name" style="padding: 16px 14px;">
              <div style="font-size: 14px; font-weight: 600; color: #1C1A17; margin-bottom: 4px;">${item.title}</div>
              <div style="font-size: 11px; color: #76706A; display: flex; gap: 8px; align-items: center;">
                <span style="background: #FAF7F2; border: 1px solid #EBE7DF; padding: 2px 6px; font-weight: 600; color: #9C7C4C;">${item.size || '7×5 mm'} · AAA</span>
                <span>SKU: ${item.sku || 'VG-LOT-01'}</span>
              </div>
            </td>
            <td class="product-price" style="padding: 16px 14px; text-align: right; vertical-align: middle;">
              <div class="row-unit-price" style="font-size: 13px; font-weight: 600; color: #1C1A17;">
                ₹<span class="unit-val">${activePrice.toLocaleString()}</span> each
              </div>
              <div class="row-tier-badge" style="font-size: 10px; color: #1E9E52; font-weight: 600; margin-top: 2px; ${qty >= 10 ? '' : 'display: none;'}">
                ${qty >= 50 ? '50+ price reached' : (qty >= 10 ? '10+ price reached' : '')}
              </div>
            </td>
            <td class="product-quantity" style="padding: 16px 14px; text-align: center; vertical-align: middle;">
              <div class="cart-stepper-control" style="display: inline-flex; align-items: center; border: 1px solid #1C1A17; background: #FFFFFF;">
                <button type="button" class="btn-step-minus" onclick="stepCartQty('${key}', -1)" style="width: 32px; height: 32px; background: none; border: none; border-right: 1px solid #EBE7DF; font-size: 16px; font-weight: 700; cursor: pointer; color: #1C1A17; display: flex; align-items: center; justify-content: center;">−</button>
                <input type="number" name="cart[${key}][qty]" class="cart-qty-input" value="${qty}" min="1" max="999" onchange="onCartQtyInputChange('${key}', this.value)" style="width: 44px; height: 32px; text-align: center; border: none; font-size: 13px; font-weight: 700; color: #1C1A17; outline: none;" />
                <button type="button" class="btn-step-plus" onclick="stepCartQty('${key}', 1)" style="width: 32px; height: 32px; background: none; border: none; border-left: 1px solid #EBE7DF; font-size: 16px; font-weight: 700; cursor: pointer; color: #1C1A17; display: flex; align-items: center; justify-content: center;">+</button>
              </div>
            </td>
            <td class="product-subtotal" style="padding: 16px 20px 16px 14px; text-align: right; vertical-align: middle;">
              <span class="row-subtotal-val" style="font-size: 15px; font-weight: 700; color: #1C1A17;">
                ₹<span class="subtotal-val">${lineTotal.toLocaleString()}</span>
              </span>
            </td>
          `;

          tbody.insertBefore(tr, actionsRow);
        });

        // Trigger background sync to server session
        try {
          fetch('/wp-admin/admin-ajax.php?action=vivaaz_sync_cart', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'items=' + encodeURIComponent(JSON.stringify(saved))
          });
        } catch(e) {}

        recalculateCartTotals();
      }
    } catch(e) {}
  }
});
</script>
