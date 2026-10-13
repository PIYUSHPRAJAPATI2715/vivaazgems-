<?php
/**
 * Template Name: Astrology Guide Page
 * Vivaaz Gems - Gemstones and Astrology Guide
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');

$planets = array(
  array('id' => 'sun', 'name' => 'Sun (Surya)', 'stone' => 'Ruby (Manik)', 'desc' => 'The stone of the Sun, traditionally worn for confidence and leadership. A fine ruby for astrology is chosen by colour, clarity and weight.', 'upratna' => 'Red garnet, red spinel', 'weight' => '3–6 ratti', 'metal' => 'Gold or copper', 'finger' => 'Ring finger, right hand', 'day' => 'Sunday morning'),
  array('id' => 'moon', 'name' => 'Moon (Chandra)', 'stone' => 'Pearl (Moti)', 'desc' => 'The stone of the Moon, traditionally worn for calm and balance. Natural pearls are chosen by lustre and shape.', 'upratna' => 'Rainbow moonstone', 'weight' => '4–7 ratti', 'metal' => 'Silver', 'finger' => 'Little finger', 'day' => 'Monday morning'),
  array('id' => 'mars', 'name' => 'Mars (Mangal)', 'stone' => 'Red Coral (Moonga)', 'desc' => 'The stone of Mars, traditionally worn for energy and courage. Natural red coral is chosen by colour and smooth surface.', 'upratna' => 'Carnelian', 'weight' => '5–8 ratti', 'metal' => 'Gold or copper', 'finger' => 'Ring finger', 'day' => 'Tuesday morning'),
  array('id' => 'mercury', 'name' => 'Mercury (Budh)', 'stone' => 'Emerald (Panna)', 'desc' => 'The stone of Mercury, traditionally worn for clear thinking and communication. Emerald is chosen by its green colour and clarity.', 'upratna' => 'Peridot, green tourmaline', 'weight' => '3–6 ratti', 'metal' => 'Gold', 'finger' => 'Little finger', 'day' => 'Wednesday morning'),
  array('id' => 'jupiter', 'name' => 'Jupiter (Guru)', 'stone' => 'Yellow Sapphire (Pukhraj)', 'desc' => 'The stone of Jupiter, traditionally worn for wisdom and growth. Yellow sapphire is chosen by its clean, even yellow.', 'upratna' => 'Citrine, yellow topaz', 'weight' => '3–6 ratti', 'metal' => 'Gold', 'finger' => 'Index finger', 'day' => 'Thursday morning'),
  array('id' => 'venus', 'name' => 'Venus (Shukra)', 'stone' => 'White Sapphire (Safed Pukhraj)', 'desc' => 'The stone of Venus, traditionally worn for harmony and beauty. White sapphire is a natural, hard alternative to diamond.', 'upratna' => 'White topaz, rock crystal', 'weight' => '3–6 ratti', 'metal' => 'Silver or platinum', 'finger' => 'Middle finger', 'day' => 'Friday morning'),
  array('id' => 'saturn', 'name' => 'Saturn (Shani)', 'stone' => 'Blue Sapphire (Neelam)', 'desc' => 'The stone of Saturn, considered the most powerful of the nine. Blue sapphire for astrology should be chosen only after a proper consultation.', 'upratna' => 'Iolite, amethyst', 'weight' => '3–6 ratti', 'metal' => 'Silver or panchdhatu', 'finger' => 'Middle finger', 'day' => 'Saturday evening'),
  array('id' => 'rahu', 'name' => 'Rahu', 'stone' => 'Hessonite (Gomed)', 'desc' => 'The stone of Rahu. Hessonite is a honey to cinnamon coloured garnet.', 'upratna' => '—', 'weight' => '5–8 ratti', 'metal' => 'Silver', 'finger' => 'Middle finger', 'day' => 'Saturday evening'),
  array('id' => 'ketu', 'name' => 'Ketu', 'stone' => 'Cat’s Eye (Lehsunia)', 'desc' => 'The stone of Ketu. A natural chrysoberyl cat’s eye shows a sharp line of light across the stone.', 'upratna' => '—', 'weight' => '3–6 ratti', 'metal' => 'Silver', 'finger' => 'Little finger', 'day' => 'Tuesday or Thursday')
);
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 1000px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">INDIAN TRADITION & NAVRATNA</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 14px; color: #1C1A17;">Gemstones and astrology</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 800px; margin: 0 auto; line-height: 1.8;">
        In Indian tradition, each of the nine planets has its own gemstone. The right stone, and the right weight, are chosen from your birth chart. We help you in two steps: our astrologer reads your chart, and our gem team finds a natural, certified stone that fits.
      </p>
      <div style="display: flex; justify-content: center; gap: 14px; margin-top: 24px;">
        <a href="<?php echo esc_url(home_url('/astrology-consultation/')); ?>" class="btn-square-dark" style="padding: 14px 28px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
          BOOK A CONSULTATION →
        </a>
        <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello, I need help choosing an astrology stone.'); ?>" target="_blank" class="btn-outline-dark" style="padding: 14px 28px; background: #FFFFFF; color: #1C1A17; border: 1px solid #1C1A17; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
          ASK ON WHATSAPP
        </a>
      </div>
    </div>

    <!-- 9 Planets Sections -->
    <div style="display: flex; flex-direction: column; gap: 24px; margin-bottom: 40px;">
      <?php foreach ($planets as $p) : ?>
      <div id="<?php echo esc_attr($p['id']); ?>" style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 32px; scroll-margin-top: 100px;">
        <div style="display: flex; justify-content: space-between; align-items: baseline; flex-wrap: wrap; gap: 10px; margin-bottom: 12px; border-bottom: 1px solid #EBE7DF; padding-bottom: 10px;">
          <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 24px; margin: 0; color: #1C1A17;">
            <?php echo esc_html($p['name']); ?> · <span style="color: #9C7C4C;"><?php echo esc_html($p['stone']); ?></span>
          </h2>
          <span style="font-size: 11px; font-weight: 700; color: #1E9E52; background: #FAF7F2; border: 1px solid #EBE7DF; padding: 2px 8px;">Certificate Included</span>
        </div>

        <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin-bottom: 16px;">
          <?php echo esc_html($p['desc']); ?>
        </p>

        <div style="font-size: 13px; color: #76706A; margin-bottom: 20px;">
          <strong>Substitute (upratna):</strong> <?php echo esc_html($p['upratna']); ?>
        </div>

        <!-- How to wear table -->
        <table style="width: 100%; border-collapse: collapse; font-size: 12px; background: #FAF7F2; border: 1px solid #EBE7DF; margin-bottom: 20px;">
          <tr style="border-bottom: 1px solid #EBE7DF; font-weight: 700; color: #76706A;">
            <td style="padding: 10px;">Weight usually advised</td>
            <td style="padding: 10px;">Metal</td>
            <td style="padding: 10px;">Finger</td>
            <td style="padding: 10px;">Day</td>
          </tr>
          <tr style="font-weight: 600; color: #1C1A17;">
            <td style="padding: 10px;"><?php echo esc_html($p['weight']); ?></td>
            <td style="padding: 10px;"><?php echo esc_html($p['metal']); ?></td>
            <td style="padding: 10px;"><?php echo esc_html($p['finger']); ?></td>
            <td style="padding: 10px;"><?php echo esc_html($p['day']); ?></td>
          </tr>
        </table>
        <div style="font-size: 11px; color: #76706A; margin-bottom: 20px;">
          These are traditional guidelines. Your astrologer confirms the weight and the metal for you. Certificate always included.
        </div>

        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
          <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I am looking for a natural ' . $p['stone'] . ' for astrology.'); ?>" target="_blank" class="btn-square-dark" style="padding: 10px 20px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;">
            ASK FOR THIS STONE →
          </a>
          <a href="<?php echo esc_url(home_url('/astrology-consultation/')); ?>" class="btn-outline-dark" style="padding: 10px 20px; background: #FFFFFF; color: #1C1A17; border: 1px solid #1C1A17; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;">
            BOOK A CONSULTATION
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Weight & Substitutes Info Cards -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 32px;">
      
      <div id="weight" style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 28px; scroll-margin-top: 100px;">
        <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 20px; margin: 0 0 10px; color: #1C1A17;">Weight: carat and ratti</h3>
        <p style="font-size: 13px; line-height: 1.8; color: #4A4640; margin: 0;">
          Astrology stones are chosen by weight in ratti. On our site one ratti is counted as 0.91 carat, and we always show both. Your astrologer will tell you the weight; we then show you stones of that weight.
        </p>
      </div>

      <div id="substitutes" style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 28px; scroll-margin-top: 100px;">
        <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 20px; margin: 0 0 10px; color: #1C1A17;">Substitute stones (upratna)</h3>
        <p style="font-size: 13px; line-height: 1.8; color: #4A4640; margin: 0;">
          When the main stone is beyond budget, tradition allows a substitute stone of the same planet, listed under each planet above.
        </p>
      </div>

    </div>

    <!-- Navratna Set (Anchor #navratna) -->
    <div id="navratna" style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 32px; margin-bottom: 32px; scroll-margin-top: 100px;">
      <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 0 0 10px; color: #1C1A17;">Navratna set</h3>
      <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin-bottom: 16px;">
        Nine stones, one for each planet, matched together as a set for a ring or pendant. Made on request: tell us the size and budget and we put a set together for you.
      </p>
      <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I would like to inquire about a custom Navratna set.'); ?>" target="_blank" style="color: #25D366; font-weight: 700; text-decoration: underline; font-size: 13px;">Inquire about Navratna set on WhatsApp →</a>
    </div>

    <!-- Birthstones by Month (Anchor #birthstones) -->
    <div id="birthstones" style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 32px; margin-bottom: 32px; scroll-margin-top: 100px;">
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
