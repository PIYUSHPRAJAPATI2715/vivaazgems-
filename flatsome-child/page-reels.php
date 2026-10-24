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

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 40px 20px 80px; min-height: 80vh;">
  <div class="container" style="max-width: 1100px; margin: 0 auto;">

    <div class="crumb" style="font-size: 11px; color: #76706A; margin-bottom: 20px;">
      <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a> <span style="margin: 0 4px;">›</span>
      <span style="font-weight: 700; color: #1C1A17;">Reels</span>
    </div>
    
    <!-- Header with FROM INSTAGRAM box (Point 17) -->
    <div class="lhead" style="display: grid; grid-template-columns: minmax(0, 1fr) 340px; gap: 36px; align-items: start; margin-bottom: 36px;">
      <div>
        <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">@VIVAAZGEMS</span>
        <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 8px 0 12px; color: #1C1A17;">Our latest reels</h1>
        <p style="font-size: 15px; color: #4A4640; margin: 0; line-height: 1.7;">
          Every stone you see in our reels is here. Tap a reel to open the exact stone, or type the code from the reel in search.
        </p>
      </div>

      <div class="nsbox" style="background: #FFFFFF; border: 1px solid #E8E1D6; padding: 20px 24px;">
        <span class="cap" style="font-size: 10.5px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; color: #9C7C4C; display: block; margin-bottom: 6px;">FROM INSTAGRAM</span>
        <p style="margin: 0; font-size: 13px; color: #4A4640; line-height: 1.5;">This page is the link in our Instagram bio: <b style="color: #1C1A17;">vivaazgems.com/reels</b></p>
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
