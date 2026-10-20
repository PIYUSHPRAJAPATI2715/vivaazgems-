<?php
/**
 * Vivaaz Gems Theme - Header Template
 * Strictly follows Step 2 (Pages 4–9) of the 35-page Build Book.
 */
global $vivaaz_header_rendered;
if (!empty($vivaaz_header_rendered)) {
    return;
}
$vivaaz_header_rendered = true;
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

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="site-header-wrapper">
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

          <div class="mph mk">
            <div class="pi">
              <?php echo vivaaz_render_tennis_art('spinel', '#D6D6D6', 0.55); ?>
            </div>
            <div>
              <b>Make it into jewelry</b>
              <p>
                Choose any stone from our shop and we set it in a ring, pendant or earrings, in silver or gold. Send us your idea; we send a sketch and a price.
              </p>
              <button type="button" onclick="window.open('https://wa.me/919680552270?text=Hi%20Vivaaz%20Gems,%20I%20would%20like%20to%20make%20a%20stone%20into%20custom%20jewelry.', '_blank');">ASK FOR A QUOTE</button>
            </div>
          </div>
        </div>
      </div>

      <!-- 5. ASTROLOGY MEGA PANEL (EXACT MATCH FOR CLIENT IMAGE 3!) -->
      <div class="mega-panel" id="mega-panel-astro" data-m="astro" style="display: none;">
        <div class="wrap">
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

          <div class="dark">
            <span>Astrology consultation</span>
            <p>
              Talk to our astrologer. Share your birth details; our astrologer reads your chart and suggests the right stone and weight. Then we find the stone for you.
            </p>
            <button type="button" class="btn sm lt" onclick="openConsultationModal();">BOOK A CONSULTATION</button>
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
  var currentKey = null;

  window.openMegaPanel = function(key) {
    if (closeTimer) { clearTimeout(closeTimer); closeTimer = null; }
    currentKey = key;
    if (!mega) mega = document.getElementById('mega');
    if (!mega) return;

    var found = false;
    panels.forEach(function(p) {
      if (p.getAttribute('data-m') === key) {
        p.classList.add('active');
        p.setAttribute('data-active', 'true');
        p.style.setProperty('display', 'block', 'important');
        found = true;
      } else {
        p.classList.remove('active');
        p.removeAttribute('data-active');
        p.style.setProperty('display', 'none', 'important');
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
      mega.classList.add('open');
      mega.setAttribute('data-open', 'true');
      mega.style.setProperty('display', 'block', 'important');
      mega.removeAttribute('hidden');
    } else {
      window.closeMegaPanel();
    }
  };

  window.closeMegaPanel = function() {
    currentKey = null;
    if (closeTimer) { clearTimeout(closeTimer); closeTimer = null; }
    if (!mega) mega = document.getElementById('mega');
    if (mega) {
      mega.classList.remove('open');
      mega.removeAttribute('data-open');
      mega.style.setProperty('display', 'none', 'important');
    }
    panels.forEach(function(p) {
      p.classList.remove('active');
      p.removeAttribute('data-active');
      p.style.setProperty('display', 'none', 'important');
    });
    miList.forEach(function(m) {
      m.classList.remove('open');
    });
  };

  // 1. Mouseover delegation matching Demo exactly:
  document.addEventListener('mouseover', function(e) {
    var m = e.target.closest('.mn .mi');
    if (m) {
      var k = m.getAttribute('data-m');
      if (k && k !== currentKey) {
        window.openMegaPanel(k);
      }
    }
    var ph = e.target.closest('[data-ph]');
    if (ph) {
      var gemKey = ph.getAttribute('data-ph');
      if (gemKey && typeof window.updateGemsMegaPhoto === 'function') {
        window.updateGemsMegaPhoto(gemKey);
      }
    }
    var lph = e.target.closest('[data-lph]');
    if (lph) {
      var layKey = lph.getAttribute('data-lph');
      if (layKey && typeof window.updateLayoutsMegaPhoto === 'function') {
        window.updateLayoutsMegaPhoto(layKey);
      }
    }
  });

  // 2. Mouseout delegation matching Demo exactly:
  document.addEventListener('mouseout', function(e) {
    var h = document.getElementById('hd');
    if (h && !h.contains(e.relatedTarget)) {
      window.closeMegaPanel();
    }
  });

  // 3. Direct mouseenter and click handlers on all nav links:
  miList.forEach(function(m) {
    var k = m.getAttribute('data-m');
    m.addEventListener('mouseenter', function() {
      window.openMegaPanel(k);
    });
    m.addEventListener('click', function(e) {
      if (!mega || mega.style.display !== 'block' || currentKey !== k) {
        e.preventDefault();
        window.openMegaPanel(k);
      }
    });
  });

  // 4. Hovering the mega menu itself keeps it open:
  if (mega) {
    mega.addEventListener('mouseenter', function() {
      if (closeTimer) { clearTimeout(closeTimer); closeTimer = null; }
    });
    mega.addEventListener('mouseleave', function(e) {
      var h = document.getElementById('hd');
      if (h && !h.contains(e.relatedTarget)) {
        window.closeMegaPanel();
      }
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

<!-- MOBILE SLIDE-IN MENU DRAWER (POINT 4, 5 SPEC: CLEAN ACCORDIONS, SOFT EXPANSION) -->
<div class="mobile-menu-drawer" id="mobile-menu-drawer" style="display: none;">
  <div class="mobile-drawer-header">
    <div style="font-weight: 700; letter-spacing: 0.15em; font-size: 13px;">VIVAAZ GEMS</div>
    <button type="button" class="mobile-drawer-close" onclick="toggleMobileMenuDrawer();" aria-label="Close menu">&times;</button>
  </div>
  
  <div class="mobile-drawer-content">
    <!-- Top Account Line (Point 4 & 5 Spec) -->
    <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="mobile-drawer-link" style="background: #FAF7F2; border-bottom: 1px solid var(--color-border-light); font-weight: 600; display: flex; justify-content: space-between; align-items: center; padding: 14px 16px;">
      <span>Sign in / My account</span>
      <span style="color: var(--color-text-muted); font-size: 14px;">›</span>
    </a>

    <!-- Accordion 1: Gemstones -->
    <div class="mobile-acc-item">
      <div class="mobile-acc-header" onclick="toggleMobileAcc(this);">
        <span>Gemstones</span>
        <span class="acc-chevron">›</span>
      </div>
      <div class="mobile-acc-body" style="display: none;">
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="mobile-acc-sublink-top">All Gemstones →</a>
        
        <div class="mobile-acc-cat-label">Precious Gemstones</div>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>" class="mobile-acc-sublink">Ruby</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>" class="mobile-acc-sublink">Sapphire</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>" class="mobile-acc-sublink">Emerald</a>

        <div class="mobile-acc-cat-label" onclick="event.stopPropagation(); toggleMobileSemi(this);" style="display: flex; justify-content: space-between; align-items: center; cursor: pointer; padding: 10px 0;">
          <span>Semi-Precious Gemstones (A–Z)</span>
          <span style="font-size: 13px; color: var(--color-text-muted);">›</span>
        </div>
        <div class="mobile-acc-semi-grid" style="display: flex; flex-direction: column; gap: 4px; margin-bottom: 12px;">
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=agate')); ?>" class="mobile-acc-sublink">Agate</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=amazonite')); ?>" class="mobile-acc-sublink">Amazonite</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=amber')); ?>" class="mobile-acc-sublink">Amber</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=amethyst')); ?>" class="mobile-acc-sublink">Amethyst</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=aquamarine')); ?>" class="mobile-acc-sublink">Aquamarine</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=aventurine')); ?>" class="mobile-acc-sublink">Aventurine</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=carnelian')); ?>" class="mobile-acc-sublink">Carnelian</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=citrine')); ?>" class="mobile-acc-sublink">Citrine</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=garnet')); ?>" class="mobile-acc-sublink">Garnet</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=green-jade')); ?>" class="mobile-acc-sublink">Green Jade</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=iolite')); ?>" class="mobile-acc-sublink">Iolite</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=labradorite')); ?>" class="mobile-acc-sublink">Labradorite</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=lapis-lazuli')); ?>" class="mobile-acc-sublink">Lapis Lazuli</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=larimar')); ?>" class="mobile-acc-sublink">Larimar</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=malachite')); ?>" class="mobile-acc-sublink">Malachite</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=onyx')); ?>" class="mobile-acc-sublink">Onyx</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=opal')); ?>" class="mobile-acc-sublink">Opal</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=peridot')); ?>" class="mobile-acc-sublink">Peridot</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=prehnite')); ?>" class="mobile-acc-sublink">Prehnite</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=rainbow-moonstone')); ?>" class="mobile-acc-sublink">Rainbow Moonstone</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=rose-quartz')); ?>" class="mobile-acc-sublink">Rose Quartz</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=spinel')); ?>" class="mobile-acc-sublink">Spinel</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=tanzanite')); ?>" class="mobile-acc-sublink">Tanzanite</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=tiger-eye')); ?>" class="mobile-acc-sublink">Tiger Eye</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=topaz')); ?>" class="mobile-acc-sublink">Topaz</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=tourmaline')); ?>" class="mobile-acc-sublink">Tourmaline</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_stone=turquoise')); ?>" class="mobile-acc-sublink">Turquoise</a>
        </div>

        <div class="mobile-acc-cat-label" style="margin-top: 14px;">Cuts as Buttons</div>
        <div class="mobile-cuts-pills" style="display: flex; flex-wrap: wrap; gap: 8px; margin: 8px 0 16px;">
          <a href="<?php echo esc_url(home_url('/shop/?filter_cut=faceted')); ?>" class="filter-pill-btn" style="padding: 7px 14px; background: #FAF7F2; border: 1px solid var(--color-border-light); color: var(--color-text-main); font-size: 12px; font-weight: 600; text-decoration: none;">Faceted</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_cut=cabochon')); ?>" class="filter-pill-btn" style="padding: 7px 14px; background: #FAF7F2; border: 1px solid var(--color-border-light); color: var(--color-text-main); font-size: 12px; font-weight: 600; text-decoration: none;">Cabochon</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_cut=rose-cut')); ?>" class="filter-pill-btn" style="padding: 7px 14px; background: #FAF7F2; border: 1px solid var(--color-border-light); color: var(--color-text-main); font-size: 12px; font-weight: 600; text-decoration: none;">Rose Cut</a>
          <a href="<?php echo esc_url(home_url('/shop/?filter_cut=briolette')); ?>" class="filter-pill-btn" style="padding: 7px 14px; background: #FAF7F2; border: 1px solid var(--color-border-light); color: var(--color-text-main); font-size: 12px; font-weight: 600; text-decoration: none;">Briolette</a>
        </div>
        
        <div class="mobile-acc-cat-label" style="margin-top: 10px;">Shop By</div>
        <a href="<?php echo esc_url(home_url('/shop/?filter_by=colour')); ?>" class="mobile-acc-sublink">By Colour</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_by=shape')); ?>" class="mobile-acc-sublink">By Shape</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_by=price')); ?>" class="mobile-acc-sublink">By Price</a>
      </div>
    </div>

    <!-- Accordion 2: Layouts -->
    <div class="mobile-acc-item">
      <div class="mobile-acc-header" onclick="toggleMobileAcc(this);">
        <span>Layouts</span>
        <span class="acc-chevron">›</span>
      </div>
      <div class="mobile-acc-body" style="display: none;">
        <a href="<?php echo esc_url(home_url('/layouts/')); ?>" class="mobile-acc-sublink-top">All Layouts →</a>
        <a href="<?php echo esc_url(home_url('/layouts/?stone=ruby')); ?>" class="mobile-acc-sublink">Ruby Layouts</a>
        <a href="<?php echo esc_url(home_url('/layouts/?stone=spinel')); ?>" class="mobile-acc-sublink">Spinel Layouts</a>
        <a href="<?php echo esc_url(home_url('/layouts/?type=necklace-lines')); ?>" class="mobile-acc-sublink">Necklace Lines</a>
        <a href="<?php echo esc_url(home_url('/layouts/?type=bracelet-lines')); ?>" class="mobile-acc-sublink">Bracelet Lines</a>
        <a href="<?php echo esc_url(home_url('/layouts/#match')); ?>" class="mobile-acc-sublink" style="color: var(--color-gold-label); font-weight: 600;">Send Your Design or CAD →</a>
      </div>
    </div>

    <!-- Accordion 3: Beads -->
    <div class="mobile-acc-item">
      <div class="mobile-acc-header" onclick="toggleMobileAcc(this);">
        <span>Beads</span>
        <span class="acc-chevron">›</span>
      </div>
      <div class="mobile-acc-body" style="display: none;">
        <a href="<?php echo esc_url(home_url('/beads/')); ?>" class="mobile-acc-sublink-top">All Beads →</a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=round')); ?>" class="mobile-acc-sublink">Round Beads</a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=rondelle')); ?>" class="mobile-acc-sublink">Rondelle</a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=faceted-rondelle')); ?>" class="mobile-acc-sublink">Faceted Rondelle</a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=nugget')); ?>" class="mobile-acc-sublink">Nugget</a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=chips')); ?>" class="mobile-acc-sublink">Chips</a>
        <a href="<?php echo esc_url(home_url('/beads/?shape=heishi')); ?>" class="mobile-acc-sublink">Heishi</a>
      </div>
    </div>

    <!-- Accordion 4: Jewelry -->
    <div class="mobile-acc-item">
      <div class="mobile-acc-header" onclick="toggleMobileAcc(this);">
        <span>Jewelry</span>
        <span class="acc-chevron">›</span>
      </div>
      <div class="mobile-acc-body" style="display: none;">
        <a href="<?php echo esc_url(home_url('/jewelry/')); ?>" class="mobile-acc-sublink-top">All Jewelry →</a>
        <a href="<?php echo esc_url(home_url('/jewelry/tennis-bracelets/')); ?>" class="mobile-acc-sublink">Tennis Bracelets</a>
        <a href="<?php echo esc_url(home_url('/jewelry/tennis-necklaces/')); ?>" class="mobile-acc-sublink">Tennis Necklaces</a>
        <a href="<?php echo esc_url(home_url('/make-it-into-jewelry/')); ?>" class="mobile-acc-sublink" style="color: var(--color-gold-label); font-weight: 600;">Make It into Jewelry (Custom) →</a>
      </div>
    </div>

    <!-- Accordion 5: Astrology -->
    <div class="mobile-acc-item">
      <div class="mobile-acc-header" onclick="toggleMobileAcc(this);">
        <span>Astrology</span>
        <span class="acc-chevron">›</span>
      </div>
      <div class="mobile-acc-body" style="display: none;">
        <a href="<?php echo esc_url(home_url('/astrology/')); ?>" class="mobile-acc-sublink-top">Gemstones and Astrology →</a>
        <a href="<?php echo esc_url(home_url('/astrology/#sun')); ?>" class="mobile-acc-sublink">Stones for Nine Planets</a>
        <a href="<?php echo esc_url(home_url('/astrology/#birthstones')); ?>" class="mobile-acc-sublink">Birthstones by Month</a>
        <a href="javascript:void(0);" onclick="openConsultationModal(); toggleMobileMenuDrawer();" class="mobile-acc-sublink" style="color: var(--color-gold-label); font-weight: 600;">Book a Consultation →</a>
      </div>
    </div>

    <!-- Wishlist Link -->
    <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="mobile-drawer-link" style="display: flex; justify-content: space-between; align-items: center;">
      <span>Wishlist</span>
      <span id="mobile-wishlist-count" style="font-size: 11px; color: var(--color-gold-label);"></span>
    </a>

    <!-- Help Group -->
    <div style="margin-top: 24px; padding: 16px 20px 24px; border-top: 1px solid var(--color-border-light);">
      <div style="font-size: 10px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-text-muted); text-transform: uppercase; margin-bottom: 10px;">HELP</div>
      <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="mobile-drawer-sublink" style="display: block; padding: 6px 0; color: var(--color-text-main); text-decoration: none; font-size: 13px;">Track my order</a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="mobile-drawer-sublink" style="display: block; padding: 6px 0; color: var(--color-text-main); text-decoration: none; font-size: 13px;">Contact us</a>
      
      <div style="margin-top: 14px;">
        <a href="https://wa.me/919680552270" target="_blank" class="btn-whatsapp-green-full" style="padding: 10px 16px; font-size: 11px; display: block; text-align: center; text-decoration: none;">
          WHATSAPP US
        </a>
      </div>

      <div style="margin-top: 14px;">
        <select onchange="switchCurrency(this.value)" style="width: 100%; padding: 8px; border: 1px solid var(--color-border-light); background: #FAF7F2; font-size: 12px;">
          <option value="INR">IN | ₹ INR ▾</option>
          <option value="USD">US | $ USD</option>
          <option value="EUR">EU | € EUR</option>
          <option value="GBP">UK | £ GBP</option>
          <option value="AED">AE | AED</option>
        </select>
      </div>
    </div>
  </div>
