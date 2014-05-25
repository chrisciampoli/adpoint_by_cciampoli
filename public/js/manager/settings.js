$(function(){
	
	$('#display_shifts').on('click',function(e){
		$('#shifts_tbl').fadeToggle();
	});
	
	$('#display_locations').on('click',function(e){
		$('#locations_tbl').fadeToggle();
	});

	$('#saveBtn').on('click', function(e) {
		
		var settings = {
			company_name: $('#company_name').val(),
			locations: {},
			shifts: {},
			admin_email: $('#admin_email').val()
		};
		
		try {

			$.ajax({
				url: "manager/home/ajax_save_settings"
				type: "POST",
				dataType: "json",
				data: settings,
				beforeSend: function() {
					$('#saveBtn').append('<p id="ajax_notice">Saving Settings...</p>');
				},
				success: function() {
					$('#ajax_notice').html('Save complete!').fadeOut('slow');
				}
			});

		} catch(e) {
			alert("Sorry, but an error has occured.  Please contact your administrator.")
		}
	
	});

});