<?php
ini_set('memory_limit','128M');
header("Pragma: public");  
header("Expires: 0");  
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
header("Content-Type: application/force-download");  
header("Content-Type: application/octet-stream");  
header("Content-Type: application/download");  
header("Content-Disposition: attachment;filename=Reporte_Importaciones_azatrade.xls ");  
header("Content-Transfer-Encoding: binary ");

include("../incBD/inibd.php");
set_time_limit(950);

$year=$_GET['selecanios'];
if($year == trim("")){
	$year="%";
}else{
	$year=$_GET['selecanios'];
}

$mes = $_GET['selecmes'];
if($mes==""){
	$mes="%";
	$filtromes="";
}else{
if($mes=='1'){$des_mes=" - <b>Mes :</b> Enero";}else
if($mes=='2'){$des_mes=" - <b>Mes :</b> Febrero";}else
if($mes=='3'){$des_mes=" - <b>Mes </b>: Marzo";}else
if($mes=='4'){$des_mes=" - <b>Mes :</b> Abril";}else
if($mes=='5'){$des_mes=" - <b>Mes :</b> Mayo";}else
if($mes=='6'){$des_mes=" - <b>Mes :</b> Junio";}else
if($mes=='7'){$des_mes=" - <b>Mes :</b> Julio";}else
if($mes=='8'){$des_mes=" - <b>Mes :</b> Agosto";}else
if($mes=='9'){$des_mes=" - <b>Mes :</b> Septiembre";}else
if($mes=='10'){$des_mes=" - <b>Mes :</b> Octubre";}else
if($mes=='11'){$des_mes=" - <b>Mes :</b> Noviembre";}else
if($mes=='12'){$des_mes=" - <b>Mes :</b> Diciembre";}
	
	$filtromes="MONTH(i.fech_ingsi) = '$mes' AND";
}

$descri1 = trim($_GET['descri1']);
if($descri1==trim("")){
	$campode = "%";
}else{
	$campode = $_GET['descri1'];
}

$empresa = $_GET['ruce'];
if($empresa==trim("")){
$empresa="%";
$valempre = "";
}else{
$empresa = $_GET['ruce'];
$valempre = " - <b>Empresa: </b> ".$wv5;
}

$pais = $_GET['pais'];
if($pais==trim("")){
$pais="%";
}else{
$pais = $_GET['pais'];
}

