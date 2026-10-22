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

  <!-- PHONE MOBILE HEADER (STICKY 58PX, 100% EXACT TO PHONE DEMO: HAMBURGER LEFT, TYPOGRAPHY CENTER, SEARCH + BAG RIGHT) -->
  <div class="ph-h" id="ph-h">
    <button type="button" onclick="toggleMobileMenuDrawer();" aria-label="Menu">
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M4 7.5h16M4 12h16M4 16.5h16"/></svg>
    </button>
    <a href="<?php echo esc_url(home_url('/')); ?>" style="text-decoration:none; color:inherit; text-align:center;">
      <b style="font-family:var(--display); font-weight:500; letter-spacing:.28em; font-size:16px;">VIVAAZ GEMS</b>
    </a>
    <div class="r">
      <button type="button" onclick="openSignInModal();" aria-label="Account">
        <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="12" cy="8.5" r="3.8"/><path d="M4.5 20.5c1.2-3.8 4-5.6 7.5-5.6s6.3 1.8 7.5 5.6"/></svg>
      </button>
      <button type="button" onclick="openLiveSearchModal();" aria-label="Search">
        <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="11" cy="11" r="6.5"/><path d="M16 16l4.5 4.5"/></svg>
      </button>
      <button type="button" onclick="openCartDrawer();" aria-label="Bag">
        <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M5.5 8.5h13l-1 11.5h-11z"/><path d="M9 8.5V7a3 3 0 0 1 6 0v1.5"/></svg>
        <span class="badge" id="cb-mobile"><?php echo (function_exists('WC') && WC()->cart && WC()->cart->get_cart_contents_count() > 0) ? WC()->cart->get_cart_contents_count() : ''; ?></span>
      </button>
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

      <!-- Right Action Icons (Exact Demo SVGs & 100% Level Horizontal Alignment) -->
      <div class="icons">
        <button type="button" class="hdr-icon-btn" onclick="openLiveSearchModal();" aria-label="Search">
          <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="6.5"/><path d="M16 16l4.5 4.5"/></svg>
        </button>

        <button type="button" class="hdr-icon-btn" onclick="openSignInModal();" aria-label="Account">
          <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8.5" r="3.8"/><path d="M4.5 20.5c1.2-3.8 4-5.6 7.5-5.6s6.3 1.8 7.5 5.6"/></svg>
        </button>

        <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="hdr-icon-btn" aria-label="Wishlist">
          <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg>
          <span class="badge" id="wb"></span>
        </a>

        <button type="button" class="hdr-icon-btn" onclick="openCartDrawer();" aria-label="Bag">
          <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5.5 8.5h13l-1 11.5h-11z"/><path d="M9 8.5V7a3 3 0 0 1 6 0v1.5"/></svg>
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

          <!-- Photo Card (Ruby Layouts Preview Card) -->
          <div class="mph" id="lph">
            <div class="pi" id="lph-pi">
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
      'ruby': { name: 'Ruby Layouts', desc: 'Graduated lines and matched pairs', img: '<?php echo esc_url(vivaaz_get_img_url("ruby.jpg")); ?>' },
      'spinel': { name: 'Spinel Layouts', desc: 'Red, pink and hot pink, matched in colour', img: '<?php echo esc_url(vivaaz_get_img_url("ruby.jpg")); ?>' },
      'blue-topaz': { name: 'Blue Topaz Layouts', desc: 'Sky, Swiss and London blue lines', img: '<?php echo esc_url(vivaaz_get_img_url("swiss-topaz.jpg")); ?>' },
      'other': { name: 'Other Layouts', desc: 'Tanzanite, emerald and more', img: '<?php echo esc_url(vivaaz_get_img_url("ceylon-sapphire.jpg")); ?>' }
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
    var imgs = document.querySelectorAll('#lph-pi .gm img');
    if (imgs && imgs.length) {
      imgs.forEach(function(img) {
        img.src = d.img;
      });
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

<!-- MOBILE SLIDE-IN MENU DRAWER (100% SAME-TO-SAME AS PHONE DEMO: .mdr, .top, .acct, .it, .opn, .sb, .leaf, .two, .mcard, .mh, .mchips) -->
<aside class="mdr" id="mobile-menu-drawer" role="dialog" aria-label="Menu" style="display: none;">
  <div class="top">
    <b>VIVAAZ GEMS</b>
    <button type="button" onclick="toggleMobileMenuDrawer();" aria-label="Close" style="background:none; border:0; font-size:24px; cursor:pointer; color:var(--soft); line-height:1;">&times;</button>
  </div>
  
  <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="acct" style="text-decoration:none; color:inherit;">
    <span>Sign in / My account</span>
    <svg class="i" style="width:14px; height:14px; color:var(--soft);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M9 18l6-6-6-6"/></svg>
  </a>

  <!-- 1. GEMSTONES -->
  <button type="button" class="it" onclick="toggleMdrTop('gems', this);">
    <span>Gemstones</span>
    <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
  </button>
  <div class="opn" id="mdr-gems" style="display:none;">
    <button type="button" class="sb" onclick="toggleMdrSub('prec', this);">
      <span>Precious</span>
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
    </button>
    <div id="mdr-sub-prec" style="display:none;">
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>" class="leaf">Ruby</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>" class="leaf">Sapphire</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>" class="leaf">Emerald</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_group=precious')); ?>" class="leaf hi">All precious</a>
    </div>

    <button type="button" class="sb" onclick="toggleMdrSub('semi', this);">
      <span>Semi-precious</span>
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
    </button>
    <div id="mdr-sub-semi" style="display:none;">
      <div class="two">
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=agate')); ?>" class="leaf">Agate</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=amazonite')); ?>" class="leaf">Amazonite</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=amber')); ?>" class="leaf">Amber</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=amethyst')); ?>" class="leaf">Amethyst</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=aquamarine')); ?>" class="leaf">Aquamarine</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=aventurine')); ?>" class="leaf">Aventurine</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=carnelian')); ?>" class="leaf">Carnelian</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=citrine')); ?>" class="leaf">Citrine</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=garnet')); ?>" class="leaf">Garnet</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=green-jade')); ?>" class="leaf">Green Jade</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=iolite')); ?>" class="leaf">Iolite</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=labradorite')); ?>" class="leaf">Labradorite</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=lapis-lazuli')); ?>" class="leaf">Lapis Lazuli</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=larimar')); ?>" class="leaf">Larimar</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=malachite')); ?>" class="leaf">Malachite</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=onyx')); ?>" class="leaf">Onyx</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=opal')); ?>" class="leaf">Opal</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=peridot')); ?>" class="leaf">Peridot</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=prehnite')); ?>" class="leaf">Prehnite</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=rainbow-moonstone')); ?>" class="leaf">Rainbow Moonstone</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=rose-quartz')); ?>" class="leaf">Rose Quartz</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=spinel')); ?>" class="leaf">Spinel</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=tanzanite')); ?>" class="leaf">Tanzanite</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=tiger-eye')); ?>" class="leaf">Tiger Eye</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=topaz')); ?>" class="leaf">Topaz</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=tourmaline')); ?>" class="leaf">Tourmaline</a>
        <a href="<?php echo esc_url(home_url('/shop/?filter_stone=turquoise')); ?>" class="leaf">Turquoise</a>
      </div>
      <a href="<?php echo esc_url(home_url('/shop/?filter_group=semi')); ?>" class="leaf hi">All semi-precious</a>
    </div>

    <button type="button" class="sb" onclick="toggleMdrSub('cut', this);">
      <span>By cut</span>
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
    </button>
    <div id="mdr-sub-cut" style="display:none;">
      <a href="<?php echo esc_url(home_url('/shop/?filter_cut=faceted')); ?>" class="leaf">Faceted</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_cut=cabochon')); ?>" class="leaf">Cabochon</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_cut=rose-cut')); ?>" class="leaf">Rose cut</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_cut=briolette')); ?>" class="leaf">Briolette</a>
    </div>

    <button type="button" class="sb" onclick="toggleMdrSub('by', this);">
      <span>Shop by</span>
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
    </button>
    <div id="mdr-sub-by" style="display:none;">
      <a href="<?php echo esc_url(home_url('/shop/?filter_color=blue')); ?>" class="leaf">Colour</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_shape=oval')); ?>" class="leaf">Shape</a>
      <a href="<?php echo esc_url(home_url('/shop/?max_price=5000')); ?>" class="leaf">Price</a>
      <a href="<?php echo esc_url(home_url('/astrology/#birthstones')); ?>" class="leaf">Birthstones</a>
      <a href="<?php echo esc_url(home_url('/shop/?max_price=15000')); ?>" class="leaf">Gifts under ₹15,000</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_sold_as=calibrated')); ?>" class="leaf">Pairs & calibrated lots</a>
    </div>

    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="leaf hi" style="padding-top:12px;">All gemstones</a>
  </div>

  <!-- 2. LAYOUTS -->
  <button type="button" class="it" onclick="toggleMdrTop('layouts', this);">
    <span>Layouts</span>
    <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
  </button>
  <div class="opn" id="mdr-layouts" style="display:none;">
    <button type="button" class="sb" onclick="toggleMdrSub('lay-stone', this);">
      <span>By stone</span>
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
    </button>
    <div id="mdr-sub-lay-stone" style="display:none;">
      <a href="<?php echo esc_url(home_url('/layouts/?stone=ruby')); ?>" class="leaf">Ruby layouts</a>
      <a href="<?php echo esc_url(home_url('/layouts/?stone=spinel')); ?>" class="leaf">Spinel layouts</a>
      <a href="<?php echo esc_url(home_url('/layouts/?stone=blue-topaz')); ?>" class="leaf">Blue topaz layouts</a>
      <a href="<?php echo esc_url(home_url('/layouts/?stone=other')); ?>" class="leaf">Other stones</a>
    </div>

    <button type="button" class="sb" onclick="toggleMdrSub('lay-type', this);">
      <span>By type</span>
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
    </button>
    <div id="mdr-sub-lay-type" style="display:none;">
      <a href="<?php echo esc_url(home_url('/layouts/?type=Necklace+lines')); ?>" class="leaf">Necklace lines</a>
      <a href="<?php echo esc_url(home_url('/layouts/?type=Bracelet+lines')); ?>" class="leaf">Bracelet lines</a>
      <a href="<?php echo esc_url(home_url('/layouts/?type=Pairs')); ?>" class="leaf">Pairs</a>
      <a href="<?php echo esc_url(home_url('/layouts/?type=Sets')); ?>" class="leaf">Sets</a>
    </div>

    <a href="<?php echo esc_url(home_url('/layouts/')); ?>" class="leaf hi" style="padding-top:12px;">All layouts</a>
  </div>

  <!-- 3. BEADS -->
  <button type="button" class="it" onclick="toggleMdrTop('beads', this);">
    <span>Beads</span>
    <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
  </button>
  <div class="opn" id="mdr-beads" style="display:none;">
    <button type="button" class="sb" onclick="toggleMdrSub('bd-stone', this);">
      <span>By stone</span>
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
    </button>
    <div id="mdr-sub-bd-stone" style="display:none;">
      <a href="<?php echo esc_url(home_url('/beads/?stone=Amethyst')); ?>" class="leaf">Amethyst</a>
      <a href="<?php echo esc_url(home_url('/beads/?stone=Garnet')); ?>" class="leaf">Garnet</a>
      <a href="<?php echo esc_url(home_url('/beads/?stone=Labradorite')); ?>" class="leaf">Labradorite</a>
      <a href="<?php echo esc_url(home_url('/beads/?stone=Rose+Quartz')); ?>" class="leaf">Rose Quartz</a>
      <a href="<?php echo esc_url(home_url('/beads/?stone=Turquoise')); ?>" class="leaf">Turquoise</a>
    </div>

    <button type="button" class="sb" onclick="toggleMdrSub('bd-shape', this);">
      <span>By shape</span>
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
    </button>
    <div id="mdr-sub-bd-shape" style="display:none;">
      <a href="<?php echo esc_url(home_url('/beads/?shape=Round')); ?>" class="leaf">Round</a>
      <a href="<?php echo esc_url(home_url('/beads/?shape=Rondelle')); ?>" class="leaf">Rondelle</a>
      <a href="<?php echo esc_url(home_url('/beads/?shape=Faceted+rondelle')); ?>" class="leaf">Faceted rondelle</a>
      <a href="<?php echo esc_url(home_url('/beads/?shape=Nugget')); ?>" class="leaf">Nugget</a>
      <a href="<?php echo esc_url(home_url('/beads/?shape=Chips')); ?>" class="leaf">Chips</a>
      <a href="<?php echo esc_url(home_url('/beads/?shape=Heishi')); ?>" class="leaf">Heishi</a>
    </div>

    <button type="button" class="sb" onclick="toggleMdrSub('bd-size', this);">
      <span>By size & unit</span>
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
    </button>
    <div id="mdr-sub-bd-size" style="display:none;">
      <a href="<?php echo esc_url(home_url('/beads/?size=2-4')); ?>" class="leaf">2–4 mm</a>
      <a href="<?php echo esc_url(home_url('/beads/?size=5-9')); ?>" class="leaf">5–9 mm</a>
      <a href="<?php echo esc_url(home_url('/beads/?size=10+')); ?>" class="leaf">10 mm and more</a>
      <a href="<?php echo esc_url(home_url('/beads/?sold=Strand')); ?>" class="leaf">Strands</a>
      <a href="<?php echo esc_url(home_url('/beads/?sold=Loose+pieces')); ?>" class="leaf">Loose pieces</a>
    </div>

    <a href="<?php echo esc_url(home_url('/beads/')); ?>" class="leaf hi" style="padding-top:12px;">All beads</a>
  </div>

  <!-- 4. JEWELRY -->
  <button type="button" class="it" onclick="toggleMdrTop('jewelry', this);">
    <span>Jewelry</span>
    <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
  </button>
  <div class="opn" id="mdr-jewelry" style="display:none;">
    <div class="mcard lt">
      <b>Make it into jewelry</b>
      <span>Any stone, set in silver or gold for you.</span>
      <a href="<?php echo esc_url(home_url('/make-it-into-jewelry/')); ?>" class="btn sm" style="text-decoration:none; text-align:center; padding:9px 16px; font-size:11px;">Ask for a quote</a>
    </div>
    <div class="mh">BY TYPE</div>
    <a href="<?php echo esc_url(home_url('/jewelry/?type=Tennis+bracelets')); ?>" class="leaf">Tennis bracelets</a>
    <a href="<?php echo esc_url(home_url('/jewelry/?type=Tennis+necklaces')); ?>" class="leaf">Tennis necklaces</a>

    <div class="mh">BY STONE</div>
    <div class="mchips">
      <a href="<?php echo esc_url(home_url('/jewelry/?stone=ruby')); ?>" class="chip" style="text-decoration:none;">Ruby</a>
      <a href="<?php echo esc_url(home_url('/jewelry/?stone=spinel')); ?>" class="chip" style="text-decoration:none;">Spinel</a>
      <a href="<?php echo esc_url(home_url('/jewelry/?stone=sapphire')); ?>" class="chip" style="text-decoration:none;">Sapphire</a>
      <a href="<?php echo esc_url(home_url('/jewelry/?stone=emerald')); ?>" class="chip" style="text-decoration:none;">Emerald</a>
      <a href="<?php echo esc_url(home_url('/jewelry/?stone=other')); ?>" class="chip" style="text-decoration:none;">Other</a>
    </div>

    <div class="mh">BY METAL</div>
    <div class="mchips">
      <a href="<?php echo esc_url(home_url('/jewelry/?metal=925+Silver')); ?>" class="chip" style="text-decoration:none;">925 Silver</a>
      <a href="<?php echo esc_url(home_url('/jewelry/?metal=14K+Gold')); ?>" class="chip" style="text-decoration:none;">14K Gold</a>
      <a href="<?php echo esc_url(home_url('/jewelry/?metal=18K+Gold')); ?>" class="chip" style="text-decoration:none;">18K Gold</a>
    </div>
  </div>

  <!-- 5. ASTROLOGY -->
  <button type="button" class="it" onclick="toggleMdrTop('astro', this);">
    <span>Astrology</span>
    <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
  </button>
  <div class="opn" id="mdr-astro" style="display:none;">
    <div class="mcard">
      <b>Astrology consultation</b>
      <span>Our astrologer reads your chart and suggests the right stone.</span>
      <button type="button" class="btn sm lt" onclick="toggleMobileMenuDrawer(); openConsultationModal();" style="padding:9px 16px; font-size:11px;">Book a consultation</button>
    </div>
    <div class="mh">STONES FOR THE NINE PLANETS</div>
    <a href="<?php echo esc_url(home_url('/astrology/#sun')); ?>" class="leaf">Sun · Ruby (Manik)</a>
    <a href="<?php echo esc_url(home_url('/astrology/#moon')); ?>" class="leaf">Moon · Pearl (Moti)</a>
    <a href="<?php echo esc_url(home_url('/astrology/#mars')); ?>" class="leaf">Mars · Red coral (Moonga)</a>
    <a href="<?php echo esc_url(home_url('/astrology/#mercury')); ?>" class="leaf">Mercury · Emerald (Panna)</a>
    <a href="<?php echo esc_url(home_url('/astrology/#jupiter')); ?>" class="leaf">Jupiter · Yellow sapphire (Pukhraj)</a>
    <a href="<?php echo esc_url(home_url('/astrology/#venus')); ?>" class="leaf">Venus · White sapphire (Safed pukhraj)</a>
    <a href="<?php echo esc_url(home_url('/astrology/#saturn')); ?>" class="leaf">Saturn · Blue sapphire (Neelam)</a>
    <a href="<?php echo esc_url(home_url('/astrology/#rahu')); ?>" class="leaf">Rahu · Hessonite (Gomed)</a>
    <a href="<?php echo esc_url(home_url('/astrology/#ketu')); ?>" class="leaf">Ketu · Cat's eye (Lehsunia)</a>

    <div class="mh">GUIDES</div>
    <div class="mchips">
      <a href="<?php echo esc_url(home_url('/astrology/#birthstones')); ?>" class="chip" style="text-decoration:none;">Birthstones by month</a>
      <a href="<?php echo esc_url(home_url('/astrology/#substitutes')); ?>" class="chip" style="text-decoration:none;">Substitute stones (upratna)</a>
      <a href="<?php echo esc_url(home_url('/astrology/#weight')); ?>" class="chip" style="text-decoration:none;">Weight: carat and ratti</a>
      <a href="<?php echo esc_url(home_url('/astrology/#navratna')); ?>" class="chip" style="text-decoration:none;">Navratna set (on request)</a>
    </div>
  </div>

  <div class="help">HELP</div>
  <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="hl">Track my order</a>
  <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hl">Contact us</a>
  <div style="padding: 12px 20px 0;">
    <a href="https://wa.me/919680552270" target="_blank" class="btn o wide" style="text-decoration:none; text-align:center; display:block;">WhatsApp us</a>
  </div>

  <div class="help">CURRENCY</div>
  <div class="chips" style="padding: 4px 20px 30px; display:flex; gap:6px; flex-wrap:wrap;">
    <button type="button" class="chip on" onclick="switchCurrency('INR')">IN | ₹ INR</button>
    <button type="button" class="chip" onclick="switchCurrency('USD')">US | $ USD</button>
    <button type="button" class="chip" onclick="switchCurrency('EUR')">EU | € EUR</button>
    <button type="button" class="chip" onclick="switchCurrency('GBP')">UK | £ GBP</button>
    <button type="button" class="chip" onclick="switchCurrency('AED')">AE | AED</button>
  </div>
