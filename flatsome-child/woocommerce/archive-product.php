<?php
/**
 * Vivaaz Gems - Custom WooCommerce Archive / Shop Page Template
 * Matches Page 10 of the 23-page Master Brief & Page 9 of Homepage Spec
 */

if (is_product() || is_singular('product')) {
    include locate_template('single-product.php');
    return;
}

get_header('shop');
?>

<div class="shop-archive-page-wrapper">
  
  <div class="shop-archive-container" style="max-width: 1200px; margin: 40px auto; padding: 0 20px;">
    
    <!-- Shop Header Hero -->
    <div class="shop-header-hero" style="margin-bottom: 30px;">
      <div class="breadcrumb-trail" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> › 
        <span>Loose Gemstones</span>
      </div>
      <h1 class="shop-main-title" style="font-family: var(--font-family-serif); font-size: 32px; font-weight: 400; margin-bottom: 8px;">
        <?php echo (function_exists('woocommerce_page_title') && is_callable('woocommerce_page_title')) ? woocommerce_page_title(false) : 'Loose Gemstones'; ?>
      </h1>
      <p class="shop-description-sub" style="font-size: 13px; color: var(--color-text-muted);">
        Natural, certified loose gemstones carefully selected from Jaipur and Sri Lanka. 
        <a href="https://wa.me/919680552270" target="_blank" class="text-gold" style="font-weight: 600; text-decoration: underline;">Get new stock on WhatsApp →</a>
      </p>

      <!-- Cut Pills (Faceted, Cabochon, Rose cut, Rough) -->
      <div class="cut-pills-row" style="display: flex; gap: 10px; margin-top: 20px; flex-wrap: wrap;">
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'all')); ?>" class="cut-pill-item active">All <span>(18)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'faceted')); ?>" class="cut-pill-item">Faceted <span>(7)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'cabochon')); ?>" class="cut-pill-item">Cabochon <span>(8)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'rose-cut')); ?>" class="cut-pill-item">Rose cut <span>(2)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'rough')); ?>" class="cut-pill-item">Rough <span>(1)</span></a>
      </div>
    </div>

    <!-- Active Filter Badges Bar -->
    <div class="active-filter-badges-bar" style="display: flex; align-items: center; gap: 12px; margin-bottom: 30px; font-size: 12px;">
      <span class="active-badge" style="background: var(--color-border-light); padding: 4px 10px; border-radius: 12px;">Cabochon ✕</span>
      <span class="active-badge" style="background: var(--color-border-light); padding: 4px 10px; border-radius: 12px;">Oval ✕</span>
      <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="clear-all-link" style="text-decoration: underline; color: var(--color-text-muted);">Clear all</a>
      <span class="result-count-text" style="margin-left: auto; color: var(--color-text-muted);">4 products · Sort: Size ▾</span>
    </div>

    <!-- Main Shop Layout Grid (Sidebar + Products) -->
    <div class="shop-layout-grid" style="display: grid; grid-template-columns: 260px 1fr; gap: 40px;">
      
      <!-- LEFT FILTER SIDEBAR (CLIENT SPEC PAGE 10 & 11) -->
      <aside class="shop-filter-sidebar">
        
        <!-- Category Accordion -->
        <div class="filter-widget-box" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 class="filter-title" style="font-size: 12px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px;">PRODUCT CATEGORY</h4>
          <ul class="filter-category-list" style="list-style: none; padding: 0; font-size: 13px; line-height: 1.8;">
            <li class="active"><a href="<?php echo esc_url(home_url('/shop/')); ?>" style="font-weight: 600;">Loose Gemstones ⌃</a>
              <ul class="sub-cat-list" style="list-style: none; padding-left: 14px; margin: 6px 0;">
                <li><a href="#">Precious ⌄</a></li>
                <li class="active"><a href="#" style="color: var(--color-gold-label); font-weight: 600;">Semi-Precious ⌃</a>
                  <ul class="sub-sub-cat-list" style="list-style: none; padding-left: 14px; margin: 4px 0;">
                    <li><a href="#">Faceted</a></li>
                    <li class="active"><a href="#" style="font-weight: 600;">Cabochon</a></li>
                    <li><a href="#">Rose cut</a></li>
                    <li><a href="#">Rough</a></li>
                  </ul>
                </li>
                <li><a href="#">Amethyst ⌄</a></li>
                <li><a href="#">Garnet ⌄</a></li>
              </ul>
            </li>
            <li><a href="<?php echo esc_url(home_url('/#layouts')); ?>">Layouts ⌄</a></li>
            <li><a href="<?php echo esc_url(home_url('/beads/')); ?>">Gemstone Beads ⌄</a></li>
            <li><a href="<?php echo esc_url(home_url('/tennis-jewelry/')); ?>">Jewelry ⌄</a></li>
            <li><a href="<?php echo esc_url(home_url('/astrology/')); ?>">Astrology ⌄</a></li>
          </ul>
        </div>

        <!-- Filter by Shape -->
        <div class="filter-widget-box" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 class="filter-title" style="font-size: 12px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px;">Shape ⌃</h4>
          <div class="filter-checkbox-list" style="display: flex; flex-direction: column; gap: 8px; font-size: 13px;">
            <label style="cursor: pointer;"><input type="checkbox" checked /> Oval <span style="color: var(--color-text-muted);">(4)</span></label>
            <label style="cursor: pointer;"><input type="checkbox" /> Round <span style="color: var(--color-text-muted);">(2)</span></label>
            <label style="cursor: pointer;"><input type="checkbox" /> Pear <span style="color: var(--color-text-muted);">(1)</span></label>
            <label style="cursor: pointer;"><input type="checkbox" /> Freeform <span style="color: var(--color-text-muted);">(1)</span></label>
          </div>
        </div>

        <!-- Filter by Size (mm) -->
        <div class="filter-widget-box" style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 class="filter-title" style="font-size: 12px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px;">Size (mm) ⌃</h4>
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
        <div class="filter-widget-box" style="margin-bottom: 24px;">
          <h4 class="filter-title" style="font-size: 12px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); margin-bottom: 12px;">Price ⌃</h4>
          <div class="filter-checkbox-list" style="display: flex; flex-direction: column; gap: 8px; font-size: 13px;">
            <label style="cursor: pointer;"><input type="checkbox" /> Under ₹1,000</label>
            <label style="cursor: pointer;"><input type="checkbox" /> ₹1,000 – ₹5,000</label>
            <label style="cursor: pointer;"><input type="checkbox" /> ₹5,000 – ₹20,000</label>
            <label style="cursor: pointer;"><input type="checkbox" /> Above ₹20,000</label>
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
                <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="display: block; width: 100%; height: 100%;">
                  <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon">
                </a>
                <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading">
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
                <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="display: block; width: 100%; height: 100%;">
                  <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon" style="filter: hue-rotate(20deg);">
                </a>
                <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading">
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
                <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="display: block; width: 100%; height: 100%;">
                  <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon Pair">
                </a>
                <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading">
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
                <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="display: block; width: 100%; height: 100%;">
                  <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon">
                </a>
                <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading">
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

<?php
get_footer('shop');
