<?php

/**
 * Enable SVG support function
 *
 * @param [type] $mime_types
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types
 */
function custom_myme_types($mime_types)
{
    $mime_types['svg'] = 'image/svg+xml';
    $mime_types['icon'] = 'image/vnd.microsoft.icon';

    return $mime_types;
}
add_filter('upload_mimes', 'custom_myme_types', 1, 1);
