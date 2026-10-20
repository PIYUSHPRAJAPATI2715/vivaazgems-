<?php
/**
 * Template Name: Layouts Page
 * Vivaaz Gems - Layouts, Matched Stone by Stone
 * Strictly matches Client Demo Screenshots (Image 1 & Image 3) 100%.
 */

defined('ABSPATH') || exit;

get_header('shop');

// Helper function to render layout stone artwork matching client demo 100%
if (!function_exists('vivaaz_render_layout_art')) {
    function vivaaz_render_layout_art($kind, $stone_img_url, $filter = '', $scale = 1) {
        $o = '<div class="lay" style="position: relative; width: 100%; height: 100%;">';
        $img_tag = '<img src="' . esc_url($stone_img_url) . '" alt="stone" style="width: 100%; height: 100%; object-fit: cover; transform: scale(2.3);' . ($filter ? ' filter: ' . $filter . ';' : '') . '">';

        if ($kind === 'line') {
            $n = 15;
            for ($k = 0; $k < $n; $k++) {
                $t = $k / ($n - 1);
                $a = M_PI * (0.15 + 0.7 * $t);
                $x = 50 - 42 * cos($a);
                $y = 24 + 42 * sin($a);
                $z = (16 + 22 * sin(M_PI * $t)) * $scale;
                $o .= '<div class="gm" style="position: absolute; border-radius: 50%; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,.2); left: calc(' . round($x, 2) . '% - ' . round($z / 2, 1) . 'px); top: calc(' . round($y, 2) . '% - ' . round($z / 2, 1) . 'px); width: ' . round($z, 1) . 'px; height: ' . round($z * 0.8, 1) . 'px;">' . $img_tag . '</div>';
            }
        } elseif ($kind === 'bracelet') {
            $n = 18;
            for ($k = 0; $k < $n; $k++) {
                $x = 8 + 84 * $k / ($n - 1);
                $y = 50 + 6 * sin(M_PI * $k / ($n - 1));
                $z = 20 * $scale;
                $o .= '<div class="gm" style="position: absolute; border-radius: 50%; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,.2); left: calc(' . round($x, 2) . '% - ' . round($z / 2, 1) . 'px); top: calc(' . round($y, 2) . '% - ' . round($z / 2, 1) . 'px); width: ' . round($z, 1) . 'px; height: ' . round($z * 0.85, 1) . 'px;">' . $img_tag . '</div>';
            }
        } elseif ($kind === 'pair') {
            $xs = array(33, 67);
            foreach ($xs as $x) {
                $z = 88 * $scale;
                $o .= '<div style="position: absolute; left: calc(' . $x . '% - ' . round($z * 0.55, 1) . 'px); top: calc(50% - ' . round($z * 0.45, 1) . 'px); width: ' . round($z * 1.1, 1) . 'px; height: ' . round($z * 0.9, 1) . 'px; border-radius: 50%; background: #FAF7F2; box-shadow: 0 2px 6px rgba(0,0,0,.06);"></div>';
                $o .= '<div class="gm" style="position: absolute; border-radius: 50%; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,.25); left: calc(' . $x . '% - ' . round($z / 2, 1) . 'px); top: calc(50% - ' . round($z * 0.4, 1) . 'px); width: ' . round($z, 1) . 'px; height: ' . round($z * 0.8, 1) . 'px;">' . $img_tag . '</div>';
            }
        } elseif ($kind === 'set') {
            $pts = array(
                array(24, 54),
                array(50, 86),
                array(76, 54),
            );
            foreach ($pts as $pt) {
                $x = $pt[0];
                $z0 = $pt[1];
                $z = $z0 * $scale;
                $o .= '<div style="position: absolute; left: calc(' . $x . '% - ' . round($z * 0.55, 1) . 'px); top: calc(50% - ' . round($z * 0.45, 1) . 'px); width: ' . round($z * 1.1, 1) . 'px; height: ' . round($z * 0.9, 1) . 'px; border-radius: 50%; background: #FAF7F2; box-shadow: 0 2px 6px rgba(0,0,0,.06);"></div>';
                $o .= '<div class="gm" style="position: absolute; border-radius: 50%; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,.25); left: calc(' . $x . '% - ' . round($z / 2, 1) . 'px); top: calc(50% - ' . round($z * 0.4, 1) . 'px); width: ' . round($z, 1) . 'px; height: ' . round($z * 0.8, 1) . 'px;">' . $img_tag . '</div>';
            }
        }

        $o .= '</div>';
        return $o;
    }
}

