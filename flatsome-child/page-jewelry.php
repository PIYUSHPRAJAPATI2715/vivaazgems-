<?php
/**
 * Template Name: Jewelry Page
 * Vivaaz Gems - Jewelry, made for you.
 * Strictly matches Client Demo Screenshots & Vivaaz-Website-Desktop-Demo (1).html 100%.
 */

defined('ABSPATH') || exit;

get_header('shop');

// Load gem images from json or fallback
$gem_json_path = get_stylesheet_directory() . '/gem-images-data.json';
$gem_imgs = array();
if (file_exists($gem_json_path)) {
    $gem_imgs = json_decode(file_get_contents($gem_json_path), true);
}

// 7 exact jewelry designs from client demo & screenshots
$jewelry_designs = array(
    array(
        'id'          => 'j1',
        'code'        => 'VJ-001',
        'type'        => 'Tennis bracelets',
        'stone'       => 'ruby',
        'stone_label' => 'Ruby',
        'metal'       => array('925 Silver', '14K Gold', '18K Gold'),
        'name'        => 'Ruby Tennis Bracelet',
        'guide'       => array(24000, 68000),
        'guide_str'   => '₹24,000 – ₹68,000',
        'gold'        => false,
        'filter'      => '',
        'neck'        => false,
        'desc'        => 'A continuous line of matched natural ruby, each stone set close to the next so the bracelet reads as one line of colour. Made in our partner workshop with stones from our own lots.',
        'stones_spec' => 'Ruby or spinel, 2 to 4 mm',
        'length_spec' => '6.5 · 7 · 7.5 in, or your size',
        'example'     => '7 in, 3 mm stones, 925 silver ≈ ₹24,000 · in 14K Gold ≈ ₹52,000'
    ),
    array(
        'id'          => 'j2',
        'code'        => 'VJ-002',
        'type'        => 'Tennis bracelets',
        'stone'       => 'spinel',
        'stone_label' => 'Spinel',
        'metal'       => array('14K Gold', '18K Gold'),
        'name'        => 'Pink Spinel Tennis Bracelet',
        'guide'       => array(52000, 110000),
        'guide_str'   => '₹52,000 – ₹1,10,000',
        'gold'        => true,
        'filter'      => 'hue-rotate(-18deg) saturate(.75) brightness(1.2)',
        'neck'        => false,
        'desc'        => 'A continuous line of matched natural pink spinel, each stone set close to the next so the bracelet reads as one line of colour. Made in our partner workshop with stones from our own lots.',
        'stones_spec' => 'Pink spinel, 2 to 4 mm',
        'length_spec' => '6.5 · 7 · 7.5 in, or your size',
        'example'     => '7 in, 3 mm stones, 14K gold ≈ ₹52,000 · in 18K Gold ≈ ₹1,10,000'
    ),
    array(
        'id'          => 'j3',
        'code'        => 'VJ-003',
        'type'        => 'Tennis bracelets',
        'stone'       => 'sapphire',
        'stone_label' => 'Sapphire',
        'metal'       => array('925 Silver', '14K Gold'),
        'name'        => 'Blue Sapphire Tennis Bracelet',
        'guide'       => array(26000, 72000),
        'guide_str'   => '₹26,000 – ₹72,000',
        'gold'        => false,
        'filter'      => '',
        'neck'        => false,
        'desc'        => 'A continuous line of matched natural blue sapphire, each stone set close to the next so the bracelet reads as one line of colour. Made in our partner workshop with stones from our own lots.',
        'stones_spec' => 'Blue sapphire, 2 to 4 mm',
        'length_spec' => '6.5 · 7 · 7.5 in, or your size',
        'example'     => '7 in, 3 mm stones, 925 silver ≈ ₹26,000 · in 14K Gold ≈ ₹58,000'
    ),
    array(
        'id'          => 'j4',
        'code'        => 'VJ-004',
        'type'        => 'Tennis necklaces',
        'stone'       => 'ruby',
        'stone_label' => 'Ruby',
        'metal'       => array('925 Silver', '18K Gold'),
        'name'        => 'Ruby Tennis Necklace',
        'guide'       => array(68000, 240000),
        'guide_str'   => '₹68,000 – ₹2,40,000',
        'gold'        => false,
        'filter'      => '',
        'neck'        => true,
        'desc'        => 'A continuous line of matched natural ruby, each stone set close to the next so the necklace reads as one line of colour. Made in our partner workshop with stones from our own lots.',
        'stones_spec' => 'Ruby or spinel, 2 to 4 mm',
        'length_spec' => '16 · 18 · 20 in, or your size',
        'example'     => '18 in, 3 mm stones, 925 silver ≈ ₹68,000 · in 18K Gold ≈ ₹2,40,000'
    ),
    array(
        'id'          => 'j5',
        'code'        => 'VJ-005',
        'type'        => 'Tennis bracelets',
        'stone'       => 'emerald',
        'stone_label' => 'Emerald',
        'metal'       => array('14K Gold', '18K Gold'),
        'name'        => 'Emerald Tennis Bracelet',
        'guide'       => array(38000, 125000),
        'guide_str'   => '₹38,000 – ₹1,25,000',
        'gold'        => true,
        'filter'      => '',
        'neck'        => false,
        'desc'        => 'A continuous line of matched natural emerald, each stone set close to the next so the bracelet reads as one line of colour. Made in our partner workshop with stones from our own lots.',
        'stones_spec' => 'Emerald, 2 to 4 mm',
        'length_spec' => '6.5 · 7 · 7.5 in, or your size',
        'example'     => '7 in, 3 mm stones, 14K gold ≈ ₹38,000 · in 18K Gold ≈ ₹82,000'
    ),
    array(
        'id'          => 'j6',
        'code'        => 'VJ-006',
        'type'        => 'Tennis necklaces',
        'stone'       => 'spinel',
        'stone_label' => 'Spinel',
        'metal'       => array('925 Silver', '14K Gold'),
        'name'        => 'Spinel Tennis Necklace',
        'guide'       => array(60000, 180000),
        'guide_str'   => '₹60,000 – ₹1,80,000',
        'gold'        => false,
        'filter'      => 'hue-rotate(-18deg) saturate(.75) brightness(1.2)',
        'neck'        => true,
        'desc'        => 'A continuous line of matched natural spinel, each stone set close to the next so the necklace reads as one line of colour. Made in our partner workshop with stones from our own lots.',
        'stones_spec' => 'Spinel, 2 to 4 mm',
        'length_spec' => '16 · 18 · 20 in, or your size',
        'example'     => '18 in, 3 mm stones, 925 silver ≈ ₹60,000 · in 14K Gold ≈ ₹1,25,000'
    ),
    array(
        'id'          => 'j7',
        'code'        => 'VJ-007',
        'type'        => 'Tennis bracelets',
        'stone'       => 'other',
        'stone_label' => 'Other stones',
        'metal'       => array('925 Silver', '14K Gold'),
        'name'        => 'Rainbow Spinel Bracelet',
        'guide'       => array(22000, 64000),
        'guide_str'   => '₹22,000 – ₹64,000',
        'gold'        => false,
        'filter'      => '',
        'neck'        => false,
        'desc'        => 'A continuous line of matched multi-colour natural spinel and gems, each stone set close to the next so the bracelet reads as a vivid rainbow of colour.',
        'stones_spec' => 'Multi-colour natural spinel, 2 to 4 mm',
        'length_spec' => '6.5 · 7 · 7.5 in, or your size',
        'example'     => '7 in, 3 mm stones, 925 silver ≈ ₹22,000 · in 14K Gold ≈ ₹48,000'
    )
);

