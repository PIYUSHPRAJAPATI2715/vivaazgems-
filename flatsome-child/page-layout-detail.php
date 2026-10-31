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
          <svg class="i" style="width: 17px; height: 17px; fill: #fff;" viewBox="0 0 24 24"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2zm0 1.67c2.2 0 4.26.86 5.82 2.42a8.17 8.17 0 0 1 2.41 5.82c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.39-4.19-1.15l-.3-.18-3.12.82.83-3.04-.2-.32a8.188 8.188 0 0 1-1.25-4.37c0-4.54 3.7-8.24 8.24-8.24zm-4.71 4.54c-.26 0-.67.1-1.02.48-.35.38-1.35 1.32-1.35 3.22 0 1.9 1.38 3.74 1.57 4 .19.26 2.68 4.25 6.64 5.8.94.37 1.68.59 2.25.77.95.3 1.82.26 2.51.16.77-.12 2.37-.97 2.7-1.9.34-.94.34-1.74.24-1.91-.1-.17-.37-.27-.78-.47-.41-.2-2.43-1.2-2.81-1.34-.38-.14-.65-.2-.93.2-.27.4-.1.06-1.39 1.65-.17.2-.35.23-.76.03-.41-.2-1.73-.64-3.3-2.04-1.22-1.09-2.05-2.43-2.29-2.84-.24-.41-.03-.63.18-.83.18-.18.41-.47.62-.7.2-.24.27-.4.41-.67.14-.27.07-.5-.03-.7-.1-.2-.93-2.24-1.27-3.07-.34-.81-.68-.7-.93-.71z"/></svg>
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
