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
  <!-- TOP BAR (BUILD BOOK PAGE 3 & 4) -->
  <div class="top-bar-notice">
    <div class="top-bar-left">
      NATURAL GEMSTONES · INSURED SHIPPING WORLDWIDE
    </div>
    <div class="top-bar-right">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>">CONTACT</a>
      <a href="<?php echo esc_url(home_url('/track-order/')); ?>">TRACK ORDER</a>
      <div class="currency-select-wrapper">
        <select aria-label="Currency Selector" onchange="switchCurrency(this.value)">
          <option value="INR">IN | ₹ INR ▾</option>
          <option value="USD">US | $ USD</option>
          <option value="EUR">EU | € EUR</option>
          <option value="GBP">UK | £ GBP</option>
          <option value="AED">AE | AED</option>
        </select>
      </div>
    </div>
  </div>

  <!-- MAIN HEADER (LOGO LEFT, CENTRED 5 MENUS, CLEAN ICONS RIGHT) -->
  <header class="main-header">
    <!-- Mobile Hamburger Button (Placed Left on Mobile - Point 15 Spec) -->
    <button type="button" class="mobile-hamburger-btn" onclick="toggleMobileMenuDrawer();" aria-label="Open Menu">
      <span></span><span></span><span></span>
    </button>

    <!-- Brand Logo & Name (Always VIVAAZ GEMS, Capitals, Wide Spacing) -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-logo-container">
      <img src="<?php echo esc_url(vivaaz_get_img_url('vivaaz-logo.png')); ?>" alt="Vivaaz Gems" class="brand-logo-img" style="height: 38px; width: auto; object-fit: contain; display: block;" onerror="this.style.display='none';">
      <div class="brand-logo-text-block">
        <span class="brand-logo-text">VIVAAZ GEMS</span>
        <span class="brand-logo-subtitle">JAIPUR · BANGKOK</span>
      </div>
    </a>

    <!-- Centered Navigation Menu with 5 Mega Dropdowns (Step 2) -->
    <ul class="nav-menu-center">
      
      <!-- 1. GEMSTONES MEGA DROPDOWN (POINT 1 & 3 SPEC: FULL WIDTH, PHOTO RIGHT, ALL STONES) -->
      <li class="has-mega-dropdown mega-item-fullwidth">
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="nav-link">GEMSTONES ▾</a>
        <div class="mega-dropdown-panel mega-dropdown-fullwidth">
          <div class="mega-dropdown-grid" style="grid-template-columns: 140px 1fr 130px 170px 220px; gap: 28px; max-width: 1240px; margin: 0 auto; align-items: start;">
            <!-- Col 1: Precious -->
            <div>
              <h4 class="mega-col-title">PRECIOUS</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>" onmouseenter="updateMegaPhoto('ruby.jpg', 'Ruby', 'Deep pigeon blood red')">Ruby</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>" onmouseenter="updateMegaPhoto('ceylon-sapphire.jpg', 'Sapphire', 'Ceylon blue & fancy')">Sapphire</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>" onmouseenter="updateMegaPhoto('emerald.jpg', 'Emerald', 'Colombian & Zambian')">Emerald</a></li>
                <li style="margin-top: 14px;"><a href="<?php echo esc_url(home_url('/shop/?filter_group=precious')); ?>" class="text-gold font-bold">All precious stones →</a></li>
              </ul>
            </div>

            <!-- Col 2: Semi-Precious A to Z (3 columns showing all 27 stones cleanly without scroll) -->
            <div>
              <h4 class="mega-col-title">SEMI-PRECIOUS · A TO Z</h4>
              <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 6px 18px;">
                <ul class="mega-link-list">
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=agate')); ?>" onmouseenter="updateMegaPhoto('moonstone.jpg', 'Agate', 'Banded chalcedony')">Agate</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=amazonite')); ?>">Amazonite</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=amber')); ?>">Amber</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=amethyst')); ?>" onmouseenter="updateMegaPhoto('ruby.jpg', 'Amethyst', 'Lilac to deep purple')">Amethyst</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=aquamarine')); ?>" onmouseenter="updateMegaPhoto('ceylon-sapphire.jpg', 'Aquamarine', 'Sea blue beryl')">Aquamarine</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=aventurine')); ?>">Aventurine</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=carnelian')); ?>">Carnelian</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=citrine')); ?>">Citrine</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=garnet')); ?>">Garnet</a></li>
                </ul>
                <ul class="mega-link-list">
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=green-jade')); ?>">Green Jade</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=iolite')); ?>">Iolite</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=labradorite')); ?>">Labradorite</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=lapis-lazuli')); ?>">Lapis Lazuli</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=larimar')); ?>">Larimar</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=malachite')); ?>">Malachite</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=onyx')); ?>">Onyx</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=opal')); ?>">Opal</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=peridot')); ?>">Peridot</a></li>
                </ul>
                <ul class="mega-link-list">
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=prehnite')); ?>">Prehnite</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=rainbow-moonstone')); ?>" onmouseenter="updateMegaPhoto('moonstone.jpg', 'Rainbow Moonstone', 'Blue adularescence')">Rainbow Moonstone</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=rose-quartz')); ?>">Rose Quartz</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=spinel')); ?>" onmouseenter="updateMegaPhoto('ruby.jpg', 'Spinel', 'Red, pink & cobalt blue')">Spinel</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=tanzanite')); ?>">Tanzanite</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=tiger-eye')); ?>">Tiger Eye</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=topaz')); ?>" onmouseenter="updateMegaPhoto('swiss-topaz.jpg', 'Topaz', 'Sky, Swiss & London blue')">Topaz</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=tourmaline')); ?>">Tourmaline</a></li>
                  <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=turquoise')); ?>">Turquoise</a></li>
                </ul>
              </div>
            </div>

            <!-- Col 3: By Cut -->
            <div>
              <h4 class="mega-col-title">BY CUT</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_cut=faceted')); ?>">Faceted</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_cut=cabochon')); ?>">Cabochon</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_cut=rose-cut')); ?>">Rose cut</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_cut=briolette')); ?>">Briolette</a></li>
              </ul>
            </div>

            <!-- Col 4: Shop By -->
            <div>
              <h4 class="mega-col-title">SHOP BY</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_by=colour')); ?>">Colour</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_by=shape')); ?>">Shape</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_by=price')); ?>">Price</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/#birthstones')); ?>">Birthstones</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?max_price=5000')); ?>">Gifts under ₹5,000</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_sold_as=calibrated')); ?>">Pairs & calibrated lots</a></li>
              </ul>
            </div>

            <!-- Col 5: Photo Panel (Right side) -->
            <div class="mega-promo-box" id="gem-mega-promo" style="text-align: center; background: #FAF7F2; padding: 16px; border: 1px solid var(--color-border-light);">
              <img id="gem-promo-img" src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Featured Gemstone" style="width: 100%; height: 150px; object-fit: contain; margin-bottom: 10px; display: block;">
              <div id="gem-promo-title" style="font-size: 13px; font-weight: 700; color: var(--color-text-main);">Amethyst</div>
              <p id="gem-promo-sub" style="font-size: 11px; color: var(--color-text-muted); margin: 4px 0 10px;">Lilac to deep purple</p>
              <a id="gem-promo-link" href="<?php echo esc_url(home_url('/shop/?filter_stone=amethyst')); ?>" class="btn-underline-link" style="font-size: 11px; font-weight: 700;">Shop amethyst →</a>
            </div>
          </div>
        </div>
      </li>

      <!-- 2. LAYOUTS MEGA DROPDOWN (BUILD BOOK PAGE 4) -->
      <li class="has-mega-dropdown">
        <a href="<?php echo esc_url(home_url('/layouts/')); ?>" class="nav-link">LAYOUTS ▾</a>
        <div class="mega-dropdown-panel" style="width: 780px;">
          <div class="mega-dropdown-grid" style="grid-template-columns: 180px 180px 190px 210px; gap: 20px;">
            <div>
              <h4 class="mega-col-title">BY STONE</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/layouts/?stone=ruby')); ?>">Ruby Layouts</a></li>
                <li><a href="<?php echo esc_url(home_url('/layouts/?stone=spinel')); ?>">Spinel Layouts</a></li>
                <li><a href="<?php echo esc_url(home_url('/layouts/?stone=blue-topaz')); ?>">Blue Topaz Layouts</a></li>
                <li><a href="<?php echo esc_url(home_url('/layouts/?stone=other')); ?>">Other Layouts</a></li>
                <li><a href="<?php echo esc_url(home_url('/layouts/')); ?>" class="text-gold font-bold">All layouts</a></li>
              </ul>
            </div>

            <div>
              <h4 class="mega-col-title">BY TYPE</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/layouts/?type=necklace-lines')); ?>">Necklace lines</a></li>
                <li><a href="<?php echo esc_url(home_url('/layouts/?type=bracelet-lines')); ?>">Bracelet lines</a></li>
                <li><a href="<?php echo esc_url(home_url('/layouts/?type=pairs')); ?>">Pairs</a></li>
                <li><a href="<?php echo esc_url(home_url('/layouts/?type=sets')); ?>">Sets</a></li>
              </ul>
            </div>

            <div class="mega-promo-box">
              <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Ruby Layouts">
              <div style="font-size: 11px; font-weight: 700; margin-top: 8px;">Ruby Layouts</div>
              <p style="font-size: 10px; color: var(--color-text-muted);">Graduated lines and matched pairs.</p>
              <a href="<?php echo esc_url(home_url('/layouts/')); ?>" class="btn-underline-link" style="font-size: 10px;">See ruby layouts →</a>
            </div>

            <!-- Matching Card -->
            <div style="background: #1C1A17; color: #FFFFFF; padding: 20px; display: flex; flex-direction: column; justify-content: space-between;">
              <div>
                <h5 style="font-size: 12px; font-weight: 700; color: #FFFFFF; margin-bottom: 8px;">Have a stone or a design?</h5>
                <p style="font-size: 11px; color: #CCCCCC; line-height: 1.5; margin: 0;">We match it. Send a photo and size, or your design, and we match it from stock.</p>
              </div>
              <a href="<?php echo esc_url(home_url('/layouts/#match')); ?>" class="btn-square-dark" style="background: #FFFFFF; color: #1C1A17; padding: 10px 14px; font-size: 10px; text-align: center; margin-top: 14px; border: none; font-weight: 700;">SEND YOUR DESIGN</a>
            </div>
          </div>
        </div>
      </li>

      <!-- 3. BEADS MEGA DROPDOWN (BUILD BOOK PAGE 5) -->
      <li class="has-mega-dropdown">
        <a href="<?php echo esc_url(home_url('/beads/')); ?>" class="nav-link">BEADS ▾</a>
        <div class="mega-dropdown-panel" style="width: 780px;">
          <div class="mega-dropdown-grid" style="grid-template-columns: 160px 200px 180px 220px; gap: 20px;">
            <div>
              <h4 class="mega-col-title">BY STONE</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/beads/?stone=amethyst')); ?>">Amethyst</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?stone=garnet')); ?>">Garnet</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?stone=labradorite')); ?>">Labradorite</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?stone=rose-quartz')); ?>">Rose Quartz</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?stone=turquoise')); ?>">Turquoise</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/')); ?>" class="text-gold font-bold">All stones</a></li>
              </ul>
            </div>

            <div>
              <h4 class="mega-col-title">BY BEAD SHAPE</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/beads/?shape=round')); ?>">Round</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?shape=rondelle')); ?>">Rondelle</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?shape=faceted-rondelle')); ?>">Faceted rondelle</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?shape=nugget')); ?>">Nugget</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?shape=chips')); ?>">Chips</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?shape=heishi')); ?>">Heishi</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?shape=briolette')); ?>">Briolette & drops</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?shape=coin-cube')); ?>">Coin & cube</a></li>
              </ul>
            </div>

            <div>
              <h4 class="mega-col-title">BY SIZE & UNIT</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/beads/?size=2-4mm')); ?>">2–4 mm</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?size=5-9mm')); ?>">5–9 mm</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?size=10mm-plus')); ?>">10 mm and more</a></li>
                <li style="margin-top: 10px;"><a href="<?php echo esc_url(home_url('/beads/?unit=strand')); ?>" style="font-weight: 600;">Strands</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?unit=loose')); ?>" style="font-weight: 600;">Loose pieces</a></li>
              </ul>
            </div>

            <div class="mega-promo-box">
              <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Gemstone Beads">
              <div style="font-size: 11px; font-weight: 700; margin-top: 8px;">Gemstone Beads</div>
              <p style="font-size: 10px; color: var(--color-text-muted);">Drilled and matched in Jaipur.</p>
              <a href="<?php echo esc_url(home_url('/beads/')); ?>" class="btn-underline-link" style="font-size: 10px;">View all beads →</a>
            </div>
          </div>
        </div>
      </li>

      <!-- 4. JEWELRY MEGA DROPDOWN (BUILD BOOK PAGE 5) -->
      <li class="has-mega-dropdown">
        <a href="<?php echo esc_url(home_url('/jewelry/')); ?>" class="nav-link">JEWELRY ▾</a>
        <div class="mega-dropdown-panel" style="width: 740px;">
          <div class="mega-dropdown-grid" style="grid-template-columns: 150px 180px 150px 240px; gap: 20px;">
            <div>
              <h4 class="mega-col-title">BY STONE</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/jewelry/?stone=ruby')); ?>">Ruby</a></li>
                <li><a href="<?php echo esc_url(home_url('/jewelry/?stone=spinel')); ?>">Spinel</a></li>
                <li><a href="<?php echo esc_url(home_url('/jewelry/?stone=sapphire')); ?>">Sapphire</a></li>
                <li><a href="<?php echo esc_url(home_url('/jewelry/?stone=emerald')); ?>">Emerald</a></li>
                <li><a href="<?php echo esc_url(home_url('/jewelry/')); ?>">Other stones</a></li>
              </ul>
            </div>

            <div>
              <h4 class="mega-col-title">BY TYPE</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/jewelry/tennis-bracelets/')); ?>">Tennis bracelets</a></li>
                <li><a href="<?php echo esc_url(home_url('/jewelry/tennis-necklaces/')); ?>">Tennis necklaces</a></li>
              </ul>
            </div>

            <div>
              <h4 class="mega-col-title">BY METAL</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/jewelry/?metal=silver')); ?>">925 Silver</a></li>
                <li><a href="<?php echo esc_url(home_url('/jewelry/?metal=14k')); ?>">14K Gold</a></li>
                <li><a href="<?php echo esc_url(home_url('/jewelry/?metal=18k')); ?>">18K Gold</a></li>
              </ul>
            </div>

            <div class="mega-promo-box" style="background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 18px; text-align: left;">
              <h5 style="font-size: 12px; font-weight: 700; margin: 0 0 6px;">Make it into jewelry</h5>
              <p style="font-size: 11px; color: var(--color-text-muted); line-height: 1.5; margin: 0 0 14px;">
                Choose any stone from our shop and we set it in a ring, pendant or earrings, in silver or gold. Send your idea; we send a sketch and a price.
              </p>
              <a href="<?php echo esc_url(home_url('/make-it-into-jewelry/')); ?>" class="btn-square-dark" style="display: block; text-align: center; padding: 10px; font-size: 11px; font-weight: 700;">ASK FOR A QUOTE</a>
            </div>
          </div>
        </div>
      </li>

      <!-- 5. ASTROLOGY MEGA DROPDOWN (BUILD BOOK PAGE 6) -->
      <li class="has-mega-dropdown">
        <a href="<?php echo esc_url(home_url('/astrology/')); ?>" class="nav-link">ASTROLOGY ▾</a>
        <div class="mega-dropdown-panel" style="width: 780px;">
          <div class="mega-dropdown-grid" style="grid-template-columns: 240px 220px 280px; gap: 24px;">
            <div>
              <h4 class="mega-col-title">STONES FOR THE NINE PLANETS</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/astrology/#sun')); ?>">Sun · Ruby (Manik)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/#moon')); ?>">Moon · Pearl (Moti)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/#mars')); ?>">Mars · Red Coral (Moonga)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/#mercury')); ?>">Mercury · Emerald (Panna)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/#jupiter')); ?>">Jupiter · Yellow Sapphire (Pukhraj)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/#venus')); ?>">Venus · White Sapphire (Safed Pukhraj)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/#saturn')); ?>">Saturn · Blue Sapphire (Neelam)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/#rahu')); ?>">Rahu · Hessonite (Gomed)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/#ketu')); ?>">Ketu · Cat's Eye (Lehsunia)</a></li>
              </ul>
            </div>

            <div>
              <h4 class="mega-col-title">GUIDES</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/astrology/#birthstones')); ?>">Birthstones by month</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/#substitutes')); ?>">Substitute stones (upratna)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/#weight')); ?>">Weight: carat and ratti</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/#navratna')); ?>">Navratna set (on request)</a></li>
              </ul>
            </div>

            <!-- Dark Consultation Panel (Point 9: Book a consultation opens the form) -->
            <div style="background: #1C1A17; color: #FFFFFF; padding: 22px; display: flex; flex-direction: column; justify-content: space-between;">
              <div>
                <h5 style="font-size: 13px; font-weight: 700; color: #FFFFFF; margin-bottom: 8px;">Astrology consultation</h5>
                <p style="font-size: 11px; color: #CCCCCC; line-height: 1.5; margin: 0;">
                  Talk to our astrologer. Share your birth details; our astrologer reads your chart and suggests the right stone and weight. Then we find the stone for you.
                </p>
              </div>
              <a href="javascript:void(0);" onclick="openConsultationModal();" class="btn-square-dark" style="background: #FFFFFF; color: #1C1A17; padding: 10px 14px; font-size: 11px; text-align: center; margin-top: 14px; border: none; font-weight: 700;">BOOK A CONSULTATION</a>
            </div>
          </div>
        </div>
      </li>

    </ul>

    <!-- Header Action Icons (Clean SVG Icons Only - No Text Labels) -->
    <div class="header-action-group">
      <!-- Search -->
      <a href="javascript:void(0);" onclick="toggleLiveSearchModal();" class="icon-action-btn" title="Search">
        <svg width="18" height="18" viewBox="-1 -1 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; overflow: visible; display: inline-block;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
      </a>
      
      <!-- Account with Hover Dropdown -->
      <div class="has-account-dropdown">
        <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="icon-action-btn" title="My Account">
          <svg width="18" height="18" viewBox="-1 -1 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; overflow: visible; display: inline-block;"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        </a>
        <div class="account-hover-menu">
          <?php if (is_user_logged_in()) : 
            $current_user = wp_get_current_user();
          ?>
            <div style="padding: 10px 16px; font-size: 11px; font-weight: 700; color: var(--color-gold-label); border-bottom: 1px solid var(--color-border-light);">
              Hello, <?php echo esc_html($current_user->first_name ?: $current_user->display_name); ?>
            </div>
            <a href="<?php echo esc_url(home_url('/my-account/')); ?>">Dashboard</a>
            <a href="<?php echo esc_url(home_url('/my-account/orders/')); ?>">Orders</a>
            <a href="<?php echo esc_url(home_url('/wishlist/')); ?>">Wishlist</a>
            <div class="account-menu-divider"></div>
            <a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" class="logout-link">Sign Out / Logout →</a>
          <?php else : ?>
            <a href="<?php echo esc_url(home_url('/my-account/')); ?>">Sign In / Login</a>
            <a href="<?php echo esc_url(home_url('/my-account/?action=register')); ?>">Create an Account</a>
            <a href="<?php echo esc_url(home_url('/track-order/')); ?>">Track Order</a>
            <a href="<?php echo esc_url(home_url('/wishlist/')); ?>">Wishlist</a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Wishlist -->
      <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="icon-action-btn" title="Wishlist" style="position: relative;">
        <svg width="18" height="18" viewBox="-1 -1 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; overflow: visible; display: inline-block;"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
        <span class="cart-badge-count" id="header-wishlist-count" style="display: none;">0</span>
      </a>

      <!-- Shopping Bag -->
      <a href="javascript:void(0);" onclick="openCartDrawer();" class="icon-action-btn" title="Shopping Bag">
        <svg width="18" height="18" viewBox="-1 -1 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; overflow: visible; display: inline-block;"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
        <span class="cart-badge-count" id="header-bag-count">
          <?php echo (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : '0'; ?>
        </span>
      </a>
    </div>
  </header>
</div>

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

<!-- POPUP LIVE SEARCH MODAL (BUILD BOOK PAGE 13) -->
<div id="live-search-modal" class="live-search-modal" style="display: none !important;" onclick="if(event.target === this) closeLiveSearchModal();">
  <div class="search-modal-box" onclick="event.stopPropagation();">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
      <span style="font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">SEARCH VIVAAZ GEMS</span>
      <button type="button" aria-label="Close search" onclick="closeLiveSearchModal();" class="search-modal-close-btn">&times;</button>
    </div>
    <form action="<?php echo esc_url(home_url('/shop/')); ?>" method="get" onsubmit="closeLiveSearchModal();">
      <input type="text" name="s" id="live-search-input" placeholder="Search a stone, shape or code (e.g. moonstone 6x8 or RMCOC)..." style="width: 100%; padding: 14px; font-size: 14px; border: 1px solid var(--color-border-light); outline: none; margin-bottom: 14px;" onkeyup="handleLiveSearch(this.value);" autocomplete="off" />
      <button type="submit" class="btn-square-dark-full" style="padding: 12px;">SEARCH CATALOG →</button>
    </form>
    
    <!-- Real-time Live Search Results Container (Point 10 Spec) -->
    <div id="live-search-results" style="display: none; max-height: 280px; overflow-y: auto; margin-top: 14px; border: 1px solid var(--color-border-light); background: #FAF7F2; padding: 6px;"></div>

    <div id="popular-searches-box" style="margin-top: 16px; font-size: 11px; color: var(--color-text-muted);">
      <strong>POPULAR SEARCHES:</strong>
      <a href="<?php echo esc_url(home_url('/shop/?s=sapphire')); ?>" style="text-decoration: underline; margin: 0 4px;">Sapphire</a> ·
      <a href="<?php echo esc_url(home_url('/shop/?s=ruby')); ?>" style="text-decoration: underline; margin: 0 4px;">Ruby</a> ·
      <a href="<?php echo esc_url(home_url('/shop/?s=moonstone')); ?>" style="text-decoration: underline; margin: 0 4px;">Moonstone</a> ·
      <a href="<?php echo esc_url(home_url('/shop/?s=emerald')); ?>" style="text-decoration: underline; margin: 0 4px;">Emerald</a> ·
      <a href="<?php echo esc_url(home_url('/layouts/')); ?>" style="text-decoration: underline; margin: 0 4px;">Layouts</a>
    </div>
  </div>
</div>

<script>
  var _vivaazCatalog = [
    { name: "Ceylon Blue Sapphire Oval Faceted", code: "VG-SPH-0705", price: "₹ 1,450", shape: "Oval", size: "7×5 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" },
    { name: "Ruby Oval Matched Pair", code: "VG-RBY-0705", price: "₹ 6,800", shape: "Oval", size: "7×5 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" },
    { name: "Zambian Emerald Octagon Faceted", code: "VG-EMR-OCT8", price: "₹ 24,500", shape: "Octagon", size: "8×6 mm", img: "<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" },
    { name: "Rainbow Moonstone Oval Cabochon", code: "RMCOC68", price: "₹ 95", shape: "Oval", size: "6×8 mm", img: "<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" },
    { name: "Swiss Blue Topaz Round Faceted", code: "VG-TPZ-RD04", price: "₹ 92", shape: "Round", size: "4 mm", img: "<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>", url: "<?php echo esc_url(home_url('/product/ceylon-blue-sapphire-7x5mm/')); ?>" },
    { name: "Burma Spinel Matched Pair", code: "VG-SPN-PR01", price: "₹ 280", shape: "Cushion", size: "5 mm", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/shop/?s=spinel')); ?>" },
    { name: "Ruby Graduated Necklace Line Layout", code: "VG-LAY-RBY", price: "₹ 38,000", shape: "Graduated", size: "17 stones", img: "<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>", url: "<?php echo esc_url(home_url('/layouts/?stone=ruby')); ?>" },
    { name: "Rainbow Moonstone Plain Rondelle Strand", code: "VG-BD-RMS", price: "₹ 1,450", shape: "Rondelle", size: "6–7 mm", img: "<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>", url: "<?php echo esc_url(home_url('/beads/?shape=rondelle')); ?>" }
  ];

  function handleLiveSearch(query) {
    var resultsBox = document.getElementById('live-search-results');
    var popularBox = document.getElementById('popular-searches-box');
    if (!resultsBox) return;
    var q = (query || '').toLowerCase().trim();
    if (!q || q.length < 2) {
      resultsBox.style.display = 'none';
      resultsBox.innerHTML = '';
      if (popularBox) popularBox.style.display = 'block';
      return;
    }
    var matches = _vivaazCatalog.filter(function(item) {
      return item.name.toLowerCase().indexOf(q) > -1 ||
             item.code.toLowerCase().indexOf(q) > -1 ||
             item.shape.toLowerCase().indexOf(q) > -1 ||
             item.size.toLowerCase().indexOf(q) > -1;
    });
    if (matches.length === 0) {
      resultsBox.innerHTML = '<div style="padding: 12px; font-size: 12px; color: var(--color-text-muted); text-align: center;">No exact stones found for "' + q + '". Press search to view all matches.</div>';
      resultsBox.style.display = 'block';
      return;
    }
    var html = '';
    matches.forEach(function(item) {
      html += '<a href="' + item.url + '" style="display: flex; align-items: center; gap: 12px; padding: 8px 10px; background: #FFFFFF; border-bottom: 1px solid var(--color-border-light); text-decoration: none; color: inherit; margin-bottom: 4px;">' +
        '<img src="' + item.img + '" style="width: 44px; height: 44px; object-fit: contain; background: #FAF7F2; border: 1px solid var(--color-border-light); flex-shrink: 0;" />' +
        '<div style="flex: 1; min-width: 0;">' +
          '<div style="font-size: 12px; font-weight: 700; color: var(--color-text-main); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">' + item.name + '</div>' +
          '<div style="font-size: 10px; color: var(--color-text-muted);">' + item.size + ' · ' + item.code + '</div>' +
        '</div>' +
        '<div style="font-size: 12px; font-weight: 700; color: var(--color-gold-label); white-space: nowrap;">' + item.price + '</div>' +
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