// Helper function to render jewelry stone artwork matching client demo 100%
if (!function_exists('vivaaz_render_tennis_art_php')) {
    function vivaaz_render_tennis_art_php($j, $scale = 1, $gem_imgs = array()) {
        $neck = !empty($j['neck']);
        $is_gold = !empty($j['gold']);
        $metal = $is_gold ? '#D9B66F' : '#D6D6D6';
        $n = $neck ? 34 : 30;
        $o = '<div class="lay" style="position: relative; width: 100%; height: 100%;">';
        
        $multi = array('ruby', 'sapphire', 'emerald', 'spinel', 'amethyst', 'topaz');
        
        for ($k = 0; $k < $n; $k++) {
            if ($neck) {
                $t = $k / ($n - 1);
                $a = M_PI * (0.08 + 0.84 * $t);
                $x = 50 - 40 * cos($a);
                $y = 16 + 52 * sin($a);
                $z = 15 * $scale;
            } else {
                $a = 2 * M_PI * $k / $n;
                $x = 50 + 36 * cos($a);
                $y = 50 + 25 * sin($a);
                $z = 18 * $scale;
            }
            
            $stKey = ($j['stone'] === 'other') ? $multi[$k % 6] : $j['stone'];
            $raw_photo = $stKey;
            $filter = '';
            
            if ($stKey === 'spinel') {
                $raw_photo = 'ruby';
                $filter = 'hue-rotate(-18deg) saturate(.75) brightness(1.2)';
            }
            
            $img_src = isset($gem_imgs[$raw_photo]) ? $gem_imgs[$raw_photo] : '';
            if (empty($img_src)) {
                $img_src = vivaaz_get_img_url('ruby.jpg');
            }
            
            $border_w = round(1.6 * $scale, 1);
            $half_z = round($z / 2, 1);
            $x_rnd = round($x, 2);
            $y_rnd = round($y, 2);
            $z_rnd = round($z, 1);
            
            $o .= '<div class="gm" style="position: absolute; border-radius: 50%; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,.2); left: calc(' . $x_rnd . '% - ' . $half_z . 'px); top: calc(' . $y_rnd . '% - ' . $half_z . 'px); width: ' . $z_rnd . 'px; height: ' . $z_rnd . 'px; border: ' . $border_w . 'px solid ' . $metal . ';">';
            $o .= '<img src="' . esc_url($img_src) . '" alt="gem" style="width: 100%; height: 100%; object-fit: cover; transform: scale(2.3);' . ($filter ? ' filter: ' . $filter . ';' : '') . '">';
            $o .= '</div>';
        }
        
        $o .= '</div>';
        return $o;
    }
}
?>