// 9 exact layouts from client demo
$layouts_data = array(
    array(
        'id'    => 'l1',
        'stone' => 'ruby',
        'kind'  => 'line',
        'type'  => 'Necklace lines',
        'name'  => 'Ruby Graduated Necklace Line',
        'd'     => '15 stones · 3 to 7 mm · colour matched',
        'price' => null,
        'guide' => '₹10,000 – ₹15,000',
        'img'   => vivaaz_get_img_url('ruby.jpg'),
        'filter'=> '',
    ),
    array(
        'id'    => 'l2',
        'stone' => 'ruby',
        'kind'  => 'pair',
        'type'  => 'Pairs',
        'name'  => 'Ruby Oval Matched Pair',
        'd'     => '7×5 mm · 1.10 ct total',
        'price' => 6800,
        'guide' => '',
        'img'   => vivaaz_get_img_url('ruby.jpg'),
        'filter'=> '',
    ),
    array(
        'id'    => 'l3',
        'stone' => 'blue-topaz',
        'kind'  => 'line',
        'type'  => 'Necklace lines',
        'name'  => 'Swiss Blue Topaz Graduated Line',
        'd'     => '17 stones · 3 to 8 mm',
        'price' => null,
        'guide' => '₹4,000 – ₹6,000',
        'img'   => vivaaz_get_img_url('swiss-topaz.jpg'),
        'filter'=> '',
    ),
    array(
        'id'    => 'l4',
        'stone' => 'spinel',
        'kind'  => 'bracelet',
        'type'  => 'Bracelet lines',
        'name'  => 'Spinel Bracelet Line',
        'd'     => '18 stones · 3 mm · 7 in',
        'price' => 18500,
        'guide' => '',
        'img'   => vivaaz_get_img_url('ruby.jpg'),
        'filter'=> 'hue-rotate(-18deg) saturate(.75) brightness(1.2)',
    ),
    array(
        'id'    => 'l5',
        'stone' => 'spinel',
        'kind'  => 'set',
        'type'  => 'Sets',
        'name'  => 'Spinel Three-Stone Set',
        'd'     => '6×8 + 2 × 4×6 mm',
        'price' => null,
        'guide' => '₹9,000 – ₹14,000',
        'img'   => vivaaz_get_img_url('ruby.jpg'),
        'filter'=> 'hue-rotate(-18deg) saturate(.75) brightness(1.2)',
    ),
    array(
        'id'    => 'l6',
        'stone' => 'ruby',
        'kind'  => 'bracelet',
        'type'  => 'Bracelet lines',
        'name'  => 'Ruby Bracelet Line',
        'd'     => '20 stones · 2.5 mm · 7 in',
        'price' => null,
        'guide' => '₹22,000 – ₹30,000',
        'img'   => vivaaz_get_img_url('ruby.jpg'),
        'filter'=> '',
    ),
    array(
        'id'    => 'l7',
        'stone' => 'other',
        'kind'  => 'pair',
        'type'  => 'Pairs',
        'name'  => 'Tanzanite Oval Pair',
        'd'     => '6×8 mm · 2.4 ct total',
        'price' => 9800,
        'guide' => '',
        'img'   => vivaaz_get_img_url('ceylon-sapphire.jpg'),
        'filter'=> 'hue-rotate(28deg) brightness(1.05)',
    ),
    array(
        'id'    => 'l8',
        'stone' => 'spinel',
        'kind'  => 'line',
        'type'  => 'Necklace lines',
        'name'  => 'Pink Spinel Graduated Line',
        'd'     => '21 stones · 2 to 5 mm',
        'price' => null,
        'guide' => '₹16,000 – ₹24,000',
        'img'   => vivaaz_get_img_url('ruby.jpg'),
        'filter'=> 'hue-rotate(-24deg) saturate(.85) brightness(1.25)',
    ),
    array(
        'id'    => 'l9',
        'stone' => 'blue-topaz',
        'kind'  => 'pair',
        'type'  => 'Pairs',
        'name'  => 'Blue Topaz Pear Pair',
        'd'     => '8×12 mm · 7.2 ct total',
        'price' => 1900,
        'guide' => '',
        'img'   => vivaaz_get_img_url('swiss-topaz.jpg'),
        'filter'=> '',
    ),
);
?>

