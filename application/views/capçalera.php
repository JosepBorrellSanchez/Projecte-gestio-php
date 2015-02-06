<?$this->load->helper('url'); ?>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
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
	<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <link href="//cdn.datatables.net/plug-ins/28e7751dbec/i18n/Catalan.json" rel="stylesheet">
     <!-- TABLE STYLES-->
    <link href="<?php echo base_url();?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    
    
<div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url()?>";>Administració</a> 
            </div>
            
			
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">
<?$nom = $this->session->userdata('logged_in');
			$noom = $nom['username'];
			echo "Benvingut senyor ".$noom;
			?>
 <a href="<?php echo base_url('index.php/welcome/logout')?>" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
           <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                     <img src="<?php echo base_url();?>assets/img/logo.png" class="user-image img-responsive"/>
					</li>	
					
					<? $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
					<?
						switch ($actual_link) {
							
							
							
						case "http://localhost/recycling/index.php/welcome/index":?>
					
					<li>
                        <a class="active-menu"  href="<?php echo base_url('index.php');?>"><i class="fa fa-desktop fa-3x"></i> Portada</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/welcome/taula');?>"><i class="fa fa-table fa-3x"></i> Llista</a>
                    </li>
                    <? break; ?>
                    
                    <?
                    case "http://localhost/recycling/index.php/welcome/index/":?>
					
					<li>
                        <a class="active-menu"  href="<?php echo base_url('index.php');?>"><i class="fa fa-desktop fa-3x"></i> Portada</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/welcome/taula');?>"><i class="fa fa-table fa-3x"></i> Llista</a>
                    </li>
                    <? break; ?>
                    
                    <? case "http://localhost/recycling/index.php/welcome/taula":?>
					
					<li>
                        <a href="<?php echo base_url('index.php');?>"><i class="fa fa-desktop fa-3x"></i> Portada</a>
                    </li>
                    <li>
                        <a class="active-menu" href="<?php echo base_url('index.php/welcome/taula');?>"><i class="fa fa-table fa-3x"></i> Llista</a>
                    </li>
                    <? break; ?>
                    
                    <? case "http://localhost/recycling/index.php":?>
					
					<li>
                        <a class="active-menu" href="<?php echo base_url('index.php');?>"><i class="fa fa-desktop fa-3x"></i> Portada</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/welcome/taula');?>"><i class="fa fa-table fa-3x"></i> Llista</a>
                    </li>
                    <? break; ?>
                    
                    <? case "http://localhost/recycling/index.php/":?>
					
					<li>
                        <a class="active-menu" href="<?php echo base_url('index.php');?>"><i class="fa fa-desktop fa-3x"></i> Portada</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/welcome/taula');?>"><i class="fa fa-table fa-3x"></i> Llista</a>
                    </li>
                    <? break; ?>
                    
                    <? case "http://localhost/recycling":?>
					
					<li>
                        <a class="active-menu" href="<?php echo base_url('index.php');?>"><i class="fa fa-desktop fa-3x"></i> Portada</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/welcome/taula');?>"><i class="fa fa-table fa-3x"></i> Llista</a>
                    </li>
                    <? break; ?>
                    
                    <? case "http://localhost/recycling/":?>
					
					<li>
                        <a class="active-menu" href="<?php echo base_url('index.php');?>"><i class="fa fa-desktop fa-3x"></i> Portada</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/welcome/taula');?>"><i class="fa fa-table fa-3x"></i> Llista</a>
                    </li>
                    <? break; ?>
                    
                    
					<? default : ?>
					<li>
                        <a href="<?php echo base_url('index.php');?>"><i class="fa fa-desktop fa-3x"></i> Portada</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/welcome/taula');?>"><i class="fa fa-table fa-3x"></i> Llista</a>
                    </li>
					<?} ?>
                </ul>
            </div>          
        </nav>  
        <!-- /. NAV SIDE  -->	
        
        
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.js');?>"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/morris/morris.js"></script>
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>				
    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables/dataTables.bootstrap.js"></script>
