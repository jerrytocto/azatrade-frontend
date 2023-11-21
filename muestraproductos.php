<?php
include("conex/inibd.php");

$dato1 = trim($_POST["q"]);
$dato2 = trim($_POST["cate"]);

//cuenta registros
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
WHERE CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$dato1%'";
$rfxt = $conexpg -> prepare($cxreg); 
$rfxt -> execute(); 
$gts = $rfxt -> fetchAll(PDO::FETCH_OBJ); 
if($rfxt -> rowCount() > 0) { 
foreach($gts as $fhht) {
	$num_total_rows = $fhht -> total;
	}
}else{
	$num_total_rows = "0";
}

	 ?>
<!-- busqueda -->
                        <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                            <div class="toolbox-left">
								<p><b>Agrupado por:</b> <a href="#">Registro</a> &nbsp;&nbsp; <a href="#">Partida</a> &nbsp;&nbsp; <a href="#">Mercado</a> &nbsp;&nbsp; <a href="#">Empresa</a> &nbsp;&nbsp; <a href="#">Departamento</a> &nbsp;&nbsp; <a href="#">Aduanas</a> &nbsp;&nbsp; <a href="#">Agente de Aduanas</a> </p><br>
								
                            </div>
							<div>
								<p><b>Total Registros: <?=$num_total_rows;?></b></p>
							</div>
                        </nav>

                        <div class="row pb-4">
							<?php
if ($num_total_rows > 0) {
	$num_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);
	
//$dqlft = "SELECT p.idpaises, p.espanol FROM paises AS p ORDER BY p.espanol ASC";
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
WHERE CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$dato1%' ORDER BY e.VFOBSERDOL DESC LIMIT 0".NUM_ITEMS_BY_PAGE;
$rdrpt = $conexpg -> prepare($dqlft); 
$rdrpt -> execute(); 
$tpts = $rdrpt -> fetchAll(PDO::FETCH_OBJ); 
if($rdrpt -> rowCount() > 0) { 
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
									<h3 class="product-title"> <a href="#" title="<?=$tbb11;?>"><?=$tbb10;?> | <?=$tbb11;?> </a></h3>
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
							<?php
}
}else{
	?>

                            <div class="col-sm-12 col-6 product-default left-details product-list mb-2">
                                <div class="product-details">
                                    <h3 class="product-title"> No se encontraron datos </h3>
                                </div>
                            </div>
							<?php
							}
							?>

                            <!-- <div class="col-sm-12 col-6 product-default left-details product-list mb-2">
                                <figure>
                                    <a href="product.html">
                                        <img src="assets/images/products/product-3.jpg" width="250" height="250" alt="product" />
                                        <img src="assets/images/products/product-3-2.jpg" width="250" height="250" alt="product" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div>
                                    <h3 class="product-title"> <a href="product.html">Circled Ultimate 3D Speaker</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <p class="product-description">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                                        Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>

                                    <div class="price-box">
                                        <span class="product-price">$15.00</span>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-icon btn-add-cart product-type-simple">
                                            <i class="icon-shopping-cart"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                        <a href="wishlist.html" class="btn-icon-wish" title="wishlist">
                                            <i class="icon-heart"></i>
                                        </a>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </div> -->
<?php
	
	 if ($num_pages > 1) {
                    echo '<div class="row">';
                    echo '<div class="col-lg-12">';
                    echo '<nav aria-label="Page navigation example">';
                    echo '<ul class="pagination justify-content-end">';

                    for ($i=1;$i<=$num_pages;$i++) {
                        $class_active = '';
                        if ($i == 1) {
                            $class_active = 'active';
                        }
                        echo '<li class="page-item '.$class_active.'"><a class="page-link" href="#" data="'.$i.'">'.$i.'</a></li>';
                    }

                    echo '</ul>';
                    echo '</nav>';
                    echo '</div>';
                    echo '</div>';
                } 
	
}
	?>
                        </div>

                         <!--<nav class="toolbox toolbox-pagination">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
										<option value="12">12</option>
										<option value="24">24</option>
										<option value="36">36</option>
									</select>
                                </div>
                            </div>
                            <ul class="pagination toolbox-item">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-btn" href="#">
                                        <i class="icon-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1
										<span class="sr-only">(current)</span>
									</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <span class="page-link">...</span>
                                </li>
                                <li class="page-item">
                                    <a class="page-link page-link-btn" href="#">
                                        <i class="icon-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav> -->
						<!-- fin busqueda -->
<?php $conexpg = null;//cierra conexion  ?>

