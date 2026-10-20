<?php
/**
 * Template Name: Gemstone Beads Page
 * Vivaaz Gems - Gemstone Beads Catalog & Guide
 * Strictly matches Client Demo Screenshots (Image 1) 100% and removes Details box (Image 3).
 */

defined('ABSPATH') || exit;

get_header('shop');

// SVG Bead Strand Artwork generator matching client demo 100%
if (!function_exists('vivaaz_render_strand_svg')) {
    function vivaaz_render_strand_svg($shape, $col, $w = 260) {
        $n = $w > 100 ? 26 : 12;
        $R = $w > 100 ? 110 : 24;
        $cx = $w / 2;
        $cy = $w > 100 ? 20 : 6;
        $c = '';

        for ($k = 0; $k < $n; $k++) {
            $a = M_PI * (0.12 + 0.76 * $k / ($n - 1));
            $x = $cx - $R * cos($a);
            $y = $cy + $R * 0.8 * sin($a);

            $r = $w > 100 ? (
                $shape === 'Chips' ? 6 : (
                $shape === 'Heishi' ? 4 : (
                $shape === 'Nugget' ? 8 : (
                $shape === 'Coin & cube' ? 7 : 6.5
            )))) : 2.6;

            if ($shape === 'Heishi' || $shape === 'Coin & cube') {
                $c .= '<rect x="' . round($x - $r, 1) . '" y="' . round($y - $r * 0.55, 1) . '" width="' . round($r * 2, 1) . '" height="' . round($r * 1.1, 1) . '" rx="1.5" fill="' . esc_attr($col) . '"/>';
            } else {
                $is_rondelle = (stripos($shape, 'rondelle') !== false);
                $rx = $r * ($is_rondelle ? 1.2 : 1);
                $ry = $r * ($is_rondelle ? 0.75 : 1);
                $c .= '<ellipse cx="' . round($x, 1) . '" cy="' . round($y, 1) . '" rx="' . round($rx, 1) . '" ry="' . round($ry, 1) . '" fill="' . esc_attr($col) . '"/>';
                $c .= '<ellipse cx="' . round($x - $r * 0.3, 1) . '" cy="' . round($y - $r * 0.35, 1) . '" rx="' . round($r * 0.3, 1) . '" ry="' . round($r * 0.22, 1) . '" fill="#fff" opacity=".45"/>';
            }
        }

        $h = $w > 100 ? round($w * 0.62) : $w;
        $sw = $w > 100 ? 1.2 : 0.6;
        $width_attr = $w > 100 ? '82%' : '88%';

        return '<svg viewBox="0 0 ' . $w . ' ' . $h . '" width="' . $width_attr . '" style="max-width: 100%; display: block; margin: 0 auto;">' .
               '<path d="M' . ($cx - $R) . ' ' . $cy . ' q0 -14 ' . $R . ' -16 q' . $R . ' 2 ' . $R . ' 16" stroke="#C9BFB1" fill="none" stroke-width="' . $sw . '"/>' .
               $c .
               '</svg>';
    }
}

// 8 Bead Shapes matching demo
$bead_shapes_tiles = array(
    array('shape' => 'Round',               'name' => 'Round',               'col' => '#6b3fa0'),
    array('shape' => 'Rondelle',            'name' => 'Rondelle',            'col' => '#6f7f8f'),
    array('shape' => 'Faceted rondelle',    'name' => 'Faceted rondelle',    'col' => '#b02a3a'),
    array('shape' => 'Nugget',              'name' => 'Nugget',              'col' => '#7d4fb5'),
    array('shape' => 'Chips',               'name' => 'Chips',               'col' => '#8fae3a'),
    array('shape' => 'Heishi',              'name' => 'Heishi',              'col' => '#2f9d9d'),
    array('shape' => 'Briolette & drops',   'name' => 'Briolette & drops',   'col' => '#2e8b57'),
    array('shape' => 'Coin & cube',         'name' => 'Coin & cube',         'col' => '#58b3e0'),
);

