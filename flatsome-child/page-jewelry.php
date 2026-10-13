<?php
/**
 * Template Name: Jewelry Page
 * Vivaaz Gems - Jewelry (Made to Order)
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 1000px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">MADE TO ORDER</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 14px; color: #1C1A17;">Jewelry, made for you.</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 780px; margin: 0 auto; line-height: 1.8;">
        Every piece here is made to order with our own natural stones, in 925 silver, 14K or 18K gold. Choose a design you like, tell us the stone, metal and size, and we send you a quote and a making time. Anything can be changed: a different stone, a longer chain, your own idea.
      </p>
    </div>

    <!-- How it works (4 steps) -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px; margin-bottom: 40px;">
      <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">THE PROCESS</span>
      <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 24px; margin: 8px 0 20px; color: #1C1A17;">How it works</h2>

      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; text-align: center;">
        <div style="background: #FAF7F2; padding: 20px 12px;">
          <div style="font-size: 20px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">1</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; margin-bottom: 6px;">Ask for quote</div>
          <div style="font-size: 11px; color: #76706A;">On any design or your idea.</div>
        </div>
        <div style="background: #FAF7F2; padding: 20px 12px;">
          <div style="font-size: 20px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">2</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; margin-bottom: 6px;">Confirm details</div>
          <div style="font-size: 11px; color: #76706A;">Stone, metal, size, price & making time.</div>
        </div>
        <div style="background: #FAF7F2; padding: 20px 12px;">
          <div style="font-size: 20px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">3</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; margin-bottom: 6px;">Crafting</div>
          <div style="font-size: 11px; color: #76706A;">Made in 3–4 weeks with photos before dispatch.</div>
        </div>
        <div style="background: #FAF7F2; padding: 20px 12px;">
          <div style="font-size: 20px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">4</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; margin-bottom: 6px;">Insured delivery</div>
          <div style="font-size: 11px; color: #76706A;">Ships insured with stone passport.</div>
        </div>
      </div>
    </div>

    <!-- Size Guide Card -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 32px; margin-bottom: 40px;">
      <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">SIZE GUIDE</span>
      <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 8px 0 16px; color: #1C1A17;">Standard dimensions & measuring</h3>
      
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; font-size: 13px; line-height: 1.8; color: #4A4640;">
        <div>
          <strong>Bracelet lengths:</strong><br>
          6.5 in (16.5 cm) · 7 in (17.8 cm) · 7.5 in (19 cm)
        </div>
        <div>
          <strong>Necklace lengths:</strong><br>
          16 in (40 cm) · 18 in (45 cm) · 20 in (50 cm)
        </div>
        <div style="grid-column: 1 / -1; border-top: 1px solid #EBE7DF; padding-top: 14px; font-size: 12px; color: #76706A;">
          <strong>How to measure your wrist:</strong> Wrap a strip of paper around it, mark where it meets, measure it and add about 1.5 cm for a comfortable fit. Not sure? Ask us on WhatsApp.
        </div>
      </div>
    </div>

    <!-- Request a Quote Form -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px; margin-bottom: 32px;">
      <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 24px; margin: 0 0 8px; color: #1C1A17;">Request a Jewelry Quote</h3>
      <p style="font-size: 12px; color: #76706A; margin-bottom: 24px;">
        Free to ask · Quick reply on WhatsApp · Free changes before making · No payment until you say yes
      </p>

      <form action="https://wa.me/919680552270" method="get" target="_blank" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Stone Preference</label>
          <input type="text" name="stone" placeholder="e.g. Ruby, Ceylon Sapphire, Emerald" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Metal</label>
          <select name="metal" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
            <option value="925 Silver">925 Silver</option>
            <option value="14K Gold">14K Gold</option>
            <option value="18K Gold">18K Gold</option>
          </select>
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Size or Length</label>
          <input type="text" name="size_length" placeholder="e.g. Ring size US 7 or 18-inch necklace" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Your Name *</label>
          <input type="text" name="name" required placeholder="Your name" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div style="grid-column: 1 / -1;">
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Your WhatsApp Number *</label>
          <input type="tel" name="phone" required placeholder="+91 98765 43210" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div style="grid-column: 1 / -1;">
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Message or changes you want</label>
          <textarea name="text" rows="3" placeholder="Describe the piece or idea you would like us to craft..." style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;"></textarea>
        </div>

        <div style="grid-column: 1 / -1; margin-top: 8px;">
          <button type="submit" class="btn-square-dark" style="width: 100%; padding: 15px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; border: none; cursor: pointer;">
            SEND REQUEST →
          </button>
        </div>
      </form>
    </div>

    <!-- Link to Make It Into Jewelry -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px; text-align: center; font-size: 13px;">
      Want something not shown here? <a href="<?php echo esc_url(home_url('/make-it-into-jewelry/')); ?>" style="color: #9C7C4C; font-weight: 700; text-decoration: underline;">See Make it into jewelry →</a>
    </div>

  </div>
</div>

<?php
get_footer('shop');
