<?php

/**
 * ACF Local JSON Cache
 *
 * @param string $path
 * @see https://www.advancedcustomfields.com/resources/local-json/
 */
function my_acf_json_save_point($path)
{
    $path = THEME_INCLUDES . 'acf-json';

    return $path;
}
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

/**
 * Load from Local JSON Cache
 */
function my_acf_json_load_point($paths)
{
    // Remove original path (optional)
    unset($paths[0]);

    $paths[] = THEME_INCLUDES . 'acf-json';

    return $paths;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
