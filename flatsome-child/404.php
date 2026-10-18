<?php
/**
 * Vivaaz Gems - Luxury Branded 404 Error Page
 * Strictly styled to match the Vivaaz Gems Master Brief & Demos.
 */

get_header();
?>

<div class="wrap notfound-page-wrap" style="max-width: 900px; margin: 40px auto 80px; padding: 40px 24px; text-align: center; min-height: 60vh;">
  
  <span class="cap" style="display: block; font-size: 11px; letter-spacing: 0.2em; color: var(--gold, #9B7C4E); font-weight: 700; text-transform: uppercase; margin-bottom: 12px;">
    PAGE NOT FOUND · ERROR 404
  </span>

  <h1 class="h1" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: clamp(32px, 4.5vw, 54px); font-weight: 400; color: var(--ink, #1C1A17); line-height: 1.15; margin: 0 0 16px;">
    The stone or page you are looking for has moved.
  </h1>

  <p class="lead" style="font-size: 15px; color: var(--mute, #76706A); max-width: 52ch; margin: 0 auto 32px; line-height: 1.6;">
    The lot may have been sold or renamed. Search our current stock of calibrated natural gemstones, beads, and custom jewelry below.
  </p>

  <!-- Live Search Box -->
  <form action="<?php echo esc_url(home_url('/shop/')); ?>" method="get" style="display: flex; max-width: 520px; margin: 0 auto 36px; border: 1px solid var(--line2, #DDD3C5); background: #FFFFFF;">
    <input type="text" name="s" placeholder="Search stone, shape, cut or reel code..." style="flex: 1; height: 48px; border: none; padding: 0 16px; font-size: 13.5px; outline: none; background: transparent;" />
    <button type="submit" class="btn" style="height: 48px; padding: 0 24px; border: none; background: var(--ink, #1C1A17); color: #FFFFFF; font-size: 11.5px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; cursor: pointer;">
      SEARCH
    </button>
  </form>

  <!-- Popular Destination Buttons -->
  <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; margin-bottom: 40px;">
    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn" style="padding: 14px 26px; font-size: 11.5px; text-decoration: none;">
      BROWSE GEMSTONES
    </a>
    <a href="<?php echo esc_url(home_url('/layouts/')); ?>" class="btn o" style="padding: 14px 26px; font-size: 11.5px; text-decoration: none;">
      MATCHED LAYOUTS
    </a>
    <a href="<?php echo esc_url(home_url('/beads/')); ?>" class="btn o" style="padding: 14px 26px; font-size: 11.5px; text-decoration: none;">
      GEMSTONE BEADS
    </a>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn o" style="padding: 14px 26px; font-size: 11.5px; text-decoration: none;">
      CONTACT US
    </a>
  </div>

  <!-- Popular Stones Quick Links -->
  <div style="border-top: 1px solid var(--line, #E8E1D6); padding-top: 28px;">
    <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.14em; color: var(--soft, #9A9186); text-transform: uppercase; display: block; margin-bottom: 14px;">
      POPULAR NATURAL STONES
    </span>
    <div class="chips" style="display: flex; gap: 8px; justify-content: center; flex-wrap: wrap;">
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=moonstone')); ?>" class="chip" style="text-decoration: none;">Rainbow Moonstone</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=sapphire')); ?>" class="chip" style="text-decoration: none;">Ceylon Sapphire</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=ruby')); ?>" class="chip" style="text-decoration: none;">Burmese Ruby</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=emerald')); ?>" class="chip" style="text-decoration: none;">Colombian Emerald</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=topaz')); ?>" class="chip" style="text-decoration: none;">Swiss Blue Topaz</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=tanzanite')); ?>" class="chip" style="text-decoration: none;">Tanzanite</a>
      <a href="<?php echo esc_url(home_url('/shop/?filter_stone=amethyst')); ?>" class="chip" style="text-decoration: none;">Amethyst</a>
    </div>
  </div>

</div>

<?php
get_footer();
