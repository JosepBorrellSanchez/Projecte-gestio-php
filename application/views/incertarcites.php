<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
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
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
                        <a href="<?php echo base_url('index.php/welcome/index');?>"><i class="fa fa-table fa-3x"></i> Clients</a>
                    </li>
                  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                
             <h2><?php echo validation_errors(); ?></h2>
        <form class="form-horizontal" method="post" action="welcome/insertarcites">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Client"  placeholder="Client">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="DiaHora"  id="datetimepicker">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Asumpte" placeholder="Asumpte"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Nota" placeholder="Nota"/>
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
