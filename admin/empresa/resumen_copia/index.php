<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
		//print "<script>window.location='../../';</script>";
		print "<script>alert('Acceso invalido! - Inicia Sesion para ver los resumenes');window.location='../../';</script>";
}
}
set_time_limit(750);
$paisname = $_POST["namempE"];
$paiscode = $_POST["codempE"];
$nombres2 = $_POST['condiciona'];

//si es un usuario basico y no tiene acceso
if($_SESSION['rol']=="BASICO"){
if($_SESSION['acceso_pago']=="No"){
	print "<script>alert('Acceso invalido! - Para ver los resumenes adquiere uno de nuestros planes Premiun');window.location='../../planes/';</script>";
}
	}

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
       <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
        </head>
<body>
	<div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="../../img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
</body>
        <body class="off-canvas-sidebar register-page" style="background-image: url('../../img/plan.jpg'); background-size: cover; background-position: top center;">

    <div class="wrapper wrapper-full-page">
            <div class='col-md-12'>

            <?php
				include("../../incBD/inibd.php");
				

if(isset($_POST['condiciona'])){//inicia si hay datos

	$nombres2=$_POST['condiciona'];
  
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
		$filtrofecha='extract(year from exportacion.fnum)';
		$wherefecha ="extract(year from exportacion.fnum) >= '2012' AND
extract(year from exportacion.fnum) <= '2019'";
	
	
  $query1 = "SELECT rp.varia_filtro, rp.codigo as ndoc, rp.descripcion, rp.anio1 AS a2012, rp.anio2 AS a2013, rp.anio3 AS a2014, rp.anio4 AS a2015, rp.anio5 AS a2016, rp.anio6 AS a2017, rp.anio7 AS a2018, rp.anio8 AS a2019, rp.variauno, rp.variados FROM resumen_empresas AS rp WHERE rp.varia_filtro = '$nombres2' AND rp.codigo <> 'Total'";

	$resultado1=$conexpg->query($query1); 
if($resultado1->num_rows>0){ 
		  
		  echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Resumen Anual de Indicadores</b><br> Empresas #: Todos │ Fecha Numeracion │ $combo │ Periodo 2012 - 2019 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>";
        echo"</div>";
         echo"<div class='material-datatables'>";
		echo"<table id='datatablese' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		echo"<thead>
                          <tr>
                              <th><b> N#. Ruc </b></th>
							  <th><b>Empresas</b></th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>Var.%18/17</th>
							  <th>Var.%18</th>
                          </tr>
                      </thead>";
		 echo"<tfoot>
                          <tr>
                              <th><b> N#. Ruc </b></th>
							  <th><b>Empresas</b></th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>Var.%18/17</th>
							  <th>Var.%18</th>
                          </tr>
                      </tfoot>";
           echo"<tbody>";
		  
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
				  
		 $var11 = number_format($fila1['variauno'],2);
		 $var22 = number_format($fila1['variados'],2);

		   echo "<tr>";
echo "<td> 
<a href='#' onclick='document.forma$pasa.submit()'>$cod_emp</a>
	<form method='post' name='forma$pasa' action='../../empresa.php' target='_blank'>
<input type='hidden' name='depavalue' value=''>
<input type='hidden' name='empresa' value='$cod_emp'>
<input type='hidden' name='btnsearchempre' >
</form>
</td>";
echo "<td>$nom_emp</td>";
echo "<td>$year1</td>";
echo "<td>$year2</td>";
echo "<td>$year3</td>";
echo "<td>$year4</td>";
echo "<td>$year5</td>";
echo "<td>$year6</td>";
echo "<td>$year7</td>";
echo "<td>$year8</td>";
echo "<td>$var11%</td>";
echo "<td>$var22%</td>";
 echo "</tr>";

unset($fila1); //eliminamos la fila para evitar sobrecargar la memoria
				  
		  }
	
	$query1to="SELECT rp.anio1 AS a2012, rp.anio2 AS a2013, rp.anio3 AS a2014, rp.anio4 AS a2015, rp.anio5 AS a2016, rp.anio6 AS a2017, rp.anio7 AS a2018, rp.anio8 AS a2019, rp.variauno, rp.variados FROM resumen_empresas AS rp WHERE rp.varia_filtro = '$nombres2' AND rp.codigo = 'Total'";
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
	
}
	
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
			  echo "<th><font size='2'><b>$varitota %</b></font></th>";
			  echo "<th><font size='2'><b>$parti</b></font></th>";
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

<?php include("../../footer_pie.php"); ?>
          <!-- fin grafico -->
           
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