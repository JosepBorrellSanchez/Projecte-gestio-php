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
    <link href="<?php echo base_url();?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- Data tables-->


   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
  <link href="//cdn.datatables.net/plug-ins/28e7751dbec/i18n/Catalan.json" rel="stylesheet">
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.js');?>"></script>
    
 
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
                      <li  >
                        <a href="<?php echo base_url('index.php/welcome/taula');?>"><i class="fa fa-table fa-3x"></i> Llista</a>
                    </li>
                   
                  <li  >
                        <a class="active-menu"  href="<?php echo base_url('index.php/welcome/index');?>"><i class="fa fa-square-o fa-3x"></i> Clients</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
        <h2><?php echo validation_errors(); ?></h2>
 <? echo form_open_multipart('welcome/do_upload_multiple');?>
        
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
        <div class="col-md-3">
                <div class="form-group">
                    <input type="file" name="archivo[]" multiple="multiple"/>
                </div>
            </div>
    </div>
         <button type="submit" class="btn btn-primary" name="do_upload_multiple"><span class="glyphicon glyphicon-thumbs-up"></span> Acceptar</button>
        <button type="reset" class="btn btn-primary">Neteja</button>
        <?php echo form_close();?>
        <?php if($this->session->flashdata('success_upload'));?>
            <div> 
            <?php echo $this->session->flashdata('success_upload');?>
  


</div>
    



     <!-- /. WRAPPER  -->
     <!-- JQUERY SCRIPTS -->
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="  http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>
  
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="<?php echo base_url();?>assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>

<!-- DataTables -->


<script>
          $(document).ready(function() {
    $('#example').dataTable();
} );

    </script>
    
   
</body>
</html>
