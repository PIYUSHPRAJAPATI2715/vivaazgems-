<?php
/**
 * Template Name: Gem Guide Page
 * Vivaaz Gems - Gemstone Knowledge & Education Guide
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');

$articles = array(
  array('title' => 'How to read a gemstone: colour, clarity, cut and carat, in plain words.', 'tag' => 'Basics'),
  array('title' => 'Calibrated stones: what the sizes mean and why jewellers use them.', 'tag' => 'Sizing'),
  array('title' => 'Heated, oiled, natural: the common treatments and what we tell you.', 'tag' => 'Treatments'),
  array('title' => 'Ruby, spinel or garnet? Three red stones compared.', 'tag' => 'Comparison'),
  array('title' => 'Blue topaz: Sky, Swiss and London, side by side.', 'tag' => 'Colours'),
  array('title' => 'Rainbow moonstone: how to choose a stone with good blue flash.', 'tag' => 'Selection'),
  array('title' => 'Carat and ratti: weights explained.', 'tag' => 'Weights'),
  array('title' => 'How to care for your gemstones at home.', 'tag' => 'Care')
);
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 900px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 48px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">LEARNING & EDUCATION</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 14px; color: #1C1A17;">Gem guide</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 720px; margin: 0 auto; line-height: 1.8;">
        Short, honest notes on gemstones from the people who sort them: how to read a stone, what the words on a certificate mean, and how to care for what you own.
      </p>
    </div>

    <!-- Article Grid -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 40px;">
      <?php foreach ($articles as $art) : ?>
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 28px; display: flex; flex-direction: column; justify-content: space-between;">
        <div>
          <span style="font-size: 10px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase;"><?php echo esc_html($art['tag']); ?></span>
          <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 18px; font-weight: 600; margin: 8px 0 12px; color: #1C1A17; line-height: 1.4;">
            <?php echo esc_html($art['title']); ?>
          </h3>
        </div>
        <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I would like to read more about: ' . $art['title']); ?>" target="_blank" style="font-size: 12px; color: #9C7C4C; font-weight: 700; text-decoration: underline; margin-top: 14px;">
          Read guide on WhatsApp →
        </a>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Expert Ask Banner -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 32px; text-align: center;">
      <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 0 0 10px; color: #1C1A17;">Have a question about a stone?</h3>
      <p style="font-size: 14px; color: #76706A; margin-bottom: 20px;">Ask our gemologists in Jaipur directly with live photos.</p>
      <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello, I have a question about a gemstone.'); ?>" target="_blank" class="btn-square-dark" style="display: inline-block; padding: 14px 28px; background: #25D366; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
        TALK TO A GEM EXPERT
      </a>
    </div>

  </div>
</div>

<?php
get_footer('shop');
