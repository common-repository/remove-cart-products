document.addEventListener("DOMContentLoaded", function() {
	var optionSelected1 = jQuery("#select_time_type option:selected");
	var selected_val = jQuery(optionSelected1).val();
	jQuery('.rcp_'+selected_val).show();

	var disokay_curr = jQuery('.input_type_check').val();
	jQuery('#rcp_'+disokay_curr).show();
	jQuery('#select_time_type').on('change', function (e) {
	    var optionSelected = jQuery("option:selected", this);
	    var valueSelected = this.value;
	    jQuery('.time_type').hide();
	    jQuery('.rcp_mh_type').hide();
	    jQuery('.rcp_'+valueSelected).show();
	});


  	var tabs = document.querySelectorAll('.rcp_tabbed li');
  	var rcp_inner_block = document.querySelectorAll('.rcp_tabbed-content .rcp_inner-block');

  	for (var i = 0, len = tabs.length; i < len; i++) {
    	tabs[i].addEventListener("click", function() {
	      	var parent = this.parentNode,
	      	innerTabs = parent.querySelectorAll('li');
	      	var BlockId = jQuery(this).attr('data-target');

	      	for (var index = 0, iLen = innerTabs.length; index < iLen; index++) {
	        	innerTabs[index].classList.remove('rcp_active');
	        	jQuery('.rcp_tabbed-content .rcp_inner-block').removeClass('rcp_active');
	      	}

	        jQuery(BlockId).addClass('rcp_active');
      		this.classList.add('rcp_active');
    	});
  	}
});