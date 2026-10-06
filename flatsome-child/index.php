<?php
/**
 * Vivaaz Gems Theme Index Template
 */
get_header();
?>

<main id="main-content" class="site-main">
    <div class="container" style="max-width: 1200px; margin: 40px auto; padding: 0 24px;">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        else :
            echo '<p>Welcome to Vivaaz Gems & Jewellery!</p>';
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