// 12 Bead Products matching demo 100%
$beads_catalog = array(
    array(
        'id'    => 'b1',
        'stone' => 'Amethyst',
        'col'   => '#6b3fa0',
        'cut'   => 'Smooth',
        'shape' => 'Round',
        'size'  => '6',
        'sold'  => 'Strand',
        'len'   => '16 in',
        'hole'  => '0.8',
        'q'     => 'AAA',
        'price' => 480,
        'n'     => 'about 66 beads',
    ),
    array(
        'id'    => 'b2',
        'stone' => 'Ruby',
        'col'   => '#b02a3a',
        'cut'   => 'Faceted',
        'shape' => 'Faceted rondelle',
        'size'  => '4',
        'sold'  => 'Strand',
        'len'   => '8 in',
        'hole'  => '0.6',
        'q'     => 'AA',
        'price' => 2900,
        'n'     => 'about 48 beads',
    ),
    array(
        'id'    => 'b3',
        'stone' => 'Emerald',
        'col'   => '#2e8b57',
        'cut'   => 'Smooth',
        'shape' => 'Briolette & drops',
        'size'  => '5×7',
        'sold'  => 'Strand',
        'len'   => '8 in',
        'hole'  => '0.6',
        'q'     => 'AA',
        'price' => 6400,
        'n'     => 'about 30 drops',
    ),
    array(
        'id'    => 'b4',
        'stone' => 'Blue Topaz',
        'col'   => '#3c9ad6',
        'cut'   => 'Smooth',
        'shape' => 'Round',
        'size'  => '5',
        'sold'  => 'Strand',
        'len'   => '16 in',
        'hole'  => '0.8',
        'q'     => 'AAA',
        'price' => 1150,
        'n'     => 'about 78 beads',
    ),
    array(
        'id'    => 'b5',
        'stone' => 'Peridot',
        'col'   => '#8fae3a',
        'cut'   => 'Smooth',
        'shape' => 'Chips',
        'size'  => '3–5',
        'sold'  => 'Strand',
        'len'   => '16 in',
        'hole'  => '0.8',
        'q'     => 'Commercial',
        'price' => 320,
        'n'     => 'about 90 chips',
    ),
    array(
        'id'    => 'b6',
        'stone' => 'Garnet',
        'col'   => '#8e1b2c',
        'cut'   => 'Faceted',
        'shape' => 'Round',
        'size'  => '8',
        'sold'  => 'Strand',
        'len'   => '16 in',
        'hole'  => '1',
        'q'     => 'AA',
        'price' => 980,
        'n'     => 'about 50 beads',
    ),
    array(
        'id'    => 'b7',
        'stone' => 'Rose Quartz',
        'col'   => '#d9a7b0',
        'cut'   => 'Smooth',
        'shape' => 'Round',
        'size'  => '8',
        'sold'  => 'Strand',
        'len'   => '15 in',
        'hole'  => '1',
        'q'     => 'AAA',
        'price' => 540,
        'n'     => 'about 48 beads',
    ),
    array(
        'id'    => 'b8',
        'stone' => 'Labradorite',
        'col'   => '#6f7f8f',
        'cut'   => 'Smooth',
        'shape' => 'Rondelle',
        'size'  => '6',
        'sold'  => 'Loose pieces',
        'len'   => '—',
        'hole'  => '1',
        'q'     => 'AA',
        'price' => 18,
        'n'     => 'per bead',
    ),
    array(
        'id'    => 'b9',
        'stone' => 'Turquoise',
        'col'   => '#2f9d9d',
        'cut'   => 'Smooth',
        'shape' => 'Heishi',
        'size'  => '4',
        'sold'  => 'Strand',
        'len'   => '16 in',
        'hole'  => '1',
        'q'     => 'AA',
        'price' => 460,
        'n'     => 'about 160 discs',
    ),
    array(
        'id'    => 'b10',
        'stone' => 'Amethyst',
        'col'   => '#7d4fb5',
        'cut'   => 'Smooth',
        'shape' => 'Nugget',
        'size'  => '12',
        'sold'  => 'Strand',
        'len'   => '16 in',
        'hole'  => '1.5',
        'q'     => 'Commercial',
        'price' => 690,
        'n'     => 'about 30 nuggets',
    ),
    array(
        'id'    => 'b11',
        'stone' => 'Garnet',
        'col'   => '#7a1625',
        'cut'   => 'Smooth',
        'shape' => 'Round',
        'size'  => '3',
        'sold'  => 'Loose pieces',
        'len'   => '—',
        'hole'  => '0.6',
        'q'     => 'AA',
        'price' => 6,
        'n'     => 'per bead',
    ),
    array(
        'id'    => 'b12',
        'stone' => 'Blue Topaz',
        'col'   => '#58b3e0',
        'cut'   => 'Smooth',
        'shape' => 'Coin & cube',
        'size'  => '8',
        'sold'  => 'Strand',
        'len'   => '18 in',
        'hole'  => '1',
        'q'     => 'AA',
        'price' => 880,
        'n'     => 'about 55 coins',
    ),
);
?>

