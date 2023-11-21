<?php
/*session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
}
}*/
ini_set('memory_limit', '3800M'); // uso de memoria 1.5G
set_time_limit(15000);
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
				
  			
$query_insercons = "SELECT codi_aduan, ano_prese, nume_corre, fech_ingsi, tipo_docum, libr_tribu, dnombre, codi_agent, fech_llega, via_transp, empr_trans, codi_alma, cadu_manif, fech_manif, nume_manif, fech_recep, fech_cance, tipo_cance, banc_cance, codi_enfin, dk, pais_orige, pais_adqui, puer_embar, nume_serie, part_nandi, desc_comer, desc_matco, desc_usoap, desc_fopre, desc_otros, fob_dolpol, fle_dolar, seg_dolar, peso_neto, peso_bruto, unid_fiqty, unid_fides, qunicom, tunicom, sest_merca, adv_dolar, igv_dolar, isc_dolar, ipm_dolar, des_dolar, ipa_dolar, sad_dolar, der_adum, comm, fmod, cant_bulto, clase,  trat_prefe, tipo_trat, codi_liber, impr_reliq FROM procesaimpor ";
				$querysql=$linkaz->query($query_insercons); 
if($querysql->num_rows>0){ 
while($rowsql=$querysql->fetch_array()){ 
	$cuentatotal = $cuentatotal + 1;
    $proce1= trim($rowsql['codi_aduan']);
    $proce2= trim($rowsql['ano_prese']);
	$proce3= trim($rowsql['nume_corre']);
	$proce4= $rowsql['fech_ingsi'];
	$proce5= $rowsql['tipo_docum'];
	$proce6= $rowsql['libr_tribu'];
	$proce7= trim(eliminar_simbolos($rowsql['dnombre']));
	$proce8= $rowsql['codi_agent'];
	$proce9= $rowsql['fech_llega'];
	$proce10= $rowsql['via_transp'];
	$proce11= $rowsql['empr_trans'];
	$proce12= $rowsql['codi_alma'];
	//$proce13= eliminar_simbolos($rowsql['cadu_manif']);
	$proce13= $rowsql['cadu_manif'];
	$proce14= $rowsql['fech_manif'];
	$proce15= $rowsql['nume_manif'];
	$proce16= $rowsql['fech_recep'];
	$proce17= $rowsql['fech_cance'];
	$proce18= $rowsql['tipo_cance'];
	$proce19= $rowsql['banc_cance'];
	$proce20= $rowsql['codi_enfin'];
	$proce21= $rowsql['dk'];
	$proce22= $rowsql['pais_orige'];
	$proce23= $rowsql['pais_adqui'];
	$proce24= $rowsql['puer_embar'];
	$proce25= trim($rowsql['nume_serie']);
	$proce26= trim($rowsql['part_nandi']);
	$proce27= trim(eliminar_simbolos($rowsql['desc_comer']));
	$proce28= eliminar_simbolos($rowsql['desc_matco']);
	$proce29= eliminar_simbolos($rowsql['desc_usoap']);
	$proce30= eliminar_simbolos($rowsql['desc_fopre']);
	$proce31= eliminar_simbolos($rowsql['desc_otros']);
	$proce32= $rowsql['fob_dolpol'];
	$proce33= $rowsql['fle_dolar'];
	$proce34= $rowsql['seg_dolar'];
	$proce35= $rowsql['peso_neto'];
	$proce36= $rowsql['peso_bruto'];
	$proce37= $rowsql['unid_fiqty'];
	$proce38= $rowsql['unid_fides'];
	$proce39= $rowsql['qunicom'];
	$proce40= $rowsql['tunicom'];
	$proce41= $rowsql['sest_merca'];
	$proce42= $rowsql['adv_dolar'];
	$proce43= $rowsql['igv_dolar'];
	$proce44= $rowsql['isc_dolar'];
	$proce45= $rowsql['ipm_dolar'];
	$proce46= $rowsql['des_dolar'];
	$proce47= $rowsql['ipa_dolar'];
	$proce48= $rowsql['sad_dolar'];
	$proce49= $rowsql['der_adum'];
	$proce50= $rowsql['comm'];
	$proce51= $rowsql['fmod'];
	$proce52= $rowsql['cant_bulto'];
	$proce53= $rowsql['clase'];
	$proce54= $rowsql['trat_prefe'];
	$proce55= $rowsql['tipo_trat'];
	$proce56= $rowsql['codi_liber'];
	$proce57= $rowsql['impr_reliq'];
	
	$cupar = strlen($proce26);
	
	if($cupar=="9"){// si hay partida con 9 digitos se le agrega el cero adelante
		$agrepartida = '0'.$proce26;
	}else{
		$agrepartida = $proce26;
	}
	
	//campo fecha
	if($proce4=='0' or $proce4==""){
		$proce4 = "9999-12-31";
	}else{
		$proce4 = $rowsql['fech_ingsi'];
	}
	//campo fecha
	if($proce9=='0' or $proce9==""){
		$proce9 = "9999-12-31";
	}else{
		$proce9 = $rowsql['fech_llega'];
	}
	//campo fecha
	if($proce16=='0' or $proce16==""){
		$proce16 = "9999-12-31";
	}else{
		$proce16 = $rowsql['fech_recep'];
	}
	//campo fecha
	if($proce17=='0' or $proce17==""){
		$proce17 = "9999-12-31";
	}else{
		$proce17 = $rowsql['fech_cance'];
	}
	//campo fecha
	if($proce51=='0' or $proce51==""){
		$proce51 = "9999-12-31";
	}else{
		$proce51 = $rowsql['fmod'];
	}
	

	$keyunico = $proce1.$proce2.$proce3.$proce25;
	//echo "$proce1 a  $proce2 b  $proce3 c  $proce25 d  <br>";
	//echo" $keyunico clave <br>";

	//consultamos si el key ya existe, si existe actualizamos datos si no existe insertamos como nuevos
	$sqlimpo = "SELECT id FROM importacion WHERE id='$keyunico' ";
	$querimpo=$linkaz->query($sqlimpo); 
if($querimpo->num_rows>0){ 
while($rowsimpo=$querimpo->fetch_array()){
	$actualizados = $actualizados + 1;
	$udaveri= $rowsimpo['id'];
	//actualizamos
	$updateimpo = "update importacion set codi_aduan='$proce1', ano_prese='$proce2', nume_corre='$proce3', fech_ingsi='$proce4', tipo_docum='$proce5', libr_tribu='$proce6', dnombre='$proce7', codi_agent='$proce8', fech_llega='$proce9', via_transp='$proce10', empr_trans='$proce11', codi_alma='$proce12', cadu_manif='$proce13', fech_manif='$proce14', nume_manif='$proce15', fech_recep='$proce16', fech_cance='$proce17', tipo_cance='$proce18', banc_cance='$proce19', codi_enfin='$proce20', dk='$proce21', pais_orige='$proce22', pais_adqui='$proce23', puer_embar='$proce24', nume_serie='$proce25', part_nandi='$agrepartida', desc_comer='$proce27', desc_matco='$proce28', desc_usoap='$proce29', desc_fopre='$proce30', desc_otros='$proce31', fob_dolpol='$proce32', fle_dolar='$proce33', seg_dolar='$proce34', peso_neto='$proce35', peso_bruto='$proce36', unid_fiqty='$proce37', unid_fides='$proce38', qunicom='$proce39', tunicom='$proce40', sest_merca='$proce41', adv_dolar='$proce42', igv_dolar='$proce43', isc_dolar='$proce44', ipm_dolar='$proce45', des_dolar='$proce46', ipa_dolar='$proce47', sad_dolar='$proce48', der_adum='$proce49', comm='$proce50', fmod='$proce51', cant_bulto='$proce52', clase='$proce53',  trat_prefe='$proce54', tipo_trat='$proce55', codi_liber='$proce56', impr_reliq='$proce57', accion='EDITADO', fechamodi='$fechahoy' WHERE id='$udaveri' ";
	$linkaz->query($updateimpo) or die(mysqli_error($linkaz));
	//echo " actualiza $actualizados <br>";
}
}else{
	//insertamos
	$nuevos = $nuevos + 1;
	$sqlinserimpo = "INSERT INTO importacion (id, codi_aduan, ano_prese, nume_corre, fech_ingsi, tipo_docum, libr_tribu, dnombre, codi_agent, fech_llega, via_transp, empr_trans, codi_alma, cadu_manif, fech_manif, nume_manif, fech_recep, fech_cance, tipo_cance, banc_cance, codi_enfin, dk, pais_orige, pais_adqui, puer_embar, nume_serie, part_nandi, desc_comer, desc_matco, desc_usoap, desc_fopre, desc_otros, fob_dolpol, fle_dolar, seg_dolar, peso_neto, peso_bruto, unid_fiqty, unid_fides, qunicom, tunicom, sest_merca, adv_dolar, igv_dolar, isc_dolar, ipm_dolar, des_dolar, ipa_dolar, sad_dolar, der_adum, comm, fmod, cant_bulto, clase,  trat_prefe, tipo_trat, codi_liber, impr_reliq, accion, fechareg, fechamodi) VALUE ('$keyunico',  '$proce1', '$proce2', '$proce3', '$proce4', '$proce5', '$proce6', '$proce7', '$proce8', '$proce9', '$proce10', '$proce11', '$proce12', '$proce13', '$proce14', '$proce15', '$proce17', '$proce17', '$proce18', '$proce19', '$proce20', '$proce21', '$proce22', '$proce23', '$proce24', '$proce25', '$agrepartida', '$proce27', '$proce28', '$proce29', '$proce30', '$proce31', '$proce32', '$proce33', '$proce34', '$proce35', '$proce36', '$proce37', '$proce38', '$proce39', '$proce40', '$proce41', '$proce42', '$proce43', '$proce44', '$proce45', '$proce46', '$proce47', '$proce48', '$proce49', '$proce50', '$proce51', '$proce52', '$proce53', '$proce54', '$proce55', '$proce56', '$proce57', 'NUEVO', '$fechahoy', '')";
	$linkaz->query($sqlinserimpo) or die(mysqli_error($linkaz));
	//echo " nuevos $nuevos <br>";
	
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
	$insertproce = "INSERT INTO historialcargasimpo (nomhisto, fechareg,procesados,nuevos,modificados)VALUE('$textonom','$fechahoy','$cuentatotal','$nuevos','$actualizados')";
	$linkaz->query($insertproce);
	
	//limpiamos tabla donde se cargo la data
	$delete1 = mysqli_query($linkaz, "TRUNCATE TABLE procesaimpor");
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