</aside>
<div class="scrim" id="mobile-drawer-backdrop" onclick="toggleMobileMenuDrawer();" style="display: none; position: fixed; inset: 0; background: rgba(28,26,23,.5); z-index: 99998;"></div>



<!-- LUXURY SLIDE-IN CART DRAWER (POINT 9 & 19 SPEC / EXACT DEMO IMAGE 1 FIDELITY) -->
<div class="scrim" id="cart-drawer-backdrop" style="display:none;" onclick="closeCartDrawer();"></div>
<aside class="drawer" id="vivaaz-cart-drawer" role="dialog" aria-label="Your bag" style="display:none;">
  <div class="drh">
    <b>Your bag · <span id="cart-drawer-count">0</span> <span id="cart-drawer-items-suffix">items</span></b>
    <button type="button" onclick="closeCartDrawer();" aria-label="Close" style="background:none;border:none;cursor:pointer;color:var(--ink);padding:4px;display:flex;align-items:center;justify-content:center;line-height:1;">
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" style="width:20px;height:20px;"><path d="M6.5 6.5l11 11M17.5 6.5l-11 11"/></svg>
    </button>
  </div>
  <div id="cart-drawer-undo-bar" class="undo" style="display:none;">
    <span id="cart-drawer-undo-msg">Item removed.</span>
    <button type="button" onclick="undoRemoveCartItem();">Undo</button>
  </div>
  <div class="drb" id="cart-drawer-items-list">
    <!-- Items rendered dynamically by JS -->
  </div>
  <div class="drf" id="cart-drawer-footer" style="display:none;">
    <div class="st"><span>Subtotal</span><span id="cart-drawer-subtotal">₹ 0</span></div>
    <small>Shipping shown at checkout, before you pay. Outside India, import duties are paid on delivery.</small>
    <div class="b2">
      <a href="<?php echo esc_url(home_url('/cart/')); ?>" class="btn o" style="display:flex;align-items:center;justify-content:center;text-decoration:none;">VIEW BAG</a>
      <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="btn" style="display:flex;align-items:center;justify-content:center;text-decoration:none;">CHECKOUT</a>
    </div>
  </div>
