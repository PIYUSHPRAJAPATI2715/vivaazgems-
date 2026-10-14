<?php
/**
 * Template Name: Gemstone Beads Page
 * Vivaaz Gems - Gemstone Beads Catalog & Guide
 * Matches Client PDF Point 11: Shape tiles at top, bead list and filters on the left, strands grid on the right.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 40px 20px 80px; min-height: 80vh;">
  <div class="container" style="max-width: 1240px; margin: 0 auto;">
    
    <!-- Hero Header -->
    <div style="text-align: center; margin-bottom: 30px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">BEAD COLLECTION</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 34px; font-weight: 400; margin: 8px 0 12px; color: #1C1A17;">Gemstone beads</h1>
      <p style="font-size: 14px; color: #4A4640; max-width: 760px; margin: 0 auto; line-height: 1.7;">
        Natural gemstone beads, by the strand or as loose pieces, drilled and matched in Jaipur. Choose by stone, then shape and size. Every strand shows its length, about how many beads it holds and the hole size.
      </p>
    </div>

    <!-- POINT 11 SPEC: SHAPE TILES AT TOP -->
    <div style="margin-bottom: 40px;">
      <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 14px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 8px;">
        <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">BEADS BY SHAPE</span>
        <span style="font-size: 11px; color: var(--color-text-muted);">Calibrated drilling from Jaipur</span>
      </div>

      <div class="bead-shapes-tiles-grid" style="display: grid; grid-template-columns: repeat(8, 1fr); gap: 10px; text-align: center;">
        <?php
        $bead_shapes = array(
          array('name' => 'Round', 'icon' => '●'),
          array('name' => 'Faceted rondelle', 'icon' => '◈'),
          array('name' => 'Plain rondelle', 'icon' => '⬭'),
          array('name' => 'Oval', 'icon' => '⬭'),
          array('name' => 'Heishi', 'icon' => '▬'),
          array('name' => 'Cube', 'icon' => '■'),
          array('name' => 'Drop', 'icon' => '▲'),
          array('name' => 'Nugget', 'icon' => '◆')
        );
        foreach ($bead_shapes as $shape_item) :
        ?>
        <a href="<?php echo esc_url(home_url('/shop/?category=beads&shape=' . sanitize_title($shape_item['name']))); ?>" style="display: block; background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 18px 8px; text-decoration: none; color: #1C1A17; transition: all 0.2s ease;">
          <div style="font-size: 20px; color: #9C7C4C; margin-bottom: 6px;"><?php echo esc_html($shape_item['icon']); ?></div>
          <div style="font-size: 11px; font-weight: 700; text-transform: uppercase;"><?php echo esc_html($shape_item['name']); ?></div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- POINT 11 SPEC: MAIN 2-COLUMN LAYOUT (Bead list & filters on left, strands grid on right) -->
    <div class="beads-catalog-grid" style="display: grid; grid-template-columns: 260px 1fr; gap: 36px; align-items: start;">
      
      <!-- LEFT COLUMN: BEAD LIST AND FILTERS -->
      <aside class="beads-sidebar" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 24px;">
        
        <!-- 1. Bead Stones List -->
        <div style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin: 0 0 12px;">BEADS BY STONE</h4>
          <ul style="list-style: none; padding: 0; margin: 0; font-size: 13px; line-height: 2;">
            <li><a href="<?php echo esc_url(home_url('/shop/?category=beads&stone=moonstone')); ?>" style="color: #9C7C4C; font-weight: 700; text-decoration: none;">Rainbow Moonstone (14)</a></li>
            <li><a href="<?php echo esc_url(home_url('/shop/?category=beads&stone=sapphire')); ?>" style="color: #1C1A17; text-decoration: none;">Sapphire (9)</a></li>
            <li><a href="<?php echo esc_url(home_url('/shop/?category=beads&stone=ruby')); ?>" style="color: #1C1A17; text-decoration: none;">Ruby (8)</a></li>
            <li><a href="<?php echo esc_url(home_url('/shop/?category=beads&stone=emerald')); ?>" style="color: #1C1A17; text-decoration: none;">Emerald (11)</a></li>
            <li><a href="<?php echo esc_url(home_url('/shop/?category=beads&stone=amethyst')); ?>" style="color: #1C1A17; text-decoration: none;">Amethyst (16)</a></li>
            <li><a href="<?php echo esc_url(home_url('/shop/?category=beads&stone=aquamarine')); ?>" style="color: #1C1A17; text-decoration: none;">Aquamarine (7)</a></li>
            <li><a href="<?php echo esc_url(home_url('/shop/?category=beads&stone=citrine')); ?>" style="color: #1C1A17; text-decoration: none;">Citrine (12)</a></li>
            <li><a href="<?php echo esc_url(home_url('/shop/?category=beads&stone=garnet')); ?>" style="color: #1C1A17; text-decoration: none;">Garnet (10)</a></li>
            <li><a href="<?php echo esc_url(home_url('/shop/?category=beads&stone=labradorite')); ?>" style="color: #1C1A17; text-decoration: none;">Labradorite (8)</a></li>
            <li><a href="<?php echo esc_url(home_url('/shop/?category=beads&stone=opal')); ?>" style="color: #1C1A17; text-decoration: none;">Ethiopian Opal (6)</a></li>
            <li><a href="<?php echo esc_url(home_url('/shop/?category=beads&stone=tourmaline')); ?>" style="color: #1C1A17; text-decoration: none;">Tourmaline (15)</a></li>
          </ul>
        </div>

        <!-- 2. Filter by Sold by (Point 5 Spec) -->
        <div style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin: 0 0 10px;">SOLD BY <span style="font-size: 11px; color: var(--color-text-muted); float: right;">▾</span></h4>
          <div class="filter-buttons-wrap" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn active" onclick="this.classList.toggle('active')">Full Strand (15-16")</button>
            <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">Half Strand (8")</button>
            <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">By Weight / Gram</button>
            <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">Loose Beads (Lot)</button>
          </div>
        </div>

        <!-- 3. Filter by Quality (Point 5 Spec) -->
        <div style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin: 0 0 10px;">QUALITY <span style="font-size: 11px; color: var(--color-text-muted); float: right;">▾</span></h4>
          <div class="filter-buttons-wrap" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn active" onclick="this.classList.toggle('active')">AAA+ (Top Gem)</button>
            <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">AAA (Fine)</button>
            <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">AA (Commercial)</button>
            <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">Natural Untreated</button>
          </div>
        </div>

        <!-- 4. Filter by Price (Point 5 Spec) -->
        <div style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin: 0 0 10px;">PRICE RANGE <span style="font-size: 11px; color: var(--color-text-muted); float: right;">▾</span></h4>
          <div style="padding: 4px 0;">
            <input type="range" min="300" max="25000" step="200" value="10000" id="beads-price-slider" style="width: 100%; accent-color: var(--color-gold-accent, #9C7C4C); cursor: pointer;" oninput="document.getElementById('beads-price-display').textContent = 'Up to ₹' + Number(this.value).toLocaleString('en-IN');">
            <div style="display: flex; justify-content: space-between; font-size: 11px; color: var(--color-text-muted); margin-top: 6px;">
              <span>₹300</span>
              <span id="beads-price-display" style="font-weight: 600; color: #1C1A17;">Up to ₹10,000</span>
              <span>₹25,000+</span>
            </div>
          </div>
        </div>

        <!-- 5. Filter by Strand Length -->
        <div style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin: 0 0 10px;">STRAND LENGTH <span style="font-size: 11px; color: var(--color-text-muted); float: right;">▾</span></h4>
          <div class="filter-buttons-wrap" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">13 inches</button>
            <button type="button" class="filter-pill-btn active" onclick="this.classList.toggle('active')">15–16 inches</button>
            <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">18 inches</button>
          </div>
        </div>

        <!-- 6. Filter by Bead Size -->
        <div style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--color-border-light);">
          <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin: 0 0 10px;">BEAD SIZE (MM) <span style="font-size: 11px; color: var(--color-text-muted); float: right;">▾</span></h4>
          <div class="filter-buttons-wrap" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">2 to 3 mm</button>
            <button type="button" class="filter-pill-btn active" onclick="this.classList.toggle('active')">3 to 4 mm</button>
            <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">4 to 5 mm</button>
            <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">6 to 8 mm</button>
          </div>
        </div>

        <!-- 7. Filter by Hole Size -->
        <div style="margin-bottom: 24px;">
          <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin: 0 0 10px;">HOLE SIZE <span style="font-size: 11px; color: var(--color-text-muted); float: right;">▾</span></h4>
          <div class="filter-buttons-wrap" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn active" onclick="this.classList.toggle('active')">0.4 – 0.5 mm standard</button>
            <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">0.8 mm thick</button>
          </div>
        </div>

      </aside>

      <!-- RIGHT COLUMN: STRANDS GRID (POINT 11 & POINT 25 SPEC: STRANDS FIRST ON PHONE) -->
      <main class="beads-strands-main">
        
        <!-- Point 25: Mobile Filter Trigger Bar (Filters behind a button) -->
        <div class="beads-mobile-filter-bar" style="display: none; justify-content: space-between; align-items: center; margin-bottom: 16px; background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 8px 14px;">
          <button type="button" class="btn-mobile-filter-trigger" onclick="openBeadsFilterDrawer()" style="background: none; border: none; font-size: 12px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; color: #1C1A17; display: inline-flex; align-items: center; gap: 6px; cursor: pointer;">
            <span>⚡</span> FILTER · SORT ▾
          </button>
          <span style="font-size: 11px; color: var(--color-text-muted);">6 strands</span>
        </div>

        <div class="beads-desktop-sort-bar" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--color-border-light);">
          <div style="font-size: 13px; color: var(--color-text-muted);">
            Showing <strong style="color: #1C1A17;">6 matched strands</strong> · Ready to dispatch
          </div>
          <select style="font-size: 12px; border: 1px solid var(--color-border-light); background: #FFFFFF; padding: 6px 12px; cursor: pointer;">
            <option>Sort: Best sellers</option>
            <option>Sort: Price (low to high)</option>
            <option>Sort: Price (high to low)</option>
            <option>Sort: Bead size</option>
          </select>
        </div>

        <?php $sample_prod_url = function_exists('vivaaz_get_sample_product_url') ? vivaaz_get_sample_product_url() : home_url('/product/ceylon-blue-sapphire-7x5mm/'); ?>
        <div class="strands-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
          
          <!-- Strand Card 1 -->
          <div class="product-card-luxury">
            <div class="product-card-media">
              <span class="category-card-badge badge-gold">16" STRAND · AAA</span>
              <button type="button" class="wishlist-heart-btn" data-wishlist-id="bd-1" onclick="toggleProductWishlist('bd-1', 'Rainbow Moonstone Plain Rondelle Strand', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '₹1,450', '<?php echo esc_url($sample_prod_url); ?>', this);">♡</button>
              <a href="<?php echo esc_url($sample_prod_url); ?>">
                <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Strand">
              </a>
              <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
            </div>
            <div class="product-card-body">
              <h3 class="product-title-heading" style="font-size: 13px;">
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">Rainbow Moonstone Plain Rondelle Strand</a>
              </h3>
              <div class="product-meta-sub">6–7 mm · 16" strand · ≈75 beads · 0.5 mm hole</div>
              <div class="product-price-row">
                <span class="product-price-val">₹1,450</span>
                <span class="product-price-unit"> per strand</span>
              </div>
              <div style="margin-top: 10px;">
                <a href="<?php echo esc_url($sample_prod_url); ?>" class="btn-underline-link">SELECT STRAND</a>
              </div>
            </div>
          </div>

          <!-- Strand Card 2 -->
          <div class="product-card-luxury">
            <div class="product-card-media">
              <span class="category-card-badge badge-blue">15" STRAND · VIVID</span>
              <button type="button" class="wishlist-heart-btn" data-wishlist-id="bd-2" onclick="toggleProductWishlist('bd-2', 'Ceylon Sapphire Faceted Rondelle Strand', '<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>', '₹3,800', '<?php echo esc_url($sample_prod_url); ?>', this);">♡</button>
              <a href="<?php echo esc_url($sample_prod_url); ?>">
                <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Ceylon Sapphire Faceted Strand">
              </a>
              <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
            </div>
            <div class="product-card-body">
              <h3 class="product-title-heading" style="font-size: 13px;">
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">Ceylon Sapphire Faceted Rondelle Strand</a>
              </h3>
              <div class="product-meta-sub">3–4 mm · 15" strand · ≈110 beads · 0.4 mm hole</div>
              <div class="product-price-row">
                <span class="product-price-val">₹3,800</span>
                <span class="product-price-unit"> per strand</span>
              </div>
              <div style="margin-top: 10px;">
                <a href="<?php echo esc_url($sample_prod_url); ?>" class="btn-underline-link">SELECT STRAND</a>
              </div>
            </div>
          </div>

          <!-- Strand Card 3 -->
          <div class="product-card-luxury">
            <div class="product-card-media">
              <span class="category-card-badge badge-green">16" STRAND · NATURAL</span>
              <button type="button" class="wishlist-heart-btn" data-wishlist-id="bd-3" onclick="toggleProductWishlist('bd-3', 'Zambian Emerald Smooth Round Strand', '<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>', '₹4,200', '<?php echo esc_url($sample_prod_url); ?>', this);">♡</button>
              <a href="<?php echo esc_url($sample_prod_url); ?>">
                <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Zambian Emerald Smooth Strand">
              </a>
              <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
            </div>
            <div class="product-card-body">
              <h3 class="product-title-heading" style="font-size: 13px;">
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">Zambian Emerald Smooth Round Strand</a>
              </h3>
              <div class="product-meta-sub">4 mm · 16" strand · ≈95 beads · 0.5 mm hole</div>
              <div class="product-price-row">
                <span class="product-price-val">₹4,200</span>
                <span class="product-price-unit"> per strand</span>
              </div>
              <div style="margin-top: 10px;">
                <a href="<?php echo esc_url($sample_prod_url); ?>" class="btn-underline-link">SELECT STRAND</a>
              </div>
            </div>
          </div>

          <!-- Strand Card 4 -->
          <div class="product-card-luxury">
            <div class="product-card-media">
              <span class="category-card-badge badge-gold">15" STRAND · UNTREATED</span>
              <button type="button" class="wishlist-heart-btn" data-wishlist-id="bd-4" onclick="toggleProductWishlist('bd-4', 'Burmese Ruby Micro-Faceted Strand', '<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>', '₹4,600', '<?php echo esc_url($sample_prod_url); ?>', this);">♡</button>
              <a href="<?php echo esc_url($sample_prod_url); ?>">
                <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Burmese Ruby Micro-Faceted Strand">
              </a>
              <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
            </div>
            <div class="product-card-body">
              <h3 class="product-title-heading" style="font-size: 13px;">
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">Burmese Ruby Micro-Faceted Strand</a>
              </h3>
              <div class="product-meta-sub">3.5 mm · 15" strand · ≈105 beads · 0.4 mm hole</div>
              <div class="product-price-row">
                <span class="product-price-val">₹4,600</span>
                <span class="product-price-unit"> per strand</span>
              </div>
              <div style="margin-top: 10px;">
                <a href="<?php echo esc_url($sample_prod_url); ?>" class="btn-underline-link">SELECT STRAND</a>
              </div>
            </div>
          </div>

          <!-- Strand Card 5 -->
          <div class="product-card-luxury">
            <div class="product-card-media">
              <span class="category-card-badge badge-green">16" STRAND · AAA DEEP</span>
              <button type="button" class="wishlist-heart-btn" data-wishlist-id="bd-5" onclick="toggleProductWishlist('bd-5', 'Natural Amethyst Faceted Rondelle Strand', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '₹980', '<?php echo esc_url($sample_prod_url); ?>', this);">♡</button>
              <a href="<?php echo esc_url($sample_prod_url); ?>">
                <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Natural Amethyst Faceted Rondelle Strand" style="filter: hue-rotate(240deg);">
              </a>
              <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
            </div>
            <div class="product-card-body">
              <h3 class="product-title-heading" style="font-size: 13px;">
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">Natural Amethyst Faceted Rondelle Strand</a>
              </h3>
              <div class="product-meta-sub">5–6 mm · 16" strand · ≈80 beads · 0.5 mm hole</div>
              <div class="product-price-row">
                <span class="product-price-val">₹980</span>
                <span class="product-price-unit"> per strand</span>
              </div>
              <div style="margin-top: 10px;">
                <a href="<?php echo esc_url($sample_prod_url); ?>" class="btn-underline-link">SELECT STRAND</a>
              </div>
            </div>
          </div>

          <!-- Strand Card 6 -->
          <div class="product-card-luxury">
            <div class="product-card-media">
              <span class="category-card-badge badge-gold">16" STRAND · FIRE PLAY</span>
              <button type="button" class="wishlist-heart-btn" data-wishlist-id="bd-6" onclick="toggleProductWishlist('bd-6', 'Ethiopian Opal Smooth Round Strand', '<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>', '₹3,200', '<?php echo esc_url($sample_prod_url); ?>', this);">♡</button>
              <a href="<?php echo esc_url($sample_prod_url); ?>">
                <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Ethiopian Opal Smooth Round Strand" style="filter: brightness(1.1) contrast(1.1);">
              </a>
              <div class="quick-view-hover-bar"><a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
            </div>
            <div class="product-card-body">
              <h3 class="product-title-heading" style="font-size: 13px;">
                <a href="<?php echo esc_url($sample_prod_url); ?>" style="color: inherit; text-decoration: none;">Ethiopian Opal Smooth Round Strand</a>
              </h3>
              <div class="product-meta-sub">4.5 mm · 16" strand · ≈85 beads · 0.5 mm hole</div>
              <div class="product-price-row">
                <span class="product-price-val">₹3,200</span>
                <span class="product-price-unit"> per strand</span>
              </div>
              <div style="margin-top: 10px;">
                <a href="<?php echo esc_url($sample_prod_url); ?>" class="btn-underline-link">SELECT STRAND</a>
              </div>
            </div>
          </div>

        </div>

      </main>

    </div>

    <!-- Details Box at Bottom -->
    <div style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 32px; margin-top: 50px;">
      <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">DETAILS ON EVERY BEAD STRAND</span>
      <h3 class="font-serif" style="font-size: 20px; font-weight: 400; margin: 8px 0 16px;">What you see on every Vivaaz Gems strand card</h3>
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; font-size: 12px; color: var(--color-text-muted); line-height: 1.6;">
        <div>
          <strong style="color: #1C1A17; display: block; margin-bottom: 4px;">Strand Length</strong>
          Usually 13 to 16 inches, exactly measured from Jaipur workshops.
        </div>
        <div>
          <strong style="color: #1C1A17; display: block; margin-bottom: 4px;">Bead Count</strong>
          Approximate number of beads per strand for design calculation.
        </div>
        <div>
          <strong style="color: #1C1A17; display: block; margin-bottom: 4px;">Hole Size</strong>
          Calibrated 0.4 to 0.8 mm drilling to fit standard wires and silk.
        </div>
        <div>
          <strong style="color: #1C1A17; display: block; margin-bottom: 4px;">Natural Grading</strong>
          AAA, AA, or commercial grade natural stones, genuine and certified.
        </div>
      </div>
    </div>

  </div>
</div>

<!-- POINT 25 SPEC: MOBILE BEADS FILTER DRAWER -->
<div id="vivaaz-beads-filter-drawer-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 99998;" onclick="closeBeadsFilterDrawer()"></div>
<div id="vivaaz-beads-filter-drawer" style="position: fixed; top: 0; left: -100%; width: 85%; max-width: 320px; height: 100%; background: #FFFFFF; z-index: 99999; box-shadow: 2px 0 16px rgba(0,0,0,0.2); transition: left 0.3s ease; overflow-y: auto; padding: 24px; box-sizing: border-box;">
  <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--color-border-light); padding-bottom: 14px; margin-bottom: 20px;">
    <h3 style="font-size: 14px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin: 0;">Bead Filters</h3>
    <button type="button" onclick="closeBeadsFilterDrawer()" style="background: none; border: none; font-size: 20px; cursor: pointer; color: #1C1A17;">✕</button>
  </div>
  
  <div class="mobile-beads-drawer-content">
    <!-- Sold By in drawer -->
    <div style="margin-bottom: 20px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 16px;">
      <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">Sold By</h4>
      <div class="filter-buttons-wrap" style="display: flex; flex-wrap: wrap; gap: 6px;">
        <button type="button" class="filter-pill-btn active" onclick="this.classList.toggle('active')">Full Strand</button>
        <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">Half Strand</button>
        <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">By Gram</button>
      </div>
    </div>

    <!-- Quality in drawer -->
    <div style="margin-bottom: 20px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 16px;">
      <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">Quality</h4>
      <div class="filter-buttons-wrap" style="display: flex; flex-wrap: wrap; gap: 6px;">
        <button type="button" class="filter-pill-btn active" onclick="this.classList.toggle('active')">AAA+ (Top)</button>
        <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">AAA (Fine)</button>
        <button type="button" class="filter-pill-btn" onclick="this.classList.toggle('active')">AA Standard</button>
      </div>
    </div>

    <!-- Price range in drawer -->
    <div style="margin-bottom: 24px;">
      <h4 style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">Price Range</h4>
      <input type="range" min="300" max="25000" step="200" value="10000" style="width: 100%; accent-color: var(--color-gold-accent, #9C7C4C);" oninput="document.getElementById('m-beads-price').textContent = 'Up to ₹' + Number(this.value).toLocaleString('en-IN');">
      <div style="display: flex; justify-content: space-between; font-size: 11px; color: var(--color-text-muted); margin-top: 6px;">
        <span>₹300</span>
        <span id="m-beads-price" style="font-weight: 600; color: #1C1A17;">Up to ₹10,000</span>
        <span>₹25,000+</span>
      </div>
    </div>

    <button type="button" onclick="closeBeadsFilterDrawer()" style="width: 100%; padding: 12px; background: #1C1A17; color: #FFFFFF; border: none; font-size: 12px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; cursor: pointer;">
      Apply Filters
    </button>
  </div>
</div>

<script>
function openBeadsFilterDrawer() {
  var overlay = document.getElementById('vivaaz-beads-filter-drawer-overlay');
  var drawer = document.getElementById('vivaaz-beads-filter-drawer');
  if (overlay) overlay.style.display = 'block';
  if (drawer) drawer.style.left = '0';
  document.body.style.overflow = 'hidden';
}
function closeBeadsFilterDrawer() {
  var overlay = document.getElementById('vivaaz-beads-filter-drawer-overlay');
  var drawer = document.getElementById('vivaaz-beads-filter-drawer');
  if (overlay) overlay.style.display = 'none';
  if (drawer) drawer.style.left = '-100%';
  document.body.style.overflow = '';
}
</script>

<?php
get_footer('shop');
