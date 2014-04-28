$(function() {

	var debug = true,
		selected,
		update_url = config.base + "user/home/ajaxUpdateRequest";

    $('body').on('click', '.accepted-row', function(e){
    	e.preventDefault();
    	selected = $(this);
    	$('#confirmation_modal').modal('show');
    });
    
    $('body').on('click','#accept_btn',function(){
        $(selected).removeClass('warning accepted-row').addClass('success accepted-row');
        var id = $(selected).attr('rel');
        $('.status#'+id)
                .children()
                .removeClass('label-warning')
                .addClass('label-success')
                .html('Accepted and Scheduled');
        updateStatus(id,'scheduled');
    });
    
    $('body').on('click','#decline_btn',function(){
       $(selected).removeClass('warning pending-row').addClass('danger denied-row');
       var id = $(selected).attr('rel');
       $('.status#'+id)
                .children()
                .removeClass('label-warning')
                .addClass('label-danger')
                .html('Denied');
        updateStatus(id,'denied');
    });

    function updateStatus(id, status) 
    {
      var data = {
        "id":id,
        "status":status
      }
      try {
        $.ajax({
              url: update_url,
              data: data,
              type: "post",
              dataType: "json",
              success: function(data){
                  console.log(data);
              },
              failure: function(data){
                  alert('Could not post request!');
              }
          });
      } catch(err) {
        if(debug === true) console.log('could not update status of request: Error: ' + err);
      }
    }
});