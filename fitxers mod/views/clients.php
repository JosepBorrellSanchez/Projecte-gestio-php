<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Borrells clients</title>
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
                        $("#CP").val(data);
                    }
                    });
                });
            });
        </script>
</head>
<body>
    <div id="wrapper">
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
        <h2><?php echo validation_errors(); ?></h2>
        <form class="form-horizontal" method="post" action="insertarclients">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="NIF"  placeholder=" N.I.F"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="CompteContable" placeholder="Compte contable"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="NomFiscal" placeholder="Nom fiscal"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="NomComercial" placeholder="Nom Comercial"/>
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
                    <input class="form-control" name="CP" id="CP" value=""/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Direccio" placeholder="Direcció"/>
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Contacte" placeholder="Contacte"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Email" placeholder="E-mail"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="TelFixe" placeholder="Telèfon Fixe"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control"  name="TelMobil" placeholder="Telèfon Mòbil"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" name="Fax" placeholder="Fax"/>
                </div>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input class="form-control" name="Observacions" placeholder="Observacions"/>
                </div>
            </div>  
        </div>
         <button type="submit" class="btn btn-primary" name="insertClients"><span class="glyphicon glyphicon-thumbs-up"></span> Acceptar</button>
        <button type="reset" class="btn btn-primary">Neteja</button>
        </form>
</div>
<script>
          $(document).ready(function() {
    $('#example').dataTable();
} );
    </script>   
</body>
</html>
