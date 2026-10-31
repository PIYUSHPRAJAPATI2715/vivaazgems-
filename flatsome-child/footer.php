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
        <div class="footer-social-icons-centred fsoc" style="display: flex; justify-content: center; gap: 12px; margin-top: 18px;">
          <a href="https://instagram.com/vivaazgems" target="_blank" class="social-outline-box" aria-label="Instagram" style="width: 36px; height: 36px; border: 1px solid var(--line2, #E6E2DC); display: inline-flex; align-items: center; justify-content: center; color: var(--ink, #1C1A17); background: transparent !important; text-decoration: none;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
          </a>
          <a href="https://youtube.com/vivaazgems" target="_blank" class="social-outline-box" aria-label="YouTube" style="width: 36px; height: 36px; border: 1px solid var(--line2, #E6E2DC); display: inline-flex; align-items: center; justify-content: center; color: var(--ink, #1C1A17); background: transparent !important; text-decoration: none;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
          </a>
          <a href="https://facebook.com/vivaazgems" target="_blank" class="social-outline-box" aria-label="Facebook" style="width: 36px; height: 36px; border: 1px solid var(--line2, #E6E2DC); display: inline-flex; align-items: center; justify-content: center; color: var(--ink, #1C1A17); background: transparent !important; text-decoration: none;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
          </a>
          <a href="https://wa.me/919680552270" target="_blank" class="social-outline-box" aria-label="WhatsApp" style="width: 36px; height: 36px; border: 1px solid var(--line2, #E6E2DC); display: inline-flex; align-items: center; justify-content: center; color: #25D366; background: transparent !important; text-decoration: none;">
            <svg width="18" height="18" viewBox="0 0 448 512" fill="#25D366">
              <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
            </svg>
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
            <p style="margin: 0;">Jaipur · Adarsh Nagar (B-207)</p>
            <p style="margin: 0;">Jaipur · Johari Bazar</p>
            <p style="margin: 0;">Bangkok · Gems Tower</p>
          </div>
        </div>

      </div>

      <!-- PHONE FOOTER TAP ROWS (POINT 6 SPEC: ACCORDION TAP ROWS) -->
      <div class="footer-mobile-rows frows" style="margin-bottom: 30px;">
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
          Jaipur · Adarsh Nagar (B-207) &nbsp;·&nbsp; Johari Bazar &nbsp;·&nbsp; Bangkok
        </div>
      </div>

      <!-- Updates Line (Build Book Page 6) -->
      <div class="footer-updates-line" style="text-align: center; padding: 20px 0; border-top: 1px solid var(--color-border-light); font-size: 13px; color: var(--color-text-main);">
        New stones, first. Fresh lots shared on WhatsApp. 
        <a href="https://wa.me/919680552270?text=Hello,%20please%20add%20me%20to%20your%20new%20stock%20updates%20on%20WhatsApp." target="_blank" class="gold-link" style="font-weight: 600; text-decoration: none; margin-left: 6px; color: #9B7C4E !important; background: transparent !important; display: inline-block;">
          Get updates →
        </a>
      </div>

      <!-- Footer Bottom Bar (Legal name, payment icons, Privacy, Terms) -->
      <div class="footer-bottom-bar" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px; padding-top: 20px; border-top: 1px solid var(--color-border-light); font-size: 11px; color: var(--color-text-muted);">
        <div>
          © <?php echo date('Y'); ?> Vivaaz Gems & Jewellery
        </div>

        <div class="payment-badges-row pay" style="display: flex; flex-wrap: nowrap; gap: 6px; font-size: 10px; font-weight: 700; letter-spacing: 0.05em; max-width: 100%; overflow-x: auto; white-space: nowrap;">
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

  <!-- PHONE BOTTOM BAR (FIXED ON PHONE ONLY - EXACT 4 ITEMS ON SAME HORIZONTAL LEVEL - POINT 20 SPEC) -->
  <nav class="mobile-fixed-bottom-bar bb" id="mobile-fixed-bottom-bar" aria-label="Mobile Bottom Navigation" style="position: fixed; bottom: 0; left: 0; right: 0; width: 100%; max-width: 100vw; height: 58px; background: #FAF7F2; border-top: 1px solid #EFE9E0; display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; align-items: stretch; justify-items: center; z-index: 99999; margin: 0; padding: 0; box-sizing: border-box; overflow: hidden;">
    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="mobile-bar-btn" title="Shop" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; height: 100%; gap: 3px; font-size: 11px; color: #1C1A17; text-decoration: none; padding: 0; margin: 0; background: transparent; border: none; box-sizing: border-box;">
      <span class="bar-icon" style="display: flex; justify-content: center; align-items: center; height: 22px; width: 22px;">
        <svg class="i" style="width: 20px; height: 20px; color: #1C1A17;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
          <rect x="3" y="3" width="7" height="7"></rect>
          <rect x="14" y="3" width="7" height="7"></rect>
          <rect x="14" y="14" width="7" height="7"></rect>
          <rect x="3" y="14" width="7" height="7"></rect>
        </svg>
      </span>
      <span class="bar-text" style="font-size: 11px; line-height: 1; color: #1C1A17; font-weight: 500;">Shop</span>
    </a>

    <button type="button" class="mobile-bar-btn" onclick="openLiveSearchModal();" title="Search" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; height: 100%; gap: 3px; font-size: 11px; color: #1C1A17; background: transparent; border: none; cursor: pointer; padding: 0; margin: 0; box-sizing: border-box; -webkit-appearance: none;">
      <span class="bar-icon" style="display: flex; justify-content: center; align-items: center; height: 22px; width: 22px;">
        <svg class="i" style="width: 20px; height: 20px; color: #1C1A17;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="6.5"></circle>
          <path d="M16 16l4.5 4.5"></path>
        </svg>
      </span>
      <span class="bar-text" style="font-size: 11px; line-height: 1; color: #1C1A17; font-weight: 500;">Search</span>
    </button>

    <a href="https://wa.me/919680552270" target="_blank" rel="noopener noreferrer" class="mobile-bar-btn" title="WhatsApp" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; height: 100%; gap: 3px; font-size: 11px; color: #1C1A17; text-decoration: none; padding: 0; margin: 0; background: transparent; border: none; box-sizing: border-box;">
      <span class="bar-icon" style="display: flex; justify-content: center; align-items: center; height: 22px; width: 22px;">
        <svg style="width: 20px; height: 20px; fill: #25D366; display: block;" viewBox="0 0 448 512">
          <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
        </svg>
      </span>
      <span class="bar-text" style="font-size: 11px; line-height: 1; color: #1C1A17; font-weight: 500;">WhatsApp</span>
    </a>

    <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="mobile-bar-btn" title="Wishlist" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; height: 100%; gap: 3px; font-size: 11px; color: #1C1A17; text-decoration: none; position: relative; padding: 0; margin: 0; background: transparent; border: none; box-sizing: border-box;">
      <span class="bar-icon" style="display: flex; justify-content: center; align-items: center; height: 22px; width: 22px; position: relative;">
        <svg class="i" style="width: 20px; height: 20px; color: #1C1A17;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"></path>
        </svg>
        <span class="cart-badge-count" id="mobile-bar-wishlist-count" style="display: none; position: absolute; top: -4px; right: -8px; width: 15px; height: 15px; border-radius: 50%; background: #1C1A17; color: #fff; font-size: 9px; font-weight: 700; align-items: center; justify-content: center; line-height: 15px; text-align: center;">0</span>
      </span>
      <span class="bar-text" style="font-size: 11px; line-height: 1; color: #1C1A17; font-weight: 500;">Wishlist</span>
    </a>
  </nav>

  <!-- FLOATING REAL WHATSAPP BUTTON (DESKTOP ONLY - ON MOBILE USE BOTTOM BAR) -->
  <a href="https://wa.me/919680552270?text=Hello%20Vivaaz%20Gems,%20I%20have%20an%20enquiry%20regarding%20gemstones." target="_blank" rel="noopener noreferrer" id="vivaaz-floating-whatsapp" class="btn-wa vivaaz-wa-float" aria-label="Chat on WhatsApp" style="position: fixed; bottom: 24px; right: 24px; width: 56px; height: 56px; background: #25D366 !important; background-color: #25D366 !important; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 18px rgba(37,211,102,0.42), 0 2px 8px rgba(0,0,0,0.15); z-index: 9998; text-decoration: none; transition: transform 0.2s ease, box-shadow 0.2s ease;">
    <svg style="width: 32px; height: 32px; fill: #FFFFFF; display: block;" viewBox="0 0 448 512">
      <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
    </svg>
  </a>

  <!-- COOKIE LINE BANNER (POINT 46 SPEC) -->
  <div id="vivaaz-cookie-banner" style="display: none; position: fixed; bottom: 0; left: 0; right: 0; background: #1C1A17; color: #F5F3EF; font-size: 12.5px; padding: 12px 24px; z-index: 99999; align-items: center; justify-content: space-between; gap: 16px; box-shadow: 0 -4px 12px rgba(0,0,0,0.15);">
    <div style="flex: 1;">
      We use cookies to ensure you have the best experience on our website.
    </div>
    <div style="display: flex; gap: 10px; align-items: center;">
      <a href="<?php echo esc_url(home_url('/privacy/')); ?>" style="color: #D9B66F; text-decoration: underline; font-size: 12px;">Privacy</a>
      <button type="button" onclick="acceptVivaazCookies();" style="padding: 6px 16px; background: #D9B66F; color: #1C1A17; font-weight: 700; border: none; font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer;">Accept</button>
    </div>
  </div>
  <script>
    function acceptVivaazCookies() {
      try { localStorage.setItem('vivaaz_cookies_accepted', '1'); } catch(e){}
      var cb = document.getElementById('vivaaz-cookie-banner');
      if (cb) cb.style.display = 'none';
    }
    document.addEventListener('DOMContentLoaded', function() {
      try {
        if (!localStorage.getItem('vivaaz_cookies_accepted')) {
          var cb = document.getElementById('vivaaz-cookie-banner');
          if (cb) {
            cb.style.display = 'flex';
            if (window.innerWidth <= 820) {
              cb.style.bottom = '58px';
            }
          }
        }
      } catch(e){}
    });
  </script>

  <!-- SCRIM OVERLAY -->
  <div id="vivaaz-scrim" class="scrim" style="display: none; position: fixed; inset: 0; background: rgba(28,26,23,.5); z-index: 9998;" onclick="closeAllModals();"></div>

  <script>
  function closeAllModals() {
    if (typeof closeQuickViewModal === 'function') closeQuickViewModal();
    if (typeof closeVideoCallModal === 'function') closeVideoCallModal();
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
