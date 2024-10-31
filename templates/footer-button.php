<?php
$rcp_button_01 = get_option('rcp_button_enable_disable');
if($rcp_button_01){ ?>
	<form class="crp_form_btn" method="post">
		<input type="hidden" name="txt" value="remove-cart-products">
		<button name="cart_btn_remove" type="submit" class="clear_cart_item_btn cart_btn_remove <?php 
			echo  esc_attr($clear_cart_btn_position); ?>" 
			style="color: <?php echo esc_attr($clear_cart_btn_text_color); ?>; background-color: <?php echo esc_attr($clear_cart_btn_bg_color); ?>; border: <?php echo esc_attr($cart_button_border_width).'px'; ?>; border-style: <?php echo esc_attr($cart_button_border_style); ?>; border-color: <?php echo esc_attr($cart_button_border_color); ?>; border-radius: <?php echo esc_attr($cart_button_border_radius).'px'; ?>; "><?php echo esc_html__( 'Clear Cart','remove-cart-products'); ?></button>
	</form> 

	<style>
		button.clear_cart_item_btn.clear_top_right {
		    top: 120px;
		    right: 0px;
		    position: fixed;
		    font-weight: 700;
		    z-index: 999999;
		    padding: 10px 10px;
    		font-size: large;
    		/*border: 2px solid black;*/
		}

		button.clear_cart_item_btn.clear_top_left {
		    top: 120px;
		    left: auto;
		    position: fixed;
		    font-weight: 700;
		    z-index: 999999;
		    padding: 10px 10px;
    		font-size: large;
    		/*border: 2px solid black;*/
		}

		/*----------Bottom--*/
		button.clear_cart_item_btn.clear_bottom_left {
		    top: 80%;
		    left: auto;
		    position: fixed;
		    font-weight: 700;
		    z-index: 999999;
		    padding: 10px 10px;
    		font-size: large;
    		/*border: 2px solid black;*/
		}

		button.clear_cart_item_btn.clear_bottom_right {
		    top: 80%;
		    right: 0px;
		    position: fixed;
		    font-weight: 700;
		    z-index: 999999;
		    padding: 10px 10px;
    		font-size: large;
    		/*border: 2px solid black;*/
		}
	</style><?php
} ?>