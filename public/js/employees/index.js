$(function() {
    $('#logout_btn').on('click',function(e){
       e.preventDefault();
       $.ajax({
          url: "<?php echo base_url('auth/logout');?>",
          data: {},
          success: function(data) {
              
          },
          failure: function(data) {
              
          }
       });
    });
});