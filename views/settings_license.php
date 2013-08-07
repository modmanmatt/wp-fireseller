<?php include_once( dirname(__FILE__).'/common_header.php' ); ?>

<style type="text/css">
	#LicenseBox .checkbox_input {
		margin-top: 5px;
		margin-left: 5px;
	}
</style>

<div class="wrap wplister-page">
	<div class="icon32" style="background: url(<?php echo $wpl_plugin_url; ?>img/hammer-32x32.png) no-repeat;" id="wpl-icon"><br /></div>
          
	<?php include_once( dirname(__FILE__).'/settings_tabs.php' ); ?>
	<?php echo $wpl_message ?>

	<div style="width:60%;min-width:640px;" class="postbox-container">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">


				<?php if ( class_exists('WPL_CustomUpdater') ) : ?>
				<form method="post" action="<?php echo $wpl_form_action; ?>">
					<input type="hidden" name="action" value="save_wplister_license" >

					<div class="postbox" id="LicenseBox" style="">
						<h3 class="hndle"><span><?php echo __('License','wplister') ?></span></h3>
						<div class="inside">

							<label for="wpl-text-license_email" class="text_label"><?php echo __('License email','wplister'); ?>:</label>
							<input type="text" name="wpl_e2e_text_license_email" id="wpl-text-license_email" value="<?php echo $wpl_text_license_email; ?>" class="text_input" />

							<label for="wpl-text-license_key" class="text_label"><?php echo __('License key','wplister'); ?>:</label>
							<input type="text" name="wpl_e2e_text_license_key" id="wpl-text-license_key" value="<?php echo $wpl_text_license_key; ?>" class="text_input" />
<!-- 							<p class="desc" style="display: block; font-style: normal">
								<?php if ( $wpl_license_activated == '1' ) : ?>
									<?php echo __('Your license has been activated for','wplister'); ?>
									<?php echo str_replace( 'http://','', get_bloginfo( 'url' ) ) ?>
								<?php elseif ( $wpl_text_license_key != '' ): ?>
									<b><?php echo __('Your license has not been activated.','wplister'); ?></b><br>
									<?php echo __('Please check if your license key matches your email address.','wplister'); ?>
								<?php endif; ?>
							</p>
 -->
							<?php if ( $wpl_license_activated == '1' ) : ?>

								<label for="wpl-deactivate_license" class="text_label"><?php echo __('Deactivate license','wplister'); ?>:</label>
								<input type="checkbox" name="wpl_e2e_deactivate_license" id="wpl-deactivate_license" value="1" class="checkbox_input" />
								<span style="line-height: 24px">
									<?php echo __('Yes, I want to deactivate this license for','wplister'); ?>
									<i><?php echo str_replace( 'http://','', get_bloginfo( 'url' ) ) ?></i>
								</span>
								
							<?php endif; ?>
						
						</div>
					</div>

					<div class="submit" style="padding-top: 0; float: right;">
						<input type="submit" value="<?php echo __('Update license','wplister') ?>" name="submit" class="button-primary">
					</div>
				</form>
				<?php endif; ?>


			</div>
		</div>
	</div>



</div>