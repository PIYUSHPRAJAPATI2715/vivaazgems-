<?php
/**
 * Template Name: Jewelry Design Detail Page
 * Vivaaz Gems - Custom Jewelry Design Detail Template (§6 Master Specification)
 */

defined('ABSPATH') || exit;

get_header('shop');

$design_title = isset($_GET['design']) ? sanitize_text_field($_GET['design']) : 'Classic Solitaire Claw Ring';
$design_type  = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : 'Ring';
$design_stone = isset($_GET['stone']) ? sanitize_text_field($_GET['stone']) : 'Ceylon Blue Sapphire (7×5 mm)';
$design_metal = isset($_GET['metal']) ? sanitize_text_field($_GET['metal']) : '18k Yellow Gold / 925 Sterling Silver';
?>

<div class="wrap" style="padding-top: 24px; padding-bottom: 72px;">

  <!-- Breadcrumbs -->
  <div class="crumb" style="font-size: 12.5px; color: #9A9186; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a>
    <span>›</span>
    <a href="<?php echo esc_url(home_url('/jewelry/')); ?>" style="color: inherit; text-decoration: none;">Jewelry</a>
    <span>›</span>
    <b style="color: #1C1A17; font-weight: 500;"><?php echo esc_html($design_title); ?></b>
  </div>

  <div class="pd pd2g" style="display: grid; grid-template-columns: minmax(0, 1.1fr) minmax(0, 1fr); gap: 48px; align-items: start;">
    
    <!-- Design Artwork Preview -->
    <div class="q1">
      <div style="aspect-ratio: 1/1; background: #F6F4F0; border: 1px solid var(--line, #EFE9E0); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; padding: 24px;">
        <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="<?php echo esc_attr($design_title); ?>" style="width: 72%; object-fit: contain;">
        <span class="tag" style="position: absolute; left: 16px; top: 16px; background: #1C1A17; color: #FFFFFF; font-size: 10px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">
          BESPOKE SETTING
        </span>
      </div>
      <p style="font-size: 12px; color: #76706A; margin: 10px 0 0;">
        Handmade in our Jaipur jewellery workshop. Made to fit your chosen stone exactly.
      </p>
    </div>

    <!-- Quote Request Form -->
    <div class="q2">
      <span class="cap" style="font-size: 10.5px; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: #9B7C4E;">
        JAIPUR ARTISAN SETTING
      </span>
      <h1 class="h1" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 34px; font-weight: 400; color: #1C1A17; margin: 8px 0 12px; line-height: 1.2;">
        <?php echo esc_html($design_title); ?>
      </h1>
      <p style="font-size: 15px; color: #76706A; line-height: 1.6; margin: 0 0 20px;">
        We craft this setting in solid 925 sterling silver, 14k or 18k yellow, white or rose gold. Send your stone measurements or choose a gemstone from our inventory.
      </p>

      <form action="https://wa.me/919680552270" method="get" target="_blank" style="background: #FFFFFF; border: 1px solid var(--line, #EFE9E0); padding: 24px; display: flex; flex-direction: column; gap: 14px;">
        <h4 style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 20px; font-weight: 400; margin: 0 0 4px; color: #1C1A17;">Ask for a setting quote</h4>
        
        <div>
          <label style="display: block; font-size: 10.5px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; color: #9B7C4E; margin-bottom: 4px;">YOUR NAME *</label>
          <input type="text" name="name" required placeholder="Your full name" style="width: 100%; height: 42px; border: 1px solid #EBE7DF; background: #FAF7F2; padding: 0 12px; font-size: 13.5px; box-sizing: border-box;">
        </div>

        <div>
          <label style="display: block; font-size: 10.5px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; color: #9B7C4E; margin-bottom: 4px;">WHATSAPP NUMBER *</label>
          <input type="tel" name="phone" required placeholder="+91 98290 00000" style="width: 100%; height: 42px; border: 1px solid #EBE7DF; background: #FAF7F2; padding: 0 12px; font-size: 13.5px; box-sizing: border-box;">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
          <div>
            <label style="display: block; font-size: 10.5px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; color: #76706A; margin-bottom: 4px;">METAL</label>
            <select name="metal" style="width: 100%; height: 42px; border: 1px solid #EBE7DF; background: #FAF7F2; padding: 0 8px; font-size: 13px;">
              <option value="18k Yellow Gold">18k Yellow Gold</option>
              <option value="18k White Gold">18k White Gold</option>
              <option value="14k Gold">14k Gold</option>
              <option value="925 Sterling Silver">925 Sterling Silver</option>
            </select>
          </div>
          <div>
            <label style="display: block; font-size: 10.5px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; color: #76706A; margin-bottom: 4px;">STONE SIZE</label>
            <input type="text" name="stone_size" placeholder="e.g. 7×5 mm" style="width: 100%; height: 42px; border: 1px solid #EBE7DF; background: #FAF7F2; padding: 0 12px; font-size: 13.5px; box-sizing: border-box;">
          </div>
        </div>

        <button type="submit" class="btn" style="width: 100%; padding: 14px; background: #1C1A17; color: #FFFFFF; font-size: 11.5px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; border: none; cursor: pointer; margin-top: 6px;">
          REQUEST CUSTOM QUOTE →
        </button>
      </form>

    </div>

  </div>

</div>

<?php
get_footer('shop');
