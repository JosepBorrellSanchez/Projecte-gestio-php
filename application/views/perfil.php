<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Borrells Portada</title>
    <?php include("capçalera.php"); ?>
 <script>
 function mostrarDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
}
function canviarEmail() {
   document.getElementById('canvimailpassword').style.display = "block";
   document.getElementById('canvimail').style.display = "block";
}
function canviarPassword() {
   document.getElementById('canvipassword').style.display = "block";
   document.getElementById('canvipasswordnova').style.display = "block";
   document.getElementById('canvipasswordnovaconf').style.display = "block";
}
</script>
</head>


<body>
    <div id="wrapper">
        <div id="page-wrapper" >
			<h2><?php echo validation_errors(); ?></h2>
        
			
            <div id="page-inner">
                
                 
             
              
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <center>  <h3>  El teu nom d'usuari : <?echo $sesio['username'];?></h3></center>
                    <center>  <h3>  El teu nom complert: <?echo $sesio['Nomicognoms'];?></h3></center>
                    <center>  <h3>  El teu Email : <?echo $sesio['email'];?> <button onclick="canviarEmail()" class="btn btn-warning" name="modemail">Modificar</button></h3></center>
                    <center><input id="canvimailpassword" type="password" name="password" class="password" placeholder="Paraula de pas" style="display:none"></center>
                    <center><input id="canvimail" type="password" name="email" class="text" placeholder="Nou email" style="display:none"></center>
                    <center> <img src="<?echo $sesio['foto']?>" class="user-image img-responsive"/></center>
                    <center><button onclick="canviarPassword()" class="btn btn-warning" name="canvipassword">Canvia la paraula de pas</button></center>
                    
                    <center><input id="canvipassword" name="canvipassword" placeholder="Actual paraula de pas" style="display:none"></center>
                    <center><input id="canvipasswordnova" name="canvipasswordnova" placeholder="Nova paraula de pas" style="display:none"></center>
                    <center><input id="canvipasswordnovaconf" name="canvipasswordnovaconf" placeholder="Confirma la nova paraula de pas" style="display:none"></center>
                    
                     <? echo form_open_multipart('usuari/DoUpload');?>
					<center><label for="file"> Canvia la teva foto</label></center>
					<p>
					<center><input type="file" name="foto" value="Envia" size="50" /></p></center>
					
					<center><p><button type="submit" class="btn btn-success" name="foto">Acceptar</button></p></center>
                    <!--End Advanced Tables -->
                </div>
                <?//href="<?php echo base_url('index.php/usuari/modifica');"> Modifica les teves dades</a></h3></center>?>
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
</body>
</html>
