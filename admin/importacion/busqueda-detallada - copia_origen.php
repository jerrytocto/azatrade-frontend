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

?>
<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="../img/logo.png">
<link rel="icon" href="../img/logo.png">
<?php include("title.php"); ?>
<?php //include("css.php"); ?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="../css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="../css/buttons.dataTables.min.css">
<link href="../css/demo.css?w=654" rel="stylesheet"/>

<style>
	.css-input { font-size:16px; border-style:solid; border-radius:25px; border-width:3px; border-color:#65adeb; padding:7px;  } 
		 .css-input:focus { outline:none; } 
		</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

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
                 <div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="../img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
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
    <form name="fvalida" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <!--<form name="fvalida" method="post" action="<?php echo "$linkpage"; ?>">-->
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                <label>Selec. Año <font color="#EF4144">(*)</font></label>
<select name='selecanios' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>";
               <option value="">A&ntilde;o</option>
                <option value="2019" <?php if($_POST['selecanios']=="2019"){echo "selected";}?>>2019</option>
                <option value="2018" <?php if($_POST['selecanios']=="2018"){echo "selected";}?>>2018</option>
                <option value="2017" <?php if($_POST['selecanios']=="2017"){echo "selected";}?>>2017</option>
                <!--<option value="2016" <?php //if($_POST['selecanios']=="2016"){echo "selected";}?>>2016</option>
                <option value="2015" <?php //if($_POST['selecanios']=="2015"){echo "selected";}?>>2015</option>
                <option value="2014" <?php //if($_POST['selecanios']=="2014"){echo "selected";}?>>2014</option>
                <option value="2013" <?php //if($_POST['selecanios']=="2013"){echo "selected";}?>>2013</option>
                <option value="2012" <?php //if($_POST['selecanios']=="2012"){echo "selected";}?>>2012</option>-->
                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                <label>Selec. Mes</label>
<select name='selecmes' class='selectpicker' data-size='7' data-style='btn btn-info btn-round'>";
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
                                            
                                            <!--<div class="col-md-3">
                                                <div class="form-group">
                                                <label>Selec. Departamento <font color="#EF4144">(*)</font></label>
                                                                               <?php
/*echo "<select name='depa' class='selectpicker' data-size='7' data-style='btn btn-info btn-round'>"; 
if ($vardepa!=''){
	echo"<option value=''>Todos</option>";
	$queryd = mysqli_query($conexpg,"SELECT iddepartamento, nombre FROM departamento ORDER BY nombre");
	while($filad=mysqli_fetch_array($queryd))
extract ($filad);

echo '<option value="'.$filad["iddepartamento"].'"';
if($_POST["depa"]==$filad["iddepartamento"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filad["nombre"].'</option>';   
}else{
	
	echo"<option value=''>Todos</option>";
	
	$sqlxd = mysqli_query($conexpg,"SELECT iddepartamento, nombre FROM departamento ORDER BY nombre");
}

					while($filaxd=mysqli_fetch_array($sqlxd))
					{ 
						echo "<option value='$filaxd[0]'>$filaxd[1]"; 
					}
					echo "</select>";*/
?>                     
                                                

            
                                                </div>
                                            </div>-->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                   <label>Selec. Pa&iacute;s</label>
                                                   <?php $medx2 = $_POST["pais"]; ?>
                                                    <?php
echo "<select name='pais' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='Todos'>"; 
if ($medx2!=''){
	echo"<option value=''>Todo</option>";
	/*$querypro = "SELECT paises.idpaises, paises.espanol FROM paises ORDER BY paises.espanol ASC";
$resultpro = pg_query ($querypro) or die ("Error en la Consulta SQL");
while ($filapro = pg_fetch_array ($resultpro)) {*/
$querypro = mysqli_query($conexpg,"SELECT paises.idpaises, paises.espanol FROM paises ORDER BY paises.espanol ASC");
	while($filapro=mysqli_fetch_array($querypro))
extract ($filapro);

echo '<option value="'.$filapro["idpaises"].'"';
if($_POST["pais"]==$filapro["idpaises"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["espanol"].'</option>';   
//}
}else{
	
	echo"<option value=''>Todos</option>";
	
	//$sqlx="SELECT paises.idpaises, paises.espanol FROM paises ORDER BY paises.espanol ASC";
	$sqlx = mysqli_query($conexpg,"SELECT paises.idpaises, paises.espanol FROM paises ORDER BY paises.espanol ASC");
}
					
					/*$resultadox=pg_query($sqlx); 
					while ($filax=pg_fetch_row($resultadox))*/
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
echo "<select name='aduana' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='Todos'>"; 
if ($varadua!=''){
	echo"<option value=''>Todo</option>";
/*$querypro = "SELECT aduana.codadu, aduana.descripcion FROM aduana ORDER BY aduana.descripcion ASC";
$resultpro = pg_query ($querypro) or die ("Error en la Consulta SQL");
while ($filapro = pg_fetch_array ($resultpro)) {*/
	$querypro = mysqli_query($conexpg,"SELECT aduana.codadu, aduana.descripcion FROM aduana ORDER BY aduana.descripcion ASC");
	while($filapro=mysqli_fetch_array($querypro))
extract ($filapro);

echo '<option value="'.$filapro["codadu"].'"';
if($_POST["aduana"]==$filapro["codadu"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["descripcion"].'</option>';   
//}
}else{
	
	echo"<option value=''>Todos</option>";
	
	//$sqlx="SELECT aduana.codadu, aduana.descripcion FROM aduana ORDER BY aduana.descripcion ASC";
	$sqlx = mysqli_query($conexpg,"SELECT aduana.codadu, aduana.descripcion FROM aduana ORDER BY aduana.descripcion ASC");
}
					
					//$resultadox=pg_query($sqlx); 
					//while ($filax=pg_fetch_row($resultadox))
					while($filax=mysqli_fetch_array($sqlx))
					{ 
						echo "<option value='$filax[0]'>$filax[1]"; 
					}
					echo "</select>";?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                               <?php $daa=$_POST['ruce']; ?>
                                                <div class="form-group">
                                                   <!--<label for="exampleEmail" class="bmd-label-floating">Ruc Empresa</label>-->
                                                   <label>Ruc Empresa</label>
                                                    <input type="text" name="ruce" class="css-input"  value="<?php echo"$daa";?>" placeholder="Ruc Empresa"  onKeyPress="return justNumbers(event);" />
                                                </div>
                                            </div> 
                                             <!--<div class="col-md-3">
                                                <div class="form-group">
<div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" name="marcacheck" type="checkbox" value="1" <?=$mar;?> onclick="return mostrarOcultar('ocultable')"> Buscar Por N&uacute;mero Partida
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                                                </div>
                                            </div>
                                            </div>
                                            
                                            <div class="col-md-3" id="ocultable" <?=$ocu;?> >
                                                <div class="form-group">
                                                <input type="text" name="numpar" class="form-control" placeholder="Numero Partida" value="<?php echo"$de2";?>" onKeyPress="return justNumbers(event);" />
                                                </div>
                                            </div>-->
                                            
                                            <div class="col-md-7">
                                               <?php  ?>
                                                <div class="form-group">
                                                   <label>Descripci&oacute;n comercial ó Numero de partida (*) </label>
                                                    <input type="text" name="descri1" class="css-input"  placeholder="Nombre comercial ó Numero de partida (*) " size="35" value="<?php echo"$de1";?>" required  />
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                            <center>
                                            <?php if (isset($_SESSION['login_usuario']) and $axe=='SI' ) { ?>
                                            <button type="submit" name="btnsearchbd" class="btn btn-fill btn-success">Consultar <i class="material-icons">search</i></button>
                                            <?php }else if (isset($_SESSION['login_usuario']) and $axe=='NO' ) { ?>
                                            <a class="btn btn-fill btn-success" data-toggle='modal' data-target='#myModalPlan'><font color="#FFFFFF"> Consultar <i class="material-icons">search</i> </font></a>
                                            <?php }else{ ?>
                                            <a class="btn btn-fill btn-success" data-toggle='modal' data-target='#myModalA'><font color="#FFFFFF"> Consultar <i class="material-icons">search</i> </font></a>
                                            <?php } ?>
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
                    	
   <?php
//if(isset($_REQUEST['btnsearchbd']) and $siejecuta=="si" and $de1!="" and $axe=='SI'){// $siejecua =='si' //requiere el mes
if(isset($_REQUEST['btnsearchbd']) and $de1!="" and $axe=='SI'){

$wherefecha1 ="e.FNUM";
$partida = $de2;
$empresa = $wv5;
$provincias = "%";
$distrito = "%"; 
$pais = $wv3;
$aduana = $wv4;
$unitransp = "%";
$vtransp = "%";
$unidmed = "%";
$unidmedcomer = "%";

$year=$_REQUEST['selecanios'];
if($year == trim("")){
	$year="%";
}else{
	$year=$_REQUEST['selecanios'];
}

$depa = $_POST["depa"];

	$mes = $wv1;
if($mes==""){
	$mes="%";
	$filtromes="";
}else{
if($mes=='1'){$des_mes="Mes: Enero";}
if($mes=='2'){$des_mes="Mes: Febrero";}
if($mes=='3'){$des_mes="Mes: Marzo";}
if($mes=='4'){$des_mes="Mes: Abril";}
if($mes=='5'){$des_mes="Mes: Mayo";}
if($mes=='6'){$des_mes="Mes: Junio";}
if($mes=='7'){$des_mes="Mes: Julio";}
if($mes=='8'){$des_mes="Mes: Agosto";}
if($mes=='9'){$des_mes="Mes: Septiembre";}
if($mes=='10'){$des_mes="Mes: Octubre";}
if($mes=='11'){$des_mes="Mes: Noviembre";}
if($mes=='12'){$des_mes="Mes: Diciembre";}
	
	$filtromes="MONTH(i.fech_ingsi) = '$mes' AND";
}

if($partida==trim("")){
$partida="%";
}else{
$partida = $partida;
}

if($pais==trim("")){
$pais="%";
}else{
$pais = $wv3;
}
	
if($aduana==trim("")){
$aduana="%";
}else{
$aduana = $wv4;
}
	
if($empresa==trim("")){
$empresa="%";
}else{
$empresa = $wv5;
}

if($depa == trim("")){
	$depa="%";
}else{
		$depa = $vardepa;
}

$provincias="%";
$distrito="%";
$value="%";
$value2="%";
/*$descri1 = trim($_POST['$de1']);
if($descri1==trim("")){
	$campode = "%";
}else{
	$campode = $_POST['$de1'];
}*/
	$descri1 = trim($_POST['descri1']);
if($descri1==trim("")){
	$campode = "%";
}else{
	$campode = $_POST['descri1'];
}
	
	$sqlgral = "SELECT
i.id,
i.codi_aduan,
a.descripcion,
i.ano_prese,
i.nume_corre,
i.fech_ingsi,
i.tipo_docum,
i.libr_tribu,
i.dnombre,
i.codi_agent,
/*nomagente.agencia,*/
i.fech_llega,
i.via_transp,
(case i.via_transp 
		when '1' then 'BARCO' 
		when '4' then 'AVION' 
		when '6' then 'FERROCARRIL' 
		when '7' then 'CAMION' 
		when '8' then 'POR TUBERIAS' 
	else 'OTRAS' end) as viatransp,
i.empr_trans,
i.codi_alma,
i.cadu_manif,
i.fech_manif,
i.nume_manif,
i.fech_recep,
i.fech_cance,
i.tipo_cance,
i.banc_cance,
i.codi_enfin,
i.dk,
i.pais_orige,
p1.espanol AS pais1,
i.pais_adqui,
p2.espanol AS pais2,
i.puer_embar,
pu.puerto,
i.nume_serie,
i.part_nandi,
i.desc_comer,
i.desc_matco,
i.desc_usoap,
i.desc_fopre,
i.desc_otros,
i.fob_dolpol,
i.fle_dolar,
i.seg_dolar,
i.peso_neto,
i.peso_bruto,
i.unid_fiqty,
i.unid_fides,
i.qunicom,
i.tunicom,
i.sest_merca,
i.adv_dolar,
i.igv_dolar,
i.isc_dolar,
i.ipm_dolar,
i.des_dolar,
i.ipa_dolar,
i.sad_dolar,
i.der_adum,
i.comm,
i.fmod,
i.cant_bulto,
i.clase,
i.trat_prefe,
i.tipo_trat,
i.codi_liber,
i.impr_reliq,
i.accion,
i.fechareg,
i.fechamodi
FROM
importacion AS i
LEFT JOIN aduana AS a ON i.codi_aduan = a.codadu
LEFT JOIN paises AS p1 ON i.pais_orige = p1.idpaises
LEFT JOIN paises AS p2 ON i.pais_adqui = p2.idpaises
LEFT JOIN puerto AS pu ON i.puer_embar = pu.idcodigo
/*LEFT JOIN (select idagente, agencia from agente group by idagente, agencia)as nomagente On (nomagente.idagente=i.codi_agent)*/
WHERE
YEAR(i.fech_ingsi) = '$year' AND
/*MONTH(i.fech_ingsi) = '$wv1' AND*/
$filtromes
i.libr_tribu LIKE '$empresa' AND
i.pais_orige LIKE '$pais' AND
i.codi_aduan LIKE '$aduana' AND
CONCAT(i.desc_comer, i.desc_matco, i.desc_usoap, i.desc_fopre, i.desc_otros, i.part_nandi) LIKE '%$campode%' ";

	$res_gral=$conexpg->query($sqlgral); 
if($res_gral->num_rows>0){
		  echo"<div class='card'>";
		  echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title badge-info'><font color='#ffffff'>..:: <b>Resultado de la Busqueda</b>  ::.. </font></h4>
            </div>";
		  echo"<div class='card-body'>
                  <div class='toolbar'>
                      <!--  Aquí puede escribir botones / acciones adicionales para la barra de herramientas  -->
                  </div>";
		  echo"<div class='material-datatables'>";
		  echo"<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
   <th>#</th>
   <th>Codigo</th>
   <th>Aduana</th>
   <th>Año&nbsp;DUI</th>
   <th>Numero&nbsp;DUI</th>
   <th>Fecha&nbsp;Num.&nbsp;DUI</th>
   <th>Tipo&nbsp;Docum.</th>
   <th>Numero&nbsp;Docum.</th>
   <th>Razon&nbsp;Social</th>
   <th>Codigo</th>
   <th>Agente&nbsp;Aduana</th>
   <th>Fecha&nbsp;LLegada</th>
   <th>Codigo</th>
   <th>Via&nbsp;Transp.</th>
   <th>Codigo&nbsp;Transp.</th>
   <th>Cod.&nbsp;Almacen</th>
   <th>Aduana&nbsp;Manifiesto</th>
   <th>Año&nbsp;Manifiesto</th>
   <th>Num.&nbsp;Manifiesto</th>
   <th>Fecha&nbsp;Recepcion</th>
   <th>Fecha&nbsp;Cancelacion</th>
   <th>Tipo&nbsp;Cancelacion</th>
   <th>Cod.&nbsp;Banco&nbsp;Canc.</th>
   <th>Cod.&nbsp;Entidad&nbsp;Financ.</th>
   <th>Indicador&nbsp;Teledespacho</th>
   <th>Codigo</th>
   <th>Pais&nbsp;Origen</th>
   <th>Codigo</th>
   <th>Pais&nbsp;Adquisicion</th>
   <th>Codigo</th>
   <th>Puerto&nbsp;Embarque</th>
   <th>Numero&nbsp;Serie</th>
   <th>Partida</th>
   <th>Descripcion&nbsp;Comercial</th>
   <th>Valor&nbsp;Fob</th>
   <th>Valor&nbsp;Flete</th>
   <th>Valor&nbsp;Seguro</th>
   <th>Peso&nbsp;Neto</th>
   <th>Peso&nbsp;Bruto</th>
   <th>Cant.&nbsp;Importada</th>
   <th>Und.&nbsp;Medida</th>
   <th>Cant.&nbsp;Unid.&nbsp;Comerc.</th>
   <th>Tipo&nbsp;Und.&nbsp;Comerc.</th>
   <th>Estado&nbsp;Mercancia</th>
   <th>ADV&nbsp;Dolar&nbsp;por&nbsp;Partida</th>
   <th>IGV&nbsp;Dolar&nbsp;por&nbsp;Partida</th>
   <th>ISC&nbsp;Dolar&nbsp;por&nbsp;Partida</th>
   <th>IPM&nbsp;Dolar&nbsp;por&nbsp;Partida</th>
   <th>Derecho&nbsp;Partida</th>
   <th>IMP&nbsp;Promocion</th>
   <th>Sobretasa&nbsp;por&nbsp;Partida</th>
   <th>Derecho&nbsp;Antidumping&nbsp;Partida</th>
   <th>Commodities&nbsp;Partida</th>
   <th>Fecha&nbsp;Modifica</th>
   <th>Cant.&nbsp;Bultos</th>
   <th>Clase&nbsp;Bultos</th>
   <th>Trato&nbsp;Preferencial</th>
   <th>Tipo&nbsp;Tratamiento</th>
   <th>Cod.&nbsp;Liberatorio</th>
   <th>Ind.&nbsp;Liquidacion</th>
                          </tr>
                      </thead>";
		  echo"<tfoot>
                          <tr>
   <th>#</th>
   <th>Codigo</th>
   <th>Aduana</th>
   <th>Año&nbsp;DUI</th>
   <th>Numero&nbsp;DUI</th>
   <th>Fecha&nbsp;Num.&nbsp;DUI</th>
   <th>Tipo&nbsp;Docum.</th>
   <th>Numero&nbsp;Docum.</th>
   <th>Razon&nbsp;Social</th>
   <th>Codigo</th>
   <th>Agente&nbsp;Aduana</th>
   <th>Fecha&nbsp;LLegada</th>
   <th>Codigo</th>
   <th>Via&nbsp;Transp.</th>
   <th>Codigo&nbsp;Transp.</th>
   <th>Cod.&nbsp;Almacen</th>
   <th>Aduana&nbsp;Manifiesto</th>
   <th>Año&nbsp;Manifiesto</th>
   <th>Num.&nbsp;Manifiesto</th>
   <th>Fecha&nbsp;Recepcion</th>
   <th>Fecha&nbsp;Cancelacion</th>
   <th>Tipo&nbsp;Cancelacion</th>
   <th>Cod.&nbsp;Banco&nbsp;Canc.</th>
   <th>Cod.&nbsp;Entidad&nbsp;Financ.</th>
   <th>Indicador&nbsp;Teledespacho</th>
   <th>Codigo</th>
   <th>Pais&nbsp;Origen</th>
   <th>Codigo</th>
   <th>Pais&nbsp;Adquisicion</th>
   <th>Codigo</th>
   <th>Puerto&nbsp;Embarque</th>
   <th>Numero&nbsp;Serie</th>
   <th>Partida</th>
   <th>Descripcion&nbsp;Comercial</th>
   <th>Valor&nbsp;Fob</th>
   <th>Valor&nbsp;Flete</th>
   <th>Valor&nbsp;Seguro</th>
   <th>Peso&nbsp;Neto</th>
   <th>Peso&nbsp;Bruto</th>
   <th>Cant.&nbsp;Importada</th>
   <th>Und.&nbsp;Medida</th>
   <th>Cant.&nbsp;Unid.&nbsp;Comerc.</th>
   <th>Tipo&nbsp;Und.&nbsp;Comerc.</th>
   <th>Estado&nbsp;Mercancia</th>
   <th>ADV&nbsp;Dolar&nbsp;por&nbsp;Partida</th>
   <th>IGV&nbsp;Dolar&nbsp;por&nbsp;Partida</th>
   <th>ISC&nbsp;Dolar&nbsp;por&nbsp;Partida</th>
   <th>IPM&nbsp;Dolar&nbsp;por&nbsp;Partida</th>
   <th>Derecho&nbsp;Partida</th>
   <th>IMP&nbsp;Promocion</th>
   <th>Sobretasa&nbsp;por&nbsp;Partida</th>
   <th>Derecho&nbsp;Antidumping&nbsp;Partida</th>
   <th>Commodities&nbsp;Partida</th>
   <th>Fecha&nbsp;Modifica</th>
   <th>Cant.&nbsp;Bultos</th>
   <th>Clase&nbsp;Bultos</th>
   <th>Trato&nbsp;Preferencial</th>
   <th>Tipo&nbsp;Tratamiento</th>
   <th>Cod.&nbsp;Liberatorio</th>
   <th>Ind.&nbsp;Liquidacion</th>
                          </tr>
                      </tfoot>";
		  echo"<tbody>";
		  //while ($fila_parti=pg_fetch_array($res_gral)) {
		 while($fila_parti=$res_gral->fetch_array()){ 
			  $itte = $itte + 1;
		   $impor1 = $fila_parti['codi_aduan'];
		   $impor2 = $fila_parti['descripcion'];
	       $impor3 = $fila_parti['ano_prese'];
	       $impor4 = $fila_parti['nume_corre'];
	       $impor5 = $fila_parti['fech_ingsi'];
		   $impor6 = $fila_parti['tipo_docum'];
		   $impor7 = $fila_parti['libr_tribu'];
		   $impor8 = $fila_parti['dnombre'];
		   $impor9 = $fila_parti['codi_agent']; //consutar el codigo en la tabla agente
		   $impor10 = $fila_parti['fech_llega'];
		   $impor11 = $fila_parti['via_transp'];
		   $impor12 = $fila_parti['viatransp'];
		   $impor13 = $fila_parti['empr_trans'];
		   $impor14 = $fila_parti['codi_alma'];
		   $impor15 = $fila_parti['cadu_manif'];
		   $impor16 = $fila_parti['fech_manif'];
		   $impor17 = $fila_parti['nume_manif'];
	       $impor18 = $fila_parti['fech_recep'];
		   $impor19 = $fila_parti['fech_cance'];
		   $impor20 = $fila_parti['tipo_cance'];
		 /*$valor_fob = number_format($fila_parti['VFOBSERDOL'],2); 
		 $valor_net = number_format($fila_parti['VPESNET'],2);
		 $valor_bru = number_format($fila_parti['VPESBRU'],2);
		 $valor_A = number_format($fila_parti['QUNIFIS'],2);*/
		  $impor21 = $fila_parti['banc_cance'];
		  $impor22 = $fila_parti['codi_enfin'];
		  $impor23 = $fila_parti['dk'];
		  $impor24 = $fila_parti['pais_orige'];
		  $impor25 = $fila_parti['pais1'];
	      $impor26 = $fila_parti['pais_adqui'];
		  $impor27 = $fila_parti['pais2'];
		  $impor28 = $fila_parti['puer_embar'];
		  $impor29 = $fila_parti['puerto'];
		  $impor30 = $fila_parti['nume_serie'];
			 $impor31 = $fila_parti['part_nandi'];
			 $impor32 = $fila_parti['desc_comer'];
			 $impor33 = $fila_parti['desc_matco'];
			 $impor34 = $fila_parti['desc_usoap'];
			 $impor35 = $fila_parti['desc_fopre'];
			 $impor36 = $fila_parti['desc_otros'];
			 $impor37 = number_format($fila_parti['fob_dolpol'],2);
			 $impor38 = number_format($fila_parti['fle_dolar'],2);
			 $impor39 = number_format($fila_parti['seg_dolar'],2);
			 $impor40 = number_format($fila_parti['peso_neto'],2);
			 $impor41 = number_format($fila_parti['peso_bruto'],2);
			 $impor42 = number_format($fila_parti['unid_fiqty'],2);
			 $impor43 = $fila_parti['unid_fides'];
			 $impor44 = number_format($fila_parti['qunicom'],2);//CANTIDAD DE UNIDAD COMERCIAL
			 $impor45 = $fila_parti['tunicom'];
			 $impor46 = $fila_parti['sest_merca'];
			 $impor47 = number_format($fila_parti['adv_dolar'],2);
			 $impor48 = number_format($fila_parti['igv_dolar'],2);
			 $impor49 = number_format($fila_parti['isc_dolar'],2);
			 $impor50 = number_format($fila_parti['ipm_dolar'],2);
			 $impor51 = number_format($fila_parti['des_dolar'],2);
			 $impor52 = number_format($fila_parti['ipa_dolar'],2);
			 $impor53 = number_format($fila_parti['sad_dolar'],2);
			 $impor54 = number_format($fila_parti['der_adum'],2);
			 $impor55 = number_format($fila_parti['comm'],2);
			 $impor56 = $fila_parti['fmod'];
			 $impor57 = number_format($fila_parti['cant_bulto'],2);
			 $impor58 = $fila_parti['clase'];
			 $impor59 = $fila_parti['trat_prefe'];
			 $impor60 = $fila_parti['tipo_trat'];
			 $impor61 = $fila_parti['codi_liber'];
			 $impor62 = $fila_parti['impr_reliq'];
			 
			 //consultanos sector
	/*$sqlsecto = "SELECT partida FROM sector where='$num_partida' ";
	$rsce=$conexpg->query($sqlsecto); 
if($rsce->num_rows>0){ 
while($rws=$rsce->fetch_array()){ 
	$nom_sector = $rws['sector'];
}
}else{
	$nom_sector = "---";
}*/
	//consultanos agente
	$sqlage = "select aa.agencia from agente aa where aa.idagente = '$impor9' limit 1";
	$rsage=$conexpg->query($sqlage); 
if($rsage->num_rows>0){ 
while($rwage=$rsage->fetch_array()){ 
	$nom_agente = $rwage['agencia'];
}
}else{
	$nom_agente = "---";
}
			  
		echo"<tr>";
	    echo '<td>&nbsp;</td>';
   echo '<td>'.$impor1.'</td>';
   echo '<td>'.$impor2.'</td>';
   echo '<td>'.$impor3.'</td>';
   echo '<td>'.$impor4.'</td>';
   echo '<td>'.$impor5.'</td>';
   echo '<td>'.$impor6.'</td>';
   echo '<td>'.$impor7.'</td>';
   echo '<td>'.$impor8.'</td>';
   echo '<td>'.$impor9.'</td>';
   echo '<td>'.$nom_agente.'</td>';
   echo '<td>'.$impor10.'</td>';
   echo '<td>'.$impor11.'</td>';
   echo '<td>'.$impor12.'</td>';
   echo '<td>'.$impor13.'</td>';
   echo '<td>'.$impor14.'</td>';
   echo '<td>'.$impor15.'</td>';
   echo '<td>'.$impor16.'</td>';
   echo '<td>'.$impor17.'</td>';
   echo '<td>'.$impor18.'</td>';
   echo '<td>'.$impor19.'</td>';
   echo '<td>'.$impor20.'</td>';
   echo '<td>'.$impor21.'</td>';
   echo '<td>'.$impor22.'</td>';
   echo '<td>'.$impor23.'</td>';
   echo '<td>'.$impor24.'</td>';
   echo '<td>'.$impor25.'</td>';
   echo '<td>'.$impor26.'</td>';
   echo '<td>'.$impor27.'</td>';
   echo '<td>'.$impor28.'</td>';
   echo '<td>'.$impor29.'</td>';
   echo '<td>'.$impor30.'</td>';
			 echo '<td>'.$impor31.'</td>';
			 echo '<td> '.$impor32.' '.$impor33.' '.$impor34.' '.$impor35.' '.$impor36.' </td>';
			 //echo '<td>'.$impor33.'</td>';
			 //echo '<td>'.$impor34.'</td>';
			 //echo '<td>'.$impor35.'</td>';
			 //echo '<td>'.$impor36.'</td>';
			 echo '<td>'.$impor37.'</td>';
			 echo '<td>'.$impor38.'</td>';
			 echo '<td>'.$impor39.'</td>';
			 echo '<td>'.$impor40.'</td>';
			 echo '<td>'.$impor41.'</td>';
			 echo '<td>'.$impor42.'</td>';
			 echo '<td>'.$impor43.'</td>';
			 echo '<td>'.$impor44.'</td>';
			 echo '<td>'.$impor45.'</td>';
			 echo '<td>'.$impor46.'</td>';
			 echo '<td>'.$impor47.'</td>';
			 echo '<td>'.$impor48.'</td>';
			 echo '<td>'.$impor49.'</td>';
			 echo '<td>'.$impor50.'</td>';
			 echo '<td>'.$impor51.'</td>';
			 echo '<td>'.$impor52.'</td>';
			 echo '<td>'.$impor53.'</td>';
			 echo '<td>'.$impor54.'</td>';
			 echo '<td>'.$impor55.'</td>';
			 echo '<td>'.$impor56.'</td>';
			 echo '<td>'.$impor57.'</td>';
			 echo '<td>'.$impor58.'</td>';
			 echo '<td>'.$impor59.'</td>';
			 echo '<td>'.$impor60.'</td>';
			 echo '<td>'.$impor61.'</td>';
			 echo '<td>'.$impor62.'</td>';
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
                    <span data-notify='message'>No se encontraron datos en la busqueda realizada. Vuelva a consultar.</span>
                </div>";
	  }

	
		  }
		  ?>
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

<script type="text/javascript" src="../js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="../js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../js/jsexport/buttons.print.min.js"></script>
    
<script type="text/javascript">
$(document).ready(function() {
    $('#datatablese').DataTable({
		"order": [[ 0, "asc" ]],
		dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
			'csv', 'excel'
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
			"info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
			"infoEmpty":      "Mostrando 0 a 0 de 0 registros",
			"infoFiltered":   "(Filtro de _MAX_ total registros)",
			"loadingRecords": "Cargando...",
			"processing":     "Procesando...",
			"zeroRecords":    "No se encontraron coincidencias",
			"paginate": {
				"first":      "Primero",
				"last":       "Ultimo",
				"next":       "Próximo",
				"previous":   "Anterior"
    },
        }

    });
    var table = $('#datatablese').DataTable();

    $('.card .material-datatablese label').addClass('form-group');
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
