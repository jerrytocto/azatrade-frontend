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
set_time_limit(750);
ini_set("memory_limit", "10950M");
$activepadm ="active";
$cambiaicons = "aria-expanded='true'";
$activerptemppr ="active";
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
			  <a href='rpt-procesa-empresas.php' target="_blank"><button class="btn btn-warning">Export - Procesar Empresas Nuevas </button></a> 
			  <!--<a href='rpt-procesa-valores.php' target="_blank"><button class="btn btn-primary">Export - Procesar Valores Empresas </button></a>-->
			  <a href='rpt-procesa-partidas-import.php' target="_blank"><button class="btn btn-info">Import - Procesar Empresas Nuevas </button></a> 
			  <!--<a href='rpt-procesa-partidas-import.php' target="_blank"><button class="btn btn-dark">Import - Procesar Valores Empresas </button></a>-->
		  </p>
		  
        <!-- form busqueda -->
		  <hr>
		  <div class="row">
			  <div class="col-lg-12">
			  <p align="center"><b>Busqueda de empresa</b></p>
			  </div>
		  <div class="col-lg-4"></div>
		  <div class="col-lg-4">
		  <form	class="" method="post" action="rpt-empresas.php">
			  <div class="row">
				  <div class="col-lg-9">
			  <label>Ingresa datos a buscar</label>
			  <input type="text" name="busca" id="busca" class="form-control" required>
					  </div>
				  <div class="col-lg-3"><br>
			  <center><button type="submit" name="btnsearchbd" id="btnsearchbd" class="btn btn-info btn-sm">Buscar</button></center>
					  </div>
				  </div>
			  </form>
		  </div>
		  <div class="col-lg-4"></div>
			  </div>
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Historial de Productos</h4>
    </div>

</div>
    </div>
        <!-- fin form busqueda -->
   <?php
