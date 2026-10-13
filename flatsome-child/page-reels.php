<?php
/**
 * Template Name: Reels Page
 * Vivaaz Gems - Seen on Instagram Reels
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');

$reels = array(
  array('stone' => 'Ceylon Blue Sapphire Lot', 'code' => 'VG-SPH-0705', 'price' => '₹ 105 / pc', 'tag' => 'Macro Video · 0:45'),
  array('stone' => 'Burma Spinel Matched Pair', 'code' => 'VG-SPN-PR01', 'price' => '₹ 280 / pc', 'tag' => 'Loupe Inspection · 0:32'),
  array('stone' => 'Zambian Emerald Octagon', 'code' => 'VG-EMR-OCT8', 'price' => '₹ 450 / pc', 'tag' => 'Daylight Video · 0:50'),
  array('stone' => 'Rainbow Moonstone Oval 6x8', 'code' => 'VG-RMS-OV68', 'price' => '₹ 92 / pc', 'tag' => 'Flash Sheen · 0:28')
);
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 900px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 48px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">@VIVAAZGEMS</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 14px; color: #1C1A17;">Seen on Instagram</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 720px; margin: 0 auto; line-height: 1.8;">
        Our latest reels. Tap a reel to see the stone and buy it, or type the code from the reel in the search.
      </p>

      <div style="margin-top: 24px;">
        <a href="https://instagram.com/vivaazgems" target="_blank" class="btn-square-dark" style="display: inline-block; padding: 14px 28px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
          FOLLOW US ON INSTAGRAM →
        </a>
      </div>
    </div>

    <!-- Reels Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px;">
      <?php foreach ($reels as $r) : ?>
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 16px; text-align: center;">
        <div style="background: #FAF7F2; height: 260px; display: flex; flex-direction: column; align-items: center; justify-content: center; margin-bottom: 14px; position: relative; border: 1px solid #EBE7DF;">
          <span style="font-size: 36px;">▶</span>
          <span style="font-size: 10px; color: #76706A; margin-top: 8px;"><?php echo esc_html($r['tag']); ?></span>
        </div>
        <div style="font-weight: 700; font-size: 13px; color: #1C1A17;"><?php echo esc_html($r['stone']); ?></div>
        <div style="font-size: 11px; color: #76706A; margin: 4px 0;">Code: <?php echo esc_html($r['code']); ?></div>
        <div style="font-size: 12px; font-weight: 700; color: #9C7C4C; margin-bottom: 12px;"><?php echo esc_html($r['price']); ?></div>
        <a href="<?php echo esc_url(home_url('/shop/?s=' . urlencode($r['code']))); ?>" class="btn-square-dark" style="display: block; padding: 8px 12px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 10px; font-weight: 700; text-transform: uppercase;">
          SEE STONE →
        </a>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</div>

<?php
get_footer('shop');
