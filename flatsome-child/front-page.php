<?php
/**
 * Vivaaz Gems Theme - Front Page Template
 * 100% Exact Implementation of Client Desktop & Phone Demos and Build Book.
 */
get_header();
?>

<!-- 1. HERO SECTION (EXACT DEMO HERO2 / HERO WITH PLAYFAIR 68PX REGULAR & FLOATING STONES) -->
<section class="hero-banner-section" style="background: linear-gradient(135deg, #F1EBE1, #F7F3EC); padding: 56px 0; min-height: 500px; border-bottom: 1px solid var(--line);">
  <div class="wrap" style="display: grid; grid-template-columns: minmax(0, 1.05fr) minmax(0, 1fr); gap: 40px; align-items: center;">
    
    <div class="rv hero-left-content">
      <span class="cap" style="display: block; margin-bottom: 8px;">NATURAL COLOURED GEMSTONES · JAIPUR</span>
      <h1 class="h1" style="font-family: var(--display); font-weight: 400; font-size: clamp(38px, 4.8vw, 68px); line-height: 1.04; margin: 12px 0 16px; color: var(--ink); text-wrap: balance;">
        Loose gemstones,<br>calibrated and matched.
      </h1>
      <p class="lead" style="font-size: 15px; color: var(--mute); max-width: 54ch; margin: 0 0 24px; line-height: 1.6;">
        Rubies, sapphires, emeralds and semi-precious stones such as spinel, in calibrated sizes, matched pairs and layouts. Sorted by hand in Jaipur and shipped insured to your door.
      </p>

      <!-- Action Buttons (Main Black + Outline Underline Link) -->
      <div style="display: flex; gap: 22px; align-items: center; margin-top: 24px; flex-wrap: wrap;">
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn" style="text-decoration: none;">
          SHOP GEMSTONES
        </a>
        <a href="<?php echo esc_url(home_url('/layouts/')); ?>" class="ul2" style="font-size: 13px; font-weight: 600; text-decoration: none; border-bottom: 1px solid currentColor; padding-bottom: 2px;">
          Layouts for jewellers →
        </a>
      </div>

      <!-- Live Search Box (Directly Under Buttons - Point 14 Spec) -->
      <form action="<?php echo esc_url(home_url('/shop/')); ?>" method="get" class="hsearch2" style="display: flex; align-items: center; gap: 10px; border-bottom: 1px solid var(--line2); max-width: 440px; margin-top: 28px; padding: 8px 0;">
        <svg class="i" style="width: 16px; height: 16px; color: var(--soft);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        <input type="text" id="hs" name="s" placeholder="Search a stone, shape or reel code (e.g. RMCOC68)" aria-label="Search" style="flex: 1; border: 0; background: transparent; min-width: 0; font-size: 14px; outline: none;" />
      </form>
    </div>

    <!-- Right Hero Visual with Macro Tag and Layered Parallax Gemstones -->
    <div class="hart" id="para" style="position: relative; height: 420px; overflow: hidden;">
      <a href="javascript:void(0);" onclick="openVideoModal('emerald');" class="vtag2" style="position: absolute; right: 0; top: 0; background: var(--paper); font-size: 11px; letter-spacing: 0.12em; padding: 7px 12px; color: var(--mute); text-decoration: none; border: 1px solid var(--line); z-index: 4; font-weight: 600;">
        ▶ Macro video plays here
      </a>
      
      <!-- Big Center Stone -->
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>" class="big" style="position: absolute; left: 10%; top: 12%; width: 66%; aspect-ratio: 1; border-radius: 50%; overflow: hidden; box-shadow: 0 30px 60px rgba(28,26,23,.15); display: block;">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Ceylon Blue Sapphire" style="width: 100%; height: 100%; object-fit: cover; transform: scale(1.2);">
      </a>
      
      <!-- Small Floating 1 -->
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>" class="sm1" style="position: absolute; right: 6%; top: 8%; width: 22%; aspect-ratio: 1; border-radius: 50%; overflow: hidden; box-shadow: 0 10px 20px rgba(28,26,23,.15); display: block;">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby" style="width: 100%; height: 100%; object-fit: cover; transform: scale(1.2);">
      </a>

      <!-- Small Floating 2 -->
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>" class="sm2" style="position: absolute; right: 2%; bottom: 6%; width: 26%; aspect-ratio: 1; border-radius: 50%; overflow: hidden; box-shadow: 0 10px 20px rgba(28,26,23,.15); display: block;">
        <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Emerald" style="width: 100%; height: 100%; object-fit: cover; transform: scale(1.2);">
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

