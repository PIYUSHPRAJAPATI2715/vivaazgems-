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
                if (function_exists('wc_get_template')) {
                    wc_get_template('myaccount/my-account.php');
                } else {
                    $template = locate_template('woocommerce/myaccount/my-account.php');
                    if ($template) include $template;
                }
            } else {
                if (function_exists('wc_get_template')) {
                    wc_get_template('myaccount/form-login.php');
                } else {
                    $template = locate_template('woocommerce/myaccount/form-login.php');
                    if ($template) include $template;
                }
            }
        endif;
        ?>
    </div>
</div>

<?php
get_footer('shop');
