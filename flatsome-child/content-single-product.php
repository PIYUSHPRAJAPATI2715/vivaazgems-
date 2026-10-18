<?php
/**
 * Vivaaz Gems - Custom WooCommerce Single Product Template
 * 100% Exact Implementation of Client Desktop & Phone Demos and Build Book.
 * Both Columns End Level (.pd.pd2g: .q1, .q2, .q3, .q4).
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

// 1. Resolve Stone Details dynamically from post or URL slug
$stone_info = function_exists('vivaaz_resolve_stone_from_request') ? vivaaz_resolve_stone_from_request($product_id) : array();

$title         = !empty($stone_info['title']) ? $stone_info['title'] : (get_the_title() ?: 'Rainbow Moonstone Oval Cabochon');
$stone_name    = !empty($stone_info['stone_name']) ? $stone_info['stone_name'] : 'Rainbow Moonstone';
$stone_key     = !empty($stone_info['stone_key']) ? $stone_info['stone_key'] : 'moonstone';
$sku           = !empty($stone_info['sku']) ? $stone_info['sku'] : ($product ? $product->get_sku() : 'RMCOC68');
$base_price    = !empty($stone_info['base_price']) ? $stone_info['base_price'] : 105;
$cut_shape     = !empty($stone_info['cut_shape']) ? $stone_info['cut_shape'] : 'Cabochon, oval';
$origin        = !empty($stone_info['origin']) ? $stone_info['origin'] : 'Sri Lanka / Jaipur';
$treatment     = !empty($stone_info['treatment']) ? $stone_info['treatment'] : 'None';
$color_clarity = !empty($stone_info['color_clarity']) ? $stone_info['color_clarity'] : 'Eye-clean';
$quality       = !empty($stone_info['quality']) ? $stone_info['quality'] : 'AAA';
$default_size  = !empty($stone_info['size']) ? $stone_info['size'] : '6×8 mm';
$weight        = !empty($stone_info['weight']) ? $stone_info['weight'] : '≈ 0.85 ct per piece';
$tolerance     = !empty($stone_info['tolerance']) ? $stone_info['tolerance'] : '± 0.1 mm';
$is_single     = !empty($stone_info['is_single']) ? true : false;
$unit_label    = !empty($stone_info['unit_label']) ? $stone_info['unit_label'] : ($is_single ? 'single stone' : 'per piece');
$sold_as_tag   = !empty($stone_info['sold_as_tag']) ? $stone_info['sold_as_tag'] : ($is_single ? 'ONLY 1' : 'CALIBRATED LOT');
$main_img      = !empty($stone_info['main_img']) ? $stone_info['main_img'] : vivaaz_get_img_url($stone_key . '.jpg');

// Tiers calculation
$tier_1_price  = round($base_price * 1.15);
$tier_10_price = $base_price;
$tier_50_price = round($base_price * 0.88);

do_action('woocommerce_before_single_product');
?>

<div class="wrap" style="padding-top: 18px; padding-bottom: 72px;">
  
  <!-- Breadcrumbs (Point 6 Spec: Ends with cut, thin arrows) -->
  <div class="crumb" style="font-size: 12.5px; color: var(--soft); display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 24px;">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a>
    <span>›</span>
    <a href="<?php echo esc_url(home_url('/shop/')); ?>" style="color: inherit; text-decoration: none;">Gemstones</a>
    <span>›</span>
    <a href="<?php echo esc_url(home_url('/shop/?filter_group=precious')); ?>" style="color: inherit; text-decoration: none;">Precious</a>
    <span>›</span>
    <a href="<?php echo esc_url(home_url('/shop/?filter_stone=' . strtolower(urlencode($stone_name)))); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html($stone_name); ?></a>
    <span>›</span>
    <b style="color: var(--ink); font-weight: 500;">Cabochon</b>
  </div>

  <!-- 4-QUADRANT PRODUCT GRID: BOTH COLUMNS END ON THE EXACT SAME LEVEL -->
  <div class="pd pd2g" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); column-gap: 60px; row-gap: 26px; align-items: start;">
    
    <!-- Q1: TOP LEFT - GALLERY & VIEWS -->
    <div class="q1">
      <div class="views" style="display: flex; gap: 6px; flex-wrap: wrap; margin-bottom: 12px;">
        <button type="button" class="gal-view-btn on" onclick="switchProdView('video', this)" style="border: 1px solid var(--ink); background: var(--ink); color: #fff; padding: 7px 12px; font-size: 12px; cursor: pointer;">▶ Video</button>
        <button type="button" class="gal-view-btn" onclick="switchProdView('daylight', this)" style="border: 1px solid var(--line2); background: var(--paper); color: var(--ink); padding: 7px 12px; font-size: 12px; cursor: pointer;">Daylight</button>
        <button type="button" class="gal-view-btn" onclick="switchProdView('lamp', this)" style="border: 1px solid var(--line2); background: var(--paper); color: var(--ink); padding: 7px 12px; font-size: 12px; cursor: pointer;">Lamp</button>
        <button type="button" class="gal-view-btn" onclick="switchProdView('loupe', this)" style="border: 1px solid var(--line2); background: var(--paper); color: var(--ink); padding: 7px 12px; font-size: 12px; cursor: pointer;">Under the loupe</button>
        <button type="button" class="gal-view-btn" onclick="switchProdView('size', this)" style="border: 1px solid var(--line2); background: var(--paper); color: var(--ink); padding: 7px 12px; font-size: 12px; cursor: pointer;">Actual size</button>
      </div>

      <div class="mainimg" id="prod-mainimg-box" style="aspect-ratio: 1/1; background: #F1F0EE; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; border: 1px solid var(--line);">
        <img id="prod-main-img" src="<?php echo esc_url($main_img); ?>" alt="<?php echo esc_attr($title); ?>" style="width: 72%; object-fit: contain; transition: transform .3s;">
        <span class="play" id="prod-video-tag" style="position: absolute; bottom: 12px; left: 12px; background: rgba(28,26,23,.85); color: #fff; font-size: 11px; letter-spacing: 0.12em; padding: 6px 10px; font-weight: 600;">▶ 0:08 · <?php echo esc_html($sku); ?></span>
        <span class="ruler" id="prod-ruler-tag" style="display: none; position: absolute; bottom: 12px; left: 12px; right: 12px; background: rgba(28,26,23,.85); color: #fff; font-size: 11.5px; text-align: center; padding: 6px;">Grid squares are 1 mm · 6×8 mm</span>
      </div>

      <!-- Thumbnails -->
      <div class="thumbs" style="display: flex; gap: 8px; margin-top: 10px;">
        <button type="button" class="thumb-btn on" onclick="switchProdThumb(0, this)" style="width: 58px; height: 58px; border: 1px solid var(--ink); background: #F1F0EE; padding: 4px; cursor: pointer; display: flex; align-items: center; justify-content: center;">
          <span style="font-size: 11px; font-weight: 700;">▶ 0:08</span>
        </button>
        <button type="button" class="thumb-btn" onclick="switchProdThumb(1, this)" style="width: 58px; height: 58px; border: 1px solid var(--line2); background: #F1F0EE; padding: 4px; cursor: pointer;">
          <img src="<?php echo esc_url($main_img); ?>" alt="Thumb" style="width: 100%; height: 100%; object-fit: contain;">
        </button>
        <button type="button" class="thumb-btn" onclick="switchProdThumb(2, this)" style="width: 58px; height: 58px; border: 1px solid var(--line2); background: #F1F0EE; padding: 4px; cursor: pointer;">
          <img src="<?php echo esc_url($main_img); ?>" alt="Thumb" style="width: 100%; height: 100%; object-fit: contain; filter: brightness(1.15);">
        </button>
        <button type="button" class="thumb-btn" onclick="switchProdThumb(3, this)" style="width: 58px; height: 58px; border: 1px solid var(--line2); background: #F1F0EE; padding: 4px; cursor: pointer;">
          <img src="<?php echo esc_url($main_img); ?>" alt="Thumb" style="width: 100%; height: 100%; object-fit: contain; transform: scale(1.3);">
        </button>
      </div>

      <p class="capt" style="font-size: 12px; color: var(--soft); margin: 8px 0 0;">Photos and video are of our own stones from this lot.</p>
    </div>

    <!-- Q2: TOP RIGHT - TITLE, PRICE, TIERS, SIZES, ACTIONS -->
    <div class="q2" style="display: flex; flex-direction: column;">
      <span class="eye" style="font-size: 11px; letter-spacing: 0.16em; color: var(--gold); font-weight: 700; text-transform: uppercase;">
        <?php echo esc_html($sku); ?> · <?php echo esc_html($sold_as_tag); ?> · AAA
      </span>
      
      <h1 class="pt" style="font-family: var(--display); font-weight: 400; font-size: 34px; line-height: 1.15; margin: 6px 0 10px; color: var(--ink);">
        <?php echo esc_html($title); ?>
      </h1>
      
      <p style="color: var(--mute); font-size: 14.5px; margin: 0 0 16px; line-height: 1.5;">
        Natural Ceylon gemstone, sorted and calibrated in Jaipur. For rings, pendants and earrings.
      </p>

      <!-- Price line -->
      <div class="price" style="font-size: 26px; font-weight: 600; color: var(--ink); margin-bottom: 12px;">
        <span id="prod-price-display">₹ <?php echo number_format($tier_10_price); ?></span> 
        <span style="font-size: 13.5px; font-weight: 400; color: var(--mute);">
          <?php echo esc_html($unit_label); ?> <?php echo !$is_single ? '· <span id="tier-badge-label">10+ price</span>' : ''; ?>
        </span>
      </div>

      <?php if (!$is_single): ?>
      <!-- 3 Tier Blocks (Point 8 Spec: Active is filled black) -->
      <div class="tiers" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-bottom: 18px;">
        <div class="tier-block" id="tier-box-1" onclick="setProductQty(1)" style="border: 1px solid var(--line2); padding: 10px 12px; text-align: left; cursor: pointer; background: var(--paper);">
          <span style="display: block; font-size: 11px; color: var(--mute);">1–9 pcs</span>
          <b style="font-size: 15px; color: var(--ink);">₹ <?php echo number_format($tier_1_price); ?></b>
        </div>
        <div class="tier-block on" id="tier-box-10" onclick="setProductQty(10)" style="border: 1px solid var(--ink); padding: 10px 12px; text-align: left; cursor: pointer; background: var(--ink); color: #fff;">
          <span style="display: block; font-size: 11px; color: #cfc6b8;">10+ pcs</span>
          <b style="font-size: 15px; color: #fff;">₹ <?php echo number_format($tier_10_price); ?></b>
        </div>
        <div class="tier-block" id="tier-box-50" onclick="setProductQty(50)" style="border: 1px solid var(--line2); padding: 10px 12px; text-align: left; cursor: pointer; background: var(--paper);">
          <span style="display: block; font-size: 11px; color: var(--mute);">50+ pcs</span>
          <b style="font-size: 15px; color: var(--ink);">₹ <?php echo number_format($tier_50_price); ?></b>
        </div>
      </div>
      <?php endif; ?>

      <!-- Size Selector (Square Chips - Style Guide Spec) -->
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
        <span class="lbl" style="font-size: 10.5px; letter-spacing: 0.16em; font-weight: 700; text-transform: uppercase; color: var(--soft);">SIZE (MM)</span>
        <a href="javascript:void(0);" onclick="switchProdView('size', document.querySelectorAll('.gal-view-btn')[4]);" style="font-size: 12px; color: var(--gold); text-decoration: underline; font-weight: 600;">See actual size</a>
      </div>
      <div class="chips sq" style="display: flex; gap: 7px; flex-wrap: wrap; margin-bottom: 18px;">
        <button type="button" class="chip size-chip" onclick="selectProdSize('5×7', this)" style="border-radius: 0; padding: 7px 14px; font-size: 12.5px; border: 1px solid var(--line2); background: var(--paper); cursor: pointer;">5×7 mm</button>
        <button type="button" class="chip size-chip on" onclick="selectProdSize('6×8', this)" style="border-radius: 0; padding: 7px 14px; font-size: 12.5px; border: 1px solid var(--ink); background: var(--ink); color: #fff; cursor: pointer;">6×8 mm</button>
        <button type="button" class="chip size-chip" onclick="selectProdSize('7×9', this)" style="border-radius: 0; padding: 7px 14px; font-size: 12.5px; border: 1px solid var(--line2); background: var(--paper); cursor: pointer;">7×9 mm</button>
        <button type="button" class="chip size-chip" onclick="selectProdSize('8×10', this)" style="border-radius: 0; padding: 7px 14px; font-size: 12.5px; border: 1px solid var(--line2); background: var(--paper); cursor: pointer;">8×10 mm</button>
      </div>

      <!-- Quantity Stepper -->
      <div class="lbl" style="font-size: 10.5px; letter-spacing: 0.16em; font-weight: 700; text-transform: uppercase; color: var(--soft); margin-bottom: 8px;">
        PIECES <span style="letter-spacing: 0; font-weight: 400; color: var(--mute);">62 ready · more in 1–3 weeks</span>
      </div>
      <div class="qty" style="display: flex; align-items: center; gap: 16px; margin-bottom: 20px;">
        <div class="step" style="display: flex; border: 1px solid var(--line2); background: var(--paper); width: 120px; height: 44px;">
          <button type="button" onclick="adjustQty(-1)" style="width: 36px; height: 100%; border: 0; background: transparent; font-size: 18px; cursor: pointer; display: flex; align-items: center; justify-content: center;">−</button>
          <input type="text" id="prod-qty-input" value="<?php echo $is_single ? '1' : '10'; ?>" readonly style="flex: 1; border: 0; background: transparent; text-align: center; font-size: 14px; font-weight: 700; outline: none;" />
          <button type="button" onclick="adjustQty(1)" style="width: 36px; height: 100%; border: 0; background: transparent; font-size: 18px; cursor: pointer; display: flex; align-items: center; justify-content: center;">+</button>
        </div>
        <span style="font-size: 13.5px; color: var(--mute);">Total <b id="prod-total-display" style="color: var(--ink);">₹ <?php echo number_format($tier_10_price * ($is_single ? 1 : 10)); ?></b></span>
      </div>

      <!-- Action Buttons Row: Black ADD TO CART + White Outline BUY NOW + Square 52px Heart Box -->
      <div class="pbtns" style="display: grid; grid-template-columns: 1fr 1fr 52px; gap: 10px; margin-bottom: 14px;">
        <button type="button" class="btn" onclick="triggerAddToCart();" style="height: 49px; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase;">
          ADD TO CART
        </button>
        <button type="button" class="btn o" onclick="triggerBuyNow();" style="height: 49px; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase;">
          BUY NOW
        </button>
        <button type="button" class="wl" id="prod-heart-btn" onclick="toggleProductWishlist('<?php echo esc_js($sku); ?>', '<?php echo esc_js($title); ?>', '<?php echo esc_url($main_img); ?>', '₹ <?php echo esc_js($tier_10_price); ?>', window.location.href, this);" aria-label="Save to wishlist" style="height: 49px; width: 52px; border: 1px solid var(--line2); background: var(--paper); display: flex; align-items: center; justify-content: center; cursor: pointer;">
          <svg class="i" style="width: 20px; height: 20px; color: var(--ink);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
        </button>
      </div>

      <!-- WhatsApp + Video Call pair (.act2) -->
      <div class="act2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 16px;">
        <a href="https://wa.me/919680552270?text=Hello%20Vivaaz%20Gems,%20I%20would%20like%20to%20see%20this%20exact%20lot%20live:%20<?php echo urlencode($title); ?>%20(<?php echo urlencode($sku); ?>)" target="_blank" style="text-decoration: none; border: 1px solid var(--line2); background: var(--paper); padding: 12px 10px; display: flex; gap: 8px; align-items: center; justify-content: center; font-size: 11.5px; letter-spacing: 0.14em; font-weight: 700; text-transform: uppercase; color: var(--ink);">
          <svg class="i" style="width: 17px; height: 17px; fill: #1E9E52;" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
          SEE THIS EXACT LOT LIVE
        </a>
        <a href="javascript:void(0);" onclick="openConsultationModal();" style="text-decoration: none; border: 1px solid var(--line2); background: var(--paper); padding: 12px 10px; display: flex; gap: 8px; align-items: center; justify-content: center; font-size: 11.5px; letter-spacing: 0.14em; font-weight: 700; text-transform: uppercase; color: var(--ink);">
          <svg class="i" style="width: 17px; height: 17px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
          BOOK A VIDEO CALL
        </a>
      </div>

      <!-- Quiet Trust Line (.trow) -->
      <div class="trow" style="display: flex; gap: 8px 20px; justify-content: center; flex-wrap: wrap; font-size: 12.5px; color: var(--mute); padding-top: 14px; border-top: 1px solid var(--line);">
        <span>Ships in 1–2 days</span>
        <span>·</span>
        <span>Insured worldwide</span>
        <span>·</span>
        <a href="<?php echo esc_url(home_url('/guarantee/')); ?>" class="link" style="color: var(--gold); text-decoration: underline;">Our guarantee</a>
      </div>

    </div>

    <!-- Q3: BOTTOM LEFT - THE STONE PASSPORT BOX -->
    <div class="q3" style="align-self: stretch; display: flex;">
      <div class="stonebox" style="margin: 0; flex: 1; background: var(--paper); border: 1px solid var(--line); padding: 22px;">
        <div class="sbh" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; border-bottom: 1px solid var(--line); padding-bottom: 12px;">
          <h4 style="font-family: var(--display); font-size: 18px; font-weight: 400; margin: 0; color: var(--ink);">The stone</h4>
          <span style="font-size: 10.5px; letter-spacing: 0.18em; color: var(--gold); font-weight: 700; text-transform: uppercase;">PASSPORT · <?php echo esc_html($sku); ?></span>
        </div>

        <div class="keys" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 18px; padding-bottom: 18px; border-bottom: 1px solid var(--line);">
          <div>
            <b id="passport-size-val" style="display: block; font-size: 16px; color: var(--ink);">6×8 mm</b>
            <span style="font-size: 10.5px; letter-spacing: 0.14em; color: var(--soft); text-transform: uppercase;">SIZE</span>
          </div>
          <div>
            <b style="display: block; font-size: 16px; color: var(--ink);"><?php echo esc_html($weight); ?></b>
            <span style="font-size: 10.5px; letter-spacing: 0.14em; color: var(--soft); text-transform: uppercase;">EACH PIECE</span>
          </div>
          <div>
            <b style="display: block; font-size: 16px; color: var(--ink);">±0.1 mm</b>
            <span style="font-size: 10.5px; letter-spacing: 0.14em; color: var(--soft); text-transform: uppercase;">CALIBRATED</span>
          </div>
          <div>
            <b style="display: block; font-size: 16px; color: var(--ink);"><?php echo esc_html($treatment); ?></b>
            <span style="font-size: 10.5px; letter-spacing: 0.14em; color: var(--soft); text-transform: uppercase;">TREATMENT</span>
          </div>
        </div>

        <div class="spec" style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px;">
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: var(--soft); font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">STONE</span>
            <span style="font-weight: 600; color: var(--ink);"><?php echo esc_html($stone_name); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: var(--soft); font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">CUT AND SHAPE</span>
            <span><?php echo esc_html($cut_shape); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: var(--soft); font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">COLOUR</span>
            <span><?php echo esc_html($color_clarity); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: var(--soft); font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">QUALITY</span>
            <span><?php echo esc_html($quality); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: var(--soft); font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">COLOUR MATCH</span>
            <span>Within the lot</span>
          </div>
          <div style="display: flex; justify-content: space-between; padding-top: 2px;">
            <span style="color: var(--soft); font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">PRICE PER CARAT</span>
            <span style="font-weight: 600; color: var(--ink);">₹ 445</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Q4: BOTTOM RIGHT - ACCORDIONS, MAKE IT INTO JEWELRY, BUYING IN BULK -->
    <div class="q4" style="display: flex; flex-direction: column; gap: 14px;">
      
      <!-- Accordions -->
      <div class="acc-wrapper" style="border-top: 1px solid var(--line);">
        <details style="border-bottom: 1px solid var(--line);">
          <summary style="list-style: none; display: flex; justify-content: space-between; align-items: center; padding: 14px 0; font-size: 13px; font-weight: 600; cursor: pointer; color: var(--ink);">
            Shipping and export
            <span style="font-size: 14px; color: var(--soft);">▾</span>
          </summary>
          <div style="padding-bottom: 14px; font-size: 13px; color: var(--mute); line-height: 1.6;">
            India: insured courier, about 2–3 days. Outside India: insured express, about 4–7 days. Shipped directly from our Jaipur sorting workshop.
          </div>
        </details>

        <details style="border-bottom: 1px solid var(--line);">
          <summary style="list-style: none; display: flex; justify-content: space-between; align-items: center; padding: 14px 0; font-size: 13px; font-weight: 600; cursor: pointer; color: var(--ink);">
            Our guarantee
            <span style="font-size: 14px; color: var(--soft);">▾</span>
          </summary>
          <div style="padding-bottom: 14px; font-size: 13px; color: var(--mute); line-height: 1.6;">
            Every parcel is inspected by hand. Replaced or refunded if any stone arrives damaged, off-size, or not matching the approved specifications.
          </div>
        </details>

        <details style="border-bottom: 1px solid var(--line);">
          <summary style="list-style: none; display: flex; justify-content: space-between; align-items: center; padding: 14px 0; font-size: 13px; font-weight: 600; cursor: pointer; color: var(--ink);">
            Matching and certificates
            <span style="font-size: 14px; color: var(--soft);">▾</span>
          </summary>
          <div style="padding-bottom: 14px; font-size: 13px; color: var(--mute); line-height: 1.6;">
            Lab reports and certificates available on request for any stone or lot. All stones are 100% natural and tested in our laboratory.
          </div>
        </details>
      </div>

      <!-- Make it into jewelry Card -->
      <div class="make" style="background: #1C1A17; color: #FFFFFF; padding: 18px 22px; display: flex; justify-content: space-between; align-items: center; margin-top: 4px;">
        <div>
          <h4 style="font-size: 13.5px; font-weight: 700; color: #FFFFFF; margin: 0 0 4px;">Make it into jewelry</h4>
          <p style="font-size: 12px; color: #CCCCCC; margin: 0;">We set this stone in silver or gold. Asking is free.</p>
        </div>
        <a href="<?php echo esc_url(home_url('/make-it-into-jewelry/')); ?>" class="ul" style="color: #FFFFFF; font-size: 11.5px; font-weight: 700; text-decoration: underline; white-space: nowrap; margin-left: 14px;">
          Ask for a quote →
        </a>
      </div>

      <!-- Buying in bulk? Card -->
      <div class="bulk" style="background: var(--sand); border: 1px solid var(--line); padding: 18px 22px; display: flex; justify-content: space-between; align-items: center;">
        <div>
          <h4 style="font-size: 13.5px; font-weight: 700; color: var(--ink); margin: 0 0 4px;">Buying in bulk?</h4>
          <p style="font-size: 12px; color: var(--mute); margin: 0;">Many pieces, another size or a matched set. Asking is free.</p>
        </div>
        <a href="<?php echo esc_url(home_url('/bulk-enquiry/')); ?>" class="btn o sm" style="text-decoration: none; font-size: 11px; white-space: nowrap; margin-left: 14px;">
          Bulk / B2B enquiry
        </a>
      </div>

    </div>

  </div>

  <!-- SIMILAR STONES SECTION (POINT 6 SPEC) -->
  <section class="sec wrap" style="padding-block: 56px 0;">
    <div class="sech" style="margin-bottom: 24px; border-bottom: 1px solid var(--line); padding-bottom: 12px;">
      <h2 class="h2">Similar stones</h2>
    </div>
    <div class="grid g4" style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 26px 22px;">
      <?php
      $sim_args = array(
          'post_type'      => 'product',
          'posts_per_page' => 4,
          'post__not_in'   => array($product_id),
      );
      $sim_query = new WP_Query($sim_args);
      if ($sim_query->have_posts()) :
          while ($sim_query->have_posts()) : $sim_query->the_post();
              wc_get_template_part('content', 'product');
          endwhile;
          wp_reset_postdata();
      endif;
      ?>
    </div>
  </section>

</div>

<!-- STICKY MOBILE BUY BAR (POINT 22 & PHONE DEMO SPEC) -->
<div class="mobile-product-buybar buybar" id="mobile-product-buybar">
  <button type="button" class="btn" onclick="triggerAddToCart();" style="width: 100%; padding: 14px; font-size: 12px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">
    ADD TO CART · <span id="bar-pcs-count"><?php echo $is_single ? '1 PC' : '10 PCS'; ?></span>
  </button>
  <a href="https://wa.me/919680552270?text=Hello%20Vivaaz%20Gems,%20I%20am%20interested%20in%20<?php echo urlencode($title); ?>" target="_blank" class="btn o w" style="width: 56px; padding: 0; display: flex; align-items: center; justify-content: center;" title="Ask on WhatsApp">
    <svg class="i" style="width: 20px; height: 20px; color: #1E9E52; fill: currentColor;" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
  </a>
</div>

<!-- Interactive Product Page Scripts -->
<script>
  var currentUnitPrice = <?php echo $tier_10_price; ?>;
  var currentQty = <?php echo $is_single ? 1 : 10; ?>;
  var currentSize = '6×8';

  function switchProdView(view, btn) {
    document.querySelectorAll('.gal-view-btn').forEach(b => {
      b.classList.remove('on');
      b.style.background = 'var(--paper)';
      b.style.color = 'var(--ink)';
      b.style.borderColor = 'var(--line2)';
    });
    btn.classList.add('on');
    btn.style.background = 'var(--ink)';
    btn.style.color = '#fff';
    btn.style.borderColor = 'var(--ink)';

    var videoTag = document.getElementById('prod-video-tag');
    var rulerTag = document.getElementById('prod-ruler-tag');
    var mainImg = document.getElementById('prod-main-img');

    if (view === 'video') {
      if (videoTag) videoTag.style.display = 'block';
      if (rulerTag) rulerTag.style.display = 'none';
      if (mainImg) mainImg.style.transform = 'scale(1)';
    } else if (view === 'size') {
      if (videoTag) videoTag.style.display = 'none';
      if (rulerTag) rulerTag.style.display = 'block';
      if (mainImg) mainImg.style.transform = 'scale(0.85)';
    } else if (view === 'loupe') {
      if (videoTag) videoTag.style.display = 'none';
      if (rulerTag) rulerTag.style.display = 'none';
      if (mainImg) mainImg.style.transform = 'scale(1.4)';
    } else {
      if (videoTag) videoTag.style.display = 'none';
      if (rulerTag) rulerTag.style.display = 'none';
      if (mainImg) mainImg.style.transform = 'scale(1)';
    }
  }

  function switchProdThumb(idx, btn) {
    document.querySelectorAll('.thumb-btn').forEach(b => {
      b.classList.remove('on');
      b.style.borderColor = 'var(--line2)';
    });
    btn.classList.add('on');
    btn.style.borderColor = 'var(--ink)';
  }

  function selectProdSize(size, btn) {
    currentSize = size;
    document.querySelectorAll('.size-chip').forEach(b => {
      b.classList.remove('on');
      b.style.background = 'var(--paper)';
      b.style.color = 'var(--ink)';
      b.style.borderColor = 'var(--line2)';
    });
    btn.classList.add('on');
    btn.style.background = 'var(--ink)';
    btn.style.color = '#fff';
    btn.style.borderColor = 'var(--ink)';
    var pSize = document.getElementById('passport-size-val');
    if (pSize) pSize.textContent = size + ' mm';
  }

  function setProductQty(qty) {
    currentQty = qty;
    var inp = document.getElementById('prod-qty-input');
    if (inp) inp.value = qty;
    updateTierBoxes();
    recalcTotal();
  }

  function adjustQty(delta) {
    currentQty = Math.max(1, currentQty + delta);
    var inp = document.getElementById('prod-qty-input');
    if (inp) inp.value = currentQty;
    updateTierBoxes();
    recalcTotal();
  }

  function updateTierBoxes() {
    var t1 = document.getElementById('tier-box-1');
    var t10 = document.getElementById('tier-box-10');
    var t50 = document.getElementById('tier-box-50');
    var tBadge = document.getElementById('tier-badge-label');

    if (!t1 || !t10 || !t50) return;

    [t1, t10, t50].forEach(b => {
      b.classList.remove('on');
      b.style.background = 'var(--paper)';
      b.style.color = 'var(--ink)';
      b.style.borderColor = 'var(--line2)';
      var bld = b.querySelector('b');
      if (bld) bld.style.color = 'var(--ink)';
    });

    if (currentQty >= 50) {
      currentUnitPrice = <?php echo $tier_50_price; ?>;
      t50.classList.add('on');
      t50.style.background = 'var(--ink)';
      t50.style.color = '#fff';
      t50.style.borderColor = 'var(--ink)';
      if (t50.querySelector('b')) t50.querySelector('b').style.color = '#fff';
      if (tBadge) tBadge.textContent = '50+ price';
    } else if (currentQty >= 10) {
      currentUnitPrice = <?php echo $tier_10_price; ?>;
      t10.classList.add('on');
      t10.style.background = 'var(--ink)';
      t10.style.color = '#fff';
      t10.style.borderColor = 'var(--ink)';
      if (t10.querySelector('b')) t10.querySelector('b').style.color = '#fff';
      if (tBadge) tBadge.textContent = '10+ price';
    } else {
      currentUnitPrice = <?php echo $tier_1_price; ?>;
      t1.classList.add('on');
      t1.style.background = 'var(--ink)';
      t1.style.color = '#fff';
      t1.style.borderColor = 'var(--ink)';
      if (t1.querySelector('b')) t1.querySelector('b').style.color = '#fff';
      if (tBadge) tBadge.textContent = '1–9 price';
    }

    var pDisplay = document.getElementById('prod-price-display');
    if (pDisplay) pDisplay.textContent = '₹ ' + currentUnitPrice.toLocaleString();
  }

  function recalcTotal() {
    var total = currentUnitPrice * currentQty;
    var tDisplay = document.getElementById('prod-total-display');
    if (tDisplay) tDisplay.textContent = '₹ ' + total.toLocaleString();
    var barCount = document.getElementById('bar-pcs-count');
    if (barCount) barCount.textContent = currentQty + ' PCS';
  }

  function triggerAddToCart() {
    var pTitle = <?php echo json_encode($title); ?>;
    var pImg = <?php echo json_encode($main_img); ?>;
    var pId = <?php echo intval($product_id ?: 1); ?>;
    
    if (typeof addProductToCartAndOpenDrawer === 'function') {
      addProductToCartAndOpenDrawer(pId, pTitle, pImg, '₹ ' + currentUnitPrice, currentSize + ' mm', currentQty);
    } else if (typeof openCartDrawer === 'function') {
      openCartDrawer();
    }
  }

  function triggerBuyNow() {
    var pTitle = <?php echo json_encode($title); ?>;
    var pImg = <?php echo json_encode($main_img); ?>;
    var pId = <?php echo intval($product_id ?: 1); ?>;
    
    if (typeof addProductToCartAndOpenDrawer === 'function') {
      addProductToCartAndOpenDrawer(pId, pTitle, pImg, '₹ ' + currentUnitPrice, currentSize + ' mm', currentQty);
    }
    setTimeout(function() {
      window.location.href = '<?php echo esc_url(home_url('/checkout/')); ?>';
    }, 250);
  }, 400);
  }
</script>

<?php
do_action('woocommerce_after_single_product');