<div class="layouts-page-wrap" style="background: #FAF7F2; min-height: 100vh; padding: 24px 20px 80px; font-family: 'Manrope', 'Segoe UI', Arial, sans-serif; color: #1C1A17;">
  <div style="max-width: 1240px; margin: 0 auto;">

    <!-- Breadcrumb trail -->
    <div class="crumb" style="font-size: 11px; color: #76706A; margin-bottom: 14px;">
      <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a> <span style="margin: 0 4px;">›</span>
      <span style="font-weight: 700; color: #1C1A17;">Layouts</span>
    </div>

    <!-- Header Hero (Image 1): Title + Intro on left, "What a layout is" Box on right -->
    <div class="lhead" style="display: grid; grid-template-columns: minmax(0, 1fr) 360px; gap: 36px; align-items: start; margin-bottom: 24px;">
      <div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 34px; font-weight: 400; line-height: 1.2; margin: 0 0 10px; color: #1C1A17;">Layouts, matched stone by stone</h1>
        <p style="font-size: 14px; line-height: 1.65; color: #76706A; max-width: 680px; margin: 0;">
          Graduated lines and matched sets in ruby, spinel, blue topaz and other stones, sorted and colour-matched in Jaipur so a jeweller can set them straight away. Every layout is photographed as one set; some have a price, others are quoted.
        </p>
      </div>

      <!-- What a layout is Box -->
      <div class="nsbox" style="background: #FFFFFF; border: 1px solid #E8E1D6; padding: 18px 20px; font-size: 13px;">
        <span style="font-size: 10.5px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #9B7C4E; display: block; margin-bottom: 6px;">WHAT A LAYOUT IS</span>
        <p style="font-size: 12.5px; line-height: 1.6; color: #1C1A17; margin: 0;">
          A set of stones chosen to sit together: a necklace line, a bracelet line, an earring pair or a three-stone set. Sizes step evenly and colours match across the whole set.
        </p>
      </div>
    </div>

    <!-- Stone Pills Row (Image 1) -->
    <div class="chips-top-row" style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 24px;">
      <button type="button" class="layout-stone-pill active" data-stone="all" onclick="applyStoneFilter('all', this)" style="padding: 7px 16px; font-size: 12px; font-weight: 600; border-radius: 999px; border: 1px solid #1C1A17; background: #1C1A17; color: #FFFFFF; cursor: pointer;">All <span style="opacity: 0.7; font-size: 11px; margin-left: 3px;">9</span></button>
      <button type="button" class="layout-stone-pill" data-stone="ruby" onclick="applyStoneFilter('ruby', this)" style="padding: 7px 16px; font-size: 12px; font-weight: 600; border-radius: 999px; border: 1px solid #E8E1D6; background: #FFFFFF; color: #1C1A17; cursor: pointer;">Ruby <span style="opacity: 0.6; font-size: 11px; margin-left: 3px;">3</span></button>
      <button type="button" class="layout-stone-pill" data-stone="spinel" onclick="applyStoneFilter('spinel', this)" style="padding: 7px 16px; font-size: 12px; font-weight: 600; border-radius: 999px; border: 1px solid #E8E1D6; background: #FFFFFF; color: #1C1A17; cursor: pointer;">Spinel <span style="opacity: 0.6; font-size: 11px; margin-left: 3px;">3</span></button>
      <button type="button" class="layout-stone-pill" data-stone="blue-topaz" onclick="applyStoneFilter('blue-topaz', this)" style="padding: 7px 16px; font-size: 12px; font-weight: 600; border-radius: 999px; border: 1px solid #E8E1D6; background: #FFFFFF; color: #1C1A17; cursor: pointer;">Blue Topaz <span style="opacity: 0.6; font-size: 11px; margin-left: 3px;">2</span></button>
      <button type="button" class="layout-stone-pill" data-stone="other" onclick="applyStoneFilter('other', this)" style="padding: 7px 16px; font-size: 12px; font-weight: 600; border-radius: 999px; border: 1px solid #E8E1D6; background: #FFFFFF; color: #1C1A17; cursor: pointer;">Other <span style="opacity: 0.6; font-size: 11px; margin-left: 3px;">1</span></button>
    </div>

    <!-- Divider Bar: Count + Sort -->
    <div class="bar" style="display: flex; justify-content: space-between; align-items: center; gap: 14px; padding: 12px 0; border-top: 1px solid #E8E1D6; border-bottom: 1px solid #E8E1D6; font-size: 13px; color: #76706A; margin-bottom: 28px;">
      <div id="layout-count-text" style="font-size: 13px; color: #1C1A17; font-weight: 500;">9 layouts</div>
      <div>Sort: <b style="color: #1C1A17;">Newest ▾</b></div>
    </div>

    <!-- Main Listing Layout: Left Sidebar + Right 3-Column Grid -->
    <div class="lmain" style="display: grid; grid-template-columns: 220px 1fr; gap: 36px; align-items: start;">
      
      <!-- Left Sidebar (Image 1) -->
      <aside class="side" style="font-size: 13px;">
        <!-- Layouts by Stone -->
        <div style="margin-bottom: 20px;">
          <span style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #76706A; margin-bottom: 10px;">LAYOUTS BY STONE</span>
          <ul style="list-style: none; padding: 0; margin: 0; line-height: 2;">
            <li><a href="javascript:void(0)" class="side-stone-link active" data-stone="all" onclick="applyStoneFilter('all', this)" style="display: flex; justify-content: space-between; color: #1C1A17; font-weight: 700; text-decoration: none;"><span>All layouts</span> <em style="font-style: normal; color: #76706A;">9</em></a></li>
            <li><a href="javascript:void(0)" class="side-stone-link" data-stone="ruby" onclick="applyStoneFilter('ruby', this)" style="display: flex; justify-content: space-between; color: #76706A; text-decoration: none;"><span>Ruby Layouts</span> <em style="font-style: normal; color: #76706A;">3</em></a></li>
            <li><a href="javascript:void(0)" class="side-stone-link" data-stone="spinel" onclick="applyStoneFilter('spinel', this)" style="display: flex; justify-content: space-between; color: #76706A; text-decoration: none;"><span>Spinel Layouts</span> <em style="font-style: normal; color: #76706A;">3</em></a></li>
            <li><a href="javascript:void(0)" class="side-stone-link" data-stone="blue-topaz" onclick="applyStoneFilter('blue-topaz', this)" style="display: flex; justify-content: space-between; color: #76706A; text-decoration: none;"><span>Blue Topaz Layouts</span> <em style="font-style: normal; color: #76706A;">2</em></a></li>
            <li><a href="javascript:void(0)" class="side-stone-link" data-stone="other" onclick="applyStoneFilter('other', this)" style="display: flex; justify-content: space-between; color: #76706A; text-decoration: none;"><span>Other Layouts</span> <em style="font-style: normal; color: #76706A;">1</em></a></li>
          </ul>
        </div>

        <hr style="border: 0; border-top: 1px solid #E8E1D6; margin: 18px 0;">

        <!-- Type -->
        <div style="margin-bottom: 20px;">
          <span style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #76706A; margin-bottom: 10px;">TYPE</span>
          <div style="display: flex; flex-direction: column; gap: 6px;">
            <button type="button" class="type-pill-btn" data-type="Necklace lines" onclick="applyTypeFilter('Necklace lines', this)" style="padding: 6px 12px; font-size: 12px; border-radius: 999px; border: 1px solid #E8E1D6; background: #FFFFFF; color: #1C1A17; text-align: left; display: flex; justify-content: space-between; cursor: pointer;"><span>Necklace lines</span> <em style="font-style: normal; color: #76706A;">3</em></button>
            <button type="button" class="type-pill-btn" data-type="Bracelet lines" onclick="applyTypeFilter('Bracelet lines', this)" style="padding: 6px 12px; font-size: 12px; border-radius: 999px; border: 1px solid #E8E1D6; background: #FFFFFF; color: #1C1A17; text-align: left; display: flex; justify-content: space-between; cursor: pointer;"><span>Bracelet lines</span> <em style="font-style: normal; color: #76706A;">2</em></button>
            <button type="button" class="type-pill-btn" data-type="Pairs" onclick="applyTypeFilter('Pairs', this)" style="padding: 6px 12px; font-size: 12px; border-radius: 999px; border: 1px solid #E8E1D6; background: #FFFFFF; color: #1C1A17; text-align: left; display: flex; justify-content: space-between; cursor: pointer;"><span>Pairs</span> <em style="font-style: normal; color: #76706A;">3</em></button>
            <button type="button" class="type-pill-btn" data-type="Sets" onclick="applyTypeFilter('Sets', this)" style="padding: 6px 12px; font-size: 12px; border-radius: 999px; border: 1px solid #E8E1D6; background: #FFFFFF; color: #1C1A17; text-align: left; display: flex; justify-content: space-between; cursor: pointer;"><span>Sets</span> <em style="font-style: normal; color: #76706A;">1</em></button>
          </div>
        </div>

        <hr style="border: 0; border-top: 1px solid #E8E1D6; margin: 18px 0;">

        <!-- Price -->
        <div style="margin-bottom: 20px;">
          <span style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #76706A; margin-bottom: 10px;">PRICE</span>
          <div style="display: flex; flex-direction: column; gap: 6px;">
            <button type="button" class="price-pill-btn" data-price="ready" onclick="applyPriceFilter('ready', this)" style="padding: 6px 12px; font-size: 12px; border-radius: 999px; border: 1px solid #E8E1D6; background: #FFFFFF; color: #1C1A17; text-align: left; display: flex; justify-content: space-between; cursor: pointer;"><span>With a price</span> <em style="font-style: normal; color: #76706A;">4</em></button>
            <button type="button" class="price-pill-btn" data-price="guide" onclick="applyPriceFilter('guide', this)" style="padding: 6px 12px; font-size: 12px; border-radius: 999px; border: 1px solid #E8E1D6; background: #FFFFFF; color: #1C1A17; text-align: left; display: flex; justify-content: space-between; cursor: pointer;"><span>Price guide</span> <em style="font-style: normal; color: #76706A;">5</em></button>
          </div>
        </div>
      </aside>

      <!-- Right 3-Column Grid of Layout Cards (Image 1) -->
      <div>
        <div class="layouts-cards-grid" id="layouts-cards-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
          <?php foreach ($layouts_data as $l) : ?>
            <div class="layout-card-item" data-stone="<?php echo esc_attr($l['stone']); ?>" data-type="<?php echo esc_attr($l['type']); ?>" data-price-type="<?php echo $l['price'] ? 'ready' : 'guide'; ?>" style="position: relative; background: #FFFFFF; border: 1px solid #EFE9E0; display: flex; flex-direction: column; transition: box-shadow .3s;">
              
              <!-- Card Photo / Layout Art -->
              <div class="layout-card-ph" style="position: relative; aspect-ratio: 1/1; background: #F4F2EE; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                <?php echo vivaaz_render_layout_art($l['kind'], $l['img'], $l['filter'], 1); ?>
                
                <!-- Tag badge top-left -->
                <span style="position: absolute; left: 14px; top: 14px; background: #FFFFFF; font-size: 10px; letter-spacing: .16em; font-weight: 700; padding: 5px 8px; text-transform: uppercase; color: #1C1A17; z-index: 2;">
                  <?php echo $l['price'] ? 'READY' : 'PRICE GUIDE'; ?>
                </span>

                <!-- Quick view button bar -->
                <button type="button" class="qv-overlay-btn" onclick="openLayoutQuickView('<?php echo esc_js($l['name']); ?>', '<?php echo esc_js($l['d']); ?>', '<?php echo $l['price'] ? '₹' . number_format($l['price']) : esc_js($l['guide']); ?>')" style="position: absolute; left: 0; right: 0; bottom: 0; background: #1C1A17; color: #FFFFFF; border: 0; padding: 10px; font-size: 11px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; cursor: pointer; z-index: 3;">
                  QUICK VIEW
                </button>
              </div>

              <!-- Card Body -->
              <div style="padding: 16px 18px 18px; display: flex; flex-direction: column; flex: 1;">
                <div style="font-size: 15px; font-weight: 500; color: #1C1A17; margin-bottom: 4px; line-height: 1.35;"><?php echo esc_html($l['name']); ?></div>
                <div style="font-size: 12.5px; color: #76706A; margin-bottom: 12px;"><?php echo esc_html($l['d']); ?></div>
                
                <div style="font-weight: 600; font-size: 14.5px; color: #1C1A17; margin-top: auto; margin-bottom: 14px;">
                  <?php echo $l['price'] ? '₹' . number_format($l['price']) : 'Price guide ' . esc_html($l['guide']); ?>
                </div>

                <div>
                  <?php if ($l['price']) : ?>
                    <button type="button" onclick="addToCartMock('<?php echo esc_js($l['name']); ?>', '<?php echo esc_js('₹' . number_format($l['price'])); ?>')" style="display: inline-flex; align-items: center; justify-content: center; background: #1C1A17; color: #FFFFFF; padding: 10px 18px; font-size: 11px; letter-spacing: .16em; font-weight: 700; text-transform: uppercase; border: 1px solid #1C1A17; cursor: pointer;">
                      ADD TO CART
                    </button>
                  <?php else : ?>
                    <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I would like to get a price for: ' . $l['name'] . ' (' . $l['d'] . ')'); ?>" target="_blank" style="font-size: 11.5px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; color: #1C1A17; text-decoration: underline; text-underline-offset: 3px;">
                      GET MY PRICE →
                    </a>
                  <?php endif; ?>
                </div>
              </div>

            </div>
          <?php endforeach; ?>
        </div>

        <div id="no-layouts-msg" style="display: none; background: #FFFFFF; border: 1px solid #E8E1D6; padding: 40px; text-align: center; color: #76706A; font-size: 14px;">
          No layouts match these filters. <a href="javascript:void(0)" onclick="resetAllLayoutFilters()" style="color: #9B7C4E; text-decoration: underline; font-weight: 600; margin-left: 6px;">Clear filters</a>
        </div>
      </div>
    </div>

    <!-- Section: How it works (Image 3) -->
    <section style="margin-top: 60px; padding-top: 20px;">
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 28px; font-weight: 400; color: #1C1A17; margin: 0 0 24px;">How it works</h2>
      
      <!-- 4 Cards Grid (Image 3) -->
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px;">
        <div style="background: #FFFFFF; border: 1px solid #E8E1D6; padding: 22px 20px;">
          <span style="font-size: 10.5px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #9B7C4E; display: block; margin-bottom: 6px;">STEP 1</span>
          <h4 style="font-family: 'Playfair Display', Georgia, serif; font-size: 17px; font-weight: 400; margin: 0 0 8px; color: #1C1A17;">Choose or send</h4>
          <p style="font-size: 12.5px; color: #76706A; line-height: 1.6; margin: 0;">Pick a layout here, or send us your design or your stone.</p>
        </div>

        <div style="background: #FFFFFF; border: 1px solid #E8E1D6; padding: 22px 20px;">
          <span style="font-size: 10.5px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #9B7C4E; display: block; margin-bottom: 6px;">STEP 2</span>
          <h4 style="font-family: 'Playfair Display', Georgia, serif; font-size: 17px; font-weight: 400; margin: 0 0 8px; color: #1C1A17;">We match</h4>
          <p style="font-size: 12.5px; color: #76706A; line-height: 1.6; margin: 0;">Sorted by colour, size and clarity, laid out and photographed.</p>
        </div>

        <div style="background: #FFFFFF; border: 1px solid #E8E1D6; padding: 22px 20px;">
          <span style="font-size: 10.5px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #9B7C4E; display: block; margin-bottom: 6px;">STEP 3</span>
          <h4 style="font-family: 'Playfair Display', Georgia, serif; font-size: 17px; font-weight: 400; margin: 0 0 8px; color: #1C1A17;">You approve</h4>
          <p style="font-size: 12.5px; color: #76706A; line-height: 1.6; margin: 0;">Photos and a video on WhatsApp before we pack.</p>
        </div>

        <div style="background: #FFFFFF; border: 1px solid #E8E1D6; padding: 22px 20px;">
          <span style="font-size: 10.5px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #9B7C4E; display: block; margin-bottom: 6px;">STEP 4</span>
          <h4 style="font-family: 'Playfair Display', Georgia, serif; font-size: 17px; font-weight: 400; margin: 0 0 8px; color: #1C1A17;">Insured delivery</h4>
          <p style="font-size: 12.5px; color: #76706A; line-height: 1.6; margin: 0;">Repeat orders of the same layout on request.</p>
        </div>
      </div>
    </section>

    <!-- Dark Matching Banner (Image 3) -->
    <div class="band-match-dark" style="background: #1C1A17; color: #FFFFFF; padding: 36px 44px; margin-top: 40px; display: flex; justify-content: space-between; align-items: center; gap: 30px; flex-wrap: wrap;">
      <div style="max-width: 660px;">
        <h3 style="font-family: 'Playfair Display', Georgia, serif; font-size: 24px; font-weight: 400; color: #FFFFFF; margin: 0 0 10px;">Have a stone or a design? We match it.</h3>
        <p style="font-size: 13.5px; color: #CFC6B8; line-height: 1.6; margin: 0;">Send a photo and the size of your stone, or your design. We match it from our stock in Jaipur or Bangkok and send you photos of the set before you decide.</p>
      </div>
      <div style="display: flex; gap: 12px; flex-wrap: wrap;">
        <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I have a custom design to send.'); ?>" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; background: transparent; color: #FFFFFF; border: 1px solid #FFFFFF; padding: 13px 24px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; text-decoration: none; transition: background .2s;">
          SEND YOUR DESIGN
        </a>
        <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I have a stone I would like to match.'); ?>" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; background: #F1EBE1; color: #1C1A17; border: 1px solid #F1EBE1; padding: 13px 24px; font-size: 11.5px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; text-decoration: none; transition: background .2s;">
          MATCH MY STONE
        </a>
      </div>
    </div>

  </div>
