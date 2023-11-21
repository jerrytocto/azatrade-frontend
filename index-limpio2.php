<?php
include("conex/inibd.php");
ini_set('memory_limit','85528M');
set_time_limit(950);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Azatrade</title>

    <meta name="keywords" content="azatrade, exportacion, importacion, arancel, aduana, dua, comercial, inteligencia comercial" />
    <meta name="" content="Azatrade - Sistema de Inteligencia Comercial">
    <meta name="author" content="AZATRADE">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
	
</head>

<body>
	<?php
	$cxreg = "SELECT count(e.aniofn) as total FROM GranResumenExport_PowerBI AS e WHERE e.aniofn='2012' ";
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
	
	$dqlft = "SELECT
e.aniofn,
e.mesfn,
e.anioem,
e.mesem,
e.PART_NANDI,
e.CPAIDES,
e.NDOC,
e.DNOMBRE,
e.UBIGEO,
e.CADU,
e.VFOBSERDOL,
e.VPESNET,
e.VPESBRU,
e.cantuni,
e.TUNICOM,
e.cantreg
FROM
GranResumenExport_PowerBI AS e
WHERE e.aniofn ='2022' ";
$rdrpt = $conexpg -> prepare($dqlft); 
$rdrpt -> execute(); 
$tpts = $rdrpt -> fetchAll(PDO::FETCH_OBJ); 
	  ?>
<div class="row pb-4">
	
<?php
if($rdrpt -> rowCount() > 0) { 
	?>

							<div>
								<p>&nbsp;&nbsp;&nbsp;<b>Registros: <?=$numrows;?></b> </p>
							</div>
<table>
	<tr>
		<td>Items</td>
		<td>Año</td>
		<td>Mes</td>
		<td>Año</td>
		<td>mes</td>
		<td>Partida</td>
		<td>Pais</td>
		<td>Ruc</td>
		<td>Empresa</td>
		<td>Ubigeo</td>
		<td>Aduna</td>
		<td>Valor Fob</td>
		<td>Peso Neto</td>
		<td>Peso Bruto</td>
		<td>Cantidad</td>
		<td>Unidad</td>
		<td>Cant. Reg.</td>
	</tr>
	<?php	
	foreach($tpts as $frvpt) {
		$cuen = $cuen + 1;
	$tbb1 = $frvpt -> aniofn;
	$tbb2 = $frvpt -> mesfn;
	$tbb3 = $frvpt -> anioem;
	$tbb4 = $frvpt -> mesem;
	$tbb5 = $frvpt -> PART_NANDI;
	$tbb6 = $frvpt -> CPAIDES;
	$tbb7 = $frvpt -> NDOC;
	$tbb8 = $frvpt -> DNOMBRE;
	$tbb9 = $frvpt -> UBIGEO;
	$tbb10 = $frvpt -> CADU;
	$tbb11 = $frvpt -> VFOBSERDOL;
		$tbb12 = $frvpt -> VPESNET;
		$tbb13 = $frvpt -> VPESBRU;
		$tbb14 = $frvpt -> cantuni;
		$tbb15 = $frvpt -> TUNICOM;
		$tbb16 = $frvpt -> cantreg;
?>
	<tr>
    <td><?=$cuen;?></td>
		<td><?=$tbb1;?></td>
		<td><?=$tbb2;?></td>
		<td><?=$tbb3;?></td>
		<td><?=$tbb4;?></td>
		<td><?=$tbb5;?></td>
		<td><?=$tbb6;?></td>
		<td><?=$tbb7;?></td>
		<td><?=$tbb8;?></td>
		<td><?=$tbb9;?></td>
		<td><?=$tbb10;?></td>
		<td><?=$tbb11;?></td>
		<td><?=$tbb12;?></td>
		<td><?=$tbb13;?></td>
		<td><?=$tbb14;?></td>
		<td><?=$tbb15;?></td>
		<td><?=$tbb16;?></td>
		</tr>
<?php } ?>
	</table>
<?php }else{ ?>
      <div class="col-sm-12 col-6 product-default left-details product-list mb-2">
                                <div class="product-details">
                                    <h3 class="product-title"> No se encontraron datos </h3>
                                </div>
                            </div>
      <?php
	}
	?>
</body>
	<?php $conexpg = null;//cierra conexion  ?>
</html>