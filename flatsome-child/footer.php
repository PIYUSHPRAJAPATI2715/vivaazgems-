<?php
/**
 * Vivaaz Gems Theme - Footer Template
 * Strictly matches Step 2 (Page 6 & 10) of the 35-page Build Book.
 */
global $vivaaz_footer_rendered;
if (!empty($vivaaz_footer_rendered)) {
    return;
}
$vivaaz_footer_rendered = true;
?>
  <!-- LUXURY FOOTER (GREIGE #F1EBE1) -->
  <footer class="main-footer" style="background: #F1EBE1; border-top: 1px solid var(--color-border-light); padding: 60px 20px 30px;">
    <div class="footer-container" style="max-width: 1200px; margin: 0 auto;">
      
      <!-- Large Centered Brand Header -->
      <div class="footer-brand-header" style="text-align: center; margin-bottom: 36px;">
        <a href="<?php echo esc_url(home_url('/')); ?>" style="display: inline-block; text-decoration: none;">
          <h2 class="footer-brand-title" style="margin: 0; font-family: var(--font-family-serif); font-size: 38px; font-weight: 400; letter-spacing: 0.25em; color: var(--color-text-main);">
            VIVAAZ GEMS
          </h2>
          <p class="footer-brand-sub" style="margin: 6px 0 0 0; font-size: 11px; letter-spacing: 0.2em; color: var(--color-text-muted); text-transform: uppercase;">
            JAIPUR · BANGKOK
          </p>
        </a>

        <!-- 4 Outlined Social Icons Centred Below -->
        <div class="footer-social-icons-centred" style="display: flex; justify-content: center; gap: 16px; margin-top: 18px;">
          <a href="https://instagram.com/vivaazgems" target="_blank" class="social-circle-outline" title="Instagram">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
          </a>
          <a href="https://youtube.com/vivaazgems" target="_blank" class="social-circle-outline" title="YouTube">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
          </a>
          <a href="https://facebook.com/vivaazgems" target="_blank" class="social-circle-outline" title="Facebook">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
          </a>
          <a href="https://wa.me/919680552270" target="_blank" class="social-circle-outline" title="WhatsApp">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
          </a>
        </div>
      </div>

      <!-- DESKTOP 5-COLUMN NAVIGATION (HIDDEN ON PHONE) -->
      <div class="footer-5col-grid footer-desktop-cols" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 30px; margin-bottom: 40px;">
        
        <!-- Col 1: Shop -->
        <div class="footer-col-item">
          <h4 class="footer-col-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 14px; color: var(--color-text-main);">SHOP</h4>
          <ul class="footer-col-links" style="list-style: none; padding: 0; margin: 0; font-size: 13px; line-height: 2;">
            <li><a href="<?php echo esc_url(home_url('/shop/')); ?>">Gemstones</a></li>
            <li><a href="<?php echo esc_url(home_url('/layouts/')); ?>">Layouts</a></li>
            <li><a href="<?php echo esc_url(home_url('/beads/')); ?>">Beads</a></li>
            <li><a href="<?php echo esc_url(home_url('/jewelry/')); ?>">Jewelry</a></li>
            <li><a href="<?php echo esc_url(home_url('/astrology/')); ?>">Astrology</a></li>
          </ul>
        </div>

        <!-- Col 2: The Trade -->
        <div class="footer-col-item">
          <h4 class="footer-col-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 14px; color: var(--color-text-main);">THE TRADE</h4>
          <ul class="footer-col-links" style="list-style: none; padding: 0; margin: 0; font-size: 13px; line-height: 2;">
            <li><a href="<?php echo esc_url(home_url('/bulk-enquiry/')); ?>">Bulk / B2B enquiry</a></li>
            <li><a href="<?php echo esc_url(home_url('/custom-sizes/')); ?>">Custom sizes</a></li>
            <li><a href="<?php echo esc_url(home_url('/layouts/')); ?>">Matched layouts</a></li>
          </ul>
        </div>

        <!-- Col 3: Company -->
        <div class="footer-col-item">
          <h4 class="footer-col-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 14px; color: var(--color-text-main);">COMPANY</h4>
          <ul class="footer-col-links" style="list-style: none; padding: 0; margin: 0; font-size: 13px; line-height: 2;">
            <li><a href="<?php echo esc_url(home_url('/about/')); ?>">Our story</a></li>
            <li><a href="<?php echo esc_url(home_url('/gem-guide/')); ?>">Gem guide</a></li>
            <li><a href="<?php echo esc_url(home_url('/certificates/')); ?>">Certificates</a></li>
            <li><a href="<?php echo esc_url(home_url('/reviews/')); ?>">Reviews</a></li>
          </ul>
        </div>

        <!-- Col 4: Support -->
        <div class="footer-col-item">
          <h4 class="footer-col-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 14px; color: var(--color-text-main);">SUPPORT</h4>
          <ul class="footer-col-links" style="list-style: none; padding: 0; margin: 0; font-size: 13px; line-height: 2;">
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
            <li><a href="<?php echo esc_url(home_url('/shipping/')); ?>">Shipping & export</a></li>
            <li><a href="<?php echo esc_url(home_url('/guarantee/')); ?>">Our guarantee</a></li>
            <li><a href="<?php echo esc_url(home_url('/track-order/')); ?>">Track order</a></li>
            <li><a href="<?php echo esc_url(home_url('/faq/')); ?>">FAQ</a></li>
          </ul>
        </div>

        <!-- Col 5: Visit Us (Plain text, not links) -->
        <div class="footer-col-item">
          <h4 class="footer-col-title" style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 14px; color: var(--color-text-main);">VISIT US</h4>
          <div style="font-size: 13px; color: var(--color-text-muted); line-height: 2;">
            <p style="margin: 0;">Jaipur · Johari Bazar</p>
            <p style="margin: 0;">Jaipur · Adarsh Nagar</p>
            <p style="margin: 0;">Bangkok</p>
          </div>
        </div>

      </div>

      <!-- PHONE FOOTER TAP ROWS (POINT 6 SPEC: ACCORDION TAP ROWS) -->
      <div class="footer-mobile-rows frows" style="display: none; margin-bottom: 30px;">
        <details style="border-top: 1px solid var(--line2);">
          <summary style="list-style: none; display: flex; justify-content: space-between; align-items: center; padding: 14px 0; font-size: 12.5px; letter-spacing: 0.18em; font-weight: 700; cursor: pointer; text-transform: uppercase;">
            SHOP
            <svg class="i" style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
          </summary>
          <div class="in" style="padding-bottom: 12px;">
            <a href="<?php echo esc_url(home_url('/shop/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Gemstones</a>
            <a href="<?php echo esc_url(home_url('/layouts/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Layouts</a>
            <a href="<?php echo esc_url(home_url('/beads/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Beads</a>
            <a href="<?php echo esc_url(home_url('/jewelry/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Jewelry</a>
            <a href="<?php echo esc_url(home_url('/astrology/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Astrology</a>
          </div>
        </details>

        <details style="border-top: 1px solid var(--line2);">
          <summary style="list-style: none; display: flex; justify-content: space-between; align-items: center; padding: 14px 0; font-size: 12.5px; letter-spacing: 0.18em; font-weight: 700; cursor: pointer; text-transform: uppercase;">
            THE TRADE
            <svg class="i" style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
          </summary>
          <div class="in" style="padding-bottom: 12px;">
            <a href="<?php echo esc_url(home_url('/bulk-enquiry/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Bulk / B2B enquiry</a>
            <a href="<?php echo esc_url(home_url('/custom-sizes/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Custom sizes</a>
            <a href="<?php echo esc_url(home_url('/layouts/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Matched layouts</a>
          </div>
        </details>

        <details style="border-top: 1px solid var(--line2);">
          <summary style="list-style: none; display: flex; justify-content: space-between; align-items: center; padding: 14px 0; font-size: 12.5px; letter-spacing: 0.18em; font-weight: 700; cursor: pointer; text-transform: uppercase;">
            COMPANY
            <svg class="i" style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
          </summary>
          <div class="in" style="padding-bottom: 12px;">
            <a href="<?php echo esc_url(home_url('/about/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Our story</a>
            <a href="<?php echo esc_url(home_url('/gem-guide/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Gem guide</a>
            <a href="<?php echo esc_url(home_url('/certificates/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Certificates</a>
            <a href="<?php echo esc_url(home_url('/reviews/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Reviews</a>
          </div>
        </details>

        <details style="border-top: 1px solid var(--line2); border-bottom: 1px solid var(--line2);">
          <summary style="list-style: none; display: flex; justify-content: space-between; align-items: center; padding: 14px 0; font-size: 12.5px; letter-spacing: 0.18em; font-weight: 700; cursor: pointer; text-transform: uppercase;">
            SUPPORT
            <svg class="i" style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg>
          </summary>
          <div class="in" style="padding-bottom: 12px;">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Contact</a>
            <a href="<?php echo esc_url(home_url('/shipping/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Shipping & export</a>
            <a href="<?php echo esc_url(home_url('/guarantee/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Our guarantee</a>
            <a href="<?php echo esc_url(home_url('/track-order/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">Track order</a>
            <a href="<?php echo esc_url(home_url('/faq/')); ?>" style="display: block; padding: 6px 0; color: var(--mute); font-size: 14px;">FAQ</a>
          </div>
        </details>

        <!-- Visit Us on Mobile -->
        <div style="padding: 18px 0; text-align: center; font-size: 13px; color: var(--mute); line-height: 1.8;">
          <b style="color: var(--ink); font-size: 11px; letter-spacing: 0.16em; text-transform: uppercase; display: block; margin-bottom: 6px;">VISIT US</b>
          Jaipur · Johari Bazar &nbsp;·&nbsp; Jaipur · Adarsh Nagar &nbsp;·&nbsp; Bangkok
        </div>
      </div>

      <!-- Updates Line (Build Book Page 6) -->
      <div class="footer-updates-line" style="text-align: center; padding: 20px 0; border-top: 1px solid var(--color-border-light); font-size: 12px; color: var(--color-text-main);">
        New stones, first. Fresh lots shared on WhatsApp. 
        <a href="https://wa.me/919680552270?text=Hello,%20please%20add%20me%20to%20your%20new%20stock%20updates%20on%20WhatsApp." target="_blank" style="font-weight: 600; text-decoration: underline; margin-left: 6px; color: var(--color-text-main);">
          Get updates →
        </a>
      </div>

      <!-- Footer Bottom Bar (Legal name, payment icons, Privacy, Terms) -->
      <div class="footer-bottom-bar" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px; padding-top: 20px; border-top: 1px solid var(--color-border-light); font-size: 11px; color: var(--color-text-muted);">
        <div>
          © <?php echo date('Y'); ?> Vivaaz Gems & Jewellery
        </div>

        <div class="payment-badges-row" style="display: flex; flex-wrap: wrap; gap: 6px; font-size: 10px; font-weight: 700; letter-spacing: 0.05em; max-width: 100%;">
          <span style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 4px 8px; white-space: nowrap;">VISA</span>
          <span style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 4px 8px; white-space: nowrap;">MASTERCARD</span>
          <span style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 4px 8px; white-space: nowrap;">UPI</span>
          <span style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 4px 8px; white-space: nowrap;">PAYPAL</span>
          <span style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 4px 8px; white-space: nowrap;">BANK TRANSFER</span>
        </div>

        <div>
          <a href="<?php echo esc_url(home_url('/privacy/')); ?>" style="text-decoration: underline;">Privacy</a> · 
          <a href="<?php echo esc_url(home_url('/terms/')); ?>" style="text-decoration: underline;">Terms</a>
        </div>
      </div>

    </div>
  </footer>

  <!-- PHONE BOTTOM BAR (FIXED ON PHONE ONLY, EXACT 4 ITEMS: SHOP, SEARCH, WHATSAPP, WISHLIST - 62PX HEIGHT) -->
  <div class="mobile-fixed-bottom-bar bb" id="mobile-fixed-bottom-bar">
    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="mobile-bar-btn" title="Shop" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 3px; font-size: 12px; color: var(--mute); text-decoration: none;">
      <span class="bar-icon" style="display: flex; justify-content: center; align-items: center;">
        <svg class="i" style="width: 20px; height: 20px; color: var(--ink);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
          <rect x="3" y="3" width="7" height="7"></rect>
          <rect x="14" y="3" width="7" height="7"></rect>
          <rect x="14" y="14" width="7" height="7"></rect>
          <rect x="3" y="14" width="7" height="7"></rect>
        </svg>
      </span>
      <span class="bar-text" style="font-size: 12px;">Shop</span>
    </a>

    <button type="button" class="mobile-bar-btn" onclick="toggleLiveSearchModal();" title="Search" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 3px; font-size: 12px; color: var(--mute); background: none; border: 0; cursor: pointer;">
      <span class="bar-icon" style="display: flex; justify-content: center; align-items: center;">
        <svg class="i" style="width: 20px; height: 20px; color: var(--ink);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="6.5"></circle>
          <path d="M16 16l4.5 4.5"></path>
        </svg>
      </span>
      <span class="bar-text" style="font-size: 12px;">Search</span>
    </button>

    <a href="https://wa.me/919680552270" target="_blank" class="mobile-bar-btn" title="WhatsApp" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 3px; font-size: 12px; color: var(--mute); text-decoration: none;">
      <span class="bar-icon" style="display: flex; justify-content: center; align-items: center;">
        <svg class="i" style="width: 20px; height: 20px; color: #1E9E52;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4.5 19.5l1.2-3.6A7.8 7.8 0 1 1 8.6 18.6z"></path>
          <path d="M9.3 9.2c.3 2.4 2.6 4.8 5.4 5.4l1.1-1.1-1.7-.9-.7.7c-1.1-.5-2-1.4-2.5-2.5l.7-.7-.9-1.7z"></path>
        </svg>
      </span>
      <span class="bar-text" style="font-size: 12px;">WhatsApp</span>
    </a>

    <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="mobile-bar-btn" title="Wishlist" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 3px; font-size: 12px; color: var(--mute); text-decoration: none; position: relative;">
      <span class="bar-icon" style="display: flex; justify-content: center; align-items: center;">
        <svg class="i" style="width: 20px; height: 20px; color: var(--ink);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"></path>
        </svg>
      </span>
      <span class="bar-text" style="font-size: 12px;">Wishlist</span>
      <span class="cart-badge-count" id="mobile-bar-wishlist-count" style="display: none;">0</span>
    </a>
  </div>

  <!-- QUICK VIEW MODAL (DESKTOP ONLY PER STYLE GUIDE SPEC) -->
  <div id="vivaaz-quickview-modal" class="modal qvm" style="display: none; position: fixed; left: 50%; top: 50%; transform: translate(-50%, -50%); width: min(860px, calc(100% - 32px)); max-height: calc(100% - 48px); overflow: auto; background: #FFFDF9; z-index: 9999; padding: 34px 40px 30px; box-shadow: 0 30px 80px rgba(0,0,0,.3); border: 1px solid var(--line);">
    <button type="button" onclick="closeQuickView();" aria-label="Close" style="position: absolute; right: 20px; top: 20px; background: none; border: 0; font-size: 24px; cursor: pointer; color: var(--soft); line-height: 1;">&times;</button>
    <div class="qvg" style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; align-items: center;">
      <div class="qvi" style="background: #F4F2EE; display: flex; align-items: center; justify-content: center; aspect-ratio: 1; overflow: hidden;">
        <img id="qv-img" src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Product" style="width: 70%; object-fit: contain;">
      </div>
      <div>
        <span class="cap" style="font-size: 10.5px; letter-spacing: 0.2em; color: var(--gold); font-weight: 700; text-transform: uppercase;">Natural gemstone</span>
        <h3 id="qv-title" style="font-family: var(--display); font-size: 26px; margin: 6px 0; font-weight: 400;">Gemstone</h3>
        <div id="qv-price" style="font-size: 22px; font-weight: 700; margin: 8px 0 14px;">₹ 120 / pc</div>
        <div class="chips sq" style="margin-bottom: 16px;">
          <button type="button" class="chip on" style="border-radius: 0;">5×7</button>
          <button type="button" class="chip" style="border-radius: 0;">6×8</button>
          <button type="button" class="chip" style="border-radius: 0;">7×9</button>
        </div>
        <div style="display: flex; gap: 10px; margin-bottom: 14px;">
          <button type="button" id="qv-add-btn" class="btn wide" onclick="triggerQuickViewAddToCart();" style="flex: 1; text-align: center; height: 44px; border: none; cursor: pointer;">ADD TO CART</button>
        </div>
        <div class="act2" style="margin-top: 10px;">
          <a href="https://wa.me/919680552270" target="_blank" style="padding: 10px; font-size: 11px;">
            <svg class="i" style="width: 16px; height: 16px; color: #1E9E52;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M4.5 19.5l1.2-3.6A7.8 7.8 0 1 1 8.6 18.6z"/><path d="M9.3 9.2c.3 2.4 2.6 4.8 5.4 5.4l1.1-1.1-1.7-.9-.7.7c-1.1-.5-2-1.4-2.5-2.5l.7-.7-.9-1.7z"/></svg>
            WHATSAPP
          </a>
          <a href="javascript:void(0);" onclick="closeQuickView(); openVideoCallModal();" style="padding: 10px; font-size: 11px;">
            <svg class="i" style="width: 16px; height: 16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="3.5" y="6.5" width="12" height="11" rx="2"/><path d="M15.5 10.5l5-3v9l-5-3"/></svg>
            VIDEO CALL
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- VIDEO CALL REQUEST MODAL (SPEC 3 & 4) -->
  <div id="vivaaz-videocall-modal" class="modal sm" style="display: none; position: fixed; left: 50%; top: 50%; transform: translate(-50%, -50%); width: min(460px, calc(100% - 32px)); max-height: calc(100% - 48px); overflow: auto; background: #FFFDF9; z-index: 9999; padding: 34px 36px 30px; box-shadow: 0 30px 80px rgba(0,0,0,.3); border: 1px solid var(--line);">
    <button type="button" onclick="closeVideoCallModal();" aria-label="Close" style="position: absolute; right: 20px; top: 20px; background: none; border: 0; font-size: 24px; cursor: pointer; color: var(--soft); line-height: 1;">&times;</button>
    <span class="cap" style="font-size: 10.5px; letter-spacing: 0.2em; color: var(--gold); font-weight: 700; text-transform: uppercase;">Live from Jaipur warehouse</span>
    <h3 style="font-family: var(--display); font-size: 26px; margin: 6px 0 10px; font-weight: 400;">Request a video call</h3>
    <p class="sub" style="font-size: 13.5px; color: var(--mute); margin-bottom: 20px; line-height: 1.5;">See this exact stone or layout live under daylight and lamp before we dispatch.</p>
    <form onsubmit="event.preventDefault(); window.open('https://wa.me/919680552270?text=' + encodeURIComponent('Hi Vivaaz Gems, I would like to schedule a video call for stone/lot. Name: ' + this.name.value + ', WhatsApp: ' + this.wa.value), '_blank'); closeVideoCallModal();">
      <div class="f" style="margin-bottom: 12px;">
        <label style="display: block; font-size: 10.5px; letter-spacing: 0.18em; font-weight: 700; margin-bottom: 6px; text-transform: uppercase;">Your Name</label>
        <input name="name" required placeholder="Full Name" style="width: 100%; height: 44px; border: 1px solid #D9CFC0; padding: 0 13px; background: var(--paper);" />
      </div>
      <div class="f" style="margin-bottom: 16px;">
        <label style="display: block; font-size: 10.5px; letter-spacing: 0.18em; font-weight: 700; margin-bottom: 6px; text-transform: uppercase;">WhatsApp Number</label>
        <input name="wa" required placeholder="+91 or country code" style="width: 100%; height: 44px; border: 1px solid #D9CFC0; padding: 0 13px; background: var(--paper);" />
      </div>
      <button type="submit" class="btn wide" style="width: 100%; height: 44px;">SCHEDULE VIDEO CALL →</button>
    </form>
  </div>

  <!-- SCRIM OVERLAY -->
  <div id="vivaaz-scrim" class="scrim" style="display: none; position: fixed; inset: 0; background: rgba(28,26,23,.5); z-index: 9998;" onclick="closeAllModals();"></div>

  <script>
  function triggerQuickViewAddToCart() {
    var title = document.getElementById('qv-title') ? document.getElementById('qv-title').innerText : 'Gemstone';
    var price = document.getElementById('qv-price') ? document.getElementById('qv-price').innerText : '120';
    var img = document.getElementById('qv-img') ? document.getElementById('qv-img').src : '';
    if (typeof addProductToCartAndOpenDrawer === 'function') {
      addProductToCartAndOpenDrawer(0, title, img, price, '6×8 mm', 10);
    }
    closeQuickView();
  }

  function openQuickView(title, price, img, url) {
    var modal = document.getElementById('vivaaz-quickview-modal');
    var scrim = document.getElementById('vivaaz-scrim');
    if (modal) {
      document.getElementById('qv-title').innerText = title || 'Gemstone';
      document.getElementById('qv-price').innerText = price || '₹ 120 / pc';
      if (img) document.getElementById('qv-img').src = img;
      if (url) document.getElementById('qv-add-btn').href = url;
      modal.style.display = 'block';
      if (scrim) scrim.style.display = 'block';
    }
  }

  function closeQuickView() {
    var modal = document.getElementById('vivaaz-quickview-modal');
    var scrim = document.getElementById('vivaaz-scrim');
    if (modal) modal.style.display = 'none';
    if (scrim) scrim.style.display = 'none';
  }

  function openVideoCallModal() {
    var modal = document.getElementById('vivaaz-videocall-modal');
    var scrim = document.getElementById('vivaaz-scrim');
    if (modal) {
      modal.style.display = 'block';
      if (scrim) scrim.style.display = 'block';
    }
  }

  function closeVideoCallModal() {
    var modal = document.getElementById('vivaaz-videocall-modal');
    var scrim = document.getElementById('vivaaz-scrim');
    if (modal) modal.style.display = 'none';
    if (scrim) scrim.style.display = 'none';
  }

  function closeAllModals() {
    closeQuickView();
    closeVideoCallModal();
    if (typeof closeConsultationModal === 'function') closeConsultationModal();
    if (typeof closeLiveSearchModal === 'function') closeLiveSearchModal();
  }
  </script>

  <script>
  // Soft fade-in on scroll (Point 14 Spec)
  document.addEventListener('DOMContentLoaded', function() {
    if ('IntersectionObserver' in window) {
      var fadeObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            fadeObserver.unobserve(entry.target);
          }
        });
      }, { threshold: 0.08 });
      document.querySelectorAll('.fade-in-on-scroll, .product-card-luxury, .reels-card-item, .home-two-col-row, .review-card-item').forEach(function(el) {
        fadeObserver.observe(el);
      });
    } else {
      document.querySelectorAll('.fade-in-on-scroll').forEach(function(el) {
        el.classList.add('visible');
      });
    }
  });
  </script>

  <?php wp_footer(); ?>
</body>
</html>
