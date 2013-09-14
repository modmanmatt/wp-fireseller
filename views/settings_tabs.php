    <?php  
        $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'settings'; 
    ?>  

	<h2 class="nav-tab-wrapper">  

        <?php if ( ! is_network_admin() ) : ?>
        <a href="<?php echo $wpl_settings_url; ?>&tab=settings"   class="nav-tab <?php echo $active_tab == 'settings' ? 'nav-tab-active' : ''; ?>"><?php echo __('General Settings','wplister') ?></a>  
        <?php endif; ?>

        <!-- ## BEGIN PRO ## -->
        <?php if ( ! is_network_admin() ) : ?>
        <a href="<?php echo $wpl_settings_url; ?>&tab=categories" class="nav-tab <?php echo $active_tab == 'categories' ? 'nav-tab-active' : ''; ?>"><?php echo __('Categories','wplister') ?></a>  
        <?php endif; ?>

        <?php if ( ( ! is_multisite() ) || ( is_network_admin() ) ) : ?>
        <a href="<?php echo $wpl_settings_url; ?>&tab=license"    class="nav-tab <?php echo $active_tab == 'license' ? 'nav-tab-active' : ''; ?>"><?php echo __('License','wplister') ?></a>  
        <?php endif; ?>
        <!-- ## END PRO ## -->

        <a href="<?php echo $wpl_settings_url; ?>&tab=developer"  class="nav-tab <?php echo $active_tab == 'developer' ? 'nav-tab-active' : ''; ?>"><?php echo __('Developer','wplister') ?></a>  
    </h2>  
