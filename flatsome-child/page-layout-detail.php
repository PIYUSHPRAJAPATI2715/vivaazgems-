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
          <button type="button" class="btn" onclick="if(typeof addProductToCartAndOpenDrawer==='function'){addProductToCartAndOpenDrawer(1, '<?php echo esc_js($layout_name); ?>', '<?php echo esc_url($img_url); ?>', '\u20B9 <?php echo number_format($layout_price); ?>', 'Full Layout', 1);}else{openCartDrawer();}" style="padding: 14px 28px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; border: 1px solid #1C1A17; cursor: pointer;">
            ADD TO CART
          </button>
        <?php endif; ?>
        
        <a href="https://wa.me/919680552270?text=<?php echo urlencode('Hello Vivaaz Gems, I am interested in layout: ' . $layout_name . ' (' . $layout_desc . ')'); ?>" target="_blank" class="btn wa" style="padding: 14px 24px; background: #1E9E52; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
          <svg style="width: 16px; height: 16px; fill: #FFFFFF; display: inline-block; vertical-align: middle;" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
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
