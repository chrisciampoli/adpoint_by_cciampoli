$(function(){
   $('body').on('click','input#logout_btn',function(e){
      e.preventDefault(); 
      $.post('/swift_schedules/index.php/auth/logout');
   });
});