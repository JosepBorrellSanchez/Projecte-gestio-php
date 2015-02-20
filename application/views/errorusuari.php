<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
        <meta charset="utf-8">
        <title>Registre</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/reset.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/supersized.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/form.js"></script>
        <script>
			
function setFocusToTextBox(){
    document.getElementById("username").focus();
}
</script>
        
 </head>
 <body onload='setFocusToTextBox()'>
   <div class="page-container">
	   <h1>Registre</h1>
            <?php echo validation_errors(); ?>
			<?php echo form_open('registre/registration');  ?>
                <input type="text" name="username" id="username" class="username" placeholder="Nom d'usuari" value='<?php echo $username;?>'> Ho sento el nom d'usuari ja existeix
                <input type="password" name="password" class="password" placeholder="Paraula de pas">
                <input type="password" name="con_password" class="con_password" placeholder="Confirma la paraula de pas">
                <input type="text" name="nomicognoms" class="nomicognoms" placeholder="Nom i cognoms" value='<?php echo $Nomicognoms;?>'>
                <input type="text" name="email" class="email" placeholder="Email" value='<?php echo $Email;?>'>
                <?php echo $recaptcha_html; ?> 
                <button type="submit">Registrar-se</button>
                Ja tens un compte? entra <a href="<?php echo base_url('index.php/login')?>";>aquí</a>
                <div class="error"><span>+</span></div>
            </form>
        </div>

        <!-- Javascript -->
        <script src="<?php echo base_url();?>assets/js/jquery-1.8.2.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/supersized.3.2.7.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/supersized-init.js"></script>
        <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
 </body>

 <!--<SCRIPT language="JavaScript">

		alert('Ho sento, el nom d\'usuari ja existeix!');</SCRIPT> 	-->
</html>