<!-- 3. FIND YOUR COLOUR / BY STONE TABS SECTION -->
<section class="sec wrap" style="padding-block: 72px;">
  <div class="sech" style="display: flex; justify-content: space-between; align-items: flex-end; gap: 20px; margin-bottom: 28px; flex-wrap: wrap; border-bottom: 1px solid var(--line); padding-bottom: 12px;">
    <div>
      <span class="cap">SHOP GEMSTONES</span>
      <h2 class="h2" id="home-gem-heading">Find your colour.</h2>
    </div>
    <div class="tabs" style="display: flex; gap: 24px;">
      <button type="button" class="tab-btn on" id="btn-col-colour" onclick="setGemTab('colour')" style="background: none; border: none; padding-bottom: 10px; font-size: 13px; letter-spacing: 0.12em; font-weight: 700; color: var(--ink); border-bottom: 2px solid var(--ink); cursor: pointer; text-transform: uppercase;">By colour</button>
      <button type="button" class="tab-btn" id="btn-col-stone" onclick="setGemTab('stone')" style="background: none; border: none; padding-bottom: 10px; font-size: 13px; letter-spacing: 0.12em; font-weight: 600; color: var(--soft); border-bottom: 2px solid transparent; cursor: pointer; text-transform: uppercase;">By stone</button>
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
    
    <div class="lp rv" style="background: var(--paper); aspect-ratio: 4/3; position: relative; border: 1px solid var(--line); display: flex; align-items: center; justify-content: center; overflow: hidden;">
      <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby Matched Layout" style="width: 75%; height: auto; object-fit: contain;">
      <div style="position: absolute; bottom: 14px; left: 16px; font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--mute);">
        Graduated Line · 29 Stones · 3.5–6.0 mm
      </div>
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
  <div class="sech" style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 24px; border-bottom: 1px solid var(--line); padding-bottom: 12px;">
    <div>
      <span class="cap">SHOP BEADS</span>
      <h2 class="h2">Beads, by shape.</h2>
    </div>
    <a href="<?php echo esc_url(home_url('/beads/')); ?>" class="ul2" style="text-decoration: none; border-bottom: 1px solid currentColor;">View all beads →</a>
  </div>

  <div class="tiles6" style="display: grid; grid-template-columns: repeat(6, minmax(0, 1fr)); gap: 16px;">
    
    <a href="<?php echo esc_url(home_url('/beads/?shape=Round')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; border: 1px solid var(--line);">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Round Beads" style="width: 70%; object-fit: contain;">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Round</b>
    </a>

    <a href="<?php echo esc_url(home_url('/beads/?shape=Rondelle')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; border: 1px solid var(--line);">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Rondelle Beads" style="width: 70%; object-fit: contain;">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Rondelle</b>
    </a>

    <a href="<?php echo esc_url(home_url('/beads/?shape=Faceted%20rondelle')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; border: 1px solid var(--line);">
        <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Faceted Rondelle" style="width: 70%; object-fit: contain;">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Faceted rondelle</b>
    </a>

    <a href="<?php echo esc_url(home_url('/beads/?shape=Nugget')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; border: 1px solid var(--line);">
        <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Nugget Beads" style="width: 70%; object-fit: contain;">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Nugget</b>
    </a>

    <a href="<?php echo esc_url(home_url('/beads/?shape=Chips')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; border: 1px solid var(--line);">
        <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Chips Beads" style="width: 70%; object-fit: contain;">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Chips</b>
    </a>

    <a href="<?php echo esc_url(home_url('/beads/?shape=Heishi')); ?>" class="tl2 rv" style="text-decoration: none;">
      <span class="tp" style="aspect-ratio: 4/5; background: var(--paper); display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 8px; border: 1px solid var(--line);">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Heishi Beads" style="width: 70%; object-fit: contain; filter: hue-rotate(300deg);">
      </span>
      <b style="font-size: 14px; font-weight: 600; color: var(--ink);">Heishi</b>
    </a>

  </div>
