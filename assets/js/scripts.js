
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
		alert('No has escrit la contrasenya');
            return false;
        }
        
        if(password.length < 4) {
            $(this).find('.error').fadeOut('fast', function(){
                $(this).css('top', '96px');
            });
            $(this).find('.error').fadeIn('fast', function(){
                $(this).parent().find('.password').focus();
            });
		alert('La contrasenya ha de ser de més de 4 xifres');
            return false;
        }
        
        
        if(con_password == '') {
            $(this).find('.error').fadeOut('fast', function(){
                $(this).css('top', '165px');
            });
            $(this).find('.error').fadeIn('fast', function(){
                $(this).parent().find('.con_password').focus();
            });
		alert('No has escrit la confirmació de password');
            return false;
        }

	if(con_password != password) {
            $(this).find('.error').fadeOut('fast', function(){
                $(this).css('top', '165px');
            });
            $(this).find('.error').fadeIn('fast', function(){
                $(this).parent().find('.con_password').focus();
            });
		alert('Les contrasenyes no coincideixen');
            return false;
        }


        
        if(nomicognoms == '') {
            $(this).find('.error').fadeOut('fast', function(){
                $(this).css('top', '234px');
            });
            $(this).find('.error').fadeIn('fast', function(){
                $(this).parent().find('.nomicognoms').focus();
            });
		alert('No has escrit el nom i cognom');
            return false;
        }
        
        if(email == '') {
            $(this).find('.error').fadeOut('fast', function(){
                $(this).css('top', '303px');
            });
            $(this).find('.error').fadeIn('fast', function(){
                $(this).parent().find('.email').focus();
            });
		alert('No has escrit l\'email');
            return false;
        }
        
        if(email == '') {
            $(this).find('.error').fadeOut('fast', function(){
                $(this).css('top', '303px');
            });
            $(this).find('.error').fadeIn('fast', function(){
                $(this).parent().find('.email').focus();
            });
		alert('No has escrit l\'email');
            return false;
        }
        
    });



});
