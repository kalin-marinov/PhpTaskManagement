$(document).ready(function() {
$('input[type="submit"]').mousedown(function(){
  $(this).css('background', '#2ecc71');
});
$('input[type="submit"]').mouseup(function(){
  $(this).css('background', '#1abc9c');
});

$('#loginform').click(function(){
  $('.login').fadeToggle('slow');
  $(this).toggleClass('green');
});

$('#registerForm').click(function(){
  $('.register').fadeToggle('slow');
  $(this).toggleClass('green');
});
});


$(document).mouseup(function (e)
{
    var loginContainer = $(".login");
    var registerContainer = $(".register");

    if (!loginContainer.is(e.target) 
        && loginContainer.has(e.target).length === 0) 
    {
        loginContainer.hide();
        $('#loginform').removeClass('green');
    }

    if (!registerContainer.is(e.target) 
        && registerContainer.has(e.target).length === 0) 
    {
        registerContainer.hide();
        $('#registerForm').removeClass('green');
    }
});