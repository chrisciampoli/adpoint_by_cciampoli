$(function(){
    $('#logout_btn').on('click',function(e){
        e.preventDefault();
        $.post('http://54.193.89.75/swift_schedules/index.php/auth/logout');
    });
});