<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://makewebbetter.com
 * @since      1.0.0
 *
 * @package    Ultimate_Woocommerce_Offers_Zone
 * @subpackage Ultimate_Woocommerce_Offers_Zone/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package     Ultimate_Woocommerce_Offers_Zone
 * @subpackage  Ultimate_Woocommerce_Offers_Zone/includes
 * @author      Makewebbetter <webmaster@makewebbetter.com>
 */
class Woocommerce_Offers_Zone_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ultimate-woocommerce-offers-zone',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
