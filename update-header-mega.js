const fs = require('fs');
const path = require('path');

const headerPath = path.join(__dirname, 'flatsome-child', 'header.php');
const stylePath = path.join(__dirname, 'flatsome-child', 'style.css');

// 1. UPDATE flatsome-child/header.php
let headerContent = fs.readFileSync(headerPath, 'utf8');

// Insert PHP render helpers if not already present
if (!headerContent.includes('function vivaaz_render_lay_art')) {
  const phpHelpers = `
if (!function_exists('vivaaz_render_lay_art')) {
    function vivaaz_render_lay_art($stone = 'ruby', $scale = 0.8) {
        $w = 280;
        $h = 140;
        $n = 15;
        $c = '';
        for ($k = 0; $k < $n; $k++) {
            $t = $k / ($n - 1);
            $a = M_PI * (0.15 + 0.7 * $t);
            $x = 140 - 115 * cos($a);
            $y = 35 + 85 * sin($a);
            $size = (8 + 14 * sin(M_PI * $t)) * 0.9;
            $rx = round($size / 2, 1);
            $ry = round($size * 0.42, 1);
            $c .= '<ellipse cx="' . round($x, 1) . '" cy="' . round($y, 1) . '" rx="' . $rx . '" ry="' . $ry . '" fill="#A3122E" stroke="#7A0C22" stroke-width="0.8"/>';
            $c .= '<ellipse cx="' . round($x - $rx * 0.25, 1) . '" cy="' . round($y - $ry * 0.25, 1) . '" rx="' . round($rx * 0.4, 1) . '" ry="' . round($ry * 0.4, 1) . '" fill="#E84865" opacity="0.6"/>';
        }
        return '<svg viewBox="0 0 ' . $w . ' ' . $h . '" width="85%" style="max-width:260px; display:block; margin:0 auto;"><path d="M25 50 Q140 135 255 50" fill="none" stroke="#C9BFB1" stroke-width="0.8" stroke-dasharray="2,2"/>' . $c . '</svg>';
    }
}

if (!function_exists('vivaaz_render_bead_strand')) {
    function vivaaz_render_bead_strand($color = '#6b3fa0', $w = 260) {
        $n = 26;
        $R = 110;
        $cx = $w / 2;
        $cy = 20;
        $c = '';
        for ($k = 0; $k < $n; $k++) {
            $a = M_PI * (0.12 + 0.76 * $k / ($n - 1));
            $x = $cx - $R * cos($a);
            $y = $cy + $R * 0.8 * sin($a);
            $r = 6.5;
            $c .= '<ellipse cx="' . round($x, 1) . '" cy="' . round($y, 1) . '" rx="' . $r . '" ry="' . $r . '" fill="' . $color . '"/>';
            $c .= '<ellipse cx="' . round($x - $r * 0.3, 1) . '" cy="' . round($y - $r * 0.35, 1) . '" rx="' . ($r * 0.3) . '" ry="' . ($r * 0.22) . '" fill="#fff" opacity=".45"/>';
        }
        $h = round($w * 0.62);
        return '<svg viewBox="0 0 ' . $w . ' ' . $h . '" width="82%" style="max-width:100%; display:block; margin:0 auto;"><path d="M' . ($cx - $R) . ' ' . $cy . ' q0 -14 ' . $R . ' -16 q' . $R . ' 2 ' . $R . ' 16" stroke="#C9BFB1" fill="none" stroke-width="1.2"/>' . $c . '</svg>';
    }
}

if (!function_exists('vivaaz_render_tennis_art')) {
    function vivaaz_render_tennis_art($stone = 'spinel', $metal = '#D6D6D6', $scale = 0.55) {
        $w = 240;
        $h = 160;
        $cx = 120;
        $cy = 80;
        $rx = 85;
        $ry = 50;
        $n = 28;
        $c = '';
        for ($k = 0; $k < $n; $k++) {
            $a = 2 * M_PI * $k / $n;
            $x = $cx + $rx * cos($a);
            $y = $cy + $ry * sin($a);
            $r = 5;
            $c .= '<circle cx="' . round($x, 1) . '" cy="' . round($y, 1) . '" r="' . $r . '" fill="#FFFFFF" stroke="#CFC6B8" stroke-width="1.2"/>';
            $c .= '<circle cx="' . round($x - 1.2, 1) . '" cy="' . round($y - 1.2, 1) . '" r="1.5" fill="#E8E2D8"/>';
        }
        return '<svg viewBox="0 0 ' . $w . ' ' . $h . '" width="85%" style="max-width:210px; display:block; margin:0 auto;"><ellipse cx="' . $cx . '" cy="' . $cy . '" rx="' . $rx . '" ry="' . $ry . '" fill="none" stroke="#E2D7C6" stroke-width="1.2"/>' . $c . '</svg>';
    }
}
`;
  headerContent = headerContent.replace('$vivaaz_header_rendered = true;', '$vivaaz_header_rendered = true;' + phpHelpers);
}

