<?php
if( isset( $_REQUEST['save_accconc'] ) and wp_verify_nonce($_REQUEST['wc-clear-cart-on-browser-close-name'],'wc-clear-cart-on-browser-close-action')) {

	if( isset($_REQUEST['time_type']) )
		update_option('time_type',sanitize_text_field($_REQUEST['time_type']));
	
	if( isset($_REQUEST['cart_minutes']) )
		update_option('cart_minutes',sanitize_text_field($_REQUEST['cart_minutes']));

	if( isset($_REQUEST['cart_hours']) )
		update_option('cart_hours',sanitize_text_field($_REQUEST['cart_hours']));

	if( isset($_REQUEST['rcp_button_enable_disable']) )
		update_option('rcp_button_enable_disable',sanitize_text_field($_REQUEST['rcp_button_enable_disable']));

	if( isset($_REQUEST['rcp_hours_enable_disable']) )
		update_option('rcp_hours_enable_disable',sanitize_text_field($_REQUEST['rcp_hours_enable_disable']));
}

$time_type = get_option('time_type');
$cart_minutes = get_option('cart_minutes');
$cart_hours = get_option('cart_hours');
$rcp_button_01 = get_option('rcp_button_enable_disable');
$rcp_hours_01 = get_option('rcp_hours_enable_disable');

$cart_type_arr = array(
	'minutes'	=>	'Minutes',
	'hours'	=>	'Hours'
);
$rcp_button_enable_disable = array(
	'1'	=>	'Enable',
	'0'	=>	'Disable'
);
?>
<div class="main_cart_settings_div">
	<div class="wrap">
		<div class="inside">
			<div class="crp-heading">
				<h1 class="cart_remove_welcome_msg"><?php echo esc_html__( 'welcome to our plugin settings.','remove-cart-products'); ?> </h1>
				<h3><?php echo esc_html__( 'Thank you for installing this plugin.','remove-cart-products'); ?></h3>
			</div>			
			<hr><br>
			<h1><?php echo esc_html__( 'Set time( Hours / Minutes ) for automatically removed cart products.','remove-cart-products'); ?></h1>
			<form action="<?php admin_url('options-general.php?page=wc-clear-cart-on-browser-close');?>" method="post">
				<?php wp_nonce_field('wc-clear-cart-on-browser-close-action','wc-clear-cart-on-browser-close-name') ?>

				<table>
					<tr>
						<td><?php echo esc_html__( 'Select Time Type :','remove-cart-products'); ?></td>
						<td><select id="select_time_type" name="time_type"><?php
							foreach ($cart_type_arr as $key => $value) {
								$sel_val = '';
								if($key == $time_type){
									$sel_val = 'selected';
								}
								echo '<option value="'.esc_attr($key).'" '.esc_attr($sel_val).' >'.esc_html__($value,'remove-cart-products').'</option>';
							} ?>
						</select></td>
					</tr>
					<input type="hidden" class="input_type_check" name="input_type_check" value="<?php echo esc_attr($time_type); ?>">
					<tr class="rcp_minutes rcp_mh_type" id="rcp_minutes">
						<td><?php echo esc_html__( 'Enter Minutes :','remove-cart-products'); ?></td>
						<td><input type="number" name="cart_minutes" value="<?php echo esc_attr($cart_minutes); ?>"></td>
					</tr>
					<tr class="rcp_hours rcp_mh_type" id="rcp_hours">
						<td><?php echo esc_html__( 'Enter Hours :','remove-cart-products'); ?></td>
						<td><input type="number" name="cart_hours" value="<?php echo esc_attr($cart_hours); ?>"></td>
					</tr>
					<tr>
						<td><?php echo esc_html__( 'Button Setting','remove-cart-products'); ?></td>
						<td><select  name="rcp_button_enable_disable"><?php
						foreach($rcp_button_enable_disable as $key => $val){
							$sel_en = '';
							if( $key == $rcp_button_01){
								$sel_en = 'selected';
							}
							echo '<option value="'.esc_attr($key).'" '.esc_attr($sel_en).'>'.esc_html__($val,'remove-cart-products').'</option>';
						} ?>
					</select></td>
					</tr>
					<tr>
						<td><?php echo esc_html__( 'Hours Setting','remove-cart-products'); ?></td>
						<td><select  name="rcp_hours_enable_disable"><?php
							foreach($rcp_button_enable_disable as $key => $val){
								$sel_en = '';
								if( $key == $rcp_hours_01){
									$sel_en = 'selected';
								}
								echo '<option value="'.esc_attr($key).'" '.esc_attr($sel_en).'>'.esc_html__($val,'remove-cart-products').'</option>';
							} ?>
						</select></td>
					</tr>	
				</table>
				<p>
					<input type="submit" value="Save settings" name="save_accconc">
				</p>

			</form>
		</div>
	</div>
