<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Borrells Portada</title>
    <?php include("capçalera.php"); ?>
 
</head>


<body>
    <div id="wrapper">
        <div id="page-wrapper" >
			<h2><?php echo validation_errors(); ?></h2>
        
			
            <div id="page-inner">
                
                 
             
              
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <center>  <h2>  El teu nom d'usuari : <?echo $sesio['username'];?></h2></center>
                    <center>  <h2>  El teu nom complert: <?echo $sesio['Nomicognoms'];?></h2></center>
                    <center>  <h2>  El teu Email : <?echo $sesio['email'];?></h2></center>
                    <center> <img src="<?echo $sesio['foto']?>" class="user-image img-responsive"/></center>
                     <? echo form_open_multipart('usuari/DoUpload');?>
					<center><label for="file"> Canvia la teva foto</label></center>
					<p>
					<center><input type="file" name="foto" value="Envia" size="50" /></p></center>
					<center><p><button type="submit" class="btn btn-success" name="foto">Acceptar</button></p></center>
                    <!--End Advanced Tables -->
                </div>
                <center><h3><a href="<?php echo base_url('index.php/usuari/modifica');?>"> Modifica les teves dades</a></h3></center>
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
</body>
</html>
