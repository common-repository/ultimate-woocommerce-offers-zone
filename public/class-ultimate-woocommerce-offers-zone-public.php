<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://makewebbetter.com
 * @since      1.0.0
 *
 * @package    Ultimate_Woocommerce_Offers_Zone
 * @subpackage Ultimate_Woocommerce_Offers_Zone/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package     Ultimate_Woocommerce_Offers_Zone
 * @subpackage  Ultimate_Woocommerce_Offers_Zone/public
 * @author      Makewebbetter <webmaster@makewebbetter.com>
 */
class Woocommerce_Offers_Zone_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ultimate_Woocommerce_Offers_Zone_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ultimate_Woocommerce_Offers_Zone_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ultimate-woocommerce-offers-zone-public.css', array(), $this->version, 'all' );

		wp_enqueue_style( "owl.carousel", plugin_dir_url( __FILE__ ) . 'css/owl.carousel.min.css', array(), $this->version, 'all' );

       wp_enqueue_style( "owl.theme", plugin_dir_url( __FILE__ ) . 'css/owl.theme.default.css', array(), $this->version, 'all' );


	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ultimate-woocommerce-offers-zone-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( "owl", plugin_dir_url( __FILE__ ) . 'js/owl.carousel.min.js', array( 'jquery' ), $this->version, false );

	}
	/**
	 * Shortcode for offerpage.
	 *
	 * @since    1.0.0
	 */
	public function mwb_woz_shortcode()
	{
		$mwb_woz_enable = get_option("enable_plugin",false);
		if(!empty($mwb_woz_enable)&&($mwb_woz_enable=='on'))
		{
		 add_shortcode( 'mwb_woz_genral_product_list', array($this,'mwb_custom_product_list') );
		}
	}
	/**
	 * Call back function for the shortcode.
	 *
	 * @since    1.0.0
	 */
	public function mwb_custom_product_list()
	{
		$mwb_woz_heading = get_option("heading",false);
		echo "<h1>".$mwb_woz_heading."</h1>";
		$mwb_woz_products_no =  get_option("products_no",false);
		if(!empty($mwb_woz_products_no))
		{
			if($mwb_woz_products_no>=5)
			{
				$mwb_woz_products_no=$mwb_woz_products_no+1;
			}

			$mwb_woz_query_args = array(
				'posts_per_page'    => $mwb_woz_products_no,
				'no_found_rows'     => 1,
				'post_status'       => 'publish',
				'post_type'         => 'product',
				'meta_query'        => WC()->query->get_meta_query(),
				'post__in'          => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
				);
			$mwb_woz_design = get_option("design",false);
			if($mwb_woz_design=="slide"&&!empty($mwb_woz_design))
			{
				$mwb_woz_classname="owl-carousel owl-theme";
			}
			else
			{
				$mwb_woz_classname="products row row-small large-columns-3 medium-columns-3 small-columns-2 clearfix products-3";
			}
			$loop = new WP_Query(  $mwb_woz_query_args );
			if ( $loop->have_posts() ) {
				?> <ul class="<?php echo $mwb_woz_classname;?>"><?php
				while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
				endwhile;
				?> </ul><?php
			} else {
				echo __( 'No products found' );
			}
			wp_reset_postdata(); 

		}

	}

}