// Find header wrapper region
const headerStartMarker = '<div class="site-header-wrapper">';
const headerEndMarker = '<!-- MOBILE SLIDE-IN MENU DRAWER';

const startIndex = headerContent.indexOf(headerStartMarker);
const endIndex = headerContent.indexOf(headerEndMarker);

if (startIndex === -1 || endIndex === -1) {
  console.error("Could not find markers in header.php");
  process.exit(1);
}

const newHeaderMarkup = `<div class="site-header-wrapper">
  <!-- TOP BAR (EXACT DEMO SPEC: HEIGHT 36px, COLOR #1C1A17, TEXT #F3EEE6) -->
  <div class="tb">
    <div class="wrap">
      <span>NATURAL GEMSTONES · INSURED SHIPPING WORLDWIDE</span>
      <div class="r">
        <a href="<?php echo esc_url(home_url('/contact/')); ?>">CONTACT</a>
        <a href="<?php echo esc_url(home_url('/track-order/')); ?>">TRACK ORDER</a>
        <div class="cur">
          <button type="button" id="curb" onclick="toggleCurrencyMenu(event)">IN | ₹ INR ▾</button>
          <div class="curm" id="curm" hidden>
            <button type="button" onclick="switchCurrency('INR')">IN | ₹ INR</button>
            <button type="button" onclick="switchCurrency('USD')">US | $ USD</button>
            <button type="button" onclick="switchCurrency('EUR')">EU | € EUR</button>
            <button type="button" onclick="switchCurrency('GBP')">UK | £ GBP</button>
            <button type="button" onclick="switchCurrency('AED')">AE | AED</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- MAIN HEADER (STICKY, LOGO LEFT, 5 MENUS CENTER, ICONS RIGHT) -->
  <header class="hd" id="hd">
    <div class="wrap">
      <!-- Mobile Hamburger Button -->
      <button type="button" class="mobile-hamburger-btn" onclick="toggleMobileMenuDrawer();" aria-label="Open Menu">
        <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M4 7.5h16M4 12h16M4 16.5h16"/></svg>
      </button>

      <!-- Logo: Pure Typography, Wide Letter Spacing (Demo 1:1, No Image Icon) -->
      <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
        <b>VIVAAZ GEMS</b>
        <span>JAIPUR · BANGKOK</span>
      </a>

      <!-- Desktop Centered Navigation (5 Menus with Thin Chevrons) -->
      <nav class="mn" aria-label="Main">
        <a class="mi" data-m="gems" href="<?php echo esc_url(home_url('/shop/')); ?>">GEMSTONES <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M7 10l5 5 5-5"/></svg></a>
        <a class="mi" data-m="layouts" href="<?php echo esc_url(home_url('/layouts/')); ?>">LAYOUTS <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M7 10l5 5 5-5"/></svg></a>
        <a class="mi" data-m="beads" href="<?php echo esc_url(home_url('/beads/')); ?>">BEADS <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M7 10l5 5 5-5"/></svg></a>
        <a class="mi" data-m="jewelry" href="<?php echo esc_url(home_url('/jewelry/')); ?>">JEWELRY <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M7 10l5 5 5-5"/></svg></a>
        <a class="mi" data-m="astro" href="<?php echo esc_url(home_url('/astrology/')); ?>">ASTROLOGY <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M7 10l5 5 5-5"/></svg></a>
      </nav>

      <!-- Right Action Icons (1.4px Stroke Width, Clean Thin Geometric SVGs) -->
      <div class="icons">
        <button type="button" onclick="toggleLiveSearchModal();" aria-label="Search">
          <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.35-4.35"/></svg>
        </button>

        <div class="has-account-dropdown">
          <a href="<?php echo esc_url(home_url('/my-account/')); ?>" aria-label="Account">
            <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="12" cy="8" r="4"/><path d="M5.5 20a6.5 6.5 0 0 1 13 0"/></svg>
          </a>
          <div class="account-hover-menu">
            <?php if (is_user_logged_in()) : 
              $current_user = wp_get_current_user();
            ?>
              <div style="padding: 10px 16px; font-size: 11px; font-weight: 700; color: #A37E3A; border-bottom: 1px solid #E2D7C6;">
                Hello, <?php echo esc_html($current_user->first_name ?: $current_user->display_name); ?>
              </div>
              <a href="<?php echo esc_url(home_url('/my-account/')); ?>">Dashboard</a>
              <a href="<?php echo esc_url(home_url('/my-account/orders/')); ?>">Orders</a>
              <a href="<?php echo esc_url(home_url('/wishlist/')); ?>">Wishlist</a>
              <div style="height: 1px; background: #E2D7C6; margin: 4px 0;"></div>
              <a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" style="color: #A3122E;">Sign Out / Logout →</a>
            <?php else : ?>
              <a href="<?php echo esc_url(home_url('/my-account/')); ?>">Sign In / Login</a>
              <a href="<?php echo esc_url(home_url('/my-account/?action=register')); ?>">Create an Account</a>
              <a href="<?php echo esc_url(home_url('/track-order/')); ?>">Track Order</a>
              <a href="<?php echo esc_url(home_url('/wishlist/')); ?>">Wishlist</a>
            <?php endif; ?>
          </div>
        </div>

        <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" aria-label="Wishlist">
          <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg>
          <span class="badge" id="wb"></span>
        </a>

        <button type="button" onclick="openCartDrawer();" aria-label="Bag">
          <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M5.5 8.5h13l-1 11.5h-11z"/><path d="M9 8.5V7a3 3 0 0 1 6 0v1.5"/></svg>
          <span class="badge" id="cb"><?php echo (function_exists('WC') && WC()->cart && WC()->cart->get_cart_contents_count() > 0) ? WC()->cart->get_cart_contents_count() : ''; ?></span>
        </button>
      </div>
    </div>

    <!-- FULL WIDTH MEGA MENU CONTAINER (EDGE-TO-EDGE, EXACT DEMO SPEC) -->
    <div class="mega" id="mega" style="display: none;">
      
      <!-- 1. GEMSTONES MEGA PANEL -->
      <div class="mega-panel" id="mega-panel-gems" data-m="gems" style="display: none;">
        <div class="wrap">
          <div class="col">
            <h6>PRECIOUS</h6>
            <a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>" data-ph="ruby" onmouseenter="updateGemsMegaPhoto('ruby')">Ruby</a>
            <a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>" data-ph="sapphire" onmouseenter="updateGemsMegaPhoto('sapphire')">Sapphire</a>
            <a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>" data-ph="emerald" onmouseenter="updateGemsMegaPhoto('emerald')">Emerald</a>
            <a class="lk" href="<?php echo esc_url(home_url('/shop/?filter_group=precious')); ?>">All precious stones →</a>
          </div>

          <div class="col three">
            <h6>SEMI-PRECIOUS · A TO Z</h6>
            <div class="ls">
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=agate')); ?>" data-ph="agate" onmouseenter="updateGemsMegaPhoto('agate')">Agate</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=amazonite')); ?>" data-ph="amazonite" onmouseenter="updateGemsMegaPhoto('amazonite')">Amazonite</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=amber')); ?>" data-ph="amber" onmouseenter="updateGemsMegaPhoto('amber')">Amber</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=amethyst')); ?>" data-ph="amethyst" onmouseenter="updateGemsMegaPhoto('amethyst')">Amethyst</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=aquamarine')); ?>" data-ph="aquamarine" onmouseenter="updateGemsMegaPhoto('aquamarine')">Aquamarine</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=aventurine')); ?>" data-ph="aventurine" onmouseenter="updateGemsMegaPhoto('aventurine')">Aventurine</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=carnelian')); ?>" data-ph="carnelian" onmouseenter="updateGemsMegaPhoto('carnelian')">Carnelian</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=citrine')); ?>" data-ph="citrine" onmouseenter="updateGemsMegaPhoto('citrine')">Citrine</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=garnet')); ?>" data-ph="garnet" onmouseenter="updateGemsMegaPhoto('garnet')">Garnet</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=green-jade')); ?>" data-ph="green-jade" onmouseenter="updateGemsMegaPhoto('green-jade')">Green Jade</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=iolite')); ?>" data-ph="iolite" onmouseenter="updateGemsMegaPhoto('iolite')">Iolite</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=labradorite')); ?>" data-ph="labradorite" onmouseenter="updateGemsMegaPhoto('labradorite')">Labradorite</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=lapis-lazuli')); ?>" data-ph="lapis-lazuli" onmouseenter="updateGemsMegaPhoto('lapis-lazuli')">Lapis Lazuli</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=larimar')); ?>" data-ph="larimar" onmouseenter="updateGemsMegaPhoto('larimar')">Larimar</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=malachite')); ?>" data-ph="malachite" onmouseenter="updateGemsMegaPhoto('malachite')">Malachite</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=onyx')); ?>" data-ph="onyx" onmouseenter="updateGemsMegaPhoto('onyx')">Onyx</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=opal')); ?>" data-ph="opal" onmouseenter="updateGemsMegaPhoto('opal')">Opal</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=peridot')); ?>" data-ph="peridot" onmouseenter="updateGemsMegaPhoto('peridot')">Peridot</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=prehnite')); ?>" data-ph="prehnite" onmouseenter="updateGemsMegaPhoto('prehnite')">Prehnite</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=rainbow-moonstone')); ?>" data-ph="rainbow-moonstone" onmouseenter="updateGemsMegaPhoto('rainbow-moonstone')">Rainbow Moonstone</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=rose-quartz')); ?>" data-ph="rose-quartz" onmouseenter="updateGemsMegaPhoto('rose-quartz')">Rose Quartz</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=spinel')); ?>" data-ph="spinel" onmouseenter="updateGemsMegaPhoto('spinel')">Spinel</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=tanzanite')); ?>" data-ph="tanzanite" onmouseenter="updateGemsMegaPhoto('tanzanite')">Tanzanite</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=tiger-eye')); ?>" data-ph="tiger-eye" onmouseenter="updateGemsMegaPhoto('tiger-eye')">Tiger Eye</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=topaz')); ?>" data-ph="topaz" onmouseenter="updateGemsMegaPhoto('topaz')">Topaz</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=tourmaline')); ?>" data-ph="tourmaline" onmouseenter="updateGemsMegaPhoto('tourmaline')">Tourmaline</a>
              <a href="<?php echo esc_url(home_url('/shop/?filter_stone=turquoise')); ?>" data-ph="turquoise" onmouseenter="updateGemsMegaPhoto('turquoise')">Turquoise</a>
            </div>
            <a class="lk" href="<?php echo esc_url(home_url('/shop/?filter_group=semi')); ?>">Other stones →</a>
          </div>

          <div class="col">
            <h6>BY CUT</h6>
            <a href="<?php echo esc_url(home_url('/shop/?filter_cut=faceted')); ?>">Faceted</a>
            <a href="<?php echo esc_url(home_url('/shop/?filter_cut=cabochon')); ?>">Cabochon</a>
            <a href="<?php echo esc_url(home_url('/shop/?filter_cut=rose-cut')); ?>">Rose cut</a>
            <a href="<?php echo esc_url(home_url('/shop/?filter_cut=briolette')); ?>">Briolette</a>
            <h6 style="margin-top: 22px;">SHOP BY</h6>
            <a href="<?php echo esc_url(home_url('/shop/?filter_by=colour')); ?>">Colour</a>
            <a href="<?php echo esc_url(home_url('/shop/?filter_by=shape')); ?>">Shape</a>
            <a href="<?php echo esc_url(home_url('/shop/?filter_by=price')); ?>">Price</a>
            <a href="<?php echo esc_url(home_url('/astrology/#birthstones')); ?>">Birthstones</a>
            <a href="<?php echo esc_url(home_url('/shop/?max_price=5000')); ?>">Gifts under ₹5,000</a>
            <a href="<?php echo esc_url(home_url('/shop/?filter_sold_as=calibrated')); ?>">Pairs &amp; calibrated lots</a>
          </div>

          <!-- Light Photo Box on the Right -->
          <div class="mph" id="mph">
            <span class="cap">NEW THIS WEEK</span>
            <div class="pi">
              <img id="mph-img" src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone">
            </div>
            <b id="mph-name">Rainbow Moonstone</b>
            <small id="mph-desc">Cabochon lots from 3×4 mm, AAA</small>
            <a class="link" id="mph-link" href="<?php echo esc_url(home_url('/shop/?filter_stone=rainbow-moonstone')); ?>">Shop new arrivals →</a>
          </div>
        </div>
      </div>

      <!-- 2. LAYOUTS MEGA PANEL (EXACT MATCH FOR CLIENT IMAGE 1!) -->
      <div class="mega-panel" id="mega-panel-layouts" data-m="layouts" style="display: none;">
        <div class="wrap">
          <div class="col">
            <h6>BY STONE</h6>
            <a href="<?php echo esc_url(home_url('/layouts/?stone=ruby')); ?>" data-lph="ruby" onmouseenter="updateLayoutsMegaPhoto('ruby')">Ruby Layouts</a>
            <a href="<?php echo esc_url(home_url('/layouts/?stone=spinel')); ?>" data-lph="spinel" onmouseenter="updateLayoutsMegaPhoto('spinel')">Spinel Layouts</a>
            <a href="<?php echo esc_url(home_url('/layouts/?stone=blue-topaz')); ?>" data-lph="blue-topaz" onmouseenter="updateLayoutsMegaPhoto('blue-topaz')">Blue Topaz Layouts</a>
            <a href="<?php echo esc_url(home_url('/layouts/?stone=other')); ?>" data-lph="other" onmouseenter="updateLayoutsMegaPhoto('other')">Other Layouts</a>
            <a class="hi" href="<?php echo esc_url(home_url('/layouts/')); ?>">All layouts</a>
          </div>

          <div class="col">
            <h6>BY TYPE</h6>
            <a href="<?php echo esc_url(home_url('/layouts/?type=Necklace+lines')); ?>">Necklace lines</a>
            <a href="<?php echo esc_url(home_url('/layouts/?type=Bracelet+lines')); ?>">Bracelet lines</a>
            <a href="<?php echo esc_url(home_url('/layouts/?type=Pairs')); ?>">Pairs</a>
            <a href="<?php echo esc_url(home_url('/layouts/?type=Sets')); ?>">Sets</a>
          </div>

          <!-- Photo Card (Spans 2 Columns, light sand background, curved ruby layout art) -->
          <div class="mph" id="lph" style="grid-column: span 2;">
            <div class="pi" id="lph-pi" style="background: #F4F2EE; min-height: 160px; display: flex; align-items: center; justify-content: center;">
              <?php echo vivaaz_render_lay_art('ruby', 0.8); ?>
            </div>
            <b id="lph-name">Ruby Layouts</b>
            <small id="lph-desc">Graduated lines and matched pairs</small>
            <a class="link" id="lph-link" href="<?php echo esc_url(home_url('/layouts/?stone=ruby')); ?>">See ruby layouts →</a>
          </div>

          <!-- Dark Card on Right (Black background, gold title, SEND YOUR DESIGN button) -->
          <div class="dark">
            <span>Have a stone or a design?</span>
            <p>We match it. Send a photo and the size of your stone, or your design, and we match it from our stock.</p>
            <button type="button" class="btn sm lt" onclick="window.open('https://wa.me/919680552270?text=Hi%20Vivaaz%20Gems,%20I%20have%20a%20stone%20or%20design%20to%20match.', '_blank');">SEND YOUR DESIGN</button>
          </div>
        </div>
      </div>

      <!-- 3. BEADS MEGA PANEL (EXACT MATCH FOR CLIENT IMAGE 3!) -->
      <div class="mega-panel" id="mega-panel-beads" data-m="beads" style="display: none;">
        <div class="wrap">
          <div class="col">
            <h6>BY STONE</h6>
            <a href="<?php echo esc_url(home_url('/beads/?stone=Amethyst')); ?>">Amethyst</a>
            <a href="<?php echo esc_url(home_url('/beads/?stone=Garnet')); ?>">Garnet</a>
            <a href="<?php echo esc_url(home_url('/beads/?stone=Labradorite')); ?>">Labradorite</a>
            <a href="<?php echo esc_url(home_url('/beads/?stone=Rose+Quartz')); ?>">Rose Quartz</a>
            <a href="<?php echo esc_url(home_url('/beads/?stone=Turquoise')); ?>">Turquoise</a>
            <a class="hi" href="<?php echo esc_url(home_url('/beads/')); ?>">All stones</a>
          </div>

          <div class="col">
            <h6>BY BEAD SHAPE</h6>
            <a href="<?php echo esc_url(home_url('/beads/?shape=Round')); ?>">Round</a>
            <a href="<?php echo esc_url(home_url('/beads/?shape=Rondelle')); ?>">Rondelle</a>
            <a href="<?php echo esc_url(home_url('/beads/?shape=Faceted+rondelle')); ?>">Faceted rondelle</a>
            <a href="<?php echo esc_url(home_url('/beads/?shape=Nugget')); ?>">Nugget</a>
            <a href="<?php echo esc_url(home_url('/beads/?shape=Chips')); ?>">Chips</a>
            <a href="<?php echo esc_url(home_url('/beads/?shape=Heishi')); ?>">Heishi</a>
            <a href="<?php echo esc_url(home_url('/beads/?shape=Briolette+%26+drops')); ?>">Briolette &amp; drops</a>
            <a href="<?php echo esc_url(home_url('/beads/?shape=Coin+%26+cube')); ?>">Coin &amp; cube</a>
          </div>

          <div class="col">
            <h6>BY SIZE &amp; UNIT</h6>
            <a href="<?php echo esc_url(home_url('/beads/?size=2-4')); ?>">2–4 mm</a>
            <a href="<?php echo esc_url(home_url('/beads/?size=5-9')); ?>">5–9 mm</a>
            <a href="<?php echo esc_url(home_url('/beads/?size=10+')); ?>">10 mm and more</a>
            <a href="<?php echo esc_url(home_url('/beads/?sold=Strand')); ?>">Strands</a>
            <a href="<?php echo esc_url(home_url('/beads/?sold=Loose+pieces')); ?>">Loose pieces</a>
          </div>

          <div class="col"></div>

          <!-- Bead Strands Graphic Card -->
          <div class="mph">
            <div class="pi" style="background: #FAF7F2; min-height: 160px; display: flex; align-items: center; justify-content: center;">
              <?php echo vivaaz_render_bead_strand('#6b3fa0', 260); ?>
            </div>
            <b>Bead strands</b>
            <small>By the strand or as loose pieces</small>
            <a class="link" href="<?php echo esc_url(home_url('/beads/')); ?>">See all beads →</a>
          </div>
        </div>
      </div>

      <!-- 4. JEWELRY MEGA PANEL (EXACT MATCH FOR CLIENT IMAGE 1!) -->
      <div class="mega-panel" id="mega-panel-jewelry" data-m="jewelry" style="display: none;">
        <div class="wrap" style="grid-template-columns: 180px 180px 180px 1fr; gap: 34px; align-items: start;">
          <div class="col">
            <h6>BY STONE</h6>
            <a href="<?php echo esc_url(home_url('/jewelry/?stone=ruby')); ?>">Ruby</a>
            <a href="<?php echo esc_url(home_url('/jewelry/?stone=spinel')); ?>">Spinel</a>
            <a href="<?php echo esc_url(home_url('/jewelry/?stone=sapphire')); ?>">Sapphire</a>
            <a href="<?php echo esc_url(home_url('/jewelry/?stone=emerald')); ?>">Emerald</a>
            <a href="<?php echo esc_url(home_url('/jewelry/?stone=other')); ?>">Other stones</a>
          </div>

          <div class="col">
            <h6>BY TYPE</h6>
            <a href="<?php echo esc_url(home_url('/jewelry/?type=Tennis+bracelets')); ?>">Tennis bracelets</a>
            <a href="<?php echo esc_url(home_url('/jewelry/?type=Tennis+necklaces')); ?>">Tennis necklaces</a>
          </div>

          <div class="col">
            <h6>BY METAL</h6>
            <a href="<?php echo esc_url(home_url('/jewelry/?metal=925+Silver')); ?>">925 Silver</a>
            <a href="<?php echo esc_url(home_url('/jewelry/?metal=14K+Gold')); ?>">14K Gold</a>
            <a href="<?php echo esc_url(home_url('/jewelry/?metal=18K+Gold')); ?>">18K Gold</a>
          </div>

          <div class="mph mk" style="background: #FAF7F2; border: 1px solid #E2D7C6; padding: 22px; display: grid; grid-template-columns: 1fr 1.25fr; gap: 20px; align-items: center;">
            <div class="pi" style="background: #FFFFFF; border: 1px solid #E2D7C6; aspect-ratio: 4/3; display: flex; align-items: center; justify-content: center; min-height: 140px;">
              <?php echo vivaaz_render_tennis_art('spinel', '#D6D6D6', 0.55); ?>
            </div>
            <div style="display: flex; flex-direction: column; gap: 10px; justify-content: center;">
              <b style="font-family: 'Playfair Display', serif; font-size: 20px; font-weight: 400; color: #1C1A17; line-height: 1.2;">Make it into jewelry</b>
              <p style="margin: 0; font-size: 13px; line-height: 1.55; color: #7A7267;">
                Choose any stone from our shop and we set it in a ring, pendant or earrings, in silver or gold. Send us your idea; we send a sketch and a price.
              </p>
              <button type="button" onclick="window.open('https://wa.me/919680552270?text=Hi%20Vivaaz%20Gems,%20I%20would%20like%20to%20make%20a%20stone%20into%20custom%20jewelry.', '_blank');" style="background: #1C1A17; color: #FFFFFF; padding: 11px 22px; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; border: none; cursor: pointer; align-self: flex-start;">ASK FOR A QUOTE</button>
            </div>
          </div>
        </div>
      </div>

      <!-- 5. ASTROLOGY MEGA PANEL (EXACT MATCH FOR CLIENT IMAGE 3!) -->
      <div class="mega-panel" id="mega-panel-astro" data-m="astro" style="display: none;">
        <div class="wrap" style="grid-template-columns: 280px 240px 1fr; gap: 40px; align-items: start;">
          <div class="col">
            <h6>STONES FOR THE NINE PLANETS</h6>
            <a href="<?php echo esc_url(home_url('/astrology/#sun')); ?>">Sun · Ruby (Manik)</a>
            <a href="<?php echo esc_url(home_url('/astrology/#moon')); ?>">Moon · Pearl (Moti)</a>
            <a href="<?php echo esc_url(home_url('/astrology/#mars')); ?>">Mars · Red coral (Moonga)</a>
            <a href="<?php echo esc_url(home_url('/astrology/#mercury')); ?>">Mercury · Emerald (Panna)</a>
            <a href="<?php echo esc_url(home_url('/astrology/#jupiter')); ?>">Jupiter · Yellow sapphire (Pukhraj)</a>
            <a href="<?php echo esc_url(home_url('/astrology/#venus')); ?>">Venus · White sapphire (Safed pukhraj)</a>
            <a href="<?php echo esc_url(home_url('/astrology/#saturn')); ?>">Saturn · Blue sapphire (Neelam)</a>
            <a href="<?php echo esc_url(home_url('/astrology/#rahu')); ?>">Rahu · Hessonite (Gomed)</a>
            <a href="<?php echo esc_url(home_url('/astrology/#ketu')); ?>">Ketu · Cat's eye (Lehsunia)</a>
          </div>

          <div class="col">
            <h6>GUIDES</h6>
            <a href="<?php echo esc_url(home_url('/astrology/#birthstones')); ?>">Birthstones by month</a>
            <a href="<?php echo esc_url(home_url('/astrology/#substitutes')); ?>">Substitute stones (upratna)</a>
            <a href="<?php echo esc_url(home_url('/astrology/#weight')); ?>">Weight: carat and ratti</a>
            <a href="<?php echo esc_url(home_url('/astrology/#navratna')); ?>">Navratna set (on request)</a>
          </div>

          <div class="dark" style="max-width: 440px; justify-self: end; width: 100%; padding: 32px 28px; display: flex; flex-direction: column; gap: 14px; justify-content: center;">
            <span style="color: #D9B66F; font-size: 15px; font-weight: 600;">Astrology consultation</span>
            <p style="margin: 0; font-size: 13.5px; line-height: 1.6; color: #CFC6B8;">
              Talk to our astrologer. Share your birth details; our astrologer reads your chart and suggests the right stone and weight. Then we find the stone for you.
            </p>
            <button type="button" class="btn sm lt" onclick="openConsultationModal();" style="background: #F1EBE1; color: #1C1A17; border: 1px solid #F1EBE1; font-weight: 700; font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; padding: 12px 20px; width: 100%; text-align: center; cursor: pointer;">BOOK A CONSULTATION</button>
          </div>
        </div>
      </div>

    </div>
  </header>
</div>

<!-- MEGA MENU DESKTOP HOVER ENGINE SCRIPT -->
<script>
(function() {
  var hd = document.getElementById('hd');
  var mega = document.getElementById('mega');
  var miList = document.querySelectorAll('.mn .mi');
  var panels = document.querySelectorAll('.mega-panel');
  var closeTimer = null;

  window.openMegaPanel = function(key) {
    if (closeTimer) { clearTimeout(closeTimer); closeTimer = null; }
    if (!mega) return;
    var found = false;
    panels.forEach(function(p) {
      if (p.getAttribute('data-m') === key) {
        p.style.display = 'block';
        found = true;
      } else {
        p.style.display = 'none';
      }
    });
    miList.forEach(function(m) {
      if (m.getAttribute('data-m') === key) {
        m.classList.add('open');
      } else {
        m.classList.remove('open');
      }
    });
    if (found) {
      mega.style.display = 'block';
    } else {
      mega.style.display = 'none';
    }
  };

  window.closeMegaPanel = function() {
    if (closeTimer) clearTimeout(closeTimer);
    closeTimer = setTimeout(function() {
      if (mega) mega.style.display = 'none';
      panels.forEach(function(p) { p.style.display = 'none'; });
      miList.forEach(function(m) { m.classList.remove('open'); });
    }, 120);
  };

  miList.forEach(function(m) {
    var k = m.getAttribute('data-m');
    m.addEventListener('mouseenter', function() {
      if (window.innerWidth > 991) window.openMegaPanel(k);
    });
  });

  if (hd) {
    hd.addEventListener('mouseleave', function() {
      if (window.innerWidth > 991) window.closeMegaPanel();
    });
    hd.addEventListener('mouseenter', function() {
      if (closeTimer) { clearTimeout(closeTimer); closeTimer = null; }
    });
  }
  if (mega) {
    mega.addEventListener('mouseenter', function() {
      if (closeTimer) { clearTimeout(closeTimer); closeTimer = null; }
    });
    mega.addEventListener('mouseleave', function() {
      if (window.innerWidth > 991) window.closeMegaPanel();
    });
  }

  // Interactive photo updating
  var gemData = {
    'ruby': { name: 'Ruby', desc: 'Deep pigeon blood red', file: 'ruby.jpg' },
    'sapphire': { name: 'Sapphire', desc: 'Ceylon blue & fancy', file: 'ceylon-sapphire.jpg' },
    'emerald': { name: 'Emerald', desc: 'Colombian & Zambian', file: 'emerald.jpg' },
    'amethyst': { name: 'Amethyst', desc: 'Lilac to deep purple', file: 'ruby.jpg' },
    'rainbow-moonstone': { name: 'Rainbow Moonstone', desc: 'Cabochon lots from 3×4 mm, AAA', file: 'moonstone.jpg' },
    'topaz': { name: 'Topaz', desc: 'Sky, Swiss & London blue', file: 'swiss-topaz.jpg' },
    'agate': { name: 'Agate', desc: 'Banded chalcedony', file: 'moonstone.jpg' }
  };

  window.updateGemsMegaPhoto = function(id) {
    var d = gemData[id];
    if (!d) return;
    var img = document.getElementById('mph-img');
    var nm = document.getElementById('mph-name');
    var ds = document.getElementById('mph-desc');
    var lk = document.getElementById('mph-link');
    if (img && d.file) img.src = '<?php echo esc_url(get_stylesheet_directory_uri() . "/assets/images/"); ?>' + d.file;
    if (nm) nm.textContent = d.name;
    if (ds) ds.textContent = d.desc;
    if (lk) {
      lk.textContent = 'Shop ' + d.name.toLowerCase() + ' →';
      lk.href = '<?php echo esc_url(home_url("/shop/?filter_stone=")); ?>' + id;
    }
  };

  window.updateLayoutsMegaPhoto = function(key) {
    var lnames = {
      'ruby': { name: 'Ruby Layouts', desc: 'Graduated lines and matched pairs' },
      'spinel': { name: 'Spinel Layouts', desc: 'Red, pink and hot pink, matched in colour' },
      'blue-topaz': { name: 'Blue Topaz Layouts', desc: 'Sky, Swiss and London blue lines' },
      'other': { name: 'Other Layouts', desc: 'Tanzanite, emerald and more' }
    };
    var d = lnames[key];
    if (!d) return;
    var nm = document.getElementById('lph-name');
    var ds = document.getElementById('lph-desc');
    var lk = document.getElementById('lph-link');
    if (nm) nm.textContent = d.name;
    if (ds) ds.textContent = d.desc;
    if (lk) {
      lk.textContent = 'See ' + d.name.toLowerCase() + ' →';
      lk.href = '<?php echo esc_url(home_url("/layouts/?stone=")); ?>' + key;
    }
  };

  window.toggleCurrencyMenu = function(e) {
    if (e) e.stopPropagation();
    var curm = document.getElementById('curm');
    if (curm) {
      curm.hidden = !curm.hidden;
    }
  };

  document.addEventListener('click', function(e) {
    var cur = document.querySelector('.cur');
    var curm = document.getElementById('curm');
    if (curm && cur && !cur.contains(e.target)) {
      curm.hidden = true;
    }
  });
})();
</script>

`;

