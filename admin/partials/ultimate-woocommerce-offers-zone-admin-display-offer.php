<div  id="tab-2"style="margin-left: 20px;"  class="mwb-offer_woz wrapper">
	<div class="mwb-offer_woz__wrapper">
		<div class="mwb-offer_woz__row mwb-offer_woz__row--large">
			<div class="mwb-offer_woz-gridSizer"></div>
			<?php                                     
			$mwb_woz_url='http://makewebbetter.com/pluginupdates/org/offerzone/offerzone.json';
			$mwb_woz_response = wp_remote_get( $mwb_woz_url,array( 'timeout' => 120, 'httpversion' => '1.1'));
			if ( is_wp_error( $mwb_woz_response ) )
			{
				die("request can not performed");
			}
			$mwb_woz_data = wp_remote_retrieve_body($mwb_woz_response );
			if ( is_wp_error( $mwb_woz_data ) ) 
			{
				die("eror in data can not display");
			}
			$mwb_products_array=json_decode($mwb_woz_data,true);
			if(!empty($mwb_products_array)&&is_array($mwb_products_array))
			{	
				foreach ($mwb_products_array as $k => $val) 
				{     
					$img=$val['img'];
					
					?>
					
					<div class="mwb-offer_woz__col">
						<div class="mwb-offer_woz__img-wrap">
							<img src="<?php echo $val['img']; ?>" alt="">
							<div class="mwb-offer_woz__description">
								<div class="mwb-offer_woz__pro-detail"><?php echo $val['heading'] ?> </div>
								<p><?php echo $val['description']?></p>
								<div class="mwb-offer_woz__pro-btn">
									<a href="<?php echo $val['product_url']; ?>" class="mwb-offer_woz__main-btn">
										<?php _e('View Details','ultimate-woocommerce-offers-zone');?>
									</a>
									<a href="<?php echo $val['buy_now_url']; ?>" class="mwb-offer_woz__main-btn">
										<?php _e('Add To Cart','ultimate-woocommerce-offers-zone');?>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php   } 
				} ?>	
			</div>
		</div>
	</div>