</section>

<!-- 6. NEW ARRIVALS / BEST SELLERS SECTION (EXACT DEMO 4-CARD GRID WITH QUICK VIEW) -->
<section class="wrap" style="padding-bottom: 72px;">
  <div class="sech" style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 24px; border-bottom: 1px solid var(--line); padding-bottom: 12px;">
    <div class="tabs tabs2" style="display: flex; gap: 24px;">
      <button type="button" class="tab-btn on" id="btn-na-new" onclick="setNaTab('new')" style="background: none; border: none; padding-bottom: 10px; font-size: 13px; letter-spacing: 0.12em; font-weight: 700; color: var(--ink); border-bottom: 2px solid var(--ink); cursor: pointer; text-transform: uppercase;">New arrivals</button>
      <button type="button" class="tab-btn" id="btn-na-best" onclick="setNaTab('best')" style="background: none; border: none; padding-bottom: 10px; font-size: 13px; letter-spacing: 0.12em; font-weight: 600; color: var(--soft); border-bottom: 2px solid transparent; cursor: pointer; text-transform: uppercase;">Best sellers</button>
    </div>
    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="ul2" style="text-decoration: none; border-bottom: 1px solid currentColor;">View all →</a>
  </div>

  <div class="grid g4" style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 26px 22px;">
    
    <!-- Product 1 -->
    <div class="card rv" style="background: var(--paper); border: 1px solid #EFE9E0; display: flex; flex-direction: column; position: relative;">
      <span class="tag" style="position: absolute; left: 12px; top: 12px; background: var(--paper); padding: 5px 8px; font-size: 10.5px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; z-index: 2; border: 1px solid var(--line);">CALIBRATED LOT</span>
      <button type="button" class="heart-btn-circle" onclick="toggleWishlistBtn('rmcoc68', this);" aria-label="Save to wishlist" style="position: absolute; right: 12px; top: 12px; width: 34px; height: 34px; border-radius: 50%; background: var(--paper); border: 1px solid var(--line); display: flex; align-items: center; justify-content: center; z-index: 2; cursor: pointer;">
        <svg class="i" style="width: 16px; height: 16px; color: var(--ink);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
      </button>
      <div class="ph" style="aspect-ratio: 1/1; background: #F1F0EE; display: flex; align-items: center; justify-content: center; position: relative; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Ceylon Sapphire" style="width: 70%; object-fit: contain;">
        <div class="qv-bar" onclick="event.stopPropagation(); openQuickViewModal('rmcoc68');" style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(255,255,255,0.92); padding: 9px; text-align: center; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">QUICK VIEW</div>
      </div>
      <div class="cb" style="padding: 16px 18px 20px; display: flex; flex-direction: column; flex: 1;">
        <div class="nm" style="font-family: var(--display); font-size: 19px; font-weight: 400; color: var(--ink); margin-bottom: 4px; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">Ceylon Blue Sapphire Oval</div>
        <div class="dt" style="font-size: 12.5px; color: var(--soft); margin-bottom: 10px;">7×5 mm · AAA Calibrated</div>
        <div class="pr" style="font-size: 16px; font-weight: 600; color: var(--ink); margin-top: auto; margin-bottom: 14px;">₹ 1,450 <span style="font-size: 12px; font-weight: 400; color: var(--mute);">per piece</span></div>
        <button type="button" class="btn sm" onclick="addToCartAjax('rmcoc68', '7×5 mm', 10);" style="width: 100%;">Add to cart</button>
      </div>
    </div>

    <!-- Product 2 -->
    <div class="card rv" style="background: var(--paper); border: 1px solid #EFE9E0; display: flex; flex-direction: column; position: relative;">
      <span class="tag" style="position: absolute; left: 12px; top: 12px; background: var(--paper); padding: 5px 8px; font-size: 10.5px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; z-index: 2; border: 1px solid var(--line);">MATCHED PAIR</span>
      <button type="button" class="heart-btn-circle" onclick="toggleWishlistBtn('rbpair', this);" aria-label="Save to wishlist" style="position: absolute; right: 12px; top: 12px; width: 34px; height: 34px; border-radius: 50%; background: var(--paper); border: 1px solid var(--line); display: flex; align-items: center; justify-content: center; z-index: 2; cursor: pointer;">
        <svg class="i" style="width: 16px; height: 16px; color: var(--ink);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
      </button>
      <div class="ph" style="aspect-ratio: 1/1; background: #F1F0EE; display: flex; align-items: center; justify-content: center; position: relative; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby Pair" style="width: 70%; object-fit: contain;">
        <div class="qv-bar" onclick="event.stopPropagation(); openQuickViewModal('rbpair');" style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(255,255,255,0.92); padding: 9px; text-align: center; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">QUICK VIEW</div>
      </div>
      <div class="cb" style="padding: 16px 18px 20px; display: flex; flex-direction: column; flex: 1;">
        <div class="nm" style="font-family: var(--display); font-size: 19px; font-weight: 400; color: var(--ink); margin-bottom: 4px; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">Burma Ruby Oval Matched Pair</div>
        <div class="dt" style="font-size: 12.5px; color: var(--soft); margin-bottom: 10px;">6×4 mm · 2 Stones Matched</div>
        <div class="pr" style="font-size: 16px; font-weight: 600; color: var(--ink); margin-top: auto; margin-bottom: 14px;">₹ 6,800 <span style="font-size: 12px; font-weight: 400; color: var(--mute);">for the pair</span></div>
        <button type="button" class="btn sm" onclick="addToCartAjax('rbpair', '6×4 mm', 1);" style="width: 100%;">Add to cart</button>
      </div>
    </div>

    <!-- Product 3 -->
    <div class="card rv" style="background: var(--paper); border: 1px solid #EFE9E0; display: flex; flex-direction: column; position: relative;">
      <span class="tag" style="position: absolute; left: 12px; top: 12px; background: var(--paper); padding: 5px 8px; font-size: 10.5px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; z-index: 2; border: 1px solid var(--line);">ONLY 1</span>
      <button type="button" class="heart-btn-circle" onclick="toggleWishlistBtn('emroct', this);" aria-label="Save to wishlist" style="position: absolute; right: 12px; top: 12px; width: 34px; height: 34px; border-radius: 50%; background: var(--paper); border: 1px solid var(--line); display: flex; align-items: center; justify-content: center; z-index: 2; cursor: pointer;">
        <svg class="i" style="width: 16px; height: 16px; color: var(--ink);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
      </button>
      <div class="ph" style="aspect-ratio: 1/1; background: #F1F0EE; display: flex; align-items: center; justify-content: center; position: relative; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">
        <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Emerald" style="width: 70%; object-fit: contain;">
        <div class="qv-bar" onclick="event.stopPropagation(); openQuickViewModal('emroct');" style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(255,255,255,0.92); padding: 9px; text-align: center; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">QUICK VIEW</div>
      </div>
      <div class="cb" style="padding: 16px 18px 20px; display: flex; flex-direction: column; flex: 1;">
        <div class="nm" style="font-family: var(--display); font-size: 19px; font-weight: 400; color: var(--ink); margin-bottom: 4px; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">Zambian Emerald Octagon</div>
        <div class="dt" style="font-size: 12.5px; color: var(--soft); margin-bottom: 10px;">8×6 mm · 1.85 Carat Single</div>
        <div class="pr" style="font-size: 16px; font-weight: 600; color: var(--ink); margin-top: auto; margin-bottom: 14px;">₹ 24,500 <span style="font-size: 12px; font-weight: 400; color: var(--mute);">single stone</span></div>
        <button type="button" class="btn sm" onclick="addToCartAjax('emroct', '8×6 mm', 1);" style="width: 100%;">Add to cart</button>
      </div>
    </div>

    <!-- Product 4 -->
    <div class="card rv" style="background: var(--paper); border: 1px solid #EFE9E0; display: flex; flex-direction: column; position: relative;">
      <span class="tag" style="position: absolute; left: 12px; top: 12px; background: var(--paper); padding: 5px 8px; font-size: 10.5px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; z-index: 2; border: 1px solid var(--line);">CALIBRATED LOT</span>
      <button type="button" class="heart-btn-circle" onclick="toggleWishlistBtn('swtopaz', this);" aria-label="Save to wishlist" style="position: absolute; right: 12px; top: 12px; width: 34px; height: 34px; border-radius: 50%; background: var(--paper); border: 1px solid var(--line); display: flex; align-items: center; justify-content: center; z-index: 2; cursor: pointer;">
        <svg class="i" style="width: 16px; height: 16px; color: var(--ink);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
      </button>
      <div class="ph" style="aspect-ratio: 1/1; background: #F1F0EE; display: flex; align-items: center; justify-content: center; position: relative; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">
        <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Topaz" style="width: 70%; object-fit: contain;">
        <div class="qv-bar" onclick="event.stopPropagation(); openQuickViewModal('swtopaz');" style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(255,255,255,0.92); padding: 9px; text-align: center; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">QUICK VIEW</div>
      </div>
      <div class="cb" style="padding: 16px 18px 20px; display: flex; flex-direction: column; flex: 1;">
        <div class="nm" style="font-family: var(--display); font-size: 19px; font-weight: 400; color: var(--ink); margin-bottom: 4px; cursor: pointer;" onclick="window.location.href='<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>'">Swiss Blue Topaz Round Faceted</div>
        <div class="dt" style="font-size: 12.5px; color: var(--soft); margin-bottom: 10px;">4 mm · Calibrated AAA</div>
        <div class="pr" style="font-size: 16px; font-weight: 600; color: var(--ink); margin-top: auto; margin-bottom: 14px;">₹ 92 <span style="font-size: 12px; font-weight: 400; color: var(--mute);">per piece</span></div>
        <button type="button" class="btn sm" onclick="addToCartAjax('swtopaz', '4 mm', 25);" style="width: 100%;">Add to cart</button>
      </div>
    </div>

  </div>
