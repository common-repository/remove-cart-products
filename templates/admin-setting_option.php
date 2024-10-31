<?php extract( $RCP_meta ); ?>

<div class="main_cart_settings_div wrap">
	<div class="crp-heading">
		<h1 class="cart_remove_welcome_msg">
			<?php echo esc_html__( 'welcome to our plugin settings.','remove-cart-products'); ?>
		</h1>
		<h3>
			<?php echo esc_html__( 'Set time( Hours / Minutes ) for automatically removed cart products.','remove-cart-products'); ?>
		</h3>
	</div>

	<div class='rcp_tabbed'>
	  <ul>
	    <li data-target="#Informations">
	    	<?php echo esc_html__( 'Informations','remove-cart-products'); ?>
	    </li>
	    <li data-target="#ButtonSettings">
	    	<?php echo esc_html__( 'Button Settings','remove-cart-products'); ?>
		</li>
	    <li data-target="#GeneralSetting" class='rcp_active'>
	    	<?php echo esc_html__( 'General Settings','remove-cart-products'); ?>
	    </li>
	  </ul>
	</div>
	<div class="rcp_tabbed-content">
		<form action="<?php echo esc_url(admin_url('options-general.php?page=clear-cart-product')); ?>" method="post">
			<div class="Informations rcp_inner-block" id="Informations">
				<div class="cart_plugin_details">
					<div class="notice_details">
						<div class="rcp_inner-details">
							<h2>
								<?php echo esc_html__( 'Plugin Details','remove-cart-products'); ?>
							</h2>
							<div class="rcp_inner-brief">
								<?php echo esc_html__( 'This plugin is useful for removing automatically cart product which is added by the users. We have providing three ways to remove cart products.','remove-cart-products'); ?><br>
								<h4><?php echo esc_html__( 'Five ways are listed as below :','remove-cart-products'); ?></h4>
								<ol style="font-size: medium; ">
									<li><?php echo esc_html__( 'Set Hours or Minutes ( Mandatory )*','remove-cart-products'); ?></li>
									<li><?php echo esc_html__( 'After Login user','remove-cart-products'); ?></li>
									<li><?php echo esc_html__( 'After Logout User','remove-cart-products'); ?></li>
									<li><?php echo esc_html__( 'After Close Browser','remove-cart-products'); ?></li>
									<li><?php echo esc_html__( 'Click on Button','remove-cart-products'); ?></li>
								</ol>
							</div class="rcp_inner-brief">
						</div>
						<div class="rcp_inner-details">
							<h2><?php echo esc_html__( '1. Set Hours or Minutes ( Mandatory )*','remove-cart-products'); ?></h2>
							<div class="rcp_inner-brief">
								<?php 
								echo esc_html__( 'As per the time set, the product that carted will automatically removed by the plugin if the user will not going to purchase the product ( Hours / Minutes ). As this is mandatory field, if you do not set these field value then it will take an hour and remove the product automatically that present in cart.','remove-cart-products');
								?>
							</div>
						</div>
						<div class="rcp_inner-details">
							<h2><?php echo esc_html__( '2. After Login user or Open the site','remove-cart-products'); ?></h2>
							<div class="rcp_inner-brief">
								<?php 
								echo esc_html__( 'When user are open the site or login, All cart products will be automatically removed.','remove-cart-products');
								?>
							</div>
						</div>
						<div class="rcp_inner-details">
							<h2><?php echo esc_html__( '3. After Logout User','remove-cart-products'); ?></h2>
							<div class="rcp_inner-brief">
								<?php 
								echo esc_html__( 'When user is logout  after that all cart product will be removed automatically.','remove-cart-products');
								?>
							</div>
						</div>
						<div class="rcp_inner-details">
							<h2><?php echo esc_html__( '4. After Close Browser','remove-cart-products'); ?></h2>
							<div class="rcp_inner-brief">
								<?php 
								echo esc_html__( 'If user are close the whole browser, The product which is added in cart will be automatically removed.','remove-cart-products');
								?>
							</div>
						</div>
						<div class="rcp_inner-details">
							<h2><?php echo esc_html__( '5. Click on button','remove-cart-products'); ?></h2>
							<div class="rcp_inner-brief">
								<?php 
								echo esc_html__( 'When user click on front end displayed button all cart products will be automatically removed.','remove-cart-products');
								?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<div class="ButtonSettings rcp_inner-block" id="ButtonSettings">
				<div class="sub_inner_cart_settings">
					<div class="rcp_inner-btn">
						<div class="rcp_settings-block">
							<div class="rcp_hrading">
								<p><?php echo esc_html__( 'Button Position','remove-cart-products'); ?></p>
							</div>
							<div class="rcp_settings-btn">
								<div class="rcp_inner-btn">
									<label><?php echo esc_html__( 'Select Position :','remove-cart-products'); ?></label>
								</div>
								<div class="rcp_inner-btn">
									<select class="select_color_cart_input" name="clear_cart_btn_position"><?php
										if( !empty($btn_pos_arr) ):
											foreach ($btn_pos_arr as $key => $value) {
												$sel_val = '';
												if($key == $clear_cart_btn_position){
													$sel_val = 'selected';
												}
												echo '<option value="'.esc_attr($key).'"'.esc_attr($sel_val).' >'.esc_html($value).'</option>';
											}
										endif; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="rcp_settings-block">
							<div class="rcp_hrading">
								<p><?php echo esc_html__( 'Button Color & Text','remove-cart-products'); ?></p>
							</div>
							<div class="rcp_settings-btn">
								<div class="rcp_inner-btn">
									<label><?php echo esc_html__( 'Text Color : ','remove-cart-products'); ?></label>
								</div>
								<div class="rcp_inner-btn">
									<input class="select_color_cart_input" type="color" name="clear_cart_btn_text_color" value="<?php echo esc_attr($clear_cart_btn_text_color); ?>">
								</div>
							</div>
							<div class="rcp_settings-btn">
								<div class="rcp_inner-btn">
									<label><?php echo esc_html__( 'Background Color : ','remove-cart-products'); ?></label>
								</div>
								<div class="rcp_inner-btn">
									<input type="color" class="select_color_cart_input" name="clear_cart_btn_bg_color" value="<?php echo esc_attr($clear_cart_btn_bg_color); ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="rcp_inner-btn">
						<div class="rcp_settings-block">
							<div class="rcp_hrading">
								<p><?php echo esc_html__( 'Button Border Settings','remove-cart-products'); ?></p>
							</div>
							<div class="rcp_settings-btn">
								<div class="rcp_inner-btn">
									<label><?php echo esc_html__( 'Enter Border Width : ','remove-cart-products'); ?></label>
								</div>
								<div class="rcp_inner-btn">
									<input class="select_color_cart_input" type="number" name="cart_button_border_width" min="1" max="10" value="<?php echo esc_attr($cart_button_border_width); ?>">
								</div>
							</div>
							<div class="rcp_settings-btn">
								<div class="rcp_inner-btn">
									<label><?php echo esc_html__( 'Enter Border Width : ','remove-cart-products'); ?></label>
								</div>
								<div class="rcp_inner-btn">
									<select class="select_color_cart_input" name="select_button_border_style"><?php
										if( !empty($border_style_arr) ):
											foreach ($border_style_arr as $key => $value) {
												$sel_val = '';
												if($key == $cart_button_border_style){
													$sel_val = 'selected';
												}
												echo '<option value="'.esc_attr($key).'"'.esc_attr($sel_val).' >'.esc_html($value).'</option>';
											}
										endif; ?>
									</select>
								</div>
							</div>
							<div class="rcp_settings-btn">
								<div class="rcp_inner-btn">
									<label><?php echo esc_html__( 'Enter Border Radius : ','remove-cart-products'); ?></label>
								</div>
								<div class="rcp_inner-btn">
									<input class="select_color_cart_input" type="number" name="cart_button_border_radius" min="1" max="100" value="<?php echo esc_attr($cart_button_border_radius); ?>">
								</div>
							</div>
							<div class="rcp_settings-btn">
								<div class="rcp_inner-btn">
									<label><?php echo esc_html__( 'Enter Border Color :','remove-cart-products'); ?></label>
								</div>
								<div class="rcp_inner-btn">
									<input class="select_color_cart_input" type="color" name="cart_button_border_color" value="<?php echo esc_attr($cart_button_border_color); ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="GeneralSetting rcp_inner-block rcp_active" id="GeneralSetting">
				<div class="wrap">
					<div class="inside">
						<table>
							<tr>
								<td><?php echo esc_html__( 'Select Time Type','remove-cart-products'); ?></td>
								<td><select id="select_time_type" name="time_type"><?php
									if( !empty($cart_type_arr) ):
										foreach ($cart_type_arr as $key => $value) {
											$sel_val = '';
											if($key == $time_type){
												$sel_val = 'selected';
											}
											echo '<option value="'.esc_attr($key).'" '.esc_attr($sel_val).' >'.esc_html($value).'</option>';
										}
									endif; ?>
								</select></td>
							</tr>
							<input type="hidden" class="input_type_check" name="input_type_check" value="<?php echo esc_attr($time_type); ?>">
							<tr class="rcp_minutes rcp_mh_type" id="rcp_minutes">
								<td><?php echo esc_html__( 'Enter Minutes','remove-cart-products'); ?></td>
								<td><input type="number" name="cart_minutes" value="<?php echo esc_attr($cart_minutes); ?>"></td>
							</tr>
							<tr class="rcp_hours rcp_mh_type" id="rcp_hours">
								<td><?php echo esc_html__( 'Enter Hours','remove-cart-products'); ?></td>
								<td><input type="number" name="cart_hours" value="<?php echo esc_attr($cart_hours); ?>"></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'Button Setting','remove-cart-products'); ?></td>
								<td><select  name="rcp_button_enable_disable"><?php
								if( !empty($rcp_button_enable_disable_dp) ):
									foreach($rcp_button_enable_disable_dp as $key => $val){
										$sel_en = '';
										if( $key == $rcp_button_enable_disable){
											$sel_en = 'selected';
										}
										echo '<option value="'.esc_attr($key).'" '.esc_attr($sel_en).'>'.esc_html($val).'</option>';
									}
								endif; ?>
							</select></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'Hours Setting','remove-cart-products'); ?></td>
								<td><select  name="rcp_hours_enable_disable"><?php
									if( !empty($rcp_button_enable_disable_dp) ):
										foreach($rcp_button_enable_disable_dp as $key => $val){
											$sel_en = '';
											if( $key == $rcp_hours_enable_disable){
												$sel_en = 'selected';
											}
											echo '<option value="'.esc_attr($key).'" '.esc_attr($sel_en).'>'.esc_html($val).'</option>';
										}
									endif; ?>
								</select></td>
							</tr>	
						</table>
					</div>
				</div>
			</div>

			<div class="wrap rcp_sub-btn">
				<?php wp_nonce_field('wc-clear-cart-on-browser-close-action','wc-clear-cart-on-browser-close-name') ?>
				<?php submit_button( __( 'Save settings', 'remove-cart-products' ), 'primary', 'save_accconc' ); ?>
			</div>
		</form>
	</div>

</div>