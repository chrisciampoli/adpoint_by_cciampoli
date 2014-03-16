$(function() {
    
    var logout_url = config.base + "auth/logout";
    
    // Gonna need to do a query to a schedules table
    // Using the username from php.  We will grab the data
    // in json, and the build the events variable based on that.
    /*
CREATE TABLE `schedules` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(255) NOT NULL,
  `schedule` TEXT NOT NULL,
  `updated`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
     */
    
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
    
    
    
    $('body').on('click','#logout_btn',function(e){
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
    
    $('body').on('click','#pickup_btn',function(e){
       e.preventDefault();  
    });
    
});
