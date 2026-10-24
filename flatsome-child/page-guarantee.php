<?php
/**
 * Template Name: Our Guarantee Page
 * Vivaaz Gems - Our Guarantee (No Returns Policy)
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 900px; margin: 0 auto;">

    <!-- Breadcrumb (12.5px #9A9186 - Point 6 & Brief Accordance) -->
    <div class="crumb" style="font-size: 12.5px; color: #9A9186; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
      <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a>
      <span>›</span>
      <b style="color: #1C1A17; font-weight: 500;">Our guarantee</b>
    </div>

    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">TRANSPARENCY & TRUST</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 12px; color: #1C1A17;">Our guarantee</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 720px; margin: 0 auto; line-height: 1.8;">
        Gemstones are small and valuable, so like most gem dealers we do not take returns. Instead we make sure you know exactly what you are buying before you pay, and we stand behind every stone we send.
      </p>
    </div>

    <div style="display: flex; flex-direction: column; gap: 28px;">

      <!-- 1. Before you buy -->
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px;">
        <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">INSPECTION</span>
        <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 8px 0 16px; color: #1C1A17;">Before you buy</h2>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 1.8; color: #4A4640; display: flex; flex-direction: column; gap: 10px;">
          <li style="border-left: 2px solid #9C7C4C; padding-left: 14px;">Every product page shows the real lot, photographed on white in daylight.</li>
          <li style="border-left: 2px solid #9C7C4C; padding-left: 14px;">Ask us on WhatsApp for live photos or a video of the exact stones you will receive. We send them gladly, for any order size.</li>
          <li style="border-left: 2px solid #9C7C4C; padding-left: 14px;">Not sure about a size or colour match? Book a short video call and we will show you the stones under the lamp and the loupe.</li>
        </ul>
      </div>

      <!-- 2. What we promise -->
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px;">
        <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">COMMITMENT</span>
        <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 8px 0 16px; color: #1C1A17;">What we promise</h2>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 1.8; color: #4A4640; display: flex; flex-direction: column; gap: 10px;">
          <li>◈ The stones you receive are the stones you saw: same lot, same quality, same sizes.</li>
          <li>◈ Natural stones only, with treatments stated on the product page.</li>
          <li>◈ A laboratory certificate on request for any stone, before it ships.</li>
          <li>◈ Every parcel insured door to door.</li>
        </ul>
      </div>

      <!-- 3. If something is wrong -->
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px;">
        <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #1E9E52; text-transform: uppercase;">CLAIMS</span>
        <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 8px 0 16px; color: #1C1A17;">If something is wrong</h2>
        <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0;">
          If a stone arrives damaged, or is not what the product page and our photos showed, tell us within 48 hours of delivery with photos. We will replace it, or refund you in full including shipping. That is the one case where stones come back to us, and we arrange and pay for the courier pickup.
        </p>
      </div>

      <!-- 4. No returns otherwise & Cancelling -->
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px;">
        <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 0 0 14px; color: #1C1A17;">No returns otherwise</h2>
        <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin-bottom: 20px;">
          We do not accept returns or exchanges for change of mind, for stones that have been removed from their sealed packet, set, drilled, cut or worn, or for layouts, custom sizes and made-to-order jewelry. Please ask every question before you order; we are happy to answer them all.
        </p>

        <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 18px; margin: 0 0 10px; color: #1C1A17;">Cancelling an order</h3>
        <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0;">
          You can cancel an order for a full refund at any time before it is dispatched. Message us on WhatsApp with your order number.
        </p>
      </div>

      <!-- Action -->
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 28px; text-align: center;">
        <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I have a question about a stone before ordering.'); ?>" target="_blank" class="btn-square-dark" style="display: inline-block; padding: 14px 28px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
          ASK US ON WHATSAPP →
        </a>
      </div>

    </div>

  </div>
</div>

<?php
get_footer('shop');
