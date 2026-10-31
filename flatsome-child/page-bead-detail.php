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

      <!-- Strand Length & Tier Pricing Options (Point 47 Spec) -->
      <div style="margin-bottom: 20px;">
        <span style="font-size: 10.5px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; color: #9B7C4E; display: block; margin-bottom: 8px;">STRAND LENGTH</span>
        <div class="chips" style="display: flex; gap: 8px; flex-wrap: wrap;">
          <button type="button" class="chip" onclick="selectBeadStrandLength('8 in', 0.55, this)">8 in (Half strand)</button>
          <button type="button" class="chip" onclick="selectBeadStrandLength('13 in', 0.85, this)">13 in (Choker)</button>
          <button type="button" class="chip on" onclick="selectBeadStrandLength('16 in', 1.0, this)">16 in (Standard strand)</button>
        </div>
      </div>

      <div style="background: #FAF7F2; border: 1px solid var(--line, #EFE9E0); padding: 12px 16px; margin-bottom: 22px; font-size: 12.5px;">
        <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #EAE5DE; padding-bottom: 4px; font-weight: 600;">
          <span>Quantity</span>
          <span>Price per strand</span>
        </div>
        <div style="display: flex; justify-content: space-between; padding: 4px 0;">
          <span>1–4 strands</span>
          <span id="tier-1-price">₹ <?php echo number_format($bead_price); ?></span>
        </div>
        <div style="display: flex; justify-content: space-between; padding: 4px 0; color: #1E9E52;">
          <span>5–9 strands (save 10%)</span>
          <span id="tier-5-price">₹ <?php echo number_format(round($bead_price * 0.9)); ?></span>
        </div>
        <div style="display: flex; justify-content: space-between; padding: 4px 0; color: #1E9E52;">
          <span>10+ strands (save 20%)</span>
          <span id="tier-10-price">₹ <?php echo number_format(round($bead_price * 0.8)); ?></span>
        </div>
      </div>

      <!-- Action buttons -->
      <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 28px;">
        <button type="button" class="btn" onclick="if(typeof addProductToCartAndOpenDrawer==='function'){addProductToCartAndOpenDrawer(2, '<?php echo esc_js($bead_name); ?>', '<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>', '\u20B9 <?php echo number_format($bead_price); ?>', '<?php echo esc_js($bead_size); ?> Strand', 1);}else{openCartDrawer();}" style="padding: 14px 28px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; border: 1px solid #1C1A17; cursor: pointer;">
          ADD STRAND TO CART
        </button>
        
        <a href="https://wa.me/919680552270?text=<?php echo urlencode('Hello Vivaaz Gems, I would like to order beads: ' . $bead_name); ?>" target="_blank" class="btn wa" style="padding: 14px 24px; background: #1E9E52; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
          <svg class="i" style="width: 17px; height: 17px; fill: #fff;" viewBox="0 0 24 24"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm0 1.67c2.2 0 4.26.86 5.82 2.42a8.17 8.17 0 0 1 2.41 5.82c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.39-4.19-1.15l-.3-.18-3.12.82.83-3.04-.2-.32a8.188 8.188 0 0 1-1.25-4.37c0-4.54 3.7-8.24 8.24-8.24zm-4.71 4.54c-.26 0-.67.1-1.02.48-.35.38-1.35 1.32-1.35 3.22 0 1.9 1.38 3.74 1.57 4 .19.26 2.68 4.25 6.64 5.8.94.37 1.68.59 2.25.77.95.3 1.82.26 2.51.16.77-.12 2.37-.97 2.7-1.9.34-.94.34-1.74.24-1.91-.1-.17-.37-.27-.78-.47-.41-.2-2.43-1.2-2.81-1.34-.38-.14-.65-.2-.93.2-.27.4-.1.06-1.39 1.65-.17.2-.35.23-.76.03-.41-.2-1.73-.64-3.3-2.04-1.22-1.09-2.05-2.43-2.29-2.84-.24-.41-.03-.63.18-.83.18-.18.41-.47.62-.7.2-.24.27-.4.41-.67.14-.27.07-.5-.03-.7-.1-.2-.93-2.24-1.27-3.07-.34-.81-.68-.7-.93-.71z"/></svg>
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


<script>
var _beadBasePrice = <?php echo $bead_price; ?>;
var _currentStrandLen = '16 in (about 40 cm)';
var _currentStrandPrice = _beadBasePrice;

function selectBeadStrandLength(len, multiplier, btn) {
  _currentStrandLen = len;
  _currentStrandPrice = Math.round(_beadBasePrice * multiplier);
  btn.parentElement.querySelectorAll('.chip').forEach(function(c){ c.classList.remove('on'); });
  btn.classList.add('on');
  
  document.querySelector('.price').innerHTML = '₹ ' + _currentStrandPrice.toLocaleString('en-IN') + ' <span style="font-size: 14px; font-weight: 400; color: #76706A;">per strand</span>';
  document.getElementById('tier-1-price').textContent = '₹ ' + _currentStrandPrice.toLocaleString('en-IN');
  document.getElementById('tier-5-price').textContent = '₹ ' + Math.round(_currentStrandPrice * 0.9).toLocaleString('en-IN');
  document.getElementById('tier-10-price').textContent = '₹ ' + Math.round(_currentStrandPrice * 0.8).toLocaleString('en-IN');
}
</script>

<?php
get_footer('shop');
