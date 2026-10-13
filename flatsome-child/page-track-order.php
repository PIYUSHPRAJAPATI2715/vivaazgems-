<?php
/**
 * Template Name: Track Order Page
 * Vivaaz Gems - Track Your Order
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 680px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">SUPPORT</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 12px; color: #1C1A17;">Track your order</h1>
      <p style="font-size: 15px; color: #4A4640; line-height: 1.7;">
        Enter your order number or the courier tracking number, and we will show you where your parcel is.
      </p>
    </div>

    <!-- Tracking Form Card -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px; margin-bottom: 32px;">
      <form action="#" method="get" onsubmit="event.preventDefault(); var val = document.getElementById('tracking-input').value.trim(); if(val) { window.open('https://wa.me/919680552270?text=' + encodeURIComponent('Hello Vivaaz Gems, I would like to track my order/parcel: ' + val), '_blank'); } return false;">
        <div style="margin-bottom: 20px;">
          <label for="tracking-input" style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #1C1A17; margin-bottom: 8px;">Order number or tracking number</label>
          <input type="text" id="tracking-input" required placeholder="e.g. VG-10482 or AWB / Courier Number" style="width: 100%; padding: 14px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 14px; outline: none;">
        </div>

        <button type="submit" class="btn-square-dark" style="width: 100%; padding: 15px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; border: none; cursor: pointer;">
          TRACK →
        </button>
      </form>

      <div style="font-size: 12px; line-height: 1.7; color: #76706A; margin-top: 24px; padding-top: 20px; border-top: 1px solid #EBE7DF;">
        Your order number is in your confirmation email and under <a href="<?php echo esc_url(home_url('/my-account/orders/')); ?>" style="color: #9C7C4C; text-decoration: underline;">Orders in your account</a>. Dispatched parcels also show the courier tracking link.
      </div>
    </div>

    <!-- Sourcing & Packing Note -->
    <div style="background: #FAF7F2; border: 1px solid #EBE7DF; padding: 24px; text-align: center; font-size: 13px; line-height: 1.7; color: #4A4640;">
      <strong style="color: #1C1A17;">Not dispatched yet?</strong> Stones are checked and packed within 1 to 2 working days of payment. If it has been longer, message us on WhatsApp with your order number.
      <div style="margin-top: 14px;">
        <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, checking on dispatch of my order.'); ?>" target="_blank" style="color: #25D366; font-weight: 700; text-decoration: underline;">
          💬 Message us on WhatsApp (+91 96805 52270)
        </a>
      </div>
    </div>

  </div>
</div>

<?php
get_footer('shop');
