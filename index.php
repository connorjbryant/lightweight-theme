<?php
/**
 * Minimal index.php for Lightweight Theme
 *
 * @package LightweightTheme
 */
get_header();

echo '<div class="container">';
    the_content();
echo '</div>';

get_footer();
