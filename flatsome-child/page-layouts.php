<?php
/**
 * Template Name: Layouts Page
 * Vivaaz Gems - Layouts, Matched Stone by Stone
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 1000px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">FOR JEWELLERS</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 14px; color: #1C1A17;">Layouts, matched stone by stone</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 780px; margin: 0 auto; line-height: 1.8;">
        Graduated lines and matched sets in ruby, spinel, blue topaz and other stones, sorted and colour-matched in Jaipur so a jeweller can set them straight away. Every layout is photographed as one set; some have a price, others are quoted.
      </p>
    </div>

    <!-- What a layout is -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 32px; margin-bottom: 32px;">
      <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">DEFINITION</span>
      <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 8px 0 12px; color: #1C1A17;">What a layout is</h2>
      <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0;">
        A set of stones chosen to sit together: a necklace line, a bracelet line, an earring pair or a three-stone set. Sizes step evenly and colours match across the whole set.
      </p>
    </div>

    <!-- 4-Step Process Strip -->
    <div style="margin-bottom: 40px;">
      <div style="text-align: center; margin-bottom: 24px;">
        <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">WORKFLOW</span>
        <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 24px; margin: 6px 0 0; color: #1C1A17;">How it works</h2>
      </div>

      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px;">
        <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px 16px; text-align: center;">
          <div style="font-size: 22px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">1</div>
          <div style="font-size: 13px; font-weight: 700; text-transform: uppercase; margin-bottom: 8px;">Choose or send</div>
          <div style="font-size: 12px; color: #76706A; line-height: 1.6;">Pick a layout here, or send us your design or your stone.</div>
        </div>

        <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px 16px; text-align: center;">
          <div style="font-size: 22px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">2</div>
          <div style="font-size: 13px; font-weight: 700; text-transform: uppercase; margin-bottom: 8px;">We match</div>
          <div style="font-size: 12px; color: #76706A; line-height: 1.6;">Sorted by colour, size and clarity, laid out and photographed.</div>
        </div>

        <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px 16px; text-align: center;">
          <div style="font-size: 22px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">3</div>
          <div style="font-size: 13px; font-weight: 700; text-transform: uppercase; margin-bottom: 8px;">You approve</div>
          <div style="font-size: 12px; color: #76706A; line-height: 1.6;">Photos and a video on WhatsApp before we pack.</div>
        </div>

        <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px 16px; text-align: center;">
          <div style="font-size: 22px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">4</div>
          <div style="font-size: 13px; font-weight: 700; text-transform: uppercase; margin-bottom: 8px;">Insured delivery</div>
          <div style="font-size: 12px; color: #76706A; line-height: 1.6;">Repeat orders of the same layout on request.</div>
        </div>
      </div>
    </div>

    <!-- Matching Box (Anchor #match) -->
    <div id="match" style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 40px; margin-bottom: 32px;">
      <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">CUSTOM MATCHING DESK</span>
      <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 26px; margin: 8px 0 12px; color: #1C1A17;">Have a stone or a design? We match it.</h3>
      <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin-bottom: 24px;">
        Send a photo and the size of your stone, or your design. We match it from our stock in Jaipur or Bangkok and send you photos of the set before you decide.
      </p>

      <form action="https://wa.me/919680552270" method="get" target="_blank" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Stone *</label>
          <input type="text" name="stone" required placeholder="e.g. Ruby, Blue Sapphire, Spinel" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Shape and size *</label>
          <input type="text" name="shape_size" required placeholder="e.g. Oval graduated 4x6 to 8x10 mm" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Number of stones or length</label>
          <input type="text" name="count" placeholder="e.g. 17 stones or 16-inch line" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Your WhatsApp *</label>
          <input type="tel" name="phone" required placeholder="+91 98765 43210" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div style="grid-column: 1 / -1;">
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Notes or CAD details</label>
          <textarea name="notes" rows="3" placeholder="Tell us about the project, deadlines, or attach your drawing on WhatsApp..." style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;"></textarea>
        </div>

        <div style="grid-column: 1 / -1; display: flex; gap: 12px; margin-top: 8px;">
          <button type="submit" class="btn-square-dark" style="flex: 1; padding: 15px; background: #1C1A17; color: #FFFFFF; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; border: none; cursor: pointer;">
            SEND YOUR DESIGN →
          </button>
          <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello, I have a stone to match. Sending a photo and the size.'); ?>" target="_blank" class="btn-outline-dark" style="flex: 1; padding: 15px; background: #FFFFFF; color: #1C1A17; border: 1px solid #1C1A17; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; text-align: center; text-decoration: none;">
            MATCH MY STONE →
          </a>
        </div>
      </form>
    </div>

  </div>
</div>

<?php
get_footer('shop');
