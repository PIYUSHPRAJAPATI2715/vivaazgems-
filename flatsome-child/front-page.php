<?php
/**
 * Vivaaz Gems Theme - Front Page Template
 * 100% Exact Implementation of Client Desktop & Phone Demos and Build Book.
 */
get_header();
?>

<!-- PHONE HERO SECTION (100% EXACT TO PHONE DEMO: .phero, .pvid, .vtag, 3 ROUND CUTOUTS, .phh, .hsearch2, .ptrust2) -->
<section class="phero">
  <button type="button" class="pvid" onclick="if(typeof openVideoModal === 'function') openVideoModal('sapphire');">
    <span class="vtag">▶ Macro video plays here</span>
    <span class="big"><img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Sapphire"></span>
    <span class="sm1"><img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" style="filter: hue-rotate(190deg);" alt="Citrine"></span>
    <span class="sm2"><img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" style="filter: hue-rotate(340deg);" alt="Spinel"></span>
  </button>
  <div class="wrap" style="padding-top:22px">
    <span class="cap">Natural coloured gemstones · Jaipur</span>
    <h1 class="h1 phh">Loose gemstones, calibrated and matched.</h1>
    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn">Shop gemstones</a>
    <form class="hsearch2" action="<?php echo esc_url(home_url('/shop/')); ?>" method="get">
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="11" cy="11" r="6.5"/><path d="M16 16l4.5 4.5"/></svg>
      <input id="hs-mobile" name="s" placeholder="Stone, shape or reel code" aria-label="Search a stone, shape or reel code">
    </form>
    <div class="ptrust2">
      <span>Certificates<br>on request</span>
      <span>Insured<br>shipping</span>
      <span>Trade fair<br>exhibitor</span>
    </div>
  </div>
</section>

<!-- 1. HERO SECTION (100% EXACT MATCH FOR CLIENT DEMO IMAGE 1) -->
<section class="hero">
  <div class="wrap">
    
    <div class="rv hero-left-content">
      <span class="cap">NATURAL COLOURED GEMSTONES · JAIPUR</span>
      <h1>Loose gemstones,<br>calibrated and matched.</h1>
      <p class="lead">Rubies, sapphires, emeralds and semi-precious stones such as spinel, in calibrated sizes, matched pairs and layouts. Sorted by hand in Jaipur and shipped insured to your door.</p>
      
      <div style="display: flex; gap: 22px; align-items: center; margin-top: 26px; flex-wrap: wrap;">
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn">Shop gemstones</a>
        <a href="<?php echo esc_url(home_url('/layouts/')); ?>" class="ul2">Layouts for jewellers →</a>
      </div>

      <form action="<?php echo esc_url(home_url('/shop/')); ?>" method="get" class="hsearch">
        <input type="text" id="hs" name="s" placeholder="Search a stone, shape or reel code (e.g. RMCOC68)" aria-label="Search" />
        <button type="submit" aria-label="Search">
          <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="6.5"/><path d="M16 16l4.5 4.5"/></svg>
        </button>
      </form>
    </div>

    <!-- Right Hero Visual with Macro Tag and Layered Square Tiles (MATCHING DEMO IMAGE 1) -->
    <div class="art" id="para">
      <span class="vtag2" onclick="if(typeof openVideoModal === 'function'){ openVideoModal('emerald'); }">▶ Macro video plays here</span>
      
      <!-- 1. Sapphire (Large Square Tile: left 14%, top 6%, 280x280) -->
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>" class="tile" style="left: 14%; top: 6%; width: 280px; height: 280px; z-index: 2;" data-depth="0.200">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Ceylon Blue Sapphire">
      </a>

      <!-- 2. Ruby (Top-Right Square Tile: left 66%, top 0%, 170x170) -->
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>" class="tile" style="left: 66%; top: 0%; width: 170px; height: 170px; z-index: 3;" data-depth="0.121">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby">
      </a>

      <!-- 3. Rainbow Moonstone (Bottom-Right Square Tile: left 54%, top 48%, 210x210) -->
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=rainbow-moonstone')); ?>" class="tile" style="left: 54%; top: 48%; width: 210px; height: 210px; z-index: 1;" data-depth="0.150">
        <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone">
      </a>

      <!-- 4. Emerald (Bottom-Left Square Tile: left 2%, top 64%, 140x140) -->
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>" class="tile" style="left: 2%; top: 64%; width: 140px; height: 140px; z-index: 2;" data-depth="0.100">
        <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Emerald">
      </a>
    </div>

  </div>
</section>

<!-- 2. TRUST STRIP (SEPARATE HORIZONTAL STRIP BELOW HERO - BUILD BOOK PAGE 10) -->
<div class="trust2" style="background: var(--paper); border-bottom: 1px solid var(--line); display: flex; justify-content: center; gap: 40px; padding: 16px 20px; font-size: 12px; letter-spacing: 0.14em; color: var(--mute); text-transform: uppercase; flex-wrap: wrap;">
  <span><span style="color: var(--gold2); margin-right: 6px;">◆</span> CERTIFICATES ON REQUEST</span>
  <span><span style="color: var(--gold2); margin-right: 6px;">◆</span> INSURED SHIPPING</span>
  <span><span style="color: var(--gold2); margin-right: 6px;">◆</span> TRADE FAIR EXHIBITOR</span>
</div>

