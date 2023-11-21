<?php
session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
}
}
set_time_limit(500);
$partida1 = $_POST["varipartidamerca"];
$namedepa1 = $_POST["namedepa"];
$ubicod1 = $_POST["codubi"];
$describus = $_POST["nomdescri"];
$filtro = $_POST["unavaria"];

/*if($ubicod1!=""){
	$flatcod = $ubicod1;
	$sqlconsu = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}else{
	$flatcod = "";
	$sqlconsu = "";
}*/

if($filtro=="vfobserdol"){
					$nomfiltro ="Valor FOB USD";
				}else if($filtro=="vpesnet"){
					$nomfiltro ="Peso Neto (Kg)";
				}else{
					$nomfiltro ="Precio FOB USD x KG";
				}
?>
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="../img/logo.png">
<link rel="icon" href="../../img/logo.png">
<title>
   ..: Azatrade :..
</title>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="../../css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="../../css/buttons.dataTables.min.css">
<link href="../../css/demo.css" rel="stylesheet"/>
     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
      
       <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
       
       <script>
$(document).ready(function(){
   /*$("#enlaceajax").click(function(evento){
      evento.preventDefault();*/
      $("#cargando").css("display", "inline");
      $("#consultaforpro").load("procesa.php?partida=<?=$partida1;?>&namedepa=<?=$namedepa1;?>&ubicod=<?=$ubicod1;?>&describus=<?=$describus;?>&unavaria=<?=$filtro;?> ", function(){
         $("#cargando").css("display", "none");
      });
  /* }); */
})
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

            <div id="cargando" style="display:none; color: #FFFFFF;">
            <center>
            <img class="img-responsive" src="../../img/loading-carga.gif" width="100px"><br>
            <h4><b>Cargando... estamos procesando la información, espere un momento por favor</b></h4>
            </center>
            </div>
<div id="consultaforpro"></div>
           
            </div>
            </div>
        </div>
        </div>
        </div>
        </div>

</div>

    </div>

</body>

   
<script src="../../js/core/jquery.min.js"></script>
<script src="../../js/core/popper.min.js"></script>
<script src="../../js/bootstrap-material-design.min.js"></script>
<script src="../../js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="../../js/plugins/moment.min.js"></script>
<script src="../../js/plugins/bootstrap-datetimepicker.min.js"></script>
<script src="../../js/plugins/nouislider.min.js"></script>
<script src="../../js/plugins/bootstrap-selectpicker.js"></script>
<script src="../../js/plugins/bootstrap-tagsinput.js"></script>
<script src="../../js/plugins/jasny-bootstrap.min.js"></script>
<script src="../../assets-for-demo/js/modernizr.js"></script>
<script src="../../js/material-dashboard.js?v=2.0.1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="../../js/plugins/arrive.min.js" type="text/javascript"></script>
<script src="../../js/plugins/jquery.validate.min.js"></script>
<script src="../../js/plugins/chartist.min.js"></script>
<script src="../../js/plugins/jquery.bootstrap-wizard.js"></script>
<script src="../../js/plugins/bootstrap-notify.js"></script>
<script src="../../js/plugins/jquery-jvectormap.js"></script>
<script src="../../js/plugins/nouislider.min.js"></script>
<script src="../../js/plugins/jquery.select-bootstrap.js"></script>
<script src="../../js/plugins/jquery.datatables.js"></script>
<script src="../../js/plugins/sweetalert2.js"></script>
<script src="../../js/plugins/jasny-bootstrap.min.js"></script>
<script src="../../js/plugins/fullcalendar.min.js"></script>
<script src="../../js/plugins/demo.js"></script>

   <!--
    <script type="text/javascript" src="../../js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../../js/jsexport/buttons.print.min.js"></script>
  
  <script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable({
		"order": [[11, "desc" ]],
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [
            [15, 30, 55, -1],
            [15, 30, 55, "Todos"]
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
	//mysqli_close($conexpg);
?>
</html>