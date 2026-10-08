<?php
/**
 * Vivaaz Gems Theme - Front Page Template (100% Client Spec Matching)
 */
get_header();
?>

  <!-- 1. HERO BANNER SECTION (CLIENT SPEC PAGE 3) -->
  <section class="hero-banner-section">
    <div class="hero-banner-container">
      <div>
        <span class="section-tag-divider">NATURAL COLOURED GEMSTONES · JAIPUR</span>
        <h1 class="hero-heading">
          Loose gemstones,<br>
          calibrated and <span class="font-italic text-gold">matched.</span>
        </h1>
        <p class="hero-subtitle">
          Authentic, certified and carefully selected gemstones for your peace, positivity and prosperity.
        </p>
        
        <!-- Search Bar -->
        <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="hero-search-wrapper">
          <input type="text" name="s" class="hero-search-input" placeholder="Search a stone, size or code..." value="<?php echo get_search_query(); ?>" />
          <?php if (class_exists('WooCommerce')) : ?>
            <input type="hidden" name="post_type" value="product" />
          <?php endif; ?>
          <button type="submit" class="hero-search-btn">SEARCH →</button>
        </form>

        <!-- CTAs -->
        <div class="hero-cta-group">
          <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>" class="btn-square-dark">
            SHOP GEMSTONES →
          </a>
          <a href="<?php echo esc_url(home_url('/#layouts')); ?>" class="btn-underline-link">
            Layouts for jewellers →
          </a>
        </div>

        <!-- Trust Line (3 items as specified) -->
        <div class="trust-line-row">
          <div class="trust-line-item">✓ LAB CERTIFIED</div>
          <div class="trust-line-item">✓ INSURED SHIPPING</div>
          <div class="trust-line-item">✓ TRADE FAIR EXHIBITOR</div>
        </div>
      </div>

      <!-- Right Visual Card -->
      <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>" class="hero-visual-card">
        <span class="macro-video-badge">▶ MACRO VIDEO PLAYS HERE</span>
        <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Natural Ceylon Sapphire" class="hero-gem-img">
        <div style="margin-top: 16px;">
          <span class="font-italic text-gold" style="font-weight: 600; font-size: 13px;">Premium Quality</span><br>
          <span style="font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Natural Ceylon Sapphire</span>
        </div>
      </a>
    </div>
  </section>

  <!-- 2. EXPLORE BY COLOUR / BY STONE TABS SECTION (CLIENT SPEC PAGE 4) -->
  <section class="explore-colour-section">
    <div class="explore-colour-container">
      <div class="section-header-tabs-flex">
        <div>
          <span class="section-tag-divider">SHOP GEMSTONES</span>
          <h2 class="font-serif" style="font-size: 32px; font-weight: 400;">Find your <span class="font-italic text-gold">colour.</span></h2>
        </div>
        <div class="tab-button-group">
          <button type="button" class="tab-btn active" id="tab-btn-colour" onclick="switchGemTab('colour')">By colour</button>
          <button type="button" class="tab-btn" id="tab-btn-stone" onclick="switchGemTab('stone')">By stone</button>
        </div>
      </div>

      <!-- TAB 1: BY COLOUR -->
      <div id="tab-content-colour" class="colour-grid">
        <a href="<?php echo esc_url(home_url('/shop/?filter_color=blue')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Blue Gemstones" class="colour-gem-img">
          <span class="colour-name">Blue</span>
          <span class="colour-subtext">Sapphire, tanzanite, aquamarine</span>
        </a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_color=red')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Red Gemstones" class="colour-gem-img">
          <span class="colour-name">Red</span>
          <span class="colour-subtext">Ruby, spinel, garnet</span>
        </a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_color=pink')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Pink Gemstones" class="colour-gem-img" style="filter: hue-rotate(280deg);">
          <span class="colour-name">Pink</span>
          <span class="colour-subtext">Pink sapphire, tourmaline</span>
        </a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_color=green')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Green Gemstones" class="colour-gem-img">
          <span class="colour-name">Green</span>
          <span class="colour-subtext">Emerald, tsavorite, peridot</span>
        </a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_color=yellow')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Yellow Gemstones" class="colour-gem-img" style="filter: hue-rotate(180deg);">
          <span class="colour-name">Yellow</span>
          <span class="colour-subtext">Yellow sapphire, citrine</span>
        </a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_color=purple')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Purple Gemstones" class="colour-gem-img">
          <span class="colour-name">Purple</span>
          <span class="colour-subtext">Amethyst, purple sapphire</span>
        </a>
      </div>

      <!-- TAB 2: BY STONE (HIDDEN BY DEFAULT) -->
      <div id="tab-content-stone" class="colour-grid" style="display: none;">
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby" class="colour-gem-img">
          <span class="colour-name">Ruby</span>
          <span class="colour-subtext">Rounds, ovals, layouts</span>
        </a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Sapphire" class="colour-gem-img">
          <span class="colour-name">Sapphire</span>
          <span class="colour-subtext">Blue, pink, yellow</span>
        </a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Emerald" class="colour-gem-img">
          <span class="colour-name">Emerald</span>
          <span class="colour-subtext">Octagon, oval, round</span>
        </a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=garnet')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Garnet" class="colour-gem-img" style="filter: hue-rotate(330deg);">
          <span class="colour-name">Garnet</span>
          <span class="colour-subtext">Calibrated lots</span>
        </a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=amethyst')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Amethyst" class="colour-gem-img">
          <span class="colour-name">Amethyst</span>
          <span class="colour-subtext">Calibrated lots</span>
        </a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=blue-topaz')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Blue Topaz" class="colour-gem-img">
          <span class="colour-name">Blue Topaz</span>
          <span class="colour-subtext">Sky, Swiss, London</span>
        </a>
      </div>
    </div>
  </section>

  <!-- 3. LAYOUTS SECTION (CLIENT SPEC PAGE 4) -->
  <section id="layouts" class="layouts-section">
    <div class="layouts-container">
      <div>
        <img src="<?php echo esc_url(vivaaz_get_img_url('true-size-grid.jpg')); ?>" alt="Matched Gemstone Layouts" class="layouts-img">
      </div>
      <div>
        <span class="section-tag-divider">FOR JEWELLERS</span>
        <h2 class="layouts-title">Layouts, matched <span class="font-italic text-gold">stone by stone.</span></h2>
        <p class="text-muted" style="font-size: 13px;">
          Graduated lines and matched suites in ruby, sapphire, emerald and spinel. Send us your design and we match colour, cut and size to it.
        </p>

        <div class="layouts-stats-grid">
          <div>
            <div class="stat-box-val">1.5–10</div>
            <div class="stat-box-lbl">mm calibrated</div>
          </div>
          <div>
            <div class="stat-box-val">±0.1</div>
            <div class="stat-box-lbl">mm size match</div>
          </div>
          <div>
            <div class="stat-box-val">Any</div>
            <div class="stat-box-lbl">drawing or CAD</div>
          </div>
        </div>

        <div style="display: flex; align-items: center; gap: 20px;">
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-square-dark">SEE LAYOUTS</a>
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-underline-link">Send your design →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. BEADS SECTION (CLIENT SPEC PAGE 4) -->
  <section id="beads" class="beads-section">
    <div class="beads-container">
      <div class="section-header-tabs-flex">
        <div>
          <span class="section-tag-divider">SHOP BEADS</span>
          <h2 class="font-serif" style="font-size: 32px; font-weight: 400;">Beads, <span class="font-italic text-gold">by shape.</span></h2>
        </div>
        <div>
          <a href="<?php echo esc_url(home_url('/beads/')); ?>" class="btn-underline-link">View all beads →</a>
        </div>
      </div>

      <div class="beads-grid-6">
        <a href="<?php echo esc_url(home_url('/beads/?shape=round')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Round Beads" class="colour-gem-img">
          <span class="colour-name">Round</span>
        </a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=rondelle')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Rondelle Beads" class="colour-gem-img">
          <span class="colour-name">Rondelle</span>
        </a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=faceted')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Faceted Beads" class="colour-gem-img">
          <span class="colour-name">Faceted</span>
        </a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=nugget')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Nugget Beads" class="colour-gem-img">
          <span class="colour-name">Nugget</span>
        </a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=chips')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Chips Beads" class="colour-gem-img">
          <span class="colour-name">Chips</span>
        </a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=heishi')); ?>" class="colour-item">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Heishi Beads" class="colour-gem-img" style="filter: hue-rotate(40deg);">
          <span class="colour-name">Heishi</span>
        </a>
      </div>
    </div>
  </section>

  <!-- 5. NEW ARRIVALS | BEST SELLERS TABS SECTION (CLIENT SPEC PAGE 5 & 9) -->
  <section class="products-tab-section">
    <div class="products-container">
      <div class="section-header-tabs-flex">
        <div class="tab-button-group">
          <button type="button" class="tab-btn active" id="tab-btn-arrivals" onclick="switchProductTab('arrivals')" style="font-size: 24px; font-family: var(--font-family-serif);">New arrivals</button>
          <button type="button" class="tab-btn" id="tab-btn-bestsellers" onclick="switchProductTab('bestsellers')" style="font-size: 24px; font-family: var(--font-family-serif);">Best sellers</button>
        </div>
        <div>
          <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>" class="btn-underline-link">View all →</a>
        </div>
      </div>

      <!-- ARRIVALS GRID -->
      <div id="tab-content-arrivals" class="products-grid-4">
        <?php
        $args = array('post_type' => 'product', 'posts_per_page' => 4, 'post_status' => 'publish', 'orderby' => 'date', 'order' => 'DESC');
        $loop = new WP_Query($args);
        if ($loop->have_posts()) :
            while ($loop->have_posts()) : $loop->the_post();
                global $product;
                $p_id = get_the_ID();
                $p_title = get_the_title();
                $p_link = get_permalink();
                $p_price = $product ? $product->get_price_html() : '';
                $p_img = get_the_post_thumbnail_url($p_id, 'woocommerce_thumbnail') ?: vivaaz_get_img_url('ceylon-sapphire.jpg');
                $is_variable = $product ? $product->is_type('variable') : false;
        ?>
            <div class="product-card-luxury">
              <div class="product-card-media">
                <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
                <img src="<?php echo esc_url($p_img); ?>" alt="<?php echo esc_attr($p_title); ?>">
                <div class="quick-view-hover-bar">QUICK VIEW</div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading"><?php echo esc_html($p_title); ?></h3>
                <div class="product-meta-sub">3 mm · lot of 20</div>
                <div class="product-price-row">
                  <div>
                    <span class="product-price-val"><?php echo $p_price ? $p_price : '₹420'; ?></span>
                    <span class="product-price-unit"> per piece</span>
                  </div>
                </div>
                <div style="margin-top: 12px;">
                  <a href="<?php echo esc_url($p_link); ?>" class="btn-underline-link">
                    <?php echo $is_variable ? 'SELECT OPTIONS' : 'ADD TO CART'; ?>
                  </a>
                </div>
              </div>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
            <!-- Fallback Static Product Cards (Spec Page 9) -->
            <div class="product-card-luxury">
              <div class="product-card-media">
                <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Blue Sapphire, Round">
                <div class="quick-view-hover-bar">QUICK VIEW</div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading">Blue Sapphire, Round</h3>
                <div class="product-meta-sub">3 mm · lot of 20</div>
                <div class="product-price-row">
                  <div>
                    <span class="product-price-val">₹420</span>
                    <span class="product-price-unit"> per piece</span>
                  </div>
                </div>
                <div style="margin-top: 12px;">
                  <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-underline-link">SELECT OPTIONS</a>
                </div>
              </div>
            </div>

            <div class="product-card-luxury">
              <div class="product-card-media">
                <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby, Oval Pair">
                <div class="quick-view-hover-bar">QUICK VIEW</div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading">Ruby, Oval Pair</h3>
                <div class="product-meta-sub">7×5 mm · matched pair</div>
                <div class="product-price-row">
                  <div>
                    <span class="product-price-val">₹6,800</span>
                    <span class="product-price-unit"> per pair</span>
                  </div>
                </div>
                <div style="margin-top: 12px;">
                  <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-underline-link">ADD TO CART</a>
                </div>
              </div>
            </div>

            <div class="product-card-luxury">
              <div class="product-card-media">
                <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Emerald, Octagon">
                <div class="quick-view-hover-bar">QUICK VIEW</div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading">Emerald, Octagon</h3>
                <div class="product-meta-sub">9×7 mm · 1.82 ct · single</div>
                <div class="product-price-row">
                  <div>
                    <span class="product-price-val">₹24,500</span>
                    <span class="product-price-unit"> per piece</span>
                  </div>
                </div>
                <div style="margin-top: 12px;">
                  <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-underline-link">ADD TO CART</a>
                </div>
              </div>
            </div>

            <div class="product-card-luxury">
              <div class="product-card-media">
                <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
                <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Pink Tourmaline, Round" style="filter: hue-rotate(280deg);">
                <div class="quick-view-hover-bar">QUICK VIEW</div>
              </div>
              <div class="product-card-body">
                <h3 class="product-title-heading">Pink Tourmaline, Round</h3>
                <div class="product-meta-sub">2.5 mm · lot of 50</div>
                <div class="product-price-row">
                  <div>
                    <span class="product-price-val">₹180</span>
                    <span class="product-price-unit"> per piece</span>
                  </div>
                </div>
                <div style="margin-top: 12px;">
                  <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-underline-link">SELECT OPTIONS</a>
                </div>
              </div>
            </div>
        <?php endif; ?>
      </div>

      <!-- BEST SELLERS GRID (HIDDEN BY DEFAULT) -->
      <div id="tab-content-bestsellers" class="products-grid-4" style="display: none;">
        <div class="product-card-luxury">
          <div class="product-card-media">
            <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
            <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Garnet, Round">
            <div class="quick-view-hover-bar">QUICK VIEW</div>
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading">Garnet, Round</h3>
            <div class="product-meta-sub">4 mm · lot of 100</div>
            <div class="product-price-row">
              <div>
                <span class="product-price-val">₹95</span>
                <span class="product-price-unit"> per piece</span>
              </div>
            </div>
            <div style="margin-top: 12px;">
              <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-underline-link">SELECT OPTIONS</a>
            </div>
          </div>
        </div>

        <div class="product-card-luxury">
          <div class="product-card-media">
            <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
            <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Blue Topaz, Oval">
            <div class="quick-view-hover-bar">QUICK VIEW</div>
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading">Blue Topaz, Oval</h3>
            <div class="product-meta-sub">6×4 mm · lot of 50</div>
            <div class="product-price-row">
              <div>
                <span class="product-price-val">₹140</span>
                <span class="product-price-unit"> per piece</span>
              </div>
            </div>
            <div style="margin-top: 12px;">
              <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-underline-link">SELECT OPTIONS</a>
            </div>
          </div>
        </div>

        <div class="product-card-luxury">
          <div class="product-card-media">
            <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
            <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby Layout, Graduated" style="filter: hue-rotate(320deg);">
            <div class="quick-view-hover-bar">QUICK VIEW</div>
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading">Ruby Layout, Graduated</h3>
            <div class="product-meta-sub">2–5 mm · 27 stones</div>
            <div class="product-price-row">
              <div>
                <span class="product-price-val">Enquire</span>
                <span class="product-price-unit"> price on request</span>
              </div>
            </div>
            <div style="margin-top: 12px;">
              <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-underline-link">REQUEST PRICE</a>
            </div>
          </div>
        </div>

        <div class="product-card-luxury">
          <div class="product-card-media">
            <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
            <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Amethyst, Round">
            <div class="quick-view-hover-bar">QUICK VIEW</div>
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading">Amethyst, Round</h3>
            <div class="product-meta-sub">5 mm · lot of 50</div>
            <div class="product-price-row">
              <div>
                <span class="product-price-val">₹120</span>
                <span class="product-price-unit"> per piece</span>
              </div>
            </div>
            <div style="margin-top: 12px;">
              <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-underline-link">SELECT OPTIONS</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. OUR STORY SECTION (CLIENT SPEC PAGE 5 & 7) -->
  <section id="our-story" class="story-section">
    <div class="story-container">
      <div class="story-media-box">
        <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Vivaaz Gems Gemstone Craftsmanship">
        <div class="story-play-overlay">
          <span>▶</span> UNDER THE LOUPE · 0:40
        </div>
      </div>
      <div>
        <span class="section-tag-divider">OUR STORY</span>
        <h2 class="layouts-title">A Jaipur family in gemstones for <span class="font-italic text-gold">over thirty years.</span></h2>
        <p class="text-muted" style="font-size: 13px;">
          Vivaaz Gems began in 2018, built on a family trade in coloured stones that goes back more than three decades. We sort, calibrate and match every lot by hand in Jaipur.
        </p>

        <div class="layouts-stats-grid">
          <div>
            <div class="stat-box-val">30+</div>
            <div class="stat-box-lbl">years in gemstones</div>
          </div>
          <div>
            <div class="stat-box-val">2</div>
            <div class="stat-box-lbl">offices, Jaipur and Bangkok</div>
          </div>
        </div>

        <a href="<?php echo esc_url(home_url('/about/')); ?>" class="btn-square-white">READ OUR STORY</a>
      </div>
    </div>
  </section>

  <!-- 7. REVIEWS & TALK TO AN EXPERT (CLIENT SPEC PAGE 5 & 8) -->
  <section id="reviews" class="reviews-expert-section">
    <div class="reviews-expert-container">
      <div>
        <span class="section-tag-divider">GOOGLE REVIEWS</span>
        <h2 class="font-serif" style="font-size: 32px; font-weight: 400; margin-bottom: 24px;">What buyers <span class="font-italic text-gold">say.</span></h2>
        
        <div class="reviews-cards-grid">
          <div class="google-review-card">
            <div class="star-rating-row">★★★★★</div>
            <p class="text-muted">"Your real Google review goes here, two or three lines in the customer's words."</p>
            <div class="review-author-name">Customer name · Country</div>
          </div>

          <div class="google-review-card">
            <div class="star-rating-row">★★★★★</div>
            <p class="text-muted">"Your real Google review goes here, two or three lines in the customer's words."</p>
            <div class="review-author-name">Customer name · Country</div>
          </div>

          <div class="google-review-card">
            <div class="star-rating-row">★★★★★</div>
            <p class="text-muted">"Your real Google review goes here, two or three lines in the customer's words."</p>
            <div class="review-author-name">Customer name · Country</div>
          </div>
        </div>
      </div>

      <!-- Talk to an Expert Box -->
      <div class="expert-box-card">
        <span class="section-tag-divider">TALK TO A GEM EXPERT</span>
        <h3 class="expert-box-title">Not sure what to choose? Ask us.</h3>
        <p class="text-muted" style="font-size: 12px;">
          We send live photos and videos of the exact stones, and help with sizes, matching and certificates.
        </p>

        <a href="https://wa.me/919680552270" target="_blank" class="expert-btn-green">
          <span>💬</span> WHATSAPP
        </a>

        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-square-white" style="width: 100%;">
          📹 BOOK A VIDEO CALL
        </a>
      </div>
    </div>
  </section>

  <!-- 8. SEEN ON INSTAGRAM REELS (CLIENT SPEC PAGE 5 & 8) -->
  <section class="instagram-reels-section">
    <div class="instagram-reels-container">
      <div class="section-header-tabs-flex">
        <div>
          <span class="section-tag-divider">@VIVAAZGEMS</span>
          <h2 class="font-serif" style="font-size: 32px; font-weight: 400;">Seen on <span class="font-italic text-gold">Instagram.</span></h2>
        </div>
        <div>
          <a href="https://instagram.com/vivaazgems" target="_blank" class="btn-underline-link">Follow us →</a>
        </div>
      </div>

      <div class="reels-grid-5">
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="reel-card-tall">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby, Oval">
          <div class="reel-info-overlay">
            <div style="font-weight: 600;">Ruby, Oval</div>
            <div style="opacity: 0.8; font-size: 10px;">₹18,200</div>
          </div>
        </a>

        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="reel-card-tall">
          <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Emerald lot, 3 mm">
          <div class="reel-info-overlay">
            <div style="font-weight: 600;">Emerald lot, 3 mm</div>
            <div style="opacity: 0.8; font-size: 10px;">₹650 per piece</div>
          </div>
        </a>

        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="reel-card-tall">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Sapphire pair">
          <div class="reel-info-overlay">
            <div style="font-weight: 600;">Sapphire pair</div>
            <div style="opacity: 0.8; font-size: 10px;">₹9,400</div>
          </div>
        </a>

        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="reel-card-tall">
          <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Tanzanite, Round">
          <div class="reel-info-overlay">
            <div style="font-weight: 600;">Tanzanite, Round</div>
            <div style="opacity: 0.8; font-size: 10px;">₹7,900</div>
          </div>
        </a>

        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="reel-card-tall">
          <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Yellow sapphire lot">
          <div class="reel-info-overlay">
            <div style="font-weight: 600;">Yellow sapphire lot</div>
            <div style="opacity: 0.8; font-size: 10px;">₹1,100 per piece</div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- TAB SWITCHING INTERACTIVE SCRIPT -->
  <script>
    function switchGemTab(tabName) {
      document.getElementById('tab-btn-colour').classList.remove('active');
      document.getElementById('tab-btn-stone').classList.remove('active');
      document.getElementById('tab-content-colour').style.display = 'none';
      document.getElementById('tab-content-stone').style.display = 'none';

      document.getElementById('tab-btn-' + tabName).classList.add('active');
      document.getElementById('tab-content-' + tabName).style.display = 'grid';
    }

    function switchProductTab(tabName) {
      document.getElementById('tab-btn-arrivals').classList.remove('active');
      document.getElementById('tab-btn-bestsellers').classList.remove('active');
      document.getElementById('tab-content-arrivals').style.display = 'none';
      document.getElementById('tab-content-bestsellers').style.display = 'none';

      document.getElementById('tab-btn-' + tabName).classList.add('active');
      document.getElementById('tab-content-' + tabName).style.display = 'grid';
    }
  </script>

<?php
get_footer();