<div class="beads-page-wrapper" style="background: #FAF7F2; min-height: 100vh; padding: 24px 20px 80px; font-family: 'Manrope', 'Segoe UI', Arial, sans-serif; color: #1C1A17;">
  <div style="max-width: 1240px; margin: 0 auto;">

    <!-- Breadcrumb trail -->
    <div class="crumb" style="font-size: 11px; color: #76706A; margin-bottom: 14px;">
      <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a> <span style="margin: 0 4px;">›</span>
      <span style="font-weight: 700; color: #1C1A17;">Beads</span>
    </div>

    <!-- Header Hero (Image 1): Title + Intro on left, "How we name beads" Box on right -->
    <div class="lhead" style="display: grid; grid-template-columns: minmax(0, 1fr) 360px; gap: 36px; align-items: start; margin-bottom: 24px;">
      <div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 34px; font-weight: 400; line-height: 1.2; margin: 0 0 10px; color: #1C1A17;">Gemstone beads</h1>
        <p style="font-size: 14px; line-height: 1.65; color: #76706A; max-width: 680px; margin: 0;">
          Natural gemstone beads, by the strand or as loose pieces, drilled and matched in Jaipur. Choose by stone, then shape and size. Every strand shows its length, about how many beads it holds and the hole size.
        </p>
      </div>

      <!-- How we name beads Box (Image 1) -->
      <div class="nsbox" style="background: #FFFFFF; border: 1px solid #E8E1D6; padding: 18px 20px; font-size: 13px;">
        <span style="font-size: 10.5px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #9B7C4E; display: block; margin-bottom: 6px;">HOW WE NAME BEADS</span>
        <p style="font-size: 12.5px; line-height: 1.6; color: #1C1A17; margin: 0;">
          Stone · Cut · Shape · Beads · mm, e.g. "Amethyst Faceted Rondelle Beads 4 mm". The strand length is in the details.
        </p>
      </div>
    </div>

    <!-- 8 Circular Bead Shape Tiles Row (Image 1 .btiles) -->
    <div class="btiles" style="display: grid; grid-template-columns: repeat(8, minmax(0, 1fr)); gap: 14px; margin-top: 26px; margin-bottom: 28px;">
      <?php foreach ($bead_shapes_tiles as $tile) : ?>
        <a href="javascript:void(0)" class="circ-shape-btn" data-shape="<?php echo esc_attr($tile['shape']); ?>" onclick="applyBeadShapeFilter('<?php echo esc_js($tile['shape']); ?>', this)" style="display: flex; flex-direction: column; align-items: center; gap: 8px; text-decoration: none; color: #1C1A17; font-size: 12.5px; text-align: center; cursor: pointer;">
          <span class="c-tile-box" style="width: 100%; aspect-ratio: 1/1; border-radius: 50%; background: #FFFFFF; border: 1px solid #E8E1D6; display: flex; align-items: center; justify-content: center; overflow: hidden; transition: all .3s;">
            <?php echo vivaaz_render_strand_svg($tile['shape'], $tile['col'], 100); ?>
          </span>
          <span class="shape-label-text" style="font-size: 12.5px; line-height: 1.25;"><?php echo esc_html($tile['name']); ?></span>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- Divider Bar: Count + Sort -->
    <div class="bar" style="display: flex; justify-content: space-between; align-items: center; gap: 14px; padding: 12px 0; border-top: 1px solid #E8E1D6; border-bottom: 1px solid #E8E1D6; font-size: 13px; color: #76706A; margin-bottom: 28px;">
      <div id="beads-count-text" style="font-size: 13px; color: #1C1A17; font-weight: 500;">12 products</div>
      <div>Sort: <b style="color: #1C1A17;">Newest ▾</b></div>
    </div>

    <!-- Main 2-Column Catalog Layout: Left Sidebar + Right 3-Column Grid (Image 1) -->
    <div class="beads-main-grid" style="display: grid; grid-template-columns: 220px 1fr; gap: 36px; align-items: start;">
      
      <!-- Left Sidebar Filters (Image 1) -->
      <aside class="side" style="font-size: 13px;">
        
        <!-- Section: STONE -->
        <div style="margin-bottom: 20px;">
          <span style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #76706A; margin-bottom: 10px;">STONE</span>
          <div style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="bead-filter-pill" data-group="stone" data-val="Amethyst" onclick="toggleBeadFilter('stone', 'Amethyst', this)">Amethyst <em>2</em></button>
            <button type="button" class="bead-filter-pill" data-group="stone" data-val="Blue Topaz" onclick="toggleBeadFilter('stone', 'Blue Topaz', this)">Blue Topaz <em>2</em></button>
            <button type="button" class="bead-filter-pill" data-group="stone" data-val="Emerald" onclick="toggleBeadFilter('stone', 'Emerald', this)">Emerald <em>1</em></button>
            <button type="button" class="bead-filter-pill" data-group="stone" data-val="Garnet" onclick="toggleBeadFilter('stone', 'Garnet', this)">Garnet <em>2</em></button>
            <button type="button" class="bead-filter-pill" data-group="stone" data-val="Labradorite" onclick="toggleBeadFilter('stone', 'Labradorite', this)">Labradorite <em>1</em></button>
            <button type="button" class="bead-filter-pill" data-group="stone" data-val="Peridot" onclick="toggleBeadFilter('stone', 'Peridot', this)">Peridot <em>1</em></button>
            <button type="button" class="bead-filter-pill" data-group="stone" data-val="Rose Quartz" onclick="toggleBeadFilter('stone', 'Rose Quartz', this)">Rose Quartz <em>1</em></button>
            <button type="button" class="bead-filter-pill" data-group="stone" data-val="Ruby" onclick="toggleBeadFilter('stone', 'Ruby', this)">Ruby <em>1</em></button>
            <button type="button" class="bead-filter-pill" data-group="stone" data-val="Turquoise" onclick="toggleBeadFilter('stone', 'Turquoise', this)">Turquoise <em>1</em></button>
          </div>
        </div>

        <hr style="border: 0; border-top: 1px solid #E8E1D6; margin: 18px 0;">

        <!-- Section: BEAD SHAPE -->
        <div style="margin-bottom: 20px;">
          <span style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #76706A; margin-bottom: 10px;">BEAD SHAPE</span>
          <div style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="bead-filter-pill" data-group="shape" data-val="Round" onclick="toggleBeadFilter('shape', 'Round', this)">Round <em>5</em></button>
            <button type="button" class="bead-filter-pill" data-group="shape" data-val="Rondelle" onclick="toggleBeadFilter('shape', 'Rondelle', this)">Rondelle <em>1</em></button>
            <button type="button" class="bead-filter-pill" data-group="shape" data-val="Faceted rondelle" onclick="toggleBeadFilter('shape', 'Faceted rondelle', this)">Faceted rondelle <em>1</em></button>
            <button type="button" class="bead-filter-pill" data-group="shape" data-val="Nugget" onclick="toggleBeadFilter('shape', 'Nugget', this)">Nugget <em>1</em></button>
            <button type="button" class="bead-filter-pill" data-group="shape" data-val="Chips" onclick="toggleBeadFilter('shape', 'Chips', this)">Chips <em>1</em></button>
            <button type="button" class="bead-filter-pill" data-group="shape" data-val="Heishi" onclick="toggleBeadFilter('shape', 'Heishi', this)">Heishi <em>1</em></button>
            <button type="button" class="bead-filter-pill" data-group="shape" data-val="Briolette & drops" onclick="toggleBeadFilter('shape', 'Briolette & drops', this)">Briolette & drops <em>1</em></button>
            <button type="button" class="bead-filter-pill" data-group="shape" data-val="Coin & cube" onclick="toggleBeadFilter('shape', 'Coin & cube', this)">Coin & cube <em>1</em></button>
          </div>
        </div>

        <hr style="border: 0; border-top: 1px solid #E8E1D6; margin: 18px 0;">

        <!-- Section: BEAD SIZE (MM) -->
        <div style="margin-bottom: 20px;">
          <span style="display: block; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #76706A; margin-bottom: 10px;">BEAD SIZE (MM)</span>
          <div style="display: flex; flex-wrap: wrap; gap: 6px;">
            <button type="button" class="bead-filter-pill" data-group="size" data-val="3" onclick="toggleBeadFilter('size', '3', this)">3 mm <em>2</em></button>
            <button type="button" class="bead-filter-pill" data-group="size" data-val="4" onclick="toggleBeadFilter('size', '4', this)">4 mm <em>2</em></button>
            <button type="button" class="bead-filter-pill" data-group="size" data-val="5" onclick="toggleBeadFilter('size', '5', this)">5 mm <em>2</em></button>
            <button type="button" class="bead-filter-pill" data-group="size" data-val="6" onclick="toggleBeadFilter('size', '6', this)">6 mm <em>2</em></button>
            <button type="button" class="bead-filter-pill" data-group="size" data-val="8" onclick="toggleBeadFilter('size', '8', this)">8 mm <em>3</em></button>
            <button type="button" class="bead-filter-pill" data-group="size" data-val="12" onclick="toggleBeadFilter('size', '12', this)">12 mm <em>1</em></button>
          </div>
        </div>

      </aside>

      <!-- Right 3-Column Grid of Bead Cards (Image 1) -->
      <div>
        <div class="beads-cards-grid" id="beads-cards-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
          <?php 
          foreach ($beads_catalog as $b) : 
            $clean_shape = str_ireplace(array(' & drops', ' & cube'), '', $b['shape']);
            $card_title = $b['stone'] . ' ' . $b['cut'] . ' ' . $clean_shape . ' Beads ' . $b['size'] . ' mm';
            $card_meta = ($b['sold'] === 'Strand' ? 'Strand ' . $b['len'] . ' · ' : '') . $b['n'] . ' · hole ' . $b['hole'] . ' mm';
            $unit_label = ($b['sold'] === 'Strand') ? 'per strand' : 'per piece';
          ?>
            <div class="bead-card-item" data-stone="<?php echo esc_attr($b['stone']); ?>" data-shape="<?php echo esc_attr($b['shape']); ?>" data-size="<?php echo esc_attr($b['size']); ?>" style="position: relative; background: #FFFFFF; border: 1px solid #EFE9E0; display: flex; flex-direction: column; transition: box-shadow .3s;">
              
              <!-- Card Photo / SVG Strand Illustration (Image 1) -->
              <div class="bead-card-ph" style="position: relative; aspect-ratio: 1/1; background: #F6F4F0; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                <?php echo vivaaz_render_strand_svg($b['shape'], $b['col'], 260); ?>
                
                <!-- Wishlist Heart Button top-right (Image 1) -->
                <button type="button" class="bead-wl-btn" onclick="toggleBeadWishlist('<?php echo esc_js($b['id']); ?>', this)" style="position: absolute; right: 12px; top: 12px; width: 34px; height: 34px; border-radius: 50%; background: #FFFFFF; border: 1px solid #E8E1D6; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #76706A; font-size: 15px; z-index: 2;">
                  ♡
                </button>

                <!-- Quick view bar on hover -->
                <button type="button" class="qv-overlay-btn" onclick="openBeadQuickView('<?php echo esc_js($card_title); ?>', '<?php echo esc_js($card_meta); ?>', '₹<?php echo number_format($b['price']); ?> <?php echo $unit_label; ?>')" style="position: absolute; left: 0; right: 0; bottom: 0; background: #1C1A17; color: #FFFFFF; border: 0; padding: 10px; font-size: 11px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; cursor: pointer; z-index: 3;">
                  QUICK VIEW
                </button>
              </div>

              <!-- Card Body (Image 1) -->
              <div style="padding: 16px 18px 18px; display: flex; flex-direction: column; flex: 1;">
                <div style="font-size: 14.5px; font-weight: 500; color: #1C1A17; margin-bottom: 4px; line-height: 1.35;"><?php echo esc_html($card_title); ?></div>
                <div style="font-size: 12px; color: #76706A; margin-bottom: 12px;"><?php echo esc_html($card_meta); ?></div>
                
                <div style="font-weight: 600; font-size: 14.5px; color: #1C1A17; margin-top: auto; margin-bottom: 14px;">
                  ₹<?php echo number_format($b['price']); ?> <span style="font-weight: 400; font-size: 12px; color: #76706A;"><?php echo esc_html($unit_label); ?></span>
                </div>

                <div>
                  <button type="button" onclick="selectBeadOptions('<?php echo esc_js($card_title); ?>', '₹<?php echo number_format($b['price']); ?>')" class="ul-btn-link" style="background: none; border: none; padding: 0; font-family: inherit; font-size: 11.5px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; color: #1C1A17; text-decoration: underline; text-underline-offset: 3px; cursor: pointer;">
                    SELECT OPTIONS
                  </button>
                </div>
              </div>

            </div>
          <?php endforeach; ?>
        </div>

        <div id="no-beads-msg" style="display: none; background: #FFFFFF; border: 1px solid #E8E1D6; padding: 40px; text-align: center; color: #76706A; font-size: 14px;">
          No beads match these filters. <a href="javascript:void(0)" onclick="resetAllBeadFilters()" style="color: #9B7C4E; text-decoration: underline; font-weight: 600; margin-left: 6px;">Clear all</a>
        </div>
      </div>

    </div>

  </div>
