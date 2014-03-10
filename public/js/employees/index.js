$(function() {
    $('#logout_btn').on('click',function(e){
       e.preventDefault();
       $.ajax({
          url: config.base . "auth/logout",
          data: {},
          success: function(data) {
              
          },
          failure: function(data) {
              
          }
       });
    });
});