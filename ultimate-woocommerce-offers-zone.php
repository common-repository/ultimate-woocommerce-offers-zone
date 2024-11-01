<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://makewebbetter.com
 * @since             1.0.0
 * @package           Ultimate Woocommerce_Offers_Zone
 *
 * @wordpress-plugin
 * Plugin Name:       Ultimate WooCommerce Offers Zone
 * Plugin URI:        https://makewebbetter.com/ultimate-woocommerce-offers-zone
 * Description:       This is an extension that lets the users to show sale products on the offer page. As soon as you activate  Ultimate WooCommerce Offer Zone Plugin , this page will be automatically created.
 * Version:           1.0.0
 * Author:            MakeWebBetter
 * Author URI:        https://makewebbetter.com
 * Tested up to: 	  4.9
 * WC tested up to:   3.3.3
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       ultimate-woocommerce-offers-zone
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('MWB_WOZ_VERSION', '1.0.0' );
define('MWB_WOZ_dir_path',plugin_dir_path(__FILE__));
define('MWB_WOZ_dir_url',plugin_dir_url( __FILE__ ));

$mwb_woz_activated = true;
if (function_exists ( 'is_multisite' ) && is_multisite ()) 
{
	include_once (ABSPATH . 'wp-admin/includes/plugin.php');
	if (! is_plugin_active ( 'woocommerce/woocommerce.php' )) 
	{
		$mwb_woz_activated = false;
	}
} 
else 
{
	if (! in_array ( 'woocommerce/woocommerce.php', apply_filters ( 'active_plugins', get_option ( 'active_plugins' ) ) ))
	 {
		$mwb_woz_activated = false;
	 }
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woocommerce-offers-zone-activator.php
 */
if($mwb_woz_activated)
{
function activate_woocommerce_offers_zone() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ultimate-woocommerce-offers-zone-activator.php';
	Woocommerce_Offers_Zone_Activator::activate();
}

function deactivate_woocommerce_offers_zone(){

	$mwb_page_id=get_option('offers_page_id',false);
	if(!empty($mwb_page_id))
	{
		wp_delete_post( $mwb_page_id,true); 
		delete_option('mwb_offerpage');

	}
}
function mwb_woz_plugin_add_settings_link( $mwb_woz_links ) {
	$mwb_woz_my_link = array(
		'<a href="' .admin_url('admin.php?page=ultimate-woocommerce-offers-zone_menu' ) . '">' . __( 'Go To Settings', 'ultimate-woocommerce-offers-zone' ) . '</a>',
		);
	return array_merge($mwb_woz_my_link,$mwb_woz_links );
}
add_filter( "plugin_action_links_".plugin_basename(__FILE__), 'mwb_woz_plugin_add_settings_link' );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woocommerce-offers-zone-deactivator.php
 */
register_deactivation_hook( __FILE__, 'deactivate_woocommerce_offers_zone' );
register_activation_hook( __FILE__, 'activate_woocommerce_offers_zone' );


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ultimate-woocommerce-offers-zone.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woocommerce_offers_zone() {

	$plugin = new Woocommerce_Offers_Zone();
	$plugin->run();

}
run_woocommerce_offers_zone();
}
else 
{
	function mwb_woz_plugin_error_notice() 
	{
		?>
		<style type="text/css">
		#message{display: none;}</style>
		<div class="error notice is-dismissible">
			<p><?php _e( 'WooCommerce is not activated. Please install WooCommerce first, to use the Woocommerce Offers Zone  plugin !!!', 'ultimate-woocommerce-offers-zone' ); ?></p>
		</div>
	<?php
	}
	
	add_action ( 'admin_init','mwb_woz_plugin_deactivate' );
	function mwb_woz_plugin_deactivate() 
	{
		deactivate_plugins ( plugin_basename ( __FILE__ ) );
		add_action ( 'admin_notices','mwb_woz_plugin_error_notice' );
	}
}