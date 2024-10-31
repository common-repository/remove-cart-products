<?php
/**
 * @package RCP
*/

class RCP_admin {

    public function __construct( ) {
        $this->plugin_url       = plugin_dir_url( __DIR__ );
        $this->plugin_path      = plugin_dir_path( __DIR__ );
        $this->version          = '1.1.0';

        add_action( 'init', array( $this, 'rcp_add_menus' ), 0 );
        add_action( 'wp_head', array( $this, 'RCP_add_meta_port' ));
    }

    public function RCP_add_meta_port(){ ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><?php
    }

    public function rcp_add_menus(){
        add_action( 'admin_menu', array($this, 'register_sub_menu') );
    }

    public function register_sub_menu() {
        $position   = 24;
        $page_title = esc_html__( 'Woocommerce Clear Cart on Browser Closing','remove-cart-products');
        $menu_title = esc_html__( 'Clear Cart','remove-cart-products');
        $capability = 'edit_posts';
        $menu_slug  = 'clear-cart-product';
        $function   = 'wc_clear_cart_on_browser_close';
        $icon_url   = 'dashicons-cart';

        $hook = add_menu_page( 
            $page_title,
            $menu_title,
            $capability,
            $menu_slug,
            array( $this, $function), 
            $icon_url, 
            $position 
        );

        add_action( "admin_enqueue_scripts", array( $this, 'assets' ) );
    }

    public function wc_clear_cart_on_browser_close(){

        if( isset( $_REQUEST['save_accconc'] ) and wp_verify_nonce($_REQUEST['wc-clear-cart-on-browser-close-name'],'wc-clear-cart-on-browser-close-action') ):
            $this->RCP_uodate_meta($_REQUEST);
        endif;
        $post_meta = $this->RCP_get_plugin_meta();

        $this->RCP_get_template(
            'admin-setting_option.php',
            array(
                'template_name' => 'setting_option',
                'RCP_meta'    => $post_meta,
            )
        );
    }

    public function RCP_uodate_meta( $rcp_post_meta = array() ){
        $post_meta = array(
            'time_type'                     => isset($_REQUEST['time_type']) ? sanitize_text_field($_REQUEST['time_type']) : '',
            'cart_minutes'                  => isset($_REQUEST['cart_minutes']) ? sanitize_text_field($_REQUEST['cart_minutes']) : '',
            'cart_hours'                    => isset($_REQUEST['cart_hours']) ? sanitize_text_field($_REQUEST['cart_hours']) : '',
            'rcp_button_enable_disable'     => isset($_REQUEST['rcp_button_enable_disable']) ? sanitize_text_field($_REQUEST['rcp_button_enable_disable']) : 0,
            'rcp_hours_enable_disable'      => isset($_REQUEST['rcp_hours_enable_disable']) ? sanitize_text_field($_REQUEST['rcp_hours_enable_disable']) : 0,
            'clear_cart_btn_position'       => isset($_REQUEST['clear_cart_btn_position']) ? sanitize_text_field($_REQUEST['clear_cart_btn_position']) : '',
            'clear_cart_btn_text_color'     => isset($_REQUEST['clear_cart_btn_text_color']) ? sanitize_hex_color($_REQUEST['clear_cart_btn_text_color']) : '',
            'clear_cart_btn_bg_color'       => isset($_REQUEST['clear_cart_btn_bg_color']) ? sanitize_hex_color($_REQUEST['clear_cart_btn_bg_color']) : '',
            'cart_button_border_width'      => isset($_REQUEST['cart_button_border_width']) ? sanitize_text_field($_REQUEST['cart_button_border_width']) : '',
            'cart_button_border_style'      => isset($_REQUEST['select_button_border_style']) ? sanitize_text_field($_REQUEST['select_button_border_style']) : '',
            'cart_button_border_radius'     => isset($_REQUEST['cart_button_border_radius']) ? sanitize_text_field($_REQUEST['cart_button_border_radius']) : '',
            'cart_button_border_color'      => isset($_REQUEST['cart_button_border_color']) ? sanitize_hex_color($_REQUEST['cart_button_border_color']) : '',
        );

        if( !empty($post_meta) ):
            foreach ($post_meta as $key => $value) :
                update_option( $key, $value );
            endforeach;
        endif;
    }

