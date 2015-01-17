<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Borrells modificar agenda</title>
    <?php include("capçalera.php"); ?>
    <link href="<?php echo base_url();?>assets/css/jquery.datetimepicker.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <div id="page-wrapper" >
            <div id="page-inner">
                
             <h2><?php echo validation_errors(); ?></h2>

        <form class="form-horizontal" method="post" action=<? echo"../updateCites/".$id_agenda;?>>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Client" value=<?php echo $Nomfiscal;?> readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="DiaHora" id="datetimepicker" value='<?php echo $DiaHora;?>'> 
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Asumpte" placeholder="Asumpte" value='<?php echo $Asumpte;?>'>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Nota" placeholder="Nota" value='<?php echo $Nota;?>'>
                </div>
            </div>
        </div>
         <button type="submit" class="btn btn-primary" name="insertarcites"><span class="glyphicon glyphicon-thumbs-up"></span> Acceptar</button>
        <button type="reset" class="btn btn-primary">Neteja</button>
        </form>
          
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
<script type="text/javascript">
// Script per a les dates i hores
$('#datetimepicker').datetimepicker()
.datetimepicker({value:'Dia Hora',step:10});
$('#datetimepicker_mask').datetimepicker({
// mask:'9999/19/39 29:59'
mask:'39/19/9999 29:59'
});
</script> 
   
</body>
</html>