</div>
<div class="mobile-drawer-backdrop" id="mobile-drawer-backdrop" onclick="toggleMobileMenuDrawer();" style="display: none;"></div>



<!-- LUXURY SLIDE-IN CART DRAWER (POINT 9 & 19 SPEC: CHANGE SIZE, REMOVE WITH UNDO, NO COUPON) -->
<div class="vivaaz-cart-drawer" id="vivaaz-cart-drawer" style="display: none;">
  <div class="cart-drawer-header" style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border-bottom: 1px solid var(--color-border-light);">
    <div style="font-size: 13px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
      Your bag (<span id="cart-drawer-count">0</span>)
    </div>
    <button type="button" class="cart-drawer-close" onclick="closeCartDrawer();" style="background: none; border: none; font-size: 24px; cursor: pointer; color: var(--color-text-main);">&times;</button>
  </div>
  
  <!-- Undo Bar Container -->
  <div id="cart-drawer-undo-bar" style="display: none; background: #FAF7F2; border-bottom: 1px solid var(--color-border-light); padding: 10px 20px; font-size: 12px; justify-content: space-between; align-items: center;">
    <span id="cart-drawer-undo-msg">Item removed.</span>
    <button type="button" onclick="undoRemoveCartItem();" style="background: none; border: none; font-size: 12px; font-weight: 700; color: #1C1A17; text-decoration: underline; cursor: pointer;">Undo</button>
  </div>

  <div class="cart-drawer-items-wrap" id="cart-drawer-items-list" style="flex: 1; overflow-y: auto; padding: 20px;">
    <!-- Items rendered dynamically by JS -->
    <div style="text-align: center; padding: 40px 10px; color: var(--color-text-muted); font-size: 13px;">Your bag is currently empty.</div>
  </div>

  <div class="cart-drawer-footer" style="border-top: 1px solid var(--color-border-light); padding: 20px; background: #FFFFFF;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
      <span style="font-size: 13px; font-weight: 600;">Subtotal</span>
      <span id="cart-drawer-subtotal" style="font-size: 18px; font-weight: 700;">₹ 0</span>
    </div>
    <p style="font-size: 11px; color: var(--color-text-muted); margin: 0 0 16px; line-height: 1.5;">
      Shipping is added at checkout. Outside India, import duties are paid on delivery.
    </p>
    <div style="display: flex; gap: 10px; margin-bottom: 12px;">
      <a href="<?php echo esc_url(home_url('/cart/')); ?>" class="btn-square-dark" style="flex: 1; padding: 12px; font-size: 11px; text-align: center; text-decoration: none; background: #FFFFFF; color: #1C1A17; border: 1px solid #1C1A17;">VIEW BAG</a>
      <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="btn-square-dark" style="flex: 1; padding: 12px; font-size: 11px; text-align: center; text-decoration: none; background: #1C1A17; color: #FFFFFF;">CHECKOUT</a>
    </div>
    <div style="text-align: center; font-size: 10px; color: var(--color-text-muted); letter-spacing: 0.05em;">
      Insured shipping · Our guarantee
    </div>
  </div>