<div id="vivaaz-jew-page" class="vivaaz-jew-page">
  <div class="wrap">
    
    <!-- ================= 1. LISTING VIEW ================= -->
    <div id="jew-listing-view">
      
      <!-- Breadcrumbs -->
      <div class="crumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> › <b id="jew-crumb-title">Jewelry</b>
      </div>

      <!-- Hero Section with Title & Right Info Box -->
      <div class="lhead">
        <div>
          <h1 class="h1" id="jew-hero-h1">Jewelry, made for you.</h1>
          <p class="lead" id="jew-hero-lead">
            Every piece here is made to order with our own natural stones, in 925 silver, 14K or 18K gold. Choose a design you like, tell us the stone, metal and size, and we send you a quote and a making time. Anything can be changed: a different stone, a longer chain, your own idea.
          </p>
        </div>
        <div class="nsbox">
          <span class="cap">A price guide on every design</span>
          <p style="margin:6px 0 0">Free to ask · Quick reply on WhatsApp · Free changes before making · No payment until you say yes</p>
        </div>
      </div>

      <!-- Top Type Filter Chips -->
      <div class="chips" style="margin-top:24px" id="jew-type-chips">
        <button type="button" class="chip lg on" data-type="" onclick="jewFilterType('', this)">All <em>7</em></button>
        <button type="button" class="chip lg" data-type="Tennis bracelets" onclick="jewFilterType('Tennis bracelets', this)">Tennis bracelets <em>5</em></button>
        <button type="button" class="chip lg" data-type="Tennis necklaces" onclick="jewFilterType('Tennis necklaces', this)">Tennis necklaces <em>2</em></button>
      </div>

      <!-- Divider Bar: Count + Chosen Chips + Sort -->
      <div class="bar">
        <div class="chosen" id="jew-chosen-bar">
          <span id="jew-total-count">7 designs</span>
          <!-- Dynamic removal tags appear here -->
        </div>
        <div style="font-size: 13px; color: var(--mute);">
          Sort: 
          <select class="sort" id="jew-sort-select" onchange="jewApplySort(this.value)" style="border:0;background:transparent;font-weight:600;color:var(--ink);cursor:pointer;padding:2px 4px;">
            <option value="newest">Newest</option>
            <option value="plh">Price low to high</option>
            <option value="phl">Price high to low</option>
          </select>
        </div>
      </div>

      <!-- Main Layout: Sidebar (260px) + 3-Column Grid -->
      <div class="lmain">
        
        <!-- Left Sidebar -->
        <aside class="side">
          <div class="cap"><span>Stone</span></div>
          <div class="chips" id="jew-side-stone-chips">
            <button type="button" class="chip" data-stone="ruby" onclick="jewToggleStone('ruby', this)">Ruby <em id="cnt-st-ruby">2</em></button>
            <button type="button" class="chip" data-stone="spinel" onclick="jewToggleStone('spinel', this)">Spinel <em id="cnt-st-spinel">2</em></button>
            <button type="button" class="chip" data-stone="sapphire" onclick="jewToggleStone('sapphire', this)">Sapphire <em id="cnt-st-sapphire">1</em></button>
            <button type="button" class="chip" data-stone="emerald" onclick="jewToggleStone('emerald', this)">Emerald <em id="cnt-st-emerald">1</em></button>
            <button type="button" class="chip" data-stone="other" onclick="jewToggleStone('other', this)">Other stones <em id="cnt-st-other">1</em></button>
          </div>

          <hr>

          <div class="cap"><span>Metal</span></div>
          <div class="chips" id="jew-side-metal-chips">
            <button type="button" class="chip" data-metal="925 Silver" onclick="jewToggleMetal('925 Silver', this)">925 Silver <em id="cnt-mt-silver">5</em></button>
            <button type="button" class="chip" data-metal="14K Gold" onclick="jewToggleMetal('14K Gold', this)">14K Gold <em id="cnt-mt-14k">6</em></button>
            <button type="button" class="chip" data-metal="18K Gold" onclick="jewToggleMetal('18K Gold', this)">18K Gold <em id="cnt-mt-18k">4</em></button>
          </div>

          <hr>

          <!-- Make it into jewelry callout card -->
          <div style="background:var(--ink);color:#fff;padding:20px;">
            <b style="font-family:var(--display);font-weight:400;font-size:19px;display:block;">Make it into jewelry</b>
            <p style="font-size:12.5px;color:#cfc6b8;margin:6px 0 12px;line-height:1.5;">Choose any stone from our shop and we set it in silver or gold.</p>
            <button type="button" class="ul" style="color:#fff;" onclick="jewOpenQuoteModal('Make it into jewelry')">Ask for a quote →</button>
          </div>
        </aside>

        <!-- Right Grid Content -->
        <div>
          <div class="grid" id="jew-product-grid">
            <?php foreach ($jewelry_designs as $j) : ?>
              <div class="card rv jew-card-item" 
                   data-id="<?php echo esc_attr($j['id']); ?>" 
                   data-type="<?php echo esc_attr($j['type']); ?>" 
                   data-stone="<?php echo esc_attr($j['stone']); ?>" 
                   data-metals="<?php echo esc_attr(implode(',', $j['metal'])); ?>"
                   data-price-min="<?php echo esc_attr($j['guide'][0]); ?>">
                
                <!-- Product Media / Gem Artwork -->
                <div class="ph" style="background:#F4F2EE" onclick="jewGoDetail('<?php echo esc_js($j['id']); ?>')">
                  <?php echo vivaaz_render_tennis_art_php($j, 1, $gem_imgs); ?>
                  <span class="tag">Made to order</span>
                  <button type="button" class="qv" onclick="event.stopPropagation(); jewGoDetail('<?php echo esc_js($j['id']); ?>')">QUICK VIEW</button>
                </div>
                
                <!-- Wishlist Heart -->
                <button type="button" class="heart" onclick="jewToggleWish(this, '<?php echo esc_js($j['id']); ?>')" aria-label="Save to wishlist">
                  <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12 19.5s-7.5-4.6-7.5-10.1A4.1 4.1 0 0 1 12 7.2a4.1 4.1 0 0 1 7.5 2.2c0 5.5-7.5 10.1-7.5 10.1z"/>
                  </svg>
                </button>

                <!-- Card Body -->
                <div class="cb">
                  <div class="nm" onclick="jewGoDetail('<?php echo esc_js($j['id']); ?>')"><?php echo esc_html($j['name']); ?></div>
                  <div class="dt"><?php echo esc_html($j['stone_label']); ?><br><?php echo esc_html(implode(' · ', $j['metal'])); ?></div>
                  <div class="pr" style="font-weight:600;font-size:14.5px;">Price guide <?php echo esc_html($j['guide_str']); ?></div>
                  <div class="act">
                    <button type="button" class="ul" onclick="jewOpenQuoteModal('<?php echo esc_js($j['name']); ?>')">Get my price →</button>
                  </div>
                </div>

              </div>
            <?php endforeach; ?>
          </div>

          <!-- Empty match placeholder -->
          <div id="jew-empty-msg" class="empty" style="display:none; grid-column:1/-1; padding:60px; text-align:center; color:var(--mute); background:var(--paper); border:1px solid var(--line);">
            No designs match the selected filters.
          </div>

          <!-- Load More Section -->
          <div class="more" id="jew-load-more-wrap">
            <span style="font-size:12.5px;color:var(--soft);" id="jew-showing-counter">Showing 7 of 12</span>
            <div class="prog"><i style="width:60%"></i></div>
            <button type="button" class="btn o" onclick="jewShowToast('More items load here, without leaving the page')">Load more</button>
          </div>
        </div>

      </div>

      <!-- Bottom Callout Band -->
      <div class="band">
        <div>
          <h3>Have your own idea?</h3>
          <p>Choose any stone from our shop and we set it in silver or gold for you.</p>
        </div>
        <div class="b">
          <a class="ul2" onclick="jewOpenQuoteModal('Make it into jewelry')">Make it into jewelry →</a>
        </div>
      </div>

    </div>

    <!-- ================= 2. DESIGN DETAIL VIEW ================= -->
    <div id="jew-detail-view" style="display:none;">
      
      <!-- Detail Breadcrumbs -->
      <div class="crumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> › 
        <a href="javascript:void(0)" onclick="jewBackToList()">Jewelry</a> › 
        <a href="javascript:void(0)" id="detail-crumb-type" onclick="jewBackToListType()">Tennis bracelets</a> › 
        <b id="detail-crumb-name">Ruby Tennis Bracelet</b>
      </div>

      <!-- 2-Column Product Detail Layout -->
      <div class="pd">
        
        <!-- Left: Large Gem Artwork & Thumbnails -->
        <div>
          <div class="mainimg" id="detail-mainimg" style="background:#F4F2EE;">
            <!-- Big 2x gem art will be populated here -->
            <div id="detail-gem-art-box" style="width:100%;height:100%;"></div>
          </div>
          <div class="thumbs" id="detail-thumbs">
            <button type="button" class="on" aria-label="Video"><span style="font-size:12px;">▶ 0:08</span></button>
            <button type="button" style="background:#F4F2EE" aria-label="Photo 1"><div id="thumb-art-1" style="width:100%;height:100%;"></div></button>
            <button type="button" style="background:#F4F2EE" aria-label="Photo 2"><div id="thumb-art-2" style="width:100%;height:100%;"></div></button>
            <button type="button" style="background:#F4F2EE" aria-label="Photo 3"><div id="thumb-art-3" style="width:100%;height:100%;"></div></button>
            <button type="button" style="background:#F4F2EE" aria-label="Photo 4"><div id="thumb-art-4" style="width:100%;height:100%;"></div></button>
          </div>
        </div>

        <!-- Right: Design Specs & Price Guide -->
        <div>
          <span class="eye" id="detail-code-tag">DESIGN VJ-001 · MADE TO ORDER</span>
          <h1 class="pt" id="detail-title">Ruby Tennis Bracelet</h1>
          <p style="color:var(--mute);line-height:1.6;" id="detail-desc">
            A continuous line of matched natural ruby, each stone set close to the next so the bracelet reads as one line of colour. Made in our partner workshop with stones from our own lots.
          </p>

          <!-- Specs Info Box -->
          <div class="ibox">
            <div><span>STONES</span><span id="detail-spec-stones">Ruby or spinel, 2 to 4 mm</span></div>
            <div><span>METAL</span><span id="detail-spec-metal">925 Silver · 14K Gold · 18K Gold</span></div>
            <div><span>LENGTH</span><span id="detail-spec-length">6.5 · 7 · 7.5 in, or your size</span></div>
            <div><span>MAKING TIME</span>About 3 to 4 weeks</div>
          </div>

          <!-- Price Guide Box with Examples -->
          <div class="pgbox">
            <div style="display:flex;justify-content:space-between;align-items:baseline;gap:10px;flex-wrap:wrap;">
              <span class="cap">Price guide</span>
              <b id="detail-guide-price" style="font-size:24px;font-weight:500;">₹24,000 – ₹68,000</b>
            </div>
            <p id="detail-guide-desc">
              Depends on the stone, metal and length. For example: <b id="detail-guide-example">7 in, 3 mm stones, 925 silver ≈ ₹24,000 · in 14K Gold ≈ ₹52,000</b>.
            </p>
          </div>

          <!-- Action Buttons -->
          <div class="pbtns" style="grid-template-columns: 1fr 1fr; margin-top:22px;">
            <button type="button" class="btn" id="detail-btn-price" onclick="jewOpenQuoteCurrent()">Get my price</button>
            <button type="button" class="btn o" id="detail-btn-quote" onclick="jewOpenQuoteCurrent()">Request a quote</button>
          </div>

          <!-- 4 Guarantees -->
          <div class="prom">
            <div><b>Free to ask</b><span>no cost, no obligation</span></div>
            <div><b>Quick reply</b><span>on WhatsApp</span></div>
            <div><b>Free changes</b><span>before making</span></div>
            <div><b>No payment</b><span>until you say yes</span></div>
          </div>
        </div>

      </div>

      <!-- How it Works Section -->
      <section class="sec" style="padding-bottom:0;padding-top:56px;">
        <div class="sech">
          <h2 class="h2">How it works</h2>
        </div>
        <div class="steps4">
          <div class="rv">
            <i>STEP 1</i>
            <b>Ask for a quote</b>
            <span>Tell us stone, metal and size.</span>
          </div>
          <div class="rv">
            <i>STEP 2</i>
            <b>We confirm</b>
            <span>Price and making time, on WhatsApp.</span>
          </div>
          <div class="rv">
            <i>STEP 3</i>
            <b>We make it</b>
            <span>Photos before it ships.</span>
          </div>
          <div class="rv">
            <i>STEP 4</i>
            <b>Delivered</b>
            <span>Insured, with stone details.</span>
          </div>
        </div>
      </section>

      <!-- Bottom Band -->
      <div class="band">
        <div>
          <h3>Have your own idea?</h3>
          <p>Choose any stone from our shop and we set it in silver or gold for you.</p>
        </div>
        <div class="b">
          <a class="ul2" onclick="jewOpenQuoteModal('Make it into jewelry')">Make it into jewelry →</a>
        </div>
      </div>

    </div>

  </div>
