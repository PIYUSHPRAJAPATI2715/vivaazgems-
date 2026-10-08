<?php
/**
 * Vivaaz Gems - Custom Empty Cart Template
 */

defined('ABSPATH') || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
do_action('woocommerce_cart_is_empty');

if (wc_get_page_id('shop') > 0) : ?>
	<div class="empty-cart-container" style="text-align: center; padding: 80px 20px; max-width: 600px; margin: 0 auto;">
		<div style="font-size: 48px; margin-bottom: 16px;">🛍️</div>
		<span class="section-tag-divider">YOUR BAG IS EMPTY</span>
		<h2 class="font-serif" style="font-size: 28px; font-weight: 400; margin: 12px 0 8px;">No gemstones in your <span class="font-italic text-gold">selection</span></h2>
		<p class="text-muted" style="font-size: 13px; margin-bottom: 28px;">Explore our catalog of certified loose gemstones, matched pairs, and bead strands.</p>
		<p class="return-to-shop">
			<a class="btn-square-dark" href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>">
				EXPLORE GEMSTONES CATALOG →
			</a>
		</p>
	</div>
<?php endif; ?>
