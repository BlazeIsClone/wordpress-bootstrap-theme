<?php

/**
 * ACF Add Options Page
 *
 * @param string $path
 * @see https://www.advancedcustomfields.com/resources/local-json/
 */
if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page([
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);

    $child = acf_add_options_page([
        'page_title'  => __('Continuous Integration Settings'),
        'menu_title'  => __('Integration Settings'),
        'parent_slug' => $parent['menu_slug'],
    ]);
}
