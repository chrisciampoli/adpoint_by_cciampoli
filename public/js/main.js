$(function() {
    $('#table_header').prepend('<input id="add_employee_btn" type="button" value="Add Employee" />');
    $('body').on('click', 'input#add_employee_btn', function(e) {
        $('<div>Test</div>').dialog({
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