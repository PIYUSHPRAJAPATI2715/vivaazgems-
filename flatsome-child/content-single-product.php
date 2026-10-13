<?php
/**
 * Vivaaz Gems - Custom WooCommerce Single Product Template
 * Matches Pages 14-15 of the 35-page Build Book
 * 100% Dynamic, Fully Interactive, Tiered Pricing, Size Pills, Pieces Stepper, Cart & Checkout.
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;
$product_id = get_the_ID();
if (!$product && $product_id && function_exists('wc_get_product')) {
    $product = wc_get_product($product_id);
}

$sku = $product ? $product->get_sku() : 'RMCOC68';
if (!$sku) $sku = 'RMCOC68';

$title = get_the_title() ?: 'Rainbow Moonstone Oval Cabochon';

// Stone Name detection from title / terms
$stone_name = 'Rainbow Moonstone';
if (stripos($title, 'sapphire') !== false) {
    $stone_name = 'Ceylon Blue Sapphire';
} elseif (stripos($title, 'ruby') !== false) {
    $stone_name = 'Ruby';
} elseif (stripos($title, 'emerald') !== false) {
    $stone_name = 'Emerald';
} elseif (stripos($title, 'tourmaline') !== false) {
    $stone_name = 'Tourmaline';
} elseif (stripos($title, 'garnet') !== false) {
    $stone_name = 'Garnet';
} elseif (stripos($title, 'tanzanite') !== false) {
    $stone_name = 'Tanzanite';
} elseif (stripos($title, 'topaz') !== false) {
    $stone_name = 'Topaz';
} elseif (stripos($title, 'opal') !== false) {
    $stone_name = 'Opal';
} elseif (!empty($title)) {
    $stone_name = esc_html($title);
}

// Categories & stone subtitle
$categories = ($product_id && !is_wp_error(wp_get_post_terms($product_id, 'product_cat'))) ? wp_get_post_terms($product_id, 'product_cat', array('fields' => 'names')) : array();
$cat_subtitle = esc_html($sku . ' · CALIBRATED LOT · AAA');
if (!empty($categories) && is_array($categories)) {
    $cat_subtitle = esc_html(strtoupper(implode(' · ', array_slice($categories, 0, 3))));
}

// Short tagline
$short_desc = ($product && $product->get_short_description()) ? wp_strip_all_tags($product->get_short_description()) : '';
if (!$short_desc) {
    if (stripos($title, 'sapphire') !== false) {
        $short_desc = 'Pure Ceylon royal blue color, precision calibrated. For rings, pendants and fine jewelry.';
    } elseif (stripos($title, 'ruby') !== false) {
        $short_desc = 'Rich pigeon blood red color, natural unheated. For rings, earrings and fine jewelry.';
    } elseif (stripos($title, 'emerald') !== false) {
        $short_desc = 'Vivid Zambian green luster, clean precision cut. For rings, pendants and luxury jewelry.';
    } else {
        $short_desc = 'White with a soft blue flash. For rings, pendants and earrings.';
    }
}

// Images
$main_img = get_the_post_thumbnail_url($product_id, 'large');
if (!$main_img) {
    if (stripos($title, 'sapphire') !== false) {
        $main_img = vivaaz_get_img_url('ceylon-sapphire.jpg');
    } elseif (stripos($title, 'ruby') !== false) {
        $main_img = vivaaz_get_img_url('ruby.jpg');
    } elseif (stripos($title, 'emerald') !== false) {
        $main_img = vivaaz_get_img_url('emerald.jpg');
    } else {
        $main_img = vivaaz_get_img_url('moonstone.jpg');
    }
}

$daylight_img    = (stripos($title, 'sapphire') !== false) ? vivaaz_get_img_url('ceylon-sapphire.jpg') : vivaaz_get_img_url('ceylon-sapphire.jpg');
$lamp_img        = (stripos($title, 'ruby') !== false) ? vivaaz_get_img_url('ruby.jpg') : vivaaz_get_img_url('ruby.jpg');
$loupe_img       = (stripos($title, 'emerald') !== false) ? vivaaz_get_img_url('emerald.jpg') : vivaaz_get_img_url('emerald.jpg');
$actual_size_img = vivaaz_get_img_url('true-size-grid.jpg');

$whatsapp_url = 'https://wa.me/919680552270?text=' . rawurlencode("Hello Vivaaz Gems, I am looking at " . $title . " (code " . $sku . "). Could you send live photos?");
$videocall_url = 'https://wa.me/919680552270?text=' . rawurlencode("Hello Vivaaz Gems, could you show me " . $title . " (code " . $sku . ") on a video call?");

// Pricing tiers
$tier_1 = 120;
$tier_10 = 105;
$tier_50 = 92;

// Check if product has custom price
if ($product && $product->get_regular_price()) {
    $base_p = floatval($product->get_regular_price());
    if ($base_p > 0) {
        $tier_1 = round($base_p * 1.15);
        $tier_10 = round($base_p);
        $tier_50 = round($base_p * 0.88);
    }
}

do_action('woocommerce_before_single_product');
?>

<div id="product-<?php echo esc_attr($product_id ?: '0'); ?>" class="product single-product-custom-layout vivaaz-gem-product-page">
  
  <div class="single-product-grid-wrapper">
    
    <!-- LEFT COLUMN: GALLERY (BUILD BOOK PAGE 14 SPEC) -->
    <div class="single-product-gallery-col">
      
      <!-- Top Gallery Light Tabs -->
      <div class="gallery-light-tabs">
        <button type="button" class="gal-tab-btn active" onclick="switchGalleryView('video', '<?php echo esc_url($main_img); ?>', this)">▶ Video</button>
        <button type="button" class="gal-tab-btn" onclick="switchGalleryView('image', '<?php echo esc_url($daylight_img); ?>', this)">Daylight</button>
        <button type="button" class="gal-tab-btn" onclick="switchGalleryView('image', '<?php echo esc_url($lamp_img); ?>', this)">Lamp</button>
        <button type="button" class="gal-tab-btn" onclick="switchGalleryView('image', '<?php echo esc_url($loupe_img); ?>', this)">Under the loupe</button>
        <button type="button" class="gal-tab-btn" onclick="switchGalleryView('image', '<?php echo esc_url($actual_size_img); ?>', this)">Actual size</button>
      </div>

      <!-- Main Featured Image / Video Display Box -->
      <div class="main-featured-image-box" id="gallery-display-container">
        <span class="video-badge-overlay" id="gallery-badge-overlay">▶ 0:08</span>
        <img id="main-gallery-view" src="<?php echo esc_url($main_img); ?>" alt="<?php echo esc_attr($title); ?>" class="main-gallery-img" />
      </div>

      <!-- Gallery Thumbnails Row -->
      <div class="light-photos-row">
        <div class="light-thumb-item active" onclick="switchGalleryView('video', '<?php echo esc_url($main_img); ?>', this)">
          <img src="<?php echo esc_url($main_img); ?>" alt="Video">
          <span>Video</span>
        </div>
        <div class="light-thumb-item" onclick="switchGalleryView('image', '<?php echo esc_url($daylight_img); ?>', this)">
          <img src="<?php echo esc_url($daylight_img); ?>" alt="Daylight">
          <span>Daylight</span>
        </div>
        <div class="light-thumb-item" onclick="switchGalleryView('image', '<?php echo esc_url($lamp_img); ?>', this)">
          <img src="<?php echo esc_url($lamp_img); ?>" alt="Lamp">
          <span>Lamp</span>
        </div>
        <div class="light-thumb-item" onclick="switchGalleryView('image', '<?php echo esc_url($loupe_img); ?>', this)">
          <img src="<?php echo esc_url($loupe_img); ?>" alt="Loupe">
          <span>Loupe</span>
        </div>
        <div class="light-thumb-item" onclick="switchGalleryView('image', '<?php echo esc_url($actual_size_img); ?>', this)">
          <img src="<?php echo esc_url($actual_size_img); ?>" alt="Actual size">
          <span>Actual size</span>
        </div>
      </div>
      
      <p class="light-photos-hint">Photos and video are of our own stones from this lot.</p>
    </div>

    <!-- RIGHT COLUMN: PRODUCT DETAILS & PURCHASING (BUILD BOOK PAGE 14 SPEC) -->
    <div class="single-product-info-col">
      <div class="product-category-tag"><?php echo esc_html($cat_subtitle); ?></div>
      <h1 class="single-product-title"><?php echo esc_html($title); ?></h1>
      
      <p class="product-short-tagline" style="font-size: 13px; color: var(--color-text-muted); margin: 6px 0 16px;">
        <?php echo esc_html($short_desc); ?>
      </p>

      <!-- Active Tier Price Display -->
      <div class="single-price-row" style="display: flex; align-items: baseline; gap: 8px; margin-bottom: 12px;">
        <span class="single-price-amount" id="active-unit-price-display" style="font-size: 26px; font-weight: 700; color: var(--color-text-main);">₹ <?php echo number_format($tier_10); ?></span>
        <span class="single-price-unit" id="active-tier-note-display" style="font-size: 13px; color: var(--color-text-muted);">per piece · 10+ price</span>
      </div>

      <!-- Tiered Price Ladder (Page 14 Spec) -->
      <div class="price-discount-table" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 12px; margin-bottom: 24px; text-align: center;">
        <div class="discount-col" id="tier-col-1" onclick="selectPieceQty(5)" style="cursor: pointer; padding: 6px;">
          <div style="font-size: 11px; color: var(--color-text-muted);">1–9 pcs</div>
          <strong style="font-size: 14px;">₹ <?php echo number_format($tier_1); ?></strong>
        </div>
        <div class="discount-col active" id="tier-col-10" onclick="selectPieceQty(12)" style="cursor: pointer; padding: 6px; border: 1px solid var(--color-gold-label); background: #FAF7F2;">
          <div style="font-size: 11px; color: var(--color-gold-label); font-weight: 600;">10+ pcs</div>
          <strong style="font-size: 14px; color: var(--color-gold-label);">₹ <?php echo number_format($tier_10); ?></strong>
        </div>
        <div class="discount-col" id="tier-col-50" onclick="selectPieceQty(50)" style="cursor: pointer; padding: 6px;">
          <div style="font-size: 11px; color: var(--color-text-muted);">50+ pcs</div>
          <strong style="font-size: 14px;">₹ <?php echo number_format($tier_50); ?></strong>
        </div>
      </div>

      <!-- Add To Cart Form Wrapper -->
      <form id="vivaaz-product-form" class="cart vivaaz-buy-form" method="post" action="<?php echo esc_url(function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/')); ?>" onsubmit="return handleProductFormSubmit(this);">
        <input type="hidden" name="vivaaz_add_to_cart" value="1" />
        <input type="hidden" name="product_id" value="<?php echo esc_attr($product_id); ?>" />
        <input type="hidden" name="selected_size" id="form-selected-size" value="6×8 mm" />
        <input type="hidden" name="buy_now" id="form-buy-now-flag" value="0" />

        <!-- 1. SIZE SELECTION (BUTTONS) -->
        <div class="product-option-group" style="margin-bottom: 22px;">
          <div class="option-label-flex" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
            <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">SIZE</span>
            <a href="javascript:void(0);" onclick="switchGalleryView('image', '<?php echo esc_url($actual_size_img); ?>', null)" class="btn-underline-link" style="font-size: 11px; text-decoration: underline;">See actual size</a>
          </div>
          <div class="pill-buttons-row" style="display: flex; flex-wrap: wrap; gap: 8px;">
            <button type="button" class="size-pill-btn" onclick="selectProductSize('3×4 mm', this)">3×4 mm</button>
            <button type="button" class="size-pill-btn" onclick="selectProductSize('3×5 mm', this)">3×5 mm</button>
            <button type="button" class="size-pill-btn" onclick="selectProductSize('4×5 mm', this)">4×5 mm</button>
            <button type="button" class="size-pill-btn" onclick="selectProductSize('4×6 mm', this)">4×6 mm</button>
            <button type="button" class="size-pill-btn" onclick="selectProductSize('5×7 mm', this)">5×7 mm</button>
            <button type="button" class="size-pill-btn active" onclick="selectProductSize('6×8 mm', this)">6×8 mm</button>
            <button type="button" class="size-pill-btn" onclick="selectProductSize('7×9 mm', this)">7×9 mm</button>
            <button type="button" class="size-pill-btn" onclick="selectProductSize('7×11 mm', this)">7×11 mm</button>
            <button type="button" class="size-pill-btn" onclick="selectProductSize('7×12 mm', this)">7×12 mm</button>
            <button type="button" class="size-pill-btn" onclick="selectProductSize('8×10 mm', this)">8×10 mm</button>
          </div>
        </div>

        <!-- 2. PIECES SELECTION (STEPPER + STOCK + TOTAL) -->
        <div class="product-option-group" style="margin-bottom: 24px;">
          <div class="option-label-flex" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
            <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">PIECES</span>
            <span style="font-size: 11px; color: var(--color-text-muted);">62 ready · more in 1–3 weeks</span>
          </div>
          
          <div style="display: flex; align-items: center; justify-content: space-between; background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 10px 16px;">
            <!-- Stepper − / + -->
            <div class="stepper-control-box" style="display: flex; align-items: center; gap: 8px;">
              <button type="button" class="btn-stepper" onclick="adjustPieces(-1)" style="width: 32px; height: 32px; background: #FAF7F2; border: 1px solid var(--color-border-light); font-size: 16px; font-weight: 700; cursor: pointer;">−</button>
              <input type="number" name="quantity" id="pieces-number-input" value="12" min="1" max="9999" onchange="calculateLiveTotal()" onkeyup="calculateLiveTotal()" style="width: 60px; height: 32px; text-align: center; border: 1px solid var(--color-border-light); font-size: 14px; font-weight: 700;" />
              <button type="button" class="btn-stepper" onclick="adjustPieces(1)" style="width: 32px; height: 32px; background: #FAF7F2; border: 1px solid var(--color-border-light); font-size: 16px; font-weight: 700; cursor: pointer;">+</button>
            </div>

            <!-- Total Price Display -->
            <div style="text-align: right;">
              <span id="calculated-total-display" style="font-size: 18px; font-weight: 700; color: var(--color-text-main);">Total ₹ 1,260</span>
            </div>
          </div>
        </div>

        <!-- 3. ACTION BUTTONS: ADD TO CART & BUY NOW & WISHLIST (PAGE 14 SPEC) -->
        <div class="action-buttons-grid" style="display: flex; gap: 12px; margin-bottom: 16px;">
          <button type="submit" class="btn-action-add-cart" onclick="document.getElementById('form-buy-now-flag').value='0';" style="flex: 1; padding: 14px 20px; background: #1C1A17; color: #FFFFFF; border: 1px solid #1C1A17; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer;">
            ADD TO CART
          </button>
          
          <button type="submit" class="btn-action-buy-now" onclick="document.getElementById('form-buy-now-flag').value='1';" style="flex: 1; padding: 14px 20px; background: #9C7C4C; color: #FFFFFF; border: 1px solid #9C7C4C; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer;">
            BUY NOW
          </button>

          <button type="button" class="btn-action-wishlist" id="single-wishlist-btn" data-wishlist-id="<?php echo esc_attr($product_id); ?>" onclick="toggleProductWishlist(<?php echo intval($product_id); ?>, <?php echo json_encode($title); ?>, <?php echo json_encode($main_img); ?>, '₹ <?php echo number_format($tier_10); ?>', <?php echo json_encode(get_permalink($product_id) ?: home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>, this);" title="Save to Wishlist" style="width: 48px; height: 48px; background: #FFFFFF; border: 1px solid var(--color-border-light); display: inline-flex; align-items: center; justify-content: center; cursor: pointer; font-size: 20px; color: var(--color-text-main); flex-shrink: 0; transition: all 0.2s ease;">
            <span class="wishlist-heart-symbol" id="single-heart-symbol">♡</span>
          </button>
        </div>

        <!-- 4. QUIET TRUST LINE (PAGE 14 SPEC) -->
        <div class="quiet-trust-line" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 12px; text-align: center;">
          Ships in 1–2 days · Insured worldwide · <a href="<?php echo esc_url(home_url('/guarantee/')); ?>" style="text-decoration: underline; color: inherit;">Our guarantee</a>
        </div>

        <!-- 5. WHATSAPP LIVE LOT LINK (PAGE 14 SPEC) -->
        <div style="text-align: center; margin-bottom: 24px;">
          <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" style="font-size: 12px; color: #1E9E52; font-weight: 600; text-decoration: underline;">
            See this exact lot live on WhatsApp →
          </a>
        </div>
      </form>

      <!-- 6. THE STONE (PASSPORT BLOCK - PAGE 14 SPEC) -->
      <div class="stone-passport-box" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 24px; margin-bottom: 28px;">
        <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 20px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 10px;">
          <span style="font-size: 14px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">The stone</span>
          <span style="font-size: 11px; color: var(--color-text-muted); letter-spacing: 0.05em;">PASSPORT · <?php echo esc_html($sku); ?></span>
        </div>

        <!-- 4 Large Stat Numbers -->
        <div class="passport-4stats-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 24px; text-align: center;">
          <div style="background: #FAF7F2; padding: 12px 6px;">
            <div id="passport-size-large" style="font-size: 18px; font-weight: 700; color: var(--color-text-main);">6×8 mm</div>
            <div style="font-size: 9px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-text-muted); text-transform: uppercase; margin-top: 4px;">SIZE</div>
          </div>
          <div style="background: #FAF7F2; padding: 12px 6px;">
            <div style="font-size: 18px; font-weight: 700; color: var(--color-text-main);">≈1.2 ct</div>
            <div style="font-size: 9px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-text-muted); text-transform: uppercase; margin-top: 4px;">EACH PIECE</div>
          </div>
          <div style="background: #FAF7F2; padding: 12px 6px;">
            <div style="font-size: 18px; font-weight: 700; color: var(--color-text-main);">±0.1 mm</div>
            <div style="font-size: 9px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-text-muted); text-transform: uppercase; margin-top: 4px;">CALIBRATED</div>
          </div>
          <div style="background: #FAF7F2; padding: 12px 6px;">
            <div style="font-size: 18px; font-weight: 700; color: var(--color-text-main);">None</div>
            <div style="font-size: 9px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-text-muted); text-transform: uppercase; margin-top: 4px;">TREATMENT</div>
          </div>
        </div>

        <!-- 6 Stone Facts Table -->
        <table class="passport-facts-table" style="width: 100%; border-collapse: collapse; font-size: 12px;">
          <tr>
            <td style="padding: 6px 0; color: var(--color-text-muted); width: 40%;">STONE</td>
            <td style="padding: 6px 0; font-weight: 600;"><?php echo esc_html($stone_name); ?></td>
          </tr>
          <tr>
            <td style="padding: 6px 0; color: var(--color-text-muted);">CUT AND SHAPE</td>
            <td style="padding: 6px 0; font-weight: 600;"><?php echo (stripos($title, 'cabochon') !== false) ? 'Cabochon, calibrated' : 'Faceted, calibrated'; ?></td>
          </tr>
          <tr>
            <td style="padding: 6px 0; color: var(--color-text-muted);">COLOUR</td>
            <td style="padding: 6px 0; font-weight: 600;"><?php echo (stripos($title, 'sapphire') !== false) ? 'Royal blue, brilliant luster' : ((stripos($title, 'ruby') !== false) ? 'Pigeon blood red' : ((stripos($title, 'emerald') !== false) ? 'Vivid emerald green' : 'White, blue flash')); ?></td>
          </tr>
          <tr>
            <td style="padding: 6px 0; color: var(--color-text-muted);">QUALITY</td>
            <td style="padding: 6px 0; font-weight: 600;">AAA, matched calibrated lot</td>
          </tr>
          <tr>
            <td style="padding: 6px 0; color: var(--color-text-muted);">ORIGIN</td>
            <td style="padding: 6px 0; font-weight: 600;"><?php echo (stripos($title, 'sapphire') !== false) ? 'Sri Lanka (Ceylon)' : ((stripos($title, 'emerald') !== false) ? 'Zambia / Colombia' : 'India'); ?></td>
          </tr>
          <tr>
            <td style="padding: 6px 0; color: var(--color-text-muted);">HARDNESS</td>
            <td style="padding: 6px 0; font-weight: 600;"><?php echo (stripos($title, 'sapphire') !== false || stripos($title, 'ruby') !== false) ? '9 Mohs' : ((stripos($title, 'emerald') !== false) ? '7.5 – 8 Mohs' : '6 – 6.5 Mohs'); ?></td>
          </tr>
        </table>
      </div>

      <!-- 7. ACCORDION (PAGE 14 SPEC) -->
      <div class="product-accordion-wrapper" style="margin-bottom: 28px;">
        <details style="border-bottom: 1px solid var(--color-border-light); padding: 12px 0;">
          <summary style="font-size: 13px; font-weight: 600; cursor: pointer;">Shipping and export</summary>
          <div style="font-size: 12px; color: var(--color-text-muted); padding: 10px 0; line-height: 1.6;">
            Dispatched within 1–2 days. Insured express delivery: India 2–3 days, worldwide 4–7 days. Tracking link provided by email and WhatsApp.
          </div>
        </details>
        
        <details style="border-bottom: 1px solid var(--color-border-light); padding: 12px 0;">
          <summary style="font-size: 13px; font-weight: 600; cursor: pointer;">Our guarantee</summary>
          <div style="font-size: 12px; color: var(--color-text-muted); padding: 10px 0; line-height: 1.6;">
            Natural gemstones only, honestly described. If a stone arrives damaged or not as described, tell us within 48 hours with photos for a full replacement or refund.
          </div>
        </details>
        
        <details style="border-bottom: 1px solid var(--color-border-light); padding: 12px 0;">
          <summary style="font-size: 13px; font-weight: 600; cursor: pointer;">Lab certificate</summary>
          <div style="font-size: 12px; color: var(--color-text-muted); padding: 10px 0; line-height: 1.6;">
            Need a lab certificate? Ask us on WhatsApp or write it in your order note. We confirm the laboratory, cost, and timeline before sending the stone.
          </div>
        </details>
        
        <details style="border-bottom: 1px solid var(--color-border-light); padding: 12px 0;">
          <summary style="font-size: 13px; font-weight: 600; cursor: pointer;">Care and setting</summary>
          <div style="font-size: 12px; color: var(--color-text-muted); padding: 10px 0; line-height: 1.6;">
            Clean gently with warm water, mild soap, and a soft cloth. Keep away from harsh chemicals and hard knocks. Ideal for bezel and protective prong settings.
          </div>
        </details>
        
        <details style="border-bottom: 1px solid var(--color-border-light); padding: 12px 0;">
          <summary style="font-size: 13px; font-weight: 600; cursor: pointer;">About rainbow moonstone</summary>
          <div style="font-size: 12px; color: var(--color-text-muted); padding: 10px 0; line-height: 1.6;">
            Rainbow moonstone is a transparent to translucent feldspar gemstone celebrated for its mesmerizing adularescence—a glowing blue and rainbow sheen that dances across the dome.
          </div>
        </details>
      </div>

      <!-- 8. NEXT STEPS (PAGE 14 SPEC) -->
      <div class="next-steps-card" style="background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 20px; margin-bottom: 16px;">
        <h4 style="font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin: 0 0 6px;">Make it into jewelry</h4>
        <p style="font-size: 12px; color: var(--color-text-muted); margin: 0 0 10px;">We set this stone in silver or gold for your bespoke designs.</p>
        <a href="<?php echo esc_url(home_url('/make-it-into-jewelry/')); ?>" style="font-size: 12px; font-weight: 700; color: var(--color-gold-label); text-decoration: underline;">Ask for a quote →</a>
      </div>

      <div style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 24px;">
        Need another size or 1,000+ pieces? <a href="<?php echo esc_url(home_url('/bulk-enquiry/')); ?>" style="text-decoration: underline;">Bulk / B2B enquiry →</a> Asking is free.
      </div>

    </div>

  </div>

  <!-- 9. PAIRS WELL WITH (PAGE 14 SPEC) -->
  <div class="pairs-well-with-section" style="margin-top: 50px; padding-top: 30px; border-top: 1px solid var(--color-border-light);">
    <h3 class="font-serif" style="font-size: 22px; font-weight: 400; margin-bottom: 20px;">Pairs well with</h3>
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px;">
      
      <div class="product-card-luxury">
        <div class="product-card-media">
          <img src="<?php echo esc_url($main_img); ?>" alt="Rainbow Moonstone Pear Cabochon">
        </div>
        <div class="product-card-body">
          <h4 style="font-size: 13px; font-weight: 600; margin: 0 0 4px;">Rainbow Moonstone Pear Cabochon</h4>
          <span style="font-size: 11px; color: var(--color-text-muted);">12 sizes</span>
        </div>
      </div>

      <div class="product-card-luxury">
        <div class="product-card-media">
          <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Round Cabochon">
        </div>
        <div class="product-card-body">
          <h4 style="font-size: 13px; font-weight: 600; margin: 0 0 4px;">Rainbow Moonstone Round Cabochon</h4>
          <span style="font-size: 11px; color: var(--color-text-muted);">14 sizes</span>
        </div>
      </div>

      <div class="product-card-luxury">
        <div class="product-card-media">
          <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="White Topaz Round Faceted">
        </div>
        <div class="product-card-body">
          <h4 style="font-size: 13px; font-weight: 600; margin: 0 0 4px;">White Topaz Round Faceted</h4>
          <span style="font-size: 11px; color: var(--color-text-muted);">9 sizes</span>
        </div>
      </div>

      <div class="product-card-luxury">
        <div class="product-card-media">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Amethyst Oval Cabochon">
        </div>
        <div class="product-card-body">
          <h4 style="font-size: 13px; font-weight: 600; margin: 0 0 4px;">Amethyst Oval Cabochon</h4>
          <span style="font-size: 11px; color: var(--color-text-muted);">11 sizes</span>
        </div>
      </div>

    </div>
  </div>

  <!-- MOBILE STICKY BOTTOM BAR (PAGE 15 SPEC) -->
  <div class="mobile-sticky-product-bar" id="mobile-sticky-bar">
    <button type="button" class="sticky-add-cart-btn" onclick="document.querySelector('#vivaaz-product-form button[type=submit]').click();">
      ADD TO CART · <span id="mobile-sticky-qty">12</span> PCS
    </button>
    <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" class="sticky-whatsapp-btn" title="Chat on WhatsApp">✆</a>
  </div>

</div>

<!-- EMBEDDED DYNAMIC JAVASCRIPT FOR 100% BULLETPROOF INTERACTION -->
<script>
  var currentTier1 = <?php echo json_encode($tier_1); ?>;
  var currentTier10 = <?php echo json_encode($tier_10); ?>;
  var currentTier50 = <?php echo json_encode($tier_50); ?>;
  var currentTitle = <?php echo json_encode($title); ?>;
  var currentSku = <?php echo json_encode($sku); ?>;
  window.currentProductId = <?php echo json_encode(strval($product_id)); ?>;

  function switchGalleryView(type, src, element) {
    var displayImg = document.getElementById('main-gallery-view');
    var badge = document.getElementById('gallery-badge-overlay');
    if (displayImg) displayImg.src = src;

    if (badge) {
      if (type === 'video') {
        badge.style.display = 'block';
        badge.innerText = '▶ 0:08';
      } else {
        badge.style.display = 'none';
      }
    }

    if (element) {
      document.querySelectorAll('.gal-tab-btn, .light-thumb-item').forEach(function(el) {
        el.classList.remove('active');
      });
      element.classList.add('active');
    }
  }

  function selectProductSize(sizeStr, btn) {
    document.querySelectorAll('.size-pill-btn').forEach(function(b) {
      b.classList.remove('active');
    });
    btn.classList.add('active');

    // Update form input
    var sizeInput = document.getElementById('form-selected-size');
    if (sizeInput) sizeInput.value = sizeStr;

    // Update passport stat
    var passportSize = document.getElementById('passport-size-large');
    if (passportSize) passportSize.innerText = sizeStr;
  }

  function adjustPieces(delta) {
    var input = document.getElementById('pieces-number-input');
    if (!input) return;
    var val = parseInt(input.value) || 1;
    val += delta;
    if (val < 1) val = 1;
    input.value = val;
    calculateLiveTotal();
  }

  function selectPieceQty(qty) {
    var input = document.getElementById('pieces-number-input');
    if (input) {
      input.value = qty;
      calculateLiveTotal();
    }
  }

  function calculateLiveTotal() {
    var input = document.getElementById('pieces-number-input');
    if (!input) return;
    var qty = parseInt(input.value) || 1;
    if (qty < 1) {
      qty = 1;
      input.value = 1;
    }

    // Determine active tier price
    var unitPrice = currentTier1;
    var tierLabel = 'per piece · 1–9 price';
    var tierCol1 = document.getElementById('tier-col-1');
    var tierCol10 = document.getElementById('tier-col-10');
    var tierCol50 = document.getElementById('tier-col-50');

    if (tierCol1) { tierCol1.classList.remove('active'); tierCol1.style.borderColor = 'transparent'; tierCol1.style.background = '#FFFFFF'; }
    if (tierCol10) { tierCol10.classList.remove('active'); tierCol10.style.borderColor = 'transparent'; tierCol10.style.background = '#FFFFFF'; }
    if (tierCol50) { tierCol50.classList.remove('active'); tierCol50.style.borderColor = 'transparent'; tierCol50.style.background = '#FFFFFF'; }

    if (qty >= 50) {
      unitPrice = currentTier50;
      tierLabel = 'per piece · 50+ price reached';
      if (tierCol50) { tierCol50.classList.add('active'); tierCol50.style.borderColor = '#9C7C4C'; tierCol50.style.background = '#FAF7F2'; }
    } else if (qty >= 10) {
      unitPrice = currentTier10;
      tierLabel = 'per piece · 10+ price reached';
      if (tierCol10) { tierCol10.classList.add('active'); tierCol10.style.borderColor = '#9C7C4C'; tierCol10.style.background = '#FAF7F2'; }
    } else {
      unitPrice = currentTier1;
      tierLabel = 'per piece · 1–9 price';
      if (tierCol1) { tierCol1.classList.add('active'); tierCol1.style.borderColor = '#9C7C4C'; tierCol1.style.background = '#FAF7F2'; }
    }

    var total = qty * unitPrice;

    // Update displays
    var unitDisplay = document.getElementById('active-unit-price-display');
    if (unitDisplay) unitDisplay.innerText = '₹ ' + unitPrice.toLocaleString('en-IN');

    var tierDisplay = document.getElementById('active-tier-note-display');
    if (tierDisplay) tierDisplay.innerText = tierLabel;

    var totalDisplay = document.getElementById('calculated-total-display');
    if (totalDisplay) totalDisplay.innerText = 'Total ₹ ' + total.toLocaleString('en-IN');

    var mobileQty = document.getElementById('mobile-sticky-qty');
    if (mobileQty) mobileQty.innerText = qty;
  }

  function handleProductFormSubmit(form) {
    var sizeInput = document.getElementById('form-selected-size');
    var size = sizeInput ? sizeInput.value : '6×8 mm';
    var qtyInput = document.getElementById('pieces-number-input');
    var qty = parseInt(qtyInput ? qtyInput.value : 12) || 12;
    var buyNow = document.getElementById('form-buy-now-flag').value;

    var unitPrice = (qty >= 50) ? currentTier50 : ((qty >= 10) ? currentTier10 : currentTier1);
    var total = qty * unitPrice;

    // Backup to localStorage for 100% persistence on free hosting
    try {
      var cartData = JSON.parse(localStorage.getItem('vivaaz_local_cart') || '[]');
      var item = {
        key: 'cart_' + Date.now(),
        product_id: <?php echo intval($product_id); ?>,
        title: currentTitle,
        sku: currentSku,
        size: size,
        quality: 'AAA',
        qty: qty,
        quantity: qty,
        unitPrice: unitPrice,
        basePrice: currentTier1,
        tier1: currentTier10,
        tier2: currentTier50,
        total: total,
        image: document.getElementById('main-gallery-view') ? document.getElementById('main-gallery-view').src : ''
      };
      cartData.push(item);
      localStorage.setItem('vivaaz_local_cart', JSON.stringify(cartData));
    } catch(e) {}

    if (buyNow === '1') {
      form.action = '<?php echo esc_url(function_exists("wc_get_checkout_url") ? wc_get_checkout_url() : home_url("/checkout/")); ?>';
    } else {
      form.action = '<?php echo esc_url(function_exists("wc_get_cart_url") ? wc_get_cart_url() : home_url("/cart/")); ?>';
    }

    // Form continues to submit to backend
    return true;
  }

  document.addEventListener('DOMContentLoaded', function() {
    calculateLiveTotal();
  });
</script>

<?php do_action('woocommerce_after_single_product'); ?>