<!-- 3. FIND YOUR COLOUR / BY STONE TABS SECTION (100% MATCH FOR DEMO IMAGE 1 & 3) -->
<section class="sec wrap">
  <div class="sech">
    <div>
      <span class="cap">SHOP GEMSTONES</span>
      <h2 class="h2" id="home-gem-heading">Find your colour.</h2>
    </div>
    <div class="tabs">
      <button type="button" class="tab-btn on" id="btn-col-colour" onclick="setGemTab('colour')">By colour</button>
      <button type="button" class="tab-btn" id="btn-col-stone" onclick="setGemTab('stone')">By stone</button>
    </div>
  </div>

  <!-- TAB 1: BY COLOUR (6 TILES MATCHING DEMO COLOUR_TILES) -->
  <div class="tiles6" id="panel-tab-colour" style="display: grid; grid-template-columns: repeat(6, minmax(0, 1fr)); gap: 16px;">
    
    <a href="<?php echo esc_url(home_url('/shop/?filter_color=blue')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp cl1" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; position: relative; border: 1px solid var(--line);">
        <em class="dot" style="position: absolute; left: 10px; top: 10px; width: 14px; height: 14px; border-radius: 50%; border: 2px solid #fff; box-shadow: 0 0 0 1px var(--line2); background: #2B547E;"></em>
        <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Blue" style="width: 70%; object-fit: contain;">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Blue</b>
      <small style="font-size: 12px; color: var(--soft);">Sapphire, topaz, tanzanite</small>
    </a>

    <a href="<?php echo esc_url(home_url('/shop/?filter_color=red')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp cl1" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; position: relative; border: 1px solid var(--line);">
        <em class="dot" style="position: absolute; left: 10px; top: 10px; width: 14px; height: 14px; border-radius: 50%; border: 2px solid #fff; box-shadow: 0 0 0 1px var(--line2); background: #A81C28;"></em>
        <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Red" style="width: 70%; object-fit: contain;">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Red</b>
      <small style="font-size: 12px; color: var(--soft);">Ruby, garnet, spinel</small>
    </a>

    <a href="<?php echo esc_url(home_url('/shop/?filter_color=pink')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp cl1" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; position: relative; border: 1px solid var(--line);">
        <em class="dot" style="position: absolute; left: 10px; top: 10px; width: 14px; height: 14px; border-radius: 50%; border: 2px solid #fff; box-shadow: 0 0 0 1px var(--line2); background: #E07A9A;"></em>
        <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Pink" style="width: 70%; object-fit: contain; filter: hue-rotate(330deg);">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Pink</b>
      <small style="font-size: 12px; color: var(--soft);">Pink sapphire, spinel, tourmaline</small>
    </a>

    <a href="<?php echo esc_url(home_url('/shop/?filter_color=green')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp cl1" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; position: relative; border: 1px solid var(--line);">
        <em class="dot" style="position: absolute; left: 10px; top: 10px; width: 14px; height: 14px; border-radius: 50%; border: 2px solid #fff; box-shadow: 0 0 0 1px var(--line2); background: #2E8B57;"></em>
        <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Green" style="width: 70%; object-fit: contain;">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Green</b>
      <small style="font-size: 12px; color: var(--soft);">Emerald, tsavorite, peridot</small>
    </a>

    <a href="<?php echo esc_url(home_url('/shop/?filter_color=yellow')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp cl1" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; position: relative; border: 1px solid var(--line);">
        <em class="dot" style="position: absolute; left: 10px; top: 10px; width: 14px; height: 14px; border-radius: 50%; border: 2px solid #fff; box-shadow: 0 0 0 1px var(--line2); background: #D4A017;"></em>
        <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Yellow" style="width: 70%; object-fit: contain; filter: hue-rotate(190deg);">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Yellow</b>
      <small style="font-size: 12px; color: var(--soft);">Yellow sapphire, citrine</small>
    </a>

    <a href="<?php echo esc_url(home_url('/shop/?filter_color=purple')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp cl1" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; position: relative; border: 1px solid var(--line);">
        <em class="dot" style="position: absolute; left: 10px; top: 10px; width: 14px; height: 14px; border-radius: 50%; border: 2px solid #fff; box-shadow: 0 0 0 1px var(--line2); background: #6A3B7B;"></em>
        <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Purple" style="width: 70%; object-fit: contain; filter: hue-rotate(260deg);">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Purple</b>
      <small style="font-size: 12px; color: var(--soft);">Amethyst, purple sapphire</small>
    </a>

  </div>

  <!-- TAB 2: BY STONE (6 TILES MATCHING DEMO STONE_TILES) -->
  <div class="tiles6" id="panel-tab-stone" style="display: none; grid-template-columns: repeat(6, minmax(0, 1fr)); gap: 16px;">
    
    <a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; border: 1px solid var(--line);">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby" style="width: 70%; object-fit: contain;">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Ruby</b>
      <small style="font-size: 12px; color: var(--soft);">Pigeon blood & heated</small>
    </a>

    <a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; border: 1px solid var(--line);">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Sapphire" style="width: 70%; object-fit: contain;">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Sapphire</b>
      <small style="font-size: 12px; color: var(--soft);">Ceylon blue, yellow & fancy</small>
    </a>

    <a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; border: 1px solid var(--line);">
        <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Emerald" style="width: 70%; object-fit: contain;">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Emerald</b>
      <small style="font-size: 12px; color: var(--soft);">Zambian & Colombian</small>
    </a>

    <a href="<?php echo esc_url(home_url('/shop/?filter_stone=spinel')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; border: 1px solid var(--line);">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Spinel" style="width: 70%; object-fit: contain; filter: hue-rotate(340deg);">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Spinel</b>
      <small style="font-size: 12px; color: var(--soft);">Red, hot pink & cobalt blue</small>
    </a>

    <a href="<?php echo esc_url(home_url('/shop/?filter_stone=topaz')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; border: 1px solid var(--line);">
        <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Topaz" style="width: 70%; object-fit: contain;">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Topaz</b>
      <small style="font-size: 12px; color: var(--soft);">Sky, Swiss & London blue</small>
    </a>

    <a href="<?php echo esc_url(home_url('/shop/?filter_stone=rainbow-moonstone')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; border: 1px solid var(--line);">
        <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone" style="width: 70%; object-fit: contain;">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Rainbow Moonstone</b>
      <small style="font-size: 12px; color: var(--soft);">Blue flash & cabochon</small>
    </a>

  </div>
  
  <p id="all-stones-link" style="text-align: right; margin: 14px 0 0; display: none;">
    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="ul2" style="text-decoration: none; font-size: 13px; font-weight: 600; border-bottom: 1px solid currentColor;">All stones →</a>
  </p>
