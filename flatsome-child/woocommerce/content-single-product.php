<?php
if (file_exists(get_stylesheet_directory() . '/vivaaz-catalog.php')) {
    require_once get_stylesheet_directory() . '/vivaaz-catalog.php';
}
/**
 * Vivaaz Gems - Custom WooCommerce Single Product Template
 * 100% Exact Implementation of Client Desktop & Phone Demos and 24 Oct Punch List.
 * Desktop: Balanced 2 Columns (.pd.pd2g: Q1+Q3 Left, Q2+Q4 Right, ending level).
 * Mobile: Strictly One Column in exact demo sequence:
 * Photo -> View chips -> Code/Name/Price -> Tiers -> Size + See actual size -> Pieces stepper ->
 * Buttons -> See exact lot live + Book a video call -> Ships line -> The stone (Passport) ->
 * 5 Small sections -> Buying in bulk -> Make it into jewelry -> Pairs well with -> Similar stones.
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
$base_unit_1   = !empty($stone_info['base_price']) ? $stone_info['base_price'] : 120;
$cut_shape     = !empty($stone_info['cut_shape']) ? $stone_info['cut_shape'] : 'Cabochon, oval';
$origin        = !empty($stone_info['origin']) ? $stone_info['origin'] : 'Sri Lanka / Jaipur';
$treatment     = !empty($stone_info['treatment']) ? $stone_info['treatment'] : 'None (100% natural)';
$color_clarity = !empty($stone_info['color_clarity']) ? $stone_info['color_clarity'] : 'White with bright blue flash';
$quality       = !empty($stone_info['quality']) ? $stone_info['quality'] : 'Natural matched lot';
$default_size  = !empty($stone_info['size']) ? $stone_info['size'] : '6×8 mm';
$weight        = !empty($stone_info['weight']) ? $stone_info['weight'] : '≈ 0.85 ct per piece';
$tolerance     = !empty($stone_info['tolerance']) ? $stone_info['tolerance'] : '±0.1 mm';
$is_single_prop= !empty($stone_info['is_single']) ? true : false;
$species       = !empty($stone_info['species']) ? $stone_info['species'] : 'Natural Gemstone';
$hardness      = !empty($stone_info['hardness']) ? $stone_info['hardness'] : '7.0 Mohs';
$astrology     = !empty($stone_info['astrology']) ? $stone_info['astrology'] : '';
$sizes_list    = !empty($stone_info['sizes']) ? $stone_info['sizes'] : array();
$main_img      = !empty($stone_info['main_img']) ? $stone_info['main_img'] : (function_exists('vivaaz_get_img_url') ? vivaaz_get_img_url($stone_key . '.jpg') : '');

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
    $tier_1_price  = 2600;
    $tier_10_price = 2600;
    $tier_50_price = 2600;
    $active_unit_price = 2600;
} elseif ($is_single) {
    $sold_as_tag   = 'ONLY 1';
    $unit_label    = 'one stone';
    $tag_note      = 'Only 1. This exact stone, as in the photos.';
    $initial_qty   = 1;
    $btn_qty_label = '1 PC';
    $tier_1_price  = 4800;
    $tier_10_price = 4800;
    $tier_50_price = 4800;
    $active_unit_price = 4800;
} else {
    $sold_as_tag   = 'CALIBRATED LOT';
    $unit_label    = 'per piece';
    $tag_note      = 'Natural Ceylon gemstone, sorted and calibrated in Jaipur. For rings, pendants and earrings.';
    $initial_qty   = 10;
    $btn_qty_label = '10 PCS';
    // Base unit price (1-9 pcs)
    $tier_1_price  = $base_unit_1;
    // 10+ price: 12% off (Math.round(120 * 0.88) = 105)
    $tier_10_price = round($base_unit_1 * 0.88);
    // 50+ price: 23% off (Math.round(120 * 0.78) = 92)
    $tier_50_price = round($base_unit_1 * 0.78);
    $active_unit_price = $tier_10_price;
}

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

if ($product && is_object($product) && is_a($product, 'WC_Product')) {
    do_action('woocommerce_before_single_product');
} elseif (function_exists('wc_print_notices')) {
    wc_print_notices();
}
?>

<div class="wrap" style="padding-top: 18px; padding-bottom: 72px;">
  
  <!-- Breadcrumbs (12.5px #9A9186, ends with cut, thin arrows) -->
  <div class="crumb" style="font-size: 12.5px; color: #9A9186; display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 24px; align-items: center;">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a>
    <span>›</span>
    <a href="<?php echo esc_url(home_url('/gemstones/')); ?>" style="color: inherit; text-decoration: none;">Gemstones</a>
    <span>›</span>
    <a href="<?php echo esc_url(home_url('/gemstones/' . $group_filter . '/')); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html($group_name); ?></a>
    <span>›</span>
    <a href="<?php echo esc_url(home_url('/gemstones/' . strtolower(urlencode($stone_key)) . '/')); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html($stone_name); ?></a>
    <span>›</span>
    <b style="color: #1C1A17; font-weight: 500;"><?php echo esc_html($title); ?></b>
  </div>

  <!-- 4-QUADRANT PRODUCT GRID:
       Desktop: 2 columns with Q1+Q3 on left, Q2+Q4 on right (ending level).
       Mobile: Strictly 1 column ordered:
       Photo -> View chips -> Title/Price -> Tiers -> Size -> Stepper -> Buttons -> See Live/Video Call -> Ships -> The Stone -> 5 Accordions -> Bulk -> Make Jewelry -> Pairs Well -> Similar Stones. -->
  <div class="pd pd2g">
    
    <!-- Q1: GALLERY & VIEWS -->
    <div class="q1">
      <div class="mainimg" id="prod-mainimg-box" style="aspect-ratio: 1/1; background: #F1F0EE; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; border: 1px solid var(--line, #EFE9E0);">
        <img id="prod-main-img" src="<?php echo esc_url($main_img); ?>" alt="<?php echo esc_attr($title); ?>" style="width: 72%; object-fit: contain; transition: transform .3s;">
        <span class="play" id="prod-video-tag" style="position: absolute; bottom: 12px; left: 12px; background: rgba(28,26,23,.85); color: #fff; font-size: 11px; letter-spacing: 0.12em; padding: 6px 10px; font-weight: 600; cursor: pointer;" onclick="if(typeof openVideoModal==='function') openVideoModal('<?php echo esc_js($stone_key); ?>');">▶ 0:08 · <?php echo esc_html($sku); ?></span>
        <span class="ruler" id="prod-ruler-tag" style="display: none; position: absolute; bottom: 14px; left: 50%; transform: translateX(-50%); background: var(--paper, #fff); color: var(--mute, #76706A); font-size: 11.5px; white-space: nowrap; padding: 5px 12px; border: 1px solid var(--line, #E8E1D6); box-shadow: 0 2px 8px rgba(0,0,0,0.08); z-index: 5;">Grid squares are 1 mm · <?php echo esc_html($default_size); ?></span>
      </div>

      <!-- View chips in ONE single scrolling row (33px high, rounded 999px, normal letters) -->
      <div class="views" style="display: flex; gap: 8px; flex-wrap: nowrap; overflow-x: auto; margin-top: 12px; margin-bottom: 12px; padding: 4px 0; scrollbar-width: none;">
        <button type="button" class="gal-view-btn on chip" onclick="switchProdView('video', this)">▶ Video</button>
        <button type="button" class="gal-view-btn chip" onclick="switchProdView('daylight', this)">Daylight</button>
        <button type="button" class="gal-view-btn chip" onclick="switchProdView('lamp', this)">Lamp</button>
        <button type="button" class="gal-view-btn chip" onclick="switchProdView('loupe', this)">Under the loupe · 0:40</button>
        <button type="button" class="gal-view-btn chip" onclick="switchProdView('size', this)">Actual size</button>
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
      <div class="pd-info-block">
        <span class="eye" style="font-size: 10.5px; letter-spacing: 0.2em; color: #9B7C4E; font-weight: 700; text-transform: uppercase;">
          <?php echo esc_html($sku); ?> · <span style="<?php echo ($sold_as_tag === 'ONLY 1') ? 'background:#1C1A17;color:#fff;padding:2px 6px;' : ''; ?>"><?php echo esc_html($sold_as_tag); ?></span>
        </span>
        
        <h1 class="pt" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-weight: 400; font-size: 34px; line-height: 1.15; margin: 6px 0 10px; color: #1C1A17;">
          <?php echo esc_html($title); ?>
        </h1>
        
        <p style="color: #76706A; font-size: 14.5px; margin: 0 0 16px; line-height: 1.5;">
          <?php echo esc_html($tag_note); ?>
        </p>

        <!-- Price line -->
        <div class="price" style="font-size: 26px; font-weight: 600; color: #1C1A17; margin-bottom: 12px;">
          <span id="prod-price-display">&#8377; <?php echo number_format($active_unit_price); ?></span> 
          <span style="font-size: 13.5px; font-weight: 400; color: #76706A;">
            <?php echo esc_html($unit_label); ?> <?php echo !$is_single_or_pair ? '· <span id="tier-badge-label">10+ price</span>' : ''; ?>
          </span>
        </div>
      </div>

      <?php if (!$is_single_or_pair): ?>
      <!-- 3 Tier Blocks for Calibrated Lot -->
      <div class="tiers" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; margin-bottom: 18px;">
        <div class="tier-block" id="tier-box-1" onclick="setProductQty(1)" style="border: 1px solid var(--line2, #E6E2DC); padding: 10px 12px; text-align: left; cursor: pointer; background: #fff; color: #1C1A17; transition: all 0.2s;">
          <span style="display: block; font-size: 11px; color: #76706A;">1–9 pcs</span>
          <b style="font-size: 15px; color: #1C1A17;">&#8377; <?php echo number_format($tier_1_price); ?></b>
        </div>
        <div class="tier-block on" id="tier-box-10" onclick="setProductQty(10)" style="border: 1px solid #1C1A17; padding: 10px 12px; text-align: left; cursor: pointer; background: #1C1A17; color: #fff; transition: all 0.2s;">
          <span style="display: block; font-size: 11px; color: #cfc6b8;">10+ pcs</span>
          <b style="font-size: 15px; color: #fff;">&#8377; <?php echo number_format($tier_10_price); ?></b>
        </div>
        <div class="tier-block" id="tier-box-50" onclick="setProductQty(50)" style="border: 1px solid var(--line2, #E6E2DC); padding: 10px 12px; text-align: left; cursor: pointer; background: #fff; color: #1C1A17; transition: all 0.2s;">
          <span style="display: block; font-size: 11px; color: #76706A;">50+ pcs</span>
          <b style="font-size: 15px; color: #1C1A17;">&#8377; <?php echo number_format($tier_50_price); ?></b>
        </div>
      </div>
      <?php endif; ?>

      <!-- Size Selector (Rounded Chips 33px high) -->
      <div class="size-section">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
          <span class="lbl" style="font-size: 10.5px; letter-spacing: 0.2em; font-weight: 700; text-transform: uppercase; color: #9B7C4E;">SIZE (MM)</span>
          <a href="javascript:void(0);" onclick="switchProdView('size', document.querySelectorAll('.gal-view-btn')[4]);" style="font-size: 12px; color: #9B7C4E; text-decoration: underline; font-weight: 600;">See actual size</a>
        </div>
        <div class="chips" style="display: flex; gap: 7px; flex-wrap: wrap; margin-bottom: 18px;">
          <?php if ($is_single_or_pair): ?>
            <button type="button" class="chip size-chip on" style="cursor: default;"><?php echo esc_html($default_size); ?></button>
          <?php elseif (!empty($sizes_list)): ?>
            <?php foreach ($sizes_list as $sidx => $s): ?>
              <button type="button" class="chip size-chip <?php echo $sidx === 0 ? 'on' : ''; ?>" onclick="selectProductSize('<?php echo esc_js($s['size']); ?>', <?php echo intval($s['price']); ?>, this)"><?php echo esc_html($s['size']); ?></button>
            <?php endforeach; ?>
          <?php else: ?>
            <button type="button" class="chip size-chip" onclick="selectProductSize('4×6', 94, this)">4×6 mm</button>
            <button type="button" class="chip size-chip" onclick="selectProductSize('5×7', 105, this)">5×7 mm</button>
            <button type="button" class="chip size-chip on" onclick="selectProductSize('6×8', 120, this)">6×8 mm</button>
            <button type="button" class="chip size-chip" onclick="selectProductSize('7×9', 165, this)">7×9 mm</button>
            <button type="button" class="chip size-chip" onclick="selectProductSize('8×10', 225, this)">8×10 mm</button>
          <?php endif; ?>
        </div>
      </div>

      <!-- Colour Selector (Chips with swatches) -->
      <div class="colour-section">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
          <span class="lbl" style="font-size: 10.5px; letter-spacing: 0.2em; font-weight: 700; text-transform: uppercase; color: #9B7C4E;">COLOUR</span>
        </div>
        <div class="chips colour-chips-row" style="display: flex; gap: 7px; flex-wrap: wrap; margin-bottom: 18px;">
          <?php
          $stone_lower = strtolower($stone_name);
          if (strpos($stone_lower, 'sapphire') !== false) {
            echo '<button type="button" class="chip colour-chip on" onclick="selectProdColour(\'Royal Blue\', \'#1B3F8B\', this)"><span class="sw" style="background:#1B3F8B; display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>Royal Blue</button>';
            echo '<button type="button" class="chip colour-chip" onclick="selectProdColour(\'Cornflower Blue\', \'#5B84D7\', this)"><span class="sw" style="background:#5B84D7; display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>Cornflower Blue</button>';
            echo '<button type="button" class="chip colour-chip" onclick="selectProdColour(\'Padparadscha\', \'#E8826B\', this)"><span class="sw" style="background:#E8826B; display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>Padparadscha</button>';
          } elseif (strpos($stone_lower, 'ruby') !== false) {
            echo '<button type="button" class="chip colour-chip on" onclick="selectProdColour(\'Pigeon Blood Red\', \'#9E132E\', this)"><span class="sw" style="background:#9E132E; display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>Pigeon Blood Red</button>';
            echo '<button type="button" class="chip colour-chip" onclick="selectProdColour(\'Deep Crimson\', \'#6B0B1E\', this)"><span class="sw" style="background:#6B0B1E; display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>Deep Crimson</button>';
          } elseif (strpos($stone_lower, 'emerald') !== false) {
            echo '<button type="button" class="chip colour-chip on" onclick="selectProdColour(\'Vivid Green\', \'#15803D\', this)"><span class="sw" style="background:#15803D; display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>Vivid Green</button>';
            echo '<button type="button" class="chip colour-chip" onclick="selectProdColour(\'Deep Forest Green\', \'#0E5227\', this)"><span class="sw" style="background:#0E5227; display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>Forest Green</button>';
          } else {
            echo '<button type="button" class="chip colour-chip on" onclick="selectProdColour(\'White with bright blue flash\', \'#F4F6FA\', this)"><span class="sw" style="background:#F4F6FA; border:1px solid #ccc; display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>White with blue flash</button>';
            echo '<button type="button" class="chip colour-chip" onclick="selectProdColour(\'Rainbow multi flash\', \'linear-gradient(135deg,#9B51E0,#2F80ED,#27AE60)\', this)"><span class="sw" style="background:linear-gradient(135deg,#9B51E0,#2F80ED,#27AE60); display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>Rainbow multi</button>';
          }
          ?>
        </div>
      </div>

      <?php if (!$is_single_or_pair): ?>
      <!-- Quantity Stepper for Lot -->
      <div class="pieces-section">
        <div class="lbl" style="font-size: 10.5px; letter-spacing: 0.2em; font-weight: 700; text-transform: uppercase; color: #9B7C4E; margin-bottom: 8px;">
          PIECES <span style="letter-spacing: 0; font-weight: 400; color: #76706A;">62 ready · more in 1–3 weeks</span>
        </div>
        <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 20px;">
          <div class="step" style="display: inline-flex; align-items: stretch; border: 1px solid #1C1A17; background: #fff; height: 38px; box-sizing: border-box; overflow: hidden; padding: 0; margin: 0;">
            <button type="button" onclick="stepQty(-1)" style="width: 38px; height: 100%; border: none; background: transparent; font-weight: 700; font-size: 16px; cursor: pointer; display: flex; align-items: center; justify-content: center; padding: 0; margin: 0; outline: none; box-shadow: none; line-height: 1; color: #1C1A17;">−</button>
            <input type="text" id="prod-qty-input" value="10" onchange="onQtyInputChange(this.value)" style="width: 50px; height: 100%; min-height: 0; border: none; border-left: 1px solid var(--line2, #E6E2DC); border-right: 1px solid var(--line2, #E6E2DC); text-align: center; font-size: 14px; font-weight: 600; outline: none; box-shadow: none; margin: 0; padding: 0; background: transparent; box-sizing: border-box; line-height: 1; border-radius: 0; color: #1C1A17;">
            <button type="button" onclick="stepQty(1)" style="width: 38px; height: 100%; border: none; background: transparent; font-weight: 700; font-size: 16px; cursor: pointer; display: flex; align-items: center; justify-content: center; padding: 0; margin: 0; outline: none; box-shadow: none; line-height: 1; color: #1C1A17;">+</button>
          </div>
          <span style="font-size: 13.5px; color: #1C1A17;">Total <b id="prod-total-price">&#8377; 940</b> · <span id="tier-hint-text" style="color: #76706A;">10+ price reached · save 12%</span></span>
        </div>
      </div>
      <?php endif; ?>

      <!-- Primary Action Buttons (Add to Bag + Buy Now + WhatsApp) -->
      <div class="act-main" style="display: grid; grid-template-columns: minmax(0, 1.2fr) minmax(0, 1fr) minmax(0, 0.9fr); gap: 10px; margin-bottom: 12px;">
        <button type="button" class="btn" onclick="triggerAddToCart();" style="width: 100%; height: 48px; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; background: #1C1A17; color: #fff; border: 1px solid #1C1A17; cursor: pointer;">
          ADD TO BAG · <span id="bar-pcs-count-btn"><?php echo esc_html($btn_qty_label); ?></span>
        </button>

        <button type="button" class="btn" onclick="triggerBuyNow();" style="width: 100%; height: 48px; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; background: #9B7C4E; color: #fff; border: 1px solid #9B7C4E; cursor: pointer;">
          BUY NOW
        </button>
        
        <a href="https://wa.me/919680552270?text=Hello%20Vivaaz%20Gems,%20I%20am%20interested%20in%20<?php echo urlencode($title); ?>%20(<?php echo urlencode($sku); ?>)" target="_blank" class="btn wa" style="text-decoration: none; width: 100%; height: 48px; display: inline-flex; gap: 6px; align-items: center; justify-content: center; font-size: 11px; letter-spacing: 0.12em; font-weight: 700; text-transform: uppercase; background: #1E9E52; border: 1px solid #1E9E52; color: #fff;">
          <svg style="width: 16px; height: 16px; fill: #FFFFFF; display: block;" viewBox="0 0 448 512">
            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
          </svg>
          WHATSAPP
        </a>
      </div>

      <!-- Secondary Pair (.act2): See Live + Book a Video Call -->
      <div class="act2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 16px;">
        <a href="https://wa.me/919680552270?text=Hello%20Vivaaz%20Gems,%20I%20would%20like%20to%20see%20this%20exact%20lot%20live:%20<?php echo urlencode($title); ?>%20(<?php echo urlencode($sku); ?>)" target="_blank" style="text-decoration: none; border: 1px solid var(--line2, #E6E2DC); background: #fff; padding: 12px 10px; display: flex; gap: 8px; align-items: center; justify-content: center; font-size: 11.5px; letter-spacing: 0.14em; font-weight: 700; text-transform: uppercase; color: #1C1A17;">
          <svg style="width: 18px; height: 18px; fill: #1E9E52; display: block;" viewBox="0 0 448 512">
            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
          </svg>
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
            <b id="passport-weight-val" style="display: block; font-size: 16px; color: #1C1A17;"><?php echo esc_html($weight); ?></b>
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
            <span style="color: #76706A; font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">SPECIES</span>
            <span><?php echo esc_html($species); ?></span>
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
            <span id="passport-colour-val"><?php echo esc_html($color_clarity); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">HARDNESS</span>
            <span><?php echo esc_html($hardness); ?></span>
          </div><?php if (!empty($astrology)): ?>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase;">ASTROLOGY</span>
            <span style="font-size: 12px; max-width: 65%; text-align: right;"><?php echo esc_html($astrology); ?></span>
          </div><?php endif; ?>
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
            <span style="font-weight: 600; color: #1C1A17;"><?php echo $is_pair ? '&#8377; 1,061 / ct' : ($is_single ? '&#8377; 1,500 / ct' : '&#8377; 445 / ct'); ?></span>
          </div>
          
          <div style="margin-top: 8px; padding-top: 8px; border-top: 1px solid var(--line, #EFE9E0);">
            <a href="<?php echo esc_url(home_url('/treatments/')); ?>" style="font-size: 12px; color: #9B7C4E; text-decoration: none; border-bottom: 1px solid #9B7C4E;">How we describe treatments →</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Q4: 5 ACCORDIONS, BUYING IN BULK, MAKE IT INTO JEWELRY -->
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
            Avoid harsh chemicals and ultrasonic cleaners. Clean gently with warm soapy water and a soft cloth. Take care when bezel or prong setting.
          </div>
        </details>

        <!-- 5. About stone -->
        <details style="border-bottom: 1px solid var(--line, #EFE9E0);">
          <summary style="list-style: none; display: flex; justify-content: space-between; align-items: center; padding: 14px 0; font-size: 13.5px; font-weight: 600; cursor: pointer; color: #1C1A17;">
            About <?php echo esc_html($stone_name); ?>
            <svg class="i" style="width: 12px; height: 12px; color: #76706A;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </summary>
          <div style="padding-bottom: 14px; font-size: 13px; color: #76706A; line-height: 1.6;">
            <?php echo esc_html($stone_name); ?> is valued for its genuine natural colour and vivid lustre. Calibrated accurately to ensure easy mounting into jewellery settings.
          </div>
        </details>

      </div>

      <!-- Make it into jewelry (Playfair 21 regular) -->
      <div class="make" style="background: #1C1A17; color: #fff; padding: 22px; margin-top: 24px; display: flex; justify-content: space-between; align-items: center; gap: 16px; flex-wrap: wrap;">
        <div>
          <h3 style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 21px; font-weight: 400; margin: 0 0 4px; color: #fff;">Make it into jewelry</h3>
          <p style="font-size: 13px; color: #DDD3C5; margin: 0;">We set this stone in silver or gold. Asking is free.</p>
        </div>
        <a href="javascript:void(0);" onclick="openDesignQuoteModal();" class="link-gold" style="color: #DDD3C5; font-size: 12px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; text-decoration: underline; text-underline-offset: 3px;">ASK FOR A QUOTE →</a>
      </div>

      <!-- Buying in bulk? (Playfair 21 regular) -->
      <div class="bulk" style="background: var(--sand, #F1EBE1); padding: 22px; margin-top: 14px; display: flex; justify-content: space-between; align-items: center; gap: 16px; flex-wrap: wrap;">
        <div>
          <h3 style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 21px; font-weight: 400; margin: 0 0 4px; color: #1C1A17;">Buying in bulk?</h3>
          <p style="font-size: 13px; color: #76706A; margin: 0;">Many pieces, another size or a matched set. Asking is free.</p>
        </div>
        <a href="<?php echo esc_url(home_url('/bulk-enquiry/')); ?>" class="btn" style="padding: 12px 20px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; background: #FFFFFF; color: #1C1A17; border: 1px solid #1C1A17; text-decoration: none;">BULK / B2B ENQUIRY</a>
      </div>

    </div>

  </div>

  <!-- PAIRS WELL WITH SECTION -->
  <section class="sec wrap pairs-well-section" style="padding-block: 48px 0;">
    <div class="sech" style="margin-bottom: 24px; border-bottom: 1px solid var(--line, #EFE9E0); padding-bottom: 12px;">
      <h2 class="h2">Pairs well with</h2>
    </div>
    <div class="grid g4" style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 26px 22px;">
      
      <!-- Card 1: Ceylon Blue Sapphire -->
      <div class="card rv" data-price="1131">
        <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=sapphire')); ?>';">
          <span class="tag">CALIBRATED LOT</span>
          <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Ceylon Blue Sapphire">
          <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('bsfov');">QUICK VIEW</button>
        </div>
        <div class="cb">
          <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=sapphire')); ?>';">Ceylon Blue Sapphire Oval Faceted</div>
          <div class="dt">Faceted · 3×5 to 7×9 mm · 5 sizes</div>
          <div class="pr" data-inr-price="1131">from &#8377;1,131 <span>per piece</span></div>
          <div class="act">
            <a href="<?php echo esc_url(home_url('/shop/?stone=sapphire')); ?>" class="ul">ADD TO CART</a>
          </div>
        </div>
      </div>

      <!-- Card 2: Burma Ruby -->
      <div class="card rv" data-price="764">
        <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=ruby')); ?>';">
          <span class="tag">CALIBRATED LOT</span>
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Burma Ruby Oval">
          <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('Ruby Oval Faceted · AA', 'from &#8377;764', '<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>');">QUICK VIEW</button>
        </div>
        <div class="cb">
          <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=ruby')); ?>';">Burma Ruby Oval Faceted · AA</div>
          <div class="dt">Faceted · 3×4 to 5×7 mm · 4 sizes</div>
          <div class="pr" data-inr-price="764">from &#8377;764 <span>per piece</span></div>
          <div class="act">
            <a href="<?php echo esc_url(home_url('/shop/?stone=ruby')); ?>" class="ul">ADD TO CART</a>
          </div>
        </div>
      </div>

      <!-- Card 3: Zambian Emerald -->
      <div class="card rv" data-price="1450">
        <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=emerald')); ?>';">
          <span class="tag">CALIBRATED LOT</span>
          <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Zambian Emerald">
          <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('Zambian Emerald Step Cut', 'from &#8377;1,450', '<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>');">QUICK VIEW</button>
        </div>
        <div class="cb">
          <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=emerald')); ?>';">Zambian Emerald Octagon Step Cut</div>
          <div class="dt">Step Cut · 4×6 to 8×10 mm · 4 sizes</div>
          <div class="pr" data-inr-price="1450">from &#8377;1,450 <span>per piece</span></div>
          <div class="act">
            <a href="<?php echo esc_url(home_url('/shop/?stone=emerald')); ?>" class="ul">ADD TO CART</a>
          </div>
        </div>
      </div>

      <!-- Card 4: Swiss Blue Topaz -->
      <div class="card rv" data-price="320">
        <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=topaz')); ?>';">
          <span class="tag">CALIBRATED LOT</span>
          <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Swiss Blue Topaz">
          <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('Swiss Blue Topaz Square Cushion', 'from &#8377;320', '<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>');">QUICK VIEW</button>
        </div>
        <div class="cb">
          <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=topaz')); ?>';">Swiss Blue Topaz Square Cushion</div>
          <div class="dt">Cushion · 5×5 to 10×10 mm · 6 sizes</div>
          <div class="pr" data-inr-price="320">from &#8377;320 <span>per piece</span></div>
          <div class="act">
            <a href="<?php echo esc_url(home_url('/shop/?stone=topaz')); ?>" class="ul">ADD TO CART</a>
          </div>
        </div>
      </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- SIMILAR STONES SECTION (Always Populated, Includes Quick View) -->
  <section class="sec wrap similar-stones-section" style="padding-block: 56px 0;">
    <div class="sech" style="margin-bottom: 24px; border-bottom: 1px solid var(--line, #EFE9E0); padding-bottom: 12px;">
      <h2 class="h2">Similar stones</h2>
    </div>
    <div class="grid g4" style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 26px 22px;">
      
      <!-- Card 1: Rainbow Moonstone Pair -->
      <div class="card rv" data-price="2600">
        <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=moonstone')); ?>';">
          <span class="tag">PAIR</span>
          <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Oval Matched Pair">
          <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('rmcpr');">QUICK VIEW</button>
        </div>
        <div class="cb">
          <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=moonstone')); ?>';">Rainbow Moonstone Oval Matched Pair</div>
          <div class="dt">Cabochon · 6×8 to 7×9 mm · Pair</div>
          <div class="pr" data-inr-price="2600">&#8377;2,600 <span>for the pair</span></div>
          <div class="act">
            <a href="<?php echo esc_url(home_url('/shop/?stone=moonstone')); ?>" class="ul">ADD TO CART</a>
          </div>
        </div>
      </div>

      <!-- Card 2: Ceylon Sapphire -->
      <div class="card rv" data-price="1131">
        <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=sapphire')); ?>';">
          <span class="tag">CALIBRATED LOT</span>
          <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Ceylon Blue Sapphire Oval">
          <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('bsfov');">QUICK VIEW</button>
        </div>
        <div class="cb">
          <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=sapphire')); ?>';">Ceylon Blue Sapphire Oval Faceted</div>
          <div class="dt">Faceted · 3×5 to 7×9 mm · 5 sizes</div>
          <div class="pr" data-inr-price="1131">from &#8377;1,131 <span>per piece</span></div>
          <div class="act">
            <a href="<?php echo esc_url(home_url('/shop/?stone=sapphire')); ?>" class="ul">ADD TO CART</a>
          </div>
        </div>
      </div>

      <!-- Card 3: Only 1 Rainbow Moonstone Collector -->
      <div class="card rv" data-price="38500">
        <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=moonstone')); ?>';">
          <span class="tag only1" data-tag="ONLY 1">ONLY 1</span>
          <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone 32ct Collector Lot">
          <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('rmc1825');">QUICK VIEW</button>
        </div>
        <div class="cb">
          <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=moonstone')); ?>';">Rainbow Moonstone 32ct Collector Lot</div>
          <div class="dt">Mixed 3–9 mm · High Flash</div>
          <div class="pr" data-inr-price="38500">&#8377;38,500 <span>for the lot</span></div>
          <div class="act">
            <a href="<?php echo esc_url(home_url('/shop/?stone=moonstone')); ?>" class="ul">ADD TO CART</a>
          </div>
        </div>
      </div>

      <!-- Card 4: Burma Ruby -->
      <div class="card rv" data-price="764">
        <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=ruby')); ?>';">
          <span class="tag">CALIBRATED LOT</span>
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby Oval Faceted">
          <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('Ruby Oval Faceted · AA', 'from &#8377;764', '<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>');">QUICK VIEW</button>
        </div>
        <div class="cb">
          <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?stone=ruby')); ?>';">Ruby Oval Faceted · AA</div>
          <div class="dt">Faceted · 3×4 to 5×7 mm · 4 sizes</div>
          <div class="pr" data-inr-price="764">from &#8377;764 <span>per piece</span></div>
          <div class="act">
            <a href="<?php echo esc_url(home_url('/shop/?stone=ruby')); ?>" class="ul">ADD TO CART</a>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- RECENTLY VIEWED SECTION -->
  <section class="sec wrap" style="padding-block: 48px 0;">
    <div class="sech" style="margin-bottom: 24px; border-bottom: 1px solid var(--line, #EFE9E0); padding-bottom: 12px;">
      <h2 class="h2">Recently viewed</h2>
    </div>
    <div id="recently-viewed-grid" class="grid g4" style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 26px 22px;">
      
      <div class="card rv" data-price="94">
        <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/shop/')); ?>';">
          <span class="tag">CALIBRATED LOT</span>
          <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone">
          <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('rmcoc68');">QUICK VIEW</button>
        </div>
        <div class="cb">
          <div class="nm">Rainbow Moonstone Oval Cabochon</div>
          <div class="dt">Cabochon · 3×4 to 12×16 mm · 8 sizes</div>
          <div class="pr" data-inr-price="94">from &#8377;94 <span>per piece</span></div>
          <div class="act">
            <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="ul">ADD TO CART</a>
          </div>
        </div>
      </div>

    </div>
  </section>

</div>

<!-- STICKY MOBILE BUY BAR: ADD TO CART + WHATSAPP BUTTON WITH THE WORD (GREEN) -->
<div class="mobile-product-buybar buybar" id="mobile-product-buybar">
  <button type="button" class="btn" onclick="triggerAddToCart();" style="flex: 1; padding: 14px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; background: #1C1A17; color: #fff; border: none; cursor: pointer;">
    ADD TO CART · <span id="bar-pcs-count"><?php echo esc_html($btn_qty_label); ?></span>
  </button>
  <a href="https://wa.me/919680552270?text=Hello%20Vivaaz%20Gems,%20I%20am%20interested%20in%20<?php echo urlencode($title); ?>" target="_blank" class="btn wa-btn" style="text-decoration: none; width: 130px; display: inline-flex; align-items: center; justify-content: center; gap: 6px; background: #1E9E52; color: #fff; font-size: 11.5px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;">
    <svg class="i" style="width: 17px; height: 17px; fill: currentColor;" viewBox="0 0 24 24"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm0 1.67c2.2 0 4.26.86 5.82 2.42a8.17 8.17 0 0 1 2.41 5.82c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.39-4.19-1.15l-.3-.18-3.12.82.83-3.04-.2-.32a8.188 8.188 0 0 1-1.25-4.37c0-4.54 3.7-8.24 8.24-8.24zm-4.71 4.54c-.26 0-.67.1-1.02.48-.35.38-1.35 1.32-1.35 3.22 0 1.9 1.38 3.74 1.57 4 .19.26 2.68 4.25 6.64 5.8.94.37 1.68.59 2.25.77.95.3 1.82.26 2.51.16.77-.12 2.37-.97 2.7-1.9.34-.94.34-1.74.24-1.91-.1-.17-.37-.27-.78-.47-.41-.2-2.43-1.2-2.81-1.34-.38-.14-.65-.2-.93.2-.27.4-.1.06-1.39 1.65-.17.2-.35.23-.76.03-.41-.2-1.73-.64-3.3-2.04-1.22-1.09-2.05-2.43-2.29-2.84-.24-.41-.03-.63.18-.83.18-.18.41-.47.62-.7.2-.24.27-.4.41-.67.14-.27.07-.5-.03-.7-.1-.2-.93-2.24-1.27-3.07-.34-.81-.68-.7-.93-.71z"/></svg>
    WhatsApp
  </a>
</div>

<!-- Interactive Product Page Scripts -->
<script>
  var isSingleOrPair = <?php echo $is_single_or_pair ? 'true' : 'false'; ?>;
  var isPair = <?php echo $is_pair ? 'true' : 'false'; ?>;
  var currentBasePrice = <?php echo $base_unit_1; ?>;
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
    var box = document.getElementById('prod-mainimg-box');

    if (!img) return;

    if (box) box.classList.remove('size');

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
      if (typeof openVideoModal === 'function') {
        openVideoModal('<?php echo esc_js($stone_key); ?>');
      }
      img.style.filter = 'none';
      img.style.transform = 'scale(1.4)';
      if (vTag) vTag.style.display = 'none';
      if (rTag) rTag.style.display = 'none';
    } else if (view === 'size') {
      img.style.filter = 'none';
      img.style.transform = 'scale(1)';
      if (box) box.classList.add('size');
      if (vTag) vTag.style.display = 'none';
      if (rTag) {
        rTag.style.display = 'block';
        rTag.textContent = 'Grid squares are 1 mm · ' + currentSize;
      }
    }
  }

  function switchProdThumb(idx, btn) {
    var thumbs = document.querySelectorAll('.thumb-btn');
    thumbs.forEach(function(t) {
      t.classList.remove('on');
    });
    if (btn) btn.classList.add('on');
    var views = document.querySelectorAll('.gal-view-btn');
    if (views[idx]) views[idx].click();
  }

  function selectProductSize(size, price, btn) {
    if (typeof price === 'object') {
      btn = price;
      price = 0;
    }
    var chips = document.querySelectorAll('.size-chip');
    chips.forEach(function(c) {
      c.classList.remove('on');
    });
    if (btn) btn.classList.add('on');
    currentSize = size;
    if (price && typeof price === 'number') {
      currentBasePrice = price;
    }
    var rTag = document.getElementById('prod-ruler-tag');
    if (rTag) {
      rTag.textContent = 'Grid squares are 1 mm · ' + currentSize;
    }
    var passSize = document.getElementById('passport-size-val');
    if (passSize) {
      passSize.textContent = currentSize + (currentSize.indexOf('mm') === -1 ? ' mm' : '');
    }
    recalcPricing();
  }
  window.selectProductSize = selectProductSize;
  window.selectProdSize = function(size, price, btn) { selectProductSize(size, price, btn); };

  function selectProductColor(colorName, btn) {
    var chips = document.querySelectorAll('.colour-chip, .color-chip');
    chips.forEach(function(c) {
      c.classList.remove('on');
    });
    if (btn) btn.classList.add('on');
    var disp = document.getElementById('selected-color-display');
    if (disp) disp.textContent = colorName;
    var passCol = document.getElementById('passport-colour-val');
    if (passCol) passCol.textContent = colorName;
  }
  window.selectProductColor = selectProductColor;
  window.selectProdColour = function(colorName, hex, btn) { selectProductColor(colorName, btn); };

  function recalcPricing() {
    var unitPrice = currentBasePrice;
    var hint = '';
    
    if (isSingleOrPair) {
      unitPrice = currentBasePrice;
      hint = isPair ? '1 pair selected' : 'Single stone';
    } else {
      var t10 = Math.round(currentBasePrice * 0.88);
      var t50 = Math.round(currentBasePrice * 0.78);
      
      var t1Box = document.getElementById('tier-box-1');
      var t10Box = document.getElementById('tier-box-10');
      var t50Box = document.getElementById('tier-box-50');
      if (t1Box) {
        var b1 = t1Box.querySelector('b');
        if (b1) b1.textContent = (typeof formatVivaazMoney === 'function') ? formatVivaazMoney(currentBasePrice) : ('\u20B9 ' + currentBasePrice.toLocaleString('en-IN'));
      }
      if (t10Box) {
        var b10 = t10Box.querySelector('b');
        if (b10) b10.textContent = (typeof formatVivaazMoney === 'function') ? formatVivaazMoney(t10) : ('\u20B9 ' + t10.toLocaleString('en-IN'));
      }
      if (t50Box) {
        var b50 = t50Box.querySelector('b');
        if (b50) b50.textContent = (typeof formatVivaazMoney === 'function') ? formatVivaazMoney(t50) : ('\u20B9 ' + t50.toLocaleString('en-IN'));
      }

      var allTierBoxes = [t1Box, t10Box, t50Box];
      allTierBoxes.forEach(function(b) {
        if (b) {
          b.classList.remove('on');
          b.style.background = '#FFFFFF';
          b.style.backgroundColor = '#FFFFFF';
          b.style.color = '#1C1A17';
          b.style.borderColor = 'var(--line2, #E6E2DC)';
          var sp = b.querySelector('span'); if (sp) sp.style.color = '#76706A';
          var bld = b.querySelector('b'); if (bld) bld.style.color = '#1C1A17';
        }
      });

      var activeTierBox = null;
      if (currentQty >= 50) {
        unitPrice = t50;
        hint = '50+ price reached · save 22%';
        activeTierBox = t50Box;
      } else if (currentQty >= 10) {
        unitPrice = t10;
        hint = '10+ price reached · save 12%';
        activeTierBox = t10Box;
      } else {
        unitPrice = currentBasePrice;
        hint = 'Add ' + (10 - currentQty) + ' more for 10+ price';
        activeTierBox = t1Box;
      }

      if (activeTierBox) {
        activeTierBox.classList.add('on');
        activeTierBox.style.background = '#1C1A17';
        activeTierBox.style.backgroundColor = '#1C1A17';
        activeTierBox.style.color = '#FFFFFF';
        activeTierBox.style.borderColor = '#1C1A17';
        var asp = activeTierBox.querySelector('span'); if (asp) asp.style.color = '#cfc6b8';
        var abld = activeTierBox.querySelector('b'); if (abld) abld.style.color = '#FFFFFF';
      }
    }

    currentUnitPrice = unitPrice;

    // Update Display (Matches both prod-price-display and main-unit-price-display)
    var mainPriceEl = document.getElementById('prod-price-display') || document.getElementById('main-unit-price-display');
    if (mainPriceEl) {
      if (typeof formatVivaazMoney === 'function') {
        mainPriceEl.textContent = formatVivaazMoney(unitPrice);
      } else {
        mainPriceEl.textContent = '\u20B9 ' + unitPrice.toLocaleString('en-IN');
      }
    }

    var tierBadge = document.getElementById('tier-badge-label');
    if (tierBadge) {
      tierBadge.textContent = (currentQty >= 50 ? '50+ price' : currentQty >= 10 ? '10+ price' : 'base price');
    }

    var hintEl = document.getElementById('tier-hint-text');
    if (hintEl) hintEl.textContent = hint;

    var totalBatchPrice = unitPrice * currentQty;
    var totalEl = document.getElementById('prod-total-price');
    if (totalEl) {
      if (typeof formatVivaazMoney === 'function') {
        totalEl.textContent = formatVivaazMoney(totalBatchPrice);
      } else {
        totalEl.textContent = '\u20B9 ' + totalBatchPrice.toLocaleString('en-IN');
      }
    }

    var lbl = currentQty + ' ' + (currentQty === 1 ? (isPair ? 'PAIR' : 'PC') : (isPair ? 'PAIRS' : 'PCS'));
    var barBtnPcs = document.getElementById('bar-pcs-count-btn');
    var barPcs = document.getElementById('bar-pcs-count');
    if (barBtnPcs) barBtnPcs.textContent = lbl;
    if (barPcs) barPcs.textContent = lbl;
  }
  window.recalcPricing = recalcPricing;

  function setProductQty(qty) {
    currentQty = Math.max(1, parseInt(qty, 10) || 1);
    var inp = document.getElementById('prod-qty-input');
    if (inp) inp.value = currentQty;
    recalcPricing();
  }
  window.setProductQty = setProductQty;

  function stepQty(delta) {
    setProductQty(currentQty + delta);
  }
  window.stepQty = stepQty;

  function onQtyInputChange(val) {
    setProductQty(val);
  }
  window.onQtyInputChange = onQtyInputChange;

  function triggerAddToCart(openDrawer) {
    if (typeof openDrawer === 'undefined') openDrawer = true;
    var productId = <?php echo $product_id ? $product_id : '0'; ?>;
    var stoneCode = <?php echo json_encode($sku); ?>;
    var stoneName = <?php echo json_encode($title); ?>;
    var stoneImg = <?php echo json_encode($main_img); ?>;
    var colorChip = document.querySelector('.colour-chip.on, .color-chip.on');
    var currentColor = colorChip ? colorChip.textContent.trim() : '';
    var basePrice = currentBasePrice;
    var t10 = isSingleOrPair ? currentUnitPrice : Math.round(basePrice * 0.88);
    var t50 = isSingleOrPair ? currentUnitPrice : Math.round(basePrice * 0.78);

    if (typeof addProductToCartAndOpenDrawer === 'function') {
      addProductToCartAndOpenDrawer(
        productId,
        stoneName,
        stoneImg,
        '\u20B9 ' + currentUnitPrice,
        currentSize,
        currentQty,
        currentColor,
        basePrice,
        t10,
        t50,
        openDrawer
      );
    } else if (openDrawer && typeof openCartDrawer === 'function') {
      openCartDrawer();
    } else if (!openDrawer) {
      window.location.href = '<?php echo esc_url(home_url("/checkout/")); ?>';
    }
  }
  window.triggerAddToCart = triggerAddToCart;

  function triggerBuyNow() {
    triggerAddToCart(false);
    window.location.href = '<?php echo esc_url(home_url("/checkout/")); ?>';
  }
  window.triggerBuyNow = triggerBuyNow;

  // React to currency change events
  window.addEventListener('vivaaz-currency-changed', function() {
    recalcPricing();
  });
  window.addEventListener('storage', function(e) {
    if (e.key === 'vivaaz_currency') {
      recalcPricing();
    }
  });

  // Run on page load
  recalcPricing();
  document.addEventListener('DOMContentLoaded', recalcPricing);
</script>
