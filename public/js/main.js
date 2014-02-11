$(function() {
    $(".check_avail").on('click', function(e) {
        e.preventDefault();
        var rel = $(this).attr('rel');
        $('<div>Availability</div>').dialog({
            open: function() {
                $("#datepicker_" + rel).datepicker({
                    onSelect: function() {
                        $('<div>Location</div>').dialog();
                    }
                });
            },
            close: function() {
                $('#datepicker_' + rel).datepicker('destroy');
            }
        });
    });
});