</section>

<!-- 4. LAYOUTS FOR JEWELLERS SECTION (EXACT DEMO LAY2) -->
<section class="wrap" style="padding-bottom: 72px;">
  <div class="lay2" style="display: grid; grid-template-columns: minmax(0, 1.1fr) minmax(0, 1fr); gap: 56px; align-items: center;">
    
    <div class="lp rv" style="background: var(--paper); aspect-ratio: 4/3; position: relative; overflow: hidden;">
      <?php echo vivaaz_render_lay_art('ruby', 1.5); ?>
    </div>

    <div>
      <span class="cap">FOR JEWELLERS</span>
      <h2 class="h2" style="font-size: 40px; margin-top: 8px;">Layouts, matched stone by stone.</h2>
      <p class="lead" style="margin-top: 10px; font-size: 15px; color: var(--mute); line-height: 1.6;">
        Graduated lines and matched sets in ruby, spinel, blue topaz and more. Send us your design or CAD and we match colour, cut and size to it.
      </p>

      <div class="facts3" style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 20px; margin: 24px 0 28px; padding-top: 16px; border-top: 1px solid var(--line);">
        <div>
          <b style="display: block; font-size: 24px; font-family: var(--display); font-weight: 400;">1–10</b>
          <span style="font-size: 12px; color: var(--mute);">mm calibrated</span>
        </div>
        <div>
          <b style="display: block; font-size: 24px; font-family: var(--display); font-weight: 400;">±0.1</b>
          <span style="font-size: 12px; color: var(--mute);">mm size match</span>
        </div>
        <div>
          <b style="display: block; font-size: 24px; font-family: var(--display); font-weight: 400;">Any</b>
          <span style="font-size: 12px; color: var(--mute);">drawing or CAD</span>
        </div>
      </div>

      <div style="display: flex; gap: 22px; align-items: center; flex-wrap: wrap;">
        <a href="<?php echo esc_url(home_url('/layouts/')); ?>" class="btn" style="text-decoration: none;">See layouts</a>
        <a href="<?php echo esc_url(home_url('/layouts/?stone=ruby')); ?>" class="ul2" style="text-decoration: none; border-bottom: 1px solid currentColor;">Ruby layouts →</a>
        <a href="<?php echo esc_url(home_url('/layouts/?stone=spinel')); ?>" class="ul2" style="text-decoration: none; border-bottom: 1px solid currentColor;">Spinel layouts →</a>
        <a href="javascript:void(0);" onclick="openDesignQuoteModal();" class="ul2" style="text-decoration: none; border-bottom: 1px solid currentColor;">Send your design →</a>
      </div>
    </div>

  </div>
</section>

<!-- 5. SHOP BEADS BY SHAPE SECTION -->
<section class="sec wrap" style="padding-top: 0; padding-bottom: 72px;">
  <div class="sech" style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 24px;">
    <div>
      <span class="cap">SHOP BEADS</span>
      <h2 class="h2">Beads, by shape.</h2>
    </div>
    <a href="<?php echo esc_url(home_url('/beads/')); ?>" class="ul2" style="text-decoration: none; border-bottom: 1px solid currentColor;">View all beads →</a>
  </div>

  <div class="tiles6" style="display: grid; grid-template-columns: repeat(6, minmax(0, 1fr)); gap: 16px;">
    
    <a href="<?php echo esc_url(home_url('/beads/?shape=Round')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px;">
        <?php echo vivaaz_render_bead_strand('Round', '#3c9ad6', 260); ?>
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Round</b>
    </a>

    <a href="<?php echo esc_url(home_url('/beads/?shape=Rondelle')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px;">
        <?php echo vivaaz_render_bead_strand('Rondelle', '#b02a3a', 260); ?>
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Rondelle</b>
    </a>

    <a href="<?php echo esc_url(home_url('/beads/?shape=Faceted%20rondelle')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px;">
        <?php echo vivaaz_render_bead_strand('Faceted rondelle', '#8e1b2c', 260); ?>
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Faceted rondelle</b>
    </a>

    <a href="<?php echo esc_url(home_url('/beads/?shape=Nugget')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px;">
        <?php echo vivaaz_render_bead_strand('Nugget', '#7d4fb5', 260); ?>
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Nugget</b>
    </a>

    <a href="<?php echo esc_url(home_url('/beads/?shape=Chips')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px;">
        <?php echo vivaaz_render_bead_strand('Chips', '#8fae3a', 260); ?>
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Chips</b>
    </a>

    <a href="<?php echo esc_url(home_url('/beads/?shape=Heishi')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px;">
        <?php echo vivaaz_render_bead_strand('Heishi', '#2f9d9d', 260); ?>
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Heishi</b>
    </a>

  </div>
</section>

