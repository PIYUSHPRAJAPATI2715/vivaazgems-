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
    
    <div class="wishlist-page-header" style="text-align: center; margin-bottom: 36px;">
      <span class="section-tag-divider" style="font-size: 11px; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--color-gold-label); display: block; margin-bottom: 6px;">SAVED GEMS</span>
      <h1 class="font-serif" style="font-size: 36px; font-weight: 400; color: var(--color-text-main); margin: 0 0 8px;">Your <span class="font-italic text-gold" style="color: var(--color-gold-label); font-style: italic;">Wishlist</span></h1>
      <p class="text-muted" style="font-size: 13.5px; color: var(--color-text-muted); margin: 0 0 6px;">Saved on this device. <a href="javascript:void(0);" onclick="openSignInModal();" style="color: var(--color-text-main); text-decoration: underline; font-weight: 600;">Sign in</a> to keep it everywhere.</p>
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
            <span>💬</span> Share on WhatsApp
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
