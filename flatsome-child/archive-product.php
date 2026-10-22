<?php
/**
 * Vivaaz Gems - Custom WooCommerce Archive / Shop Page Template
 * 100% Client Demo Fidelity (Matches Image 2 & Image 4):
 * - Left Sidebar with Tree, Cut (optional), Shape, Size, Sold as, Colour (swatches), Quality, Treatment, Price per piece range + quick chips
 * - 3-Column Product Grid with CALIBRATED LOT / PAIR / ONLY 1 tags, single action button (SELECT OPTIONS / ADD TO CART)
 * - Showing 6 of 46 + Progress Bar + LOAD MORE button
 * - Warm sand beige Bottom Banner (Image 4): Not sure which size or quality? + WHATSAPP US (green) + BOOK A VIDEO CALL (outline)
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
  
  <div class="shop-archive-container" style="max-width: 1240px; margin: 30px auto 60px; padding: 0 20px;">
    
    <!-- Shop Header Hero -->
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

$page_heading = 'Gemstones';
if ($active_stone && isset($stone_display_titles[strtolower($active_stone)])) {
    $page_heading = $stone_display_titles[strtolower($active_stone)];
} elseif ($active_stone) {
    $page_heading = ucwords(str_replace('-', ' ', $active_stone));
} elseif (function_exists('is_product_category') && is_product_category()) {
    $term = get_queried_object();
    if ($term && !empty($term->name)) {
        $page_heading = str_ireplace('Loose Gemstones', 'Gemstones', $term->name);
    }
}
?>
    <!-- Breadcrumb & Title -->
    <div class="shop-header-hero" style="margin-bottom: 24px;">
      <div class="breadcrumb-trail" style="font-size: 11px; color: var(--color-text-muted, #76706A); margin-bottom: 8px;">
        <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a> <span style="font-size: 11px; margin: 0 4px;">›</span>
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" style="color: inherit; text-decoration: none;">Gemstones</a>
        <?php if ($active_stone) : ?>
          <span style="font-size: 11px; margin: 0 4px;">›</span>
          <span style="color: var(--color-text-main, #1C1A17); font-weight: 600;"><?php echo esc_html($page_heading); ?></span>
        <?php endif; ?>
      </div>
      <h1 class="shop-main-title" style="font-family: var(--font-family-serif, 'Playfair Display', serif); font-size: 32px; font-weight: 400; margin-bottom: 8px; color: #1C1A17;">
        <?php echo esc_html($page_heading); ?>
      </h1>
      <?php if (!$active_stone) : ?>
        <p class="shop-description-sub" style="font-size: 14px; color: var(--color-text-muted, #76706A); line-height: 1.6; max-width: 860px; margin-bottom: 24px;">
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
            <a class="circ" href="<?php echo esc_url($link); ?>" style="display: flex; flex-direction: column; align-items: center; gap: 10px; font-size: 13.5px; width: 104px; text-align: center; text-decoration: none; color: var(--color-text-main, #1C1A17);">
              <span class="c" style="width: 96px; height: 96px; border-radius: 50%; background: #FFFFFF; border: 1px solid var(--color-border-light, #E8E1D6); display: flex; align-items: center; justify-content: center; overflow: hidden; transition: transform .3s, box-shadow .3s;">
                <img src="<?php echo esc_url(vivaaz_get_img_url($gc['img'])); ?>" alt="<?php echo esc_attr(strip_tags($gc['name'])); ?>" style="width: 76%; height: 76%; object-fit: contain;<?php echo $gc['filter'] ? ' filter: ' . $gc['filter'] . ';' : ''; ?>">
              </span>
              <span style="font-size: 13px; line-height: 1.25; color: var(--color-text-main, #1C1A17);"><?php echo $gc['name']; ?></span>
            </a>
          <?php endforeach; ?>
        </div>
      <?php else : ?>
        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 24px; flex-wrap: wrap; margin-bottom: 20px;">
          <div>
            <p class="shop-description-sub" style="font-size: 14px; color: var(--color-text-muted, #76706A); line-height: 1.6; max-width: 720px; margin-bottom: 0;">
              Natural <?php echo esc_html(strtolower($page_heading)); ?>, sorted by hand in Jaipur. Calibrated lots, singles and pairs in every cut we have.
            </p>
          </div>
          <div class="nsbox" style="background: #FFFFFF; border: 1px solid var(--color-border-light, #E8E1D6); padding: 14px 18px; font-size: 12px;">
            <span style="font-size: 10px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; color: var(--color-text-muted, #76706A); display: block; margin-bottom: 4px;">New stock first</span>
            <div>
              <a href="<?php echo esc_url(home_url('/guide/')); ?>" style="color: var(--color-gold, #9B7C4E); font-weight: 600; text-decoration: underline;">Stone guide →</a>
              <span style="margin: 0 4px; color: var(--color-text-muted, #76706A);">•</span>
              <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hi Vivaaz Gems, I am looking for new stock of ' . $page_heading); ?>" target="_blank" style="color: var(--color-gold, #9B7C4E); font-weight: 600; text-decoration: underline;">Get new <?php echo esc_html($page_heading); ?> on WhatsApp →</a>
            </div>
          </div>
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

    <!-- Top Bar matching Image 2: "46 products" + Sort dropdown -->
    <div class="bar" style="display: flex; justify-content: space-between; align-items: center; gap: 14px; margin-top: 28px; padding: 14px 0; border-top: 1px solid var(--line, #E8E1D6); border-bottom: 1px solid var(--line, #E8E1D6); font-size: 13px; color: var(--mute, #76706A); flex-wrap: wrap;">
      <div class="chosen" style="display: flex; gap: 8px; align-items: center; flex-wrap: wrap;">
        <span id="product-count-display">46 products</span>
        <span id="active-filter-chips" style="display: inline-flex; gap: 8px; align-items: center; flex-wrap: wrap;"></span>
      </div>
      <label style="display: inline-flex; align-items: center; gap: 6px; font-size: 13px; color: var(--mute, #76706A);">
        Sort: 
        <select class="sort" id="shop-sort-select" style="border: 0; background: transparent; font-weight: 600; color: var(--ink, #1C1A17); padding: 4px; cursor: pointer; outline: none;">
          <option value="newest" selected>Newest ▾</option>
          <option value="pop">Popularity</option>
          <option value="size">Size (small to large)</option>
          <option value="plh">Price (low to high)</option>
          <option value="phl">Price (high to low)</option>
        </select>
      </label>
    </div>

    <!-- Main 2-column layout matching Image 2: Sidebar (260px) + Products Grid -->
    <div class="lmain" style="display: grid; grid-template-columns: 260px minmax(0, 1fr); gap: 46px; padding-top: 30px; align-items: start;">
      
      <!-- LEFT FILTER SIDEBAR (Image 2 exact replica) -->
      <aside class="side" id="desktop-shop-sidebar">
        
        <!-- LOOSE GEMSTONES TREE -->
        <div class="tree">
          <span class="cap" style="font-size: 11px; letter-spacing: .1em; color: var(--gold-label, #8C7B6D); text-transform: uppercase; font-weight: 700; margin-bottom: 8px; display: block;">Loose gemstones</span>
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
          <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 11px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--gold-label, #8C7B6D);">
            <span>Cut</span>
            <small style="letter-spacing: 0; text-transform: none; color: var(--soft, #76706A); font-weight: 400; font-size: 11px;">optional</small>
          </div>
          <div class="chips" style="display: flex; flex-wrap: wrap; gap: 7px;">
            <button type="button" class="chip <?php echo (isset($_GET['cut']) && $_GET['cut'] === 'Faceted') ? 'on' : ''; ?>" data-key="cut" data-val="Faceted" onclick="toggleChip(this, 'cut', 'Faceted')">Faceted <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">20</em></button>
            <button type="button" class="chip <?php echo (isset($_GET['cut']) && $_GET['cut'] === 'Cabochon') ? 'on' : ''; ?>" data-key="cut" data-val="Cabochon" onclick="toggleChip(this, 'cut', 'Cabochon')">Cabochon <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">24</em></button>
            <button type="button" class="chip <?php echo (isset($_GET['cut']) && $_GET['cut'] === 'Rose cut') ? 'on' : ''; ?>" data-key="cut" data-val="Rose cut" onclick="toggleChip(this, 'cut', 'Rose cut')">Rose cut <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">1</em></button>
            <button type="button" class="chip <?php echo (isset($_GET['cut']) && $_GET['cut'] === 'Briolette') ? 'on' : ''; ?>" data-key="cut" data-val="Briolette" onclick="toggleChip(this, 'cut', 'Briolette')">Briolette <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">1</em></button>
          </div>
        </div>

        <!-- SHAPE -->
        <hr style="border: 0; border-top: 1px solid var(--line, #E8E1D6); margin: 22px 0;">
        <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 11px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--gold-label, #8C7B6D);">
          <span>Shape</span>
        </div>
        <div class="chips" style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip <?php echo (isset($_GET['shape']) && $_GET['shape'] === 'Oval') ? 'on' : ''; ?>" data-key="shape" data-val="Oval" onclick="toggleShapeChip(this, 'Oval')">Oval <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">29</em></button>
          <button type="button" class="chip <?php echo (isset($_GET['shape']) && $_GET['shape'] === 'Round') ? 'on' : ''; ?>" data-key="shape" data-val="Round" onclick="toggleShapeChip(this, 'Round')">Round <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">12</em></button>
          <button type="button" class="chip <?php echo (isset($_GET['shape']) && $_GET['shape'] === 'Pear') ? 'on' : ''; ?>" data-key="shape" data-val="Pear" onclick="toggleShapeChip(this, 'Pear')">Pear <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">2</em></button>
          <button type="button" class="chip <?php echo (isset($_GET['shape']) && $_GET['shape'] === 'Cushion') ? 'on' : ''; ?>" data-key="shape" data-val="Cushion" onclick="toggleShapeChip(this, 'Cushion')">Cushion <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">1</em></button>
          <button type="button" class="chip <?php echo (isset($_GET['shape']) && $_GET['shape'] === 'Octagon') ? 'on' : ''; ?>" data-key="shape" data-val="Octagon" onclick="toggleShapeChip(this, 'Octagon')">Octagon <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">2</em></button>
        </div>

        <!-- SIZE (MM) -->
        <hr style="border: 0; border-top: 1px solid var(--line, #E8E1D6); margin: 22px 0;">
        <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 11px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--gold-label, #8C7B6D);">
          <span>Size (mm)</span>
        </div>
        <p id="size-hint" style="margin: 0; font-size: 12.5px; color: var(--soft, #76706A);">Choose a shape to see its sizes.</p>
        <div id="size-chips" class="chips" style="display: none; margin-top: 6px; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip" data-key="size" data-val="3×4" onclick="toggleChip(this, 'size', '3×4')">3×4 <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">12</em></button>
          <button type="button" class="chip" data-key="size" data-val="4×6" onclick="toggleChip(this, 'size', '4×6')">4×6 <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">18</em></button>
          <button type="button" class="chip" data-key="size" data-val="5×7" onclick="toggleChip(this, 'size', '5×7')">5×7 <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">15</em></button>
          <button type="button" class="chip" data-key="size" data-val="6×8" onclick="toggleChip(this, 'size', '6×8')">6×8 <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">14</em></button>
          <button type="button" class="chip" data-key="size" data-val="8×10" onclick="toggleChip(this, 'size', '8×10')">8×10 <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">12</em></button>
          <button type="button" class="chip" data-key="size" data-val="10×12" onclick="toggleChip(this, 'size', '10×12')">10×12 <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">9</em></button>
          <button type="button" class="chip" data-key="size" data-val="12×16" onclick="toggleChip(this, 'size', '12×16')">12×16 <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">6</em></button>
          <button type="button" class="chip" data-key="size" data-val="18×25" onclick="toggleChip(this, 'size', '18×25')">18×25 <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">3</em></button>
        </div>

        <!-- SOLD AS -->
        <hr style="border: 0; border-top: 1px solid var(--line, #E8E1D6); margin: 22px 0;">
        <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 11px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--gold-label, #8C7B6D);">
          <span>Sold as</span>
        </div>
        <div class="chips" style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip" data-key="soldAs" data-val="Calibrated lot" onclick="toggleChip(this, 'soldAs', 'Calibrated lot')">Calibrated lot <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">40</em></button>
          <button type="button" class="chip" data-key="soldAs" data-val="Single stone" onclick="toggleChip(this, 'soldAs', 'Single stone')">Single stone <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">3</em></button>
          <button type="button" class="chip" data-key="soldAs" data-val="Pair" onclick="toggleChip(this, 'soldAs', 'Pair')">Pair <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">2</em></button>
          <button type="button" class="chip" data-key="soldAs" data-val="Parcel" onclick="toggleChip(this, 'soldAs', 'Parcel')">Parcel <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">1</em></button>
        </div>

        <!-- COLOUR -->
        <hr style="border: 0; border-top: 1px solid var(--line, #E8E1D6); margin: 22px 0;">
        <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 11px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--gold-label, #8C7B6D);">
          <span>Colour</span>
        </div>
        <div class="chips" style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip" data-key="colour" data-val="Blue" onclick="toggleChip(this, 'colour', 'Blue')"><span class="sw" style="background: #2F5BB7;"></span>Blue <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">10</em></button>
          <button type="button" class="chip" data-key="colour" data-val="Red" onclick="toggleChip(this, 'colour', 'Red')"><span class="sw" style="background: #A3122E;"></span>Red <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">5</em></button>
          <button type="button" class="chip" data-key="colour" data-val="Pink" onclick="toggleChip(this, 'colour', 'Pink')"><span class="sw" style="background: #E07A9A;"></span>Pink <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">4</em></button>
          <button type="button" class="chip" data-key="colour" data-val="Green" onclick="toggleChip(this, 'colour', 'Green')"><span class="sw" style="background: #2E8B57;"></span>Green <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">8</em></button>
          <button type="button" class="chip" data-key="colour" data-val="Yellow" onclick="toggleChip(this, 'colour', 'Yellow')"><span class="sw" style="background: #E3B12F;"></span>Yellow <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">3</em></button>
          <button type="button" class="chip" data-key="colour" data-val="Purple" onclick="toggleChip(this, 'colour', 'Purple')"><span class="sw" style="background: #6B3FA0;"></span>Purple <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">3</em></button>
          <button type="button" class="chip" data-key="colour" data-val="White" onclick="toggleChip(this, 'colour', 'White')"><span class="sw" style="background: #F4F6FA; border: 1px solid #ccc;"></span>White <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">8</em></button>
          <button type="button" class="chip" data-key="colour" data-val="Black" onclick="toggleChip(this, 'colour', 'Black')"><span class="sw" style="background: #1c1a17;"></span>Black <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">1</em></button>
          <button type="button" class="chip" data-key="colour" data-val="Multi" onclick="toggleChip(this, 'colour', 'Multi')"><span class="sw" style="background: conic-gradient(#2F5BB7,#A3122E,#E3B12F,#2E8B57,#2F5BB7);"></span>Multi <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">4</em></button>
        </div>

        <!-- QUALITY -->
        <hr style="border: 0; border-top: 1px solid var(--line, #E8E1D6); margin: 22px 0;">
        <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 11px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--gold-label, #8C7B6D);">
          <span>Quality</span>
        </div>
        <div class="chips" style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip" data-key="quality" data-val="AAA" onclick="toggleChip(this, 'quality', 'AAA')">AAA <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">16</em></button>
          <button type="button" class="chip" data-key="quality" data-val="AA" onclick="toggleChip(this, 'quality', 'AA')">AA <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">26</em></button>
          <button type="button" class="chip" data-key="quality" data-val="Commercial" onclick="toggleChip(this, 'quality', 'Commercial')">Commercial <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">4</em></button>
        </div>

        <!-- TREATMENT -->
        <hr style="border: 0; border-top: 1px solid var(--line, #E8E1D6); margin: 22px 0;">
        <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 11px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--gold-label, #8C7B6D);">
          <span>Treatment</span>
        </div>
        <div class="chips" style="display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip" data-key="treat" data-val="None" onclick="toggleChip(this, 'treat', 'None')">None <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">28</em></button>
          <button type="button" class="chip" data-key="treat" data-val="Heated" onclick="toggleChip(this, 'treat', 'Heated')">Heated <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">8</em></button>
          <button type="button" class="chip" data-key="treat" data-val="Oiled" onclick="toggleChip(this, 'treat', 'Oiled')">Oiled <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">1</em></button>
          <button type="button" class="chip" data-key="treat" data-val="Irradiated" onclick="toggleChip(this, 'treat', 'Irradiated')">Irradiated <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">2</em></button>
          <button type="button" class="chip" data-key="treat" data-val="Dyed or coated" onclick="toggleChip(this, 'treat', 'Dyed or coated')">Dyed or coated <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">2</em></button>
          <button type="button" class="chip" data-key="treat" data-val="Not tested" onclick="toggleChip(this, 'treat', 'Not tested')">Not tested <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">5</em></button>
        </div>

        <!-- PRICE PER PIECE -->
        <hr style="border: 0; border-top: 1px solid var(--line, #E8E1D6); margin: 22px 0;">
        <div class="cap" style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: baseline; font-size: 11px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--gold-label, #8C7B6D);">
          <span>Price per piece</span>
        </div>
        <input type="range" class="range" id="pmax" min="0" max="38500" step="100" value="38500" aria-label="Highest price" style="width: 100%; accent-color: #1C1A17; cursor: pointer;" oninput="updatePriceSlider(this.value)">
        <div class="prr" style="display: flex; justify-content: space-between; font-size: 12.5px; color: var(--mute, #76706A); margin-top: 6px;">
          <span>₹0</span>
          <span id="prr-val">up to ₹38,500</span>
        </div>
        <div class="chips" style="margin-top: 12px; display: flex; flex-wrap: wrap; gap: 7px;">
          <button type="button" class="chip" data-key="price" data-val="lt100" onclick="toggleChip(this, 'price', 'lt100')">Under ₹100 <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">15</em></button>
          <button type="button" class="chip" data-key="price" data-val="mid" onclick="toggleChip(this, 'price', 'mid')">₹100–1,000 <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">24</em></button>
          <button type="button" class="chip" data-key="price" data-val="gt1000" onclick="toggleChip(this, 'price', 'gt1000')">₹1,000+ <em style="font-style: normal; color: var(--soft, #76706A); font-size: 11.5px;">7</em></button>
        </div>
      </aside>

      <!-- RIGHT PRODUCT GRID (Image 2 exact replica) -->
      <main class="shop-products-main">
        <?php if (function_exists('woocommerce_product_loop') && woocommerce_product_loop() && false) : ?>
          
          <div class="grid">
            <?php
            while (have_posts()) :
              the_post();
              if (function_exists('do_action')) do_action('woocommerce_shop_loop');
              if (function_exists('wc_get_template_part')) wc_get_template_part('content', 'product');
            endwhile;
            ?>
          </div>

          <?php if (function_exists('do_action')) do_action('woocommerce_after_shop_loop'); ?>

        <?php else : ?>
          
          <!-- 6 Product Cards Matching Image 2 100% -->
          <div class="grid" style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 26px 22px;">
            
            <!-- Card 1: Rainbow Moonstone Oval Cabochon -->
            <div class="card rv">
              <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>';">
                <span class="tag">CALIBRATED LOT</span>
                <button type="button" class="heart" title="Save to wishlist" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('rmcoc-1', 'Rainbow Moonstone Oval Cabochon', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '₹94', '<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>', this);">
                  <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg>
                </button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon">
                <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('Rainbow Moonstone Oval Cabochon', 'from ₹94', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>');">QUICK VIEW</button>
              </div>
              <div class="cb">
                <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>';">Rainbow Moonstone Oval Cabochon</div>
                <div class="dt">Cabochon · 3×4 to 12×16 mm · 8 sizes</div>
                <div class="pr">from ₹94 <span>per piece</span></div>
                <div class="act">
                  <a href="<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>" class="ul">SELECT OPTIONS</a>
                </div>
              </div>
            </div>

            <!-- Card 2: Sapphire Oval Faceted -->
            <div class="card rv">
              <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>';">
                <span class="tag">CALIBRATED LOT</span>
                <button type="button" class="heart" title="Save to wishlist" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('cbs-3', 'Sapphire Oval Faceted', '<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>', '₹1,131', '<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>', this);">
                  <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg>
                </button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Sapphire Oval Faceted">
                <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('Sapphire Oval Faceted', 'from ₹1,131', '<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>', '<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>');">QUICK VIEW</button>
              </div>
              <div class="cb">
                <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>';">Sapphire Oval Faceted</div>
                <div class="dt">Faceted · 3×5 to 7×9 mm · 5 sizes</div>
                <div class="pr">from ₹1,131 <span>per piece</span></div>
                <div class="act">
                  <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" class="ul">SELECT OPTIONS</a>
                </div>
              </div>
            </div>

            <!-- Card 3: Rainbow Moonstone Oval Cabochon Pair -->
            <div class="card rv">
              <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>';">
                <span class="tag">PAIR</span>
                <button type="button" class="heart" title="Save to wishlist" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('rm-pair-1', 'Rainbow Moonstone Oval Cabochon Pair', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '₹2,600', '<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>', this);">
                  <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg>
                </button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon Pair">
                <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('Rainbow Moonstone Oval Cabochon Pair', '₹2,600', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>');">QUICK VIEW</button>
              </div>
              <div class="cb">
                <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>';">Rainbow Moonstone Oval Cabochon Pair</div>
                <div class="dt">Cabochon · 10×12 mm · 1 pair</div>
                <div class="pr">₹2,600 <span>per pair</span></div>
                <div class="act">
                  <button type="button" class="btn sm" onclick="event.preventDefault(); event.stopPropagation(); addProductToCartAndOpenDrawer(0, 'Rainbow Moonstone Oval Cabochon Pair', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '₹2,600', '10×12 mm', 1);">ADD TO CART</button>
                </div>
              </div>
            </div>

            <!-- Card 4: Rainbow Moonstone Oval Cabochon (ONLY 1) -->
            <div class="card rv">
              <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-single-piece/')); ?>';">
                <span class="tag one">ONLY 1</span>
                <button type="button" class="heart" title="Save to wishlist" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('rmcoc-2', 'Rainbow Moonstone Oval Cabochon', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '₹4,800', '<?php echo esc_url(home_url('/product/rainbow-moonstone-single-piece/')); ?>', this);">
                  <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg>
                </button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon">
                <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('Rainbow Moonstone Oval Cabochon', '₹4,800', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '<?php echo esc_url(home_url('/product/rainbow-moonstone-single-piece/')); ?>');">QUICK VIEW</button>
              </div>
              <div class="cb">
                <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-single-piece/')); ?>';">Rainbow Moonstone Oval Cabochon</div>
                <div class="dt">Cabochon · 18×25 mm · 32 ct</div>
                <div class="pr">₹4,800 <span>one stone</span></div>
                <div class="act">
                  <button type="button" class="btn sm" onclick="event.preventDefault(); event.stopPropagation(); addProductToCartAndOpenDrawer(0, 'Rainbow Moonstone Oval Cabochon', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '₹4,800', '18×25 mm', 1);">ADD TO CART</button>
                </div>
              </div>
            </div>

            <!-- Card 5: Ruby Oval Faceted · AA -->
            <div class="card rv">
              <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/product/burmese-ruby-round-cabochon/')); ?>';">
                <span class="tag">CALIBRATED LOT</span>
                <button type="button" class="heart" title="Save to wishlist" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('ruby-aa-5', 'Ruby Oval Faceted · AA', '<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>', '₹764', '<?php echo esc_url(home_url('/product/burmese-ruby-round-cabochon/')); ?>', this);">
                  <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg>
                </button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby Oval Faceted · AA">
                <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('Ruby Oval Faceted · AA', 'from ₹764', '<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>', '<?php echo esc_url(home_url('/product/burmese-ruby-round-cabochon/')); ?>');">QUICK VIEW</button>
              </div>
              <div class="cb">
                <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/product/burmese-ruby-round-cabochon/')); ?>';">Ruby Oval Faceted · AA</div>
                <div class="dt">Faceted · 3×4 to 5×7 mm · 4 sizes</div>
                <div class="pr">from ₹764 <span>per piece</span></div>
                <div class="act">
                  <a href="<?php echo esc_url(home_url('/product/burmese-ruby-round-cabochon/')); ?>" class="ul">SELECT OPTIONS</a>
                </div>
              </div>
            </div>

            <!-- Card 6: Rainbow Moonstone Oval Cabochon · AA -->
            <div class="card rv">
              <div class="ph" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>';">
                <span class="tag">CALIBRATED LOT</span>
                <button type="button" class="heart" title="Save to wishlist" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('rm-aa-6', 'Rainbow Moonstone Oval Cabochon · AA', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '₹59', '<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>', this);">
                  <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg>
                </button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon · AA">
                <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('Rainbow Moonstone Oval Cabochon · AA', 'from ₹59', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>');">QUICK VIEW</button>
              </div>
              <div class="cb">
                <div class="nm" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>';">Rainbow Moonstone Oval Cabochon · AA</div>
                <div class="dt">Cabochon · 4×6 to 10×12 mm · 5 sizes</div>
                <div class="pr">from ₹59 <span>per piece</span></div>
                <div class="act">
                  <a href="<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>" class="ul">SELECT OPTIONS</a>
                </div>
              </div>
            </div>

          </div>

          <!-- Bottom Progress & Load more (Image 2) -->
          <div class="more" style="text-align: center; padding: 44px 0 10px; display: flex; flex-direction: column; align-items: center; gap: 14px;">
            <span style="font-size: 12.5px; color: var(--soft, #76706A);">Showing 6 of 46</span>
            <div class="prog" style="width: 220px; height: 2px; background: var(--line, #E8E1D6); position: relative;">
              <i style="position: absolute; left: 0; top: 0; height: 2px; width: 13%; background: var(--ink, #1C1A17);"></i>
            </div>
            <button class="btn o" type="button" style="border: 1px solid #1C1A17; background: transparent; color: #1C1A17; padding: 12px 28px; font-weight: 700; letter-spacing: 0.16em; font-size: 11px; text-transform: uppercase; cursor: pointer;">LOAD MORE</button>
          </div>

        <?php endif; ?>
      </main>

    </div>

    <!-- BOTTOM BANNER (Image 4 100% exact match) -->
    <div class="band" style="background: var(--sand, #F1EBE1); padding: 36px 44px; display: flex; justify-content: space-between; align-items: center; gap: 24px; flex-wrap: wrap; margin-top: 70px;">
      <div>
        <h3 style="font-family: var(--display, 'Playfair Display', serif); font-weight: 400; font-size: 26px; margin: 0 0 6px; color: #1C1A17;">Not sure which size or quality?</h3>
        <p style="margin: 0; color: var(--mute, #76706A); font-size: 13.5px;">We send live photos and videos of the exact stones before you buy.</p>
      </div>
      <div class="b" style="display: flex; gap: 12px; flex-wrap: wrap;">
        <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hi Vivaaz Gems, I need photos and videos of gemstones before buying.'); ?>" target="_blank" class="btn wa" style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; background: #1E9E52; border: 1px solid #1E9E52; color: #FFFFFF; padding: 14px 26px; font-size: 12px; letter-spacing: .16em; font-weight: 700; text-transform: uppercase; text-decoration: none;">
          <svg class="i" style="width: 17px; height: 17px; fill: currentColor;" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm.02 16.5c-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.13 8.13 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.7-.81-.23-.08-.39-.12-.56.12-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.12-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.38.11-.5.11-.11.25-.29.37-.43.12-.14.17-.25.25-.41.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31-.22.25-.86.84-.86 2.05s.88 2.38 1 2.55c.12.17 1.73 2.65 4.2 3.71.59.25 1.05.41 1.41.52.59.19 1.13.16 1.56.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.14-1.18-.06-.11-.22-.17-.47-.3z"/></svg>
          WHATSAPP US
        </a>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn o" style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; background: #FFFFFF; color: #1C1A17; border: 1px solid #1C1A17; padding: 14px 26px; font-size: 12px; letter-spacing: .16em; font-weight: 700; text-transform: uppercase; text-decoration: none;">
          BOOK A VIDEO CALL
        </a>
      </div>
    </div>

  </div>

  <!-- MOBILE BOTTOM SHEETS FOR FILTER & SORT (EXACT MATCH FOR CLIENT PHONE DEMO: .sheet) -->
  <div class="scrim" id="mobile-sheet-scrim" style="display:none; position:fixed; inset:0; background:rgba(28,26,23,.5); z-index:99998;" onclick="closeMobileSheets();"></div>
  
  <!-- Filter Sheet -->
  <section class="sheet" id="mobile-filter-sheet" role="dialog" aria-label="Filters" style="display:none;">
    <div class="sh">
      <b>Filter</b>
      <button type="button" onclick="closeMobileSheets();" aria-label="Close" style="background:none; border:0; font-size:24px; cursor:pointer; color:var(--soft); line-height:1;">&times;</button>
    </div>
    <div class="sb2" id="mobile-filter-sheet-body">
      <!-- Cloned from desktop sidebar -->
    </div>
    <div class="sf">
      <button type="button" class="btn o" onclick="clearAllShopFilters();">Clear all</button>
      <button type="button" class="btn" onclick="closeMobileSheets();">Show results</button>
    </div>
  </section>

  <!-- Sort Sheet -->
  <section class="sheet" id="mobile-sort-sheet" role="dialog" aria-label="Sort" style="display:none;">
    <div class="sh">
      <b>Sort</b>
      <button type="button" onclick="closeMobileSheets();" aria-label="Close" style="background:none; border:0; font-size:24px; cursor:pointer; color:var(--soft); line-height:1;">&times;</button>
    </div>
    <div class="sb2">
      <button type="button" class="opt on" onclick="selectMobileSort('newest', this);">Newest ✓</button>
      <button type="button" class="opt" onclick="selectMobileSort('pop', this);">Best selling</button>
      <button type="button" class="opt" onclick="selectMobileSort('plh', this);">Price low to high</button>
      <button type="button" class="opt" onclick="selectMobileSort('phl', this);">Price high to low</button>
    </div>
  </section>

</div>

<script>
function openFilterSheet() {
  var sheet = document.getElementById('mobile-filter-sheet');
  var scrim = document.getElementById('mobile-sheet-scrim');
  var body = document.getElementById('mobile-filter-sheet-body');
  var sidebar = document.getElementById('desktop-shop-sidebar');
  if (sheet && scrim) {
    if (sidebar && body && !body.hasChildNodes()) {
      body.innerHTML = '<div class="side" style="display:block!important; width:auto;">' + sidebar.innerHTML + '</div>';
    }
    sheet.style.display = 'flex';
    scrim.style.display = 'block';
  }
}

function openSortSheet() {
  var sheet = document.getElementById('mobile-sort-sheet');
  var scrim = document.getElementById('mobile-sheet-scrim');
  if (sheet && scrim) {
    sheet.style.display = 'flex';
    scrim.style.display = 'block';
  }
}

function closeMobileSheets() {
  var fSheet = document.getElementById('mobile-filter-sheet');
  var sSheet = document.getElementById('mobile-sort-sheet');
  var scrim = document.getElementById('mobile-sheet-scrim');
  if (fSheet) fSheet.style.display = 'none';
  if (sSheet) sSheet.style.display = 'none';
  if (scrim) scrim.style.display = 'none';
}

function selectMobileSort(val, btn) {
  document.querySelectorAll('#mobile-sort-sheet .opt').forEach(function(o) {
    o.classList.remove('on');
    o.innerHTML = o.innerText.replace(' ✓', '');
  });
  btn.classList.add('on');
  btn.innerHTML = btn.innerText + ' ✓';
  var sortSelect = document.getElementById('shop-sort-select');
  if (sortSelect) {
    sortSelect.value = val;
    sortSelect.dispatchEvent(new Event('change'));
  }
  closeMobileSheets();
}

function toggleShapeChip(btn, shape) {
  var wasOn = btn.classList.contains('on');
  var parent = btn.closest('.chips');
  if (parent) {
    parent.querySelectorAll('.chip').forEach(function(c) { c.classList.remove('on'); });
  }
  var sizeHint = document.getElementById('size-hint');
  var sizeChips = document.getElementById('size-chips');
  
  if (!wasOn) {
    btn.classList.add('on');
    if (sizeHint) sizeHint.style.display = 'none';
    if (sizeChips) sizeChips.style.display = 'flex';
  } else {
    if (sizeHint) sizeHint.style.display = 'block';
    if (sizeChips) sizeChips.style.display = 'none';
  }
  updateFilterBadges();
}

function toggleChip(btn, key, val) {
  btn.classList.toggle('on');
  updateFilterBadges();
}

function updatePriceSlider(val) {
  var display = document.getElementById('prr-val');
  if (display) {
    display.textContent = 'up to ₹' + Number(val).toLocaleString('en-IN');
  }
}

function updateFilterBadges() {
  var container = document.getElementById('active-filter-chips');
  var activeChips = document.querySelectorAll('.side .chip.on');
  var badgeCount = document.getElementById('mobile-filter-badge-count');
  if (badgeCount) {
    badgeCount.textContent = activeChips.length > 0 ? '(' + activeChips.length + ')' : '';
  }
  if (!container) return;
  var html = '';
  activeChips.forEach(function(c) {
    var key = c.getAttribute('data-key') || '';
    var val = c.getAttribute('data-val') || c.innerText.trim().split(' ')[0];
    html += '<span class="x" style="background:#EFE8DD;border-radius:999px;padding:5px 10px 5px 12px;font-size:12px;color:#3b362f;display:inline-flex;align-items:center;gap:6px;cursor:pointer;" onclick="clearSingleFilter(\'' + key + '\', \'' + val + '\')">' + val + ' ✕</span>';
  });
  if (activeChips.length > 0) {
    html += '<a href="javascript:void(0)" onclick="clearAllShopFilters()" style="text-decoration:underline;color:#76706A;font-size:12px;margin-left:4px;">Clear all</a>';
  }
  container.innerHTML = html;
}

function clearSingleFilter(key, val) {
  var btn = document.querySelector('.side .chip[data-key="' + key + '"][data-val="' + val + '"]');
  if (btn) {
    btn.classList.remove('on');
    if (key === 'shape') {
      var sizeHint = document.getElementById('size-hint');
      var sizeChips = document.getElementById('size-chips');
      if (sizeHint) sizeHint.style.display = 'block';
      if (sizeChips) sizeChips.style.display = 'none';
    }
  }
  updateFilterBadges();
}

function clearAllShopFilters() {
  document.querySelectorAll('.side .chip.on').forEach(function(c) {
    c.classList.remove('on');
  });
  var sizeHint = document.getElementById('size-hint');
  var sizeChips = document.getElementById('size-chips');
  if (sizeHint) sizeHint.style.display = 'block';
  if (sizeChips) sizeChips.style.display = 'none';
  updateFilterBadges();
}
</script>

<?php
get_footer('shop');
