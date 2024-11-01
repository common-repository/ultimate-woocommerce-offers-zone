
<div id="tab-1" style="margin-left: 30px;" class="wrapper">
	<table class="form-table">
		<form  method="post">
			<tbody>
				<?php 
				$mwb_woz_enable = get_option("enable_plugin",false);
				$mwb_woz_design = get_option("design",false);
				$mwb_woz_heading = get_option("heading",false);
				$mwb_wmm_products_no =  get_option("products_no",false);
				?>
				<tr >
					<th >
						<?php _e( 'Ultimate Woocommerce Offers Zone ', 'ultimate-woocommerce-offers-zone' );?>
					</th>
					<td>
						<label  for="enable_plugin"><input  name="enable_plugin" id="rich_editing"<?php if(!empty($mwb_woz_enable)){checked('on', $mwb_woz_enable);} ?> type="checkbox"><?php _e( 'Enable', 'ultimate-woocommerce-offers-zone' );?></label>
						<p class="description"><?php _e('By clicking enable button working will be enable.','ultimate-woocommerce-offers-zone');?></p>
					</td>
				</tr>	
				<tr >
					<th >
						<label for="design"><?php _e('Design','ultimate-woocommerce-offers-zone');?>
						</label>
					</th>
					<td>
						<select name="design" id="role" >
							
							<option <?php if(!empty($mwb_woz_design)){selected('default', $mwb_woz_design);} ?> value="default"><?php _e('Default','ultimate-woocommerce-offers-zone');?></option>
							<option <?php if(!empty($mwb_woz_design)){selected('slide', $mwb_woz_design);} ?>value="slide"><?php _e('Slide','ultimate-woocommerce-offers-zone');?></option>
							
						</select>
						<p class="description"><?php _e('Select the design for product listing on offer page','ultimate-woocommerce-offers-zone')?></p>
					</td>
				</tr>

				<tr>
					<th >
						<label for="heading"><?php _e('Heading','ultimate-woocommerce-offers-zone');?></label>
					</th>
					<td>
						<input name="heading" id="heading" value="<?php if(!empty($mwb_woz_heading)){ echo $mwb_woz_heading;} ?>" class="regular-text" type="text"><p class="description"><?php _e('Enter the heading of the product.','ultimate-woocommerce-offers-zone');?></p>
					</td>
				</tr>
				<tr>
					<th >
						<label for="no_of_product"><?php _e('No Of Products','ultimate-woocommerce-offers-zone');?></label>
					</th>
					<td>
						<input name="products_no" id="no_of_product" value="<?php if(!empty($mwb_wmm_products_no)){ echo $mwb_wmm_products_no;} ?>"  type="number" min='0'><p class="description"><?php _e('Enter the no of product for listing on offer page.','ultimate-woocommerce-offers-zone');?></p>
					</td>
				</tr>
				<tr>
					<th >
						<label for="shortcode"><?php _e('Shortcode','ultimate-woocommerce-offers-zone');?></label>
					</th>
					<td>
						<input name="sitetitle" id="shortcode" value="[mwb_woz_genral_product_list]" class="regular-text"readonly type="text"><p class="description"><?php _e('Shortcode for listing products on shop page .','ultimate-woocommerce-offers-zone');?></p>
					</td>
				</tr>
				
				<td>
					<input type="hidden" name="nonce"value="<?php echo wp_create_nonce("form_submission"); ?>"></input>
					<input name="submit_mwb" id="submit" class="mwb_woz_btn" value="<?php _e('Save Changes','ultimate-woocommerce-offers-zone');?>" type="submit">
				</td>
			</tr>
		</thbody>
	</form>
</table>

</div>





