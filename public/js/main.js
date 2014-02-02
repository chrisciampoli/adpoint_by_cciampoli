$(function(){
   $('body').on('click','input#logout_btn',function(e){
      e.preventDefault();
      var url = "<?php base_url('auth/logout');?>";
      $.post(url);
   });
});