</section>

<!-- 7. OUR STORY SECTION (EXACT DEMO STORY2 WITH VIDEO PREVIEW & OUTLINE BUTTON) -->
<section class="wrap story2" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: 50px; align-items: center; padding-bottom: 72px;">
  
  <button type="button" class="rv vid" onclick="openVideoModal('emerald');" style="position: relative; aspect-ratio: 16/11; background: #151311; display: flex; align-items: center; justify-content: center; overflow: hidden; border: 1px solid var(--line); cursor: pointer; padding: 0;">
    <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Emerald Under Loupe" style="width: 100%; height: 100%; object-fit: cover;">
    <span class="vg" style="position: absolute; inset: 0; background: radial-gradient(circle, transparent 20%, #151311 75%);"></span>
    <span class="pl" style="position: absolute; width: 44px; height: 44px; border-radius: 50%; background: rgba(28,26,23,.75); display: flex; align-items: center; justify-content: center; color: #FFFFFF; font-size: 18px;">▶</span>
    <span class="vc" style="position: absolute; left: 16px; bottom: 14px; font-size: 11px; letter-spacing: 0.16em; color: #F3EEE6; font-weight: 700; text-transform: uppercase;">UNDER THE LOUPE · 0:40</span>
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
    <a href="<?php echo esc_url(home_url('/about/')); ?>" class="btn o" style="text-decoration: none;">
      READ OUR STORY
    </a>
  </div>

