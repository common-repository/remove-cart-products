<?php
/*
* Plugin Name: Remove Cart Products
* Description: This plugin is useful for removing automatically cart product which is added by the users.
* Author: Efflux Perceive
* Author URI: 
* Plugin URI: 
* Version: 1.0.6
* Text Domain: remove-cart-products
* Domain Path: /languages
* Requires at least: 6.0
* Requires PHP: 7.2
*/

if ( ! defined( 'RCP_VERSION' ) ) :
    define( 'RCP_VERSION', '1.0.5' );
endif;

if ( ! defined( 'RCP_PATH' ) ) :
    define( 'RCP_PATH', plugin_dir_path( __FILE__ ) );
endif;

if ( ! defined( 'RCP_URL' ) ) :
    define( 'RCP_URL', plugin_dir_url( __FILE__ ) );
endif;

if ( ! defined( 'RCP_ADMIN_URL' ) ) :
    define( 'RCP_ADMIN_URL', trailingslashit( plugin_dir_url( __FILE__ ) . 'admin' ) );
endif;

if ( ! defined( 'RCP_BASE_NAME' ) ) :
    define( 'RCP_BASE_NAME', plugin_basename( __FILE__ ) );
endif;

if ( ! defined( 'RCP_TEXTDOMAIN' ) ) :
    define( 'RCP_TEXTDOMAIN', 'remove-cart-products' );
endif;

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
