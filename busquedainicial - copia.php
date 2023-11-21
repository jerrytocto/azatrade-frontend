<?php
# conectare la base de datos
 include("conex/inibd.php");

  $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL) ? $_REQUEST['action'] : '';

  if($action == 'ajax'){
    include 'pagination.php'; // Incluir el archivo de paginación

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
$date_past = date('d-m-Y', $date_past);
	  
	  $dato = $_REQUEST['data'];

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
WHERE e.FNUM>='$date_past' AND CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$dato%'";
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
WHERE e.FNUM>='$date_past' AND CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$dato%' ORDER BY e.VFOBSERDOL DESC LIMIT $offset,$per_page";
$rdrpt = $conexpg -> prepare($dqlft); 
$rdrpt -> execute(); 
$tpts = $rdrpt -> fetchAll(PDO::FETCH_OBJ); 
	  ?>
<div class="row pb-4">
	
<?php
if($rdrpt -> rowCount() > 0) { 
	?>
	<nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
							<!-- <div class="alert alert-warning alert-dismissible">
							<span><strong>Info</strong> consulta los ultimos 6 meses.</span>
						</div> -->
                            <div class="toolbox-left">
								<p><b>Agrupado por:</b> <a href="#">Registro</a> &nbsp;&nbsp; <a href="#">Partida</a> &nbsp;&nbsp; <a href="#">Mercado</a> &nbsp;&nbsp; <a href="#">Empresa</a> &nbsp;&nbsp; <a href="#">Departamento</a> &nbsp;&nbsp; <a href="#">Aduanas</a> &nbsp;&nbsp; <a href="#">Agente de Aduanas</a> </p><br>
								
                            </div>
							<div>
								<p>&nbsp;&nbsp;&nbsp;<b>Total Registros: <?=$numrows;?></b> </p>
							</div>
                        </nav>
	<div class="table-pagination pull-right">
      <?=paginate($page, $total_pages, $adjacents);?>
    </div>
	<?php
	foreach($tpts as $frvpt) {
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
    <div class="col-sm-12 col-6 product-default left-details product-list mb-2">
                                <!-- <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/product-1.jpg" width="250" height="250" alt="product" />
                                        <img src="assets/images/products/product-1-2.jpg" width="250" height="250" alt="product" />
                                    </a>
                                </figure> -->
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="#" class="product-category">PARTIDA: <b><?=$tbb2;?></b></a>
                                    </div>
                                    <!--<h3 class="product-title"> <a href="#"><?=$tbb2;?> | <b>Pa&iacute;s Destino:</b> <?=$tbb5;?> | <b>Puerto:</b> <?=$tbb3;?> | <b>Via Trans.:</b> <?=$tbb4;?> </a></h3> -->
									<h3 class="product-title"> <a href="#"><?=$tbb10;?> | <?=$tbb11;?> </a></h3>
                                    <!-- <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div> -->
                                    <p class="product-description"><?=$tbb1;?></p>
                                    <div class="price-box">
                                        <span class="product-price">FOB USD: <?=number_format($tbb6,2);?></span> |
										<span class="product-price">Unid: <?=number_format($tbb7,2);?></span> 
										<span class="product-price"><?=$tbb8;?></span> |
										<span class="product-price">Precio Unid:<?=number_format($tbb9,2);?></span> |
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-icon btn-add-cart active product-type-simple" style="color: #000000; background-color: #FFFFFF;">
                                            <i class="icon-shopping-cart"></i>
                                            <span>Ver Detalle Empresa</span>
                                        </a>
                                        <!-- <a href="#" class="btn-icon-wish" title="wishlist">
                                            <i class="icon-heart"></i>
                                        </a> -->
                                        <a href="#" class="btn-quickview" title="Quick View">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
<?php } ?>
    <div class="table-pagination pull-right">
      <?=paginate($page, $total_pages, $adjacents);?>
    </div>
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