</div>

<style>
/* Beads Page Styling matching client demo */
.bead-filter-pill {
  padding: 5px 12px;
  font-size: 12px;
  font-weight: 500;
  border-radius: 999px;
  border: 1px solid #E8E1D6;
  background: #FFFFFF;
  color: #1C1A17;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 5px;
  transition: all .2s;
}
.bead-filter-pill em {
  font-style: normal;
  color: #76706A;
  font-size: 11px;
}
.bead-filter-pill.on {
  background: #1C1A17 !important;
  color: #FFFFFF !important;
  border-color: #1C1A17 !important;
}
.bead-filter-pill.on em {
  color: #FFFFFF !important;
}

.circ-shape-btn:hover .c-tile-box {
  box-shadow: 0 8px 20px rgba(28,26,23,.1);
}
.circ-shape-btn.on .c-tile-box {
  border-color: #1C1A17 !important;
  border-width: 1.5px !important;
}
.circ-shape-btn.on .shape-label-text {
  font-weight: 700 !important;
}

.bead-card-item:hover {
  box-shadow: 0 18px 40px rgba(28,26,23,.08);
}
.bead-card-ph .qv-overlay-btn {
  opacity: 0;
  transform: translateY(100%);
  transition: all .25s ease;
}
.bead-card-item:hover .qv-overlay-btn {
  opacity: 1;
  transform: translateY(0);
}

