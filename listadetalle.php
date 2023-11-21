<?php
# conectare la base de datos
 include("conex/inibd.php");

  $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL) ? $_REQUEST['action'] : '';

  if($action == 'ajax'){
    include 'pagination.php'; // Incluir el archivo de paginación

    // Las variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 15; // La cantidad de registros que desea mostrar
    $adjacents = 4; // Brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    // Cuenta el número total de filas de la tabla*/
    /*$count_query = mysqli_query($con,"SELECT count(*) AS numrows FROM countries");
    if ($row= mysqli_fetch_array($count_query)){
      $numrows = $row['numrows'];
    } */
	  
	  $dato = $_REQUEST['dat'];

$cxreg = "SELECT
count(e.NDOC) as total
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
WHERE CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$dato%'";
$rfxt = $conexpg -> prepare($cxreg); 
$rfxt -> execute(); 
$gts = $rfxt -> fetchAll(PDO::FETCH_OBJ); 
if($rfxt -> rowCount() > 0) { 
foreach($gts as $fhht) {
	$numrows = $fhht -> total;
	}
}else{
	$numrows = "0";
}

    $total_pages = ceil($numrows/$per_page);
    // consulta principal para recuperar los datos
    //$query = mysqli_query($con,"SELECT * FROM countries order by countryName LIMIT $offset,$per_page");

$dqlft = "SELECT
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
WHERE CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$dato%' ORDER BY e.VFOBSERDOL DESC LIMIT $offset,$per_page";
$rdrpt = $conexpg -> prepare($dqlft); 
$rdrpt -> execute(); 
$tpts = $rdrpt -> fetchAll(PDO::FETCH_OBJ); 
if($rdrpt -> rowCount() > 0) { 
?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Código</th>
          <th>Nombre</th>
          <th>Moneda</th>
          <th>Capital</th>
          <th>Continente</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($tpts as $frvpt) { 
		  $tbb1 = $frvpt -> dcom;
	$tbb2 = $frvpt -> PART_NANDI;
	$tbb3 = $frvpt -> puerto;
	$tbb4 = $frvpt -> viatransporte;
	$tbb5 = $frvpt -> paisdestino;
	$tbb6 = $frvpt -> VFOBSERDOL;
	$tbb7 = $frvpt -> QUNIFIS;
	$tbb8 = $frvpt -> TUNIFIS;
	$tbb9 = $frvpt -> preciounitxundmedida;
	$tbb10 = $frvpt -> NDOC;
	$tbb11 = $frvpt -> DNOMBRE;
		  ?>
        <tr>
          <td><?=$tbb2;?></td>
          <td><?=$tbb3;?></td>
          <td><?=$tbb4;?></td>
          <td><?=$tbb5;?></td>
          <td><?=$tbb1;?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

    <div class="table-pagination pull-right">
      <?=paginate($page, $total_pages, $adjacents);?>
    </div>
<?php }else{ ?>
      <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>Aviso!!!</h4> No hay datos para mostrar
      </div>
      <?php
	}
}
?>