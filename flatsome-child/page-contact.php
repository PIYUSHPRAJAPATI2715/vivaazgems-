<?php
/**
 * Template Name: Contact Page
 * Vivaaz Gems - Contact Page matching Client PDF Spec (Page 19)
 */
get_header();
?>

<div class="contact-page-wrapper" style="padding: 60px 40px; background: var(--color-page-bg);">
  <div style="max-width: 1000px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider">GET IN TOUCH</span>
      <h1 class="font-serif" style="font-size: 38px; font-weight: 400; margin-top: 8px;">Contact <span class="font-italic text-gold">Vivaaz Gems</span></h1>
      <p class="text-muted" style="font-size: 14px;">We usually respond within a few minutes on WhatsApp.</p>
    </div>

    <!-- Big WhatsApp Button -->
    <div style="text-align: center; margin-bottom: 40px;">
      <a href="https://wa.me/919680552270" target="_blank" class="btn-whatsapp-green-full" style="max-width: 480px; margin: 0 auto; padding: 18px; font-size: 14px;">
        <span>💬</span> CHAT WITH US ON WHATSAPP (+91 96805 52270)
      </a>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
      
      <!-- Short Form -->
      <div style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 30px;">
        <h3 class="font-serif" style="font-size: 20px; margin-bottom: 20px;">Send a Message</h3>
        
        <form action="#" method="post" style="display: flex; flex-direction: column; gap: 16px;">
          <div>
            <label style="font-size: 11px; font-weight: 700; text-transform: uppercase;">Full Name *</label>
            <input type="text" required style="width: 100%; padding: 10px; border: 1px solid var(--color-border-light); margin-top: 4px; outline: none;" placeholder="Enter your full name">
          </div>

          <div>
            <label style="font-size: 11px; font-weight: 700; text-transform: uppercase;">Email Address *</label>
            <input type="email" required style="width: 100%; padding: 10px; border: 1px solid var(--color-border-light); margin-top: 4px; outline: none;" placeholder="Enter your email">
          </div>

          <div>
            <label style="font-size: 11px; font-weight: 700; text-transform: uppercase;">Phone Number</label>
            <input type="tel" style="width: 100%; padding: 10px; border: 1px solid var(--color-border-light); margin-top: 4px; outline: none;" placeholder="Enter phone number">
          </div>

          <div>
            <label style="font-size: 11px; font-weight: 700; text-transform: uppercase;">I am a *</label>
            <select style="width: 100%; padding: 10px; border: 1px solid var(--color-border-light); margin-top: 4px; outline: none;">
              <option value="customer">Customer (Buying for personal use)</option>
              <option value="jeweler">Jeweler / Designer</option>
              <option value="trade">Trade / Wholesale Buyer</option>
            </select>
          </div>

          <div>
            <label style="font-size: 11px; font-weight: 700; text-transform: uppercase;">Message *</label>
            <textarea required rows="4" style="width: 100%; padding: 10px; border: 1px solid var(--color-border-light); margin-top: 4px; outline: none;" placeholder="Tell us about the stones or sizes you need..."></textarea>
          </div>

          <button type="submit" class="btn-square-dark" style="width: 100%; padding: 14px;">SEND MESSAGE →</button>
        </form>
      </div>

      <!-- Address & Office Info -->
      <div style="display: flex; flex-direction: column; gap: 20px;">
        <div style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 30px;">
          <h3 class="font-serif" style="font-size: 20px; margin-bottom: 12px;">Jaipur Office (Main)</h3>
          <p style="font-size: 13px; color: var(--color-text-muted); line-height: 1.8;">
            <strong>Vivaaz Gems & Jewellery</strong><br>
            307 Navratna Complex, Johari Bazar, Jaipur, Rajasthan 302003, India<br>
            <strong>Phone / WhatsApp:</strong> +91 96805 52270<br>
            <strong>Email:</strong> vivaazgems@gmail.com<br>
            <strong>Hours:</strong> Mon – Sat: 10:00 AM – 7:00 PM IST
          </p>
        </div>

        <div style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 30px;">
          <h3 class="font-serif" style="font-size: 20px; margin-bottom: 12px;">Bangkok Office</h3>
          <p style="font-size: 13px; color: var(--color-text-muted); line-height: 1.8;">
            <strong>Vivaaz Gems Thailand</strong><br>
            Ruby Center, Silom Road, Bangkok, Thailand<br>
            <strong>Hours:</strong> Mon – Fri: 10:00 AM – 6:00 PM ICT
          </p>
        </div>
      </div>

    </div>

  </div>
</div>

<?php
get_footer();
