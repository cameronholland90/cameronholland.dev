

$(document).on('click', '[data-bootboxalert]', function() {
	
	var bootbox_template = $(this).data('bootboxalert');

	// run ajax to get html
	$.ajax({
        type: "GET",
        url: "/ajax/bootbox-template",
        data: { 
        	bootbox_template_name	: bootbox_template
        }
    }).done(function( bootbox_template ) {

		bootbox.alert(bootbox_template);
    });

})