</div>

<!-- ================= 3. QUOTE / "GET MY PRICE" MODAL ================= -->
<div id="jew-modal-wrap" style="display:none;">
  <div class="scrim" onclick="jewCloseQuoteModal()"></div>
  <div class="modal" role="dialog" aria-label="Request Quote">
    <button type="button" class="x" onclick="jewCloseQuoteModal()" aria-label="Close">
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
        <path d="M6.5 6.5l11 11M17.5 6.5l-11 11"/>
      </svg>
    </button>
    
    <div id="jew-modal-form-content">
      <h3 id="modal-heading-title" style="font-family:var(--display);font-weight:400;font-size:32px;margin:0 0 4px;padding-right:30px;">Get my price</h3>
      <p class="sub" style="color:var(--mute);margin-bottom:20px;">Quick and free to ask. No payment until you say yes.</p>
      
      <form id="jew-quote-form" onsubmit="jewSubmitQuoteForm(event)">
        <!-- Item Badge -->
        <div id="modal-design-badge" class="note" style="margin-bottom:14px;background:var(--sand);font-size:12.5px;padding:11px 14px;color:#4a443d;font-weight:600;">
          Ruby Tennis Bracelet
        </div>

        <div class="fg">
          <!-- Metal Chips -->
          <div class="f full">
            <label>Metal</label>
            <div class="chips" id="modal-metal-chips">
              <button type="button" class="chip lg on" onclick="jewSelectModalChip(this, 'metal')">925 Silver</button>
              <button type="button" class="chip lg" onclick="jewSelectModalChip(this, 'metal')">14K Gold</button>
              <button type="button" class="chip lg" onclick="jewSelectModalChip(this, 'metal')">18K Gold</button>
            </div>
          </div>

          <!-- Size or Length Chips -->
          <div class="f full">
            <label>Size or length</label>
            <div class="chips" id="modal-size-chips">
              <button type="button" class="chip lg" onclick="jewSelectModalChip(this, 'size')">6.5 in</button>
              <button type="button" class="chip lg on" onclick="jewSelectModalChip(this, 'size')">7 in</button>
              <button type="button" class="chip lg" onclick="jewSelectModalChip(this, 'size')">7.5 in</button>
              <button type="button" class="chip lg" onclick="jewSelectModalChip(this, 'size')">Ring size</button>
              <button type="button" class="chip lg" onclick="jewSelectModalChip(this, 'size')">Other</button>
            </div>
          </div>

          <!-- Contact Inputs -->
          <div class="f">
            <label for="modal-input-name">Your name</label>
            <input id="modal-input-name" placeholder="Your name" required>
          </div>
          <div class="f">
            <label for="modal-input-phone">WhatsApp</label>
            <input id="modal-input-phone" placeholder="+91 96805 52270" required>
          </div>
          <div class="f full">
            <label for="modal-input-notes">Anything else?</label>
            <textarea id="modal-input-notes" placeholder="Budget, timeline, a different stone"></textarea>
          </div>
        </div>

        <button type="submit" class="btn wide" style="margin-top:16px;">Send request</button>
      </form>
    </div>

    <!-- Done Screen -->
    <div id="jew-modal-done-content" style="display:none;text-align:center;padding:20px 0;">
      <div class="tick" style="width:56px;height:56px;border-radius:50%;background:var(--ok);color:#fff;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;font-size:26px;">✓</div>
      <h3 style="font-family:var(--display);font-weight:400;font-size:28px;margin:0 0 6px;">Request sent.</h3>
      <p class="sub" style="color:var(--mute);margin-bottom:20px;">We will message you on WhatsApp. Asking is free and there is no obligation.</p>
      <button type="button" class="btn" onclick="jewCloseQuoteModal()">Done</button>
    </div>

  </div>
</div>

<!-- ================= 4. STYLES ================= -->
<style>
:root {
  --bg: #FAF7F2;
  --paper: #FFFFFF;
  --ink: #1C1A17;
  --mute: #76706A;
  --soft: #9A9186;
  --line: #E8E1D6;
  --line2: #DDD3C5;
  --gold: #9B7C4E;
  --gold2: #B8955F;
  --sand: #F1EBE1;
  --ok: #3E7B4F;
  --warn: #C2412D;
  --display: 'Playfair Display', Georgia, 'Times New Roman', serif;
  --body: 'Manrope', 'Segoe UI', Helvetica, Arial, sans-serif;
  color-scheme: light;
}

#vivaaz-jew-page {
  background: var(--bg);
  color: var(--ink);
  font-family: var(--body);
  font-size: 14px;
  line-height: 1.55;
  padding-bottom: 80px;
  min-height: 80vh;
}

#vivaaz-jew-page * {
  box-sizing: border-box;
}

#vivaaz-jew-page button {
  cursor: pointer;
  background: none;
  border: 0;
  padding: 0;
  font: inherit;
  color: inherit;
}

#vivaaz-jew-page a {
  color: inherit;
  text-decoration: none;
  cursor: pointer;
}

#vivaaz-jew-page .wrap {
  max-width: 1280px;
  margin: 0 auto;
  padding-left: max(24px, env(safe-area-inset-left, 0px));
  padding-right: max(24px, env(safe-area-inset-right, 0px));
}

#vivaaz-jew-page .crumb {
  font-size: 12.5px;
  color: var(--soft);
  display: flex;
  gap: 8px;
  align-items: center;
  flex-wrap: wrap;
  padding-top: 28px;
}
#vivaaz-jew-page .crumb a:hover { color: var(--ink); }
#vivaaz-jew-page .crumb b { color: var(--ink); font-weight: 500; }

