<?php
ini_set('memory_limit','128M');
header("Pragma: public");  
header("Expires: 0");  
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
header("Content-Type: application/force-download");  
header("Content-Type: application/octet-stream");  
header("Content-Type: application/download");  
header("Content-Disposition: attachment;filename=Descarga_excel_azatrade.xls ");  
header("Content-Transfer-Encoding: binary ");

include("conex/inibd.php");
set_time_limit(950);

$dato1 = $_GET["dat"];
$dato2 = $_GET["var"];

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
	
	$dqlft="SELECT
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
'ss' AS sector,
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
WHERE year(e.FNUM) ='$dato2' AND CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%$dato1%' ORDER BY e.VFOBSERDOL DESC";
	
$rdrpt = $conexpg -> prepare($dqlft); 
$rdrpt -> execute(); 
$tpts = $rdrpt -> fetchAll(PDO::FETCH_OBJ); 
	
	
	  ?>
<table cellspacing="0" cellpadding="0" width="100%" style="font-size:12px;">
<tr>
<td colspan="8" align="center"><b><font size="+2"><b>Resultado de la Busqueda</b><br> <?php echo"<b>Año:</b> $dato2 - $dato1 "; ?> </b></font></b></td>
</tr>
   <tr style='background-color: #9C9999; color: #FFFFFF;'>
   <th style='border-style: solid;font-size: 15px;'><b>#</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Numero&nbsp;Docum.</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Razon&nbsp;Social</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Partida</b></th>
   <th style='border-style: solid;font-size: 15px;'><b>Descripcion&nbsp;Comercial</b></th>
	   <th style='border-style: solid;font-size: 15px;'><b>FOB&nbsp;USD</b></th>
	   <th style='border-style: solid;font-size: 15px;'><b>Unidad</b></th>
	   <th style='border-style: solid;font-size: 15px;'><b>Precio&nbsp;Und.</b></th>
                          </tr>
 <?php
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
	  
	  $itte = $itte + 1;
		   
			 $impor37 = number_format($row['fob_dolpol'],2);
 
  echo"<tr>";
   echo '<td>'.$itte.'</td>';
   echo '<td>'.$tbb10.'</td>';
   echo '<td>'.$tbb11.'</td>';
   echo '<td>'.$tbb2.'</td>';
   echo '<td>'.$tbb1.'</td>';
   echo '<td>'.$tbb6.'</td>';
   echo '<td>'.$tbb8.'</td>';
   echo '<td>'.$tbb9.'</td>';
		echo"</tr>";
  }
  }else{
	  echo "<h3>No Hay Informaci&oacute;n en la Busqueda</h3>";
	  }
 ?>
</table>
<?php $conexpg = null;//cierra conexion  ?>
</body>
</html>