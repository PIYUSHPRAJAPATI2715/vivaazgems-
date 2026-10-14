<?php
/**
 * Template Name: Layouts Page
 * Vivaaz Gems - Layouts, Matched Stone by Stone
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 1000px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">FOR JEWELLERS</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 14px; color: #1C1A17;">Layouts, matched stone by stone</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 780px; margin: 0 auto; line-height: 1.8;">
        Graduated lines and matched sets in ruby, spinel, blue topaz and other stones, sorted and colour-matched in Jaipur so a jeweller can set them straight away. Every layout is photographed as one set; some have a price, others are quoted.
      </p>
    </div>

    <!-- What a layout is -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 32px; margin-bottom: 32px;">
      <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">DEFINITION</span>
      <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 8px 0 12px; color: #1C1A17;">What a layout is</h2>
      <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0;">
        A set of stones chosen to sit together: a necklace line, a bracelet line, an earring pair or a three-stone set. Sizes step evenly and colours match across the whole set.
      </p>
    </div>

    <!-- POINT 12 SPEC: STONE / TYPE BUTTONS + LAYOUTS GRID -->
    <div class="layouts-showcase-section" style="margin-bottom: 50px;">
      
      <!-- Filter Controls: Stone & Type -->
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px; margin-bottom: 28px;">
        <!-- Stone Buttons -->
        <div style="margin-bottom: 16px;">
          <div style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin-bottom: 8px;">FILTER BY STONE</div>
          <div class="filter-buttons-wrap filter-stone-btns" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn active" data-stone="all" onclick="filterLayouts('stone', 'all', this)">All Stones</button>
            <button type="button" class="filter-pill-btn" data-stone="ruby" onclick="filterLayouts('stone', 'ruby', this)">Ruby</button>
            <button type="button" class="filter-pill-btn" data-stone="sapphire" onclick="filterLayouts('stone', 'sapphire', this)">Blue Sapphire</button>
            <button type="button" class="filter-pill-btn" data-stone="emerald" onclick="filterLayouts('stone', 'emerald', this)">Emerald</button>
            <button type="button" class="filter-pill-btn" data-stone="spinel" onclick="filterLayouts('stone', 'spinel', this)">Spinel</button>
            <button type="button" class="filter-pill-btn" data-stone="moonstone" onclick="filterLayouts('stone', 'moonstone', this)">Moonstone</button>
            <button type="button" class="filter-pill-btn" data-stone="topaz" onclick="filterLayouts('stone', 'topaz', this)">Blue Topaz</button>
          </div>
        </div>

        <!-- Type Buttons -->
        <div>
          <div style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin-bottom: 8px;">FILTER BY TYPE</div>
          <div class="filter-buttons-wrap filter-type-btns" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn active" data-type="all" onclick="filterLayouts('type', 'all', this)">All Types</button>
            <button type="button" class="filter-pill-btn" data-type="necklace" onclick="filterLayouts('type', 'necklace', this)">Necklace Lines</button>
            <button type="button" class="filter-pill-btn" data-type="bracelet" onclick="filterLayouts('type', 'bracelet', this)">Bracelet Lines</button>
            <button type="button" class="filter-pill-btn" data-type="earring" onclick="filterLayouts('type', 'earring', this)">Earring Pairs</button>
            <button type="button" class="filter-pill-btn" data-type="ring" onclick="filterLayouts('type', 'ring', this)">Three-Stone Sets</button>
          </div>
        </div>
      </div>

      <!-- Layouts Grid -->
      <div class="layouts-grid" id="vivaaz-layouts-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
        
        <!-- Card 1 -->
        <div class="product-card-luxury layout-item-card" data-stone="ruby" data-type="necklace">
          <div class="product-card-media">
            <span class="category-card-badge badge-gold">NECKLACE LINE · 21 PCS</span>
            <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Burmese Ruby Graduated Necklace Line">
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading" style="font-size: 14px; font-weight: 600; margin: 0 0 6px;">Burmese Ruby Graduated Necklace Line</h3>
            <div class="product-meta-sub" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">Graduated 4×6 to 9×11 mm · 21 stones · Unheated</div>
            <div class="product-price-row" style="font-size: 14px; font-weight: 700; color: #1C1A17; margin-bottom: 12px;">₹ 68,000 <span style="font-size: 11px; font-weight: 400; color: var(--color-text-muted);">set</span></div>
            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I am inquiring about the Burmese Ruby Graduated Necklace Line (code LY-RB-21).'); ?>" target="_blank" class="btn-underline-link" style="font-size: 11px; font-weight: 700; text-transform: uppercase;">INQUIRE THIS LAYOUT →</a>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="product-card-luxury layout-item-card" data-stone="sapphire" data-type="bracelet">
          <div class="product-card-media">
            <span class="category-card-badge badge-blue">BRACELET LINE · 27 PCS</span>
            <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Ceylon Sapphire Bracelet Line">
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading" style="font-size: 14px; font-weight: 600; margin: 0 0 6px;">Ceylon Sapphire Tennis Bracelet Line</h3>
            <div class="product-meta-sub" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">Calibrated 4×3 mm oval · 27 stones · Royal blue</div>
            <div class="product-price-row" style="font-size: 14px; font-weight: 700; color: #1C1A17; margin-bottom: 12px;">₹ 42,000 <span style="font-size: 11px; font-weight: 400; color: var(--color-text-muted);">set</span></div>
            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I am inquiring about the Ceylon Sapphire Tennis Bracelet Line (code LY-SP-27).'); ?>" target="_blank" class="btn-underline-link" style="font-size: 11px; font-weight: 700; text-transform: uppercase;">INQUIRE THIS LAYOUT →</a>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="product-card-luxury layout-item-card" data-stone="emerald" data-type="earring">
          <div class="product-card-media">
            <span class="category-card-badge badge-gold">MATCHED PAIR · OCTAGON</span>
            <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Zambian Emerald Matched Earring Pair">
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading" style="font-size: 14px; font-weight: 600; margin: 0 0 6px;">Zambian Emerald Matched Earring Pair</h3>
            <div class="product-meta-sub" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">7×5 mm octagon cut · 2.8 ct total · Matched color</div>
            <div class="product-price-row" style="font-size: 14px; font-weight: 700; color: #1C1A17; margin-bottom: 12px;">₹ 24,000 <span style="font-size: 11px; font-weight: 400; color: var(--color-text-muted);">pair</span></div>
            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I am inquiring about the Zambian Emerald Matched Earring Pair (code LY-EM-02).'); ?>" target="_blank" class="btn-underline-link" style="font-size: 11px; font-weight: 700; text-transform: uppercase;">INQUIRE THIS LAYOUT →</a>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="product-card-luxury layout-item-card" data-stone="moonstone" data-type="ring">
          <div class="product-card-media">
            <span class="category-card-badge badge-gold">3-STONE SET · CABOCHON</span>
            <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone 3-Stone Ring Set">
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading" style="font-size: 14px; font-weight: 600; margin: 0 0 6px;">Rainbow Moonstone 3-Stone Ring Set</h3>
            <div class="product-meta-sub" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">1x 8×10 mm center + 2x 6×8 mm sides · Blue flash</div>
            <div class="product-price-row" style="font-size: 14px; font-weight: 700; color: #1C1A17; margin-bottom: 12px;">₹ 850 <span style="font-size: 11px; font-weight: 400; color: var(--color-text-muted);">set</span></div>
            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I am inquiring about the Rainbow Moonstone 3-Stone Ring Set (code LY-MS-03).'); ?>" target="_blank" class="btn-underline-link" style="font-size: 11px; font-weight: 700; text-transform: uppercase;">INQUIRE THIS LAYOUT →</a>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="product-card-luxury layout-item-card" data-stone="spinel" data-type="necklace">
          <div class="product-card-media">
            <span class="category-card-badge badge-blue">NECKLACE LINE · 19 PCS</span>
            <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Pastel Spinel Graduated Ombre Line" style="filter: hue-rotate(330deg);">
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading" style="font-size: 14px; font-weight: 600; margin: 0 0 6px;">Pastel Spinel Graduated Ombré Line</h3>
            <div class="product-meta-sub" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">Graduated 4×5 to 8×10 mm · Pink, lavender, silver</div>
            <div class="product-price-row" style="font-size: 14px; font-weight: 700; color: #1C1A17; margin-bottom: 12px;">₹ 38,000 <span style="font-size: 11px; font-weight: 400; color: var(--color-text-muted);">set</span></div>
            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I am inquiring about the Pastel Spinel Graduated Line (code LY-SP-19).'); ?>" target="_blank" class="btn-underline-link" style="font-size: 11px; font-weight: 700; text-transform: uppercase;">INQUIRE THIS LAYOUT →</a>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="product-card-luxury layout-item-card" data-stone="topaz" data-type="bracelet">
          <div class="product-card-media">
            <span class="category-card-badge badge-gold">TENNIS LINE · 32 PCS</span>
            <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Swiss Blue Topaz Tennis Line">
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading" style="font-size: 14px; font-weight: 600; margin: 0 0 6px;">Swiss Blue Topaz Tennis Bracelet Line</h3>
            <div class="product-meta-sub" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">4 mm round diamond cut · 32 stones · Vivid blue</div>
            <div class="product-price-row" style="font-size: 14px; font-weight: 700; color: #1C1A17; margin-bottom: 12px;">₹ 5,400 <span style="font-size: 11px; font-weight: 400; color: var(--color-text-muted);">set</span></div>
            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I am inquiring about the Swiss Blue Topaz Tennis Bracelet Line (code LY-TP-32).'); ?>" target="_blank" class="btn-underline-link" style="font-size: 11px; font-weight: 700; text-transform: uppercase;">INQUIRE THIS LAYOUT →</a>
          </div>
        </div>

      </div>

    </div>

    <script>
    var currentLayoutStone = 'all';
    var currentLayoutType = 'all';

    function filterLayouts(filterKind, filterVal, btn) {
      if (filterKind === 'stone') {
        currentLayoutStone = filterVal;
        document.querySelectorAll('.filter-stone-btns .filter-pill-btn').forEach(function(b) { b.classList.remove('active'); });
      } else if (filterKind === 'type') {
        currentLayoutType = filterVal;
        document.querySelectorAll('.filter-type-btns .filter-pill-btn').forEach(function(b) { b.classList.remove('active'); });
      }
      btn.classList.add('active');

      var cards = document.querySelectorAll('.layout-item-card');
      cards.forEach(function(card) {
        var cardStone = card.getAttribute('data-stone');
        var cardType = card.getAttribute('data-type');
        var matchStone = (currentLayoutStone === 'all' || cardStone === currentLayoutStone);
        var matchType = (currentLayoutType === 'all' || cardType === currentLayoutType);
        if (matchStone && matchType) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    }

    // Auto-select filter if query param ?stone=... exists
    document.addEventListener('DOMContentLoaded', function() {
      var params = new URLSearchParams(window.location.search);
      var stoneParam = params.get('stone');
      if (stoneParam) {
        var targetBtn = document.querySelector('.filter-stone-btns .filter-pill-btn[data-stone="' + stoneParam.toLowerCase() + '"]');
        if (targetBtn) targetBtn.click();
      }
    });
    </script>

    <!-- 4-Step Process Strip -->
    <div style="margin-bottom: 40px;">
      <div style="text-align: center; margin-bottom: 24px;">
        <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">WORKFLOW</span>
        <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 24px; margin: 6px 0 0; color: #1C1A17;">How it works</h2>
      </div>

      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px;">
        <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px 16px; text-align: center;">
          <div style="font-size: 22px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">1</div>
          <div style="font-size: 13px; font-weight: 700; text-transform: uppercase; margin-bottom: 8px;">Choose or send</div>
          <div style="font-size: 12px; color: #76706A; line-height: 1.6;">Pick a layout here, or send us your design or your stone.</div>
        </div>

        <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px 16px; text-align: center;">
          <div style="font-size: 22px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">2</div>
          <div style="font-size: 13px; font-weight: 700; text-transform: uppercase; margin-bottom: 8px;">We match</div>
          <div style="font-size: 12px; color: #76706A; line-height: 1.6;">Sorted by colour, size and clarity, laid out and photographed.</div>
        </div>

        <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px 16px; text-align: center;">
          <div style="font-size: 22px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">3</div>
          <div style="font-size: 13px; font-weight: 700; text-transform: uppercase; margin-bottom: 8px;">You approve</div>
          <div style="font-size: 12px; color: #76706A; line-height: 1.6;">Photos and a video on WhatsApp before we pack.</div>
        </div>

        <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px 16px; text-align: center;">
          <div style="font-size: 22px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">4</div>
          <div style="font-size: 13px; font-weight: 700; text-transform: uppercase; margin-bottom: 8px;">Insured delivery</div>
          <div style="font-size: 12px; color: #76706A; line-height: 1.6;">Repeat orders of the same layout on request.</div>
        </div>
      </div>
    </div>

    <!-- Matching Box (Anchor #match) -->
    <div id="match" style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 40px; margin-bottom: 32px;">
      <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">CUSTOM MATCHING DESK</span>
      <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 26px; margin: 8px 0 12px; color: #1C1A17;">Have a stone or a design? We match it.</h3>
      <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin-bottom: 24px;">
        Send a photo and the size of your stone, or your design. We match it from our stock in Jaipur or Bangkok and send you photos of the set before you decide.
      </p>

      <form action="https://wa.me/919680552270" method="get" target="_blank" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Stone *</label>
          <input type="text" name="stone" required placeholder="e.g. Ruby, Blue Sapphire, Spinel" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Shape and size *</label>
          <input type="text" name="shape_size" required placeholder="e.g. Oval graduated 4x6 to 8x10 mm" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Number of stones or length</label>
          <input type="text" name="count" placeholder="e.g. 17 stones or 16-inch line" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Your WhatsApp *</label>
          <input type="tel" name="phone" required placeholder="+91 98765 43210" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div style="grid-column: 1 / -1;">
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Notes or CAD details</label>
          <textarea name="notes" rows="3" placeholder="Tell us about the project, deadlines, or attach your drawing on WhatsApp..." style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;"></textarea>
        </div>

        <div style="grid-column: 1 / -1; display: flex; gap: 12px; margin-top: 8px;">
          <button type="submit" class="btn-square-dark" style="flex: 1; padding: 15px; background: #1C1A17; color: #FFFFFF; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; border: none; cursor: pointer;">
            SEND YOUR DESIGN →
          </button>
          <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello, I have a stone to match. Sending a photo and the size.'); ?>" target="_blank" class="btn-outline-dark" style="flex: 1; padding: 15px; background: #FFFFFF; color: #1C1A17; border: 1px solid #1C1A17; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; text-align: center; text-decoration: none;">
            MATCH MY STONE →
          </a>
        </div>
      </form>
    </div>

  </div>
</div>

<?php
get_footer('shop');
