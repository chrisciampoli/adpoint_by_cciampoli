$(function() {
    $('#logout_btn').on('click',function(e){
       e.preventDefault();
       $.ajax({
          url: "auth/logout",
          data: {},
          success: function(data) {
              
          },
          failure: function(data) {
              
          }
       });
    });
});