<?php
/**
 * Vivaaz Gems - Custom WooCommerce Product Loop Item (Shop Grid Card)
 * 100% Client Demo Fidelity (Image 2): Quick View, Wishlist heart, Tags (CALIBRATED LOT / PAIR / ONLY 1),
 * Subtitle spec, Proper pricing, Single action button (SELECT OPTIONS / Add to cart → text link).
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

// Determine badge & tag
$tag_text = 'CALIBRATED LOT';
$tag_class = '';
if (stripos($title, 'pair') !== false) {
    $tag_text = 'PAIR';
} elseif (stripos($title, 'single') !== false || stripos($title, 'piece') !== false || stripos($title, 'only 1') !== false) {
    $tag_text = 'ONLY 1';
    $tag_class = 'only-1';
}
?>

<div <?php if (function_exists('wc_product_class')) { wc_product_class('card rv', $product); } else { echo 'class="card rv"'; } ?>>
  <div class="ph" onclick="window.location.href='<?php echo esc_url($link); ?>';">
    <span class="tag <?php echo esc_attr($tag_class); ?>"><?php echo esc_html($tag_text); ?></span>
    
    <!-- Wishlist Heart -->
    <button type="button" class="heart" data-wishlist-id="<?php echo esc_attr($product_id); ?>" onclick="event.preventDefault(); event.stopPropagation(); toggleProductWishlist(<?php echo intval($product_id); ?>, <?php echo json_encode($title); ?>, <?php echo json_encode($img_url); ?>, <?php echo json_encode(wp_strip_all_tags($price_html)); ?>, <?php echo json_encode($link); ?>, this);" title="Add to Wishlist">
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg>
    </button>

    <!-- Product Photo -->
    <a href="<?php echo esc_url($link); ?>" style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%; position: relative;">
      <img class="primary-img" src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>">
      <?php if (!empty($second_img_url)) : ?>
        <img class="secondary-img" src="<?php echo esc_url($second_img_url); ?>" alt="<?php echo esc_attr($title); ?>" style="position: absolute; opacity: 0; transition: all .4s ease;">
      <?php endif; ?>
    </a>

    <!-- Quick View on hover -->
    <button type="button" class="qv" onclick="event.preventDefault(); event.stopPropagation(); if(typeof openQuickViewModal==='function'){openQuickViewModal('<?php echo esc_js($product_id); ?>');}else if(typeof openQuickView==='function'){openQuickView(<?php echo json_encode($title); ?>, <?php echo json_encode(wp_strip_all_tags($price_html)); ?>, <?php echo json_encode($img_url); ?>, <?php echo json_encode($link); ?>);}">QUICK VIEW</button>
  </div>

  <div class="cb">
    <div class="nm" onclick="window.location.href='<?php echo esc_url($link); ?>';"><?php echo esc_html($title); ?></div>
    <div class="dt">Cabochon · 3×4 to 12×16 mm · 8 sizes</div>
    <div class="pr">
      <?php echo $price_html; ?>
    </div>
    <div class="act">
      <?php if ($is_variable || $tag_text === 'CALIBRATED LOT') : ?>
        <a href="<?php echo esc_url($link); ?>" class="ul">SELECT OPTIONS</a>
      <?php else : ?>
        <a href="javascript:void(0);" class="ul add-to-cart-link" onclick="event.preventDefault(); event.stopPropagation(); addProductToCartAndOpenDrawer(<?php echo intval($product_id); ?>, <?php echo json_encode($title); ?>, <?php echo json_encode($img_url); ?>, <?php echo json_encode(wp_strip_all_tags($price_html)); ?>);">Add to cart →</a>
      <?php endif; ?>
    </div>
  </div>
</div>
