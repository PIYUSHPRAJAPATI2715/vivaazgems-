# Vivaaz Gems & Jewellery - Team Setup & Import Guide

This package contains everything needed to set up the **Vivaaz Gems & Jewellery** WooCommerce e-commerce website on any local server (Local WP, XAMPP, WampServer) or live hosting server.

---

## 📦 Package Contents

1. **`vivaazgems_database.sql`** (6.9 MB)  
   - Complete MySQL database dump containing all products, categories, pages, site settings, custom options, navigation menus, and WooCommerce configurations.

2. **`flatsome-child/`**  
   - Source code of the custom **Flatsome Child Theme** built for Vivaaz Gems.

3. **`vivaazgems-theme-standalone.zip`**  
   - Standalone theme zip archive ready for direct upload in WordPress (**Appearance → Themes → Upload Theme**).

---

## 🚀 Quick Setup Instructions for Team Members

### Option A: Importing into Local WP (Local by Flywheel)

1. **Create New Site**:
   - Open **Local WP** and click **+ Create a new site**.
   - Name your site: `vivaazgems`.
   - Choose **Environment**: Preferred (PHP 8.2+, MySQL 8.0+ / MariaDB).

2. **Install Theme**:
   - Copy the `flatsome-child/` directory to:  
     `app/public/wp-content/themes/flatsome-child/`
   - Make sure the parent theme **Flatsome** is placed in `app/public/wp-content/themes/flatsome/`.
   - Activate **Flatsome Child** in WordPress Admin (**Appearance → Themes**).

3. **Import Database**:
   - In Local WP, click **Database** tab → **Open Adminer** (or use phpMyAdmin / DBeaver).
   - Select the `local` database.
   - Click **Import** → Choose `vivaazgems_database.sql` → Click **Execute**.

4. **Update Site URL (If Domain Differs)**:
   - If your local site domain is different from `vivaazgems.local`, run the following SQL command in Adminer / phpMyAdmin:
     ```sql
     UPDATE wp_options SET option_value = 'http://YOUR-NEW-DOMAIN' WHERE option_name IN ('siteurl', 'home');
     ```

---

### Option B: Installing Theme via WordPress Dashboard

1. Log into your WordPress Admin Dashboard.
2. Go to **Appearance → Themes → Add New → Upload Theme**.
3. Choose `vivaazgems-theme-standalone.zip` and click **Install Now**.
4. Click **Activate**.

---

## 💻 Technical Architecture Summary

- **Parent Theme**: Flatsome (v3.20+)
- **Child Theme**: `flatsome-child`
- **Key Features Included**:
  - **Header**: Sticky top bar, currency switcher, official logo + brand name, mega dropdowns (Gemstones, Layouts, Beads, Jewelry, Astrology), vector SVG action icons.
  - **Homepage**: Hero banner, 6-stone grid, 2-column Layouts section, Beads shape grid, Arrivals/Bestsellers tabbed WooCommerce product loop, Our Story section, Google Reviews, Instagram reels grid.
  - **Single Product Page**: Light Photos thumbnail gallery switcher, price table, WhatsApp inquiry CTA, size & pieces pill buttons, Stone Passport specification box.
  - **Shop / Archive Page**: Filter sidebar, stone cut selector pills, custom product grid.
  - **My Account Page**: Centered luxury tabbed card (`SIGN IN` & `CREATE AN ACCOUNT`).
