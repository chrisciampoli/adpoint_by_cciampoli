$(function() {
    
    var logout_url = config.base + "auth/logout";
    
    $('#logout_btn').on('click',function(e){
       e.preventDefault();
       $.ajax({
          url: logout_url,
          data: {},
          success: function(data) {
              
          },
          failure: function(data) {
              
          }
       });
    });
});