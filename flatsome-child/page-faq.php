<?php
/**
 * Template Name: FAQ Page
 * Vivaaz Gems - Frequently Asked Questions
 * 100% exact fidelity to client demo (Image 5)
 */

defined('ABSPATH') || exit;

get_header('shop');

$faqs = array(
  array(
    'title' => 'Stones',
    'items' => array(
      array(
        'q' => 'Are your stones natural?',
        'a' => 'Yes. We sell natural gemstones only. Common treatments such as heating in sapphire or oiling in emerald are stated on the product page.'
      ),
      array(
        'q' => 'What does calibrated mean?',
        'a' => 'Calibrated stones are cut to a standard size and shape, for example 4 mm round or 6×8 mm oval, within a small tolerance, so they fit standard settings.'
      ),
      array(
        'q' => 'Can I see the exact stone before I buy?',
        'a' => 'Yes. Message us on WhatsApp with the product code and we send live photos or a video of the exact lot, in daylight.'
      ),
      array(
        'q' => 'What is the difference between carat and ratti?',
        'a' => 'Both are weights. One carat is 0.2 grams. On this site one ratti is counted as 0.91 carat, and we show both.'
      )
    )
  ),
  array(
    'title' => 'Ordering',
    'items' => array(
      array(
        'q' => 'Is there a minimum order?',
        'a' => 'No. You can order even one piece from a calibrated lot. The price per piece drops at 10 and at 50 pieces.'
      ),
      array(
        'q' => 'Can I order more pieces than you have in stock?',
        'a' => 'Yes. Pieces beyond today\'s stock ship in about 1 to 3 weeks.'
      ),
      array(
        'q' => 'Do I need an account?',
        'a' => 'No. You can check out as a guest.'
      ),
      array(
        'q' => 'How can I pay?',
        'a' => 'In India: UPI, cards, net banking and bank transfer. Outside India: PayPal, cards, Payoneer and bank transfer. No EMI, pay later or cash on delivery.'
      )
    )
  ),
  array(
    'title' => 'Shipping',
    'items' => array(
      array(
        'q' => 'How long does delivery take?',
        'a' => 'Usually 2 to 3 working days within India and 4 to 7 working days internationally, after dispatch.'
      ),
      array(
        'q' => 'Will I have to pay customs duty?',
        'a' => 'Outside India, yes, if your country charges it. Duties are paid by you on delivery.'
      )
    )
  ),
  array(
    'title' => 'Returns',
    'items' => array(
      array(
        'q' => 'Can I return a stone?',
        'a' => 'No. Instead, we send live photos and videos before you buy, and if a stone arrives damaged or is not as described we replace or refund it in full. See <a class="link" href="' . esc_url(home_url('/guarantee/')) . '">Our guarantee</a>.'
      )
    )
  )
);
?>

<div class="wrap" style="max-width: 860px; padding-top: 24px; padding-bottom: 70px;">
  <div class="crumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a> › <b>FAQ</b></div>
  
  <h1 class="h1" style="margin-top: 14px;">Questions, answered.</h1>

  <?php foreach ($faqs as $group): ?>
    <h2 class="h2" style="font-size: 22px; margin-top: 26px;"><?php echo esc_html($group['title']); ?></h2>
    <div class="acc" style="margin-top: 8px;">
      <?php foreach ($group['items'] as $item): ?>
        <details>
          <summary>
            <?php echo esc_html($item['q']); ?>
            <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 10l5 5 5-5"/></svg>
          </summary>
          <div class="ab">
            <?php echo wp_kses_post($item['a']); ?>
          </div>
        </details>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>

<?php
get_footer('shop');
