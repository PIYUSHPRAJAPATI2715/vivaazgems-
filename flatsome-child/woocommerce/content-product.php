<?php
/**
 * Vivaaz Gems - Custom WooCommerce Product Loop Item (Shop Grid Card)
 * Matches Page 10 of the Master Brief
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
$link = get_permalink($product_id) ?: (function_exists('vivaaz_get_sample_product_url') ? vivaaz_get_sample_product_url() : home_url('/product/ceylon-blue-sapphire-7x5mm/'));
$price_html = $product->get_price_html();
$img_url = get_the_post_thumbnail_url($product_id, 'woocommerce_thumbnail') ?: vivaaz_get_img_url('ceylon-sapphire.jpg');
$is_variable = $product->is_type('variable');
?>

<div <?php if (function_exists('wc_product_class')) { wc_product_class('product-card-luxury', $product); } else { echo 'class="product product-card-luxury"'; } ?>>
  <div class="product-card-media">
    <button class="wishlist-heart-btn" title="Add to Wishlist">♡</button>
    <a href="<?php echo esc_url($link); ?>" style="display: block; width: 100%; height: 100%;">
      <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>">
    </a>
    <div class="quick-view-hover-bar"><a href="<?php echo esc_url($link); ?>" style="color: inherit; text-decoration: none;">QUICK VIEW</a></div>
  </div>
  <div class="product-card-body">
    <h3 class="product-title-heading">
      <a href="<?php echo esc_url($link); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html($title); ?></a>
    </h3>
    <div class="product-meta-sub">Calibrated Lot / Single Piece</div>
    <div class="product-price-row">
      <div>
        <span class="product-price-val"><?php echo $price_html; ?></span>
      </div>
    </div>
    <div style="margin-top: 12px;">
      <a href="<?php echo esc_url($link); ?>" class="btn-underline-link">
        <?php echo $is_variable ? 'SELECT OPTIONS' : 'VIEW DETAILS'; ?>
      </a>
    </div>
  </div>
</div>