</div>
<div class="cart-drawer-backdrop" id="cart-drawer-backdrop" onclick="closeCartDrawer();" style="display: none;"></div>

<!-- CONSULTATION MODAL POPUP (POINT 13 SPEC) -->
<div class="consultation-modal-backdrop" id="vivaaz-consultation-modal" style="display: none;" onclick="if(event.target === this) closeConsultationModal();">
  <div class="consultation-modal-box">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
      <h3 style="font-family: var(--font-family-serif); font-size: 24px; font-weight: 400; margin: 0;">Book a consultation</h3>
      <button type="button" onclick="closeConsultationModal();" style="background: none; border: none; font-size: 22px; cursor: pointer;">&times;</button>
    </div>
    <p style="font-size: 12px; color: var(--color-text-muted); margin: 0 0 20px;">We confirm the time of your call on WhatsApp.</p>
    
    <form id="consultation-popup-form" onsubmit="handleConsultationSubmit(event);">
      <div style="margin-bottom: 14px;">
        <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 6px;">NAME</label>
        <input type="text" id="consult-name" placeholder="Your name" required style="width: 100%; padding: 10px 14px; border: 1px solid var(--color-border-light); font-size: 13px; box-sizing: border-box;" />
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px;">
        <div>
          <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 6px;">WHATSAPP NUMBER</label>
          <input type="text" id="consult-wa" placeholder="+91" required style="width: 100%; padding: 10px 14px; border: 1px solid var(--color-border-light); font-size: 13px; box-sizing: border-box;" />
        </div>
        <div>
          <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 6px;">EMAIL</label>
          <input type="email" id="consult-email" placeholder="Optional" style="width: 100%; padding: 10px 14px; border: 1px solid var(--color-border-light); font-size: 13px; box-sizing: border-box;" />
        </div>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px;">
        <div>
          <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 6px;">DATE OF BIRTH</label>
          <input type="text" id="consult-dob" placeholder="DD / MM / YYYY" required style="width: 100%; padding: 10px 14px; border: 1px solid var(--color-border-light); font-size: 13px; box-sizing: border-box;" />
        </div>
        <div>
          <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 6px;">TIME OF BIRTH</label>
          <input type="text" id="consult-tob" placeholder="If known" style="width: 100%; padding: 10px 14px; border: 1px solid var(--color-border-light); font-size: 13px; box-sizing: border-box;" />
        </div>
      </div>

      <div style="margin-bottom: 14px;">
        <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 6px;">PLACE OF BIRTH</label>
        <input type="text" id="consult-pob" placeholder="City, country" required style="width: 100%; padding: 10px 14px; border: 1px solid var(--color-border-light); font-size: 13px; box-sizing: border-box;" />
      </div>

      <div style="margin-bottom: 14px;">
        <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 6px;">I AM ASKING ABOUT</label>
        <div class="consult-pills-row" style="display: flex; flex-wrap: wrap; gap: 6px;">
          <button type="button" class="consult-pill active" onclick="selectConsultTopic('Career', this)">Career</button>
          <button type="button" class="consult-pill" onclick="selectConsultTopic('Health', this)">Health</button>
          <button type="button" class="consult-pill" onclick="selectConsultTopic('Marriage', this)">Marriage</button>
          <button type="button" class="consult-pill" onclick="selectConsultTopic('Wealth', this)">Wealth</button>
          <button type="button" class="consult-pill" onclick="selectConsultTopic('Studies', this)">Studies</button>
        </div>
      </div>

      <div style="margin-bottom: 18px;">
        <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 6px;">BUDGET FOR THE STONE</label>
        <div class="consult-pills-row" style="display: flex; flex-wrap: wrap; gap: 6px;">
          <button type="button" class="consult-pill" onclick="selectConsultBudget('Under ₹10,000', this)">Under ₹10,000</button>
          <button type="button" class="consult-pill active" onclick="selectConsultBudget('₹10,000–50,000', this)">₹10,000–50,000</button>
          <button type="button" class="consult-pill" onclick="selectConsultBudget('₹50,000+', this)">₹50,000+</button>
        </div>
      </div>

      <p style="font-size: 11px; color: var(--color-text-muted); margin: 0 0 16px; line-height: 1.5;">
        Paid consultation. You see the fee and pay online. Then we confirm the time of your call on WhatsApp.
      </p>

      <button type="submit" class="btn-square-dark" style="width: 100%; padding: 14px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; border: none; cursor: pointer;">
        BOOK A CONSULTATION
      </button>
    </form>
  </div>
