<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='login/';</script>";
}
}
ini_set('memory_limit','550M');
/*header("Pragma: public");  
header("Expires: 0");  
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
header("Content-Type: application/force-download");  
header("Content-Type: application/octet-stream");  
header("Content-Type: application/download");  
header("Content-Disposition: attachment;filename=Reporte_Importaciones_Detallado.xls ");  
header("Content-Transfer-Encoding: binary ");*/
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte_Exportacion_DetalladoTodos_por_partida".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");

include("incBD/inibd.php");
set_time_limit(950);

//$dato1 = $_GET["dat1"];//año
/*$dato1 = "Todo los Años";//año
$dato2 = $_GET["dat2"];//busqueda
$dato3 = $_GET["dat3"];//partida*/
$partida = $_GET["numpar"];
$empresa = $_GET["emp"];
$depa = $_GET["region"];
$campode = $_GET["bus"];
$pais = $_GET["country"];
$aduana = $_GET["aduana"];
$year = $_GET["selecanios"];

if($year==""){
	$sqlanio = "";
}else{
	$sqlanio = "and YEAR(e.FNUM) = '".$year."'";
}

$condi = $_SESSION['acceso_pago'];
if($condi=='SI' or $condi=='NO' and $_SESSION['rol']=='ADMIN'){//tiene o no pago y es admin visualiza
	$axe = "SI";
	//$limite="";
}else if($condi=='NO' and $_SESSION['rol']<>'ADMIN'){//no tiene pago y no es admin limita 5 registros
	$axe = "NO";
	//$limite="LIMIT 5";
}else if($condi=='SI' and $_SESSION['rol']<>'ADMIN'){//si tiene pago y no es admin visualiza todo
	$axe = "SI";
	//$limite="";
}

date_default_timezone_set("America/Lima");
$fecha_actuals = date("Y-m-d H:m:s");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
      
      <?php
	
	$sqlgral = "SELECT
YEAR(e.FNUM) as anio,
MONTH(e.FNUM) as mes,
e.FNUM,
e.NDCL,
e.CADU,
e.FEMB,
e.NDOC,
e.DNOMBRE,
e.DDIRPRO,
e.UBIGEO,
e.PART_NANDI,
e.NSER,
e.CPAIDES,
e.CPUEDES,
e.CVIATRA,
e.DMAT,
e.NCON,
e.CAGE,
'aa' as agente,
e.CALM,
e.VFOBSERDOL,
e.VPESNET,
e.VPESBRU,
e.QUNIFIS,
e.TUNIFIS,
e.QUNICOM,
e.TUNICOM,
CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) AS dcom,
substring(e.ubigeo,1,2),
substring(e.ubigeo,3,2),
substring(e.ubigeo,5,2),
a.descripcion AS aduana,
em.descripcion AS estmercancia,
p.espanol AS paisdestino,
pu.puerto,
vt.descripcion AS viatransporte,
ba.banco,
'ss' AS sector,
uu.descripcion AS undmedida,
ubi.nombredistrito,
ubi.nombreprov,
ubi.nombredepartamento,
recint_aduaner.razon_social as recinto_aduanero,
(case e.cunitra 
		when '1' then 'BARCO' 
		when '4' then 'AVION' 
		when '6' then 'FERROCARRIL' 
		when '7' then 'CAMION' 
		when '8' then 'POR TUBERIAS' 
	else 'OTRAS' end) as unidadtransporte,
(case e.vpesnet when 0 then 0 else (e.vfobserdol/e.vpesnet) end) as pesounitkg,
	(case e.qunifis when 0 then 0 else (e.vfobserdol/e.qunifis) end) as preciounitxundmedida,
	(case e.qunicom when 0 then 0 else (e.vfobserdol/e.qunicom) end) as preciounitxunidcomercial,
	(case e.vpesnet when 0 then 0 else (e.vpesbru/e.vpesnet) end) as pesoenvaseyembalaje
FROM
exportacion AS e
LEFT JOIN aduana AS a ON e.CADU = a.codadu
LEFT JOIN estmercancia AS em ON e.CEST = em.idestmercancia
LEFT JOIN paises AS p ON e.CPAIDES = p.idpaises
LEFT JOIN puerto AS pu ON e.CPUEDES = pu.idcodigo
LEFT JOIN viastransporte AS vt ON e.CVIATRA = vt.idviastransporte
LEFT JOIN banco AS ba ON substring(e.centfin,2,2)= ba.idbanco
LEFT JOIN unidmedida AS uu ON e.TUNIFIS = uu.idunidmedida
LEFT JOIN ubigeo AS ubi ON e.UBIGEO = ubi.cubigeo
LEFT JOIN (select idrecintaduaner, razon_social from recintaduaner group by idrecintaduaner, razon_social)as recint_aduaner On (recint_aduaner.idrecintaduaner=e.calm)
WHERE

