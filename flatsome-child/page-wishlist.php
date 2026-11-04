<?php
/**
 * Template Name: Wishlist Page
 * Vivaaz Gems - Luxury Dynamic Wishlist Page
 * Connects directly to vivaaz_wishlist localStorage & WooCommerce Cart
 */

get_header();
?>

<div id="content" class="luxury-wishlist-wrapper" role="main" style="background: var(--color-page-bg); min-height: 65vh; padding: 40px 20px 80px;">

  <div style="max-width: 1200px; margin: 0 auto;">
    <!-- Breadcrumb Aligned Inside Container (Point 28 Spec) -->
    <div class="crumb" style="font-size: 12.5px; color: #9A9186; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
      <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a>
      <span>›</span>
      <b style="color: #1C1A17; font-weight: 500;">Wishlist</b>
    </div>
    
    <div class="wishlist-page-header" style="text-align: center; margin-bottom: 36px;">
      <span class="section-tag-divider" style="font-size: 11px; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--color-gold-label); display: block; margin-bottom: 6px;">SAVED GEMS</span>
      <h1 class="font-serif" style="font-size: 36px; font-weight: 400; color: var(--color-text-main); margin: 0 0 8px;">Your <span class="font-italic text-gold" style="color: var(--color-gold-label); font-style: italic;">Wishlist</span></h1>
      <p class="text-muted" style="font-size: 13.5px; color: var(--color-text-muted); margin: 0 0 6px;">Saved on this phone. <a href="javascript:void(0);" onclick="openSignInModal();" style="color: var(--color-text-main); text-decoration: underline; font-weight: 600;">Sign in</a> to keep it everywhere.</p>
    </div>

    <!-- Active Wishlist Container (Rendered dynamically by JavaScript) -->
    <div id="wishlist-dynamic-container">
      <div style="text-align: center; padding: 40px; color: var(--color-text-muted);">
        Loading your saved items...
      </div>
    </div>

  </div>
</div>

