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
  <script>
    window.vivaaz_ajax_obj = {
      ajax_url: '<?php echo esc_url(admin_url("admin-ajax.php")); ?>',
      nonce: '<?php echo wp_create_nonce("vivaaz_auth_nonce"); ?>',
      is_logged_in: <?php echo is_user_logged_in() ? 'true' : 'false'; ?>,
      account_url: '<?php echo esc_url(home_url("/my-account/")); ?>'
    };
  </script>
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
          <button type="button" id="curb" onclick="toggleCurrencyMenu(event)">IN | &#8377; INR &#9662;</button>
          <div class="curm" id="curm" style="display: none; top: 100% !important; margin-top: 4px !important; z-index: 999999 !important;" hidden>
            <button type="button" onclick="switchCurrency('INR')">IN | &#8377; INR</button>
            <button type="button" onclick="switchCurrency('USD')">US | $ USD</button>
            <button type="button" onclick="switchCurrency('EUR')">EU | &euro; EUR</button>
            <button type="button" onclick="switchCurrency('GBP')">UK | &pound; GBP</button>
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
        <a class="mi" data-m="gems" href="<?php echo esc_url(home_url('/gemstones/')); ?>">GEMSTONES <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M7 10l5 5 5-5"/></svg></a>
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
            <a href="<?php echo esc_url(home_url('/gemstones/ruby/')); ?>" data-ph="ruby" onmouseenter="updateGemsMegaPhoto('ruby')">Ruby</a>
            <a href="<?php echo esc_url(home_url('/gemstones/sapphire/')); ?>" data-ph="sapphire" onmouseenter="updateGemsMegaPhoto('sapphire')">Sapphire</a>
            <a href="<?php echo esc_url(home_url('/gemstones/emerald/')); ?>" data-ph="emerald" onmouseenter="updateGemsMegaPhoto('emerald')">Emerald</a>
            <a class="lk" href="<?php echo esc_url(home_url('/gemstones/precious/')); ?>" style="white-space: nowrap;">All precious stones →</a>
          </div>

          <div class="col three">
            <h6>SEMI-PRECIOUS · A TO Z</h6>
            <div class="ls">
              <a href="<?php echo esc_url(home_url('/gemstones/agate/')); ?>" data-ph="agate" onmouseenter="updateGemsMegaPhoto('agate')">Agate</a>
              <a href="<?php echo esc_url(home_url('/gemstones/amazonite/')); ?>" data-ph="amazonite" onmouseenter="updateGemsMegaPhoto('amazonite')">Amazonite</a>
              <a href="<?php echo esc_url(home_url('/gemstones/amber/')); ?>" data-ph="amber" onmouseenter="updateGemsMegaPhoto('amber')">Amber</a>
              <a href="<?php echo esc_url(home_url('/gemstones/amethyst/')); ?>" data-ph="amethyst" onmouseenter="updateGemsMegaPhoto('amethyst')">Amethyst</a>
              <a href="<?php echo esc_url(home_url('/gemstones/aquamarine/')); ?>" data-ph="aquamarine" onmouseenter="updateGemsMegaPhoto('aquamarine')">Aquamarine</a>
              <a href="<?php echo esc_url(home_url('/gemstones/aventurine/')); ?>" data-ph="aventurine" onmouseenter="updateGemsMegaPhoto('aventurine')">Aventurine</a>
              <a href="<?php echo esc_url(home_url('/gemstones/carnelian/')); ?>" data-ph="carnelian" onmouseenter="updateGemsMegaPhoto('carnelian')">Carnelian</a>
              <a href="<?php echo esc_url(home_url('/gemstones/citrine/')); ?>" data-ph="citrine" onmouseenter="updateGemsMegaPhoto('citrine')">Citrine</a>
              <a href="<?php echo esc_url(home_url('/gemstones/garnet/')); ?>" data-ph="garnet" onmouseenter="updateGemsMegaPhoto('garnet')">Garnet</a>
              <a href="<?php echo esc_url(home_url('/gemstones/green-jade/')); ?>" data-ph="green-jade" onmouseenter="updateGemsMegaPhoto('green-jade')">Green Jade</a>
              <a href="<?php echo esc_url(home_url('/gemstones/iolite/')); ?>" data-ph="iolite" onmouseenter="updateGemsMegaPhoto('iolite')">Iolite</a>
              <a href="<?php echo esc_url(home_url('/gemstones/labradorite/')); ?>" data-ph="labradorite" onmouseenter="updateGemsMegaPhoto('labradorite')">Labradorite</a>
              <a href="<?php echo esc_url(home_url('/gemstones/lapis-lazuli/')); ?>" data-ph="lapis-lazuli" onmouseenter="updateGemsMegaPhoto('lapis-lazuli')">Lapis Lazuli</a>
              <a href="<?php echo esc_url(home_url('/gemstones/larimar/')); ?>" data-ph="larimar" onmouseenter="updateGemsMegaPhoto('larimar')">Larimar</a>
              <a href="<?php echo esc_url(home_url('/gemstones/malachite/')); ?>" data-ph="malachite" onmouseenter="updateGemsMegaPhoto('malachite')">Malachite</a>
              <a href="<?php echo esc_url(home_url('/gemstones/onyx/')); ?>" data-ph="onyx" onmouseenter="updateGemsMegaPhoto('onyx')">Onyx</a>
              <a href="<?php echo esc_url(home_url('/gemstones/opal/')); ?>" data-ph="opal" onmouseenter="updateGemsMegaPhoto('opal')">Opal</a>
              <a href="<?php echo esc_url(home_url('/gemstones/peridot/')); ?>" data-ph="peridot" onmouseenter="updateGemsMegaPhoto('peridot')">Peridot</a>
              <a href="<?php echo esc_url(home_url('/gemstones/prehnite/')); ?>" data-ph="prehnite" onmouseenter="updateGemsMegaPhoto('prehnite')">Prehnite</a>
              <a href="<?php echo esc_url(home_url('/gemstones/rainbow-moonstone/')); ?>" data-ph="rainbow-moonstone" onmouseenter="updateGemsMegaPhoto('rainbow-moonstone')">Rainbow Moonstone</a>
              <a href="<?php echo esc_url(home_url('/gemstones/rose-quartz/')); ?>" data-ph="rose-quartz" onmouseenter="updateGemsMegaPhoto('rose-quartz')">Rose Quartz</a>
              <a href="<?php echo esc_url(home_url('/gemstones/tanzanite/')); ?>" data-ph="tanzanite" onmouseenter="updateGemsMegaPhoto('tanzanite')">Tanzanite</a>
              <a href="<?php echo esc_url(home_url('/gemstones/tiger-eye/')); ?>" data-ph="tiger-eye" onmouseenter="updateGemsMegaPhoto('tiger-eye')">Tiger Eye</a>
              <a href="<?php echo esc_url(home_url('/gemstones/topaz/')); ?>" data-ph="topaz" onmouseenter="updateGemsMegaPhoto('topaz')">Topaz</a>
              <a href="<?php echo esc_url(home_url('/gemstones/tourmaline/')); ?>" data-ph="tourmaline" onmouseenter="updateGemsMegaPhoto('tourmaline')">Tourmaline</a>
              <a href="<?php echo esc_url(home_url('/gemstones/turquoise/')); ?>" data-ph="turquoise" onmouseenter="updateGemsMegaPhoto('turquoise')">Turquoise</a>
            </div>
            <a class="lk" href="<?php echo esc_url(home_url('/gemstones/semi-precious/')); ?>">Other stones →</a>
          </div>

          <div class="col">
            <h6>BY CUT</h6>
            <a href="<?php echo esc_url(home_url('/gemstones/?cut=faceted')); ?>">Faceted</a>
            <a href="<?php echo esc_url(home_url('/gemstones/?cut=cabochon')); ?>">Cabochon</a>
            <a href="<?php echo esc_url(home_url('/gemstones/?cut=rose-cut')); ?>">Rose cut</a>
            <a href="<?php echo esc_url(home_url('/gemstones/?cut=briolette')); ?>">Briolette</a>
            <h6 style="margin-top: 22px;">SHOP BY</h6>
            <a href="<?php echo esc_url(home_url('/gemstones/?filter_by=colour')); ?>">Colour</a>
            <a href="<?php echo esc_url(home_url('/gemstones/?filter_by=shape')); ?>">Shape</a>
            <a href="<?php echo esc_url(home_url('/gemstones/?filter_by=price')); ?>">Price</a>
            <a href="<?php echo esc_url(home_url('/astrology/#birthstones')); ?>">Birthstones</a>
            <a href="<?php echo esc_url(home_url('/gemstones/?filter_sold_as=calibrated')); ?>">Pairs &amp; calibrated lots</a>
          </div>

          <!-- Light Photo Box on the Right -->
          <div class="mph" id="mph">
            <span class="cap">NEW THIS WEEK</span>
            <div class="pi">
              <img id="mph-img" src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone">
            </div>
            <b id="mph-name">Rainbow Moonstone</b>
            <small id="mph-desc">Cabochon lots from 3×4 mm</small>
            <a class="link" id="mph-link" href="<?php echo esc_url(home_url('/gemstones/rainbow-moonstone/')); ?>">Shop new arrivals →</a>
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
    'rainbow-moonstone': { name: 'Rainbow Moonstone', desc: 'Cabochon lots from 3×4 mm', file: 'moonstone.jpg' },
    'topaz': { name: 'Topaz', desc: 'Sky, Swiss & London blue', file: 'swiss-topaz.jpg' },
    'agate': { name: 'Agate', desc: 'Banded chalcedony', file: 'moonstone.jpg' },
    'garnet': { name: 'Garnet', desc: 'Rhodolite, hessonite & tsavorite', file: 'ruby.jpg' },
    'peridot': { name: 'Peridot', desc: 'Vivid yellow-green', file: 'emerald.jpg' },
    'citrine': { name: 'Citrine', desc: 'Golden to Madeira orange', file: 'swiss-topaz.jpg' },
    'tourmaline': { name: 'Tourmaline', desc: 'Pink, green & bi-colour', file: 'emerald.jpg' },
    'aquamarine': { name: 'Aquamarine', desc: 'Pale sky-blue beryl', file: 'ceylon-sapphire.jpg' },
    'tanzanite': { name: 'Tanzanite', desc: 'Violet-blue, trichroic', file: 'ceylon-sapphire.jpg' },
    'spinel': { name: 'Spinel', desc: 'Red, pink & hot pink', file: 'ruby.jpg' },
    'opal': { name: 'Opal', desc: 'Ethiopian play of colour', file: 'moonstone.jpg' },
    'labradorite': { name: 'Labradorite', desc: 'Blue flash feldspar', file: 'moonstone.jpg' },
    'lapis-lazuli': { name: 'Lapis Lazuli', desc: 'Deep royal blue', file: 'ceylon-sapphire.jpg' },
    'onyx': { name: 'Onyx', desc: 'Jet black chalcedony', file: 'moonstone.jpg' },
    'carnelian': { name: 'Carnelian', desc: 'Warm orange-red', file: 'ruby.jpg' },
    'rose-quartz': { name: 'Rose Quartz', desc: 'Soft blush pink', file: 'moonstone.jpg' },
    'smoky-quartz': { name: 'Smoky Quartz', desc: 'Warm brown to charcoal', file: 'moonstone.jpg' },
    'prehnite': { name: 'Prehnite', desc: 'Translucent apple green', file: 'emerald.jpg' },
    'iolite': { name: 'Iolite', desc: 'Blue-violet pleochroic', file: 'ceylon-sapphire.jpg' },
    'morganite': { name: 'Morganite', desc: 'Peach to salmon pink beryl', file: 'moonstone.jpg' },
    'kunzite': { name: 'Kunzite', desc: 'Lilac pink spodumene', file: 'moonstone.jpg' },
    'chrysoprase': { name: 'Chrysoprase', desc: 'Apple-green chalcedony', file: 'emerald.jpg' },
    'chalcedony': { name: 'Chalcedony', desc: 'Translucent lavender to aqua', file: 'ceylon-sapphire.jpg' },
    'sunstone': { name: 'Sunstone', desc: 'Oregon & India aventurescence', file: 'ruby.jpg' },
    'aventurine': { name: 'Aventurine', desc: 'Green with mica sparkle', file: 'emerald.jpg' },
    'tigers-eye': { name: "Tiger's Eye", desc: 'Golden chatoyant quartz', file: 'swiss-topaz.jpg' },
    'turquoise': { name: 'Turquoise', desc: 'Sky blue, matrix veins', file: 'ceylon-sapphire.jpg' }
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
    if (e) {
      if (typeof e.stopPropagation === 'function') e.stopPropagation();
      if (typeof e.preventDefault === 'function') e.preventDefault();
    }
    var curm = document.getElementById('curm');
    if (curm) {
      if (curm.style.display === 'block') {
        curm.style.display = 'none';
        curm.hidden = true;
      } else {
        curm.style.display = 'block';
        curm.hidden = false;
      }
    }
  };

  document.addEventListener('click', function(e) {
    var cur = document.querySelector('.cur');
    var curm = document.getElementById('curm');
    if (curm && cur && !cur.contains(e.target)) {
      curm.style.display = 'none';
      curm.hidden = true;
    }
  });
})();
</script>

