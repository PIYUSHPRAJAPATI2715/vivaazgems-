<?php
/**
 * Vivaaz Gems Theme - Front Page Template
 * Strictly matches Step 3 (Page 10) of the 35-page Build Book.
 */
get_header();
?>

  <!-- 1. HERO BANNER SECTION (BUILD BOOK PAGE 10 & WORD DOC) -->
  <section class="hero-banner-section" style="background: var(--color-page-bg); padding: 50px 20px 40px;">
    <div class="hero-banner-container" style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: center;">
      <div>
        <span class="section-tag-divider" style="font-size: 11px; font-weight: 700; letter-spacing: 0.15em; color: var(--color-gold-label); text-transform: uppercase;">
          NATURAL COLOURED GEMSTONES · JAIPUR
        </span>
        
        <h1 class="hero-heading" style="font-family: var(--font-family-serif); font-size: 44px; font-weight: 400; line-height: 1.2; margin: 12px 0 16px; color: var(--color-text-main);">
          Loose gemstones,<br>
          calibrated and matched.
        </h1>
        
        <p class="hero-subtitle" style="font-size: 14px; color: var(--color-text-muted); line-height: 1.7; margin-bottom: 24px; max-width: 500px;">
          Rubies, sapphires, emeralds and semi-precious stones such as spinel, in calibrated sizes, matched pairs and layouts. Sorted by hand in Jaipur and shipped insured to your door.
        </p>
        
        <!-- Live Search Input -->
        <form action="<?php echo esc_url(home_url('/shop/')); ?>" method="get" class="hero-search-wrapper" style="display: flex; max-width: 480px; background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 4px; margin-bottom: 24px;">
          <input type="text" name="s" class="hero-search-input" placeholder="Search a stone, shape or code..." value="<?php echo get_search_query(); ?>" style="flex: 1; border: none; padding: 12px 16px; font-size: 13px; outline: none;" />
          <button type="submit" class="hero-search-btn" style="background: #1C1A17; color: #FFFFFF; border: none; padding: 12px 22px; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer;">
            SEARCH
          </button>
        </form>

        <!-- CTA Buttons -->
        <div class="hero-cta-group" style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px;">
          <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-square-dark" style="padding: 14px 28px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none;">
            SHOP GEMSTONES
          </a>
          <a href="<?php echo esc_url(home_url('/layouts/')); ?>" class="btn-underline-link" style="font-size: 13px; font-weight: 600; text-decoration: underline;">
            Layouts for jewellers →
          </a>
        </div>

        <!-- Trust Line (Exact 3 items from Build Book Step 3) -->
        <div class="trust-line-row" style="display: flex; align-items: center; gap: 20px; font-size: 11px; font-weight: 600; color: var(--color-text-muted); border-top: 1px solid var(--color-border-light); padding-top: 18px;">
          <div>✓ Certificates on request</div>
          <div>✓ Insured shipping</div>
          <div>✓ Trade fair exhibitor</div>
        </div>
      </div>

      <!-- Right Visual Card / Video -->
      <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" class="hero-visual-card" style="display: block; position: relative; background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 30px; text-align: center; text-decoration: none;">
        <span class="macro-video-badge" style="position: absolute; top: 16px; right: 16px; background: #FAF7F2; padding: 6px 12px; font-size: 10px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
          ▶ Macro video · plays here
        </span>
        <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Ceylon Sapphire" class="hero-gem-img" style="max-width: 100%; height: auto; object-fit: contain;">
        <div style="margin-top: 16px;">
          <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); text-transform: uppercase;">CEYLON SAPPHIRE</span><br>
          <span style="font-family: var(--font-family-serif); font-size: 18px; color: var(--color-text-main);">Blue Sapphire Oval Faceted</span>
        </div>
      </a>
    </div>
  </section>

  <!-- 2. FIND YOUR COLOUR / BY STONE TABS SECTION (BUILD BOOK PAGE 10) -->
  <section class="explore-colour-section" id="colour" style="background: #FFFFFF; padding: 60px 20px; border-top: 1px solid var(--color-border-light);">
    <div class="explore-colour-container" style="max-width: 1200px; margin: 0 auto;">
      <div class="section-header-tabs-flex" style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 30px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 14px;">
        <div>
          <span class="section-tag-divider" style="font-size: 11px; font-weight: 700; letter-spacing: 0.15em; color: var(--color-gold-label); text-transform: uppercase;">SHOP GEMSTONES</span>
          <h2 class="font-serif" style="font-size: 32px; font-weight: 400; margin: 4px 0 0;">Find your colour.</h2>
        </div>
        <div class="tab-button-group" style="display: flex; gap: 20px;">
          <button type="button" class="tab-btn active" id="tab-btn-colour" onclick="switchGemTab('colour')" style="background: none; border: none; border-bottom: 2px solid #1C1A17; font-size: 13px; font-weight: 700; text-transform: uppercase; cursor: pointer; padding: 6px 4px;">By colour</button>
          <button type="button" class="tab-btn" id="tab-btn-stone" onclick="switchGemTab('stone')" style="background: none; border: none; border-bottom: 2px solid transparent; font-size: 13px; font-weight: 600; color: var(--color-text-muted); text-transform: uppercase; cursor: pointer; padding: 6px 4px;">By stone</button>
        </div>
      </div>

      <!-- TAB 1: BY COLOUR (6 TILES FROM BUILD BOOK STEP 3) -->
      <div id="tab-content-colour" class="colour-grid" style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 16px;">
        <a href="<?php echo esc_url(home_url('/shop/?filter_color=blue')); ?>" class="colour-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 14px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Blue" class="colour-gem-img" style="width: 80px; height: 80px; object-fit: contain; margin: 0 auto 12px; display: block;">
          <strong style="display: block; font-size: 13px; color: var(--color-text-main);">Blue</strong>
          <span style="font-size: 10px; color: var(--color-text-muted);">Sapphire, tanzanite, aquamarine</span>
        </a>
        
        <a href="<?php echo esc_url(home_url('/shop/?filter_color=red')); ?>" class="colour-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 14px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Red" class="colour-gem-img" style="width: 80px; height: 80px; object-fit: contain; margin: 0 auto 12px; display: block;">
          <strong style="display: block; font-size: 13px; color: var(--color-text-main);">Red</strong>
          <span style="font-size: 10px; color: var(--color-text-muted);">Ruby, spinel, garnet</span>
        </a>
        
        <a href="<?php echo esc_url(home_url('/shop/?filter_color=pink')); ?>" class="colour-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 14px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Pink" class="colour-gem-img" style="width: 80px; height: 80px; object-fit: contain; margin: 0 auto 12px; display: block; filter: hue-rotate(330deg);">
          <strong style="display: block; font-size: 13px; color: var(--color-text-main);">Pink</strong>
          <span style="font-size: 10px; color: var(--color-text-muted);">Pink sapphire, spinel, tourmaline</span>
        </a>
        
        <a href="<?php echo esc_url(home_url('/shop/?filter_color=green')); ?>" class="colour-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 14px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Green" class="colour-gem-img" style="width: 80px; height: 80px; object-fit: contain; margin: 0 auto 12px; display: block;">
          <strong style="display: block; font-size: 13px; color: var(--color-text-main);">Green</strong>
          <span style="font-size: 10px; color: var(--color-text-muted);">Emerald, tsavorite, peridot</span>
        </a>
        
        <a href="<?php echo esc_url(home_url('/shop/?filter_color=yellow')); ?>" class="colour-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 14px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Yellow" class="colour-gem-img" style="width: 80px; height: 80px; object-fit: contain; margin: 0 auto 12px; display: block; filter: hue-rotate(190deg);">
          <strong style="display: block; font-size: 13px; color: var(--color-text-main);">Yellow</strong>
          <span style="font-size: 10px; color: var(--color-text-muted);">Yellow sapphire, citrine</span>
        </a>
        
        <a href="<?php echo esc_url(home_url('/shop/?filter_color=purple')); ?>" class="colour-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 14px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Purple" class="colour-gem-img" style="width: 80px; height: 80px; object-fit: contain; margin: 0 auto 12px; display: block; filter: hue-rotate(260deg);">
          <strong style="display: block; font-size: 13px; color: var(--color-text-main);">Purple</strong>
          <span style="font-size: 10px; color: var(--color-text-muted);">Amethyst, purple sapphire</span>
        </a>
      </div>

      <!-- TAB 2: BY STONE (6 STONES FROM BUILD BOOK STEP 3) -->
      <div id="tab-content-stone" class="colour-grid" style="display: none; grid-template-columns: repeat(6, 1fr); gap: 16px;">
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>" class="colour-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 14px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby" class="colour-gem-img" style="width: 80px; height: 80px; object-fit: contain; margin: 0 auto 12px; display: block;">
          <strong style="display: block; font-size: 13px; color: var(--color-text-main);">Ruby</strong>
          <span style="font-size: 10px; color: var(--color-text-muted);">Faceted, cabochon, layouts</span>
        </a>
        
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>" class="colour-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 14px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Sapphire" class="colour-gem-img" style="width: 80px; height: 80px; object-fit: contain; margin: 0 auto 12px; display: block;">
          <strong style="display: block; font-size: 13px; color: var(--color-text-main);">Sapphire</strong>
          <span style="font-size: 10px; color: var(--color-text-muted);">Blue, pink, yellow, white</span>
        </a>
        
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>" class="colour-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 14px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Emerald" class="colour-gem-img" style="width: 80px; height: 80px; object-fit: contain; margin: 0 auto 12px; display: block;">
          <strong style="display: block; font-size: 13px; color: var(--color-text-main);">Emerald</strong>
          <span style="font-size: 10px; color: var(--color-text-muted);">Octagon, oval, round</span>
        </a>
        
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=garnet')); ?>" class="colour-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 14px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Garnet" class="colour-gem-img" style="width: 80px; height: 80px; object-fit: contain; margin: 0 auto 12px; display: block; filter: brightness(0.8);">
          <strong style="display: block; font-size: 13px; color: var(--color-text-main);">Garnet</strong>
          <span style="font-size: 10px; color: var(--color-text-muted);">Deep red, rhodolite</span>
        </a>
        
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=amethyst')); ?>" class="colour-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 14px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Amethyst" class="colour-gem-img" style="width: 80px; height: 80px; object-fit: contain; margin: 0 auto 12px; display: block; filter: hue-rotate(270deg);">
          <strong style="display: block; font-size: 13px; color: var(--color-text-main);">Amethyst</strong>
          <span style="font-size: 10px; color: var(--color-text-muted);">Lilac to deep purple</span>
        </a>
        
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=topaz')); ?>" class="colour-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 14px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Blue Topaz" class="colour-gem-img" style="width: 80px; height: 80px; object-fit: contain; margin: 0 auto 12px; display: block;">
          <strong style="display: block; font-size: 13px; color: var(--color-text-main);">Blue Topaz</strong>
          <span style="font-size: 10px; color: var(--color-text-muted);">Sky, Swiss, London</span>
        </a>
      </div>

      <div style="text-align: center; margin-top: 24px;">
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-underline-link" style="font-size: 12px; font-weight: 700; text-transform: uppercase;">All stones →</a>
      </div>
    </div>
  </section>

  <!-- 3. LAYOUTS SECTION (BUILD BOOK PAGE 10 & 22 - POINT 1 SPEC) -->
  <section class="layouts-section" id="layouts" style="background: var(--color-page-bg); padding: 70px 20px; border-top: 1px solid var(--color-border-light);">
    <div class="layouts-container" style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
      <!-- Photo on Left -->
      <div>
        <a href="<?php echo esc_url(home_url('/layouts/')); ?>" style="display: block; border: 1px solid var(--color-border-light); background: #FFFFFF; padding: 20px; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby Layout" style="width: 100%; height: auto; object-fit: contain;">
          <div style="text-align: center; margin-top: 14px; font-size: 12px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: var(--color-text-main);">
            Ruby Graduated Necklace Line · Matched in Jaipur
          </div>
        </a>
      </div>

      <!-- Text on Right -->
      <div>
        <span class="section-tag-divider" style="font-size: 11px; font-weight: 700; letter-spacing: 0.15em; color: var(--color-gold-label); text-transform: uppercase;">FOR JEWELLERS</span>
        <h2 class="layouts-title" style="font-family: var(--font-family-serif); font-size: 36px; font-weight: 400; line-height: 1.25; margin: 10px 0 16px; color: var(--color-text-main);">
          Layouts, matched stone by stone.
        </h2>
        <p style="font-size: 14px; color: var(--color-text-muted); line-height: 1.7; margin-bottom: 24px;">
          Graduated lines and matched sets in ruby, spinel, blue topaz and more. Send us your design or CAD and we match colour, cut and size to it.
        </p>

        <!-- 3 Facts -->
        <div class="layouts-stats-grid" style="display: flex; gap: 30px; margin-bottom: 28px; padding-top: 16px; border-top: 1px solid var(--color-border-light);">
          <div>
            <div style="font-family: var(--font-family-serif); font-size: 22px; font-weight: 600;">1–10 mm</div>
            <div style="font-size: 11px; color: var(--color-text-muted);">calibrated</div>
          </div>
          <div>
            <div style="font-family: var(--font-family-serif); font-size: 22px; font-weight: 600;">±0.1 mm</div>
            <div style="font-size: 11px; color: var(--color-text-muted);">size match</div>
          </div>
          <div>
            <div style="font-family: var(--font-family-serif); font-size: 22px; font-weight: 600;">Any drawing</div>
            <div style="font-size: 11px; color: var(--color-text-muted);">or CAD</div>
          </div>
        </div>

        <div style="display: flex; align-items: center; gap: 20px;">
          <a href="<?php echo esc_url(home_url('/layouts/')); ?>" class="btn-square-dark" style="padding: 14px 28px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none;">
            SEE LAYOUTS
          </a>
          <a href="<?php echo esc_url(home_url('/layouts/#match')); ?>" class="btn-underline-link" style="font-size: 13px; font-weight: 600; text-decoration: underline;">
            Send your design →
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. BEADS BY SHAPE SECTION (BUILD BOOK PAGE 10 & 23) -->
  <section class="beads-section" id="beads" style="background: #FFFFFF; padding: 60px 20px; border-top: 1px solid var(--color-border-light);">
    <div class="beads-container" style="max-width: 1200px; margin: 0 auto;">
      <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 24px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 12px;">
        <div>
          <span class="section-tag-divider" style="font-size: 11px; font-weight: 700; letter-spacing: 0.15em; color: var(--color-gold-label); text-transform: uppercase;">SHOP BEADS</span>
          <h2 class="font-serif" style="font-size: 32px; font-weight: 400; margin: 4px 0 0;">Beads, by shape.</h2>
        </div>
        <a href="<?php echo esc_url(home_url('/beads/')); ?>" class="btn-underline-link" style="font-size: 12px; font-weight: 700; text-transform: uppercase;">View all beads →</a>
      </div>

      <div class="beads-grid-6" style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 16px;">
        <a href="<?php echo esc_url(home_url('/beads/?shape=round')); ?>" class="colour-item" style="background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 18px 12px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Round Beads" style="width: 60px; height: 60px; object-fit: contain; margin: 0 auto 10px; display: block;">
          <strong style="display: block; font-size: 12px; color: var(--color-text-main);">Round</strong>
        </a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=rondelle')); ?>" class="colour-item" style="background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 18px 12px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Rondelle Beads" style="width: 60px; height: 60px; object-fit: contain; margin: 0 auto 10px; display: block;">
          <strong style="display: block; font-size: 12px; color: var(--color-text-main);">Rondelle</strong>
        </a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=faceted-rondelle')); ?>" class="colour-item" style="background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 18px 12px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Faceted Rondelle" style="width: 60px; height: 60px; object-fit: contain; margin: 0 auto 10px; display: block;">
          <strong style="display: block; font-size: 12px; color: var(--color-text-main);">Faceted rondelle</strong>
        </a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=nugget')); ?>" class="colour-item" style="background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 18px 12px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Nugget Beads" style="width: 60px; height: 60px; object-fit: contain; margin: 0 auto 10px; display: block;">
          <strong style="display: block; font-size: 12px; color: var(--color-text-main);">Nugget</strong>
        </a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=chips')); ?>" class="colour-item" style="background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 18px 12px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Chips Beads" style="width: 60px; height: 60px; object-fit: contain; margin: 0 auto 10px; display: block;">
          <strong style="display: block; font-size: 12px; color: var(--color-text-main);">Chips</strong>
        </a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=heishi')); ?>" class="colour-item" style="background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 18px 12px; text-align: center; text-decoration: none;">
          <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Heishi Beads" style="width: 60px; height: 60px; object-fit: contain; margin: 0 auto 10px; display: block; filter: hue-rotate(300deg);">
          <strong style="display: block; font-size: 12px; color: var(--color-text-main);">Heishi</strong>
        </a>
      </div>
    </div>
  </section>

  <!-- 5. NEW ARRIVALS | BEST SELLERS SECTION (BUILD BOOK PAGE 10) -->
  <section class="products-tab-section" style="background: var(--color-page-bg); padding: 60px 20px; border-top: 1px solid var(--color-border-light);">
    <div class="products-container" style="max-width: 1200px; margin: 0 auto;">
      <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 24px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 12px;">
        <div style="display: flex; gap: 24px; align-items: baseline;">
          <h2 class="font-serif" style="font-size: 26px; font-weight: 400; margin: 0;">New arrivals</h2>
          <span style="font-size: 20px; color: var(--color-border-light);">|</span>
          <h2 class="font-serif" style="font-size: 26px; font-weight: 400; color: var(--color-text-muted); margin: 0; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/shop/?orderby=popularity')); ?>'">Best sellers</h2>
        </div>
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-underline-link" style="font-size: 12px; font-weight: 700; text-transform: uppercase;">View all →</a>
      </div>

      <!-- 4 Cards Grid -->
      <div class="products-grid-4" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
        
        <!-- Card 1 -->
        <div class="product-card-luxury">
          <div class="product-card-media">
            <button type="button" class="wishlist-heart-btn" data-wishlist-id="front-sapphire" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('front-sapphire', 'Ceylon Sapphire Oval', '<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>', '₹ 1,450', '<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>', this);" title="Add to Wishlist">♡</button>
            <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" style="display: block; width: 100%; height: 100%;">
              <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Ceylon Sapphire">
            </a>
            <div class="quick-view-hover-bar"><a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading"><a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>">Ceylon Sapphire Oval</a></h3>
            <div class="product-meta-sub">7×5 mm · AAA Lot</div>
            <div class="product-price-row">
              <span class="product-price-val">₹ 1,450</span>
              <span class="product-price-unit">per piece</span>
            </div>
            <div style="margin-top: 10px;">
              <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" class="btn-underline-link">SELECT OPTIONS</a>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="product-card-luxury">
          <div class="product-card-media">
            <button type="button" class="wishlist-heart-btn" data-wishlist-id="front-ruby" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('front-ruby', 'Ruby Oval Matched Pair', '<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>', '₹ 6,800', '<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>', this);" title="Add to Wishlist">♡</button>
            <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" style="display: block; width: 100%; height: 100%;">
              <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby Oval Pair">
            </a>
            <div class="quick-view-hover-bar"><a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading"><a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>">Ruby Oval Matched Pair</a></h3>
            <div class="product-meta-sub">7×5 mm · Matched Pair</div>
            <div class="product-price-row">
              <span class="product-price-val">₹ 6,800</span>
              <span class="product-price-unit">per pair</span>
            </div>
            <div style="margin-top: 10px;">
              <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" class="btn-underline-link">SELECT OPTIONS</a>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="product-card-luxury">
          <div class="product-card-media">
            <button type="button" class="wishlist-heart-btn" data-wishlist-id="front-emerald" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('front-emerald', 'Emerald Octagon Faceted', '<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>', '₹ 24,500', '<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>', this);" title="Add to Wishlist">♡</button>
            <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" style="display: block; width: 100%; height: 100%;">
              <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Emerald Octagon">
            </a>
            <div class="quick-view-hover-bar"><a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading"><a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>">Emerald Octagon Faceted</a></h3>
            <div class="product-meta-sub">8×6 mm · Zambian Single</div>
            <div class="product-price-row">
              <span class="product-price-val">₹ 24,500</span>
              <span class="product-price-unit">single stone</span>
            </div>
            <div style="margin-top: 10px;">
              <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" class="btn-underline-link">VIEW DETAILS</a>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="product-card-luxury">
          <div class="product-card-media">
            <button type="button" class="wishlist-heart-btn" data-wishlist-id="front-topaz" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist('front-topaz', 'Swiss Blue Topaz Round', '<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>', '₹ 380', '<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>', this);" title="Add to Wishlist">♡</button>
            <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" style="display: block; width: 100%; height: 100%;">
              <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Swiss Blue Topaz">
            </a>
            <div class="quick-view-hover-bar"><a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading"><a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>">Swiss Blue Topaz Round</a></h3>
            <div class="product-meta-sub">4 mm · Calibrated Lot</div>
            <div class="product-price-row">
              <span class="product-price-val">₹ 92</span>
              <span class="product-price-unit">per piece</span>
            </div>
            <div style="margin-top: 10px;">
              <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" class="btn-underline-link">SELECT OPTIONS</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- 6. OUR STORY SECTION (BUILD BOOK PAGE 10 & WORD DOC) -->
  <section class="story-section" id="our-story" style="background: #FFFFFF; padding: 70px 20px; border-top: 1px solid var(--color-border-light);">
    <div class="story-container" style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
      <div class="story-media-box" style="position: relative; border: 1px solid var(--color-border-light); background: #FAF7F2; padding: 20px;">
        <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Under the loupe" style="width: 100%; height: auto; object-fit: contain;">
        <div class="story-play-overlay" style="position: absolute; bottom: 30px; left: 30px; background: rgba(28, 26, 23, 0.9); color: #FFFFFF; padding: 8px 14px; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
          ▶ Under the loupe · 0:40
        </div>
      </div>

      <div>
        <span class="section-tag-divider" style="font-size: 11px; font-weight: 700; letter-spacing: 0.15em; color: var(--color-gold-label); text-transform: uppercase;">OUR STORY</span>
        <h2 class="font-serif" style="font-size: 36px; font-weight: 400; line-height: 1.25; margin: 10px 0 16px; color: var(--color-text-main);">
          A Jaipur family in gemstones for over thirty years.
        </h2>
        <p style="font-size: 14px; color: var(--color-text-muted); line-height: 1.7; margin-bottom: 24px;">
          Vivaaz Gems began in 2018, built on a family trade in coloured stones that goes back more than three decades. We sort, calibrate and match every lot by hand in Jaipur, and source in Bangkok, so the stones you receive look like the stones you saw.
        </p>

        <div style="display: flex; gap: 36px; margin-bottom: 28px; padding-top: 16px; border-top: 1px solid var(--color-border-light);">
          <div>
            <div style="font-family: var(--font-family-serif); font-size: 26px; font-weight: 600;">30+</div>
            <div style="font-size: 11px; color: var(--color-text-muted);">years in gemstones</div>
          </div>
          <div>
            <div style="font-family: var(--font-family-serif); font-size: 26px; font-weight: 600;">3</div>
            <div style="font-size: 11px; color: var(--color-text-muted);">offices, Jaipur and Bangkok</div>
          </div>
        </div>

        <a href="<?php echo esc_url(home_url('/about/')); ?>" class="btn-square-dark" style="padding: 14px 28px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none;">
          READ OUR STORY
        </a>
      </div>
    </div>
  </section>

  <!-- 7. SEEN ON INSTAGRAM SECTION (POINT 2 & POINT 21 SPEC) -->
  <section class="instagram-section" style="background: var(--color-page-bg); padding: 60px 20px; border-top: 1px solid var(--color-border-light);">
    <div style="max-width: 1200px; margin: 0 auto;">
      <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 24px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 12px;">
        <div>
          <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.15em; color: var(--color-gold-label); text-transform: uppercase;">@VIVAAZGEMS</span>
          <h2 class="font-serif" style="font-size: 32px; font-weight: 400; margin: 4px 0 0;">Seen on Instagram.</h2>
        </div>
        <a href="<?php echo esc_url(home_url('/reels/')); ?>" class="btn-underline-link" style="font-size: 12px; font-weight: 700; text-transform: uppercase;">Follow us →</a>
      </div>

      <!-- Reels Cards Grid (4 cards matching Reels page, horizontal swipe on phone) -->
      <div class="instagram-reels-row" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
        <!-- Card 1 -->
        <div class="reel-card-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 16px; text-align: center; display: flex; flex-direction: column;">
          <div style="background: #FAF7F2; height: 250px; display: flex; flex-direction: column; align-items: center; justify-content: center; margin-bottom: 14px; position: relative; border: 1px solid var(--color-border-light);">
            <span style="font-size: 36px; color: var(--color-text-main);">▶</span>
            <span style="font-size: 10px; color: var(--color-text-muted); margin-top: 8px;">Macro Video · 0:45</span>
          </div>
          <div style="font-weight: 700; font-size: 13px; color: var(--color-text-main); margin-bottom: 2px;">Ceylon Blue Sapphire Lot</div>
          <div style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 6px;">Code: VG-SPH-0705</div>
          <div style="font-size: 13px; font-weight: 700; color: var(--color-gold-label); margin-bottom: 14px;">₹ 105 / pc</div>
          <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" class="btn-square-dark" style="margin-top: auto; display: block; padding: 10px 14px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;">
            SEE STONE →
          </a>
        </div>

        <!-- Card 2 -->
        <div class="reel-card-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 16px; text-align: center; display: flex; flex-direction: column;">
          <div style="background: #FAF7F2; height: 250px; display: flex; flex-direction: column; align-items: center; justify-content: center; margin-bottom: 14px; position: relative; border: 1px solid var(--color-border-light);">
            <span style="font-size: 36px; color: var(--color-text-main);">▶</span>
            <span style="font-size: 10px; color: var(--color-text-muted); margin-top: 8px;">Loupe Inspection · 0:32</span>
          </div>
          <div style="font-weight: 700; font-size: 13px; color: var(--color-text-main); margin-bottom: 2px;">Burma Spinel Matched Pair</div>
          <div style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 6px;">Code: VG-SPN-PR01</div>
          <div style="font-size: 13px; font-weight: 700; color: var(--color-gold-label); margin-bottom: 14px;">₹ 280 / pc</div>
          <a href="<?php echo esc_url(home_url('/shop/?s=VG-SPN-PR01')); ?>" class="btn-square-dark" style="margin-top: auto; display: block; padding: 10px 14px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;">
            SEE STONE →
          </a>
        </div>

        <!-- Card 3 -->
        <div class="reel-card-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 16px; text-align: center; display: flex; flex-direction: column;">
          <div style="background: #FAF7F2; height: 250px; display: flex; flex-direction: column; align-items: center; justify-content: center; margin-bottom: 14px; position: relative; border: 1px solid var(--color-border-light);">
            <span style="font-size: 36px; color: var(--color-text-main);">▶</span>
            <span style="font-size: 10px; color: var(--color-text-muted); margin-top: 8px;">Daylight Video · 0:50</span>
          </div>
          <div style="font-weight: 700; font-size: 13px; color: var(--color-text-main); margin-bottom: 2px;">Zambian Emerald Octagon</div>
          <div style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 6px;">Code: VG-EMR-OCT8</div>
          <div style="font-size: 13px; font-weight: 700; color: var(--color-gold-label); margin-bottom: 14px;">₹ 450 / pc</div>
          <a href="<?php echo esc_url(home_url('/shop/?s=VG-EMR-OCT8')); ?>" class="btn-square-dark" style="margin-top: auto; display: block; padding: 10px 14px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;">
            SEE STONE →
          </a>
        </div>

        <!-- Card 4 -->
        <div class="reel-card-item" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 16px; text-align: center; display: flex; flex-direction: column;">
          <div style="background: #FAF7F2; height: 250px; display: flex; flex-direction: column; align-items: center; justify-content: center; margin-bottom: 14px; position: relative; border: 1px solid var(--color-border-light);">
            <span style="font-size: 36px; color: var(--color-text-main);">▶</span>
            <span style="font-size: 10px; color: var(--color-text-muted); margin-top: 8px;">Flash Sheen · 0:28</span>
          </div>
          <div style="font-weight: 700; font-size: 13px; color: var(--color-text-main); margin-bottom: 2px;">Rainbow Moonstone Oval 6x8</div>
          <div style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 6px;">Code: VG-RMS-OV68</div>
          <div style="font-size: 13px; font-weight: 700; color: var(--color-gold-label); margin-bottom: 14px;">₹ 92 / pc</div>
          <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" class="btn-square-dark" style="margin-top: auto; display: block; padding: 10px 14px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;">
            SEE STONE →
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- 8. REVIEWS & TALK TO AN EXPERT (POINT 22 SPEC) -->
  <section class="reviews-section" style="background: #FFFFFF; padding: 70px 20px; border-top: 1px solid var(--color-border-light);">
    <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1.5fr 1fr; gap: 50px; align-items: start;">
      <div>
        <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.15em; color: var(--color-gold-label); text-transform: uppercase;">GOOGLE REVIEWS</span>
        <h2 class="font-serif" style="font-size: 32px; font-weight: 400; margin: 6px 0 24px;">What buyers say.</h2>
        
        <div class="reviews-grid-wrapper" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">
          <div class="review-card-item" style="background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 18px; font-size: 12px;">
            <div style="color: #F1C40F; margin-bottom: 6px;">★★★★★</div>
            <p style="margin: 0 0 10px; color: var(--color-text-main); line-height: 1.5;">"Exceptional quality blue sapphires. Precision calibrated lot made setting completely seamless."</p>
            <strong style="font-size: 11px;">Sophie M.</strong> · <span style="font-size: 10px; color: var(--color-text-muted);">UK</span>
          </div>

          <div class="review-card-item" style="background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 18px; font-size: 12px;">
            <div style="color: #F1C40F; margin-bottom: 6px;">★★★★★</div>
            <p style="margin: 0 0 10px; color: var(--color-text-main); line-height: 1.5;">"The ruby layout arrived exactly matching the video call. Outstanding colour grading."</p>
            <strong style="font-size: 11px;">Rajesh P.</strong> · <span style="font-size: 10px; color: var(--color-text-muted);">Mumbai</span>
          </div>

          <div class="review-card-item" style="background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 18px; font-size: 12px;">
            <div style="color: #F1C40F; margin-bottom: 6px;">★★★★★</div>
            <p style="margin: 0 0 10px; color: var(--color-text-main); line-height: 1.5;">"Prompt insured delivery to Germany with lab report. Trustworthy family merchant."</p>
            <strong style="font-size: 11px;">Klaus H.</strong> · <span style="font-size: 10px; color: var(--color-text-muted);">Germany</span>
          </div>
        </div>

        <div style="margin-top: 18px;">
          <a href="<?php echo esc_url(home_url('/reviews/')); ?>" class="btn-underline-link" style="font-size: 12px; font-weight: 700;">Read all reviews →</a>
        </div>
      </div>


      <!-- Expert Box (Build Book Page 10) -->
      <div style="background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 30px;">
        <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-gold-label); text-transform: uppercase;">TALK TO A GEM EXPERT</span>
        <h3 class="font-serif" style="font-size: 22px; font-weight: 400; margin: 8px 0 12px;">Not sure what to choose? Ask us.</h3>
        <p style="font-size: 13px; color: var(--color-text-muted); line-height: 1.6; margin-bottom: 20px;">
          We send live photos and videos of the exact stones, and help with sizes, matching and certificates.
        </p>
        <div style="display: flex; flex-direction: column; gap: 10px;">
          <a href="https://wa.me/919680552270?text=Hello,%20I%20need%20help%20choosing%20a%20stone." target="_blank" class="btn-whatsapp-green-full" style="padding: 12px 20px; font-size: 12px; font-weight: 700; letter-spacing: 0.05em; text-align: center; text-decoration: none;">
            WHATSAPP
          </a>
          <a href="https://wa.me/919680552270?text=Hello,%20I%20would%20like%20to%20book%20a%20video%20call%20to%20see%20stones%20live." target="_blank" class="btn-square-dark" style="padding: 12px 20px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.05em; text-align: center; text-decoration: none;">
            BOOK A VIDEO CALL
          </a>
        </div>
      </div>
    </div>
  </section>

  <script>
    function switchGemTab(tabName) {
      var colourBtn = document.getElementById('tab-btn-colour');
      var stoneBtn = document.getElementById('tab-btn-stone');
      var colourContent = document.getElementById('tab-content-colour');
      var stoneContent = document.getElementById('tab-content-stone');
      
      if (tabName === 'colour') {
        colourBtn.classList.add('active');
        colourBtn.style.borderBottomColor = '#1C1A17';
        stoneBtn.classList.remove('active');
        stoneBtn.style.borderBottomColor = 'transparent';
        if (colourContent) colourContent.style.display = 'grid';
        if (stoneContent) stoneContent.style.display = 'none';
      } else {
        stoneBtn.classList.add('active');
        stoneBtn.style.borderBottomColor = '#1C1A17';
        colourBtn.classList.remove('active');
        colourBtn.style.borderBottomColor = 'transparent';
        if (stoneContent) stoneContent.style.display = 'grid';
        if (colourContent) colourContent.style.display = 'none';
      }
    }
  </script>

<?php
get_footer();
