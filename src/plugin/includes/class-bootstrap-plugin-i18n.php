<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/BlazeIsClone
 * @since      1.0.0
 *
 * @package    Bootstrap_Plugin
 * @subpackage Bootstrap_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bootstrap_Plugin
 * @subpackage Bootstrap_Plugin/includes
 * @author     BlazeIsClone <sandevabeykoon123@gmail.com>
 */
class Bootstrap_Plugin_i18n
{


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain()
	{

		load_plugin_textdomain(
			'bootstrap-plugin',
			false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);
	}
}
