<?php
session_start();
header("Pragma: public");  
header("Expires: 0");  
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
header("Content-Type: application/force-download");  
header("Content-Type: application/octet-stream");  
header("Content-Type: application/download");  
header("Content-Disposition: attachment;filename=ResumenGeneral_Detallado.xls ");  
header("Content-Transfer-Encoding: binary ");

include("../../incBD/inibd.php");
set_time_limit(750);
$partida1 = $_GET["partida"];
$year=$_GET['anio'];
$descri1 = $_GET['descri1'];
if($descri1==""){
	$destodo ="Todos";
}else{
	$destodo ="$descri1";
}
$ubige = $_GET['ubi'];
$nonloca = $_GET['local'];

$mexcon = $_GET['mes'];
if($mexcon==""){
	$cnsmes = "";
}else{
$cnsmes = "and MONTH(e.fnum) = '$mexcon'";
	}

$condi = $_SESSION['acceso_pago'];
if($condi=='SI' or $condi=='NO' and $_SESSION['rol']=='ADMIN'){//tiene o no pago y es admin visualiza
	$axe = "SI";
}else if($condi=='NO' and $_SESSION['rol']<>'ADMIN'){//no tiene pago y no es admin limita 5 registros
	$axe = "NO";
}else if($condi=='SI' and $_SESSION['rol']<>'ADMIN'){//si tiene pago y no es admin visualiza todo
	$axe = "SI";
}

$aduana = "%";
$empresa = "%";
if($ubige!=""){
$depa = $ubige;
}else{
$depa = "%";
	}
$provincias = "%";
$distrito = "%";
$pais = "%";
$value = "%";
$unitransp = "%";
$vtransp = "%";
$value2 = "%";
$unidmed = "%";
$unidmedcomer = "%";

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
	 /*consultamos los datos*/
//$sqlt="SELECT d.id_doce, d.nombres, d.dni, d.correo, d.celular, d.especialidad, d.departamento, d.fecha_reg, d.hora_reg, d.usuario, d.estado, d.escala FROM docentes AS d ORDER BY d.id_doce DESC";
	
$sqlt="SELECT
YEAR(e.FNUM) AS anio,
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
e.part_nandi like '$partida1'
  and year(e.fnum) like '$year'
  $cnsmes
	and e.cadu like '$aduana'
	and e.ndoc like '$empresa'
	and substring(e.ubigeo,1,2) like '$depa'
	and substring(e.ubigeo,3,2) like '$provincias'
	and substring(e.ubigeo,5,2) like '$distrito'
and CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$q%'
	and e.cpaides like '$pais'
	and e.cpuedes like '$value'
	and e.cunitra like '$unitransp'
	and e.cviatra like '$vtransp'
	and e.cage like '$value2'
	and e.tunifis like '$unidmed'
	and e.tunicom like '$unidmedcomer'";
$resultado1=$conexpg->query($sqlt); 
	  ?>
<table cellspacing="0" cellpadding="0" width="100%" style="font-size:12px;">
<tr>
<td colspan="12" align="center">
	<b>Consulta Avanzada desde una Partida de Bolsa (Detalle) - Exportaciones </b><br> Producto: <?=$destodo;?> │ Departamento: <?=$nonloca;?> │ Partida #: <?=$partida1;?> │ Fecha Numeración │ Periodo <?=$year;?> │  </b>
	</td>