<!-- MOBILE SLIDE-IN MENU DRAWER (100% SAME-TO-SAME AS PHONE DEMO: .mdr, .top, .acct, .it, .opn, .sb, .leaf, .two, .mcard, .mh, .mchips) -->
<aside class="mdr" id="mobile-menu-drawer" role="dialog" aria-label="Menu" style="display: none;">
  <div class="top">
    <b>VIVAAZ GEMS</b>
    <button type="button" onclick="toggleMobileMenuDrawer();" aria-label="Close" style="background:none; border:0; cursor:pointer; color:var(--ink); display:flex; align-items:center; justify-content:center; padding:4px;">
      <svg class="i" style="width:20px; height:20px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M6.5 6.5l11 11M17.5 6.5l-11 11"/></svg>
    </button>
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
    <div class="mh">PRECIOUS</div>
    <a href="<?php echo esc_url(home_url('/gemstones/ruby/')); ?>" class="leaf">Ruby</a>
    <a href="<?php echo esc_url(home_url('/gemstones/sapphire/')); ?>" class="leaf">Sapphire</a>
    <a href="<?php echo esc_url(home_url('/gemstones/emerald/')); ?>" class="leaf">Emerald</a>
    <a href="<?php echo esc_url(home_url('/gemstones/precious/')); ?>" class="leaf hi">All precious</a>

    <div class="mh">SEMI-PRECIOUS</div>
    <div class="two">
      <a href="<?php echo esc_url(home_url('/gemstones/agate/')); ?>" class="leaf">Agate</a>
      <a href="<?php echo esc_url(home_url('/gemstones/amazonite/')); ?>" class="leaf">Amazonite</a>
      <a href="<?php echo esc_url(home_url('/gemstones/amber/')); ?>" class="leaf">Amber</a>
      <a href="<?php echo esc_url(home_url('/gemstones/amethyst/')); ?>" class="leaf">Amethyst</a>
      <a href="<?php echo esc_url(home_url('/gemstones/aquamarine/')); ?>" class="leaf">Aquamarine</a>
      <a href="<?php echo esc_url(home_url('/gemstones/aventurine/')); ?>" class="leaf">Aventurine</a>
      <a href="<?php echo esc_url(home_url('/gemstones/carnelian/')); ?>" class="leaf">Carnelian</a>
      <a href="<?php echo esc_url(home_url('/gemstones/citrine/')); ?>" class="leaf">Citrine</a>
      <a href="<?php echo esc_url(home_url('/gemstones/garnet/')); ?>" class="leaf">Garnet</a>
      <a href="<?php echo esc_url(home_url('/gemstones/green-jade/')); ?>" class="leaf">Green Jade</a>
      <a href="<?php echo esc_url(home_url('/gemstones/iolite/')); ?>" class="leaf">Iolite</a>
      <a href="<?php echo esc_url(home_url('/gemstones/labradorite/')); ?>" class="leaf">Labradorite</a>
      <a href="<?php echo esc_url(home_url('/gemstones/lapis-lazuli/')); ?>" class="leaf">Lapis Lazuli</a>
      <a href="<?php echo esc_url(home_url('/gemstones/larimar/')); ?>" class="leaf">Larimar</a>
      <a href="<?php echo esc_url(home_url('/gemstones/malachite/')); ?>" class="leaf">Malachite</a>
      <a href="<?php echo esc_url(home_url('/gemstones/onyx/')); ?>" class="leaf">Onyx</a>
      <a href="<?php echo esc_url(home_url('/gemstones/opal/')); ?>" class="leaf">Opal</a>
      <a href="<?php echo esc_url(home_url('/gemstones/peridot/')); ?>" class="leaf">Peridot</a>
      <a href="<?php echo esc_url(home_url('/gemstones/prehnite/')); ?>" class="leaf">Prehnite</a>
      <a href="<?php echo esc_url(home_url('/gemstones/rainbow-moonstone/')); ?>" class="leaf">Rainbow Moonstone</a>
      <a href="<?php echo esc_url(home_url('/gemstones/rose-quartz/')); ?>" class="leaf">Rose Quartz</a>
      <a href="<?php echo esc_url(home_url('/gemstones/tanzanite/')); ?>" class="leaf">Tanzanite</a>
      <a href="<?php echo esc_url(home_url('/gemstones/tiger-eye/')); ?>" class="leaf">Tiger Eye</a>
      <a href="<?php echo esc_url(home_url('/gemstones/topaz/')); ?>" class="leaf">Topaz</a>
      <a href="<?php echo esc_url(home_url('/gemstones/tourmaline/')); ?>" class="leaf">Tourmaline</a>
      <a href="<?php echo esc_url(home_url('/gemstones/turquoise/')); ?>" class="leaf">Turquoise</a>
    </div>
    <a href="<?php echo esc_url(home_url('/gemstones/semi-precious/')); ?>" class="leaf hi">All semi-precious</a>

    <button type="button" class="sb" onclick="toggleMdrSub('cut', this);">
      <span>By cut</span>
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
    </button>
    <div id="mdr-sub-cut" style="display:none;">
      <a href="<?php echo esc_url(home_url('/gemstones/?cut=faceted')); ?>" class="leaf">Faceted</a>
      <a href="<?php echo esc_url(home_url('/gemstones/?cut=cabochon')); ?>" class="leaf">Cabochon</a>
      <a href="<?php echo esc_url(home_url('/gemstones/?cut=rose-cut')); ?>" class="leaf">Rose cut</a>
      <a href="<?php echo esc_url(home_url('/gemstones/?cut=briolette')); ?>" class="leaf">Briolette</a>
    </div>

    <button type="button" class="sb" onclick="toggleMdrSub('by', this);">
      <span>Shop by</span>
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
    </button>
    <div id="mdr-sub-by" style="display:none;">
      <a href="<?php echo esc_url(home_url('/gemstones/?filter_by=colour')); ?>" class="leaf">Colour</a>
      <a href="<?php echo esc_url(home_url('/gemstones/?filter_by=shape')); ?>" class="leaf">Shape</a>
      <a href="<?php echo esc_url(home_url('/gemstones/?filter_by=price')); ?>" class="leaf">Price</a>
      <a href="<?php echo esc_url(home_url('/astrology/#birthstones')); ?>" class="leaf">Birthstones</a>
      <a href="<?php echo esc_url(home_url('/gemstones/?filter_sold_as=calibrated')); ?>" class="leaf">Pairs &amp; calibrated lots</a>
    </div>

    <a href="<?php echo esc_url(home_url('/gemstones/')); ?>" class="leaf hi" style="padding-top:12px;">All gemstones</a>
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

<!-- CONSULTATION MODAL POPUP (POINT 13 SPEC / CENTRED POP-UP) -->
<div class="scrim" id="consultation-modal-scrim" style="display: none; position: fixed; inset: 0; background: rgba(28,26,23,.5); z-index: 99998;" onclick="closeConsultationModal();"></div>
<div class="modal sm" id="vivaaz-consultation-modal" role="dialog" aria-label="Book a consultation" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 99999; max-height: 90vh; overflow-y: auto;">
  <button type="button" class="x" onclick="closeConsultationModal();" aria-label="Close" style="background: none; border: none; font-size: 24px; cursor: pointer; position: absolute; right: 22px; top: 22px; color: var(--ink); line-height: 1;">&times;</button>
  <h3 style="font-family: var(--display); font-size: 24px; font-weight: 400; margin: 0 0 6px;">Book a consultation</h3>
  <p class="sub" style="font-size: 13px; color: var(--mute); margin: 0 0 20px;">We confirm the time of your call on WhatsApp.</p>
  
  <form id="consultation-popup-form" onsubmit="handleConsultationSubmit(event);">
    <div style="margin-bottom: 14px;">
      <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; margin-bottom: 6px; color: var(--soft);">NAME *</label>
      <input type="text" id="consult-name" placeholder="Your name" required style="width: 100%; padding: 10px 14px; border: 1px solid var(--line2); font-size: 13px; box-sizing: border-box; background: var(--paper);" />
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px;">
      <div>
        <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; margin-bottom: 6px; color: var(--soft);">WHATSAPP *</label>
        <input type="tel" id="consult-wa" placeholder="+91 98765 43210" required oninput="clearFieldErr('consult-wa');" style="width: 100%; padding: 10px 14px; border: 1px solid var(--line2); font-size: 13px; box-sizing: border-box; background: var(--paper);" />
        <div id="consult-wa-err" style="display: none; color: #C0392B; font-size: 11px; margin-top: 4px; font-weight: 600;">Please enter a valid 10-digit mobile number</div>
      </div>
      <div>
        <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; margin-bottom: 6px; color: var(--soft);">EMAIL</label>
        <input type="email" id="consult-email" placeholder="Optional" style="width: 100%; padding: 10px 14px; border: 1px solid var(--line2); font-size: 13px; box-sizing: border-box; background: var(--paper);" />
      </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px;">
      <div>
        <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; margin-bottom: 6px; color: var(--soft);">DATE OF BIRTH</label>
        <input type="text" id="consult-dob" placeholder="DD/MM/YYYY" maxlength="10" oninput="formatDobInput(event);" style="width: 100%; padding: 10px 14px; border: 1px solid var(--line2); font-size: 13px; box-sizing: border-box; background: var(--paper);" />
        <div id="consult-dob-err" style="display: none; color: #C0392B; font-size: 11px; margin-top: 4px; font-weight: 600;">Please enter complete date in DD/MM/YYYY format</div>
      </div>
      <div>
        <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; margin-bottom: 6px; color: var(--soft);">TIME OF BIRTH</label>
        <div style="display: flex; gap: 6px; align-items: stretch; height: 38px;">
          <input type="text" id="consult-tob" placeholder="HH:MM (e.g. 08:30)" maxlength="5" oninput="formatTobInput(event);" style="flex: 1; min-width: 0; height: 100%; padding: 0 12px; border: 1px solid var(--line2); font-size: 13px; box-sizing: border-box; background: var(--paper); outline: none; margin: 0; box-shadow: none;" />
          <select id="consult-tob-ampm" style="width: 76px; height: 100%; padding: 0 8px; border: 1px solid var(--line2); font-size: 13px; box-sizing: border-box; background: var(--paper); color: var(--ink); font-weight: 600; cursor: pointer; margin: 0; outline: none; box-shadow: none;">
            <option value="AM">AM</option>
            <option value="PM" selected>PM</option>
          </select>
        </div>
        <div id="consult-tob-err" style="display: none; color: #C0392B; font-size: 11px; margin-top: 4px; font-weight: 600;">Please enter valid time (e.g. 08:30)</div>
      </div>
    </div>

    <div style="margin-bottom: 14px;">
      <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; margin-bottom: 6px; color: var(--soft);">PLACE OF BIRTH</label>
      <input type="text" id="consult-pob" placeholder="City, country" style="width: 100%; padding: 10px 14px; border: 1px solid var(--line2); font-size: 13px; box-sizing: border-box; background: var(--paper);" />
    </div>

    <div style="margin-bottom: 14px;">
      <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; margin-bottom: 6px; color: var(--soft);">I AM ASKING ABOUT</label>
      <div class="consult-pills-row" style="display: flex; flex-wrap: wrap; gap: 6px;">
        <button type="button" class="chip on" onclick="selectConsultTopic('Career', this)">Career</button>
        <button type="button" class="chip" onclick="selectConsultTopic('Health', this)">Health</button>
        <button type="button" class="chip" onclick="selectConsultTopic('Marriage', this)">Marriage</button>
        <button type="button" class="chip" onclick="selectConsultTopic('Wealth', this)">Wealth</button>
        <button type="button" class="chip" onclick="selectConsultTopic('Studies', this)">Studies</button>
        <button type="button" class="chip" onclick="selectConsultTopic('Peace of mind', this)">Peace of mind</button>
        <button type="button" class="chip" onclick="selectConsultTopic('Other', this)">Other</button>
      </div>
    </div>

    <div style="margin-bottom: 18px;">
      <label style="display: block; font-size: 10px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; margin-bottom: 6px; color: var(--soft);">BUDGET FOR THE STONE</label>
      <div class="consult-pills-row" style="display: flex; flex-wrap: wrap; gap: 6px;">
        <button type="button" class="chip" onclick="selectConsultBudget('Under ₹10,000', this)">Under ₹10,000</button>
        <button type="button" class="chip on" onclick="selectConsultBudget('₹10,000–50,000', this)">₹10,000–50,000</button>
        <button type="button" class="chip" onclick="selectConsultBudget('₹50,000+', this)">₹50,000+</button>
        <button type="button" class="chip" onclick="selectConsultBudget('Not sure yet', this)">Not sure yet</button>
      </div>
    </div>

    <p style="font-size: 11.5px; color: var(--soft); margin: 0 0 16px; line-height: 1.5;">
      Paid consultation. We confirm the time of your call on WhatsApp and guide you through natural, certified stones that fit your birth chart and budget.
    </p>

    <button type="submit" class="btn wide" style="width: 100%; padding: 14px; background: #1C1A17; color: #fff; font-size: 12px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; border: none; cursor: pointer;">
      REQUEST CONSULTATION
    </button>
  </form>
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
<div class="modal sm" id="vivaaz-signin-modal" role="dialog" aria-label="Sign in" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:99999;width:min(460px,calc(100% - 32px));max-height:calc(100% - 48px);overflow:auto;background:#FFFDF9;padding:34px 36px 30px;box-shadow:0 30px 80px rgba(0,0,0,.3);box-sizing:border-box;">
  <button type="button" class="x" onclick="closeSignInModal();" aria-label="Close" style="background:none;border:none;font-size:24px;cursor:pointer;position:absolute;right:22px;top:22px;color:var(--ink,#1C1A17);line-height:1;">&times;</button>
  <h3 style="font-family:var(--display,'Playfair Display',Georgia,serif);font-size:32px;font-weight:400;margin:0 0 4px;padding-right:30px;color:var(--ink,#1C1A17);">Sign in</h3>
  <p class="sub" style="font-size:14px;color:var(--mute,#76706A);margin:0 0 20px;">Or create an account. It takes one tap.</p>
  <div id="signin-modal-content">
    <div class="soc-btn-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:8px;margin-bottom:18px;">
      <button type="button" onclick="fakeSocialLogin('Google');" style="border:1px solid var(--line2,#E6E2DC);padding:10px 4px;display:flex;gap:6px;align-items:center;justify-content:center;background:#fff;color:#1C1A17;font-weight:600;font-size:12px;letter-spacing:0;text-transform:none;white-space:nowrap;cursor:pointer;border-radius:0;box-shadow:none;height:42px;box-sizing:border-box;line-height:1;"><span style="width:20px;height:20px;min-width:20px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:#fff;color:#4285F4;border:1px solid #E2D7C6;font-weight:800;font-size:11px;line-height:1;">G</span>Google</button>
      <button type="button" onclick="fakeSocialLogin('Facebook');" style="border:1px solid var(--line2,#E6E2DC);padding:10px 4px;display:flex;gap:6px;align-items:center;justify-content:center;background:#fff;color:#1C1A17;font-weight:600;font-size:12px;letter-spacing:0;text-transform:none;white-space:nowrap;cursor:pointer;border-radius:0;box-shadow:none;height:42px;box-sizing:border-box;line-height:1;"><span style="width:20px;height:20px;min-width:20px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:#1877F2;color:#fff;font-weight:800;font-size:11px;line-height:1;">f</span>Facebook</button>
      <button type="button" onclick="showWhatsAppSignIn();" style="border:1px solid var(--line2,#E6E2DC);padding:10px 4px;display:flex;gap:6px;align-items:center;justify-content:center;background:#fff;color:#1C1A17;font-weight:600;font-size:12px;letter-spacing:0;text-transform:none;white-space:nowrap;cursor:pointer;border-radius:0;box-shadow:none;height:42px;box-sizing:border-box;line-height:1;"><span style="width:20px;height:20px;min-width:20px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:#25D366;color:#fff;line-height:1;"><svg style="width:13px;height:13px;fill:#fff;" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg></span>WhatsApp</button>
    </div>
    <div class="or" style="display:flex;align-items:center;gap:12px;color:var(--soft,#76706A);font-size:12px;margin:18px 0;"><span style="flex:1;height:1px;background:var(--line,#EFE9E0);"></span><span>or</span><span style="flex:1;height:1px;background:var(--line,#EFE9E0);"></span></div>
    <button type="button" class="btn o wide" style="width:100%;height:46px;background:transparent;border:1px solid #1C1A17;color:#1C1A17;font-size:11px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;cursor:pointer;" onclick="showEmailSignIn();">CONTINUE WITH EMAIL</button>
    <p style="font-size:12.5px;color:var(--soft,#76706A);text-align:center;margin:14px 0 0;line-height:1.5;">New here? The same buttons create your account. Guest checkout always stays: no account is needed to buy.</p>
  </div>