<!-- 6. NEW ARRIVALS / BEST SELLERS SECTION (EXACT DEMO 4-CARD GRID WITH QUICK VIEW) -->
<section class="wrap" style="padding-bottom: 72px;">
  <div class="sech">
    <div class="tabs tabs2">
      <button type="button" class="tab-btn on" id="btn-na-new" onclick="setNaTab('new')">New arrivals</button>
      <button type="button" class="tab-btn" id="btn-na-best" onclick="setNaTab('best')">Best sellers</button>
    </div>
    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="ul2">View all →</a>
  </div>

  <div class="grid g4" style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 26px 22px;">
    
    <!-- Product 1: Rainbow Moonstone Oval Cabochon (Calibrated Lot) -->
    <div class="card rv" style="background: var(--paper); border: 1px solid #EFE9E0; display: flex; flex-direction: column; position: relative;">
      <span class="tag" style="position: absolute; left: 12px; top: 12px; background: var(--paper); padding: 5px 8px; font-size: 10.5px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; z-index: 2; border: 1px solid var(--line);">CALIBRATED LOT</span>
      <button type="button" class="heart-btn-circle" onclick="toggleWishlistBtn('rmcoc68', this);" aria-label="Save to wishlist" style="position: absolute; right: 12px; top: 12px; width: 34px; height: 34px; border-radius: 50%; background: var(--paper); border: 1px solid var(--line); display: flex; align-items: center; justify-content: center; z-index: 2; cursor: pointer;">
        <svg class="i" style="width: 16px; height: 16px; color: var(--ink);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
      </button>
      <div class="ph" style="aspect-ratio: 1/1; background: #F1F0EE; display: flex; align-items: center; justify-content: center; position: relative; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>'">
        <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone" style="width: 70%; object-fit: contain;">
        <div class="qv-bar" onclick="event.stopPropagation(); openQuickViewModal('rmcoc68');" style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(255,255,255,0.92); padding: 9px; text-align: center; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">QUICK VIEW</div>
      </div>
      <div class="cb" style="padding: 16px 18px 20px; display: flex; flex-direction: column; flex: 1;">
        <div class="nm" style="font-family: var(--display); font-size: 19px; font-weight: 400; color: var(--ink); margin-bottom: 4px; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>'">Rainbow Moonstone Oval Cabochon</div>
        <div class="dt" style="font-size: 12.5px; color: var(--soft); margin-bottom: 10px;">Cabochon · 3×4 to 12×16 mm · 8 sizes</div>
        <div class="pr" style="font-size: 16px; font-weight: 600; color: var(--ink); margin-top: auto; margin-bottom: 14px;">from ₹94 <span style="font-size: 12px; font-weight: 400; color: var(--mute);">per piece</span></div>
        <button type="button" class="btn sm" onclick="addToCartAjax('rmcoc68', '3×4 mm', 10);" style="width: 100%; text-transform: uppercase; font-weight: 700; letter-spacing: 0.12em;">ADD TO CART</button>
      </div>
    </div>

    <!-- Product 2: Sapphire Oval Faceted (Calibrated Lot) -->
    <div class="card rv" style="background: var(--paper); border: 1px solid #EFE9E0; display: flex; flex-direction: column; position: relative;">
      <span class="tag" style="position: absolute; left: 12px; top: 12px; background: var(--paper); padding: 5px 8px; font-size: 10.5px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; z-index: 2; border: 1px solid var(--line);">CALIBRATED LOT</span>
      <button type="button" class="heart-btn-circle" onclick="toggleWishlistBtn('bsfov', this);" aria-label="Save to wishlist" style="position: absolute; right: 12px; top: 12px; width: 34px; height: 34px; border-radius: 50%; background: var(--paper); border: 1px solid var(--line); display: flex; align-items: center; justify-content: center; z-index: 2; cursor: pointer;">
        <svg class="i" style="width: 16px; height: 16px; color: var(--ink);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
      </button>
      <div class="ph" style="aspect-ratio: 1/1; background: #F1F0EE; display: flex; align-items: center; justify-content: center; position: relative; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Sapphire" style="width: 70%; object-fit: contain;">
        <div class="qv-bar" onclick="event.stopPropagation(); openQuickViewModal('bsfov');" style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(255,255,255,0.92); padding: 9px; text-align: center; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">QUICK VIEW</div>
      </div>
      <div class="cb" style="padding: 16px 18px 20px; display: flex; flex-direction: column; flex: 1;">
        <div class="nm" style="font-family: var(--display); font-size: 19px; font-weight: 400; color: var(--ink); margin-bottom: 4px; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">Sapphire Oval Faceted</div>
        <div class="dt" style="font-size: 12.5px; color: var(--soft); margin-bottom: 10px;">Faceted · 3×5 to 7×9 mm · 5 sizes</div>
        <div class="pr" style="font-size: 16px; font-weight: 600; color: var(--ink); margin-top: auto; margin-bottom: 14px;">from ₹1,131 <span style="font-size: 12px; font-weight: 400; color: var(--mute);">per piece</span></div>
        <button type="button" class="btn sm" onclick="addToCartAjax('bsfov', '3×5 mm', 5);" style="width: 100%; text-transform: uppercase; font-weight: 700; letter-spacing: 0.12em;">ADD TO CART</button>
      </div>
    </div>

    <!-- Product 3: Rainbow Moonstone Oval Cabochon Pair (Pair) -->
    <div class="card rv" style="background: var(--paper); border: 1px solid #EFE9E0; display: flex; flex-direction: column; position: relative;">
      <span class="tag" style="position: absolute; left: 12px; top: 12px; background: var(--paper); padding: 5px 8px; font-size: 10.5px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; z-index: 2; border: 1px solid var(--line);">PAIR</span>
      <button type="button" class="heart-btn-circle" onclick="toggleWishlistBtn('rmcpr', this);" aria-label="Save to wishlist" style="position: absolute; right: 12px; top: 12px; width: 34px; height: 34px; border-radius: 50%; background: var(--paper); border: 1px solid var(--line); display: flex; align-items: center; justify-content: center; z-index: 2; cursor: pointer;">
        <svg class="i" style="width: 16px; height: 16px; color: var(--ink);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
      </button>
      <div class="ph" style="aspect-ratio: 1/1; background: #F1F0EE; display: flex; align-items: center; justify-content: center; position: relative; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>'">
        <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Pair" style="width: 70%; object-fit: contain;">
        <div class="qv-bar" onclick="event.stopPropagation(); openQuickViewModal('rmcpr');" style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(255,255,255,0.92); padding: 9px; text-align: center; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">QUICK VIEW</div>
      </div>
      <div class="cb" style="padding: 16px 18px 20px; display: flex; flex-direction: column; flex: 1;">
        <div class="nm" style="font-family: var(--display); font-size: 19px; font-weight: 400; color: var(--ink); margin-bottom: 4px; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>'">Rainbow Moonstone Oval Cabochon Pair</div>
        <div class="dt" style="font-size: 12.5px; color: var(--soft); margin-bottom: 10px;">Cabochon · 10×12 mm · 1 pair</div>
        <div class="pr" style="font-size: 16px; font-weight: 600; color: var(--ink); margin-top: auto; margin-bottom: 14px;">₹2,600 <span style="font-size: 12px; font-weight: 400; color: var(--mute);">per pair</span></div>
        <button type="button" class="btn sm" onclick="addToCartAjax('rmcpr', '10×12 mm', 1);" style="width: 100%; text-transform: uppercase; font-weight: 700; letter-spacing: 0.12em;">ADD TO CART</button>
      </div>
    </div>

    <!-- Product 4: Rainbow Moonstone Oval Cabochon Single (Only 1) -->
    <div class="card rv" style="background: var(--paper); border: 1px solid #EFE9E0; display: flex; flex-direction: column; position: relative;">
      <span class="tag" style="position: absolute; left: 12px; top: 12px; background: #1C1A17; color: #FFFFFF; padding: 5px 8px; font-size: 10.5px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; z-index: 2; border: 1px solid #1C1A17;">ONLY 1</span>
      <button type="button" class="heart-btn-circle" onclick="toggleWishlistBtn('rmc1825', this);" aria-label="Save to wishlist" style="position: absolute; right: 12px; top: 12px; width: 34px; height: 34px; border-radius: 50%; background: var(--paper); border: 1px solid var(--line); display: flex; align-items: center; justify-content: center; z-index: 2; cursor: pointer;">
        <svg class="i" style="width: 16px; height: 16px; color: var(--ink);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
      </button>
      <div class="ph" style="aspect-ratio: 1/1; background: #F1F0EE; display: flex; align-items: center; justify-content: center; position: relative; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>'">
        <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone 32ct" style="width: 70%; object-fit: contain;">
        <div class="qv-bar" onclick="event.stopPropagation(); openQuickViewModal('rmc1825');" style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(255,255,255,0.92); padding: 9px; text-align: center; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">QUICK VIEW</div>
      </div>
      <div class="cb" style="padding: 16px 18px 20px; display: flex; flex-direction: column; flex: 1;">
        <div class="nm" style="font-family: var(--display); font-size: 19px; font-weight: 400; color: var(--ink); margin-bottom: 4px; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>'">Rainbow Moonstone Oval Cabochon</div>
        <div class="dt" style="font-size: 12.5px; color: var(--soft); margin-bottom: 10px;">Cabochon · 18×25 mm · 32 ct</div>
        <div class="pr" style="font-size: 16px; font-weight: 600; color: var(--ink); margin-top: auto; margin-bottom: 14px;">₹4,800 <span style="font-size: 12px; font-weight: 400; color: var(--mute);">one stone</span></div>
        <button type="button" class="btn sm" onclick="addToCartAjax('rmc1825', '18×25 mm', 1);" style="width: 100%; text-transform: uppercase; font-weight: 700; letter-spacing: 0.12em;">ADD TO CART</button>
      </div>
    </div>

  </div>
