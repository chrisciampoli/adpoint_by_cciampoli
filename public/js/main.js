$(function(){
   $('body').on('click','input#logout_btn',function(e){
      e.preventDefault();
      $.post('index.php/auth/logout');
   });
});