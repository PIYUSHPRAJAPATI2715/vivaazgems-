<?php
/**
 * Vivaaz Gems Theme - Footer Template (Client Spec Page 5 & 10)
 */
?>
  <!-- LUXURY FOOTER (GREIGE #F1EBE1) -->
  <footer class="main-footer">
    <div class="footer-container">
      
      <!-- Large Centered Brand Header -->
      <div class="footer-brand-header">
        <a href="<?php echo esc_url(home_url('/')); ?>" style="display: inline-flex; align-items: center; justify-content: center; gap: 14px; text-decoration: none;">
          <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/vivaaz-logo.png'); ?>" alt="Vivaaz Gems & Jewellery" style="height: 44px; width: auto; object-fit: contain;">
          <div style="text-align: left;">
            <h2 class="footer-brand-title" style="margin: 0; line-height: 1; font-size: 32px; letter-spacing: 0.3em;">V I V A A Z</h2>
            <p class="footer-brand-sub" style="margin: 4px 0 0 0; font-size: 10px; letter-spacing: 0.25em;">GEMS & JEWELLERY · JAIPUR · BANGKOK</p>
          </div>
        </a>
      </div>

      <!-- 5-Column Navigation Grid -->
      <div class="footer-5col-grid">
        <!-- Col 1: Shop -->
        <div>
          <h4 class="footer-col-title">Shop</h4>
          <ul class="footer-col-links">
            <li><a href="<?php echo esc_url(home_url('/shop/')); ?>">Gemstones</a></li>
            <li><a href="<?php echo esc_url(home_url('/#layouts')); ?>">Layouts</a></li>
            <li><a href="<?php echo esc_url(home_url('/#beads')); ?>">Beads</a></li>
            <li><a href="<?php echo esc_url(home_url('/tennis-jewelry/')); ?>">Jewelry</a></li>
            <li><a href="<?php echo esc_url(home_url('/astrology/')); ?>">Astrology</a></li>
            <li><a href="<?php echo esc_url(home_url('/shop/?orderby=date')); ?>">New arrivals</a></li>
          </ul>
        </div>

        <!-- Col 2: The Trade -->
        <div>
          <h4 class="footer-col-title">The Trade</h4>
          <ul class="footer-col-links">
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Bulk / B2B enquiry</a></li>
            <li><a href="<?php echo esc_url(home_url('/shop/')); ?>">Calibrated lots</a></li>
            <li><a href="<?php echo esc_url(home_url('/#layouts')); ?>">Matched layouts</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Custom sizes</a></li>
          </ul>
        </div>

        <!-- Col 3: Company -->
        <div>
          <h4 class="footer-col-title">Company</h4>
          <ul class="footer-col-links">
            <li><a href="<?php echo esc_url(home_url('/#our-story')); ?>">Our story</a></li>
            <li><a href="<?php echo esc_url(home_url('/about/')); ?>">Gem guide</a></li>
            <li><a href="<?php echo esc_url(home_url('/about/')); ?>">Certificates</a></li>
            <li><a href="<?php echo esc_url(home_url('/#reviews')); ?>">Reviews</a></li>
          </ul>
        </div>

        <!-- Col 4: Support -->
        <div>
          <h4 class="footer-col-title">Support</h4>
          <ul class="footer-col-links">
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
            <li><a href="<?php echo esc_url(home_url('/shipping/')); ?>">Shipping & export</a></li>
            <li><a href="<?php echo esc_url(home_url('/returns/')); ?>">Returns</a></li>
            <li><a href="<?php echo esc_url(home_url('/track-order/')); ?>">Track order</a></li>
            <li><a href="<?php echo esc_url(home_url('/faq/')); ?>">FAQ</a></li>
          </ul>
        </div>

        <!-- Col 5: Visit Us -->
        <div>
          <h4 class="footer-col-title">Visit Us</h4>
          <div style="font-size: 11px; color: var(--color-text-muted); line-height: 1.6;">
            <p style="margin-bottom: 8px;"><strong>JAIPUR</strong><br>Vivaaz Gems, Johari Bazar, Jaipur</p>
            <p><strong>BANGKOK</strong><br>Ruby Center (Thailand)</p>
          </div>
        </div>
      </div>

      <!-- Social Updates Line -->
      <div class="footer-social-updates-row">
        <div>
          New stones, first. Fresh lots shared on WhatsApp. 
          <a href="https://wa.me/919680552270" target="_blank" style="font-weight: 600; text-decoration: underline; margin-left: 6px;">Get updates →</a>
        </div>
        <div class="social-icons-flex">
          <a href="https://instagram.com/vivaazgems" target="_blank" title="Instagram">📷</a>
          <a href="https://youtube.com/vivaazgems" target="_blank" title="YouTube">🎬</a>
          <a href="https://facebook.com/vivaazgems" target="_blank" title="Facebook">📘</a>
          <a href="https://wa.me/919680552270" target="_blank" title="WhatsApp">💬</a>
        </div>
      </div>

      <!-- Footer Bottom Bar -->
      <div class="footer-bottom-bar">
        <div>© <?php echo date('Y'); ?> Vivaaz Gems & Jewellery</div>
        <div class="payment-badges-row">
          <span class="pay-badge-item">VISA</span>
          <span class="pay-badge-item">MASTERCARD</span>
          <span class="pay-badge-item">UPI</span>
          <span class="pay-badge-item">PAYPAL</span>
          <span class="pay-badge-item">BANK TRANSFER</span>
        </div>
        <div>
          <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy</a> · 
          <a href="<?php echo esc_url(home_url('/terms/')); ?>">Terms</a>
        </div>
      </div>

    </div>
  </footer>

  <!-- MOBILE FLOATING BOTTOM BAR (CLIENT SPEC PAGE 6 & 10) -->
  <div class="mobile-bottom-nav">
    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="mobile-nav-item">
      <span>🛍️</span>
      <span>Shop</span>
    </a>
    <a href="<?php echo esc_url(home_url('/wishlist/')); ?>" class="mobile-nav-item">
      <span>♡</span>
      <span>Wishlist</span>
    </a>
    <a href="https://wa.me/919680552270" target="_blank" class="mobile-nav-item">
      <span>💬</span>
      <span>WhatsApp</span>
    </a>
    <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="mobile-nav-item">
      <span>👤</span>
      <span>Account</span>
    </a>
  </div>

  <?php wp_footer(); ?>
</body>
</html>
