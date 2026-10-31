<?php
/**
 * Template Name: My Account Page
 * Vivaaz Gems - My Account & Sign In (100% Client Demo Fidelity)
 * Replicates the exact account() and signinBody() structure from
 * Vivaaz-Website-Desktop-Demo.html & Phone-Demo.html
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header('shop');

$current_user = is_user_logged_in() ? wp_get_current_user() : null;
$user_name = $current_user ? ($current_user->first_name ?: $current_user->display_name) : 'Anita Rao';
?>

<div class="wrap account-page-wrap" style="max-width: 1000px; margin: 0 auto; padding: 24px 20px 80px; min-height: 70vh;">

  <!-- If user is not logged in, show elegant Sign In view with WhatsApp + Google + Email -->
  <div id="vivaaz-signin-view" style="<?php echo is_user_logged_in() ? 'display: none;' : ''; ?> max-width: 520px; margin: 0 auto; padding-block: 10px;">
    
    <div style="text-align: center; margin-bottom: 24px;">
      <span class="cap" style="font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; color: var(--gold, #9C7C4C);">MY ACCOUNT</span>
      <h1 class="h1" id="account-main-title" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 32px; font-weight: 400; color: var(--ink, #1C1A17); margin: 8px 0 6px;">Sign in</h1>
      <p class="lead" id="account-main-subtitle" style="font-size: 14px; color: var(--soft, #76706A); margin: 0;">Sign in to see your orders, saved addresses and wishlist.</p>
    </div>

    <!-- Sign In Container Box -->
    <div class="cobox" style="background: var(--paper, #FFFFFF); border: 1px solid var(--line, #EFE9E0); padding: 28px 24px;">
      
      <!-- Social / WhatsApp Login Row (Point 8 & 10 Spec) -->
      <div class="soc" style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 24px;">
        
        <!-- 1. WhatsApp Instant Sign In with Official Icon -->
        <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I would like to sign in to my account via WhatsApp.'); ?>" target="_blank" class="btn wide" style="display: flex; align-items: center; justify-content: center; gap: 10px; padding: 14px; background: #25D366; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; border-radius: 0;">
          <svg style="width: 20px; height: 20px; fill: #FFFFFF;" viewBox="0 0 24 24"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm0 1.67c2.2 0 4.26.86 5.82 2.42a8.17 8.17 0 0 1 2.41 5.82c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.39-4.19-1.15l-.3-.18-3.12.82.83-3.04-.2-.32a8.188 8.188 0 0 1-1.25-4.37c0-4.54 3.7-8.24 8.24-8.24zm-4.71 4.54c-.26 0-.67.1-1.02.48-.35.38-1.35 1.32-1.35 3.22 0 1.9 1.38 3.74 1.57 4 .19.26 2.68 4.25 6.64 5.8.94.37 1.68.59 2.25.77.95.3 1.82.26 2.51.16.77-.12 2.37-.97 2.7-1.9.34-.94.34-1.74.24-1.91-.1-.17-.37-.27-.78-.47-.41-.2-2.43-1.2-2.81-1.34-.38-.14-.65-.2-.93.2-.27.4-.1.06-1.39 1.65-.17.2-.35.23-.76.03-.41-.2-1.73-.64-3.3-2.04-1.22-1.09-2.05-2.43-2.29-2.84-.24-.41-.03-.63.18-.83.18-.18.41-.47.62-.7.2-.24.27-.4.41-.67.14-.27.07-.5-.03-.7-.1-.2-.93-2.24-1.27-3.07-.34-.81-.68-.7-.93-.71z"/></svg>
          <span style="white-space: nowrap !important;">CONTINUE WITH WHATSAPP</span>
        </a>

        <!-- 1b. Facebook Sign In -->
        <button type="button" onclick="fakeSocialLogin('Facebook');" class="btn o wide" style="display: flex; align-items: center; justify-content: center; gap: 10px; padding: 13px; background: #FFFFFF; color: var(--ink, #1C1A17); border: 1px solid var(--line, #EFE9E0); font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; cursor: pointer; border-radius: 0; white-space: nowrap;">
          <span style="font-weight: 700; color: #1877F2; font-size: 14px;">f</span> CONTINUE WITH FACEBOOK
        </button>

        <!-- 2. Google Sign In -->
        <button type="button" onclick="fakeSocialLogin('Google');" class="btn o wide" style="display: flex; align-items: center; justify-content: center; gap: 10px; padding: 13px; background: #FFFFFF; color: var(--ink, #1C1A17); border: 1px solid var(--line, #EFE9E0); font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; cursor: pointer; border-radius: 0;">
          <span style="font-weight: 700; color: #4285F4; font-size: 14px;">G</span> CONTINUE WITH GOOGLE
        </button>

      </div>

      <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 20px; color: var(--mute, #A8A29E); font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase;">
        <span style="flex: 1; height: 1px; background: var(--line, #EFE9E0);"></span>
        <span>OR WITH EMAIL</span>
        <span style="flex: 1; height: 1px; background: var(--line, #EFE9E0);"></span>
      </div>

      <!-- Auth Mode Toggle Tabs -->
      <div style="display: flex; border-bottom: 1px solid var(--line, #EFE9E0); margin-bottom: 20px;">
        <button type="button" id="page-tab-signin" onclick="setPageAuthMode('signin');" style="flex: 1; padding: 10px; background: none; border: none; border-bottom: 2px solid var(--ink, #1C1A17); font-size: 12px; font-weight: 700; color: var(--ink, #1C1A17); cursor: pointer; letter-spacing: 0.12em; text-transform: uppercase;">SIGN IN</button>
        <button type="button" id="page-tab-register" onclick="setPageAuthMode('register');" style="flex: 1; padding: 10px; background: none; border: none; border-bottom: 2px solid transparent; font-size: 12px; font-weight: 500; color: var(--soft, #76706A); cursor: pointer; letter-spacing: 0.12em; text-transform: uppercase;">CREATE ACCOUNT</button>
      </div>

      <div id="page-auth-msg" style="display: none; padding: 10px 14px; font-size: 12.5px; margin-bottom: 16px;"></div>

      <!-- 3a. Real Sign In Form -->
      <form id="page-signin-form" onsubmit="handlePageLogin(event);">
        <div style="display: flex; flex-direction: column; gap: 14px;">
          <div>
            <label for="signin-email" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">Email address</label>
            <input id="signin-email" type="email" required value="" placeholder="name@example.com" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF; box-sizing: border-box;">
          </div>
          <div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
              <label for="signin-pass" style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: var(--ink, #1C1A17);">Password</label>
              <a href="<?php echo esc_url(wp_lostpassword_url()); ?>" target="_blank" style="font-size: 11.5px; color: var(--soft, #76706A); text-decoration: underline;">Forgot?</a>
            </div>
            <input id="signin-pass" type="password" required value="" placeholder="Enter password" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF; box-sizing: border-box;">
          </div>
        </div>

        <button type="submit" id="page-signin-btn" class="btn wide" style="display: block; width: 100%; margin-top: 20px; padding: 14px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; border: none; cursor: pointer; border-radius: 0;">
          SIGN IN
        </button>

        <p style="text-align: center; font-size: 12.5px; color: var(--soft, #76706A); margin: 18px 0 0;">
          Don't have an account? <a href="javascript:void(0);" onclick="setPageAuthMode('register');" style="color: var(--ink, #1C1A17); font-weight: 600; text-decoration: underline;">Create an account</a>
        </p>
      </form>

      <!-- 3b. Real Register Form -->
      <form id="page-register-form" style="display: none;" onsubmit="handlePageRegister(event);">
        <div style="display: flex; flex-direction: column; gap: 14px;">
          <div>
            <label for="reg-page-name" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">Full name</label>
            <input id="reg-page-name" type="text" placeholder="Your full name" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF; box-sizing: border-box;">
          </div>
          <div>
            <label for="reg-page-email" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">Email address</label>
            <input id="reg-page-email" type="email" required placeholder="name@example.com" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF; box-sizing: border-box;">
          </div>
          <div>
            <label for="reg-page-pass" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">Password (min 6 characters)</label>
            <input id="reg-page-pass" type="password" required minlength="6" placeholder="Create password" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF; box-sizing: border-box;">
          </div>
        </div>

        <button type="submit" id="page-register-btn" class="btn wide" style="display: block; width: 100%; margin-top: 20px; padding: 14px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; border: none; cursor: pointer; border-radius: 0;">
          CREATE AN ACCOUNT
        </button>

        <p style="text-align: center; font-size: 12.5px; color: var(--soft, #76706A); margin: 18px 0 0;">
          Already have an account? <a href="javascript:void(0);" onclick="setPageAuthMode('signin');" style="color: var(--ink, #1C1A17); font-weight: 600; text-decoration: underline;">Sign in</a>
        </p>
      </form>

    </div>
  </div>

  <!-- Authenticated User Account View (Dashboard, Orders, Addresses, Details) -->
  <div id="vivaaz-authenticated-view" style="<?php echo is_user_logged_in() ? '' : 'display: none;'; ?>">
    
    <div class="crumb" style="font-size: 12.5px; color: var(--mute, #A8A29E); margin-bottom: 20px;">
      <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a> › <b style="color: var(--ink, #1C1A17);">My account</b>
    </div>

    <h1 class="h1" id="account-welcome-heading" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 36px; font-weight: 400; color: var(--ink, #1C1A17); margin: 0 0 28px;">
      Hello, <?php echo esc_html($user_name); ?>
    </h1>

    <div class="lmain" style="display: grid; grid-template-columns: 220px minmax(0, 1fr); gap: 32px; align-items: start;">
      
      <!-- Sidebar Menu -->
      <aside class="side tree" style="background: var(--paper, #FFFFFF); border: 1px solid var(--line, #EFE9E0); padding: 12px 0;">
        <a href="javascript:void(0);" onclick="switchAcctTab('Dashboard');" id="tab-nav-Dashboard" class="acct-nav-item active" style="display: block; padding: 10px 20px; font-size: 13.5px; font-weight: 600; color: var(--ink, #1C1A17); text-decoration: none; border-left: 3px solid var(--ink, #1C1A17); background: #FAF7F2;">Dashboard</a>
        <a href="javascript:void(0);" onclick="switchAcctTab('Orders');" id="tab-nav-Orders" class="acct-nav-item" style="display: block; padding: 10px 20px; font-size: 13.5px; color: var(--soft, #76706A); text-decoration: none; border-left: 3px solid transparent;">Orders</a>
        <a href="javascript:void(0);" onclick="switchAcctTab('Addresses');" id="tab-nav-Addresses" class="acct-nav-item" style="display: block; padding: 10px 20px; font-size: 13.5px; color: var(--soft, #76706A); text-decoration: none; border-left: 3px solid transparent;">Addresses</a>
        <a href="javascript:void(0);" onclick="switchAcctTab('Account details');" id="tab-nav-Account details" class="acct-nav-item" style="display: block; padding: 10px 20px; font-size: 13.5px; color: var(--soft, #76706A); text-decoration: none; border-left: 3px solid transparent;">Account details</a>
        <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" style="display: block; padding: 10px 20px; font-size: 13.5px; color: var(--soft, #76706A); text-decoration: none; border-left: 3px solid transparent;">Wishlist</a>
        <a href="javascript:void(0);" onclick="doSignOut();" style="display: block; padding: 10px 20px; font-size: 13.5px; color: #C0392B; text-decoration: none; border-left: 3px solid transparent; border-top: 1px solid var(--line, #EFE9E0); margin-top: 8px;">Log out</a>
      </aside>

      <!-- Main Content Box -->
      <div class="cobox" style="background: var(--paper, #FFFFFF); border: 1px solid var(--line, #EFE9E0); padding: 28px;">
        
        <!-- Tab 1: Dashboard -->
        <div id="pane-Dashboard" class="acct-pane">
          <h5 style="font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; margin: 0 0 16px; color: var(--ink, #1C1A17);">LAST ORDER</h5>
          <table class="tbl" style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
            <thead>
              <tr style="border-bottom: 1px solid var(--line, #EFE9E0); color: var(--mute, #A8A29E); font-size: 11px; letter-spacing: 0.08em; text-transform: uppercase;">
                <th style="padding: 10px 0;">ORDER</th>
                <th style="padding: 10px 0;">DATE</th>
                <th style="padding: 10px 0;">STATUS</th>
                <th style="padding: 10px 0;">TOTAL</th>
                <th style="padding: 10px 0;"></th>
              </tr>
            </thead>
            <tbody>
              <tr style="border-bottom: 1px solid var(--line, #EFE9E0);">
                <td style="padding: 14px 0; font-weight: 600;">#VG-10482</td>
                <td style="padding: 14px 0; color: var(--soft, #76706A);">8 Oct 2026</td>
                <td style="padding: 14px 0; color: #1E9E52; font-weight: 600;">Shipped, insured</td>
                <td style="padding: 14px 0; font-weight: 700;">₹ 6,010</td>
                <td style="padding: 14px 0; text-align: right;"><a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="link" style="color: var(--gold, #9C7C4C); text-decoration: underline; font-weight: 600;">Track</a></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Tab 2: Orders -->
        <div id="pane-Orders" class="acct-pane" style="display: none;">
          <h5 style="font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; margin: 0 0 16px; color: var(--ink, #1C1A17);">ORDERS</h5>
          <table class="tbl" style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
            <thead>
              <tr style="border-bottom: 1px solid var(--line, #EFE9E0); color: var(--mute, #A8A29E); font-size: 11px; letter-spacing: 0.08em; text-transform: uppercase;">
                <th style="padding: 10px 0;">ORDER</th>
                <th style="padding: 10px 0;">DATE</th>
                <th style="padding: 10px 0;">STATUS</th>
                <th style="padding: 10px 0;">TOTAL</th>
                <th style="padding: 10px 0;"></th>
              </tr>
            </thead>
            <tbody>
              <tr style="border-bottom: 1px solid var(--line, #EFE9E0);">
                <td style="padding: 14px 0; font-weight: 600;">#VG-10482</td>
                <td style="padding: 14px 0; color: var(--soft, #76706A);">8 Oct 2026</td>
                <td style="padding: 14px 0; color: #1E9E52; font-weight: 600;">Shipped, insured</td>
                <td style="padding: 14px 0; font-weight: 700;">₹ 6,010</td>
                <td style="padding: 14px 0; text-align: right;"><a href="<?php echo esc_url(home_url('/track-order/')); ?>" class="link" style="color: var(--gold, #9C7C4C); text-decoration: underline; font-weight: 600;">Track</a></td>
              </tr>
              <tr style="border-bottom: 1px solid var(--line, #EFE9E0);">
                <td style="padding: 14px 0; font-weight: 600;">#VG-10311</td>
                <td style="padding: 14px 0; color: var(--soft, #76706A);">14 Sep 2026</td>
                <td style="padding: 14px 0; color: var(--soft, #76706A);">Delivered</td>
                <td style="padding: 14px 0; font-weight: 700;">₹ 14,200</td>
                <td style="padding: 14px 0; text-align: right;"><a href="https://wa.me/919680552270?text=Hi,%20I%20would%20like%20to%20reorder%20from%20#VG-10311" target="_blank" class="link" style="color: #1E9E52; text-decoration: underline; font-weight: 600;">Reorder</a></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Tab 3: Addresses -->
        <div id="pane-Addresses" class="acct-pane" style="display: none;">
          <h5 style="font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; margin: 0 0 16px; color: var(--ink, #1C1A17);">ADDRESSES</h5>
          <p style="font-size: 14px; line-height: 1.8; color: var(--ink, #1C1A17); margin-bottom: 18px;">
            Anita Rao<br>
            12 Civil Lines, Jaipur 302001<br>
            Rajasthan, India
          </p>
          <button type="button" class="btn sm o" onclick="alert('Address saved!');" style="padding: 8px 16px; background: #FFFFFF; color: #1C1A17; border: 1px solid #1C1A17; font-size: 11px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; cursor: pointer; border-radius: 0;">EDIT ADDRESS</button>
        </div>

        <!-- Tab 4: Account details -->
        <div id="pane-Account details" class="acct-pane" style="display: none;">
          <h5 style="font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; margin: 0 0 16px; color: var(--ink, #1C1A17);">ACCOUNT DETAILS</h5>
          <div class="fg" style="display: flex; flex-direction: column; gap: 14px; max-width: 480px;">
            <div class="f">
              <label for="acct-name" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">Name</label>
              <input id="acct-name" value="Anita Rao" style="width: 100%; height: 42px; padding: 0 12px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none;">
            </div>
            <div class="f">
              <label for="acct-wa" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">WhatsApp</label>
              <input id="acct-wa" value="+91 98290 00000" style="width: 100%; height: 42px; padding: 0 12px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none;">
            </div>
            <div class="f">
              <label for="acct-email" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">Email</label>
              <input id="acct-email" value="anita@example.com" style="width: 100%; height: 42px; padding: 0 12px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none;">
            </div>
          </div>
          <button type="button" class="btn sm" onclick="alert('Account details saved successfully!');" style="margin-top: 18px; padding: 10px 22px; background: #1C1A17; color: #FFFFFF; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; border: none; cursor: pointer; border-radius: 0;">SAVE CHANGES</button>
        </div>

      </div>

    </div>

  </div>

</div>

<script>
  function setPageAuthMode(mode) {
    var signinForm = document.getElementById('page-signin-form');
    var regForm = document.getElementById('page-register-form');
    var tabIn = document.getElementById('page-tab-signin');
    var tabReg = document.getElementById('page-tab-register');
    var title = document.getElementById('account-main-title');
    var msgBox = document.getElementById('page-auth-msg');
    if (msgBox) msgBox.style.display = 'none';

    if (mode === 'register') {
      if (signinForm) signinForm.style.display = 'none';
      if (regForm) regForm.style.display = 'block';
      if (tabIn) { tabIn.style.borderBottomColor = 'transparent'; tabIn.style.fontWeight = '500'; tabIn.style.color = 'var(--soft, #76706A)'; }
      if (tabReg) { tabReg.style.borderBottomColor = 'var(--ink, #1C1A17)'; tabReg.style.fontWeight = '700'; tabReg.style.color = 'var(--ink, #1C1A17)'; }
      if (title) title.textContent = 'Create an account';
    } else {
      if (signinForm) signinForm.style.display = 'block';
      if (regForm) regForm.style.display = 'none';
      if (tabIn) { tabIn.style.borderBottomColor = 'var(--ink, #1C1A17)'; tabIn.style.fontWeight = '700'; tabIn.style.color = 'var(--ink, #1C1A17)'; }
      if (tabReg) { tabReg.style.borderBottomColor = 'transparent'; tabReg.style.fontWeight = '500'; tabReg.style.color = 'var(--soft, #76706A)'; }
      if (title) title.textContent = 'Sign in';
    }
  }

  function handlePageLogin(e) {
    e.preventDefault();
    var email = (document.getElementById('signin-email') || {}).value;
    var pass = (document.getElementById('signin-pass') || {}).value;
    var btn = document.getElementById('page-signin-btn');
    var msgBox = document.getElementById('page-auth-msg');

    if (!email || !pass) return;

    if (btn) { btn.disabled = true; btn.textContent = 'SIGNING IN...'; }
    if (msgBox) msgBox.style.display = 'none';

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
        if (msgBox) {
          msgBox.style.display = 'block';
          msgBox.style.background = '#EDF7ED';
          msgBox.style.color = '#1E4620';
          msgBox.style.border = '1px solid #C8E6C9';
          msgBox.textContent = (data.data && data.data.message) ? data.data.message : 'Signed in successfully.';
        }
        setTimeout(function() {
          window.location.reload();
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

  function handlePageRegister(e) {
    e.preventDefault();
    var name = (document.getElementById('reg-page-name') || {}).value;
    var email = (document.getElementById('reg-page-email') || {}).value;
    var pass = (document.getElementById('reg-page-pass') || {}).value;
    var btn = document.getElementById('page-register-btn');
    var msgBox = document.getElementById('page-auth-msg');

    if (!email || !pass) return;

    if (btn) { btn.disabled = true; btn.textContent = 'CREATING ACCOUNT...'; }
    if (msgBox) msgBox.style.display = 'none';

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
        if (msgBox) {
          msgBox.style.display = 'block';
          msgBox.style.background = '#EDF7ED';
          msgBox.style.color = '#1E4620';
          msgBox.style.border = '1px solid #C8E6C9';
          msgBox.textContent = (data.data && data.data.message) ? data.data.message : 'Account created successfully!';
        }
        setTimeout(function() {
          window.location.reload();
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
        msgBox.textContent = 'Could not connect to authentication server. Please try again.';
      }
    });
  }

  function switchAcctTab(tab) {
    var panes = document.querySelectorAll('.acct-pane');
    panes.forEach(function(p) { p.style.display = 'none'; });
    var target = document.getElementById('pane-' + tab);
    if (target) target.style.display = 'block';

    var navItems = document.querySelectorAll('.acct-nav-item');
    navItems.forEach(function(item) {
      item.style.fontWeight = '400';
      item.style.color = 'var(--soft, #76706A)';
      item.style.borderLeftColor = 'transparent';
      item.style.background = 'transparent';
    });
    var activeNav = document.getElementById('tab-nav-' + tab);
    if (activeNav) {
      activeNav.style.fontWeight = '600';
      activeNav.style.color = 'var(--ink, #1C1A17)';
      activeNav.style.borderLeftColor = 'var(--ink, #1C1A17)';
      activeNav.style.background = '#FAF7F2';
    }
  }

  function fakeSocialLogin(provider) {
    showWishlistToast('Signing in with ' + provider + '...');
    setTimeout(function() {
      document.getElementById('vivaaz-signin-view').style.display = 'none';
      document.getElementById('vivaaz-authenticated-view').style.display = 'block';
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }, 600);
  }

  function doSignOut() {
    window.location.href = '<?php echo esc_url(wp_logout_url(home_url("/my-account/"))); ?>';
  }
</script>

<?php
get_footer('shop');
