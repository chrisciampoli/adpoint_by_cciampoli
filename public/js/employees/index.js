$(function() {
    
    var logout_url = config.base + "auth/logout";
    
    $('#calendar').bic_calendar({
        startWeekDay: 1,
        enableSelect: true,
        multiSelect: true,
        displayYearController: false
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