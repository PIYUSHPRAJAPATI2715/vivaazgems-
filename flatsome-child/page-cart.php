<?php
/**
 * Template Name: Cart / Bag Page
 * Vivaaz Gems - Shopping Bag (100% Client Demo Fidelity)
 * Replicates the exact bag() structure, styling, and behavior from Vivaaz-Website-Desktop-Demo.html & Phone-Demo.html
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header('shop');

$shop_url = home_url('/shop/');
$checkout_url = home_url('/checkout/');
?>

<div class="wrap bag-page-wrap" style="max-width: 1200px; margin: 0 auto; padding: 40px 20px 80px; min-height: 70vh;">
  
  <div class="crumb" style="font-size: 12.5px; color: var(--mute, #A8A29E); margin-bottom: 20px;">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a> › <b style="color: var(--ink, #1C1A17);">Your bag</b>
  </div>

  <h1 class="h1" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 36px; font-weight: 400; color: var(--ink, #1C1A17); margin: 0 0 24px;">Your bag</h1>

  <!-- Undo removal banner -->
  <div id="bag-undo-banner" class="undo" style="display: none; background: #FAF7F2; border: 1px solid var(--gold, #9C7C4C); padding: 12px 20px; margin-bottom: 24px; max-width: 760px; justify-content: space-between; align-items: center;">
    <span id="bag-undo-text" style="font-size: 13px; color: var(--ink, #1C1A17);">Item removed</span>
    <button type="button" onclick="undoBagRemove();" style="background: none; border: none; font-size: 12.5px; font-weight: 700; color: var(--gold, #9C7C4C); text-decoration: underline; cursor: pointer; text-transform: uppercase;">Undo</button>
  </div>

  <!-- Dynamic Bag Container rendered via JS with fallback for server cart -->
  <div id="vivaaz-bag-root">
    <div style="text-align: center; padding: 60px 20px; color: var(--mute, #A8A29E);">
      Loading your selection...
    </div>
  </div>

</div>

<script>
  var _lastBagRemovedItem = null;
  var _lastBagRemovedIndex = -1;

  function getLocalBagItems() {
    try {
      return JSON.parse(localStorage.getItem('vivaaz_local_cart') || '[]');
    } catch(e) {
      return [];
    }
  }

  function setLocalBagItems(items) {
    try {
      localStorage.setItem('vivaaz_local_cart', JSON.stringify(items));
    } catch(e) {}
    if (typeof updateHeaderBagCount === 'function') {
      updateHeaderBagCount();
    }
  }

  function formatMoney(amount) {
    return '₹ ' + Number(amount || 0).toLocaleString('en-IN');
  }

  function renderBagPage() {
    var root = document.getElementById('vivaaz-bag-root');
    if (!root) return;

    var items = getLocalBagItems();

    // If localStorage is empty, let's check if we should populate with sample item or show empty
    if (!items || items.length === 0) {
      root.innerHTML = `
        <div style="padding: 20px 0;">
          <p class="lead" style="font-size: 18px; color: var(--soft, #76706A); margin-bottom: 24px;">Your bag is empty.</p>
          <p><a href="<?php echo esc_url($shop_url); ?>" class="btn" style="display: inline-block; padding: 14px 28px; background: #1C1A17; color: #FFFFFF; font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; text-decoration: none; border-radius: 0;">SHOP GEMSTONES</a></p>
        </div>
      `;
      return;
    }

    var n = items.length;
    var subtotal = 0;

    var linesHtml = items.map(function(item, idx) {
      var qty = parseInt(item.quantity || item.qty) || 1;
      var unitPrice = parseInt(String(item.unitPrice || item.price || '105').replace(/[^0-9]/g, '')) || 105;
      
      var tierPrice = unitPrice;
      var tierNoteText = '';
      if (qty >= 50) {
        tierPrice = item.tier50 || Math.round(unitPrice * 0.78);
        tierNoteText = '50+ tier price';
      } else if (qty >= 10) {
        tierPrice = item.tier10 || Math.round(unitPrice * 0.88);
        tierNoteText = '10+ tier price';
      } else {
        tierPrice = item.tier1 || unitPrice;
      }
      var lineTotal = qty * tierPrice;
      subtotal += lineTotal;

      var img = item.image || item.img || '<?php echo esc_url(vivaaz_get_img_url("moonstone.jpg")); ?>';
      var title = item.title || item.name || 'Rainbow Moonstone Oval Cabochon';
      var size = item.size || '6×8 mm';

      return `
        <div class="dri" style="display: grid; grid-template-columns: 76px minmax(0, 1fr) auto; gap: 14px; padding: 18px 0; border-bottom: 1px solid var(--line, #EFE9E0); align-items: center;">
          <div class="im" style="width: 76px; height: 76px; background: #F1F0EE; display: flex; align-items: center; justify-content: center; overflow: hidden;">
            <img src="${img}" alt="${title}" style="width: 72%; height: 72%; object-fit: contain;">
          </div>
          <div>
            <div class="n" style="font-weight: 600; font-size: 14px; line-height: 1.35; color: var(--ink, #1C1A17);">${title}</div>
            <div class="m" style="font-size: 12px; color: var(--soft, #76706A); margin: 3px 0 8px; display: flex; gap: 8px; align-items: center;">
              <span>${size} · AAA</span>
            </div>
            <div class="step s" style="display: inline-flex; align-items: center; border: 1px solid var(--ink, #1C1A17); background: #FFF; height: 30px;">
              <button type="button" onclick="stepBagQty(${idx}, -1)" aria-label="Fewer" style="width: 30px; height: 30px; border: none; background: none; font-weight: 700; font-size: 14px; cursor: pointer; display: flex; align-items: center; justify-content: center;">−</button>
              <input value="${qty}" onchange="onBagQtyChange(${idx}, this.value)" aria-label="Quantity" style="width: 40px; height: 30px; border: none; border-left: 1px solid var(--line, #EFE9E0); border-right: 1px solid var(--line, #EFE9E0); text-align: center; font-size: 13px; font-weight: 700;">
              <button type="button" onclick="stepBagQty(${idx}, 1)" aria-label="More" style="width: 30px; height: 30px; border: none; background: none; font-weight: 700; font-size: 14px; cursor: pointer; display: flex; align-items: center; justify-content: center;">+</button>
            </div>
            ${tierNoteText ? `<div style="font-size: 11px; color: #1E9E52; margin-top: 4px; font-weight: 600;">₹${tierPrice} each · ${tierNoteText}</div>` : ''}
          </div>
          <div class="r" style="text-align: right; display: flex; flex-direction: column; justify-content: space-between; align-items: flex-end; font-weight: 700; height: 68px;">
            <span style="font-size: 15px; color: var(--ink, #1C1A17);">${formatMoney(lineTotal)}</span>
            <button type="button" onclick="removeBagItem(${idx})" style="font-size: 12px; color: var(--mute, #A8A29E); text-decoration: underline; background: none; border: none; cursor: pointer;">Remove</button>
          </div>
        </div>
      `;
    }).join('');

    root.innerHTML = `
      <div class="co" style="display: grid; grid-template-columns: minmax(0, 1.4fr) minmax(320px, 1fr); gap: 36px; align-items: start; margin-top: 20px;">
        <div>
          <div style="background: var(--paper, #FFFFFF); border: 1px solid var(--line, #EFE9E0); padding: 0 24px;">
            ${linesHtml}
          </div>
          <p style="margin-top: 18px;">
            <a class="link" href="<?php echo esc_url($shop_url); ?>" style="color: var(--ink, #1C1A17); font-size: 13px; text-decoration: underline; font-weight: 600;">← Continue shopping</a>
          </p>
        </div>

        <div class="sum" style="background: var(--paper, #FFFFFF); border: 1px solid var(--line, #EFE9E0); padding: 24px; position: sticky; top: 100px;">
          <h5 class="cap" style="font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; margin: 0 0 16px; color: var(--ink, #1C1A17);">ORDER SUMMARY</h5>
          
          <div class="row" style="display: flex; justify-content: space-between; font-size: 13.5px; padding: 6px 0;">
            <span>Subtotal · ${n} ${n === 1 ? 'item' : 'items'}</span>
            <span style="font-weight: 600;">${formatMoney(subtotal)}</span>
          </div>

          <div class="row" style="display: flex; justify-content: space-between; font-size: 13.5px; padding: 6px 0;">
            <span>Shipping</span>
            <span style="color: var(--soft, #76706A);">shown at checkout</span>
          </div>

          <div class="row t" style="display: flex; justify-content: space-between; font-size: 17px; font-weight: 700; border-top: 1px solid var(--line, #EFE9E0); margin-top: 10px; padding-top: 12px; color: var(--ink, #1C1A17);">
            <span>Total before shipping</span>
            <span>${formatMoney(subtotal)}</span>
          </div>

          <a href="<?php echo esc_url($checkout_url); ?>" class="btn wide" style="display: block; width: 100%; margin-top: 18px; padding: 14px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; text-align: center; text-decoration: none; border-radius: 0;">CHECKOUT</a>

          <p style="font-size: 12px; color: var(--soft, #76706A); margin: 14px 0 0; line-height: 1.5;">Outside India, import duties are paid on delivery.</p>
          <p style="font-size: 12.5px; margin: 12px 0 0; line-height: 1.5; color: var(--ink, #1C1A17); border-top: 1px solid var(--line, #EFE9E0); padding-top: 12px;">
            <b>Our guarantee.</b> Replaced or refunded if a stone arrives damaged or not as described.
          </p>
        </div>
      </div>
    `;
  }

  function stepBagQty(index, delta) {
    var items = getLocalBagItems();
    if (!items[index]) return;
    var currentQty = parseInt(items[index].quantity || items[index].qty) || 1;
    var nextQty = Math.max(1, currentQty + delta);
    items[index].quantity = nextQty;
    items[index].qty = nextQty;
    setLocalBagItems(items);
    renderBagPage();
    if (typeof renderCartDrawer === 'function') renderCartDrawer();
  }

  function onBagQtyChange(index, value) {
    var items = getLocalBagItems();
    if (!items[index]) return;
    var nextQty = Math.max(1, parseInt(value) || 1);
    items[index].quantity = nextQty;
    items[index].qty = nextQty;
    setLocalBagItems(items);
    renderBagPage();
    if (typeof renderCartDrawer === 'function') renderCartDrawer();
  }

  function removeBagItem(index) {
    var items = getLocalBagItems();
    if (!items[index]) return;
    _lastBagRemovedItem = items[index];
    _lastBagRemovedIndex = index;
    items.splice(index, 1);
    setLocalBagItems(items);

    var banner = document.getElementById('bag-undo-banner');
    var text = document.getElementById('bag-undo-text');
    if (banner && text) {
      text.textContent = (_lastBagRemovedItem.title || 'Item') + ' removed';
      banner.style.display = 'flex';
    }
    renderBagPage();
    if (typeof renderCartDrawer === 'function') renderCartDrawer();
  }

  function undoBagRemove() {
    if (!_lastBagRemovedItem) return;
    var items = getLocalBagItems();
    if (_lastBagRemovedIndex >= 0 && _lastBagRemovedIndex <= items.length) {
      items.splice(_lastBagRemovedIndex, 0, _lastBagRemovedItem);
    } else {
      items.push(_lastBagRemovedItem);
    }
    setLocalBagItems(items);
    _lastBagRemovedItem = null;
    _lastBagRemovedIndex = -1;
    var banner = document.getElementById('bag-undo-banner');
    if (banner) banner.style.display = 'none';
    renderBagPage();
    if (typeof renderCartDrawer === 'function') renderCartDrawer();
  }

  document.addEventListener('DOMContentLoaded', function() {
    renderBagPage();
  });
</script>

<?php
get_footer('shop');