<script>
  function renderWishlistPage() {
    var container = document.getElementById('wishlist-dynamic-container');
    if (!container) return;

    var items = [];
    try {
      items = JSON.parse(localStorage.getItem('vivaaz_wishlist') || '[]');
    } catch(e) {
      items = [];
    }

    if (!items || items.length === 0) {
      container.innerHTML = `
        <div style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 60px 20px; text-align: center; max-width: 600px; margin: 0 auto; box-shadow: 0 4px 20px rgba(0,0,0,0.02);">
          <div style="font-size: 48px; color: var(--color-gold-label); margin-bottom: 16px;">♡</div>
          <h2 class="font-serif" style="font-size: 24px; font-weight: 400; margin: 0 0 10px; color: var(--color-text-main);">Your Wishlist is Empty</h2>
          <p style="font-size: 13px; color: var(--color-text-muted); margin: 0 0 24px; line-height: 1.6;">
            You haven't saved any gemstones yet. Explore our loose gemstones, matched pairs, and bead strands to start building your collection.
          </p>
          <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-square-dark" style="padding: 14px 28px; display: inline-block;">
            EXPLORE GEMSTONES →
          </a>
        </div>
      `;
      return;
    }

    var html = `
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 14px; flex-wrap: wrap; gap: 12px;">
        <span style="font-size: 12px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;">
          ${items.length} SAVED ITEM${items.length === 1 ? '' : 'S'}
        </span>
        <div style="display: flex; gap: 12px; align-items: center;">
          <button type="button" onclick="shareWishlistOnWhatsApp();" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; background: #25D366; color: #FFFFFF; border: none; font-size: 11px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; cursor: pointer;">
            <svg style="width: 16px; height: 16px; fill: #FFFFFF; display: inline-block; vertical-align: middle;" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg> Share on WhatsApp
          </button>
          <button type="button" onclick="clearAllWishlist();" style="background: none; border: none; font-size: 11px; font-weight: 600; color: #C0392B; cursor: pointer; text-decoration: underline; letter-spacing: 0.05em;">
            Clear all
          </button>
        </div>
      </div>
      
      <div class="wishlist-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 24px;">
    `;

    items.forEach(function(item) {
      var itemImg = item.img || '<?php echo esc_url(vivaaz_get_img_url("moonstone.jpg")); ?>';
      var itemUrl = item.url || '<?php echo esc_url(home_url("/shop/")); ?>';
      var itemPrice = item.price || '₹ 1,050';

      html += `
        <div class="product-card-luxury" style="background: #FFFFFF; border: 1px solid var(--color-border-light); position: relative; display: flex; flex-direction: column;">
          <div class="product-card-media" style="position: relative; width: 100%; aspect-ratio: 1 / 1; overflow: hidden; background: #FAF7F2;">
            <button type="button" onclick="removeWishlistItem('${item.id}');" title="Remove from wishlist" style="position: absolute; top: 10px; right: 10px; z-index: 10; background: rgba(255,255,255,0.9); border: 1px solid var(--color-border-light); width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 16px; cursor: pointer; color: #1C1A17;">
              &times;
            </button>
            <a href="${itemUrl}" style="display: block; width: 100%; height: 100%;">
              <img src="${itemImg}" alt="${item.title}" style="width: 100%; height: 100%; object-fit: cover; display: block;">
            </a>
          </div>
          
          <div class="product-card-body" style="padding: 16px; display: flex; flex-direction: column; flex-grow: 1; justify-content: space-between;">
            <div>
              <h3 style="font-size: 14px; font-weight: 600; margin: 0 0 6px; line-height: 1.3;">
                <a href="${itemUrl}" style="color: inherit; text-decoration: none;">${item.title}</a>
              </h3>
              <div style="font-size: 14px; font-weight: 700; color: var(--color-text-main); margin-bottom: 14px;">
                ${itemPrice}
              </div>
            </div>
            
            <div style="display: flex; gap: 8px;">
              <a href="${itemUrl}" class="btn-square-dark" style="flex: 1; padding: 10px 14px; font-size: 11px; text-align: center;">
                VIEW PRODUCT →
              </a>
            </div>
          </div>
        </div>
      `;
    });

    html += `</div>`;
    container.innerHTML = html;
  }

  function removeWishlistItem(id) {
    var items = [];
    try {
      items = JSON.parse(localStorage.getItem('vivaaz_wishlist') || '[]');
    } catch(e) {}
    items = items.filter(function(it) { return String(it.id) !== String(id); });
    localStorage.setItem('vivaaz_wishlist', JSON.stringify(items));
    if (typeof updateWishlistCountBadge === 'function') updateWishlistCountBadge();
    if (typeof updateAllWishlistButtons === 'function') updateAllWishlistButtons();
    renderWishlistPage();
    if (typeof showWishlistToast === 'function') showWishlistToast('Item removed from wishlist');
  }

  function clearAllWishlist() {
    if (confirm('Are you sure you want to clear your entire wishlist?')) {
      localStorage.setItem('vivaaz_wishlist', '[]');
      if (typeof updateWishlistCountBadge === 'function') updateWishlistCountBadge();
      if (typeof updateAllWishlistButtons === 'function') updateAllWishlistButtons();
      renderWishlistPage();
      if (typeof showWishlistToast === 'function') showWishlistToast('Wishlist cleared');
    }
  }

  function shareWishlistOnWhatsApp() {
    var items = [];
    try {
      items = JSON.parse(localStorage.getItem('vivaaz_wishlist') || '[]');
    } catch(e) {}
    if (!items || items.length === 0) {
      alert('Your wishlist is empty. Please save some items first.');
      return;
    }
    var msg = "Hello Vivaaz Gems, here is my saved gemstone wishlist from your website:\n\n";
    items.forEach(function(it, idx) {
      msg += (idx + 1) + ". " + it.title + " (" + (it.price || '') + ")\n";
      if (it.url) msg += "   " + it.url + "\n";
    });
    msg += "\nCould you please check availability and live photos for these?";
    var waUrl = "https://wa.me/919680552270?text=" + encodeURIComponent(msg);
    window.open(waUrl, '_blank');
  }

  document.addEventListener("DOMContentLoaded", function() {
    renderWishlistPage();
  });
</script>

<?php
get_footer();
