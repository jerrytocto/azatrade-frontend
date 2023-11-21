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

include("../incBD/inibd.php");
set_time_limit(950);

$dato1 = $_GET["dat1"];//año
$dato2 = $_GET["dat2"];//busqueda
$dato3 = $_GET["dat3"];//partida

date_default_timezone_set("America/Lima");
$fecha_actuals = date("Y-m-d H:m:s");
	
	/*$sqlt="SELECT i.*
FROM vista_importacion AS i
WHERE
YEAR(i.fech_ingsi) = '$dato1' AND
i.part_nandi = '$dato3' AND
CONCAT(i.desc_comer, i.desc_matco, i.desc_usoap, i.desc_fopre, i.desc_otros, i.part_nandi) LIKE '%$dato2%'";*/
	
	$sqlt = "select i.id AS id, i.codi_aduan AS codi_aduan,a.descripcion AS descripcion, i.ano_prese AS ano_prese, i.nume_corre AS nume_corre, i.fech_ingsi AS fech_ingsi, i.tipo_docum AS tipo_docum, i.libr_tribu AS libr_tribu, i.dnombre AS dnombre, i.codi_agent AS codi_agent, i.fech_llega AS fech_llega, i.via_transp AS via_transp, (case i.via_transp when '1' then 'BARCO' when '4' then 'AVION' when '6' then 'FERROCARRIL' when '7' then 'CAMION' when '8' then 'POR TUBERIAS' else 'OTRAS' end) AS viatransp, i.empr_trans AS empr_trans, i.codi_alma AS codi_alma, i.cadu_manif AS cadu_manif, i.fech_manif AS fech_manif, i.nume_manif AS nume_manif, i.fech_recep AS fech_recep, i.fech_cance AS fech_cance, i.tipo_cance AS tipo_cance, i.banc_cance AS banc_cance, i.codi_enfin AS codi_enfin, i.dk AS dk, i.pais_orige AS pais_orige, p1.espanol AS pais1, i.pais_adqui AS pais_adqui, p2.espanol AS pais2, i.puer_embar AS puer_embar, pu.puerto AS puerto, i.nume_serie AS nume_serie, i.part_nandi AS part_nandi, i.desc_comer AS desc_comer, i.desc_matco AS desc_matco, i.desc_usoap AS desc_usoap, i.desc_fopre AS desc_fopre, i.desc_otros AS desc_otros, i.fob_dolpol AS fob_dolpol, i.fle_dolar AS fle_dolar, i.seg_dolar AS seg_dolar, i.peso_neto AS peso_neto, i.peso_bruto AS peso_bruto, i.unid_fiqty AS unid_fiqty,i.unid_fides AS unid_fides,i.qunicom AS qunicom,i.tunicom AS tunicom,i.sest_merca AS sest_merca,i.adv_dolar AS adv_dolar,i.igv_dolar AS igv_dolar,i.isc_dolar AS isc_dolar,i.ipm_dolar AS ipm_dolar,i.des_dolar AS des_dolar,i.ipa_dolar AS ipa_dolar,i.sad_dolar AS sad_dolar,i.der_adum AS der_adum,i.comm AS comm,i.fmod AS fmod,i.cant_bulto AS cant_bulto,i.clase AS clase,i.trat_prefe AS trat_prefe,i.tipo_trat AS tipo_trat,i.codi_liber AS codi_liber,i.impr_reliq AS impr_reliq,i.accion AS accion,i.fechareg AS fechareg,i.fechamodi AS fechamodi from ((((importacion i left join aduana a on((i.codi_aduan = a.codadu))) left join paises p1 on((i.pais_orige = p1.idpaises))) left join paises p2 on((i.pais_adqui = p2.idpaises))) left join puerto pu on((i.puer_embar = pu.idcodigo))) WHERE YEAR(i.fech_ingsi) = '$dato1' AND i.part_nandi = '$dato3' AND CONCAT(i.desc_comer, i.desc_matco, i.desc_usoap, i.desc_fopre, i.desc_otros, i.part_nandi) LIKE '%$dato2%'";
	
