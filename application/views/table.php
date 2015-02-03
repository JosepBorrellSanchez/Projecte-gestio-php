<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Borrells Insertar</title>
    <?php include("capçalera.php"); ?>
    
    <!-- table tools -->	
<script type="text/javascript">
$(document).ready( function () {
var oTable = $('#1').dataTable( {
"sScrollY": "300px",
"sScrollX": "100%",
"sScrollXInner": "100%",
"bScrollCollapse": true,
"bPaginate": true,
"sDom":'TCRlfrtip',
"oTableTools": {
"sSwfPath": "<?php echo base_url('assets/media/swf/copy_csv_xls_pdf.swf');?>"
}
} );
new FixedColumns( oTable );
});
</script>

<!--Table Tools-->
<script type="text/javascript" charset="utf-8" src="<?php echo base_url('assets/media/js/ZeroClipboard.js')?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url('assets/media/js/TableTools.js')?>"></script>
<style type="text/css" title="currentStyle">
@import "<?php echo base_url('assets/media/css/TableTools.css');?>";
@import "<?php echo base_url('assets/media/css/TableTools_JUI.css');?>";
</style>
<!-- colreorder-->
<script type="text/javascript" charset="utf-8" src="<?php echo base_url() ?>assets/media/js/ColReorder.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url() ?>assets/media/css/ColReorder.css"></script>
<!-- fixed header -->
<script type="text/javascript" charset="utf-8" src="<?php echo base_url() ?>assets/media/js/FixedHeader.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url() ?>assets/media/js/FixedHeader.min.js"></script>
<!-- colvis -->
<script type="text/javascript" charset="utf-8" src="<?php echo base_url() ?>assets/media/js/ColVis.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url() ?>assets/media/js/ColVis.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url() ?>/assets/media/css/ColVis.css"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url() ?>/assets/media/css/ColVisAlt.css"></script>
<!-- fixed columns-->
<script type="text/javascript" charset="utf-8" src="<?php echo base_url() ?>assets/media/js/FixedColumns.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url() ?>assets/media/js/FixedColumns.min.js"></script>
</head>
<body>
	
    <div id="wrapper">
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                
                 <!-- /. ROW  -->
                
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Llista de Clients
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="1">
									<a href="afegir"><button class="btn btn-success" type="button">Afegir un nou client</button></a>
                                   <thead>
<tr>
<th>Codi</th>
<th>Compte Contable</th>
<th>Nom Fiscal</th>
<th>Nom Comercial</th>
<th>NIF</th>
<th>Població</th>
<th>Provincia</th>
<th>CP</th>
<th>Direcció</th>
<th>Contacte</th>
<th>Telèfon Fixe</th>
<th>Accions</th>
</tr>
</thead>
<tbody>
<!--Llisto les dades amb un for each -->
<?php foreach($this->_ci_cached_vars as $index => $llistarclients){ ?>
<tr>
<td><?php echo $llistarclients['Codi']; ?></td>
<td><?php echo $llistarclients['Comptecontable']; ?></td>
<td><?php echo $llistarclients['Nomfiscal']; ?></td>
<td><?php echo $llistarclients['Nomcomercial']; ?></td>
<td><?php echo $llistarclients['NIF']; ?></td>
<td><?php echo $llistarclients['poblacion']; ?></td>
<td><?php echo $llistarclients['Provincia']; ?></td>
<td><?php echo $llistarclients['CodiPostal']; ?></td>
<td><?php echo $llistarclients['Direccio']; ?></td>
<td><?php echo $llistarclients['Contacte']; ?></td>
<td><?php echo $llistarclients['Telfixe']; ?></td>
<td>

<a href='<?php echo base_url();?>index.php/welcome/carregarClients/<?php echo $llistarclients['Codi']; ?>'>
<button type="button" class="btn btn-warning btn-sm">
<span class="glyphicon glyphicon-pencil"></span>
</button>
</a>
<a href='<?php echo base_url();?>index.php/welcome/EliminarClients/<?php echo $llistarclients['Codi']; ?>' onclick="return confirm('Estas segur que vols eliminar aquest client?');">
<button type="button" class="btn btn-danger btn-sm eliminar">
<span class="glyphicon glyphicon-remove"></span>
</button>
</a>
<a href='<?php echo base_url();?>index.php/welcome/agenda/<?php echo $llistarclients['Codi']; ?>'>
<button type="button" class="btn btn-primary btn-sm eliminar">
<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
</button>
</a>
<a href='<?php echo base_url();?>index.php/welcome/insertavisita/<?php echo $llistarclients['Codi']; ?>'>
<button type="button" class="btn btn-success btn-sm eliminar">
<span class="glyphicon glyphicon-plus "></span>
</button>
</a>
<a href='<?php echo base_url();?>index.php/welcome/generar/<?php echo $llistarclients['Codi']; ?>'>
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
            </div>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
   
</body>
</html>
