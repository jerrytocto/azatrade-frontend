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
$activerptacc ="active";
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
           
    <a href='buscauser.php'><p><button class="btn btn-info"><i class="material-icons">perm_identity</i> Nuevo Registro</button></p></a>
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Historial de Planes comprados a la Web de Azatrade</h4>
    </div>

</div>
    </div>
        <!-- fin form busqueda -->
   <?php
//if(isset($_REQUEST['btnsearchbd']) and $siejecuta=="si"){

		$sqlgral="SELECT
pagos_acceso.id_acceso,
pagos_acceso.id_user,
pagos_acceso.nom_user,
pagos_acceso.nombres,
pagos_acceso.monto,
pagos_acceso.tipo_pago,
pagos_acceso.fecha_pago,
pagos_acceso.modo_pago,
pagos_acceso.num_operacion,
pagos_acceso.observacion,
pagos_acceso.fe_activa,
pagos_acceso.fe_vence,
pagos_acceso.estado,
pagos_acceso.fe_registro
FROM
pagos_acceso
ORDER BY
pagos_acceso.id_acceso DESC";
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
<th><b> Nombres. </b></th>
<th><b>Usuario</b></th>
<th><b>Fecha Acti.</b></th>
<th><b>Fecha Venc.</b></th>
<th><b>Monto</b></th>
<th><b>Estado</b></th>
<th><b>Editar</b></th>
<th><b>Anular</b></th>
<th><b>Eliminar</b></th>
                          </tr>
                      </thead>";
		  echo"<tfoot>
                          <tr>
   <th><b> Nombres. </b></th>
<th><b>Usuario</b></th>
<th><b>Fecha Acti.</b></th>
<th><b>Fecha Venc.</b></th>
<th><b>Monto</b></th>
<th><b>Estado</b></th>
<th><b>Editar</b></th>
<th><b>Anular</b></th>
<th><b>Eliminar</b></th>
                          </tr>
                      </tfoot>";
		  echo"<tbody>";
		  //while ($fila_rpt=pg_fetch_array($res_gral)) {
			  while($fila_rpt=$res_gral->fetch_array()){
			  $itte = $itte + 1;
		   $codi= $fila_rpt['id_acceso'];
		   $nombres= $fila_rpt['nombres'];
		  $usa= $fila_rpt['nom_user'];
		  $f1= $fila_rpt['fe_activa'];
		  $f2= $fila_rpt['fe_vence'];
		  $pago= $fila_rpt['monto'];
		  $estado= $fila_rpt['estado'];
			  
			  if($estado=="Activo"){
      $aa="A";/*ACTIVO*/
      $msj="ACTIVO";
      $colo="btn btn-success btn-xs";
     }else if($estado=="Anulado"){
      $aa="N";/*ANULADO*/
       $msj="ANULADO";
       $colo="btn btn-warning btn-xs";
     }else if($estado=="Vencido"){
      $aa="V";/*VENCIDO*/
       $msj="VENCIDO";
       $colo="btn btn-danger btn-xs";
     }else{
      $aa="E";/*ELIMINADO*/
       $msj="ELIMINADO";
       $colo="btn btn-danger btn-xs";
     }

		echo"<tr>";
echo "<td>$nombres</td>";
echo "<td>$usa</td>";
echo "<td>$f1</td>";
echo "<td>$f2</td>";
echo "<td>$pago</td>";
echo "<td> <a data-toggle='tooltip' data-placement='top' rel='tooltip' title='$msj !'><button class='$colo'> $aa </button></a> </td>";

if($estado=="Activo"){
echo "<td><a href='form-acceso.php?log=$codi&action='><button class='btn btn-info btn-xs'> <i class='material-icons'>edit</i> </button></a></td>";
echo "<td><a onclick='return confirmar()' href='accion.php?log=$codi&action=A'><button class='btn btn-warning btn-xs'> <i class='material-icons'>clear</i> </button></a></td>";
echo "<td><a onclick='return confirmar2()' href='accion.php?log=$codi&action=E'><button class='btn btn-danger btn-xs'> <i class='material-icons'>delete_forever</i> </button></a></td>";
}
if($estado=="Anulado"){
echo "<td><button class='btn btn-info btn-xs' disabled> <i class='material-icons'>edit</i> </button></td>";
echo "<td><button class='btn btn-warning btn-xs' disabled> <i class='material-icons'>clear</i> </button></td>";
echo "<td><a onclick='return confirmar2()' href='accion.php?log=$codi&action=E'><button class='btn btn-danger btn-xs'> <span class='glyphicon glyphicon-remove'></span> </button></a></td>";
}
if($estado=="Vencido"){
echo "<td><button class='btn btn-info btn-xs' disabled> <i class='material-icons'>edit</i> </button></td>";
echo "<td><button class='btn btn-warning btn-xs' disabled> <i class='material-icons'>clear</i> </button></td>";
echo "<td><button class='btn btn-danger btn-xs' disabled> <i class='material-icons'>delete_forever</i> </button></td>";
}
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
                    <span data-notify='message'>No se encontraron datos en el historial de accesos por la compra de algun plan.</span>
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
