<?php
if (file_exists(get_stylesheet_directory() . '/vivaaz-catalog.php')) {
    require_once get_stylesheet_directory() . '/vivaaz-catalog.php';
}
/**
 * Vivaaz Gems - Custom WooCommerce Archive / Shop Page Template
 * 100% Client Demo Fidelity (Matches Image 2 & Image 4 & 24 Oct PDF):
 * - Left Sidebar with Tree, Cut (optional), Shape, Size, Sold as, Colour (swatches), Quality, Treatment, Price
 * - Stone Page Cut Chips Row: All · Faceted · Cabochon · Rose cut · Briolette (on desktop & phone)
 * - Breadcrumb: Semi-precious or Precious included on stone pages
 * - Cards: 2 per row across full width on phone, 1:1 square photo, single-line tags ("CALIBRATED LOT"), round heart button, ADD TO CART as text link with underline!
 * - Interactive sorting (plh, phl, size, pop, newest) re-ordering cards in DOM instantly!
 * - Mobile Filter & Sort sheets with CLEAR ALL · SHOW RESULTS pinned above bottom bar.
 */

if (!defined('ABSPATH')) {
    exit;
}

$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

// 1. My Account Route Guard
if ((function_exists('is_account_page') && is_account_page()) || is_page('my-account') || strpos($request_uri, '/my-account/') !== false) {
    $acc_tpl = get_stylesheet_directory() . '/page-my-account.php';
    if (file_exists($acc_tpl)) {
        include $acc_tpl;
    } else {
        $loc = locate_template('page-my-account.php');
        if (!empty($loc) && file_exists($loc)) include $loc;
    }
    return;
}

// 2. Single Product Route Guard
$is_single_prod = (function_exists('is_product') && is_product()) 
               || is_singular('product') 
               || (isset($_GET['post_type']) && $_GET['post_type'] === 'product')
               || (strpos($request_uri, '/product/') !== false);

if ($is_single_prod) {
    $sp_tpl = get_stylesheet_directory() . '/single-product.php';
    if (file_exists($sp_tpl)) {
        include $sp_tpl;
    } else {
        $loc = locate_template('single-product.php');
        if (!empty($loc) && file_exists($loc)) include $loc;
    }
    return;
}

get_header('shop');
?>

<div class="shop-archive-page-wrapper">
  
  <div class="shop-archive-container wrap" style="max-width: 1280px; margin: 30px auto 60px; padding: 0 24px;">
    
<?php
$active_stone = '';
if (!empty($_GET['stone'])) {
    $active_stone = sanitize_text_field($_GET['stone']);
} elseif (!empty($_GET['filter_stone'])) {
    $active_stone = sanitize_text_field($_GET['filter_stone']);
}

$stone_display_titles = array(
    'moonstone'         => 'Rainbow Moonstone',
    'rainbow-moonstone' => 'Rainbow Moonstone',
    'ruby'              => 'Ruby',
    'sapphire'          => 'Sapphire',
    'emerald'           => 'Emerald',
    'amethyst'          => 'Amethyst',
    'aquamarine'        => 'Aquamarine',
    'citrine'           => 'Citrine',
    'garnet'            => 'Garnet',
    'opal'              => 'Opal',
    'peridot'           => 'Peridot',
    'tanzanite'         => 'Tanzanite',
    'topaz'             => 'Blue Topaz',
    'tourmaline'        => 'Tourmaline',
    'turquoise'         => 'Turquoise',
    'spinel'            => 'Spinel',
    'labradorite'       => 'Labradorite',
);

$active_group = !empty($_GET['group']) ? sanitize_text_field($_GET['group']) : (!empty($_GET['filter_group']) ? sanitize_text_field($_GET['filter_group']) : '');

$page_heading = 'Gemstones';
if ($active_stone && isset($stone_display_titles[strtolower($active_stone)])) {
    $page_heading = $stone_display_titles[strtolower($active_stone)];
} elseif ($active_stone) {
    $page_heading = ucwords(str_replace('-', ' ', $active_stone));
} elseif ($active_group === 'precious') {
    $page_heading = 'Precious Gemstones';
} elseif ($active_group === 'semi' || $active_group === 'semi-precious') {
    $page_heading = 'Semi-Precious Gemstones';
} elseif (function_exists('is_product_category') && is_product_category()) {
    $term = get_queried_object();
    if ($term && !empty($term->name)) {
        $page_heading = str_ireplace('Loose Gemstones', 'Gemstones', $term->name);
    }
}

// Precious / Semi-precious determination for breadcrumbs
$precious_slugs = array('ruby', 'sapphire', 'emerald', 'diamond');
$is_precious_stone = in_array(strtolower($active_stone), $precious_slugs) || ($active_group === 'precious');
$group_crumb_title = $is_precious_stone ? 'Precious' : 'Semi-precious';
$group_crumb_url   = home_url('/gemstones/' . ($is_precious_stone ? 'precious' : 'semi-precious') . '/');

