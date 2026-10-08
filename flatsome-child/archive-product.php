<?php
/**
 * Vivaaz Gems - Custom WooCommerce Archive / Shop Page Template
 * Matches Page 10 of the 23-page Master Brief & Page 9 of Homepage Spec
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header('shop');
?>

<div class="shop-archive-page-wrapper">
  
  <div class="shop-archive-container">
    
    <!-- Shop Header Hero -->
    <div class="shop-header-hero">
      <div class="breadcrumb-trail">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> › 
        <span>Loose Gemstones</span>
      </div>
      <h1 class="shop-main-title"><?php woocommerce_page_title(); ?></h1>
      <p class="shop-description-sub">
        Natural, certified loose gemstones carefully selected from Jaipur and Sri Lanka. 
        <a href="https://wa.me/919680552270" target="_blank" class="text-gold" style="font-weight: 600; text-decoration: underline;">Get new stock on WhatsApp →</a>
      </p>

      <!-- Cut Pills (Faceted, Cabochon, Rose cut, Rough) -->
      <div class="cut-pills-row">
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'all')); ?>" class="cut-pill-item active">All <span>(18)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'faceted')); ?>" class="cut-pill-item">Faceted <span>(7)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'cabochon')); ?>" class="cut-pill-item">Cabochon <span>(8)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'rose-cut')); ?>" class="cut-pill-item">Rose cut <span>(2)</span></a>
        <a href="<?php echo esc_url(add_query_arg('filter_cut', 'rough')); ?>" class="cut-pill-item">Rough <span>(1)</span></a>
      </div>
    </div>

    <!-- Active Filter Badges Bar -->
    <div class="active-filter-badges-bar">
      <span class="active-badge">Cabochon ✕</span>
      <span class="active-badge">Oval ✕</span>
      <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="clear-all-link">Clear all</a>
      <span class="result-count-text">4 products · Sort: Size ▾</span>
    </div>

    <!-- Main Shop Layout Grid (Sidebar + Products) -->
    <div class="shop-layout-grid">
      
      <!-- LEFT FILTER SIDEBAR (CLIENT SPEC PAGE 10 & 11) -->
      <aside class="shop-filter-sidebar">
        
        <!-- Category Accordion -->
        <div class="filter-widget-box">
          <h4 class="filter-title">PRODUCT CATEGORY</h4>
          <ul class="filter-category-list">
            <li class="active"><a href="<?php echo esc_url(home_url('/shop/')); ?>">Loose Gemstones ⌃</a>
              <ul class="sub-cat-list">
                <li><a href="#">Precious ⌄</a></li>
                <li class="active"><a href="#">Semi-Precious ⌃</a>
                  <ul class="sub-sub-cat-list">
                    <li><a href="#">Faceted</a></li>
                    <li class="active"><a href="#">Cabochon</a></li>
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
        <div class="filter-widget-box">
          <h4 class="filter-title">Shape ⌃</h4>
          <div class="filter-checkbox-list">
            <label><input type="checkbox" checked /> Oval <span>(4)</span></label>
            <label><input type="checkbox" /> Round <span>(2)</span></label>
            <label><input type="checkbox" /> Pear <span>(1)</span></label>
            <label><input type="checkbox" /> Freeform <span>(1)</span></label>
          </div>
        </div>

        <!-- Filter by Size (mm) -->
        <div class="filter-widget-box">
          <h4 class="filter-title">Size (mm) ⌃</h4>
          <div class="filter-checkbox-list">
            <label><input type="checkbox" /> 6×8 mm <span>(1)</span></label>
            <label><input type="checkbox" /> 8×10 mm <span>(2)</span></label>
            <label><input type="checkbox" /> 10×12 mm <span>(1)</span></label>
            <label><input type="checkbox" /> 12×16 mm <span>(1)</span></label>
            <label><input type="checkbox" /> 15×20 mm <span>(1)</span></label>
            <label><input type="checkbox" /> 18×25 mm <span>(1)</span></label>
          </div>
        </div>

        <!-- Filter by Price -->
        <div class="filter-widget-box">
          <h4 class="filter-title">Price ⌃</h4>
          <div class="filter-checkbox-list">
            <label><input type="checkbox" /> Under ₹1,000</label>
            <label><input type="checkbox" /> ₹1,000 – ₹5,000</label>
            <label><input type="checkbox" /> ₹5,000 – ₹20,000</label>
            <label><input type="checkbox" /> Above ₹20,000</label>
          </div>
        </div>

      </aside>

      <!-- RIGHT PRODUCT GRID -->
      <main class="shop-products-main">
        <?php if (woocommerce_product_loop()) : ?>
          
          <div class="products-grid-3col">
            <?php
            while (have_posts()) :
              the_post();
              do_action('woocommerce_shop_loop');
              wc_get_template_part('content', 'product');
            endwhile;
            ?>
          </div>

          <?php do_action('woocommerce_after_shop_loop'); ?>

        <?php else : ?>
          
          <!-- Fallback Showcase Products matching Page 10 Spec -->
          <div class="products-grid-3col">
            
            <!-- Card 1 -->
            <div class="product-card-luxury">
              <div class="product-card-media">
                <span class="category-card-badge badge-gold">CALIBRATED · 10+ PIECES</span>
                <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon">
                <div class="quick-view-hover-bar">QUICK VIEW</div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading">Rainbow Moonstone Oval Cabochon</h3>
                <div class="product-meta-sub">6×8 to 12×16 mm · 4 sizes</div>
                <div class="product-price-row">
                  <div>
                    <span class="product-price-unit">from </span>
                    <span class="product-price-val">₹95</span>
                    <span class="product-price-unit"> per piece</span>
                  </div>
                </div>
                <div style="margin-top: 12px;">
                  <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-underline-link">SELECT OPTIONS</a>
                </div>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="product-card-luxury">
              <div class="product-card-media">
                <span class="category-card-badge badge-blue">ONLY 1</span>
                <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon" style="filter: hue-rotate(20deg);">
                <div class="quick-view-hover-bar">QUICK VIEW</div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading">Rainbow Moonstone Oval Cabochon</h3>
                <div class="product-meta-sub">18×25 mm · 32 ct · single</div>
                <div class="product-price-row">
                  <div>
                    <span class="product-price-val">₹4,800</span>
                  </div>
                </div>
                <div style="margin-top: 12px;">
                  <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-underline-link">ADD TO CART</a>
                </div>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="product-card-luxury">
              <div class="product-card-media">
                <span class="category-card-badge badge-green">MATCHED PAIR</span>
                <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon Pair">
                <div class="quick-view-hover-bar">QUICK VIEW</div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading">Rainbow Moonstone Oval Cabochon Pair</h3>
                <div class="product-meta-sub">8×10 mm · 2 pieces</div>
                <div class="product-price-row">
                  <div>
                    <span class="product-price-val">₹2,600</span>
                  </div>
                </div>
                <div style="margin-top: 12px;">
                  <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-underline-link">ADD TO CART</a>
                </div>
              </div>
            </div>

            <!-- Card 4 -->
            <div class="product-card-luxury">
              <div class="product-card-media">
                <span class="category-card-badge badge-gold">ONLY 1</span>
                <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Rainbow Moonstone Oval Cabochon">
                <div class="quick-view-hover-bar">QUICK VIEW</div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading">Rainbow Moonstone Oval Cabochon</h3>
                <div class="product-meta-sub">15×20 mm · 19 ct</div>
                <div class="product-price-row">
                  <div>
                    <span class="product-price-val">₹3,200</span>
                  </div>
                </div>
                <div style="margin-top: 12px;">
                  <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-underline-link">ADD TO CART</a>
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
