<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='index.php';</script>";
}
}
include("../incBD/inibd.php");
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
set_time_limit(250);
//$activehome ="active";
$cod= $_GET["cod"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<?php include("title.php"); ?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="../css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="../css/buttons.dataTables.min.css">
<link href="../css/demo.css" rel="stylesheet"/>
 <script> 
//creamos la variable ventana_secundaria que contendrá una referencia al popup que vamos a abrir 
//la creamos como variable global para poder acceder a ella desde las distintas funciones 
var ventana_secundaria 
function cerrarVentana(){ 
//window.opener.location.href=window.opener.location.href;
//opener.location.reload(); 
//la referencia de la ventana es el objeto window del popup. Lo utilizo para acceder al método close 
window.close();
} 
</script>
        </head>
        <body >
        <div class="">
         <?php //include("menuizquierdo.php"); ?>


            <div class="">
                <!-- Navbar -->
<?php //include("menusuperior.php"); ?>
<!-- End Navbar -->

                    <div class="content">
                      <div class="container-fluid">
                        <div class="row">
                        	
        <div class="col-md-12">
<div class="card ">
<?php
$sqlvista="SELECT idarancel, SUBSTRING(idarancel,1,4) AS codigos, descripcion FROM arancel WHERE SUBSTRING(idarancel,1,4) = '$cod' ORDER BY idarancel ASC";
/*$rsnv = mysql_query($sqlvista) or die(mysql_error());
if (mysql_num_rows($rsnv) > 0){*/
	$rsnv=$conexpg->query($sqlvista) or die(mysqli_error($conexpg)); 
if($rsnv->num_rows>0){
	echo "<table class='table table-hover'>
<tr>
<td bgcolor='#DDDDDD'><b>#</b></td>
<td bgcolor='#DDDDDD'><b>Codigo</b></td>
<td bgcolor='#DDDDDD'><b>Descripción</b></td>
</tr>";
	/*while($rowv= mysql_fetch_array($rsnv)){*/
	while($rowv=$rsnv->fetch_array()){
		$cue = $cue + 1;
		$codix = $rowv["idarancel"];
		$codi = strlen($codix);
		$descri = $rowv["descripcion"];
		if($codi=="10"){
		echo "<tr>";
	    echo"<td>$cue</td>";
		echo "<td> <a href='viewpartida.php?data=$codix' target='_blank' onclick='cerrarVentana()'>$codix</a> </td>";
		echo "<td> <a href='viewpartida.php?data=$codix' target='_blank' onclick='cerrarVentana()'>$descri</a> </td>";
		echo "</tr>";
	}else{
        echo "<tr>";
		echo"<td>$cue</td>";
		echo "<td>$codix</td>";
		echo "<td>$descri</td>";
		echo "</tr>";
		}

	}
}
echo"</table>";
?>
</div>
    </div>
                       	                        	
                        </div>


                      </div>
                    </div>
                    <?php include("../footer.php"); ?>
            </div>
        </div>


    </body>


<!--   Core JS Files   -->
<script src="../js/core/jquery.min.js"></script>
<script src="../js/core/popper.min.js"></script>
<script src="../js/bootstrap-material-design.min.js"></script>
<script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="../js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="../js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--	Plugin for the Sliders, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../js/plugins/nouislider.min.js"></script>
<!--	Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="../js/plugins/bootstrap-selectpicker.js"></script>
<!--	Plugin for Tags, full documentation here: https://xoxco.com/projects/code/tagsinput/  -->
<script src="../js/plugins/bootstrap-tagsinput.js"></script>
<!--	Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../js/plugins/jasny-bootstrap.min.js"></script>
<!-- Plugins for presentation and navigation  -->
<script src="../js/modernizr.js"></script>

<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->

<script src="../js/material-dashboard.js?v=2.0.1"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- Library for adding dinamically elements -->
<script src="../js/plugins/arrive.min.js" type="text/javascript"></script>

<!-- Forms Validations Plugin -->
<script src="../js/plugins/jquery.validate.min.js"></script>

<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../js/plugins/chartist.min.js"></script>

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../js/plugins/jquery.bootstrap-wizard.js"></script>

<!--  Notifications Plugin, full documentation here: https://bootstrap-notify.remabledesigns.com/    -->
<script src="../js/plugins/bootstrap-notify.js"></script>

<!-- Vector Map plugin, full documentation here: https://jvectormap.com/documentation/ -->
<script src="../js/plugins/jquery-jvectormap.js"></script>

<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../js/plugins/nouislider.min.js"></script>

<!--  Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="../js/plugins/jquery.select-bootstrap.js"></script>

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../js/plugins/jquery.datatables.js"></script>

<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="../js/plugins/sweetalert2.js"></script>

<!-- Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../js/plugins/jasny-bootstrap.min.js"></script>

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../js/plugins/fullcalendar.min.js"></script>

<!-- demo init -->
<script src="../js/plugins/demo.js"></script>

<!-- Sharrre libray -->
<script src="../js/jquery.sharrre.js">
<?php
//cerrando conexion
	mysqli_close($conexpg);
?>

</html>
