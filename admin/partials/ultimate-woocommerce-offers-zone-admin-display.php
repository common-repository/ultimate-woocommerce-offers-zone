<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://makewebbetter.com
 * @since      1.0.0
 *
 * @package    Utlimate_Woocommerce_Offers_Zone
 * @subpackage Utlimate_Woocommerce_Offers_Zone/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->



<?php
$mwb_woz_tabactive_general=""; 
$mwb_woz_tabactive_offer=""; 
$mwb_woz_tabactive_flash=""; 


if(isset($_GET["tab"]))
{

  if($_GET["tab"]=="general")
  {
    $mwb_woz_tabactive_general="mwb_woz_section_link_active";
  }
  if($_GET["tab"]=="offer")
  {
   $mwb_woz_tabactive_offer="mwb_woz_section_link_active";
 } if($_GET["tab"]=="woo_flash_sale")
 {
  $mwb_woz_tabactive_flash="mwb_woz_section_link_active";
}	

}
else
{
  $mwb_woz_tabactive_general="mwb_woz_section_link_active"; 

}
?>
<h2 class="mwb_woz_heading"><?php _e('Ultimate Woocommerce Offers Zone ','ultimate-woocommerce-offers-zone');?></h2>
<?php 
if(isset($_POST['submit_mwb']))
{
  ?>
  <div class='notice notice-success is-dismissible'>
    <p><?php _e('Settings Saved!','ultimate-woocommerce-offers-zone' ); ?></p>
  </div>
  <?php
}
?>
<div id="wpbody-content" class="mwb_woz_section" aria-label="Main content" tabindex="0">

  <div class="mwb_woz_left_section">
    <nav>   

      <li><a href="<?php echo admin_url();?>admin.php?page=ultimate-woocommerce-offers-zone_menu&tab=general" class="mwb_woz_section_link <?php echo $mwb_woz_tabactive_general; ?>"><?php _e( 'General', 'ultimate-woocommerce-offers-zone');?></a></li>

      <li><a href="<?php echo admin_url();?>admin.php?page=ultimate-woocommerce-offers-zone_menu&tab=offer" class="mwb_woz_section_link <?php echo$mwb_woz_tabactive_offer; ?>"><?php _e( 'Offers', 'ultimate-woocommerce-offers-zone');?></a></li> 

      <?php
      if ( in_array ( 'enhanced-woocommerce-flash-sale/enhanced-woocommerce-flash-sale.php', apply_filters ( 'active_plugins', get_option ( 'active_plugins') ) )) {
        ?>
        <li><a href="<?php echo admin_url();?>admin.php?page=mwb_wfs_menu" class="mwb_woz_section_link <?php echo $mwb_woz_tabactive_flash; ?>"><?php _e( 'enhanced-woocommerce-flash-sale', 'ultimate-woocommerce-offers-zone');?></a></li>
        <?php } 
        else{?> 
        <li><a href="<?php echo admin_url();?>admin.php?page=ultimate-woocommerce-offers-zone_menu&tab=woo_flash_sale" class="mwb_woz_section_link <?php echo $mwb_woz_tabactive_flash; ?>"><?php _e( 'enhanced-woocommerce-flash-sale', 'ultimate-woocommerce-offers-zone' );?></a></li> 
        <?php }
        ?>

      </nav>   
    </div>
    <div class="mwb_woz_right_section">        

     <?php

     if(isset($_GET["tab"]))
     {

      if($_GET["tab"]=="general")
      {
        require_once MWB_WOZ_dir_path."admin/partials/ultimate-woocommerce-offers-zone-admin-display-general.php";
      }
      if($_GET["tab"]=="offer")
      {
        require_once MWB_WOZ_dir_path."admin/partials/ultimate-woocommerce-offers-zone-admin-display-offer.php";
      }
      if($_GET["tab"]=="woo_flash_sale")
        {?>
      <div><h3 style="text-align:center;"><?php _e('please purchase this plugin and then activate this plugin','ultimate-woocommerce-offers-zone')?></h3></div>
      <?php
    }

    }
    else
    {
      require_once MWB_WOZ_dir_path."admin/partials/ultimate-woocommerce-offers-zone-admin-display-general.php";

     }

      ?>

  </div>  
 </div>

