<?php
/**
 * Vivaaz Gems - Shop Footer Template
 */
if (file_exists(get_stylesheet_directory() . '/footer.php')) {
    include get_stylesheet_directory() . '/footer.php';
} else {
    get_footer();
}