</aside>

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

<!-- POPUP LIVE SEARCH OVERLAY (EXACT CLIENT DEMO IMAGE 4 FIDELITY) -->
<div class="scrim" id="live-search-backdrop" style="display:none;" onclick="closeLiveSearchModal();"></div>
<div class="srch" id="live-search-modal" role="dialog" aria-label="Search" style="display:none;">
  <div class="wrap">
    <div class="in">
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="11" cy="11" r="6.5"/><path d="M16 16l4.5 4.5"/></svg>
      <input type="text" id="sq" placeholder="Search a stone, shape or reel code (e.g. moonstone 6x8 or RMCOC68)" onkeyup="handleLiveSearch(this.value);" autocomplete="off" />
      <button type="button" onclick="closeLiveSearchModal();" aria-label="Close" style="background:none;border:none;font-size:24px;cursor:pointer;color:var(--ink);line-height:1;">&times;</button>
    </div>
    <div id="live-search-popular" style="margin-top:18px;">
      <span class="cap" style="font-size:10.5px;letter-spacing:0.2em;color:var(--gold);font-weight:700;text-transform:uppercase;">Popular searches</span>
      <div class="chips sq" style="margin-top:10px;display:flex;gap:6px;flex-wrap:wrap;">
        <button type="button" class="chip" onclick="setLiveSearchValue('Ruby layouts');">Ruby layouts</button>
        <button type="button" class="chip" onclick="setLiveSearchValue('Blue topaz 4 mm');">Blue topaz 4 mm</button>
        <button type="button" class="chip" onclick="setLiveSearchValue('Emerald');">Emerald</button>
        <button type="button" class="chip" onclick="setLiveSearchValue('Tennis bracelet');">Tennis bracelet</button>
        <button type="button" class="chip" onclick="setLiveSearchValue('Spinel');">Spinel</button>
      </div>
      <p style="font-size:13px;color:var(--mute);margin:12px 0 0;">Saw a stone in a reel? Type the code from the reel, e.g. <b style="color:var(--ink);">RMCOC68</b>.</p>
    </div>
    <div id="live-search-results" class="sres" style="display:none;"></div>
  </div>
