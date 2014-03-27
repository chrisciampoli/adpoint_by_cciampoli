$(function() {

    var logout_url = config.base + "auth/logout",
        schedule_url = config.base + "user/home/getSchedule",
        request_url = config.base + "user/home/postRequest",
        today = new Date(),
        month = today.getMonth() + 1,
        myDate = today.getDate() + '/' + month + '/' + today.getFullYear(),
        working = false,
        title,
        hours,
        selected;
        
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        $('div#week #date').html(today.toDateString());
        $('div#month #date').html(today.toDateString());
    });
   
    $('body').on('click','.pending-row', function(e){
        e.preventDefault();
        console.log(this.className);
        console.log($(this).attr('rel'));
        
        selected = $(this);
        
        $('#confirmation_modal').modal('show');
    });
    
    $('body').on('click','#accept_btn',function(){
        $(selected).removeClass('warning pending-row').addClass('success accepted-row');
        var id = $(selected).attr('rel');
        $('.status#'+id)
                .children()
                .removeClass('label-warning')
                .addClass('label-success')
                .html('Accepted');
    });
    
    $('body').on('click','#decline_btn',function(){
       $(selected).removeClass('warning pending-row').addClass('danger denied-row');
       var id = $(selected).attr('rel');
       $('.status#'+id)
                .children()
                .removeClass('label-warning')
                .addClass('label-danger')
                .html('Denied');
    });
   
    $.ajax({
        url: schedule_url,
        data: {},
        success: function(data) {            
             $('#date').html(today.toDateString());
                         
            if (data !== 'false') {
                var parsed = $.parseJSON(data),
                    events = $.parseJSON(parsed[0].schedule),
                    monthNames = [],
                    dayNames = [];
            
                $.each(events, function(i, e) {
                    if (myDate === e.date) {
                        working = true;
                        console.log(e);
                        title = e.title;
                        hours = e.content;
                    }
                });


                if (working === true) {
                    $('#working').html(title);
                    $('#hours').html(hours);
                    $('div#week #working').html(title);
                    $('div#month #working').html(title);
                } else if (working === false) {
                    $('#working').html('Not scheduled for today');
                    $('div#week #working').html('Not scheduled for today');
                    $('div#month #working').html('Not scheduled for today');
                    $('#hours').html('*-*');
                    $('#swift_btn').addClass('disabled');
                    $('#busy_btn').addClass('disabled');
                }
                
                monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

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
            } else {
                $('#working').html('No schedule found!  Please contact your manager.');
                $('#hours').html('*-*');
                $('#calendar').html('No schedule found! Please contact your manager.');
            }

        },
        failure: function(data) {
            alert('Issue with pulling schedule!  Please refresh the page');
        }
    });
    /*
     var events = [
     {
     date: "11/3/2014",
     title: "Starbucks: College",
     color: "#333",
     content: '4:30PM - 10:30PM'
     },
     {
     date: "12/3/2014",
     title: "Starbucks: College",
     color: "#333",
     content: '6:30PM - 10:30PM'
     },
     {
     date: "13/3/2014",
     title: "Starbucks: College",
     color: "#333",
     content: '5:30PM - 10:30PM'
     }
     ];
     */

    $('body').on('click', '#logout_btn', function(e) {
        e.preventDefault();
        $.ajax({
            url: logout_url,
            data: {},
            success: function(data) {
                window.location.href = config.base;
            },
            failure: function(data) {
                alert('Issue with logging you out.  Please refresh the page!');
            }
        });
    });

    $('body').on('click', '#pickup_btn', function(e) {
        e.preventDefault();
    });
    
    $('body').on('click','#giveup_btn', function(e){
       e.preventDefault();
       var targets = [],
           checked;
       
       checked = $(':checked');
       $.each(checked, function(){
          targets.push(this.value); 
       });
       
       console.log('Targets: ' + targets);
       console.log('Title: ' + title);
       console.log('Shift: ' + hours);
       console.log('Date: ' + today.toDateString());
       
       var request = {
           "target_id": targets,
           "title": title,
           "shift": hours,
           "date": today.toDateString()
       };
       
      try {
          $.ajax({
              url: request_url,
              data: request,
              type: "post",
              dataType: "json",
              success: function(data){
                  console.log(data);
                  $('.modal-dialog').hide();
              },
              failure: function(data){
                  $('.modal-dialog').hide();
                  alert('Could not post request!');
              }
          });
      } catch(e) {
          alert('Sorry we could not complete your request');
      }
       
    });

});
