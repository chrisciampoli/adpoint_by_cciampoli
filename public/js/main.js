$(function(){
    $('body').on('click','#logout_btn',function(e){
        e.preventDefault();
        $.post('http://54.193.89.75/swift_schedules/index.php/auth/logout').always(function(){
            window.location.replace("http://54.193.89.75/swift_schedules/index.php/auth/login");
        });
    });
});