</div>

<style>
/* Layouts Card Hover & Quick View */
.layout-card-item:hover {
  box-shadow: 0 18px 40px rgba(28,26,23,.08);
}
.qv-overlay-btn {
  opacity: 0;
  transform: translateY(100%);
  transition: all .25s ease;
}
.layout-card-item:hover .qv-overlay-btn {
  opacity: 1;
  transform: translateY(0);
}
@media (max-width: 900px) {
  .lhead {
    grid-template-columns: 1fr !important;
  }
  .lmain {
    grid-template-columns: 1fr !important;
  }
  .layouts-cards-grid {
    grid-template-columns: repeat(2, 1fr) !important;
  }
}
@media (max-width: 600px) {
  .layouts-cards-grid {
    grid-template-columns: 1fr !important;
  }
}
</style>

<script>
var currentStone = 'all';
var currentType = 'all';
var currentPrice = 'all';

function applyStoneFilter(stone, el) {
  currentStone = stone;
  document.querySelectorAll('.layout-stone-pill').forEach(function(b) {
    if (b.getAttribute('data-stone') === stone) {
      b.style.background = '#1C1A17';
      b.style.color = '#FFFFFF';
      b.style.borderColor = '#1C1A17';
    } else {
      b.style.background = '#FFFFFF';
      b.style.color = '#1C1A17';
      b.style.borderColor = '#E8E1D6';
    }
  });

  document.querySelectorAll('.side-stone-link').forEach(function(a) {
    if (a.getAttribute('data-stone') === stone) {
      a.style.color = '#1C1A17';
      a.style.fontWeight = '700';
    } else {
      a.style.color = '#76706A';
      a.style.fontWeight = '400';
    }
  });

  filterLayoutCards();
}

