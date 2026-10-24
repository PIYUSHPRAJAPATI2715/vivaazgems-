<?php
/**
 * Template Name: Layout Detail Page
 * Vivaaz Gems - Single Layout Detail Template (§6 Master Specification)
 */

defined('ABSPATH') || exit;

get_header('shop');

$layout_name  = isset($_GET['name']) ? sanitize_text_field($_GET['name']) : 'Ruby Graduated Line 45 cm';
$layout_stone = isset($_GET['stone']) ? sanitize_text_field($_GET['stone']) : 'Ruby';
$layout_type  = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : 'Necklace line';
$layout_desc  = isset($_GET['d']) ? sanitize_text_field($_GET['d']) : '39 stones · 2.5 to 4.8 mm · 14.8 ct total';
$layout_price = isset($_GET['price']) ? intval($_GET['price']) : 34800;
$img_name     = strtolower(str_replace(' ', '-', $layout_stone));
$img_url      = vivaaz_get_img_url($img_name . '.jpg');
?>

<div class="wrap" style="padding-top: 24px; padding-bottom: 72px;">

  <!-- Breadcrumbs -->
  <div class="crumb" style="font-size: 12.5px; color: #9A9186; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a>
    <span>›</span>
    <a href="<?php echo esc_url(home_url('/layouts/')); ?>" style="color: inherit; text-decoration: none;">Layouts</a>
    <span>›</span>
    <b style="color: #1C1A17; font-weight: 500;"><?php echo esc_html($layout_name); ?></b>
  </div>

  <div class="pd pd2g" style="display: grid; grid-template-columns: minmax(0, 1.1fr) minmax(0, 1fr); gap: 48px; align-items: start;">
    
    <!-- Gallery -->
    <div class="q1">
      <div style="aspect-ratio: 1/1; background: #F6F4F0; border: 1px solid var(--line, #EFE9E0); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($layout_name); ?>" style="width: 82%; object-fit: contain;">
        <span class="tag" style="position: absolute; left: 16px; top: 16px; background: #1C1A17; color: #FFFFFF; font-size: 10px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">
          CALIBRATED LAYOUT
        </span>
      </div>
      <p style="font-size: 12px; color: #76706A; margin: 10px 0 0;">
        Photos show the exact stones matched together by color, brilliance and graduation.
      </p>
    </div>

    <!-- Details -->
    <div class="q2">
      <span class="cap" style="font-size: 10.5px; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: #9B7C4E;">
        JAIPUR MATCHED LAYOUT
      </span>
      <h1 class="h1" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 36px; font-weight: 400; color: #1C1A17; margin: 8px 0 12px; line-height: 1.2;">
        <?php echo esc_html($layout_name); ?>
      </h1>
      <p style="font-size: 15px; color: #76706A; line-height: 1.6; margin: 0 0 20px;">
        <?php echo esc_html($layout_desc); ?>. Hand-sorted in our Jaipur workshop to ensure seamless color saturation and precise size gradation across the full strand.
      </p>

      <div style="font-size: 28px; font-weight: 600; color: #1C1A17; margin-bottom: 24px;">
        <?php if ($layout_price > 0) : ?>
          ₹ <?php echo number_format($layout_price); ?> <span style="font-size: 14px; font-weight: 400; color: #76706A;">full set</span>
        <?php else : ?>
          Price guide on request
        <?php endif; ?>
      </div>

      <!-- Action buttons -->
      <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 28px;">
        <?php if ($layout_price > 0) : ?>
          <button type="button" class="btn" onclick="if(typeof addProductToCartAndOpenDrawer==='function'){addProductToCartAndOpenDrawer(1, '<?php echo esc_js($layout_name); ?>', '<?php echo esc_url($img_url); ?>', '₹ <?php echo number_format($layout_price); ?>', 'Full Layout', 1);}else{openCartDrawer();}" style="padding: 14px 28px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; border: 1px solid #1C1A17; cursor: pointer;">
            ADD TO CART
          </button>
        <?php endif; ?>
        
        <a href="https://wa.me/919680552270?text=<?php echo urlencode('Hello Vivaaz Gems, I am interested in layout: ' . $layout_name . ' (' . $layout_desc . ')'); ?>" target="_blank" class="btn wa" style="padding: 14px 24px; background: #1E9E52; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
          <svg class="i" style="width: 17px; height: 17px; fill: #fff;" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
          GET MY PRICE ON WHATSAPP
        </a>
      </div>

      <!-- Passport Spec Table -->
      <div style="background: #FFFFFF; border: 1px solid var(--line, #EFE9E0); padding: 22px;">
        <h4 style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 20px; font-weight: 400; margin: 0 0 14px; color: #1C1A17;">Layout Passport</h4>
        <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13.5px;">
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; text-transform: uppercase;">STONE</span>
            <b><?php echo esc_html($layout_stone); ?></b>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; text-transform: uppercase;">TYPE</span>
            <span><?php echo esc_html($layout_type); ?></span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; text-transform: uppercase;">ORIGIN</span>
            <span>Jaipur Workshop Cut & Matched</span>
          </div>
          <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #FAF7F2; padding-bottom: 6px;">
            <span style="color: #76706A; font-size: 11px; text-transform: uppercase;">SHIPPING</span>
            <span>Ships in 1–2 days · Insured</span>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

<?php
get_footer('shop');