@media (max-width: 1000px) {
  .btiles {
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
  }
  .lhead {
    grid-template-columns: 1fr !important;
  }
  .beads-main-grid {
    grid-template-columns: 1fr !important;
  }
  .beads-cards-grid {
    grid-template-columns: repeat(2, 1fr) !important;
  }
}
@media (max-width: 600px) {
  .btiles {
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    gap: 8px !important;
  }
  .beads-cards-grid {
    grid-template-columns: 1fr !important;
  }
}
</style>

<script>
var activeBeadFilters = {
  stone: null,
  shape: null,
  size: null
};

function toggleBeadFilter(group, val, el) {
  if (activeBeadFilters[group] === val) {
    activeBeadFilters[group] = null;
    el.classList.remove('on');
  } else {
    activeBeadFilters[group] = val;
    document.querySelectorAll('.bead-filter-pill[data-group="' + group + '"]').forEach(function(b) {
      b.classList.remove('on');
    });
    el.classList.add('on');
  }

  // Also sync top shape tiles if shape was toggled
  if (group === 'shape') {
    document.querySelectorAll('.circ-shape-btn').forEach(function(btn) {
      if (btn.getAttribute('data-shape') === activeBeadFilters.shape) {
        btn.classList.add('on');
      } else {
        btn.classList.remove('on');
      }
    });
  }

  filterBeadCards();
}

