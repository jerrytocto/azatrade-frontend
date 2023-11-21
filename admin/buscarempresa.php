<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='login/';</script>";
}
}
set_time_limit(250);
//$partida1 = $_POST["varipartidamerca"];
?>
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="img/logo.png">
<link rel="icon" href="img/logo.png">
<title>
   ..: Azatrade :..
</title>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../../css/demo.css" rel="stylesheet"/>
<style>
/* estilo caja input */
.css-input { font-size:16px; border-style:solid; border-radius:25px; border-width:3px; border-color:#65adeb; padding:7px;  } 
		 .css-input:focus { outline:none; }
</style>
<script languaje="javascript">
function envia(num,nome){
opener.document.data.empresa.value = num;
opener.document.data.nomempresa.value = nome;
close();
}
</script>
      
       <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
        </head>
<body>
	<div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
</body>
        <body class="off-canvas-sidebar register-page" style="background-image: url('img/plan.jpg'); background-size: cover; background-position: top center;">

    
    <div class="wrapper wrapper-full-page">
            <div class='col-md-12'>

         <!-- form -->
         <div class="col-md-12">
      <div class="card ">
        <div class="card-header card-header-info card-header-text">
          <div class="card-text">
            <h4 class="card-title">Consultar Datos de la Empresa</h4>
          </div>
        </div>
        <div class="card-body ">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
            <div class="row">
            </div>
            <div class="row">
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" name="datoempresa" class="form-control css-input" placeholder="Ingrese Ruc / Empresa" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="submit" name="busca" class="btn btn-success" value="Consultar">
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

         <!-- fin form -->
         
           <!--<div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header card-header-text card-header-warning">
          <div class="card-text">
           <h5>Resultado de la Busqueda</h5>
            <p class="card-category">Haga Click sobre la fila para seleccionar</p>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead class="text-warning">
              <th>#</th>
              <th>Ruc</th>
              <th>Razon Social</th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Dakota Rice</td>
                <td>$36,738</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>-->
           
    <!--<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Danger - </b> This is a regular notification made with ".alert-danger"</span>
          </div>-->
           
            <?php
				include("incBD/inibd.php");
if(isset($_REQUEST['busca'])){ //preguntamos si el boton ya fue pulsado o presionado
$empresa=$_REQUEST['datoempresa'];
	$busque = "SELECT exportacion.ndoc, exportacion.dnombre FROM exportacion WHERE exportacion.dnombre <> '' AND concat(exportacion.ndoc, exportacion.dnombre) LIKE UPPER('%$empresa%') GROUP BY exportacion.dnombre, exportacion.ndoc ORDER BY exportacion.dnombre ASC";
	/*$resultado = pg_query($busque) or die("Error en la Consulta SQL");
	  $numReg = pg_num_rows($resultado);
	  if($numReg>0){*/
		  $resultado=$conexpg->query($busque); 
if($resultado->num_rows>0){ 

		  echo"<div class='col-lg-12 col-md-12'>
      <div class='card'>
        <div class='card-header card-header-text card-header-warning'>
          <div class='card-text'>
           <h5>Resultado de la Busqueda</h5>
            <p class='card-category'>Haga Click sobre la fila para seleccionar</p>
          </div>
        </div>
        <div class='card-body table-responsive'>
          <table class='table table-hover'>
            <thead class='text-warning'>
              <th>#</th>
              <th>Ruc</th>
              <th>Razon Social</th>
            </thead>
            <tbody>";
		 // while ($fila=pg_fetch_array($resultado)) {
			  while($fila=$resultado->fetch_array()){
			  $item = $item + 1 ;
			  $num_ruc= $fila['ndoc'];
			  $n_empresa= $fila['dnombre'];
			  
			  echo"<tr>";
                echo"<td>$item</td>";
                echo"<td>";
				?>
				<a href="#" onclick="envia(<?php echo $fila['ndoc']; ?>, '<?php echo $fila['dnombre']; ?>');">
              
<?php echo $fila['ndoc']; ?>
	</a>
				
				<?php
			  //$num_ruc
				echo"</td>";
                echo"<td>";
			  ?>
			  <a href="#" onclick="envia(<?php echo $fila['ndoc']; ?>, '<?php echo $fila['dnombre']; ?>');">
              
<?php echo $fila['dnombre']; ?>
	</a>
			  <?php
			  //$n_empresa
			  echo"</td>";
              echo"</tr>";
			  
		  }
		  echo"</tbody>
          </table>
        </div>
      </div>
    </div>";
	  }else{
		echo"<div class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <i class='material-icons'>close</i>
            </button>
            <span>
              <b> MENSAJE </b> No se encontraron datos en la busqueda realizada </span>
          </div>";  
	  }


  }else{//fin si hay resultados sino muestra alerta
	/*echo"<div class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <i class='material-icons'>close</i>
            </button>
            <span>
              <b> ALERTA </b> Para realizar la busqueda ingrese datos </span>
          </div>";*/
}
				?>
           
            </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    <!--<footer class="footer ">
    <div class="container">
        <nav class="pull-left">
             <ul>
                <li>
                    <a href="#">
                        Azatrade Business Intelligence
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> | Desarrollado por <a href="https://www.azasof.com" target="_blank"><font color="#2C1BC1">Azasof</font></a>.
        </div>
    </div>
</footer>-->
</div>

    </div>

</body>

    <!--   Core JS Files   -->
<script src="js/core/jquery.min.js"></script>
<script src="js/core/popper.min.js"></script>


<script src="js/bootstrap-material-design.min.js"></script>


<script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>



<!--  Google Maps Plugin  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>


<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="js/plugins/moment.min.js"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="js/plugins/bootstrap-datetimepicker.min.js"></script>

<!--	Plugin for the Sliders, full documentation here: https://refreshless.com/nouislider/ -->
<script src="js/plugins/nouislider.min.js"></script>



<!--	Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="js/plugins/bootstrap-selectpicker.js"></script>

<!--	Plugin for Tags, full documentation here: https://xoxco.com/projects/code/tagsinput/  -->
<script src="js/plugins/bootstrap-tagsinput.js"></script>

<!--	Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="js/plugins/jasny-bootstrap.min.js"></script>

<!-- Plugins for presentation and navigation  -->
<script src="assets-for-demo/js/modernizr.js"></script>




<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->

<script src="js/material-dashboard.js?v=2.0.1"></script>



<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- Library for adding dinamically elements -->
<script src="js/plugins/arrive.min.js" type="text/javascript"></script>

<!-- Forms Validations Plugin -->
<script src="js/plugins/jquery.validate.min.js"></script>

<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="js/plugins/chartist.min.js"></script>

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="js/plugins/jquery.bootstrap-wizard.js"></script>

<!--  Notifications Plugin, full documentation here: https://bootstrap-notify.remabledesigns.com/    -->
<script src="js/plugins/bootstrap-notify.js"></script>

<!-- Vector Map plugin, full documentation here: https://jvectormap.com/documentation/ -->
<script src="js/plugins/jquery-jvectormap.js"></script>

<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="js/plugins/nouislider.min.js"></script>

<!--  Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select -->
<script src="js/plugins/jquery.select-bootstrap.js"></script>

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="js/plugins/jquery.datatables.js"></script>

<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="js/plugins/sweetalert2.js"></script>

<!-- Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="js/plugins/jasny-bootstrap.min.js"></script>

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="js/plugins/fullcalendar.min.js"></script>

<!-- demo init -->
<script src="js/plugins/demo.js"></script>
 
    <!--<script type="text/javascript" src="../js/jsexport/jquery.dataTables.min.js"></script>-->
    <!--<script type="text/javascript" src="js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.print.min.js"></script>-->
  
  <script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable({
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
    var table = $('#datatables').DataTable();

    $('.card .material-datatables label').addClass('form-group');
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