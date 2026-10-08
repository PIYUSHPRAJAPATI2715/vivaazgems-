<?php
/**
 * Template Name: About Us Page
 * Vivaaz Gems - About Us Page matching Client PDF Spec (Page 19)
 */
get_header();
?>

<div class="about-page-wrapper" style="padding: 60px 40px; background: var(--color-page-bg);">
  <div style="max-width: 1000px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider">SINCE 1993 · JAIPUR</span>
      <h1 class="font-serif" style="font-size: 42px; font-weight: 400; margin-top: 8px;">Our <span class="font-italic text-gold">Story</span></h1>
      <p class="text-muted" style="font-size: 15px; max-width: 600px; margin: 10px auto 0;">
        We sell loose gemstones, gemstone beads and jewelry from Jaipur, since 1993.
      </p>
    </div>

    <!-- Big Photo of Jaipur Office -->
    <div style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px; text-align: center; margin-bottom: 40px;">
      <img src="<?php echo esc_url(vivaaz_get_img_url('true-size-grid.jpg')); ?>" alt="Vivaaz Gems Jaipur Office" style="width: 100%; max-height: 480px; object-fit: cover;">
      <div style="font-size: 11px; color: var(--color-text-muted); margin-top: 10px;">Our Jaipur office & master gemstone sorting desk at Johari Bazar</div>
    </div>

    <!-- 3 Short Paragraphs -->
    <div style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 40px; margin-bottom: 40px; font-size: 14px; line-height: 1.8;">
      <h3 class="font-serif" style="font-size: 24px; margin-bottom: 16px;">Handpicked from Sri Lanka to Jaipur</h3>
      <p style="margin-bottom: 16px;">
        Vivaaz Gems began in 2018, built on a family trade in coloured stones that goes back more than three decades. We sort, calibrate and match every lot by hand in Jaipur.
      </p>
      <p style="margin-bottom: 16px;">
        Most customers find us on Instagram and open the website on their phone. We believe in total transparency: clear light photos, lab certificates, and precise millimeter dimensions so you know exactly what you are buying.
      </p>
      <p>
        Whether you are a retail buyer looking for an astrological gemstone or a jewelry manufacturer needing 500 calibrated sapphires, our team in Jaipur and Bangkok is ready to help.
      </p>
    </div>

    <!-- 5-Step Process (Source -> Cut -> Grade & Match -> Certify -> Ship Insured) -->
    <div style="margin-bottom: 40px;">
      <div style="text-align: center; margin-bottom: 24px;">
        <span class="section-tag-divider">HOW WE WORK IN 5 STEPS</span>
        <h2 class="font-serif" style="font-size: 28px;">From mine to your doorstep</h2>
      </div>

      <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px; text-align: center;">
        <div style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 10px;">
          <div style="font-size: 20px; font-weight: 700; color: var(--color-gold-label); margin-bottom: 6px;">1</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase;">Source</div>
          <div style="font-size: 10px; color: var(--color-text-muted); margin-top: 4px;">Directly from Sri Lanka & mines</div>
        </div>

        <div style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 10px;">
          <div style="font-size: 20px; font-weight: 700; color: var(--color-gold-label); margin-bottom: 6px;">2</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase;">Cut</div>
          <div style="font-size: 10px; color: var(--color-text-muted); margin-top: 4px;">Master lapidary cutting in Jaipur</div>
        </div>

        <div style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 10px;">
          <div style="font-size: 20px; font-weight: 700; color: var(--color-gold-label); margin-bottom: 6px;">3</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase;">Grade & Match</div>
          <div style="font-size: 10px; color: var(--color-text-muted); margin-top: 4px;">Sorted by color, clarity & mm size</div>
        </div>

        <div style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 10px;">
          <div style="font-size: 20px; font-weight: 700; color: var(--color-gold-label); margin-bottom: 6px;">4</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase;">Certify</div>
          <div style="font-size: 10px; color: var(--color-text-muted); margin-top: 4px;">Government recognized lab report</div>
        </div>

        <div style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 20px 10px;">
          <div style="font-size: 20px; font-weight: 700; color: var(--color-gold-label); margin-bottom: 6px;">5</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase;">Ship Insured</div>
          <div style="font-size: 10px; color: var(--color-text-muted); margin-top: 4px;">100% insured delivery worldwide</div>
        </div>
      </div>
    </div>

    <!-- Trade Buyers CTA & Office Address -->
    <div style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 30px; display: flex; justify-content: space-between; align-items: center;">
      <div>
        <h4 style="font-size: 16px; font-weight: 600;">Trade & Wholesale Enquiries</h4>
        <p style="font-size: 12px; color: var(--color-text-muted);">307 Navratna Complex, Johari Bazar, Jaipur · WhatsApp +91 96805 52270</p>
      </div>
      <a href="https://wa.me/919680552270" target="_blank" class="btn-square-dark">BULK / B2B ENQUIRY →</a>
    </div>

  </div>
</div>

<?php
get_footer();
