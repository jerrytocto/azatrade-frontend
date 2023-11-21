<?php
session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
}
}
set_time_limit(500);
$partida1 = $_POST["partidaindimen"];
$anio = $_POST["anioim"];
$namedepa1 = $_POST["namedepa"];
$ubicod1 = $_POST["codubi"];
$describus = trim($_POST["nomdescri"]);
if($ubicod1!=""){
	$flatcod = $ubicod1;
	//$query1 = "AND SUBSTRING(exportacion.ubigeo,1,2) LIKE '%$flatcod'";
	$query1 = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}else{
	$flatcod = "";
    $query1 = "";
}

//echo" $partida1 partida<br> $anio año<br> $namedepa1 depa<br> $ubicod1 coddepa<br> $describus producto";
?>
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="../../img/logo.png">
<link rel="icon" href="../../img/logo.png">
<title>
   ..: Azatrade :..
</title>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="../../css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="../../css/buttons.dataTables.min.css">
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../../css/demo.css" rel="stylesheet"/>
       <!--<script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>-->
       <style>
	.preloader {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 60px;
    height: 60px;
    margin:-30px 0 0 -30px;
    -webkit-animation:spin .7s linear infinite;
    -moz-animation:spin .7s linear infinite;
    animation:spin .7s linear infinite;
}
@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }

.preloader img {
  width: 100%;
}
	</style>
        </head>
<body>
	<!--<div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="../../img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>-->
     <div class="preloader">
  <img src="../../img/loading-carga.gif" alt="">
</div>
</body>
        <body class="off-canvas-sidebar register-page" style="background-image: url('../../img/plan.jpg'); background-size: cover; background-position: top center;">

    <div class="wrapper wrapper-full-page">
            <div class='col-md-12'>

            <?php
				include("../../incBD/inibd.php");

  /*visualizamos datos en el reporte*/
  $query_resultado = "SELECT
exportacion.fano,
extract(MONTH from exportacion.fnum) as mes,
(case extract(MONTH from exportacion.fnum)
		when '1' then 'Enero' 
		when '2' then 'Febrero' 
		when '3' then 'Marzo' 
		when '4' then 'Abril' 
		when '5' then 'Mayo'
		when '6' then 'Junio'
		when '7' then 'Julio'
		when '8' then 'Agosto'
		when '9' then 'Septiembre'
		when '10' then 'Octubre'
		when '11' then 'Noviembre'
		when '12' then 'Diciembre' 
	else '-' end) as txtmes,
Sum(exportacion.vfobserdol) as vfobserdol,
Sum(exportacion.vpesnet) as vpesnet,
Sum(exportacion.vfobserdol) / Sum(exportacion.vpesnet) as diferen,
/*Sum(exportacion.vpesbru) as vpesbru,
Sum(exportacion.qunifis) as qunifis,*/
Sum(exportacion.qunicom) as qunicom,
count(*) as totalregistros,
COUNT(DISTINCT exportacion.ndcl) as cantduas,
COUNT(DISTINCT exportacion.dnombre) as cantempresas,
COUNT(DISTINCT exportacion.cpaides) as cantmercado,
COUNT(DISTINCT exportacion.cpuedes) as cantpuerto,
COUNT(DISTINCT exportacion.cadu) as cantaduana,
COUNT(DISTINCT SUBSTRING(exportacion.ubigeo,1,2)) as cantdepa,
/*COUNT(DISTINCT SUBSTRING(exportacion.ubigeo,1,4)) as cantprov,
COUNT(DISTINCT exportacion.ubigeo) as cantdisti,*/
COUNT(DISTINCT exportacion.cage) as cantagente,
COUNT(DISTINCT exportacion.cviatra) as cantviatransp
FROM exportacion WHERE
exportacion.part_nandi = ".$partida1." $query1 AND extract(year from exportacion.fnum) = ".$anio." AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%'
GROUP BY
exportacion.fano,mes
ORDER BY
exportacion.fano,mes";
	$resultado_rpt=$conexpg->query($query_resultado); 
