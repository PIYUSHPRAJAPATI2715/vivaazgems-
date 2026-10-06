# 14 Approved Plugins Configuration Guide — vivaazgems.com

> [!IMPORTANT]
> **Strict Brief Rule**: Use ONLY these 14 plugins. Do NOT install any extra plugins without written permission from Harsh.

---

### 1. WooCommerce (Free)
* **Job**: Core shop engine, product catalog, orders, and customer management.
* **Key Settings**:
  * Currency: ₹ INR default (India) with multi-currency switcher for overseas.
  * Taxes: Inclusive of taxes for India pricing.
  * Stock management: Enabled, show "Only 1 available" for single stones.
  * Checkout: Enable Guest Checkout (no account required).

### 2. FacetWP (Paid)
* **Job**: Left-column filters on stone, bead, jewelry, and astrology category pages.
* **Key Settings**:
  * Index WooCommerce product attributes (`size`, `cut`, `shape`, `sold_as`, `color`, `treatment`, `certificate`).
  * Empty choices: **Automatically hidden**.
  * Product counts: **ON**.
  * Automatic AJAX reload without full page refresh.

### 3. Tiered Pricing Table for WooCommerce (Free)
* **Job**: Quantity pieces buttons (10, 20, 50, 100, 500) & dynamic price-per-piece discounting on product pages.
* **Key Settings**:
  * Display format: Horizontal buttons + summary price table.
  * Minimum quantity: Configurable per product (e.g., min 10 pcs for calibrated sapphire).

### 4. Cashfree Payments for WooCommerce (Free plugin)
* **Job**: Primary payment gateway for Indian customers (UPI, Netbanking, Cards).
* **Key Settings**:
  * Backup gateway: CCAvenue (apply to both on day 1, use first approved).
  * *Note*: Razorpay is strictly prohibited.

### 5. WooCommerce PayPal Payments (Free Official)
* **Job**: Primary overseas payment gateway for $, €, £, AED card & PayPal transactions.
* **Key Settings**:
  * Enable PayPal Express Checkout & Credit Cards.
  * Payoneer integration: Built-in WooCommerce Offline Payment method renamed "Payoneer" (manual Payoneer payment request sent via email after order placement).

### 6. CURCY - Multi Currency for WooCommerce (Free)
* **Job**: Header currency switcher (₹ INR, $ USD, € EUR, £ GBP, AED).
* **Key Settings**:
  * GeoIP auto-detect currency by customer country.
  * Display in top bar header.

### 7. WPForms Lite (Free)
* **Job**: Contact form, Bulk/B2B inquiry form, and trade buyer form.
* **Key Settings**:
  * Single simple form on Contact page (`Name`, `Email`, `Phone`, `I am a: customer / jeweler / trade buyer`, `Message`).

### 8. Facebook for WooCommerce (Free Official)
* **Job**: Instagram Shop catalog auto-sync to Meta Commerce Manager.
* **Key Settings**:
  * Domain verification in Meta Business Manager.
  * Real-time sync of all WooCommerce product titles, prices, stock, and photos.

### 9. Spotlight - Social Media Feeds (Free)
* **Job**: Display `@vivaazgems` Instagram Reels grid on homepage ("Seen on Instagram") and `/reels` page.
* **Key Settings**:
  * 6 reels grid, video pop-up / direct link to product page.
  * Lazy load videos on scroll to keep mobile page speed high.

### 10. Wati or Interakt (Paid Service)
* **Job**: WhatsApp button integration, automated order confirmations, dispatch tracking alerts, and abandoned cart reminders.
* **Key Settings**:
  * Floating WhatsApp button (bottom-right / mobile bar).
  * Automated WhatsApp template message triggers upon order status changes.

### 11. Yoast SEO Premium (Paid - Already Bought)
* **Job**: Google SEO optimization, XML sitemaps, 301 redirects from old site links.
* **Key Settings**:
  * Enable Yoast AI for titles and meta descriptions.
  * Set up redirect manager for old `vivaazgems.com` URLs to preserve Google rankings.

### 12. LiteSpeed Cache or WP Rocket (Free/Paid - Choose ONLY 1)
* **Job**: Speed optimization & mobile performance caching.
* **Key Settings**:
  * Hero video lazy loading & muted pre-load.
  * Image webp conversion and mobile tile optimization (<80 KB per tile).

### 13. WP Umbrella (Paid)
* **Job**: Automated cloud backups, site uptime alerts, and safe update monitoring.
* **Key Settings**:
  * Daily automated backups before making staging/live edits.

### 14. Custom Fonts (Free)
* **Job**: Enqueue General Sans font from Fontshare.
* **Key Settings**:
  * Font-family: `General Sans` (weights: 400, 500, 600).
