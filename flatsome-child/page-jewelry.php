<?php
/**
 * Template Name: Jewelry Page
 * Vivaaz Gems - Jewelry (Made to Order)
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 1000px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">MADE TO ORDER</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 14px; color: #1C1A17;">Jewelry, made for you.</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 780px; margin: 0 auto; line-height: 1.8;">
        Every piece here is made to order with our own natural stones, in 925 silver, 14K or 18K gold. Choose a design you like, tell us the stone, metal and size, and we send you a quote and a making time. Anything can be changed: a different stone, a longer chain, your own idea.
      </p>
    </div>

    <!-- POINT 13 SPEC: TYPE / STONE / METAL BUTTONS + DESIGNS GRID WITH GET MY PRICE -->
    <div class="jewelry-showcase-section" style="margin-bottom: 50px;">
      
      <!-- Filter Controls: Type, Stone, Metal -->
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px; margin-bottom: 28px;">
        <!-- Type Buttons -->
        <div style="margin-bottom: 16px;">
          <div style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin-bottom: 8px;">JEWELRY TYPE</div>
          <div class="filter-buttons-wrap filter-jtype-btns" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn active" data-type="all" onclick="filterJewelry('type', 'all', this)">All Types</button>
            <button type="button" class="filter-pill-btn" data-type="ring" onclick="filterJewelry('type', 'ring', this)">Rings</button>
            <button type="button" class="filter-pill-btn" data-type="earring" onclick="filterJewelry('type', 'earring', this)">Earrings</button>
            <button type="button" class="filter-pill-btn" data-type="pendant" onclick="filterJewelry('type', 'pendant', this)">Pendants & Necklaces</button>
            <button type="button" class="filter-pill-btn" data-type="bracelet" onclick="filterJewelry('type', 'bracelet', this)">Tennis Bracelets</button>
          </div>
        </div>

        <!-- Stone Buttons -->
        <div style="margin-bottom: 16px;">
          <div style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin-bottom: 8px;">STONE</div>
          <div class="filter-buttons-wrap filter-jstone-btns" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn active" data-stone="all" onclick="filterJewelry('stone', 'all', this)">All Stones</button>
            <button type="button" class="filter-pill-btn" data-stone="sapphire" onclick="filterJewelry('stone', 'sapphire', this)">Blue Sapphire</button>
            <button type="button" class="filter-pill-btn" data-stone="ruby" onclick="filterJewelry('stone', 'ruby', this)">Ruby</button>
            <button type="button" class="filter-pill-btn" data-stone="emerald" onclick="filterJewelry('stone', 'emerald', this)">Emerald</button>
            <button type="button" class="filter-pill-btn" data-stone="moonstone" onclick="filterJewelry('stone', 'moonstone', this)">Moonstone</button>
            <button type="button" class="filter-pill-btn" data-stone="topaz" onclick="filterJewelry('stone', 'topaz', this)">Blue Topaz</button>
          </div>
        </div>

        <!-- Metal Buttons -->
        <div>
          <div style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin-bottom: 8px;">METAL</div>
          <div class="filter-buttons-wrap filter-jmetal-btns" style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="filter-pill-btn active" data-metal="all" onclick="filterJewelry('metal', 'all', this)">All Metals</button>
            <button type="button" class="filter-pill-btn" data-metal="silver" onclick="filterJewelry('metal', 'silver', this)">925 Silver</button>
            <button type="button" class="filter-pill-btn" data-metal="yellow-gold" onclick="filterJewelry('metal', 'yellow-gold', this)">14K / 18K Yellow Gold</button>
            <button type="button" class="filter-pill-btn" data-metal="white-gold" onclick="filterJewelry('metal', 'white-gold', this)">18K White Gold</button>
          </div>
        </div>
      </div>

      <!-- Designs Grid -->
      <div class="jewelry-designs-grid" id="vivaaz-jewelry-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
        
        <!-- Design 1 -->
        <div class="product-card-luxury jewelry-item-card" data-type="ring" data-stone="sapphire" data-metal="white-gold">
          <div class="product-card-media">
            <span class="category-card-badge badge-blue">SOLITAIRE RING</span>
            <img src="<?php echo esc_url(vivaaz_get_img_url('ceylon-sapphire.jpg')); ?>" alt="Ceylon Sapphire Solitaire Ring">
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading" style="font-size: 14px; font-weight: 600; margin: 0 0 4px;">Ceylon Sapphire Solitaire Ring</h3>
            <div class="product-meta-sub" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">2.4 ct oval Ceylon sapphire · 18K White Gold</div>
            <div style="font-size: 12px; color: #76706A; margin-bottom: 12px; line-height: 1.5;">Hand-forged four-prong claw setting with custom shank sizing.</div>
            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, please send me a quote for the Ceylon Sapphire Solitaire Ring in 18K White Gold (code JW-SP-01).'); ?>" target="_blank" class="btn-square-dark" style="display: inline-block; padding: 10px 16px; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; background: #1C1A17; color: #FFFFFF; text-decoration: none;">GET MY PRICE →</a>
          </div>
        </div>

        <!-- Design 2 -->
        <div class="product-card-luxury jewelry-item-card" data-type="pendant" data-stone="ruby" data-metal="yellow-gold">
          <div class="product-card-media">
            <span class="category-card-badge badge-gold">HALO PENDANT</span>
            <img src="<?php echo esc_url(vivaaz_get_img_url('ruby.jpg')); ?>" alt="Burmese Ruby Diamond Halo Pendant">
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading" style="font-size: 14px; font-weight: 600; margin: 0 0 4px;">Burmese Ruby Diamond Halo Pendant</h3>
            <div class="product-meta-sub" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">1.8 ct unheated ruby · 14K Yellow Gold · Diamond halo</div>
            <div style="font-size: 12px; color: #76706A; margin-bottom: 12px; line-height: 1.5;">Vivid pigeon blood luster with 16 micro-set natural diamonds.</div>
            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, please send me a quote for the Burmese Ruby Diamond Halo Pendant in 14K Gold (code JW-RB-02).'); ?>" target="_blank" class="btn-square-dark" style="display: inline-block; padding: 10px 16px; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; background: #1C1A17; color: #FFFFFF; text-decoration: none;">GET MY PRICE →</a>
          </div>
        </div>

        <!-- Design 3 -->
        <div class="product-card-luxury jewelry-item-card" data-type="earring" data-stone="emerald" data-metal="yellow-gold">
          <div class="product-card-media">
            <span class="category-card-badge badge-gold">STUD EARRINGS</span>
            <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Zambian Emerald Stud Earrings">
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading" style="font-size: 14px; font-weight: 600; margin: 0 0 4px;">Zambian Emerald Octagon Studs</h3>
            <div class="product-meta-sub" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">2x 1.2 ct octagons (2.4 ct tw) · 18K Yellow Gold</div>
            <div style="font-size: 12px; color: #76706A; margin-bottom: 12px; line-height: 1.5;">Clean architectural double-gallery basket setting with screw backs.</div>
            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, please send me a quote for the Zambian Emerald Studs in 18K Gold (code JW-EM-03).'); ?>" target="_blank" class="btn-square-dark" style="display: inline-block; padding: 10px 16px; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; background: #1C1A17; color: #FFFFFF; text-decoration: none;">GET MY PRICE →</a>
          </div>
        </div>

        <!-- Design 4 -->
        <div class="product-card-luxury jewelry-item-card" data-type="ring" data-stone="moonstone" data-metal="silver">
          <div class="product-card-media">
            <span class="category-card-badge badge-gold">BEZEL RING</span>
            <img src="<?php echo esc_url(vivaaz_get_img_url('moonstone.jpg')); ?>" alt="Rainbow Moonstone Bezel Statement Ring">
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading" style="font-size: 14px; font-weight: 600; margin: 0 0 4px;">Rainbow Moonstone Bezel Ring</h3>
            <div class="product-meta-sub" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">12×16 mm oval cabochon · 925 Sterling Silver</div>
            <div style="font-size: 12px; color: #76706A; margin-bottom: 12px; line-height: 1.5;">Sleek flush bezel protecting the stone with glowing adularescence.</div>
            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, please send me a quote for the Rainbow Moonstone Bezel Ring in 925 Silver (code JW-MS-04).'); ?>" target="_blank" class="btn-square-dark" style="display: inline-block; padding: 10px 16px; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; background: #1C1A17; color: #FFFFFF; text-decoration: none;">GET MY PRICE →</a>
          </div>
        </div>

        <!-- Design 5 -->
        <div class="product-card-luxury jewelry-item-card" data-type="bracelet" data-stone="topaz" data-metal="white-gold">
          <div class="product-card-media">
            <span class="category-card-badge badge-blue">TENNIS BRACELET</span>
            <img src="<?php echo esc_url(vivaaz_get_img_url('swiss-topaz.jpg')); ?>" alt="Swiss Blue Topaz Tennis Bracelet">
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading" style="font-size: 14px; font-weight: 600; margin: 0 0 4px;">Swiss Blue Topaz Tennis Bracelet</h3>
            <div class="product-meta-sub" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">32x 4 mm round stones · 14K White Gold · 7 in</div>
            <div style="font-size: 12px; color: #76706A; margin-bottom: 12px; line-height: 1.5;">Continuous flexible 4-prong link with double security clasp.</div>
            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, please send me a quote for the Swiss Blue Topaz Tennis Bracelet (code JW-TP-05).'); ?>" target="_blank" class="btn-square-dark" style="display: inline-block; padding: 10px 16px; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; background: #1C1A17; color: #FFFFFF; text-decoration: none;">GET MY PRICE →</a>
          </div>
        </div>

        <!-- Design 6 -->
        <div class="product-card-luxury jewelry-item-card" data-type="ring" data-stone="emerald" data-metal="yellow-gold">
          <div class="product-card-media">
            <span class="category-card-badge badge-gold">TRILOGY RING</span>
            <img src="<?php echo esc_url(vivaaz_get_img_url('emerald.jpg')); ?>" alt="Emerald & Diamond Trilogy Ring">
          </div>
          <div class="product-card-body">
            <h3 class="product-title-heading" style="font-size: 14px; font-weight: 600; margin: 0 0 4px;">Emerald & Diamond Trilogy Ring</h3>
            <div class="product-meta-sub" style="font-size: 11px; color: var(--color-text-muted); margin-bottom: 8px;">1.5 ct center emerald + 2 side diamonds · 18K Gold</div>
            <div style="font-size: 12px; color: #76706A; margin-bottom: 12px; line-height: 1.5;">Symbolizing past, present and future with vivid green brilliance.</div>
            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, please send me a quote for the Emerald & Diamond Trilogy Ring in 18K Gold (code JW-TR-06).'); ?>" target="_blank" class="btn-square-dark" style="display: inline-block; padding: 10px 16px; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; background: #1C1A17; color: #FFFFFF; text-decoration: none;">GET MY PRICE →</a>
          </div>
        </div>

      </div>

    </div>

    <script>
    var currentJType = 'all';
    var currentJStone = 'all';
    var currentJMetal = 'all';

    function filterJewelry(filterKind, filterVal, btn) {
      if (filterKind === 'type') {
        currentJType = filterVal;
        document.querySelectorAll('.filter-jtype-btns .filter-pill-btn').forEach(function(b) { b.classList.remove('active'); });
      } else if (filterKind === 'stone') {
        currentJStone = filterVal;
        document.querySelectorAll('.filter-jstone-btns .filter-pill-btn').forEach(function(b) { b.classList.remove('active'); });
      } else if (filterKind === 'metal') {
        currentJMetal = filterVal;
        document.querySelectorAll('.filter-jmetal-btns .filter-pill-btn').forEach(function(b) { b.classList.remove('active'); });
      }
      btn.classList.add('active');

      var cards = document.querySelectorAll('.jewelry-item-card');
      cards.forEach(function(card) {
        var cardType = card.getAttribute('data-type');
        var cardStone = card.getAttribute('data-stone');
        var cardMetal = card.getAttribute('data-metal');
        var matchType = (currentJType === 'all' || cardType === currentJType);
        var matchStone = (currentJStone === 'all' || cardStone === currentJStone);
        var matchMetal = (currentJMetal === 'all' || cardMetal === currentJMetal);
        if (matchType && matchStone && matchMetal) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    }
    </script>

    <!-- How it works (4 steps) -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px; margin-bottom: 40px;">
      <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">THE PROCESS</span>
      <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 24px; margin: 8px 0 20px; color: #1C1A17;">How it works</h2>

      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; text-align: center;">
        <div style="background: #FAF7F2; padding: 20px 12px;">
          <div style="font-size: 20px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">1</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; margin-bottom: 6px;">Ask for quote</div>
          <div style="font-size: 11px; color: #76706A;">On any design or your idea.</div>
        </div>
        <div style="background: #FAF7F2; padding: 20px 12px;">
          <div style="font-size: 20px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">2</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; margin-bottom: 6px;">Confirm details</div>
          <div style="font-size: 11px; color: #76706A;">Stone, metal, size, price & making time.</div>
        </div>
        <div style="background: #FAF7F2; padding: 20px 12px;">
          <div style="font-size: 20px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">3</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; margin-bottom: 6px;">Crafting</div>
          <div style="font-size: 11px; color: #76706A;">Made in 3–4 weeks with photos before dispatch.</div>
        </div>
        <div style="background: #FAF7F2; padding: 20px 12px;">
          <div style="font-size: 20px; font-weight: 700; color: #9C7C4C; margin-bottom: 6px;">4</div>
          <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; margin-bottom: 6px;">Insured delivery</div>
          <div style="font-size: 11px; color: #76706A;">Ships insured with stone passport.</div>
        </div>
      </div>
    </div>

    <!-- Size Guide Card -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 32px; margin-bottom: 40px;">
      <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">SIZE GUIDE</span>
      <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 8px 0 16px; color: #1C1A17;">Standard dimensions & measuring</h3>
      
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; font-size: 13px; line-height: 1.8; color: #4A4640;">
        <div>
          <strong>Bracelet lengths:</strong><br>
          6.5 in (16.5 cm) · 7 in (17.8 cm) · 7.5 in (19 cm)
        </div>
        <div>
          <strong>Necklace lengths:</strong><br>
          16 in (40 cm) · 18 in (45 cm) · 20 in (50 cm)
        </div>
        <div style="grid-column: 1 / -1; border-top: 1px solid #EBE7DF; padding-top: 14px; font-size: 12px; color: #76706A;">
          <strong>How to measure your wrist:</strong> Wrap a strip of paper around it, mark where it meets, measure it and add about 1.5 cm for a comfortable fit. Not sure? Ask us on WhatsApp.
        </div>
      </div>
    </div>

    <!-- Request a Quote Form -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px; margin-bottom: 32px;">
      <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 24px; margin: 0 0 8px; color: #1C1A17;">Request a Jewelry Quote</h3>
      <p style="font-size: 12px; color: #76706A; margin-bottom: 24px;">
        Free to ask · Quick reply on WhatsApp · Free changes before making · No payment until you say yes
      </p>

      <form action="https://wa.me/919680552270" method="get" target="_blank" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Stone Preference</label>
          <input type="text" name="stone" placeholder="e.g. Ruby, Ceylon Sapphire, Emerald" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Metal</label>
          <select name="metal" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
            <option value="925 Silver">925 Silver</option>
            <option value="14K Gold">14K Gold</option>
            <option value="18K Gold">18K Gold</option>
          </select>
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Size or Length</label>
          <input type="text" name="size_length" placeholder="e.g. Ring size US 7 or 18-inch necklace" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Your Name *</label>
          <input type="text" name="name" required placeholder="Your name" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div style="grid-column: 1 / -1;">
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Your WhatsApp Number *</label>
          <input type="tel" name="phone" required placeholder="+91 98765 43210" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div style="grid-column: 1 / -1;">
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Message or changes you want</label>
          <textarea name="text" rows="3" placeholder="Describe the piece or idea you would like us to craft..." style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;"></textarea>
        </div>

        <div style="grid-column: 1 / -1; margin-top: 8px;">
          <button type="submit" class="btn-square-dark" style="width: 100%; padding: 15px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; border: none; cursor: pointer;">
            SEND REQUEST →
          </button>
        </div>
      </form>
    </div>

    <!-- Link to Make It Into Jewelry -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 24px; text-align: center; font-size: 13px;">
      Want something not shown here? <a href="<?php echo esc_url(home_url('/make-it-into-jewelry/')); ?>" style="color: #9C7C4C; font-weight: 700; text-decoration: underline;">See Make it into jewelry →</a>
    </div>

  </div>
</div>

<?php
get_footer('shop');
