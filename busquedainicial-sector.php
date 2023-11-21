<?php
# conectare la base de datos
 include("conex/inibd.php");
?>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet"> -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->


<?php
  $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL) ? $_REQUEST['action'] : '';

  if($action == 'ajax'){
    //include 'pagination.php'; // Incluir el archivo de paginación

    // Las variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 10; // La cantidad de registros que desea mostrar
    $adjacents = 4; // Brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    // Cuenta el número total de filas de la tabla*/
    /*$count_query = mysqli_query($con,"SELECT count(*) AS numrows FROM countries");
    if ($row= mysqli_fetch_array($count_query)){
      $numrows = $row['numrows'];
    } */
	 
date_default_timezone_set("America/Lima");
setlocale(LC_ALL, 'es_ES');
$date_now = date('Y-m-d');
$date_past = strtotime('-90 day', strtotime($date_now));
$date_past = date('Y-m-d', $date_past);
	  
	  $dato = $_REQUEST['data'];
	  $dato2 = $_REQUEST['year'];
	  
	   //consultanos departamento
	  $sqlpp ="SELECT concat(tipo,' - ',sector) as nomsec FROM sector WHERE concat(tipo,sector)='$dato' ";
	  $rpsr = $conexpg -> prepare($sqlpp); 
$rpsr -> execute(); 
$ghhs = $rpsr -> fetchAll(PDO::FETCH_OBJ); 
if($rpsr -> rowCount() > 0) { 
foreach($ghhs as $ppt) {
	$nomvalor = $ppt -> nomsec;
	}
}else{
	$nomvalor = "--";
}

/*$cxreg = "SELECT COUNT(*) as tota FROM (SELECT e.part_nandi FROM exportacion e INNER JOIN sector as s ON s.partida = e.part_nandi WHERE YEAR(e.fnum) ='$dato2' AND concat(s.tipo,s.sector)='$dato' GROUP BY e.part_nandi) AS Total";
$rfxt = $conexpg -> prepare($cxreg); 
$rfxt -> execute(); 
$gts = $rfxt -> fetchAll(PDO::FETCH_OBJ); 
if($rfxt -> rowCount() > 0) { 
foreach($gts as $fhht) {
	$numrows = $fhht -> tota;
	}
}else{
	$numrows = "0";
} */

    //$total_pages = ceil($numrows/$per_page);
    //consulta principal para recuperar los datos
    //$query = mysqli_query($con,"SELECT * FROM countries order by countryName LIMIT $offset,$per_page");
	  
	  /*$dqlft = "SELECT
YEAR(e.fnum) AS anio,
e.part_nandi,
SUM(e.vfobserdol) as vfobx1,
SUM(e.vpesnet) as pnetox1,
SUM(e.vfobserdol) as vfob,
SUM(e.vpesnet) as pneto,
SUM(e.QUNIFIS) as QUNIFIS,
e.TUNIFIS,
SUM(e.VPESNET) as VPESNET,
e.part_nandi as partioriginal,
e.part_nandi as parti_arancel,
substr(e.UBIGEO,1,2) AS ubigeo,
(case e.qunifis when 0 then 0 else (e.vfobserdol/e.VPESNET) end) as precioporkl
FROM exportacion e
INNER JOIN sector as s ON s.partida = e.part_nandi 
WHERE YEAR(e.fnum) ='$dato2' AND concat(s.tipo,s.sector)='$dato' 
GROUP BY anio,e.part_nandi";*/
	  
	  $dqlft = "SELECT
e.aniofn AS anio,
e.PART_NANDI as part_nandi,
SUM(e.VFOBSERDOL) as vfobx1,
SUM(e.VPESNET) as pnetox1,
SUM(e.VFOBSERDOL) as vfob,
SUM(e.VPESNET) as pneto,
SUM(e.VPESNET) as VPESNET,
e.PART_NANDI as partioriginal,
e.PART_NANDI as parti_arancel,
substr(e.UBIGEO,1,2) AS ubigeo,
(case e.VPESNET when 0 then 0 else (e.VFOBSERDOL/e.VPESNET) end) as precioporkl
FROM GranResumenExport_PowerBI e
INNER JOIN sector as s ON s.partida = e.PART_NANDI 
WHERE e.aniofn ='$dato2' AND concat(s.tipo,s.sector)='$dato' 
GROUP BY anio,e.PART_NANDI ORDER BY vfobx1 DESC";
	  
$rdrpt = $conexpg -> prepare($dqlft); 
$rdrpt -> execute(); 
$tpts = $rdrpt -> fetchAll(PDO::FETCH_OBJ); 
	  ?>

<div class="row pb-4">
	
<?php
if($rdrpt -> rowCount() > 0) { 
	?>
	<nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
							<div>
								<!-- <p>&nbsp;&nbsp;&nbsp;<b>Registros: <?=$numrows;?></b> </p> -->
								<h4 align="center">Reporte de Partidas exportadas del sector <?=$nomvalor;?> - <?=$dato2;?> </h4>
							</div>
                        </nav>

	<div class="table-responsive">
<table class="table table-hover" id="">
	<thead>
	<tr>
		<th>Partida</th>
		<th>Descripci&oacute;n</th>
		<th>Valor FOB USD</th>
		<th>Peso Neto(Kg)</th>
		<th>Precio FOB</th>
		<th>Acciones</th>
	</tr>
		</thead>
	 <tbody>
	<?php
	foreach($tpts as $frvpt) {
		$itemc = $itemc + 1;
	$tbb1 = $frvpt -> dcom;
	$tbb2 = $frvpt -> part_nandi;
	$tbb3 = $frvpt -> puerto;
	$tbb4 = $frvpt -> viatransporte;
	$tbb5 = $frvpt -> paisdestino;
	$tbb6 = $frvpt -> vfobx1;
	$tbb7 = $frvpt -> QUNIFIS;
	$tbb8 = $frvpt -> TUNIFIS;
	$tbb9 = $frvpt -> precioporkl;
	$tbb10 = $frvpt -> NDOC;
	$tbb11 = $frvpt -> DNOMBRE;
		$tbb12 = $frvpt -> VPESNET;
		
		//$pardes = "SELECT descripcion FROM arancel WHERE idarancel='$tbb2' ";
		$pardes = "SELECT prod_especifico, partida_desc FROM productos WHERE partida_nandi='$tbb2' ";
		$querypx = $conexpg -> prepare($pardes); 
$querypx -> execute(); 
$ptpts = $querypx -> fetchAll(PDO::FETCH_OBJ);
		if($querypx -> rowCount() > 0) { 
			foreach($ptpts as $pfrvpt) {
				$descri_partida = $pfrvpt -> prod_especifico.' - '.$pfrvpt -> partida_desc;
				}
}else{
			$descri_partida = "---";
		}
		
		
?>
	<tr>
		<td><?=$tbb2;?></td>
		<td><?=$descri_partida;?></td>
		<td><?=number_format($tbb6,2);?></td>
		<td><?=number_format($tbb12,0);?></td>
		<td><?=number_format($tbb9,2);?></td>
		<td>
		<a href="ver-resumen-detalle-sector?dat=<?=$dato;?>&year=<?=$dato2;?>&pk=<?=$tbb2;?>" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-sm">Ver Detalle</button></a>
		</td>
	</tr>
<?php } ?>
     <!-- <div class="table-pagination pull-right">
      <?//=paginate($page, $total_pages, $adjacents);?>
    </div> -->
	<!--</div> -->
	 </tbody>
	</table>
	</div>
<?php }else{ ?>
      <div class="col-sm-12 col-6 product-default left-details product-list mb-2">
                                <div class="product-details">
                                    <h3 class="product-title"> No se encontraron datos </h3>
                                </div>
                            </div>
      <?php
	}
}
?>
 
															   