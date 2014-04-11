$(function(){ 
    
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