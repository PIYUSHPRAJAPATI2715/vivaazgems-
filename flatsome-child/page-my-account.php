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
        $rendered = '';
        if (have_posts()) {
            ob_start();
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            $rendered = trim(ob_get_clean());
        }

        if (!empty($rendered) && strlen(strip_tags($rendered)) > 20) {
            echo $rendered;
        } else {
            if (is_user_logged_in()) {
                $my_acc_file = get_stylesheet_directory() . '/woocommerce/myaccount/my-account.php';
                if (file_exists($my_acc_file)) {
                    include $my_acc_file;
                } elseif (function_exists('wc_get_template')) {
                    wc_get_template('myaccount/my-account.php');
                } else {
                    $template = locate_template('woocommerce/myaccount/my-account.php');
                    if (!empty($template) && file_exists($template)) include $template;
                }
            } else {
                $login_file = get_stylesheet_directory() . '/woocommerce/myaccount/form-login.php';
                if (file_exists($login_file)) {
                    include $login_file;
                } elseif (function_exists('wc_get_template')) {
                    wc_get_template('myaccount/form-login.php');
                } else {
                    $template = locate_template('woocommerce/myaccount/form-login.php');
                    if (!empty($template) && file_exists($template)) include $template;
                }
            }
        }
        ?>
    </div>
</div>

<?php
get_footer('shop');
