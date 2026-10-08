<?php
/**
 * Template Name: Wishlist Page
 * Vivaaz Gems - Luxury Wishlist Page
 */

get_header();
?>

<div class="luxury-wishlist-wrapper" style="max-width: 1200px; margin: 40px auto; padding: 0 20px;">
  
  <div class="wishlist-page-header" style="text-align: center; margin-bottom: 40px;">
    <span class="section-tag-divider">SAVED ITEMS</span>
    <h1 class="font-serif" style="font-size: 32px; font-weight: 400; margin: 8px 0 4px;">Your <span class="font-italic text-gold">Wishlist</span></h1>
    <p class="text-muted" style="font-size: 13px;">Save your favorite gemstones, matched pairs, and bead strands for later.</p>
  </div>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="wishlist-content-body">
      <?php the_content(); ?>
    </div>
  <?php endwhile; endif; ?>

</div>

<?php
get_footer();
