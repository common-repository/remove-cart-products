<?php
if(isset($_POST['btn_setting_save'])){
	$clear_cart_btn_position 	= sanitize_text_field($_REQUEST['clear_cart_btn_position']);
	$clear_cart_btn_text_color 	= sanitize_hex_color($_REQUEST['clear_cart_btn_text_color']);
	$clear_cart_btn_bg_color 	= sanitize_hex_color($_REQUEST['clear_cart_btn_bg_color']);

	$cart_button_border_width 	= sanitize_text_field($_REQUEST['cart_button_border_width']);
	$cart_button_border_style 	= sanitize_text_field($_REQUEST['select_button_border_style']);
	$cart_button_border_radius 	= sanitize_text_field($_REQUEST['cart_button_border_radius']);
	$cart_button_border_color 	= sanitize_hex_color($_REQUEST['cart_button_border_color']);

	update_option('clear_cart_btn_position',$clear_cart_btn_position);
	update_option('clear_cart_btn_text_color',$clear_cart_btn_text_color);
	update_option('clear_cart_btn_bg_color',$clear_cart_btn_bg_color);

	update_option('cart_button_border_width',$cart_button_border_width);
	update_option('cart_button_border_style',$cart_button_border_style);
	update_option('cart_button_border_radius',$cart_button_border_radius);
	update_option('cart_button_border_color',$cart_button_border_color);
}

$clear_cart_btn_position 	=	get_option('clear_cart_btn_position');
$clear_cart_btn_text_color 	=	get_option('clear_cart_btn_text_color');
$clear_cart_btn_bg_color 	=	get_option('clear_cart_btn_bg_color');

$cart_button_border_style 	=	get_option('cart_button_border_style');
$cart_button_border_width 	=	get_option('cart_button_border_width');
$cart_button_border_radius 	=	get_option('cart_button_border_radius');
$cart_button_border_color 	=	get_option('cart_button_border_color');

$btn_pos_arr = array( 
	'clear_top_left'		=>	'Top Left',
	'clear_top_right'		=>	'Top Right',
	'clear_bottom_left'		=>	'Bottom Left',
	'clear_bottom_right'	=>	'Bottom Right'
	);

$border_style_arr = array( 
	'dotted'		=>	'Dotted',
	'dashed'		=>	'Dashed',
	'solid'			=>	'Solid',
	'double'		=>	'Double',
	'groove'		=>	'Groove',
	'ridge'			=>	'Ridge',
	'inset'			=>	'Inset',
	'outset'		=>	'Outset',
	'none'			=>	'None',
	'hidden'		=>	'Hidden'
	);
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<form class="cart_setting_form" id="cart_setting_form" action="<?php echo admin_url(); ?>admin.php?page=cart_type" name="cart_setting_form" method="post">
<div class="main_cart_settings_div">
	<div class="cart_setting_heading">
		<p><?php echo esc_html__( 'Settings For Remove Cart Button','remove-cart-products'); ?></p>
	</div>
	<div class="sub_inner_cart_settings">
		<div class="inner_cart_settings_div">
			<div class="container">
				<div class="row settings_single_row row_title">
					<div class="col col_title">
						<p><?php echo esc_html__( 'Button Position','remove-cart-products'); ?></p>
					</div>
				</div>
				<hr>
				<div class="row settings_single_row">
					<div class="col">
						<label><?php echo esc_html__( 'Select Position :','remove-cart-products'); ?></label>
					</div>
					<div class="col">
						<select class="select_color_cart_input" name="clear_cart_btn_position"><?php
							foreach ($btn_pos_arr as $key => $value) {
								$sel_val = '';
								if($key == $clear_cart_btn_position){
									$sel_val = 'selected';
								}
									echo '<option value="'.esc_attr($key).'"'.esc_attr($sel_val).' >'.esc_html__($value,'remove-cart-products').'</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="row settings_single_row row_title">
					<div class="col">
						<p><?php echo esc_html__( 'Button Color & Text','remove-cart-products'); ?></p>
					</div>
				</div>
				<hr>
				<div class="row settings_single_row">
					<div class="col col_title">
						<label><?php echo esc_html__( 'Text Color : ','remove-cart-products'); ?></label>
					</div>
					<div class="col">
						<input class="select_color_cart_input" type="color" name="clear_cart_btn_text_color" value="<?php echo esc_attr($clear_cart_btn_text_color); ?>">
					</div>
				</div>
				<div class="row settings_single_row">
					<div class="col">
						<label><?php echo esc_html__( 'Background Color : ','remove-cart-products'); ?></label>
					</div>
					<div class="col">
						<input type="color" class="select_color_cart_input" name="clear_cart_btn_bg_color" value="<?php echo esc_attr($clear_cart_btn_bg_color); ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="cart-button-style">
			<div class="container">
				<div class="row settings_single_row row_title">
					<div class="col">
						<p><?php echo esc_html__( 'Button Border Settings','remove-cart-products'); ?></p>
					</div>
				</div>
				<hr>
				<div class="row settings_single_row">
					<div class="col">
						<label><?php echo esc_html__( 'Enter Border Width : ','remove-cart-products'); ?></label>
					</div>
					<div class="col">
						<input class="select_color_cart_input" type="number" name="cart_button_border_width" min="1" max="10" value="<?php echo esc_attr($cart_button_border_width); ?>">
					</div>
				</div>
				<div class="row settings_single_row">
					<div class="col">
						<label><?php echo esc_html__( 'Enter Border Style : ','remove-cart-products'); ?></label>
					</div>
					<div class="col">
						<select class="select_color_cart_input" name="select_button_border_style"><?php
							foreach ($border_style_arr as $key => $value) {
									$sel_val = '';
									if($key == $cart_button_border_style){
										$sel_val = 'selected';
									}
										echo '<option value="'.esc_attr($key).'"'.esc_attr($sel_val).' >'.esc_html__($value,'remove-cart-products').'</option>';
								} ?>
						</select>
					</div>
				</div>
				<div class="row settings_single_row">
					<div class="col">
						<label><?php echo esc_html__( 'Enter Border Radius : ','remove-cart-products'); ?></label>
					</div>
					<div class="col">
						<input class="select_color_cart_input" type="number" name="cart_button_border_radius" min="1" max="100" value="<?php echo esc_attr($cart_button_border_radius); ?>">
					</div>
				</div>
				<div class="row settings_single_row">
					<div class="col">
						<label><?php echo esc_html__( 'Enter Border Color :','remove-cart-products'); ?></label>
					</div>
					<div class="col">
						 <input class="select_color_cart_input" type="color" name="cart_button_border_color" value="<?php echo esc_attr($cart_button_border_color); ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<span class="">
		<div class="col">
			<input type="submit" name="btn_setting_save" value="Save Settings">
		</div>				
	</span>
</div>
</form>