</section>

<!-- 7. OUR STORY SECTION (EXACT DEMO STORY2 WITH VIDEO PREVIEW & OUTLINE BUTTON) -->
<section class="wrap story2" style="display: grid; grid-template-columns: minmax(0, 1.1fr) minmax(0, 1fr); gap: 56px; align-items: center; padding-bottom: 72px;">
  
  <button type="button" class="rv vid" onclick="openVideoModal('emerald');" style="position: relative; aspect-ratio: 16/11; background: #151311; display: flex; align-items: center; justify-content: center; overflow: hidden; border: 0; cursor: pointer; padding: 0;">
    <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Emerald Under Loupe" style="width: 70%; max-height: 85%; object-fit: contain;">
    <span class="vg" style="position: absolute; inset: 0; background: radial-gradient(circle, transparent 20%, #151311 75%); pointer-events: none;"></span>
    <span class="pl" style="position: absolute; left: 18px; bottom: 16px; width: 40px; height: 40px; border-radius: 50%; border: 1px solid #CFC6B8; background: transparent; color: #FFFFFF; display: flex; align-items: center; justify-content: center; font-size: 13px;">▶</span>
    <span class="vc" style="position: absolute; left: 68px; bottom: 28px; color: #CFC6B8; font-size: 12px; letter-spacing: 0.14em; font-weight: 700; text-transform: uppercase;">UNDER THE LOUPE · 0:40</span>
  </button>

  <div>
    <span class="cap">OUR STORY</span>
    <h2 class="h2" style="font-size: 38px; margin-top: 8px;">A Jaipur family in gemstones for over thirty years.</h2>
    <p class="lead" style="margin: 14px 0 22px; font-size: 15px; color: var(--mute); line-height: 1.6;">
      Vivaaz Gems began in 2018, built on a family trade in coloured stones that goes back more than three decades. We sort, calibrate and match every lot by hand in Jaipur, and source in Bangkok, so the stones you receive look like the stones you saw.
    </p>

    <div class="facts3" style="display: grid; grid-template-columns: repeat(2, max-content); gap: 40px; margin-bottom: 28px; padding-top: 16px; border-top: 1px solid var(--line);">
      <div>
        <b style="display: block; font-size: 26px; font-family: var(--display); font-weight: 400;">30+</b>
        <span style="font-size: 12px; color: var(--mute);">years in gemstones</span>
      </div>
      <div>
        <b style="display: block; font-size: 26px; font-family: var(--display); font-weight: 400;">3</b>
        <span style="font-size: 12px; color: var(--mute);">offices, Jaipur and Bangkok</span>
      </div>
    </div>

    <!-- Outline Button .btn.o (PDF Spec: Never Solid Black!) -->
    <a href="<?php echo esc_url(home_url('/about/')); ?>" class="btn o" style="border: 1px solid var(--ink); background: transparent; color: var(--ink); padding: 12px 24px; text-transform: uppercase; font-size: 11px; letter-spacing: 0.12em; font-weight: 700; text-decoration: none; display: inline-block;">
      READ OUR STORY
    </a>
  </div>

</section>