headerContent = headerContent.slice(0, startIndex) + newHeaderMarkup + headerContent.slice(endIndex);
fs.writeFileSync(headerPath, headerContent, 'utf8');
console.log('Successfully updated flatsome-child/header.php');

// 2. UPDATE flatsome-child/style.css
let styleContent = fs.readFileSync(stylePath, 'utf8');

// Ensure .site-header-wrapper and header.hd are overflow visible and correct widths
const siteWrapperCSS = `.site-header-wrapper {
  position: sticky !important;
  top: 0 !important;
  left: 0 !important;
  right: 0 !important;
  width: 100% !important;
  max-width: 100% !important;
  z-index: 99999 !important;
  background: #FFFFFF !important;
  overflow: visible !important;
  box-sizing: border-box !important;
}
body.admin-bar .site-header-wrapper {
  top: 32px !important;
}
@media screen and (max-width: 782px) {
  body.admin-bar .site-header-wrapper {
    top: 46px !important;
  }
}
`;

// Replace .site-header-wrapper section in style.css:
styleContent = styleContent.replace(/\.site-header-wrapper\s*\{[\s\S]*?body\.admin-bar \.site-header-wrapper\s*\{[\s\S]*?\}\s*\}\s*/g, siteWrapperCSS);

fs.writeFileSync(stylePath, styleContent, 'utf8');
console.log('Successfully updated flatsome-child/style.css');