e.PART_NANDI like '%".$partida."%'
  $sqlanio 
  /*and MONTH(".$wherefecha1.") like '%".$mes."%'*/
	and e.CADU like '%".$aduana."%'
	and e.NDOC like '%".$empresa."%'
	and substring(e.UBIGEO,1,2) like '%".$depa."%'
	and substring(e.UBIGEO,3,2) like '%'
	and substring(e.UBIGEO,5,2) like '%'
and CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%".$campode."%'	
	and e.CPAIDES like '%".$pais."%'
	and e.CPUEDES like '%'
	and e.CUNITRA like '%'
	and e.CVIATRA like '%'
	and e.CAGE like '%'
	and e.TUNIFIS like '%'
	and e.TUNICOM like '%'  LIMIT 300000  ";
	
$res_gral=$conexpg->query($sqlgral); 
	
	  ?>
<table cellspacing="0" cellpadding="0" width="100%" style="font-size:12px;">
<tr>
<td colspan="33" ><b><font size="+2"><b>Reporte datallado de Exportacion</b><br> <?php echo"AÑO: Todos - PARTIDA: $partida - <b> PALABRA BUSCADA:</b> $campode <br> Fecha Consulta: $fecha_actuals <br>FUENTE: SUNAT <br> PROCESADO POR: WWW.AZATRADE.INFO"; ?> </font></b></td>
</tr>
   <tr style='background-color: #9C9999; color: #FFFFFF;'>   
      <th style='border-style: solid;font-size: 15px;'>#</th>
   <th style='border-style: solid;font-size: 15px;'>A&ntilde;o</th>
   <th style='border-style: solid;font-size: 15px;'>Fecha</th>
   <th style='border-style: solid;font-size: 15px;'>Aduana</th>
   <?php
if($axe == "SI"){
   echo"<th style='border-style: solid;font-size: 15px;'>Dua</th>";
}
	   ?>
   <th style='border-style: solid;font-size: 15px;'>N#. Doc.</th>
   <th style='border-style: solid;font-size: 15px;'>Empresa</th>
   <th style='border-style: solid;font-size: 15px;'>Direcci&oacute;n</th>
   <th style='border-style: solid;font-size: 15px;'>Departamento</th>
   <th style='border-style: solid;font-size: 15px;'>Provincia</th>
   <th style='border-style: solid;font-size: 15px;'>Distrito</th>
   <th style='border-style: solid;font-size: 15px;'>N#. Partida</th>
   <th style='border-style: solid;font-size: 15px;'>Descrip.&nbsp;Prod.</th>
   <th style='border-style: solid;font-size: 15px;'>Pais</th>
   <th style='border-style: solid;font-size: 15px;'>Puerto</th>
   <th style='border-style: solid;font-size: 15px;'>Via Transp.</th>
   <th style='border-style: solid;font-size: 15px;'>Unid. Transp.</th>
   <th style='border-style: solid;font-size: 15px;'>Descrip. Transp.</th>
   <th style='border-style: solid;font-size: 15px;'>Agente</th>
   <th style='border-style: solid;font-size: 15px;'>Recinto Aduanero</th>
   <th style='border-style: solid;font-size: 15px;'>Banco</th>
   <th style='border-style: solid;font-size: 15px;'>Valor Fob.</th>
   <th style='border-style: solid;font-size: 15px;'>Peso Neto</th>
   <th style='border-style: solid;font-size: 15px;'>Peso Bruto</th>
   <th style='border-style: solid;font-size: 15px;'>Cant. Exportada</th>
   <th style='border-style: solid;font-size: 15px;'>Unid. Medida</th>
   <th style='border-style: solid;font-size: 15px;'>Cant. Comercial(Kg)</th>
   <th style='border-style: solid;font-size: 15px;'>Unid. Comerc.</th>
   <th style='border-style: solid;font-size: 15px;'>Precio Unit.(x Kg)</th>
   <th style='border-style: solid;font-size: 15px;'>Precio Unit. (x Unid.Med.)</th>
   <th style='border-style: solid;font-size: 15px;'>Precio Unit. (x Unid.Comerc.)</th>
   <th style='border-style: solid;font-size: 15px;'>Peso (Envase/Embalaje)</th>
   <th style='border-style: solid;font-size: 15px;'>Sector</th>
                          </tr>
 <?php
	
