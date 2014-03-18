$(function() {

    var logout_url = config.base + "auth/logout",
        schedule_url = config.base + "user/home/getSchedule";

    $.ajax({
        url: schedule_url,
        data: {},
        success: function(data) {
            console.log(data);
            var parsed = $.parseJSON(data);
            var events = $.parseJSON(parsed[0].schedule);
            
            // We need to do a few things here with the data before
            // using it to populate the calendar.
            
            /*
             * First we need to get todays date, then check for todays date
             * within the schedule to see if the user is working today. If not
             * then we need to change the working and hours sections to "Not Scheduled"
             * 
             * If they DO have a schedule for today, then we need to update the working and
             * hours section to reflect that.
             */
            var today = new Date(),
                month = today.getMonth()+1,
                myDate = today.getDate() + '/' + month + '/' + today.getFullYear(),
                working = false,
                title,
                hours;
           
            $('#date').html(today.toDateString());
            
            $.each(events, function(i, e){
               if(myDate === e.date) {
                    working = true;
                    console.log(e);
                    title = e.title;
                    hours = e.content;
               }
            });
            
            
            if(working === true) {
                $('#working').html(title);
                $('#hours').html(hours);
            } else if(working === false) {
                $('#working').html('Not scheduled for today');
                $('#hours').html('*-*');
            }
            var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            var dayNames = ["S", "M", "T", "W", "T", "F", "S"];

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

});
