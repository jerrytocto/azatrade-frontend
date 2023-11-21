<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='index.php';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("../incBD/inibd.php");
set_time_limit(750);
$activebusdeta ="active";

/*$query = "SELECT * FROM departamento ORDER BY nombre";
	$resultado=pg_query($query);*/

$wv1 = trim($_POST['selecmes']);//mes
$vardepa = trim($_POST["depa"]); //departamento
$wv3 = trim($_POST['pais']);//mercado
$wv4 = trim($_POST['aduana']);//aduana
$wv5 = trim($_POST['ruce']);//ruc
$varche=$_POST['marcacheck'];//check por numero de partida
					  if($varche=="1"){
						  $mar = "checked";
						  $ocu ="";
						  $de2=$_POST['numpar'];
					  }else{
						  $mar = "";
						  $ocu = "style='display:none;'";
						  $de2="";
					  }
$wv6 = trim($_POST['numpar']);//numero partida
$de1=trim($_POST['descri1']);
if($de1==""){
	$de1=trim($_GET['descri1']);
}else{
	$de1=trim($_POST['descri1']);
}

/*if($varche=="1" and $wv6==""){//si esta marcado y es vacio
	$mensajeA="error1";
}else if($varche=="1" and $wv6!=""){
	$siejecuta="si";
}else if($wv1=="" or $vardepa==""){
	$mensajeB="error2";
}else if($wv1!="" and $vardepa!=""){
	$siejecuta="si";
}*/

if($wv1==""){
	$mensajeB="error2";
}else if($wv1!=""){
	$siejecuta="si";
}

$condi = $_SESSION['acceso_pago'];
if($condi=='SI' or $condi=='NO' and $_SESSION['rol']=='ADMIN'){//tiene o no pago y es admin visualiza
	$axe = "SI";
}else if($condi=='NO' and $_SESSION['rol']<>'ADMIN'){//no tiene pago y no es admin limita 5 registros
	$axe = "NO";
}else if($condi=='SI' and $_SESSION['rol']<>'ADMIN'){//si tiene pago y no es admin visualiza todo
	$axe = "SI";
}

?>
<!DOCTYPE html>
<html lang="en">
 <!--<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<link rel="apple-touch-icon" href="../img/logo.png">
<link rel="icon" href="../img/logo.png">
<?php //include("title.php"); ?>
<?php //include("css.php"); ?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="../css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="../css/buttons.dataTables.min.css">
<link href="../css/demo.css?w=6774" rel="stylesheet"/>

