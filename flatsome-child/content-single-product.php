<?php
/**
 * Vivaaz Gems - Custom WooCommerce Single Product Template
 * 100% Exact Implementation of Client Desktop & Phone Demos and Build Book.
 * Desktop: Balanced 2 Columns (.pd.pd2g: Q1+Q3 Left, Q2+Q4 Right).
 * Mobile: Strictly One Column (photo -> views -> info/price -> tiers -> sizes -> qty -> buttons -> see live -> the stone -> 5 accordions -> make into jewelry -> bulk -> similar).
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
$is_single_prop= !empty($stone_info['is_single']) ? true : false;
$main_img      = !empty($stone_info['main_img']) ? $stone_info['main_img'] : vivaaz_get_img_url($stone_key . '.jpg');

// Single stone / Pair detection (§15 Master Specification)
$is_pair = (stripos($title, 'pair') !== false || stripos($stone_name, 'pair') !== false || (isset($stone_info['sold_as_tag']) && stripos($stone_info['sold_as_tag'], 'pair') !== false));
$is_single = $is_single_prop || (stripos($title, 'only 1') !== false) || (isset($stone_info['sold_as_tag']) && $stone_info['sold_as_tag'] === 'ONLY 1');
$is_single_or_pair = $is_single || $is_pair;

if ($is_pair) {
    $sold_as_tag   = 'PAIR';
    $unit_label    = 'for the pair';
    $tag_note      = 'Only 1. This exact pair, as in the photos.';
    $initial_qty   = 1;
    $btn_qty_label = '1 PAIR';
    $base_price    = 2600;
} elseif ($is_single) {
    $sold_as_tag   = 'ONLY 1';
    $unit_label    = 'single stone';
    $tag_note      = 'Only 1. This exact stone, as in the photos.';
    $initial_qty   = 1;
    $btn_qty_label = '1 PC';
    $base_price    = 4800;
} else {
    $sold_as_tag   = 'CALIBRATED LOT';
    $unit_label    = 'per piece';
    $tag_note      = 'Natural Ceylon gemstone, sorted and calibrated in Jaipur. For rings, pendants and earrings.';
    $initial_qty   = 10;
    $btn_qty_label = '10 PCS';
}

// Tiers calculation for Calibrated lots
$tier_1_price  = round($base_price * 1.15);
$tier_10_price = $base_price;
$tier_50_price = round($base_price * 0.88);

$active_unit_price = $is_single_or_pair ? $base_price : $tier_10_price;

// Group classification for breadcrumb
$precious_gems = array('sapphire', 'ruby', 'emerald', 'diamond');
$is_precious = false;
foreach ($precious_gems as $pg) {
    if (stripos($stone_name, $pg) !== false) {
        $is_precious = true;
        break;
    }
}
$group_name = $is_precious ? 'Precious' : 'Semi-precious';
$group_filter = $is_precious ? 'precious' : 'semi-precious';

do_action('woocommerce_before_single_product');
?>

<div class="wrap" style="padding-top: 18px; padding-bottom: 72px;">
  
  <!-- Breadcrumbs (12.5px #9A9186, ends with cut, thin arrows) -->
  <div class="crumb" style="font-size: 12.5px; color: #9A9186; display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 24px;">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a>
    <span>›</span>
    <a href="<?php echo esc_url(home_url('/shop/')); ?>" style="color: inherit; text-decoration: none;">Gemstones</a>
    <span>›</span>
    <a href="<?php echo esc_url(home_url('/shop/?filter_group=' . $group_filter)); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html($group_name); ?></a>
    <span>›</span>
    <a href="<?php echo esc_url(home_url('/shop/?filter_stone=' . strtolower(urlencode($stone_name)))); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html($stone_name); ?></a>
    <span>›</span>
    <b style="color: #1C1A17; font-weight: 500;"><?php echo esc_html(explode(',', $cut_shape)[0]); ?></b>
  </div>

  <!-- 4-QUADRANT PRODUCT GRID:
       Desktop: 2 columns with Q1+Q3 on left, Q2+Q4 on right (ending level).
       Mobile: Strictly 1 column ordered Q1 -> Q2 -> Q3 -> Q4. -->
  <div class="pd pd2g">
    
    <!-- Q1: GALLERY & VIEWS -->
    <div class="q1">
      <!-- View chips in ONE single scrolling row (33px high, rounded 999px, normal letters) -->
      <div class="views" style="display: flex; gap: 8px; flex-wrap: nowrap; overflow-x: auto; margin-bottom: 12px; padding: 4px 0;">
        <button type="button" class="gal-view-btn on" onclick="switchProdView('video', this)">▶ Video</button>
        <button type="button" class="gal-view-btn" onclick="switchProdView('daylight', this)">Daylight</button>
        <button type="button" class="gal-view-btn" onclick="switchProdView('lamp', this)">Lamp</button>
        <button type="button" class="gal-view-btn" onclick="switchProdView('loupe', this)">Under the loupe</button>
        <button type="button" class="gal-view-btn" onclick="switchProdView('size', this)">Actual size</button>
      </div>

      <div class="mainimg" id="prod-mainimg-box" style="aspect-ratio: 1/1; background: #F1F0EE; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; border: 1px solid var(--line, #EFE9E0);">
        <img id="prod-main-img" src="<?php echo esc_url($main_img); ?>" alt="<?php echo esc_attr($title); ?>" style="width: 72%; object-fit: contain; transition: transform .3s;">
        <span class="play" id="prod-video-tag" style="position: absolute; bottom: 12px; left: 12px; background: rgba(28,26,23,.85); color: #fff; font-size: 11px; letter-spacing: 0.12em; padding: 6px 10px; font-weight: 600;">▶ 0:08 · <?php echo esc_html($sku); ?></span>
        <span class="ruler" id="prod-ruler-tag" style="display: none; position: absolute; bottom: 12px; left: 12px; right: 12px; background: rgba(28,26,23,.85); color: #fff; font-size: 11.5px; text-align: center; padding: 6px;">Grid squares are 1 mm · <?php echo esc_html($default_size); ?></span>
      </div>

      <!-- Thumbnails -->
      <div class="thumbs" style="display: flex; gap: 8px; margin-top: 10px;">
        <button type="button" class="thumb-btn on" onclick="switchProdThumb(0, this)" style="width: 58px; height: 58px; border: 1px solid var(--ink, #1C1A17); background: #F1F0EE; padding: 4px; cursor: pointer; display: flex; align-items: center; justify-content: center;">
          <span style="font-size: 11px; font-weight: 700;">▶ 0:08</span>
        </button>
        <button type="button" class="thumb-btn" onclick="switchProdThumb(1, this)" style="width: 58px; height: 58px; border: 1px solid var(--line2, #E6E2DC); background: #F1F0EE; padding: 4px; cursor: pointer;">
          <img src="<?php echo esc_url($main_img); ?>" alt="Thumb" style="width: 100%; height: 100%; object-fit: contain;">
        </button>
        <button type="button" class="thumb-btn" onclick="switchProdThumb(2, this)" style="width: 58px; height: 58px; border: 1px solid var(--line2, #E6E2DC); background: #F1F0EE; padding: 4px; cursor: pointer;">
          <img src="<?php echo esc_url($main_img); ?>" alt="Thumb" style="width: 100%; height: 100%; object-fit: contain; filter: brightness(1.15);">
        </button>
        <button type="button" class="thumb-btn" onclick="switchProdThumb(3, this)" style="width: 58px; height: 58px; border: 1px solid var(--line2, #E6E2DC); background: #F1F0EE; padding: 4px; cursor: pointer;">
          <img src="<?php echo esc_url($main_img); ?>" alt="Thumb" style="width: 100%; height: 100%; object-fit: contain; transform: scale(1.3);">
        </button>
      </div>

      <p class="capt" style="font-size: 12px; color: #76706A; margin: 8px 0 0;">Photos and video are of our own stones from this lot.</p>
    </div>

    <!-- Q2: TITLE, PRICE, TIERS, SIZES, ACTIONS -->
    <div class="q2">
      <span class="eye" style="font-size: 10.5px; letter-spacing: 0.2em; color: #9B7C4E; font-weight: 700; text-transform: uppercase;">
        <?php echo esc_html($sku); ?> · <span style="<?php echo ($sold_as_tag === 'ONLY 1') ? 'background:#1C1A17;color:#fff;padding:2px 6px;' : ''; ?>"><?php echo esc_html($sold_as_tag); ?></span> · <?php echo esc_html($quality); ?>
      </span>
      
      <h1 class="pt" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-weight: 400; font-size: 34px; line-height: 1.15; margin: 6px 0 10px; color: #1C1A17;">
        <?php echo esc_html($title); ?>
      </h1>
      
      <p style="color: #76706A; font-size: 14.5px; margin: 0 0 16px; line-height: 1.5;">
        <?php echo esc_html($tag_note); ?>
      </p>

      <!-- Price line -->
      <div class="price" style="font-size: 26px; font-weight: 600; color: #1C1A17; margin-bottom: 12px;">
        <span id="prod-price-display">₹ <?php echo number_format($active_unit_price); ?></span> 
        <span style="font-size: 13.5px; font-weight: 400; color: #76706A;">
          <?php echo esc_html($unit_label); ?> <?php echo !$is_single_or_pair ? '· <span id="tier-badge-label">10+ price</span>' : ''; ?>
        </span>
      </div>

      <?php if (!$is_single_or_pair): ?>
      <!-- 3 Tier Blocks for Calibrated Lot -->
      <div class="tiers" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-bottom: 18px;">
        <div class="tier-block" id="tier-box-1" onclick="setProductQty(1)" style="border: 1px solid var(--line2, #E6E2DC); padding: 10px 12px; text-align: left; cursor: pointer; background: #fff;">
          <span style="display: block; font-size: 11px; color: #76706A;">1–9 pcs</span>
          <b style="font-size: 15px; color: #1C1A17;">₹ <?php echo number_format($tier_1_price); ?></b>
        </div>
        <div class="tier-block on" id="tier-box-10" onclick="setProductQty(10)" style="border: 1px solid #1C1A17; padding: 10px 12px; text-align: left; cursor: pointer; background: #1C1A17; color: #fff;">
          <span style="display: block; font-size: 11px; color: #cfc6b8;">10+ pcs</span>
          <b style="font-size: 15px; color: #fff;">₹ <?php echo number_format($tier_10_price); ?></b>
        </div>
        <div class="tier-block" id="tier-box-50" onclick="setProductQty(50)" style="border: 1px solid var(--line2, #E6E2DC); padding: 10px 12px; text-align: left; cursor: pointer; background: #fff;">
          <span style="display: block; font-size: 11px; color: #76706A;">50+ pcs</span>
          <b style="font-size: 15px; color: #1C1A17;">₹ <?php echo number_format($tier_50_price); ?></b>
        </div>
      </div>
      <?php endif; ?>

      <!-- Size Selector (Rounded Chips 33px high) -->
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
        <span class="lbl" style="font-size: 10.5px; letter-spacing: 0.2em; font-weight: 700; text-transform: uppercase; color: #9B7C4E;">SIZE (MM)</span>
        <a href="javascript:void(0);" onclick="switchProdView('size', document.querySelectorAll('.gal-view-btn')[4]);" style="font-size: 12px; color: #9B7C4E; text-decoration: underline; font-weight: 600;">See actual size</a>
      </div>
      <div class="chips" style="display: flex; gap: 7px; flex-wrap: wrap; margin-bottom: 18px;">
        <?php if ($is_single_or_pair): ?>
          <button type="button" class="chip size-chip on" style="cursor: default;"><?php echo esc_html($default_size); ?></button>
        <?php else: ?>
          <button type="button" class="chip size-chip" onclick="selectProdSize('5×7', this)">5×7 mm</button>
          <button type="button" class="chip size-chip on" onclick="selectProdSize('6×8', this)">6×8 mm</button>
          <button type="button" class="chip size-chip" onclick="selectProdSize('7×9', this)">7×9 mm</button>
          <button type="button" class="chip size-chip" onclick="selectProdSize('8×10', this)">8×10 mm</button>
        <?php endif; ?>
      </div>

      <?php if (!$is_single_or_pair): ?>
      <!-- Quantity Stepper for Lot -->
      <div class="lbl" style="font-size: 10.5px; letter-spacing: 0.2em; font-weight: 700; text-transform: uppercase; color: #9B7C4E; margin-bottom: 8px;">
        PIECES <span style="letter-spacing: 0; font-weight: 400; color: #76706A;">62 ready · more in 1–3 weeks</span>
      </div>
      <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 20px;">
        <div class="step" style="display: inline-flex; align-items: center; border: 1px solid #1C1A17; background: #fff; height: 38px;">
          <button type="button" onclick="stepQty(-1)" style="width: 38px; height: 38px; border: none; background: none; font-weight: 700; font-size: 16px; cursor: pointer; display: flex; align-items: center; justify-content: center;">−</button>
          <input type="text" id="prod-qty-input" value="10" onchange="onQtyInputChange(this.value)" style="width: 50px; height: 38px; border: none; border-left: 1px solid var(--line2, #E6E2DC); border-right: 1px solid var(--line2, #E6E2DC); text-align: center; font-size: 14px; font-weight: 700; box-sizing: border-box;">
          <button type="button" onclick="stepQty(1)" style="width: 38px; height: 38px; border: none; background: none; font-weight: 700; font-size: 16px; cursor: pointer; display: flex; align-items: center; justify-content: center;">+</button>
        </div>
        <div style="font-size: 14.5px; color: #76706A;">
          Total: <b id="prod-total-display" style="color: #1C1A17; font-size: 16px;">₹ <?php echo number_format($tier_10_price * 10); ?></b>
        </div>
      </div>
      <?php else: ?>
      <!-- Single / Pair notification box (§15) -->
      <div style="background: #FAF7F2; border: 1px solid var(--line2, #E6E2DC); padding: 12px 14px; margin-bottom: 20px; font-size: 13px; color: #1C1A17;">
        ✓ <b><?php echo esc_html($tag_note); ?></b>
      </div>
      <?php endif; ?>

      <!-- Primary Action Buttons (Add to cart + WhatsApp Green) -->
      <div class="act-main" style="display: grid; grid-template-columns: minmax(0, 1.4fr) minmax(0, 1fr); gap: 10px; margin-bottom: 12px;">
        <button type="button" class="btn" onclick="triggerAddToCart();" style="width: 100%; height: 48px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; background: #1C1A17; color: #fff; border: 1px solid #1C1A17; cursor: pointer;">
          ADD TO CART · <span id="bar-pcs-count-btn"><?php echo esc_html($btn_qty_label); ?></span>
        </button>
        
        <a href="https://wa.me/919680552270?text=Hello%20Vivaaz%20Gems,%20I%20am%20interested%20in%20<?php echo urlencode($title); ?>%20(<?php echo urlencode($sku); ?>)" target="_blank" class="btn wa" style="text-decoration: none; width: 100%; height: 48px; display: inline-flex; gap: 8px; align-items: center; justify-content: center; font-size: 11.5px; letter-spacing: 0.14em; font-weight: 700; text-transform: uppercase; background: #1E9E52; border: 1px solid #1E9E52; color: #fff;">
          <svg class="i" style="width: 17px; height: 17px; fill: #fff;" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
          ASK ON WHATSAPP
        </a>
      </div>

      <!-- Secondary Pair (.act2): See Live + Book a Video Call -->
      <div class="act2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 16px;">
        <a href="https://wa.me/919680552270?text=Hello%20Vivaaz%20Gems,%20I%20would%20like%20to%20see%20this%20exact%20lot%20live:%20<?php echo urlencode($title); ?>%20(<?php echo urlencode($sku); ?>)" target="_blank" style="text-decoration: none; border: 1px solid var(--line2, #E6E2DC); background: #fff; padding: 12px 10px; display: flex; gap: 8px; align-items: center; justify-content: center; font-size: 11.5px; letter-spacing: 0.14em; font-weight: 700; text-transform: uppercase; color: #1C1A17;">
          <svg class="i" style="width: 17px; height: 17px; fill: #1E9E52;" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
          SEE THIS EXACT LOT LIVE
        </a>
        <a href="javascript:void(0);" onclick="openVideoCallModal();" style="text-decoration: none; border: 1px solid var(--line2, #E6E2DC); background: #fff; padding: 12px 10px; display: flex; gap: 8px; align-items: center; justify-content: center; font-size: 11.5px; letter-spacing: 0.14em; font-weight: 700; text-transform: uppercase; color: #1C1A17;">
          <svg class="i" style="width: 17px; height: 17px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
          BOOK A VIDEO CALL
        </a>
      </div>

      <!-- Quiet Trust Line (.trow) -->
      <div class="trow" style="display: flex; gap: 8px 20px; justify-content: center; flex-wrap: wrap; font-size: 12.5px; color: #76706A; padding-top: 14px; border-top: 1px solid var(--line, #EFE9E0);">
        <span>Ships in 1–2 days</span>
        <span>·</span>
        <span>Insured worldwide</span>
        <span>·</span>
        <a href="<?php echo esc_url(home_url('/guarantee/')); ?>" class="link" style="color: #9B7C4E; text-decoration: underline;">Our guarantee</a>
      </div>

    </div>

    <!-- Q3: THE STONE PASSPORT BOX (Header Playfair 22px) -->
    <div class="q3">
      <div class="stonebox" style="margin: 0; flex: 1; background: #fff; border: 1px solid var(--line, #EFE9E0); padding: 22px;">
        <div class="sbh" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; border-bottom: 1px solid var(--line, #EFE9E0); padding-bottom: 12px;">
          <h4 style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 22px; font-weight: 400; margin: 0; color: #1C1A17;">The stone</h4>
          <span style="font-size: 10.5px; letter-spacing: 0.2em; color: #9B7C4E; font-weight: 700; text-transform: uppercase;">PASSPORT · <?php echo esc_html($sku); ?></span>
        </div>

        <div class="keys" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 18px; padding-bottom: 18px; border-bottom: 1px solid var(--line, #EFE9E0);">
          <div>
            <b id="passport-size-val" style="display: block; font-size: 16px; color: #1C1A17;"><?php echo esc_html($default_size); ?></b>
            <span style="font-size: 10.5px; letter-spacing: 0.14em; color: #76706A; text-transform: uppercase;">SIZE</span>
          </div>
          <div>
            <b style="display: block; font-size: 16px; color: #1C1A17;"><?php echo esc_html($weight); ?></b>
            <span style="font-size: 10.5px; letter-spacing: 0.14em; color: #76706A; text-transform: uppercase;"><?php echo $is_pair ? 'TOTAL WEIGHT' : ($is_single ? 'CARAT WEIGHT' : 'EACH PIECE'); ?></span>
          </div>
          <div>
            <b style="display: block; font-size: 16px; color: #1C1A17;"><?php echo $is_single_or_pair ? 'Exact' : '±0.1 mm'; ?></b>
            <span style="font-size: 10.5px; letter-spacing: 0.14em; color: #76706A; text-transform: uppercase;">CALIBRATED</span>
          </div>
          <div>
            <b style="display: block; font-size: 16px; color: #1C1A17;"><?php echo esc_html($treatment); ?></b>
            <span style="font-size: 10.5px; letter-spacing: 0.14em; color: #76706A; text-transform: uppercase;">TREATMENT</span>
          </div>
        </div>

        <div class="spec" style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px;">
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">STONE</span>
            <span style="font-weight: 600; color: #1C1A17;"><?php echo esc_html($stone_name); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">ORIGIN</span>
            <span><?php echo esc_html($origin); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">CUT AND SHAPE</span>
            <span><?php echo esc_html($cut_shape); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">COLOUR</span>
            <span><?php echo esc_html($color_clarity); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">HARDNESS</span>
            <span>6 – 6.5 Mohs</span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">QUALITY</span>
            <span><?php echo esc_html($quality); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">COLOUR MATCH</span>
            <span><?php echo $is_pair ? 'Matched pair' : ($is_single ? 'Unique single piece' : 'Within the lot'); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">TREATMENT</span>
            <span><?php echo esc_html($treatment); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; padding-top: 2px;">
            <span style="color: #76706A; font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">PRICE PER CARAT</span>
            <span style="font-weight: 600; color: #1C1A17;"><?php echo $is_pair ? '₹ 1,061 / ct' : ($is_single ? '₹ 1,500 / ct' : '₹ 445'); ?></span>
          </div>
          
          <div style="margin-top: 8px; padding-top: 8px; border-top: 1px solid var(--line, #EFE9E0);">
            <a href="<?php echo esc_url(home_url('/treatments/')); ?>" style="font-size: 12px; color: #9B7C4E; text-decoration: none; border-bottom: 1px solid #9B7C4E;">How we describe treatments →</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Q4: 5 ACCORDIONS, MAKE IT INTO JEWELRY, BUYING IN BULK -->
    <div class="q4">
      
      <!-- 5 Small Sections (Accordions with thin chevron, all closed initially) -->
      <div class="acc-wrapper" style="border-top: 1px solid var(--line, #EFE9E0);">
        
        <!-- 1. Shipping and export -->
        <details style="border-bottom: 1px solid var(--line, #EFE9E0);">
          <summary style="list-style: none; display: flex; justify-content: space-between; align-items: center; padding: 14px 0; font-size: 13.5px; font-weight: 600; cursor: pointer; color: #1C1A17;">
            Shipping and export
            <svg class="i" style="width: 12px; height: 12px; color: #76706A;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </summary>
          <div style="padding-bottom: 14px; font-size: 13px; color: #76706A; line-height: 1.6;">
            India: insured courier, about 2–3 days. Outside India: insured express, about 4–7 days. Shipped directly from our Jaipur sorting workshop.
          </div>
        </details>

        <!-- 2. Our guarantee -->
        <details style="border-bottom: 1px solid var(--line, #EFE9E0);">
          <summary style="list-style: none; display: flex; justify-content: space-between; align-items: center; padding: 14px 0; font-size: 13.5px; font-weight: 600; cursor: pointer; color: #1C1A17;">
            Our guarantee
            <svg class="i" style="width: 12px; height: 12px; color: #76706A;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </summary>
          <div style="padding-bottom: 14px; font-size: 13px; color: #76706A; line-height: 1.6;">
            Every parcel is inspected by hand. Replaced or refunded if any stone arrives damaged, off-size, or not matching the approved specifications.
          </div>
        </details>

        <!-- 3. Lab certificate -->
        <details style="border-bottom: 1px solid var(--line, #EFE9E0);">
          <summary style="list-style: none; display: flex; justify-content: space-between; align-items: center; padding: 14px 0; font-size: 13.5px; font-weight: 600; cursor: pointer; color: #1C1A17;">
            Lab certificate
            <svg class="i" style="width: 12px; height: 12px; color: #76706A;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </summary>
          <div style="padding-bottom: 14px; font-size: 13px; color: #76706A; line-height: 1.6;">
            Government-approved laboratory certificate available for any stone upon request. Every piece tested for natural origin and treatments.
          </div>
        </details>

        <!-- 4. Care and setting -->
        <details style="border-bottom: 1px solid var(--line, #EFE9E0);">
          <summary style="list-style: none; display: flex; justify-content: space-between; align-items: center; padding: 14px 0; font-size: 13.5px; font-weight: 600; cursor: pointer; color: #1C1A17;">
            Care and setting
            <svg class="i" style="width: 12px; height: 12px; color: #76706A;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </summary>
          <div style="padding-bottom: 14px; font-size: 13px; color: #76706A; line-height: 1.6;">
            Clean with warm water, mild soap, and a soft brush. Ultrasonic and steam cleaning safe for untreated gemstones. Store separately to prevent surface scratches.
          </div>
        </details>

        <!-- 5. About [stone] -->
        <details style="border-bottom: 1px solid var(--line, #EFE9E0);">
          <summary style="list-style: none; display: flex; justify-content: space-between; align-items: center; padding: 14px 0; font-size: 13.5px; font-weight: 600; cursor: pointer; color: #1C1A17;">
            About <?php echo esc_html($stone_name); ?>
            <svg class="i" style="width: 12px; height: 12px; color: #76706A;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </summary>
          <div style="padding-bottom: 14px; font-size: 13px; color: #76706A; line-height: 1.6;">
            <?php echo esc_html($stone_name); ?> is valued for its unique color, optical phenomena and brilliance. Sourced ethically from world-renowned mines and cut by master artisans in Jaipur.
          </div>
        </details>

      </div>

      <!-- Make it into jewelry Card (Header Playfair 21px regular) -->
      <div class="make" style="background: #1C1A17; color: #FFFFFF; padding: 18px 22px; display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
        <div>
          <h4 style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 21px; font-weight: 400; color: #FFFFFF; margin: 0 0 4px;">Make it into jewelry</h4>
          <p style="font-size: 12px; color: #CCCCCC; margin: 0;">We set this stone in silver or gold. Asking is free.</p>
        </div>
        <a href="<?php echo esc_url(home_url('/make-it-into-jewelry/')); ?>" class="ul" style="color: #FFFFFF; font-size: 11.5px; font-weight: 700; text-decoration: underline; white-space: nowrap; margin-left: 14px;">
          Ask for a quote →
        </a>
      </div>

      <!-- Buying in bulk? Card (Header Playfair 21px regular) -->
      <div class="bulk" style="background: var(--sand, #F6F4F0); border: 1px solid var(--line, #EFE9E0); padding: 18px 22px; display: flex; justify-content: space-between; align-items: center; margin-top: 8px;">
        <div>
          <h4 style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 21px; font-weight: 400; color: #1C1A17; margin: 0 0 4px;">Buying in bulk?</h4>
          <p style="font-size: 12px; color: #76706A; margin: 0;">Many pieces, another size or a matched set. Asking is free.</p>
        </div>
        <a href="<?php echo esc_url(home_url('/bulk-enquiry/')); ?>" class="btn o sm" style="text-decoration: none; font-size: 11px; white-space: nowrap; margin-left: 14px;">
          Bulk / B2B enquiry
        </a>
      </div>

    </div>

  </div>

  <!-- SIMILAR STONES SECTION (Point 6 Spec) -->
  <section class="sec wrap" style="padding-block: 56px 0;">
    <div class="sech" style="margin-bottom: 24px; border-bottom: 1px solid var(--line, #EFE9E0); padding-bottom: 12px;">
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

  <!-- PAIRS WELL WITH SECTION -->
  <section class="sec wrap" style="padding-block: 48px 0;">
    <div class="sech" style="margin-bottom: 24px; border-bottom: 1px solid var(--line, #EFE9E0); padding-bottom: 12px;">
      <h2 class="h2">Pairs well with</h2>
    </div>
    <div class="grid g4" style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 26px 22px;">
      <?php
      $pairs_args = array(
          'post_type'      => 'product',
          'posts_per_page' => 4,
          'post__not_in'   => array($product_id),
          'orderby'        => 'rand',
      );
      $pairs_query = new WP_Query($pairs_args);
      if ($pairs_query->have_posts()) :
          while ($pairs_query->have_posts()) : $pairs_query->the_post();
              wc_get_template_part('content', 'product');
          endwhile;
          wp_reset_postdata();
      endif;
      ?>
    </div>
  </section>

  <!-- RECENTLY VIEWED SECTION -->
  <section class="sec wrap" style="padding-block: 48px 0;">
    <div class="sech" style="margin-bottom: 24px; border-bottom: 1px solid var(--line, #EFE9E0); padding-bottom: 12px;">
      <h2 class="h2">Recently viewed</h2>
    </div>
    <div id="recently-viewed-grid" class="grid g4" style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 26px 22px;">
      <p style="color:#76706A; font-size:13px; grid-column:1/-1;">You have not viewed any other stones yet.</p>
    </div>
  </section>

</div>

<!-- STICKY MOBILE BUY BAR (Above Bottom Nav at 58px) -->
<div class="mobile-product-buybar buybar" id="mobile-product-buybar">
  <button type="button" class="btn" onclick="triggerAddToCart();" style="width: 100%; padding: 14px; font-size: 12px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">
    ADD TO CART · <span id="bar-pcs-count"><?php echo esc_html($btn_qty_label); ?></span>
  </button>
  <a href="https://wa.me/919680552270?text=Hello%20Vivaaz%20Gems,%20I%20am%20interested%20in%20<?php echo urlencode($title); ?>" target="_blank" class="btn wa" style="width: 56px; padding: 0; display: flex; align-items: center; justify-content: center; background: #1E9E52; border-color: #1E9E52;" title="Ask on WhatsApp">
    <svg class="i" style="width: 20px; height: 20px; color: #fff; fill: currentColor;" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
  </a>
</div>

<!-- Interactive Product Page Scripts -->
<script>
  var isSingleOrPair = <?php echo $is_single_or_pair ? 'true' : 'false'; ?>;
  var isPair = <?php echo $is_pair ? 'true' : 'false'; ?>;
  var currentUnitPrice = <?php echo $active_unit_price; ?>;
  var currentQty = <?php echo $initial_qty; ?>;
  var currentSize = <?php echo json_encode($default_size); ?>;

  function switchProdView(view, btn) {
    var btns = document.querySelectorAll('.gal-view-btn');
    btns.forEach(function(b) {
      b.classList.remove('on');
    });
    if (btn) btn.classList.add('on');

    var img = document.getElementById('prod-main-img');
    var vTag = document.getElementById('prod-video-tag');
    var rTag = document.getElementById('prod-ruler-tag');

    if (!img) return;

    if (view === 'video') {
      img.style.filter = 'none';
      img.style.transform = 'scale(1)';
      if (vTag) vTag.style.display = 'block';
      if (rTag) rTag.style.display = 'none';
    } else if (view === 'daylight') {
      img.style.filter = 'brightness(1.08) contrast(1.02)';
      img.style.transform = 'scale(1)';
      if (vTag) vTag.style.display = 'none';
      if (rTag) rTag.style.display = 'none';
    } else if (view === 'lamp') {
      img.style.filter = 'sepia(0.15) brightness(1.05)';
      img.style.transform = 'scale(1)';
      if (vTag) vTag.style.display = 'none';
      if (rTag) rTag.style.display = 'none';
    } else if (view === 'loupe') {
      img.style.filter = 'none';
      img.style.transform = 'scale(1.4)';
      if (vTag) vTag.style.display = 'none';
      if (rTag) rTag.style.display = 'none';
    } else if (view === 'size') {
      img.style.filter = 'none';
      img.style.transform = 'scale(1)';
      if (vTag) vTag.style.display = 'none';
      if (rTag) rTag.style.display = 'block';
    }
  }

  function switchProdThumb(idx, btn) {
    var thumbs = document.querySelectorAll('.thumb-btn');
    thumbs.forEach(function(t) {
      t.classList.remove('on');
      t.style.borderColor = 'var(--line2, #E6E2DC)';
    });
    if (btn) {
      btn.classList.add('on');
      btn.style.borderColor = '#1C1A17';
    }
    if (idx === 0) switchProdView('video', document.querySelectorAll('.gal-view-btn')[0]);
    if (idx === 1) switchProdView('daylight', document.querySelectorAll('.gal-view-btn')[1]);
    if (idx === 2) switchProdView('lamp', document.querySelectorAll('.gal-view-btn')[2]);
    if (idx === 3) switchProdView('loupe', document.querySelectorAll('.gal-view-btn')[3]);
  }

  function selectProdSize(size, btn) {
    var chips = document.querySelectorAll('.size-chip');
    chips.forEach(function(c) {
      c.classList.remove('on');
    });
    if (btn) btn.classList.add('on');
    currentSize = size;
    var passSize = document.getElementById('passport-size-val');
    if (passSize) passSize.textContent = size + ' mm';
    var rTag = document.getElementById('prod-ruler-tag');
    if (rTag) rTag.textContent = 'Grid squares are 1 mm · ' + size + ' mm';
  }

  function setProductQty(qty) {
    if (isSingleOrPair) return;
    currentQty = qty;
    var qInput = document.getElementById('prod-qty-input');
    if (qInput) qInput.value = qty;
    updateTierHighlight();
    recalcTotal();
  }

  function stepQty(delta) {
    if (isSingleOrPair) return;
    var next = currentQty + delta;
    if (next < 1) next = 1;
    setProductQty(next);
  }

  function onQtyInputChange(val) {
    if (isSingleOrPair) return;
    var parsed = parseInt(val, 10);
    if (isNaN(parsed) || parsed < 1) parsed = 1;
    setProductQty(parsed);
  }

  function updateTierHighlight() {
    if (isSingleOrPair) return;
    var t1 = document.getElementById('tier-box-1');
    var t10 = document.getElementById('tier-box-10');
    var t50 = document.getElementById('tier-box-50');
    var tBadge = document.getElementById('tier-badge-label');

    if (!t1 || !t10 || !t50) return;

    [t1, t10, t50].forEach(function(b) {
      b.classList.remove('on');
      b.style.background = '#fff';
      b.style.color = '#1C1A17';
      b.style.borderColor = 'var(--line2, #E6E2DC)';
      var bld = b.querySelector('b');
      if (bld) bld.style.color = '#1C1A17';
    });

    if (currentQty >= 50) {
      currentUnitPrice = <?php echo $tier_50_price; ?>;
      t50.classList.add('on');
      t50.style.background = '#1C1A17';
      t50.style.color = '#fff';
      t50.style.borderColor = '#1C1A17';
      if (t50.querySelector('b')) t50.querySelector('b').style.color = '#fff';
      if (tBadge) tBadge.textContent = '50+ price';
    } else if (currentQty >= 10) {
      currentUnitPrice = <?php echo $tier_10_price; ?>;
      t10.classList.add('on');
      t10.style.background = '#1C1A17';
      t10.style.color = '#fff';
      t10.style.borderColor = '#1C1A17';
      if (t10.querySelector('b')) t10.querySelector('b').style.color = '#fff';
      if (tBadge) tBadge.textContent = '10+ price';
    } else {
      currentUnitPrice = <?php echo $tier_1_price; ?>;
      t1.classList.add('on');
      t1.style.background = '#1C1A17';
      t1.style.color = '#fff';
      t1.style.borderColor = '#1C1A17';
      if (t1.querySelector('b')) t1.querySelector('b').style.color = '#fff';
      if (tBadge) tBadge.textContent = '1–9 price';
    }

    var pDisplay = document.getElementById('prod-price-display');
    if (pDisplay) pDisplay.textContent = '₹ ' + currentUnitPrice.toLocaleString('en-IN');
  }

  function recalcTotal() {
    var total = currentUnitPrice * currentQty;
    var tDisplay = document.getElementById('prod-total-display');
    if (tDisplay) tDisplay.textContent = '₹ ' + total.toLocaleString('en-IN');
    var label = isPair ? '1 PAIR' : (isSingleOrPair ? '1 PC' : currentQty + ' PCS');
    var barCount = document.getElementById('bar-pcs-count');
    if (barCount) barCount.textContent = label;
    var barCountBtn = document.getElementById('bar-pcs-count-btn');
    if (barCountBtn) barCountBtn.textContent = label;
  }

  function triggerAddToCart() {
    var pTitle = <?php echo json_encode($title); ?>;
    var pImg = <?php echo json_encode($main_img); ?>;
    var pId = <?php echo intval($product_id ?: 1); ?>;
    
    if (typeof addProductToCartAndOpenDrawer === 'function') {
      addProductToCartAndOpenDrawer(pId, pTitle, pImg, '₹ ' + currentUnitPrice, currentSize, currentQty);
    } else if (typeof openCartDrawer === 'function') {
      openCartDrawer();
    }
  }
</script>

<?php
do_action('woocommerce_after_single_product');
