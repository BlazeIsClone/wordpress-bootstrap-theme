<?php

/**
 * Theme Functions file
 *
 * @package   Wordpress-Custom-Bootstrap-Theme
 * @see       https://developer.wordpress.org/themes/basics/theme-functions
 * @version   1.0.0
 */

/* --------------------------- THEME CONSTANTS --------------------------- */

define(
    'THEME_SITE_URL',
    home_url()
);
define(
    'THEME_THEMEROOT',
    get_stylesheet_directory_uri()
);
define(
    'THEME_THEMEROOT_PATH',
    get_template_directory()
);
define(
    'THEME_TEMPLATE_PATH',
    get_template_directory_uri()
);
define(
    'THEME_INCLUDES',
    get_stylesheet_directory() .
    '/includes/'
);
define(
    'THEME_FUNCTIONS_PATH',
    get_stylesheet_directory() .
    '/includes/theme-functions/'
);
define(
    'CUSTOM_POST_TYPES',
    get_stylesheet_directory() .
    '/includes/post-types/index.php'
);
define(
    'THEME_PLUGIN_ACTIVATION_PLUGINS',
    get_stylesheet_directory() .
    '/includes/required-plugins/'
);

/* --------------------------- ASSETS IMPORT --------------------------- */

// Require Composer Dependencies
require __DIR__ . '/vendor/autoload.php';

// Define required functions to include
$includes = [
    'head-cleanup',
    'enqueue',
    'timber-initialize',
    'theme-support',
    'plugins-register',
    'acf-local-json',
    'acf-options-page',
    'admin-bar-remove',
    'admin-login-logo',
    'admin-favicon',
    'svg',
];

foreach ($includes as $file) {
    include_once THEME_FUNCTIONS_PATH . $file . '.php';
}
unset($file, $filepath);

// Custom Post Types
include_once CUSTOM_POST_TYPES;
