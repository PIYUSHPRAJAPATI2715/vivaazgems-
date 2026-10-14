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

      <!-- 5-Column Navigation Grid (Exact from Excel tab 1 & Build Book Page 6) -->
      <div class="footer-5col-grid" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 30px; margin-bottom: 40px;">
        
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

  <!-- PHONE BOTTOM BAR (FIXED ON PHONE, HIDDEN ON DESKTOP - POINT 4, 6, 23, 27 SPEC) -->
  <div class="mobile-fixed-bottom-bar" id="mobile-fixed-bottom-bar" style="font-size: 12px;">
    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="mobile-bar-btn" title="Shop" style="font-size: 12px;">
      <span class="bar-icon" style="display: flex; justify-content: center; align-items: center; margin-bottom: 2px;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <rect x="3" y="3" width="7" height="7"></rect>
          <rect x="14" y="3" width="7" height="7"></rect>
          <rect x="14" y="14" width="7" height="7"></rect>
          <rect x="3" y="14" width="7" height="7"></rect>
        </svg>
      </span>
      <span class="bar-text" style="font-size: 12px;">Shop</span>
    </a>
    <a href="https://wa.me/919680552270" target="_blank" class="mobile-bar-btn" title="WhatsApp" style="font-size: 12px;">
      <span class="bar-icon" style="display: flex; justify-content: center; align-items: center; margin-bottom: 2px;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
        </svg>
      </span>
      <span class="bar-text" style="font-size: 12px;">WhatsApp</span>
    </a>
    <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="mobile-bar-btn" title="Wishlist" style="font-size: 12px; position: relative;">
      <span class="bar-icon" style="display: flex; justify-content: center; align-items: center; margin-bottom: 2px;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
        </svg>
      </span>
      <span class="bar-text" style="font-size: 12px;">Wishlist</span>
      <span class="cart-badge-count" id="mobile-bar-wishlist-count" style="display: none;">0</span>
    </a>
    <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="mobile-bar-btn" title="Account" style="font-size: 12px;">
      <span class="bar-icon" style="display: flex; justify-content: center; align-items: center; margin-bottom: 2px;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>
      </span>
      <span class="bar-text" style="font-size: 12px;">Account</span>
    </a>
  </div>

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