</section>

<!-- 8. INSTAGRAM REELS SECTION (EXACT DEMO REELS5 ROW) -->
<section class="sec wrap" style="padding-top: 0; padding-bottom: 72px;">
  <div class="sech" style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 20px; border-bottom: 1px solid var(--line); padding-bottom: 12px;">
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
      <span class="cap">GOOGLE REVIEWS</span>
      <h2 class="h2" style="margin-top: 8px;">What buyers say.</h2>

      <div class="rv3" style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; margin: 24px 0 20px;">
        
        <div class="rv" style="background: var(--paper); border: 1px solid var(--line); padding: 18px; display: flex; flex-direction: column; gap: 8px;">
          <span style="color: var(--gold2); letter-spacing: 3px;">★★★★★</span>
          <p style="font-size: 13px; line-height: 1.5; margin: 0; color: var(--ink);">"Exceptional quality blue sapphires. Precision calibrated lot made setting completely seamless."</p>
          <small style="font-size: 11.5px; color: var(--soft); margin-top: auto;">Sophie M. · UK</small>
        </div>

        <div class="rv" style="background: var(--paper); border: 1px solid var(--line); padding: 18px; display: flex; flex-direction: column; gap: 8px;">
          <span style="color: var(--gold2); letter-spacing: 3px;">★★★★★</span>
          <p style="font-size: 13px; line-height: 1.5; margin: 0; color: var(--ink);">"The ruby layout arrived exactly matching the video call. Outstanding colour grading."</p>
          <small style="font-size: 11.5px; color: var(--soft); margin-top: auto;">Rajesh P. · Mumbai</small>
        </div>

        <div class="rv" style="background: var(--paper); border: 1px solid var(--line); padding: 18px; display: flex; flex-direction: column; gap: 8px;">
          <span style="color: var(--gold2); letter-spacing: 3px;">★★★★★</span>
          <p style="font-size: 13px; line-height: 1.5; margin: 0; color: var(--ink);">"Prompt insured delivery to Germany with lab report. Trustworthy family merchant."</p>
          <small style="font-size: 11.5px; color: var(--soft); margin-top: auto;">Klaus H. · Germany</small>
        </div>

      </div>

      <a href="<?php echo esc_url(home_url('/reviews/')); ?>" class="ul2" style="text-decoration: none; border-bottom: 1px solid currentColor;">Read all reviews →</a>
    </div>

    <!-- Talk to a Gem Expert Box (Exact WhatsApp + Video Call Buttons Pair) -->
    <div class="askbox" style="background: var(--sand); border: 1px solid var(--line); padding: 32px; display: flex; flex-direction: column; gap: 12px;">
      <span class="cap">TALK TO A GEM EXPERT</span>
      <b style="font-size: 20px; font-family: var(--display); font-weight: 400; color: var(--ink);">Not sure what to choose? Ask us.</b>
      <p style="font-size: 13.5px; color: var(--mute); line-height: 1.6; margin: 0 0 10px;">
        We send live photos and videos of the exact stones, and help with sizes, matching and certificates.
      </p>

      <div style="display: flex; flex-direction: column; gap: 10px;">
        <a href="https://wa.me/919680552270?text=Hello,%20I%20would%20like%20to%20inquire%20about%20your%20gemstones." target="_blank" class="btn wa" style="text-decoration: none; width: 100%;">
          <svg class="i" style="width: 17px; height: 17px; fill: currentColor;" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
          WHATSAPP
        </a>
        <a href="javascript:void(0);" onclick="openConsultationModal();" class="btn o" style="text-decoration: none; width: 100%;">
          <svg class="i" style="width: 17px; height: 17px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
          BOOK A VIDEO CALL
        </a>
      </div>
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
      btnColour.classList.add('on');
      btnColour.style.color = 'var(--ink)';
      btnColour.style.borderBottomColor = 'var(--ink)';
      btnStone.classList.remove('on');
      btnStone.style.color = 'var(--soft)';
      btnStone.style.borderBottomColor = 'transparent';
      panelColour.style.display = 'grid';
      panelStone.style.display = 'none';
      if (heading) heading.textContent = 'Find your colour.';
      if (allStonesLink) allStonesLink.style.display = 'none';
    } else {
      btnStone.classList.add('on');
      btnStone.style.color = 'var(--ink)';
      btnStone.style.borderBottomColor = 'var(--ink)';
      btnColour.classList.remove('on');
      btnColour.style.color = 'var(--soft)';
      btnColour.style.borderBottomColor = 'transparent';
      panelStone.style.display = 'grid';
      panelColour.style.display = 'none';
      if (heading) heading.textContent = 'Find your stone.';
      if (allStonesLink) allStonesLink.style.display = 'block';
    }
  }

  function setNaTab(tab) {
    var btnNew = document.getElementById('btn-na-new');
    var btnBest = document.getElementById('btn-na-best');
    if (tab === 'new') {
      btnNew.classList.add('on');
      btnNew.style.color = 'var(--ink)';
      btnNew.style.borderBottomColor = 'var(--ink)';
      btnBest.classList.remove('on');
      btnBest.style.color = 'var(--soft)';
      btnBest.style.borderBottomColor = 'transparent';
    } else {
      btnBest.classList.add('on');
      btnBest.style.color = 'var(--ink)';
      btnBest.style.borderBottomColor = 'var(--ink)';
      btnNew.classList.remove('on');
      btnNew.style.color = 'var(--soft)';
      btnNew.style.borderBottomColor = 'transparent';
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
</script>

<?php
get_footer();
