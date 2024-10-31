$ = jQuery;

jQuery(document).ready( function($) {
	$(".cart_btn_remove").click( function() {
		var data = {
			action: 'remove_cart_product_click_btn',
            post_var: 'this will be echoed back'
		};
	 	$.post(the_ajax_script.ajaxurl, data, function(response) {
			alert('Cart Product was removed.');
			location.reload();
	 	});
	 	return false;
	});
});