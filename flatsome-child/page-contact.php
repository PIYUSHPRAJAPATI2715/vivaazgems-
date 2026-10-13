<?php
/**
 * Template Name: Contact Page
 * Vivaaz Gems - Contact Page
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-contact-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 1100px; margin: 0 auto;">
    
    <!-- Header -->
    <div class="contact-header" style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">CONTACT</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 12px; color: #1C1A17;">Talk to us.</h1>
      <p style="font-size: 15px; color: #76706A; max-width: 680px; margin: 0 auto;">
        The fastest way to reach us is WhatsApp. We reply quickly during office hours, and we are happy to send live photos and videos of any stone.
      </p>
    </div>

    <!-- WhatsApp Hero Button -->
    <div style="text-align: center; margin-bottom: 40px;">
      <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I would like to inquire about stones.'); ?>" target="_blank" class="btn-whatsapp-green-full" style="display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 16px 36px; background: #25D366; color: #FFFFFF; text-decoration: none; font-size: 13px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; border-radius: 0;">
        <span>💬</span> CHAT ON WHATSAPP (+91 96805 52270)
      </a>
    </div>

    <!-- 2 Column Layout: Office Details (Left) + Form (Right) -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px; margin-bottom: 48px;">
      
      <!-- Left Column: 3 Offices -->
      <div style="display: flex; flex-direction: column; gap: 20px;">
        
        <!-- Office 1: Johari Bazar -->
        <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 28px;">
          <div style="font-size: 10px; font-weight: 700; letter-spacing: 0.12em; color: #9C7C4C; text-transform: uppercase; margin-bottom: 6px;">MAIN OFFICE</div>
          <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 400; margin: 0 0 10px; color: #1C1A17;">Vivaaz Gems, Jaipur · Johari Bazar</h3>
          <p style="font-size: 13px; line-height: 1.7; color: #4A4640; margin-bottom: 12px;">
            307 Navratna Complex, KGB Ka Rasta, Johari Bazar, Jaipur, Rajasthan 302003, India
          </p>
          <div style="font-size: 12px; color: #76706A; line-height: 1.8;">
            <div><strong>WhatsApp and phone:</strong> +91 96805 52270</div>
            <div><strong>Email:</strong> vivaazgems@gmail.com</div>
            <div><strong>Office hours:</strong> Monday to Saturday, 10:30 to 19:00 (IST). Closed on Sundays and public holidays.</div>
          </div>
        </div>

        <!-- Office 2: Adarsh Nagar -->
        <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 28px;">
          <div style="font-size: 10px; font-weight: 700; letter-spacing: 0.12em; color: #9C7C4C; text-transform: uppercase; margin-bottom: 6px;">JAIPUR STUDIO</div>
          <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 400; margin: 0 0 10px; color: #1C1A17;">Vivaaz Gems, Jaipur · Adarsh Nagar</h3>
          <p style="font-size: 13px; line-height: 1.7; color: #4A4640; margin-bottom: 8px;">
            B-207, Janta Colony, Adarsh Nagar, Jaipur, Rajasthan 302004, India
          </p>
          <div style="font-size: 12px; color: #76706A;">Visits by appointment.</div>
        </div>

        <!-- Office 3: Bangkok -->
        <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 28px;">
          <div style="font-size: 10px; font-weight: 700; letter-spacing: 0.12em; color: #9C7C4C; text-transform: uppercase; margin-bottom: 6px;">SOURCING & TRADE</div>
          <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 400; margin: 0 0 10px; color: #1C1A17;">Ruby Center (Thailand), Bangkok</h3>
          <p style="font-size: 13px; line-height: 1.7; color: #4A4640; margin-bottom: 8px;">
            Ruby Center (Thailand) Co., Ltd., 1249/84 Gems Tower, 9th Floor, Charoenkrung Rd., Soi 47/3 Surawong, Bangrak, Bangkok 10500, Thailand
          </p>
          <div style="font-size: 12px; color: #76706A;">Our Bangkok office for sourcing and trade customers. Visits by appointment.</div>
        </div>

        <!-- Visit Us Note -->
        <div style="background: #FAF7F2; border: 1px dashed #9C7C4C; padding: 18px; font-size: 12px; line-height: 1.7; color: #4A4640;">
          <strong>Visit us:</strong> You are welcome at our Jaipur offices to see stones in person. Please message us first on WhatsApp so we can keep the stones you want to see ready for you.
        </div>

      </div>

      <!-- Right Column: Message Form -->
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px;">
        <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 24px; font-weight: 400; margin: 0 0 8px; color: #1C1A17;">Send us a message</h3>
        <p style="font-size: 12px; color: #76706A; margin-bottom: 24px;">Free to ask. We reply quickly by email or WhatsApp.</p>

        <form action="https://wa.me/919680552270" method="get" target="_blank" style="display: flex; flex-direction: column; gap: 16px;">
          <div>
            <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #1C1A17; margin-bottom: 6px;">Name <span style="color: #9C7C4C;">*</span></label>
            <input type="text" name="name" required placeholder="Your full name" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
          </div>

          <div>
            <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #1C1A17; margin-bottom: 6px;">Email <span style="color: #9C7C4C;">*</span></label>
            <input type="email" name="email" required placeholder="your.email@example.com" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
          </div>

          <div>
            <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #1C1A17; margin-bottom: 6px;">WhatsApp number (with country code)</label>
            <input type="tel" name="phone" placeholder="+91 98765 43210" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
          </div>

          <div>
            <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #1C1A17; margin-bottom: 6px;">I am a</label>
            <select name="type" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
              <option value="Jeweller">Jeweller</option>
              <option value="Designer">Designer</option>
              <option value="Collector">Collector</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <div>
            <label style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #1C1A17; margin-bottom: 6px;">Message <span style="color: #9C7C4C;">*</span></label>
            <textarea name="text" rows="4" required placeholder="Tell us what stones, shapes, or sizes you are looking for..." style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;"></textarea>
          </div>

          <button type="submit" class="btn-square-dark" style="width: 100%; padding: 15px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; border: none; cursor: pointer;">
            SEND MESSAGE →
          </button>
        </form>
      </div>

    </div>

    <!-- Quick Links Under the Page (Word Spec) -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px; text-align: center;">
      <div style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #76706A; margin-bottom: 12px;">HELPFUL LINKS</div>
      <div style="display: flex; justify-content: center; gap: 24px; flex-wrap: wrap; font-size: 13px;">
        <a href="<?php echo esc_url(home_url('/track-order/')); ?>" style="color: #9C7C4C; text-decoration: underline;">Track your order →</a>
        <a href="<?php echo esc_url(home_url('/shipping/')); ?>" style="color: #9C7C4C; text-decoration: underline;">Shipping and export →</a>
        <a href="<?php echo esc_url(home_url('/bulk-enquiry/')); ?>" style="color: #9C7C4C; text-decoration: underline;">Bulk / B2B enquiry →</a>
        <a href="<?php echo esc_url(home_url('/faq/')); ?>" style="color: #9C7C4C; text-decoration: underline;">Frequently asked questions →</a>
      </div>
    </div>

  </div>
</div>

<?php
get_footer('shop');
