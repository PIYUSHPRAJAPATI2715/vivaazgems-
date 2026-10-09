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
