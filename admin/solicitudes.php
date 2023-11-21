<?php
session_start();
if (isset($_SESSION['login_usuario'])){
	if($_SESSION['rol']<>'ADMIN'){//si no es admin
		//print "<script>window.location='https://www.azatrade.info/';</script>";
		print "<script>window.location='./';</script>";
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
$activesol ="active";
$actibtn = "show";
$mensajeA = $_GET["var"];
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
      <style> 
textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
</style>
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
              <b> Mensaje - </b> Se respondio la solicitud al usuario satisfactoriamente</span>
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
           <div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Mensaje</strong> Se elimino el registro correctamente.
</div>
           <?php } ?>
           
    <!--<a href='buscauser.php'><p><button class="btn btn-info"><i class="material-icons">perm_identity</i> Nuevo Registro</button></p></a>-->
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Historial de Solicitudes</h4>
    </div>

</div>
    </div>
        <!-- fin form busqueda -->
   <?php
//if(isset($_REQUEST['btnsearchbd']) and $siejecuta=="si"){

		$sqlgral="SELECT s.idsoli, s.asunto, s.detalle, s.fechareg, s.atendido, s.estado, s.archivo, s.respuesta, s.fecharespu, s.origendata, u.nombre, u.apellido, u.mail 
FROM solicitudes AS s 
	INNER JOIN usuario AS u ON s.idusu = u.codusuario 
WHERE s.estado = 'A' 
ORDER BY s.idsoli DESC";
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
              <h4 class='card-title badge-info'><font color='#ffffff'>..:: <b>Solicitudes</b>  ::.. </font></h4>
            </div>";
		  echo"<div class='card-body'>
                  <div class='toolbar'>
                      <!--  Aquí puede escribir botones / acciones adicionales para la barra de herramientas  -->
                  </div>";
		  echo"<div class='material-datatables'>";
		  echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
<th><b> Nº </b></th>
<th><b> Solicitud </b></th>
<th><b>Usuario</b></th>
<th><b>Correo</b></th>
<th><b>Fecha Reg.</b></th>
<th><b>Asunto</b></th>
<th><b>Detalle</b></th>
<th><b>Estado</b></th>
<th><b>Responder</b></th>
<th><b>Eliminar</b></th>
                          </tr>
                      </thead>";
		  echo"<tfoot>
                          <tr>
<th><b> Nº </b></th>
<th><b> Solicitud </b></th>
<th><b>Usuario</b></th>
<th><b>Correo</b></th>
<th><b>Fecha Reg.</b></th>
<th><b>Asunto</b></th>
<th><b>Detalle</b></th>
<th><b>Estado</b></th>
<th><b>Responder</b></th>
<th><b>Eliminar</b></th>
                          </tr>
                      </tfoot>";
		  echo"<tbody>";
		  //while ($fila_rpt=pg_fetch_array($res_gral)) {
			  while($fila_rpt=$res_gral->fetch_array()){
			  $itte = $itte + 1;
		  $codi = $fila_rpt['idsoli'];
		  $varfe1 = $fila_rpt['asunto'];
		  $varfe2 = $fila_rpt['detalle'];
		  $varfe3 = $fila_rpt['fechareg'];
		  $varfe4 = $fila_rpt['atendido'];
		  $varfe5 = $fila_rpt['origendata'];
		  $varfe6 = $fila_rpt['nombre'].' '.$fila_rpt['apellido'];
		  $varfe7 = $fila_rpt['mail'];
				  
				  $varfe8 = $fila_rpt['archivo'];
				  $varfe9 = trim($fila_rpt['respuesta']);
				  
				  if($varfe5=="Expo"){ $tori = "Exportacion"; }else{ $tori = "Importacion"; }
				  if($varfe4=="P"){ $teste = "<span class='badge badge-info'>Pendiente</span>"; }else{ $teste = "<span class='badge badge-success'>Atendido</span>"; }
				  
				  if($varfe8!=""){
					  $archipdf = "<p><b>Archivo Adjunto:</b> $varfe8</p>";
					  $obliar = "";
				  }else{
					  $archipdf = "";
					  $obliar = "required";
				  }
				  

		echo"<tr>";
echo "<td>$itte</td>";
echo "<td>$tori</td>";
echo "<td>$varfe6</td>";
echo "<td>$varfe7</td>";
echo "<td>$varfe3</td>";
echo "<td>$varfe1</td>";
echo "<td><a href='' data-toggle='modal' data-target='#modal-primaryD$itte'>Ver <i class='material-icons'>search</i></a></td>";
echo "<td>$teste</td>";
echo "<td><button class='btn btn-info btn-xs' data-toggle='modal' data-target='#myModalsoliedit$itte'> <i class='material-icons'>edit</i> </button></td>";
echo "<td><a onclick='return confirmar2()' href='eliminarsoli.php?log=$codi&action=E'><button class='btn btn-danger btn-xs'> <i class='material-icons'>delete_forever</i> </button></a></td>";
		echo"</tr>";  
				  
				  ?>
				  
				  <div class='modal fade modal-mini modal-primary' id='modal-primaryD<?=$itte;?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                               <h4 class="modal-title">Detalle</h4>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p><?=$varfe2;?></p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>
  
	<div class='modal fade modal-mini modal-primary' id='myModalsoliedit<?=$itte;?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Requerimiento Personalizados</b></p>
                    					<p>
                    					<form method="post" action='respondesolicitud.php' enctype="multipart/form-data">
                    						<input type='hidden' name='idsoli' value='<?=$codi;?>' >
										<b>Usuario:</b><br> 
                                <input type="text" class="form-control css-input" value="<?=$varfe6;?>" readonly>
                                <b>Correo:</b><br>
                                <input type="text" class="form-control css-input" value="<?=$varfe7;?>" readonly><br>
                                <b>Adjuntar Archivo:</b><br>
                                <input type="file" name="file" class="form-control css-input" <?=$obliar;?> ><br>
                                <input type="hidden" name="archi" value="<?=$varfe8;?>" >
                                <?=$archipdf;?> 
                                <b> Describa respuesta al usuario: </b><br>
                                <textarea name="responde" class="" rows="5" required><?=$varfe9;?></textarea>
								<center><button type='submit' class='btn btn-success'>Responder Solicitud</button></center>
                    					</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>
				  <?php
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
                    <span data-notify='message'>No se encontraron datos en el historial de solicitudes.</span>
                </div>";
	  }

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
