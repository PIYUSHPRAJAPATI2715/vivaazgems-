<?php
/**
 * Template Name: Astrology Guide Page
 * Vivaaz Gems - Gemstones and Astrology Guide
 * Matches Client PDF Point 12: Nine planet buttons below top section, one block per planet.
 */

defined('ABSPATH') || exit;

get_header('shop');

$planets = array(
  array(
    'id' => 'sun', 
    'planet' => 'Sun',
    'sanskrit' => 'Surya', 
    'stone' => 'Ruby',
    'hindi_stone' => 'Manik', 
    'img' => 'ruby.jpg',
    'desc' => 'The stone of the Sun, traditionally worn for confidence, nobility and leadership. A fine ruby for astrology is chosen by colour, natural unheated clarity and exact weight.', 
    'upratna' => 'Red garnet, red spinel', 
    'weight' => '3–6 ratti', 
    'metal' => 'Gold or copper', 
    'finger' => 'Ring finger, right hand', 
    'day' => 'Sunday morning'
  ),
  array(
    'id' => 'moon', 
    'planet' => 'Moon',
    'sanskrit' => 'Chandra', 
    'stone' => 'Pearl',
    'hindi_stone' => 'Moti', 
    'img' => 'moonstone.jpg',
    'desc' => 'The stone of the Moon, traditionally worn for peace of mind, calmness and emotional balance. Natural pearls and moonstones are selected by lustre and smooth texture.', 
    'upratna' => 'Rainbow moonstone', 
    'weight' => '4–7 ratti', 
    'metal' => 'Silver', 
    'finger' => 'Little finger', 
    'day' => 'Monday morning'
  ),
  array(
    'id' => 'mars', 
    'planet' => 'Mars',
    'sanskrit' => 'Mangal', 
    'stone' => 'Red Coral',
    'hindi_stone' => 'Moonga', 
    'img' => 'ruby.jpg',
    'desc' => 'The stone of Mars, traditionally worn for physical vitality, courage and determination. Natural Italian and Mediterranean red coral is chosen by intense colour and clean surface.', 
    'upratna' => 'Carnelian', 
    'weight' => '5–8 ratti', 
    'metal' => 'Gold or copper', 
    'finger' => 'Ring finger', 
    'day' => 'Tuesday morning'
  ),
  array(
    'id' => 'mercury', 
    'planet' => 'Mercury',
    'sanskrit' => 'Budh', 
    'stone' => 'Emerald',
    'hindi_stone' => 'Panna', 
    'img' => 'emerald.jpg',
    'desc' => 'The stone of Mercury, traditionally worn for intellectual acumen, business acumen and articulate communication. Emerald is chosen by its velvety green colour and clarity.', 
    'upratna' => 'Peridot, green tourmaline', 
    'weight' => '3–6 ratti', 
    'metal' => 'Gold', 
    'finger' => 'Little finger', 
    'day' => 'Wednesday morning'
  ),
  array(
    'id' => 'jupiter', 
    'planet' => 'Jupiter',
    'sanskrit' => 'Guru', 
    'stone' => 'Yellow Sapphire',
    'hindi_stone' => 'Pukhraj', 
    'img' => 'ceylon-sapphire.jpg',
    'desc' => 'The stone of Jupiter, traditionally worn for wisdom, fortune, spiritual growth and prosperity. Ceylon yellow sapphire is chosen by its clean, radiant and even golden hue.', 
    'upratna' => 'Citrine, yellow topaz', 
    'weight' => '3–6 ratti', 
    'metal' => 'Gold', 
    'finger' => 'Index finger', 
    'day' => 'Thursday morning'
  ),
  array(
    'id' => 'venus', 
    'planet' => 'Venus',
    'sanskrit' => 'Shukra', 
    'stone' => 'White Sapphire',
    'hindi_stone' => 'Safed Pukhraj', 
    'img' => 'swiss-topaz.jpg',
    'desc' => 'The stone of Venus, traditionally worn for artistic beauty, marital harmony and luxury. White sapphire is a natural, 9-Mohs hard alternative to diamond.', 
    'upratna' => 'White topaz, rock crystal', 
    'weight' => '3–6 ratti', 
    'metal' => 'Silver or platinum', 
    'finger' => 'Middle finger', 
    'day' => 'Friday morning'
  ),
  array(
    'id' => 'saturn', 
    'planet' => 'Saturn',
    'sanskrit' => 'Shani', 
    'stone' => 'Blue Sapphire',
    'hindi_stone' => 'Neelam', 
    'img' => 'ceylon-sapphire.jpg',
    'desc' => 'The stone of Saturn, considered the most potent of the nine. Ceylon blue sapphire for astrology should be chosen only after a proper astrological consultation.', 
    'upratna' => 'Iolite, amethyst', 
    'weight' => '3–6 ratti', 
    'metal' => 'Silver or panchdhatu', 
    'finger' => 'Middle finger', 
    'day' => 'Saturday evening'
  ),
  array(
    'id' => 'rahu', 
    'planet' => 'Rahu',
    'sanskrit' => 'North Node', 
    'stone' => 'Hessonite',
    'hindi_stone' => 'Gomed', 
    'img' => 'ruby.jpg',
    'desc' => 'The stone of Rahu. Natural Ceylon and Indian hessonite is a warm honey to cinnamon coloured grossular garnet, worn for protection against confusion.', 
    'upratna' => 'Orange zircon', 
    'weight' => '5–8 ratti', 
    'metal' => 'Silver', 
    'finger' => 'Middle finger', 
    'day' => 'Saturday evening'
  ),
  array(
    'id' => 'ketu', 
    'planet' => 'Ketu',
    'sanskrit' => 'South Node', 
    'stone' => "Cat's Eye", 
    'hindi_stone' => 'Lehsunia', 
    'img' => 'moonstone.jpg',
    'desc' => 'The stone of Ketu. A natural chrysoberyl cat’s eye displays a distinct, razor-sharp chatoyant milk-and-honey line of light across the dome.', 
    'upratna' => "Cat's eye tourmaline", 
    'weight' => '3–6 ratti', 
    'metal' => 'Silver', 
    'finger' => 'Little finger', 
    'day' => 'Tuesday or Thursday'
  )
);
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 40px 20px 80px; min-height: 80vh;">
  <div class="container" style="max-width: 1100px; margin: 0 auto;">
    
    <!-- Hero Top Section -->
    <div style="text-align: center; margin-bottom: 36px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">INDIAN TRADITION & NAVRATNA</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 36px; font-weight: 400; margin: 8px 0 12px; color: #1C1A17;">Gemstones and astrology</h1>
      <p style="font-size: 15px; color: #4A4640; max-width: 780px; margin: 0 auto; line-height: 1.8;">
        In Indian tradition, each of the nine planets has its own gemstone. The right stone, and the right weight, are chosen from your birth chart. We help you in two steps: our astrologer reads your chart, and our gem team finds a natural, certified stone that fits.
      </p>
      <div style="display: flex; justify-content: center; gap: 14px; margin-top: 24px; flex-wrap: wrap;">
        <button type="button" onclick="openConsultationModal()" class="btn-square-dark" style="padding: 13px 26px; background: #1C1A17; color: #FFFFFF; border: 1px solid #1C1A17; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer;">
          BOOK A CONSULTATION →
        </button>
        <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I need help choosing an astrology stone from my birth chart.'); ?>" target="_blank" class="btn-outline-dark" style="padding: 13px 26px; background: #FFFFFF; color: #1C1A17; border: 1px solid #1C1A17; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; display: inline-flex; align-items: center; gap: 6px;">
          <span>💬</span> ASK ON WHATSAPP
        </a>
      </div>
    </div>

    <!-- POINT 12 SPEC: NINE PLANET BUTTONS BELOW TOP SECTION -->
    <div class="nine-planet-nav-box" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 24px; margin-bottom: 40px;">
      <div style="text-align: center; margin-bottom: 16px;">
        <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.12em; color: #9C7C4C; text-transform: uppercase;">THE NINE PLANETS · NAVRATNA QUICK JUMP</span>
      </div>
      <div class="planet-buttons-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px;">
        <?php foreach ($planets as $p) : ?>
        <a href="#<?php echo esc_attr($p['id']); ?>" class="planet-btn-item" style="display: flex; align-items: center; justify-content: space-between; padding: 12px 16px; background: #FAF7F2; border: 1px solid var(--color-border-light); text-decoration: none; color: #1C1A17; transition: all 0.2s ease;">
          <div>
            <strong style="font-size: 12px; display: block;"><?php echo esc_html($p['planet']); ?> · <?php echo esc_html($p['stone']); ?></strong>
            <span style="font-size: 10px; color: var(--color-text-muted);"><?php echo esc_html($p['hindi_stone']); ?></span>
          </div>
          <span style="font-size: 12px; color: #9C7C4C;">↓</span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- POINT 12 SPEC: ONE BLOCK PER PLANET -->
    <div class="nine-planets-blocks-list" style="display: flex; flex-direction: column; gap: 28px; margin-bottom: 44px;">
      <?php foreach ($planets as $p) : ?>
      <div id="<?php echo esc_attr($p['id']); ?>" class="planet-card-block" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 32px; scroll-margin-top: 100px;">
        
        <div style="display: flex; justify-content: space-between; align-items: baseline; flex-wrap: wrap; gap: 10px; margin-bottom: 16px; border-bottom: 1px solid var(--color-border-light); padding-bottom: 12px;">
          <div>
            <span style="font-size: 10px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;">PLANET <?php echo strtoupper($p['planet']); ?></span>
            <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 24px; margin: 4px 0 0; color: #1C1A17;">
              <?php echo esc_html($p['planet']); ?> (<?php echo esc_html($p['sanskrit']); ?>) · <span style="color: #9C7C4C;"><?php echo esc_html($p['stone']); ?> (<?php echo esc_html($p['hindi_stone']); ?>)</span>
            </h2>
          </div>
          <span style="font-size: 11px; font-weight: 700; color: #1E9E52; background: #FAF7F2; border: 1px solid var(--color-border-light); padding: 4px 10px;">
            ✓ Lab Certificate Included
          </span>
        </div>

        <div style="display: grid; grid-template-columns: 160px 1fr; gap: 24px; margin-bottom: 20px; align-items: center;">
          <div style="aspect-ratio: 1/1; overflow: hidden; border: 1px solid var(--color-border-light); background: #FAF7F2;">
            <img src="<?php echo esc_url(vivaaz_get_img_url($p['img'])); ?>" alt="<?php echo esc_attr($p['stone']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
          </div>
          <div>
            <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0 0 12px;">
              <?php echo esc_html($p['desc']); ?>
            </p>
            <div style="font-size: 12px; color: var(--color-text-muted);">
              <strong>Substitute (upratna):</strong> <?php echo esc_html($p['upratna']); ?>
            </div>
          </div>
        </div>

        <!-- How to wear table -->
        <table style="width: 100%; border-collapse: collapse; font-size: 12px; background: #FAF7F2; border: 1px solid var(--color-border-light); margin-bottom: 18px;">
          <thead>
            <tr style="border-bottom: 1px solid var(--color-border-light); font-weight: 700; color: var(--color-text-muted); text-transform: uppercase; font-size: 10px;">
              <th style="padding: 10px 14px; text-align: left;">Weight usually advised</th>
              <th style="padding: 10px 14px; text-align: left;">Metal</th>
              <th style="padding: 10px 14px; text-align: left;">Finger</th>
              <th style="padding: 10px 14px; text-align: left;">Day to wear</th>
            </tr>
          </thead>
          <tbody>
            <tr style="font-weight: 600; color: #1C1A17;">
              <td style="padding: 10px 14px;"><?php echo esc_html($p['weight']); ?></td>
              <td style="padding: 10px 14px;"><?php echo esc_html($p['metal']); ?></td>
              <td style="padding: 10px 14px;"><?php echo esc_html($p['finger']); ?></td>
              <td style="padding: 10px 14px;"><?php echo esc_html($p['day']); ?></td>
            </tr>
          </tbody>
        </table>

        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
          <div style="font-size: 11px; color: var(--color-text-muted);">
            Traditional Vedic guidelines. Your astrologer confirms the weight and the metal.
          </div>
          <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I am looking for a natural, certified ' . $p['stone'] . ' (' . $p['hindi_stone'] . ') for planet ' . $p['planet'] . '.'); ?>" target="_blank" class="btn-square-dark" style="padding: 10px 18px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;">
              ASK FOR THIS STONE →
            </a>
            <button type="button" onclick="openConsultationModal()" class="btn-outline-dark" style="padding: 10px 18px; background: #FFFFFF; color: #1C1A17; border: 1px solid #1C1A17; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; cursor: pointer;">
              BOOK A CONSULTATION
            </button>
          </div>
        </div>

      </div>
      <?php endforeach; ?>
    </div>

    <!-- Weight & Substitutes Info Cards -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 32px;">
      
      <div id="weight" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 28px; scroll-margin-top: 100px;">
        <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 20px; margin: 0 0 10px; color: #1C1A17;">Weight: carat and ratti</h3>
        <p style="font-size: 13px; line-height: 1.8; color: #4A4640; margin: 0;">
          Astrology stones are chosen by weight in ratti. On our site one ratti is counted as 0.91 carat, and we always show both. Your astrologer will tell you the weight; we then show you natural stones calibrated to that weight.
        </p>
      </div>

      <div id="substitutes" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 28px; scroll-margin-top: 100px;">
        <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 20px; margin: 0 0 10px; color: #1C1A17;">Substitute stones (upratna)</h3>
        <p style="font-size: 13px; line-height: 1.8; color: #4A4640; margin: 0;">
          When the primary precious stone is beyond budget, tradition allows a substitute stone of the same planet, listed under each planet above.
        </p>
      </div>

    </div>

    <!-- Navratna Set (Anchor #navratna) -->
    <div id="navratna" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 32px; margin-bottom: 32px; scroll-margin-top: 100px;">
      <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 0 0 10px; color: #1C1A17;">Navratna set</h3>
      <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin-bottom: 16px;">
        Nine stones, one for each planet, matched together as a set for a ring or pendant. Made on request: tell us the size and budget and we put a set together for you from our Jaipur stock.
      </p>
      <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I would like to inquire about a custom matched Navratna set.'); ?>" target="_blank" style="color: #25D366; font-weight: 700; text-decoration: underline; font-size: 13px;">Inquire about Navratna set on WhatsApp →</a>
    </div>

    <!-- Birthstones by Month (Anchor #birthstones) -->
    <div id="birthstones" style="background: #FFFFFF; border: 1px solid var(--color-border-light); padding: 32px; margin-bottom: 32px; scroll-margin-top: 100px;">
      <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 0 0 16px; color: #1C1A17;">Birthstones by month</h3>
      <div style="font-size: 13px; line-height: 2; color: #4A4640;">
        <strong>January:</strong> Garnet · <strong>February:</strong> Amethyst · <strong>March:</strong> Aquamarine · <strong>April:</strong> Diamond or white topaz · <strong>May:</strong> Emerald · <strong>June:</strong> Pearl or moonstone · <strong>July:</strong> Ruby · <strong>August:</strong> Peridot or spinel · <strong>September:</strong> Sapphire · <strong>October:</strong> Opal or tourmaline · <strong>November:</strong> Citrine or topaz · <strong>December:</strong> Turquoise, tanzanite or blue topaz
      </div>
    </div>

    <!-- Note on Tradition -->
    <div style="background: #FAF7F2; border-left: 3px solid #9C7C4C; padding: 20px; font-size: 13px; line-height: 1.7; color: #4A4640;">
      <strong>A note on tradition:</strong> We share this tradition with respect, but we do not promise any result. What we do promise is a natural stone, honestly described, with a certificate.
    </div>

  </div>
</div>

<?php
get_footer('shop');
