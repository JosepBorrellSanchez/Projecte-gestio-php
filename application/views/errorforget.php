<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/reset.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/supersized.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
 </head>
 <body>
   <div class="page-container">
            <?php echo validation_errors(); ?>
            <h1>Hola.</h1>
            <br>
            <br>
            <br>
			<h1> El seu email no està registrat a la nostra base de dades, segur que l'ha escrit correctament? </h1> 
			<br>
			<br>
			<br>
			<h1> Torna enrere <a href="<?php echo base_url('index.php/usuari/forget')?>";>aquí</a></h1>

        <!-- Javascript -->
        <script src="<?php echo base_url();?>assets/js/jquery-1.8.2.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/supersized.3.2.7.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/supersized-init.js"></script>
        <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
 </body>
</html>
