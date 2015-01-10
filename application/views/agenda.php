<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestió Talleres SALO</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/jquery.datetimepicker.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="<?php echo base_url();?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Administració</a> 
            </div>
  
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="<?php echo base_url();?>assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				    </li>   
                      <li  >
                        <a class="active-menu"  href="<?php echo base_url('index.php/welcome/taula');?>"><i class="fa fa-table fa-3x"></i> Llista</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/welcome/index');?>"><i class="fa fa-square-o fa-3x"></i> Clients</a>
                    </li>
                  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
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
                                    <th>Dia i Hora</th>
                                    <th>Assumpte</th>
                                    <th>Nota</th>
                                    <th>Documents</th>
                                    <th>Accions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <!--Llisto les dades amb un for each -->
                                        <?php foreach($this->_ci_cached_vars as $index => $llistarcites){ ?>
                                        <tr>
                                        <td><?php echo $llistarcites['id_agenda']; ?></td>
                                        <td><?php echo $llistarcites['Client']; ?></td>
                                        <td><?php echo $llistarcites['DiaHora']; ?></td>
                                        <td><?php echo $llistarcites['Asumpte']; ?></td>
                                        <td><?php echo $llistarcites['Nota']; ?></td>
                                        <td><a href='<?php echo $llistarcites['Documents']; ?>'> <?php echo $llistarcites['Nom']; ?></td>
                                        <td>
                                        <a href='/recycling/index.php/welcome/carregarCites/<?php echo $llistarcites['id_agenda']; ?>'>
                                        <button type="button" class="btn btn-warning btn-sm">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        </a>
                                        <a href='/recycling/index.php/welcome/eliminarCita/<?php echo $llistarcites['id_agenda']; ?>' onclick="return confirm('Estas segur que vols eliminar aquesta cita?');">
                                        <button type="button" class="btn btn-danger btn-sm eliminar">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                        </a>
                                        <a href='/recycling/index.php/welcome/generarcita/<?php echo $llistarcites['id_agenda']; ?>'>
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
