<?php
/**
 * Template Name: Gemstone Beads Page
 * Vivaaz Gems - Gemstone Beads Catalog & Guide
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 1000px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">SHOP BEADS</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 14px; color: #1C1A17;">Gemstone beads</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 780px; margin: 0 auto; line-height: 1.8;">
        Natural gemstone beads, by the strand or as loose pieces, drilled and matched in Jaipur. Choose by stone, then shape and size. Every strand shows its length, about how many beads it holds and the hole size.
      </p>
    </div>

    <!-- Beads by Shape Grid -->
    <div style="margin-bottom: 40px;">
      <div style="text-align: center; margin-bottom: 24px;">
        <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">BEAD SHAPES</span>
        <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 24px; margin: 6px 0 0; color: #1C1A17;">Beads, by shape</h2>
      </div>

      <div style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 14px; text-align: center;">
        <?php
        $shapes = array('Round', 'Rondelle', 'Faceted rondelle', 'Nugget', 'Chips', 'Heishi');
        foreach ($shapes as $shape) :
        ?>
        <a href="<?php echo esc_url(home_url('/shop/?shape=' . sanitize_title($shape))); ?>" style="display: block; background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px 10px; text-decoration: none; color: #1C1A17; transition: border-color 0.2s;">
          <div style="font-size: 24px; margin-bottom: 8px;">📿</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase;"><?php echo esc_html($shape); ?></div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Bead Specifications Card -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px; margin-bottom: 32px;">
      <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">QUALITY & DETAILS</span>
      <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 8px 0 16px; color: #1C1A17;">On every bead card and product page</h2>
      
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; font-size: 13px; line-height: 1.8; color: #4A4640;">
        <div style="border-left: 2px solid #9C7C4C; padding-left: 14px;">
          <strong>Strand Length:</strong> Usually 13 to 16 inches, clearly stated per product.
        </div>
        <div style="border-left: 2px solid #9C7C4C; padding-left: 14px;">
          <strong>Bead Count:</strong> Approximate number of beads per strand so you can calculate your jewelry designs.
        </div>
        <div style="border-left: 2px solid #9C7C4C; padding-left: 14px;">
          <strong>Hole Size:</strong> Standard 0.4 to 0.8 mm drilling to fit common beading wires and silk threads.
        </div>
        <div style="border-left: 2px solid #9C7C4C; padding-left: 14px;">
          <strong>Grading:</strong> AAA, AA, or Commercial quality with real photos of the lot.
        </div>
      </div>
    </div>

    <!-- CTA -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 28px; text-align: center;">
      <a href="<?php echo esc_url(home_url('/shop/?category=beads')); ?>" class="btn-square-dark" style="display: inline-block; padding: 14px 28px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
        VIEW ALL BEADS IN SHOP →
      </a>
    </div>

  </div>
</div>

<?php
get_footer('shop');
