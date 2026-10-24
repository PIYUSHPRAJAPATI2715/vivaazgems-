<?php
/**
 * Template Name: Make It Into Jewelry Page
 * Vivaaz Gems - Make It Into Jewelry Service
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 860px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">CUSTOM SETTING WORKSHOP</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 14px; color: #1C1A17;">Make it into jewelry</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 740px; margin: 0 auto; line-height: 1.8;">
        Like a stone but want it ready to wear? Choose any stone from our shop and we set it in a ring, pendant or earrings, in 925 silver, 14K or 18K gold, with our trusted jewelry workshop. Perfect for astrology stones after a consultation, for a gift, or for your own design.
      </p>
    </div>

    <!-- How it works (4 steps) -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px; margin-bottom: 40px;">
      <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 0 0 20px; color: #1C1A17;">How it works</h2>
      <ol style="padding-left: 20px; margin: 0; font-size: 14px; line-height: 1.9; color: #4A4640;">
        <li>Choose your stone and tell us what you would like: ring, pendant or earrings, silver or gold, simple or with small side stones.</li>
        <li>We send you a sketch or a reference photo and a price.</li>
        <li>Once you approve, the piece is made in about 3 to 4 weeks and shipped insured.</li>
        <li>You receive the finished piece with the stone's details and, if asked, its certificate.</li>
      </ol>
    </div>

    <!-- Quote Request Form -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px; margin-bottom: 32px;">
      <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 0 0 20px; color: #1C1A17;">Tell us about the piece you want</h3>

      <form action="https://wa.me/919680552270" method="get" target="_blank" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Your Name *</label>
          <input type="text" name="name" required placeholder="Your name" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Your WhatsApp *</label>
          <input type="tel" name="phone" required placeholder="+91 98765 43210" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Stone or Product Code</label>
          <input type="text" name="stone_code" placeholder="e.g. Ceylon Blue Sapphire 7x5 mm or SKU" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Type of Jewelry</label>
          <select name="jewelry_type" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
            <option value="Ring">Ring</option>
            <option value="Pendant">Pendant</option>
            <option value="Earrings">Earrings</option>
            <option value="Bracelet">Bracelet</option>
          </select>
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Metal</label>
          <select name="metal" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
            <option value="925 Silver">925 Silver</option>
            <option value="14K Yellow Gold">14K Yellow Gold</option>
            <option value="14K White Gold">14K White Gold</option>
            <option value="18K Yellow Gold">18K Yellow Gold</option>
            <option value="18K White Gold">18K White Gold</option>
          </select>
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Ring Size or Length</label>
          <input type="text" name="size_length" placeholder="e.g. US 6.5 or 18 inches" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div style="grid-column: 1 / -1;">
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Photo or sketch of design (optional)</label>
          <input type="file" accept="image/*" style="width: 100%; padding: 10px 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div style="grid-column: 1 / -1;">
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Notes or Setting Style</label>
          <textarea name="notes" rows="3" placeholder="e.g. Solitaire bezel setting, open back for astrology, minimal prong..." style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;"></textarea>
        </div>

        <div style="grid-column: 1 / -1; margin-top: 8px;">
          <button type="submit" class="btn-square-dark" style="width: 100%; padding: 15px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; border: none; cursor: pointer;">
            ASK FOR A QUOTE →
          </button>
        </div>
      </form>
    </div>

  </div>
</div>

<?php
get_footer('shop');
