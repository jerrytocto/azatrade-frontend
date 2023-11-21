<?php
header("Pragma: public");  
header("Expires: 0");  
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
header("Content-Type: application/force-download");  
header("Content-Type: application/octet-stream");  
header("Content-Type: application/download");  
header("Content-Disposition: attachment;filename=ResumenGeneral_Partidas.xls ");  
header("Content-Transfer-Encoding: binary ");

include("../../incBD/inibd.php");
set_time_limit(750);
$nombres2 = $_GET['condiciona'];

if($nombres2=="vfobserdol"){
	 $combo = "Valor FOB USD";
 }else if($nombres2=="vpesnet"){
	  $combo = "Peso Neto (Kg)";
 }else if($nombres2=="diferen"){
	  $combo = "Precio FOB USD x KG";
 }else if($nombres2=="vpesbru"){
	  $combo = "Peso Bruto (Kg)";
 }else if($nombres2=="qunifis"){
	  $combo = "Cantidad Exportada";
 }else if($nombres2=="qunicom"){
	  $combo = "Unidades Comerciales";
 }else if($nombres2=="part_nandi"){
	  $combo = "Cantidad de Partidas";
	  }else if($nombres2=="total"){
	  $combo = "Cantidad de Registros";
 }else if($nombres2=="ndcl"){
	  $combo = "Cantidad de Duas";
 }else if($nombres2=="dnombre"){
	  $combo = "Cantidad de Empresas";
 }else if($nombres2=="cpaides"){
	  $combo = "Cantidad de Mercados";
 }else if($nombres2=="cpuedes"){
	  $combo = "Cantidad de Puertos";
 }else if($nombres2=="cadu"){
	  $combo = "Cantidad de Aduanas";
 }else if($nombres2=="depa"){
	  $combo = "Cantidad de Departamentos";
 }else if($nombres2=="provi"){
	  $combo = "Cantidad de Provincias";
 }else if($nombres2=="distri"){
	  $combo = "Cantidad de Distritos";
 }else if($nombres2=="cage"){
	  $combo = "Cantidad de Agentes";
 }else if($nombres2=="cviatra"){
	  $combo = "Cantidad de vias de Transporte";
 }

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
	 /*consultamos los datos*/
//$sqlt="SELECT d.id_doce, d.nombres, d.dni, d.correo, d.celular, d.especialidad, d.departamento, d.fecha_reg, d.hora_reg, d.usuario, d.estado, d.escala FROM docentes AS d ORDER BY d.id_doce DESC";
	
$sqlt="SELECT rp.varia_filtro, rp.codigo as ndoc, rp.descripcion, rp.anio1 AS a2012, rp.anio2 AS a2013, rp.anio3 AS a2014, rp.anio4 AS a2015, rp.anio5 AS a2016, rp.anio6 AS a2017, rp.anio7 AS a2018, rp.anio8 AS a2019, rp.anio9 AS a2020, rp.anio10 AS a2021, rp.variauno, rp.variados FROM resumen_partidas AS rp WHERE rp.varia_filtro = '$nombres2' AND rp.codigo <> 'Total'";
$resultado1=$conexpg->query($sqlt); 
	  ?>
<table cellspacing="0" cellpadding="0" width="100%" style="font-size:12px;">
<tr>
<td colspan="12" align="center"><b><font size="+2"><b>Reporte Resumen Anual de Indicadores</b><br> N#. Partida: Todos │ Fecha Numeracion │ <?=$combo;?> │ Periodo 2012 - 2019 </b></font></b></td>
</tr>
                        <tr>
                            <td style='background:#CCC; color:#000'>N#. Partidas</td>
                            <td style='background:#CCC; color:#000'>Descripci&oacute;n</td>
                            <td style='background:#CCC; color:#000'>2012</td>
                            <td style='background:#CCC; color:#000'>2013</td>
                            <td style='background:#CCC; color:#000'>2014</td>
                            <td style='background:#CCC; color:#000'>2015</td>
                            <td style='background:#CCC; color:#000'>2016</td>
                            <td style='background:#CCC; color:#000'>2017</td>
                            <td style='background:#CCC; color:#000'>2018</td>
                            <td style='background:#CCC; color:#000'>2019</td>
                            <td style='background:#CCC; color:#000'>2020</td>
                            <td style='background:#CCC; color:#000'>2021</td>
                            <td style='background:#CCC; color:#000'>Var.%20/19</td>
                            <td style='background:#CCC; color:#000'>Var.%20</td>
                        </tr>
 <?php
  if($resultado1->num_rows>0){ 
  while($fila1=$resultado1->fetch_array()){
	  $cod_emp= $fila1['ndoc'];
		  $nom_empx= $fila1['descripcion'];
		  $pasa = $pasa + 1;
		  
		  if($nom_empx==""){
		    $nom_emp="-----";
			  }else{
          $nom_emp= $fila1['descripcion'];
			  }

		 $year1= $fila1['a2012'];
		  $year2= $fila1['a2013'];
		  $year3= $fila1['a2014'];
		  $year4= $fila1['a2015'];
		  $year5= $fila1['a2016'];
		  $year6= $fila1['a2017'];
		  $year7= $fila1['a2018'];
		  $year8= $fila1['a2019'];
	  $year9= $fila1['a2020'];
	  $year10= $fila1['a2021'];
				  
		 $var11 = number_format($fila1['variauno'],2);
		 $var22 = number_format($fila1['variados'],2);
	  
  echo "<tr>";
  echo "<td>$cod_emp</td>";
  echo "<td>$nom_emp</td>";
  echo "<td>$year1</td>";
  echo "<td>$year2</td>";
  echo "<td>$year3</td>";
  echo "<td>$year4 </td>";
  echo "<td>$year5</td>";
  echo "<td>$year6</td>";
  echo "<td>$year7</td>";
  echo "<td>$year8</td>";
	  echo "<td>$year9</td>";
	  echo "<td>$year10</td>";
  echo "<td>$var11%</td>";
  echo "<td>$var22%</td>";
   echo '</tr>';
  }
  }else{
	  echo "<h3>No Hay Informaci&oacute;n en la Busqueda</h3>";
	  }
 ?>
</table>

</body>
</html>