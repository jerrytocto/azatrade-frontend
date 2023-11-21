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

/*if($axe=="NO"){
	print "<script>alert('Acceso denegado! - para consultar compre uno de nuestros planes');window.location='index.php';</script>";
}*/

function eliminar_tildes($cadena){

    //Codificamos la cadena en formato utf8 en caso de que nos de errores
    $cadena = utf8_encode($cadena);

    //Ahora reemplazamos las letras
    $cadena = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $cadena
    );

    $cadena = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $cadena );

    $cadena = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $cadena );

    $cadena = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $cadena );

    $cadena = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $cadena );

    $cadena = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C'),
        $cadena
    );
	
	$cadena = str_replace(
        array(' '),
        array('+'),
        $cadena
    );

    return $cadena;
}

$sena1 = $_GET['selecanios'];
$sena2 = $_GET['selecmes'];
$sena3 = $_GET['pais'];
$sena4 = $_GET['aduana'];
$sena5 = $_GET['ruce'];
$sena6 = $_GET['descri1'];
$link6 = eliminar_tildes($sena6);

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
 						
  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
      
      <script>
$(document).ready(function(){
   /*$("#enlaceajax").click(function(evento){
      evento.preventDefault();*/
      $("#cargando").css("display", "inline");
      $("#consultaforpro").load("consulta/consulta_filtrouno.php?codigo=<?=$sena1;?>&mes=<?=$sena2;?>&pais=<?=$sena3;?>&adua=<?=$sena4;?>&ruc=<?=$sena5;?>&desc=<?=$link6;?> ", function(){
         $("#cargando").css("display", "none");
      });
  /* }); */
})
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
<Center><img class="img-responsive" src="../img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>

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
		<h5 class="card-title"><b>filtros: Año:</b> <?=$sena1;?> <b>Mes:</b> <?=$sena2;?> <b>Pais:</b> <?=$sena3;?> <b>Aduanas:</b> <?=$sena4;?> <b>Empresa:</b> <?=$sena5;?> <b>Descripcion Comercial:</b> <?=$sena6;?> </h5>
   <a class="btn btn-primary pull-right" href="busqueda-detallada.php">Atras</a>
    </div>

<div id="cargando" style="display:none; color: green;"><center><img class="img-responsive" src="../img/loading-carga.gif" width="100px"><br><b>Cargando... estamos procesando la información, espere un momento</b></center></div>
<div id="consultaforpro"></div>
                    	
</div>
    </div>
        <!-- fin form busqueda -->

      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->
                      

                      </div>
                    </div>
                    
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

<script type="text/javascript" src="../js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="../js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/buttons.print.min.js"></script>

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
