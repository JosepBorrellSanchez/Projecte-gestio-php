
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
	 <?php include("capçalera.php"); ?>
   <title>Login</title>
   <style>
				form
				{
					margin-left: 30%;
					}
		</style>
 </head>
<body>
    <div id="wrapper">
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
        <?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>
   <h3>Has d'entrar amb el teu usuari i contrasenya</h3>
     <label for="username">Nom d'usuari:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Paraula de pas:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <br/>
     <input type="submit" value="Login" class="btn btn-success"/>
   </form>
</div>
</body>
</html>


