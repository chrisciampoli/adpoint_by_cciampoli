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
	
});