</div>

<div class="cart_plugin_details">
	<div class="notice_heading">
		<h1><?php echo esc_html__( 'Informations','remove-cart-products'); ?></h1>
	</div>
	<div class="notice_details">
		<table class="cart-plugin-details-table">
			<tr>
				<th><?php echo esc_html__( 'Title','remove-cart-products'); ?></th>
				<th><?php echo esc_html__( 'Details','remove-cart-products'); ?></th>
			</tr>
			<tr class="innert-table-row">
				<td class="info-title-column">
					<h2> <?php echo esc_html__( 'Plugin Details','remove-cart-products'); ?></h2>
				</td>
				<td class="info-description-column">
					<div>
						<?php echo esc_html__( 'This plugin is useful for removing automatically cart product which is added by the users. We have providing three ways to remove cart products.','remove-cart-products'); ?><br>
						<h4><?php echo esc_html__( 'Five ways are listed as below :','remove-cart-products'); ?></h4>
						<ol style="font-size: medium; ">
							<li><?php echo esc_html__( 'Set Hours or Minutes ( Mandatory )*','remove-cart-products'); ?></li>
							<li><?php echo esc_html__( 'After Login user','remove-cart-products'); ?></li>
							<li><?php echo esc_html__( 'After Logout User','remove-cart-products'); ?></li>
							<li><?php echo esc_html__( 'After Close Browser','remove-cart-products'); ?></li>
							<li><?php echo esc_html__( 'Click on Button','remove-cart-products'); ?></li>
						</ol>
				</div>
			</td>
			</tr>
			<tr class="innert-table-row">
				<td class="info-title-column">
					<h2><?php echo esc_html__( '1. Set Hours or Minutes ( Mandatory )*','remove-cart-products'); ?> </h2>
				</td>
				<td class="info-description-column">
					<div>
						<?php echo esc_html__( 'As per the time set, the product that carted will automatically removed by the plugin if the user will not going to purchase the product ( Hours / Minutes ). As this is mandatory field, if you do not set these field value then it will take an hour and remove the product automatically that present in cart.','remove-cart-products'); ?>
					</div>
				</td>
			</tr>
			<tr class="innert-table-row">
				<td class="info-title-column">
					<h2><?php echo esc_html__( '2. After Login user or Open the site','remove-cart-products'); ?></h2>
				</td>
				<td class="info-description-column">
					<div>
						<?php echo esc_html__( 'When user are open the site or login, All cart products will be automatically removed.','remove-cart-products'); ?>
					</div>
				</td>
			</tr>
			<tr class="innert-table-row">
				<td class="info-title-column">
					<h2><?php echo esc_html__( '3. After Logout User','remove-cart-products'); ?> </h2>
				</td>
				<td class="info-description-column">
					<div>
						<?php echo esc_html__( 'When user is logout  after that all cart product will be removed automatically.','remove-cart-products'); ?>
					</div>
				</td>
			</tr>
			<tr class="innert-table-row">
				<td class="info-title-column">
					<h2><?php echo esc_html__( '4. After Close Browser','remove-cart-products'); ?> </h2>
				</td>
				<td class="info-description-column">
					<div>
						<?php echo esc_html__( 'If user are close the whole browser, The product which is added in cart will be automatically removed.','remove-cart-products'); ?>
					</div>
				</td>
			</tr>
			<tr class="innert-table-row">
				<td class="info-title-column">
					<h2><?php echo esc_html__( '5. Click on button','remove-cart-products'); ?> </h2>
				</td>
				<td class="info-description-column">
					<div>
						<?php echo esc_html__( 'When user click on front end displayed button all cart products will be automatically removed.','remove-cart-products'); ?>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>