<!-- 8. INSTAGRAM REELS SECTION (EXACT DEMO REELS5 ROW) -->
<section class="sec wrap" style="padding-top: 0; padding-bottom: 72px;">
  <div class="sech" style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 20px;">
    <div>
      <span class="cap">@VIVAAZGEMS</span>
      <h2 class="h2">Seen on Instagram.</h2>
    </div>
    <div style="display: flex; gap: 22px;">
      <a href="<?php echo esc_url(home_url('/reels/')); ?>" class="ul2" style="text-decoration: none; border-bottom: 1px solid currentColor;">All reels →</a>
      <a href="https://instagram.com/vivaazgems" target="_blank" class="ul2" style="text-decoration: none; border-bottom: 1px solid currentColor;">Follow us →</a>
    </div>
  </div>
  <p style="margin: -8px 0 18px; color: var(--mute); font-size: 14px;">Tap a reel to shop the exact stone in it.</p>

  <div class="reels5" style="display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 16px;">
    
    <!-- Reel 1 -->
    <div class="reelc" style="display: flex; flex-direction: column; gap: 10px;">
      <div class="reel" style="position: relative; aspect-ratio: 9/16; background: #151311; border: 1px solid var(--line); overflow: hidden; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Reel Sapphire" style="width: 100%; height: 100%; object-fit: cover; transform: scale(1.4);">
        <span style="position: absolute; inset: 0; background: linear-gradient(transparent 55%, rgba(0,0,0,0.65));"></span>
        <span class="rp" style="position: absolute; right: 10px; top: 10px; width: 30px; height: 30px; border-radius: 50%; background: rgba(28,26,23,.6); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 12px;">▶</span>
      </div>
      <div class="rcb" style="display: flex; flex-direction: column; gap: 3px; font-size: 13px;">
        <b style="font-weight: 600; font-size: 13.5px; color: var(--ink);">Ceylon Blue Sapphire Lot</b>
        <span class="rpr" style="color: var(--ink); font-weight: 600; font-size: 13px;">₹ 105 <small style="font-weight: 400; color: var(--mute); font-size: 11.5px;">/ pc</small></span>
        <span class="rcode" style="font-size: 11px; letter-spacing: 0.08em; color: var(--soft);">VG-SPH-0705</span>
        <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" class="ul" style="margin-top: 4px; align-self: flex-start; font-size: 11px; text-decoration: none;">See stone →</a>
      </div>
    </div>

    <!-- Reel 2 -->
    <div class="reelc" style="display: flex; flex-direction: column; gap: 10px;">
      <div class="reel" style="position: relative; aspect-ratio: 9/16; background: #151311; border: 1px solid var(--line); overflow: hidden; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Reel Spinel" style="width: 100%; height: 100%; object-fit: cover; transform: scale(1.4);">
        <span style="position: absolute; inset: 0; background: linear-gradient(transparent 55%, rgba(0,0,0,0.65));"></span>
        <span class="rp" style="position: absolute; right: 10px; top: 10px; width: 30px; height: 30px; border-radius: 50%; background: rgba(28,26,23,.6); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 12px;">▶</span>
      </div>
      <div class="rcb" style="display: flex; flex-direction: column; gap: 3px; font-size: 13px;">
        <b style="font-weight: 600; font-size: 13.5px; color: var(--ink);">Burma Spinel Matched Pair</b>
        <span class="rpr" style="color: var(--ink); font-weight: 600; font-size: 13px;">₹ 280 <small style="font-weight: 400; color: var(--mute); font-size: 11.5px;">/ pc</small></span>
        <span class="rcode" style="font-size: 11px; letter-spacing: 0.08em; color: var(--soft);">VG-SPN-PR01</span>
        <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" class="ul" style="margin-top: 4px; align-self: flex-start; font-size: 11px; text-decoration: none;">See stone →</a>
      </div>
    </div>

    <!-- Reel 3 -->
    <div class="reelc" style="display: flex; flex-direction: column; gap: 10px;">
      <div class="reel" style="position: relative; aspect-ratio: 9/16; background: #151311; border: 1px solid var(--line); overflow: hidden; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">
        <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Reel Emerald" style="width: 100%; height: 100%; object-fit: cover; transform: scale(1.4);">
        <span style="position: absolute; inset: 0; background: linear-gradient(transparent 55%, rgba(0,0,0,0.65));"></span>
        <span class="rp" style="position: absolute; right: 10px; top: 10px; width: 30px; height: 30px; border-radius: 50%; background: rgba(28,26,23,.6); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 12px;">▶</span>
      </div>
      <div class="rcb" style="display: flex; flex-direction: column; gap: 3px; font-size: 13px;">
        <b style="font-weight: 600; font-size: 13.5px; color: var(--ink);">Zambian Emerald Octagon</b>
        <span class="rpr" style="color: var(--ink); font-weight: 600; font-size: 13px;">₹ 450 <small style="font-weight: 400; color: var(--mute); font-size: 11.5px;">/ pc</small></span>
        <span class="rcode" style="font-size: 11px; letter-spacing: 0.08em; color: var(--soft);">VG-EMR-OCT8</span>
        <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" class="ul" style="margin-top: 4px; align-self: flex-start; font-size: 11px; text-decoration: none;">See stone →</a>
      </div>
    </div>

    <!-- Reel 4 -->
    <div class="reelc" style="display: flex; flex-direction: column; gap: 10px;">
      <div class="reel" style="position: relative; aspect-ratio: 9/16; background: #151311; border: 1px solid var(--line); overflow: hidden; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">
        <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Reel Moonstone" style="width: 100%; height: 100%; object-fit: cover; transform: scale(1.4);">
        <span style="position: absolute; inset: 0; background: linear-gradient(transparent 55%, rgba(0,0,0,0.65));"></span>
        <span class="rp" style="position: absolute; right: 10px; top: 10px; width: 30px; height: 30px; border-radius: 50%; background: rgba(28,26,23,.6); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 12px;">▶</span>
      </div>
      <div class="rcb" style="display: flex; flex-direction: column; gap: 3px; font-size: 13px;">
        <b style="font-weight: 600; font-size: 13.5px; color: var(--ink);">Rainbow Moonstone Oval</b>
        <span class="rpr" style="color: var(--ink); font-weight: 600; font-size: 13px;">₹ 106 <small style="font-weight: 400; color: var(--mute); font-size: 11.5px;">/ pc</small></span>
        <span class="rcode" style="font-size: 11px; letter-spacing: 0.08em; color: var(--soft);">RMCOC68</span>
        <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" class="ul" style="margin-top: 4px; align-self: flex-start; font-size: 11px; text-decoration: none;">See stone →</a>
      </div>
    </div>

    <!-- Reel 5 -->
    <div class="reelc" style="display: flex; flex-direction: column; gap: 10px;">
      <div class="reel" style="position: relative; aspect-ratio: 9/16; background: #151311; border: 1px solid var(--line); overflow: hidden; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">
        <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Reel Topaz" style="width: 100%; height: 100%; object-fit: cover; transform: scale(1.4);">
        <span style="position: absolute; inset: 0; background: linear-gradient(transparent 55%, rgba(0,0,0,0.65));"></span>
        <span class="rp" style="position: absolute; right: 10px; top: 10px; width: 30px; height: 30px; border-radius: 50%; background: rgba(28,26,23,.6); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 12px;">▶</span>
      </div>
      <div class="rcb" style="display: flex; flex-direction: column; gap: 3px; font-size: 13px;">
        <b style="font-weight: 600; font-size: 13.5px; color: var(--ink);">London Blue Topaz Round</b>
        <span class="rpr" style="color: var(--ink); font-weight: 600; font-size: 13px;">₹ 92 <small style="font-weight: 400; color: var(--mute); font-size: 11.5px;">/ pc</small></span>
        <span class="rcode" style="font-size: 11px; letter-spacing: 0.08em; color: var(--soft);">VG-TPZ-RD4</span>
        <a href="<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" class="ul" style="margin-top: 4px; align-self: flex-start; font-size: 11px; text-decoration: none;">See stone →</a>
      </div>
    </div>

  </div>
