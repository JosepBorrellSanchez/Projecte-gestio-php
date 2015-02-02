
jQuery(document).ready(function() {

    $('.page-container form').submit(function(){
        var username = $(this).find('.username').val();
        var password = $(this).find('.password').val();
        var con_password = $(this).find('.con_password').val();
        var nomicognoms = $(this).find('.nomicognoms').val();
        var email = $(this).find('.email').val();
        
        
        if(username == '') {
            $(this).find('.error').fadeOut('fast', function(){
                $(this).css('top', '27px');
            });
            $(this).find('.error').fadeIn('fast', function(){
                $(this).parent().find('.username').focus();
            });
		alert('No has escrit el nom d\'usuari'); // Mensaje a mostrar
            return false;
        }
        if(password == '') {
            $(this).find('.error').fadeOut('fast', function(){
                $(this).css('top', '96px');
            });
            $(this).find('.error').fadeIn('fast', function(){
                $(this).parent().find('.password').focus();
            });
		alert('No has escrit la password');
            return false;
       
        
    });



});
