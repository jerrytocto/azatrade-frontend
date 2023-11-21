<?php
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
header("Content-Disposition: attachment; filename=Reporte_Importaciones_DetalladoTodos".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");

include("../incBD/inibd.php");
set_time_limit(950);

//$dato1 = $_GET["dat1"];//año
$dato1 = "Todo los Años";//año
$dato2 = $_GET["dat2"];//busqueda
$dato3 = $_GET["dat3"];//partida

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
	
	/*$sqlt="SELECT i.*
FROM vista_importacion AS i
WHERE
YEAR(i.fech_ingsi) = '$dato1' AND
i.part_nandi = '$dato3' AND
CONCAT(i.desc_comer, i.desc_matco, i.desc_usoap, i.desc_fopre, i.desc_otros, i.part_nandi) LIKE '%$dato2%'";*/
	
	$sqlt = "select i.id AS id, i.codi_aduan AS codi_aduan,a.descripcion AS descripcion, i.ano_prese AS ano_prese, i.nume_corre AS nume_corre, i.fech_ingsi AS fech_ingsi, i.tipo_docum AS tipo_docum, i.libr_tribu AS libr_tribu, i.dnombre AS dnombre, i.codi_agent AS codi_agent, i.fech_llega AS fech_llega, i.via_transp AS via_transp, (case i.via_transp when '1' then 'BARCO' when '4' then 'AVION' when '6' then 'FERROCARRIL' when '7' then 'CAMION' when '8' then 'POR TUBERIAS' else 'OTRAS' end) AS viatransp, i.empr_trans AS empr_trans, i.codi_alma AS codi_alma, i.cadu_manif AS cadu_manif, i.fech_manif AS fech_manif, i.nume_manif AS nume_manif, i.fech_recep AS fech_recep, i.fech_cance AS fech_cance, i.tipo_cance AS tipo_cance, i.banc_cance AS banc_cance, i.codi_enfin AS codi_enfin, i.dk AS dk, i.pais_orige AS pais_orige, p1.espanol AS pais1, i.pais_adqui AS pais_adqui, p2.espanol AS pais2, i.puer_embar AS puer_embar, pu.puerto AS puerto, i.nume_serie AS nume_serie, i.part_nandi AS part_nandi, i.desc_comer AS desc_comer, i.desc_matco AS desc_matco, i.desc_usoap AS desc_usoap, i.desc_fopre AS desc_fopre, i.desc_otros AS desc_otros, i.fob_dolpol AS fob_dolpol, i.fle_dolar AS fle_dolar, i.seg_dolar AS seg_dolar, i.peso_neto AS peso_neto, i.peso_bruto AS peso_bruto, i.unid_fiqty AS unid_fiqty,i.unid_fides AS unid_fides,i.qunicom AS qunicom,i.tunicom AS tunicom,i.sest_merca AS sest_merca,i.adv_dolar AS adv_dolar,i.igv_dolar AS igv_dolar,i.isc_dolar AS isc_dolar,i.ipm_dolar AS ipm_dolar,i.des_dolar AS des_dolar,i.ipa_dolar AS ipa_dolar,i.sad_dolar AS sad_dolar,i.der_adum AS der_adum,i.comm AS comm,i.fmod AS fmod,i.cant_bulto AS cant_bulto,i.clase AS clase,i.trat_prefe AS trat_prefe,i.tipo_trat AS tipo_trat,i.codi_liber AS codi_liber,i.impr_reliq AS impr_reliq,i.accion AS accion,i.fechareg AS fechareg,i.fechamodi AS fechamodi from ((((importacion i left join aduana a on((i.codi_aduan = a.codadu))) left join paises p1 on((i.pais_orige = p1.idpaises))) left join paises p2 on((i.pais_adqui = p2.idpaises))) left join puerto pu on((i.puer_embar = pu.idcodigo))) WHERE i.part_nandi = '$dato3' AND CONCAT(i.desc_comer, i.desc_matco, i.desc_usoap, i.desc_fopre, i.desc_otros, i.part_nandi) LIKE '%$dato2%' LIMIT 300000";
	
	/*$sqlt = "select i.id AS id, i.codi_aduan AS codi_aduan,a.descripcion AS descripcion, i.ano_prese AS ano_prese, i.nume_corre AS nume_corre, i.fech_ingsi AS fech_ingsi, i.tipo_docum AS tipo_docum, i.libr_tribu AS libr_tribu, i.dnombre AS dnombre, i.codi_agent AS codi_agent, i.fech_llega AS fech_llega, i.via_transp AS via_transp, (case i.via_transp when '1' then 'BARCO' when '4' then 'AVION' when '6' then 'FERROCARRIL' when '7' then 'CAMION' when '8' then 'POR TUBERIAS' else 'OTRAS' end) AS viatransp, i.empr_trans AS empr_trans, i.codi_alma AS codi_alma, i.cadu_manif AS cadu_manif, i.fech_manif AS fech_manif, i.nume_manif AS nume_manif, i.fech_recep AS fech_recep, i.fech_cance AS fech_cance, i.tipo_cance AS tipo_cance, i.banc_cance AS banc_cance, i.codi_enfin AS codi_enfin, i.dk AS dk, i.pais_orige AS pais_orige, p1.espanol AS pais1, i.pais_adqui AS pais_adqui, p2.espanol AS pais2, i.puer_embar AS puer_embar, pu.puerto AS puerto, i.nume_serie AS nume_serie, i.part_nandi AS part_nandi, i.desc_comer AS desc_comer, i.desc_matco AS desc_matco, i.desc_usoap AS desc_usoap, i.desc_fopre AS desc_fopre, i.desc_otros AS desc_otros, i.fob_dolpol AS fob_dolpol, i.fle_dolar AS fle_dolar, i.seg_dolar AS seg_dolar, i.peso_neto AS peso_neto, i.peso_bruto AS peso_bruto, i.unid_fiqty AS unid_fiqty,i.unid_fides AS unid_fides,i.qunicom AS qunicom,i.tunicom AS tunicom,i.sest_merca AS sest_merca,i.adv_dolar AS adv_dolar,i.igv_dolar AS igv_dolar,i.isc_dolar AS isc_dolar,i.ipm_dolar AS ipm_dolar,i.des_dolar AS des_dolar,i.ipa_dolar AS ipa_dolar,i.sad_dolar AS sad_dolar,i.der_adum AS der_adum,i.comm AS comm,i.fmod AS fmod,i.cant_bulto AS cant_bulto,i.clase AS clase,i.trat_prefe AS trat_prefe,i.tipo_trat AS tipo_trat,i.codi_liber AS codi_liber,i.impr_reliq AS impr_reliq,i.accion AS accion,i.fechareg AS fechareg,i.fechamodi AS fechamodi from ((((importacion i left join aduana a on((i.codi_aduan = a.codadu))) left join paises p1 on((i.pais_orige = p1.idpaises))) left join paises p2 on((i.pais_adqui = p2.idpaises))) left join puerto pu on((i.puer_embar = pu.idcodigo))) WHERE YEAR(i.fech_ingsi) = '$dato1' AND i.part_nandi = '$dato3' AND CONCAT(i.desc_comer, i.desc_matco, i.desc_usoap, i.desc_fopre, i.desc_otros, i.part_nandi) LIKE '%$dato2%'";*/
	
$resultado1=$conexpg->query($sqlt); 
	
	  ?>
<table cellspacing="0" cellpadding="0" width="100%" style="font-size:12px;">
<tr>
<td colspan="60" ><b><font size="+2"><b>Reporte datallado de Importaciones</b><br> <?php echo"AÑO: $dato1 PARTIDA: $dato3 - <b> PALABRA BUSCADA:</b> $dato2 <br> Fecha Consulta: $fecha_actuals <br>FUENTE: SUNAT <br> PROCESADO POR: WWW.AZATRADE.INFO"; ?> </font></b></td>
</tr>
   <tr style='background-color: #9C9999; color: #FFFFFF;'>
   <th style='border-style: solid;font-size: 15px;'>Nª</th>
   <th style='border-style: solid;font-size: 15px;'>C&Oacute;DIGO</th>
   <th style='border-style: solid;font-size: 15px;'>ADUANA</th>
   <th style='border-style: solid;font-size: 15px;'>ANO&nbsp;DUI</th>
   <th style='border-style: solid;font-size: 15px;'>N&Uacute;MERO&nbsp;DUI</th>
   <th style='border-style: solid;font-size: 15px;'>FECHA&nbsp;NUM.&nbsp;DUI</th>
   <th style='border-style: solid;font-size: 15px;'>TIPO&nbsp;DOCU.&nbsp;M.</th>
   <th style='border-style: solid;font-size: 15px;'>RUC</th>
   <th style='border-style: solid;font-size: 15px;'>RAZON&nbsp;SOCIAL&nbsp;IMPORTADOR</th>
   <th style='border-style: solid;font-size: 15px;'>C&Oacute;DIGO</th>
   <th style='border-style: solid;font-size: 15px;'>AGENTE&nbsp;ADUANA</th>
   <th style='border-style: solid;font-size: 15px;'>FECHA&nbsp;LLEGADA DE&nbsp;NAVE</th>
   <th style='border-style: solid;font-size: 15px;'>C&Oacute;DIGO V&Iacute;A&Oacute;TRANSP.</th>
   <th style='border-style: solid;font-size: 15px;'>V&Iacute;A&nbsp;DE&nbsp;TRANSP.</th>
   <th style='border-style: solid;font-size: 15px;'>C&Oacute;DIGO&nbsp;EMPRESA DE&nbsp;TRANSPORTE</th>
   <th style='border-style: solid;font-size: 15px;'>C&Oacute;DIGO&nbsp;ALMAC&Eacute;N</th>
   <th style='border-style: solid;font-size: 15px;'>ADUANA&nbsp;MANIFIESTO</th>
   <th style='border-style: solid;font-size: 15px;'>AÑO&nbsp;MANIFIESTO</th>
   <th style='border-style: solid;font-size: 15px;'>N&Uacute;MERO.&nbsp;MANIFIESTO</th>
   <th style='border-style: solid;font-size: 15px;'>FECHA&nbsp;RECEPCI&Oacute;N DE&nbsp;DUI</th>
   <th style='border-style: solid;font-size: 15px;'>FECHA&nbsp;CANCELACI&Oacute;N</th>
   <th style='border-style: solid;font-size: 15px;'>TIPO&nbsp;CANCELACI&Oacute;N</th>
   <th style='border-style: solid;font-size: 15px;'>C&Oacute;DIGO&nbsp;BANCO CANCELACI&Oacute;N</th>
   <th style='border-style: solid;font-size: 15px;'>C&Oacute;DIGO&nbsp;ENTIDAD FINANCIERA</th>
   <th style='border-style: solid;font-size: 15px;' >INDICADOR&nbsp;TELEDESPACHO</th>
   <th style='border-style: solid;font-size: 15px;'>C&Oacute;DIGO&nbsp;PA&Iacute;S ORIGEN</th>
   <th style='border-style: solid;font-size: 15px;'>PA&Iacute;S&nbsp;ORIGEN</th>
   <th style='border-style: solid;font-size: 15px;'>C&Oacute;DIGO&nbsp;PAIS&nbsp;ADQ</th>
   <th style='border-style: solid;font-size: 15px;'>PA&Iacute;S&nbsp;ADQUISICI&Oacute;N</th>
   <th style='border-style: solid;font-size: 15px;'>C&Oacute;DIGO&nbsp;PUERTO</th>
   <th style='border-style: solid;font-size: 15px;'>PUERTO&nbsp;EMBARQUE</th>
   <th style='border-style: solid;font-size: 15px;'>N&Uacute;MERO&nbsp;SERIE</th>
   <th style='border-style: solid;font-size: 15px;' >PARTIDA</th>
   <!--<th>Descripcion&nbsp;Comercial</th>-->
   <th style='border-style: solid;font-size: 15px;'>DESCRIPCI&Oacute;N&nbsp;COMERCIAL</th>
   <th style='border-style: solid;font-size: 15px;'>MATERIAL&nbsp;DE ELABORACI&Oacute;N</th>
   <th style='border-style: solid;font-size: 15px;' >USO</th>
   <th style='border-style: solid;font-size: 15px;'>PRESENTACI&Oacute;N</th>
   <th style='border-style: solid;font-size: 15px;'>DESCRIPCI&Oacute;N&nbsp;OTROS</th>
   <th style='border-style: solid;font-size: 15px;'>VALOR&nbsp;FOB USD</th>
   <th style='border-style: solid;font-size: 15px;'>VALOR&nbsp;FLETE USD</th>
   <th style='border-style: solid;font-size: 15px;'>VALOR&nbsp;SEGURO USD</th>
   <th style='border-style: solid;font-size: 15px;'>PESO&nbsp;NETO KG</th>
   <th style='border-style: solid;font-size: 15px;'>Peso&nbsp;BRUTO KG</th>
   <th style='border-style: solid;font-size: 15px;'>CANTIDAD IMPORTADA</th>
   <th style='border-style: solid;font-size: 15px;'>UNIDAD DE&nbsp;MEDIDA</th>
   <th style='border-style: solid;font-size: 15px;'>CANTIDAD COMERCIAL</th>
   <th style='border-style: solid;font-size: 15px;'>UNIDAD COMERCIAL</th>
   <th style='border-style: solid;font-size: 15px;'>ESTADO&nbsp;MERCADER&Iacute;A</th>
   <th style='border-style: solid;font-size: 15px;' >ADV&nbsp;USD</th>
   <th style='border-style: solid;font-size: 15px;'>IGV&nbsp;USD</th>
   <th style='border-style: solid;font-size: 15px;'>ISC&nbsp;USD</th>
   <th style='border-style: solid;font-size: 15px;'>IPM&nbsp;USD</th>
   <th style='border-style: solid;font-size: 15px;'>DERECHO&nbsp;ESPEC&Iacute;FICO USD</th>
   <th style='border-style: solid;font-size: 15px;'>IMPUESTO&nbsp;ADICIONAL USD</th>
   <th style='border-style: solid;font-size: 15px;'>SOBRETASA&nbsp;USD</th>
   <th style='border-style: solid;font-size: 15px;'>DERECHO&nbsp;ANTIDUMPING USD</th>
   <th style='border-style: solid;font-size: 15px;'>COMMODITIES</th>
   <th style='border-style: solid;font-size: 15px;'>FECHA&nbsp;MODIFICACI&Oacute;N DUI</th>
   <th style='border-style: solid;font-size: 15px;'>CANTIDAD&nbsp;DE BULTOS</th>
   <th style='border-style: solid;font-size: 15px;'>CLASE&nbsp;DE BULTOS</th>
   <th style='border-style: solid;font-size: 15px;'>TRATO&nbsp;PREFERENCIAL</th>
   <th style='border-style: solid;font-size: 15px;'>TIPO&nbsp;TRATAMIENTO</th>
   <th style='border-style: solid;font-size: 15px;'>C&Oacute;DIGO&nbsp;LIBERTORIO</th>
   <th style='border-style: solid;font-size: 15px;'>INDICADOR&nbsp;DE RELIQUIDACI&Oacute;N</th>
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
	if(strlen($impor31)=='9'){
		$tpartd = '0'.$impor31;
	}else{
		$tpartd = $impor31;
	}
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
			 echo '<td>'.$tpartd.'</td>';
			 echo '<td>'.$impor32.'</td>';
			 echo '<td>'.$impor33.'</td>';
			 echo '<td>'.$impor34.'</td>';
			 echo '<td>'.$impor35.'</td>';
			 echo '<td>'.$impor36.'</td>';
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