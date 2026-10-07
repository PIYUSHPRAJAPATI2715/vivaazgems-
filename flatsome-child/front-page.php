<?php
/**
 * Vivaaz Gems Theme - Front Page Template (Dynamic Homepage)
 */
get_header();
?>

  <!-- SECTION 1: HERO BANNER SECTION -->
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
        <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="hero-search-wrapper">
          <span class="search-icon-inside">🔍</span>
          <input type="text" name="s" class="hero-search-input" placeholder="Search a stone, size or code..." value="<?php echo get_search_query(); ?>" />
          <?php if (class_exists('WooCommerce')) : ?>
            <input type="hidden" name="post_type" value="product" />
          <?php endif; ?>
          <button type="submit" class="hero-search-btn">Search →</button>
        </form>

        <!-- CTAs -->
        <div class="hero-cta-group">
          <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>" class="btn-navy-pill">
            <span>💎</span> SHOP GEMSTONES →
          </a>
          <a href="<?php echo esc_url(home_url('/tennis-jewelry/')); ?>" class="btn-white-pill">
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
      <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>" class="hero-visual-card">
        <div class="hero-visual-pedestal">
          <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/ceylon-sapphire.jpg'); ?>" alt="Natural Ceylon Sapphire" class="hero-gem-img">
        </div>
        <div class="hero-caption-text">
          <span class="font-italic" style="color: var(--color-gold-accent); font-weight: 600;">Premium Quality</span><br>
          <span>Natural Sapphire</span>
          <div class="hero-caption-line"></div>
        </div>
      </a>
    </div>
  </section>

  <!-- SECTION 2: EXPLORE BY COLOUR SECTION (DYNAMIC) -->
  <section class="explore-colour-section reveal-on-scroll">
    <div class="explore-colour-container">
      <div style="text-align: center; margin-bottom: 24px;">
        <div class="section-tag-divider">EXPLORE BY COLOUR</div>
      </div>

      <div class="colour-grid">
        <?php
        $colors = array(
            array('name' => 'Blue', 'slug' => 'blue', 'img' => '/assets/images/ceylon-sapphire.jpg', 'filter' => ''),
            array('name' => 'Red', 'slug' => 'red', 'img' => '/assets/images/ruby.jpg', 'filter' => ''),
            array('name' => 'Pink', 'slug' => 'pink', 'img' => '/assets/images/ceylon-sapphire.jpg', 'filter' => 'hue-rotate(280deg)'),
            array('name' => 'Green', 'slug' => 'green', 'img' => '/assets/images/emerald.jpg', 'filter' => ''),
            array('name' => 'Yellow', 'slug' => 'yellow', 'img' => '/assets/images/swiss-topaz.jpg', 'filter' => 'hue-rotate(180deg)'),
            array('name' => 'Purple', 'slug' => 'purple', 'img' => '/assets/images/moonstone.jpg', 'filter' => '')
        );

        if (taxonomy_exists('pa_color')) {
            $terms = get_terms(array('taxonomy' => 'pa_color', 'hide_empty' => false));
            if (!empty($terms) && !is_wp_error($terms)) {
                $colors = array();
                foreach ($terms as $term) {
                    $colors[] = array(
                        'name' => $term->name,
                        'slug' => $term->slug,
                        'img'  => '/assets/images/ceylon-sapphire.jpg',
                        'filter' => ''
                    );
                }
            }
        }

        foreach ($colors as $idx => $c) :
            $shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
            $link = add_query_arg('filter_color', $c['slug'], $shop_url);
        ?>
          <a href="<?php echo esc_url($link); ?>" class="colour-item <?php echo $idx === 0 ? 'active' : ''; ?>">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . $c['img']); ?>" alt="<?php echo esc_attr($c['name']); ?> Gemstones" class="colour-gem-img" style="<?php echo $c['filter'] ? 'filter: '.$c['filter'].';' : ''; ?>">
            <span class="colour-name"><?php echo esc_html($c['name']); ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- SECTION 3: SHOP BY CATEGORY SECTION (DYNAMIC FROM WOOCOMMERCE) -->
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

      <div style="text-align: right;" class="desktop-only">
        <span class="font-serif font-italic text-gold" style="font-size: 22px; display: block;">Nature's Beauty in Every Gem</span>
      </div>
    </div>

    <!-- 4 Category Cards -->
    <div class="category-cards-grid">
      <?php
      $wc_categories = array();
      if (taxonomy_exists('product_cat')) {
          $terms = get_terms(array(
              'taxonomy'   => 'product_cat',
              'hide_empty' => false,
              'number'     => 4,
              'exclude'    => get_option('default_product_cat')
          ));
          if (!empty($terms) && !is_wp_error($terms)) {
              $wc_categories = $terms;
          }
      }

      if (!empty($wc_categories)) :
          $badge_classes = array('badge-blue', 'badge-green', 'badge-red', 'badge-purple');
          $badge_labels  = array('💎 PREMIUM QUALITY', '🛡️ CERTIFIED', '⭐ AUTHENTIC', '🪷 EXCLUSIVE');
          $default_imgs  = array('/assets/images/ceylon-sapphire.jpg', '/assets/images/emerald.jpg', '/assets/images/ruby.jpg', '/assets/images/moonstone.jpg');
          
          foreach ($wc_categories as $i => $cat) :
              $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
              $image_url    = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : get_stylesheet_directory_uri() . $default_imgs[$i % 4];
              $cat_link     = get_term_link($cat);
      ?>
          <a href="<?php echo esc_url($cat_link); ?>" class="category-luxury-card">
            <div class="category-card-media">
              <span class="category-card-badge <?php echo $badge_classes[$i % 4]; ?>"><?php echo $badge_labels[$i % 4]; ?></span>
              <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($cat->name); ?>" class="category-card-img">
            </div>
            <div class="category-card-body">
              <h3 class="category-card-heading"><?php echo esc_html($cat->name); ?></h3>
              <p class="category-card-desc"><?php echo esc_html($cat->description ? wp_trim_words($cat->description, 10) : 'Natural, rare and precious gemstones.'); ?></p>
              <div class="category-arrow-btn">→</div>
            </div>
          </a>
      <?php 
          endforeach;
      else :
          // Default Static Category Showcase
      ?>
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="category-luxury-card">
          <div class="category-card-media">
            <span class="category-card-badge badge-blue">💎 PREMIUM QUALITY</span>
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/ceylon-sapphire.jpg'); ?>" alt="Gemstones" class="category-card-img">
          </div>
          <div class="category-card-body">
            <h3 class="category-card-heading">Gemstones</h3>
            <p class="category-card-desc">Natural, rare and precious gemstones for every purpose.</p>
            <div class="category-arrow-btn">→</div>
          </div>
        </a>

        <a href="<?php echo esc_url(home_url('/beads/')); ?>" class="category-luxury-card">
          <div class="category-card-media">
            <span class="category-card-badge badge-green">🛡️ CERTIFIED</span>
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/emerald.jpg'); ?>" alt="Gemstone Beads" class="category-card-img">
          </div>
          <div class="category-card-body">
            <h3 class="category-card-heading">Gemstone Beads</h3>
            <p class="category-card-desc">High-quality beads for elegant creations.</p>
            <div class="category-arrow-btn">→</div>
          </div>
        </a>

        <a href="<?php echo esc_url(home_url('/tennis-jewelry/')); ?>" class="category-luxury-card">
          <div class="category-card-media">
            <span class="category-card-badge badge-red">⭐ AUTHENTIC</span>
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/ruby.jpg'); ?>" alt="Jewelry Tennis" class="category-card-img">
          </div>
          <div class="category-card-body">
            <h3 class="category-card-heading">Jewelry · Tennis</h3>
            <p class="category-card-desc">Timeless designs crafted with natural gemstones.</p>
            <div class="category-arrow-btn">→</div>
          </div>
        </a>

        <a href="<?php echo esc_url(home_url('/astrology/')); ?>" class="category-luxury-card">
          <div class="category-card-media">
            <span class="category-card-badge badge-purple">🪷 EXCLUSIVE</span>
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/moonstone.jpg'); ?>" alt="Astrology Gemstones" class="category-card-img">
          </div>
          <div class="category-card-body">
            <h3 class="category-card-heading">Astrology</h3>
            <p class="category-card-desc">Gemstones aligned with your cosmic energy.</p>
            <div class="category-arrow-btn">→</div>
          </div>
        </a>
      <?php endif; ?>
    </div>
  </section>

  <!-- SECTION 4: NEW ARRIVALS CAROUSEL SECTION (DYNAMIC FROM WOOCOMMERCE PRODUCTS) -->
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
          <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>" class="btn-pill-gold-border">View All →</a>
        </div>
      </div>

      <!-- Carousel Wrapper -->
      <div class="carousel-wrapper-relative">
        <button class="slider-arrow-btn prev" aria-label="Previous Slide">‹</button>
        <button class="slider-arrow-btn next" aria-label="Next Slide">›</button>

        <div class="arrivals-grid-4">
          <?php
          $args = array(
              'post_type'      => 'product',
              'posts_per_page' => 4,
              'post_status'    => 'publish',
              'orderby'        => 'date',
              'order'          => 'DESC'
          );
          $loop = new WP_Query($args);

          if ($loop->have_posts()) :
              while ($loop->have_posts()) : $loop->the_post();
                  global $product;
                  $product_id   = get_the_ID();
                  $title        = get_the_title();
                  $permalink    = get_permalink();
                  $price_html   = $product ? $product->get_price_html() : '';
                  $img_url      = get_the_post_thumbnail_url($product_id, 'woocommerce_thumbnail') ?: get_stylesheet_directory_uri() . '/assets/images/ceylon-sapphire.jpg';
                  $short_desc   = $product ? $product->get_short_description() : '';
          ?>
              <!-- Dynamic Product Card -->
              <a href="<?php echo esc_url($permalink); ?>" class="product-card-luxury">
                <div class="product-card-media-box">
                  <span class="category-card-badge badge-navy">New</span>
                  <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>" class="category-card-img">
                </div>
                <div class="product-card-body-row">
                  <h3 class="product-card-title-text"><?php echo esc_html($title); ?></h3>
                  <p class="product-card-sub-text"><?php echo esc_html($short_desc ? wp_trim_words($short_desc, 4) : 'Natural · Certified'); ?></p>
                  <div class="product-price-cart-flex">
                    <span class="product-price-amount"><?php echo $price_html ? $price_html : 'Inquire Price'; ?></span>
                    <div class="circle-cart-btn">🛒</div>
                  </div>
                </div>
              </a>
          <?php
              endwhile;
              wp_reset_postdata();
          else :
              // Fallback Default Showcase Cards
          ?>
              <!-- Card 1: Ceylon Blue Sapphire -->
              <a href="<?php echo esc_url(home_url('/ceylon-sapphire-product/')); ?>" class="product-card-luxury">
                <div class="product-card-media-box">
                  <span class="category-card-badge badge-navy">New</span>
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/ceylon-sapphire.jpg'); ?>" alt="Ceylon Blue Sapphire" class="category-card-img">
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
              <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="product-card-luxury">
                <div class="product-card-media-box">
                  <span class="category-card-badge badge-gold">Best Seller</span>
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/ruby.jpg'); ?>" alt="Pigeon Blood Ruby" class="category-card-img">
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
              <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="product-card-luxury">
                <div class="product-card-media-box">
                  <span class="category-card-badge badge-darkgreen">Premium</span>
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/emerald.jpg'); ?>" alt="Zambian Emerald" class="category-card-img">
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
              <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="product-card-luxury">
                <div class="product-card-media-box">
                  <span class="category-card-badge badge-navy">New</span>
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/swiss-topaz.jpg'); ?>" alt="Swiss Blue Topaz" class="category-card-img">
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
          <?php endif; ?>
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

  <!-- SECTION 5: SEEN ON INSTAGRAM REELS SECTION -->
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
        <a href="<?php echo esc_url(home_url('/ceylon-sapphire-product/')); ?>" class="reel-video-card">
          <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/ceylon-sapphire.jpg'); ?>" alt="Reel 1" class="reel-bg-img">
          <div class="reel-play-circle">▶</div>
          <div class="reel-bottom-badge">🎬 Reel 1</div>
        </a>
        <a href="<?php echo esc_url(home_url('/ceylon-sapphire-product/')); ?>" class="reel-video-card">
          <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/ruby.jpg'); ?>" alt="Reel 2" class="reel-bg-img">
          <div class="reel-play-circle">▶</div>
          <div class="reel-bottom-badge">🎬 Reel 2</div>
        </a>
        <a href="<?php echo esc_url(home_url('/ceylon-sapphire-product/')); ?>" class="reel-video-card">
          <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/emerald.jpg'); ?>" alt="Reel 3" class="reel-bg-img">
          <div class="reel-play-circle">▶</div>
          <div class="reel-bottom-badge">🎬 Reel 3</div>
        </a>
        <a href="<?php echo esc_url(home_url('/ceylon-sapphire-product/')); ?>" class="reel-video-card">
          <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/swiss-topaz.jpg'); ?>" alt="Reel 4" class="reel-bg-img">
          <div class="reel-play-circle">▶</div>
          <div class="reel-bottom-badge">🎬 Reel 4</div>
        </a>
        <a href="<?php echo esc_url(home_url('/ceylon-sapphire-product/')); ?>" class="reel-video-card">
          <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/moonstone.jpg'); ?>" alt="Reel 5" class="reel-bg-img">
          <div class="reel-play-circle">▶</div>
          <div class="reel-bottom-badge">🎬 Reel 5</div>
        </a>
        <a href="<?php echo esc_url(home_url('/ceylon-sapphire-product/')); ?>" class="reel-video-card">
          <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/ceylon-sapphire.jpg'); ?>" alt="Reel 6" class="reel-bg-img">
          <div class="reel-play-circle">▶</div>
          <div class="reel-bottom-badge">🎬 Reel 6</div>
        </a>
      </div>
    </div>
  </section>

<?php
get_footer();