function applyTypeFilter(type, el) {
  currentType = (currentType === type) ? 'all' : type;
  document.querySelectorAll('.type-pill-btn').forEach(function(b) {
    if (b.getAttribute('data-type') === currentType) {
      b.style.background = '#1C1A17';
      b.style.color = '#FFFFFF';
      b.style.borderColor = '#1C1A17';
      var em = b.querySelector('em');
      if (em) em.style.color = '#FFFFFF';
    } else {
      b.style.background = '#FFFFFF';
      b.style.color = '#1C1A17';
      b.style.borderColor = '#E8E1D6';
      var em = b.querySelector('em');
      if (em) em.style.color = '#76706A';
    }
  });

  filterLayoutCards();
}

function applyPriceFilter(price, el) {
  currentPrice = (currentPrice === price) ? 'all' : price;
  document.querySelectorAll('.price-pill-btn').forEach(function(b) {
    if (b.getAttribute('data-price') === currentPrice) {
      b.style.background = '#1C1A17';
      b.style.color = '#FFFFFF';
      b.style.borderColor = '#1C1A17';
      var em = b.querySelector('em');
      if (em) em.style.color = '#FFFFFF';
    } else {
      b.style.background = '#FFFFFF';
      b.style.color = '#1C1A17';
      b.style.borderColor = '#E8E1D6';
      var em = b.querySelector('em');
      if (em) em.style.color = '#76706A';
    }
  });

  filterLayoutCards();
}

