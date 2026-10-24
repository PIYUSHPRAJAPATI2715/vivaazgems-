<?php
/**
 * Vivaaz Gems - Search Results Template
 * 100% Client Brief: Results as product cards and 'Nothing found' line.
 */

get_header('shop');

$search_query = get_search_query();
?>

<div class="wrap" style="padding-top: 24px; padding-bottom: 72px; min-height: 70vh;">

  <!-- Breadcrumbs (12.5px #9A9186) -->
  <div class="crumb" style="font-size: 12.5px; color: #9A9186; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a>
    <span>›</span>
    <a href="<?php echo esc_url(home_url('/shop/')); ?>" style="color: inherit; text-decoration: none;">Gemstones</a>
    <span>›</span>
    <b style="color: #1C1A17; font-weight: 500;">Search</b>
  </div>

  <div style="margin-bottom: 32px; border-bottom: 1px solid var(--line, #EFE9E0); padding-bottom: 16px;">
    <span class="cap" style="font-size: 10.5px; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: #9B7C4E;">SEARCH RESULTS</span>
    <h1 class="h1" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 40px; font-weight: 400; margin: 8px 0 6px; color: #1C1A17;">
      <?php if (!empty($search_query)) : ?>
        Results for "<?php echo esc_html($search_query); ?>"
      <?php else : ?>
        Search gemstones
      <?php endif; ?>
    </h1>
    <p style="font-size: 14px; color: #76706A; margin: 0;">
      Calibrated lots, matched pairs and single certified gemstones from Jaipur.
    </p>
  </div>

  <?php if (have_posts()) : ?>
    <div class="grid g4" style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 26px 22px;">
      <?php
      while (have_posts()) : the_post();
        wc_get_template_part('content', 'product');
      endwhile;
      ?>
    </div>

    <!-- Pagination -->
    <div style="margin-top: 40px; text-align: center;">
      <?php
      the_posts_pagination(array(
          'mid_size'  => 2,
          'prev_text' => '← Previous',
          'next_text' => 'Next →',
      ));
      ?>
    </div>

  <?php else : ?>
    <!-- Nothing found state (§5 Spec) -->
    <div style="background: #FFFFFF; border: 1px solid var(--line, #EFE9E0); padding: 60px 24px; text-align: center; max-width: 680px; margin: 40px auto;">
      <h3 style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 26px; font-weight: 400; margin: 0 0 12px; color: #1C1A17;">Nothing found</h3>
      <p style="font-size: 14.5px; color: #76706A; line-height: 1.6; margin: 0 0 24px;">
        No stones match "<?php echo esc_html($search_query); ?>". Try searching by stone name (e.g. <i>Sapphire, Ruby, Moonstone</i>) or cut (e.g. <i>Cabochon, Faceted</i>).
      </p>
      <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn" style="padding: 12px 28px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11.5px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">
          BROWSE ALL GEMSTONES
        </a>
        <a href="https://wa.me/919680552270?text=<?php echo urlencode('Hello Vivaaz Gems, I am looking for: ' . $search_query); ?>" target="_blank" class="btn wa" style="padding: 12px 24px; background: #1E9E52; color: #FFFFFF; text-decoration: none; font-size: 11.5px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">
          ASK ON WHATSAPP
        </a>
      </div>
    </div>
  <?php endif; ?>

</div>

<?php
get_footer('shop');
