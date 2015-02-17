<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Borrells mod clients</title>
    <?php include("capçalera.php"); ?>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

        
        <script type="text/javascript">
        
        
            $(document).ready(function() {
                $("#provincias").change(function(){
                    $.ajax({
                    url:"<?php echo base_url();?>index.php/welcome/buildDropCities",    
                    data: {id: $(this).val()},
                    type: "POST",
                    success: function(data){
                        $("#cityDrp").html(data);
                    }
                    });
                });
            });
            
            $(document).ready(function() { 
                $("#cityDrp").change(function(){
                    $.ajax({
                    url:"<?php echo base_url();?>index.php/welcome/carregarCP",    
                    data: {idpoblacio: $(this).val()},
                    type: "POST",
                    success: function(data){
                        $("#codipostal").val(data);
                    }
                    });
                });
            });
        </script>
 
</head>
<body>
    <div id="wrapper">
        <div id="page-wrapper" >
        <h2><?php echo validation_errors(); ?></h2>
        <form class="form-horizontal" method="post" action=<?echo"../updateClients/".$clients->Codi;?>>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Codi" id="Codi" value=<?php echo $clients->Codi;?> readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="NIF"  placeholder=" N.I.F" value=<?php echo $clients->NIF;?>>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="CompteContable" placeholder="Compte contable" value=<?php echo $clients->Comptecontable;?>>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="NomFiscal" placeholder="Nom fiscal" value='<?php echo $clients->Nomfiscal;?>'>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="NomComercial" placeholder="Nom Comercial" value='<?php echo $clients->Nomcomercial;?>'>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Poblacio" placeholder="Població" value='<?php echo "Ciutat actual:  ".$clients->poblacion;?>' readonly>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                     <input class="form-control" name="provincia" placeholder="Provincia" value='<?php echo "Provincia actual:  ".$clients->Provincia;?>' readonly> 
                </div>
            </div>
        </div>    
        <div class="row">    
            <div class="col-md-2">
                <div class="form-group">
                    <?php
                    //desplegable provincias
                    echo form_dropdown('provincias', $provincias, 'Escoge una provincia', 'id="provincias"');
                    //campo de texto postal?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select name="cityDrp" id="cityDrp">
                        <option value="">Select</option>
                    </select>
                </div>
            </div>
            
            
             <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="codipostal" id ="codipostal" placeholder="Codi Postal" value='<?php echo $clients->CodiPostal;?>'readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Direccio" placeholder="Direcció" value='<?php echo $clients->Direccio;?>'>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Contacte" placeholder="Contacte" value='<?php echo $clients->Contacte;?>'>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Email" placeholder="E-mail" value=<?php echo $clients->Email;?>>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="TelFixe" placeholder="Telefon Fixe" value=<?php echo $clients->Telfixe;?>>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control"  name="TelMobil" placeholder="Telefon Mòbil" value=<?php echo $clients->Telmobil;?>>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Fax" placeholder="Fax" value=<?php echo $clients->Fax;?>>
                </div>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input class="form-control" name="Observacions" placeholder="Observacions" value='<?php echo $clients->Observacions;?>'>
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

