<?php
/**
 * Vivaaz Gems - Custom Luxury Cart Details Template
 * Clean 2-column layout: Cart Items Table (Left) + Order Summary Card (Right)
 * Strictly matches Page 17 of PDF Brief.
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); 

$cart_url     = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$checkout_url = function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout/');
$cart_items   = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart() : array();
?>

<div class="luxury-cart-page-wrapper">
  
  <div class="cart-page-header" style="text-align: center; margin-bottom: 30px;">
    <span class="section-tag-divider">SHOPPING BAG</span>
    <h1 class="font-serif" style="font-size: 32px; font-weight: 400; margin: 8px 0 4px;">Your <span class="font-italic text-gold">Selection</span></h1>
    <p class="text-muted" style="font-size: 13px;">Review your loose gemstones, matched lots, and jewelry before proceeding to checkout.</p>
  </div>

  <form class="woocommerce-cart-form" action="<?php echo esc_url($cart_url); ?>" method="post">
    <?php do_action('woocommerce_before_cart_table'); ?>

    <div class="cart-layout-grid">
      
      <!-- Left Column: Items Table -->
      <div class="cart-items-section">
        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
          <thead>
            <tr>
              <th class="product-remove">&nbsp;</th>
              <th class="product-thumbnail">&nbsp;</th>
              <th class="product-name"><?php esc_html_e('Product', 'woocommerce'); ?></th>
              <th class="product-price"><?php esc_html_e('Price', 'woocommerce'); ?></th>
              <th class="product-quantity"><?php esc_html_e('Quantity', 'woocommerce'); ?></th>
              <th class="product-subtotal"><?php esc_html_e('Subtotal', 'woocommerce'); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php do_action('woocommerce_before_cart_contents'); ?>

            <?php
            if (!empty($cart_items) && is_array($cart_items)) {
                foreach ($cart_items as $cart_item_key => $cart_item) {
                    $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                    $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                    $product_name = apply_filters('woocommerce_cart_item_name', $_product ? $_product->get_name() : '', $cart_item, $cart_item_key);

                    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                        $remove_url = function_exists('wc_get_cart_remove_url') ? wc_get_cart_remove_url($cart_item_key) : '#';
                        ?>
                        <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                          <td class="product-remove">
                            <?php
                            echo apply_filters(
                                'woocommerce_cart_item_remove_link',
                                sprintf(
                                    '<a href="%s" class="remove-cart-item-btn" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                    esc_url($remove_url),
                                    esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))),
                                    esc_attr($product_id),
                                    esc_attr($_product->get_sku())
                                ),
                                $cart_item_key
                            );
                            ?>
                          </td>

                          <td class="product-thumbnail">
                            <?php
                            $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image('woocommerce_thumbnail'), $cart_item, $cart_item_key);

                            if (!$product_permalink) {
                                echo $thumbnail;
                            } else {
                                printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                            }
                            ?>
                          </td>

                          <td class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
                            <?php
                            if (!$product_permalink) {
                                echo wp_kses_post($product_name . '&nbsp;');
                            } else {
                                echo wp_kses_post(sprintf('<a href="%s" class="cart-item-title-link">%s</a>', esc_url($product_permalink), $_product->get_name()));
                            }

                            do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                            if (function_exists('wc_get_formatted_cart_item_data')) {
                                echo wc_get_formatted_cart_item_data($cart_item);
                            }

                            if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
                            }
                            ?>
                          </td>

                          <td class="product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                            <?php
                                $price_html = (function_exists('WC') && WC()->cart) ? WC()->cart->get_product_price($_product) : '';
                                echo apply_filters('woocommerce_cart_item_price', $price_html, $cart_item, $cart_item_key);
                            ?>
                          </td>

                          <td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
                            <?php
                            if ($_product->is_sold_individually()) {
                                $min_quantity = 1;
                                $max_quantity = 1;
                            } else {
                                $min_quantity = 0;
                                $max_quantity = $_product->get_max_purchase_quantity();
                            }

                            if (function_exists('woocommerce_quantity_input')) {
                                $product_quantity = woocommerce_quantity_input(
                                    array(
                                        'input_name'   => "cart[{$cart_item_key}][qty]",
                                        'input_value'  => $cart_item['quantity'],
                                        'max_value'    => $max_quantity,
                                        'min_value'    => $min_quantity,
                                        'product_name' => $product_name,
                                    ),
                                    $_product,
                                    false
                                );
                                echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                            } else {
                                echo esc_html($cart_item['quantity']);
                            }
                            ?>
                          </td>

                          <td class="product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
                            <?php
                                $subtotal_html = (function_exists('WC') && WC()->cart) ? WC()->cart->get_product_subtotal($_product, $cart_item['quantity']) : '';
                                echo apply_filters('woocommerce_cart_item_subtotal', $subtotal_html, $cart_item, $cart_item_key);
                            ?>
                          </td>
                        </tr>
                        <?php
                    }
                }
            } else {
                ?>
                <tr>
                    <td colspan="6" style="text-align: center; padding: 40px 20px;">
                        <p style="font-size: 15px; color: var(--color-text-muted); margin-bottom: 20px;">Your shopping bag is currently empty.</p>
                        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-square-dark" style="padding: 12px 24px; background: #1A1A1A; color: #fff; text-decoration: none; font-size: 11px; font-weight: 700; text-transform: uppercase;">EXPLORE GEMSTONES CATALOG →</a>
                    </td>
                </tr>
                <?php
            }
            ?>

            <?php do_action('woocommerce_cart_contents'); ?>

            <tr>
              <td colspan="6" class="actions" style="padding: 20px 0;">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
                  <?php if (function_exists('wc_coupons_enabled') && wc_coupons_enabled()) { ?>
                    <div class="coupon-input-wrapper" style="display: flex; gap: 8px;">
                      <input type="text" name="coupon_code" class="input-text-custom" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" style="padding: 10px 14px; font-size: 12px; border: 1px solid var(--color-border-light);" />
                      <button type="submit" class="btn-outline-dark" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>" style="padding: 10px 18px; font-size: 11px; font-weight: 700; cursor: pointer; border: 1px solid #1A1A1A; background: #fff; text-transform: uppercase;"><?php esc_html_e('APPLY', 'woocommerce'); ?></button>
                      <?php do_action('woocommerce_cart_coupon'); ?>
                    </div>
                  <?php } ?>

                  <button type="submit" class="btn-square-dark" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>" style="padding: 10px 20px; font-size: 11px; font-weight: 700; background: #1A1A1A; color: #fff; border: none; cursor: pointer; text-transform: uppercase;"><?php esc_html_e('UPDATE CART', 'woocommerce'); ?></button>
                </div>

                <?php do_action('woocommerce_cart_actions'); ?>
                <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
              </td>
            </tr>

            <?php do_action('woocommerce_after_cart_contents'); ?>
          </tbody>
        </table>
      </div>

      <!-- Right Column: Cart Totals & Checkout -->
      <div class="cart-totals-sidebar">
        <div class="cart-totals-card" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 28px;">
          <h3 class="totals-heading" style="font-size: 14px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin: 0 0 16px; padding-bottom: 10px; border-bottom: 1px solid var(--color-border-light);">Order Summary</h3>
          
          <div class="cart-collaterals">
            <?php
              /**
               * Cart collaterals hook.
               *
               * @hooked woocommerce_cross_sell_display
               * @hooked woocommerce_cart_totals - 10
               */
              do_action('woocommerce_cart_collaterals');
            ?>
          </div>

          <!-- Page 17 PDF Brief Specific Shipping & Payment Info -->
          <div class="cart-shipping-spec-info" style="background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 16px; margin: 20px 0; font-size: 12px; line-height: 1.6;">
            <div style="font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; color: var(--color-gold-label);">SHIPPING & IMPORT INFORMATION</div>
            <div style="margin-bottom: 4px;"><strong>🇮🇳 India:</strong> Insured shipping · Delivery in 2–3 days (GST included)</div>
            <div style="margin-bottom: 4px;"><strong>🌐 Overseas ($/€/£):</strong> Insured DHL/FedEx/UPS · Delivery in 4–7 days</div>
            <div style="font-size: 11px; color: var(--color-text-muted); margin-top: 6px; border-top: 1px dashed var(--color-border-light); padding-top: 6px;">
              * Import duties depend on customer's country and are paid on delivery.
            </div>
          </div>

          <div style="display: flex; flex-direction: column; gap: 10px;">
            <a href="<?php echo esc_url($checkout_url); ?>" class="btn-square-dark-full" style="display: block; width: 100%; padding: 14px; background: #1A1A1A; color: #fff; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-align: center; text-transform: uppercase; text-decoration: none;">
              PROCEED TO CHECKOUT →
            </a>

            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hi Vivaaz Gems, I have items in my shopping bag and would like to inquire before ordering.'); ?>" target="_blank" class="btn-whatsapp-outline-full" style="display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; padding: 12px; border: 1px solid #25D366; color: #25D366; background: #fff; font-size: 12px; font-weight: 700; letter-spacing: 0.05em; text-align: center; text-decoration: none;">
              <span>💬</span> Ask about order on WhatsApp
            </a>
          </div>

          <div class="cart-trust-badges" style="margin-top: 20px; padding-top: 16px; border-top: 1px solid var(--color-border-light); font-size: 11px; color: var(--color-text-muted); display: flex; flex-direction: column; gap: 6px;">
            <div>◈ Lab certified loose gemstones</div>
            <div>◈ Insured door-step express delivery</div>
            <div>◈ 7-Day return guarantee</div>
          </div>
        </div>
      </div>

    </div>

    <?php do_action('woocommerce_after_cart_table'); ?>
  </form>

</div>

<?php do_action('woocommerce_after_cart'); ?>