if($resultado_rpt->num_rows>0){ 
echo"<div class='col-md-12'>";
        echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Mensual de Indicadores - Exportaciones</b><br> Producto: $describus │ Partida #: $partida1 │ Departamento: $namedepa1 │ Fecha Numeracion │ Periodo $anio </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>
                  </div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
                              <th>#</th>
							  <th>Mes</th>
							  <th>Valor FOB USD</th>
                              <th>Peso Neto (Kg)</th>
                              <th>Precio FOB USD x KG</th>
                              <!--<th>Peso Bruto (Kg)</th>
                              <th>Cant. Exportada</th>-->
							  <th>Unid. Comerciales</th>
							  <th>Cant. Registros</th>
							  <th>Cant. Duas</th>
							  <th>Cant. Empresas</th>
							  <th>Cant. Mercados</th>
							  <th>Cant. Puertos</th>
							  <th>Cant. Aduanas</th>
							  <th>Cant. Departamentos</th>
							  <!--<th>Cant. Provincias</th>
							  <th>Cant. Distritos</th>-->
							  <th>Cant. Agentes</th>
							  <th>Cant. Transportes</th>
                          </tr>
                      </thead>";
		echo"<tfoot>
                          <tr>
						      <th>#</th>
							  <th>Mes</th>
							  <th>Valor FOB USD</th>
                              <th>Peso Neto (Kg)</th>
                              <th>Precio FOB USD x KG</th>
                              <!--<th>Peso Bruto (Kg)</th>
                              <th>Cant. Exportada</th>-->
							  <th>Unid. Comerciales</th>
							  <th>Cant. Registros</th>
							  <th>Cant. Duas</th>
							  <th>Cant. Empresas</th>
							  <th>Cant. Mercados</th>
							  <th>Cant. Puertos</th>
							  <th>Cant. Aduanas</th>
							  <th>Cant. Departamentos</th>
							  <!--<th>Cant. Provincias</th>
							  <th>Cant. Distritos</th>-->
							  <th>Cant. Agentes</th>
							  <th>Cant. Transportes</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
			 while($fila_rpt=$resultado_rpt->fetch_array()){
				 $cuen = $cuen + 1;
		   $idcodi= $fila_rpt['mes'];
		   $nombredesc= $fila_rpt['txtmes'];
		  $cuefil1 = $fila_rpt['vfobserdol'];
		  $cuefil2 = $fila_rpt['vpesnet'];
		  $cuefil3 = $fila_rpt['diferen'];
		  $cuefil4 = $fila_rpt['vpesbru'];
		  $cuefil5 = $fila_rpt['qunifis'];
		  $cuefil6 = $fila_rpt['qunicom'];
		  $cuefil7 = $fila_rpt['totalregistros'];
		  $cuefil8 = $fila_rpt['cantduas'];
		  $cuefil9 = $fila_rpt['cantempresas'];
		  $cuefil10 = $fila_rpt['cantmercado'];
		  $cuefil11 = $fila_rpt['cantpuerto'];
		  $cuefil12 = $fila_rpt['cantaduana'];
				 $cuefil13 = $fila_rpt['cantdepa'];
				 $cuefil14 = $fila_rpt['cantprov'];
				 $cuefil15 = $fila_rpt['cantdisti'];
				 $cuefil16 = $fila_rpt['cantagente'];
				 $cuefil17 = $fila_rpt['cantviatransp'];
				 
		  $sumvfoldol = $sumvfoldol + $cuefil1;
		  $sumpesnet = $sumpesnet + $cuefil2;
		  $sumprecio = $sumprecio + $cuefil3;
		  $sumbruto = $sumbruto + $cuefil4;
		  $sumfis = $sumfis + $cuefil5;
		  $sumicon = $sumicon + $cuefil6;
		  $sumtotreg = $sumtotreg + $cuefil7;
		  
		  echo "<tr>";
echo"<td>$cuen</td>";
echo "<td>$nombredesc</td>";
echo "<td>".number_format($cuefil1,2)."</td>";
echo "<td>".number_format($cuefil2,2)."</td>";
echo "<td>".number_format($cuefil3,2)."</td>";
//echo "<td>".number_format($cuefil4,2)."</td>";
//echo "<td>".number_format($cuefil5,2)."</td>";
echo "<td>".number_format($cuefil6,2)."</td>";
echo "<td>".number_format($cuefil7,2)."</td>";
echo "<td>".number_format($cuefil8,2)."</td>";
echo "<td>".number_format($cuefil9,2)."</td>";
echo "<td>".number_format($cuefil10,2)."</td>";
echo "<td>".number_format($cuefil11,2)."</td>";
echo "<td>".number_format($cuefil12,2)."</td>";
echo "<td>".number_format($cuefil13,2)."</td>";
//echo "<td>".number_format($cuefil14,2)."</td>";
//echo "<td>".number_format($cuefil15,2)."</td>";
echo "<td>".number_format($cuefil16,2)."</td>";
echo "<td>".number_format($cuefil17,2)."</td>";
 echo "</tr>";
		  
		  }
	$totaprecio = $sumprecio / $cuen;
	
	//echo"<tfoot>";
	/*echo"<tr>";
	echo"<td>1</td>";
	echo"<td><center><b>Total</b></center></td>";
	echo"<td>".number_format($sumvfoldol,2)."</td>";
	echo"<td>".number_format($sumpesnet,2)."</td>";
	echo"<td>".number_format($totaprecio,2)."</td>";
	echo"<td>".number_format($sumbruto,2)."</td>";
	echo"<td>".number_format($sumfis,2)."</td>";
	echo"<td>".number_format($sumicon,2)."</td>";
	echo"<td>".number_format($sumtotreg,2)."</td>";
	echo"<td>xx</td>";
	echo"<td>xx</td>";
	echo"<td>xx</td>";
	echo"<td>xx</td>";
	echo"<td>xx</td>";
	echo"<td>xx</td>";
	echo"<td>xx</td>";
	echo"<td>xx</td>";
	echo"<td>xx</td>";
	echo"<td>xx</td>";
	echo"</tr>";*/
	//echo"</tfoot>";
		  echo"</tbody>";
		  echo"</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  
		   //echo "<a class='btn btn-success' href='rpt_excel/rpt_mdestino_Aanual_excel.php?dato=$partida1&option=$radiox&varia2=$anio'>Exportar Excel <img src='images/Excel-icon.png'></a>";
		   echo "</div></div></div>";
		   
		   ?>



<?php
		   
	  }

				?>
           
            </div>
            </div>
        </div>
        </div>
        </div>
        </div>

