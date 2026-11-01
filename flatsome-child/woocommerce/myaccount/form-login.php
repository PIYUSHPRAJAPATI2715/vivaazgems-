<?php
/**
 * Vivaaz Gems - Luxury Dynamic Tabbed Login & Registration Page
 * Single centered elegant card with Sign In & Create Account tabs.
 */

if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_customer_login_form');

// Check if registration error occurred or if action=register is set to activate register tab by default
$default_tab = (isset($_GET['action']) && $_GET['action'] === 'register') || (!empty($_POST['register'])) ? 'register' : 'login';
?>

<div class="account-login-page-wrapper">
  
  <div class="account-login-card-container">
    
    <?php
    if (function_exists('wc_print_notices')) {
        wc_print_notices();
    }
    ?>
    
    <div class="account-page-header">
      <span class="section-tag-divider">MY ACCOUNT</span>
      <h1 class="font-serif" style="font-size: 28px; font-weight: 400; margin: 8px 0 4px;">Welcome to <span class="font-italic text-gold">Vivaaz Gems</span></h1>
      <p class="text-muted" style="font-size: 13px; margin: 0;">Sign in to your account or create a new account to manage orders and wishlist.</p>
    </div>

    <!-- Interactive Luxury Tab Switcher -->
    <div class="account-tabs-header" role="tablist">
      <button type="button" class="account-tab-btn <?php echo $default_tab === 'login' ? 'active' : ''; ?>" id="tab-btn-login" onclick="switchAccountTab('login')">
        SIGN IN
      </button>
      <button type="button" class="account-tab-btn <?php echo $default_tab === 'register' ? 'active' : ''; ?>" id="tab-btn-register" onclick="switchAccountTab('register')">
        CREATE AN ACCOUNT
      </button>
    </div>

    <!-- 1. SIGN IN PANEL -->
    <div class="account-tab-panel <?php echo $default_tab === 'login' ? 'active' : ''; ?>" id="tab-panel-login">
      
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

        <div class="account-switch-prompt">
          Don't have an account? <a href="#register" onclick="switchAccountTab('register'); return false;" class="switch-link">Create an Account</a>
        </div>

        <!-- Social Login Buttons (Point 10 Spec) -->
        <div class="social-login-divider">
          <span>OR CONTINUE WITH</span>
        </div>
        <div class="social-btn-group" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-top: 10px;">
          <button type="button" class="btn-social-item google-btn" style="padding: 10px 4px; font-size: 11px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: 1px solid var(--color-border-light); background: #FFFFFF; cursor: pointer;">
            <span>🌐</span> Google
          </button>
          <button type="button" class="btn-social-item fb-btn" style="padding: 10px 4px; font-size: 11px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: 1px solid var(--color-border-light); background: #FFFFFF; cursor: pointer;">
            <span style="color: #1877F2;">📘</span> Facebook
          </button>
          <a href="https://wa.me/919680552270?text=Hi%20Vivaaz%20Gems,%20I%20would%20like%20to%20sign%20in%20with%20WhatsApp" target="_blank" class="btn-social-item wa-btn" style="padding: 10px 4px; font-size: 11px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: 1px solid #25D366; background: #FFFFFF; color: #1C1A17; text-decoration: none; cursor: pointer;">
            <span style="width:20px;height:20px;min-width:20px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:#25D366;color:#fff;line-height:1;"><svg style="width:12px;height:12px;fill:#fff;display:block;" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg></span> WhatsApp
          </a>
        </div>

        <?php do_action('woocommerce_login_form_end'); ?>

      </form>
    </div>

    <!-- 2. CREATE ACCOUNT PANEL -->
    <div class="account-tab-panel <?php echo $default_tab === 'register' ? 'active' : ''; ?>" id="tab-panel-register">
      
      <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?> onsubmit="return validateRegisterForm(this);">

        <?php do_action('woocommerce_register_form_start'); ?>

        <div class="form-group-item">
          <label for="reg_first_name">Full Name <span class="required">*</span></label>
          <input type="text" class="input-text-custom" name="account_first_name" id="reg_first_name" autocomplete="name" value="<?php echo (!empty($_POST['account_first_name'])) ? esc_attr(wp_unslash($_POST['account_first_name'])) : ''; ?>" placeholder="Enter your full name" required />
        </div>

        <div class="form-group-item">
          <label for="reg_email">Email address <span class="required">*</span></label>
          <input type="email" class="input-text-custom" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" placeholder="Enter your email address" required />
        </div>

        <div class="form-group-item">
          <label for="reg_password">Password <span class="required">*</span></label>
          <input type="password" class="input-text-custom" name="password" id="reg_password" autocomplete="new-password" placeholder="Create a strong password (min. 6 characters)" required />
        </div>

        <div class="form-group-item">
          <label for="reg_password_confirm">Confirm Password <span class="required">*</span></label>
          <input type="password" class="input-text-custom" name="password_confirm" id="reg_password_confirm" autocomplete="new-password" placeholder="Re-enter your password" required />
        </div>

        <?php do_action('woocommerce_register_form'); ?>

        <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
        <button type="submit" class="btn-square-dark-full" name="register" value="Register">CREATE ACCOUNT →</button>

        <div class="account-switch-prompt">
          Already have an account? <a href="#login" onclick="switchAccountTab('login'); return false;" class="switch-link">Sign In</a>
        </div>

        <!-- Social Register Buttons (Point 10 Spec) -->
        <div class="social-login-divider" style="margin-top: 18px;">
          <span>OR CONTINUE WITH</span>
        </div>
        <div class="social-btn-group" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-top: 10px;">
          <button type="button" class="btn-social-item google-btn" style="padding: 10px 4px; font-size: 11px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: 1px solid var(--color-border-light); background: #FFFFFF; cursor: pointer;">
            <span>🌐</span> Google
          </button>
          <button type="button" class="btn-social-item fb-btn" style="padding: 10px 4px; font-size: 11px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: 1px solid var(--color-border-light); background: #FFFFFF; cursor: pointer;">
            <span style="color: #1877F2;">📘</span> Facebook
          </button>
          <a href="https://wa.me/919680552270?text=Hi%20Vivaaz%20Gems,%20I%20would%20like%20to%20register%20with%20WhatsApp" target="_blank" class="btn-social-item wa-btn" style="padding: 10px 4px; font-size: 11px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: 1px solid #25D366; background: #FFFFFF; color: #1C1A17; text-decoration: none; cursor: pointer;">
            <span style="width:20px;height:20px;min-width:20px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:#25D366;color:#fff;line-height:1;"><svg style="width:12px;height:12px;fill:#fff;display:block;" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg></span> WhatsApp
          </a>
        </div>

        <p style="font-size: 11px; color: var(--color-text-muted); margin-top: 14px; text-align: center; line-height: 1.5;">
          By signing up, you agree to Vivaaz Gems's <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" style="text-decoration: underline;">Privacy Policy</a> & <a href="<?php echo esc_url(home_url('/terms/')); ?>" style="text-decoration: underline;">Terms of Use</a>.
        </p>

        <?php do_action('woocommerce_register_form_end'); ?>

      </form>
    </div>

  </div>

