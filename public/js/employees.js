$(function(){ 
    
    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        dayNames = ["S", "M", "T", "W", "T", "F", "S"],
        events = [
            {
                date: "28/12/2013",
                title: 'SPORT & WELLNESS',
                link: 'http://bic.cat',
                linkTarget: '_blank',
                color: '',
                content: '<\img src="http://gettingcontacts.com/upload/jornadas/sport-wellness_portada.png" ><\br>06-11-2013 - 09:00 <\br> Tecnocampus Mataró Auditori',
                class: '',
                displayMonthController: true,
                displayYearController: true,
                nMonths: 6
            }
        ],
        getEmployeeUrl = 'user/home/getEmployee',
        postEmployeeUrl = config.base + 'manager/home/ajaxPostEmployee',
        updateEmployeeUrl = 'user/home/updateEmployee',
        removeEmployeeUrl = 'user/home/removeEmployee',
        getScheduleUrl = 'user/home/getSchedule',
        postScheduleUrl = 'user/home/postSchedule',
        updateScheduleUrl = 'user/home/updateSchedule',
        debug = true,
        first_name = $('#inputFirstName'),
        last_name = $('#inputLastName'),
        email = $('#inputEmail'),
        phone = $('#inputPhone'),
        password = $('#inputPassword'),
        password_confirm = $('#inputPasswordConfirmation'),
        company = $('#hiddinInputCompany');


    $('#calendar').bic_calendar({
        events: events,
        //enable select
        enableSelect: true,
        //set day names
        dayNames: dayNames,
        //set month names
        monthNames: monthNames,
        //show dayNames
        showDays: true,
        //show month controller
        displayMonthController: true,
        //show year controller
        displayYearController: true,
        //change calendar to english format
        startWeekDay: 1,
        //set ajax call
        reqAjax: {
            type: 'get',
            url: 'http://bic.cat/bic_calendar/index.php'
        }
    });

   $('body').on('click','#employeeSaveBtn',function(e) {
        saveEmployee(first_name.val(), last_name.val(), email.val(), company.val(), phone.val(), password.val(), password_confirm.val());
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

    function saveEmployee(first_name, last_name, email, company, phone, password, password_confirm) {

           var data = {
              "first_name":first_name,
              "last_name":last_name,
              "email":email,
              "company":company,
              "phone":phone,
              "password":password,
              "password_confirm":password_confirm
           };
           if(debug===true) console.log('Company: ' + company); 
           try {

              postData(postEmployeeUrl, "POST", "json", data, saveEmployeeBeforeSend, saveEmployeeSuccess);

           } catch(err) {
            
              if(debug === true) console.log('could not save employee: Error: ' + err);
           
           }
    }

    function saveEmployeeBeforeSend() {
        if(debug===true) console.log('Saving employee....');
    }

    function saveEmployeeSuccess(data) {

        if(data.status === 'failure') {
            saveEmployeeFailure(data);
        } else {
            // Notify user that user(employee) was added
            // append a new row to the employee table
            alert('Employee created successfully!');
            if(debug===true) console.log('Employee saved successfully');
            $('#myModal').modal('toggle');
            $('#employee_table').append('<tr><td>Testing</td></tr>')
            renderRow(first_name, last_name, email, phone);
        }

    }

    function saveEmployeeFailure(data) {

        if(debug===true) console.log('Could not save employee');
        
        var first_name_error = data.errors.match(/first_name/i),
            last_name_error = data.errors.match(/last_name/i)
            email_error = data.errors.match(/email/i),
            phone_error = data.errors.match(/phone/i),
            password_error = data.errors.match(/password/i),
            password_confirm_error = data.errors.match(/password_confirm/i);


        if(first_name_error) {
            first_name.css('border','2px solid red');
        }

        if(last_name_error) {
            last_name.css('border','2px solid red');
        }

        if(email_error) {
            email.css('border','2px solid red');
        }

        if(phone_error) {
            phone.css('border','2px solid red');
        }

        if(password_error) {
            password.css('border','2px solid red');
        }

        if(password_confirm_error) {
            password_confirm.css('border','2px solid red');
        }




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

    function renderRows(first_name, last_name, email, phone) {
           
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

});

