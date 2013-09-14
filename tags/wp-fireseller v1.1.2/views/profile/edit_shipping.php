<?php

/* functions */

function wpl_generate_shipping_option_tags( $services, $selected_service ) {
	?>

	<option value="">-- <?php echo __('Please select','wplister'); ?> --</option>
	
	<?php $lastShippingCategory = @$services[0]['ShippingCategory'] ?>
	<optgroup label="<?php echo @$services[0]['ShippingCategory'] ?>">
	
	<?php foreach ($services as $service) : ?>
		
		<?php if ( $lastShippingCategory != $service['ShippingCategory'] ) : ?>
		</optgroup>
		<optgroup label="<?php echo $service['ShippingCategory'] ?>">
		<?php $lastShippingCategory = $service['ShippingCategory'] ?>
		<?php endif; ?>

		<option value="<?php echo $service['service_name'] ?>" 
			<?php if ( @$selected_service['service_name'] == $service['service_name'] ) : ?>
				selected="selected"
			<?php endif; ?>
			><?php echo $service['service_description'] ?></option>
	<?php endforeach; ?>
	</optgroup>

	<?php	
}


?>


<style type="text/css">

	input.price_input {
		width: 100%;
	}
	
	.service_table th {
		text-align: left;
	}
	
	/* shipping service type */
	select.select_shipping_type {
		width: auto;
		position: absolute;
		right: 4px;
		top: 4px;
		line-height: 20px;
		height: 21px;
		font-size: 12px;
	}

