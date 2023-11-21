<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
		print "<script>alert('Acceso invalido! - Inicia Sesion para ver los resumenes');window.location='../../';</script>";
}
}
set_time_limit(750);
include("../../incBD/inibd.php");

//$paisname = $_POST["namempE"];
//$paiscode = $_POST["codempE"];
//$nombres2 = $_POST['condiciona'];

$partida1 = $_POST["partidares"];
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
	    $c = sql_quote($_GET[$nombres2]); //para ejecutar consulta
		//$busqueda = htmlentities($q); //para mostrar en pantalla
	    $busqueda = $q; //para mostrar en pantalla

		$sqlStr = "SELECT * FROM resumen_partidas WHERE concat(codigo,descripcion) LIKE '%$q%' AND varia_filtro = '$nombres2' AND codigo <> 'Total'";
		$sqlStrAux = "SELECT count(*) as total FROM resumen_partidas WHERE concat(codigo,descripcion) LIKE '%$q%' AND varia_filtro = '$nombres2' AND codigo <> 'Total'";
	}else{
		$sqlStr = "SELECT * FROM resumen_partidas WHERE varia_filtro = '$nombres2' AND codigo <> 'Total' ";
		$sqlStrAux = "SELECT count(*) as total FROM resumen_partidas WHERE varia_filtro = '$nombres2' AND codigo <> 'Total' ";
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
              <h4 class='card-title'><b>Reporte Resumen Anual de Indicadores</b><br> Partida #: Todos │ Fecha Numeracion │ $combo │ Periodo 2012 - 2021 </b> </h4>
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
			                  <th><b> N#. Partida </b></th>
							  <th><b>Descripcion</b></th>
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
				$pasa = $pasa + 1;
				$cod_emp= $row['codigo'];
				
				$sumgen1 = $sumgen1 + $row['anio1'];
				$sumgen2 = $sumgen2 + $row['anio2'];
				$sumgen3 = $sumgen3 + $row['anio3'];
				$sumgen4 = $sumgen4 + $row['anio4'];
				$sumgen5 = $sumgen5 + $row['anio5'];
				$sumgen6 = $sumgen6 + $row['anio6'];
				$sumgen7 = $sumgen7 + $row['anio7'];
				$sumgen8 = $sumgen8 + $row['anio8'];
				$sumgen9 = $sumgen9 + $row['anio9'];
				$sumgen10 = $sumgen10 + $row['anio10'];
				
				echo "<tr class='row$r'>
				
				<td><a href='#' onclick='document.forma$pasa.submit()'>$cod_emp</a>
	<form method='post' name='forma$pasa' action='../../partida.php' target='_blank'>
<input type='hidden' name='depavalue' value=''>
<input type='hidden' name='datopartida' value='$cod_emp'>
<input type='hidden' name='btnsearchpartida' >
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
			/*echo "<tr>";
			echo "<td></td>";
			echo "<td>Totales</td>";
			echo "<td>".number_format($sumgen1,2)."</td>";
			echo "<td>".number_format($sumgen2,2)."</td>";
			echo "<td>".number_format($sumgen3,2)."</td>";
			echo "<td>".number_format($sumgen4,2)."</td>";
			echo "<td>".number_format($sumgen5,2)."</td>";
			echo "<td>".number_format($sumgen6,2)."</td>";
			echo "<td>".number_format($sumgen7,2)."</td>";
			echo "<td>".number_format($sumgen8,2)."</td>";
			echo "<td>".number_format($sumgen9,2)."</td>";
			echo "<td>".number_format($sumgen10,2)."</td>";
			echo "<td>1</td>";
			echo "<td>1</td>";
			echo "</tr>";*/
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

<!--	Plugin for Tags, full documentation here: https://xoxco.com/projects/code/tagsinput/  -->
<script src="../../js/plugins/bootstrap-tagsinput.js"></script>

<!-- Plugins for presentation and navigation  -->
<script src="../../assets-for-demo/js/modernizr.js"></script>

<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="../../js/material-dashboard.js?v=2.0.1"></script>

<script type="text/javascript" src="jquery.tablesorter.js"></script> 

<!-- demo init -->
<script src="../../js/plugins/demo.js"></script>
  
  <script type="text/javascript">
  $(document).ready(function() 
    { 
        $("#datatablese").tablesorter(); 
    } 
);
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

</html>