<?php
/**
 * Vivaaz Gems - Custom My Account Page Template
 * Matches Page 17 of the Master PDF Brief
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header('shop');
?>

<div class="my-account-page-wrapper" style="background: var(--color-page-bg); padding: 40px 20px; min-height: 70vh;">
    <div class="container" style="max-width: 1000px; margin: 0 auto;">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        else :
            if (is_user_logged_in()) {
                wc_get_template('myaccount/my-account.php');
            } else {
                wc_get_template('myaccount/form-login.php');
            }
        endif;
        ?>
    </div>
</div>

<?php
get_footer('shop');