</style>


					<div class="postbox" id="ShippingOptionsBox">
						<h3><span><?php echo __('Shipping Options','wplister'); ?></span>
							<!-- ## BEGIN PRO ## -->
							<!-- service type selector -->
							<select name="wpl_e2e_shipping_service_type" id="wpl-text-loc_shipping_service_type" 
									class="required-entry select select_shipping_type" style="width:auto;"
									onchange="handleShippingTypeSelectionChange(this)">
								<option value="flat" <?php if ( @$item_details['shipping_service_type'] == 'flat' ): ?>selected="selected"<?php endif; ?>><?php echo __('Use Flat Shipping','wplister'); ?></option>
								<option value="calc" <?php if ( @$item_details['shipping_service_type'] == 'calc' ): ?>selected="selected"<?php endif; ?>><?php echo __('Use Calculated Shipping','wplister'); ?></option>
								<option value="FlatDomesticCalculatedInternational" <?php if ( @$item_details['shipping_service_type'] == 'FlatDomesticCalculatedInternational' ): ?>selected="selected"<?php endif; ?>><?php echo __('Use Flat Domestic and Calculated International Shipping','wplister'); ?></option>
								<option value="CalculatedDomesticFlatInternational" <?php if ( @$item_details['shipping_service_type'] == 'CalculatedDomesticFlatInternational' ): ?>selected="selected"<?php endif; ?>><?php echo __('Use Calculated Domestic and Flat International Shipping','wplister'); ?></option>
							</select>
							<!-- ## END PRO ## -->
						</h3>
						<div class="inside">

							<!-- flat shipping services table -->
							<table id="loc_shipping_options_table_flat" class="service_table_flat service_table" style="">
								
								<tr>
									<th><?php echo __('Shipping service','wplister'); ?> *</th>
									<th><?php echo __('First item cost','wplister'); ?> *</th>
									<th><?php echo __('Additional items cost','wplister'); ?></th>
									<th>&nbsp;</th>
								</tr>

								<?php foreach ($item_details['loc_shipping_options'] as $service) : ?>
								<tr class="row">
									<td>
										<!-- flat shipping services -->
										<select name="wpl_e2e_loc_shipping_options_flat[][service_name]" 
												title="Service" class="required-entry select select_service_name" style="width:100%;">
										<?php wpl_generate_shipping_option_tags( $wpl_loc_flat_shipping_options, $service ) ?>											
										</select>
									</td><td>
										<input type="text" name="wpl_e2e_loc_shipping_options_flat[][price]" 
											value="<?php echo @$service['price']; ?>" class="price_input field_price" />
									</td><td>
										<input type="text" name="wpl_e2e_loc_shipping_options_flat[][add_price]" 
											value="<?php echo @$service['add_price']; ?>" class="price_input field_add_price" />
									</td><td>
										<input type="button" value="<?php echo __('remove','wplister'); ?>" class="button-secondary" 
											onclick="jQuery(this).parent().parent().remove();" />
									</td>
								</tr>
								<?php endforeach; ?>

							</table>

							<!-- ## BEGIN PRO ## -->
							<!-- calculated shipping services table -->
							<?php if ( ! $wpl_calc_shipping_enabled ) : ?>
							<div class="inline_error service_table_calc" style="background-color: #ffebe8; border: 1px solid #c00; padding: 5px 15px;">
								<?php echo __('Warning: Calculated shipping is currently only available on eBay US, Canada and Australia.','wplister'); ?>
							</div>
							<?php endif; ?>
							<table id="loc_shipping_options_table_calc" class="service_table_calc service_table" style="">
								
								<tr>
									<th><?php echo __('Shipping service','wplister'); ?> *</th>
									<th>&nbsp;</th>
								</tr>

								<?php foreach ($item_details['loc_shipping_options'] as $service) : ?>
								<tr class="row">
									<td>
										<!-- calculated shipping services -->
										<select name="wpl_e2e_loc_shipping_options_calc[][service_name]"
												title="Service" class="required-entry select select_service_name" style="width:100%;">
										<?php wpl_generate_shipping_option_tags( $wpl_loc_calc_shipping_options, $service ) ?>											
										</select>
 									</td><td>
										<input type="button" value="<?php echo __('remove','wplister'); ?>" class="button-secondary" 
											onclick="jQuery(this).parent().parent().remove();" />
									</td>
								</tr>
								<?php endforeach; ?>

							</table>
							<!-- ## END PRO ## -->

							<input type="button" value="<?php echo __('Add domestic shipping option','wplister'); ?>" name="btn_add_loc_shipping_option" 
								onclick="handleAddShippingServiceRow('local');"
								class="button-secondary">

							<!-- ## BEGIN PRO ## -->
							<div class="service_table_calc loc_service_table_calc" style="border-top:1px solid #ccc; margin-top:10px; padding-top:10px;">

								<label class="text_label"><?php echo __('Package type','wplister'); ?>:</label>
								<select name="wpl_e2e_shipping_package" id="wpl-shipping_package" 
										title="Type" class="required-entry select select_shipping_package" style="width:auto">
									<?php foreach ($wpl_available_shipping_packages as $shipping_package) : ?>
										<option value="<?php echo $shipping_package->ShippingPackage ?>" <?php if ( @$item_details['shipping_package'] == $shipping_package->ShippingPackage ): ?>selected="selected"<?php endif; ?>><?php echo $shipping_package->Description ?></option>
									<?php endforeach; ?>
								</select>
								<br class="clear" />


								<label class="text_label"><?php echo __('Packaging and handling costs','wplister'); ?>:</label>
								<input type="text" name="wpl_e2e_PackagingHandlingCosts" 
									value="<?php echo @$item_details['PackagingHandlingCosts']; ?>" class="" />
								
							</div>
							<!-- ## END PRO ## -->


						</div>
					</div>


					<div class="postbox" id="IntShippingOptionsBox">
						<h3><span><?php echo __('International shipping','wplister'); ?></span></h3>
						<div class="inside">


							<!-- flat international shipping services table -->
							<table id="int_shipping_options_table_flat" class="service_table_flat service_table" style="">
								
								<tr>
									<th><?php echo __('Destination','wplister'); ?></th>
									<th><?php echo __('Shipping service','wplister'); ?></th>
									<th><?php echo __('First item cost','wplister'); ?></th>
									<th><?php echo __('Additional items cost','wplister'); ?></th>
									<th>&nbsp;</th>
								</tr>

								<?php foreach ($item_details['int_shipping_options'] as $service) : ?>
								<tr class="row">
									<td>
										<select name="wpl_e2e_int_shipping_options_flat[][location]" 
												title="Location" class="required-entry select select_location" style="width:100%;">
											<option value="">-- <?php echo __('Please select','wplister'); ?> --</option>
											<?php foreach ($wpl_shipping_locations as $loc => $desc) : ?>
												<option value="<?php echo $loc ?>" 
													<?php if ( @$service['location'] == $loc ) : ?>
														selected="selected"
													<?php endif; ?>
													><?php echo $desc ?></option>
											<?php endforeach; ?>
										</select>
									</td><td>
										<!-- flat shipping services -->
										<select name="wpl_e2e_int_shipping_options_flat[][service_name]" 
												title="Service" class="required-entry select select_service_name" style="width:100%;">
										<?php wpl_generate_shipping_option_tags( $wpl_int_flat_shipping_options, $service ) ?>											
										</select>
									</td><td>
										<input type="text" name="wpl_e2e_int_shipping_options_flat[][price]" 
											value="<?php echo @$service['price']; ?>" class="price_input field_price" />
									</td><td>
										<input type="text" name="wpl_e2e_int_shipping_options_flat[][add_price]" 
											value="<?php echo @$service['add_price']; ?>" class="price_input field_add_price" />
									</td><td>
										<input type="button" value="<?php echo __('remove','wplister'); ?>" class="button-secondary" 
											onclick="jQuery(this).parent().parent().remove();" />
									</td>
								</tr>
								<?php endforeach; ?>

							</table>

							<!-- ## BEGIN PRO ## -->
							<!-- calculated international shipping services table -->
							<table id="int_shipping_options_table_calc" class="service_table_calc service_table" style="">
								
								<tr>
									<th><?php echo __('Shipping service','wplister'); ?></th>
									<th><?php echo __('Destination','wplister'); ?></th>
									<!-- <th><?php echo __('Package','wplister'); ?></th> -->
									<!-- <th><?php echo __('Handling fee','wplister'); ?></th> -->
									<th>&nbsp;</th>
								</tr>

								<?php foreach ($item_details['int_shipping_options'] as $service) : ?>
								<tr class="row">
									<td>
										<!-- calculated shipping services -->
										<select name="wpl_e2e_int_shipping_options_calc[][service_name]"
												title="Service" class="required-entry select select_service_name" style="width:100%;">
										<?php wpl_generate_shipping_option_tags( $wpl_int_calc_shipping_options, $service ) ?>											
										</select>
									</td><td>
										<select name="wpl_e2e_int_shipping_options_calc[][location]" 
												title="Location" class="required-entry select select_location" style="width:100%;">
											<option value="">-- <?php echo __('Please select','wplister'); ?> --</option>
											<?php foreach ($wpl_shipping_locations as $loc => $desc) : ?>
												<option value="<?php echo $loc ?>" 
													<?php if ( @$service['location'] == $loc ) : ?>
														selected="selected"
													<?php endif; ?>
													><?php echo $desc ?></option>
											<?php endforeach; ?>
										</select>
									</td><td>
										<input type="button" value="<?php echo __('remove','wplister'); ?>" class="button-secondary" 
											onclick="jQuery(this).parent().parent().remove();" />
									</td>
								</tr>
								<?php endforeach; ?>

							</table>
							<!-- ## END PRO ## -->

							<input type="button" value="<?php echo __('Add international shipping option','wplister'); ?>" name="btn_add_loc_shipping_option" 
								onclick="handleAddShippingServiceRow('international');"
								class="button-secondary">

							<!-- ## BEGIN PRO ## -->
							<div class="service_table_calc int_service_table_calc" style="border-top:1px solid #ccc; margin-top:10px; padding-top:10px;">
								<label class="text_label"><?php echo __('Packaging and handling costs','wplister'); ?>:</label>
								<input type="text" name="wpl_e2e_InternationalPackagingHandlingCosts" 
									value="<?php echo @$item_details['InternationalPackagingHandlingCosts']; ?>" class="" />								
							</div>
							<!-- ## END PRO ## -->

						</div>
					</div>




	<script type="text/javascript">

		/*** ## BEGIN PRO ## ***/
		// handle shipping service type selection
		function handleShippingTypeSelectionChange( typeselector ) {
			
			var serviceType = jQuery(typeselector).val()
			// var thisRow = jQuery(typeselector).parent().parent('.row');

			if ( serviceType == 'calc') {
				jQuery('.service_table_flat').hide();
				jQuery('.service_table_calc').show();
			} else if ( serviceType == 'FlatDomesticCalculatedInternational') {
				jQuery('#loc_shipping_options_table_flat').show();
				jQuery('#int_shipping_options_table_calc').show();
				jQuery('#loc_shipping_options_table_calc').hide();
				jQuery('#int_shipping_options_table_flat').hide();
				jQuery('.int_service_table_calc').show();
				jQuery('.loc_service_table_calc').hide();
			} else if ( serviceType == 'CalculatedDomesticFlatInternational') {
				jQuery('#loc_shipping_options_table_flat').hide();
				jQuery('#int_shipping_options_table_calc').hide();
				jQuery('#loc_shipping_options_table_calc').show();
				jQuery('#int_shipping_options_table_flat').show();
				jQuery('.int_service_table_calc').hide();
				jQuery('.loc_service_table_calc').show();
			} else {
				jQuery('.service_table_flat').show();
				jQuery('.service_table_calc').hide();
			}

		}
		/*** ## END PRO ## ***/

		// handle add shipping service table row
		function handleAddShippingServiceRow( mode ) {
			
			var shipping_type = jQuery('.select_shipping_type')[0] ? jQuery('.select_shipping_type')[0].value : 'flat';
			if ( shipping_type == 'flat' ) {
				var serviceTable_id = mode == 'local' ? '#loc_shipping_options_table_flat' : '#int_shipping_options_table_flat';
			} else if ( shipping_type == 'FlatDomesticCalculatedInternational' ) {
				var serviceTable_id = mode == 'local' ? '#loc_shipping_options_table_flat' : '#int_shipping_options_table_calc';
			} else if ( shipping_type == 'CalculatedDomesticFlatInternational' ) {
				var serviceTable_id = mode == 'local' ? '#loc_shipping_options_table_calc' : '#int_shipping_options_table_flat';
			} else { // calc
				var serviceTable_id = mode == 'local' ? '#loc_shipping_options_table_calc' : '#int_shipping_options_table_calc';
			}

			var serviceTable = jQuery(serviceTable_id);

			// clone the first row and append to table
			serviceTable.find('tr.row').first().clone().appendTo( serviceTable );

			// serviceTable.find('tr.row').last().find('.select_shipping_type').change();

			enumerateShippingTableFields();

		}

		// enumerate shipping table fields
		function enumerateShippingTableFields() {
			
			jQuery('.service_table').each( function( index, item ){

				var thisDest = 'loc'  == item.id.substring( 0, 3 ) ? 'loc' : 'int';
				var thisType = 'flat' == item.id.substring( item.id.length - 4 ) ? 'flat' : 'calc';

				// service_name
				fields = jQuery(item).find('.select_service_name');
				for (var i = fields.length - 1; i >= 0; i--) {
					jQuery(fields[i]).attr('name','wpl_e2e_'+thisDest+'_shipping_options_'+thisType+'['+i+'][service_name]');
				};

				// shipping_package
				fields = jQuery(item).find('.select_shipping_package');
				for (var i = fields.length - 1; i >= 0; i--) {
					jQuery(fields[i]).attr('name','wpl_e2e_'+thisDest+'_shipping_options_'+thisType+'['+i+'][ShippingPackage]');
				};

				// location / destinaton
				fields = jQuery(item).find('.select_location');
				for (var i = fields.length - 1; i >= 0; i--) {
					jQuery(fields[i]).attr('name','wpl_e2e_'+thisDest+'_shipping_options_'+thisType+'['+i+'][location]');
				};

				// price field
				fields = jQuery(item).find('.field_price');
				for (var i = fields.length - 1; i >= 0; i--) {
					jQuery(fields[i]).attr('name','wpl_e2e_'+thisDest+'_shipping_options_'+thisType+'['+i+'][price]');
				};

				// additional price field
				fields = jQuery(item).find('.field_add_price');
				for (var i = fields.length - 1; i >= 0; i--) {
					jQuery(fields[i]).attr('name','wpl_e2e_'+thisDest+'_shipping_options_'+thisType+'['+i+'][add_price]');
				};

			});
		}


		jQuery( document ).ready(
			function () {

				/*** ## BEGIN PRO ## ***/
				// update ui for selected shipping service type
				jQuery('.select_shipping_type').change();
				/*** ## END PRO ## ***/

				enumerateShippingTableFields();

			}
		);
	
	
	</script>