// Resolve products from master catalog
if (!empty($active_stone)) {
    $display_products = vivaaz_get_products_by_stone($active_stone);
} elseif (!empty($active_group)) {
    $display_products = vivaaz_get_products_by_group($active_group);
} else {
    $display_products = vivaaz_get_master_catalog();
}
$display_count = count($display_products);
?>
    <!-- Breadcrumb & Title (12.5px #9A9186) -->
    <div class="shop-header-hero" style="margin-bottom: 24px;">
      <div class="crumb" style="font-size: 12.5px; color: #9A9186; margin-bottom: 12px; display: flex; gap: 8px; flex-wrap: wrap; align-items: center;">
        <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a> <span style="margin: 0 2px;">›</span>
        <a href="<?php echo esc_url(home_url('/gemstones/')); ?>" style="color: inherit; text-decoration: none;">Gemstones</a>
        <?php if ($active_stone) : ?>
          <span style="margin: 0 2px;">›</span>
          <a href="<?php echo esc_url($group_crumb_url); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html($group_crumb_title); ?></a>
          <span style="margin: 0 2px;">›</span>
          <b style="color: #1C1A17; font-weight: 500;"><?php echo esc_html($page_heading); ?></b>
        <?php endif; ?>
      </div>
      
      <h1 class="shop-main-title" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 48px; font-weight: 400; margin-bottom: 10px; color: #1C1A17; line-height: 1.12;">
        <?php echo esc_html($page_heading); ?>
      </h1>
      
      <?php if (!$active_stone) : ?>
        <p class="shop-description-sub" style="font-size: 15px; color: #76706A; line-height: 1.6; max-width: 860px; margin-bottom: 24px;">
          Loose natural gemstones, chosen by hand in Jaipur. Choose by stone, cut, shape, size or colour, and buy single stones, matched pairs or calibrated lots. Everything is sorted and matched by us before it is listed.
        </p>

        <!-- 9 Circular Stone Filters Row matching Client Demo 100% -->
        <div class="circs" style="display: flex; gap: 24px; flex-wrap: wrap; margin-top: 24px; margin-bottom: 28px; padding-bottom: 28px; border-bottom: 1px solid var(--color-border-light, #E8E1D6);">
          <?php
          $gem_circles = array(
            array('id' => 'ruby',              'name' => 'Ruby',                 'img' => 'ruby.jpg',            'filter' => ''),
            array('id' => 'sapphire',          'name' => 'Sapphire',             'img' => 'ceylon-sapphire.jpg', 'filter' => ''),
            array('id' => 'emerald',           'name' => 'Emerald',              'img' => 'emerald.jpg',         'filter' => ''),
            array('id' => 'rainbow-moonstone', 'name' => "Rainbow<br>Moonstone", 'img' => 'moonstone.jpg',       'filter' => ''),
            array('id' => 'topaz',             'name' => 'Topaz',                'img' => 'swiss-topaz.jpg',     'filter' => ''),
            array('id' => 'amethyst',          'name' => 'Amethyst',             'img' => 'ceylon-sapphire.jpg', 'filter' => 'hue-rotate(270deg) saturate(1.2)'),
            array('id' => 'garnet',            'name' => 'Garnet',               'img' => 'ruby.jpg',            'filter' => 'contrast(1.5) saturate(1.1) brightness(.98)'),
            array('id' => 'peridot',           'name' => 'Peridot',              'img' => 'emerald.jpg',         'filter' => 'hue-rotate(-38deg) saturate(1.3) brightness(1.15)'),
            array('id' => 'spinel',            'name' => 'Spinel',               'img' => 'ruby.jpg',            'filter' => 'hue-rotate(-18deg) saturate(.75) brightness(1.2)'),
          );
          foreach ($gem_circles as $gc) :
            $link = add_query_arg('filter_stone', $gc['id'], home_url('/shop/'));
          ?>
            <a class="circ" href="<?php echo esc_url($link); ?>" style="display: flex; flex-direction: column; align-items: center; gap: 10px; font-size: 13.5px; width: 104px; text-align: center; text-decoration: none; color: #1C1A17;">
              <span class="c" style="width: 96px; height: 96px; border-radius: 50%; background: #FFFFFF; border: 1px solid var(--color-border-light, #E8E1D6); display: flex; align-items: center; justify-content: center; overflow: hidden; transition: transform .3s, box-shadow .3s;">
                <img src="<?php echo esc_url(vivaaz_get_img_url($gc['img'])); ?>" alt="<?php echo esc_attr(strip_tags($gc['name'])); ?>" style="width: 76%; height: 76%; object-fit: contain;<?php echo $gc['filter'] ? ' filter: ' . $gc['filter'] . ';' : ''; ?>">
              </span>
              <span style="font-size: 13px; line-height: 1.25; color: #1C1A17;"><?php echo $gc['name']; ?></span>
            </a>
          <?php endforeach; ?>
        </div>
      <?php else : ?>
        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 24px; flex-wrap: wrap; margin-bottom: 12px;">
          <div>
            <p class="shop-description-sub" style="font-size: 15px; color: #76706A; line-height: 1.6; max-width: 720px; margin-bottom: 0;">
              Natural <?php echo esc_html(strtolower($page_heading)); ?>, sorted by hand in Jaipur. Calibrated lots, singles and pairs in every cut we have.
            </p>
          </div>
          <div class="nsbox" style="background: #FFFFFF; border: 1px solid var(--color-border-light, #E8E1D6); padding: 14px 18px; font-size: 12px;">
            <span style="font-size: 10.5px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: #9B7C4E; display: block; margin-bottom: 4px;">New stock first</span>
            <div>
              <a href="<?php echo esc_url(home_url('/guide/')); ?>" style="color: #9B7C4E; font-weight: 600; text-decoration: underline;">Stone guide →</a>
              <span style="margin: 0 6px; color: #76706A;">·</span>
              <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hi Vivaaz Gems, I am looking for new stock of ' . $page_heading); ?>" target="_blank" style="color: #9B7C4E; font-weight: 600; text-decoration: underline;">Get new <?php echo esc_html($page_heading); ?> on WhatsApp →</a>
            </div>
          </div>
        </div>

        <!-- STONE PAGE CUT CHIPS ROW: All · Faceted · Cabochon · Rose cut · Briolette (Desktop & Phone) -->
        <div class="stone-cut-chips-row" style="display: flex; gap: 8px; flex-wrap: wrap; margin: 16px 0 24px;">
          <button type="button" class="chip on" data-cut="all" onclick="filterByCut('all', this)">All</button>
          <button type="button" class="chip" data-cut="Faceted" onclick="filterByCut('Faceted', this)">Faceted</button>
          <button type="button" class="chip" data-cut="Cabochon" onclick="filterByCut('Cabochon', this)">Cabochon</button>
          <button type="button" class="chip" data-cut="Rose cut" onclick="filterByCut('Rose cut', this)">Rose cut</button>
          <button type="button" class="chip" data-cut="Briolette" onclick="filterByCut('Briolette', this)">Briolette</button>
        </div>
      <?php endif; ?>
    </div>

    <!-- MOBILE STICKY FILTER + SORT BAR (EXACT MATCH FOR CLIENT PHONE DEMO: .fsl) -->
    <div class="fsl" id="mobile-fsl">
      <button type="button" onclick="openFilterSheet();">
        <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M4 7h10M18 7h2M4 17h4M12 17h8"/><circle cx="16" cy="7" r="2"/><circle cx="10" cy="17" r="2"/></svg>
        FILTER <span id="mobile-filter-badge-count"></span>
      </button>
      <button type="button" onclick="openSortSheet();">
        SORT
        <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
      </button>
    </div>

    <!-- Top Bar matching Image 2: "46 products" + Sort dropdown (Desktop only) -->
    <div class="bar desktop-only-bar" style="display: flex; justify-content: space-between; align-items: center; gap: 14px; margin-top: 24px; padding: 14px 0; border-top: 1px solid var(--line, #E8E1D6); border-bottom: 1px solid var(--line, #E8E1D6); font-size: 13px; color: #76706A; flex-wrap: wrap;">
      <div class="chosen" style="display: flex; gap: 8px; align-items: center; flex-wrap: wrap;">
        <span id="product-count-display"><?php echo $display_count; ?> <?php echo $display_count === 1 ? 'product' : 'products'; ?></span>
        <span id="active-filter-chips" style="display: inline-flex; gap: 8px; align-items: center; flex-wrap: wrap;"></span>
      </div>
      <label style="display: inline-flex; align-items: center; gap: 6px; font-size: 13px; color: #76706A;">
        Sort: 
        <select class="sort" id="shop-sort-select" onchange="applyShopSort(this.value);" style="border: 0; background: transparent; font-weight: 600; color: #1C1A17; padding: 4px; cursor: pointer; outline: none;">
          <option value="newest" selected>Newest ▾</option>
          <option value="pop">Popularity</option>
          <option value="size">Size (small to large)</option>
          <option value="plh">Price (low to high)</option>
          <option value="phl">Price (high to low)</option>
        </select>
      </label>
    </div>

    <!-- Main 2-column layout: Sidebar (260px) + Products Grid -->
    <div class="lmain">
      
      <!-- LEFT FILTER SIDEBAR (Desktop) -->
      <aside class="side" id="desktop-shop-sidebar">
        
        <!-- LOOSE GEMSTONES TREE -->
        <div class="tree">
          <span class="cap" style="font-size: 10.5px; letter-spacing: .2em; color: #9B7C4E; text-transform: uppercase; font-weight: 700; margin-bottom: 8px; display: block;">Loose gemstones</span>
          <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="<?php echo empty($active_stone) ? 'on' : ''; ?>" style="display: flex; justify-content: space-between; align-items: center; padding: 7px 0; font-size: 14.5px; color: #1C1A17; text-decoration: none;">
            <span>All gemstones</span> <em style="font-style: normal; color: #76706A; font-size: 12.5px;">46</em>
          </a>
          <a href="<?php echo esc_url(add_query_arg('group', 'precious', home_url('/shop/'))); ?>" class="g <?php echo (isset($_GET['group']) && $_GET['group'] === 'precious') ? 'on' : ''; ?>" style="display: flex; justify-content: space-between; align-items: center; padding: 7px 0; font-size: 14.5px; color: #1C1A17; text-decoration: none; font-weight: 500;">
            <span>Precious</span> <em style="font-style: normal; color: #76706A; font-size: 12.5px;">8</em>
          </a>
          <a href="<?php echo esc_url(add_query_arg('group', 'semi', home_url('/shop/'))); ?>" class="g <?php echo (isset($_GET['group']) && $_GET['group'] === 'semi') ? 'on' : ''; ?>" style="display: flex; justify-content: space-between; align-items: center; padding: 7px 0; font-size: 14.5px; color: #1C1A17; text-decoration: none; font-weight: 500;">
            <span>Semi-precious</span> <em style="font-style: normal; color: #76706A; font-size: 12.5px;">38</em>
          </a>
        </div>

        <!-- CUT -->
        <div class="cutg">
          <hr style="border: 0; border-top: 1px solid var(--line, #E8E1D6); margin: 22px 0;">
          <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 10.5px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: #9B7C4E;">
            <span>Cut</span>
            <small style="letter-spacing: 0; text-transform: none; color: #76706A; font-weight: 400; font-size: 11px;">optional</small>
          </div>
          <div class="chips" style="display: flex; flex-wrap: wrap; gap: 7px;">
            <button type="button" class="chip <?php echo (isset($_GET['cut']) && $_GET['cut'] === 'Faceted') ? 'on' : ''; ?>" data-key="cut" data-val="Faceted" onclick="toggleChip(this, 'cut', 'Faceted')">Faceted <em style="font-style: normal; color: #76706A; font-size: 11.5px;">20</em></button>
            <button type="button" class="chip <?php echo (isset($_GET['cut']) && $_GET['cut'] === 'Cabochon') ? 'on' : ''; ?>" data-key="cut" data-val="Cabochon" onclick="toggleChip(this, 'cut', 'Cabochon')">Cabochon <em style="font-style: normal; color: #76706A; font-size: 11.5px;">24</em></button>
            <button type="button" class="chip <?php echo (isset($_GET['cut']) && $_GET['cut'] === 'Rose cut') ? 'on' : ''; ?>" data-key="cut" data-val="Rose cut" onclick="toggleChip(this, 'cut', 'Rose cut')">Rose cut <em style="font-style: normal; color: #76706A; font-size: 11.5px;">1</em></button>
            <button type="button" class="chip <?php echo (isset($_GET['cut']) && $_GET['cut'] === 'Briolette') ? 'on' : ''; ?>" data-key="cut" data-val="Briolette" onclick="toggleChip(this, 'cut', 'Briolette')">Briolette <em style="font-style: normal; color: #76706A; font-size: 11.5px;">1</em></button>
          </div>
        </div>

        <!-- SHAPE -->
        <hr style="border: 0; border-top: 1px solid var(--line, #E8E1D6); margin: 22px 0;">
        <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 10.5px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: #9B7C4E;">
          <span>Shape</span>
        </div>
        <div class="chips" style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip" data-key="shape" data-val="Oval" onclick="toggleShapeChip(this, 'Oval')">Oval <em style="font-style: normal; color: #76706A; font-size: 11.5px;">29</em></button>
          <button type="button" class="chip" data-key="shape" data-val="Round" onclick="toggleShapeChip(this, 'Round')">Round <em style="font-style: normal; color: #76706A; font-size: 11.5px;">12</em></button>
          <button type="button" class="chip" data-key="shape" data-val="Pear" onclick="toggleShapeChip(this, 'Pear')">Pear <em style="font-style: normal; color: #76706A; font-size: 11.5px;">2</em></button>
          <button type="button" class="chip" data-key="shape" data-val="Cushion" onclick="toggleShapeChip(this, 'Cushion')">Cushion <em style="font-style: normal; color: #76706A; font-size: 11.5px;">1</em></button>
          <button type="button" class="chip" data-key="shape" data-val="Octagon" onclick="toggleShapeChip(this, 'Octagon')">Octagon <em style="font-style: normal; color: #76706A; font-size: 11.5px;">2</em></button>
        </div>

        <!-- SIZE (MM) -->
        <hr style="border: 0; border-top: 1px solid var(--line, #E8E1D6); margin: 22px 0;">
        <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 10.5px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: #9B7C4E;">
          <span>Size (mm)</span>
          <small id="size-hint" style="letter-spacing: 0; text-transform: none; color: #76706A; font-weight: 400; font-size: 11px;">pick shape first</small>
        </div>
        <div class="chips" id="size-chips" style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip" data-key="size" data-val="3x4" onclick="toggleChip(this, 'size', '3x4')">3×4 mm</button>
          <button type="button" class="chip" data-key="size" data-val="4x6" onclick="toggleChip(this, 'size', '4x6')">4×6 mm</button>
          <button type="button" class="chip" data-key="size" data-val="5x7" onclick="toggleChip(this, 'size', '5x7')">5×7 mm</button>
          <button type="button" class="chip" data-key="size" data-val="6x8" onclick="toggleChip(this, 'size', '6x8')">6×8 mm</button>
          <button type="button" class="chip" data-key="size" data-val="7x9" onclick="toggleChip(this, 'size', '7x9')">7×9 mm</button>
          <button type="button" class="chip" data-key="size" data-val="8x10" onclick="toggleChip(this, 'size', '8x10')">8×10 mm</button>
          <button type="button" class="chip" data-key="size" data-val="10x12" onclick="toggleChip(this, 'size', '10x12')">10×12 mm</button>
          <button type="button" class="chip" data-key="size" data-val="12x16" onclick="toggleChip(this, 'size', '12x16')">12×16 mm</button>
        </div>

        <!-- SOLD AS -->
        <hr style="border: 0; border-top: 1px solid var(--line, #E8E1D6); margin: 22px 0;">
        <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 10.5px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: #9B7C4E;">
          <span>Sold as</span>
        </div>
        <div class="chips" style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip" data-key="sold" data-val="Calibrated lots" onclick="toggleChip(this, 'sold', 'Calibrated lots')">Calibrated lots <em style="font-style: normal; color: #76706A; font-size: 11.5px;">35</em></button>
          <button type="button" class="chip" data-key="sold" data-val="Matched pairs" onclick="toggleChip(this, 'sold', 'Matched pairs')">Matched pairs <em style="font-style: normal; color: #76706A; font-size: 11.5px;">6</em></button>
          <button type="button" class="chip" data-key="sold" data-val="Single stones" onclick="toggleChip(this, 'sold', 'Single stones')">Single stones <em style="font-style: normal; color: #76706A; font-size: 11.5px;">5</em></button>
        </div>

        <!-- COLOUR -->
        <hr style="border: 0; border-top: 1px solid var(--line, #E8E1D6); margin: 22px 0;">
        <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 10.5px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: #9B7C4E;">
          <span>Colour</span>
        </div>
        <div class="chips" style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip" data-key="colour" data-val="Blue" onclick="toggleChip(this, 'colour', 'Blue')"><span class="sw" style="background: #2F5BB7; display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>Blue <em style="font-style: normal; color: #76706A; font-size: 11.5px;">14</em></button>
          <button type="button" class="chip" data-key="colour" data-val="Red" onclick="toggleChip(this, 'colour', 'Red')"><span class="sw" style="background: #A3122E; display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>Red <em style="font-style: normal; color: #76706A; font-size: 11.5px;">5</em></button>
          <button type="button" class="chip" data-key="colour" data-val="Pink" onclick="toggleChip(this, 'colour', 'Pink')"><span class="sw" style="background: #E07A9A; display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>Pink <em style="font-style: normal; color: #76706A; font-size: 11.5px;">4</em></button>
          <button type="button" class="chip" data-key="colour" data-val="Green" onclick="toggleChip(this, 'colour', 'Green')"><span class="sw" style="background: #2E8B57; display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>Green <em style="font-style: normal; color: #76706A; font-size: 11.5px;">8</em></button>
          <button type="button" class="chip" data-key="colour" data-val="White" onclick="toggleChip(this, 'colour', 'White')"><span class="sw" style="background: #F4F6FA; border: 1px solid #ccc; display:inline-block; width:10px; height:10px; border-radius:50%; margin-right:6px;"></span>White <em style="font-style: normal; color: #76706A; font-size: 11.5px;">8</em></button>
        </div>

        <!-- TREATMENT -->
        <hr style="border: 0; border-top: 1px solid var(--line, #E8E1D6); margin: 22px 0;">
        <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 10.5px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: #9B7C4E;">
          <span>Treatment</span>
        </div>
        <div class="chips" style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip" data-key="treat" data-val="None" onclick="toggleChip(this, 'treat', 'None')">None <em style="font-style: normal; color: #76706A; font-size: 11.5px;">28</em></button>
          <button type="button" class="chip" data-key="treat" data-val="Heated" onclick="toggleChip(this, 'treat', 'Heated')">Heated <em style="font-style: normal; color: #76706A; font-size: 11.5px;">8</em></button>
        </div>

      </aside>

      <!-- RIGHT PRODUCT GRID (2 cols across full width on phone, 3 cols on desktop) -->
      <div style="flex: 1; width: 100%;">
        <div class="grid g3" id="gemstones-cards-grid">
          <?php if (!empty($display_products)) : ?>
            <?php foreach ($display_products as $idx => $item) : ?>
              <div class="card rv" data-index="<?php echo ($idx + 1); ?>" data-price="<?php echo esc_attr($item['price']); ?>" data-size="<?php echo esc_attr($item['size_num']); ?>" data-stone="<?php echo esc_attr($item['stone']); ?>" data-cut="<?php echo esc_attr($item['cut']); ?>" data-shape="<?php echo esc_attr($item['shape']); ?>" data-sold="<?php echo esc_attr($item['sold_as']); ?>" data-color="<?php echo esc_attr($item['color']); ?>">
                <div class="ph" onclick="window.location.href='<?php echo esc_url($item['url']); ?>';">
                  <span class="<?php echo esc_attr($item['tag_class']); ?>"><?php echo esc_html($item['tag']); ?></span>
                  <button type="button" class="heart" title="Save to wishlist" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('<?php echo esc_js($item['code']); ?>', '<?php echo esc_js($item['name']); ?>', '<?php echo esc_url($item['img']); ?>', '<?php echo esc_js($item['price_str']); ?>', '<?php echo esc_url($item['url']); ?>', this);">
                    <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg>
                  </button>
                  <img src="<?php echo esc_url($item['img']); ?>" alt="<?php echo esc_attr($item['name']); ?>">
                  <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('<?php echo esc_js($item['name']); ?>', '<?php echo esc_js($item['price_str']); ?>', '<?php echo esc_url($item['img']); ?>', '<?php echo esc_url($item['url']); ?>');">QUICK VIEW</button>
                </div>
                <div class="cb">
                  <div class="nm" onclick="window.location.href='<?php echo esc_url($item['url']); ?>';"><?php echo esc_html($item['name']); ?></div>
                  <div class="dt"><?php echo esc_html($item['size_range']); ?></div>
                  <div class="pr" data-inr-price="<?php echo esc_attr($item['price']); ?>"><?php echo $item['price_str']; ?> <span><?php echo esc_html($item['unit']); ?></span></div>
                  <div class="act">
                    <a href="<?php echo esc_url($item['url']); ?>" class="ul">SELECT OPTIONS</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <div style="grid-column: 1 / -1; padding: 40px 20px; text-align: center; background: #fff; border: 1px solid var(--line, #E8E1D6);">
              <h3 style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 24px; font-weight: 400; margin-bottom: 8px;">No stones found in this selection</h3>
              <p style="color: #76706A; margin-bottom: 20px;">We may have new unlisted stock in our Jaipur workshop.</p>
              <a href="<?php echo esc_url(home_url('/gemstones/')); ?>" class="btn" style="display: inline-block; background: #1C1A17; color: #fff; padding: 12px 24px; text-decoration: none; font-size: 11.5px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">VIEW ALL GEMSTONES</a>
            </div>
          <?php endif; ?>
        </div>

        <!-- Showing 6 of 46 + Progress Bar + Load More -->
        <div class="more" style="text-align: center; margin-top: 48px; display: flex; flex-direction: column; align-items: center; gap: 12px;">
          <span style="font-size: 13px; color: #76706A;">Showing 6 of 46 products</span>
          <div class="prog" style="width: 140px; height: 2px; background: var(--line, #E8E1D6); overflow: hidden;">
            <i style="display: block; width: 13%; height: 100%; background: #1C1A17;"></i>
          </div>
          <button type="button" class="btn o" onclick="showLoadMoreNotice()" style="margin-top: 8px; border: 1px solid #1C1A17; background: transparent; padding: 12px 28px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; cursor: pointer;">
            LOAD MORE
          </button>
        </div>

      </div>

    </div>

    <!-- Warm Sand Beige Bottom Callout Banner (Matching Image 4) -->
    <div class="band-callout" style="background: var(--sand, #F1EBE1); padding: 36px 30px; margin-top: 60px; display: flex; justify-content: space-between; align-items: center; gap: 24px; flex-wrap: wrap;">
      <div>
        <h3 style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 24px; font-weight: 400; margin: 0 0 6px; color: #1C1A17;">Not sure which size or colour?</h3>
        <p style="font-size: 14px; color: #76706A; margin: 0;">We send macro photos and 4K videos of the exact stones on WhatsApp.</p>
      </div>
      <div style="display: flex; gap: 12px; flex-wrap: wrap;">
        <a href="https://wa.me/919680552270?text=Hello%20Vivaaz%20Gems,%20I%20am%20looking%20for%20help%20choosing%20gemstones." target="_blank" class="btn wa-btn" style="background: #1E9E52; color: #FFFFFF; border: 1px solid #1E9E52; padding: 12px 22px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
          <svg style="width: 16px; height: 16px; fill: #FFFFFF; display: inline-block; vertical-align: middle;" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
          WHATSAPP US
        </a>
        <button type="button" class="btn o" onclick="openVideoCallModal();" style="background: transparent; border: 1px solid #1C1A17; color: #1C1A17; padding: 12px 22px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; cursor: pointer;">
          BOOK A VIDEO CALL
        </button>
      </div>
    </div>

  </div>

  <!-- Mobile Bottom Sheet Backdrop -->
  <div class="scrim" id="mobile-sheet-scrim" style="display:none; position:fixed; inset:0; background:rgba(28,26,23,.5); z-index:99998;" onclick="closeMobileSheets();"></div>

  <!-- Filter Sheet (Populated with small chips in normal letters, Clear All + Show Results) -->
  <section class="sheet" id="mobile-filter-sheet" role="dialog" aria-label="Filters" style="display:none;">
    <div class="sh">
      <b>Filter</b>
      <button type="button" onclick="closeMobileSheets();" aria-label="Close" style="background:none; border:0; font-size:24px; cursor:pointer; color:var(--soft); line-height:1;">&times;</button>
    </div>
    
    <div class="sb2" id="mobile-filter-sheet-body">
      
      <!-- STONE -->
      <div style="margin-bottom: 18px;">
        <span class="cap" style="font-size: 10.5px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: #9B7C4E; display: block; margin-bottom: 8px;">STONE</span>
        <div style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip on" data-key="stone" data-val="all" onclick="toggleMobileChip(this, 'stone', 'all')">All stones</button>
          <button type="button" class="chip" data-key="stone" data-val="ruby" onclick="toggleMobileChip(this, 'stone', 'ruby')">Ruby <span style="color:#9A9186;">3</span></button>
          <button type="button" class="chip" data-key="stone" data-val="sapphire" onclick="toggleMobileChip(this, 'stone', 'sapphire')">Sapphire <span style="color:#9A9186;">5</span></button>
          <button type="button" class="chip" data-key="stone" data-val="emerald" onclick="toggleMobileChip(this, 'stone', 'emerald')">Emerald <span style="color:#9A9186;">4</span></button>
          <button type="button" class="chip" data-key="stone" data-val="moonstone" onclick="toggleMobileChip(this, 'stone', 'moonstone')">Moonstone <span style="color:#9A9186;">8</span></button>
          <button type="button" class="chip" data-key="stone" data-val="topaz" onclick="toggleMobileChip(this, 'stone', 'topaz')">Blue Topaz <span style="color:#9A9186;">4</span></button>
          <button type="button" class="chip" data-key="stone" data-val="spinel" onclick="toggleMobileChip(this, 'stone', 'spinel')">Spinel <span style="color:#9A9186;">3</span></button>
        </div>
      </div>

      <!-- CUT -->
      <div style="margin-bottom: 18px;">
        <span class="cap" style="font-size: 10.5px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: #9B7C4E; display: block; margin-bottom: 8px;">CUT</span>
        <div style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip on" data-key="cut" data-val="all" onclick="toggleMobileChip(this, 'cut', 'all')">All cuts</button>
          <button type="button" class="chip" data-key="cut" data-val="Faceted" onclick="toggleMobileChip(this, 'cut', 'Faceted')">Faceted <span style="color:#9A9186;">20</span></button>
          <button type="button" class="chip" data-key="cut" data-val="Cabochon" onclick="toggleMobileChip(this, 'cut', 'Cabochon')">Cabochon <span style="color:#9A9186;">24</span></button>
          <button type="button" class="chip" data-key="cut" data-val="Rose cut" onclick="toggleMobileChip(this, 'cut', 'Rose cut')">Rose cut <span style="color:#9A9186;">1</span></button>
          <button type="button" class="chip" data-key="cut" data-val="Briolette" onclick="toggleMobileChip(this, 'cut', 'Briolette')">Briolette <span style="color:#9A9186;">1</span></button>
        </div>
      </div>

      <!-- SHAPE -->
      <div style="margin-bottom: 18px;">
        <span class="cap" style="font-size: 10.5px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: #9B7C4E; display: block; margin-bottom: 8px;">SHAPE</span>
        <div style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip" data-key="shape" data-val="Oval" onclick="toggleMobileChip(this, 'shape', 'Oval')">Oval <span style="color:#9A9186;">29</span></button>
          <button type="button" class="chip" data-key="shape" data-val="Round" onclick="toggleMobileChip(this, 'shape', 'Round')">Round <span style="color:#9A9186;">12</span></button>
          <button type="button" class="chip" data-key="shape" data-val="Octagon" onclick="toggleMobileChip(this, 'shape', 'Octagon')">Octagon <span style="color:#9A9186;">2</span></button>
          <button type="button" class="chip" data-key="shape" data-val="Pear" onclick="toggleMobileChip(this, 'shape', 'Pear')">Pear <span style="color:#9A9186;">2</span></button>
        </div>
      </div>

      <!-- SOLD AS -->
      <div style="margin-bottom: 18px;">
        <span class="cap" style="font-size: 10.5px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: #9B7C4E; display: block; margin-bottom: 8px;">SOLD AS</span>
        <div style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip" data-key="sold" data-val="Calibrated lots" onclick="toggleMobileChip(this, 'sold', 'Calibrated lots')">Calibrated lots <span style="color:#9A9186;">35</span></button>
          <button type="button" class="chip" data-key="sold" data-val="Matched pairs" onclick="toggleMobileChip(this, 'sold', 'Matched pairs')">Matched pairs <span style="color:#9A9186;">6</span></button>
          <button type="button" class="chip" data-key="sold" data-val="Single stones" onclick="toggleMobileChip(this, 'sold', 'Single stones')">Single stones <span style="color:#9A9186;">5</span></button>
        </div>
      </div>

    </div>

    <!-- Pinned bottom action bar -->
    <div class="sf">
      <button type="button" class="btn o" onclick="clearAllShopFilters();" style="border: 1px solid #1C1A17; background: #fff; padding: 12px 18px; font-size: 11.5px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; cursor: pointer;">CLEAR ALL</button>
      <button type="button" class="btn" id="mobile-show-results-btn" onclick="closeMobileSheets();" style="background: #1C1A17; color: #fff; padding: 12px 24px; font-size: 11.5px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; border: none; cursor: pointer;">SHOW RESULTS</button>
    </div>
  </section>

  <!-- Sort Sheet (Interactive selection changes product card order immediately) -->
  <section class="sheet" id="mobile-sort-sheet" role="dialog" aria-label="Sort" style="display:none;">
    <div class="sh">
      <b>Sort</b>
      <button type="button" onclick="closeMobileSheets();" aria-label="Close" style="background:none; border:0; font-size:24px; cursor:pointer; color:var(--soft); line-height:1;">&times;</button>
    </div>
    <div class="sb2" style="padding: 10px 18px;">
      <button type="button" class="opt on" onclick="selectMobileSort('newest', this);" style="display:flex; justify-content:space-between; width:100%; padding:14px 0; border:0; border-bottom:1px solid #E8E1D6; background:none; font-size:15px; text-align:left; cursor:pointer;">
        <span>Newest</span> <span class="check-mark">✓</span>
      </button>
      <button type="button" class="opt" onclick="selectMobileSort('pop', this);" style="display:flex; justify-content:space-between; width:100%; padding:14px 0; border:0; border-bottom:1px solid #E8E1D6; background:none; font-size:15px; text-align:left; cursor:pointer;">
        <span>Popularity</span> <span class="check-mark" style="display:none;">✓</span>
      </button>
      <button type="button" class="opt" onclick="selectMobileSort('size', this);" style="display:flex; justify-content:space-between; width:100%; padding:14px 0; border:0; border-bottom:1px solid #E8E1D6; background:none; font-size:15px; text-align:left; cursor:pointer;">
        <span>Size (small to large)</span> <span class="check-mark" style="display:none;">✓</span>
      </button>
      <button type="button" class="opt" onclick="selectMobileSort('plh', this);" style="display:flex; justify-content:space-between; width:100%; padding:14px 0; border:0; border-bottom:1px solid #E8E1D6; background:none; font-size:15px; text-align:left; cursor:pointer;">
        <span>Price (low to high)</span> <span class="check-mark" style="display:none;">✓</span>
      </button>
      <button type="button" class="opt" onclick="selectMobileSort('phl', this);" style="display:flex; justify-content:space-between; width:100%; padding:14px 0; border:0; border-bottom:1px solid #E8E1D6; background:none; font-size:15px; text-align:left; cursor:pointer;">
        <span>Price (high to low)</span> <span class="check-mark" style="display:none;">✓</span>
      </button>
    </div>
  </section>

</div>

<script>
// Filter & Sort Sheet Management
function openFilterSheet() {
  var sheet = document.getElementById('mobile-filter-sheet');
  var scrim = document.getElementById('mobile-sheet-scrim');
  if (sheet) {
    sheet.classList.add('open');
    sheet.style.setProperty('display', 'flex', 'important');
  }
  if (scrim) {
    scrim.classList.add('open');
    scrim.style.setProperty('display', 'block', 'important');
  }
  document.body.style.overflow = 'hidden';
}

function openSortSheet() {
  var sheet = document.getElementById('mobile-sort-sheet');
  var scrim = document.getElementById('mobile-sheet-scrim');
  if (sheet) {
    sheet.classList.add('open');
    sheet.style.setProperty('display', 'flex', 'important');
  }
  if (scrim) {
    scrim.classList.add('open');
    scrim.style.setProperty('display', 'block', 'important');
  }
  document.body.style.overflow = 'hidden';
}

function closeMobileSheets() {
  document.querySelectorAll('.sheet').forEach(function(s) {
    s.classList.remove('open');
    s.style.setProperty('display', 'none', 'important');
  });
  var scrim = document.getElementById('mobile-sheet-scrim');
  if (scrim) {
    scrim.classList.remove('open');
    scrim.style.setProperty('display', 'none', 'important');
  }
  document.body.style.overflow = '';
}

// Interactive Real-Time DOM Sorting
function applyShopSort(sortVal) {
  var grid = document.getElementById('gemstones-cards-grid');
  if (!grid) return;
  var cards = Array.from(grid.querySelectorAll('.card'));
  
  if (sortVal === 'plh') {
    cards.sort(function(a, b) {
      return (parseFloat(a.getAttribute('data-price')) || 0) - (parseFloat(b.getAttribute('data-price')) || 0);
    });
  } else if (sortVal === 'phl') {
    cards.sort(function(a, b) {
      return (parseFloat(b.getAttribute('data-price')) || 0) - (parseFloat(a.getAttribute('data-price')) || 0);
    });
  } else if (sortVal === 'size') {
    cards.sort(function(a, b) {
      return (parseFloat(a.getAttribute('data-size')) || 0) - (parseFloat(b.getAttribute('data-size')) || 0);
    });
  } else if (sortVal === 'pop') {
    cards.reverse();
  } else {
    cards.sort(function(a, b) {
      return (parseInt(a.getAttribute('data-index')) || 0) - (parseInt(b.getAttribute('data-index')) || 0);
    });
  }

  cards.forEach(function(card) {
    grid.appendChild(card);
  });
}

function selectMobileSort(val, btn) {
  document.querySelectorAll('#mobile-sort-sheet .opt').forEach(function(o) {
    o.classList.remove('on');
    var cm = o.querySelector('.check-mark');
    if (cm) cm.style.display = 'none';
  });
  btn.classList.add('on');
  var activeCm = btn.querySelector('.check-mark');
  if (activeCm) activeCm.style.display = 'inline';

  var sortSelect = document.getElementById('shop-sort-select');
  if (sortSelect) {
    sortSelect.value = val;
  }
  applyShopSort(val);
  closeMobileSheets();
}

function applyActiveFilters() {
  var grid = document.getElementById('gemstones-cards-grid');
  if (!grid) return;
  
  var activeStone = <?php echo json_encode(strtolower($active_stone)); ?>;
  var selectedCuts = Array.from(document.querySelectorAll('.cutg .chip.on, #mobile-filter-sheet .chip[data-key="cut"].on')).map(function(c) { return c.getAttribute('data-val'); }).filter(Boolean);
  var selectedShapes = Array.from(document.querySelectorAll('.chip[data-key="shape"].on, #mobile-filter-sheet .chip[data-key="shape"].on')).map(function(c) { return c.getAttribute('data-val'); }).filter(Boolean);

  var cutFilterBtn = document.querySelector('.stone-cut-chips-row .chip.on');
  var topCut = cutFilterBtn ? cutFilterBtn.getAttribute('data-cut') : 'all';
  if (topCut && topCut !== 'all' && !selectedCuts.includes(topCut)) {
    selectedCuts.push(topCut);
  }

  var visibleCount = 0;
  grid.querySelectorAll('.card').forEach(function(c) {
    var cStone = (c.getAttribute('data-stone') || '').toLowerCase();
    var cCut = c.getAttribute('data-cut') || '';
    var cShape = c.getAttribute('data-shape') || '';
    
    var matchStone = !activeStone || cStone === activeStone || (activeStone === 'ruby' && cStone === 'ruby') || (activeStone === 'emerald' && cStone === 'emerald') || (activeStone === 'sapphire' && cStone === 'sapphire') || (activeStone === 'moonstone' && cStone.includes('moonstone'));
    var matchCut = selectedCuts.length === 0 || selectedCuts.includes(cCut);
    var matchShape = selectedShapes.length === 0 || selectedShapes.includes(cShape);

    if (matchStone && matchCut && matchShape) {
      c.style.display = '';
      visibleCount++;
    } else {
      c.style.display = 'none';
    }
  });

  var countSpan = document.getElementById('product-count-display') || document.querySelector('.chosen span');
  if (countSpan) {
    countSpan.textContent = visibleCount + ' ' + (visibleCount === 1 ? 'product' : 'products');
  }
}

function filterByCut(cutVal, btn) {
  document.querySelectorAll('.stone-cut-chips-row .chip').forEach(function(c) {
    c.classList.remove('on');
  });
  if (btn) btn.classList.add('on');
  applyActiveFilters();
}

function toggleMobileChip(btn, key, val) {
  var parent = btn.closest('div');
  if (val === 'all') {
    parent.querySelectorAll('.chip').forEach(function(c) { c.classList.remove('on'); });
    btn.classList.add('on');
  } else {
    var allBtn = parent.querySelector('.chip[data-val="all"]');
    if (allBtn) allBtn.classList.remove('on');
    btn.classList.toggle('on');
  }
  applyActiveFilters();
}

function toggleShapeChip(btn, shape) {
  btn.classList.toggle('on');
  applyActiveFilters();
}

function toggleChip(btn, key, val) {
  btn.classList.toggle('on');
  applyActiveFilters();
}

function clearAllShopFilters() {
  document.querySelectorAll('.sheet .chip, .side .chip').forEach(function(c) {
    c.classList.remove('on');
  });
  document.querySelectorAll('.sheet .chip[data-val="all"]').forEach(function(c) {
    c.classList.add('on');
  });
  var allCut = document.querySelector('.stone-cut-chips-row .chip[data-cut="all"]');
  if (allCut) {
    document.querySelectorAll('.stone-cut-chips-row .chip').forEach(function(c) { c.classList.remove('on'); });
    allCut.classList.add('on');
  }
  applyActiveFilters();
  closeMobileSheets();
}

// Dynamic Catalog from Master Catalog
var _archiveCatalog = <?php echo json_encode(vivaaz_get_master_catalog()); ?>;
var _archiveLoadedOffset = <?php echo count($display_products); ?>;

function showLoadMoreNotice() {
  var grid = document.getElementById('gemstones-cards-grid');
  if (!grid) return;
  var activeStone = <?php echo json_encode(strtolower($active_stone)); ?>;
  var pool = activeStone ? _archiveCatalog.filter(function(x) { return x.stone === activeStone; }) : _archiveCatalog;
  var toAdd = pool.slice(_archiveLoadedOffset, _archiveLoadedOffset + 6);
  
  if (toAdd.length === 0) {
    var btn = document.querySelector('.more button');
    if (btn) {
      btn.textContent = 'All stones loaded';
      btn.disabled = true;
      btn.style.opacity = '0.6';
    }
    return;
  }

  toAdd.forEach(function(item, idx) {
    var card = document.createElement('div');
    card.className = 'card rv';
    card.setAttribute('data-index', _archiveLoadedOffset + idx + 1);
    card.setAttribute('data-price', item.price);
    card.setAttribute('data-size', item.size);
    card.setAttribute('data-stone', item.stone);
    card.setAttribute('data-cut', item.cut);
    card.setAttribute('data-shape', item.shape);

    var tagText = item.isPair ? 'PAIR' : (item.isSingle ? 'ONLY 1' : 'CALIBRATED LOT');
    var tagClass = item.isSingle ? 'tag only1' : 'tag';
    var imgUrl = '<?php echo esc_url(get_stylesheet_directory_uri() . "/assets/images/"); ?>' + item.img;
    var prodUrl = '<?php echo esc_url(home_url("/shop/?stone=")); ?>' + item.stone;

    card.innerHTML = `
      <div class="ph" onclick="window.location.href='${prodUrl}';">
        <span class="${tagClass}">${tagText}</span>
        <button type="button" class="heart" title="Save to wishlist" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('${item.code}', '${item.name}', '${imgUrl}', '${item.priceStr}', '${prodUrl}', this);">
          <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg>
        </button>
        <img src="${imgUrl}" alt="${item.name}">
        <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('${item.name}', '${item.priceStr}', '${imgUrl}', '${prodUrl}');">QUICK VIEW</button>
      </div>
      <div class="cb">
        <div class="nm" onclick="window.location.href='${prodUrl}';">${item.name}</div>
        <div class="dt">${item.dt}</div>
        <div class="pr">${item.priceStr} <span>${item.unit}</span></div>
        <div class="act">
          <a href="${prodUrl}" class="ul">ADD TO CART</a>
        </div>
      </div>
    `;
    grid.appendChild(card);
  });

  _archiveLoadedOffset += toAdd.length;
  var countSpan = document.querySelector('.chosen span');
  var totalShown = grid.querySelectorAll('.card:not([style*="display: none"])').length;
  if (countSpan) countSpan.textContent = totalShown + ' stones';
}

document.addEventListener('DOMContentLoaded', function() {
  var countSpan = document.getElementById('product-count-display') || document.querySelector('.chosen span');
  var grid = document.getElementById('gemstones-cards-grid');
  if (grid && countSpan) {
    var visibleTotal = grid.querySelectorAll('.card:not([style*="display: none"])').length;
    countSpan.textContent = visibleTotal + ' ' + (visibleTotal === 1 ? 'product' : 'products');
  }
});

// Universal QuickView fallback for archive page
if (typeof window.openQuickView !== 'function') {
  window.openQuickView = function(titleOrId, price, img, url, code, sizes) {
    var modal = document.getElementById('vivaaz-quickview-modal');
    var body = document.getElementById('quickview-modal-body');
    var backdrop = document.getElementById('quickview-modal-backdrop');
    if (!modal || !body) return;
    
    var name = titleOrId;
    var pr = price || 'from ₹94';
    var photo = img || '<?php echo esc_url(vivaaz_get_img_url("moonstone.jpg")); ?>';
    var href = url || '<?php echo esc_url(home_url("/shop/")); ?>';

    body.innerHTML = '<div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; padding:24px; align-items:center;">' +
      '<div style="aspect-ratio:1/1; background:#F1F0EE; display:flex; align-items:center; justify-content:center; overflow:hidden;"><img src="' + photo + '" style="width:75%; object-fit:contain;"></div>' +
      '<div>' +
        '<span style="font-size:10.5px; letter-spacing:0.2em; color:#9B7C4E; font-weight:700; text-transform:uppercase;">QUICK VIEW</span>' +
        '<h3 style="font-family:var(--display); font-size:22px; font-weight:400; margin:6px 0 10px; color:#1C1A17;">' + name + '</h3>' +
        '<div style="font-size:20px; font-weight:600; color:#1C1A17; margin-bottom:16px;">' + pr + '</div>' +
        '<a href="' + href + '" style="display:block; text-align:center; padding:12px; background:#1C1A17; color:#fff; text-decoration:none; font-size:11.5px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase;">VIEW PRODUCT DETAILS</a>' +
      '</div>' +
    '</div>';

    modal.style.display = 'block';
    if (backdrop) backdrop.style.display = 'block';
    document.body.style.overflow = 'hidden';
  };
}
</script>

<?php
get_footer('shop');
