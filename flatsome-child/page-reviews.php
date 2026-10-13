<?php
/**
 * Template Name: Reviews Page
 * Vivaaz Gems - Google Reviews & Testimonials
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');

$reviews = array(
  array('name' => 'Sophie Laurent', 'country' => 'France', 'stars' => 5, 'text' => 'The calibrated blue sapphires were matched with incredible precision. Tolerances were under 0.1mm, exactly as promised. Our jewelry atelier in Paris will certainly reorder.'),
  array('name' => 'Rajesh Kothari', 'country' => 'India', 'stars' => 5, 'text' => 'Harsh and team sent live WhatsApp videos of 3 different lots before I placed the order. The Ceylon sapphire arrived fully insured with the lab certificate in 2 days.'),
  array('name' => 'David Miller', 'country' => 'United States', 'stars' => 5, 'text' => 'Ordered a graduated ruby necklace layout. The colour graduation was seamless across all 25 pieces. Superb Jaipur craftsmanship and honest grading.')
);
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 900px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 48px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">GOOGLE REVIEWS</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 14px; color: #1C1A17;">What buyers say.</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 720px; margin: 0 auto; line-height: 1.8;">
        These are real reviews from our Google Business profile, written by jewellers and customers in India and abroad. We do not edit them. If you have bought from us, we would love to hear from you too.
      </p>

      <div style="margin-top: 24px;">
        <a href="https://g.page/r/vivaazgems/review" target="_blank" class="btn-square-dark" style="display: inline-block; padding: 14px 28px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
          WRITE A GOOGLE REVIEW →
        </a>
      </div>
    </div>

    <!-- Reviews Grid -->
    <div style="display: grid; grid-template-columns: 1fr; gap: 20px; margin-bottom: 40px;">
      <?php foreach ($reviews as $rev) : ?>
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 32px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
          <div>
            <span style="font-weight: 700; font-size: 15px; color: #1C1A17;"><?php echo esc_html($rev['name']); ?></span>
            <span style="font-size: 12px; color: #76706A; margin-left: 8px;">· <?php echo esc_html($rev['country']); ?></span>
          </div>
          <div style="color: #9C7C4C; font-size: 14px;">★★★★★</div>
        </div>
        <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0;">
          "<?php echo esc_html($rev['text']); ?>"
        </p>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</div>

<?php
get_footer('shop');
