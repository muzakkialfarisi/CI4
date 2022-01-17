$(document).ready(function() {
  
  $("#show_hide_password a").on('click', function(event) {
    event.preventDefault();
    if($('#show_hide_password input').attr("type") == "text"){
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass( "bi bi-eye-slash" );
        $('#show_hide_password i').removeClass( "bi bi-eye" );
    }else if($('#show_hide_password input').attr("type") == "password"){
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass( "bi bi-eye-slash" );
        $('#show_hide_password i').addClass( "bi bi-eye" );
    }
  });

  $("#show_hide_password2 a").on('click', function(event) {
    event.preventDefault();
    if($('#show_hide_password2 input').attr("type") == "text"){
        $('#show_hide_password2 input').attr('type', 'password');
        $('#show_hide_password2 i').addClass( "bi bi-eye-slash" );
        $('#show_hide_password2 i').removeClass( "bi bi-eye" );
    }else if($('#show_hide_password2 input').attr("type") == "password"){
        $('#show_hide_password2 input').attr('type', 'text');
        $('#show_hide_password2 i').removeClass( "bi bi-eye-slash" );
        $('#show_hide_password2 i').addClass( "bi bi-eye" );
    }
  });

});