<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Borrells Portada</title>
    <?php include("capçalera.php"); ?>
 <script>

function canviarEmail() {
   document.getElementById('canvimail').style.display = "block";
   document.getElementById('canvipassword').style.display = "none";
   document.getElementById('canvifoto').style.display = "none";
}
function canviarPassword() {
   document.getElementById('canvipassword').style.display = "block";
   document.getElementById('canvimail').style.display = "none";
   document.getElementById('canvifoto').style.display = "none";
}
function canviarFoto() {
   document.getElementById('canvifoto').style.display = "block";
   document.getElementById('canvipassword').style.display = "none";
   document.getElementById('canvimail').style.display = "none";
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
					<h1>L'email que jas posat ja esta en ús, intenta-ho amb un altre</h1>
                    <!-- Advanced Tables -->
                    <center>  <h3>  El teu nom d'usuari : <?echo $sesio['username'];?></h3></center>
                    <center>  <h3>  El teu nom complert: <?echo $sesio['Nomicognoms'];?></h3></center>
                    <center>  <h3>  El teu Email : <?echo $sesio['email'];?> <button onclick="canviarEmail()" class="btn btn-warning" name="modemail">Modificar</button></h3></center>
                    
                    <div id="canvimail" style="display:none">
					<? echo form_open_multipart('usuari/CanviEmail');?>
                    <center><input name="canvipasswordmail" type="password" class="password" placeholder="Paraula de pas"></center>
                    <center><input name="canviarmail" type="text" class="text" placeholder="Nou email"></center>
                    
                    <center><p><button type="submit" class="btn btn-success" name="foto">Guardar els canvis</button></p></center>
                    </form>
                    </div>
                    
                    <center> <img src="<?echo $sesio['foto']?>" class="user-image img-responsive"/><button onclick="canviarFoto()" class="btn btn-warning" name="modfoto">Canviar foto</button></center>
                    <center><button onclick="canviarPassword()" class="btn btn-warning" name="canvipassword">Canvia la paraula de pas</button></center>
                    
                    
                    <div id="canvipassword" style="display:none">
					<? echo form_open_multipart('usuari/CanviPassword');?>
					<br>
                    <center><input name="canvipassword" type="password" class="password" placeholder="Actual paraula de pas"></center>
                    <center><input name="canvipasswordnova" type="password" class="password" placeholder="Nova paraula de pas"></center>
                    <center><input name="canvipasswordnovaconf" type="password" class="password" placeholder="Confirma la nova paraula de pas"></center>
                    
                    <center><p><button type="submit" class="btn btn-success" name="foto">Guardar els canvis</button></p></center>
                    </form>
                    </div>
                    
                    <div id="canvifoto" style="display:none">
                     <? echo form_open_multipart('usuari/DoUpload');?>
					<center><label for="file"> Canvia la teva foto</label></center>
					<p>
					<center><input type="file" name="foto" value="Envia" size="50" /></p></center>
					
					<center><p><button type="submit" class="btn btn-success" name="foto">Guardar els canvis</button></p></center>
					</div>
                    <!--End Advanced Tables -->
                </div>
                <?//href="<?php echo base_url('index.php/usuari/modifica');"> Modifica les teves dades</a></h3></center>?>
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
</body>
</html>
