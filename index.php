<?php
define('RCP_FILE_PATH', plugin_dir_url(__FILE__));
define('RCP_DIR_PATH', plugin_dir_path( __FILE__ ));

define( 'RCP_LICENSE', true );

register_activation_hook( __FILE__, 'RCP_activate_cart_clear_product' );
if ( ! function_exists( 'RCP_activate_cart_clear_product' ) ) :
    function RCP_activate_cart_clear_product(){

        // Require parent plugin
        if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) and current_user_can( 'activate_plugins' ) ) {
            // Stop activation redirect and show error
            wp_die('<p style="font-size: 20px;">You must need to <b>install and activate</b> the <b>woocommerce</b> plugin!.</p> <br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
        }

        update_option('rcp_button_enable_disable', 0);
    	update_option('rcp_hours_enable_disable', 0);

    }
endif;

require_once( RCP_DIR_PATH .'classes/RCP_admin.php' );

new RCP_admin();

require_once( RCP_DIR_PATH .'/functions.php' );