</div>

<!-- POPUP LIVE SEARCH MODAL (BUILD BOOK PAGE 13 & DEMO) -->
<div id="live-search-modal" class="live-search-modal" style="display: none !important; position: fixed; inset: 0; background: rgba(28,26,23,.6); z-index: 99999; align-items: flex-start; justify-content: center; padding-top: 40px;" onclick="if(event.target === this) closeLiveSearchModal();">
  <div class="search-modal-box" onclick="event.stopPropagation();" style="width: min(680px, calc(100% - 24px)); background: #FFFFFF; border: 1px solid var(--line); padding: 26px 30px; box-shadow: 0 30px 60px rgba(0,0,0,.2);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
      <span class="cap" style="font-size: 10.5px; letter-spacing: 0.2em; color: var(--gold); font-weight: 700; text-transform: uppercase;">SEARCH VIVAAZ GEMS</span>
      <button type="button" aria-label="Close search" onclick="closeLiveSearchModal();" style="background: none; border: 0; font-size: 24px; cursor: pointer; color: var(--soft); line-height: 1;">&times;</button>
    </div>
    <form action="<?php echo esc_url(home_url('/shop/')); ?>" method="get" onsubmit="closeLiveSearchModal();" style="margin-bottom: 12px;">
      <div style="display: flex; align-items: center; gap: 10px; border-bottom: 1.5px solid var(--ink); padding-bottom: 8px;">
        <svg class="i" style="width: 20px; height: 20px; color: var(--soft);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="11" cy="11" r="6.5"/><path d="M16 16l4.5 4.5"/></svg>
        <input type="text" name="s" id="live-search-input" placeholder="Search a stone, shape or reel code (e.g. RMCOC68)..." style="flex: 1; border: 0; font-size: 18px; font-family: var(--display); background: transparent; outline: none; padding: 4px 0;" onkeyup="handleLiveSearch(this.value);" autocomplete="off" />
        <button type="submit" class="btn sm" style="padding: 8px 16px; font-size: 11px;">SEARCH</button>
      </div>
    </form>
    
    <!-- Quick Search Chips -->
    <div style="display: flex; flex-wrap: wrap; gap: 6px; align-items: center; margin-top: 10px;">
      <span style="font-size: 11px; color: var(--soft); margin-right: 4px;">Quick:</span>
      <button type="button" class="chip" onclick="setLiveSearchValue('Ruby');">Ruby</button>
      <button type="button" class="chip" onclick="setLiveSearchValue('Rainbow moonstone 6x8');">Rainbow moonstone 6x8</button>
      <button type="button" class="chip" onclick="setLiveSearchValue('Blue sapphire');">Blue sapphire</button>
      <button type="button" class="chip" onclick="setLiveSearchValue('Spinel');">Spinel</button>
      <button type="button" class="chip on" onclick="setLiveSearchValue('RMCOC68');" style="font-weight: 700;">RMCOC68</button>
      <button type="button" class="chip" onclick="setLiveSearchValue('Emerald');">Emerald</button>
    </div>

    <!-- Real-time Live Search Results Container -->
    <div id="live-search-results" style="display: none; max-height: 320px; overflow-y: auto; margin-top: 14px; border: 1px solid var(--line); background: var(--bg); padding: 8px;"></div>

    <p style="font-size: 12px; color: var(--mute); margin: 14px 0 0; line-height: 1.5;">
      Saw a stone in a reel? Type the code from the reel, e.g. <b style="color: var(--ink);">RMCOC68</b>.
    </p>
  </div>
