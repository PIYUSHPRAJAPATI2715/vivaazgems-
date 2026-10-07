<?php
/**
 * Vivaaz Gems - Custom WooCommerce Login & Signup Page
 * Matches Client PDF Specification (Account Icon & Sign in / Sign up)
 */

if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_customer_login_form');
?>

<div class="account-login-page-wrapper">
  
  <div class="account-login-container">
    
    <div class="account-page-header">
      <span class="section-tag-divider">MY ACCOUNT</span>
      <h1 class="font-serif" style="font-size: 32px; font-weight: 400;">Welcome to <span class="font-italic text-gold">Vivaaz Gems</span></h1>
      <p class="text-muted" style="font-size: 13px;">Sign in to your account or create a new account to track orders and save your wishlist.</p>
    </div>

    <div class="account-forms-grid has-register">
      
      <!-- 1. SIGN IN FORM -->
      <div class="account-form-card">
        <h2 class="form-card-title">Sign In</h2>
        
        <form class="woocommerce-form woocommerce-form-login login" method="post">

          <?php do_action('woocommerce_login_form_start'); ?>

          <div class="form-group-item">
            <label for="username">Email address or Username <span class="required">*</span></label>
            <input type="text" class="input-text-custom" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" placeholder="Enter your email" required />
          </div>

          <div class="form-group-item">
            <label for="password">Password <span class="required">*</span></label>
            <input class="input-text-custom" type="password" name="password" id="password" autocomplete="current-password" placeholder="Enter your password" required />
          </div>

          <?php do_action('woocommerce_login_form'); ?>

          <div class="form-action-row">
            <label class="remember-me-checkbox">
              <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span>Remember me</span>
            </label>
            <a href="<?php echo esc_url(wp_lostpassword_url()); ?>" class="lost-pass-link">Forgot password?</a>
          </div>

          <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
          <button type="submit" class="btn-square-dark-full" name="login" value="Log in">SIGN IN →</button>

          <!-- Social Login Buttons -->
          <div class="social-login-divider">
            <span>OR CONTINUE WITH</span>
          </div>
          <div class="social-btn-group">
            <button type="button" class="btn-social-item google-btn">
              <span>🌐</span> Google
            </button>
            <button type="button" class="btn-social-item fb-btn">
              <span>📘</span> Facebook
            </button>
          </div>

          <?php do_action('woocommerce_login_form_end'); ?>

        </form>
      </div>

      <!-- 2. CREATE ACCOUNT FORM -->
      <div class="account-form-card">
        <h2 class="form-card-title">Create an Account</h2>
        
        <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?> >

          <?php do_action('woocommerce_register_form_start'); ?>

          <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>
            <div class="form-group-item">
              <label for="reg_username">Username <span class="required">*</span></label>
              <input type="text" class="input-text-custom" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" placeholder="Choose a username" required />
            </div>
          <?php endif; ?>

          <div class="form-group-item">
            <label for="reg_email">Email address <span class="required">*</span></label>
            <input type="email" class="input-text-custom" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" placeholder="Enter your email" required />
          </div>

          <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>
            <div class="form-group-item">
              <label for="reg_password">Password <span class="required">*</span></label>
              <input type="password" class="input-text-custom" name="password" id="reg_password" autocomplete="new-password" placeholder="Create a strong password" required />
            </div>
          <?php else : ?>
            <p style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 14px;">A password will be sent to your email address.</p>
          <?php endif; ?>

          <?php do_action('woocommerce_register_form'); ?>

          <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
          <button type="submit" class="btn-square-dark-full" name="register" value="Register">CREATE ACCOUNT →</button>

          <p style="font-size: 11px; color: var(--color-text-muted); margin-top: 14px; text-align: center;">
            By signing up, you agree to Vivaaz Gems's <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" style="text-decoration: underline;">Privacy Policy</a> & <a href="<?php echo esc_url(home_url('/terms/')); ?>" style="text-decoration: underline;">Terms of Use</a>.
          </p>

          <?php do_action('woocommerce_register_form_end'); ?>

        </form>
      </div>

    </div>

  </div>

</div>

<?php do_action('woocommerce_after_customer_login_form'); ?>