#vivaaz-jew-page .lhead {
  display: grid;
  grid-template-columns: minmax(0, 1fr) 340px;
  gap: 40px;
  align-items: start;
  margin-top: 14px;
}
#vivaaz-jew-page .h1 {
  font-family: var(--display);
  font-weight: 400;
  font-size: clamp(32px, 4vw, 48px);
  line-height: 1.1;
  margin: 8px 0 12px;
  color: var(--ink);
}
#vivaaz-jew-page .h2 {
  font-family: var(--display);
  font-weight: 400;
  font-size: clamp(24px, 2.6vw, 32px);
  line-height: 1.2;
  margin: 6px 0 0;
  color: var(--ink);
}
#vivaaz-jew-page .lead {
  color: var(--mute);
  font-size: 15px;
  max-width: 62ch;
  margin: 0;
  line-height: 1.6;
}
#vivaaz-jew-page .cap {
  font-size: 10.5px;
  letter-spacing: .2em;
  color: var(--gold);
  font-weight: 700;
  text-transform: uppercase;
}

#vivaaz-jew-page .nsbox {
  background: var(--paper);
  border: 1px solid var(--line);
  padding: 18px 20px;
  font-size: 13px;
  margin-top: 8px;
}

#vivaaz-jew-page .chips {
  display: flex;
  flex-wrap: wrap;
  gap: 7px;
}
#vivaaz-jew-page .chip {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  border: 1px solid var(--line2);
  border-radius: 999px;
  padding: 6px 13px;
  font-size: 12.5px;
  background: var(--paper);
  color: #3b362f;
  transition: all .15s;
  white-space: nowrap;
}
#vivaaz-jew-page .chip em {
  font-style: normal;
  color: var(--soft);
  font-size: 11.5px;
}
#vivaaz-jew-page .chip:hover {
  border-color: var(--ink);
}
#vivaaz-jew-page .chip.on {
  background: var(--ink);
  color: var(--paper);
  border-color: var(--ink);
}
#vivaaz-jew-page .chip.on em {
  color: #cfc6b8;
}
#vivaaz-jew-page .chip.lg {
  padding: 9px 18px;
  font-size: 13px;
}

#vivaaz-jew-page .bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 14px;
  margin-top: 28px;
  padding: 14px 0;
  border-top: 1px solid var(--line);
  border-bottom: 1px solid var(--line);
  font-size: 13px;
  color: var(--mute);
  flex-wrap: wrap;
}
#vivaaz-jew-page .chosen {
  display: flex;
  gap: 8px;
  align-items: center;
  flex-wrap: wrap;
}
#vivaaz-jew-page .chosen .x {
  background: #EFE8DD;
  border-radius: 999px;
  padding: 5px 10px 5px 12px;
  font-size: 12px;
  color: #3b362f;
  display: inline-flex;
  align-items: center;
  gap: 6px;
}
#vivaaz-jew-page .chosen .x svg {
  width: 12px;
  height: 12px;
}

#vivaaz-jew-page .lmain {
  display: grid;
  grid-template-columns: 260px minmax(0, 1fr);
  gap: 46px;
  padding-top: 30px;
  align-items: start;
}
#vivaaz-jew-page .side hr {
  border: 0;
  border-top: 1px solid var(--line);
  margin: 22px 0;
}
#vivaaz-jew-page .side .cap {
  margin-bottom: 12px;
  display: flex;
  justify-content: space-between;
}

#vivaaz-jew-page .grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 26px 22px;
}
#vivaaz-jew-page .card {
  position: relative;
  background: var(--paper);
  border: 1px solid #EFE9E0;
  display: flex;
  flex-direction: column;
  transition: box-shadow .3s;
}
#vivaaz-jew-page .card:hover {
  box-shadow: 0 18px 40px rgba(28,26,23,.08);
}
#vivaaz-jew-page .card .ph {
  position: relative;
  aspect-ratio: 1/1;
  background: #F4F2EE;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}
#vivaaz-jew-page .card .tag {
  position: absolute;
  left: 14px;
  top: 14px;
  background: var(--paper);
  font-size: 10px;
  letter-spacing: .16em;
  font-weight: 700;
  padding: 5px 8px;
  text-transform: uppercase;
  z-index: 2;
  color: var(--ink);
}
#vivaaz-jew-page .heart {
  position: absolute;
  right: 14px;
  top: 14px;
  width: 34px;
  height: 34px;
  border-radius: 50%;
  background: var(--paper);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
  transition: transform .2s;
}
#vivaaz-jew-page .heart:hover {
  transform: scale(1.1);
}
#vivaaz-jew-page .heart.on svg {
  fill: var(--warn);
  stroke: var(--warn);
}
#vivaaz-jew-page .qv {
  position: absolute;
  left: 14px;
  right: 14px;
  bottom: 14px;
  background: rgba(255,255,255,.95);
  text-align: center;
  padding: 10px;
  font-size: 11px;
  letter-spacing: .16em;
  font-weight: 700;
  opacity: 0;
  transform: translateY(8px);
  transition: all .25s;
  z-index: 3;
}
#vivaaz-jew-page .card:hover .qv {
  opacity: 1;
  transform: none;
}
#vivaaz-jew-page .card .cb {
  padding: 18px 20px 20px;
  display: flex;
  flex-direction: column;
  gap: 4px;
  flex: 1;
}
#vivaaz-jew-page .card .nm {
  font-family: var(--display);
  font-size: 19px;
  line-height: 1.25;
  cursor: pointer;
}
#vivaaz-jew-page .card .dt {
  font-size: 12.5px;
  color: var(--soft);
  line-height: 1.4;
}
#vivaaz-jew-page .card .pr {
  margin-top: 8px;
  font-size: 14.5px;
  font-weight: 600;
  color: var(--ink);
}
#vivaaz-jew-page .card .act {
  margin-top: auto;
  padding-top: 14px;
  display: flex;
  gap: 16px;
  align-items: center;
}
#vivaaz-jew-page .ul {
  font-size: 11.5px;
  letter-spacing: .16em;
  font-weight: 700;
  text-transform: uppercase;
  border-bottom: 1px solid currentColor;
  padding-bottom: 2px;
}

#vivaaz-jew-page .more {
  text-align: center;
  padding: 44px 0 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 14px;
}
#vivaaz-jew-page .prog {
  width: 220px;
  height: 2px;
  background: var(--line);
  position: relative;
}
#vivaaz-jew-page .prog i {
  position: absolute;
  left: 0;
  top: 0;
  height: 2px;
  background: var(--ink);
}

#vivaaz-jew-page .band {
  background: var(--sand);
  padding: 36px 44px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 24px;
  flex-wrap: wrap;
  margin-top: 70px;
}
#vivaaz-jew-page .band h3 {
  font-family: var(--display);
  font-weight: 400;
  font-size: 26px;
  margin: 0 0 6px;
}
#vivaaz-jew-page .band p {
  margin: 0;
  color: var(--mute);
}
#vivaaz-jew-page .band .b {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
}
#vivaaz-jew-page .ul2 {
  font-size: 13px;
  font-weight: 600;
  border-bottom: 1px solid currentColor;
  padding-bottom: 2px;
  cursor: pointer;
}

