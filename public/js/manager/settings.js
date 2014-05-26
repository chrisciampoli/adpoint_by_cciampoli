$(function(){

	var settings_url = config.base + "manager/home/ajaxPostSettings",
	    shifts = $.parseJSON(config.shifts),
	    locations = $.parseJSON(config.locations);
	
	$('#display_shifts').on('click',function(e){
		$('#shifts_tbl').fadeToggle();
	});
	
	$('#display_locations').on('click',function(e){
		$('#locations_tbl').fadeToggle();
	});

	$('#saveBtn').on('click', function(e) {
		
		var settings = {
			company_name: $('#company_name').val(),
			locations: [
				{name:'Mission Valley', address:'321 Mission Gorge, SD',  manager:'Steve', contact: '6192221122'},
				{name:'Fashion Valley',address:'123 Fletcher, SD',  manager:'Jessica', contact: '6192221122'},
				{name:'SDSU Campus',address:'426 Montazuma, SD',  manager:'Paul', contact: '6192221122'}
			],
			shifts: [
				{name:'Morning',shift_start:'7:30AM',shift_end:'3:30PM'},
				{name:'Afternoon',shift_start:'12:30PM',shift_end:'7:30PM'},
				{name:'Evening',shift_start:'2:30PM',shift_end:'9:30PM'}
			],
			admin_email: $('#admin_email').val()
		};
		
		try {

			$.ajax({
				url: settings_url,
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

	// What needs to be done?
	/*
		Need to be able to add, update, and remove shifts
	*/
	//assert(addShift(data), "addShift worked!");

	//assert(removeShift(id), "removeShift worked!");
	
	//assert(updateShift(id), "updateShift worked!");

	var SWIFT = SWIFT || {},
            shifter;
            
        SWIFT.modules = {};
        
	SWIFT.modules.company_shifts = (function () {
		var name, shift_start, shift_end;
		
		function addShift(data) {
                    return true;
		}

		function removeShift (id) {
                    return true;
		}

		function updateShift(id) {
                    return true;
		}

		shifter = {
			addShift: addShift,
			removeshift: removeShift,
			updateShift: updateShift
		};

        }());
});