<style>
	.css-input { font-size:16px; border-style:solid; border-radius:25px; border-width:3px; border-color:#65adeb; padding:7px;  } 
		 .css-input:focus { outline:none; } 
		</style>
 						
  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
      
        </head>-->
        
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
<link rel="stylesheet" href="../css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="../css/buttons.dataTables.min.css">
<link href="../css/demo.css?ff=er45" rel="stylesheet"/>

<!--<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<style>
	.css-input { font-size:16px; border-style:solid; border-radius:25px; border-width:3px; border-color:#65adeb; padding:7px;  } 
		 .css-input:focus { outline:none; } 
		</style>
		
<!--<script language="javascript">
			$(document).ready(function(){
				$("#cbx_estado").change(function () {
 
					$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_estado option:selected").each(function () {
						id_estado = $(this).val();
						$.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_municipio").change(function () {
					$("#cbx_municipio option:selected").each(function () {
						id_municipio = $(this).val();
						$.post("includes/getLocalidades.php", { id_municipio: id_municipio }, function(data){
							$("#cbx_localidad").html(data);
						});            
					});
				})
			});
		</script>-->
<!-- codigo solo acepta numeros --> 
<script language="javascript" type="text/javascript">
 function justNumbers(e)
{
   var keynum = window.event ? window.event.keyCode : e.which;
   if ((keynum == 8) || (keynum == 46))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}
</script>
 
<script language="JavaScript">
function mostrarOcultar(id){
var elemento = document.getElementById(id);
if(!elemento) {
return true;
}
if (elemento.style.display == "none") {
elemento.style.display = "block"
} else {
elemento.style.display = "none"
};
return true;
};
</script>
 						
  <!--<script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>-->
       
       <!-- primer filtro -->
<script language='javascript'>
			$(function(){
				$('#btn_consulta').on('click', function (e){
					
var seleanio = $("#selecanios")[0].value.length;
if(seleanio === 0){
    alert("Seleccione año");
	$("input#selecanios").focus();
	return false;
}
var describus = $("#descri1")[0].value.length;
if(describus === 0){
    alert("Ingrese descripcion o numero de partida");
	$("input#descri1").focus();
	return false;
}
					var ani1 = $("#selecanios").val();
					var ani2 = $("#selecmes").val();
					var ani3 = $("#pais").val();
					var ani4 = $("#aduana").val();
					var ani5 = $("#ruce").val();
					var ani6 = $("#descri1").val();

					$('#btn_consulta').attr('disabled', "disabled");//desabilita boton de envio
					$('#btn_consulta').val("Procesando consulta espere...");//cambia texto de boton
					e.preventDefault(); // Evitamos que salte el enlace.
					/* Creamos un nuevo objeto FormData. Este sustituye al
					atributo enctype = "multipart/form-data" que, tradicionalmente, se
 Output as PDF file has been powered by [ Universal Post Manager ] plugin from www.ProfProjects.com | Page 3/5 |
This page was exported from - Recursos para programadores
Export date: Mon Apr 8 1:35:19 2019 / +0000 GMT
					incluía en los formularios (y que aún se incluye, cuando son enviados
					desde HTML. */
					var paqueteDeDatos = new FormData();
					/* Todos los campos deben ser añadidos al objeto FormData. Para ello
					usamos el método append. Los argumentos son el nombre con el que se mandará el
					dato al script que lo reciba, y el valor del dato.
					Presta especial atención a la forma en que agregamos el contenido
					del campo de fichero, con el nombre 'archivo'. */
					paqueteDeDatos.append('selecanios', $('#selecanios').prop('value'));
					paqueteDeDatos.append('selecmes', $('#selecmes').prop('value'));
					paqueteDeDatos.append('pais', $('#pais').prop('value'));
					paqueteDeDatos.append('aduana', $('#aduana').prop('value'));
					paqueteDeDatos.append('ruce', $('#ruce').prop('value'));
					paqueteDeDatos.append('descri1', $('#descri1').prop('value'));
					var destino = "mensa_consu.php"; // El script que va a recibir los campos de formulario.
					/* Se envia el paquete de datos por ajax. */
					$.ajax({
						url: destino,
						type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
						contentType: false,
						data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
						processData: false,
						cache: false,
						beforeSend: function () {
                        $("#respuestaconsu").html("Procesando envio, espere por favor...");
						},
						success: function(data){ // En caso de que todo salga bien.
							//console.log(respmerito);
							$('#respuestaconsu').html(data);
							Limpiarmerito();
							//document.getElementById('cerrarmodalmerito').click();
							document.getElementById('ocultarform1').style.display='none';
							$('#btn_consulta').val("Grabar");//cambia texto de boton
							$('#consultafiltrouno').load("consulta/consulta_filtrouno.php?codigo="+ani1+"&desc="+ani6+"&mes="+ani2+"&pais="+ani3+"&adua="+ani4+"&ruc="+ani5+"");//actualizas el div
							//consumelrito();
						},
						error: function (){ // Si hay algún error.
							alert("Algo ha fallado.");
							//document.getElementById('cerrarmodalmerito').click();

						}
					});
				});
				
			});
	
	function Limpiarmerito(){
    /*$("#archimeri").val("");
    $("#instituto").val("");
    $("#descri").val("");
    $("#acredita").val("");
	$("#fecredimeri").val("");*/
	$('#btn_consulta').removeAttr("disabled");//habilita boton de envio
	}
	  
	</script>
      
      <script type="text/javascript">
		function objetoAjax(){
 var xmlhttp=false;
 try {
 xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 } catch (e) {
 try {
 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 } catch (E) {
 xmlhttp = false;
 }
 }
 if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
   xmlhttp = new XMLHttpRequest();
   }
   return xmlhttp;
}
	function verdetalleA(anio,discri,partida,descriparti){
//var nomdescri = document.getElementsByName("discri");
		
		//var nomdescri = arguments[1];
		
   //donde se mostrará el resultado de la eliminacion
   divResultadom = document.getElementById('respconsudos');
   
		document.getElementById('divconsuno').style.display='none';
   //usaremos un cuadro de confirmacion 
   //var eliminar = confirm("De verdad desea eliminar este dato?")
   //if ( eliminar ) {
   //instanciamos el objetoAjax
   ajax=objetoAjax();
   //uso del medotod GET
   //indicamos el archivo que realizará el proceso de eliminación
   //junto con un valor que representa el id del empleado
   ajax.open("GET", "mensa_consudos.php?id="+anio+"&descri1="+discri+"&partida="+partida+"&nomparti="+descriparti);
   ajax.onreadystatechange=function() {
   if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divResultadom.innerHTML = ajax.responseText
   //$('#respuestaconsudos').load("consulta/consulta_filtrodos.php?codigo=<?=$coduni;?>");//actualizas el div
   //$('#respuestaconsudos').load("consulta/consulta_filtrodos.php?codigo=");//actualizas el div
   }
   }
   //como hacemos uso del metodo GET
   //colocamos null
   ajax.send(null)
   //}
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
      
                <?php if(isset($_REQUEST['btnsearchbd'])){ ?>
                 <!--<div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="../img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>-->
               <?php } ?>

        <?php if($mensajeA=="error1"){ ?>
           <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> debe de seleccionar un Año y ingresar el numero de partida como campos REQUERIDOS</span>
          </div>
           <?php } ?>
           
           <?php //if($mensajeB=="error2" and isset($_REQUEST['btnsearchbd']) and $de1!="" ){
		  if(isset($_REQUEST['btnsearchbd']) and $de1=="" ){ ?>
           <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <!--<span>
              <b> Mensaje - </b> debe de seleccionar un Año, Mes y Descripcion Comercial o Numero de partida como campos REQUERIDOS</span>-->
              <span>
              <b> Mensaje - </b> debe de seleccionar un Año y Descripcion Comercial o Numero de partida como campos REQUERIDOS</span>
          </div>
           <?php } ?>
        
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">IMPORTACIONES PERUANAS – BUSQUEDA DETALLADA</h4>
    </div>
    <!--<form name="fvalida" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">-->
    <form id="ocultarform1" name="fvalida" method="GET" action="busqueda-detallada_uno.php">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                <label>Selec. Año <font color="#EF4144">(*)</font></label>
<select name='selecanios' id="selecanios" class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>";
               <option value="">A&ntilde;o</option>
                <option value="2022" <?php if($_POST['selecanios']=="2022"){echo "selected";}?>>2022</option>
                <option value="2021" <?php if($_POST['selecanios']=="2021"){echo "selected";}?>>2021</option>
                <option value="2020" <?php if($_POST['selecanios']=="2020"){echo "selected";}?>>2020</option>
                <option value="2019" <?php if($_POST['selecanios']=="2019"){echo "selected";}?>>2019</option>
                <option value="2018" <?php if($_POST['selecanios']=="2018"){echo "selected";}?>>2018</option>
                <option value="2017" <?php if($_POST['selecanios']=="2017"){echo "selected";}?>>2017</option>
                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                <label>Selec. Mes</label>
<select name='selecmes' id="selecmes" class='selectpicker' data-size='7' data-style='btn btn-info btn-round'>";
                <option value="" <?php if($_POST['selecmes']==""){echo "selected";}?>>Mes</option>
                <option value="1" <?php if($_POST['selecmes']=="1"){echo "selected";}?>>Enero</option>
                <option value="2" <?php if($_POST['selecmes']=="2"){echo "selected";}?>>Febrero</option>
                <option value="3" <?php if($_POST['selecmes']=="3"){echo "selected";}?>>Marzo</option>
                <option value="4" <?php if($_POST['selecmes']=="4"){echo "selected";}?>>Abril</option>
                <option value="5" <?php if($_POST['selecmes']=="5"){echo "selected";}?>>Mayo</option>
                <option value="6" <?php if($_POST['selecmes']=="6"){echo "selected";}?>>Junio</option>
                <option value="7" <?php if($_POST['selecmes']=="7"){echo "selected";}?>>Julio</option>
                <option value="8" <?php if($_POST['selecmes']=="8"){echo "selected";}?>>Agosto</option>
                <option value="9" <?php if($_POST['selecmes']=="9"){echo "selected";}?>>Septiembre</option>
                <option value="10" <?php if($_POST['selecmes']=="10"){echo "selected";}?>>Octubre</option>
                <option value="11" <?php if($_POST['selecmes']=="11"){echo "selected";}?>>Noviembre</option>
                <option value="12" <?php if($_POST['selecmes']=="12"){echo "selected";}?>>Diciembre</option>
                   
                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                   <label>Selec. Pa&iacute;s</label>
                                                   <?php $medx2 = $_POST["pais"]; ?>
                                                    <?php
echo "<select name='pais' id='pais' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='Todos'>"; 
if ($medx2!=''){
	echo"<option value=''>Todo</option>";
$querypro = mysqli_query($conexpg,"SELECT paises.idpaises, paises.espanol FROM paises ORDER BY paises.espanol ASC");
	while($filapro=mysqli_fetch_array($querypro))
extract ($filapro);

echo '<option value="'.$filapro["idpaises"].'"';
if($_POST["pais"]==$filapro["idpaises"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["espanol"].'</option>';   
//}
}else{
	
	echo"<option value=''>Todos</option>";
	
	$sqlx = mysqli_query($conexpg,"SELECT paises.idpaises, paises.espanol FROM paises ORDER BY paises.espanol ASC");
}
					while($filax=mysqli_fetch_array($sqlx))
					{ 
						echo "<option value='$filax[0]'>$filax[1]"; 
					}
					echo "</select>";?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label>Selec. Aduanas</label>
                                                <?php $varadua = $_POST["aduana"]; ?>
<?php
echo "<select name='aduana' id='aduana' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='Todos'>"; 
if ($varadua!=''){
	echo"<option value=''>Todo</option>";
	$querypro = mysqli_query($conexpg,"SELECT aduana.codadu, aduana.descripcion FROM aduana ORDER BY aduana.descripcion ASC");
	while($filapro=mysqli_fetch_array($querypro))
extract ($filapro);

echo '<option value="'.$filapro["codadu"].'"';
if($_POST["aduana"]==$filapro["codadu"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["descripcion"].'</option>';   
}else{
	
	echo"<option value=''>Todos</option>";
	$sqlx = mysqli_query($conexpg,"SELECT aduana.codadu, aduana.descripcion FROM aduana ORDER BY aduana.descripcion ASC");
}
					while($filax=mysqli_fetch_array($sqlx))
					{ 
						echo "<option value='$filax[0]'>$filax[1]"; 
					}
					echo "</select>";?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                               <?php $daa=$_POST['ruce']; ?>
                                               <label>Ruc Empresa</label>
                                                <div class="form-group">
                                                    <input type="text" name="ruce" id="ruce" class="form-control css-input"  value="<?php echo"$daa";?>" placeholder="Ruc Empresa"  onKeyPress="return justNumbers(event);" />
                                                </div>
                                            </div> 
                                            
                                            <div class="col-md-5">
                                              <label>Descripci&oacute;n comercial ó Numero de partida </label>
                                                <div class="form-group">
                                                   
                                                    <input type="text" name="descri1" id="descri1" class="form-control css-input"  placeholder="Nombre comercial ó Numero de partida " size="35" value="<?php echo"$de1";?>"  />
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                            <center>
                                            <br>
                                            <?php //if (isset($_SESSION['login_usuario']) and $axe=='SI' ) { ?>
                                            <!--<button type="submit" id="btn_consulta" class="btn btn-fill btn-success">Consultar <i class="material-icons">search</i></button>-->
                                            <button type="submit" class="btn btn-fill btn-success">Consultar <i class="material-icons">search</i></button>
                                            <!--
                                            <?php //}else if (isset($_SESSION['login_usuario']) and $axe=='NO' ) { ?>
                                            <a class="btn btn-fill btn-success" data-toggle='modal' data-target='#myModalPlan'><font color="#FFFFFF"> Consultar <i class="material-icons">search</i> </font></a>
                                            <?php //}else{ ?>
                                            <a class="btn btn-fill btn-success" data-toggle='modal' data-target='#myModalA'><font color="#FFFFFF"> Consultar <i class="material-icons">search</i> </font></a>
                                            <?php //} ?>
                                            -->
                                            </center>
											</div>
                                       
                                        </div>
                                    </div>  
    </div>
    </form>
</div>
    </div>
        <!-- fin form busqueda -->
        
        <!-- modal plan -->
                    	<div class='modal fade' id='myModalPlan' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                  <h4 class='modal-title'>Alerta !</h4>
                                  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
                                      <i class='material-icons'>clear</i>
                                  </button>
                                </div>
                                <div class='modal-body'>
								<center><i class='material-icons banger-info' style="font-size: 56px;color:#FB8C00;">info</i></center>
                                    Para acceder a ver la información que deseas consultar adquiere uno de nuestros planes <a href="../planes/" target="_blank">ingresando AQUI</a>.
									
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-danger btn-link' data-dismiss='modal'>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    	</div>
                    	
                    	<!-- resultado -->
                    	<div class="card ">
                    	<div id="respuestaconsu"></div>
                    	<div id="consultafiltrouno">
                             <div class="table-responsive">
                             <table class="table table-striped table-bordered table-sm">
                             <thead>
                             	<tr>
                             		<th>#</th>
                             		<th>PARTIDA</th>
                             		<th>DESCRIPCIÓN</th>
                             		<th>FOB USD</th>
                             		<th>PESO NETO</th>
                             		<th>PRECIO</th>
                             		<th>ACCION</th>
                             	</tr>
                             	<thead>
                             	<tbody>
                            			<tr>
                             			<td colspan='7' align='center'><b>No Hay Datos</b></td>
                             		</tr>
                             	</tbody>
                             </table>
                              </div>
                              </div>
                              </div>
                              
                              <!-- resultado segundo filtro -->
                              <div class="card ">
                              <div id="respconsudos"></div>
                    	<div id="respuestaconsudos"></div>
                    	</div>

      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->
                      
                      <!-- small modal -->
                        <div class="modal fade modal-mini modal-primary" id="myModalA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    		<div class="modal-dialog modal-small">
                    			<div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                            </div>
                    				<div class="modal-body">
                    					<p>Para consultar <a href="../registro/">registrate AQUI</a>, si ya estas registrado <a href="../login/">ingresa AQUI</a>.</p>
                    				</div>
                            <div class="modal-footer justify-content-center">
                            </div>
                    			</div>
                    		</div>
                    	</div>
                        <!--    end small modal -->

                      </div>
                    </div>
   
                    <?php include("footer.php"); ?>

            </div>
        </div>
    </body>

<?php include("js.php"); ?>

<!--<script src="../js/core/jquery.min.js"></script>
<script src="../js/core/popper.min.js"></script>
<script src="../js/bootstrap-material-design.min.js"></script>
<script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
<script src="../js/plugins/moment.min.js"></script>
<script src="../js/plugins/bootstrap-datetimepicker.min.js"></script>
<script src="../js/plugins/nouislider.min.js"></script>
<script src="../js/plugins/bootstrap-selectpicker.js"></script>
<script src="../js/plugins/bootstrap-tagsinput.js"></script>
<script src="../js/plugins/jasny-bootstrap.min.js"></script>
<script src="../assets-for-demo/js/modernizr.js"></script>
<script src="../js/material-dashboard.js?v=2.0.1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="../js/plugins/arrive.min.js" type="text/javascript"></script>
<script src="../js/plugins/jquery.validate.min.js"></script>
<script src="../js/plugins/chartist.min.js"></script>
<script src="../js/plugins/jquery.bootstrap-wizard.js"></script>
<script src="../js/plugins/bootstrap-notify.js"></script>
<script src="../js/plugins/jquery-jvectormap.js"></script>
<script src="../js/plugins/nouislider.min.js"></script>
<script src="../js/plugins/jquery.select-bootstrap.js"></script>
<script src="../js/plugins/jquery.datatables.js"></script>
<script src="../js/plugins/sweetalert2.js"></script>
<script src="../js/plugins/jasny-bootstrap.min.js"></script>
<script src="../js/plugins/fullcalendar.min.js"></script>
<script src="../js/plugins/demo.js"></script>-->

<!--<script type="text/javascript" src="../js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="../js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/buttons.print.min.js"></script>-->
    
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>-->



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
