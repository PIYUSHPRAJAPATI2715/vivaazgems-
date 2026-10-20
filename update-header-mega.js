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
        $stone_map = array(
            'ruby'        => 'ruby.jpg',
            'spinel'      => 'ruby.jpg',
            'blue-topaz'  => 'swiss-topaz.jpg',
            'other'       => 'ceylon-sapphire.jpg',
            'sapphire'    => 'ceylon-sapphire.jpg',
            'emerald'     => 'emerald.jpg',
        );
        $img_file = isset($stone_map[$stone]) ? $stone_map[$stone] : 'ruby.jpg';
        $img_url = vivaaz_get_img_url($img_file);
        $n = 15;
        $html = '<div class="lay" style="height:100%; min-height:140px; position:relative; width:100%;">';
        for ($k = 0; $k < $n; $k++) {
            $t = $k / ($n - 1);
            $a = M_PI * (0.15 + 0.7 * $t);
            $x = 50 - 42 * cos($a);
            $y = 24 + 42 * sin($a);
            $z = (16 + 22 * sin(M_PI * $t)) * $scale;
            $w = round($z);
            $h = round($z * 0.8);
            $left = "calc({$x}% - " . ($z / 2) . "px)";
            $top = "calc({$y}% - " . ($z / 2) . "px)";
            $html .= '<div class="gm" style="left:' . $left . '; top:' . $top . '; width:' . $w . 'px; height:' . $h . 'px; position:absolute; border-radius:50%; overflow:hidden; box-shadow:0 1px 2px rgba(0,0,0,.2);">';
            $html .= '<img src="' . esc_url($img_url) . '" style="width:100%; height:100%; object-fit:cover; transform:scale(2.3); display:block;" alt="">';
            $html .= '</div>';
        }
        $html .= '</div>';
        return $html;
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
        $img_url = vivaaz_get_img_url('ruby.jpg');
        $n = 30;
        $html = '<div class="lay" style="height:100%; min-height:140px; position:relative; width:100%;">';
        for ($k = 0; $k < $n; $k++) {
            $a = 2 * M_PI * $k / $n;
            $x = 50 + 36 * cos($a);
            $y = 50 + 25 * sin($a);
            $z = 18 * $scale;
            $border_w = round(1.6 * $scale, 1);
            $w = round($z);
            $left = "calc({$x}% - " . ($z / 2) . "px)";
            $top = "calc({$y}% - " . ($z / 2) . "px)";
            $html .= '<div class="gm" style="left:' . $left . '; top:' . $top . '; width:' . $w . 'px; height:' . $w . 'px; border:' . $border_w . 'px solid ' . $metal . '; position:absolute; border-radius:50%; overflow:hidden; box-shadow:0 1px 2px rgba(0,0,0,.2);">';
            $html .= '<img src="' . esc_url($img_url) . '" style="width:100%; height:100%; object-fit:cover; transform:scale(2.3); display:block;" alt="">';
            $html .= '</div>';
        }
        $html .= '</div>';
        return $html;
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

      <!-- 4. JEWELRY MEGA PANEL -->
      <div class="mega-panel" id="mega-panel-jewelry" data-m="jewelry" style="display: none;">
        <div class="wrap">
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

          <div class="mph mk" style="grid-column: span 2;">
            <div class="pi" style="background: #F4F2EE; min-height: 140px; display: flex; align-items: center; justify-content: center;">
              <?php echo vivaaz_render_tennis_art('spinel', '#D6D6D6', 0.55); ?>
            </div>
            <div>
              <b>Make it into jewelry</b>
              <small>Choose any stone from our shop and we set it in a ring, pendant or earrings, in silver or gold. Send us your idea; we send a sketch and a price.</small>
              <button type="button" class="btn sm" onclick="window.open('https://wa.me/919680552270?text=Hi%20Vivaaz%20Gems,%20I%20would%20like%20to%20make%20a%20stone%20into%20custom%20jewelry.', '_blank');" style="background: #1C1A17; color: #fff; padding: 8px 14px; font-size: 11px; font-weight: 700; border: none; cursor: pointer; align-self: flex-start; text-transform: uppercase;">Ask for a quote</button>
            </div>
          </div>
        </div>
      </div>

      <!-- 5. ASTROLOGY MEGA PANEL -->
      <div class="mega-panel" id="mega-panel-astro" data-m="astro" style="display: none;">
        <div class="wrap">
          <div class="col two">
            <h6>STONES FOR THE NINE PLANETS</h6>
            <div class="ls">
              <a href="<?php echo esc_url(home_url('/astrology/#sun')); ?>">Sun · Ruby (Manik)</a>
              <a href="<?php echo esc_url(home_url('/astrology/#moon')); ?>">Moon · Pearl (Moti)</a>
              <a href="<?php echo esc_url(home_url('/astrology/#mars')); ?>">Mars · Red Coral (Moonga)</a>
              <a href="<?php echo esc_url(home_url('/astrology/#mercury')); ?>">Mercury · Emerald (Panna)</a>
              <a href="<?php echo esc_url(home_url('/astrology/#jupiter')); ?>">Jupiter · Yellow Sapphire (Pukhraj)</a>
              <a href="<?php echo esc_url(home_url('/astrology/#venus')); ?>">Venus · White Sapphire (Safed Pukhraj)</a>
              <a href="<?php echo esc_url(home_url('/astrology/#saturn')); ?>">Saturn · Blue Sapphire (Neelam)</a>
              <a href="<?php echo esc_url(home_url('/astrology/#rahu')); ?>">Rahu · Hessonite (Gomed)</a>
              <a href="<?php echo esc_url(home_url('/astrology/#ketu')); ?>">Ketu · Cat's Eye (Lehsunia)</a>
            </div>
          </div>

          <div class="col">
            <h6>GUIDES</h6>
            <a href="<?php echo esc_url(home_url('/astrology/#birthstones')); ?>">Birthstones by month</a>
            <a href="<?php echo esc_url(home_url('/astrology/#substitutes')); ?>">Substitute stones (upratna)</a>
            <a href="<?php echo esc_url(home_url('/astrology/#weight')); ?>">Weight: carat and ratti</a>
            <a href="<?php echo esc_url(home_url('/astrology/#navratna')); ?>">Navratna set (on request)</a>
          </div>

          <div class="dark" style="grid-column: span 2;">
            <span>Astrology consultation</span>
            <p>Talk to our astrologer. Share your birth details; our astrologer reads your chart and suggests the right stone and weight. Then we find the stone for you.</p>
            <button type="button" class="btn sm lt" onclick="openConsultationModal();">Book a consultation</button>
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

