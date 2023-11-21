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
	  //$dato3 = $_REQUEST['ptipo1'];

$cxreg = "SELECT COUNT(*) as total FROM (SELECT e.part_nandi  FROM importacion e WHERE YEAR(e.fech_ingsi) ='$dato2' AND e.part_nandi='$dato' GROUP BY e.part_nandi) AS Total";
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
YEAR(e.fech_ingsi) AS anio,
e.part_nandi,
SUM(e.fob_dolpol) as vfobx1,
SUM(e.peso_neto) as pnetox1,
SUM(e.fob_dolpol) as vfob,
SUM(e.peso_neto) as pneto,
SUM(e.unid_fiqty) as QUNIFIS,
SUM(e.peso_neto) as VPESNET,
e.part_nandi as partioriginal,
e.part_nandi as parti_arancel,
(case e.peso_neto when 0 then 0 else (e.fob_dolpol/e.peso_neto) end) as precioporkl,
e.libr_tribu
FROM
importacion e
WHERE
YEAR(e.fech_ingsi) ='$dato2' AND e.part_nandi='$dato' GROUP BY anio,e.part_nandi";
	  
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
							<span><strong>Info</strong> consulta los ultimos 3 meses de data.</span>
						</div> <hr> -->
                            <!-- <div class="toolbox-left">
								<p><b>Agrupado por:</b> <a href="#">Registro</a> &nbsp;&nbsp; <a href="#">Partida</a> &nbsp;&nbsp; <a href="#">Mercado</a> &nbsp;&nbsp; <a href="#">Empresa</a> &nbsp;&nbsp; <a href="#">Departamento</a> &nbsp;&nbsp; <a href="#">Aduanas</a> &nbsp;&nbsp; <a href="#">Agente de Aduanas</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="descarga_excel?dat=<?=$dato;?>&var=<?=$dato2;?>"><i class="fas fa-file-excel"></i> Exportar</a> </p><br>
								
                            </div> -->
							<div>
								<!-- <p>&nbsp;&nbsp;&nbsp;<b>Registros: <?=$numrows;?></b> </p> -->
								<h4 align="center">Partida exportada <?=$dato;?> - <?=$dato2;?> </h4>
							</div>
                        </nav>
	
	<!-- <div class="table-pagination pull-right">
      <?//=paginate($page, $total_pages, $adjacents);?>
    </div> -->
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
	$tbb10 = $frvpt -> libr_tribu;
	$tbb11 = $frvpt -> dnombre;
		$tbb12 = $frvpt -> VPESNET;
		
		$pardes = "SELECT descripcion FROM arancel WHERE idarancel='$tbb2' ";
		$querypx = $conexpg -> prepare($pardes); 
$querypx -> execute(); 
$ptpts = $querypx -> fetchAll(PDO::FETCH_OBJ);
		if($querypx -> rowCount() > 0) { 
			foreach($ptpts as $pfrvpt) {
				$descri_partida = $pfrvpt -> descripcion;
				}
}else{
			$descri_partida = "---";
		}
		
		
?>
    <!--<div class="col-sm-12 col-6 product-default left-details product-list mb-2">

                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="#" class="product-category">PARTIDA: <b><?=$tbb2;?></b></a>
                                    </div>

									<h3 class="product-title"> <a href="#"><?=$itemc;?> .- <?=$tbb10;?> | <?=$tbb11;?> </a></h3>
  
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
                                        <a href="#" class="" title="Analizar Empresa"><i class="fas fa-external-link-alt" style="color: #F5CC3E;"></i></a>
										<a href="consulta-ruc-sunat.php?dat=<?=$tbb10;?>" target="_blank" class="" title="Datos Sunat"><i class="fas fa-external-link-alt" style="color:#1B9A0C;"></i></a>
										<a href="#" class="" title="Analisis de Riesgo"><i class="fas fa-external-link-alt" style="color:#B0B0B0;"></i></a>
										<a href="#" class="" title="ver Arancel"><i class="fas fa-external-link-alt" style="color:#0932D1;"></i></a>
                                    </div>
                                </div>
                            </div> -->
	<tr>
		<td><?=$tbb2;?></td>
		<td><?=$descri_partida;?></td>
		<td><?=number_format($tbb6,2);?></td>
		<td><?=number_format($tbb12,0);?></td>
		<td><?=number_format($tbb9,2);?></td>
		<td>
			<a href="ver-resumen-detalle-uso?dat=<?=$tbb10;?>&year=<?=$dato2;?>&pk=<?=$tbb2;?>" target="_blank" class="btn btn-outline-primary btn-rounded btn-sm">Ver Detalle</button>
			
			<!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?=$itemc;?>"> Acciones </button>
			<div class="modal" id="myModal<?=$itemc;?>">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> <b>Partida:</b> <?=$tbb2;?> | <b>Periodo : <?=$dato2;?> </b> </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
		  
		  <section class="left-section mt-5">
					<h3 class="mb-4	" align="center">¿ De esta partida que más deseas conocer ?</h3>
					<div class="row">
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-compare"></i>
								<div class="info-box-content">
									<h4>Indicadores Anuales</h4>
									<p><a href="partida-indicador-anual?dat=<?=$tbb2;?>" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-chart"></i>
								<div class="info-box-content">
									<h4>Indicadores Mensuales</h4>
									<p><a href="partida-indicador-mensual?dat=<?=$tbb2;?>&year=2022" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-direction"></i>
								<div class="info-box-content">
									<h4>Estacionalidad</h4>
									<p><a href="partida-estacionalidad?dat=<?=$tbb2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-country"></i>
								<div class="info-box-content">
									<h4>Mercados de Destino</h4>
									<p><a href="partida-mercados?dat=<?=$tbb2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-pin"></i>
								<div class="info-box-content">
									<h4>Departamentos</h4>
									<p><a href="partida-region?dat=<?=$tbb2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-company"></i>
								<div class="info-box-content">
									<h4>Empresas Exportadoras</h4>
									<p><a href="partida-empresas?dat=<?=$tbb2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-truck"></i>
								<div class="info-box-content">
									<h4>Agentes Aduanas</h4>
									<p><a href="partida-agente-aduanas?dat=<?=$tbb2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-shipped"></i>
								<div class="info-box-content">
									<h4>Aduanas</h4>
									<p><a href="partida-aduanas?dat=<?=$tbb2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon--search-2"></i>
								<div class="info-box-content">
									<h4>Ver Detalle</h4>
									<p><a href="ver-resumen-detalle-partida?dat=<?=$dato;?>&year=<?=$dato2;?>&pk=<?=$tbb2;?>" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
					</div>
				</section>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div> -->
			
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
	

<!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script> -->
<!--<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/select/1.6.0/js/dataTables.select.min.js"></script> -->
	
	
<!-- <script>	
	$(document).ready(function() {
    $('#dtBasicExample').DataTable( {
        select: true
    } );
} );
</script> -->
	
<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
 
 
 <script type="text/javascript">
     $(document).ready(function () {
    $('#example').DataTable();
});
 </script> -->
															   