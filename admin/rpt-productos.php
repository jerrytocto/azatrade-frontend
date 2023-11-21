<?php
session_start();
if (isset($_SESSION['login_usuario'])){
	if($_SESSION['rol']<>'ADMIN'){//si no es admin
		print "<script>window.location='login/';</script>";
		//print "<script>window.location='https://www.azatrade.info/';</script>";
	}
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
		print "<script>window.location='login/';</script>";
	//print "<script>window.location='https://www.azatrade.info/';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("incBD/inibd.php");
set_time_limit(450);
$activepadm ="active";
$cambiaicons = "aria-expanded='true'";
$activerptprodu ="active";
$actibtn = "show";
$mensajeA = $_GET["by"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="../img/logo.png">
<link rel="icon" href="img/logo.png">
<?php include("title.php"); ?>

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
<link href="css/demo.css" rel="stylesheet"/>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
      
        </head>
        <body >
        <div class="wrapper">
      <?php include("menuizquierdo.php"); ?>
            <div class="main-panel">
                <!-- Navbar -->
<?php include("menusuperior.php"); ?>
<!-- End Navbar -->
                    <div class="content">
                      <div class="container-fluid">
                            <div class="row">   
      <div class="col-md-12">  
      
                 <div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
     
     <?php if($mensajeA=="ok"){ ?>
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se registro satisfactoriamente al usuario</span>
          </div>
           <?php } ?>
           
       <?php if($mensajeA=="yes"){ ?>
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se modifico el registro del usuario satisfactoriamente</span>
          </div>
           <?php } ?>
        <?php if($mensajeA=="an"){ ?>
           <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se anulo el registro de acceso al usuario satisfactoriamente</span>
          </div>
           <?php } ?>
        <?php if($mensajeA=="del"){ ?>
           <div class="alert alert-delete">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se elimino el registro de acceso al usuario satisfactoriamente</span>
          </div>
           <?php } ?>
           
    <!--<a href='form-producto.php'><p><button class="btn btn-info"><i class="material-icons">perm_identity</i> Nuevo Registro</button></p></a> -->
		  
		  <p align="center">
			  <a href='rpt-procesa-partidas.php' target="_blank"><button class="btn btn-warning">Export - Procesar Partidas Nuevas </button></a> 
			  <a href='rpt-procesa-valores.php' target="_blank"><button class="btn btn-primary">Export - Procesar Valores </button></a>
			  <a href='rpt-procesa-partidas-import.php' target="_blank"><button class="btn btn-info">Import - Procesar Partidas Nuevas </button></a> 
			  <a href='rpt-procesa-valores-import.php' target="_blank"><button class="btn btn-dark">Import - Procesar Valores </button></a>
		  </p>
		  
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Historial de Empresas</h4>
    </div>

</div>
    </div>
        <!-- fin form busqueda -->
   <?php
//if(isset($_REQUEST['btnsearchbd']) and $siejecuta=="si"){

		$sqlgral="SELECT
p.idcod,
p.partida_nandi,
p.prod_especifico,
p.prod_generico,
p.presentacion,
p.partida_desc,
p.tipo_sec,
p.sector,
p.subsector,
p.detalle_sector,
p.imgfoto,
descri_corto,
vfobusdserdol1,
vfobusdserdol2,
vfobusdserdol3,
vpesnet1,
vpesnet2,
vpesnet3,
precio1,
precio2,
precio3,
mostrar,
origen_expor,
origen_impor,
impo_vfobusdserdol1,
impo_vfobusdserdol2,
impo_vfobusdserdol3,
impo_vpesnet1,
impo_vpesnet2,
impo_vpesnet3,
impo_precio1,
impo_precio2,
impo_precio3,
cuode,
clasificacion4
FROM
productos as p
WHERE p.estado='A'
ORDER BY
p.idcod DESC";
		/*$res_gral= pg_query($conexpg,$sqlgral) or die("Error en la Consulta reporte usuarios");
	  $numReg_gral = pg_num_rows($res_gral);
	  if($numReg_gral>0){*/
		  $res_gral=$conexpg->query($sqlgral); 
if($res_gral->num_rows>0){ 
		  echo"<div class='card'>";
		  echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title badge-info'><font color='#ffffff'>..:: <b>Historial</b>  ::.. </font></h4>
            </div>";
		  echo"<div class='card-body'>
                  <div class='toolbar'>
                      <!--  Aquí puede escribir botones / acciones adicionales para la barra de herramientas  -->
                  </div>";
		  echo"<div class='material-datatables'>";
		  echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
<th><b> # </b></th>
<th><b> Partida </b></th>
<th><b>Producto Especifico</b></th>
<th><b>Presentacion</b></th>
<th><b>Partida Descripcion</b></th>
<th><b>Descripcion Corto</b></th>
<th><b>Tipo Sector</b></th>
<th><b>Sector</b></th>
<th><b>SubSector</b></th>
<th><b>Imagen</b></th>
<th><b>Export VFOBSERDOL 2021</b></th>
<th><b>Export VFOBSERDOL 2022</b></th>
<th><b>Export VFOBSERDOL 2023</b></th>
<th><b>Export Peso Neto 2021</b></th>
<th><b>Export Peso Neto 2022</b></th>
<th><b>Export Peso Neto 2023</b></th>
<th><b>Export Precio 2021</b></th>
<th><b>Export Precio 2022</b></th>
<th><b>Export Precio 2023</b></th>
<th><b>Import VFOBSERDOL 2021</b></th>
<th><b>Import VFOBSERDOL 2022</b></th>
<th><b>Import VFOBSERDOL 2023</b></th>
<th><b>Import Peso Neto 2021</b></th>
<th><b>Import Peso Neto 2022</b></th>
<th><b>Import Peso Neto 2023</b></th>
<th><b>Import Precio 2021</b></th>
<th><b>Import Precio 2022</b></th>
<th><b>Import Precio 2023</b></th>
<th><b>Origen Export</b></th>
<th><b>Origen Import</b></th>
<th><b>Web</b></th>
<th><b>CUODE</b></th>
<th><b>USO</b></th>
<th><b>Editar</b></th>
<!-- <th><b>Eliminar</b></th> -->
                          </tr>
                      </thead>";
		  echo"<tfoot>
                          <tr>
<th><b> # </b></th>
<th><b> Partida </b></th>
<th><b>Producto Especifico</b></th>
<th><b>Presentacion</b></th>
<th><b>Partida Descripcion</b></th>
<th><b>Descripcion Corto</b></th>
<th><b>Tipo Sector</b></th>
<th><b>Sector</b></th>
<th><b>SubSector</b></th>
<th><b>Imagen</b></th>
<th><b>Export VFOBSERDOL 2021</b></th>
<th><b>Export VFOBSERDOL 2022</b></th>
<th><b>Export VFOBSERDOL 2023</b></th>
<th><b>Export Peso Neto 2021</b></th>
<th><b>Export Peso Neto 2022</b></th>
<th><b>Export Peso Neto 2023</b></th>
<th><b>Export Precio 2021</b></th>
<th><b>Export Precio 2022</b></th>
<th><b>Export Precio 2023</b></th>
<th><b>Import VFOBSERDOL 2021</b></th>
<th><b>Import VFOBSERDOL 2022</b></th>
<th><b>Import VFOBSERDOL 2023</b></th>
<th><b>Import Peso Neto 2021</b></th>
<th><b>Import Peso Neto 2022</b></th>
<th><b>Import Peso Neto 2023</b></th>
<th><b>Import Precio 2021</b></th>
<th><b>Import Precio 2022</b></th>
<th><b>Import Precio 2023</b></th>
<th><b>Origen Export</b></th>
<th><b>Origen Import</b></th>
<th><b>Web</b></th>
<th><b>CUODE</b></th>
<th><b>USO</b></th>
<th><b>Editar</b></th>
<!-- <th><b>Eliminar</b></th> -->
                          </tr>
                      </tfoot>";
		  echo"<tbody>";
		  //while ($fila_rpt=pg_fetch_array($res_gral)) {
			  while($fila_rpt=$res_gral->fetch_array()){
	
		  $itte = $itte + 1;
		  $codi= $fila_rpt['idcod'];
		  $datonomp1= $fila_rpt['partida_nandi'];
		  $datonomp2= $fila_rpt['prod_especifico'];
		  $datonomp3= $fila_rpt['prod_generico'];
		  $datonomp4= $fila_rpt['presentacion'];
		  $datonomp5= $fila_rpt['partida_desc'];
		  $datonomp6= $fila_rpt['tipo_sec'];
		  $datonomp7= $fila_rpt['sector'];
		  $datonomp8= $fila_rpt['subsector'];
		  $datonomp9= $fila_rpt['detalle_sector'];
		  $datonomp10= $fila_rpt['imgfoto'];
				  
				  $datonomp10x= $fila_rpt['descri_corto'];
				  $datonomp11= $fila_rpt['vfobusdserdol1'];
				  $datonomp12= $fila_rpt['vfobusdserdol2'];
				  $datonomp13= $fila_rpt['vfobusdserdol3'];
				  $datonomp14= $fila_rpt['vpesnet1'];
				  $datonomp15= $fila_rpt['vpesnet2'];
				  $datonomp16= $fila_rpt['vpesnet3'];
				  $datonomp17= $fila_rpt['precio1'];
				  $datonomp18= $fila_rpt['precio2'];
				  $datonomp19= $fila_rpt['precio3'];
				  $datonomp20= $fila_rpt['mostrar'];
				  
				  $datonomp21= $fila_rpt['origen_expor'];
				  $datonomp22= $fila_rpt['origen_impor'];
				  $datonomp23= $fila_rpt['impo_vfobusdserdol1'];
				  $datonomp24= $fila_rpt['impo_vfobusdserdol2'];
				  $datonomp25= $fila_rpt['impo_vfobusdserdol3'];
				  $datonomp26= $fila_rpt['impo_vpesnet1'];
				  $datonomp27= $fila_rpt['impo_vpesnet2'];
				  $datonomp28= $fila_rpt['impo_vpesnet3'];
				  $datonomp29= $fila_rpt['impo_precio1'];
				  $datonomp30= $fila_rpt['impo_precio2'];
				  $datonomp31= $fila_rpt['impo_precio3'];
				  $datonomp32= $fila_rpt['cuode'];
				  $datonomp33= $fila_rpt['clasificacion4'];
	
		  
				  if($datonomp10!=""){
			$fotoimg = "<img class='img-responsive' src='imgproductos/$datonomp10' width='60px'> ";
				}else{
					  $fotoimg = "";
				  }

		echo"<tr>";
echo "<td></td>";
echo "<td>$datonomp1</td>";
echo "<td>$datonomp2</td>";
echo "<td>$datonomp4</td>";
echo "<td>$datonomp5</td>";
echo "<td>$datonomp10x</td>";
echo "<td>$datonomp6</td>";
echo "<td>$datonomp7</td>";
echo "<td>$datonomp8</td>";
echo "<td> $fotoimg </td>";
				  echo "<td> $datonomp11 </td>";
				  echo "<td> $datonomp12 </td>";
				  echo "<td> $datonomp13 </td>";
				  echo "<td> $datonomp14 </td>";
				  echo "<td> $datonomp15 </td>";
				  echo "<td> $datonomp16 </td>";
				  echo "<td> $datonomp17 </td>";
				  echo "<td> $datonomp18 </td>";
				  echo "<td> $datonomp19 </td>";
				  echo "<td> $datonomp20 </td>";
				  echo "<td> $datonomp23 </td>";
				  echo "<td> $datonomp24 </td>";
				  echo "<td> $datonomp25 </td>";
				  echo "<td> $datonomp26 </td>";
				  echo "<td> $datonomp27 </td>";
				  echo "<td> $datonomp28 </td>";
				  echo "<td> $datonomp29 </td>";
				  echo "<td> $datonomp30 </td>";
				  echo "<td> $datonomp31 </td>";
				  echo "<td> $datonomp21 </td>";
				  echo "<td> $datonomp22 </td>";
				  echo "<td> $datonomp32 </td>";
				  echo "<td> $datonomp33 </td>";
echo "<td><a href='form-producto.php?log=$codi&action=E' target='_blank'><button class='btn btn-info btn-xs'> <i class='material-icons'>edit</i> </button></a></td>";
//echo "<td><a onclick='return confirmar()' href='accion.php?log=$codi&action=A'><button class='btn btn-warning btn-xs'> <i class='material-icons'>clear</i> </button></a></td>";
//echo "<td><a onclick='return confirmar2()' href='accion.php?log=$codi&action=E'><button class='btn btn-danger btn-xs'> <i class='material-icons'>delete_forever</i> </button></a></td>";

		echo"</tr>";  
		  }
		  echo"</tbody>";
		  echo"</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  
	  }else{//si no encuentra datos en la busqueda muestra mensaje
echo"<div class='alert alert-danger alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>notifications</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='material-icons'>close</i>
                    </button>
                    <span data-notify='message'>No se encontraron datos al mostrar.</span>
                </div>";
	  }
		
	/*}else{//fin si ambos tienen datos realiza la consulta, si no tiene datos de busqueda muestra mensaje
		echo"<div class='alert alert-warning alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>notifications</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='material-icons'>close</i>
                    </button>
                    <span data-notify='message'>Campos Vacios. Para realizar una busqueda ingrese datos en los campos de consulta.</span>
                </div>";
		}*/
	
		 // }
		  ?>
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->

                      </div>
                    </div>
   
                    <?php include("footer.php"); ?>

            </div>
        </div>
    </body>

<?php include("js.php"); ?>

<!-- mensaje de anulacion de registro -->
<script>
function confirmar()
{
	if(confirm('¿Estas seguro que desea ANULAR registro?'))
		return true;
	else
		return false;
}
</script>

<!-- mensaje de anulacion de registro -->
<script>
function confirmar2()
{
	if(confirm('¿Estas seguro que desea ELIMINAR registro?'))
		return true;
	else
		return false;
}
</script>

<script type="text/javascript" src="js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.print.min.js"></script>
    
<script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable({
		"order": [[ 3, "desc" ]],
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Buscar resultados",
        }

    });


    var table = $('#datatables').DataTable();

    // Edit record
    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
    });

    //Like record
    table.on('click', '.like', function() {
        alert('You clicked on Like button');
    });

    $('.card .material-datatables label').addClass('form-group');
});

</script>
<script>
	$(function(){
    $(".click").click(function(e) {
        e.preventDefault();
        var data = $(this).attr("data-valor");
        //alert(data);    
		var pasa1 = document.getElementById("idfilpart").value = data;
    });
});
</script>

  
<?php //cerrando conexion
	mysqli_close($conexpg); ?>
</html>
