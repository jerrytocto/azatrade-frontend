<?php
/*session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
}
}*/
ini_set('memory_limit', '1800M'); // uso de memoria 1.5G
set_time_limit(1500);
$textonom = $_POST["procesaazatrade"];
//obtenemos fecha y hora actual
date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d H:i:s");
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
<Center><img class="img-responsive" src="../../img/loading-carga.gif" width="100px"><br><p style="font-size:24px; color:#EC0D36;"> Espere un momento, el procesamiento de datos puede tardar unos minutos. </p></Center>
     </div>
</body>
        <body class="off-canvas-sidebar register-page" style="background-image: url('../../img/plan.jpg'); background-size: cover; background-position: top center;">

    <div class="wrapper wrapper-full-page">
            <div class='col-md-12'>

            <?php
				include("../conexion/config.php");

				
				function eliminar_simbolos($string){
 
    $string = trim($string);
 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('á', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('é', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('í', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('ó', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('ú', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('ñ', 'Ñ', 'c', 'C'),
        $string
    );
 
    $string = str_replace(
        /*array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "<code>", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),*/
		array("\\", "¨", "º", "~",
             "'", "^", "¨", "´", " "),
        ' ',
        $string
    );
return $string;
} 
				
  			
$query_insercons = "SELECT CADU, FANO, NDCL, FNUM, FEMB, FECH_RECEP, NDCLREG, FREG, FANOREG, CAGE, TDOC, NDOC, DNOMBRE, CPAIDES, CPUEDES, CVIATRA, CUNITRA, CEMPTRA, DMAT, NCON, CENTFIN, CALM, DNOMPRO, DDIRPRO, DK, DK2, NSER, PART_NANDI, DCOM, DMER2, DMER3, DMER4, DMER5, CEST, VFOBSERDOL, VPESNET, VPESBRU, QUNIFIS, TUNIFIS, QUNICOM, TUNICOM, UBIGEO, DNOMCON, DDIRCON FROM procesaexport";
				$querysql=$linkaz->query($query_insercons); 
if($querysql->num_rows>0){ 
while($rowsql=$querysql->fetch_array()){ 
	$cuentatotal = $cuentatotal + 1;
    $proce1= trim($rowsql['CADU']);
    $proce2= trim($rowsql['FANO']);
	$proce3= trim($rowsql['NDCL']);
	$proce4= $rowsql['FNUM'];
	$proce5= $rowsql['FEMB'];
	$proce6= $rowsql['FECH_RECEP'];
	$proce7= trim($rowsql['NDCLREG']);
	$proce8= $rowsql['FREG'];
	$proce9= $rowsql['FANOREG'];
	$proce10= $rowsql['CAGE'];
	$proce11= $rowsql['TDOC'];
	$proce12= $rowsql['NDOC'];
	$proce13= eliminar_simbolos($rowsql['DNOMBRE']);
	$proce14= $rowsql['CPAIDES'];
	$proce15= $rowsql['CPUEDES'];
	$proce16= $rowsql['CVIATRA'];
	$proce17= $rowsql['CUNITRA'];
	$proce18= $rowsql['CEMPTRA'];
	$proce19= $rowsql['DMAT'];
	$proce20= $rowsql['NCON'];
	$proce21= $rowsql['CENTFIN'];
	$proce22= $rowsql['CALM'];
	$proce23= eliminar_simbolos($rowsql['DNOMPRO']);
	$proce24= eliminar_simbolos($rowsql['DDIRPRO']);
	$proce25= $rowsql['DK'];
	$proce26= $rowsql['DK2'];
	$proce27= trim($rowsql['NSER']);
	$proce28= trim($rowsql['PART_NANDI']);
	$proce29= eliminar_simbolos($rowsql['DCOM']);
	$proce30= eliminar_simbolos($rowsql['DMER2']);
	$proce31= eliminar_simbolos($rowsql['DMER3']);
	$proce32= eliminar_simbolos($rowsql['DMER4']);
	$proce33= eliminar_simbolos($rowsql['DMER5']);
	$proce34= $rowsql['CEST'];
	$proce35= $rowsql['VFOBSERDOL'];
	$proce36= $rowsql['VPESNET'];
	$proce37= $rowsql['VPESBRU'];
	$proce38= $rowsql['QUNIFIS'];
	$proce39= $rowsql['TUNIFIS'];
	$proce40= $rowsql['QUNICOM'];
	$proce41= $rowsql['TUNICOM'];
	$proce42= $rowsql['UBIGEO'];
	$proce43= $rowsql['DNOMCON'];
	$proce44= $rowsql['DDIRCON'];
	
	$cupar = strlen($proce28);
	
	if($cupar=="9"){// si hay partida con 9 digitos se le agrega el cero adelante
		$agrepartida = '0'.$proce28;
	}else{
		$agrepartida = $proce28;
	}
	
	//campo fecha
	if($proce4=='0' or $proce4==""){
		$proce4 = "9999-12-31";
	}else{
		$proce4 = $rowsql['FNUM'];
	}
	//campo fecha
	if($proce5=='0' or $proce5==""){
		$proce5 = "9999-12-31";
	}else{
		$proce5 = $rowsql['FEMB'];
	}
	//campo fecha
	if($proce6=='0' or $proce6==""){
		$proce6 = "9999-12-31";
	}else{
		$proce6 = $rowsql['FECH_RECEP'];
	}
	//campo fecha
	if($proce8=='0' or $proce8==""){
		$proce8 = "9999-12-31";
	}else{
		$proce8 = $rowsql['FREG'];
	}
	
	//$keyunico = $proce1."-".$proce2."-".$proce3."-".$proce7."-".$proce27."-".$agrepar;
	$keyunico = $proce1.$proce2.$proce3.$proce7.$proce27.$agrepartida;

	//consultamos si el key ya existe, si existe actualizamos datos si no existe insertamos como nuevos
	$sqlexpo = "SELECT ID FROM exportacion WHERE ID='$keyunico' ";
	$query2=$linkaz->query($sqlexpo); 
if($query2->num_rows>0){ 
while($rows2=$query2->fetch_array()){
	$actualizados = $actualizados + 1;
	$udaveri= $rows2['ID'];
	//actualizamos
	$update = "update exportacion set CADU='$proce1', FANO='$proce2', NDCL='$proce3', FNUM='$proce4', FEMB='$proce5', FECH_RECEP='$proce6', NDCLREG='$proce7', FREG='$proce8', FANOREG='$proce9', CAGE='$proce10', TDOC='$proce11', NDOC='$proce12', DNOMBRE='$proce13', CPAIDES='$proce14', CPUEDES='$proce15', CVIATRA='$proce16', CUNITRA='$proce17', CEMPTRA='$proce18', DMAT='$proce19', NCON='$proce20', CENTFIN='$proce21', CALM='$proce22', DNOMPRO='$proce23', DDIRPRO='$proce24', DK='$proce25', DK2='$proce26', NSER='$proce27', PART_NANDI='$agrepartida', DCOM='$proce29', DMER2='$proce30', DMER3='$proce31', DMER4='$proce32', DMER5='$proce33', CEST='$proce34', VFOBSERDOL='$proce35', VPESNET='$proce36', VPESBRU='$proce37', QUNIFIS='$proce38', TUNIFIS='$proce39', QUNICOM='$proce40', TUNICOM='$proce41', UBIGEO='$proce42', DNOMCON='$proce43', DDIRCON='$proce44', ACCION='EDITADO', FECHA_REG_MODI='$fechahoy' WHERE ID='$udaveri' ";
	$linkaz->query($update);
}
}else{
	//insertamos
	$nuevos = $nuevos + 1;
	$sqlinser = "insert into exportacion (ID, CADU, FANO, NDCL, FNUM, FEMB, FECH_RECEP, NDCLREG, FREG, FANOREG, CAGE, TDOC, NDOC, DNOMBRE, CPAIDES, CPUEDES, CVIATRA, CUNITRA, CEMPTRA, DMAT, NCON, CENTFIN, CALM, DNOMPRO, DDIRPRO, DK, DK2, NSER, PART_NANDI, DCOM, DMER2, DMER3, DMER4, DMER5, CEST, VFOBSERDOL, VPESNET, VPESBRU, QUNIFIS, TUNIFIS, QUNICOM, TUNICOM, UBIGEO, DNOMCON, DDIRCON, ACCION, FECHA_REG_MODI) VALUE ('$keyunico',  '$proce1', '$proce2', '$proce3', '$proce4', '$proce5', '$proce6', '$proce7', '$proce8', '$proce9', '$proce10', '$proce11', '$proce12', '$proce13', '$proce14', '$proce15', '$proce17', '$proce17', '$proce18', '$proce19', '$proce20', '$proce21', '$proce22', '$proce23', '$proce24', '$proce25', '$proce26', '$proce27', '$agrepartida', '$proce29', '$proce30', '$proce31', '$proce32', '$proce33', '$proce34', '$proce35', '$proce36', '$proce37', '$proce38', '$proce39', '$proce40', '$proce41', '$proce42', '$proce43', '$proce44', 'NUEVO', '$fechahoy')";
	$linkaz->query($sqlinser);
	
}
	if($actualizados==""){
		$actualizados = "0";
	}
	if($nuevos==""){
		$nuevos = "0";
	}
		 
	//echo"$keyunico <br>";
		  }
	echo"<br><br><h4><center><font color='#FFFFFF'>";
	echo"Nombre Proceso: <b>$textonom</b> <br>";
	 echo"Total Procesados: <b>$cuentatotal</b> <br>";
	echo"Total Nuevos: <b>$nuevos</b> <br>";
	echo"Total Actualizados: <b>$actualizados</b> <br>";
	echo"</font></center></h4>";
	
	//insertamos registro del procesamiento
	$insertproce = "INSERT INTO historialcargas (nomhisto, fechareg,procesados,nuevos,modificados)VALUE('$textonom','$fechahoy','$cuentatotal','$nuevos','$actualizados')";
	$linkaz->query($insertproce);
	
	//limpiamos tabla donde se cargo la data
	$delete1 = mysqli_query($linkaz, "TRUNCATE TABLE procesaexport");
  if (!$delete1) {
    echo "Query: Un error al limpiar la tabla de procesamiento";
  }
	  }else{
	echo"<br><br><br>";
	echo"<h3><center><b><font color='#FFFFFF'>NO HAY DATOS PARA PROCESAR, CARGUE DATA </font></b></center></h3>";
}
				//cerramos conexion
mysqli_close($linkaz);
?>
<center><a href="../" class="btn btn-primary">Proceso Terminado <br> Click aqui para Finalizar</a></center>
           
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

</html>