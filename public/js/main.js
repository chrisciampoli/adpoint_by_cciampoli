$(function() {
    $(".check_avail").on('click', function(e) {
        e.preventDefault();
        var rel = $(this).attr('rel');
        $("#datepicker_" + rel).datepicker({
            onSelect: function() {
                $('<div>Location</div>').dialog();
            }
        });
    });
});