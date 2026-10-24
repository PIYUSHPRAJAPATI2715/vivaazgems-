<?php
/**
 * Template Name: Bulk and B2B Enquiry Page
 * Vivaaz Gems - Bulk and B2B Enquiries
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 900px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">THE TRADE</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 14px; color: #1C1A17;">Bulk and B2B enquiries</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 760px; margin: 0 auto; line-height: 1.8;">
        We supply jewellers, manufacturers and designers in India and abroad: calibrated lots in regular sizes, reserved stock for production, layouts matched to your designs and stones sourced to order from Jaipur and Bangkok.
      </p>
    </div>

    <!-- What we can do for you -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px; margin-bottom: 32px;">
      <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">TRADE CAPABILITIES</span>
      <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 8px 0 16px; color: #1C1A17;">What we can do for you</h2>
      
      <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 1.8; color: #4A4640; display: flex; flex-direction: column; gap: 10px;">
        <li>◈ Regular sizes kept in stock and reserved for your production.</li>
        <li>◈ Larger quantities at trade prices, quoted per enquiry.</li>
        <li>◈ Layouts and matched sets made to a drawing or CAD, with photos before dispatch.</li>
        <li>◈ Sourcing of specific stones, colours and sizes through our Jaipur and Bangkok offices.</li>
        <li>◈ Certificates and export paperwork handled for you.</li>
      </ul>

      <div style="margin-top: 20px; padding-top: 16px; border-top: 1px solid #EBE7DF; font-size: 13px; color: #76706A;">
        Trade pricing is discussed directly, on WhatsApp, by phone or in person in Jaipur. We do not publish a trade price list.
      </div>
    </div>

    <!-- Trade Enquiry Form -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px; margin-bottom: 32px;">
      <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 24px; margin: 0 0 20px; color: #1C1A17;">Trade Enquiry Form</h3>

      <form action="https://wa.me/919680552270" method="get" target="_blank" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Name *</label>
          <input type="text" name="name" required placeholder="Your full name" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">WhatsApp Number *</label>
          <input type="tel" name="phone" required placeholder="+91 98765 43210" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Company Name</label>
          <input type="text" name="company" placeholder="Your brand or studio" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Email</label>
          <input type="email" name="email" placeholder="you@company.com" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div style="grid-column: 1 / -1;">
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Country</label>
          <input type="text" name="country" placeholder="e.g. India, United States, United Kingdom" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div style="grid-column: 1 / -1;">
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Photo or specification file (optional)</label>
          <input type="file" accept="image/*,.pdf" style="width: 100%; padding: 10px 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div style="grid-column: 1 / -1;">
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">What do you need? (Stone, shape, size, quantity)</label>
          <textarea name="text" rows="4" placeholder="Describe your required gemstones, calibrated dimensions, estimated pieces or production timeline..." style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;"></textarea>
        </div>

        <div style="grid-column: 1 / -1; margin-top: 8px;">
          <button type="submit" class="btn-square-dark" style="width: 100%; padding: 15px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; border: none; cursor: pointer;">
            SEND ENQUIRY →
          </button>
        </div>
      </form>
    </div>

    <!-- Contact Info -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px; text-align: center; font-size: 13px; color: #4A4640;">
      Prefer to talk? WhatsApp <a href="https://wa.me/919680552270" style="color: #25D366; font-weight: 700; text-decoration: underline;">+91 96805 52270</a>
    </div>

  </div>
</div>

<?php
get_footer('shop');