</tr>
                        <tr>							
							  <th style='background:#CCC; color:#000'>#</th>
							  <th style='background:#CCC; color:#000'>Fecha</th>
                              <th style='background:#CCC; color:#000'>Aduanas</th>";
							<?php 
				if($axe == "SI"){
					     echo"<th style='background:#CCC; color:#000'>DUA</th>";
								  }
							?>
                         <th style='background:#CCC; color:#000'>N#. Doc.</th>
                              <th style='background:#CCC; color:#000'>Empresa</th>
                              <th style='background:#CCC; color:#000'>Direccion</th>
							  <th style='background:#CCC; color:#000'>Ubigeo</th>
							  <th style='background:#CCC; color:#000'>Partida</th>
							  <th style='background:#CCC; color:#000'>Descripcion&nbsp;Prod.</th>
							  <th style='background:#CCC; color:#000'>Pais</th>
							  <th style='background:#CCC; color:#000'>Puerto</th>
							  <th style='background:#CCC; color:#000'>Via Transp.</th>
							  <th style='background:#CCC; color:#000'>Unid. Transp.</th>
							  <th style='background:#CCC; color:#000'>Descrip. Transp.</th>
							  <th style='background:#CCC; color:#000'>Agente</th>
							  <th style='background:#CCC; color:#000'>Recinto Aduanero</th>
							  <th style='background:#CCC; color:#000'>Banco</th>
							  <th style='background:#CCC; color:#000'>Valor Fob.</th>
							  <th style='background:#CCC; color:#000'>Peso Neto</th>
							  <th style='background:#CCC; color:#000'>Peso Bruto</th>
							  <th style='background:#CCC; color:#000'>Cant. Exportada</th>
							  <th style='background:#CCC; color:#000'>Unid. Medida</th>
							  <th style='background:#CCC; color:#000'>Cant. Comercial(Kg)</th>
							  <th style='background:#CCC; color:#000'>Unid. Comerc.</th>
							  <th style='background:#CCC; color:#000'>Precio FOB x Kg</th>
							  <th style='background:#CCC; color:#000'>Precio Unit. (Unid.Med.)</th>
							  <th style='background:#CCC; color:#000'>Precio Unit. (Unid.Med.Comerc.)</th>
							  <th style='background:#CCC; color:#000'>Peso (Envase/Embalaje)</th>
							  <th style='background:#CCC; color:#000'>Sector</th>
							
                        </tr>
 <?php
  if($resultado1->num_rows>0){ 
  while($fila1=$resultado1->fetch_array()){
	  $pasa = $pasa + 1;
				
				$annio = $fila1['anio'];
	  $fecha = $fila1['FNUM'];
	   $adua = $fila1['aduana'];
		$numdua = $fila1['NDCL'];
	    $numdoc = $fila1['NDOC'];
		 $nomempresa = $fila1['DNOMBRE'];
		 $direempresa = $fila1['DDIRPRO'];
		 //$ubigeoempresa = fila1['ubigeo2'];
	$ubigeoempresa = $fila1['nombredepartamento'].' - '.$fila1['nombreprov'].' - '.$fila1['nombredistrito'];
		 $num_partida = $fila1['PART_NANDI'];
		 $descri_produ = $fila1['dcom'];
		 $pais_des = $fila1['paisdestino'];
		 $puerto_descri = $fila1['puerto'];
		 $via_transp = $fila1['viatransporte'];
		 $uni_transp = $fila1['unidadtransporte'];
		 
		 $descri_mat = $fila1['DMAT'];
	$cod_agente = $fila1['CAGE'];
		 //$nom_agente = fila1['agente'];
		 $nom_aduanero = $fila1['recinto_aduanero'];
		 $nom_banco = $fila1['banco'];
		 $valor_fob = number_format($fila1['VFOBSERDOL'],2); 
		 $valor_net = number_format($fila1['VPESNET'],2);
		 $valor_bru = number_format($fila1['VPESBRU'],2);
		 $valor_A = number_format($fila1['QUNIFIS'],2);
		 $nom_unidad = $fila1['undmedida'];
		 $valor_B = number_format($fila1['QUNICOM'],2);
		 $unid_comer = $fila1['TUNIFIS'];
		 $peso_unit = number_format($fila1['pesounitkg'],2);
		 $precio_unitmed = number_format($fila1['preciounitxundmedida'],2);
		 $precio_unitcomerc = number_format($fila1['preciounitxunidcomercial'],2);
		 $peso_envemb = number_format($fila1['pesoenvaseyembalaje'],2);
		 //$nom_sector = $fila1['sector'];
	  date_default_timezone_set("America/Lima");
		 $fechaformate = date('d/m/Y',strtotime($fecha));
	//consultanos sector
	$sqlsecto = "SELECT partida, sector FROM sector where partida ='$num_partida' ";
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
	$nom_agente = $rwage['agencia'];
}
}else{
	$nom_agente = "---";
}
	  
  echo "<tr>";
	  echo '<td>'.$pasa.'</td>';
  echo '<td>'.$fechaformate.'</td>';
   echo '<td>'.$adua.'</td>';
			 if($axe == "SI"){
   echo '<td>'.$numdua.'</td>';
			 }
   echo '<td>'.$numdoc.'</td>';
   echo '<td>'.$nomempresa.'</td>';
   echo '<td>'.$direempresa.'</td>';
   echo '<td>'.$ubigeoempresa.'</td>';
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
   echo '</tr>';
  }
  }else{
	  echo "<h3>No Hay Informaci&oacute;n en la Busqueda</h3>";
	  }
 ?>
</table>

</body>
</html>