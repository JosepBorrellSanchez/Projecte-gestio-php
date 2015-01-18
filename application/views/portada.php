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
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
        <h2><?php echo validation_errors(); ?></h2>
        
			<div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
					
					<!-- Avore aixo hem de fer que agafe totes les cites de la taula agenda
						i que compare en la funcio echo "Today is " . date("Y/m/d") . "<br>";
						allavons si concidix lo dia de la cita en lo dia d'avui que sume 1 a un contador
						i lo que mostrarem aqui sera lo total de este contador. 
						Allavons si pot ser al fer clic mostrar en taula les cites d'aquell dia.-->
						
						
                    <p class="main-text">240 Visites programades</p>
                    <p class="text-muted">Avui</p>
                </div>
             </div>
		     </div>
</div>
</body>
</html>
