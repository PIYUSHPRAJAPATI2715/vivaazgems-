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

<div class="wrap account-page-wrap" style="max-width: 1000px; margin: 0 auto; padding: 40px 20px 80px; min-height: 70vh;">

  <!-- If user is not logged in, show elegant Sign In view with WhatsApp + Google + Email -->
  <div id="vivaaz-signin-view" style="<?php echo is_user_logged_in() ? 'display: none;' : ''; ?> max-width: 520px; margin: 0 auto; padding-block: 20px;">
    
    <div style="text-align: center; margin-bottom: 28px;">
      <span class="cap" style="font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; color: var(--gold, #9C7C4C);">MY ACCOUNT</span>
      <h1 class="h1" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 32px; font-weight: 400; color: var(--ink, #1C1A17); margin: 8px 0 6px;">Sign in</h1>
      <p class="lead" style="font-size: 14px; color: var(--soft, #76706A); margin: 0;">Sign in to see your orders, saved addresses and wishlist.</p>
    </div>

    <!-- Sign In Container Box -->
    <div class="cobox" style="background: var(--paper, #FFFFFF); border: 1px solid var(--line, #EFE9E0); padding: 32px;">
      
      <!-- Social / WhatsApp Login Row (Point 8 & 10 Spec) -->
      <div class="soc" style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 24px;">
        
        <!-- 1. WhatsApp Instant Sign In -->
        <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I would like to sign in to my account via WhatsApp.'); ?>" target="_blank" class="btn wide" style="display: flex; align-items: center; justify-content: center; gap: 10px; padding: 14px; background: #25D366; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; border-radius: 0;">
          <svg class="i" style="width: 18px; height: 18px; color: #FFF;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M4.5 19.5l1.2-3.6A7.8 7.8 0 1 1 8.6 18.6z"/><path d="M9.3 9.2c.3 2.4 2.6 4.8 5.4 5.4l1.1-1.1-1.7-.9-.7.7c-1.1-.5-2-1.4-2.5-2.5l.7-.7-.9-1.7z"/></svg>
          CONTINUE WITH WHATSAPP
        </a>

        <!-- 2. Google Sign In -->
        <button type="button" onclick="fakeSocialLogin('Google');" class="btn o wide" style="display: flex; align-items: center; justify-content: center; gap: 10px; padding: 13px; background: #FFFFFF; color: var(--ink, #1C1A17); border: 1px solid var(--line, #EFE9E0); font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; cursor: pointer; border-radius: 0;">
          <span style="font-weight: 700; color: #4285F4; font-size: 14px;">G</span> CONTINUE WITH GOOGLE
        </button>

      </div>

      <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 24px; color: var(--mute, #A8A29E); font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase;">
        <span style="flex: 1; height: 1px; background: var(--line, #EFE9E0);"></span>
        <span>OR WITH EMAIL</span>
        <span style="flex: 1; height: 1px; background: var(--line, #EFE9E0);"></span>
      </div>

      <!-- 3. Standard Login Form -->
      <form method="post" action="<?php echo esc_url(wp_login_url()); ?>" onsubmit="handleDemoSignIn(event);">
        <div style="display: flex; flex-direction: column; gap: 14px;">
          <div>
            <label for="signin-email" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--ink, #1C1A17);">Email address</label>
            <input id="signin-email" type="email" required value="anita@example.com" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
          </div>
          <div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
              <label for="signin-pass" style="font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: var(--ink, #1C1A17);">Password</label>
              <a href="<?php echo esc_url(wp_lostpassword_url()); ?>" style="font-size: 11.5px; color: var(--soft, #76706A); text-decoration: underline;">Forgot?</a>
            </div>
            <input id="signin-pass" type="password" required value="demo-only" style="width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line, #EFE9E0); font-size: 13.5px; outline: none; background: #FFF;">
          </div>
        </div>

        <button type="submit" class="btn wide" style="display: block; width: 100%; margin-top: 20px; padding: 14px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; border: none; cursor: pointer; border-radius: 0;">
          SIGN IN
        </button>

        <p style="text-align: center; font-size: 12.5px; color: var(--soft, #76706A); margin: 18px 0 0;">
          Don't have an account? <a href="javascript:void(0);" onclick="toggleAuthMode();" style="color: var(--ink, #1C1A17); font-weight: 600; text-decoration: underline;">Create an account</a>
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

  function handleDemoSignIn(e) {
    e.preventDefault();
    document.getElementById('vivaaz-signin-view').style.display = 'none';
    document.getElementById('vivaaz-authenticated-view').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  function fakeSocialLogin(provider) {
    document.getElementById('vivaaz-signin-view').style.display = 'none';
    document.getElementById('vivaaz-authenticated-view').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  function doSignOut() {
    document.getElementById('vivaaz-authenticated-view').style.display = 'none';
    document.getElementById('vivaaz-signin-view').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  function toggleAuthMode() {
    var btn = document.querySelector('#vivaaz-signin-view button[type="submit"]');
    if (btn) btn.textContent = 'CREATE AN ACCOUNT';
    var head = document.querySelector('#vivaaz-signin-view h1');
    if (head) head.textContent = 'Create an account';
  }
</script>

<?php
get_footer('shop');
