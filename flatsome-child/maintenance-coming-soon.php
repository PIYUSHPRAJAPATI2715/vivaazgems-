<?php
/**
 * Vivaaz Gems - Coming Soon / Maintenance Mode Template
 * Displayed to public visitors while the new website is being prepared.
 * Features: Pure typographic logo, WhatsApp contact button, Instagram link.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vivaaz Gems · Jaipur · Bangkok | Coming Soon</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg: #FAF7F2;
      --ink: #1C1A17;
      --mute: #76706A;
      --line: #EFE9E0;
      --gold: #9B7C4E;
      --wa-green: #1E9E52;
      --font-serif: 'Playfair Display', Georgia, serif;
      --font-sans: 'Manrope', -apple-system, sans-serif;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      background: var(--bg);
      color: var(--ink);
      font-family: var(--font-sans);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 32px 20px;
      text-align: center;
    }
    .card {
      background: #FFFFFF;
      border: 1px solid var(--line);
      max-width: 580px;
      width: 100%;
      padding: 56px 40px;
      box-shadow: 0 4px 24px rgba(28,26,23,0.03);
    }
    .logo {
      display: inline-block;
      text-decoration: none;
      color: var(--ink);
      margin-bottom: 28px;
    }
    .logo b {
      display: block;
      font-family: var(--font-serif);
      font-size: 26px;
      font-weight: 500;
      letter-spacing: 0.28em;
      text-transform: uppercase;
      line-height: 1;
    }
    .logo span {
      display: block;
      font-size: 10.5px;
      letter-spacing: 0.32em;
      color: var(--mute);
      margin-top: 6px;
      text-transform: uppercase;
    }
    .tag {
      font-size: 10.5px;
      font-weight: 700;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 12px;
      display: block;
    }
    h1 {
      font-family: var(--font-serif);
      font-size: 36px;
      font-weight: 400;
      line-height: 1.25;
      margin-bottom: 16px;
      color: var(--ink);
    }
    p {
      font-size: 15px;
      color: var(--mute);
      line-height: 1.65;
      margin-bottom: 32px;
    }
    .actions {
      display: flex;
      flex-direction: column;
      gap: 12px;
      align-items: center;
    }
    .btn-wa {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      background: var(--wa-green);
      color: #FFFFFF;
      text-decoration: none;
      padding: 16px 32px;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 0.16em;
      text-transform: uppercase;
      width: 100%;
      transition: background .2s ease;
    }
    .btn-wa:hover {
      background: #178544;
    }
    .btn-wa svg {
      width: 18px;
      height: 18px;
      fill: currentColor;
    }
    .btn-ig {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      background: transparent;
      color: var(--ink);
      border: 1px solid var(--ink);
      text-decoration: none;
      padding: 14px 28px;
      font-size: 11.5px;
      font-weight: 700;
      letter-spacing: 0.16em;
      text-transform: uppercase;
      width: 100%;
      transition: all .2s ease;
    }
    .btn-ig:hover {
      background: var(--ink);
      color: #FFFFFF;
    }
    .footer-note {
      margin-top: 36px;
      font-size: 12px;
      color: var(--mute);
      border-top: 1px solid var(--line);
      padding-top: 20px;
    }
  </style>
</head>
<body>

  <div class="card">
    <a href="/" class="logo">
      <b>VIVAAZ GEMS</b>
      <span>JAIPUR · BANGKOK</span>
    </a>

    <span class="tag">OPENING SOON</span>
    <h1>Our new online showroom is on its way.</h1>
    <p>
      We are updating our catalogue of natural calibrated gemstones, matched layout sets, and gemstone beads. In the meantime, our Jaipur and Bangkok offices are fully open.
    </p>

    <div class="actions">
      <a href="https://wa.me/919680552270?text=Hello%20Vivaaz%20Gems,%20I%20am%20visiting%20from%20Instagram%20and%20would%20like%20to%20enquire%20about%20stones" target="_blank" class="btn-wa">
        <svg viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
        Message us on WhatsApp
      </a>

      <a href="https://instagram.com/vivaazgems" target="_blank" class="btn-ig">
        Follow on Instagram @vivaazgems
      </a>
    </div>

    <div class="footer-note">
      Johari Bazar, Jaipur 302003 · Bangkok Gem Market<br>
      Direct: +91 96805 52270 · info@vivaazgems.com
    </div>
  </div>

</body>
</html>
