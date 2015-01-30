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
        <script type="text/javascript" src="form.js"></script>
 </head>
 <body>
   <div class="page-container">
            <h1>Registre</h1>
            <?php echo validation_errors(); ?>
			<?php echo form_open('registre/registration', array('onsubmit' => 'return validar(this);'));  ?>
			<onsubmit="return validar(this);"
                <input type="text" name="username" class="username" placeholder="Nom d'usuari" onBlur="revisar(this);"/>
                <input type="password" name="password" class="password" placeholder="Paraula de pas" onBlur="revisar(this);"/>
                <input type="password" name="con_password" class="con_password" placeholder="Confirma la paraula de pas" onBlur="revisar(this);"/>
                <input type="text" name="nomicognoms" class="nomicognoms" placeholder="Nom i cognoms" onBlur="revisar(this);"/>
                <input type="text" name="email" class="email" placeholder="Email" onBlur="revisar(this);"/>
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
</html>