// Find the header section in style.css:
const styleStartMarker = '.top-bar-notice {';
const styleEndMarker = '.account-hover-menu a {';

const sStartIndex = styleContent.indexOf(styleStartMarker);
const sEndIndex = styleContent.indexOf(styleEndMarker);

if (sStartIndex === -1 || sEndIndex === -1) {
  console.error("Could not find style markers in style.css");
  process.exit(1);
}

const newStyleMarkup = `/* ==========================================================================
   VIVAAZ DEMO HEADER & FULL-WIDTH MEGA MENUS (1:1 DEMO REPLICA)
   ========================================================================== */

/* Top bar */
.tb {
  background: #1C1A17 !important;
  color: #F3EEE6 !important;
  font-size: 11px !important;
  letter-spacing: 0.14em !important;
  width: 100% !important;
  box-sizing: border-box !important;
}
.tb .wrap {
  display: flex !important;
  justify-content: space-between !important;
  align-items: center !important;
  height: 36px !important;
  gap: 16px !important;
  max-width: 1280px !important;
  margin: 0 auto !important;
  padding-left: max(24px, env(safe-area-inset-left, 0px)) !important;
  padding-right: max(24px, env(safe-area-inset-right, 0px)) !important;
  box-sizing: border-box !important;
}
.tb .r {
  display: flex !important;
  gap: 22px !important;
  align-items: center !important;
}
.tb a {
  color: #F3EEE6 !important;
  text-decoration: none !important;
  transition: color 0.2s ease !important;
}
.tb a:hover {
  color: #D9B66F !important;
}
.cur {
  position: relative !important;
}
.cur > button {
  font-weight: 700 !important;
  letter-spacing: 0.1em !important;
  color: #fff !important;
  background: transparent !important;
  border: none !important;
  cursor: pointer !important;
  font-size: 11px !important;
  padding: 0 !important;
}
.curm {
  position: absolute !important;
  right: 0 !important;
  top: 26px !important;
  background: #fff !important;
  color: #1C1A17 !important;
  border: 1px solid #E2D7C6 !important;
  min-width: 170px !important;
  z-index: 99999 !important;
  box-shadow: 0 16px 40px rgba(28,26,23,.12) !important;
  padding: 6px 0 !important;
  letter-spacing: 0.04em !important;
}
.curm button {
  display: block !important;
  width: 100% !important;
  text-align: left !important;
  padding: 8px 16px !important;
  font-size: 12.5px !important;
  background: transparent !important;
  border: none !important;
  cursor: pointer !important;
  color: #1C1A17 !important;
}
.curm button:hover {
  background: #FAF7F2 !important;
}

/* Header Container */
header.hd {
  position: sticky !important;
  top: 0 !important;
  z-index: 50 !important;
  background: #FFFFFF !important;
  border-bottom: 1px solid #E2D7C6 !important;
  width: 100% !important;
  box-sizing: border-box !important;
}
.admin-bar header.hd {
  top: 32px !important;
}
@media screen and (max-width: 782px) {
  .admin-bar header.hd {
    top: 46px !important;
  }
}

.hd > .wrap {
  display: grid !important;
  grid-template-columns: 1fr auto 1fr !important;
  align-items: center !important;
  height: 78px !important;
  gap: 20px !important;
  max-width: 1280px !important;
  margin: 0 auto !important;
  padding-left: max(24px, env(safe-area-inset-left, 0px)) !important;
  padding-right: max(24px, env(safe-area-inset-right, 0px)) !important;
  box-sizing: border-box !important;
}

/* Mobile Hamburger Button */
.mobile-hamburger-btn {
  display: none !important;
  background: transparent !important;
  border: none !important;
  cursor: pointer !important;
  padding: 8px !important;
  color: #1C1A17 !important;
}
@media (max-width: 991px) {
  .mobile-hamburger-btn {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
  }
  .hd > .wrap {
    grid-template-columns: auto 1fr auto !important;
    height: 64px !important;
  }
  nav.mn {
    display: none !important;
  }
}

/* Logo: Playfair Display 500, Wide Kerning */
.logo {
  display: flex !important;
  flex-direction: column !important;
  line-height: 1.1 !important;
  text-decoration: none !important;
}
.logo b {
  font-family: 'Playfair Display', serif !important;
  font-weight: 500 !important;
  letter-spacing: 0.32em !important;
  font-size: 21px !important;
  color: #1C1A17 !important;
  text-transform: uppercase !important;
}
.logo span {
  font-size: 9.5px !important;
  letter-spacing: 0.34em !important;
  color: #9A9186 !important;
  margin-top: 4px !important;
  text-transform: uppercase !important;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
}

/* Nav Menu */
nav.mn {
  display: flex !important;
  gap: 6px !important;
  height: 78px !important;
  margin: 0 !important;
  padding: 0 !important;
}
.mi {
  display: flex !important;
  align-items: center !important;
  gap: 4px !important;
  padding: 0 16px !important;
  font-size: 12.5px !important;
  letter-spacing: 0.2em !important;
  font-weight: 600 !important;
  position: relative !important;
  height: 100% !important;
  color: #1C1A17 !important;
  text-decoration: none !important;
  text-transform: uppercase !important;
  cursor: pointer !important;
}
.mi .i {
  width: 13px !important;
  height: 13px !important;
  color: #9A9186 !important;
  transition: transform 0.2s ease !important;
}
.mi::after {
  content: '' !important;
  position: absolute !important;
  left: 16px !important;
  right: 16px !important;
  bottom: 22px !important;
  height: 1.5px !important;
  background: #1C1A17 !important;
  transform: scaleX(0) !important;
  transition: transform 0.25s ease !important;
  transform-origin: left !important;
}
.mi:hover::after,
.mi.open::after,
.mi.cur::after {
  transform: scaleX(1) !important;
}
.mi.open .i {
  transform: rotate(180deg) !important;
}

/* Header Icons */
.icons {
  display: flex !important;
  justify-content: flex-end !important;
  gap: 20px !important;
  align-items: center !important;
}
.icons button,
.icons a {
  position: relative !important;
  display: flex !important;
  background: transparent !important;
  border: none !important;
  color: #1C1A17 !important;
  cursor: pointer !important;
  padding: 0 !important;
  text-decoration: none !important;
}
.icons .i {
  width: 21px !important;
  height: 21px !important;
}
.badge {
  position: absolute !important;
  top: -7px !important;
  right: -9px !important;
  background: #1C1A17 !important;
  color: #fff !important;
  font-size: 9.5px !important;
  font-weight: 700 !important;
  min-width: 16px !important;
  height: 16px !important;
  border-radius: 8px !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  padding: 0 4px !important;
}
.badge:empty {
  display: none !important;
}

/* Account Dropdown */
.has-account-dropdown {
  position: relative !important;
}
.account-hover-menu {
  display: none;
  position: absolute !important;
  top: 100% !important;
  right: 0 !important;
  width: 190px !important;
  background: #FFFFFF !important;
  border: 1px solid #E2D7C6 !important;
  box-shadow: 0 12px 30px rgba(0,0,0,0.08) !important;
  padding: 8px 0 !important;
  z-index: 99999 !important;
}
.has-account-dropdown:hover .account-hover-menu {
  display: block !important;
}

/* ==========================================================================
   FULL WIDTH MEGA MENUS (.mega) - 100% IDENTICAL TO DEMO
   ========================================================================== */
.mega {
  position: absolute !important;
  left: 0 !important;
  right: 0 !important;
  top: 100% !important;
  width: 100% !important;
  background: #FFFFFF !important;
  border-top: 1px solid #E2D7C6 !important;
  border-bottom: 1px solid #E2D7C6 !important;
  box-shadow: 0 30px 50px rgba(28,26,23,.08) !important;
  z-index: 49 !important;
  box-sizing: border-box !important;
}
.mega[hidden] {
  display: none !important;
}
.mega .wrap {
  display: grid !important;
  grid-template-columns: repeat(4, minmax(0, 1fr)) 300px !important;
  gap: 34px !important;
  padding-block: 32px 36px !important;
  max-width: 1280px !important;
  margin: 0 auto !important;
  padding-left: max(24px, env(safe-area-inset-left, 0px)) !important;
  padding-right: max(24px, env(safe-area-inset-right, 0px)) !important;
  box-sizing: border-box !important;
  align-items: start !important;
}
.mega .col h6 {
  margin: 0 0 14px !important;
  font-size: 10.5px !important;
  letter-spacing: 0.2em !important;
  color: #A37E3A !important;
  font-weight: 700 !important;
  text-transform: uppercase !important;
  border-bottom: none !important;
  padding-bottom: 0 !important;
}
.mega .col a {
  display: block !important;
  padding: 5px 0 !important;
  font-size: 14px !important;
  color: #3B362F !important;
  text-decoration: none !important;
  line-height: 1.4 !important;
}
.mega .col a:hover {
  color: #A37E3A !important;
}
.mega .col.two {
  grid-column: span 2 !important;
}
.mega .col.two .ls {
  columns: 2 !important;
  column-gap: 28px !important;
}
.mega .col.three {
  grid-column: span 2 !important;
}
.mega .col.three .ls {
  columns: 3 !important;
  column-gap: 22px !important;
}
.mega .col a.hi {
  font-weight: 700 !important;
  color: #1C1A17 !important;
  margin-top: 8px !important;
}
.mega .col a.lk {
  color: #9A9186 !important;
  font-size: 13px !important;
  margin-top: 8px !important;
  display: inline-block !important;
}
.mega .col a.lk:hover {
  color: #1C1A17 !important;
}

/* Light Card Panel (.mph) */
.mph {
  background: #FAF7F2 !important;
  padding: 18px !important;
  display: flex !important;
  flex-direction: column !important;
  gap: 10px !important;
  border: 1px solid #E2D7C6 !important;
  box-sizing: border-box !important;
}
.mph .cap {
  font-size: 10.5px !important;
  letter-spacing: 0.2em !important;
  color: #A37E3A !important;
  font-weight: 700 !important;
  text-transform: uppercase !important;
}
.mph .pi {
  aspect-ratio: 4/3 !important;
  background: #FFFFFF !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  overflow: hidden !important;
  border: 1px solid #E2D7C6 !important;
  position: relative !important;
}
.mph .pi img {
  width: 70% !important;
  height: auto !important;
  object-fit: contain !important;
  transition: transform 0.4s ease !important;
}
.mph b {
  font-family: 'Playfair Display', serif !important;
  font-weight: 400 !important;
  font-size: 20px !important;
  color: #1C1A17 !important;
  line-height: 1.2 !important;
  margin: 0 !important;
}
.mph small {
  color: #7A7267 !important;
  font-size: 12.5px !important;
  line-height: 1.4 !important;
}
.mph a.link {
  font-size: 12.5px !important;
  font-weight: 700 !important;
  color: #1C1A17 !important;
  text-decoration: underline !important;
  margin-top: 4px !important;
}

/* Dark Promo Panel (.mega .dark) - EXACT MATCH FOR CLIENT IMAGE 1 */
.mega .dark {
  background: #1C1A17 !important;
  color: #E9E2D6 !important;
  padding: 24px !important;
  display: flex !important;
  flex-direction: column !important;
  gap: 10px !important;
  justify-content: center !important;
  box-sizing: border-box !important;
}
.mega .dark span {
  color: #D9B66F !important;
  font-weight: 600 !important;
  font-size: 14px !important;
}
.mega .dark p {
  margin: 0 !important;
  font-size: 13.5px !important;
  line-height: 1.6 !important;
  color: #CFC6B8 !important;
}
.btn.sm.lt {
  background: #F1EBE1 !important;
  color: #1C1A17 !important;
  border: 1px solid #F1EBE1 !important;
  padding: 10px 16px !important;
  font-size: 11px !important;
  font-weight: 700 !important;
  letter-spacing: 0.1em !important;
  text-transform: uppercase !important;
  cursor: pointer !important;
  align-self: flex-start !important;
  transition: background 0.2s ease, color 0.2s ease !important;
}
.btn.sm.lt:hover {
  background: #FFFFFF !important;
  color: #1C1A17 !important;
}

/* Horizontal MPH in Jewelry (.mph.mk) */
.mph.mk {
  flex-direction: row !important;
  align-items: stretch !important;
  gap: 16px !important;
}
.mph.mk .pi {
  width: 44% !important;
  aspect-ratio: auto !important;
}
.mph.mk > div:last-child {
  display: flex !important;
  flex-direction: column !important;
  gap: 8px !important;
  justify-content: center !important;
  flex: 1 !important;
}

/* Layout Art (.lay) & Gem Art (.gm) */
.lay {
  position: relative !important;
  width: 100% !important;
  height: 100% !important;
  min-height: 140px !important;
}
.gm {
  position: absolute !important;
  border-radius: 50% !important;
  overflow: hidden !important;
  box-shadow: 0 1px 2px rgba(0,0,0,0.2) !important;
}
.gm img {
  width: 100% !important;
  height: 100% !important;
  object-fit: cover !important;
  transform: scale(2.3) !important;
}

`;

styleContent = styleContent.slice(0, sStartIndex) + newStyleMarkup + styleContent.slice(sEndIndex);

// Also remove any conflicting overrides of .mega in style.css:
styleContent = styleContent.replace(/\/\* STRICT MEGA DROPDOWN PROTECTION[\s\S]*?\.mi\.open > \.mega \{[\s\S]*?\}/g, '/* Mega menu display handled dynamically */');

fs.writeFileSync(stylePath, styleContent, 'utf8');
console.log('Successfully updated flatsome-child/style.css');
