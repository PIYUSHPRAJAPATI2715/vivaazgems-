<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- Main Header -->
  <header class="main-header">
    <div style="display: flex; align-items: center; gap: 16px;">
      <button class="hamburger-btn" id="drawer-toggle-btn" aria-label="Open Menu">☰</button>
      <a href="<?php echo home_url('/'); ?>" class="brand-logo-container">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/vivaaz-logo.png" alt="Vivaaz Gems Logo" class="brand-logo-img">
        <div>
          <span class="brand-logo-text">VIVAAZ GEMS</span>
          <span class="brand-logo-subtitle">NATURAL & AUTHENTIC</span>
        </div>
      </a>
    </div>

    <!-- Nav Links (Mockup 2 Match) -->
    <ul class="nav-menu">
      <li><a href="<?php echo home_url('/'); ?>" class="nav-link active">Home</a></li>
      <li class="nav-item">
        <a href="<?php echo home_url('/shop/'); ?>" class="nav-link">Gemstones ▾</a>
        <!-- Mega Menu Dropdown -->
        <div class="dropdown-container">
          <div class="dropdown-col">
            <h4>PRECIOUS</h4>
            <ul>
              <li><a href="<?php echo home_url('/product-category/sapphire/'); ?>">Sapphire</a></li>
              <li><a href="<?php echo home_url('/product-category/ruby/'); ?>">Ruby</a></li>
              <li><a href="<?php echo home_url('/product-category/emerald/'); ?>">Emerald</a></li>
              <li><a href="<?php echo home_url('/product-category/spinel/'); ?>">Spinel</a></li>
              <li><a href="<?php echo home_url('/product-category/tanzanite/'); ?>">Tanzanite</a></li>
              <li><a href="<?php echo home_url('/product-category/alexandrite/'); ?>">Alexandrite</a></li>
              <li><a href="<?php echo home_url('/shop/'); ?>" style="color: var(--color-gold-accent); font-weight: 600;">View all →</a></li>
            </ul>
          </div>
          <div class="dropdown-col">
            <h4>SEMI-PRECIOUS</h4>
            <ul>
              <li><a href="<?php echo home_url('/product-category/topaz/'); ?>">Topaz</a></li>
              <li><a href="<?php echo home_url('/product-category/garnet/'); ?>">Garnet</a></li>
              <li><a href="<?php echo home_url('/product-category/amethyst/'); ?>">Amethyst</a></li>
              <li><a href="<?php echo home_url('/product-category/peridot/'); ?>">Peridot</a></li>
              <li><a href="<?php echo home_url('/product-category/citrine/'); ?>">Citrine</a></li>
              <li><a href="<?php echo home_url('/product-category/tourmaline/'); ?>">Tourmaline</a></li>
              <li><a href="<?php echo home_url('/product-category/aquamarine/'); ?>">Aquamarine</a></li>
              <li><a href="<?php echo home_url('/product-category/rainbow-moonstone/'); ?>">Rainbow Moonstone</a></li>
            </ul>
          </div>
          <div class="dropdown-col">
            <h4>BY CUT</h4>
            <ul>
              <li><a href="<?php echo home_url('/shop/?cut=faceted'); ?>">Faceted</a></li>
              <li><a href="<?php echo home_url('/shop/?cut=cabochon'); ?>">Cabochon</a></li>
              <li><a href="<?php echo home_url('/shop/?cut=rose-cut'); ?>">Rose cut</a></li>
              <li><a href="<?php echo home_url('/shop/?cut=rough'); ?>">Rough</a></li>
            </ul>
          </div>
          <div class="dropdown-col">
            <h4>SHOP BY</h4>
            <ul>
              <li><a href="<?php echo home_url('/shop/?filter_color=blue'); ?>">Colour</a></li>
              <li><a href="<?php echo home_url('/shop/?filter_shape=oval'); ?>">Shape</a></li>
              <li><a href="<?php echo home_url('/shop/?orderby=price'); ?>">Price</a></li>
              <li><a href="<?php echo home_url('/shop/?filter_birthstone=true'); ?>">Birthstones</a></li>
              <li><a href="<?php echo home_url('/shop/?max_price=5000'); ?>">Gifts under ₹5,000</a></li>
            </ul>
          </div>
          <div style="background: #FAF9F6; border: 1px solid #E8D9AB; padding: 16px; border-radius: 6px;">
            <h5 style="font-size: 13px; font-weight: 600; margin-bottom: 4px;">New this week</h5>
            <p style="font-size: 11px; color: #5A6571; margin-bottom: 12px;">Fresh loose stones, added every week.</p>
            <a href="<?php echo home_url('/shop/'); ?>" style="color: var(--color-gold-accent); font-size: 12px; font-weight: 600;">See what is new →</a>
          </div>
        </div>
      </li>
      <li><a href="<?php echo home_url('/about-us/'); ?>" class="nav-link">About Us</a></li>
      <li><a href="<?php echo home_url('/blog/'); ?>" class="nav-link">Blog</a></li>
      <li><a href="<?php echo home_url('/contact/'); ?>" class="nav-link">Contact</a></li>
    </ul>

    <!-- Header Action Icons -->
    <div class="header-actions">
      <a href="<?php echo home_url('/shop/'); ?>" class="header-icon-btn" title="Search">🔍</a>
      <a href="<?php echo home_url('/my-account/'); ?>" class="header-icon-btn" title="Wishlist">♡</a>
      <a href="<?php echo home_url('/cart/'); ?>" class="header-icon-btn" title="Shopping Cart">
        🛍️
        <span class="cart-badge-count">2</span>
      </a>
    </div>
  </header>

  <!-- Mobile Navigation Drawer -->
  <div class="drawer-backdrop" id="drawer-backdrop"></div>
  <div class="mobile-drawer" id="mobile-drawer">
    <div class="mobile-drawer-header">
      <div class="brand-logo-container">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/vivaaz-logo.png" alt="Vivaaz Gems Logo" style="height: 32px;">
        <span class="brand-logo-text" style="font-size: 15px;">VIVAAZ GEMS</span>
      </div>
      <button class="close-drawer-btn" id="close-drawer-btn" style="background:none; border:none; font-size:24px; cursor:pointer;">✕</button>
    </div>
    <div class="mobile-drawer-body">
      <a href="<?php echo home_url('/'); ?>" class="mobile-drawer-link">Home <span>→</span></a>
      <a href="<?php echo home_url('/shop/'); ?>" class="mobile-drawer-link">Gemstones <span>→</span></a>
      <a href="<?php echo home_url('/ceylon-sapphire-product/'); ?>" class="mobile-drawer-link" style="color: var(--color-gold-accent);">Ceylon Sapphire PDP <span>★</span></a>
      <a href="<?php echo home_url('/layouts/'); ?>" class="mobile-drawer-link">Layouts <span>→</span></a>
      <a href="<?php echo home_url('/beads/'); ?>" class="mobile-drawer-link">Gemstone Beads <span>→</span></a>
      <a href="<?php echo home_url('/tennis-jewelry/'); ?>" class="mobile-drawer-link">Tennis Jewelry <span>→</span></a>
      <a href="<?php echo home_url('/astrology/'); ?>" class="mobile-drawer-link">Astrology <span>→</span></a>
      <a href="<?php echo home_url('/about-us/'); ?>" class="mobile-drawer-link">About Us <span>→</span></a>
      <a href="<?php echo home_url('/contact/'); ?>" class="mobile-drawer-link">Contact <span>→</span></a>
      <a href="https://wa.me/919680552270" class="mobile-drawer-link" style="color: #25D366;">WhatsApp Inquiry <span>💬</span></a>
    </div>
  </div>
