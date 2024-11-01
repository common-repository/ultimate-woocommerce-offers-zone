<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://makewebbetter.com
 * @since      1.0.0
 *
 * @package    Ultimate_Woocommerce_Offers_Zone
 * @subpackage Ultimate_Woocommerce_Offers_Zone/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package     Ultimate_Woocommerce_Offers_Zone
 * @subpackage  Ultimate_Woocommerce_Offers_Zone/admin
 * @author      Makewebbetter <webmaster@makewebbetter.com>
 */
class Woocommerce_Offers_Zone_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woocommerce_Offers_Zone_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woocommerce_Offers_Zone_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ultimate-woocommerce-offers-zone-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woocommerce_Offers_Zone_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woocommerce_Offers_Zone_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ultimate-woocommerce-offers-zone-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script('masonry',array('jquery'), $this->version, false );

	}
	/**
	 * Register the Menu for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function mwb_woz_admin_menu(){

		 add_menu_page('Ultimate-Woocommerce-Offers-Zone',__('Ultimate Woocommerce Offers Zone Settings','ultimate-woocommerce-offers-zone'),'administrator','ultimate-woocommerce-offers-zone_menu',array($this,'mwb_woz_display_settings'));
	}
	/**
	 * Display the Settings for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function mwb_woz_display_settings()
	{
		
      require_once(MWB_WOZ_dir_path.'admin/partials/ultimate-woocommerce-offers-zone-admin-display.php');
	}
	/**
	 * Save the Settings for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function mwb_woz_save_settings()
	{

        
		if(isset($_POST['submit_mwb']))
		{ 
			
		  if(wp_verify_nonce($_POST['nonce'],'form_submission'))
		   {
				$mwb_woz_enable =isset($_POST['enable_plugin'])?sanitize_text_field(stripcslashes($_POST['enable_plugin'])):""; 
				$mwb_woz_design =isset($_POST['design'])?sanitize_text_field(stripcslashes($_POST['design'])):"";

				$mwb_woz_heading =isset($_POST['heading'])?sanitize_text_field(stripcslashes($_POST['heading'])):""; 

				$mwb_woz_products_no =isset($_POST['products_no'])?sanitize_text_field(stripcslashes($_POST['products_no'])):""; 

	
				update_option("enable_plugin",$mwb_woz_enable);
				update_option("design",$mwb_woz_design);
				update_option("heading",$mwb_woz_heading);
				update_option("products_no",$mwb_woz_products_no);
		 
	        }
        }
    }

}
