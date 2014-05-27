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

		var data = {
			name: $('#shiftName').val(),
			shift_start: $('#shiftStart').val(),
			shift_end: $('#shiftEnd').val()
		};

		shift_data.push(data)

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

	$('#shiftDeleteBtn').on('click', function(e) {

	});
    ////////////////////////////////////////////////////////////////


    ////////////////////////////////////////////////////////////////
	$('#locationSaveBtn').on('click', function(e) {
		var data = {

		}
	
		try {
			locations.addLocation(data, addLocation_url);
		} catch (e) {
			alert("Could not save location, please contact your administrator");
		}
	
	});

	$('#locationEditBtn').on('click', function(e) {

	});

	$('#locationDeleteBtn').on('click', function(e) {

	});
	///////////////////////////////////////////////////////////////
	
});