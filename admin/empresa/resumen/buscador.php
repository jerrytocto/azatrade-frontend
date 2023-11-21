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
include("../../incBD/inibd.php");

$paisname = $_POST["namempE"];
$paiscode = $_POST["codempE"];
$nombres2 = $_POST['condiciona'];

if($nombres2==""){
	$nombres2 = $_GET['condiciona'];
}else{
	$nombres2 = $_POST['condiciona'];
}

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
<script src="include/buscador.js" type="text/javascript" language="javascript"></script>
       <style>
	table.registros{
		border:0;
		width:100%;
	}
table.registros td{
		border:0;
	}	
table.registros tr.titulos{
		background:#d0d0d0;
		text-align:center;
		text-transform:uppercase;
	}
table.registros tr.row0{
		background:#e0e0e0;
	}
table.registros tr.row1{
		background:#f7f7f7;
	</style>
      
      
       <style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  border: 1px solid #ddd;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

.pagination a:first-child {
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}

.pagination a:last-child {
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}
	</style>
        </head>
<body>
<?php
	//paginador
require('include/funciones.php');
require('include/pagination.class.php');
$items = 10;
$page = 1;

if(isset($_GET['page']) and is_numeric($_GET['page']) and $page = $_GET['page'])
		$limit = " LIMIT ".(($page-1)*$items).",$items";
	else
		$limit = " LIMIT $items";

if(isset($_GET['q']) and !eregi('^ *$',$_GET['q'])){
		$q = sql_quote($_GET['q']); //para ejecutar consulta
		//$busqueda = htmlentities($q); //para mostrar en pantalla
	    $busqueda = $q; //para mostrar en pantalla

		$sqlStr = "SELECT * FROM resumen_empresas WHERE concat(codigo,descripcion) LIKE '%$q%' AND varia_filtro = '$nombres2' AND codigo <> 'Total' ORDER BY anio10 DESC";
		$sqlStrAux = "SELECT count(*) as total FROM resumen_empresas WHERE concat(codigo,descripcion) LIKE '%$q%' AND varia_filtro = '$nombres2' AND codigo <> 'Total' ";
	}else{
		$sqlStr = "SELECT * FROM resumen_empresas WHERE varia_filtro = '$nombres2' AND codigo <> 'Total' ORDER BY anio10 DESC ";
		$sqlStrAux = "SELECT count(*) as total FROM resumen_empresas WHERE varia_filtro = '$nombres2' AND codigo <> 'Total'  ";
	}

$aux = Mysqli_Fetch_Assoc(mysqli_query($conexpg,$sqlStrAux));
$query = mysqli_query($conexpg,$sqlStr.$limit);
	?>
	
	<div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="../../img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
</body>
        <body class="off-canvas-sidebar register-page" style="background-image: url('../../img/plan.jpg'); background-size: cover; background-position: top center;">

    <div class="wrapper wrapper-full-page">
            <div class='col-md-12'>
            
            <?php
				echo"<div class='card'>";
	echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title'><b>Reporte Resumen Anual de Indicadores</b><br> Empresas #: Todos │ Fecha Numeración │ $combo │ Periodo 2012 - 2021 </b> </h4>
            </div>";
		echo"<div class='card-body'>";
		echo"<div class='toolbar'>";
        echo"</div>";
         echo"<div class='material-datatables'>";
				?>
				
				<div class='row'>
				<div class="col-md-6">
				<a href="descarga_excel.php?condiciona=<?=$nombres2;?>"><button class="btn btn-round btn-info">Descargar Excel</button></a>
				</div>
<div class="col-md-6" align="right">
           <form action="index.php" onsubmit="return buscar()">
      <label>Buscar</label>
      <input type="text" id="q" name="q" value="<?php if(isset($q)) echo $busqueda;?>" onKeyUp="return buscar()">
      <input type="hidden" id="c" name="condiciona" value="<?=$nombres2;?>">
      <input type="submit" value="Buscar" id="boton">
    </form>
				</div>
         </div>
          
          <center><span id="loading"></span></center>
           
          <div id="resultados">
	<p><?php
		if($aux['total'] and isset($busqueda)){
				echo "<b>{$aux['total']}</b> Resultado".($aux['total']>1?'s':'')." que coinciden con tu b&uacute;squeda \"<strong>$busqueda</strong>\".";
			}elseif($aux['total'] and !isset($q)){
				echo "Total de registros: <b> {$aux['total']} </b>";
			}elseif(!$aux['total'] and isset($q)){
				echo"No hay registros que coincidan con tu b&uacute;squeda \"<strong>$busqueda</strong>\"";
			}
	?></p>

	<?php 
		if($aux['total']>0){
			$p = new pagination;
			$p->Items($aux['total']);
			$p->limit($items);
			if(isset($q))
					//$p->target("index.php?q=".urlencode($q));
			        $p->target("index.php?condiciona=$nombres2&q=".urlencode($q));
				else
					//$p->target("index.php");
			        $p->target("index.php?condiciona=$nombres2");
			$p->currentPage($page);
			$p->show();
			//echo "\t<table class=\"registros\">\n";
			//echo "<tr class=\"titulos\"><td>Titulo</td></tr>\n";
			
			
			
			echo"<div class='table-responsive'>";
			echo "<table id='datatablese' class='table table-striped table-no-bordered table-hover registros'>";
			echo"<thead>";
			echo "<tr class='titulos'>
			                  <th><b> N#. Ruc </b></th>
							  <th><b>Empresas</b></th>
                              <th><b>2012</b></th>
                              <th><b>2013</b></th>
                              <th><b>2014</b></th>
                              <th><b>2015</b></th>
							  <th><b>2016</b></th>
							  <th><b>2017</b></th>
							  <th><b>2018</b></th>
							  <th><b>2019</b></th>
							  <th><b>2020</b></th>
							  <th><b>2021</b></th>
							  <th><b>Var.%20/19</b></th>
							  <th><b>Part.%20</b></th>
			</tr>";
			echo"<thead>";
			echo"<tbody>";
			$r=0;
			while($row = mysqli_fetch_assoc($query)){
          //echo "\t\t<tr class=\"row$r\"><td><a href=\"http://www.mis-algoritmos.com/?p={$row['id']}\" target=\"_blank\">".htmlentities($row['pregunta'])."</a></td></tr>\n";
				$pasa = $pasa + 1;
				$cod_emp= $row['codigo'];
				
				echo "<tr class='row$r'>
				
				<td><a href='#' onclick='document.forma$pasa.submit()'>$cod_emp</a>
	<form method='post' name='forma$pasa' action='../../empresa.php' target='_blank'>
<input type='hidden' name='depavalue' value=''>
<input type='hidden' name='empresa' value='$cod_emp'>
<input type='hidden' name='btnsearchempre' >
</form></td>
				<td>".$row['descripcion']."</td>
				<td>".number_format($row['anio1'],2)."</td>
				<td>".number_format($row['anio2'],2)."</td>
				<td>".number_format($row['anio3'],2)."</td>
				<td>".number_format($row['anio4'],2)."</td>
				<td>".number_format($row['anio5'],2)."</td>
				<td>".number_format($row['anio6'],2)."</td>
				<td>".number_format($row['anio7'],2)."</td>
				<td>".number_format($row['anio8'],2)."</td>
				<td>".number_format($row['anio9'],2)."</td>
				<td>".number_format($row['anio10'],2)."</td>
				<td>".number_format($row['variauno'],2)."%</td>
				<td>".number_format($row['variados'],2)."%</td>
				</tr>";
          if($r%2==0)++$r;else--$r;
        }
			//echo "\t</table>\n";
			echo"</tbody>";
			echo "</table>";
			echo "</div>";
			$p->show();
		}
	?>
    </div>
    
    <?php
				echo "</div>";
			echo "</div>";
			echo "</div>";
				?>

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
<!--<script src="../../js/core/popper.min.js"></script>-->


<script src="../../js/bootstrap-material-design.min.js"></script>


<script src="../../js/plugins/perfect-scrollbar.jquery.min.js"></script>



<!--  Google Maps Plugin  -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>-->


<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<!--<script src="../../js/plugins/moment.min.js"></script>-->

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<!--<script src="../../js/plugins/bootstrap-datetimepicker.min.js"></script>-->

<!--	Plugin for the Sliders, full documentation here: https://refreshless.com/nouislider/ -->
<!--<script src="../../js/plugins/nouislider.min.js"></script>-->



<!--	Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<!--<script src="../../js/plugins/bootstrap-selectpicker.js"></script>-->

<!--	Plugin for Tags, full documentation here: https://xoxco.com/projects/code/tagsinput/  -->
<script src="../../js/plugins/bootstrap-tagsinput.js"></script>

<!--	Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<!--<script src="../../js/plugins/jasny-bootstrap.min.js"></script>-->

<!-- Plugins for presentation and navigation  -->
<script src="../../assets-for-demo/js/modernizr.js"></script>




<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->

<script src="../../js/material-dashboard.js?v=2.0.1"></script>



<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>-->

<!-- Library for adding dinamically elements -->
<!--<script src="../../js/plugins/arrive.min.js" type="text/javascript"></script>-->

<!-- Forms Validations Plugin -->
<!--<script src="../../js/plugins/jquery.validate.min.js"></script>-->

<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<!--<script src="../../js/plugins/chartist.min.js"></script>-->

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<!--<script src="../../js/plugins/jquery.bootstrap-wizard.js"></script>-->

<!--  Notifications Plugin, full documentation here: https://bootstrap-notify.remabledesigns.com/    -->
<!--<script src="../../js/plugins/bootstrap-notify.js"></script>-->

<!-- Vector Map plugin, full documentation here: https://jvectormap.com/documentation/ -->
<!--<script src="../../js/plugins/jquery-jvectormap.js"></script>-->

<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<!--<script src="../../js/plugins/nouislider.min.js"></script>-->

<!--  Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<!--<script src="../../js/plugins/jquery.select-bootstrap.js"></script>-->

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<!--<script src="../../js/plugins/jquery.datatables.js"></script>-->
<script type="text/javascript" src="jquery.tablesorter.js"></script> 
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<!--<script src="../../js/plugins/sweetalert2.js"></script>-->

<!-- Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<!--<script src="../../js/plugins/jasny-bootstrap.min.js"></script>-->

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<!--<script src="../../js/plugins/fullcalendar.min.js"></script>-->

<!-- demo init -->
<script src="../../js/plugins/demo.js"></script>
 
    <!--<script type="text/javascript" src="../js/jsexport/jquery.dataTables.min.js"></script>-->
    <!--<script type="text/javascript" src="../../js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.print.min.js"></script>-->
  
  <script type="text/javascript">
  $(document).ready(function() 
    { 
        $("#datatablese").tablesorter(); 
    } 
);
 </script>
 
  <!--<script type="text/javascript">
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

</script>-->

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
	//mysqli_close($conexpg);
?>
</html>