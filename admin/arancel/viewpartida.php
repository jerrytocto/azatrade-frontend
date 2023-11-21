<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='index.php';</script>";
}
}
include("../incBD/inibd.php");
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
set_time_limit(250);
$activehome ="active";

$var= $_GET["data"];
$q= $_GET["data"];
$fa= $_GET["fi"];
$fb= $_GET["ff"];
$subparti_nandina= $_GET["d1"];
if($subparti_nandina==""){
	$subparti_nandina="-";
}else{
	$subparti_nandina= $_GET["d1"];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<?php include("title.php"); ?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="../css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="../css/buttons.dataTables.min.css">
<link href="../css/demo.css" rel="stylesheet"/>
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
<script>function formulario(form) { 
/*if (form.nombre.value   == '') { alert ('El nombre esta vacío');  
f.nombre.focus(); return false; } */
var txtbuscar = document.getElementById('buscar').value;
if (txtbuscar == null || txtbuscar.length == 0 || /^\s+$/.test(txtbuscar)) { 
	alert ('Campo Vacio y  ingrese partida o Descripcion a consultar !!'); 
form.buscar.focus(); return false; } 
return true; } 
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
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Encuentra tu partida por numero ó descripción de producto.</h4>
    </div>
    <form method="post" action="listpartida.php" onsubmit="return formulario(this)">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                               <?php $daa=$_POST['dato']; ?>
                                                <div class="form-group">
                                                    <input type="text" id="buscar" name="buscar" class="form-control css-input" placeholder="Ingrese partida ó descripción" value="<?php echo"$daa";?>" required />
                                                    <input type="hidden" name="btnsearch">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                            <button type="submit" name="btnsearch" class="btn btn-fill btn-success">Consultar <i class="material-icons">search</i></button>
											</div>
                                       
                                        </div>
                                    </div>  
    </div>
    </form>
</div>
    </div>
                       	
 <div class="col-md-12">
<div class="card ">
 
<div class="card-header card-header-info card-header-icon">
    <div class="card-icon"><i class="material-icons">search</i></div>
    <h4 class="card-title" align="center"><b>Resultado de Busqueda <?php echo "$q"; ?></b></h4>
    </div>                	
                      	<?php
//if (isset($consultar)){
  //if($_POST){ 
  //$var= $_GET["data"];
  $par= "#"."$var";
  //extraemos las 4 primeros caracteres del numero de partida
  $subcap = substr("$var", 0, 4);
  
  //extraemos caracteres de la partida en 4 partes
  $coree1 = substr("$var", 0, 4);
  $coree2 = substr("$var", 4, 2);
  $coree3 = substr("$var", 6, 2);
  $coree4 = substr("$var", 8, 2);
  $correla = $coree1.".".$coree2.".".$coree3.".".$coree4;
  //echo "$correla";
  
  // consultamos en la tabla nandina
  if($fa!=""){
  $sqlandina="SELECT nan.partida, nan.descrip, nan.adval, nan.igv, nan.isc, nan.seguro, nan.cuode, nan.ciiu, nan.finicio, nan.ffin FROM arancel_part_nandina AS nan WHERE nan.partida = '$var' and nan.finicio = '$fa' and nan.ffin = '$fb' ORDER BY nan.finicio DESC LIMIT 1 ";
  }else{
	   $sqlandina="SELECT nan.partida, nan.descrip, nan.adval, nan.igv, nan.isc, nan.seguro, nan.cuode, nan.ciiu, nan.finicio, nan.ffin FROM arancel_part_nandina AS nan WHERE nan.partida = '$var' ORDER BY nan.finicio DESC LIMIT 1 ";
	  }
	$rsnandina=$conexpg->query($sqlandina) or die(mysqli_error($conexpg)); 
if($rsnandina->num_rows>0){
	while($rowand=$rsnandina->fetch_array()){
    $codpartida = $rowand["partida"];
    $despartida = $rowand["descrip"];
    $fechaini = $rowand["finicio"];
    $fechafin = $rowand["ffin"];
    if ($fechafin=='0000-00-00'){
    $fvigencia = "Desde ".$fechaini." Hasta la Actualidad";
    }else{
    $fvigencia = "Desde ".$fechaini." Hasta ".$fechafin;
    }
    $codcuode = $rowand["cuode"];
    $codciiu = $rowand["ciiu"];
    
    }
    }else{
      $despartida = "Sin Datos";
      }

// consultamos en la tabla subcapitulos y capitulos
$sqlsubcapi="SELECT subc.idcodigo,subc.idsubcapitulo,subc.descripcion AS subcapi_descripcion, subc.idcapitulo,capi.descripcion AS capi_descripcion, capi.idseccion, capi.descripcion_seccion FROM arancel_part_subcapitulo AS subc RIGHT JOIN arancel_part_capitulo AS capi ON subc.idcapitulo = capi.idcapitulo WHERE subc.idsubcapitulo = '$subcap' LIMIT 1 ";
//$sqlsubcapi="SELECT subc.idcodigo,subc.idsubcapitulo,subc.descripcion AS subcapi_descripcion, subc.idcapitulo,capi.descripcion AS capi_descripcion, capi.idseccion FROM subcapitulo AS subc RIGHT JOIN capitulo AS capi ON subc.idcapitulo = capi.idcapitulo WHERE subc.idsubcapitulo = '$subcap' LIMIT 1 ";
	$rsnsubcapi=$conexpg->query($sqlsubcapi) or die(mysqli_error($conexpg)); 
if($rsnsubcapi->num_rows>0){
	while($rowsubcapi=$rsnsubcapi->fetch_array()){
    $subcapi_desc = $rowsubcapi["subcapi_descripcion"];
    //$capi_desc = $rowsubcapi["capi_descripcion"]." / ".$rowsubcapi["idseccion"]." / ".$rowsubcapi["descripcion_seccion"];
    $capi_desc = $rowsubcapi["capi_descripcion"];
    $capi_seccion = $rowsubcapi["idseccion"].' : '.$rowsubcapi["descripcion_seccion"];
	//$capi_seccion = $rowsubcapi["idseccion"];
    }
    }else{
      $subcapi_desc = "Sin Datos";
      $capi_desc = "Sin Datos";
      $capi_seccion = "Sin Datos";
      }

// mostramos niveles
$sqlni="SELECT niv.codigo, niv.nivel, niv.codigo_cnan, niv.descripcion_nivel FROM arancel_part_nivel AS niv WHERE niv.codigo_cnan = '$correla'";
	$rsni=$conexpg->query($sqlni) or die(mysqli_error($conexpg)); 
if($rsni->num_rows>0){
	while($rowni=$rsni->fetch_array()){
    $cod_ni = $rowni["nivel"];
    }
    }else{
      $cod_ni = "Sin Datos";
      }
      

// consultamos en la tabla CUODE
//$sqlcuo="SELECT cuo.codigo,cuo.descrip,cuo.codnew,cuo.descri_1,cuo.descri_2,cuo.descri_3 FROM part_cuodes AS cuo WHERE cuo.codigo = '$codcuode'";
$sqlcuo="SELECT cuo.idcuode,cuo.clasificacion1,cuo.div,cuo.clasificacion2,cuo.clasificacion3,cuo.clasificacion4 FROM cuode AS cuo WHERE cuo.idcuode = '$codcuode'";
	$rsncuo=$conexpg->query($sqlcuo) or die(mysqli_error($conexpg)); 
if($rsncuo->num_rows>0){
	while($rowcuo=$rsncuo->fetch_array()){
    $cuo_desc = $rowcuo["clasificacion1"].' / '.$rowcuo["clasificacion2"].' / '.$rowcuo["clasificacion4"].' / '.$rowcuo["clasificacion3"];
    }
    }else{
      $cuo_desc = "Sin Datos";
      }

// consultamos en la tabla CIUU
$sqlciiu="SELECT ci.codigo,ci.descrip,ci.fcambio,ci.cusuario FROM arancel_part_ciiu AS ci WHERE ci.codigo = '$codciiu'";
	$rsnciiu=$conexpg->query($sqlciiu) or die(mysqli_error($conexpg)); 
if($rsnciiu->num_rows>0){
	while($rowciiu=$rsnciiu->fetch_array()){
    $ciiu_desc = $rowciiu["descrip"];
    }
    }else{
      $ciiu_desc = "Sin Datos";
      }

// consultamos en la tabla CORRELACION
$sqlcorre="SELECT corre.Codigo_2007,corre.Codigo_2012,corre.Descripcion_2007 FROM arancel_part_correlacion AS corre WHERE corre.Codigo_2012 = '$correla'";
	$rsncorre=$conexpg->query($sqlcorre) or die(mysqli_error($conexpg)); 
if($rsncorre->num_rows>0){
	while($rowcorre=$rsncorre->fetch_array()){
    $corre2007 = $rowcorre["Codigo_2007"];
    $descri2007 = $rowcorre["Descripcion_2007"];
    }
    }else{
      $corre2007 = "Sin Datos";
      $descri2007 = "Sin Datos";
      }
// consultamos en la tabla NANDTASA
$sqlntasa="SELECT nan.cnan,nan.vadv,nan.vigv,nan.visc,nan.tderesp,nan.tdl25784,nan.trs015cfds,nan.tseguros,nan.finitas,nan.ffintas,nan.fmod,nan.cdigmod,nan.dbaselegal,nan.vcomm,nan.tnan,nan.vsob,nan.dobs,nan.fingreso,nan.vbas_max FROM arancel_part_nandtasa AS nan WHERE nan.cnan = '$var' ORDER BY nan.finitas DESC LIMIT 1
";
	$rsntasa=$conexpg->query($sqlntasa) or die(mysqli_error($conexpg)); 
if($rsntasa->num_rows>0){
	while($rowntasa=$rsntasa->fetch_array()){
    
    /*CONSULTAMOS SI TIENE TARIFA DE DERECHO ESPECIFICO*/
    $sqltarifa="SELECT ptasa.cnan, ptasa.tderesp, ptasa.finitas, ptasa.ffintas, deresp.id_lista, deresp.partida, deresp.derecho_esp, deresp.fecha_ini, deresp.fecha_fin, deresp.valor_refer_tn, deresp.tasa_tn FROM arancel_part_nandtasa AS ptasa INNER JOIN cos_dere_esp AS deresp ON ptasa.tderesp = deresp.derecho_esp WHERE ptasa.cnan = '$var' AND ptasa.tderesp <> '' ORDER BY ptasa.finitas DESC, deresp.fecha_ini DESC LIMIT 1";
		$rsntrifa=$conexpg->query($sqltarifa) or die(mysqli_error($conexpg)); 
if($rsntrifa->num_rows>0){
	while($rowntarifa=$rsntrifa->fetch_array()){
    $tarifa_tasatn = $rowntarifa["tasa_tn"];
$tderesp = "Sujeto a Tabla de Franja de Precios USD: ".$tarifa_tasatn."  x TN";
  }
}else{
  $tderesp = "No";
}
/*FIN DE CONSULTAMOS SI TIENE TARIFA DE DERECHO ESPECIFICO*/
    
    $vadv = $rowntasa["vadv"];
    $vigv = $rowntasa["vigv"];
    $visc = $rowntasa["visc"];
    /*$tderesp = $rowntasa["tderesp"];
    if ($tderesp <> " "){
      $tderesp = "Sujeto a Tabla de Franja de Precios";
      }else{
        $tderesp = "No";
      }*/ 
    $tseguros = $rowntasa["tseguros"];
    $dbaselegal = $rowntasa["dbaselegal"];
    $dobs = $rowntasa["dobs"];
    }
    }else{
      $vadv = "Sin Datos";
      $vigv = "Sin Datos";
      $visc = "Sin Datos";
      $tderesp = "Sin Datos";
      $tseguros = "Sin Datos";
      $dbaselegal = "Sin Datos";
        $dobs = "Sin Datos";
      
      }
      
// consultamos en la tabla NANDUNI para mostrar la unidad de medida
$sqlunid="SELECT uni.cnan, uni.uni, uni.finivig, uni.ffinvig FROM arancel_part_nanduni AS uni WHERE uni.cnan = '$var' ORDER BY uni.ffinvig ASC LIMIT 2";
	$rsnuni=$conexpg->query($sqlunid) or die(mysqli_error($conexpg)); 
if($rsnuni->num_rows>0){
	while($rowuni=$rsnuni->fetch_array()){
    $items = $items + 1;
    
    $unidadM = $unidadM." - ".$rowuni["uni"];
    
    }
    }else{
      $unidadM = "Sin Datos";
      
      }


// consultamos en la tabla ADUALIB
$sqlcorre="SELECT corre.Codigo_2007,corre.Codigo_2012,corre.Descripcion_2007 FROM arancel_part_correlacion AS corre WHERE corre.Codigo_2012 = '$correla'";
	$rsncorre=$conexpg->query($sqlcorre) or die(mysqli_error($conexpg)); 
if($rsncorre->num_rows>0){
	while($rowcorre=$rsncorre->fetch_array()){
    $corre2007 = $rowcorre["Codigo_2007"];
    $descri2007 = $rowcorre["Descripcion_2007"];
    }
    }else{
      $corre2007 = "Sin Datos";
      $descri2007 = "Sin Datos";
      }
// consultamos partida restinguida para exportar
$sqlresexpo="SELECT mr.codi_regi, mr.cnan, mr.fini, mr.ffin, mr.desprod, mr.entidad, mr.registro, mr.baseleg, mr.cprod FROM arancel_part_mrestri AS mr WHERE mr.cnan = '$var' AND mr.ffin = '0000-00-00'";
	$rsresexpo=$conexpg->query($sqlresexpo) or die(mysqli_error($conexpg)); 
if($rsresexpo->num_rows>0){
	while($rowresexpo=$rsresexpo->fetch_array()){
    $siresexpo = "Si";
    }
    }else{
      $siresexpo = "No";
      }
//partida sujeto a peco amazonia y Liberan IGV
$sqlpeco="SELECT adu.tlib, adu.clib, adu.cadu, adu.finilib, adu.ffinlib, adu.cnab, adu.vigc, adu.fmod, adu.codgmod, adu.dobs, adua.codadu, adua.descripcion, adua.finicio, adua.ffin, adua.vigencia FROM arancel_part_adualib AS adu LEFT JOIN  aduana AS adua ON adu.cadu = adua.codadu WHERE adu.cnab = '$var' AND adu.ffinlib = '0000-00-00' AND adu.tlib = 'I' GROUP BY adu.tlib, adu.clib, adu.cadu, adu.finilib, adu.ffinlib, adu.cnab, adu.vigc, adu.fmod, adu.codgmod, adu.dobs";
$rsnpeco=$conexpg->query($sqlpeco) or die(mysqli_error($conexpg)); 
if($rsnpeco->num_rows>0){
	while($rowpeco=$rsnpeco->fetch_array()){
    $sipeco = "Si";
    $codclib = $rowpeco["clib"];

    $aduanaM = $aduanaM."  /  ".$rowpeco["descripcion"];
    
    // si tiene datos buscamos en la tabla que lo relaciona TABLIBE
    $sqltb="SELECT tb.tlib, tb.clib, tb.dlib, tb.fviglib, tb.tviglib FROM arancel_part_tablibe AS tb WHERE tb.clib = $codclib";
  $rsntb=$conexpg->query($sqltb) or die(mysqli_error($conexpg)); 
if($rsntb->num_rows>0){
	while($rowtb=$rsntb->fetch_array()){	  
    //$nomtb = $rowtb["dlib"].' Con Fecha Vigencia Desde: '.$rowtb["fviglib"];
    $nomtb = $rowtb["dlib"];
    }
    }else{
      $nomtb = " ";
      }
    
    
    
    }
    }else{
      $sipeco = "No";
      $aduanaM = "Sin Datos";
      }
      
//partida sujeto a PECO
$sqlpeco2="SELECT adul.tlib, adul.clib, adul.finilib, adul.ffinlib, adul.cadu, adul.cnab, adul.vadv, adul.vigv, adul.dobs, adul.vdes, adu.codadu, adu.descripcion, adu.finicio, adu.ffin, adu.vigencia FROM arancel_part_adulibe AS adul INNER JOIN aduana AS adu ON adul.cadu = adu.codadu WHERE adul.cnab = '$var' AND adul.ffinlib = '0000-00-00'
";
$rsnpeco2=$conexpg->query($sqlpeco2) or die(mysqli_error($conexpg)); 
if($rsnpeco2->num_rows>0){
	while($rowpeco2=$rsnpeco2->fetch_array()){
    $sipeco2 = "Si";
    $aduanaM2 = $aduanaM2."  /  ".$rowpeco2["descripcion"].' ('.$rowpeco2["dobs"].') ';
    }
    }else{
      $sipeco2 = "No";
      $aduanaM2 = "Sin Datos";
      }


//Partidas Sujetas a Aladi 504
$sql504="SELECT ala.tlib, ala.clib, ala.cnaladisa, ala.cnan, ala.tmargen, ala.vmp1, ala.vmp2, ala.vmp3, ala.vph1, ala.vph2, ala.vph3, ala.despro, ala.finilib, ala.ffinlib, ala.dobs, ala.vdes, tab.tlib, tab.clib, tab.dlib, tab.fviglib, tab.tviglib FROM arancel_part_aladi504 AS ala LEFT JOIN arancel_part_tablibe AS tab ON ala.clib = tab.clib WHERE ala.cnan = '$var' ";
$rsn504=$conexpg->query($sql504) or die(mysqli_error($conexpg)); 
if($rsn504->num_rows>0){
	while($row504=$rsn504->fetch_array()){
    $ala504x = $row504["cnan"];
    $ala504 = "Si";
    //$descri504 = $row504["dlib"].' Fecha Vigencia desde: '.$row504["fviglib"];
    $descri504 = $row504["dlib"];
    }
    }else{
      $ala504 = "No";
      }
      
//Mercaderia Prohibida de Exportar
$sqlpe="SELECT dem.nnan, dem.cprod, dem.dprod, dem.finipro, dem.ffinpro, dem.baseleg FROM arancel_part_demerpro AS dem WHERE dem.nnan = '$var' ORDER BY dem.finipro DESC LIMIT 1";
	$rsnpe=$conexpg->query($sqlpe) or die(mysqli_error($conexpg)); 
if($rsnpe->num_rows>0){
	while($rowpe=$rsnpe->fetch_array()){
    $parpe = $rowpe["nnan"];
    $partme = "Si";
    $baseleg = $rowpe["baseleg"];
    }
    }else{
      $partme = "No";
      }
      
//Mercaderia Prohibida de Importar
$sqlpi="SELECT dim.cnan, dim.tnan, dim.finicio, dim.ffin, dim.dobs, dim.cpais, dim.sest_merca, dim.ctratfec, dim.codi_aduan, dim.codi_regi, dim.cprod, dim.dprod FROM arancel_part_dimerpro AS dim WHERE dim.cnan = '$var' ORDER BY dim.ffin ASC LIMIT 1 ";
$rsnpi=$conexpg->query($sqlpi) or die(mysqli_error($conexpg)); 
if($rsnpi->num_rows>0){
	while($rowpi=$rsnpi->fetch_array()){
    $parpi = $rowpi["cnan"];
    $partmi = "Si";
    $observapi= $rowpi["dobs"];
    }
    }else{
      $partmi = "No";
      }
      
//Producto exceptuado de las prohibiciones a exportar
// y
//Partidas no Excluida a Restitución de Derechos
$sqlex="SELECT par.cnan, par.codexec, par.descrip, par.finivig, par.ffinvig FROM arancel_part_parnoexc AS par WHERE par.cnan = '$var' ";
$rsnex=$conexpg->query($sqlex) or die(mysqli_error($conexpg)); 
if($rsnex->num_rows>0){
	while($rowex=$rsnex->fetch_array()){
    $parpi = $rowex["cnan"];
    $exceptuado = "Si";
    }
    }else{
      $exceptuado = "No";
      }
      
//Partidas no Excluida a Restitución de Derechos


//otros convenios internacionales
$sqlconv="SELECT ala.tlib, ala.clib, ala.pais, ala.cpaiorige, ala.cnaladisa, ala.cnan, ala.tmargen, ala.tmargen1, ala.tprod, ala.nandina, ala.vmp, ala.vhp, ala.observ, ala.finilib, ala.ffinlib, ala.tienecup, ala.vdes, tab.tlib, tab.clib, tab.dlib, tab.fviglib, tab.tviglib FROM arancel_part_aladlibe AS ala LEFT JOIN arancel_part_tablibe AS tab ON ala.clib = tab.clib WHERE ala.cnan = '$var' AND ala.ffinlib = '0000-00-00' ORDER BY ala.pais ASC";
$rsnconv=$conexpg->query($sqlconv) or die(mysqli_error($conexpg)); 
if($rsnconv->num_rows>0){
	while($rowconv=$rsnconv->fetch_array()){
    $conve_part = $rowconv["cnan"];
    $conve_part = "Si";
    }
    }else{
      $conve_part = "No";
      }
	
	//correlaccion 2012
	$correla2012 ="SELECT co17.partida2012, co17.partida2017, co17.descri_2012 FROM ara_correlacion2017 AS co17 WHERE CONCAT(co17.partida2012,co17.partida2017) LIKE '%$var%'";
	$rsc12=$conexpg->query($correla2012) or die(mysqli_error($conexpg)); 
if($rsc12->num_rows>0){
	while($rw12=$rsc12->fetch_array()){
    $corre12A = $rw12["partida2012"];
	$corre12B = $rw12["descri_2012"];
	}
}else{
	$corre12A = "-";
	$corre12B = "-";
}
	
	//correlaccion 2007
	$correla2007 ="SELECT ara12.partida2007, ara12.partida2012, ara12.descri_2007 FROM ara_correlacion2012 AS ara12 WHERE CONCAT(ara12.partida2007,ara12.partida2012) LIKE '%$var%'";
	$rsc07=$conexpg->query($correla2007) or die(mysqli_error($conexpg)); 
if($rsc07->num_rows>0){
	while($rw07=$rsc07->fetch_array()){
    $corr07A = $rw07["partida2007"];
	$corr07B = $rw07["descri_2007"];
	}
}else{
	$corr07A = "-";
	$corr07B = "-";
}
  ?>
        	<table id="datatables" class='table table-striped table-hover' align='left'style='font-size:80%'>
        	<thead><tr><th>&nbsp;</th><th>&nbsp;</th></tr></thead>
    <tr>
    <td bgcolor='#EBEBEB' colspan="2" align="center"><h5><b><font color="#3366CC">Datos Gesti&oacute;n de Partida <?php echo "$par"; ?></font></b> </h5></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Secciones:</b></td>
    <!--<td><?php// echo htmlentities(strtoupper(utf8_decode("$capi_seccion"))); ?></td>-->
    <td><?php echo "$capi_seccion"; ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Capitulo:</b></td>
    <td><?php echo "$capi_desc"; ?></td>
    </tr>
    <tr>
    	<td colspan="2">
    	<?php
$sqlxxvista="SELECT idarancel, SUBSTRING(idarancel,1,4) AS codigos, descripcion FROM arancel WHERE SUBSTRING(idarancel,1,4) = SUBSTRING('$var',1,4) ORDER BY idarancel ASC";
	$rsxxnv=$conexpg->query($sqlxxvista) or die(mysqli_error($conexpg)); 
if($rsxxnv->num_rows>0){
	echo "<table class='table table-hover'>
<tr>
<td bgcolor='#DDDDDD'><b>#</b></td>
<td bgcolor='#DDDDDD'><b>Codigo</b></td>
<td bgcolor='#DDDDDD'><b>Descripción</b></td>
</tr>";
	while($rowxxv=$rsxxnv->fetch_array()){
		$cue = $cue + 1;
		$codix = $rowxxv["idarancel"];
		$codi = strlen($codix);
		$descri = $rowxxv["descripcion"];
		if($codi=="10" and $codix==$var ){
		echo "<tr style='border: solid 2px #F31D20;'>";
	    echo"<td>$cue</td>";
		echo "<td>$codix </td>";
		echo "<td>$descri </td>";
		echo "</tr>";
	}else{
        echo "<tr>";
		echo"<td>$cue</td>";
		echo "<td>$codix</td>";
		echo "<td>$descri</td>";
		echo "</tr>";
		}

	}
}
echo"</table>";
?>
    		
    	</td>
    </tr>
    <!--<tr>
    <td bgcolor='#EBEBEB' width='150'><b>Partida Sistema Armonizado (SA):</b></td>
    <td><?php echo  "$subcapi_desc"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Subpartida SA y/o NANDINA:</b></td>
    <td><?php echo  "$subparti_nandina"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>C&oacute;digo Subpartida Nacional:</b></td>
    <td><?php echo  "$codpartida"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Descripci&oacute;n de la Subpartida Nacional:</b></td>
    <td><?php echo "$despartida"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Nivel:</b></td>
    <td><?php echo "$cod_ni"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Correlaci&oacute;n 2012:</b></td>
    <td><?php echo "$corre2007"; ?></td>
    </tr>-->
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Fecha Vigencia:</b></td>
    <td><?php echo "$fvigencia"; ?></td>
    </tr>
    
     <!--<tr>
    <td bgcolor='#EBEBEB' width='150'><b>CUODE:</b></td>
    <td><?php echo "$cuo_desc"; ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>CIUU:</b></td>
    <td><?php echo "$ciiu_desc"; ?></td>
    </tr>
    
    <tr>
    <td bgcolor='#EBEBEB' colspan="2" align="center"><h5><b><font color="#3366CC">Derechos Arancelarios (Aplica a la Importaci&oacute;n)</font></b></h5></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Ad/Valorem:</b></td>
    <td><?php echo "$vadv"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Impuesto General a las Ventas:</b></td>
    <td><?php echo "$vigv"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Impuesto Selctivo al Consumo:</b></td>
    <td><?php echo "$visc"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Derecho Especifico:</b></td>
    <td><?php echo "$tderesp"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Seguro de Tabla:</b></td>
    <td><?php echo "$tseguros"; ?></td>
    </tr>-->
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>CUODE 2017:</b></td>
    <td><?php echo "$cuo_desc"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Unidad de Medida:</b></td>
    <td><?php echo "$unidadM"; ?></td>
    </tr>
    <tr>
    	<td colspan="2"><b>CORRELACIONES:</b></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Año 2012: </b></td>
    	<td><?=$corre12A;?> - <?=$corre12B;?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Año 2007: </b></td>
    	<td><?=$corr07A;?> - <?=$corr07B;?></td>
    </tr>
    <!--<tr>
    <td bgcolor='#EBEBEB' width='150'><b>Base Legal:</b></td>
    <td><?php echo "$dbaselegal"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Observaci&oacute;n:</b></td>
    <td><?php echo "$dobs"; ?></td>
    </tr>
     <tr>
    <td colspan="2">&nbsp;&nbsp;</td>
    </tr> 
    
     <tr>
    <td bgcolor='#EBEBEB' colspan="2" align="center"><h5><b><font color="#3366CC">Partidas Sujetas a Peco (Aplica a la Importaci&oacute;n)</font></b></h5></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Partidas Sujeta a Peco:</b></td>
    <td><?php echo "$sipeco2"; ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Aduanas y Base Legal:</b></td>
    <td><?php echo "$aduanaM2"; ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Partidas Sujetas a PECO Y AMAZONIA Liberan IGV:</b></td>
    <td><?php echo "$sipeco - $nomtb"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Aduanas:</b></td>
    <td><?php echo "$aduanaM"; ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' colspan="2" align="center"><h5><b><font color="#3366CC">Datos Adicionales</font></b></h5></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Mercaderia Prohibida de Exportar:</b></td>
    <td><?php echo"$partme - $baseleg"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Mercaderia Prohibida de Importar:</b></td>
    <td><?php "$partmi - $observapi"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Producto Exceptuado de las Prohibiciones a Exportar:</b></td>
    <td><?php echo "$exceptuado"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Partidas no Excluida a Restituci&oacute;n de Derechos:</b></td>
    <td><?php echo "$exceptuado"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Partida Restringida Para Exportar:</b></td>
    <td><?php echo "$siresexpo"; ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' colspan="2" align="center"><h5><b><font color="#3366CC">Partidas Sujetas a Aladi (Aplica a la Importaci&oacute;n)</font></b></h5></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Partidas Sujetas a Aladi:</b></td>
    <td><?php echo "$ala504 -  $descri504"; ?></td>
    </tr>-->
    <!--<tr>
    <td colspan="2">
     <table class='table table-striped table-hover' align='left'style='font-size:100%'>
     <?php
  // si no encuentra datos
  //if($ala504 == "No"){
  ?>
    <tr>
    <td bgcolor='#EBEBEB'>Clib</td> <td bgcolor='#EBEBEB'>Tmargen</td> <td bgcolor='#EBEBEB'>Vmp1</td> <td bgcolor='#EBEBEB'>Vmp2</td> <td bgcolor='#EBEBEB'>Vmp3</td> <td bgcolor='#EBEBEB'>Despro</td> <td bgcolor='#EBEBEB'>Dlib</td>
    </tr>
    <tr>
    <td colspan="7" align="center"> Sin Datos</td>
    </tr>
    <?php
 /*}else{
    
    //Partidas Sujetas a Aladi
$sqlconve="SELECT ala.tlib, ala.clib, ala.cnaladisa, ala.cnan, ala.tmargen, ala.vmp1, ala.vmp2, ala.vmp3, ala.vph1, ala.vph2, ala.vph3, ala.despro, ala.finilib, ala.ffinlib, ala.dobs, ala.vdes, tab.tlib, tab.clib, tab.dlib, tab.fviglib, tab.tviglib FROM arancel_part_aladi504 AS ala LEFT JOIN arancel_part_tablibe AS tab ON ala.clib = tab.clib WHERE ala.cnan = '$var' AND ala.ffinlib = '0000-00-00' ORDER BY ala.vmp1 DESC ";
$rsnconve=$conexpg->query($sqlconve) or die(mysqli_error($conexpg)); 
if($rsnconve->num_rows>0){
	
  echo"<tr>";
    echo"<td bgcolor='#EBEBEB'><b> Clib </b></td>
  <td bgcolor='#EBEBEB'><b>Tmargen </b></td>
  <td bgcolor='#EBEBEB'><b> Vmp1 </b></td> 
  <td bgcolor='#EBEBEB'><b> Vmp2 </b></td> 
  <td bgcolor='#EBEBEB'><b> Vmp3 </b></td> 
  <td bgcolor='#EBEBEB'><b> Despro </b></td>
  <td bgcolor='#EBEBEB'><b> Dlib </b></td>";
   echo"</tr>";
while($rowconve=$rsnconve->fetch_array()){
    $conve_parti = $rowconve["cnan"];
    echo"<tr>";
    echo"<td>".$rowconve["clib"]."</td>";
   echo"<td bgcolor='#EBEBEB'>".$rowconve["tmargen"]."</td>";
    echo"<td>".$rowconve["vmp1"]."</td>";
     echo"<td bgcolor='#EBEBEB'>".$rowconve["vmp2"]."</td>";
      echo"<td>".$rowconve["vmp3"]."</td>";
     echo"<td bgcolor='#EBEBEB'>".$rowconve["despro"]."</td>";
    echo"<td>".$rowconve["dlib"]."</td>";
    }
    }
   }*/
  ?>
    </table>
    </td>
	</tr>-->
     <!--<tr>
    <td bgcolor='#EBEBEB' colspan="2" align="center"><h5><b><font color="#3366CC">Otros Convenios Internacionales (Aplica a la Importaci&oacute;n)</font></b></h5></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Otros Convenios Internacionales:</b></td>
    <td><?php echo "$conve_part"; ?></td>
    </tr>-->
    <!--<tr>
    <td colspan="2">
    <table class='table table-striped table-hover' align='left'style='font-size:100%'>
    <?php
  // si no encuentra datos
  //if($conve_part == "No"){
  ?>
    <tr>
    <td bgcolor='#EBEBEB'>Pa&iacute;s</td> <td bgcolor='#EBEBEB'>Cnaladisa</td> <td bgcolor='#EBEBEB'>Tmargen</td> <td bgcolor='#EBEBEB'>Vmp</td> <td bgcolor='#EBEBEB'>Vdes</td> <td bgcolor='#EBEBEB'>Observ</td>
    <td bgcolor='#EBEBEB'>Dlib</td>
    </tr>
    <tr>
    <td colspan="7" align="center"> Sin Datos</td>
    </tr>
    <?php
  /*}else{
    //otros convenios internacionales muestra la lista
$sqlconve="SELECT ala.tlib, ala.clib, ala.pais, ala.cpaiorige, ala.cnaladisa, ala.cnan, ala.tmargen, ala.tmargen1, ala.tprod, ala.nandina, ala.vmp, ala.vhp, ala.observ, ala.finilib, ala.ffinlib, ala.tienecup, ala.vdes, tab.tlib, tab.clib, tab.dlib, tab.fviglib, tab.tviglib FROM arancel_part_aladlibe AS ala LEFT JOIN arancel_part_tablibe AS tab ON ala.clib = tab.clib WHERE ala.cnan = '$var' AND ala.ffinlib = '0000-00-00' ORDER BY ala.pais ASC";
$rsnconve=$conexpg->query($sqlconve) or die(mysqli_error($conexpg)); 
if($rsnconve->num_rows>0){
	
  echo"<tr>";
    echo"<td bgcolor='#EBEBEB'><b> Pais </b></td>
  <td bgcolor='#EBEBEB'><b> Cnaladisa </b></td>
  <td bgcolor='#EBEBEB'><b> Tmargen </b></td> 
  <td bgcolor='#EBEBEB'><b> Vmp </b></td> 
  <td bgcolor='#EBEBEB'><b> Vdes </b></td> 
  <td bgcolor='#EBEBEB'><b> Observ </b></td>
  <td bgcolor='#EBEBEB'><b> Dlib </b></td>";
   echo"</tr>";
  
  while($rowconve=$rsnconve->fetch_array()){
    $conve_parti = $rowconve["cnan"];
    echo"<tr>";
    echo"<td>".$rowconve["pais"]."</td>";
   echo"<td bgcolor='#EBEBEB'>".$rowconve["cnaladisa"]."</td>";
    echo"<td>".$rowconve["tmargen"]."</td>";
     echo"<td bgcolor='#EBEBEB'>".$rowconve["vmp"]."</td>";
      echo"<td>".$rowconve["vdes"]."</td>";
     echo"<td bgcolor='#EBEBEB'>".$rowconve["observ"]."</td>";
    echo"<td>".$rowconve["dlib"]."</td>";
    }
    }    
    
    }*/
  ?>
		</table>
   </td>
	</tr>-->
    </table>       	
	 </div>
    </div>
                  <div class="col-md-3">
                  <a href="http://www.aduanet.gob.pe/itarancel/arancelS01Alias" class="btn btn-info" target="_blank">Ver Tratamiento<br> Arancelario en SUNAT</a> 
							</div>
                       <div class="col-md-3">
                       <a href="../partida.php?datopartida=<?=$var;?>" class="btn btn-success" target="_blank">Ver Estad&iacute;sticas <br> de Exportaci&oacute;n</a> 
							</div>
                       <div class="col-md-3">
                       <a href="../importacion/busqueda-detallada.php?descri1=<?=$var;?>" class="btn btn-warning" target="_blank">Ver Estad&iacute;sticas <br> de Importaci&oacute;n</a> 
							</div>
                       <div class="col-md-3">
                       <a href="../producto.php" class="btn btn-danger" target="_blank">Buscar en <br> Descripci&oacute;n</a> 
							</div>      	
                        </div>


                      </div>
                    </div>
                    <?php include("../footer.php"); ?>
            </div>
        </div>


    </body>


<?php include("js.php"); ?>	

<!-- Sharrre libray -->
<!--<script src="../js/jquery.sharrre.js"></script>-->
<?php
//cerrando conexion
	mysqli_close($conexpg);
?>
  
</html>
