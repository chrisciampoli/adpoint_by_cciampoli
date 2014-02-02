$(function(){
   $('body').on('click','input#logout_btn',function(e){
      e.preventDefault();
      var url = "<?php echo base_url();?>";
      console.log(url);
   });
});