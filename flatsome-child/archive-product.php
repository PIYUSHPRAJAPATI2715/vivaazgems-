<?php
/**
 * Vivaaz Gems - Custom WooCommerce Archive / Shop Page Template
 * Matches Page 10 of the 23-page Master Brief & Client PDF Points 7 & 17
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
    <!-- Shop Header Hero (Point 2: Title = stone name, 'Gemstones' not 'Loose Gemstones') -->
    <div class="shop-header-hero" style="margin-bottom: 24px;">
      <div class="breadcrumb-trail" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> <span style="font-size: 11px; margin: 0 4px;">›</span>
        <a href="<?php echo esc_url(home_url('/shop/')); ?>">Gemstones</a>
        <?php if ($active_stone) : ?>
          <span style="font-size: 11px; margin: 0 4px;">›</span>
          <span style="color: var(--color-text-main); font-weight: 600;"><?php echo esc_html($page_heading); ?></span>
        <?php endif; ?>
      </div>
      <h1 class="shop-main-title" style="font-family: var(--font-family-serif); font-size: 32px; font-weight: 400; margin-bottom: 8px;">
        <?php echo esc_html($page_heading); ?>
      </h1>
      <p class="shop-description-sub" style="font-size: 13px; color: var(--color-text-muted); margin-bottom: 16px;">
        Natural, calibrated and single gemstones cut in Jaipur. Direct from the cutters.
        <a href="https://wa.me/919680552270" target="_blank" class="text-gold" style="font-weight: 600; text-decoration: underline; margin-left: 6px;">Get new stock on WhatsApp →</a>
      </p>

      <!-- POINT 7 SPEC: Cut Buttons at Top (All · Cabochon · Faceted · Rose cut) -->
      <div class="cut-pills-row" style="display: flex; gap: 8px; margin-bottom: 14px; flex-wrap: wrap;">
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'all')); ?>" class="cut-pill-item active" style="padding: 7px 16px; font-size: 12px; font-weight: 600; border: 1px solid #1C1A17; background: #1C1A17; color: #FFFFFF; text-decoration: none;">All <span>(18)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'cabochon')); ?>" class="cut-pill-item" style="padding: 7px 16px; font-size: 12px; font-weight: 600; border: 1px solid var(--color-border-light); background: #FFFFFF; color: var(--color-text-main); text-decoration: none;">Cabochon <span>(8)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'faceted')); ?>" class="cut-pill-item" style="padding: 7px 16px; font-size: 12px; font-weight: 600; border: 1px solid var(--color-border-light); background: #FFFFFF; color: var(--color-text-main); text-decoration: none;">Faceted <span>(7)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'rose-cut')); ?>" class="cut-pill-item" style="padding: 7px 16px; font-size: 12px; font-weight: 600; border: 1px solid var(--color-border-light); background: #FFFFFF; color: var(--color-text-main); text-decoration: none;">Rose cut <span>(3)</span></a>
      </div>
    </div>

    <!-- Active Filter Badges Bar + Mobile Filter Trigger (Point 17 & 24: One neat Filter · Sort line on mobile) -->
    <div class="shop-filter-bar-header" style="display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 24px; padding-bottom: 14px; border-bottom: 1px solid var(--color-border-light); font-size: 12px;">
      
      <!-- Mobile Filter Button (Point 24: Single neat Filter · Sort line on phone) -->
      <div class="mobile-filter-btn-wrap" style="display: none;">
        <button type="button" class="btn-mobile-filter-trigger" onclick="openShopFilterDrawer()" style="background: #FFFFFF; border: 1px solid #1C1A17; color: #1C1A17; padding: 8px 16px; font-size: 12px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; display: inline-flex; align-items: center; gap: 6px; cursor: pointer;">
          <span>⚡</span> FILTER
        </button>
      </div>

      <div class="active-badges-flex" style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
        <?php if ($active_stone) : ?>
          <span class="active-badge" style="background: var(--color-border-light); padding: 4px 10px; font-size: 11px;"><?php echo esc_html($page_heading); ?> <a href="<?php echo esc_url(remove_query_arg(array('stone', 'filter_stone'))); ?>" style="text-decoration: none; color: inherit;">✕</a></span>
        <?php else : ?>
          <span class="active-badge" style="background: var(--color-border-light); padding: 4px 10px; font-size: 11px;">Cabochon ✕</span>
          <span class="active-badge" style="background: var(--color-border-light); padding: 4px 10px; font-size: 11px;">Oval ✕</span>
        <?php endif; ?>
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="clear-all-link" style="text-decoration: underline; color: var(--color-text-muted); font-size: 11px;">Clear all</a>
      </div>

      <div class="result-count-sort-flex" style="display: flex; align-items: center; gap: 14px; margin-left: auto;">
        <span class="result-count-text" style="color: var(--color-text-muted); font-size: 12px;">18 products</span>
        <select class="shop-sort-select" style="font-size: 12px; border: 1px solid var(--color-border-light); background: #FFFFFF; padding: 6px 10px; cursor: pointer;">
          <option>Sort: Popularity ▾</option>
          <option>Sort: Size (small to large)</option>
          <option>Sort: Price (low to high)</option>
          <option>Sort: Price (high to low)</option>
          <option>Sort: Newest</option>
        </select>
      </div>
    </div>

    <!-- Main Shop Layout Grid (Sidebar + Products) -->
    <div class="shop-layout-grid" style="display: grid; grid-template-columns: 240px 1fr; gap: 36px;">
      
      <!-- LEFT FILTER SIDEBAR (POINT 3 & 4 SPEC: Precious only stones, button filters, price slider) -->
      <aside class="shop-filter-sidebar" id="desktop-shop-sidebar">
        
        <!-- Category Accordion (Point 3: 'Previous' -> 'Precious', only stones) -->
        <div class="filter-widget-box" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 class="filter-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px; text-transform: uppercase;">
            CATEGORY <span style="font-size: 12px; color: var(--color-text-muted); float: right;">›</span>
          </h4>
          
          <ul class="filter-category-list" style="list-style: none; padding: 0; font-size: 13px; line-height: 1.8;">
            <li class="active">
              <a href="<?php echo esc_url(home_url('/shop/')); ?>" style="font-weight: 700; color: #1C1A17; text-decoration: none;">Gemstones ▾</a>
              
              <!-- Sub-group: Precious (Point 3: Strictly PRECIOUS, stones only) -->
              <div style="padding-left: 12px; margin-top: 6px;">
                <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.05em; color: var(--color-text-muted); text-transform: uppercase;">PRECIOUS</span>
                <ul class="sub-stone-list" style="list-style: none; padding-left: 8px; margin: 4px 0 10px;">
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Ruby (12)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Sapphire (18)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Emerald (15)</a></li>
                </ul>
              </div>

              <!-- Sub-group: Semi-Precious (Point 3: Clean stones list, no cuts) -->
              <div style="padding-left: 12px; margin-top: 4px;">
                <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.05em; color: var(--color-text-muted); text-transform: uppercase;">SEMI-PRECIOUS</span>
                <ul class="sub-stone-list" style="list-style: none; padding-left: 8px; margin: 4px 0 10px; max-height: 240px; overflow-y: auto;">
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=moonstone')); ?>" style="color: var(--color-gold-label); font-weight: 600; text-decoration: none; font-size: 12px;">Rainbow Moonstone (24)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=amethyst')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Amethyst (16)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=aquamarine')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Aquamarine (9)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=citrine')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Citrine (14)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=garnet')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Garnet (12)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=labradorite')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Labradorite (6)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=opal')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Opal (10)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=peridot')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Peridot (7)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=spinel')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Spinel (8)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=tanzanite')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Tanzanite (8)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=topaz')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Topaz (11)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=tourmaline')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Tourmaline (15)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=turquoise')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Turquoise (5)</a></li>
                </ul>
              </div>
            </li>
            
            <li style="margin-top: 8px;"><a href="<?php echo esc_url(home_url('/layouts/')); ?>" style="color: var(--color-text-main); text-decoration: none;">Layouts ›</a></li>
            <li><a href="<?php echo esc_url(home_url('/beads/')); ?>" style="color: var(--color-text-main); text-decoration: none;">Gemstone Beads ›</a></li>
            <li><a href="<?php echo esc_url(home_url('/jewelry/')); ?>" style="color: var(--color-text-main); text-decoration: none;">Jewelry ›</a></li>
            <li><a href="<?php echo esc_url(home_url('/astrology/')); ?>" style="color: var(--color-text-main); text-decoration: none;">Astrology ›</a></li>
          </ul>
        </div>

        <!-- Filter by Shape (Point 4: Buttons, not tick boxes) -->
        <div class="filter-widget-box" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 class="filter-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px; text-transform: uppercase;">
            Shape <span style="font-size: 11px; color: var(--color-text-muted); float: right;">▾</span>
          </h4>
          <div class="filter-buttons-wrap filter-shape-btns" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn active" data-shape="Oval" onclick="selectFilterShape(this, 'Oval')">Oval</button>
            <button type="button" class="filter-pill-btn" data-shape="Round" onclick="selectFilterShape(this, 'Round')">Round</button>
            <button type="button" class="filter-pill-btn" data-shape="Pear" onclick="selectFilterShape(this, 'Pear')">Pear</button>
            <button type="button" class="filter-pill-btn" data-shape="Cushion" onclick="selectFilterShape(this, 'Cushion')">Cushion</button>
            <button type="button" class="filter-pill-btn" data-shape="Emerald" onclick="selectFilterShape(this, 'Emerald')">Emerald</button>
            <button type="button" class="filter-pill-btn" data-shape="Freeform" onclick="selectFilterShape(this, 'Freeform')">Freeform</button>
            <button type="button" class="filter-pill-btn" data-shape="Heart" onclick="selectFilterShape(this, 'Heart')">Heart</button>
            <button type="button" class="filter-pill-btn" data-shape="Marquise" onclick="selectFilterShape(this, 'Marquise')">Marquise</button>
          </div>
        </div>

        <!-- Filter by Size (Point 4: Buttons, sizes only after a shape is picked) -->
        <div class="filter-widget-box" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 class="filter-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 6px; text-transform: uppercase;">
            Size (mm) <span style="font-size: 11px; color: var(--color-text-muted); float: right;">▾</span>
          </h4>
          <p id="size-hint-text" style="font-size: 11px; color: var(--color-text-muted); margin: 0 0 10px 0; display: none;">Select a shape above to view available sizes</p>
          <div class="filter-buttons-wrap filter-size-btns" id="filter-size-group" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn active" onclick="togglePillBtn(this)">6×8 mm</button>
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">8×10 mm</button>
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">10×12 mm</button>
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">12×16 mm</button>
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">15×20 mm</button>
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">18×25 mm</button>
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">Free Size</button>
          </div>
        </div>

        <!-- Filter by Quality (Point 4: Buttons) -->
        <div class="filter-widget-box" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 class="filter-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px; text-transform: uppercase;">
            Quality <span style="font-size: 11px; color: var(--color-text-muted); float: right;">▾</span>
          </h4>
          <div class="filter-buttons-wrap filter-quality-btns" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">AAA+ (Top)</button>
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">AAA (Fine)</button>
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">AA (Commercial)</button>
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">Standard</button>
          </div>
        </div>

        <!-- Filter by Sold as (Point 4: Add Sold as) -->
        <div class="filter-widget-box" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 class="filter-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px; text-transform: uppercase;">
            Sold As <span style="font-size: 11px; color: var(--color-text-muted); float: right;">▾</span>
          </h4>
          <div class="filter-buttons-wrap filter-soldas-btns" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">Single Piece</button>
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">Matching Pair</button>
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">Lot / Pack</button>
            <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">By Carat</button>
          </div>
        </div>

        <!-- Filter by Price Slider (Point 4: Price Slider) -->
        <div class="filter-widget-box" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 class="filter-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px; text-transform: uppercase;">
            Price Range <span style="font-size: 11px; color: var(--color-text-muted); float: right;">▾</span>
          </h4>
          <div class="price-slider-wrap" style="padding: 4px 0;">
            <input type="range" min="100" max="50000" step="250" value="25000" class="vivaaz-price-range" id="desktop-price-slider" style="width: 100%; accent-color: var(--color-gold-accent, #9C7C4C); cursor: pointer;" oninput="document.getElementById('price-slider-display').textContent = 'Up to ₹' + Number(this.value).toLocaleString('en-IN');">
            <div style="display: flex; justify-content: space-between; font-size: 11px; color: var(--color-text-muted); margin-top: 6px;">
              <span>₹100</span>
              <span id="price-slider-display" style="font-weight: 600; color: #1C1A17;">Up to ₹25,000</span>
              <span>₹50,000+</span>
            </div>
          </div>
        </div>

      </aside>

      <!-- RIGHT PRODUCT GRID -->
      <main class="shop-products-main">
        <?php if (function_exists('woocommerce_product_loop') && woocommerce_product_loop()) : ?>
          
          <div class="products-grid-3col" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
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
          
          <!-- Fallback Showcase Products matching Page 10 Spec -->
          <?php
          $showcase_stones = array(
              array(
                  'title'    => 'Rainbow Moonstone Oval Cabochon',
                  'sub'      => '6×8 to 12×16 mm · 4 sizes',
                  'price'    => '₹ 105',
                  'unit'     => ' per piece',
                  'url'      => home_url('/product/rainbow-moonstone-oval-cabochon/'),
                  'img'      => vivaaz_get_img_url('moonstone.jpg'),
                  'badge'    => 'CALIBRATED · 10+ PIECES',
                  'badge_cl' => 'badge-gold',
                  'id'       => 'rmcoc-1'
              ),
              array(
                  'title'    => 'Rainbow Moonstone Single Piece',
                  'sub'      => '18×25 mm · 32 ct · single',
                  'price'    => '₹ 4,800',
                  'unit'     => '',
                  'url'      => home_url('/product/rainbow-moonstone-single-piece/'),
                  'img'      => vivaaz_get_img_url('moonstone.jpg'),
                  'badge'    => 'ONLY 1',
                  'badge_cl' => 'badge-blue',
                  'id'       => 'rmcoc-2'
              ),
              array(
                  'title'    => 'Ceylon Blue Sapphire 7×5mm',
                  'sub'      => '7×5 mm · 2.1 ct · pair',
                  'price'    => '₹ 4,200',
                  'unit'     => ' for the pair',
                  'url'      => home_url('/product/ceylon-blue-sapphire-7x5mm/'),
                  'img'      => vivaaz_get_img_url('ceylon-sapphire.jpg'),
                  'badge'    => 'MATCHED PAIR',
                  'badge_cl' => 'badge-green',
                  'id'       => 'cbs-3'
              ),
              array(
                  'title'    => 'Burmese Ruby Oval Cabochon',
                  'sub'      => '15×20 mm · 19 ct',
                  'price'    => '₹ 3,800',
                  'unit'     => '',
                  'url'      => home_url('/product/burmese-ruby-round-cabochon/'),
                  'img'      => vivaaz_get_img_url('ruby.jpg'),
                  'badge'    => 'ONLY 1',
                  'badge_cl' => 'badge-gold',
                  'id'       => 'ruby-4'
              ),
              array(
                  'title'    => 'Colombian Emerald Octagon',
                  'sub'      => '8×6 mm · 1.4 ct · step cut',
                  'price'    => '₹ 5,400',
                  'unit'     => '',
                  'url'      => home_url('/product/colombian-emerald-octagon/'),
                  'img'      => vivaaz_get_img_url('emerald.jpg'),
                  'badge'    => 'CALIBRATED LOT',
                  'badge_cl' => 'badge-green',
                  'id'       => 'em-5'
              ),
              array(
                  'title'    => 'Swiss Blue Topaz Oval Faceted',
                  'sub'      => '7×9 mm · AAA eye clean',
                  'price'    => '₹ 420',
                  'unit'     => ' per piece',
                  'url'      => home_url('/product/swiss-blue-topaz-oval/'),
                  'img'      => vivaaz_get_img_url('swiss-topaz.jpg'),
                  'badge'    => 'CALIBRATED LOT',
                  'badge_cl' => 'badge-blue',
                  'id'       => 'topaz-6'
              ),
          );
          ?>
          <div class="products-grid-3col" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
            <?php foreach ($showcase_stones as $st) : ?>
              <div class="product-card-luxury card" style="position: relative; background: var(--paper); border: 1px solid #EFE9E0; display: flex; flex-direction: column;">
                <div class="product-card-media ph" style="position: relative; aspect-ratio: 1/1; background: #F1F0EE; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                  <span class="category-card-badge <?php echo esc_attr($st['badge_cl']); ?>"><?php echo esc_html($st['badge']); ?></span>
                  
                  <!-- Wishlist Heart -->
                  <button type="button" class="wishlist-heart-btn" data-wishlist-id="<?php echo esc_attr($st['id']); ?>" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('<?php echo esc_js($st['id']); ?>', '<?php echo esc_js($st['title']); ?>', '<?php echo esc_url($st['img']); ?>', '<?php echo esc_js($st['price']); ?>', '<?php echo esc_url($st['url']); ?>', this);" title="Add to Wishlist" style="position: absolute; right: 12px; top: 12px; width: 34px; height: 34px; border-radius: 50%; background: var(--paper); border: 1px solid var(--line2); display: flex; align-items: center; justify-content: center; z-index: 4; cursor: pointer;">
                    <svg class="i" style="width: 16px; height: 16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg>
                  </button>

                  <a href="<?php echo esc_url($st['url']); ?>" style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%;">
                    <img src="<?php echo esc_url($st['img']); ?>" alt="<?php echo esc_attr($st['title']); ?>" style="width: 68%; object-fit: contain; transition: transform .3s;">
                  </a>

                  <!-- Quick View Button -->
                  <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView('<?php echo esc_js($st['title']); ?>', '<?php echo esc_js($st['price']); ?>', '<?php echo esc_url($st['img']); ?>', '<?php echo esc_url($st['url']); ?>');">QUICK VIEW</button>
                </div>

                <div class="product-card-body cb" style="padding: 16px 18px 18px; display: flex; flex-direction: column; gap: 4px; flex: 1;">
                  <h3 class="product-title-heading nm" style="font-family: var(--display); font-size: 16px; line-height: 1.25; margin: 0; font-weight: 400;">
                    <a href="<?php echo esc_url($st['url']); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html($st['title']); ?></a>
                  </h3>
                  <div class="product-meta-sub dt" style="font-size: 12px; color: var(--soft);"><?php echo esc_html($st['sub']); ?></div>
                  
                  <div class="product-price-row pr" style="margin-top: 6px; font-size: 15px; font-weight: 700; color: var(--ink);">
                    <span><?php echo esc_html($st['price']); ?></span>
                    <?php if ($st['unit']): ?>
                      <span style="font-size: 12px; font-weight: 400; color: var(--mute);"><?php echo esc_html($st['unit']); ?></span>
                    <?php endif; ?>
                  </div>

                  <div class="act" style="margin-top: auto; padding-top: 14px; display: flex; gap: 10px; align-items: center; justify-content: space-between;">
                    <button type="button" class="btn sm" onclick="event.preventDefault(); event.stopPropagation(); addProductToCartAndOpenDrawer(0, '<?php echo esc_js($st['title']); ?>', '<?php echo esc_url($st['img']); ?>', '<?php echo esc_js($st['price']); ?>', '6×8 mm', 10);" style="padding: 8px 14px; font-size: 11px; text-decoration: none; border-radius: 0; cursor: pointer;">
                      ADD TO CART
                    </button>
                    <a href="<?php echo esc_url($st['url']); ?>" class="ul" style="font-size: 11.5px; text-decoration: underline;">See stone →</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </main>

    </div>

  </div>

</div>

<!-- POINT 17 SPEC: MOBILE FILTER MODAL / DRAWER -->
<div id="vivaaz-filter-drawer-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 99998;" onclick="closeShopFilterDrawer()"></div>
<div id="vivaaz-filter-drawer" style="position: fixed; top: 0; left: -100%; width: 85%; max-width: 320px; height: 100%; background: #FFFFFF; z-index: 99999; box-shadow: 2px 0 16px rgba(0,0,0,0.2); transition: left 0.3s ease; overflow-y: auto; padding: 24px; box-sizing: border-box;">
  <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--color-border-light); padding-bottom: 14px; margin-bottom: 20px;">
    <h3 style="font-size: 14px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin: 0;">Filters</h3>
    <button type="button" onclick="closeShopFilterDrawer()" style="background: none; border: none; font-size: 20px; cursor: pointer; color: #1C1A17;">✕</button>
  </div>
  
  <div class="mobile-filter-drawer-content">
    <!-- Shape in drawer (Buttons) -->
    <div style="margin-bottom: 20px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 16px;">
      <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">Shape</h4>
      <div class="filter-buttons-wrap filter-shape-btns" style="display: flex; flex-wrap: wrap; gap: 6px;">
        <button type="button" class="filter-pill-btn active" onclick="selectFilterShape(this, 'Oval')">Oval</button>
        <button type="button" class="filter-pill-btn" onclick="selectFilterShape(this, 'Round')">Round</button>
        <button type="button" class="filter-pill-btn" onclick="selectFilterShape(this, 'Pear')">Pear</button>
        <button type="button" class="filter-pill-btn" onclick="selectFilterShape(this, 'Cushion')">Cushion</button>
        <button type="button" class="filter-pill-btn" onclick="selectFilterShape(this, 'Emerald')">Emerald</button>
        <button type="button" class="filter-pill-btn" onclick="selectFilterShape(this, 'Freeform')">Freeform</button>
      </div>
    </div>

    <!-- Size in drawer (Buttons, dependent on Shape) -->
    <div style="margin-bottom: 20px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 16px;">
      <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">Size (mm)</h4>
      <div class="filter-buttons-wrap filter-size-btns" id="mobile-filter-size-group" style="display: flex; flex-wrap: wrap; gap: 6px;">
        <button type="button" class="filter-pill-btn active" onclick="togglePillBtn(this)">6×8 mm</button>
        <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">8×10 mm</button>
        <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">10×12 mm</button>
        <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">12×16 mm</button>
        <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">15×20 mm</button>
      </div>
    </div>

    <!-- Quality in drawer (Buttons) -->
    <div style="margin-bottom: 20px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 16px;">
      <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">Quality</h4>
      <div class="filter-buttons-wrap" style="display: flex; flex-wrap: wrap; gap: 6px;">
        <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">AAA+ (Top)</button>
        <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">AAA (Fine)</button>
        <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">AA (Commercial)</button>
      </div>
    </div>

    <!-- Sold as in drawer (Buttons) -->
    <div style="margin-bottom: 20px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 16px;">
      <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">Sold As</h4>
      <div class="filter-buttons-wrap" style="display: flex; flex-wrap: wrap; gap: 6px;">
        <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">Single Piece</button>
        <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">Matching Pair</button>
        <button type="button" class="filter-pill-btn" onclick="togglePillBtn(this)">Lot / Pack</button>
      </div>
    </div>

    <!-- Price slider in drawer -->
    <div style="margin-bottom: 24px;">
      <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">Price Range</h4>
      <input type="range" min="100" max="50000" step="250" value="25000" style="width: 100%; accent-color: var(--color-gold-accent, #9C7C4C);" oninput="document.getElementById('mobile-price-val').textContent = 'Up to ₹' + Number(this.value).toLocaleString('en-IN');">
      <div style="display: flex; justify-content: space-between; font-size: 11px; color: var(--color-text-muted); margin-top: 6px;">
        <span>₹100</span>
        <span id="mobile-price-val" style="font-weight: 600; color: #1C1A17;">Up to ₹25,000</span>
        <span>₹50,000+</span>
      </div>
    </div>

    <button type="button" onclick="closeShopFilterDrawer()" style="width: 100%; padding: 12px; background: #1C1A17; color: #FFFFFF; border: none; font-size: 12px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; cursor: pointer;">
      Apply Filters
    </button>
  </div>
</div>

<script>
function selectFilterShape(btn, shapeName) {
  var wasActive = btn.classList.contains('active');
  var container = btn.closest('.filter-buttons-wrap');
  if (container) {
    var btns = container.querySelectorAll('.filter-pill-btn');
    btns.forEach(function(b) { b.classList.remove('active'); });
  }
  var sizeGroup = document.getElementById('filter-size-group');
  var mobileSizeGroup = document.getElementById('mobile-filter-size-group');
  var sizeHint = document.getElementById('size-hint-text');
  if (!wasActive) {
    btn.classList.add('active');
    if (sizeGroup) sizeGroup.style.display = 'flex';
    if (mobileSizeGroup) mobileSizeGroup.style.display = 'flex';
    if (sizeHint) sizeHint.style.display = 'none';
  } else {
    if (sizeGroup) sizeGroup.style.display = 'none';
    if (mobileSizeGroup) mobileSizeGroup.style.display = 'none';
    if (sizeHint) sizeHint.style.display = 'block';
  }
}

function togglePillBtn(btn) {
  btn.classList.toggle('active');
}

function openShopFilterDrawer() {
  var overlay = document.getElementById('vivaaz-filter-drawer-overlay');
  var drawer = document.getElementById('vivaaz-filter-drawer');
  if (overlay) overlay.style.display = 'block';
  if (drawer) drawer.style.left = '0';
  document.body.style.overflow = 'hidden';
}
function closeShopFilterDrawer() {
  var overlay = document.getElementById('vivaaz-filter-drawer-overlay');
  var drawer = document.getElementById('vivaaz-filter-drawer');
  if (overlay) overlay.style.display = 'none';
  if (drawer) drawer.style.left = '-100%';
  document.body.style.overflow = '';
}
</script>

<?php
get_footer('shop');
