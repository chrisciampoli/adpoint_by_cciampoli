$(function(){
   $('body').on('click','input#logout_btn',function(e){
      e.preventDefault();
      console.log('Logout!');
   });
});