$(function() {
    
    var logout_url = config.base + "auth/logout";
    
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
    
    
    
    $('#logout_btn').on('click',function(e){
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
});