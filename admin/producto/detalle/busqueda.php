<?php
include("../../incBD/inibd.php");
require('include/funciones.php');
require('include/pagination.class.php');

if($nombres2==""){
	$nombres2 = $_GET['condiciona'];
}else{
	$nombres2 = $_POST['condiciona'];
}

$items = 50;
$page = 1;

if(isset($_GET['page']) and is_numeric($_GET['page']) and $page = $_GET['page'])
		$limit = " LIMIT ".(($page-1)*$items).",$items";
	else
		$limit = " LIMIT $items";

if(isset($_GET['q']) and !eregi('^ *$',$_GET['q'])){
		$q = sql_quote($_GET['q']); //para ejecutar consulta
	    $c = sql_quote($_GET[$nombres2]); //para ejecutar consulta
		//$busqueda = htmlentities($q); //para mostrar en pantalla
	    $busqueda = $q; //para mostrar en pantalla

		$sqlStr = "SELECT
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
	
	$sqlStrAux = "SELECT
count (*) as total 
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
	
	}else{
		//$sqlStr = "SELECT * FROM resumen_partidas WHERE varia_filtro = '$nombres2' AND codigo <> 'Total' ";
		//$sqlStrAux = "SELECT count(*) as total FROM resumen_partidas WHERE varia_filtro = '$nombres2' AND codigo <> 'Total' ";
	
	$sqlStr = "SELECT
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
and CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$descri1%'	
	and e.cpaides like '$pais'
	and e.cpuedes like '$value'
	and e.cunitra like '$unitransp'
	and e.cviatra like '$vtransp'
	and e.cage like '$value2'
	and e.tunifis like '$unidmed'
	and e.tunicom like '$unidmedcomer'";
	
	$sqlStrAux = "SELECT count(*) as total FROM
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
and CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$descri1%'	
	and e.cpaides like '$pais'
	and e.cpuedes like '$value'
	and e.cunitra like '$unitransp'
	and e.cviatra like '$vtransp'
	and e.cage like '$value2'
	and e.tunifis like '$unidmed'
	and e.tunicom like '$unidmedcomer'";
	
	}

$aux = Mysqli_Fetch_Assoc(mysqli_query($conexpg,$sqlStrAux));
$query = mysqli_query($conexpg,$sqlStr.$limit);
?>	<p><?php
		if($aux['total'] and isset($busqueda)){
				echo "<b>{$aux['total']} </b> Resultado".($aux['total']>1?'s':'')." que coinciden con tu b&uacute;squeda \"<strong>$busqueda</strong>\".";
			}elseif($aux['total'] and !isset($q)){
				echo "Total de registros: <b> {$aux['total']} </b> │ <b>$items</b> registros por pagina";
			}elseif(!$aux['total'] and isset($q)){
				echo"No hay registros que coincidan con tu b&uacute;squeda \"<strong>$busqueda</strong>\"";
			}
	?></p>

	<?php 
		if($aux['total']>0){
			$p = new pagination;
			$p->Items($aux['total']);
			$p->limit($items);
			if(isset($q))
					//$p->target("index.php?q=".urlencode($q));
			        $p->target("./?anio=$year&partida=$partida1&descri1=$descri1&ubi=$ubige&local=$nonloca&q=".urlencode($q));
				else
					//$p->target("index.php");
					$p->target("./?anio=$year&partida=$partida1&descri1=$descri1&ubi=$ubige&local=$nonloca");
			$p->currentPage($page);
			$p->show();
			//echo "\t<table class=\"registros\">\n";
			//echo "<tr class=\"titulos\"><td>Titulo</td></tr>\n";
			echo "<table id='datatablese' class='table table-striped table-no-bordered table-hover registros'>";
			echo"<thead>";
			echo "<tr class='titulos'>
			                  <!--<th>A&ntilde;o</th>-->
							  <th>Fecha</th>
                              <th>Aduanas</th>";
				if($axe == "SI"){
					     echo"<th>DUA</th>";
								  }
                         echo"<th>N#. Doc.</th>
                              <th>Empresa</th>
                              <th>Direccion</th>
							  <th>Ubigeo</th>
							  <th>Partida</th>
							  <th>Descripcion&nbsp;Prod.</th>
							  <th>Pais</th>
							  <th>Puerto</th>
							  <th>Via Transp.</th>
							  <th>Unid. Transp.</th>
							  <th>Descrip. Transp.</th>
							  <th>Agente</th>
							  <th>Recinto Aduanero</th>
							  <th>Banco</th>
							  <th>Valor Fob.</th>
							  <th>Peso Neto</th>
							  <th>Peso Bruto</th>
							  <th>Cant. Exportada</th>
							  <th>Unid. Medida</th>
							  <th>Cant. Comercial(Kg)</th>
							  <th>Unid. Comerc.</th>
							  <th>Precio FOB x Kg</th>
							  <th>Precio Unit. (Unid.Med.)</th>
							  <th>Precio Unit. (Unid.Med.Comerc.)</th>
							  <th>Peso (Envase/Embalaje)</th>
							  <th>Sector</th>
			</tr>";
			echo"</thead>";
			echo"<tbody>";
			$r=0;
			while($row = mysqli_fetch_assoc($query)){
          //echo "\t\t<tr class=\"row$r\"><td><a href=\"http://www.mis-algoritmos.com/?p={$row['id']}\" target=\"_blank\">".htmlentities($row['pregunta'])."</a></td></tr>\n";
				$pasa = $pasa + 1;
				$annio = $row['anio'];
	  $fecha = $row['FNUM'];
	   $adua = $row['aduana'];
		$numdua = $row['NDCL'];
	    $numdoc = $row['NDOC'];
		 $nomempresa = $row['DNOMBRE'];
		 $direempresa = $row['DDIRPRO'];
		 //$ubigeoempresa = row['ubigeo2'];
	$ubigeoempresa = $row['nombredepartamento'].' - '.$row['nombreprov'].' - '.$row['nombredistrito'];
		 $num_partida = $row['PART_NANDI'];
		 $descri_produ = $row['dcom'];
		 $pais_des = $row['paisdestino'];
		 $puerto_descri = $row['puerto'];
		 $via_transp = $row['viatransporte'];
		 $uni_transp = $row['unidadtransporte'];
		 
		 $descri_mat = $row['DMAT'];
	$cod_agente = $row['CAGE'];
		 //$nom_agente = row['agente'];
		 $nom_aduanero = $row['recinto_aduanero'];
		 $nom_banco = $row['banco'];
		 $valor_fob = number_format($row['VFOBSERDOL'],2); 
		 $valor_net = number_format($row['VPESNET'],2);
		 $valor_bru = number_format($row['VPESBRU'],2);
		 $valor_A = number_format($row['QUNIFIS'],2);
		 $nom_unidad = $row['undmedida'];
		 $valor_B = number_format($row['QUNICOM'],2);
		 $unid_comer = $row['TUNIFIS'];
		 $peso_unit = number_format($row['pesounitkg'],2);
		 $precio_unitmed = number_format($row['preciounitxundmedida'],2);
		 $precio_unitcomerc = number_format($row['preciounitxunidcomercial'],2);
		 $peso_envemb = number_format($row['pesoenvaseyembalaje'],2);
		 //$nom_sector = $filas['sector'];
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
				
				echo "<tr class='row$r'>";
				
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
   
				echo"</tr>";
          if($r%2==0)++$r;else--$r;
        }
			echo"</tbody>";
			echo "</table>";
			$p->show();
		}
	?>