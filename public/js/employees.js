$(function(){ 
    getEmployees(); 
   
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
    
    $('#table_header').prepend('<input id="add_employee_btn" type="button" value="Add Employee" />');
    
    $('body').on('click', 'input#add_employee_btn', function(e) {
        $(add_employee).dialog({
            title: "Add Employee"
        });
    });

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
        table = $('#employees_table_body');
    console.log(results);
    $.each(results.message, function(){
       console.log(this.email);
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