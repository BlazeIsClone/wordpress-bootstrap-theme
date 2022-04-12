<?php

/**
 * Register Custom Post Type function
 *
 * Use the PostTypes library to create Simple WordPress custom post types.
 *
 * @uses jjgrainger/posttypes
 * @package https://github.com/jjgrainger/PostTypes
 * @see https://posttypes.jjgrainger.co.uk/
 */

use PostTypes\PostType;
use PostTypes\Taxonomy;

$books = new PostType('custom');

/*
 * Set post type options
 *
 * @see https://developer.wordpress.org/reference/functions/register_post_type
 */

$books->options([
    'has_archive' => true,
]);

$books->taxonomy('type');

/*
 * Menu Icon
 *
 * @see https://developer.wordpress.org/resource/dashicons
 */

$books->icon('dashicons-admin-settings');


/*
 * Set options for the taxonomy
 *
 * @see https://developer.wordpress.org/reference/functions/register_taxonomy
 */

$genres = new Taxonomy('type');

$genres->options([
    'hierarchical' => false,
]);

/*
 * Register custom post type and taxonomy
 */

$books->register();
$genres->register();
