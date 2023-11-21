<?php
# conectare la base de datos
 include("conex/inibd.php");

  $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL) ? $_REQUEST['action'] : '';

  if($action == 'ajax'){
    include 'pagination.php'; // Incluir el archivo de paginación

    // Las variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 12; // La cantidad de registros que desea mostrar
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
$cxreg = "SELECT COUNT(*) as total FROM (SELECT p.partida_nandi	FROM productos AS p 
	WHERE p.cuode='$dato'  AND p.imgfoto<>'' ) AS Total";
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
	  
	  $dqlft = "SELECT p.idcod, p.partida_nandi, p.prod_especifico, p.presentacion, p.partida_desc, 
	p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, 
	p.descri_corto, p.impo_vfobusdserdol1, p.impo_vfobusdserdol2, p.impo_vfobusdserdol3, 
	p.impo_vpesnet1, p.impo_vpesnet2, p.impo_vpesnet3, 
	p.impo_precio1, p.impo_precio2, p.impo_precio3, p.mostrar2 
	FROM productos AS p 
	WHERE p.cuode='$dato' AND p.imgfoto<>'' ORDER BY p.mostrar2 DESC LIMIT $offset,$per_page";
	  
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

	<div class="col-lg-12 main-content">
                        <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
	<?php
	foreach($tpts as $frvpt) {
		$itemc = $itemc + 1;
	$filaff1 = $frvpt -> idcod;
	$filaff2 = $frvpt -> partida_nandi;
	$filaff3 = $frvpt -> prod_especifico;
	$filaff4 = $frvpt -> presentacion;
	$filaff5 = $frvpt -> partida_desc;
	$filaff6 = $frvpt -> tipo_sec;
	$filaff7 = $frvpt -> sector;
	$filaff8 = $frvpt -> subsector;
	$filaff9 = $frvpt -> detalle_sector;
	$filaff10 = $frvpt -> imgfoto;
	$filaff11 = $frvpt -> descri_corto;
	$filaff12 = $frvpt -> impo_vfobusdserdol1;
	$filaff13 = $frvpt -> impo_vfobusdserdol2;
	$filaff14 = $frvpt -> impo_vfobusdserdol3;
	$filaff15 = $frvpt -> impo_vpesnet1;
	$filaff16 = $frvpt -> impo_vpesnet2;
	$filaff17 = $frvpt -> impo_vpesnet3;
	$filaff18 = $frvpt -> impo_precio1;
	$filaff19 = $frvpt -> impo_precio2;
	$filaff20 = $frvpt -> impo_precio3;
		
		if($filaff10!=""){
		$filaff10s=$filaff10;
			$fftt1 = "<div class='product-label label-hot'>TOP</div>";
		}else{
		 $filaff10s="producto-sin-imagen.png";
			$fftt1 = "";
		}
		
?>
    <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-default">
                                    <figure>
                                        <a>
                                            <img src="admin/imgproductos/<?=$filaff10s;?>" width="280" height="280" alt="product" />
                                            <!--<img src="assets/images/products/product-1-2.jpg" width="280" height="280" alt="product" />-->
                                        </a>

                                        <div class="label-group">
                                            <?=$fftt1;?>
                                            <!--<div class="product-label label-sale">-20%</div>-->
                                        </div>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a class="product-category"><?=$filaff6;?> - <?=$filaff7;?></a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a ><b> <?=$filaff3;?> - <?=$filaff4;?> </b></a> </h3>
										<h3 class="product-title"> 
										<a href="partida-detalle-uso?dat=<?=$filaff2;?>&year=2022" target="_blank">Partida: <?=$filaff2;?> </a> 
										</h3>
                                        <!--<div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div> -->

                                        <div class="price-box">
                                            <!--<span class="old-price">$90.00</span> -->
                                            <span class="product-price">Precio FOB <?=$filaff19;?> KG</span>
                                        </div>
                                        <div class="product-action">
                                            <a href="uso-producto?dat=<?=$filaff2;?>&pk=<?=$filaff1;?>" target="_blank" class="btn-icon btn-add-cart"><i
													class="fa fa-arrow-right"></i><span>VER EMPRESAS</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php } ?>
	
							</div>
		<div class="row">
		<div class="col-lg-12">
    <div class="table-pagination pull-right">
      <?=paginate($page, $total_pages, $adjacents);?>
		</nav>
    </div>
		</div>
							</div>
	
	<hr>
	<center><a href="uso-view.php?data=<?=$dato;?>&year=<?=$dato2;?>" target="_blank" class="btn btn-dark btn-sm">VER TODOS</a></center>
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