function filterLayoutCards() {
  var cards = document.querySelectorAll('.layout-card-item');
  var visibleCount = 0;

  cards.forEach(function(c) {
    var cStone = c.getAttribute('data-stone');
    var cType = c.getAttribute('data-type');
    var cPrice = c.getAttribute('data-price-type');

    var matchStone = (currentStone === 'all' || cStone === currentStone);
    var matchType = (currentType === 'all' || cType === currentType);
    var matchPrice = (currentPrice === 'all' || cPrice === currentPrice);

    if (matchStone && matchType && matchPrice) {
      c.style.display = 'flex';
      visibleCount++;
    } else {
      c.style.display = 'none';
    }
  });

  var countText = document.getElementById('layout-count-text');
  if (countText) {
    countText.textContent = visibleCount + (visibleCount === 1 ? ' layout' : ' layouts');
  }

  var noMsg = document.getElementById('no-layouts-msg');
  if (noMsg) {
    noMsg.style.display = visibleCount === 0 ? 'block' : 'none';
  }
}

function resetAllLayoutFilters() {
  applyStoneFilter('all', null);
  currentType = 'all';
  currentPrice = 'all';
  document.querySelectorAll('.type-pill-btn, .price-pill-btn').forEach(function(b) {
    b.style.background = '#FFFFFF';
    b.style.color = '#1C1A17';
    b.style.borderColor = '#E8E1D6';
    var em = b.querySelector('em');
    if (em) em.style.color = '#76706A';
  });
  filterLayoutCards();
}

function addToCartMock(name, price) {
  alert(name + ' (' + price + ') added to bag!');
}

function openLayoutQuickView(name, details, price) {
  alert('Quick View: ' + name + '\n' + details + '\n' + price);
}

document.addEventListener('DOMContentLoaded', function() {
  var params = new URLSearchParams(window.location.search);
  var stone = params.get('stone');
  if (stone) {
    applyStoneFilter(stone.toLowerCase(), null);
  }
});
</script>

<?php
get_footer('shop');
