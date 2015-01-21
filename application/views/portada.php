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
						Allavons si pot ser al fer clic mostrar en taula les cites d'aquell dia. -->
						
						
                    <p class="main-text"><?php echo sizeof($this->_ci_cached_vars['cites'])." cites programades per avui" ?></p>
                    <?//php echo sizeof($this->_ci_cached_vars['cites'])?>
                    <p class="text-muted">Avui</p>
                </div>
             </div>
		     </div>
            <div id="page-inner">
                
                 <!-- /. ROW  -->
             
              
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Agenda
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                   <thead>
                                    <tr>
                                    <th>id</th>
                                    <th>Client</th>
                                    <th>Assumpte</th>
                                    <th>Nota</th>
                                    <th>Accions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <!--Llisto les dades amb un for each -->
                                        <?//php $contador = 0;?>
                                        <?php foreach($this->_ci_cached_vars['cites'] as $index => $cita){ ?>
                                        <?//php $contador = $contador+1 ?>
                                        <tr>
                                        <td><?php echo $cita['id_agenda']; ?></td>
                                        <td><?php echo $cita['Nomfiscal']; ?></td>
                                        <td><?php echo $cita['Asumpte']; ?></td>
                                        <td><?php echo $cita['Nota']; ?></td>
                                        <td>
                                        <a href='/recycling/index.php/welcome/carregarCites/<?php echo $cita['id_agenda']; ?>'>
                                        <button type="button" class="btn btn-warning btn-sm">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        </a>
                                        <a href='/recycling/index.php/welcome/eliminarCita/<?php echo $cita['id_agenda']; ?>' onclick="return confirm('Estas segur que vols eliminar aquesta cita?');">
                                        <button type="button" class="btn btn-danger btn-sm eliminar">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                        </a>
                                        <a href='/recycling/index.php/welcome/generarcita/<?php echo $cita['id_agenda']; ?>'>
                                        <button type="button" class="btn btn-info btn-sm">
                                        <span class="glyphicon glyphicon-book"></span>
                                        </button>
                                        </a>
                                        </td>
                                        </tr>
                                        <?php } ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.datetimepicker.js"></script>
     <!--Plugin per al desplegable de data i hora -->
   
</body>
</html>

<!-- <div id="wrapper">
         /. NAV SIDE  
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
						Allavons si pot ser al fer clic mostrar en taula les cites d'aquell dia.
						
						
                    <p class="main-text">240 Visites programades</p>
                    <p class="text-muted">Avui</p>
                </div>
             </div>
		     </div> -->
