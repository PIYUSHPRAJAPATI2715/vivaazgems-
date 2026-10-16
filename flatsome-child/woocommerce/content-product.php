<?php
/**
 * Vivaaz Gems - Custom WooCommerce Product Loop Item (Shop Grid Card)
 * 100% Client Demo Fidelity: Quick View, second photo on hover, Add to Cart drawer, See stone link
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;

if (empty($product) || !$product->is_visible()) {
    return;
}

$product_id = $product->get_id();
$title = $product->get_name();
$link = get_permalink($product_id);
$price_html = $product->get_price_html();
$img_url = get_the_post_thumbnail_url($product_id, 'woocommerce_thumbnail') ?: vivaaz_get_img_url('moonstone.jpg');
$is_variable = $product->is_type('variable');

$gallery_ids = $product->get_gallery_image_ids();
$second_img_url = !empty($gallery_ids) ? wp_get_attachment_image_url($gallery_ids[0], 'woocommerce_thumbnail') : '';
?>

<div <?php if (function_exists('wc_product_class')) { wc_product_class('product-card-luxury card', $product); } else { echo 'class="product product-card-luxury card"'; } ?> style="position: relative; background: var(--paper); border: 1px solid #EFE9E0; display: flex; flex-direction: column;">
  <div class="ph product-card-media" style="position: relative; aspect-ratio: 1/1; background: #F1F0EE; overflow: hidden; display: flex; align-items: center; justify-content: center; cursor: pointer;">
    
    <!-- Heart Wishlist Box -->
    <button type="button" class="heart wishlist-heart-btn" data-wishlist-id="<?php echo esc_attr($product_id); ?>" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist(<?php echo intval($product_id); ?>, <?php echo json_encode($title); ?>, <?php echo json_encode($img_url); ?>, <?php echo json_encode(wp_strip_all_tags($price_html)); ?>, <?php echo json_encode($link); ?>, this);" title="Add to Wishlist" style="position: absolute; right: 12px; top: 12px; width: 34px; height: 34px; border-radius: 50%; background: var(--paper); border: 1px solid var(--line2); display: flex; align-items: center; justify-content: center; z-index: 4; cursor: pointer;">
      <svg class="i" style="width: 16px; height: 16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg>
    </button>

    <!-- Product Photos with Hover Swap (Point 10 Spec) -->
    <a href="<?php echo esc_url($link); ?>" style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%; position: relative;">
      <img class="primary-img" src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>" style="width: 68%; object-fit: contain; transition: all .4s ease;">
      <?php if (!empty($second_img_url)) : ?>
        <img class="secondary-img" src="<?php echo esc_url($second_img_url); ?>" alt="<?php echo esc_attr($title); ?>" style="width: 68%; object-fit: contain; position: absolute; opacity: 0; transition: all .4s ease;">
      <?php endif; ?>
    </a>

    <!-- Quick View on hover (Desktop only - Point 6 & 14 Spec) -->
    <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); openQuickView(<?php echo json_encode($title); ?>, <?php echo json_encode(wp_strip_all_tags($price_html)); ?>, <?php echo json_encode($img_url); ?>, <?php echo json_encode($link); ?>);">QUICK VIEW</button>
  </div>

  <div class="cb product-card-body" style="padding: 16px 18px 18px; display: flex; flex-direction: column; gap: 4px; flex: 1;">
    <h3 class="nm product-title-heading" style="font-family: var(--display); font-size: 18px; line-height: 1.25; margin: 0; font-weight: 400;">
      <a href="<?php echo esc_url($link); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html($title); ?></a>
    </h3>
    <div class="dt product-meta-sub" style="font-size: 12.5px; color: var(--soft);">Calibrated Lot · AAA</div>
    <div class="pr product-price-row" style="margin-top: 6px; font-size: 15px; font-weight: 700; color: var(--ink);">
      <?php echo $price_html; ?>
    </div>
    <div class="act" style="margin-top: auto; padding-top: 14px; display: flex; gap: 12px; align-items: center; justify-content: space-between;">
      <button type="button" class="btn sm" onclick="event.preventDefault(); event.stopPropagation(); addProductToCartAndOpenDrawer(<?php echo intval($product_id); ?>, <?php echo json_encode($title); ?>, <?php echo json_encode($img_url); ?>, <?php echo json_encode(wp_strip_all_tags($price_html)); ?>);" style="padding: 8px 14px; font-size: 11px; text-decoration: none; border-radius: 0; cursor: pointer;">ADD TO CART</button>
      <a href="<?php echo esc_url($link); ?>" class="ul" style="font-size: 11.5px;">See stone →</a>
    </div>
  </div>
</div>
