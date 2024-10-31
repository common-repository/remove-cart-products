<?php
/**
 * @package RCP
*/

class RCP_user {

    function __construct( ) {
    	//--------woocommerce cart product actions
		add_action('init',array( $this, 'RCP_nom_empty_cart_init') );
		// add_action('wp_login',array( $this, 'RCP_nom_empty_cart_init_login') );
		// add_action('wp_logout',array( $this, 'RCP_nom_empty_cart_init_logout') );
		add_action('clear_auth_cookie',array( $this, 'RCP_log_function_cart') );
		add_action('woocommerce_add_cart_item_data',array( $this, 'RCP_cart_product_create_session') );
		//--------load front end button html
		add_action('wp_footer',array( $this, 'RCP_display_clear_btn_funcion') );
		//--------ajax call
		add_action('wp_ajax_remove_cart_product_click_btn',array( $this, 'RCP_remove_cart_product_click_btn') );
		add_action('wp_ajax_nopriv_remove_cart_product_click_btn',array( $this, 'RCP_remove_cart_product_click_btn') );
		//--------enqueue script & styles
		add_action( 'wp_enqueue_scripts',array( $this, 'RCP_my_scripts_method' ) );
		// Register Text Domain
		add_action( 'init', array( $this, 'RCP_load_textdomain' ) );
    }

    /**
	 * Load plugin textdomain.
	*/
    public function RCP_load_textdomain() {
	  load_plugin_textdomain( 'remove-cart-products', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	}

	public function RCP_nom_empty_cart_init(){
		$rcp_hours_01 = get_option('rcp_hours_enable_disable');

		if($rcp_hours_01){
			global $woocommerce;
			$time = get_transient('cart_expiration_time');
			if(isset($time) && !empty($time) && $time < time()) {
				if(!empty($woocommerce->cart)){
					$woocommerce->cart->empty_cart(true);
				}
			}
		}
	}

	public function RCP_log_function_cart() {
		$rcp_hours_01 = get_option('rcp_hours_enable_disable');

		if($rcp_hours_01){
			global $woocommerce;
			if(!empty($woocommerce->cart)){
				$woocommerce->cart->empty_cart();
			}
		}
	}

	public function RCP_cart_product_create_session(){
		$rcp_hours_01 = get_option('rcp_hours_enable_disable');

		if($rcp_hours_01){
			$time_type = get_option('time_type');
			if($time_type == 'minutes' ){
				$hr = 60 * get_option('cart_minutes');
			}else if($time_type == 'hours'){
				$hr = 60 * 60 * get_option('cart_hours');
			}else{
				$hr = 60 * 60 * 1; // 24 hours
			}
			set_transient( 'cart_expiration_time', time() + (int)$hr );
		}
	}

	public function RCP_display_clear_btn_funcion(){
		$clear_cart_btn_position 	=	get_option('clear_cart_btn_position');
		$clear_cart_btn_text_color 	=	get_option('clear_cart_btn_text_color');
		$clear_cart_btn_bg_color 	=	get_option('clear_cart_btn_bg_color');
		$cart_button_border_width 	=	get_option('cart_button_border_width');
		$cart_button_border_style 	=	get_option('cart_button_border_style');
		$cart_button_border_radius 	=	get_option('cart_button_border_radius');
		$cart_button_border_color 	=	get_option('cart_button_border_color');

		require_once( RCP_DIR_PATH . 'templates/footer-button.php' );

	}

	public function RCP_remove_cart_product_click_btn() {
		global $woocommerce;
		if(!empty($woocommerce->cart)){
			$woocommerce->cart->empty_cart();
		}
		die;
	}

	public function RCP_my_scripts_method() {
		wp_enqueue_script( "ajax-crp-btn", plugins_url( '/assets/js/entry-js.js', __FILE__ ), array('jquery') );
		wp_localize_script( 'ajax-crp-btn', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	}	
}

new RCP_user();