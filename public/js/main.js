$(function() {
    $('#table_header').prepend('<input id="add_employee_btn" type="button" value="Add Employee" />');
    $('body').on('click', 'input#add_employee_btn', function(e) {
        var add_dialog = String(
                '<div><label for="first_name">First Name</label></div>'+
                '<div><input type="text" name="first_name" id="first_name" /></div>'
                );
        $(add_dialog).dialog({
            title: "Add Employee"
        });
    });
    $('#container').on('click', 'input#logout_btn', function(e) {
        e.preventDefault();
        $.post('http://54.193.89.75/swift_schedules/index.php/auth/logout').always(function() {
            window.location.replace("http://54.193.89.75/swift_schedules/index.php/auth/login");
        });
    });
});