    public function RCP_get_plugin_meta(){

        $cart_type_arr  = array(
            'minutes'   => esc_html__('Minutes', 'remove-cart-products'),
            'hours'     =>  esc_html__('Hours', 'remove-cart-products')
        );
        $rcp_button_enable_disable = array(
            '1' =>  'Enable',
            '0' =>  'Disable'
        );

        $btn_pos_arr = array( 
            'clear_top_left'        =>  esc_html__('Top Left', 'remove-cart-products'),
            'clear_top_right'       =>  esc_html__('Top Right', 'remove-cart-products'),
            'clear_bottom_left'     =>  esc_html__('Bottom Left', 'remove-cart-products'),
            'clear_bottom_right'    =>  esc_html__('Bottom Right', 'remove-cart-products')
        );

        $border_style_arr = array( 
            'dotted'        =>  'Dotted',
            'dashed'        =>  'Dashed',
            'solid'         =>  'Solid',
            'double'        =>  'Double',
            'groove'        =>  'Groove',
            'ridge'         =>  'Ridge',
            'inset'         =>  'Inset',
            'outset'        =>  'Outset',
            'none'          =>  'None',
            'hidden'        =>  'Hidden'
        );

        $post_meta = array(
            'time_type'                     => !empty(get_option('time_type')) ? get_option('time_type') : '',
            'cart_minutes'                  => !empty(get_option('cart_minutes')) ? get_option('cart_minutes') : '',
            'cart_hours'                    => !empty(get_option('cart_hours')) ? get_option('cart_hours') : '',
            'rcp_button_enable_disable'     => !empty(get_option('rcp_button_enable_disable')) ? get_option('rcp_button_enable_disable') : '',
            'rcp_hours_enable_disable'      => !empty(get_option('rcp_hours_enable_disable')) ? get_option('rcp_hours_enable_disable') : '',
            'clear_cart_btn_position'       => !empty(get_option('clear_cart_btn_position')) ? get_option('clear_cart_btn_position') : '',
            'clear_cart_btn_text_color'     => !empty(get_option('clear_cart_btn_text_color')) ? get_option('clear_cart_btn_text_color') : '',
            'clear_cart_btn_bg_color'       => !empty(get_option('clear_cart_btn_bg_color')) ? get_option('clear_cart_btn_bg_color') : '',
            'cart_button_border_style'      => !empty(get_option('cart_button_border_style')) ? get_option('cart_button_border_style') : '',
            'cart_button_border_width'      => !empty(get_option('cart_button_border_width')) ? get_option('cart_button_border_width') : '',
            'cart_button_border_radius'     => !empty(get_option('cart_button_border_radius')) ? get_option('cart_button_border_radius') : '',
            'cart_button_border_color'      => !empty(get_option('cart_button_border_color')) ? get_option('cart_button_border_color') : '',
            'cart_type_arr'                 => $cart_type_arr,
            'rcp_button_enable_disable_dp'  => $rcp_button_enable_disable,
            'btn_pos_arr'                   => $btn_pos_arr,
            'border_style_arr'              => $border_style_arr,
        );

        return $post_meta;      
    }

    public function RCP_get_template( $template_name, $args = array(), $template_path = '' ) {
        if( empty( $template_path ) ) :
            $template_path = RCP_PATH . '/templates/';
        endif;        
        
        $template = $template_path . $template_name;
        if ( ! file_exists( $template ) ) :
            return new WP_Error( 
                'error', 
                sprintf( 
                    __( '%s does not exist.', RCP_TEXTDOMAIN     ), 
                    '<code>' . $template . '</code>' 
                ) 
            );
        endif;

        do_action( 'rcp_before_template_part', $template, $args, $template_path );

        if ( ! empty( $args ) && is_array( $args ) ) :
            extract( $args );
        endif;
        include $template;

        do_action( 'rcp_after_template_part', $template, $args, $template_path );
    }

    public function assets() {
        wp_enqueue_style( 'rcp-style', $this->plugin_url . 'assets/css/style.css' );
        wp_enqueue_script( 'rcp-js', $this->plugin_url . 'assets/js/admin-field.js' );
    }
}