/* Detail page styling */
#vivaaz-jew-page .pd {
  display: grid;
  grid-template-columns: minmax(0,1fr) minmax(0,1fr);
  gap: 60px;
  padding-top: 24px;
  align-items: start;
}
#vivaaz-jew-page .mainimg {
  aspect-ratio: 1/1;
  background: #F4F2EE;
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}
#vivaaz-jew-page .thumbs {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 8px;
  margin-top: 10px;
}
#vivaaz-jew-page .thumbs button {
  aspect-ratio: 1/1;
  background: #F4F2EE;
  border: 1px solid transparent;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}
#vivaaz-jew-page .thumbs button.on {
  border-color: var(--ink);
}
#vivaaz-jew-page .pt {
  font-family: var(--display);
  font-weight: 400;
  font-size: 36px;
  line-height: 1.15;
  margin: 8px 0 6px;
}
#vivaaz-jew-page .ibox {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 14px 20px;
  background: var(--sand);
  padding: 18px 20px;
  margin-top: 18px;
  font-size: 14px;
}
#vivaaz-jew-page .ibox span {
  display: block;
  font-size: 10px;
  letter-spacing: .14em;
  color: var(--soft);
  margin-bottom: 2px;
}
#vivaaz-jew-page .pgbox {
  border: 1px solid #E2D7C6;
  background: #FBF8F3;
  padding: 16px 20px;
  margin-top: 14px;
}
#vivaaz-jew-page .pgbox b {
  font-size: 24px;
  font-weight: 500;
}
#vivaaz-jew-page .pgbox p {
  margin: 8px 0 0;
  font-size: 12.5px;
  color: var(--mute);
}
#vivaaz-jew-page .pbtns {
  display: grid;
  gap: 10px;
  margin-top: 22px;
}
#vivaaz-jew-page .btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  background: var(--ink);
  color: var(--paper);
  padding: 14px 26px;
  font-size: 12px;
  letter-spacing: .16em;
  font-weight: 700;
  text-transform: uppercase;
  border: 1px solid var(--ink);
  transition: background .2s;
}
#vivaaz-jew-page .btn:hover {
  background: #3a352f;
}
#vivaaz-jew-page .btn.o {
  background: transparent;
  color: var(--ink);
}
#vivaaz-jew-page .btn.o:hover {
  background: var(--ink);
  color: var(--paper);
}
#vivaaz-jew-page .prom {
  display: grid;
  grid-template-columns: repeat(4, minmax(0,1fr));
  gap: 12px;
  margin-top: 16px;
}
#vivaaz-jew-page .prom div {
  border-top: 1px solid var(--line);
  padding-top: 8px;
}
#vivaaz-jew-page .prom b {
  display: block;
  font-size: 13.5px;
  font-weight: 600;
}
#vivaaz-jew-page .prom span {
  font-size: 11.5px;
  color: var(--soft);
}
#vivaaz-jew-page .sec {
  padding-block: 72px;
}
#vivaaz-jew-page .sech {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  gap: 20px;
  margin-bottom: 28px;
  flex-wrap: wrap;
}
#vivaaz-jew-page .steps4 {
  display: grid;
  grid-template-columns: repeat(4, minmax(0,1fr));
  gap: 18px;
}
#vivaaz-jew-page .steps4 div {
  background: var(--paper);
  border: 1px solid var(--line);
  padding: 22px;
}
#vivaaz-jew-page .steps4 b {
  display: block;
  font-family: var(--display);
  font-weight: 400;
  font-size: 20px;
  margin: 6px 0;
}
#vivaaz-jew-page .steps4 span {
  font-size: 13px;
  color: var(--mute);
}
#vivaaz-jew-page .steps4 i {
  font-style: normal;
  font-size: 11px;
  letter-spacing: .18em;
  color: var(--gold);
  font-weight: 700;
}

/* Modals */
.scrim {
  position: fixed;
  inset: 0;
  background: rgba(28,26,23,.5);
  z-index: 99998;
  animation: fade .2s;
}
@keyframes fade { from { opacity: 0; } }

.modal {
  position: fixed;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  width: min(640px, calc(100% - 32px));
  max-height: calc(100% - 48px);
  overflow: auto;
  background: #FFFDF9;
  z-index: 99999;
  padding: 34px 40px 30px;
  box-shadow: 0 30px 80px rgba(0,0,0,.3);
  animation: pop .25s ease;
}
@keyframes pop { from { opacity: 0; transform: translate(-50%,-46%); } }

.modal .x {
  position: absolute;
  right: 22px;
  top: 22px;
  border: 0;
  background: none;
  cursor: pointer;
}
.modal .x svg {
  width: 18px;
  height: 18px;
}
.fg {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px 14px;
}
.fg .full {
  grid-column: 1/-1;
}
.f label {
  display: block;
  font-size: 10.5px;
  letter-spacing: .18em;
  font-weight: 700;
  margin-bottom: 6px;
  text-transform: uppercase;
}
.f input, .f select, .f textarea {
  width: 100%;
  border: 1px solid #D9CFC0;
  height: 44px;
  padding: 0 13px;
  background: var(--paper);
  font: inherit;
  color: inherit;
}
.f textarea {
  height: 80px;
  padding: 10px 13px;
  resize: vertical;
}

.toast {
  position: fixed;
  left: 50%;
  bottom: 28px;
  transform: translateX(-50%);
  background: var(--ink);
  color: #fff;
  padding: 12px 20px;
  font-size: 13px;
  z-index: 999999;
  border-radius: 4px;
  box-shadow: 0 10px 30px rgba(0,0,0,.2);
  animation: pop2 .25s ease;
}
@keyframes pop2 { from { opacity: 0; transform: translate(-50%, 10px); } }

/* Responsive adjustments */
@media (max-width: 1000px) {
  #vivaaz-jew-page .lhead, #vivaaz-jew-page .pd, #vivaaz-jew-page .lmain {
    grid-template-columns: minmax(0,1fr);
  }
  #vivaaz-jew-page .grid {
    grid-template-columns: repeat(2, minmax(0,1fr));
  }
  #vivaaz-jew-page .steps4, #vivaaz-jew-page .prom {
    grid-template-columns: repeat(2, minmax(0,1fr));
  }
}
@media (max-width: 640px) {
  #vivaaz-jew-page .grid {
    grid-template-columns: minmax(0,1fr);
  }
  #vivaaz-jew-page .modal {
    padding: 24px 20px;
  }
  #vivaaz-jew-page .fg {
    grid-template-columns: 1fr;
  }
  #vivaaz-jew-page .steps4, #vivaaz-jew-page .prom {
    grid-template-columns: 1fr;
  }
}
</style>

