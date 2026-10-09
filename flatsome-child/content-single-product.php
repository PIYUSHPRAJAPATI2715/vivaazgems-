<?php
/**
 * Vivaaz Gems - Custom WooCommerce Single Product Template
 * Matches Pages 12-15 of the 23-page Master Brief & Page 13/15 Exact Layout
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;
$product_id = get_the_ID();
if (!$product && $product_id && function_exists('wc_get_product')) {
    $product = wc_get_product($product_id);
}
$sku = $product ? $product->get_sku() : '';
$price_html = ($product && $product->get_price_html()) ? $product->get_price_html() : '₹1,450';
$title = get_the_title() ?: 'Ceylon Blue Sapphire — 7×5 mm Oval';
$categories = ($product_id && !is_wp_error(wp_get_post_terms($product_id, 'product_cat'))) ? wp_get_post_terms($product_id, 'product_cat', array('fields' => 'names')) : array();
$cat_name = (!empty($categories) && is_array($categories)) ? strtoupper(implode(' · ', $categories)) : 'CEYLON SAPPHIRE · FACETED · CALIBRATED';

$main_img = get_the_post_thumbnail_url($product_id, 'large') ?: vivaaz_get_img_url('ceylon-sapphire.jpg');
$whatsapp_url = 'https://wa.me/919680552270?text=' . rawurlencode("Hi Vivaaz Gems, I would like to inquire about: " . $title . " (SKU: " . ($sku ?: 'N/A') . ")");

do_action('woocommerce_before_single_product');
?>

<div id="product-<?php echo esc_attr(get_the_ID() ?: '0'); ?>" <?php if (function_exists('wc_product_class')) { wc_product_class('single-product-custom-layout', $product); } else { echo 'class="product single-product-custom-layout"'; } ?>>
  
  <div class="single-product-grid-wrapper">
    
    <!-- LEFT COLUMN: GALLERY & LIGHT PHOTOS (PAGE 13 SPEC) -->
    <div class="single-product-gallery-col">
      <div class="main-featured-image-box">
        <span class="video-badge-overlay">▶ Video · seen on Instagram</span>
        <img id="main-gallery-view" src="<?php echo esc_url($main_img); ?>" alt="<?php echo esc_attr($title); ?>" class="main-gallery-img">
      </div>

      <!-- Light Photos Thumbnails (5 Items) -->
      <div class="light-photos-row">
        <div class="light-thumb-item active" onclick="changeProductImg('<?php echo esc_url($main_img); ?>', this)">
          <img src="<?php echo esc_url($main_img); ?>" alt="Video">
          <span>Video</span>
        </div>
        <div class="light-thumb-item" onclick="changeProductImg('<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>', this)">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Daylight">
          <span>❶ Daylight</span>
        </div>
        <div class="light-thumb-item" onclick="changeProductImg('<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>', this)">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Lamp">
          <span>Lamp</span>
        </div>
        <div class="light-thumb-item" onclick="changeProductImg('<?php echo esc_url(vivaaz_get_img_url('lab-certificate.jpg')); ?>', this)">
          <img src="<?php echo esc_url(vivaaz_get_img_url('lab-certificate.jpg')); ?>" alt="Certificate">
          <span>Certificate</span>
        </div>
        <div class="light-thumb-item" onclick="changeProductImg('<?php echo esc_url(vivaaz_get_img_url('true-size-grid.jpg')); ?>', this)">
          <img src="<?php echo esc_url(vivaaz_get_img_url('true-size-grid.jpg')); ?>" alt="True size">
          <span>❹ True size</span>
        </div>
      </div>
      <p class="light-photos-hint">Light photos: only the lights this stone was photographed in (Daylight · Indoor · Lamp — one, two or all three). Each photo has its light written small in the corner.</p>
    </div>

    <!-- RIGHT COLUMN: PRODUCT DETAILS & PURCHASING (PAGE 13 SPEC) -->
    <div class="single-product-info-col">
      <div class="product-category-tag"><?php echo esc_html($cat_name); ?></div>
      <h1 class="single-product-title"><?php echo esc_html($title); ?></h1>
      
      <div class="single-price-row">
        <span class="single-price-amount"><?php echo $price_html; ?></span>
        <span class="single-price-unit">per piece</span>
      </div>
      <p class="single-tax-info">Inclusive of taxes · India 2–3 days · worldwide 4–7 days · insured</p>

      <!-- Look & Best For Box (Page 13 / 14 Spec) -->
      <div class="look-bestfor-box">
        <div><span class="text-gold font-bold">Look</span> Deep royal blue with bright sparkle</div>
        <div><span class="text-gold font-bold">Best for</span> Rings, earrings, halo settings</div>
      </div>

      <!-- Add To Cart Form Wrapper -->
      <form class="cart" method="post" enctype="multipart/form-data" action="<?php echo esc_url(get_permalink($product_id)); ?>">
        <input type="hidden" name="vivaaz_add_to_cart" value="1">
        <input type="hidden" name="product_id" value="<?php echo esc_attr($product_id); ?>">

        <!-- Size Selector Buttons -->
        <div class="product-option-group" style="margin-top: 20px;">
          <div class="option-label-flex">
            <span>SIZE (MM)</span>
            <a href="#size-guide" class="btn-underline-link" style="font-size: 11px;">Size guide</a>
          </div>
          <div class="pill-buttons-row">
            <button type="button" class="size-option-btn size-pill-btn" onclick="selectSizeOption('5×3', this)">5×3</button>
            <button type="button" class="size-option-btn size-pill-btn" onclick="selectSizeOption('6×4', this)">6×4</button>
            <button type="button" class="size-option-btn size-pill-btn active" onclick="selectSizeOption('7×5', this)">7×5</button>
            <button type="button" class="size-option-btn size-pill-btn disabled" onclick="alert('8×6 is sold out! Please inquire on WhatsApp.'); return false;">8×6</button>
          </div>
          <input type="hidden" name="selected_size" id="selected-size-input" value="7×5">
          <div style="font-size: 11px; color: var(--color-text-muted); margin-top: 4px;">8×6 sold out — ask on WhatsApp when it is back →</div>
        </div>

        <!-- Pieces Buttons -->
        <div class="product-option-group" style="margin-top: 20px;">
          <div class="option-label-flex">
            <span>PIECES</span>
          </div>
          <div class="pill-buttons-row">
            <button type="button" class="pieces-option-btn size-pill-btn" onclick="selectPiecesOption(10, 1450, this)">10</button>
            <button type="button" class="pieces-option-btn size-pill-btn active" onclick="selectPiecesOption(20, 1450, this)">20</button>
            <button type="button" class="pieces-option-btn size-pill-btn" onclick="selectPiecesOption(50, 1320, this)">50</button>
            <button type="button" class="pieces-option-btn size-pill-btn" onclick="selectPiecesOption(100, 1210, this)">100</button>
            <button type="button" class="pieces-option-btn size-pill-btn" onclick="selectPiecesOption(500, 1210, this)">500</button>
            <button type="button" class="pieces-option-btn size-pill-btn" onclick="selectCustomPiecesOption(this)">Other</button>
          </div>
          <input type="hidden" name="quantity" id="selected-quantity-input" value="20">
          <div style="font-size: 11px; color: var(--color-text-muted); margin-top: 4px;">Price per piece — lower for more pieces</div>
          <div class="price-discount-table" style="margin-top: 10px;">
            <div class="discount-col active" id="tier-10">10+ pcs<br><strong>₹1,450</strong></div>
            <div class="discount-col" id="tier-50">50+ pcs<br><strong>₹1,320</strong></div>
            <div class="discount-col" id="tier-100">100+ pcs<br><strong>₹1,210</strong></div>
          </div>
        </div>

        <!-- Total Price & Add to Cart -->
        <div class="total-cart-action-wrapper" style="margin-top: 24px;">
          <div class="total-calculated-row">
            <span id="total-pieces-label">Total for 20 pieces</span>
            <span id="total-price-amount" style="font-size: 22px; font-weight: 700; color: var(--color-text-main);">₹29,000</span>
          </div>
          
          <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product_id); ?>" class="btn-gold-add-to-cart" style="display: flex; align-items: center; justify-content: center; width: 100%; padding: 15px; background: #9C7C4C; color: #fff; border: none; font-size: 13px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer; text-decoration: none;">
            ADD TO CART →
          </button>

          <!-- WhatsApp Button -->
          <a href="<?php echo esc_url($whatsapp_url); ?>" id="whatsapp-inquire-btn" target="_blank" class="btn-whatsapp-outline-full">
            <span>✆</span> Ask about this stone on WhatsApp
          </a>
        </div>

      </form>

      <!-- B2B & Video Call Box (Page 13 Spec) -->
      <div class="b2b-videocall-grid" style="margin-top: 24px;">
        <div class="b2b-box-item" onclick="window.open('<?php echo esc_url($whatsapp_url); ?>', '_blank')">
          <div style="display: flex; justify-content: space-between; align-items: center;"><strong style="color: var(--color-gold-label);">◇ Bulk / B2B price</strong><span>›</span></div>
          <div style="font-size: 11px; color: var(--color-text-muted); margin-top: 4px;">Parcels, calibrated lots, wholesale</div>
        </div>
        <div class="b2b-box-item" onclick="window.open('<?php echo esc_url($whatsapp_url); ?>', '_blank')">
          <div style="display: flex; justify-content: space-between; align-items: center;"><strong style="color: var(--color-gold-label);">▷ See it on a video call</strong><span>›</span></div>
          <div style="font-size: 11px; color: var(--color-text-muted); margin-top: 4px;">We show you the stone live</div>
        </div>
      </div>

      <!-- 4 Trust Badges (Page 13 Spec) -->
      <div class="single-trust-4grid" style="margin-top: 24px;">
        <div>◈ Lab certified</div>
        <div>◈ Insured shipping</div>
        <div>◈ Secure payment</div>
        <div>◈ 7-day returns</div>
      </div>

      <!-- Stone Passport Box (Page 13 / 14 Spec) -->
      <div class="stone-passport-container" style="margin-top: 24px;">
        <div class="stone-passport-head">
          <span style="font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--color-gold-label);">● STONE PASSPORT</span>
          <span style="font-size: 11px; color: var(--color-text-muted);">No. <?php echo esc_html($sku ?: 'VG-SPH-OV-0705'); ?></span>
        </div>
        <table class="stone-passport-table">
          <tr><td>Stone</td><td><?php echo esc_html($title); ?></td></tr>
          <tr><td>Origin</td><td>Sri Lanka (Ceylon)</td></tr>
          <tr><td>Treatment</td><td>Heated</td></tr>
          <tr><td>Size</td><td id="passport-size-val">7 × 5 mm</td></tr>
          <tr><td>Tolerance</td><td>± 0.2 mm</td></tr>
          <tr><td>Approx. weight</td><td>≈ 0.85 ct per piece</td></tr>
          <tr><td>Shape / cut</td><td>Oval, faceted (calibrated)</td></tr>
          <tr><td>Colour / clarity</td><td>Royal blue · Eye-clean</td></tr>
          <tr><td>Quality</td><td>AAA · colour matched across lot</td></tr>
          <tr><td>Certificate</td><td><a href="#" style="color: var(--color-gold-label); text-decoration: underline;">Lab report for the lot (view)</a></td></tr>
        </table>
        <div style="font-size: 10px; color: var(--color-text-muted); margin-top: 12px; font-style: italic;">Height is not listed for calibrated lots (it varies piece to piece).</div>
      </div>

      <!-- Accordion Details (Page 14 Spec) -->
      <div class="product-accordion-wrapper" style="margin-top: 24px;">
        <details open>
          <summary style="font-weight: 700; cursor: pointer; padding: 10px 0; border-bottom: 1px solid var(--color-border-light);">Shipping & returns</summary>
          <p style="font-size: 12px; color: var(--color-text-muted); padding: 10px 0;">India 2–3 days. International 4–7 days insured. 7-day easy returns.</p>
        </details>
        <details style="margin-top: 10px;">
          <summary style="font-weight: 700; cursor: pointer; padding: 10px 0; border-bottom: 1px solid var(--color-border-light);">Care & setting notes</summary>
          <p style="font-size: 12px; color: var(--color-text-muted); padding: 10px 0;">Clean with warm soapy water and soft brush. Ideal for claw and bezel settings.</p>
        </details>
        <details style="margin-top: 10px;">
          <summary style="font-weight: 700; cursor: pointer; padding: 10px 0; border-bottom: 1px solid var(--color-border-light);">About Ceylon sapphires</summary>
          <p style="font-size: 12px; color: var(--color-text-muted); padding: 10px 0;">Renowned worldwide for vibrant cornflower and royal blue hues with exceptional clarity.</p>
        </details>
      </div>

    </div>

  </div>

  <!-- Mobile Sticky Bottom Bar (Page 15 Spec) -->
  <div class="mobile-sticky-product-bar">
    <div class="sticky-price-text" id="mobile-sticky-price">₹1,450 / pc</div>
    <a href="javascript:void(0);" onclick="document.querySelector('button[name=add-to-cart]').click();" class="sticky-add-cart-btn">ADD TO CART</a>
    <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" class="sticky-whatsapp-btn">✆</a>
  </div>

</div>

<script>
  function changeProductImg(src, element) {
    document.getElementById('main-gallery-view').src = src;
    var thumbs = document.querySelectorAll('.light-thumb-item');
    thumbs.forEach(function(t) { t.classList.remove('active'); });
    element.classList.add('active');
  }

  function selectSizeOption(sizeStr, btn) {
    var sizeBtns = document.querySelectorAll('.size-option-btn');
    sizeBtns.forEach(function(b) { b.classList.remove('active'); });
    btn.classList.add('active');
    
    var hiddenInput = document.getElementById('selected-size-input');
    if (hiddenInput) hiddenInput.value = sizeStr;
    
    var passportSize = document.getElementById('passport-size-val');
    if (passportSize) passportSize.innerText = sizeStr + ' mm';
  }

  function selectPiecesOption(count, unitPrice, btn) {
    var piecesBtns = document.querySelectorAll('.pieces-option-btn');
    piecesBtns.forEach(function(b) { b.classList.remove('active'); });
    btn.classList.add('active');
    
    var qtyInput = document.getElementById('selected-quantity-input');
    if (qtyInput) qtyInput.value = count;
    
    var total = count * unitPrice;
    var formattedTotal = '₹' + total.toLocaleString('en-IN');
    
    var piecesLabel = document.getElementById('total-pieces-label');
    if (piecesLabel) piecesLabel.innerText = 'Total for ' + count + ' pieces';
    
    var priceAmt = document.getElementById('total-price-amount');
    if (priceAmt) priceAmt.innerText = formattedTotal;

    // Highlight tier
    document.querySelectorAll('.discount-col').forEach(function(c) { c.classList.remove('active'); });
    if (count >= 100) {
      var t100 = document.getElementById('tier-100');
      if (t100) t100.classList.add('active');
    } else if (count >= 50) {
      var t50 = document.getElementById('tier-50');
      if (t50) t50.classList.add('active');
    } else {
      var t10 = document.getElementById('tier-10');
      if (t10) t10.classList.add('active');
    }
  }

  function selectCustomPiecesOption(btn) {
    var customQty = prompt("Enter required number of pieces:", "25");
    if (customQty && !isNaN(customQty) && parseInt(customQty) > 0) {
      var qty = parseInt(customQty);
      var unitPrice = 1450;
      if (qty >= 100) unitPrice = 1210;
      else if (qty >= 50) unitPrice = 1320;
      selectPiecesOption(qty, unitPrice, btn);
    }
  }
</script>

<?php do_action('woocommerce_after_single_product'); ?>
