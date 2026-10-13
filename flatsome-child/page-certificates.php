<?php
/**
 * Template Name: Certificates Page
 * Vivaaz Gems - Certificates
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 900px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">AUTHENTICITY</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 12px; color: #1C1A17;">Certificates</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 720px; margin: 0 auto; line-height: 1.8;">
        A gem laboratory certificate confirms that a stone is natural, names the stone, and states its weight, measurements and any treatment found. We can arrange one for any stone on the site.
      </p>
    </div>

    <div style="display: flex; flex-direction: column; gap: 28px;">

      <!-- How it works (5 steps) -->
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px;">
        <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">PROCESS</span>
        <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 8px 0 20px; color: #1C1A17;">How it works</h2>
        
        <ol style="padding-left: 20px; margin: 0; font-size: 14px; line-height: 1.9; color: #4A4640;">
          <li>Ask on the product page (Lab certificate row) or on WhatsApp, or write it in the order note.</li>
          <li>We confirm the lab, the cost and the time before we send the stone.</li>
          <li>We send the stone to a recognised gem laboratory. It usually takes about a week; we tell you the exact time before we send the stone.</li>
          <li>The certificate cost is added to the order and shown before you pay. It depends on the stone and the lab.</li>
          <li>The stone ships with its certificate, and we send you a scan by email.</li>
        </ol>
      </div>

      <!-- Which laboratories -->
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px;">
        <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 0 0 12px; color: #1C1A17;">Which laboratories</h2>
        <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0;">
          We work with recognised gem laboratories in India, and an international laboratory on request for high-value stones. We tell you which laboratory before we send the stone.
        </p>
      </div>

      <!-- Astrology stones -->
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px;">
        <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 0 0 12px; color: #1C1A17;">Astrology stones</h2>
        <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0;">
          Every astrology stone is sold with a certificate included, because customers need to be sure the stone is natural and the weight is right.
        </p>
      </div>

      <!-- Our own description -->
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px;">
        <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 0 0 12px; color: #1C1A17;">Our own description</h2>
        <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0;">
          Every product page carries a passport with the stone name, shape, cut, size, weight, colour, treatment and origin where known. This is our own honest description, written from what we see; a laboratory certificate is the independent confirmation.
        </p>
      </div>

      <!-- CTA -->
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 28px; text-align: center;">
        <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I have a question about getting a lab certificate.'); ?>" target="_blank" class="btn-square-dark" style="display: inline-block; padding: 14px 28px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
          REQUEST A CERTIFICATE ON WHATSAPP →
        </a>
      </div>

    </div>

  </div>
</div>

<?php
get_footer('shop');
