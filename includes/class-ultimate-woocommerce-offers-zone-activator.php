<?php

/**
 * Fired during plugin activation
 *
 * @link       https://makewebbetter.com
 * @since      1.0.0
 *
 * @package    Ultimate Woocommerce_Offers_Zone
 * @subpackage Woocommerce_Offers_Zone/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package     Ultimate_Woocommerce_Offers_Zone
 * @subpackage  Ultimate_Woocommerce_Offers_Zone/includes
 * @author      Makewebbetter <webmaster@makewebbetter.com>
 */
class Woocommerce_Offers_Zone_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$mwb_check = get_option("mwb_offerpage",false);
		if(empty($mwb_check)&&$mwb_check !="create" )
		{
			$mwb_woz_post = array(
				'post_title'    => wp_strip_all_tags( 'Offers' ),
				'post_content'  => '[mwb_woz_genral_product_list]',
				'post_status'   => 'publish',
				'post_author'   => 1,
				'post_type'     => 'page',
				);
			update_option("mwb_offerpage","create");
            // Insert the post into the database
			$mwb_wfs_post_id=wp_insert_post($mwb_woz_post );
			update_option('offers_page_id',$mwb_wfs_post_id);
		}

	}

}
