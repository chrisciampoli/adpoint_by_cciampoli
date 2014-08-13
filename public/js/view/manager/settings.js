$(function(){

	var settings_url = config.base + "manager/home/ajaxPostSettings",
		addShift_url = config.base + "manager/home/ajaxPostShift",
		deleteShift_url = config.base + "manager/home/ajaxDeleteShift",
		addLocation_url = config.base + "manager/home/ajaxPostLocation",
		deleteLocation_url = config.base + "manager/home/ajaxDeleteLocation",
	    shift_data = $.parseJSON(config.shifts),
	    locations_data = $.parseJSON(config.locations),
	    shifts = SWIFT.modules.company.settings.shifts,
	    locations = SWIFT.modules.company.settings.locations,
	    settings = SWIFT.modules.company.settings.settings;
	
	$('#display_shifts').on('click',function(e){
		$('#shifts_tbl').fadeToggle();
	});
	
	$('#display_locations').on('click',function(e){
		$('#locations_tbl').fadeToggle();
	});

	$('#saveBtn').on('click', function(e) {
		
		e.preventDefault();
	
		var data = {
				company_name: $('#company_name').val(),
				admin_email: $('#admin_email').val(),
				shifts: shift_data,
				locations: locations_data		
			};

		try {
		
			settings.addSettings(data, settings_url);
		
		} catch(e) {
		
			alert('Error saving settings, please contact your administrator');
		
		}
		
	});

	
	//////////////////////////////////////////////////////////////
	$('#shiftSaveBtn').on('click', function(e) {

		// Open the dialog
		//console.log(shift_data);return;

		if(shift_data.result) {
			shift_data = [];
		}
		var id = shift_data.length + 1;
		var data = {
			id: id,
			name: $('#shiftName').val(),
			shift_start: $('#shiftStart').val(),
			shift_end: $('#shiftEnd').val()
		};

		shift_data.push(data);

		var new_record = {
			shifts: shift_data,
			new_shift: data
		};

		try {
			shifts.addShift(new_record, addShift_url);
		} catch (e) {
			alert("Could not save shift, please contact your administrator");
		}
		
	});

	$('#shiftEditBtn').on('click', function(e) {

	});

	$('body').on('click','#shiftDeleteBtn', function(e) {
        e.preventDefault();
        // Open the dialog
		//console.log(shift_data);return;
		//grab id of this shift
		//pass to shifts.removeShift(int id);
		try {
			var row = $(this).closest('tr'),
			    id = $(row).children().first().attr('id');
			    $(row).fadeToggle();
			    var theId = id - 1;
			    shift_data.splice(theId,1);

			    var data = {
				    company_name: $('#company_name').val(),
				    admin_email: $('#admin_email').val(),
				    shifts: shift_data,
				    locations: locations_data		
			    };

			    shifts.removeShift(data, deleteShift_url);

		} catch (e) {
			alert("Could not delete shift, please contact your administrator " + e.toString());
		}
	});
    ////////////////////////////////////////////////////////////////


    ////////////////////////////////////////////////////////////////
	$('#locationSaveBtn').on('click', function(e) {
		
		if(locations_data.result) {
			locations_data = [];
		}
		
		var id = locations_data.length + 1;
		
		var data = {
			id: id,
			locationName: $('#locationName').val(),
			locationAddress: $('#locationAddress').val(),
			manager: $('#manager').val(),
			contact: $('#contact').val()
		};

		locations_data.push(data);

		var new_record = {
			locations: locations_data,
			new_location: data
		};

		try {
			locations.addLocation(new_record, addLocation_url);
			$('#locationHolder').hide();
		} catch (e) {
			alert("Could not save location, please contact your administrator");
		}
	
	});

	$('#locationEditBtn').on('click', function(e) {

	});

	$('body').on('click', '#locationDeleteBtn', function(e) {
		e.preventDefault();
		//TODO confirm
		try {
			var row = $(this).closest('tr'),
			    id = $(row).children().first().attr('id');
			    $(row).fadeToggle();
			    var theId = id - 1;
			    locations_data.splice(theId,1);

			    var data = {
				    company_name: $('#company_name').val(),
				    admin_email: $('#admin_email').val(),
				    shifts: shift_data,
				    locations: locations_data		
			    };

			    locations.removeLocation(data, deleteLocation_url);

		} catch (e) {
			alert("Could not delete location, please contact your administrator " + e.toString());
		}
	});
	///////////////////////////////////////////////////////////////
	
});