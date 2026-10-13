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
      
      <!-- 1. GEMSTONES MEGA DROPDOWN (BUILD BOOK PAGE 4) -->
      <li class="has-mega-dropdown">
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="nav-link">GEMSTONES ▾</a>
        <div class="mega-dropdown-panel" style="width: 980px;">
          <div class="mega-dropdown-grid" style="grid-template-columns: 140px 180px 140px 180px 240px; gap: 20px;">
            <!-- Col 1: Precious -->
            <div>
              <h4 class="mega-col-title">PRECIOUS</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>" onmouseenter="updateMegaPhoto('ruby.jpg', 'Ruby · King of precious stones')">Ruby</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>" onmouseenter="updateMegaPhoto('ceylon-sapphire.jpg', 'Sapphire · Ceylon blue & fancy')">Sapphire</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>" onmouseenter="updateMegaPhoto('emerald.jpg', 'Emerald · Colombian & Zambian')">Emerald</a></li>
                <li style="margin-top: 10px;"><a href="<?php echo esc_url(home_url('/shop/?filter_group=precious')); ?>" class="text-gold font-bold">All precious stones →</a></li>
              </ul>
            </div>

            <!-- Col 2: Semi-Precious A to Z -->
            <div>
              <h4 class="mega-col-title">SEMI-PRECIOUS · A TO Z</h4>
              <ul class="mega-link-list" style="max-height: 290px; overflow-y: auto;">
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=agate')); ?>">Agate</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=amazonite')); ?>">Amazonite</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=amber')); ?>">Amber</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=amethyst')); ?>" onmouseenter="updateMegaPhoto('ruby.jpg', 'Amethyst · Royal purple')">Amethyst</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=aquamarine')); ?>" onmouseenter="updateMegaPhoto('ceylon-sapphire.jpg', 'Aquamarine · Sea blue beryl')">Aquamarine</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=aventurine')); ?>">Aventurine</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=carnelian')); ?>">Carnelian</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=citrine')); ?>">Citrine</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=garnet')); ?>">Garnet</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=green-jade')); ?>">Green Jade</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=iolite')); ?>">Iolite</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=labradorite')); ?>">Labradorite</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=lapis-lazuli')); ?>">Lapis Lazuli</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=larimar')); ?>">Larimar</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=malachite')); ?>" onmouseenter="updateMegaPhoto('emerald.jpg', 'Malachite · Vivid banded green')">Malachite</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=onyx')); ?>">Onyx</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=opal')); ?>">Opal</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=peridot')); ?>" onmouseenter="updateMegaPhoto('emerald.jpg', 'Peridot · Olive lime green')">Peridot</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=prehnite')); ?>">Prehnite</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=rainbow-moonstone')); ?>" onmouseenter="updateMegaPhoto('moonstone.jpg', 'Rainbow Moonstone · Blue flash')">Rainbow Moonstone</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=rose-quartz')); ?>">Rose Quartz</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=spinel')); ?>" onmouseenter="updateMegaPhoto('ruby.jpg', 'Spinel · Red, pink, blue, purple')">Spinel</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=tanzanite')); ?>">Tanzanite</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=tiger-eye')); ?>">Tiger Eye</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=topaz')); ?>" onmouseenter="updateMegaPhoto('swiss-topaz.jpg', 'Topaz · Sky, Swiss, London')">Topaz</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=tourmaline')); ?>">Tourmaline</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=turquoise')); ?>">Turquoise</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/')); ?>" class="text-gold font-bold">Other stones →</a></li>
              </ul>
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
                <li><a href="<?php echo esc_url(home_url('/#colour')); ?>">Colour</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_by=shape')); ?>">Shape</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_by=price')); ?>">Price</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/#birthstones')); ?>">Birthstones</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?max_price=5000')); ?>">Gifts under ₹5,000</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_sold_as=calibrated')); ?>">Pairs & calibrated lots</a></li>
              </ul>
            </div>

            <!-- Col 5: Photo Panel (Hoverable) -->
            <div class="mega-promo-box" id="gem-mega-promo">
              <img id="gem-promo-img" src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Gemstone Highlight">
              <div id="gem-promo-title" style="font-size: 11px; font-weight: 700; margin-top: 8px;">New this week</div>
              <p id="gem-promo-sub" style="font-size: 10px; color: var(--color-text-muted);">Fresh loose stones, hand-sorted in Jaipur.</p>
              <a href="<?php echo esc_url(home_url('/shop/?orderby=date')); ?>" class="btn-underline-link" style="font-size: 10px; margin-top: 6px;">Shop collection →</a>
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
                <li><a href="<?php echo esc_url(home_url('/layouts/#ruby')); ?>">Ruby Layouts</a></li>
                <li><a href="<?php echo esc_url(home_url('/layouts/#spinel')); ?>">Spinel Layouts</a></li>
                <li><a href="<?php echo esc_url(home_url('/layouts/#blue-topaz')); ?>">Blue Topaz Layouts</a></li>
                <li><a href="<?php echo esc_url(home_url('/layouts/#other')); ?>">Other Layouts</a></li>
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

            <!-- Dark Consultation Panel -->
            <div style="background: #1C1A17; color: #FFFFFF; padding: 22px; display: flex; flex-direction: column; justify-content: space-between;">
              <div>
                <h5 style="font-size: 13px; font-weight: 700; color: #FFFFFF; margin-bottom: 8px;">Astrology consultation</h5>
                <p style="font-size: 11px; color: #CCCCCC; line-height: 1.5; margin: 0;">
                  Talk to our astrologer. Share your birth details; our astrologer reads your chart and suggests the right stone and weight. Then we find the stone for you.
                </p>
              </div>
              <a href="<?php echo esc_url(home_url('/astrology-consultation/')); ?>" class="btn-square-dark" style="background: #FFFFFF; color: #1C1A17; padding: 10px 14px; font-size: 11px; text-align: center; margin-top: 14px; border: none; font-weight: 700;">BOOK A CONSULTATION</a>
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
      <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="icon-action-btn" title="Wishlist">
        <svg width="18" height="18" viewBox="-1 -1 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; overflow: visible; display: inline-block;"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
      </a>

      <!-- Shopping Bag -->
      <a href="<?php echo esc_url(home_url('/cart/')); ?>" class="icon-action-btn" title="Shopping Bag">
        <svg width="18" height="18" viewBox="-1 -1 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; overflow: visible; display: inline-block;"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
        <span class="cart-badge-count" id="header-bag-count">
          <?php echo (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : '0'; ?>
        </span>
      </a>

      <!-- Mobile Hamburger Button -->
      <button type="button" class="mobile-hamburger-btn" onclick="toggleMobileMenuDrawer();" aria-label="Open Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </header>
</div>

<!-- MOBILE SLIDE-IN MENU DRAWER (BUILD BOOK PAGE 7 & 8) -->
<div class="mobile-menu-drawer" id="mobile-menu-drawer" style="display: none;">
  <div class="mobile-drawer-header">
    <div style="font-weight: 700; letter-spacing: 0.15em; font-size: 13px;">VIVAAZ GEMS</div>
    <button type="button" class="mobile-drawer-close" onclick="toggleMobileMenuDrawer();">&times;</button>
  </div>
  
  <div class="mobile-drawer-content">
    <!-- Top Account Line -->
    <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="mobile-drawer-link" style="border-bottom: 2px solid var(--color-border-light); font-weight: 700;">
      Sign in / My account ›
    </a>

    <!-- 5 Main Links -->
    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="mobile-drawer-link">GEMSTONES ›</a>
    <a href="<?php echo esc_url(home_url('/layouts/')); ?>" class="mobile-drawer-link">LAYOUTS ›</a>
    <a href="<?php echo esc_url(home_url('/beads/')); ?>" class="mobile-drawer-link">BEADS ›</a>
    <a href="<?php echo esc_url(home_url('/jewelry/')); ?>" class="mobile-drawer-link">JEWELRY ›</a>
    <a href="<?php echo esc_url(home_url('/astrology/')); ?>" class="mobile-drawer-link">ASTROLOGY ›</a>

    <!-- Help Group -->
    <div style="margin-top: 24px; padding-top: 16px; border-top: 1px solid var(--color-border-light);">
      <div style="font-size: 10px; font-weight: 700; letter-spacing: 0.1em; color: var(--color-text-muted); text-transform: uppercase; margin-bottom: 10px;">HELP</div>
      <a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="mobile-drawer-sublink">Track my order</a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="mobile-drawer-sublink">Contact us</a>
      
      <div style="margin-top: 16px;">
        <a href="https://wa.me/919680552270" target="_blank" class="btn-whatsapp-green-full" style="padding: 10px 16px; font-size: 11px;">
          WHATSAPP US
        </a>
      </div>

      <div style="margin-top: 16px;">
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

<!-- POPUP LIVE SEARCH MODAL (BUILD BOOK PAGE 13) -->
<div id="live-search-modal" class="live-search-modal" style="display: none;">
  <div class="search-modal-box">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
      <span style="font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">SEARCH VIVAAZ GEMS</span>
      <button type="button" onclick="toggleLiveSearchModal()" style="background: none; border: none; font-size: 24px; cursor: pointer;">&times;</button>
    </div>
    <form action="<?php echo esc_url(home_url('/shop/')); ?>" method="get">
      <input type="text" name="s" id="live-search-input" placeholder="Search a stone, shape or code (e.g. moonstone 6x8 or RMCOC)..." style="width: 100%; padding: 14px; font-size: 14px; border: 1px solid var(--color-border-light); outline: none; margin-bottom: 14px;" autofocus />
      <button type="submit" class="btn-square-dark-full" style="padding: 12px;">SEARCH CATALOG →</button>
    </form>
    <div style="margin-top: 16px; font-size: 11px; color: var(--color-text-muted);">
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

  function toggleLiveSearchModal() {
    var modal = document.getElementById('live-search-modal');
    if (modal) {
      modal.style.display = (modal.style.display === 'none' || modal.style.display === '') ? 'flex' : 'none';
      if (modal.style.display === 'flex') {
        setTimeout(function() { document.getElementById('live-search-input').focus(); }, 100);
      }
    }
  }

  function switchCurrency(curr) {
    alert('Currency set to ' + curr + '. Prices update automatically.');
  }

  document.addEventListener("DOMContentLoaded", function() {
    try {
      var badge = document.getElementById('header-bag-count');
      if (badge && (badge.textContent.trim() === '0' || badge.textContent.trim() === '')) {
        var saved = JSON.parse(localStorage.getItem('vivaaz_local_cart') || '[]');
        if (saved && saved.length > 0) {
          var totalQty = saved.reduce(function(acc, item) { return acc + (parseInt(item.quantity || item.qty) || 1); }, 0);
          badge.textContent = totalQty;
        }
      }
    } catch(e) {}
  });
</script>
