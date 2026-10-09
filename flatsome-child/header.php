<?php
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
  <!-- TOP BAR (CLIENT SPEC PAGE 3) -->
  <div class="top-bar-notice">
    <div class="top-bar-left">
      WhatsApp +91 96805 52270 · Insured shipping worldwide · NEW ARRIVALS ARE IN. <a href="<?php echo esc_url(home_url('/shop/')); ?>">SHOP NOW →</a>
    </div>
    <div class="top-bar-right">
      <a href="<?php echo esc_url(home_url('/about/')); ?>">OUR STORY</a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>">CONTACT</a>
      <a href="<?php echo esc_url(home_url('/track-order/')); ?>">TRACK ORDER</a>
      <div class="currency-select-wrapper">
        <select aria-label="Currency Selector">
          <option value="INR">₹ INR</option>
          <option value="USD">$ USD</option>
          <option value="EUR">€ EUR</option>
          <option value="GBP">£ GBP</option>
        </select>
      </div>
    </div>
  </div>

  <!-- MAIN HEADER (CLIENT SPEC: LOGO LEFT, CENTRED MENU, ICONS RIGHT) -->
  <header class="main-header">
    <!-- Brand Logo & Name -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-logo-container">
      <img src="<?php echo esc_url(vivaaz_get_img_url('vivaaz-logo.png')); ?>" alt="" class="brand-logo-img" style="height: 38px; width: auto; object-fit: contain; display: block;" onerror="this.style.display='none';">
      <div class="brand-logo-text-block">
        <span class="brand-logo-text">V I V A A Z</span>
        <span class="brand-logo-subtitle">GEMS & JEWELLERY · JAIPUR</span>
      </div>
    </a>

    <!-- Centered Navigation Menu with Mega Dropdowns -->
    <ul class="nav-menu-center">
      <!-- 1. GEMSTONES MEGA DROPDOWN -->
      <li class="has-mega-dropdown">
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="nav-link">Gemstones ▾</a>
        <div class="mega-dropdown-panel">
          <div class="mega-dropdown-grid">
            <div>
              <h4 class="mega-col-title">PRECIOUS</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>">Sapphire</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>">Ruby</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>">Emerald</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=spinel')); ?>">Spinel</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=tanzanite')); ?>">Tanzanite</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=alexandrite')); ?>">Alexandrite</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/')); ?>" class="text-gold font-bold">View all →</a></li>
              </ul>
            </div>

            <div>
              <h4 class="mega-col-title">SEMI-PRECIOUS</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=topaz')); ?>">Topaz</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=garnet')); ?>">Garnet</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=amethyst')); ?>">Amethyst</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=peridot')); ?>">Peridot</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=citrine')); ?>">Citrine</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=tourmaline')); ?>">Tourmaline</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=aquamarine')); ?>">Aquamarine</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_stone=rainbow-moonstone')); ?>">Rainbow Moonstone</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/')); ?>" class="text-gold font-bold">View all 20 →</a></li>
              </ul>
            </div>

            <div>
              <h4 class="mega-col-title">BY CUT</h4>
              <ul class="mega-link-list" style="margin-bottom: 20px;">
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_cut=faceted')); ?>">Faceted</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_cut=cabochon')); ?>">Cabochon</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_cut=rose-cut')); ?>">Rose cut</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_cut=rough')); ?>">Rough</a></li>
              </ul>

              <h4 class="mega-col-title">SHOP BY</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/#colour')); ?>">Colour</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_by=shape')); ?>">Shape</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_by=price')); ?>">Price</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_by=birthstones')); ?>">Birthstones</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?max_price=5000')); ?>">Gifts under ₹5,000</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/?filter_by=calibrated')); ?>">Pairs & calibrated lots</a></li>
              </ul>
            </div>

            <!-- Photo Panel -->
            <div class="mega-promo-box">
              <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="New this week">
              <div style="font-size: 11px; font-weight: 700; margin-top: 8px;">New this week</div>
              <p style="font-size: 10px; color: var(--color-text-muted);">Fresh loose stones, added every week.</p>
              <a href="<?php echo esc_url(home_url('/shop/?orderby=date')); ?>" class="btn-underline-link" style="font-size: 10px; margin-top: 6px;">See what is new →</a>
            </div>
          </div>
        </div>
      </li>

      <!-- 2. LAYOUTS -->
      <li><a href="<?php echo esc_url(home_url('/#layouts')); ?>" class="nav-link">Layouts</a></li>

      <!-- 3. BEADS DROPDOWN -->
      <li class="has-mega-dropdown">
        <a href="<?php echo esc_url(home_url('/beads/')); ?>" class="nav-link">Beads ▾</a>
        <div class="mega-dropdown-panel" style="width: 500px; left: 50%; transform: translateX(-50%);">
          <div class="mega-dropdown-grid" style="grid-template-columns: 1fr 1fr;">
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
              </ul>
            </div>
            <div>
              <h4 class="mega-col-title">BY SIZE & UNIT</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/beads/?size=2-4mm')); ?>">2–4 mm</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?size=5-8mm')); ?>">5–8 mm</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?size=10mm-plus')); ?>">10 mm+</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?unit=strands')); ?>">Strands</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?unit=loose')); ?>">Loose pieces</a></li>
                <li><a href="<?php echo esc_url(home_url('/beads/?unit=lots')); ?>">Lots</a></li>
              </ul>
            </div>
          </div>
        </div>
      </li>

      <!-- 4. JEWELRY DROPDOWN -->
      <li class="has-mega-dropdown">
        <a href="<?php echo esc_url(home_url('/tennis-jewelry/')); ?>" class="nav-link">Jewelry ▾</a>
        <div class="mega-dropdown-panel" style="width: 500px; left: 50%; transform: translateX(-50%);">
          <div class="mega-dropdown-grid" style="grid-template-columns: 1fr 1fr;">
            <div>
              <h4 class="mega-col-title">TENNIS JEWELRY</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/tennis-jewelry/?type=bracelets')); ?>">Bracelets</a></li>
                <li><a href="<?php echo esc_url(home_url('/tennis-jewelry/?type=necklaces')); ?>">Necklaces</a></li>
                <li><a href="<?php echo esc_url(home_url('/tennis-jewelry/?gem=spinel')); ?>">Spinel Tennis</a></li>
                <li><a href="<?php echo esc_url(home_url('/tennis-jewelry/?gem=ruby')); ?>">Ruby Tennis</a></li>
                <li><a href="<?php echo esc_url(home_url('/tennis-jewelry/?metal=925-silver')); ?>">925 Silver (Ready to ship)</a></li>
                <li><a href="<?php echo esc_url(home_url('/tennis-jewelry/?metal=gold')); ?>">14K / 18K Gold (Made to order)</a></li>
              </ul>
            </div>
            <div>
              <h4 class="mega-col-title">FINE JEWELRY</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/jewelry/?metal=silver')); ?>">Silver Jewelry</a></li>
                <li><a href="<?php echo esc_url(home_url('/jewelry/?metal=gold')); ?>">Gold Jewelry</a></li>
                <li><a href="<?php echo esc_url(home_url('/jewelry/?for=women')); ?>">For Women</a></li>
                <li><a href="<?php echo esc_url(home_url('/jewelry/?for=men')); ?>">For Men</a></li>
                <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="text-gold font-bold">Make it into jewelry →</a></li>
              </ul>
            </div>
          </div>
        </div>
      </li>

      <!-- 5. ASTROLOGY DROPDOWN -->
      <li class="has-mega-dropdown">
        <a href="<?php echo esc_url(home_url('/astrology/')); ?>" class="nav-link">Astrology ▾</a>
        <div class="mega-dropdown-panel" style="width: 560px; left: 50%; transform: translateX(-50%);">
          <div class="mega-dropdown-grid" style="grid-template-columns: 1fr 1fr;">
            <div>
              <h4 class="mega-col-title">BY PLANET / GEMSTONE</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/astrology/?planet=sun')); ?>">Sun · Ruby (Manik)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/?planet=moon')); ?>">Moon · Pearl (Moti)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/?planet=mars')); ?>">Mars · Red Coral (Moonga)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/?planet=mercury')); ?>">Mercury · Emerald (Panna)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/?planet=jupiter')); ?>">Jupiter · Yellow Sapphire (Pukhraj)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/?planet=venus')); ?>">Venus · White Sapphire</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/?planet=saturn')); ?>">Saturn · Blue Sapphire (Neelam)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/?planet=rahu')); ?>">Rahu · Hessonite (Gomed)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/?planet=ketu')); ?>">Ketu · Cat's Eye (Lehsunia)</a></li>
              </ul>
            </div>
            <div>
              <h4 class="mega-col-title">RASHI & SETS</h4>
              <ul class="mega-link-list">
                <li><a href="<?php echo esc_url(home_url('/astrology/?filter=rashi')); ?>">By Rashi (Zodiac Sign)</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/?filter=month')); ?>">Birthstones by Month</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/?filter=navratna')); ?>">Navratna Sets</a></li>
                <li><a href="<?php echo esc_url(home_url('/astrology/?filter=substitute')); ?>">Substitute Stones</a></li>
                <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="text-gold font-bold">Which stone is for me? →</a></li>
              </ul>
            </div>
          </div>
        </div>
      </li>
    </ul>

    <!-- Header Action Icons (Account, Wishlist, Cart) -->
    <div class="header-action-group">
      <a href="<?php echo esc_url(home_url('/shop/?s=')); ?>" class="icon-action-btn" title="Search">
        <svg width="16" height="16" viewBox="-1 -1 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; overflow: visible; display: inline-block;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
      </a>
      
      <!-- Dynamic Account Login / Logout Dropdown -->
      <?php if (is_user_logged_in()) : 
        $current_user = wp_get_current_user();
      ?>
        <div class="has-account-dropdown">
          <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="icon-action-btn" title="My Account (<?php echo esc_attr($current_user->display_name); ?>)">
            <svg width="18" height="18" viewBox="-1 -1 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; overflow: visible; display: inline-block;"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          </a>
          <div class="account-hover-menu">
            <div style="padding: 8px 16px; font-size: 11px; font-weight: 700; color: var(--color-gold-label); border-bottom: 1px solid var(--color-border-light);">
              Hello, <?php echo esc_html($current_user->first_name ?: $current_user->display_name); ?>
            </div>
            <a href="<?php echo esc_url(home_url('/my-account/')); ?>">Dashboard</a>
            <a href="<?php echo esc_url(home_url('/my-account/orders/')); ?>">My Orders</a>
            <a href="<?php echo esc_url(home_url('/wishlist/')); ?>">Wishlist</a>
            <div class="account-menu-divider"></div>
            <a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" class="logout-link">Sign Out / Logout →</a>
          </div>
        </div>
      <?php else : ?>
        <div class="has-account-dropdown">
          <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="icon-action-btn" title="Sign In / Register">
            <svg width="18" height="18" viewBox="-1 -1 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; overflow: visible; display: inline-block;"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          </a>
          <div class="account-hover-menu">
            <a href="<?php echo esc_url(home_url('/my-account/')); ?>">Sign In / Login</a>
            <a href="<?php echo esc_url(home_url('/my-account/?action=register')); ?>">Create an Account</a>
            <a href="<?php echo esc_url(home_url('/my-account/orders/')); ?>">Track Orders</a>
            <a href="<?php echo esc_url(home_url('/wishlist/')); ?>">Wishlist</a>
          </div>
        </div>
      <?php endif; ?>

      <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="icon-action-btn" title="Wishlist">
        <svg width="18" height="18" viewBox="-1 -1 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; overflow: visible; display: inline-block;"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
      </a>

      <a href="<?php echo esc_url(home_url('/cart/')); ?>" class="icon-action-btn" title="Shopping Bag">
        <svg width="18" height="18" viewBox="-1 -1 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; overflow: visible; display: inline-block;"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
        <span class="cart-badge-count">
          <?php echo (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : '0'; ?>
        </span>
      </a>
    </div>
  </header>
</div>