</div>

<!-- VIDEO CALL MODAL -->
<div class="scrim" id="videocall-modal-backdrop" style="display:none;position:fixed;inset:0;background:rgba(28,26,23,.5);z-index:99998;" onclick="closeVideoCallModal();"></div>
<div class="modal sm" id="vivaaz-videocall-modal" role="dialog" aria-label="Book a video call" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:99999;max-height:90vh;overflow-y:auto;">
  <button type="button" onclick="closeVideoCallModal();" aria-label="Close" style="background:none;border:none;font-size:24px;cursor:pointer;position:absolute;right:22px;top:22px;color:var(--ink);line-height:1;">&times;</button>
  <h3 style="font-family:var(--display);font-size:24px;font-weight:400;margin:0 0 6px;">Book a video call</h3>
  <p class="sub" style="font-size:13px;color:var(--mute);margin:0 0 20px;">See the exact stones live before you buy. Free.</p>
  <div id="videocall-modal-sent" style="display:none;text-align:center;padding:20px 0;">
    <div style="font-size:40px;margin-bottom:12px;">✓</div>
    <h3 style="font-family:var(--display);font-size:22px;font-weight:400;margin:0 0 8px;">Video call requested.</h3>
    <p style="font-size:13px;color:var(--mute);margin:0 0 20px;">We confirm the time on WhatsApp and show you the exact stones live.</p>
    <button type="button" class="btn" onclick="closeVideoCallModal();" style="padding:12px 28px;">Done</button>
  </div>
  <form id="videocall-form" onsubmit="submitVideoCallForm(event);" style="display:block;">
    <div style="margin-bottom:14px;">
      <label style="display:block;font-size:10px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;margin-bottom:6px;color:var(--soft);">WHEN SUITS YOU</label>
      <div style="display:flex;gap:8px;flex-wrap:wrap;" id="vc-time-chips">
        <button type="button" class="chip on" onclick="selectVcTime('Today', this)" style="border-radius:999px;padding:8px 16px;font-size:12.5px;height:33px;">Today</button>
        <button type="button" class="chip" onclick="selectVcTime('Tomorrow morning', this)" style="border-radius:999px;padding:8px 16px;font-size:12.5px;height:33px;">Tomorrow morning</button>
        <button type="button" class="chip" onclick="selectVcTime('Tomorrow evening', this)" style="border-radius:999px;padding:8px 16px;font-size:12.5px;height:33px;">Tomorrow evening</button>
      </div>
    </div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:14px;">
      <div>
        <label style="display:block;font-size:10px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;margin-bottom:6px;color:var(--soft);">NAME</label>
        <input type="text" id="vc-name" placeholder="Your name" required style="width:100%;padding:10px 14px;border:1px solid var(--line2);font-size:13px;box-sizing:border-box;background:var(--paper);">
      </div>
      <div>
        <label style="display:block;font-size:10px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;margin-bottom:6px;color:var(--soft);">WHATSAPP</label>
        <input type="text" id="vc-wa" placeholder="+91" required style="width:100%;padding:10px 14px;border:1px solid var(--line2);font-size:13px;box-sizing:border-box;background:var(--paper);">
      </div>
    </div>
    <button type="submit" style="width:100%;padding:14px;background:#1C1A17;color:#fff;border:none;font-size:12px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;cursor:pointer;">Request a video call</button>
  </form>
</div>

<!-- QUICK VIEW MODAL -->
<div class="scrim" id="quickview-modal-backdrop" style="display:none;position:fixed;inset:0;background:rgba(28,26,23,.5);z-index:99998;" onclick="closeQuickViewModal();"></div>
<div class="modal qvm" id="vivaaz-quickview-modal" role="dialog" aria-label="Quick view" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:99999;max-height:90vh;overflow-y:auto;width:min(860px,calc(100% - 32px));">
  <button type="button" onclick="closeQuickViewModal();" aria-label="Close" style="background:none;border:none;font-size:24px;cursor:pointer;position:absolute;right:22px;top:22px;color:var(--ink);line-height:1;z-index:2;">&times;</button>
  <div id="quickview-modal-body" style="padding:0;"></div>
</div>

<!-- MACRO VIDEO MODAL (HOMEPAGE MACRO & UNDER THE LOUPE) -->
<div class="scrim" id="videomodal-backdrop" style="display:none;position:fixed;inset:0;background:rgba(28,26,23,.75);z-index:99998;" onclick="closeVideoModal();"></div>
<div class="modal vm" id="vivaaz-video-modal" role="dialog" aria-label="Stone video" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:99999;max-height:90vh;overflow-y:auto;width:min(680px,calc(100% - 32px));background:#1C1A17;color:#fff;padding:26px;border:1px solid #3B362F;box-sizing:border-box;">
  <button type="button" onclick="closeVideoModal();" aria-label="Close" style="background:none;border:none;font-size:26px;cursor:pointer;position:absolute;right:20px;top:18px;color:#fff;line-height:1;z-index:2;">&times;</button>
  <span class="cap" style="color:#9B7C4E;font-size:10.5px;letter-spacing:0.2em;text-transform:uppercase;font-weight:700;display:block;margin-bottom:6px;">4K MACRO GEMSTONE VIDEO</span>
  <h3 id="video-modal-title" style="font-family:var(--display);font-size:22px;font-weight:400;margin:0 0 16px;color:#fff;">Ceylon Sapphire Oval Faceted</h3>
  
  <div style="aspect-ratio:16/10;background:#0F0E0C;position:relative;display:flex;align-items:center;justify-content:center;overflow:hidden;border:1px solid #333;margin-bottom:18px;">
    <img id="video-modal-poster" src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Stone Video" style="max-width:85%;max-height:85%;object-fit:contain;transition:transform 3s ease;">
    <div style="position:absolute;bottom:14px;left:14px;background:rgba(0,0,0,0.75);padding:6px 12px;font-size:11px;letter-spacing:0.12em;font-weight:600;color:#fff;">
      ▶ 0:40 · 4K MACRO · JAIPUR WORKSHOP
    </div>
  </div>

  <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;">
    <div style="font-size:13px;color:#CFC6B8;max-width:320px;line-height:1.4;">
      Exact lot photographed under natural daylight & loupe. No color enhancement.
    </div>
    <div style="display:flex;gap:10px;">
      <a href="https://wa.me/919680552270?text=Hello%20Vivaaz%20Gems,%20I%20would%20like%20to%20see%20more%20macro%20videos%20of%20this%20stone" target="_blank" class="btn wa" style="padding:10px 18px;font-size:11.5px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;background:#1E9E52;color:#fff;text-decoration:none;display:inline-flex;align-items:center;">
        Ask on WhatsApp
      </a>
      <button type="button" class="btn" onclick="closeVideoModal();openVideoCallModal();" style="padding:10px 18px;font-size:11.5px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;background:#fff;color:#1C1A17;border:1px solid #fff;cursor:pointer;">
        Book a Video Call
      </button>
    </div>
  </div>
</div>

<!-- DESIGN QUOTE / SEND YOUR DESIGN MODAL -->
<div class="scrim" id="designquote-modal-backdrop" style="display:none;position:fixed;inset:0;background:rgba(28,26,23,.5);z-index:99998;" onclick="closeDesignQuoteModal();"></div>
<div class="modal" id="vivaaz-designquote-modal" role="dialog" aria-label="Send your design" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:99999;max-height:90vh;overflow-y:auto;">
  <button type="button" onclick="closeDesignQuoteModal();" aria-label="Close" style="background:none;border:none;font-size:24px;cursor:pointer;position:absolute;right:22px;top:22px;color:var(--ink);line-height:1;">&times;</button>
  <h3 style="font-family:var(--display);font-size:24px;font-weight:400;margin:0 0 6px;">Send your design</h3>
  <p class="sub" style="font-size:13px;color:var(--mute);margin:0 0 20px;">A photo or sketch and the size is enough. We match it from our stock in Jaipur or Bangkok.</p>
  <div id="designquote-sent" style="display:none;text-align:center;padding:20px 0;">
    <div style="font-size:40px;margin-bottom:12px;">✓</div>
    <h3 style="font-family:var(--display);font-size:22px;font-weight:400;margin:0 0 8px;">Request sent.</h3>
    <p style="font-size:13px;color:var(--mute);margin:0 0 20px;">We will message you on WhatsApp. Asking is free and there is no obligation.</p>
    <button type="button" class="btn" onclick="closeDesignQuoteModal();" style="padding:12px 28px;">Done</button>
  </div>
  <form id="designquote-form" onsubmit="submitDesignQuoteForm(event);">
    <div style="margin-bottom:14px;">
      <label style="display:block;font-size:10px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;margin-bottom:6px;color:var(--soft);">STONE & SHAPE / SIZE</label>
      <input type="text" id="dq-stone" placeholder="e.g. Ruby oval, 5×7 mm" style="width:100%;padding:10px 14px;border:1px solid var(--line2);font-size:13px;box-sizing:border-box;background:var(--paper);">
    </div>
    <div style="margin-bottom:14px;">
      <label style="display:block;font-size:10px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;margin-bottom:6px;color:var(--soft);">PHOTO OR SKETCH (OPTIONAL)</label>
      <input type="file" id="dq-photo" accept="image/*" style="width:100%;padding:10px 14px;border:1px solid var(--line2);font-size:13px;box-sizing:border-box;background:var(--paper);height:auto;">
    </div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:14px;">
      <div>
        <label style="display:block;font-size:10px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;margin-bottom:6px;color:var(--soft);">NAME *</label>
        <input type="text" id="dq-name" placeholder="Your name" required style="width:100%;padding:10px 14px;border:1px solid var(--line2);font-size:13px;box-sizing:border-box;background:var(--paper);">
      </div>
      <div>
        <label style="display:block;font-size:10px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;margin-bottom:6px;color:var(--soft);">WHATSAPP *</label>
        <input type="text" id="dq-wa" placeholder="+91" required style="width:100%;padding:10px 14px;border:1px solid var(--line2);font-size:13px;box-sizing:border-box;background:var(--paper);">
      </div>
    </div>
    <div style="margin-bottom:18px;">
      <label style="display:block;font-size:10px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;margin-bottom:6px;color:var(--soft);">NOTES (OPTIONAL)</label>
      <textarea id="dq-notes" placeholder="Budget, number of stones, length, anything else" rows="3" style="width:100%;padding:10px 14px;border:1px solid var(--line2);font-size:13px;box-sizing:border-box;background:var(--paper);resize:vertical;"></textarea>
    </div>
    <button type="submit" style="width:100%;padding:14px;background:#1C1A17;color:#fff;border:none;font-size:12px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;cursor:pointer;">Send request</button>
  </form>