<!-- ================= 5. JAVASCRIPT ================= -->
<script src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/js/jewelry-art.js'); ?>"></script>
<script>
(function() {
  // Designs array matching PHP data
  const JEW_DATA = <?php echo json_encode($jewelry_designs); ?>;
  
  // Stone definitions
  const STONES_DEF = {
    ruby: { name: 'Ruby', photo: 'ruby', f: '' },
    sapphire: { name: 'Sapphire', photo: 'sapphire', f: '' },
    emerald: { name: 'Emerald', photo: 'emerald', f: '' },
    spinel: { name: 'Spinel', photo: 'ruby', f: 'hue-rotate(-18deg) saturate(.75) brightness(1.2)' },
    amethyst: { name: 'Amethyst', photo: 'amethyst', f: '' },
    topaz: { name: 'Topaz', photo: 'topaz', f: '' },
    other: { name: 'Other stones', photo: 'amethyst', f: 'hue-rotate(120deg) saturate(.6)' }
  };

  // State object
  const state = {
    type: '',
    stone: null,
    metal: null,
    sort: 'newest',
    wish: new Set(),
    activeDesign: null,
    modalDesignName: 'Ruby Tennis Bracelet'
  };

  // Helper: Format Money
  function money(v) {
    return '₹' + Math.round(v).toLocaleString('en-IN');
  }

  // Helper: Render Stone Artwork (SVG/CSS)
  function renderTennisArt(j, scale = 1, isNecklace = false) {
    const neck = isNecklace || (j.type === 'Tennis necklaces');
    const metal = j.gold ? '#D9B66F' : '#D6D6D6';
    const n = neck ? 34 : 30;
    const multi = ['ruby', 'sapphire', 'emerald', 'spinel', 'amethyst', 'topaz'];
    
    let html = '<div class="lay" style="position: relative; width: 100%; height: 100%;">';
    const gemImgMap = window.VIVAAZ_JEW_IMG || {};

    for (let k = 0; k < n; k++) {
      let x, y, z;
      if (neck) {
        const t = k / (n - 1);
        const a = Math.PI * (0.08 + 0.84 * t);
        x = 50 - 40 * Math.cos(a);
        y = 16 + 52 * Math.sin(a);
        z = 15 * scale;
      } else {
        const a = 2 * Math.PI * k / n;
        x = 50 + 36 * Math.cos(a);
        y = 50 + 25 * Math.sin(a);
        z = 18 * scale;
      }

      const stKey = (j.stone === 'other') ? multi[k % 6] : j.stone;
      const def = STONES_DEF[stKey] || STONES_DEF.ruby;
      const rawSrc = gemImgMap[def.photo] || '';
      const filter = def.f || '';

      const borderW = (1.6 * scale).toFixed(1);
      const halfZ = (z / 2).toFixed(1);
      const xRnd = x.toFixed(2);
      const yRnd = y.toFixed(2);
      const zRnd = z.toFixed(1);

      html += '<div class="gm" style="position: absolute; border-radius: 50%; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,.2); left: calc(' + xRnd + '% - ' + halfZ + 'px); top: calc(' + yRnd + '% - ' + halfZ + 'px); width: ' + zRnd + 'px; height: ' + zRnd + 'px; border: ' + borderW + 'px solid ' + metal + ';">';
      html += '<img src="' + rawSrc + '" alt="gem" style="width: 100%; height: 100%; object-fit: cover; transform: scale(2.3);' + (filter ? ' filter: ' + filter + ';' : '') + '">';
      html += '</div>';
    }

    html += '</div>';
    return html;
  }

  // Filter Functions
  window.jewFilterType = function(typeVal, btn) {
    state.type = typeVal;
    
    // Update active pill
    document.querySelectorAll('#jew-type-chips .chip').forEach(c => c.classList.remove('on'));
    if (btn) btn.classList.add('on');

    // Update Header Text & Breadcrumb
    const h1 = document.getElementById('jew-hero-h1');
    const lead = document.getElementById('jew-hero-lead');
    const crumb = document.getElementById('jew-crumb-title');

    if (typeVal === 'Tennis bracelets') {
      h1.textContent = 'Tennis bracelets';
      lead.textContent = 'A continuous line of matched natural stones, made to order in 925 silver, 14K or 18K gold. Choose a design and ask for a quote: we confirm the stone, metal, length, price and making time with you.';
      crumb.innerHTML = '<a href="javascript:void(0)" onclick="jewFilterType(\'\', document.querySelector(\'#jew-type-chips .chip\'))">Jewelry</a> › <b>Tennis bracelets</b>';
    } else if (typeVal === 'Tennis necklaces') {
      h1.textContent = 'Tennis necklaces';
      lead.textContent = 'A continuous line of matched natural stones, made to order in 925 silver, 14K or 18K gold. Choose a design and ask for a quote: we confirm the stone, metal, length, price and making time with you.';
      crumb.innerHTML = '<a href="javascript:void(0)" onclick="jewFilterType(\'\', document.querySelector(\'#jew-type-chips .chip\'))">Jewelry</a> › <b>Tennis necklaces</b>';
    } else {
      h1.textContent = 'Jewelry, made for you.';
      lead.textContent = 'Every piece here is made to order with our own natural stones, in 925 silver, 14K or 18K gold. Choose a design you like, tell us the stone, metal and size, and we send you a quote and a making time. Anything can be changed: a different stone, a longer chain, your own idea.';
      crumb.innerHTML = 'Jewelry';
    }

    applyFiltering();
  };

  window.jewToggleStone = function(stoneVal, btn) {
    if (state.stone === stoneVal) {
      state.stone = null;
      btn.classList.remove('on');
    } else {
      state.stone = stoneVal;
      document.querySelectorAll('#jew-side-stone-chips .chip').forEach(c => c.classList.remove('on'));
      btn.classList.add('on');
    }
    applyFiltering();
  };

  window.jewToggleMetal = function(metalVal, btn) {
    if (state.metal === metalVal) {
      state.metal = null;
      btn.classList.remove('on');
    } else {
      state.metal = metalVal;
      document.querySelectorAll('#jew-side-metal-chips .chip').forEach(c => c.classList.remove('on'));
      btn.classList.add('on');
    }
    applyFiltering();
  };

  window.jewClearSingle = function(key) {
    if (key === 'stone') {
      state.stone = null;
      document.querySelectorAll('#jew-side-stone-chips .chip').forEach(c => c.classList.remove('on'));
    }
    if (key === 'metal') {
      state.metal = null;
      document.querySelectorAll('#jew-side-metal-chips .chip').forEach(c => c.classList.remove('on'));
    }
    applyFiltering();
  };

  window.jewApplySort = function(sortVal) {
    state.sort = sortVal;
    applyFiltering();
  };

  function applyFiltering() {
    let filtered = JEW_DATA.filter(j => {
      const matchType = !state.type || j.type === state.type;
      const matchStone = !state.stone || j.stone === state.stone;
      const matchMetal = !state.metal || j.metal.includes(state.metal);
      return matchType && matchStone && matchMetal;
    });

    // Apply Sorting
    if (state.sort === 'plh') {
      filtered.sort((a, b) => a.guide[0] - b.guide[0]);
    } else if (state.sort === 'phl') {
      filtered.sort((a, b) => b.guide[0] - a.guide[0]);
    }

    // Update Chosen tags bar
    const chosenBar = document.getElementById('jew-chosen-bar');
    let chosenHtml = '<span id="jew-total-count">' + filtered.length + ' designs</span>';
    if (state.stone) {
      const stName = STONES_DEF[state.stone] ? STONES_DEF[state.stone].name : state.stone;
      chosenHtml += '<button type="button" class="x" onclick="jewClearSingle(\'stone\')">' + stName + ' <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M6.5 6.5l11 11M17.5 6.5l-11 11"/></svg></button>';
    }
    if (state.metal) {
      chosenHtml += '<button type="button" class="x" onclick="jewClearSingle(\'metal\')">' + state.metal + ' <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M6.5 6.5l11 11M17.5 6.5l-11 11"/></svg></button>';
    }
    chosenBar.innerHTML = chosenHtml;

    // Update Counter next to sidebar stone & metal chips based on current type filter
    const pool = JEW_DATA.filter(j => !state.type || j.type === state.type);
    document.getElementById('cnt-st-ruby').textContent = pool.filter(j => j.stone === 'ruby').length;
    document.getElementById('cnt-st-spinel').textContent = pool.filter(j => j.stone === 'spinel').length;
    document.getElementById('cnt-st-sapphire').textContent = pool.filter(j => j.stone === 'sapphire').length;
    document.getElementById('cnt-st-emerald').textContent = pool.filter(j => j.stone === 'emerald').length;
    document.getElementById('cnt-st-other').textContent = pool.filter(j => j.stone === 'other').length;

    document.getElementById('cnt-mt-silver').textContent = pool.filter(j => j.metal.includes('925 Silver')).length;
    document.getElementById('cnt-mt-14k').textContent = pool.filter(j => j.metal.includes('14K Gold')).length;
    document.getElementById('cnt-mt-18k').textContent = pool.filter(j => j.metal.includes('18K Gold')).length;

    // Show/Hide Cards
    const cards = document.querySelectorAll('.jew-card-item');
    let visibleCount = 0;
    cards.forEach(card => {
      const id = card.dataset.id;
      const match = filtered.some(f => f.id === id);
      if (match) {
        card.style.display = 'flex';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });

    // Empty message & load more wrap
    const emptyMsg = document.getElementById('jew-empty-msg');
    const loadMoreWrap = document.getElementById('jew-load-more-wrap');
    if (visibleCount === 0) {
      emptyMsg.style.display = 'block';
      loadMoreWrap.style.display = 'none';
    } else {
      emptyMsg.style.display = 'none';
      loadMoreWrap.style.display = 'flex';
      document.getElementById('jew-showing-counter').textContent = 'Showing ' + visibleCount + ' of ' + (visibleCount + 5);
    }
  }

  // Detail View Switching
  window.jewGoDetail = function(designId) {
    const item = JEW_DATA.find(j => j.id === designId);
    if (!item) return;

    state.activeDesign = item;

    document.getElementById('jew-listing-view').style.display = 'none';
    document.getElementById('jew-detail-view').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'instant' });

    // Populate detail view fields
    document.getElementById('detail-crumb-type').textContent = item.type;
    document.getElementById('detail-crumb-name').textContent = item.name;
    document.getElementById('detail-code-tag').textContent = 'DESIGN ' + item.code + ' · MADE TO ORDER';
    document.getElementById('detail-title').textContent = item.name;
    document.getElementById('detail-desc').textContent = item.desc;
    document.getElementById('detail-spec-stones').textContent = item.stones_spec;
    document.getElementById('detail-spec-metal').textContent = item.metal.join(' · ');
    document.getElementById('detail-spec-length').textContent = item.length_spec;
    document.getElementById('detail-guide-price').textContent = item.guide_str;
    document.getElementById('detail-guide-example').textContent = item.example;

    // Render big artwork (2x)
    document.getElementById('detail-gem-art-box').innerHTML = renderTennisArt(item, 2, item.neck);

    // Render thumbnails
    document.getElementById('thumb-art-1').innerHTML = renderTennisArt(item, 0.45, item.neck);
    document.getElementById('thumb-art-2').innerHTML = renderTennisArt(item, 0.45, item.neck);
    document.getElementById('thumb-art-3').innerHTML = renderTennisArt(item, 0.45, item.neck);
    document.getElementById('thumb-art-4').innerHTML = renderTennisArt(item, 0.45, item.neck);
  };

  window.jewBackToList = function() {
    document.getElementById('jew-detail-view').style.display = 'none';
    document.getElementById('jew-listing-view').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'instant' });
  };

  window.jewBackToListType = function() {
    jewBackToList();
    if (state.activeDesign && state.activeDesign.type) {
      const typeBtn = document.querySelector('#jew-type-chips .chip[data-type="' + state.activeDesign.type + '"]');
      jewFilterType(state.activeDesign.type, typeBtn);
    }
  };

  // Wishlist Toggle
  window.jewToggleWish = function(btn, id) {
    if (state.wish.has(id)) {
      state.wish.delete(id);
      btn.classList.remove('on');
      jewShowToast('Removed from your wishlist');
    } else {
      state.wish.add(id);
      btn.classList.add('on');
      jewShowToast('Saved to your wishlist');
    }
  };

  // Toast helper
  window.jewShowToast = function(msg) {
    const prev = document.querySelector('.toast');
    if (prev) prev.remove();
    const t = document.createElement('div');
    t.className = 'toast';
    t.textContent = msg;
    document.body.appendChild(t);
    setTimeout(() => t.remove(), 2600);
  };

  // Quote Modal Logic
  window.jewOpenQuoteModal = function(designName) {
    state.modalDesignName = designName || 'Custom Jewelry';
    const modalWrap = document.getElementById('jew-modal-wrap');
    document.getElementById('modal-heading-title').textContent = (designName && designName !== 'Make it into jewelry' && designName !== 'make') ? 'Get my price' : 'Make it into jewelry';
    document.getElementById('modal-design-badge').textContent = state.modalDesignName;
    document.getElementById('jew-modal-form-content').style.display = 'block';
    document.getElementById('jew-modal-done-content').style.display = 'none';
    modalWrap.style.display = 'block';
  };

  window.jewOpenQuoteCurrent = function() {
    if (state.activeDesign) {
      jewOpenQuoteModal(state.activeDesign.name);
    } else {
      jewOpenQuoteModal('Jewelry Quote');
    }
  };

  window.jewCloseQuoteModal = function() {
    document.getElementById('jew-modal-wrap').style.display = 'none';
  };

  window.jewSelectModalChip = function(btn, group) {
    const parent = btn.parentElement;
    parent.querySelectorAll('.chip').forEach(c => c.classList.remove('on'));
    btn.classList.add('on');
  };

  window.jewSubmitQuoteForm = function(e) {
    e.preventDefault();
    const name = document.getElementById('modal-input-name').value;
    const phone = document.getElementById('modal-input-phone').value;
    const notes = document.getElementById('modal-input-notes').value;

    const metalEl = document.querySelector('#modal-metal-chips .chip.on');
    const sizeEl = document.querySelector('#modal-size-chips .chip.on');
    const metal = metalEl ? metalEl.textContent : '925 Silver';
    const size = sizeEl ? sizeEl.textContent : '7 in';

    const msg = 'Hi Vivaaz Gems! I would like to request a quote for ' + state.modalDesignName + '.\n' +
                'Metal: ' + metal + '\n' +
                'Size: ' + size + '\n' +
                'Name: ' + name + '\n' +
                (phone ? 'Phone: ' + phone + '\n' : '') +
                (notes ? 'Notes: ' + notes : '');

    const waUrl = 'https://wa.me/919680552270?text=' + encodeURIComponent(msg);
    
    // Switch to done screen in modal
    document.getElementById('jew-modal-form-content').style.display = 'none';
    document.getElementById('jew-modal-done-content').style.display = 'block';

    // Open WhatsApp in new tab
    window.open(waUrl, '_blank');
  };

})();
</script>

<?php
get_footer('shop');
