<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Borrells agenda</title>
    <?php include("capçalera.php"); ?>
</head>
<body>
    <div id="wrapper">
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
                                    <th>Accions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <!--Llisto les dades amb un for each -->
                                        <?php foreach($this->_ci_cached_vars as $index => $llistarcites){ ?>
                                        <tr>
                                        <td><?php echo $llistarcites['id_agenda']; ?></td>
                                        <td><?php echo $llistarcites['Nomfiscal']; ?></td>
                                        <td><?php echo $llistarcites['DiaHora']; ?></td>
                                        <td><?php echo $llistarcites['Asumpte']; ?></td>
                                        <td><?php echo $llistarcites['Nota']; ?></td>
                                        <td>
                                        <a href='<?php echo base_url();?>index.php/welcome/carregarCites/<?php echo $llistarcites['id_agenda']; ?>'>
                                        <button type="button" class="btn btn-warning btn-sm">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        </a>
                                        <a href='<?php echo base_url();?>index.php/welcome/eliminarCita/<?php echo $llistarcites['id_agenda']; ?>' onclick="return confirm('Estas segur que vols eliminar aquesta cita?');">
                                        <button type="button" class="btn btn-danger btn-sm eliminar">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                        </a>
                                        <a href='<?php echo base_url();?>index.php/welcome/generarcita/<?php echo $llistarcites['id_agenda']; ?>'>
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
