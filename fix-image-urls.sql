-- Run these 4 lines in phpMyAdmin (SQL tab) to instantly link all image URLs on your live site!
UPDATE wp_options SET option_value = REPLACE(option_value, 'http://vivaazgems.local', 'https://vivaazgems.infinityfree.me') WHERE option_name = 'home' OR option_name = 'siteurl';
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://vivaazgems.local', 'https://vivaazgems.infinityfree.me');
UPDATE wp_posts SET guid = REPLACE(guid, 'http://vivaazgems.local', 'https://vivaazgems.infinityfree.me');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://vivaazgems.local', 'https://vivaazgems.infinityfree.me');