</div>

<!-- POPUP SIGN IN MODAL (EXACT CLIENT DEMO IMAGE 5 FIDELITY) -->
<div class="scrim" id="signin-modal-backdrop" style="display:none;" onclick="closeSignInModal();"></div>
<div class="modal sm" id="vivaaz-signin-modal" role="dialog" aria-label="Sign in" style="display:none;">
  <button type="button" class="x" onclick="closeSignInModal();" aria-label="Close" style="background:none;border:none;font-size:24px;cursor:pointer;position:absolute;right:22px;top:22px;color:var(--ink);line-height:1;">&times;</button>
  <h3>Sign in</h3>
  <p class="sub">Or create an account. It takes one tap.</p>
  <div id="signin-modal-content">
    <div class="soc">
      <button type="button" onclick="fakeSocialLogin('Google');"><span class="lg" style="background:#fff;color:#4285F4;border:1px solid var(--line2,#E2D7C6);">G</span>Google</button>
      <button type="button" onclick="fakeSocialLogin('Facebook');"><span class="lg" style="background:#1877F2;">f</span>Facebook</button>
      <button type="button" onclick="showWhatsAppSignIn();"><span class="lg" style="background:#25D366;"><svg class="i" style="width:14px;height:14px;vertical-align:middle;" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg></span>WhatsApp</button>
    </div>
    <div class="or"><span>or</span></div>
    <button type="button" class="btn o wide" style="width:100%;" onclick="showEmailSignIn();">CONTINUE WITH EMAIL</button>
    <p style="font-size:12.5px;color:var(--soft);text-align:center;margin:14px 0 0;">New here? The same buttons create your account. Guest checkout always stays: no account is needed to buy.</p>
  </div>
