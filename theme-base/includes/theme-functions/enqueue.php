<?php

/**
 * Enqueue scripts and styles.
 *
 * @see https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts
 */
function enqueue_scripts()
{
    // Styles
    wp_enqueue_style('theme-base-style', get_template_directory_uri() . '/assets/dist/css/style.min.css');

    // Scripts
    wp_enqueue_script('theme-base-scripts', get_template_directory_uri() . '/assets/dist/js/main.bundle.js', [], '1.0', true);
}

add_action('wp_enqueue_scripts', 'enqueue_scripts');
