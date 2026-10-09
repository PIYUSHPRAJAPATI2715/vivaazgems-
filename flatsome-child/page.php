<?php
/**
 * Vivaaz Gems - Custom Default Page Template
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header('shop');
?>

<div class="generic-page-wrapper" style="background: var(--color-page-bg); padding: 40px 20px;">
    <div class="container" style="max-width: 1100px; margin: 0 auto; background: var(--color-tile-bg); padding: 30px; border: 1px solid var(--color-border-light);">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <h1 style="font-family: var(--font-family-serif); font-size: 28px; margin-bottom: 20px; color: var(--color-text-main);"><?php the_title(); ?></h1>
                <div class="page-entry-content">
                    <?php the_content(); ?>
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </div>
</div>

<?php
get_footer('shop');