function applyBeadShapeFilter(shape, el) {
  if (activeBeadFilters.shape === shape) {
    activeBeadFilters.shape = null;
    el.classList.remove('on');
  } else {
    activeBeadFilters.shape = shape;
    document.querySelectorAll('.circ-shape-btn').forEach(function(btn) { btn.classList.remove('on'); });
    el.classList.add('on');
  }

  // Sync sidebar shape pills
  document.querySelectorAll('.bead-filter-pill[data-group="shape"]').forEach(function(b) {
    if (b.getAttribute('data-val') === activeBeadFilters.shape) {
      b.classList.add('on');
    } else {
      b.classList.remove('on');
    }
  });

  filterBeadCards();
}

function filterBeadCards() {
  var cards = document.querySelectorAll('.bead-card-item');
  var visibleCount = 0;

  cards.forEach(function(card) {
    var cStone = card.getAttribute('data-stone');
    var cShape = card.getAttribute('data-shape');
    var cSize = card.getAttribute('data-size');

    var matchStone = (!activeBeadFilters.stone || cStone === activeBeadFilters.stone);
    var matchShape = (!activeBeadFilters.shape || cShape === activeBeadFilters.shape);
    var matchSize = (!activeBeadFilters.size || cSize === activeBeadFilters.size);

    if (matchStone && matchShape && matchSize) {
      card.style.display = 'flex';
      visibleCount++;
    } else {
      card.style.display = 'none';
    }
  });

  var countText = document.getElementById('beads-count-text');
  if (countText) {
    countText.textContent = visibleCount + (visibleCount === 1 ? ' product' : ' products');
  }

  var noMsg = document.getElementById('no-beads-msg');
  if (noMsg) {
    noMsg.style.display = visibleCount === 0 ? 'block' : 'none';
  }
}

function resetAllBeadFilters() {
  activeBeadFilters = { stone: null, shape: null, size: null };
  document.querySelectorAll('.bead-filter-pill').forEach(function(b) { b.classList.remove('on'); });
  document.querySelectorAll('.circ-shape-btn').forEach(function(btn) { btn.classList.remove('on'); });
  filterBeadCards();
}

function toggleBeadWishlist(id, btn) {
  if (btn.textContent.trim() === '♡') {
    btn.textContent = '♥';
    btn.style.color = '#B02A3A';
  } else {
    btn.textContent = '♡';
    btn.style.color = '#76706A';
  }
}

function openBeadQuickView(title, meta, price) {
  alert('Quick View: ' + title + '\n' + meta + '\n' + price);
}

function selectBeadOptions(title, price) {
  alert(title + ' (' + price + ') selected! You can choose length or add to bag.');
}
</script>

<?php
get_footer('shop');
