  <!-- LUXURY FOOTER DESIGN (EXACT MOCKUP MATCH) -->
  <footer class="site-footer-luxury reveal-on-scroll">
    <div class="footer-main-grid">
      <!-- Col 1: Brand Info & Socials -->
      <div class="footer-brand-col">
        <div class="brand-logo-container" style="margin-bottom: 12px;">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/../assets/images/vivaaz-logo.png" alt="Vivaaz Gems Logo" style="height: 38px;">
          <div>
            <div class="footer-brand-title">Vivaaz Gems</div>
            <span class="footer-brand-subtitle">NATURAL · RARE · TIMELESS</span>
          </div>
        </div>
        <p class="footer-brand-desc">
          We bring you the finest natural gemstones and premium jewelry, handpicked for their beauty, authenticity and timeless value.
        </p>

        <!-- Social Icons Row -->
        <div class="footer-social-row">
          <a href="https://instagram.com/vivaazgems" target="_blank" class="footer-social-circle" title="Instagram">📷</a>
          <a href="https://facebook.com/vivaazgems" target="_blank" class="footer-social-circle" title="Facebook">f</a>
          <a href="https://youtube.com/vivaazgems" target="_blank" class="footer-social-circle" title="YouTube">▶</a>
          <a href="https://pinterest.com/vivaazgems" target="_blank" class="footer-social-circle" title="Pinterest">P</a>
          <a href="https://x.com/vivaazgems" target="_blank" class="footer-social-circle" title="X">𝕏</a>
        </div>
      </div>

      <!-- Col 2: SHOP -->
      <div class="footer-nav-col">
        <h4>SHOP</h4>
        <ul>
          <li><a href="<?php echo home_url('/shop/'); ?>"><span class="arrow">›</span> Loose Gemstones</a></li>
          <li><a href="<?php echo home_url('/layouts/'); ?>"><span class="arrow">›</span> Layouts</a></li>
          <li><a href="<?php echo home_url('/beads/'); ?>"><span class="arrow">›</span> Gemstone Beads</a></li>
          <li><a href="<?php echo home_url('/tennis-jewelry/'); ?>"><span class="arrow">›</span> Jewelry - Tennis</a></li>
          <li><a href="<?php echo home_url('/astrology/'); ?>"><span class="arrow">›</span> Astrology Stones</a></li>
          <li><a href="<?php echo home_url('/shop/'); ?>"><span class="arrow">›</span> New Arrivals</a></li>
        </ul>
      </div>

      <!-- Col 3: HELP -->
      <div class="footer-nav-col">
        <h4>HELP</h4>
        <ul>
          <li><a href="<?php echo home_url('/contact/'); ?>"><span class="arrow">›</span> Shipping & Insurance</a></li>
          <li><a href="<?php echo home_url('/contact/'); ?>"><span class="arrow">›</span> Returns (7 days)</a></li>
          <li><a href="<?php echo home_url('/cart/'); ?>"><span class="arrow">›</span> Track your order</a></li>
          <li><a href="<?php echo home_url('/cart/'); ?>"><span class="arrow">›</span> Payment & Currency</a></li>
          <li><a href="<?php echo home_url('/ceylon-sapphire-product/'); ?>"><span class="arrow">›</span> Size guide</a></li>
          <li><a href="<?php echo home_url('/contact/'); ?>"><span class="arrow">›</span> FAQ</a></li>
        </ul>
      </div>

      <!-- Col 4: COMPANY -->
      <div class="footer-nav-col">
        <h4>COMPANY</h4>
        <ul>
          <li><a href="<?php echo home_url('/about-us/'); ?>"><span class="arrow">›</span> About us</a></li>
          <li><a href="<?php echo home_url('/blog/'); ?>"><span class="arrow">›</span> Gem guide (blog)</a></li>
          <li><a href="<?php echo home_url('/ceylon-sapphire-product/'); ?>"><span class="arrow">›</span> Certificates & labs</a></li>
          <li><a href="<?php echo home_url('/contact/'); ?>"><span class="arrow">›</span> Bulk / B2B enquiry</a></li>
          <li><a href="<?php echo home_url('/about-us/'); ?>"><span class="arrow">›</span> Reviews</a></li>
          <li><a href="<?php echo home_url('/contact/'); ?>"><span class="arrow">›</span> Contact</a></li>
        </ul>
      </div>

      <!-- Col 5: Stay Connected & Contact Info -->
      <div class="footer-subscribe-col">
        <h3 class="subscribe-heading">
          <span>✉</span> Stay Connected
        </h3>
        <p class="subscribe-desc">
          Get the latest updates on new arrivals, offers and gemstone insights.
        </p>

        <!-- Newsletter Form -->
        <form action="#" class="footer-subscribe-form" onsubmit="event.preventDefault(); alert('Thank you for subscribing to Vivaaz Gems updates!');">
          <input type="email" class="footer-email-input" placeholder="Your email address" required />
          <button type="submit" class="footer-email-btn">→</button>
        </form>

        <!-- Contact Details -->
        <div class="footer-contact-info-list">
          <div class="contact-info-item">
            <span class="contact-icon">📍</span>
            <span>307 Navratna Complex, Johari Bazar, Jaipur</span>
          </div>
          <div class="contact-info-item">
            <span class="contact-icon">💬</span>
            <span>WhatsApp: +91 96805 52270</span>
          </div>
          <div class="contact-info-item">
            <span class="contact-icon">✉</span>
            <span>vivaazgems@gmail.com</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Copyright & Badges Bar -->
    <div class="footer-bottom-bar">
      <div class="footer-bottom-container">
        <div>© Vivaaz Gems & Jewellery — Since 1993</div>

        <!-- Payment Badges -->
        <div class="payment-badges-row">
          <span class="payment-badge-box" style="background: #1A1F71;">VISA</span>
          <span class="payment-badge-box" style="background: #EB001B;">Mastercard</span>
          <span class="payment-badge-box" style="background: #00833E;">UPI</span>
          <span class="payment-badge-box" style="background: #003087;">PayPal</span>
          <span class="payment-badge-box" style="background: #0C2340;">Razorpay</span>
        </div>

        <div>
          UPI | Visa | Mastercard | RuPay | PayPal | Instagram | YouTube | Facebook | Pinterest 💎
        </div>
      </div>
    </div>
  </footer>

  <!-- Mobile Fixed Bottom Navigation Bar -->
  <div class="mobile-nav-bar">
    <a href="<?php echo home_url('/'); ?>" class="mobile-nav-item active">
      <span class="mobile-nav-icon">🏠</span>
      <span>Home</span>
    </a>
    <a href="<?php echo home_url('/shop/'); ?>" class="mobile-nav-item">
      <span class="mobile-nav-icon">💎</span>
      <span>Gems</span>
    </a>
    <a href="<?php echo home_url('/beads/'); ?>" class="mobile-nav-item">
      <span class="mobile-nav-icon">📿</span>
      <span>Beads</span>
    </a>
    <a href="https://wa.me/919680552270" class="mobile-nav-item" style="color: #25D366;">
      <span class="mobile-nav-icon">💬</span>
      <span>WhatsApp</span>
    </a>
    <a href="<?php echo home_url('/cart/'); ?>" class="mobile-nav-item">
      <span class="mobile-nav-icon">🛒</span>
      <span>Bag (2)</span>
    </a>
  </div>

  <script>
    const drawerToggleBtn = document.getElementById('drawer-toggle-btn');
    const closeDrawerBtn = document.getElementById('close-drawer-btn');
    const mobileDrawer = document.getElementById('mobile-drawer');
    const drawerBackdrop = document.getElementById('drawer-backdrop');

    if (drawerToggleBtn) {
      drawerToggleBtn.addEventListener('click', () => {
        mobileDrawer.classList.add('active');
        drawerBackdrop.classList.add('active');
      });
    }

    if (closeDrawerBtn) {
      closeDrawerBtn.addEventListener('click', () => {
        mobileDrawer.classList.remove('active');
        drawerBackdrop.classList.remove('active');
      });
    }

    if (drawerBackdrop) {
      drawerBackdrop.addEventListener('click', () => {
        mobileDrawer.classList.remove('active');
        drawerBackdrop.classList.remove('active');
      });
    }
  </script>
  <?php wp_footer(); ?>
</body>
</html>
