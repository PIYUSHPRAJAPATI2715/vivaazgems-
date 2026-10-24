<?php
/**
 * Template Name: Bead Strand Detail Page
 * Vivaaz Gems - Single Bead Strand Detail Template (§6 Master Specification)
 */

defined('ABSPATH') || exit;

get_header('shop');

$bead_name  = isset($_GET['name']) ? sanitize_text_field($_GET['name']) : 'Amethyst Faceted Rondelle Beads 4 mm';
$bead_stone = isset($_GET['stone']) ? sanitize_text_field($_GET['stone']) : 'Amethyst';
$bead_shape = isset($_GET['shape']) ? sanitize_text_field($_GET['shape']) : 'Faceted rondelle';
$bead_size  = isset($_GET['size']) ? sanitize_text_field($_GET['size']) : '4 mm';
$bead_len   = isset($_GET['len']) ? sanitize_text_field($_GET['len']) : '16 in (about 40 cm)';
$bead_hole  = isset($_GET['hole']) ? sanitize_text_field($_GET['hole']) : '0.8 mm';
$bead_price = isset($_GET['price']) ? intval($_GET['price']) : 760;
$bead_count = isset($_GET['count']) ? sanitize_text_field($_GET['count']) : 'about 110 beads';
?>

<div class="wrap" style="padding-top: 24px; padding-bottom: 72px;">

  <!-- Breadcrumbs -->
  <div class="crumb" style="font-size: 12.5px; color: #9A9186; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a>
    <span>›</span>
    <a href="<?php echo esc_url(home_url('/beads/')); ?>" style="color: inherit; text-decoration: none;">Beads</a>
    <span>›</span>
    <b style="color: #1C1A17; font-weight: 500;"><?php echo esc_html($bead_name); ?></b>
  </div>

  <div class="pd pd2g" style="display: grid; grid-template-columns: minmax(0, 1.1fr) minmax(0, 1fr); gap: 48px; align-items: start;">
    
    <!-- Gallery -->
    <div class="q1">
      <div style="aspect-ratio: 1/1; background: #F6F4F0; border: 1px solid var(--line, #EFE9E0); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; padding: 30px;">
        <?php 
        if (function_exists('vivaaz_render_strand_svg')) {
          echo vivaaz_render_strand_svg($bead_shape, '#6a329f', 320);
        } else {
          echo '<img src="' . esc_url(vivaaz_get_img_url('emerald.jpg')) . '" alt="' . esc_attr($bead_name) . '" style="width:75%;object-fit:contain;">';
        }
        ?>
        <span class="tag" style="position: absolute; left: 16px; top: 16px; background: #1C1A17; color: #FFFFFF; font-size: 10px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">
          FULL STRAND
        </span>
      </div>
      <p style="font-size: 12px; color: #76706A; margin: 10px 0 0;">
        Drilled, strung and calibrated in Jaipur. Every bead inspected by hand.
      </p>
    </div>

    <!-- Details -->
    <div class="q2">
      <span class="cap" style="font-size: 10.5px; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: #9B7C4E;">
        NATURAL GEMSTONE STRAND
      </span>
      <h1 class="h1" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 36px; font-weight: 400; color: #1C1A17; margin: 8px 0 12px; line-height: 1.2;">
        <?php echo esc_html($bead_name); ?>
      </h1>
      <p style="font-size: 15px; color: #76706A; line-height: 1.6; margin: 0 0 20px;">
        Hand-cut and polished in Jaipur. Beautiful luster, clean standard center hole (<?php echo esc_html($bead_hole); ?>) ready for jewelry stringing, wire wrapping or threading.
      </p>

      <div class="price" style="font-size: 28px; font-weight: 600; color: #1C1A17; margin-bottom: 24px;">
        ₹ <?php echo number_format($bead_price); ?> <span style="font-size: 14px; font-weight: 400; color: #76706A;">per strand</span>
      </div>

      <!-- Action buttons -->
      <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 28px;">
        <button type="button" class="btn" onclick="if(typeof addProductToCartAndOpenDrawer==='function'){addProductToCartAndOpenDrawer(2, '<?php echo esc_js($bead_name); ?>', '<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>', '₹ <?php echo number_format($bead_price); ?>', '<?php echo esc_js($bead_size); ?> Strand', 1);}else{openCartDrawer();}" style="padding: 14px 28px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; border: 1px solid #1C1A17; cursor: pointer;">
          ADD STRAND TO CART
        </button>
        
        <a href="https://wa.me/919680552270?text=<?php echo urlencode('Hello Vivaaz Gems, I would like to order beads: ' . $bead_name); ?>" target="_blank" class="btn wa" style="padding: 14px 24px; background: #1E9E52; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
          <svg class="i" style="width: 17px; height: 17px; fill: #fff;" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
          ASK ON WHATSAPP
        </a>
      </div>

      <!-- Specs Box -->
      <div style="background: #FFFFFF; border: 1px solid var(--line, #EFE9E0); padding: 22px;">
        <h4 style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 20px; font-weight: 400; margin: 0 0 14px; color: #1C1A17;">Strand Specifications</h4>
        <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px;">
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; text-transform: uppercase;">BEAD SIZE</span>
            <b><?php echo esc_html($bead_size); ?></b>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; text-transform: uppercase;">STRAND LENGTH</span>
            <span><?php echo esc_html($bead_len); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; text-transform: uppercase;">BEAD COUNT</span>
            <span><?php echo esc_html($bead_count); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; text-transform: uppercase;">HOLE SIZE</span>
            <span><?php echo esc_html($bead_hole); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; text-transform: uppercase;">QUALITY</span>
            <span>AAA Jaipur Standard</span>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

<?php
get_footer('shop');