</section>

<!-- 9. REVIEWS & TALK TO A GEM EXPERT (EXACT DEMO REV2 & ASKBOX) -->
<section class="wrap" id="reviews" style="padding-bottom: 72px;">
  <div class="rev2" style="display: grid; grid-template-columns: minmax(0, 1.4fr) minmax(0, 1fr); gap: 48px; align-items: start;">
    
    <div>
      <span class="cap" style="font-size: 10.5px; letter-spacing: 0.2em; color: var(--gold); font-weight: 700; text-transform: uppercase; display: block; margin-bottom: 4px;">GOOGLE REVIEWS</span>
      <h2 class="h2" style="font-size: 38px; font-family: var(--display); font-weight: 400; color: var(--ink); margin: 0 0 24px;">What buyers say.</h2>

      <div class="rv3" style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 24px; margin-bottom: 24px;">
        
        <div class="rv" style="border-top: 1px solid var(--ink); padding-top: 16px; display: flex; flex-direction: column; gap: 10px; background: transparent; border-left: 0; border-right: 0; border-bottom: 0;">
          <span style="color: var(--gold2); letter-spacing: 3px; font-size: 13px;">★★★★★</span>
          <p style="font-size: 13.5px; line-height: 1.55; margin: 0; color: var(--ink);">The calibrated lot matched perfectly. Every stone was the same size and colour, and the video before packing helped a lot.</p>
          <small style="font-size: 12px; color: var(--soft); margin-top: auto;">Anita R. · Mumbai</small>
        </div>

        <div class="rv" style="border-top: 1px solid var(--ink); padding-top: 16px; display: flex; flex-direction: column; gap: 10px; background: transparent; border-left: 0; border-right: 0; border-bottom: 0;">
          <span style="color: var(--gold2); letter-spacing: 3px; font-size: 13px;">★★★★★</span>
          <p style="font-size: 13.5px; line-height: 1.55; margin: 0; color: var(--ink);">Ordered a ruby pair for earrings. Live photos on WhatsApp, insured courier, no surprises at delivery.</p>
          <small style="font-size: 12px; color: var(--soft); margin-top: auto;">James W. · London</small>
        </div>

        <div class="rv" style="border-top: 1px solid var(--ink); padding-top: 16px; display: flex; flex-direction: column; gap: 10px; background: transparent; border-left: 0; border-right: 0; border-bottom: 0;">
          <span style="color: var(--gold2); letter-spacing: 3px; font-size: 13px;">★★★★★</span>
          <p style="font-size: 13.5px; line-height: 1.55; margin: 0; color: var(--ink);">The astrologer explained everything calmly. The ruby they suggested was within my budget and came with a certificate.</p>
          <small style="font-size: 12px; color: var(--soft); margin-top: auto;">Priya S. · Jaipur</small>
        </div>

      </div>

      <a href="<?php echo esc_url(home_url('/reviews/')); ?>" class="ul2" style="text-decoration: none; border-bottom: 1px solid currentColor; font-size: 13px; font-weight: 600; color: var(--ink);">Read all reviews →</a>
    </div>

    <!-- Talk to a Gem Expert Box (Exact Image 5 Askbox) -->
    <div class="askbox" style="background: #FFFFFF; border: 1px solid var(--line); padding: 32px 30px; display: flex; flex-direction: column; gap: 10px;">
      <span class="cap" style="font-size: 10.5px; letter-spacing: 0.2em; color: var(--gold); font-weight: 700; text-transform: uppercase;">TALK TO A GEM EXPERT</span>
      <b style="font-size: 24px; font-family: var(--display); font-weight: 400; color: var(--ink); line-height: 1.25; margin: 4px 0 0;">Not sure what to choose? Ask us.</b>
      <p style="font-size: 13.5px; color: var(--mute); line-height: 1.55; margin: 0 0 12px;">
        We send live photos and videos of the exact stones, and help with sizes, matching and certificates.
      </p>

      <div style="display: flex; flex-direction: column; gap: 10px;">
        <a href="https://wa.me/919680552270?text=Hello,%20I%20would%20like%20to%20inquire%20about%20your%20gemstones." target="_blank" class="btn wa" style="background: #25D366; color: #FFFFFF; border: none; padding: 13px 20px; font-size: 11px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; display: flex; align-items: center; justify-content: center; gap: 8px; text-decoration: none; border-radius: 0;">
          <svg class="i" style="width: 17px; height: 17px; fill: currentColor;" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
          WHATSAPP
        </a>
        <a href="javascript:void(0);" onclick="openConsultationModal();" class="btn o" style="background: transparent; border: 1px solid var(--ink); color: var(--ink); padding: 13px 20px; font-size: 11px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; display: flex; align-items: center; justify-content: center; gap: 8px; text-decoration: none; border-radius: 0;">
          <svg class="i" style="width: 17px; height: 17px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
          BOOK A VIDEO CALL
        </a>
      </div>
    </div>

  </div>
