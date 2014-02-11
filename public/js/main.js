$(function() {
    $(".check_avail").on('click', function(e) {
        e.preventDefault();
        var rel = $(this).attr('rel');
        $("#datepicker_" + rel).datepicker({
            showButtonPanel: true,
            onSelect: function() {
                $('<div>Location</div>').dialog();
            }
        });
    });
});