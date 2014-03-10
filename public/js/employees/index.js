$(function() {
    $('#logout_btn').on('click',function(e){
       e.preventDefault();
       $.ajax({
          url: config.base,
          data: {},
          success: function(data) {
              
          },
          failure: function(data) {
              
          }
       });
    });
});