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
          <svg style="width: 16px; height: 16px; fill: #FFFFFF; display: inline-block; vertical-align: middle;" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
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
