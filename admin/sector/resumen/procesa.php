<?php
session_start();
set_time_limit(750);
$namesec = $_GET["namesectRES"];
$nombres2 = $_GET['condiciona'];

//si es un usuario basico y no tiene acceso
if($_SESSION['rol']=="BASICO"){
if($_SESSION['acceso_pago']=="No"){
	print "<script>alert('Acceso invalido! - Para ver los resumenes adquiere uno de nuestros planes Premiun');window.location='../../planes/';</script>";
}
	}

?>
            <div class='col-md-12'>

            <?php
				include("../../incBD/inibd.php");
				

if(isset($_GET['condiciona'])){//inicia si hay datos

	$nombres2=$_GET['condiciona'];
  
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
	
	    $tituradio='Fecha Numeraci&oacute;n';
		$opci1='opcion1';
		$filtrofecha='ee.fnum';
		$wherefecha ="extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2020'";
	
	  $query1 = "SELECT rp.varia_filtro, rp.codigo as tipo, rp.descripcion, rp.sector, rp.anio1 AS a2012, rp.anio2 AS a2013, rp.anio3 AS a2014, rp.anio4 AS a2015, rp.anio5 AS a2016, rp.anio6 AS a2017, rp.anio7 AS a2018, rp.anio8 AS a2019, rp.anio9 AS a2020, rp.anio10 AS a2021, rp.variauno, rp.variados FROM resumen_sectores AS rp WHERE rp.varia_filtro = '$nombres2' AND rp.codigo <> 'Total'";

		  $resultado1=$conexpg->query($query1); 
if($resultado1->num_rows>0){ 
		  
		  echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Resumen Anual de Indicadores</b><br> Sector #: Todos │ Fecha Numeración │ $combo │ Periodo 2012 - 2021 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>";
        echo"</div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		echo"<thead>
                          <tr>
                              <th><b> N#. </b></th>
							  <th><b>Sector</b></th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>2020</th>
							  <th>2021</th>
							  <th>Var.%20/19</th>
							  <th>Part.%20</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
                              <th><b> N#. </b></th>
							  <th><b>Sector</b></th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>2020</th>
							  <th>2021</th>
							  <th>Var.%20/19</th>
							  <th>Part.%20</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
		  
			  while($fila1=$resultado1->fetch_array()){

			$items_sector = $items_sector + 1;
			  $cod_tipo = $fila1['tipo'];
			  $nom_sector = $fila1['descripcion'];
			  $nosector = $fila1['sector'];
			  $pasa = $pasa + 1;

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
				  
		$sumatotal2012= $sumatotal2012 + $year1;
		$sumatotal2013= $sumatotal2013 + $year2;
		$sumatotal2014= $sumatotal2014 + $year3;
		$sumatotal2015= $sumatotal2015 + $year4;
		$sumatotal2016= $sumatotal2016 + $year5;
		$sumatotal2017= $sumatotal2017 + $year6;
		$sumatotal2018= $sumatotal2018 + $year7;
		$sumatotal2019= $sumatotal2019 + $year8;
				  $sumatotal2020= $sumatotal2020 + $year9;
				  $sumatotal2021= $sumatotal2021 + $year10;
		$varitota = number_format((($sumatotal2020 / $sumatotal2019) - 1) * 100,2);
		$parti= "100";
		  
		  
		   echo "<tr>";
echo "<td>$items_sector</td>";
echo "<td>
<a href='#' onclick='document.forma$pasa.submit()'>$nom_sector</a>
	<form method='post' name='forma$pasa' action='../../sectores.php' target='_blank'>
<input type='hidden' name='depavalue' value=''>
<input type='hidden' name='sect' value='$nosector'>
<input type='hidden' name='btnsearchsecto' >
</form>
</td>";
echo "<td>".number_format($year1,2)."</td>";
echo "<td>".number_format($year2,2)."</td>";
echo "<td>".number_format($year3,2)."</td>";
echo "<td>".number_format($year4,2)."</td>";
echo "<td>".number_format($year5,2)."</td>";
echo "<td>".number_format($year6,2)."</td>";
echo "<td>".number_format($year7,2)."</td>";
echo "<td>".number_format($year8,2)."</td>";
				  echo "<td>".number_format($year9,2)."</td>";
				  echo "<td>".number_format($year10,2)."</td>";
echo "<td>$var11%</td>";
echo "<td>$var22%</td>";
 echo "</tr>";  
			  
		  }
	
	/*$query1to="SELECT rp.anio1 AS a2012, rp.anio2 AS a2013, rp.anio3 AS a2014, rp.anio4 AS a2015, rp.anio5 AS a2016, rp.anio6 AS a2017, rp.anio7 AS a2018, rp.anio8 AS a2019, rp.variauno, rp.variados FROM resumen_sectores AS rp WHERE rp.varia_filtro = '$nombres2' AND rp.codigo = 'Total'";
	$resultado1to=$conexpg->query($query1to); 
if($resultado1to->num_rows>0){ 
	while($fila1to=$resultado1to->fetch_array()){
		$sumatotal2012= $fila1to['a2012'];
		$sumatotal2013= $fila1to['a2013'];
		$sumatotal2014= $fila1to['a2014'];
		$sumatotal2015= $fila1to['a2015'];
		$sumatotal2016= $fila1to['a2016'];
		$sumatotal2017= $fila1to['a2017'];
		$sumatotal2018= $fila1to['a2018'];
		$sumatotal2019= $fila1to['a2019'];
		$varitota= number_format($fila1to['variauno'],2);
		$parti= $fila1to['variados'];
	}
	
}*/
	
echo"<thead>";
		  echo "<tr>";
		   echo "<th> </th>";
		  echo "<th><b>Total:</b></th>";
		  echo "<th><font size='2'><b>".number_format($sumatotal2012,2)."</b></font></th>";
		   echo "<th><font size='2'><b>".number_format($sumatotal2013,2)."</b></font></th>";
		    echo "<th><font size='2'><b>".number_format($sumatotal2014,2)."</b></font></th>";
			 echo "<th><font size='2'><b>".number_format($sumatotal2015,2)."</b></font></th>";
			  echo "<th><font size='2'><b>".number_format($sumatotal2016,2)."</b></font></th>";
			  echo "<th><font size='2'><b>".number_format($sumatotal2017,2)."</b></font></th>";
		       echo "<th><font size='2'><b>".number_format($sumatotal2018,2)."</b></font></th>";
	           echo "<th><font size='2'><b>".number_format($sumatotal2019,2)."</b></font></th>";
	echo "<th><font size='2'><b>".number_format($sumatotal2020,2)."</b></font></th>";
	echo "<th><font size='2'><b>".number_format($sumatotal2021,2)."</b></font></th>";
			  echo "<th><font size='2'><b>$varitota %</b></th>";
			  echo "<th><font size='2'><b>$parti</b></th>";
		  echo "</tr>";
		  echo"</thead>";
		  echo"</tbody>";
		echo"</table>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
		echo"</div>";
	  }
	
}//fin inicia si hay datos
				?>
          
          <!-- grafico -->
          <style>
.chart {
  width: 100%; 
  min-height: 450px;
}
</style> 
           
            </div>
            
 
    <!--<script type="text/javascript" src="../js/jsexport/jquery.dataTables.min.js"></script>-->
    <script type="text/javascript" src="../../js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.print.min.js"></script>
  
  <script type="text/javascript">
$(document).ready(function() {
    $('#datatablese').DataTable({
		"order": [[ 0, "asc" ]],
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [
            [20, 25, 50, -1],
            [20, 25, 50, "Todos"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Buscar resultados",
        }

    });
    var table = $('#datatablese').DataTable();

    $('.card .material-datatablese label').addClass('form-group');
});

</script>


<?php		  
//cerrando conexion
	mysqli_close($conexpg);
?>
</html>