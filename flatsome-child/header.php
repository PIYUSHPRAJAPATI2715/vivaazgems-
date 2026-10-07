<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- TOP BAR (CLIENT SPEC PAGE 3) -->
  <div class="top-bar-notice">
    <div class="top-bar-left">
      NEW ARRIVALS ARE IN. <a href="<?php echo esc_url(home_url('/shop/')); ?>">SHOP NOW →</a>
    </div>
    <div class="top-bar-right">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>">CONTACT</a>
      <a href="<?php echo esc_url(home_url('/track-order/')); ?>">TRACK ORDER</a>
      <div class="currency-select-wrapper">
        <select aria-label="Currency Selector">
          <option value="INR">IN | ₹ INR</option>
          <option value="USD">US | $ USD</option>
          <option value="EUR">EU | € EUR</option>
          <option value="GBP">UK | £ GBP</option>
        </select>
      </div>
    </div>
  </div>

  <!-- MAIN HEADER (CLIENT SPEC PAGE 3: CENTRED MENU) -->
  <header class="main-header">
    <!-- Brand Logo -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-logo-container">
      <div>
        <span class="brand-logo-text">V I V A A Z</span>
        <span class="brand-logo-subtitle">GEMS · JAIPUR</span>
      </div>
    </a>

    <!-- Centered Navigation Menu -->
    <ul class="nav-menu-center">
      <li><a href="<?php echo esc_url(home_url('/shop/')); ?>" class="nav-link">Gemstones</a></li>
      <li><a href="<?php echo esc_url(home_url('/#layouts')); ?>" class="nav-link">Layouts</a></li>
      <li><a href="<?php echo esc_url(home_url('/#beads')); ?>" class="nav-link">Beads</a></li>
      <li><a href="<?php echo esc_url(home_url('/tennis-jewelry/')); ?>" class="nav-link">Jewelry</a></li>
      <li><a href="<?php echo esc_url(home_url('/astrology/')); ?>" class="nav-link">Astrology</a></li>
    </ul>

    <!-- Header Action Icons (Account, Wishlist, Cart) -->
    <div class="header-action-group">
      <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="icon-action-btn" title="Search">🔍</a>
      <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="icon-action-btn" title="Sign In / Sign Up">👤</a>
      <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="icon-action-btn" title="Wishlist">♡</a>
      <a href="<?php echo esc_url(home_url('/cart/')); ?>" class="icon-action-btn" title="Cart Bag">
        🛒
        <span class="cart-badge-count">
          <?php echo class_exists('WooCommerce') && WC()->cart ? WC()->cart->get_cart_contents_count() : '0'; ?>
        </span>
      </a>
    </div>
  </header>
