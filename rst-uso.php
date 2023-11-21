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
    
	 
date_default_timezone_set("America/Lima");
setlocale(LC_ALL, 'es_ES');
$date_now = date('Y-m-d');
$date_past = strtotime('-90 day', strtotime($date_now));
$date_past = date('Y-m-d', $date_past);
	  
	  $dato = $_REQUEST['data'];
	  $dato2 = $_REQUEST['year'];

	  // Cuenta el número total de filas de la tabla
$cxreg = "SELECT COUNT(*) as total FROM (SELECT e.libr_tribu FROM GranResumenImport_PowerBI as e WHERE e.aniofn ='2022' AND  e.part_nandi='$dato' GROUP BY e.libr_tribu) AS Total";
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
    //consulta principal para recuperar los datos
    //$query = mysqli_query($con,"SELECT * FROM countries order by countryName LIMIT $offset,$per_page");
	  
	  $dqlft = "SELECT
e.aniofn AS anio,
e.part_nandi,
SUM(e.VFOB) as vfobx1,
SUM(e.VPESNET) as pnetox1,
e.dnombre,
e.libr_tribu
FROM
GranResumenImport_PowerBI as e
WHERE
e.aniofn ='2022' AND 
e.part_nandi='$dato'
GROUP BY
e.libr_tribu LIMIT $offset,$per_page";
	  
$rdrpt = $conexpg -> prepare($dqlft); 
$rdrpt -> execute(); 
$tpts = $rdrpt -> fetchAll(PDO::FETCH_OBJ); 
	  ?>
<div class="row pb-4">
	
<?php
if($rdrpt -> rowCount() > 0) { 
	?>
	<!--<nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                           <div class="toolbox-left">
								<p><b>Agrupado por:</b> <a href="#">Registro</a> &nbsp;&nbsp; <a href="#">Partida</a> &nbsp;&nbsp; <a href="#">Mercado</a> &nbsp;&nbsp; <a href="#">Empresa</a> &nbsp;&nbsp; <a href="#">Departamento</a> &nbsp;&nbsp; <a href="#">Aduanas</a> &nbsp;&nbsp; <a href="#">Agente de Aduanas</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="descarga_excel?dat=<?=$dato;?>&var=<?=$dato2;?>"><i class="fas fa-file-excel"></i> Exportar</a> </p><br>
                            </div>
							<div>
								<p>&nbsp;&nbsp;&nbsp;<b>Registros: <?=$numrows;?></b> </p> <hr>
							</div>
		
                        </nav> -->
	<div class="col-lg-12">
								<p align="right"><b>Registros: <?=$numrows;?></b> </p>
							</div>
	<div class="table-pagination pull-right">
      <?=paginate($page, $total_pages, $adjacents);?>
    </div>

	<?php
	foreach($tpts as $frvpt) {
		$itemc = $itemc + 1;
	$tbb1 = $frvpt -> anio;
	$tbb2 = $frvpt -> part_nandi;
	$tbb3 = $frvpt -> vfobx1;
	$tbb4 = $frvpt -> pnetox1;
	$tbb5 = $frvpt -> dnombre;
	$tbb6 = $frvpt -> libr_tribu;
		
		if($tbb4!="0"){
			$preciokg = $tbb3 / $tbb4;
		}else{
			$preciokg ="0";
		}
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
                                        <a class="product-category">PARTIDA: <b><?=$tbb2;?></b></a>
                                    </div>
                                    <!--<h3 class="product-title"> <a href="#"><?=$tbb2;?> | <b>Pa&iacute;s Destino:</b> <?=$tbb5;?> | <b>Puerto:</b> <?=$tbb3;?> | <b>Via Trans.:</b> <?=$tbb4;?> </a></h3> -->
									<h3 class="product-title"> <a><i class="far fa-hand-point-right"></i> .- <?=$tbb5;?> | <?=$tbb6;?> </a></h3>
                                    <!-- <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div> -->
                                    <!-- <p class="product-description"><?=$tbb2;?></p> -->
                                    <div class="price-box">
                                        <span class="product-price">FOB USD: <?=number_format($tbb3,2);?></span> |
										<span class="product-price">Peso Neto KG: <?=number_format($tbb4,2);?></span> |
										<span class="product-price">Precio KG:<?=number_format($preciokg,2);?></span> |
                                    </div>
                                    <div class="product-action">
                                        <a href="partida-empresas-detalle-uso?dat=<?=$tbb6;?>&year=2022" target="_blank" class="btn-icon btn-add-cart active" style="color: #000000; background-color: #FFFFFF;">
                                            <i class="icon-shopping-cart"></i>
                                            <span>Ver Producto</span>
                                        </a>
										<a href="consulta-ruc-sunat?dat=<?=$tbb6;?>" target="_blank" class="btn-icon btn-dark add-cart active btn-add-cart icon-truck" style="color: #000000; background-color: #FFFFFF;">
                                            <!--<i class="icon-truck"></i>-->
                                            <span>Datos de Exportador</span>
                                        </a>
                                        <!-- <a href="#" class="btn-icon-wish" title="wishlist">
                                            <i class="icon-heart"></i>
                                        </a> -->
                                        <!--<a href="#" class="" title="Analizar Empresa"><i class="fas fa-external-link-alt" style="color: #F5CC3E;"></i></a>-->
										<!--<a href="consulta-ruc-sunat?dat=<?=$tbb6;?>" target="_blank" class="" title="Datos Sunat"><i class="fas fa-external-link-alt" style="color:#1B9A0C;"></i></a>-->
										<!--<a href="#" class="" title="Analisis de Riesgo"><i class="fas fa-external-link-alt" style="color:#B0B0B0;"></i></a>-->
										<!--<a href="#" class="" title="ver Arancel"><i class="fas fa-external-link-alt" style="color:#0932D1;"></i></a>-->
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