$(function(){ 
//    getEmployees(); 
   /*
    $(".check_avail").on('click', function(e) {
        e.preventDefault();
        /*
       
        $("#datepicker_" + rel).datepicker({
            showButtonPanel: true,
            buttonText: "Done",
            onSelect: function() {
                $('<div>Location</div>').dialog();
            }
        });
        */
        /*
        var rel = $(this).attr('rel');
        $('#avail_'+rel).fadeToggle();
    });
    */
    var add_employee = String()
            + '<section>'
                + '<div>'
                        + '<div><label for="first_name">First Name</label><input type="text" name="first_name" id="first_name" /></div>'
                        + '<div><label for="last_name">Last Name</label><input type="text" name="last_name" id="last_name" /></div>'
                        + '<div><label for="position">Position</label><input type="text" name="position" id="position" /></div>'
                        + '<div><label for="phone">Phone</label><input type="text" name="phone" id="phone" /></div>'
                        + '<div><label for="email">Last Name</label><input type="text" name="email" id="email" /></div>'
                        + '<div><label for="availability">Availability</label><input type="text" name="availability" id="availability" /></div>'
                + '</div>'
            + '</section>';
       
    $('body').on('click', 'input#add_employee_btn', function(e) {
        $(add_employee).dialog({
            title: "Add Employee"
        });
    });

    Date.prototype.getWeek = function(start)
    {
            //Calcing the starting point
        start = start || 0;
        var today = new Date(this.setHours(0, 0, 0, 0));
        var day = today.getDay() - start;
        var date = today.getDate() - day;

            // Grabbing Start/End Dates
        var StartDate = new Date(today.setDate(date));
        var EndDate = new Date(today.setDate(date + 6));
        return [StartDate, EndDate];
    }

    // test code
    var Dates = new Date().getWeek();
    //alert(Dates[0].toLocaleDateString() + ' to '+ Dates[1].toLocaleDateString())

});

/*
 * Pull list of employees from db and returns json
 */
function getEmployees() {
    request = {
        'ajaxRequest': true
    };
    postData('ajaxGetEmployees', 'GET', 'json', request, getEmployeesBeforeSend, getEmployeesSuccess);
}

function getEmployeesBeforeSend() {
    console.log('getting em');
}

function getEmployeesSuccess(data) {
    var results = data,
        table = $('#employee_table_body');
    console.log(results);
    $.each(results.message, function(){
        table.append('<tr><td>Static</td><td>'+this.first_name + ' ' + this.last_name +'</td><td>'+this.phone+'</td><td>'+this.email+'</td><td>Coming Soon</td><td>Edit | Remove</td></tr>');
    });
}

function getEmployeesFailure() {
    console.log('Wakka wakka');
}

function saveEmployee() {
   // ajaxData(url, data, saveEmployeeSuccess, saveEmployeeFailure);
}

function saveEmployeeSuccess() {
    
}

function saveEmployeeFailure() {
    
}

function removeEmployee() {
    //ajaxData(url, data, removeEmployeeSuccess, removeEmployeeFailure);
}

function removeEmployeeSuccess() {
    
}


function removeEmployeeFailure() {
    
}

function updateEmployee() {
    //ajaxData(url, data, updateEmployeeSuccess, updateEmployeeFailure);
}

function updateEmployeeSuccess() {
    
}

function updateEmployeeFailure() {
    
}

function renderRows() {
    
}

function renderDialog() {
    
}

// Universal Ajax Method
function postData(url, type, dataType, data, beforeSend, success) {
    $.ajax({
        url: url,
        type: type,
        dataType: dataType,
        data: data,
        beforeSend: function(data) {
            beforeSend(data);
        },
        success: function(data) {
            success(data);
        }
    });
}