</div>

<script>
  var _vivaazCatalog = [
    { name: "Rainbow Moonstone Oval Cabochon", code: "RMCOC68", price: "₹ 120 / pc", shape: "Oval", size: "6×8 mm", img: "<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=RMCOC68')); ?>" },
    { name: "Ceylon Blue Sapphire Oval Faceted", code: "BSFOV", price: "₹ 1,450 / pc", shape: "Oval", size: "5×7 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=BSFOV')); ?>" },
    { name: "Matched Ruby Pear Pair", code: "RBFPR", price: "₹ 6,800 / pair", shape: "Pear", size: "4×6 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=RBFPR')); ?>" },
    { name: "Zambian Emerald Octagon Faceted", code: "EMFOC", price: "₹ 24,500", shape: "Octagon", size: "6×8 mm", img: "<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=EMFOC')); ?>" },
    { name: "Swiss Blue Topaz Round Lot", code: "TPFRD", price: "₹ 45 / pc", shape: "Round", size: "2–8 mm", img: "<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=TPFRD')); ?>" },
    { name: "Amethyst Oval Calibrated Lot", code: "AMFOV", price: "₹ 95 / pc", shape: "Oval", size: "6×8 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=AMFOV')); ?>" },
    { name: "Burma Spinel Matched Cushion Pair", code: "SPNPR", price: "₹ 280 / pc", shape: "Cushion", size: "5 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=spinel')); ?>" },
    { name: "Ruby Graduated Line Layout", code: "LAYRBY", price: "₹ 38,000", shape: "Graduated", size: "17 stones", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/layouts/?stone=ruby')); ?>" }
  ];

  function setLiveSearchValue(val) {
    var inp = document.getElementById('live-search-input');
    if (inp) {
      inp.value = val;
      inp.focus();
      handleLiveSearch(val);
    }
  }

  function handleLiveSearch(query) {
    var resultsBox = document.getElementById('live-search-results');
    if (!resultsBox) return;
    var q = (query || '').toLowerCase().trim();
    if (!q || q.length < 2) {
      resultsBox.style.display = 'none';
      resultsBox.innerHTML = '';
      return;
    }
    var matches = _vivaazCatalog.filter(function(item) {
      return item.name.toLowerCase().indexOf(q) > -1 ||
             item.code.toLowerCase().indexOf(q) > -1 ||
             item.shape.toLowerCase().indexOf(q) > -1 ||
             item.size.toLowerCase().indexOf(q) > -1;
    });
    if (matches.length === 0) {
      resultsBox.innerHTML = '<div style="padding: 12px; font-size: 12px; color: var(--mute); text-align: center;">No exact stones found for "' + q + '". Press search to view all catalog matches.</div>';
      resultsBox.style.display = 'block';
      return;
    }
    var html = '';
    matches.forEach(function(item) {
      html += '<a href="' + item.url + '" style="display: flex; align-items: center; gap: 12px; padding: 10px; background: #FFFFFF; border: 1px solid var(--line); text-decoration: none; color: inherit; margin-bottom: 6px;">' +
        '<img src="' + item.img + '" style="width: 48px; height: 48px; object-fit: contain; background: #F1F0EE; flex-shrink: 0;" />' +
        '<div style="flex: 1; min-width: 0;">' +
          '<div style="font-size: 13px; font-weight: 600; color: var(--ink); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">' + item.name + '</div>' +
          '<div style="font-size: 11px; color: var(--soft);">' + item.size + ' · <strong style="color: var(--ink);">' + item.code + '</strong></div>' +
        '</div>' +
        '<div style="font-size: 13px; font-weight: 700; color: var(--ink); white-space: nowrap;">' + item.price + '</div>' +
      '</a>';
    });
    resultsBox.innerHTML = html;
    resultsBox.style.display = 'block';
  }
  function updateMegaPhoto(imgFile, titleText) {
    var promoImg = document.getElementById('gem-promo-img');
    var promoTitle = document.getElementById('gem-promo-title');
    if (promoImg) promoImg.src = '<?php echo esc_url(get_stylesheet_directory_uri() . "/assets/images/"); ?>' + imgFile;
    if (promoTitle) promoTitle.innerText = titleText;
  }

  function toggleMobileMenuDrawer() {
    var drawer = document.getElementById('mobile-menu-drawer');
    var backdrop = document.getElementById('mobile-drawer-backdrop');
    if (drawer && backdrop) {
      var isOpening = (drawer.style.display === 'none' || !drawer.classList.contains('open'));
      if (isOpening) {
        drawer.style.display = 'flex';
        backdrop.style.display = 'block';
        setTimeout(function() {
          drawer.classList.add('open');
          backdrop.classList.add('open');
        }, 10);
      } else {
        drawer.classList.remove('open');
        backdrop.classList.remove('open');
        setTimeout(function() {
          drawer.style.display = 'none';
          backdrop.style.display = 'none';
        }, 300);
      }
    }
  }

  function openLiveSearchModal() {
    var modal = document.getElementById('live-search-modal');
    if (modal) {
      modal.classList.add('open');
      modal.style.setProperty('display', 'flex', 'important');
      var inp = document.getElementById('live-search-input');
      if (inp) {
        setTimeout(function() { inp.focus(); }, 100);
      }
    }
  }

  function closeLiveSearchModal() {
    var modal = document.getElementById('live-search-modal');
    if (modal) {
      modal.classList.remove('open');
      modal.style.setProperty('display', 'none', 'important');
    }
  }

  function toggleLiveSearchModal() {
    var modal = document.getElementById('live-search-modal');
    if (modal) {
      if (modal.classList.contains('open') || modal.style.display === 'flex') {
        closeLiveSearchModal();
      } else {
        openLiveSearchModal();
      }
    }
  }

  // Close modals on Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' || e.keyCode === 27) {
      closeLiveSearchModal();
      var drawer = document.getElementById('mobile-menu-drawer');
      if (drawer && (drawer.classList.contains('open') || drawer.style.display === 'flex')) {
        toggleMobileMenuDrawer();
      }
    }
  });

  function switchCurrency(curr) {
    alert('Currency set to ' + curr + '. Prices update automatically.');
  }

  // GLOBAL WISHLIST ENGINE (LOCALSTORAGE + SYNC)
  function getWishlistItems() {
    try {
      return JSON.parse(localStorage.getItem('vivaaz_wishlist') || '[]');
    } catch(e) {
      return [];
    }
  }

  function setWishlistItems(items) {
    try {
      localStorage.setItem('vivaaz_wishlist', JSON.stringify(items));
    } catch(e) {}
    updateWishlistCountBadge();
  }

  function toggleProductWishlist(id, title, img, price, url, btn) {
    var items = getWishlistItems();
    var strId = String(id);
    var idx = items.findIndex(function(item) { return String(item.id) === strId; });
    var added = false;
    if (idx > -1) {
      items.splice(idx, 1);
      added = false;
    } else {
      items.push({
        id: strId,
        title: title || 'Gemstone',
        img: img || '',
        price: price || '',
        url: url || window.location.href
      });
      added = true;
    }
    setWishlistItems(items);
    updateAllWishlistButtons();
    showWishlistToast(added ? ('Added to your wishlist') : ('Removed from your wishlist'));
  }

  function updateWishlistCountBadge() {
    var items = getWishlistItems();
    var count = items.length;
    var badge = document.getElementById('header-wishlist-count');
    if (badge) {
      badge.textContent = count;
      badge.style.display = count > 0 ? 'flex' : 'none';
    }
    var mobileWishlistCount = document.getElementById('mobile-wishlist-count');
    if (mobileWishlistCount) {
      mobileWishlistCount.textContent = count > 0 ? '(' + count + ')' : '';
    }
  }

  function updateAllWishlistButtons() {
    var items = getWishlistItems();
    var ids = items.map(function(item) { return String(item.id); });
    
    // Update all product card heart buttons on page
    document.querySelectorAll('.wishlist-heart-btn, [data-wishlist-id]').forEach(function(btn) {
      var id = String(btn.getAttribute('data-wishlist-id') || '');
      if (id && ids.indexOf(id) > -1) {
        btn.classList.add('in-wishlist');
        btn.innerHTML = '♥';
        btn.style.color = '#C0392B';
      } else if (id) {
        btn.classList.remove('in-wishlist');
        btn.innerHTML = '♡';
        btn.style.color = '';
      }
    });

    // Update single product heart button if present
    var singleBtn = document.getElementById('single-wishlist-btn');
    var singleSymbol = document.getElementById('single-heart-symbol');
    if (singleBtn) {
      var singleId = String(singleBtn.getAttribute('data-wishlist-id') || '');
      if (singleId && ids.indexOf(singleId) > -1) {
        if (singleSymbol) singleSymbol.innerHTML = '♥';
        singleBtn.style.color = '#C0392B';
      } else {
        if (singleSymbol) singleSymbol.innerHTML = '♡';
        singleBtn.style.color = '';
      }
    }
  }

  function showWishlistToast(msg) {
    var toast = document.getElementById('vivaaz-wishlist-toast');
    if (!toast) {
      toast = document.createElement('div');
      toast.id = 'vivaaz-wishlist-toast';
      toast.style.cssText = 'position: fixed; bottom: 30px; left: 50%; transform: translateX(-50%); background: #1C1A17; color: #FFFFFF; padding: 12px 24px; font-size: 12px; letter-spacing: 0.05em; font-weight: 600; z-index: 9999999; box-shadow: 0 8px 24px rgba(0,0,0,0.2); transition: opacity 0.3s; opacity: 0; pointer-events: none; text-align: center;';
      document.body.appendChild(toast);
    }
    toast.textContent = msg;
    toast.style.opacity = '1';
    clearTimeout(window._wishlistToastTimer);
    window._wishlistToastTimer = setTimeout(function() {
      toast.style.opacity = '0';
    }, 2400);
  }

  // MOBILE ACCORDION ENGINE (POINT 5 SPEC)
  function toggleMobileAcc(header) {
    var body = header.nextElementSibling;
    var chevron = header.querySelector('.acc-chevron');
    if (!body) return;
    var isOpen = body.style.display !== 'none';
    if (isOpen) {
      body.style.display = 'none';
      if (chevron) chevron.textContent = '⌄';
      header.classList.remove('active');
    } else {
      body.style.display = 'block';
      if (chevron) chevron.textContent = '⌃';
      header.classList.add('active');
    }
  }

  function toggleMobileSemi(title) {
    var grid = title.nextElementSibling;
    if (!grid) return;
    var isOpen = grid.style.display !== 'none';
    grid.style.display = isOpen ? 'none' : 'grid';
    var arrow = title.querySelector('span:last-child');
    if (arrow) arrow.textContent = isOpen ? '⌄' : '⌃';
  }

  // LUXURY CART DRAWER ENGINE (POINT 9 & 14 & 19 SPEC)
  var _lastRemovedCartItem = null;
  var _lastRemovedIndex = -1;

  function getCartItems() {
    try {
      return JSON.parse(localStorage.getItem('vivaaz_local_cart') || '[]');
    } catch(e) {
      return [];
    }
  }

  function setCartItems(items) {
    try {
      localStorage.setItem('vivaaz_local_cart', JSON.stringify(items));
    } catch(e) {}
    updateHeaderBagCount();
  }

  function updateHeaderBagCount() {
    var items = getCartItems();
    var count = items.reduce(function(acc, it) { return acc + (parseInt(it.quantity || it.qty) || 1); }, 0);
    var badge = document.getElementById('header-bag-count');
    if (badge) badge.textContent = count;
  }

  function addProductToCartAndOpenDrawer(productId, title, img, priceHtml, size, qty) {
    var items = getCartItems();
    var quantity = parseInt(qty) || 12;
    var rawPrice = parseInt(String(priceHtml || '105').replace(/[^0-9]/g, '')) || 105;
    var selectedSize = size || '6×8 mm';
    
    var existingIndex = items.findIndex(function(it) {
      return (it.product_id === productId || it.title === title) && (it.size === selectedSize);
    });

    if (existingIndex > -1) {
      items[existingIndex].quantity = (parseInt(items[existingIndex].quantity || items[existingIndex].qty) || 1) + quantity;
      items[existingIndex].qty = items[existingIndex].quantity;
    } else {
      items.push({
        key: 'cart_' + Date.now(),
        product_id: productId,
        title: title || 'Gemstone',
        sku: 'VG-' + productId,
        size: selectedSize,
        quality: 'AAA',
        qty: quantity,
        quantity: quantity,
        unitPrice: rawPrice,
        basePrice: Math.round(rawPrice * 1.14),
        tier10: rawPrice,
        tier50: Math.round(rawPrice * 0.88),
        total: quantity * rawPrice,
        image: img || '<?php echo esc_url(vivaaz_get_img_url("moonstone.jpg")); ?>'
      });
    }

    setCartItems(items);
    openCartDrawer();
  }

  function openCartDrawer() {
    renderCartDrawer();
    var drawer = document.getElementById('vivaaz-cart-drawer');
    var backdrop = document.getElementById('cart-drawer-backdrop');
    if (drawer && backdrop) {
      drawer.style.display = 'flex';
      backdrop.style.display = 'block';
      setTimeout(function() {
        drawer.classList.add('open');
        backdrop.classList.add('open');
      }, 10);
    }
  }

  function closeCartDrawer() {
    var drawer = document.getElementById('vivaaz-cart-drawer');
    var backdrop = document.getElementById('cart-drawer-backdrop');
    if (drawer && backdrop) {
      drawer.classList.remove('open');
      backdrop.classList.remove('open');
      setTimeout(function() {
        drawer.style.display = 'none';
        backdrop.style.display = 'none';
      }, 300);
    }
  }

  function renderCartDrawer() {
    var items = getCartItems();
    var list = document.getElementById('cart-drawer-items-list');
    var countEl = document.getElementById('cart-drawer-count');
    var subtotalEl = document.getElementById('cart-drawer-subtotal');
    if (!list) return;

    var totalQty = items.reduce(function(acc, it) { return acc + (parseInt(it.quantity || it.qty) || 1); }, 0);
    if (countEl) countEl.textContent = totalQty;

    if (!items || items.length === 0) {
      list.innerHTML = `
        <div style="text-align: center; padding: 48px 16px; color: var(--color-text-muted);">
          <div style="font-size: 36px; margin-bottom: 12px; color: var(--color-gold-label);">🛍</div>
          <div style="font-size: 15px; font-weight: 600; color: var(--color-text-main); margin-bottom: 6px;">Your bag is empty</div>
          <p style="font-size: 12px; margin: 0 0 20px;">Explore calibrated gems, matched pairs and layouts.</p>
          <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-square-dark" onclick="closeCartDrawer();" style="display: inline-block; padding: 10px 20px; font-size: 11px;">EXPLORE STONES →</a>
        </div>
      `;
      if (subtotalEl) subtotalEl.textContent = '₹ 0';
      return;
    }

    var grandTotal = 0;
    var html = '';

    items.forEach(function(item, idx) {
      var qty = parseInt(item.quantity || item.qty) || 1;
      var unitPrice = parseInt(String(item.unitPrice || item.price || '105').replace(/[^0-9]/g, '')) || 105;
      
      // Tier pricing ladder: 1-9 pcs: 120, 10-49 pcs: 105, 50+ pcs: 92
      var tierPrice = unitPrice;
      var tierNote = '';
      if (qty >= 50) {
        tierPrice = item.tier50 || 92;
        tierNote = '50+ tier price';
      } else if (qty >= 10) {
        tierPrice = item.tier10 || 105;
        tierNote = '10+ tier price';
      } else {
        tierPrice = item.tier1 || 120;
        tierNote = '1–9 tier price';
      }
      var itemTotal = qty * tierPrice;
      grandTotal += itemTotal;

      var img = item.img || item.image || '<?php echo esc_url(vivaaz_get_img_url("moonstone.jpg")); ?>';
      var title = item.title || item.name || 'Rainbow Moonstone Oval Cabochon';
      var size = item.size || '6×8 mm';

      html += `
        <div class="cart-drawer-item-row" style="display: flex; gap: 14px; padding: 16px 0; border-bottom: 1px solid var(--color-border-light);">
          <div style="width: 64px; height: 64px; background: #FAF7F2; border: 1px solid var(--color-border-light); flex-shrink: 0;">
            <img src="${img}" alt="${title}" style="width: 100%; height: 100%; object-fit: cover; display: block;">
          </div>
          <div style="flex: 1; min-width: 0;">
            <div style="font-size: 13px; font-weight: 600; color: var(--color-text-main); margin-bottom: 2px; line-height: 1.3;">
              ${title}
            </div>
            <div style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">
              ${size} · AAA
            </div>
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
              <div style="display: flex; align-items: center; border: 1px solid var(--color-border-light);">
                <button type="button" onclick="updateCartItemQty(${idx}, -1);" style="width: 26px; height: 26px; background: #FAF7F2; border: none; font-weight: 700; cursor: pointer;">−</button>
                <span style="width: 32px; text-align: center; font-size: 12px; font-weight: 700;">${qty}</span>
                <button type="button" onclick="updateCartItemQty(${idx}, 1);" style="width: 26px; height: 26px; background: #FAF7F2; border: none; font-weight: 700; cursor: pointer;">+</button>
              </div>
              <div style="font-size: 14px; font-weight: 700; color: var(--color-text-main);">
                ₹ ${itemTotal.toLocaleString('en-IN')}
              </div>
            </div>

            <div style="font-size: 10px; color: var(--color-gold-label); margin-bottom: 8px;">
              ₹${tierPrice} each · ${tierNote}
            </div>

            <div style="display: flex; gap: 12px; font-size: 11px;">
              <a href="javascript:void(0);" onclick="changeCartItemSize(${idx});" style="color: var(--color-text-muted); text-decoration: underline;">Change size</a>
              <a href="javascript:void(0);" onclick="removeCartItem(${idx});" style="color: #C0392B; text-decoration: underline;">Remove</a>
            </div>
          </div>
        </div>
      `;
    });

    list.innerHTML = html;
    if (subtotalEl) subtotalEl.textContent = '₹ ' + grandTotal.toLocaleString('en-IN');
  }

  function updateCartItemQty(index, delta) {
    var items = getCartItems();
    if (!items[index]) return;
    var newQty = (parseInt(items[index].quantity || items[index].qty) || 1) + delta;
    if (newQty <= 0) {
      removeCartItem(index);
      return;
    }
    items[index].quantity = newQty;
    items[index].qty = newQty;
    setCartItems(items);
    renderCartDrawer();
  }

  function changeCartItemSize(index) {
    var items = getCartItems();
    if (!items[index]) return;
    var sizes = ['3×4 mm', '3×5 mm', '4×5 mm', '4×6 mm', '5×7 mm', '6×8 mm', '7×9 mm', '8×10 mm', '10×12 mm'];
    var current = items[index].size || '6×8 mm';
    var nextSize = prompt('Select new size for ' + items[index].title + ':\nAvailable: ' + sizes.join(', '), current);
    if (nextSize && sizes.indexOf(nextSize.trim()) > -1) {
      items[index].size = nextSize.trim();
      setCartItems(items);
      renderCartDrawer();
      showWishlistToast('Size updated to ' + nextSize.trim());
    }
  }

  function removeCartItem(index) {
    var items = getCartItems();
    if (!items[index]) return;
    _lastRemovedCartItem = items[index];
    _lastRemovedIndex = index;
    var title = items[index].title || 'Item';

    items.splice(index, 1);
    setCartItems(items);
    renderCartDrawer();

    var undoBar = document.getElementById('cart-drawer-undo-bar');
    var undoMsg = document.getElementById('cart-drawer-undo-msg');
    if (undoBar && undoMsg) {
      undoMsg.textContent = title + ' removed.';
      undoBar.style.display = 'flex';
      clearTimeout(window._cartUndoTimer);
      window._cartUndoTimer = setTimeout(function() {
        undoBar.style.display = 'none';
      }, 6000);
    }
  }

  function undoRemoveCartItem() {
    if (!_lastRemovedCartItem) return;
    var items = getCartItems();
    items.splice(_lastRemovedIndex >= 0 ? _lastRemovedIndex : items.length, 0, _lastRemovedCartItem);
    _lastRemovedCartItem = null;
    _lastRemovedIndex = -1;
    setCartItems(items);
    renderCartDrawer();
    var undoBar = document.getElementById('cart-drawer-undo-bar');
    if (undoBar) undoBar.style.display = 'none';
    showWishlistToast('Item restored to your bag');
  }

  // CONSULTATION MODAL FUNCTIONS (POINT 13 SPEC)
  function openConsultationModal() {
    var modal = document.getElementById('vivaaz-consultation-modal');
    if (modal) {
      modal.style.display = 'flex';
      setTimeout(function() { modal.classList.add('open'); }, 10);
    }
  }

  function closeConsultationModal() {
    var modal = document.getElementById('vivaaz-consultation-modal');
    if (modal) {
      modal.classList.remove('open');
      setTimeout(function() { modal.style.display = 'none'; }, 200);
    }
  }

  var _consultTopic = 'Career';
  var _consultBudget = '₹10,000–50,000';

  function selectConsultTopic(topic, btn) {
    _consultTopic = topic;
    var pills = btn.parentElement.querySelectorAll('.consult-pill');
    pills.forEach(function(p) { p.classList.remove('active'); });
    btn.classList.add('active');
  }

  function selectConsultBudget(budget, btn) {
    _consultBudget = budget;
    var pills = btn.parentElement.querySelectorAll('.consult-pill');
    pills.forEach(function(p) { p.classList.remove('active'); });
    btn.classList.add('active');
  }

  function handleConsultationSubmit(e) {
    e.preventDefault();
    var name = document.getElementById('consult-name').value || '';
    var wa = document.getElementById('consult-wa').value || '';
    var email = document.getElementById('consult-email').value || '';
    var dob = document.getElementById('consult-dob').value || '';
    var tob = document.getElementById('consult-tob').value || '';
    var pob = document.getElementById('consult-pob').value || '';

    var text = 'Namaste, I want to book an Astrology Consultation.\n' +
      'Name: ' + name + '\n' +
      'WhatsApp: ' + wa + '\n' +
      (email ? ('Email: ' + email + '\n') : '') +
      'DOB: ' + dob + '\n' +
      'Time: ' + tob + '\n' +
      'Place: ' + pob + '\n' +
      'Topic: ' + _consultTopic + '\n' +
      'Budget: ' + _consultBudget;

    closeConsultationModal();
    window.open('https://wa.me/919680552270?text=' + encodeURIComponent(text), '_blank');
  }

  document.addEventListener("DOMContentLoaded", function() {
    closeLiveSearchModal();
    updateWishlistCountBadge();
    updateAllWishlistButtons();
    updateHeaderBagCount();
  });
</script>