$resultado1=$conexpg->query($sqlt); 

  if($resultado1->num_rows>0){
	  $delimiter = ",";
    $filename = "RptDetallado_Import_azatrade_" . date('Y-m-d') . ".csv";
	  //create a file pointer
    $f = fopen('php://memory', 'w');
    //set column headers
    $fields = array('Nro', 
   'CODIGO', 
   'ADUANA', 
   'AÑO DUI', 
   'NUMERO DUI', 
   'FECHA NUM. DUI', 
   'TIPO DOCU. M.', 
   'RUC', 
   'RAZON SOCIAL IMPORTADOR', 
   'CODIGO', 
   'AGENTE ADUANA', 
   'FECHA LLEGADA DE NAVE', 
   'CODIGO VIA TRANSP.', 
   'VIA DE TRANSP.', 
   'CODIGO EMPRESA DE TRANSPORTE', 
   'CODIGO ALMACEN', 
   'ADUANA MANIFIESTO', 
   'AÑO MANIFIESTO', 
   'NUMERO. MANIFIESTO', 
   'FECHA RECEPCION DE DUI', 
   'FECHA CANCELACION', 
   'TIPO CANCELACION', 
   'CODIGO BANCO CANCELACION', 
   'CODIGO ENTIDAD FINANCIERA', 
   'INDICADOR TELEDESPACHO', 
   'CODIGO PAIS ORIGEN', 
   'PAIS ORIGEN', 
   'CODIGO PAIS ADQ', 
   'PAIS ADQUISICION', 
   'CODIGO PUERTO', 
   'PUERTO EMBARQUE', 
   'NUMERO SERIE', 
   'PARTIDA', 
   'DESCRIPCION COMERCIAL', 
   'MATERIAL DE ELABORACION', 
   'USO', 
   'PRESENTACION', 
   'DESCRIPCION OTROS', 
   'VALOR FOB USD', 
   'VALOR FLETE USD', 
   'VALOR SEGURO USD', 
   'PESO NETO KG', 
   'Peso BRUTO KG', 
   'CANTIDAD IMPORTADA', 
   'UNIDAD DE MEDIDA', 
   'CANTIDAD COMERCIAL', 
   'UNIDAD COMERCIAL', 
   'ESTADO MERCADERIA', 
   'ADV USD', 
   'IGV USD', 
   'ISC USD', 
   'IPM USD', 
   'DERECHO ESPECIFICO USD', 
   'IMPUESTO ADICIONAL USD', 
   'SOBRETASA USD', 
   'DERECHO ANTIDUMPING USD', 
   'COMMODITIES', 
   'FECHA MODIFICACION DUI', 
   'CANTIDAD DE BULTOS', 
   'CLASE DE BULTOS', 
   'TRATO PREFERENCIAL', 
   'TIPO TRATAMIENTO', 
   'CÓDIGO LIBERTORIO', 
   'INDICADOR DE RELIQUIDACION', );
    fputcsv($f, $fields, $delimiter);
	  
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

	  
	  $lineData = array($itte, $impor1, $impor2, $impor3, $impor4, $impor5, $impor6, $impor7, $impor8, $impor9, $nom_agente, $impor10, $impor11, $impor12, $impor13, $impor14, $impor15, $impor16, $impor17, $impor18, $impor19, $impor20, $impor21, $impor22, $impor23, $impor24, $impor25, $impor26, $impor27, $impor28, $impor29, $impor30, $tpartd, $impor32, $impor33, $impor34, $impor35, $impor36, $impor37, $impor38, $impor39, $impor40, $impor41, $impor42, $impor43, $impor44, $impor45, $impor46, $impor47, $impor48, $impor49, $impor50, $impor51, $impor52, $impor53, $impor54, $impor55, $impor56, $impor57, $impor58, $impor59, $impor60, $impor61, $impor62);
	  fputcsv($f, $lineData, $delimiter);
  }
	  fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
  }else{
	  echo "No Hay InformaciÓn en la Busqueda";
	  }
 ?>