</div>

    </div>

</body>

    <!--   Core JS Files   -->
<script src="../../js/core/jquery.min.js"></script>
<script src="../../js/core/popper.min.js"></script>


<script src="../../js/bootstrap-material-design.min.js"></script>


<script src="../../js/plugins/perfect-scrollbar.jquery.min.js"></script>



<!--  Google Maps Plugin  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>


<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="../../js/plugins/moment.min.js"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="../../js/plugins/bootstrap-datetimepicker.min.js"></script>

<!--	Plugin for the Sliders, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../../js/plugins/nouislider.min.js"></script>



<!--	Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="../../js/plugins/bootstrap-selectpicker.js"></script>

<!--	Plugin for Tags, full documentation here: https://xoxco.com/projects/code/tagsinput/  -->
<script src="../../js/plugins/bootstrap-tagsinput.js"></script>

<!--	Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../js/plugins/jasny-bootstrap.min.js"></script>

<!-- Plugins for presentation and navigation  -->
<script src="../../assets-for-demo/js/modernizr.js"></script>




<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->

<script src="../../js/material-dashboard.js?v=2.0.1"></script>



<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- Library for adding dinamically elements -->
<script src="../../js/plugins/arrive.min.js" type="text/javascript"></script>

<!-- Forms Validations Plugin -->
<script src="../../js/plugins/jquery.validate.min.js"></script>

<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../../js/plugins/chartist.min.js"></script>

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../../js/plugins/jquery.bootstrap-wizard.js"></script>

<!--  Notifications Plugin, full documentation here: https://bootstrap-notify.remabledesigns.com/    -->
<script src="../../js/plugins/bootstrap-notify.js"></script>

<!-- Vector Map plugin, full documentation here: https://jvectormap.com/documentation/ -->
<script src="../../js/plugins/jquery-jvectormap.js"></script>

<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../../js/plugins/nouislider.min.js"></script>

<!--  Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="../../js/plugins/jquery.select-bootstrap.js"></script>

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../../js/plugins/jquery.datatables.js"></script>

<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="../../js/plugins/sweetalert2.js"></script>

<!-- Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../js/plugins/jasny-bootstrap.min.js"></script>

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../../js/plugins/fullcalendar.min.js"></script>

<!-- demo init -->
<script src="../../js/plugins/demo.js"></script>
 
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
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
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

  <script type="text/javascript">
    $().ready(function(){
        demo.checkFullPageBackgroundImage();

        setTimeout(function(){
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

<?php
//cerrando conexion
	mysqli_close($conexpg);
?>
</html>