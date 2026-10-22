<?php
/**
 * Template Name: Track Order Page
 * Vivaaz Gems - Track Order
 * 100% exact fidelity to client demo (Image 4)
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="wrap" style="max-width: 760px; padding-top: 24px; padding-bottom: 70px;">
  <div class="crumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a> › <b>Track order</b></div>
  
  <h1 class="h1" style="margin-top: 14px;">Track your order</h1>
  <p class="lead">Enter the order or tracking number to see four steps.</p>

  <form id="track-form" onsubmit="event.preventDefault(); doTrackOrder();" style="display: flex; gap: 10px; margin-top: 20px;" class="f">
    <input id="tn" placeholder="Order or tracking number" value="VG-10482" aria-label="Order number" style="flex: 1;">
    <button type="submit" class="btn">Track</button>
  </form>

  <div class="cobox" id="track-result-box" style="margin-top: 24px;">
    <h5 id="track-order-num">#VG-10482 · 2 ITEMS</h5>
    <div class="track">
      <div class="on">
        <b>Order confirmed</b>
        8 Oct, 11:20
      </div>
      <div class="on">
        <b>Checked and packed</b>
        9 Oct · live photos sent on WhatsApp
      </div>
      <div class="on">
        <b>Shipped, insured</b>
        9 Oct · Bluedart AWB 7781…
      </div>
      <div>
        <b>Arriving</b>
        About 11–12 Oct
      </div>
    </div>
    <p style="font-size: 12.5px; color: var(--soft); margin: 16px 0 0;">WhatsApp sends: confirmed, shipped (with tracking), delivered.</p>
  </div>
</div>

<script>
function doTrackOrder() {
  var val = document.getElementById('tn').value.trim() || 'VG-10482';
  var prefix = val.startsWith('#') ? val : ('#' + val);
  document.getElementById('track-order-num').textContent = prefix.toUpperCase() + ' · 2 ITEMS';
  document.getElementById('track-result-box').style.display = 'block';
}
</script>

<?php
get_footer('shop');
