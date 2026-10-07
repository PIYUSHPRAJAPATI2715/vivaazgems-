<?php
/**
 * Vivaaz Gems Theme - Front Page Template (Homepage)
 */
get_header();
?>

  <!-- SECTION 1: HERO BANNER SECTION (EXACT MOCKUP 2 MATCH) -->
  <section class="hero-banner-section reveal-on-scroll">
    <div class="hero-banner-container">
      <div>
        <div class="section-tag-divider">JAIPUR · SINCE 1993</div>
        <h1 class="hero-heading">
          Natural Gemstones,<br>
          Chosen by <span class="font-italic text-gold">Hand</span>
        </h1>
        <p class="hero-subtitle">
          Authentic, certified and carefully selected gemstones for your better tomorrow.
        </p>
        
        <!-- Search Bar -->
        <form action="<?php echo home_url('/shop/'); ?>" class="hero-search-wrapper">
          <span class="search-icon-inside">🔍</span>
          <input type="text" name="s" class="hero-search-input" placeholder="Search a stone, size or code..." />
          <button type="submit" class="hero-search-btn">Search →</button>
        </form>

        <!-- CTAs -->
        <div class="hero-cta-group">
          <a href="<?php echo home_url('/shop/'); ?>" class="btn-navy-pill">
            <span>💎</span> SHOP GEMSTONES →
          </a>
          <a href="<?php echo home_url('/tennis-jewelry/'); ?>" class="btn-white-pill">
            <span>💎</span> TENNIS JEWELRY →
          </a>
        </div>

        <!-- Trust Bar -->
        <div class="hero-trust-flex">
          <div class="trust-item">🎒 Lab certified</div>
          <div class="trust-divider"></div>
          <div class="trust-item">🚚 Insured shipping</div>
          <div class="trust-divider"></div>
          <div class="trust-item">⏱ 7-day returns</div>
          <div class="trust-divider"></div>
          <div class="trust-item">⭐ Google rating</div>
          <div class="trust-divider"></div>
          <div class="trust-item">💎 Bangkok Gems Fair exhibitor</div>
        </div>
      </div>

      <!-- Right Visual Card -->
      <a href="<?php echo home_url('/ceylon-sapphire-product/'); ?>" class="hero-visual-card">
        <div class="hero-visual-pedestal">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ceylon-sapphire.jpg" alt="Natural Ceylon Sapphire" class="hero-gem-img">
        </div>
        <div class="hero-caption-text">
          <span class="font-italic" style="color: var(--color-gold-accent); font-weight: 600;">Premium Quality</span><br>
          <span>Natural Sapphire</span>
          <div class="hero-caption-line"></div>
        </div>
      </a>
    </div>
  </section>

  <!-- SECTION 2: EXPLORE BY COLOUR SECTION (EXACT MOCKUP 3 MATCH) -->
  <section class="explore-colour-section reveal-on-scroll">
    <div class="explore-colour-container">
      <div style="text-align: center; margin-bottom: 24px;">
        <div class="section-tag-divider">EXPLORE BY COLOUR</div>
      </div>

      <div class="colour-grid">
        <!-- 1. Blue -->
        <a href="<?php echo home_url('/shop/?filter_color=blue'); ?>" class="colour-item active">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ceylon-sapphire.jpg" alt="Blue Gemstones" class="colour-gem-img">
          <span class="colour-name">Blue</span>
        </a>
        <!-- 2. Red -->
        <a href="<?php echo home_url('/shop/?filter_color=red'); ?>" class="colour-item">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ruby.jpg" alt="Red Gemstones" class="colour-gem-img">
          <span class="colour-name">Red</span>
        </a>
        <!-- 3. Pink -->
        <a href="<?php echo home_url('/shop/?filter_color=pink'); ?>" class="colour-item">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ceylon-sapphire.jpg" alt="Pink Gemstones" class="colour-gem-img" style="filter: hue-rotate(280deg);">
          <span class="colour-name">Pink</span>
        </a>
        <!-- 4. Green -->
        <a href="<?php echo home_url('/shop/?filter_color=green'); ?>" class="colour-item">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/emerald.jpg" alt="Green Gemstones" class="colour-gem-img">
          <span class="colour-name">Green</span>
        </a>
        <!-- 5. Yellow -->
        <a href="<?php echo home_url('/shop/?filter_color=yellow'); ?>" class="colour-item">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/swiss-topaz.jpg" alt="Yellow Gemstones" class="colour-gem-img" style="filter: hue-rotate(180deg);">
          <span class="colour-name">Yellow</span>
        </a>
        <!-- 6. Purple -->
        <a href="<?php echo home_url('/shop/?filter_color=purple'); ?>" class="colour-item">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/moonstone.jpg" alt="Purple Gemstones" class="colour-gem-img">
          <span class="colour-name">Purple</span>
        </a>
      </div>
    </div>
  </section>

  <!-- SECTION 3: SHOP BY CATEGORY SECTION (EXACT MOCKUP 4 MATCH) -->
  <section class="shop-category-section reveal-on-scroll">
    <div class="shop-category-header">
      <div>
        <div class="section-tag-divider">SHOP BY CATEGORY</div>
        <h2 class="category-main-title">
          Explore Our <span class="font-italic text-gold">Gemstone</span> Categories
        </h2>
        <p style="color: var(--color-text-muted); font-size: 14px; margin-top: 6px; max-width: 500px;">
          Discover a wide range of natural gemstones, carefully selected for your peace, positivity and prosperity.
        </p>
      </div>

      <!-- Accent Script -->
      <div style="text-align: right;" class="desktop-only">
        <span class="font-serif font-italic text-gold" style="font-size: 22px; display: block;">Nature's Beauty in Every Gem</span>
      </div>
    </div>

    <!-- 4 Category Cards -->
    <div class="category-cards-grid">
      <!-- 1. Gemstones -->
      <a href="<?php echo home_url('/shop/'); ?>" class="category-luxury-card">
        <div class="category-card-media">
          <span class="category-card-badge badge-blue">💎 PREMIUM QUALITY</span>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ceylon-sapphire.jpg" alt="Gemstones" class="category-card-img">
        </div>
        <div class="category-card-body">
          <h3 class="category-card-heading">Gemstones</h3>
          <p class="category-card-desc">Natural, rare and precious gemstones for every purpose.</p>
          <div class="category-arrow-btn">→</div>
        </div>
      </a>

      <!-- 2. Gemstone Beads -->
      <a href="<?php echo home_url('/beads/'); ?>" class="category-luxury-card">
        <div class="category-card-media">
          <span class="category-card-badge badge-green">🛡️ CERTIFIED</span>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/emerald.jpg" alt="Gemstone Beads" class="category-card-img">
        </div>
        <div class="category-card-body">
          <h3 class="category-card-heading">Gemstone Beads</h3>
          <p class="category-card-desc">High-quality beads for elegant creations.</p>
          <div class="category-arrow-btn">→</div>
        </div>
      </a>

      <!-- 3. Jewelry · Tennis -->
      <a href="<?php echo home_url('/tennis-jewelry/'); ?>" class="category-luxury-card">
        <div class="category-card-media">
          <span class="category-card-badge badge-red">⭐ AUTHENTIC</span>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ruby.jpg" alt="Jewelry Tennis" class="category-card-img">
        </div>
        <div class="category-card-body">
          <h3 class="category-card-heading">Jewelry · Tennis</h3>
          <p class="category-card-desc">Timeless designs crafted with natural gemstones.</p>
          <div class="category-arrow-btn">→</div>
        </div>
      </a>

      <!-- 4. Astrology -->
      <a href="<?php echo home_url('/astrology/'); ?>" class="category-luxury-card">
        <div class="category-card-media">
          <span class="category-card-badge badge-purple">🪷 EXCLUSIVE</span>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/moonstone.jpg" alt="Astrology Gemstones" class="category-card-img">
        </div>
        <div class="category-card-body">
          <h3 class="category-card-heading">Astrology</h3>
          <p class="category-card-desc">Gemstones aligned with your cosmic energy.</p>
          <div class="category-arrow-btn">→</div>
        </div>
      </a>
    </div>
  </section>

  <!-- SECTION 4: NEW ARRIVALS CAROUSEL SECTION (EXACT MOCKUP MATCH) -->
  <section class="new-arrivals-section reveal-on-scroll">
    <div class="new-arrivals-container">
      <div class="arrivals-header-flex">
        <div>
          <div class="arrivals-title-group">
            <span style="font-size: 24px;">💎</span>
            <span style="width: 24px; height: 1px; background: var(--color-gold-accent);"></span>
            <h2 class="arrivals-title">New <span class="font-serif font-italic text-gold">Arrivals</span></h2>
          </div>
          <p style="color: var(--color-text-muted); font-size: 14px;">
            Discover our latest collection of natural gemstones, carefully handpicked for their brilliance and quality.
          </p>
        </div>
        <div>
          <a href="<?php echo home_url('/shop/'); ?>" class="btn-pill-gold-border">View All →</a>
        </div>
      </div>

      <!-- Carousel Wrapper -->
      <div class="carousel-wrapper-relative">
        <button class="slider-arrow-btn prev" aria-label="Previous Slide">‹</button>
        <button class="slider-arrow-btn next" aria-label="Next Slide">›</button>

        <div class="arrivals-grid-4">
          <!-- Card 1: Ceylon Blue Sapphire -->
          <a href="<?php echo home_url('/ceylon-sapphire-product/'); ?>" class="product-card-luxury">
            <div class="product-card-media-box">
              <span class="category-card-badge badge-navy">New</span>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ceylon-sapphire.jpg" alt="Ceylon Blue Sapphire" class="category-card-img">
            </div>
            <div class="product-card-body-row">
              <h3 class="product-card-title-text">Ceylon Blue Sapphire</h3>
              <p class="product-card-sub-text">Oval Faceted · 1.82 ct</p>
              <div class="product-price-cart-flex">
                <span class="product-price-amount">₹18,400</span>
                <div class="circle-cart-btn">🛒</div>
              </div>
            </div>
          </a>

          <!-- Card 2: Pigeon Blood Ruby -->
          <a href="<?php echo home_url('/shop/'); ?>" class="product-card-luxury">
            <div class="product-card-media-box">
              <span class="category-card-badge badge-gold">Best Seller</span>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ruby.jpg" alt="Pigeon Blood Ruby" class="category-card-img">
            </div>
            <div class="product-card-body-row">
              <h3 class="product-card-title-text">Pigeon Blood Ruby</h3>
              <p class="product-card-sub-text">Oval Faceted · 2.10 ct</p>
              <div class="product-price-cart-flex">
                <span class="product-price-amount">₹34,500</span>
                <div class="circle-cart-btn">🛒</div>
              </div>
            </div>
          </a>

          <!-- Card 3: Zambian Emerald -->
          <a href="<?php echo home_url('/shop/'); ?>" class="product-card-luxury">
            <div class="product-card-media-box">
              <span class="category-card-badge badge-darkgreen">Premium</span>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/emerald.jpg" alt="Zambian Emerald" class="category-card-img">
            </div>
            <div class="product-card-body-row">
              <h3 class="product-card-title-text">Zambian Emerald</h3>
              <p class="product-card-sub-text">Emerald Cut · 1.50 ct</p>
              <div class="product-price-cart-flex">
                <span class="product-price-amount">₹28,000</span>
                <div class="circle-cart-btn">🛒</div>
              </div>
            </div>
          </a>

          <!-- Card 4: Swiss Blue Topaz -->
          <a href="<?php echo home_url('/shop/'); ?>" class="product-card-luxury">
            <div class="product-card-media-box">
              <span class="category-card-badge badge-navy">New</span>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/swiss-topaz.jpg" alt="Swiss Blue Topaz" class="category-card-img">
            </div>
            <div class="product-card-body-row">
              <h3 class="product-card-title-text">Swiss Blue Topaz</h3>
              <p class="product-card-sub-text">Round Brilliant · 2.25 mm</p>
              <div class="product-price-cart-flex">
                <span class="product-price-amount">₹120 / piece</span>
                <div class="circle-cart-btn">🛒</div>
              </div>
            </div>
          </a>
        </div>

        <!-- Dot Pagination -->
        <div class="dot-pagination-row">
          <div class="dot-item active"></div>
          <div class="dot-item"></div>
          <div class="dot-item"></div>
          <div class="dot-item"></div>
          <div class="dot-item"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 5: SEEN ON INSTAGRAM REELS SECTION (EXACT MOCKUP MATCH) -->
  <section class="instagram-section reveal-on-scroll">
    <div class="instagram-container">
      <div class="instagram-header-flex">
        <div>
          <div class="arrivals-title-group">
            <span style="font-size: 24px;">📷</span>
            <span style="width: 24px; height: 1px; background: var(--color-gold-accent);"></span>
            <h2 class="arrivals-title">Seen on <span class="font-serif font-italic text-gold">Instagram</span></h2>
          </div>
          <p style="color: var(--color-text-muted); font-size: 14px;">
            Follow us for more stunning gemstones, live updates and exclusive collections.
          </p>
        </div>
        <div>
          <a href="https://instagram.com/vivaazgems" target="_blank" class="btn-navy-pill">
            <span>📷</span> Follow Us →
          </a>
        </div>
      </div>

      <!-- 6 Reel Video Cards Grid -->
      <div class="reels-grid-6">
        <a href="<?php echo home_url('/ceylon-sapphire-product/'); ?>" class="reel-video-card">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ceylon-sapphire.jpg" alt="Reel 1" class="reel-bg-img">
          <div class="reel-play-circle">▶</div>
          <div class="reel-bottom-badge">🎬 Reel 1</div>
        </a>
        <a href="<?php echo home_url('/ceylon-sapphire-product/'); ?>" class="reel-video-card">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ruby.jpg" alt="Reel 2" class="reel-bg-img">
          <div class="reel-play-circle">▶</div>
          <div class="reel-bottom-badge">🎬 Reel 2</div>
        </a>
        <a href="<?php echo home_url('/ceylon-sapphire-product/'); ?>" class="reel-video-card">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/emerald.jpg" alt="Reel 3" class="reel-bg-img">
          <div class="reel-play-circle">▶</div>
          <div class="reel-bottom-badge">🎬 Reel 3</div>
        </a>
        <a href="<?php echo home_url('/ceylon-sapphire-product/'); ?>" class="reel-video-card">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/swiss-topaz.jpg" alt="Reel 4" class="reel-bg-img">
          <div class="reel-play-circle">▶</div>
          <div class="reel-bottom-badge">🎬 Reel 4</div>
        </a>
        <a href="<?php echo home_url('/ceylon-sapphire-product/'); ?>" class="reel-video-card">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/moonstone.jpg" alt="Reel 5" class="reel-bg-img">
          <div class="reel-play-circle">▶</div>
          <div class="reel-bottom-badge">🎬 Reel 5</div>
        </a>
        <a href="<?php echo home_url('/ceylon-sapphire-product/'); ?>" class="reel-video-card">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ceylon-sapphire.jpg" alt="Reel 6" class="reel-bg-img">
          <div class="reel-play-circle">▶</div>
          <div class="reel-bottom-badge">🎬 Reel 6</div>
        </a>
      </div>
    </div>
  </section>

<?php
get_footer();