//if(isset($_REQUEST['btnsearchbd']) and $siejecuta=="si"){
		 if(isset($_REQUEST['btnsearchbd']) ){
			 
			$busca = trim($_POST["busca"]);

		$sqlgral="SELECT
	e.idemp, 
	e.ruc, 
	e.razonsocial, 
	e.t_contribuyente, 
	e.prof_oficio, 
	e.nom_comercial, 
	e.cond_contribuyente, 
	e.estado_cont, 
	e.fe_insrcipcion, 
	e.fe_ini_actividades, 
	e.depa, 
	e.prov, 
	e.dist, 
	e.direccion, 
	e.telefono, 
	e.fax, 
	e.act_comer_exterior, 
	e.principal_ciiu, 
	e.secundario_ciiu, 
	e.nuevo_rus, 
	e.buen_contri, 
	e.age_reten, 
	e.agen_perce_vtaint, 
	e.agen_perce_comliq, 
	e.imglogo, 
	e.vfobusdserdol1, 
	e.vfobusdserdol2, 
	e.vfobusdserdol3, 
	e.vpesnet1, 
	e.vpesnet2, 
	e.vpesnet3, 
	e.precio1, 
	e.precio2, 
	e.precio3, 
	e.origen_expor, 
	e.origen_impor, 
	e.impo_vfobusdserdol1, 
	e.impo_vfobusdserdol2, 
	e.impo_vfobusdserdol3, 
	e.impo_vpesnet1, 
	e.impo_vpesnet2, 
	e.impo_vpesnet3, 
	e.impo_precio1, 
	e.impo_precio2, 
	e.impo_precio3
FROM
	empresas AS e
	WHERE e.origen_expor='SI' AND CONCAT(e.ruc,e.razonsocial) like '%$busca%'
ORDER BY
	e.razonsocial ASC";
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
<th><b> Ruc </b></th>
<th><b>Razon Social</b></th>
<th><b>Tipo Contribuyente</b></th>
<th><b>Oficio</b></th>
<th><b>Nombre Comercial</b></th>
<th><b>Condicion Contribuyente</b></th>
<th><b>Estado Contribuyente</b></th>
<th><b>Fecha Inscripcion</b></th>
<th><b>F. Ini. Actividades</b></th>
<th><b>Departamento</b></th>
<th><b>Provincia</b></th>
<th><b>Distrito</b></th>
<th><b>Direccion</b></th>
<th><b>Telefono</b></th>
<th><b>Fax</b></th>
<th><b>Actividad Comercio Exterior</b></th>
<th><b>CIIU Principal </b></th>
<th><b>CIIU Secundario </b></th>
<th><b>Nuevo RUS</b></th>
<th><b>Buen Contribuyente</b></th>
<th><b>Agente Retencion</b></th>
<th><b>Agen Perce Vtaint</b></th>
<th><b>Agen Perce Comliq</b></th>
<th><b>Logo</b></th>
<th><b>Origen Export</b></th>
<th><b>Origen Import</b></th>
<!--<th><b>Editar</b></th>-->
<!-- <th><b>Eliminar</b></th> -->
                          </tr>
                      </thead>";
		  echo"<tfoot>
                          <tr>
<th><b> # </b></th>
<th><b> Ruc </b></th>
<th><b>Razon Social</b></th>
<th><b>Tipo Contribuyente</b></th>
<th><b>Oficio</b></th>
<th><b>Nombre Comercial</b></th>
<th><b>Condicion Contribuyente</b></th>
<th><b>Estado Contribuyente</b></th>
<th><b>Fecha Inscripcion</b></th>
<th><b>F. Ini. Actividades</b></th>
<th><b>Departamento</b></th>
<th><b>Provincia</b></th>
<th><b>Distrito</b></th>
<th><b>Direccion</b></th>
<th><b>Telefono</b></th>
<th><b>Fax</b></th>
<th><b>Actividad Comercio Exterior</b></th>
<th><b>CIIU Principal </b></th>
<th><b>CIIU Secundario </b></th>
<th><b>Nuevo RUS</b></th>
<th><b>Buen Contribuyente</b></th>
<th><b>Agente Retencion</b></th>
<th><b>Agen Perce Vtaint</b></th>
<th><b>Agen Perce Comliq</b></th>
<th><b>Logo</b></th>
<th><b>Origen Export</b></th>
<th><b>Origen Import</b></th>
<!--<th><b>Editar</b></th>-->
<!-- <th><b>Eliminar</b></th> -->
                          </tr>
                      </tfoot>";
		  echo"<tbody>";
		  //while ($fila_rpt=pg_fetch_array($res_gral)) {
			  while($fila_rpt=$res_gral->fetch_array()){
	
		  $itte = $itte + 1;
		  $codi= $fila_rpt['idemp'];
		  $datonomp1= $fila_rpt['ruc'];
		  $datonomp2= $fila_rpt['razonsocial'];
		  $datonomp3= $fila_rpt['t_contribuyente'];
		  $datonomp4= $fila_rpt['prof_oficio'];
		  $datonomp5= $fila_rpt['nom_comercial'];
		  $datonomp6= $fila_rpt['cond_contribuyente'];
		  $datonomp7= $fila_rpt['estado_cont'];
		  $datonomp8= $fila_rpt['fe_insrcipcion'];
		  $datonomp9= $fila_rpt['fe_ini_actividades'];
		  $datonomp10= $fila_rpt['depa'];
				  $datonomp11= $fila_rpt['prov'];
				  $datonomp12= $fila_rpt['dist'];
				  $datonomp13= $fila_rpt['direccion'];
				  $datonomp14= $fila_rpt['telefono'];
				  $datonomp15= $fila_rpt['fax'];
				  $datonomp16= $fila_rpt['act_comer_exterior'];
				  $datonomp17= $fila_rpt['principal_ciiu'];
				  $datonomp18= $fila_rpt['secundario_ciiu'];
				  $datonomp19= $fila_rpt['nuevo_rus'];
				  $datonomp20= $fila_rpt['buen_contri'];
				  $datonomp21= $fila_rpt['age_reten'];
				  $datonomp22= $fila_rpt['agen_perce_vtaint'];
				  $datonomp23= $fila_rpt['agen_perce_comliq'];
				  
				  $datonomp24= $fila_rpt['imglogo'];
				  $datonomp25= $fila_rpt['vfobusdserdol1'];
				  $datonomp26= $fila_rpt['vfobusdserdol2'];
				  $datonomp27= $fila_rpt['vfobusdserdol3'];
				  $datonomp28= $fila_rpt['vpesnet1'];
				  $datonomp29= $fila_rpt['vpesnet2'];
				  $datonomp30= $fila_rpt['vpesnet3'];
				  $datonomp31= $fila_rpt['precio1'];
				  $datonomp32= $fila_rpt['precio2'];
				  $datonomp33= $fila_rpt['precio3'];
				  
				  $datonomp34= $fila_rpt['origen_expor'];
				  $datonomp35= $fila_rpt['origen_impor'];
				  $datonomp36= $fila_rpt['impo_vfobusdserdol1'];
				  $datonomp37= $fila_rpt['impo_vfobusdserdol2'];
				  $datonomp38= $fila_rpt['impo_vfobusdserdol3'];
				  $datonomp39= $fila_rpt['impo_vpesnet1'];
				  $datonomp40= $fila_rpt['impo_vpesnet2'];
				  $datonomp41= $fila_rpt['impo_vpesnet3'];
				  $datonomp42= $fila_rpt['impo_precio1'];
				  $datonomp43= $fila_rpt['impo_precio2'];
				  $datonomp44= $fila_rpt['impo_precio3'];
	
		  
				  if($datonomp24!=""){
			$fotoimg = "<img class='img-responsive' src='imglogos/$datonomp10' width='60px'> ";
				}else{
					  $fotoimg = "";
				  }

		echo"<tr>";
echo "<td></td>";
echo "<td>$datonomp1</td>";
echo "<td>$datonomp2</td>";
echo "<td>$datonomp3</td>";
echo "<td>$datonomp4</td>";
echo "<td>$datonomp5</td>";
echo "<td>$datonomp6</td>";
				  echo "<td>$datonomp7</td>";
				  echo "<td>$datonomp8</td>";
				  echo "<td>$datonomp9</td>";
				  echo "<td>$datonomp10</td>";
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
				  echo "<td> $datonomp21 </td>";
				  echo "<td> $datonomp22 </td>";
				  echo "<td> $datonomp23 </td>";
				  echo "<td> $fotoimg </td>";
				  /*echo "<td> $datonomp25 </td>";
				  echo "<td> $datonomp26 </td>";
				  echo "<td> $datonomp27 </td>";
				  echo "<td> $datonomp28 </td>";
				  echo "<td> $datonomp29 </td>";
				  echo "<td> $datonomp30 </td>";
				  echo "<td> $datonomp31 </td>";
				   echo "<td> $datonomp32 </td>";
				   echo "<td> $datonomp33 </td>";
				   echo "<td> $datonomp34 </td>";
				   echo "<td> $datonomp35 </td>";
				   echo "<td> $datonomp36 </td>";
				   echo "<td> $datonomp37 </td>";
				   echo "<td> $datonomp38 </td>";
				   echo "<td> $datonomp39 </td>";
				   echo "<td> $datonomp40 </td>";
				  echo "<td> $datonomp41 </td>";
				  echo "<td> $datonomp42 </td>";*/
				  echo "<td> $datonomp43 </td>";
				  echo "<td> $datonomp44 </td>";
//echo "<td><button class='btn btn-info btn-xs'> <i class='material-icons'>edit</i> </button></td>";
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
		
	}else{//fin si ambos tienen datos realiza la consulta, si no tiene datos de busqueda muestra mensaje
		echo"<div class='alert alert-warning alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>notifications</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='material-icons'>close</i>
                    </button>
                    <span data-notify='message'>Campos Vacios. Para realizar una busqueda ingrese datos en los campos de consulta.</span>
                </div>";
		}
	
		  //}
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
