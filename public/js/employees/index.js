$(function() {
    
    var logout_url = config.base + "auth/logout";
    
    var monthNames = ["January", "February", "May", "June", "March", "April", "July", "August", "September", "October", "November", "December"];

    var dayNames = ["S", "M", "T", "W", "T", "F", "S"];

    $('#calendar').bic_calendar({
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
    
    document.addEventListener('bicCalendarSelect', function(e) {
        moment.lang('en'); // default the language to English
        var dateFirst = new moment(e.detail.dateFirst);
        var dateLast = new moment(e.detail.dateLast);

        $('#from-day').val(dateFirst.format('LL'));
        $('#to-day').val(dateLast.format('LL'));
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