</div>

<script>
  var _vivaazCatalog = [
    { name: "Rainbow Moonstone Oval Cabochon", code: "RMCOC68", price: "₹ 120 / pc", shape: "Oval", size: "6×8 mm", img: "<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=RMCOC68')); ?>" },
    { name: "Agate Oval Cabochon · AA", code: "AGTOV68", price: "₹ 75 / pc", shape: "Oval", size: "6×8 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=Agate')); ?>" },
    { name: "Ceylon Blue Sapphire Oval Faceted", code: "BSFOV", price: "₹ 1,450 / pc", shape: "Oval", size: "5×7 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=BSFOV')); ?>" },
    { name: "Matched Ruby Pear Pair", code: "RBFPR", price: "₹ 6,800 / pair", shape: "Pear", size: "4×6 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=RBFPR')); ?>" },
    { name: "Zambian Emerald Octagon Faceted", code: "EMFOC", price: "₹ 24,500", shape: "Octagon", size: "6×8 mm", img: "<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=EMFOC')); ?>" },
    { name: "Swiss Blue Topaz Round Lot", code: "TPFRD", price: "₹ 45 / pc", shape: "Round", size: "4 mm", img: "<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=TPFRD')); ?>" },
    { name: "Amethyst Oval Calibrated Lot", code: "AMFOV", price: "₹ 95 / pc", shape: "Oval", size: "6×8 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=AMFOV')); ?>" },
    { name: "Burma Spinel Matched Cushion Pair", code: "SPNPR", price: "₹ 280 / pc", shape: "Cushion", size: "5 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=spinel')); ?>" },
    { name: "Ruby Graduated Line Layout", code: "LAYRBY", price: "₹ 38,000", shape: "Graduated", size: "17 stones", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/layouts/?stone=ruby')); ?>" },
    { name: "Tennis Bracelet (Silver / Gold)", code: "TBRAC", price: "from ₹ 18,500", shape: "Line", size: "7 in", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/jewelry/?type=Tennis+bracelets')); ?>" }
  ];

  function setLiveSearchValue(val) {
    var inp = document.getElementById('sq') || document.getElementById('live-search-input');
    if (inp) {
      inp.value = val;
      inp.focus();
      handleLiveSearch(val);
    }
  }

  function handleLiveSearch(query) {
    var resultsBox = document.getElementById('live-search-results');
    var popularBox = document.getElementById('live-search-popular');
    if (!resultsBox) return;
    var q = (query || '').toLowerCase().trim();
    if (!q) {
      resultsBox.style.display = 'none';
      resultsBox.innerHTML = '';
      if (popularBox) popularBox.style.display = 'block';
      return;
    }
    var matches = _vivaazCatalog.filter(function(item) {
      var fullStr = (item.name + ' ' + item.code + ' ' + item.shape + ' ' + item.size).toLowerCase();
      return fullStr.indexOf(q.replace('x', '×')) > -1 ||
             item.code.toLowerCase().indexOf(q) > -1 ||
             item.name.toLowerCase().indexOf(q) > -1;
    });
    if (popularBox) popularBox.style.display = matches.length ? 'none' : 'block';
    if (matches.length === 0) {
      resultsBox.innerHTML = '<div style="grid-column: 1/-1; padding: 18px; font-size: 13px; color: var(--mute); text-align: center;">No exact stones found for “' + query + '”. <a href="<?php echo esc_url(home_url('/contact/')); ?>" style="color:var(--gold); text-decoration:underline;">Ask us on WhatsApp</a></div>';
      resultsBox.style.display = 'grid';
      return;
    }
    var html = '';
    matches.forEach(function(item) {
      html += '<a class="sr" href="' + item.url + '" style="text-decoration:none; color:inherit;">' +
        '<span class="im"><img src="' + item.img + '" alt="' + item.name + '" style="width:70%; height:70%; object-fit:contain;"></span>' +
        '<span><b>' + item.name + '</b><span>' + item.code + ' · ' + item.price + '</span></span>' +
      '</a>';
    });
    resultsBox.innerHTML = html;
    resultsBox.style.display = 'grid';
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
    if (drawer) {
      var isOpening = (drawer.style.display === 'none' || !drawer.classList.contains('open'));
      if (isOpening) {
        drawer.style.display = 'block';
        if (backdrop) backdrop.style.display = 'block';
        setTimeout(function() {
          drawer.classList.add('open');
          if (backdrop) backdrop.classList.add('open');
        }, 10);
      } else {
        drawer.classList.remove('open');
        if (backdrop) backdrop.classList.remove('open');
        setTimeout(function() {
          drawer.style.display = 'none';
          if (backdrop) backdrop.style.display = 'none';
        }, 300);
      }
    }
  }

  function toggleMdrTop(key, btn) {
    var target = document.getElementById('mdr-' + key);
    var isOpen = btn.classList.contains('op');
    document.querySelectorAll('.mdr .it').forEach(function(b) {
      b.classList.remove('op');
    });
    document.querySelectorAll('.mdr .opn').forEach(function(el) {
      el.style.display = 'none';
    });
    if (!isOpen && target) {
      btn.classList.add('op');
      target.style.display = 'block';
    }
  }

  function toggleMdrSub(subKey, btn) {
    var target = document.getElementById('mdr-sub-' + subKey);
    var isOpen = btn.classList.contains('op');
    var parent = btn.closest('.opn');
    if (parent) {
      parent.querySelectorAll('.sb').forEach(function(b) { b.classList.remove('op'); });
      parent.querySelectorAll('div[id^="mdr-sub-"]').forEach(function(el) { el.style.display = 'none'; });
    }
    if (!isOpen && target) {
      btn.classList.add('op');
      target.style.display = 'block';
    }
  }

  function openLiveSearchModal() {
    var modal = document.getElementById('live-search-modal');
    var backdrop = document.getElementById('live-search-backdrop');
    if (modal) {
      modal.style.display = 'block';
      if (backdrop) backdrop.style.display = 'block';
      var inp = document.getElementById('sq') || document.getElementById('live-search-input');
      if (inp) {
        setTimeout(function() { inp.focus(); }, 80);
      }
    }
  }

  function closeLiveSearchModal() {
    var modal = document.getElementById('live-search-modal');
    var backdrop = document.getElementById('live-search-backdrop');
    if (modal) modal.style.display = 'none';
    if (backdrop) backdrop.style.display = 'none';
  }

  function toggleLiveSearchModal() {
    var modal = document.getElementById('live-search-modal');
    if (modal) {
      if (modal.style.display === 'block') {
        closeLiveSearchModal();
      } else {
        openLiveSearchModal();
      }
    }
  }

  // SIGN IN MODAL ENGINE (EXACT CLIENT DEMO IMAGE 5 FIDELITY)
  function openSignInModal() {
    var modal = document.getElementById('vivaaz-signin-modal');
    var backdrop = document.getElementById('signin-modal-backdrop');
    if (modal) {
      resetSignInModal();
      modal.style.display = 'block';
      if (backdrop) backdrop.style.display = 'block';
    }
  }

  function closeSignInModal() {
    var modal = document.getElementById('vivaaz-signin-modal');
    var backdrop = document.getElementById('signin-modal-backdrop');
    if (modal) modal.style.display = 'none';
    if (backdrop) backdrop.style.display = 'none';
  }

  function resetSignInModal() {
    var content = document.getElementById('signin-modal-content');
    if (content) {
      content.innerHTML = `
        <div class="soc">
          <button type="button" onclick="fakeSocialLogin('Google');"><span class="lg" style="background:#fff;color:#4285F4;border:1px solid var(--line2,#E2D7C6);">G</span>Google</button>
          <button type="button" onclick="fakeSocialLogin('Facebook');"><span class="lg" style="background:#1877F2;">f</span>Facebook</button>
          <button type="button" onclick="showWhatsAppSignIn();"><span class="lg" style="background:#25D366;"><svg class="i" style="width:14px;height:14px;vertical-align:middle;" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg></span>WhatsApp</button>
        </div>
        <div class="or"><span>or</span></div>
        <button type="button" class="btn o wide" style="width:100%;" onclick="showEmailSignIn();">CONTINUE WITH EMAIL</button>
        <p style="font-size:12.5px;color:var(--soft);text-align:center;margin:14px 0 0;">New here? The same buttons create your account. Guest checkout always stays: no account is needed to buy.</p>
      `;
    }
  }

  function showEmailSignIn() {
    var content = document.getElementById('signin-modal-content');
    if (content) {
      content.innerHTML = `
        <form onsubmit="handleEmailSignInSubmit(event);">
          <div class="fg" style="margin-bottom:14px;">
            <div class="f full">
              <label for="sie">Email</label>
              <input id="sie" type="email" required placeholder="name@example.com" value="customer@vivaazgems.com" style="width:100%;height:44px;padding:0 12px;border:1px solid #D9CFC0;background:var(--paper);">
            </div>
            <div class="f full">
              <label for="sip">Password</label>
              <input id="sip" type="password" required value="demo-only" style="width:100%;height:44px;padding:0 12px;border:1px solid #D9CFC0;background:var(--paper);">
            </div>
          </div>
          <button type="submit" class="btn wide" style="width:100%;padding:14px;">Sign in</button>
          <p style="font-size:12.5px;text-align:center;margin:14px 0 0;">
            <a href="javascript:void(0);" onclick="resetSignInModal();" style="color:var(--gold);text-decoration:underline;">← Back</a> · <a href="<?php echo esc_url(home_url('/my-account/lost-password/')); ?>" style="color:var(--soft);text-decoration:underline;">Forgot password?</a>
          </p>
        </form>
      `;
    }
  }

  function showWhatsAppSignIn() {
    var content = document.getElementById('signin-modal-content');
    if (content) {
      content.innerHTML = `
        <form onsubmit="handleWhatsAppCodeSubmit(event);">
          <div class="f" style="margin-bottom:14px;">
            <label for="sim">Mobile number</label>
            <input id="sim" type="tel" required value="+91 98290 00000" style="width:100%;height:44px;padding:0 12px;border:1px solid #D9CFC0;background:var(--paper);">
            <small style="color:var(--soft);font-size:11.5px;margin-top:5px;display:block;">We send a one-time code on WhatsApp (or SMS).</small>
          </div>
          <button type="submit" class="btn wide" style="width:100%;padding:14px;">Send code</button>
          <p style="text-align:center;margin:14px 0 0;"><a href="javascript:void(0);" onclick="resetSignInModal();" style="color:var(--gold);text-decoration:underline;font-size:12.5px;">← Back</a></p>
        </form>
      `;
    }
  }

  function handleEmailSignInSubmit(e) {
    e.preventDefault();
    closeSignInModal();
    showWishlistToast('Signed in successfully.');
  }

  function handleWhatsAppCodeSubmit(e) {
    e.preventDefault();
    var content = document.getElementById('signin-modal-content');
    if (content) {
      content.innerHTML = `
        <form onsubmit="handleVerifySubmit(event);">
          <p style="margin:0 0 12px;font-size:13px;">Enter the 6-digit code sent to WhatsApp.</p>
          <div class="otp" style="display:flex;gap:8px;justify-content:center;margin:14px 0;">
            <input maxlength="1" value="4" style="width:46px;height:52px;text-align:center;font-size:20px;font-weight:700;border:1px solid #D9CFC0;">
            <input maxlength="1" value="8" style="width:46px;height:52px;text-align:center;font-size:20px;font-weight:700;border:1px solid #D9CFC0;">
            <input maxlength="1" value="2" style="width:46px;height:52px;text-align:center;font-size:20px;font-weight:700;border:1px solid #D9CFC0;">
            <input maxlength="1" value="6" style="width:46px;height:52px;text-align:center;font-size:20px;font-weight:700;border:1px solid #D9CFC0;">
            <input maxlength="1" value="1" style="width:46px;height:52px;text-align:center;font-size:20px;font-weight:700;border:1px solid #D9CFC0;">
            <input maxlength="1" value="9" style="width:46px;height:52px;text-align:center;font-size:20px;font-weight:700;border:1px solid #D9CFC0;">
          </div>
          <button type="submit" class="btn wide" style="width:100%;padding:14px;">Verify and sign in</button>
          <p style="font-size:12.5px;color:var(--soft);text-align:center;margin:12px 0 0;">Didn't get it? <a href="javascript:void(0);" onclick="showWishlistToast('New code sent.');" style="color:var(--gold);text-decoration:underline;">Send again</a></p>
        </form>
      `;
    }
  }

  function handleVerifySubmit(e) {
    e.preventDefault();
    closeSignInModal();
    showWishlistToast('Signed in successfully.');
  }

  function fakeSocialLogin(provider) {
    closeSignInModal();
    showWishlistToast('Signed in with ' + provider + '.');
  }

  // Close modals on Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' || e.keyCode === 27) {
      closeLiveSearchModal();
      closeSignInModal();
      closeCartDrawer();
      var drawer = document.getElementById('mobile-menu-drawer');
      if (drawer && (drawer.classList.contains('open') || drawer.style.display === 'flex' || drawer.style.display === 'block')) {
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
    var suffixEl = document.getElementById('cart-drawer-items-suffix');
    var subtotalEl = document.getElementById('cart-drawer-subtotal');
    var footerEl = document.getElementById('cart-drawer-footer');
    if (!list) return;

    var totalQty = items.reduce(function(acc, it) { return acc + (parseInt(it.quantity || it.qty) || 1); }, 0);
    if (countEl) countEl.textContent = totalQty;
    if (suffixEl) suffixEl.textContent = totalQty === 1 ? 'item' : 'items';

    if (!items || items.length === 0) {
      list.innerHTML = `
        <div style="padding: 48px 0; text-align: center; color: var(--mute);">
          <p style="font-size: 15px; font-weight: 500; color: var(--ink); margin: 0 0 20px;">Your bag is empty.</p>
          <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn o sm" onclick="closeCartDrawer();" style="border: 1px solid var(--ink); background: transparent; color: var(--ink); font-weight: 700; letter-spacing: 0.16em; font-size: 11px; padding: 12px 26px; text-transform: uppercase; text-decoration: none; display: inline-block;">SHOP GEMSTONES</a>
        </div>
      `;
      if (footerEl) footerEl.style.display = 'none';
      if (subtotalEl) subtotalEl.textContent = '₹ 0';
      return;
    }

    if (footerEl) footerEl.style.display = 'block';

    var grandTotal = 0;
    var html = '';

    items.forEach(function(item, idx) {
      var qty = parseInt(item.quantity || item.qty) || 1;
      var rawPrice = parseInt(String(item.unitPrice || item.price || '75').replace(/[^0-9]/g, '')) || 75;
      
      var t1 = item.tier1 || item.basePrice || Math.round(rawPrice * 1.15);
      var t10 = item.tier10 || rawPrice;
      var t50 = item.tier50 || Math.round(rawPrice * 0.88);

      var effectiveUnitPrice = rawPrice;
      var tierNoteText = '';
      if (qty >= 50) {
        effectiveUnitPrice = t50;
        tierNoteText = '₹' + t50.toLocaleString('en-IN') + ' each · 50+ price reached.';
      } else if (qty >= 10) {
        effectiveUnitPrice = t10;
        tierNoteText = '₹' + t10.toLocaleString('en-IN') + ' each · 10+ price reached. 50+ pieces: ₹' + t50.toLocaleString('en-IN') + ' each';
      } else {
        effectiveUnitPrice = t1;
        tierNoteText = '₹' + t1.toLocaleString('en-IN') + ' each · 10+ pieces: ₹' + t10.toLocaleString('en-IN') + ' each';
      }
      var itemTotal = qty * effectiveUnitPrice;
      grandTotal += itemTotal;

      var img = item.img || item.image || '<?php echo esc_url(vivaaz_get_img_url("moonstone.jpg")); ?>';
      var title = item.title || item.name || 'Agate Oval Cabochon · AA';
      var size = item.size || '6×8 mm';

      html += `
        <div class="dri">
          <div class="im">
            <img src="${img}" alt="${title}">
          </div>
          <div>
            <div class="n">${title}</div>
            <div class="m">
              <span>${size}</span>
              <button type="button" onclick="changeCartItemSize(${idx});">Change size</button>
            </div>
            <div class="step s">
              <button type="button" onclick="updateCartItemQty(${idx}, -1);" aria-label="Fewer">−</button>
              <input type="text" value="${qty}" onchange="setCartItemDirectQty(${idx}, this.value);" aria-label="Quantity">
              <button type="button" onclick="updateCartItemQty(${idx}, 1);" aria-label="More">+</button>
            </div>
            <div class="note" style="color:var(--ok,#1E9E52); font-size:11.5px; margin-top:6px; background:none; padding:0;">
              ${tierNoteText}
            </div>
          </div>
          <div class="r">
            <span>₹ ${itemTotal.toLocaleString('en-IN')}</span>
            <button type="button" onclick="removeCartItem(${idx});">Remove</button>
          </div>
        </div>
      `;
    });

    list.innerHTML = html;
    if (subtotalEl) subtotalEl.textContent = '₹ ' + grandTotal.toLocaleString('en-IN');
  }

  function setCartItemDirectQty(index, val) {
    var items = getCartItems();
    if (!items[index]) return;
    var q = parseInt(val) || 1;
    if (q <= 0) {
      removeCartItem(index);
      return;
    }
    items[index].quantity = q;
    items[index].qty = q;
    setCartItems(items);
    renderCartDrawer();
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
