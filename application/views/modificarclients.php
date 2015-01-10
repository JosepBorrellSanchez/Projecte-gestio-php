﻿<!DOCTYPE html>
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
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

        
        <script type="text/javascript">
        
        
            $(document).ready(function() { 

                        //$("#hola").val("vv");
                
                $("#provincias").change(function(){
                   
                  
                    $.ajax({
                    url:"http://localhost/recycling/index.php/welcome/buildDropCities",    
                    data: {id: $(this).val()},
                    type: "POST",
                    success: function(data){
                        
                        $("#cityDrp").html(data);
                    }
                    
                    });
               
                });

            });
            
            $(document).ready(function() { 

                        //$("#hola").val("vv");
                
                $("#cityDrp").change(function(){
                   
                  
                    $.ajax({
                    url:"http://localhost/recycling/index.php/welcome/carregarCP",    
                    data: {idpoblacio: $(this).val()},
                    type: "POST",
                    success: function(data){
                        
                        $("#CP").val(data);
                    }
                    
                    });
               
                });

            });
            
        </script>
 
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
                      <li  >
                        <a href="<?php echo base_url('index.php/welcome/taula');?>"><i class="fa fa-table fa-3x"></i> Llista</a>
                    </li>
                   
                  <li  >
                        <a class="active-menu"  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Clients</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
        <h2><?php echo validation_errors(); ?></h2>
        <form class="form-horizontal" method="post" action=<?echo"../updateClients/".$Codi;?>>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Codi" id="Codi" value=<?php echo $Codi;?> readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="NIF"  placeholder=" N.I.F" value=<?php echo $NIF;?>>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="CompteContable" placeholder="Compte contable" value=<?php echo $Comptecontable;?>>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="NomFiscal" placeholder="Nom fiscal" value=<?php echo $Nomfiscal;?>>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="NomComercial" placeholder="Nom Comercial" value=<?php echo $Nomcomercial;?>>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Poblacio" placeholder="Població" value=<?php echo $poblacion;?>>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                     <input class="form-control" name="provincia" placeholder="Provincia" value=<?php echo $Provincia;?>> 
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="codipostal" placeholder="Codi Postal" value=<?php echo $CodiPostal;?>>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Direccio" placeholder="Direcció" value=<?php echo $Direccio;?>>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Contacte" placeholder="Contacte" value=<?php echo $Contacte;?>>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Email" placeholder="E-mail" value=<?php echo $Email;?>>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="TelFixe" placeholder="Telefon Fixe" value=<?php echo $Telfixe;?>>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control"  name="TelMobil" placeholder="Telefon Mòbil" value=<?php echo $Telmobil;?>>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Fax" placeholder="Fax" value=<?php echo $Fax;?>>
                </div>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input class="form-control" name="Observacions" placeholder="Observacions" value=<?php echo $Observacions;?>>
                </div>
            </div>  
        </div>
        
         <button type="submit" class="btn btn-primary" name="updateClients"><span class="glyphicon glyphicon-thumbs-up"></span> Acceptar</button>
        </form>
  


</div>
     <!-- /. WRAPPER  -->
     <!-- JQUERY SCRIPTS -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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