</div>

<script>
  var _vivaazCatalog = [
    // RUBY (Point 9 Comprehensive Coverage)
    { name: "Ruby Oval Faceted · AA", code: "RBFOV", price: "₹ 980 / pc", shape: "Oval", size: "5×7 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/burma-ruby-oval-faceted/')); ?>" },
    { name: "Ruby Round Cabochon", code: "RBCRD", price: "₹ 140 / pc", shape: "Round", size: "4 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/burma-ruby-oval-faceted/')); ?>" },
    { name: "Ruby Oval Faceted Matched Pair", code: "RBFPR", price: "₹ 6,800 / pair", shape: "Oval", size: "7×5 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/burma-ruby-oval-faceted/')); ?>" },
    { name: "Ruby Graduated Line Layout", code: "LAYRBY", price: "₹ 38,000", shape: "Necklace line", size: "17 stones", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/layouts/?stone=ruby')); ?>" },
    { name: "Ruby Faceted Rondelle Beads 4 mm", code: "RBD4", price: "₹ 760", shape: "Rondelle", size: "4 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/beads/?stone=Ruby')); ?>" },
    { name: "Ruby Tennis Bracelet (14K / 18K)", code: "TBRBY", price: "from ₹ 24,000", shape: "Line", size: "7 in", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/jewelry/?stone=ruby')); ?>" },

    // SAPPHIRE
    { name: "Ceylon Blue Sapphire Oval Faceted", code: "BSFOV", price: "₹ 1,450 / pc", shape: "Oval", size: "5×7 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" },
    { name: "Ceylon Blue Sapphire Round · AA", code: "BSFRD", price: "₹ 620 / pc", shape: "Round", size: "3 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" },
    { name: "Ceylon Sapphire Single Stone 2.10ct", code: "BSF1", price: "₹ 38,500", shape: "Cushion", size: "7×7 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" },
    { name: "Sapphire Tennis Bracelet", code: "TBSPH", price: "from ₹ 28,000", shape: "Line", size: "7 in", img: "<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>", url: "<?php echo esc_url(home_url('/jewelry/?stone=sapphire')); ?>" },

    // EMERALD
    { name: "Zambian Emerald Octagon Step Cut", code: "EMFOC", price: "₹ 24,500", shape: "Octagon", size: "8×6 mm", img: "<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/zambian-emerald-octagon/')); ?>" },
    { name: "Zambian Emerald Oval Faceted · AA", code: "EMFOV", price: "₹ 890 / pc", shape: "Oval", size: "5×7 mm", img: "<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/zambian-emerald-octagon/')); ?>" },
    { name: "Emerald Necklace Line Layout", code: "LAYEMR", price: "₹ 42,000", shape: "Necklace line", size: "15 stones", img: "<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>", url: "<?php echo esc_url(home_url('/layouts/?stone=emerald')); ?>" },

    // MOONSTONE
    { name: "Rainbow Moonstone Oval Cabochon", code: "RMCOC68", price: "₹ 120 / pc", shape: "Oval", size: "6×8 mm", img: "<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>" },
    { name: "Rainbow Moonstone Oval Pair", code: "RMCPR", price: "₹ 2,600 / pair", shape: "Oval", size: "10×12 mm", img: "<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>" },
    { name: "Rainbow Moonstone 32ct Collector Lot", code: "RMC1825", price: "₹ 4,800", shape: "Oval", size: "18×25 mm", img: "<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>" },
    { name: "Rainbow Moonstone Rose Cut Pear", code: "RMRCP", price: "₹ 160 / pc", shape: "Pear", size: "8×12 mm", img: "<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/rainbow-moonstone-oval-cabochon/')); ?>" },

    // TOPAZ & SPINEL & AMETHYST
    { name: "Swiss Blue Topaz Square Cushion", code: "TPFOV", price: "₹ 120 / pc", shape: "Cushion", size: "6×8 mm", img: "<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?stone=topaz')); ?>" },
    { name: "Burma Pink Spinel Oval Faceted", code: "SPFOV", price: "₹ 720 / pc", shape: "Oval", size: "4×6 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?stone=spinel')); ?>" },
    { name: "Amethyst Oval Calibrated Lot", code: "AMFOV", price: "₹ 140 / pc", shape: "Oval", size: "6×8 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?stone=amethyst')); ?>" },
    { name: "Amethyst Faceted Rondelle Beads 4 mm", code: "AMBD4", price: "₹ 680", shape: "Rondelle", size: "4 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/beads/?stone=Amethyst')); ?>" },

    // GENERAL JEWELRY & LAYOUTS
    { name: "Graduated Tennis Bracelet (Silver / Gold)", code: "TBRAC", price: "from ₹ 18,500", shape: "Line", size: "7 in", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/jewelry/')); ?>" },
    { name: "Custom Matched Gemstone Layout", code: "LAYCUST", price: "Quote on CAD", shape: "Custom", size: "To spec", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/layouts/')); ?>" }
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
        document.body.style.overflow = 'hidden';
        setTimeout(function() {
          drawer.classList.add('open');
          if (backdrop) backdrop.classList.add('open');
        }, 10);
      } else {
        drawer.classList.remove('open');
        if (backdrop) backdrop.classList.remove('open');
        document.body.style.overflow = '';
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
        <div class="soc-btn-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:8px;margin-bottom:18px;">
          <button type="button" onclick="fakeSocialLogin('Google');" style="border:1px solid var(--line2,#E6E2DC);padding:10px 4px;display:flex;gap:6px;align-items:center;justify-content:center;background:#fff;color:#1C1A17;font-weight:600;font-size:12px;letter-spacing:0;text-transform:none;white-space:nowrap;cursor:pointer;border-radius:0;box-shadow:none;height:42px;box-sizing:border-box;line-height:1;"><span style="width:20px;height:20px;min-width:20px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:#fff;color:#4285F4;border:1px solid #E2D7C6;font-weight:800;font-size:11px;line-height:1;">G</span>Google</button>
          <button type="button" onclick="fakeSocialLogin('Facebook');" style="border:1px solid var(--line2,#E6E2DC);padding:10px 4px;display:flex;gap:6px;align-items:center;justify-content:center;background:#fff;color:#1C1A17;font-weight:600;font-size:12px;letter-spacing:0;text-transform:none;white-space:nowrap;cursor:pointer;border-radius:0;box-shadow:none;height:42px;box-sizing:border-box;line-height:1;"><span style="width:20px;height:20px;min-width:20px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:#1877F2;color:#fff;font-weight:800;font-size:11px;line-height:1;">f</span>Facebook</button>
          <button type="button" onclick="showWhatsAppSignIn();" style="border:1px solid var(--line2,#E6E2DC);padding:10px 4px;display:flex;gap:6px;align-items:center;justify-content:center;background:#fff;color:#1C1A17;font-weight:600;font-size:12px;letter-spacing:0;text-transform:none;white-space:nowrap;cursor:pointer;border-radius:0;box-shadow:none;height:42px;box-sizing:border-box;line-height:1;"><span style="width:20px;height:20px;min-width:20px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:#25D366;color:#fff;line-height:1;"><svg style="width:13px;height:13px;fill:#fff;" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg></span>WhatsApp</button>
        </div>
        <div class="or" style="display:flex;align-items:center;gap:12px;color:var(--soft,#76706A);font-size:12px;margin:18px 0;"><span style="flex:1;height:1px;background:var(--line,#EFE9E0);"></span><span>or</span><span style="flex:1;height:1px;background:var(--line,#EFE9E0);"></span></div>
        <button type="button" class="btn o wide" style="width:100%;height:46px;background:transparent;border:1px solid #1C1A17;color:#1C1A17;font-size:11px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;cursor:pointer;" onclick="showEmailSignIn();">CONTINUE WITH EMAIL</button>
        <p style="font-size:12.5px;color:var(--soft,#76706A);text-align:center;margin:14px 0 0;line-height:1.5;">New here? The same buttons create your account. Guest checkout always stays: no account is needed to buy.</p>
      `;
    }
  }

  function showWhatsAppSignIn() {
    var content = document.getElementById('signin-modal-content');
    if (!content) return;
    content.innerHTML = `
      <form onsubmit="handleWhatsAppSignInSubmit(event);">
        <div style="margin-bottom:14px;">
          <label for="sim" style="display:block;font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;margin-bottom:6px;color:var(--ink,#1C1A17);">WhatsApp Mobile Number</label>
          <input id="sim" type="tel" required placeholder="+91 98290 00000" value="+91 " style="width:100%;height:44px;padding:0 12px;border:1px solid #D9CFC0;background:var(--paper,#fff);box-sizing:border-box;font-size:14px;">
          <small style="display:block;color:var(--soft,#76706A);font-size:11.5px;margin-top:5px;">We send a one-time code on WhatsApp (or click direct login below).</small>
        </div>
        <button type="submit" class="btn wide" style="width:100%;padding:14px;background:#25D366;color:#fff;border:none;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;cursor:pointer;margin-bottom:10px;">Send WhatsApp code</button>
        <div style="text-align:center;margin-top:10px;">
          <a href="https://wa.me/919680552270?text=Hello%20Vivaaz%20Gems,%20I%20would%20like%20to%20sign%20in%20to%20my%20account%20via%20WhatsApp." target="_blank" style="font-size:12px;color:#1E9E52;font-weight:600;text-decoration:underline;">Or chat with us directly on WhatsApp →</a>
        </div>
        <p style="font-size:12.5px;text-align:center;margin:14px 0 0;">
          <a href="javascript:void(0);" onclick="resetSignInModal();" style="color:var(--gold,#9B7C4E);text-decoration:underline;">← Back to all options</a>
        </p>
      </form>
    `;
  }
  window.showWhatsAppSignIn = showWhatsAppSignIn;

  function handleWhatsAppSignInSubmit(e) {
    e.preventDefault();
    var num = (document.getElementById('sim') || {}).value || '+91';
    var content = document.getElementById('signin-modal-content');
    if (!content) return;
    content.innerHTML = `
      <form onsubmit="handleOtpVerify(event);">
        <p style="margin:0 0 12px;font-size:13.5px;color:var(--ink,#1C1A17);">Enter the 6-digit code sent to <b>` + String(num).replace(/</g, '&lt;') + `</b> on WhatsApp.</p>
        <div class="otp" style="display:flex;gap:8px;justify-content:center;margin:16px 0;">
          <input maxlength="1" value="4" style="width:42px;height:48px;text-align:center;font-size:20px;font-weight:700;border:1px solid #D9CFC0;">
          <input maxlength="1" value="8" style="width:42px;height:48px;text-align:center;font-size:20px;font-weight:700;border:1px solid #D9CFC0;">
          <input maxlength="1" value="2" style="width:42px;height:48px;text-align:center;font-size:20px;font-weight:700;border:1px solid #D9CFC0;">
          <input maxlength="1" value="6" style="width:42px;height:48px;text-align:center;font-size:20px;font-weight:700;border:1px solid #D9CFC0;">
          <input maxlength="1" value="1" style="width:42px;height:48px;text-align:center;font-size:20px;font-weight:700;border:1px solid #D9CFC0;">
          <input maxlength="1" value="9" style="width:42px;height:48px;text-align:center;font-size:20px;font-weight:700;border:1px solid #D9CFC0;">
        </div>
        <button type="submit" class="btn wide" style="width:100%;padding:14px;background:#1C1A17;color:#fff;border:none;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;cursor:pointer;">Verify and sign in</button>
        <p style="font-size:12.5px;color:var(--soft,#76706A);text-align:center;margin-top:12px;">Didn't get it? <a href="javascript:void(0);" onclick="showWhatsAppSignIn();" style="color:var(--gold,#9B7C4E);text-decoration:underline;">Send again</a> · <a href="javascript:void(0);" onclick="resetSignInModal();" style="color:var(--gold,#9B7C4E);text-decoration:underline;">All options</a></p>
      </form>
    `;
  }
  window.handleWhatsAppSignInSubmit = handleWhatsAppSignInSubmit;

  function handleOtpVerify(e) {
    e.preventDefault();
    fakeSocialLogin('WhatsApp');
  }
  window.handleOtpVerify = handleOtpVerify;

  function showEmailSignIn(tab) {
    var mode = tab || 'signin';
    var content = document.getElementById('signin-modal-content');
    if (!content) return;
    content.innerHTML = `
      <div style="display:flex;border-bottom:1px solid #EFE9E0;margin-bottom:16px;">
        <button type="button" id="tab-btn-signin" onclick="showEmailSignIn('signin')" style="flex:1;padding:10px;background:none;border:none;border-bottom:2px solid ` + (mode==='signin'?'#1C1A17':'transparent') + `;font-size:12px;font-weight:` + (mode==='signin'?'700':'500') + `;color:` + (mode==='signin'?'#1C1A17':'var(--soft)') + `;cursor:pointer;letter-spacing:0.12em;text-transform:uppercase;">Sign In</button>
        <button type="button" id="tab-btn-register" onclick="showEmailSignIn('register')" style="flex:1;padding:10px;background:none;border:none;border-bottom:2px solid ` + (mode==='register'?'#1C1A17':'transparent') + `;font-size:12px;font-weight:` + (mode==='register'?'700':'500') + `;color:` + (mode==='register'?'#1C1A17':'var(--soft)') + `;cursor:pointer;letter-spacing:0.12em;text-transform:uppercase;">Create Account</button>
      </div>

      <div id="vivaaz-auth-msg" style="display:none;padding:10px 14px;font-size:12.5px;margin-bottom:14px;"></div>

      ` + (mode === 'signin' ? `
        <form onsubmit="handleRealLogin(event);">
          <div class="fg" style="margin-bottom:14px;display:flex;flex-direction:column;gap:12px;">
            <div class="f full">
              <label for="sie" style="display:block;font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;margin-bottom:6px;">Email address</label>
              <input id="sie" type="email" required placeholder="name@example.com" value="" style="width:100%;height:44px;padding:0 12px;border:1px solid #D9CFC0;background:var(--paper);box-sizing:border-box;">
            </div>
            <div class="f full">
              <div style="display:flex;justify-content:space-between;margin-bottom:6px;">
                <label for="sip" style="font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;">Password</label>
                <a href="<?php echo esc_url(wp_lostpassword_url()); ?>" target="_blank" style="font-size:11.5px;color:var(--soft);text-decoration:underline;">Forgot password?</a>
              </div>
              <input id="sip" type="password" required placeholder="Enter password" value="" style="width:100%;height:44px;padding:0 12px;border:1px solid #D9CFC0;background:var(--paper);box-sizing:border-box;">
            </div>
          </div>
          <button type="submit" id="sie-submit-btn" class="btn wide" style="width:100%;padding:14px;">SIGN IN</button>
          <p style="font-size:12.5px;text-align:center;margin:14px 0 0;">
            <a href="javascript:void(0);" onclick="resetSignInModal();" style="color:var(--gold);text-decoration:underline;">← All sign in options</a> · Don't have an account? <a href="javascript:void(0);" onclick="showEmailSignIn('register');" style="color:var(--ink);font-weight:600;text-decoration:underline;">Register</a>
          </p>
        </form>
      ` : `
        <form onsubmit="handleRealRegister(event);">
          <div class="fg" style="margin-bottom:14px;display:flex;flex-direction:column;gap:12px;">
            <div class="f full">
              <label for="reg-name" style="display:block;font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;margin-bottom:6px;">Your Name</label>
              <input id="reg-name" type="text" placeholder="Full name" value="" style="width:100%;height:44px;padding:0 12px;border:1px solid #D9CFC0;background:var(--paper);box-sizing:border-box;">
            </div>
            <div class="f full">
              <label for="reg-email" style="display:block;font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;margin-bottom:6px;">Email address</label>
              <input id="reg-email" type="email" required placeholder="name@example.com" value="" style="width:100%;height:44px;padding:0 12px;border:1px solid #D9CFC0;background:var(--paper);box-sizing:border-box;">
            </div>
            <div class="f full">
              <label for="reg-pass" style="display:block;font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;margin-bottom:6px;">Password (at least 6 characters)</label>
              <input id="reg-pass" type="password" required minlength="6" placeholder="Create a password" value="" style="width:100%;height:44px;padding:0 12px;border:1px solid #D9CFC0;background:var(--paper);box-sizing:border-box;">
            </div>
          </div>
          <button type="submit" id="reg-submit-btn" class="btn wide" style="width:100%;padding:14px;">CREATE AN ACCOUNT</button>
          <p style="font-size:12.5px;text-align:center;margin:14px 0 0;">
            <a href="javascript:void(0);" onclick="resetSignInModal();" style="color:var(--gold);text-decoration:underline;">← All sign in options</a> · Already have an account? <a href="javascript:void(0);" onclick="showEmailSignIn('signin');" style="color:var(--ink);font-weight:600;text-decoration:underline;">Sign in</a>
          </p>
        </form>
      `);
  }

  function handleRealLogin(e) {
    e.preventDefault();
    var email = (document.getElementById('sie') || {}).value;
    var pass = (document.getElementById('sip') || {}).value;
    var btn = document.getElementById('sie-submit-btn');
    var msgBox = document.getElementById('vivaaz-auth-msg');

    if (!email || !pass) return;

    if (btn) { btn.disabled = true; btn.textContent = 'SIGNING IN...'; }
    if (msgBox) { msgBox.style.display = 'none'; }

    var formData = new FormData();
    formData.append('action', 'vivaaz_ajax_login');
    formData.append('email', email);
    formData.append('password', pass);
    if (window.vivaaz_ajax_obj && window.vivaaz_ajax_obj.nonce) {
      formData.append('security', window.vivaaz_ajax_obj.nonce);
    }

    var ajaxUrl = (window.vivaaz_ajax_obj && window.vivaaz_ajax_obj.ajax_url) ? window.vivaaz_ajax_obj.ajax_url : '/wp-admin/admin-ajax.php';

    fetch(ajaxUrl, {
      method: 'POST',
      body: formData
    })
    .then(function(res) { return res.json(); })
    .then(function(data) {
      if (data && data.success) {
        showWishlistToast((data.data && data.data.message) ? data.data.message : 'Signed in successfully.');
        setTimeout(function() {
          if (window.location.pathname.indexOf('my-account') !== -1) {
            window.location.reload();
          } else {
            window.location.href = ((data.data && data.data.redirect) ? data.data.redirect : (window.vivaaz_ajax_obj ? window.vivaaz_ajax_obj.account_url : '/my-account/'));
          }
        }, 500);
      } else {
        if (btn) { btn.disabled = false; btn.textContent = 'SIGN IN'; }
        if (msgBox) {
          msgBox.style.display = 'block';
          msgBox.style.background = '#FDF2F2';
          msgBox.style.color = '#C0392B';
          msgBox.style.border = '1px solid #F5C6CB';
          msgBox.textContent = (data && data.data && data.data.message) ? data.data.message : 'Invalid credentials. Please try again.';
        }
      }
    })
    .catch(function(err) {
      if (btn) { btn.disabled = false; btn.textContent = 'SIGN IN'; }
      if (msgBox) {
        msgBox.style.display = 'block';
        msgBox.style.background = '#FDF2F2';
        msgBox.style.color = '#C0392B';
        msgBox.style.border = '1px solid #F5C6CB';
        msgBox.textContent = 'Could not connect to authentication server. Please check your credentials or try again.';
      }
    });
  }

  function handleRealRegister(e) {
    e.preventDefault();
    var name = (document.getElementById('reg-name') || {}).value;
    var email = (document.getElementById('reg-email') || {}).value;
    var pass = (document.getElementById('reg-pass') || {}).value;
    var btn = document.getElementById('reg-submit-btn');
    var msgBox = document.getElementById('vivaaz-auth-msg');

    if (!email || !pass) return;

    if (btn) { btn.disabled = true; btn.textContent = 'CREATING ACCOUNT...'; }
    if (msgBox) { msgBox.style.display = 'none'; }

    var formData = new FormData();
    formData.append('action', 'vivaaz_ajax_register');
    formData.append('name', name);
    formData.append('email', email);
    formData.append('password', pass);
    if (window.vivaaz_ajax_obj && window.vivaaz_ajax_obj.nonce) {
      formData.append('security', window.vivaaz_ajax_obj.nonce);
    }

    var ajaxUrl = (window.vivaaz_ajax_obj && window.vivaaz_ajax_obj.ajax_url) ? window.vivaaz_ajax_obj.ajax_url : '/wp-admin/admin-ajax.php';

    fetch(ajaxUrl, {
      method: 'POST',
      body: formData
    })
    .then(function(res) { return res.json(); })
    .then(function(data) {
      if (data && data.success) {
        showWishlistToast((data.data && data.data.message) ? data.data.message : 'Account created successfully!');
        setTimeout(function() {
          window.location.href = ((data.data && data.data.redirect) ? data.data.redirect : (window.vivaaz_ajax_obj ? window.vivaaz_ajax_obj.account_url : '/my-account/'));
        }, 500);
      } else {
        if (btn) { btn.disabled = false; btn.textContent = 'CREATE AN ACCOUNT'; }
        if (msgBox) {
          msgBox.style.display = 'block';
          msgBox.style.background = '#FDF2F2';
          msgBox.style.color = '#C0392B';
          msgBox.style.border = '1px solid #F5C6CB';
          msgBox.textContent = (data && data.data && data.data.message) ? data.data.message : 'Registration failed. Please check inputs.';
        }
      }
    })
    .catch(function(err) {
      if (btn) { btn.disabled = false; btn.textContent = 'CREATE AN ACCOUNT'; }
      if (msgBox) {
        msgBox.style.display = 'block';
        msgBox.style.background = '#FDF2F2';
        msgBox.style.color = '#C0392B';
        msgBox.style.border = '1px solid #F5C6CB';
        msgBox.textContent = 'Could not connect to authentication server. Please check inputs or try again.';
      }
    });
  }

  function fakeSocialLogin(provider) {
    showWishlistToast('Signing in with ' + provider + '...');
    setTimeout(function() {
      closeSignInModal();
      window.location.href = (window.vivaaz_ajax_obj ? window.vivaaz_ajax_obj.account_url : '/my-account/');
    }, 800);
  }

  // Close modals & sheets on Escape key (Point 17 Spec)
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' || e.keyCode === 27) {
      closeLiveSearchModal();
      closeSignInModal();
      closeCartDrawer();
      closeVideoCallModal();
      closeQuickViewModal();
      closeDesignQuoteModal();
      closeConsultationModal();
      if (typeof jewCloseQuoteModal === 'function') jewCloseQuoteModal();
      if (typeof astroCloseConsultModal === 'function') astroCloseConsultModal();
      if (typeof closeJewSheets === 'function') closeJewSheets();
      if (typeof closeMobileMenuDrawer === 'function') closeMobileMenuDrawer();
      if (typeof closeAllModals === 'function') closeAllModals();
      document.querySelectorAll('.sheet.open, .sheet[style*="display: flex"]').forEach(function(s) {
        s.classList.remove('open');
        s.style.display = 'none';
      });
      var scrim = document.getElementById('vivaaz-scrim') || document.getElementById('mobile-jew-scrim') || document.getElementById('filter-drawer-backdrop');
      if (scrim) scrim.style.display = 'none';
      document.body.style.overflow = '';
    }
  });

  // REAL MULTI-CURRENCY ENGINE (Point 6 Spec)
  var VIVAAZ_CURRENCIES = {
    'INR': { symbol: '\u20B9 ', rate: 1, label: 'IN | \u20B9 INR' },
    'USD': { symbol: '$ ', rate: 1/84, label: 'US | $ USD' },
    'EUR': { symbol: '\u20AC ', rate: 1/91, label: 'EU | \u20AC EUR' },
    'GBP': { symbol: '\u00A3 ', rate: 1/106, label: 'UK | \u00A3 GBP' },
    'AED': { symbol: 'AED ', rate: 1/22.9, label: 'AE | AED' }
  };

  function getCurrentCurrency() {
    try {
      return localStorage.getItem('vivaaz_currency') || 'INR';
    } catch(e) {
      return 'INR';
    }
  }

  function formatVivaazMoney(inrAmount) {
    var cur = getCurrentCurrency();
    var c = VIVAAZ_CURRENCIES[cur] || VIVAAZ_CURRENCIES['INR'];
    var num = parseFloat(inrAmount) || 0;
    if (cur === 'INR') {
      return '\u20B9 ' + Math.round(num).toLocaleString('en-IN');
    }
    var converted = num * c.rate;
    return c.symbol + converted.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
  }

  function switchCurrency(curr) {
    if (!VIVAAZ_CURRENCIES[curr]) curr = 'INR';
    try {
      localStorage.setItem('vivaaz_currency', curr);
    } catch(e) {}

    var curb = document.getElementById('curb');
    if (curb) curb.innerHTML = VIVAAZ_CURRENCIES[curr].label + ' &#9662;';

    var curm = document.getElementById('curm');
    if (curm) {
      curm.style.display = 'none';
      curm.hidden = true;
    }

    var mobileChips = document.querySelectorAll('.chips button[onclick*="switchCurrency"], aside .chip[onclick*="switchCurrency"]');
    mobileChips.forEach(function(btn) {
      if (btn.getAttribute('onclick') && btn.getAttribute('onclick').indexOf(curr) !== -1) {
        btn.classList.add('on');
      } else {
        btn.classList.remove('on');
      }
    });

    if (typeof renderCartDrawer === 'function') renderCartDrawer();
    vivaazUpdateAllPrices(curr);
    if (typeof window.recalcPricing === 'function') window.recalcPricing();
    try {
      window.dispatchEvent(new CustomEvent('vivaaz-currency-changed', { detail: { currency: curr } }));
    } catch(e) {}
    showWishlistToast('Prices now in ' + curr);
  }

  function vivaazUpdateAllPrices(curr) {
    if (!curr) curr = getCurrentCurrency();
    var c = VIVAAZ_CURRENCIES[curr] || VIVAAZ_CURRENCIES['INR'];

    // 1. Elements with explicit data-inr-price
    document.querySelectorAll('[data-inr-price]').forEach(function(el) {
      var inr = parseFloat(el.getAttribute('data-inr-price'));
      if (!isNaN(inr)) {
        var spanEl = el.querySelector('span');
        var suffixHtml = spanEl ? (' ' + spanEl.outerHTML) : (el.getAttribute('data-suffix-html') || '');
        var hasFrom = /from/i.test(el.textContent) || el.getAttribute('data-has-from') === '1';
        if (hasFrom) el.setAttribute('data-has-from', '1');
        if (suffixHtml) el.setAttribute('data-suffix-html', suffixHtml);
        
        var prefix = hasFrom ? 'from ' : '';
        el.innerHTML = prefix + formatVivaazMoney(inr) + (suffixHtml ? ' ' + suffixHtml : '');
      }
    });

    // 2. All product card price elements (.pr, .card-price, .p-price, etc.)
    document.querySelectorAll('.card .pr, .rv .pr, .prod-card .pr, .cb .pr, .pr').forEach(function(el) {
      if (!el.getAttribute('data-inr-price')) {
        var card = el.closest('[data-price]');
        if (card && card.getAttribute('data-price')) {
          el.setAttribute('data-inr-price', card.getAttribute('data-price'));
        } else {
          var match = el.textContent.match(/[₹\?]\s*([0-9,]+(?:\.[0-9]+)?)/);
          if (match && match[1]) {
            el.setAttribute('data-inr-price', match[1].replace(/,/g, ''));
          }
        }
        if (/from/i.test(el.textContent)) {
          el.setAttribute('data-has-from', '1');
        }
        var s = el.querySelector('span');
        if (s) {
          el.setAttribute('data-suffix-html', s.outerHTML);
        }
      }

      var inr = parseFloat(el.getAttribute('data-inr-price'));
      if (!isNaN(inr)) {
        var prefix = (el.getAttribute('data-has-from') === '1') ? 'from ' : '';
        var suffix = el.getAttribute('data-suffix-html') || (el.querySelector('span') ? el.querySelector('span').outerHTML : '');
        el.innerHTML = prefix + formatVivaazMoney(inr) + (suffix ? ' ' + suffix : '');
      }
    });

    // 3. Update quick view modal active display
    if (window._qvCurrentPrice) {
      var qvDisplay = document.getElementById('qv-price-display');
      if (qvDisplay) {
        qvDisplay.innerHTML = formatVivaazMoney(window._qvCurrentPrice) + ' <span style="font-size:13px;font-weight:400;color:var(--mute);">' + (window._qvCurrentUnit || '') + '</span>';
      }
    }

    // 4. Update currency dropdown button label & mobile chips
    var curb = document.getElementById('curb');
    if (curb) curb.innerHTML = c.label + ' ▾';

    var mobileChips = document.querySelectorAll('.chips button[onclick*="switchCurrency"], aside .chip[onclick*="switchCurrency"]');
    mobileChips.forEach(function(btn) {
      if (btn.getAttribute('onclick') && btn.getAttribute('onclick').indexOf(curr) !== -1) {
        btn.classList.add('on');
      } else {
        btn.classList.remove('on');
      }
    });

    try {
      window.dispatchEvent(new CustomEvent('vivaaz-currency-changed', { detail: { currency: curr } }));
    } catch(e) {}

    // Product page sync
    if (typeof recalcPricing === 'function') {
      try { recalcPricing(); } catch(e) {}
    }
    // Cart/Checkout page sync
    if (typeof vivaazRecalcCartTotals === 'function') {
      try { vivaazRecalcCartTotals(); } catch(e) {}
    }
    if (typeof vivaazUpdateCheckoutTotals === 'function') {
      try { vivaazUpdateCheckoutTotals(); } catch(e) {}
    }
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
    
    // Update all product card heart buttons on page (both SVG and text)
    document.querySelectorAll('.heart-btn-circle, .wishlist-heart-btn, [data-wishlist-id]').forEach(function(btn) {
      var id = String(btn.getAttribute('data-wishlist-id') || '');
      if (!id) {
        var oc = btn.getAttribute('onclick') || '';
        var m = oc.match(/toggleProductWishlist\s*\(\s*['"]([^'"]+)['"]/);
        if (m && m[1]) id = m[1];
      }
      var isSaved = id && ids.indexOf(id) > -1;
      var svg = btn.querySelector('svg');
      if (isSaved) {
        btn.classList.add('in-wishlist');
        if (svg) {
          svg.setAttribute('fill', '#C0392B');
          svg.style.color = '#C0392B';
          svg.style.stroke = '#C0392B';
        } else {
          btn.innerHTML = '♥';
          btn.style.color = '#C0392B';
        }
      } else {
        btn.classList.remove('in-wishlist');
        if (svg) {
          svg.setAttribute('fill', 'none');
          svg.style.color = 'var(--ink, #1C1A17)';
          svg.style.stroke = 'currentColor';
        } else {
          btn.innerHTML = '♡';
          btn.style.color = '';
        }
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
    var badges = document.querySelectorAll('#cb, #cb-mobile, .header-bag-count, .cart-count, #cart-drawer-count, #mobile-nav-bag-count');
    badges.forEach(function(badge) {
      badge.textContent = count;
      if (badge.id === 'cb' || badge.id === 'cb-mobile' || badge.classList.contains('badge')) {
        badge.style.display = count > 0 ? 'inline-flex' : 'none';
      }
    });
  }

  function addProductToCartAndOpenDrawer(productId, title, img, priceHtml, size, qty, color, basePrice, tier10, tier50, openDrawer) {
    if (typeof openDrawer === 'undefined') openDrawer = true;
    var items = getCartItems();
    var quantity = parseInt(qty) || 12;
    var rawPrice = parseInt(String(priceHtml || '105').replace(/[^0-9]/g, '')) || 105;
    var selectedSize = size || '6×8 mm';
    var selectedColor = color || '';
    var baseUnitPrice = basePrice ? parseInt(basePrice) : Math.round(rawPrice * 1.14);
    var t10 = tier10 ? parseInt(tier10) : rawPrice;
    var t50 = tier50 ? parseInt(tier50) : Math.round(rawPrice * 0.88);
    
    var existingIndex = items.findIndex(function(it) {
      return (it.product_id === productId || it.title === title) && (it.size === selectedSize) && (it.color === selectedColor);
    });

    if (existingIndex > -1) {
      items[existingIndex].quantity = (parseInt(items[existingIndex].quantity || items[existingIndex].qty) || 1) + quantity;
      items[existingIndex].qty = items[existingIndex].quantity;
    } else {
      items.push({
        key: 'cart_' + Date.now(),
        product_id: productId,
        title: title || 'Gemstone',
        sku: 'VG-' + (productId || Date.now()),
        size: selectedSize,
        color: selectedColor,
        quality: '',
        qty: quantity,
        quantity: quantity,
        unitPrice: rawPrice,
        baseUnitPrice: baseUnitPrice,
        tier1: baseUnitPrice,
        tier10: t10,
        tier50: t50,
        total: quantity * rawPrice,
        image: img || '<?php echo esc_url(vivaaz_get_img_url("moonstone.jpg")); ?>'
      });
    }

    setCartItems(items);
    if (openDrawer) {
      openCartDrawer();
    }
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
      if (subtotalEl) subtotalEl.textContent = formatVivaazMoney(0);
      return;
    }

    if (footerEl) footerEl.style.display = 'block';

    var grandTotal = 0;
    var html = '';

    items.forEach(function(item, idx) {
      var title = item.title || item.name || 'Agate Oval Cabochon · AA';
      var qty = parseInt(item.quantity || item.qty) || 1;
      var rawPrice = parseInt(String(item.unitPrice || item.price || '75').replace(/[^0-9]/g, '')) || 75;
      var size = item.size || '6×8 mm';
      var color = item.color || '';
      var img = item.img || item.image || '<?php echo esc_url(vivaaz_get_img_url("moonstone.jpg")); ?>';
      
      var lowerTitle = title.toLowerCase();
      var isSingleOrPair = (item.isSingle || item.single || (lowerTitle.indexOf('pair') !== -1) || (lowerTitle.indexOf('single') !== -1) || (lowerTitle.indexOf('only 1') !== -1) || (lowerTitle.indexOf('strand') !== -1) || (lowerTitle.indexOf('layout') !== -1));
      
      var effectiveUnitPrice = rawPrice;
      var tierNoteText = '';

      if (isSingleOrPair) {
        effectiveUnitPrice = rawPrice;
        tierNoteText = '';
      } else {
        var baseUnitPrice = item.baseUnitPrice || item.tier1 || rawPrice;
        var t10 = item.tier10 || Math.round(baseUnitPrice * 0.88);
        var t50 = item.tier50 || Math.round(baseUnitPrice * 0.78);

        if (qty >= 50) {
          effectiveUnitPrice = t50;
          tierNoteText = formatVivaazMoney(t50) + ' each · 50+ price reached.';
        } else if (qty >= 10) {
          effectiveUnitPrice = t10;
          tierNoteText = formatVivaazMoney(t10) + ' each · 10+ price reached. 50+ pieces: ' + formatVivaazMoney(t50) + ' each';
        } else {
          effectiveUnitPrice = baseUnitPrice;
          tierNoteText = 'Add ' + (10 - qty) + ' more for ' + formatVivaazMoney(t10) + ' each';
        }
      }
      var itemTotal = qty * effectiveUnitPrice;
      grandTotal += itemTotal;

      var availableSizes = ['3×4 mm', '4×6 mm', '5×7 mm', '6×8 mm', '7×9 mm', '8×10 mm', '10×12 mm'];
      var chipsHtml = availableSizes.map(function(s) {
        return '<button type="button" class="chip sm ' + (s === size ? 'on' : '') + '" onclick="setCartItemInlineSize(' + idx + ', \'' + s + '\')" style="padding: 4px 8px; font-size: 11px; margin: 2px;">' + s + '</button>';
      }).join('');

      html += `
        <div class="dri" style="border-bottom: 1px solid var(--line, #EFE9E0); padding: 16px 0;">
          <div class="im">
            <img src="${img}" alt="${title}">
          </div>
          <div style="flex: 1;">
            <div class="n" style="font-weight: 600; font-size: 14px; margin-bottom: 4px;">${title}</div>
            <div class="m" style="font-size: 12.5px; color: var(--soft); display: flex; align-items: center; gap: 8px; margin-bottom: 6px;">
              <span>${size}</span>${color ? `<span style="color:#9B7C4E;">· ${color}</span>` : ''}
              ${isSingleOrPair ? '' : `<button type="button" onclick="toggleCartItemSizeChips(${idx});" style="background:none; border:none; padding:0; color:#9B7C4E; text-decoration:underline; font-size:12px; cursor:pointer;">Change size</button>`}
            </div>
            <div id="cart-item-chips-${idx}" style="display: none; flex-wrap: wrap; gap: 4px; margin: 6px 0 10px; background: #FAF7F2; padding: 8px; border: 1px solid var(--line);">
              ${chipsHtml}
            </div>
            <div class="step s" style="display: inline-flex; align-items: stretch; border: 1px solid var(--ink); height: 32px; box-sizing: border-box; overflow: hidden; padding: 0; margin: 0; background: #fff; vertical-align: middle;">
              <button type="button" onclick="updateCartItemQty(${idx}, -1);" aria-label="Fewer" style="width: 28px; height: 100%; border: none; background: transparent; font-size: 15px; cursor: pointer; display: flex; align-items: center; justify-content: center; padding: 0; margin: 0; outline: none; box-shadow: none; line-height: 1; color: var(--ink);">−</button>
              <input type="text" value="${qty}" onchange="setCartItemDirectQty(${idx}, this.value);" aria-label="Quantity" style="width: 38px; height: 100%; min-height: 0; border: none; border-left: 1px solid var(--line); border-right: 1px solid var(--line); text-align: center; font-size: 13px; font-weight: 600; margin: 0; padding: 0; outline: none; box-shadow: none; background: transparent; box-sizing: border-box; line-height: 1; border-radius: 0; color: var(--ink);">
              <button type="button" onclick="updateCartItemQty(${idx}, 1);" aria-label="More" style="width: 28px; height: 100%; border: none; background: transparent; font-size: 15px; cursor: pointer; display: flex; align-items: center; justify-content: center; padding: 0; margin: 0; outline: none; box-shadow: none; line-height: 1; color: var(--ink);">+</button>
            </div>
            ${tierNoteText ? `<div class="note" style="color:var(--ok,#1E9E52); font-size:11.5px; margin-top:6px; background:none; padding:0;">${tierNoteText}</div>` : ''}
          </div>
          <div class="r" style="text-align: right; min-width: 80px;">
            <span style="font-weight: 600; font-size: 14.5px; display: block; margin-bottom: 8px;">${formatVivaazMoney(itemTotal)}</span>
            <button type="button" onclick="removeCartItem(${idx});" style="background:none; border:none; color:var(--soft); font-size:12px; text-decoration:underline; cursor:pointer;">Remove</button>
          </div>
        </div>
      `;
    });

    html += '<div style="height: 24px; flex-shrink: 0;" aria-hidden="true"></div>';

    list.innerHTML = html;
    if (subtotalEl) subtotalEl.textContent = formatVivaazMoney(grandTotal);
  }

  function toggleCartItemSizeChips(idx) {
    var el = document.getElementById('cart-item-chips-' + idx);
    if (el) el.style.display = (el.style.display === 'none' || !el.style.display) ? 'flex' : 'none';
  }

  function setCartItemInlineSize(idx, newSize) {
    var items = getCartItems();
    if (!items[idx]) return;
    items[idx].size = newSize;
    setCartItems(items);
    renderCartDrawer();
    showWishlistToast('Size updated to ' + newSize);
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
    var scrim = document.getElementById('consultation-modal-scrim');
    if (modal) {
      modal.style.display = 'block';
    }
    if (scrim) {
      scrim.style.display = 'block';
    }
    document.body.style.overflow = 'hidden';
  }

  function closeConsultationModal() {
    var modal = document.getElementById('vivaaz-consultation-modal');
    var scrim = document.getElementById('consultation-modal-scrim');
    if (modal) {
      modal.style.display = 'none';
    }
    if (scrim) {
      scrim.style.display = 'none';
    }
    document.body.style.overflow = '';
  }

  // UNIVERSAL PHONE VALIDATION HELPER
  function isValidVivaazPhone(phoneStr) {
    if (!phoneStr) return false;
    var str = String(phoneStr).trim();
    var digits = str.replace(/\D/g, '');
    
    // Strip leading international code if Indian (+91 or 91 or 0)
    if (digits.length === 12 && digits.indexOf('91') === 0) {
      digits = digits.substring(2);
    } else if (digits.length === 11 && digits.indexOf('0') === 0) {
      digits = digits.substring(1);
    }
    
    // Must be between 10 and 15 digits
    if (digits.length < 10 || digits.length > 15) {
      return false;
    }
    
    // Reject repetitive fake numbers (e.g. 0000000000, 1111111111)
    if (/^(\d)\1{9,}$/.test(digits)) {
      return false;
    }
    
    // For 10-digit Indian numbers, verify it starts with valid mobile digit 6-9
    if (digits.length === 10 && !/^[6-9]/.test(digits) && str.indexOf('+') !== 0) {
      return false;
    }
    
    return true;
  }
  window.isValidVivaazPhone = isValidVivaazPhone;

  function clearFieldErr(fieldId) {
    var errEl = document.getElementById(fieldId + '-err');
    var inputEl = document.getElementById(fieldId);
    if (errEl) errEl.style.display = 'none';
    if (inputEl) {
      inputEl.style.borderColor = 'var(--line2, #E6E2DC)';
      inputEl.style.background = 'var(--paper, #FFFFFF)';
    }
  }
  window.clearFieldErr = clearFieldErr;

  function formatDobInput(e) {
    var input = e.target;
    var v = input.value.replace(/\D/g, '').slice(0, 8);
    if (v.length >= 5) {
      input.value = v.slice(0, 2) + '/' + v.slice(2, 4) + '/' + v.slice(4);
    } else if (v.length >= 3) {
      input.value = v.slice(0, 2) + '/' + v.slice(2);
    } else {
      input.value = v;
    }
    clearFieldErr(input.id);
  }
  window.formatDobInput = formatDobInput;

  function formatTobInput(e) {
    var input = e.target;
    var v = input.value.replace(/\D/g, '').slice(0, 4);
    if (v.length >= 3) {
      input.value = v.slice(0, 2) + ':' + v.slice(2);
    } else {
      input.value = v;
    }
    clearFieldErr(input.id);
  }
  window.formatTobInput = formatTobInput;

  var _consultTopic = 'Career';
  var _consultBudget = '₹10,000–50,000';

  function selectConsultTopic(topic, btn) {
    _consultTopic = topic;
    var pills = btn.parentElement.querySelectorAll('.chip');
    pills.forEach(function(p) { p.classList.remove('on'); });
    btn.classList.add('on');
  }

  function selectConsultBudget(budget, btn) {
    _consultBudget = budget;
    var pills = btn.parentElement.querySelectorAll('.chip');
    pills.forEach(function(p) { p.classList.remove('on'); });
    btn.classList.add('on');
  }

  function handleConsultationSubmit(e) {
    e.preventDefault();
    var name = (document.getElementById('consult-name').value || '').trim();
    var waInput = document.getElementById('consult-wa');
    var waErr = document.getElementById('consult-wa-err');
    var wa = (waInput ? waInput.value : '').trim();

    // Strict Phone Validation
    if (!isValidVivaazPhone(wa)) {
      if (waErr) waErr.style.display = 'block';
      if (waInput) {
        waInput.focus();
        waInput.style.borderColor = '#C0392B';
        waInput.style.background = '#FFF5F5';
      }
      return;
    }
    if (waErr) waErr.style.display = 'none';
    if (waInput) {
      waInput.style.borderColor = 'var(--line2, #E6E2DC)';
      waInput.style.background = 'var(--paper, #FFFFFF)';
    }

    var email = (document.getElementById('consult-email').value || '').trim();
    var dobInput = document.getElementById('consult-dob');
    var dobErr = document.getElementById('consult-dob-err');
    var dob = (dobInput ? dobInput.value : '').trim();

    // Strict Date of Birth Validation (DD/MM/YYYY)
    if (dob) {
      var parts = dob.split('/');
      var d = parseInt(parts[0], 10);
      var m = parseInt(parts[1], 10);
      var y = parseInt(parts[2], 10);
      var currentYear = new Date().getFullYear();
      if (parts.length !== 3 || (parts[2] || '').length !== 4 || isNaN(d) || isNaN(m) || isNaN(y) || d < 1 || d > 31 || m < 1 || m > 12 || y < 1900 || y > currentYear) {
        if (dobErr) dobErr.style.display = 'block';
        if (dobInput) {
          dobInput.focus();
          dobInput.style.borderColor = '#C0392B';
          dobInput.style.background = '#FFF5F5';
        }
        return;
      }
    }
    if (dobErr) dobErr.style.display = 'none';
    if (dobInput) {
      dobInput.style.borderColor = 'var(--line2, #E6E2DC)';
      dobInput.style.background = 'var(--paper, #FFFFFF)';
    }

    // Time of Birth with AM / PM
    var tobInput = document.getElementById('consult-tob');
    var ampmSelect = document.getElementById('consult-tob-ampm');
    var tobVal = (tobInput ? tobInput.value : '').trim();
    var tob = '';
    if (tobVal) {
      var ampm = ampmSelect ? ampmSelect.value : 'PM';
      tob = tobVal + ' ' + ampm;
    }

    var pob = (document.getElementById('consult-pob').value || '').trim();

    var text = 'Namaste, I want to book an Astrology Consultation.\n' +
      'Name: ' + name + '\n' +
      'WhatsApp: ' + wa + '\n' +
      (email ? ('Email: ' + email + '\n') : '') +
      (dob ? ('DOB: ' + dob + '\n') : '') +
      (tob ? ('Time: ' + tob + '\n') : '') +
      (pob ? ('Place: ' + pob + '\n') : '') +
      'Topic: ' + _consultTopic + '\n' +
      'Budget: ' + _consultBudget;

    // Send backend notification
    var formData = new FormData();
    formData.append('action', 'vivaaz_send_enquiry');
    formData.append('type', 'Astrology Consultation: ' + _consultTopic);
    formData.append('name', name);
    formData.append('phone', wa);
    formData.append('email', email);
    formData.append('details', 'DOB: ' + dob + ' | Time: ' + tob + ' | Place: ' + pob + ' | Topic: ' + _consultTopic + ' | Budget: ' + _consultBudget);
    fetch('<?php echo admin_url("admin-ajax.php"); ?>', { method: 'POST', body: formData }).catch(function(){});

    closeConsultationModal();
    window.open('https://wa.me/919680552270?text=' + encodeURIComponent(text), '_blank');
  }

  // VIDEO CALL MODAL
  var _vcTime = 'Today';
  function selectVcTime(time, btn) {
    _vcTime = time;
    var chips = document.querySelectorAll('#vc-time-chips .chip');
    chips.forEach(function(c) {
      c.classList.remove('on');
      c.style.background = 'var(--paper)';
      c.style.color = 'var(--ink)';
      c.style.borderColor = 'var(--line2)';
    });
    if (btn) {
      btn.classList.add('on');
      btn.style.background = 'var(--ink)';
      btn.style.color = '#fff';
      btn.style.borderColor = 'var(--ink)';
    }
  }
  function openVideoCallModal() {
    var modal = document.getElementById('vivaaz-videocall-modal');
    var backdrop = document.getElementById('videocall-modal-backdrop');
    var sent = document.getElementById('videocall-modal-sent');
    var form = document.getElementById('videocall-form');
    if (sent) sent.style.display = 'none';
    if (form) form.style.display = 'block';
    if (modal) { modal.style.display = 'block'; }
    if (backdrop) { backdrop.style.display = 'block'; }
    document.body.style.overflow = 'hidden';
  }
  function closeVideoCallModal() {
    var modal = document.getElementById('vivaaz-videocall-modal');
    var backdrop = document.getElementById('videocall-modal-backdrop');
    if (modal) modal.style.display = 'none';
    if (backdrop) backdrop.style.display = 'none';
    document.body.style.overflow = '';
  }
  function submitVideoCallForm(e) {
    e.preventDefault();
    var name = (document.getElementById('vc-name') || {}).value || '';
    var waInput = document.getElementById('vc-wa');
    var wa = (waInput ? waInput.value : '').trim();

    if (!isValidVivaazPhone(wa)) {
      if (waInput) {
        waInput.focus();
        waInput.style.borderColor = '#C0392B';
        waInput.style.background = '#FFF5F5';
      }
      return;
    }
    if (waInput) {
      waInput.style.borderColor = 'var(--line2, #E6E2DC)';
      waInput.style.background = 'var(--paper, #FFFFFF)';
    }

    var sent = document.getElementById('videocall-modal-sent');
    var form = document.getElementById('videocall-form');
    if (sent) sent.style.display = 'block';
    if (form) form.style.display = 'none';
    var text = 'Hello Vivaaz Gems, I would like to book a video call.\nName: ' + name + '\nWhatsApp: ' + wa + '\nWhen suits me: ' + _vcTime;
    window.open('https://wa.me/919680552270?text=' + encodeURIComponent(text), '_blank');
  }

  // UNIVERSAL QUICK VIEW MODAL
  var _qvCatalog = {
    'rmcoc68': {
      name: 'Rainbow Moonstone Oval Cabochon',
      code: 'RMCOC68',
      price: 'from ₹94',
      unit: 'per piece',
      sizes: ['3×4 mm', '4×6 mm', '5×7 mm', '6×8 mm', '7×9 mm'],
      sizePrices: {
        '3×4 mm': 94,
        '4×6 mm': 94,
        '5×7 mm': 105,
        '6×8 mm': 120,
        '7×9 mm': 165
      },
      stone: 'moonstone',
      url: '<?php echo esc_url(home_url("/product/rainbow-moonstone-oval-cabochon/")); ?>'
    },
    'bsfov': {
      name: 'Ceylon Blue Sapphire Oval Faceted',
      code: 'BSFOV',
      price: 'from ₹1,131',
      unit: 'per piece',
      sizes: ['3×5 mm', '4×6 mm', '5×7 mm', '6×8 mm', '7×9 mm'],
      sizePrices: {
        '3×5 mm': 1131,
        '4×6 mm': 1350,
        '5×7 mm': 1650,
        '6×8 mm': 2200,
        '7×9 mm': 3100
      },
      stone: 'ceylon-sapphire',
      url: '<?php echo esc_url(home_url("/product/ceylon-blue-sapphire-7x5mm/")); ?>'
    },
    'rmcpr': {
      name: 'Rainbow Moonstone Oval Matched Pair',
      code: 'RMCPR',
      price: '₹ 2,600',
      unit: 'for the pair',
      sizes: ['6×8 mm', '7×9 mm', '10×12 mm'],
      sizePrices: {
        '6×8 mm': 1800,
        '7×9 mm': 2200,
        '10×12 mm': 2600
      },
      stone: 'moonstone',
      url: '<?php echo esc_url(home_url("/product/rainbow-moonstone-oval-cabochon/")); ?>'
    },
    'rmc1825': {
      name: 'Rainbow Moonstone 32ct Collector Lot',
      code: 'RMC1825',
      price: '₹ 4,800',
      unit: 'one stone',
      sizes: ['18×25 mm · 32 ct'],
      sizePrices: {
        '18×25 mm · 32 ct': 4800
      },
      stone: 'moonstone',
      url: '<?php echo esc_url(home_url("/product/rainbow-moonstone-oval-cabochon/")); ?>'
    },
    'br-oval': {
      name: 'Burma Ruby Oval Faceted',
      code: 'RBFOV',
      price: 'from ₹1,450',
      unit: 'per piece',
      sizes: ['4×6 mm', '5×7 mm', '6×8 mm', '7×9 mm', '8×10 mm'],
      sizePrices: {
        '4×6 mm': 1450,
        '5×7 mm': 1850,
        '6×8 mm': 2400,
        '7×9 mm': 3200,
        '8×10 mm': 4500
      },
      stone: 'ruby',
      url: '<?php echo esc_url(home_url("/product/burma-ruby-oval-faceted/")); ?>'
    },
    'ze-oct': {
      name: 'Zambian Emerald Emerald Cut',
      code: 'EMFOC',
      price: 'from ₹1,850',
      unit: 'per piece',
      sizes: ['4×6 mm', '5×7 mm', '6×8 mm', '7×9 mm'],
      sizePrices: {
        '4×6 mm': 1850,
        '5×7 mm': 2400,
        '6×8 mm': 3100,
        '7×9 mm': 4200
      },
      stone: 'emerald',
      url: '<?php echo esc_url(home_url("/product/zambian-emerald-octagon/")); ?>'
    }
  };

  window.onQvSelectSize = function(size, price) {
    var prEl = document.getElementById('qv-price-display');
    if (prEl) {
      if (typeof formatVivaazMoney === 'function') {
        prEl.innerHTML = formatVivaazMoney(price) + ' <span style="font-size:13px;font-weight:400;color:var(--mute);">' + window._qvCurrentUnit + '</span>';
      } else {
        prEl.innerHTML = '₹ ' + Number(price).toLocaleString('en-IN') + ' <span style="font-size:13px;font-weight:400;color:var(--mute);">' + window._qvCurrentUnit + '</span>';
      }
    }
    window._qvCurrentSize = size;
    window._qvCurrentPrice = price;
  };

  window.vivaazAddToCartAjax = function(productId, size, qty) {
    var item = _qvCatalog[productId];
    if (item) {
      var selSize = size || item.sizes[0] || '4×6 mm';
      var selPrice = 0;
      if (item.sizePrices) {
        selPrice = item.sizePrices[selSize] || item.sizePrices[selSize.replace(/x/g, '×')] || item.sizePrices[selSize.replace(/×/g, 'x')];
      }
      if (!selPrice) {
        selPrice = parseInt(String(item.price).replace(/[^0-9]/g, '')) || 94;
      }
      var img = item.imgUrl || ('<?php echo esc_url(get_stylesheet_directory_uri() . "/assets/images/"); ?>' + (item.stone || 'moonstone') + '.jpg');
      addProductToCartAndOpenDrawer(productId, item.name, img, selPrice, selSize, qty || 10);
    } else {
      addProductToCartAndOpenDrawer(productId, 'Natural Gemstone', '<?php echo esc_url(vivaaz_get_img_url("moonstone.jpg")); ?>', 94, size || '4×6 mm', qty || 10);
    }
  };

  function openQuickView(titleOrId, price, img, url, code, sizes) {
    var p = null;
    if (_qvCatalog[titleOrId]) {
      p = _qvCatalog[titleOrId];
    } else if (typeof titleOrId === 'string' && (!price || typeof price !== 'string')) {
      p = _qvCatalog[titleOrId] || {
        name: titleOrId,
        code: 'VG-GEM',
        price: '₹ 94',
        unit: 'per piece',
        sizes: ['4×6 mm', '5×7 mm', '6×8 mm', '7×9 mm'],
        sizePrices: { '4×6 mm': 94, '5×7 mm': 105, '6×8 mm': 120, '7×9 mm': 165 },
        stone: 'moonstone',
        url: '<?php echo esc_url(home_url("/shop/")); ?>'
      };
    } else {
      var rawTitle = titleOrId || 'Natural Gemstone';
      var rawPrice = price || 'from ₹94';
      var rawImg = img || '<?php echo esc_url(vivaaz_get_img_url("moonstone.jpg")); ?>';
      var rawUrl = url || '<?php echo esc_url(home_url("/shop/")); ?>';
      var rawCode = code || 'VG-LOT';
      var rawSizes = (Array.isArray(sizes) && sizes.length) ? sizes : ['4×6 mm', '5×7 mm', '6×8 mm', '7×9 mm'];
      var isPair = rawTitle.toLowerCase().indexOf('pair') !== -1;
      var isSingle = rawTitle.toLowerCase().indexOf('single') !== -1 || rawTitle.toLowerCase().indexOf('only 1') !== -1;
      var numPrice = parseInt(String(rawPrice).replace(/[^0-9]/g, '')) || 94;
      p = {
        name: rawTitle,
        code: rawCode,
        price: rawPrice,
        unit: isPair ? 'for the pair' : (isSingle ? 'one stone' : 'per piece'),
        sizes: rawSizes,
        sizePrices: {},
        imgUrl: rawImg,
        url: rawUrl
      };
      p.sizes.forEach(function(s, idx) {
        p.sizePrices[s] = Math.round(numPrice * (1 + idx * 0.18));
      });
    }

    var modal = document.getElementById('vivaaz-quickview-modal');
    var backdrop = document.getElementById('quickview-modal-backdrop');
    var body = document.getElementById('quickview-modal-body');
    if (!modal || !body) return;

    var finalImg = p.imgUrl || ('<?php echo esc_url(get_stylesheet_directory_uri() . "/assets/images/"); ?>' + (p.stone || 'moonstone') + '.jpg');
    var firstSize = p.sizes[0] || '4×6 mm';
    var firstPrice = (p.sizePrices && p.sizePrices[firstSize]) ? p.sizePrices[firstSize] : (parseInt(String(p.price).replace(/[^0-9]/g, '')) || 94);

    window._qvCurrentName = p.name;
    window._qvCurrentImg = finalImg;
    window._qvCurrentSize = firstSize;
    window._qvCurrentPrice = firstPrice;
    window._qvCurrentUnit = p.unit;

    var initialPriceDisplay = (typeof formatVivaazMoney === 'function') ? formatVivaazMoney(firstPrice) : ('₹ ' + Number(firstPrice).toLocaleString('en-IN'));

    var html = '<div class="qvg" style="display:grid;grid-template-columns:1fr 1fr;gap:30px;align-items:center;">' +
      '<div class="qvi" style="background:#F4F2EE;display:flex;align-items:center;justify-content:center;aspect-ratio:1;overflow:hidden;">' +
      '<img src="' + finalImg + '" alt="' + (p.name || 'Stone') + '" style="width:72%;object-fit:contain;"></div>' +
      '<div>' +
        '<span style="font-size:11px;letter-spacing:0.16em;color:#9B7C4E;font-weight:700;text-transform:uppercase;">' + p.code + '</span>' +
        '<h3 style="font-family:var(--display);font-size:24px;font-weight:400;margin:8px 0;line-height:1.25;">' + p.name + '</h3>' +
        '<div id="qv-price-display" style="font-size:24px;font-weight:600;margin:0 0 16px;">' + initialPriceDisplay + ' <span style="font-size:13px;font-weight:400;color:var(--mute);">' + p.unit + '</span></div>' +
        '<div style="font-size:10.5px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;color:var(--soft);margin-bottom:8px;">SIZE (MM)</div>' +
        '<div class="chips" style="display:flex;gap:6px;flex-wrap:wrap;margin-bottom:20px;">' +
        p.sizes.map(function(s, i) {
          var sp = (p.sizePrices && p.sizePrices[s]) ? p.sizePrices[s] : firstPrice;
          return '<button type="button" class="chip' + (i===0?' on':'') + '" onclick="this.parentElement.querySelectorAll(\'.chip\').forEach(function(c){c.classList.remove(\'on\')});this.classList.add(\'on\');window.onQvSelectSize(\'' + s + '\', ' + sp + ');" style="border-radius:0;padding:7px 14px;font-size:12.5px;cursor:pointer;">' + s + '</button>';
        }).join('') +
        '</div>' +
        '<div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">' +
        '<button type="button" class="btn" onclick="addProductToCartAndOpenDrawer(0, window._qvCurrentName, window._qvCurrentImg, window._qvCurrentPrice, window._qvCurrentSize, 10);closeQuickViewModal();" style="padding:12px;cursor:pointer;">Add to cart</button>' +
        '<a href="' + p.url + '" class="btn o" onclick="closeQuickViewModal();" style="padding:12px;text-decoration:none;display:flex;align-items:center;justify-content:center;">Full details</a>' +
        '</div>' +
      '</div></div>';

    body.innerHTML = html;
    modal.style.display = 'block';
    if (backdrop) backdrop.style.display = 'block';
    document.body.style.overflow = 'hidden';
  }

  function openQuickViewModal(id) {
    openQuickView(id);
  }

  function closeQuickViewModal() {
    var modal = document.getElementById('vivaaz-quickview-modal');
    var backdrop = document.getElementById('quickview-modal-backdrop');
    if (modal) modal.style.display = 'none';
    if (backdrop) backdrop.style.display = 'none';
    document.body.style.overflow = '';
  }

  // MACRO VIDEO MODAL (Homepage & Loupe)
  function openVideoModal(stoneKey, title) {
    var modal = document.getElementById('vivaaz-video-modal');
    var backdrop = document.getElementById('videomodal-backdrop');
    var poster = document.getElementById('video-modal-poster');
    var titleEl = document.getElementById('video-modal-title');
    if (!modal) return;
    
    var stoneNames = {
      'sapphire': 'Ceylon Blue Sapphire Oval Faceted',
      'emerald': 'Zambian Emerald Octagon Step Cut · 0:40 Under Loupe',
      'ruby': 'Burma Ruby Oval Faceted · Unheated',
      'moonstone': 'Rainbow Moonstone Oval Cabochon · High Blue Flash',
      'topaz': 'Swiss Blue Topaz Square Cushion'
    };
    
    var key = (stoneKey || 'sapphire').toLowerCase();
    if (poster) {
      poster.src = '<?php echo esc_url(get_stylesheet_directory_uri() . "/assets/images/"); ?>' + (key.includes('sapph') ? 'ceylon-sapphire' : (key.includes('em') ? 'emerald' : (key.includes('rub') ? 'ruby' : (key.includes('topaz') ? 'swiss-topaz' : 'moonstone')))) + '.jpg';
    }
    if (titleEl) {
      titleEl.textContent = title || stoneNames[key] || 'Coloured Gemstone Macro Video';
    }
    
    modal.style.display = 'block';
    if (backdrop) backdrop.style.display = 'block';
    document.body.style.overflow = 'hidden';
  }

  function closeVideoModal() {
    var modal = document.getElementById('vivaaz-video-modal');
    var backdrop = document.getElementById('videomodal-backdrop');
    if (modal) modal.style.display = 'none';
    if (backdrop) backdrop.style.display = 'none';
    document.body.style.overflow = '';
  }

  // DESIGN QUOTE MODAL (Send your design / Match my stone)
  function openDesignQuoteModal(presetText) {
    var modal = document.getElementById('vivaaz-designquote-modal');
    var backdrop = document.getElementById('designquote-modal-backdrop');
    var sent = document.getElementById('designquote-sent');
    var form = document.getElementById('designquote-form');
    if (sent) sent.style.display = 'none';
    if (form) form.style.display = 'block';
    if (presetText && document.getElementById('dq-stone')) {
      document.getElementById('dq-stone').value = presetText;
    }
    if (modal) modal.style.display = 'block';
    if (backdrop) backdrop.style.display = 'block';
    document.body.style.overflow = 'hidden';
  }
  function closeDesignQuoteModal() {
    var modal = document.getElementById('vivaaz-designquote-modal');
    var backdrop = document.getElementById('designquote-modal-backdrop');
    if (modal) modal.style.display = 'none';
    if (backdrop) backdrop.style.display = 'none';
    document.body.style.overflow = '';
  }
  function submitDesignQuoteForm(e) {
    e.preventDefault();
    var name = (document.getElementById('dq-name') || {}).value || '';
    var wa = (document.getElementById('dq-wa') || {}).value || '';
    var stone = (document.getElementById('dq-stone') || {}).value || '';
    var notes = (document.getElementById('dq-notes') || {}).value || '';
    var sent = document.getElementById('designquote-sent');
    var form = document.getElementById('designquote-form');
    if (sent) sent.style.display = 'block';
    if (form) form.style.display = 'none';
    var text = 'Hello Vivaaz Gems, I want to send my design.' + (stone ? '\nStone/size: ' + stone : '') + '\nName: ' + name + '\nWhatsApp: ' + wa + (notes ? '\nNotes: ' + notes : '');
    window.open('https://wa.me/919680552270?text=' + encodeURIComponent(text), '_blank');
  }

  // Explicit Global Window Exports for 100% Reliability
  window.switchCurrency = switchCurrency;
  window.vivaazUpdateAllPrices = vivaazUpdateAllPrices;
  window.formatVivaazMoney = formatVivaazMoney;
  window.getCurrentCurrency = getCurrentCurrency;
  window.toggleProductWishlist = toggleProductWishlist;
  window.updateAllWishlistButtons = updateAllWishlistButtons;
  window.updateWishlistCountBadge = updateWishlistCountBadge;
  window.openQuickView = openQuickView;
  window.openQuickViewModal = openQuickViewModal;
  window.closeQuickViewModal = closeQuickViewModal;
  window.openVideoModal = openVideoModal;
  window.closeVideoModal = closeVideoModal;
  window.openDesignQuoteModal = openDesignQuoteModal;
  window.closeDesignQuoteModal = closeDesignQuoteModal;
  window.addToCartAjax = function(id, size, qty) {
    if (typeof window.vivaazAddToCartAjax === 'function') {
      window.vivaazAddToCartAjax(id, size, qty);
    } else if (typeof openCartDrawer === 'function') {
      openCartDrawer();
    }
  };

  document.addEventListener("DOMContentLoaded", function() {
    var cur = getCurrentCurrency();
    vivaazUpdateAllPrices(cur);
    closeLiveSearchModal();
    updateWishlistCountBadge();
    updateAllWishlistButtons();
    updateHeaderBagCount();
  });
</script>