if($res_gral->num_rows>0){
	while($fila_parti=$res_gral->fetch_array()){ 
			  $itte = $itte + 1;
		   $annio = $fila_parti['anio'];
	  $fecha = $fila_parti['FNUM'];
	   $adua = $fila_parti['aduana'];
	   $numdua = $fila_parti['NDCL'];
	    $numdoc = $fila_parti['NDOC'];
		 $nomempresa = $fila_parti['DNOMBRE'];
		 $direempresa = $fila_parti['DDIRPRO'];
		 //$ubigeoempresa = $fila_parti['ubigeo2'];
			 $ubigeoempresa = $fila_parti['nombredepartamento'];
			  $ubigeoprovi = $fila_parti['nombreprov'];
			  $ubigeodistri = $fila_parti['nombredistrito'];
		 $num_partida = $fila_parti['PART_NANDI'];
		 $descri_produ = $fila_parti['dcom'];
		 $pais_des = $fila_parti['paisdestino'];
		 $puerto_descri = $fila_parti['puerto'];
		 $via_transp = $fila_parti['viatransporte'];
		 $uni_transp = $fila_parti['unidadtransporte'];
		 
		 $descri_mat = $fila_parti['DMAT'];
	$cod_agente = $fila_parti['CAGE'];
		 //$nom_agente = $fila_parti['agente'];
		 $nom_aduanero = $fila_parti['recinto_aduanero'];
		 $nom_banco = $fila_parti['banco'];
		 $valor_fob = number_format($fila_parti['VFOBSERDOL'],2); 
		 $valor_net = number_format($fila_parti['VPESNET'],2);
		 $valor_bru = number_format($fila_parti['VPESBRU'],2);
		 $valor_A = number_format($fila_parti['QUNIFIS'],2);
		 $nom_unidad = $fila_parti['undmedida'];
		 $valor_B = number_format($fila_parti['QUNICOM'],2);
		 $unid_comer = $fila_parti['TUNIFIS'];
		 $peso_unit = number_format($fila_parti['pesounitkg'],2);
		 $precio_unitmed = number_format($fila_parti['preciounitxundmedida'],2);
		 $precio_unitcomerc = number_format($fila_parti['preciounitxunidcomercial'],2);
		 $peso_envemb = number_format($fila_parti['pesoenvaseyembalaje'],2);
		 //$nom_sector = $fila_parti['sector'];
			 
			 //consultanos sector
	$sqlsecto = "SELECT partida FROM sector where='$num_partida' ";
	$rsce=$conexpg->query($sqlsecto); 
if($rsce->num_rows>0){ 
while($rws=$rsce->fetch_array()){ 
	$nom_sector = $rws['sector'];
}
}else{
	$nom_sector = "---";
}
	//consultanos agente
	$sqlage = "select aa.agencia from agente aa where aa.idagente = '$cod_agente' limit 1";
	$rsage=$conexpg->query($sqlage); 
if($rsage->num_rows>0){ 
while($rwage=$rsage->fetch_array()){ 
	$nom_agente = $rwage['agente'];
}
}else{
	$nom_agente = "---";
}
			  
		echo"<tr>";
	    echo '<td>&nbsp;</td>';
   echo '<td>'.$annio.'</td>';
   echo '<td>'.$fecha.'</td>';
   echo '<td>'.$adua.'</td>';
			  if($axe == "SI"){
   echo '<td>'.$numdua.'</td>';
			  }
   echo '<td>'.$numdoc.'</td>';
   echo '<td>'.$nomempresa.'</td>';
   echo '<td>'.$direempresa.'</td>';
   echo '<td>'.$ubigeoempresa.'</td>';
   echo '<td>'.$ubigeoprovi.'</td>';
   echo '<td>'.$ubigeodistri.'</td>';
   echo '<td>'.$num_partida.'</td>';
   echo '<td>'.$descri_produ.'</td>';
   echo '<td>'.$pais_des.'</td>';
   echo '<td>'.$puerto_descri.'</td>';
   echo '<td>'.$via_transp.'</td>';
   echo '<td>'.$uni_transp.'</td>';
   echo '<td>'.$descri_mat.'</td>';
   echo '<td>'.$nom_agente.'</td>';
   echo '<td>'.$nom_aduanero.'</td>';
   echo '<td>'.$nom_banco.'</td>';
   echo '<td>'.$valor_fob.'</td>';
   echo '<td>'.$valor_net.'</td>';
   echo '<td>'.$valor_bru.'</td>';
   echo '<td>'.$valor_A.'</td>';
   echo '<td>'.$nom_unidad.'</td>';
   echo '<td>'.$valor_B.'</td>';
   echo '<td>'.$unid_comer.'</td>';
   echo '<td>'.$peso_unit.'</td>';
   echo '<td>'.$precio_unitmed.'</td>';
   echo '<td>'.$precio_unitcomerc.'</td>';
   echo '<td>'.$peso_envemb.'</td>';
   echo '<td>'.$nom_sector.'</td>';
		echo"</tr>";
  }
  }else{
	  echo "<h3>No Hay Informaci&oacute;n en la Busqueda</h3>";
	  }
 ?>
</table>

</body>
</html>