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
    <div class="shop-header-hero" style="margin-bottom: 24px;">
      <div class="breadcrumb-trail" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> › 
        <span>Loose Gemstones</span>
      </div>
      <h1 class="shop-main-title" style="font-family: var(--font-family-serif); font-size: 32px; font-weight: 400; margin-bottom: 8px;">
        <?php echo (function_exists('woocommerce_page_title') && is_callable('woocommerce_page_title')) ? woocommerce_page_title(false) : 'Loose Gemstones'; ?>
      </h1>
      <p class="shop-description-sub" style="font-size: 13px; color: var(--color-text-muted); margin-bottom: 16px;">
        Natural, calibrated and single loose gemstones cut in Jaipur. Direct from the cutters.
        <a href="https://wa.me/919680552270" target="_blank" class="text-gold" style="font-weight: 600; text-decoration: underline; margin-left: 6px;">Get new stock on WhatsApp →</a>
      </p>

      <!-- POINT 7 SPEC: Cut Buttons at Top (All · Cabochon · Faceted · Rose cut) -->
      <div class="cut-pills-row" style="display: flex; gap: 8px; margin-bottom: 14px; flex-wrap: wrap;">
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'all')); ?>" class="cut-pill-item active" style="padding: 7px 16px; font-size: 12px; font-weight: 600; border: 1px solid #1C1A17; background: #1C1A17; color: #FFFFFF; text-decoration: none;">All <span>(18)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'cabochon')); ?>" class="cut-pill-item" style="padding: 7px 16px; font-size: 12px; font-weight: 600; border: 1px solid var(--color-border-light); background: #FFFFFF; color: var(--color-text-main); text-decoration: none;">Cabochon <span>(8)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'faceted')); ?>" class="cut-pill-item" style="padding: 7px 16px; font-size: 12px; font-weight: 600; border: 1px solid var(--color-border-light); background: #FFFFFF; color: var(--color-text-main); text-decoration: none;">Faceted <span>(7)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'rose-cut')); ?>" class="cut-pill-item" style="padding: 7px 16px; font-size: 12px; font-weight: 600; border: 1px solid var(--color-border-light); background: #FFFFFF; color: var(--color-text-main); text-decoration: none;">Rose cut <span>(3)</span></a>
      </div>

      <!-- POINT 17 SPEC (PHONE & DESKTOP): Stones Quick Filter Row (Stones first) -->
      <div class="stones-quick-row-wrap" style="position: relative; overflow-x: auto; -webkit-overflow-scrolling: touch; padding-bottom: 8px; margin-bottom: 20px; white-space: nowrap;">
        <div class="stones-chips-bar" style="display: inline-flex; gap: 8px; font-size: 12px;">
          <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="stone-chip active" style="padding: 6px 12px; background: #FAF7F2; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none; font-weight: 600;">All stones</a>
          <a href="<?php echo esc_url(add_query_arg('stone', 'moonstone')); ?>" class="stone-chip" style="padding: 6px 12px; background: #FFFFFF; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none;">Rainbow Moonstone</a>
          <a href="<?php echo esc_url(add_query_arg('stone', 'sapphire')); ?>" class="stone-chip" style="padding: 6px 12px; background: #FFFFFF; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none;">Sapphire</a>
          <a href="<?php echo esc_url(add_query_arg('stone', 'ruby')); ?>" class="stone-chip" style="padding: 6px 12px; background: #FFFFFF; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none;">Ruby</a>
          <a href="<?php echo esc_url(add_query_arg('stone', 'emerald')); ?>" class="stone-chip" style="padding: 6px 12px; background: #FFFFFF; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none;">Emerald</a>
          <a href="<?php echo esc_url(add_query_arg('stone', 'amethyst')); ?>" class="stone-chip" style="padding: 6px 12px; background: #FFFFFF; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none;">Amethyst</a>
          <a href="<?php echo esc_url(add_query_arg('stone', 'aquamarine')); ?>" class="stone-chip" style="padding: 6px 12px; background: #FFFFFF; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none;">Aquamarine</a>
          <a href="<?php echo esc_url(add_query_arg('stone', 'citrine')); ?>" class="stone-chip" style="padding: 6px 12px; background: #FFFFFF; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none;">Citrine</a>
          <a href="<?php echo esc_url(add_query_arg('stone', 'garnet')); ?>" class="stone-chip" style="padding: 6px 12px; background: #FFFFFF; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none;">Garnet</a>
          <a href="<?php echo esc_url(add_query_arg('stone', 'opal')); ?>" class="stone-chip" style="padding: 6px 12px; background: #FFFFFF; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none;">Opal</a>
          <a href="<?php echo esc_url(add_query_arg('stone', 'peridot')); ?>" class="stone-chip" style="padding: 6px 12px; background: #FFFFFF; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none;">Peridot</a>
          <a href="<?php echo esc_url(add_query_arg('stone', 'tanzanite')); ?>" class="stone-chip" style="padding: 6px 12px; background: #FFFFFF; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none;">Tanzanite</a>
          <a href="<?php echo esc_url(add_query_arg('stone', 'topaz')); ?>" class="stone-chip" style="padding: 6px 12px; background: #FFFFFF; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none;">Topaz</a>
          <a href="<?php echo esc_url(add_query_arg('stone', 'tourmaline')); ?>" class="stone-chip" style="padding: 6px 12px; background: #FFFFFF; border: 1px solid var(--color-border-light); color: var(--color-text-main); text-decoration: none;">Tourmaline</a>
        </div>
      </div>
    </div>

    <!-- Active Filter Badges Bar + Mobile Filter Trigger (Point 17) -->
    <div class="shop-filter-bar-header" style="display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 24px; padding-bottom: 14px; border-bottom: 1px solid var(--color-border-light); font-size: 12px;">
      
      <!-- Mobile Filter Button (Point 17: filters behind a [Filter] button modal on phone) -->
      <div class="mobile-filter-btn-wrap" style="display: none;">
        <button type="button" class="btn-mobile-filter-trigger" onclick="openShopFilterDrawer()" style="background: #FFFFFF; border: 1px solid #1C1A17; color: #1C1A17; padding: 8px 16px; font-size: 12px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; display: inline-flex; align-items: center; gap: 6px; cursor: pointer;">
          <span>⚙</span> FILTERS
        </button>
      </div>

      <div class="active-badges-flex" style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
        <span class="active-badge" style="background: var(--color-border-light); padding: 4px 10px; font-size: 11px;">Cabochon ✕</span>
        <span class="active-badge" style="background: var(--color-border-light); padding: 4px 10px; font-size: 11px;">Oval ✕</span>
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="clear-all-link" style="text-decoration: underline; color: var(--color-text-muted); font-size: 11px;">Clear all</a>
      </div>

      <div class="result-count-sort-flex" style="display: flex; align-items: center; gap: 14px; margin-left: auto;">
        <span class="result-count-text" style="color: var(--color-text-muted); font-size: 12px;">4 products</span>
        <select class="shop-sort-select" style="font-size: 12px; border: 1px solid var(--color-border-light); background: #FFFFFF; padding: 4px 8px; cursor: pointer;">
          <option>Sort: Size (small to large)</option>
          <option>Sort: Price (low to high)</option>
          <option>Sort: Price (high to low)</option>
          <option>Sort: Newest</option>
        </select>
      </div>
    </div>

    <!-- Main Shop Layout Grid (Sidebar + Products) -->
    <div class="shop-layout-grid" style="display: grid; grid-template-columns: 240px 1fr; gap: 36px;">
      
      <!-- LEFT FILTER SIDEBAR (POINT 7 SPEC: Clean stones hierarchy, NO CUTS in list) -->
      <aside class="shop-filter-sidebar" id="desktop-shop-sidebar">
        
        <!-- Category Accordion (Point 7: Loose gemstones → Precious / Semi-precious → stones, NO CUTS) -->
        <div class="filter-widget-box" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 class="filter-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px; text-transform: uppercase;">PRODUCT CATEGORY</h4>
          
          <ul class="filter-category-list" style="list-style: none; padding: 0; font-size: 13px; line-height: 1.8;">
            <li class="active">
              <a href="<?php echo esc_url(home_url('/shop/')); ?>" style="font-weight: 700; color: #1C1A17; text-decoration: none;">Loose Gemstones ⌃</a>
              
              <!-- Sub-group: Precious -->
              <div style="padding-left: 12px; margin-top: 6px;">
                <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.05em; color: var(--color-text-muted); text-transform: uppercase;">PREVIOUS / PRECIOUS</span>
                <ul class="sub-stone-list" style="list-style: none; padding-left: 8px; margin: 4px 0 10px;">
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Ruby (12)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Sapphire (18)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Emerald (15)</a></li>
                </ul>
              </div>

              <!-- Sub-group: Semi-Precious (Point 7: clean stones list, no cuts!) -->
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
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=tanzanite')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Tanzanite (8)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=topaz')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Topaz (11)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=tourmaline')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Tourmaline (15)</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=turquoise')); ?>" style="color: var(--color-text-main); text-decoration: none; font-size: 12px;">Turquoise (5)</a></li>
                </ul>
              </div>
            </li>
            
            <li style="margin-top: 8px;"><a href="<?php echo esc_url(home_url('/#layouts')); ?>" style="color: var(--color-text-main); text-decoration: none;">Layouts ⌄</a></li>
            <li><a href="<?php echo esc_url(home_url('/beads/')); ?>" style="color: var(--color-text-main); text-decoration: none;">Gemstone Beads ⌄</a></li>
            <li><a href="<?php echo esc_url(home_url('/tennis-jewelry/')); ?>" style="color: var(--color-text-main); text-decoration: none;">Jewelry ⌄</a></li>
            <li><a href="<?php echo esc_url(home_url('/astrology/')); ?>" style="color: var(--color-text-main); text-decoration: none;">Astrology ⌄</a></li>
          </ul>
        </div>

        <!-- Filter by Shape -->
        <div class="filter-widget-box" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 class="filter-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px; text-transform: uppercase;">Shape ⌃</h4>
          <div class="filter-checkbox-list" style="display: flex; flex-direction: column; gap: 8px; font-size: 13px;">
            <label style="cursor: pointer;"><input type="checkbox" checked /> Oval <span style="color: var(--color-text-muted);">(4)</span></label>
            <label style="cursor: pointer;"><input type="checkbox" /> Round <span style="color: var(--color-text-muted);">(2)</span></label>
            <label style="cursor: pointer;"><input type="checkbox" /> Pear <span style="color: var(--color-text-muted);">(1)</span></label>
            <label style="cursor: pointer;"><input type="checkbox" /> Cushion <span style="color: var(--color-text-muted);">(2)</span></label>
            <label style="cursor: pointer;"><input type="checkbox" /> Freeform <span style="color: var(--color-text-muted);">(1)</span></label>
          </div>
        </div>

        <!-- Filter by Size (mm) -->
        <div class="filter-widget-box" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 class="filter-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px; text-transform: uppercase;">Size (mm) ⌃</h4>
          <div class="filter-checkbox-list" style="display: flex; flex-direction: column; gap: 8px; font-size: 13px;">
            <label style="cursor: pointer;"><input type="checkbox" /> 6×8 mm <span style="color: var(--color-text-muted);">(1)</span></label>
            <label style="cursor: pointer;"><input type="checkbox" /> 8×10 mm <span style="color: var(--color-text-muted);">(2)</span></label>
            <label style="cursor: pointer;"><input type="checkbox" /> 10×12 mm <span style="color: var(--color-text-muted);">(1)</span></label>
            <label style="cursor: pointer;"><input type="checkbox" /> 12×16 mm <span style="color: var(--color-text-muted);">(1)</span></label>
            <label style="cursor: pointer;"><input type="checkbox" /> 15×20 mm <span style="color: var(--color-text-muted);">(1)</span></label>
            <label style="cursor: pointer;"><input type="checkbox" /> 18×25 mm <span style="color: var(--color-text-muted);">(1)</span></label>
          </div>
        </div>

        <!-- Filter by Price -->
        <div class="filter-widget-box" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 class="filter-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px; text-transform: uppercase;">Price ⌃</h4>
          <div class="filter-checkbox-list" style="display: flex; flex-direction: column; gap: 8px; font-size: 13px;">
            <label style="cursor: pointer;"><input type="checkbox" /> Under ₹1,000</label>
            <label style="cursor: pointer;"><input type="checkbox" /> ₹1,000 – ₹5,000</label>
            <label style="cursor: pointer;"><input type="checkbox" /> ₹5,000 – ₹20,000</label>
            <label style="cursor: pointer;"><input type="checkbox" /> Above ₹20,000</label>
          </div>
        </div>

        <!-- Filter by Treatment -->
        <div class="filter-widget-box" style="margin-bottom: 24px;">
          <h4 class="filter-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px; text-transform: uppercase;">Treatment ⌃</h4>
          <div class="filter-checkbox-list" style="display: flex; flex-direction: column; gap: 8px; font-size: 13px;">
            <label style="cursor: pointer;"><input type="checkbox" /> Untreated / Natural only</label>
            <label style="cursor: pointer;"><input type="checkbox" /> Heated only</label>
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
          <?php $sample_prod_url = function_exists('vivaaz_get_sample_product_url') ? vivaaz_get_sample_product_url() : home_url('/product/ceylon-blue-sapphire-7x5mm/'); ?>
          <div class="products-grid-3col" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
            
            <!-- Card 1 -->
            <div class="product-card-luxury">
              <div class="product-card-media">
                <span class="category-card-badge badge-gold">CALIBRATED · 10+ PIECES</span>
                <button type="button" class="wishlist-heart-btn" data-wishlist-id="rmcoc-1" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('rmcoc-1', 'Rainbow Moonstone Oval Cabochon', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '₹95', '<?php echo esc_url($sample_prod_url); ?>', this);" title="Add to Wishlist">♡</button>
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="display: block; width: 100%; height: 100%;">
                  <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon">
                </a>
                <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading" style="font-size: 13px;">
                  <a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">Rainbow Moonstone Oval Cabochon</a>
                </h3>
                <div class="product-meta-sub">6×8 to 12×16 mm · 4 sizes</div>
                <div class="product-price-row">
                  <div>
                    <span class="product-price-unit">from </span>
                    <span class="product-price-val">₹95</span>
                    <span class="product-price-unit"> per piece</span>
                  </div>
                </div>
                <div style="margin-top: 12px;">
                  <a href="<?php echo esc_url($sample_prod_url); ?>" class="btn-underline-link">SELECT OPTIONS</a>
                </div>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="product-card-luxury">
              <div class="product-card-media">
                <span class="category-card-badge badge-blue">ONLY 1</span>
                <button type="button" class="wishlist-heart-btn" data-wishlist-id="rmcoc-2" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('rmcoc-2', 'Rainbow Moonstone Oval Cabochon 18×25mm', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '₹4,800', '<?php echo esc_url($sample_prod_url); ?>', this);" title="Add to Wishlist">♡</button>
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="display: block; width: 100%; height: 100%;">
                  <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon" style="filter: hue-rotate(20deg);">
                </a>
                <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading" style="font-size: 13px;">
                  <a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">Rainbow Moonstone Oval Cabochon</a>
                </h3>
                <div class="product-meta-sub">18×25 mm · 32 ct · single</div>
                <div class="product-price-row">
                  <div>
                    <span class="product-price-val">₹4,800</span>
                  </div>
                </div>
                <div style="margin-top: 12px;">
                  <a href="<?php echo esc_url($sample_prod_url); ?>" class="btn-underline-link">VIEW DETAILS</a>
                </div>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="product-card-luxury">
              <div class="product-card-media">
                <span class="category-card-badge badge-green">MATCHED PAIR</span>
                <button type="button" class="wishlist-heart-btn" data-wishlist-id="rmcoc-3" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('rmcoc-3', 'Ceylon Sapphire Oval Pair', '<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>', '₹2,600', '<?php echo esc_url($sample_prod_url); ?>', this);" title="Add to Wishlist">♡</button>
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="display: block; width: 100%; height: 100%;">
                  <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon Pair">
                </a>
                <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading" style="font-size: 13px;">
                  <a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">Rainbow Moonstone Oval Cabochon Pair</a>
                </h3>
                <div class="product-meta-sub">8×10 mm · 2 pieces</div>
                <div class="product-price-row">
                  <div>
                    <span class="product-price-val">₹2,600</span>
                  </div>
                </div>
                <div style="margin-top: 12px;">
                  <a href="<?php echo esc_url($sample_prod_url); ?>" class="btn-underline-link">VIEW DETAILS</a>
                </div>
              </div>
            </div>

            <!-- Card 4 -->
            <div class="product-card-luxury">
              <div class="product-card-media">
                <span class="category-card-badge badge-gold">ONLY 1</span>
                <button type="button" class="wishlist-heart-btn" data-wishlist-id="rmcoc-4" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('rmcoc-4', 'Ruby Oval Cabochon', '<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>', '₹3,200', '<?php echo esc_url($sample_prod_url); ?>', this);" title="Add to Wishlist">♡</button>
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="display: block; width: 100%; height: 100%;">
                  <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon">
                </a>
                <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading" style="font-size: 13px;">
                  <a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">Rainbow Moonstone Oval Cabochon</a>
                </h3>
                <div class="product-meta-sub">15×20 mm · 19 ct</div>
                <div class="product-price-row">
                  <div>
                    <span class="product-price-val">₹3,200</span>
                  </div>
                </div>
                <div style="margin-top: 12px;">
                  <a href="<?php echo esc_url($sample_prod_url); ?>" class="btn-underline-link">VIEW DETAILS</a>
                </div>
              </div>
            </div>

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
    <!-- Shape in drawer -->
    <div style="margin-bottom: 20px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 16px;">
      <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">Shape</h4>
      <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13px;">
        <label><input type="checkbox" checked /> Oval (4)</label>
        <label><input type="checkbox" /> Round (2)</label>
        <label><input type="checkbox" /> Pear (1)</label>
        <label><input type="checkbox" /> Cushion (2)</label>
        <label><input type="checkbox" /> Freeform (1)</label>
      </div>
    </div>

    <!-- Size in drawer -->
    <div style="margin-bottom: 20px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 16px;">
      <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">Size</h4>
      <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13px;">
        <label><input type="checkbox" /> 6×8 mm (1)</label>
        <label><input type="checkbox" /> 8×10 mm (2)</label>
        <label><input type="checkbox" /> 10×12 mm (1)</label>
        <label><input type="checkbox" /> 12×16 mm (1)</label>
        <label><input type="checkbox" /> 15×20 mm (1)</label>
      </div>
    </div>

    <!-- Price in drawer -->
    <div style="margin-bottom: 24px;">
      <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">Price</h4>
      <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13px;">
        <label><input type="checkbox" /> Under ₹1,000</label>
        <label><input type="checkbox" /> ₹1,000 – ₹5,000</label>
        <label><input type="checkbox" /> Above ₹5,000</label>
      </div>
    </div>

    <button type="button" onclick="closeShopFilterDrawer()" style="width: 100%; padding: 12px; background: #1C1A17; color: #FFFFFF; border: none; font-size: 12px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; cursor: pointer;">
      Apply Filters
    </button>
  </div>
</div>

<script>
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