</div>

<script>
function switchAccountTab(tabName) {
  var loginBtn = document.getElementById('tab-btn-login');
  var regBtn = document.getElementById('tab-btn-register');
  var loginPanel = document.getElementById('tab-panel-login');
  var regPanel = document.getElementById('tab-panel-register');

  if (!loginBtn || !regBtn || !loginPanel || !regPanel) return;

  if (tabName === 'register') {
    loginBtn.classList.remove('active');
    regBtn.classList.add('active');
    loginPanel.classList.remove('active');
    regPanel.classList.add('active');
    if (history.pushState) {
      history.pushState(null, null, '#register');
    } else {
      location.hash = '#register';
    }
  } else {
    regBtn.classList.remove('active');
    loginBtn.classList.add('active');
    regPanel.classList.remove('active');
    loginPanel.classList.add('active');
    if (history.pushState) {
      history.pushState(null, null, '#login');
    } else {
      location.hash = '#login';
    }
  }
}

function validateRegisterForm(form) {
  var pass = form.querySelector('#reg_password');
  var passConfirm = form.querySelector('#reg_password_confirm');
  if (pass && passConfirm && pass.value !== passConfirm.value) {
    alert('Passwords do not match. Please enter matching passwords.');
    passConfirm.focus();
    return false;
  }
  return true;
}

document.addEventListener("DOMContentLoaded", function() {
  if (window.location.hash === '#register') {
    switchAccountTab('register');
  }
});
</script>

<?php do_action('woocommerce_after_customer_login_form'); ?>
