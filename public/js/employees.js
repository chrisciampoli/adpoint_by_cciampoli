$(function(){ 
    
    
        
        //events = [{"date":"1\/4\/2014","title":"Mission Valley","color":"#333","content":"5:30PM-10:30PM"}], // Replace with ternary calling getSchedule();

    var getEmployeeUrl = 'user/home/getEmployee',
        postEmployeeUrl = config.base + 'manager/home/ajaxPostEmployee',
        updateEmployeeUrl = 'user/home/updateEmployee',
        removeEmployeeUrl = 'user/home/removeEmployee',
        getScheduleUrl = config.base + "manager/home/ajaxGetSchedule",
        postScheduleUrl = config.base + 'manager/home/ajaxPostSchedule',
        updateScheduleUrl = 'user/home/updateSchedule',
        debug = true,
        first_name = $('#inputFirstName'),
        last_name = $('#inputLastName'),
        email = $('#inputEmail'),
        phone = $('#inputPhone'),
        password = $('#inputPassword'),
        password_confirm = $('#inputPasswordConfirmation'),
        company = $('#hiddinInputCompany'),
        form_input = $('.form_input'),
        presetDays = '',
        currentDay,
        targetDay,
        targetEmployee = '';



    // onBlur handlers for focus/removal of red border
    form_input.on('blur',function(e){
        if($(this).val() == '') {
            $(this).css('border','2px solid red');
        } else {
            $(this).css('border','');
        }
    });

    

   $('body').on('click','#employeeSaveBtn',function(e) {
        saveEmployee(first_name.val(), last_name.val(), email.val(), company.val(), phone.val(), password.val(), password_confirm.val());
   });

   $('body').on('click','.day',function(e){
        currentDay = $(this).attr('data-date');
        targetDay = $(this);
        $('#editDayModal').modal('toggle');
   });

   $('body').on('click','#daySaveBtn', function(e){
        
        date = currentDay;
        currentDay = '';

        var shift_start = $('#inputShiftStart').val(),
            shift_end = $('#inputShiftEnd').val(),
            location = $('#inputLocation').val();
       setDay(date, shift_start, shift_end, location);
       if(debug === true) console.log('Target Day: ' . targetDay);
       targetDay.css('background-color','red');
       targetDay = '';
       $('#editDayModal').modal('toggle');
   });

   $('body').on('click','#scheduleSaveBtn', function(e){
       saveSchedule(targetEmployee, events);
       $('#editScheduleModal').modal('toggle');
       targetEmployee = '';
   });

   $('body').on('click','.check_avail',function(){
        
       targetEmployee = $(this).attr('rel');
       targetEmployee = targetEmployee.split('|');
       targetEmployee = targetEmployee[1];

        if(debug === true) console.log('Target Employee: ' + targetEmployee);

        getSchedule();

   });

   function setDay(date, shift_start, shift_end, location) {
        
        var date = date.split('/');
            date = date[1] + '/' + date[0] + '/' + date[2];    

        events.push( 
        {
            date: date,
            title: location,
            color: "#333",
            content: shift_start + '-' + shift_end
        });

   }

   function getScheduleBeforeSend(data)
   {
      return true;
   }

   function getScheduleSuccess(data)
   {
        window.test = data;
        events = $.parseJSON(data);
        
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            dayNames = ["S", "M", "T", "W", "T", "F", "S"];

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
            //change calendar to english format
            startWeekDay: 1
        });

   }

   function getSchedule() 
   {
     var data = {
      "username": targetEmployee
     };
       try {
          postData(getScheduleUrl, "POST", "json", data, getScheduleBeforeSend, getScheduleSuccess);
       } catch(err) {
          if(debug===true) console.log('could not grab schedule: Error: ' + err);
       }
   }

   function saveSchedule(username, data) {
    var schedule = {
        "username": username,
        "schedule": data
    };
       try {
           postData(postScheduleUrl, "POST", "json", schedule, saveScheduleBeforeSend, saveScheduleSuccess);
       } catch(err) {
           if(debug === true) console.log('could not save schedule: Error: ' + err);
       }
   }

   function saveScheduleBeforeSend() {
        return true;
   }

   function saveScheduleSuccess() {
        return true;
   }

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
            if(debug===true) console.log('Employee saved successfully');
            $('#addEmployeeModal').modal('toggle');
            renderRow(first_name.val(), last_name.val(), email.val(), phone.val());
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

    function renderRow(first_name, last_name, email, phone) {
           var row = '<tr><td>'+ucfirst(first_name)+' '+ucfirst(last_name)+'</td><td>'+phone+'</td><td>'+email+'</td><td><button data-toggle="modal" data-target="#editScheduleModal" type="button" class="check_avail btn btn-primary btn-sm"><div class="datepicker" id="datepicker_1" rel="1"></div><span class="glyphicon glyphicon-calendar"></span> Schedule</button></td><td><button type="button" style="margin-right:4px;" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</button><button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span> Remove</button></td>';
           $('#employee_table').append(row).fadeIn();
           

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

    function ucfirst(str) {
      //  discuss at: http://phpjs.org/functions/ucfirst/
      // original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
      // bugfixed by: Onno Marsman
      // improved by: Brett Zamir (http://brett-zamir.me)
      //   example 1: ucfirst('kevin van zonneveld');
      //   returns 1: 'Kevin van zonneveld'

      str += '';
      var f = str.charAt(0)
        .toUpperCase();
      return f + str.substr(1);
    }

});

