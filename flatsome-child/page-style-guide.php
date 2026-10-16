<?php
/**
 * Template Name: Style Guide Page
 * Vivaaz Gems - Brand Style Guide Template (1:1 with Demo)
 */
get_header();
?>

<div class="wrap sg" style="max-width: 1280px; margin: 0 auto; padding: 20px 24px 80px;">
  
  <div class="crumb" style="font-size: 12.5px; color: var(--soft); display: flex; gap: 8px; flex-wrap: wrap; padding-top: 18px;">
    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> › <b style="color: var(--ink);">Style guide</b>
  </div>

  <span class="cap" style="display: block; margin-top: 20px; font-size: 10.5px; letter-spacing: 0.2em; color: var(--gold); font-weight: 700; text-transform: uppercase;">
    For Manisha · one look on every page
  </span>
  <h1 class="h1" style="font-family: var(--display); font-weight: 400; font-size: clamp(32px, 4vw, 48px); line-height: 1.1; margin: 8px 0 12px;">
    Style guide
  </h1>
  <p class="lead" style="color: var(--mute); font-size: 15px; max-width: 62ch; margin: 0 0 32px; line-height: 1.6;">
    Every button, chip, icon, drop-down and space on the site follows these rules, on desktop and on phone. Nothing here is new: it is the Build Book look, in one place. In Flatsome most of it is set once in Theme Options (Style, Typography, Buttons) and Custom CSS.
  </p>

  <!-- 1. COLOURS -->
  <h2 class="h2 sgh" style="font-family: var(--display); font-weight: 400; font-size: 28px; margin: 48px 0 18px; padding-top: 24px; border-top: 1px solid var(--line);">
    1. Colours
  </h2>
  <div class="sgsw" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 14px;">
    <div class="sgs" style="background: var(--paper); border: 1px solid var(--line); padding: 12px; display: flex; flex-direction: column; gap: 4px;">
      <i style="height: 56px; border: 1px solid var(--line); margin-bottom: 8px; background: #1C1A17; display: block;"></i>
      <b>Ink</b>
      <span style="font-size: 12px; color: var(--mute);">#1C1A17</span>
      <small style="font-size: 11px; color: var(--soft);">text, black buttons, top bar</small>
    </div>
    <div class="sgs" style="background: var(--paper); border: 1px solid var(--line); padding: 12px; display: flex; flex-direction: column; gap: 4px;">
      <i style="height: 56px; border: 1px solid var(--line); margin-bottom: 8px; background: #FAF7F2; display: block;"></i>
      <b>Page</b>
      <span style="font-size: 12px; color: var(--mute);">#FAF7F2</span>
      <small style="font-size: 11px; color: var(--soft);">page background (light beige)</small>
    </div>
    <div class="sgs" style="background: var(--paper); border: 1px solid var(--line); padding: 12px; display: flex; flex-direction: column; gap: 4px;">
      <i style="height: 56px; border: 1px solid var(--line); margin-bottom: 8px; background: #FFFFFF; display: block;"></i>
      <b>White</b>
      <span style="font-size: 12px; color: var(--mute);">#FFFFFF</span>
      <small style="font-size: 11px; color: var(--soft);">cards, header, boxes</small>
    </div>
    <div class="sgs" style="background: var(--paper); border: 1px solid var(--line); padding: 12px; display: flex; flex-direction: column; gap: 4px;">
      <i style="height: 56px; border: 1px solid var(--line); margin-bottom: 8px; background: #F1EBE1; display: block;"></i>
      <b>Sand</b>
      <span style="font-size: 12px; color: var(--mute);">#F1EBE1</span>
      <small style="font-size: 11px; color: var(--soft);">footer, soft boxes</small>
    </div>
    <div class="sgs" style="background: var(--paper); border: 1px solid var(--line); padding: 12px; display: flex; flex-direction: column; gap: 4px;">
      <i style="height: 56px; border: 1px solid var(--line); margin-bottom: 8px; background: #9B7C4E; display: block;"></i>
      <b>Gold</b>
      <span style="font-size: 12px; color: var(--mute);">#9B7C4E</span>
      <small style="font-size: 11px; color: var(--soft);">small labels only</small>
    </div>
    <div class="sgs" style="background: var(--paper); border: 1px solid var(--line); padding: 12px; display: flex; flex-direction: column; gap: 4px;">
      <i style="height: 56px; border: 1px solid var(--line); margin-bottom: 8px; background: #76706A; display: block;"></i>
      <b>Grey text</b>
      <span style="font-size: 12px; color: var(--mute);">#76706A</span>
      <small style="font-size: 11px; color: var(--soft);">second text</small>
    </div>
    <div class="sgs" style="background: var(--paper); border: 1px solid var(--line); padding: 12px; display: flex; flex-direction: column; gap: 4px;">
      <i style="height: 56px; border: 1px solid var(--line); margin-bottom: 8px; background: #E8E1D6; display: block;"></i>
      <b>Lines</b>
      <span style="font-size: 12px; color: var(--mute);">#E8E1D6</span>
      <small style="font-size: 11px; color: var(--soft);">thin lines, borders</small>
    </div>
    <div class="sgs" style="background: var(--paper); border: 1px solid var(--line); padding: 12px; display: flex; flex-direction: column; gap: 4px;">
      <i style="height: 56px; border: 1px solid var(--line); margin-bottom: 8px; background: #1E9E52; display: block;"></i>
      <b>WhatsApp green</b>
      <span style="font-size: 12px; color: var(--mute);">#1E9E52</span>
      <small style="font-size: 11px; color: var(--soft);">WhatsApp icon / button only</small>
    </div>
  </div>

  <!-- 2. FONTS -->
  <h2 class="h2 sgh" style="font-family: var(--display); font-weight: 400; font-size: 28px; margin: 48px 0 18px; padding-top: 24px; border-top: 1px solid var(--line);">
    2. Fonts
  </h2>
  
  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b style="display: block; font-size: 14.5px; margin-bottom: 4px;">Headings</b>
      <span style="color: var(--mute); font-size: 13px; line-height: 1.55;">Playfair Display, regular 400. Page title 48 px desktop / 30 px phone. Homepage banner title 27 px on phone. Product name 36 px desktop / 22 px phone. Section title 32 px / 26 px.</span>
    </div>
    <div class="sgd">
      <span class="h1" style="margin: 0; font-family: var(--display); font-size: 36px;">Loose gemstones</span>
    </div>
  </div>

  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b style="display: block; font-size: 14.5px; margin-bottom: 4px;">Body text</b>
      <span style="color: var(--mute); font-size: 13px; line-height: 1.55;">Manrope 400, 14 px, line height 1.55. Grey #76706A for second text.</span>
    </div>
    <div class="sgd">
      <p style="margin: 0; font-size: 14px; line-height: 1.55;">Calibrated sizes, matched pairs and layouts.</p>
    </div>
  </div>

  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b style="display: block; font-size: 14.5px; margin-bottom: 4px;">Small labels</b>
      <span style="color: var(--mute); font-size: 13px; line-height: 1.55;">Manrope 700, 10.5 px, CAPITALS, letter spacing 0.2 em, gold.</span>
    </div>
    <div class="sgd">
      <span class="cap" style="font-size: 10.5px; letter-spacing: 0.2em; color: var(--gold); font-weight: 700; text-transform: uppercase;">Shop gemstones</span>
    </div>
  </div>

  <!-- 3. BUTTONS -->
  <h2 class="h2 sgh" style="font-family: var(--display); font-weight: 400; font-size: 28px; margin: 48px 0 18px; padding-top: 24px; border-top: 1px solid var(--line);">
    3. Buttons
  </h2>
  <p class="sgn" style="color: var(--mute); font-size: 13.5px; margin: 0 0 14px;">
    Square corners (radius 0) on every button. Text in CAPITALS, Manrope 700, 12 px, letter spacing 0.16 em. Same height on the same row. Never rounded, never shadows, never gradients.
  </p>

  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b>Main button</b>
      <span>Black #1C1A17, white text, padding 14 × 26 px. One main button per block (Add to cart, Get my price, Book a consultation). On phone: 44 px high, 11 px text.</span>
    </div>
    <div class="sgd">
      <button class="btn" type="button">Add to cart</button>
    </div>
  </div>

  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b>Second button</b>
      <span>Same size, transparent with a 1 px black border. Fills black on hover.</span>
    </div>
    <div class="sgd">
      <button class="btn o" type="button">Buy now</button>
    </div>
  </div>

  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b>Small button</b>
      <span>For cards: padding 10 × 16 px, 11 px text.</span>
    </div>
    <div class="sgd">
      <button class="btn sm" type="button">Add to cart</button>
    </div>
  </div>

  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b>Full-width button</b>
      <span>Forms, cart, checkout and the phone.</span>
    </div>
    <div class="sgd" style="max-width: 320px;">
      <button class="btn wide" type="button">Place order</button>
    </div>
  </div>

  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b>WhatsApp + Video call pair</b>
      <span>Two equal white buttons side by side under the main buttons, 1 px light border, icon + CAPITALS text 11.5 px. WhatsApp icon green. Border turns black on hover. Used on product, layout, bead and design pages and in Quick view.</span>
    </div>
    <div class="sgd" style="max-width: 440px;">
      <div class="act2">
        <a href="https://wa.me/919680552270" target="_blank">
          <svg class="i wa-icon" style="width: 17px; height: 17px; color: #1E9E52;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4.5 19.5l1.2-3.6A7.8 7.8 0 1 1 8.6 18.6z"/><path d="M9.3 9.2c.3 2.4 2.6 4.8 5.4 5.4l1.1-1.1-1.7-.9-.7.7c-1.1-.5-2-1.4-2.5-2.5l.7-.7-.9-1.7z"/>
          </svg>
          WHATSAPP INQUIRY
        </a>
        <a href="javascript:void(0);" onclick="openVideoCallModal();">
          <svg class="i" style="width: 17px; height: 17px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3.5" y="6.5" width="12" height="11" rx="2"/><path d="M15.5 10.5l5-3v9l-5-3"/>
          </svg>
          REQUEST VIDEO CALL
        </a>
      </div>
    </div>
  </div>

  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b>Wishlist button</b>
      <span>Square 52 px box, 1 px light border, thin heart icon. Sits at the end of the main buttons row.</span>
    </div>
    <div class="sgd">
      <div style="display: flex; gap: 10px; max-width: 420px; align-items: stretch;">
        <button class="btn" style="flex: 1;" type="button">Add to cart</button>
        <button class="btn o" style="flex: 1;" type="button">Buy now</button>
        <button class="wl" type="button" aria-label="Save to Wishlist">
          <svg class="i" style="width: 18px; height: 18px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b>Text link</b>
      <span>CAPITALS 11.5 px, thin underline. For "See stone", "Choose size", "Get my price" on cards.</span>
    </div>
    <div class="sgd">
      <a class="ul" href="<?php echo esc_url(home_url('/shop/')); ?>">See stone →</a>
    </div>
  </div>

  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b>Soft link</b>
      <span>13 px, semi-bold, thin underline. For "View all →", "Send your design →".</span>
    </div>
    <div class="sgd">
      <a class="ul2" href="<?php echo esc_url(home_url('/shop/')); ?>">View all →</a>
    </div>
  </div>

  <!-- 4. CHIPS AND CHOICES -->
  <h2 class="h2 sgh" style="font-family: var(--display); font-weight: 400; font-size: 28px; margin: 48px 0 18px; padding-top: 24px; border-top: 1px solid var(--line);">
    4. Chips and choices
  </h2>

  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b>Filter chips</b>
      <span>Rounded pill, 1 px light border, white, 12.5 px, count in grey. Chosen = black with white text.</span>
    </div>
    <div class="sgd">
      <div class="chips">
        <button type="button" class="chip on">Ruby<em>3</em></button>
        <button type="button" class="chip">Sapphire<em>2</em></button>
        <button type="button" class="chip">Emerald<em>1</em></button>
      </div>
    </div>
  </div>

  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b>Size and option chips</b>
      <span>Square corners, same border. Chosen = black. Used for sizes, metal, length.</span>
    </div>
    <div class="sgd">
      <div class="chips sq">
        <button type="button" class="chip">5×7</button>
        <button type="button" class="chip on">6×8</button>
        <button type="button" class="chip">7×9</button>
      </div>
    </div>
  </div>

  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b>Trust row</b>
      <span>Small ✓ items in one thin line under the buttons.</span>
    </div>
    <div class="sgd">
      <div class="trow" style="margin: 0; padding: 0; border: 0;">
        <span>✓ Ships in 1–2 days</span>
        <span>✓ Insured worldwide</span>
        <span>✓ Our guarantee</span>
      </div>
    </div>
  </div>

  <!-- 5. ICONS -->
  <h2 class="h2 sgh" style="font-family: var(--display); font-weight: 400; font-size: 28px; margin: 48px 0 18px; padding-top: 24px; border-top: 1px solid var(--line);">
    5. Icons
  </h2>
  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b>Line icons</b>
      <span>One icon set everywhere: thin outline icons, line 1.4 px, round ends, no fill. 18 px in buttons, 21 px in the header. Same set on desktop and phone.</span>
    </div>
    <div class="sgd">
      <div class="sgic" style="display: flex; flex-wrap: wrap; gap: 18px;">
        <span><svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="11" cy="11" r="6.5"/><path d="M16 16l4.5 4.5"/></svg><small>search</small></span>
        <span><svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="12" cy="8.5" r="3.8"/><path d="M4.5 20.5c1.2-3.8 4-5.6 7.5-5.6s6.3 1.8 7.5 5.6"/></svg><small>user</small></span>
        <span><svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/></svg><small>heart</small></span>
        <span><svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M5.5 8.5h13l-1 11.5h-11z"/><path d="M9 8.5V7a3 3 0 0 1 6 0v1.5"/></svg><small>bag</small></span>
        <span><svg class="i" viewBox="0 0 24 24" fill="none" stroke="#1E9E52" stroke-width="1.4"><path d="M4.5 19.5l1.2-3.6A7.8 7.8 0 1 1 8.6 18.6z"/><path d="M9.3 9.2c.3 2.4 2.6 4.8 5.4 5.4l1.1-1.1-1.7-.9-.7.7c-1.1-.5-2-1.4-2.5-2.5l.7-.7-.9-1.7z"/></svg><small>wa</small></span>
        <span><svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="3.5" y="6.5" width="12" height="11" rx="2"/><path d="M15.5 10.5l5-3v9l-5-3"/></svg><small>video</small></span>
        <span><svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M7 10l5 5 5-5"/></svg><small>down</small></span>
      </div>
    </div>
  </div>

  <!-- 6. FORMS -->
  <h2 class="h2 sgh" style="font-family: var(--display); font-weight: 400; font-size: 28px; margin: 48px 0 18px; padding-top: 24px; border-top: 1px solid var(--line);">
    6. Forms
  </h2>
  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl">
      <b>Fields</b>
      <span>Height 44 px, 1 px border #D9CFC0, white, square corners. Label above in small CAPITALS. Only name and WhatsApp are required.</span>
    </div>
    <div class="sgd" style="max-width: 340px;">
      <div class="f">
        <label>Your name</label>
        <input placeholder="Name" />
      </div>
    </div>
  </div>

  <!-- 7. SPACING & LAYOUT -->
  <h2 class="h2 sgh" style="font-family: var(--display); font-weight: 400; font-size: 28px; margin: 48px 0 18px; padding-top: 24px; border-top: 1px solid var(--line);">
    7. Spacing & layout
  </h2>
  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl"><b>Page width</b></div>
    <div class="sgd"><span style="color: var(--mute);">Content max 1280 px, 24 px side space on desktop, 16 px on phone.</span></div>
  </div>
  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl"><b>Sections</b></div>
    <div class="sgd"><span style="color: var(--mute);">72 px between homepage sections on desktop, 44 px on phone. Generous space, never crowded.</span></div>
  </div>
  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl"><b>Cards</b></div>
    <div class="sgd"><span style="color: var(--mute);">3 cards per row on shop pages (4 on the homepage), 2 per row on phone. Gap 22–26 px desktop, 12 px phone. White card, very light border, photo square on white/off-white.</span></div>
  </div>
  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl"><b>Product pages</b></div>
    <div class="sgd"><span style="color: var(--mute);">Two columns that end on the same line: photos + stone box on the left, buttons + accordion + bulk box on the right. On phone: photo, price, sizes, buttons, stone box, accordion.</span></div>
  </div>
  <div class="sgr" style="display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr); gap: 30px; padding: 18px 0; border-bottom: 1px solid var(--line); align-items: center;">
    <div class="sgl"><b>Phone bars</b></div>
    <div class="sgd"><span style="color: var(--mute);">Bottom bar 62 px: Shop · Search · WhatsApp · Wishlist, grey icons with labels. On product pages a buy bar sits just above it: main button + second button.</span></div>
  </div>

</div>

<?php
get_footer();
