<?php

/**
 * Register custom options menues
 */

if (function_exists('acf_add_options_page')) {

	$parent = acf_add_options_page([
		'page_title'    => 'Theme General Settings',
		'menu_title'    => 'Theme Settings',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	]);

	$child = acf_add_options_page(array(
		'page_title'  => __('Continuous Integration Settings'),
		'menu_title'  => __('Integration Settings'),
		'parent_slug' => $parent['menu_slug'],
	));
}