$aduana = $_GET['aduana'];
if($aduana==trim("")){
$aduana="%";
}else{
$aduana = $_GET['aduana'];
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
     
<!-- DIV DONDE SE MOSTRARÁ  LA TABLA DE CONTENIDOS -->
     <!--  <div id="contenido"></div> -->
      
      <?php
/*$sqlt="SELECT
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

WHERE
YEAR(i.fech_ingsi) = '$year' AND
$filtromes
i.libr_tribu LIKE '%$empresa%' AND
i.pais_orige LIKE '%$pais%' AND
i.codi_aduan LIKE '%$aduana%' AND
CONCAT(i.desc_comer, i.desc_matco, i.desc_usoap, i.desc_fopre, i.desc_otros, i.part_nandi) LIKE '%$campode%'";*/
	
	$sqlt="SELECT
i.id,
i.codi_aduan,
i.descripcion,
i.ano_prese,
i.nume_corre,
i.fech_ingsi,
i.tipo_docum,
i.libr_tribu,
i.dnombre,
i.codi_agent,
i.fech_llega,
i.viatransp,
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
i.pais1,
i.pais_adqui,
i.pais2,
i.puer_embar,
i.puerto,
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
vista_importacion AS i
WHERE
YEAR(i.fech_ingsi) = '$year' AND
MONTH(i.fech_ingsi) like '%$mes%' AND
i.libr_tribu LIKE '%$empresa%' AND
i.pais_orige LIKE '%$pais%' AND
i.codi_aduan LIKE '%$aduana%' AND
CONCAT(i.desc_comer, i.desc_matco, i.desc_usoap, i.desc_fopre, i.desc_otros, i.part_nandi) LIKE '%$campode%'";
	
$resultado1=$conexpg->query($sqlt); 
	
	//consultanos pais
	$sqlpa = "select espanol from paises where idpaises = '$pais' limit 1";
	$rspai=$conexpg->query($sqlpa); 
if($rspai->num_rows>0){ 
while($rwpai=$rspai->fetch_array()){ 
	$nomcou = " - <b>Pais :</b> ".$rwpai['espanol'];
}
}
	
	//consultanos aduanas
	$sqldua = "select codadu, descripcion from aduana where codadu = '$aduana' limit 1";
	$rsdua=$conexpg->query($sqldua); 
if($rsdua->num_rows>0){ 
while($rwdua=$rsdua->fetch_array()){ 
	$nomdua = " - <b>Aduanas :</b> ".$rwdua['descripcion'];
}
}
	
	  ?>
<table cellspacing="0" cellpadding="0" width="100%" style="font-size:12px;">
<tr>
<td colspan="61" align="center"><b><font size="+2"><b>Reporte data Importaciones</b><br> <?php echo"$year $des_mes $nomcou $nomdua $valempre - <b>Busqueda:</b> $campode"; ?> </b></font></b></td>
</tr>
   <tr style='background-color: #9C9999; color: #FFFFFF;'>
   <th style='border-style: solid;font-size: 15px;'><b>#</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Codigo</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Aduana</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Año&nbsp;DUI</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Numero&nbsp;DUI</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Fecha&nbsp;Num.&nbsp;DUI</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Tipo&nbsp;Docum.</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Numero&nbsp;Docum.</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Razon&nbsp;Social</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Codigo</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Agente&nbsp;Aduana</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Fecha&nbsp;LLegada</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Codigo</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Via&nbsp;Transp.</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Codigo&nbsp;Transp.</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Cod.&nbsp;Almacen</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Aduana&nbsp;Manifiesto</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Año&nbsp;Manifiesto</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Num.&nbsp;Manifiesto</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Fecha&nbsp;Recepcion</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Fecha&nbsp;Cancelacion</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Tipo&nbsp;Cancelacion</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Cod.&nbsp;Banco&nbsp;Canc.</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Cod.&nbsp;Entidad&nbsp;Financ.</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Indicador&nbsp;Teledespacho</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Codigo</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Pais&nbsp;Origen</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Codigo</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Pais&nbsp;Adquisicion</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Codigo</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Puerto&nbsp;Embarque</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Numero&nbsp;Serie</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Partida</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Descripcion&nbsp;Comercial</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Valor&nbsp;Fob</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Valor&nbsp;Flete</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Valor&nbsp;Seguro</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Peso&nbsp;Neto</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Peso&nbsp;Bruto</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Cant.&nbsp;Importada</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Und.&nbsp;Medida</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Cant.&nbsp;Unid.&nbsp;Comerc.</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Tipo&nbsp;Und.&nbsp;Comerc.</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Estado&nbsp;Mercancia</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>ADV&nbsp;Dolar&nbsp;por&nbsp;Partida</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>IGV&nbsp;Dolar&nbsp;por&nbsp;Partida</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>ISC&nbsp;Dolar&nbsp;por&nbsp;Partida</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>IPM&nbsp;Dolar&nbsp;por&nbsp;Partida</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Derecho&nbsp;Partida</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>IMP&nbsp;Promocion</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Sobretasa&nbsp;por&nbsp;Partida</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Derecho&nbsp;Antidumping&nbsp;Partida</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Commodities&nbsp;Partida</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Fecha&nbsp;Modifica</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Cant.&nbsp;Bultos</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Clase&nbsp;Bultos</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Trato&nbsp;Preferencial</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Tipo&nbsp;Tratamiento</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Cod.&nbsp;Liberatorio</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Ind.&nbsp;Liquidacion</b></th>
                          </tr>
 <?php
  if($resultado1->num_rows>0){ 
  while($row=$resultado1->fetch_array()){
	  $itte = $itte + 1;
		   $impor1 = $row['codi_aduan'];
		   $impor2 = $row['descripcion'];
	       $impor3 = $row['ano_prese'];
	       $impor4 = $row['nume_corre'];
	       $impor5 = $row['fech_ingsi'];
		   $impor6 = $row['tipo_docum'];
		   $impor7 = $row['libr_tribu'];
		   $impor8 = $row['dnombre'];
		   $impor9 = $row['codi_agent']; //consutar el codigo en la tabla agente
		   $impor10 = $row['fech_llega'];
		   $impor11 = $row['via_transp'];
		   $impor12 = $row['viatransp'];
		   $impor13 = $row['empr_trans'];
		   $impor14 = $row['codi_alma'];
		   $impor15 = $row['cadu_manif'];
		   $impor16 = $row['fech_manif'];
		   $impor17 = $row['nume_manif'];
	       $impor18 = $row['fech_recep'];
		   $impor19 = $row['fech_cance'];
		   $impor20 = $row['tipo_cance'];
		 /*$valor_fob = number_format($row['VFOBSERDOL'],2); 
		 $valor_net = number_format($row['VPESNET'],2);
		 $valor_bru = number_format($row['VPESBRU'],2);
		 $valor_A = number_format($row['QUNIFIS'],2);*/
		  $impor21 = $row['banc_cance'];
		  $impor22 = $row['codi_enfin'];
		  $impor23 = $row['dk'];
		  $impor24 = $row['pais_orige'];
		  $impor25 = $row['pais1'];
	      $impor26 = $row['pais_adqui'];
		  $impor27 = $row['pais2'];
		  $impor28 = $row['puer_embar'];
		  $impor29 = $row['puerto'];
		  $impor30 = $row['nume_serie'];
			 $impor31 = $row['part_nandi'];
			 $impor32 = $row['desc_comer'];
			 $impor33 = $row['desc_matco'];
			 $impor34 = $row['desc_usoap'];
			 $impor35 = $row['desc_fopre'];
			 $impor36 = $row['desc_otros'];
			 $impor37 = number_format($row['fob_dolpol'],2);
			 $impor38 = number_format($row['fle_dolar'],2);
			 $impor39 = number_format($row['seg_dolar'],2);
			 $impor40 = number_format($row['peso_neto'],2);
			 $impor41 = number_format($row['peso_bruto'],2);
			 $impor42 = number_format($row['unid_fiqty'],2);
			 $impor43 = $row['unid_fides'];
			 $impor44 = number_format($row['qunicom'],2);//CANTIDAD DE UNIDAD COMERCIAL
			 $impor45 = $row['tunicom'];
			 $impor46 = $row['sest_merca'];
			 $impor47 = number_format($row['adv_dolar'],2);
			 $impor48 = number_format($row['igv_dolar'],2);
			 $impor49 = number_format($row['isc_dolar'],2);
			 $impor50 = number_format($row['ipm_dolar'],2);
			 $impor51 = number_format($row['des_dolar'],2);
			 $impor52 = number_format($row['ipa_dolar'],2);
			 $impor53 = number_format($row['sad_dolar'],2);
			 $impor54 = number_format($row['der_adum'],2);
			 $impor55 = number_format($row['comm'],2);
			 $impor56 = $row['fmod'];
			 $impor57 = number_format($row['cant_bulto'],2);
			 $impor58 = $row['clase'];
			 $impor59 = $row['trat_prefe'];
			 $impor60 = $row['tipo_trat'];
			 $impor61 = $row['codi_liber'];
			 $impor62 = $row['impr_reliq'];
				
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
   echo '<td>'.$itte.'</td>';
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
  }else{
	  echo "<h3>No Hay Informaci&oacute;n en la Busqueda</h3>";
	  }
 ?>
</table>

</body>
</html>