</section>

<!-- 10. THE TRADE BANNER (EXACT MATCH FOR CLIENT PHONE DEMO) -->
<section class="wrap mobile-trade-banner" style="padding-block: 30px;">
  <div style="background: var(--sand, #EFE8DD); padding: 26px 20px;">
    <span class="cap" style="font-size: 10.5px; letter-spacing: 0.2em; color: var(--gold, #9B7C4E); font-weight: 700; text-transform: uppercase;">THE TRADE</span>
    <h2 class="h2" style="font-size: 26px; font-family: var(--display); font-weight: 400; margin: 6px 0 10px;">Buying for a workshop or brand?</h2>
    <p style="color: var(--mute, #76706A); margin: 0 0 16px; font-size: 14px; line-height: 1.55;">Wholesale pricing from 50 pieces, custom cuts to your CAD, and matched layouts for collections.</p>
    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
      <a href="<?php echo esc_url(home_url('/bulk-enquiry/')); ?>" class="btn sm" style="text-decoration: none;">Bulk enquiry</a>
      <a href="https://wa.me/919680552270" target="_blank" class="btn sm o" style="text-decoration: none;">WhatsApp the team</a>
    </div>
  </div>
</section>

<!-- Home Tab Switcher Scripts -->
<script>
  function setGemTab(tab) {
    var btnColour = document.getElementById('btn-col-colour');
    var btnStone = document.getElementById('btn-col-stone');
    var panelColour = document.getElementById('panel-tab-colour');
    var panelStone = document.getElementById('panel-tab-stone');
    var heading = document.getElementById('home-gem-heading');
    var allStonesLink = document.getElementById('all-stones-link');

    if (tab === 'colour') {
      if (btnColour) {
        btnColour.classList.add('on');
        btnColour.classList.add('active');
        btnColour.style.color = '#1C1A17';
        btnColour.style.borderBottomColor = '#1C1A17';
      }
      if (btnStone) {
        btnStone.classList.remove('on');
        btnStone.classList.remove('active');
        btnStone.style.color = '#9A9186';
        btnStone.style.borderBottomColor = 'transparent';
      }
      if (panelColour) panelColour.style.display = 'grid';
      if (panelStone) panelStone.style.display = 'none';
      if (heading) heading.textContent = 'Find your colour.';
      if (allStonesLink) allStonesLink.style.display = 'none';
    } else {
      if (btnStone) {
        btnStone.classList.add('on');
        btnStone.classList.add('active');
        btnStone.style.color = '#1C1A17';
        btnStone.style.borderBottomColor = '#1C1A17';
      }
      if (btnColour) {
        btnColour.classList.remove('on');
        btnColour.classList.remove('active');
        btnColour.style.color = '#9A9186';
        btnColour.style.borderBottomColor = 'transparent';
      }
      if (panelStone) panelStone.style.display = 'grid';
      if (panelColour) panelColour.style.display = 'none';
      if (heading) heading.textContent = 'Find your stone.';
      if (allStonesLink) allStonesLink.style.display = 'block';
    }
  }

  function setNaTab(tab) {
    var btnNew = document.getElementById('btn-na-new');
    var btnBest = document.getElementById('btn-na-best');
    if (tab === 'new') {
      if (btnNew) {
        btnNew.classList.add('on');
        btnNew.classList.add('active');
        btnNew.style.color = '#1C1A17';
        btnNew.style.borderBottomColor = '#1C1A17';
      }
      if (btnBest) {
        btnBest.classList.remove('on');
        btnBest.classList.remove('active');
        btnBest.style.color = '#9A9186';
        btnBest.style.borderBottomColor = 'transparent';
      }
    } else {
      if (btnBest) {
        btnBest.classList.add('on');
        btnBest.classList.add('active');
        btnBest.style.color = '#1C1A17';
        btnBest.style.borderBottomColor = '#1C1A17';
      }
      if (btnNew) {
        btnNew.classList.remove('on');
        btnNew.classList.remove('active');
        btnNew.style.color = '#9A9186';
        btnNew.style.borderBottomColor = 'transparent';
      }
    }
  }

  function toggleWishlistBtn(id, btn) {
    if (typeof toggleProductWishlist === 'function') {
      toggleProductWishlist(id, 'Product', '', '₹ 0', '', btn);
    } else {
      btn.classList.toggle('on');
    }
  }

  function addToCartAjax(id, size, qty) {
    if (typeof vivaazAddToCartAjax === 'function') {
      vivaazAddToCartAjax(id, size, qty);
    } else if (typeof openCartDrawer === 'function') {
      openCartDrawer();
    }
  }

  // Parallax floating stones on hero scroll (100% demo match)
  window.addEventListener('scroll', function() {
    var p = document.getElementById('para');
    if (!p || (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches)) return;
    var y = window.scrollY;
    var tiles = p.querySelectorAll('[data-depth]');
    tiles.forEach(function(el) {
      var d = parseFloat(el.getAttribute('data-depth')) || 0;
      el.style.transform = 'translateY(' + (y * d) + 'px)';
    });
  }, { passive: true });
</script>

<?php
get_footer();
