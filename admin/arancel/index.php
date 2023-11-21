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
$activehome ="active";
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
  
<style>
#container-main{
	margin:40px auto;
	width:95%;
	min-width:320px;
	max-width:960px;
}

/*#container-main h1{
	font-size: 40px;
	text-shadow:4px 4px 5px #16a085;
}*/

.accordion-container {
	width: 100%;
	margin: 0 0 5px;
	clear:both;
}

.accordion-titulo {
	position: relative;
	display: block;
	padding: 10px;
	font-size: 14px;
	font-weight: 300;
	background: #2c3e50;
	color: #fff;
	text-decoration: none;
}
.accordion-titulo.open {
	background: #16a085;
	color: #fff;
}
.accordion-titulo:hover {
	background: #5DADE2;
}

.accordion-titulo span.toggle-icon:before {
	content:"+";
}

.accordion-titulo.open span.toggle-icon:before {
	content:"-";
}

.accordion-titulo span.toggle-icon {
	position: absolute;
	top: 10px;
	right: 20px;
	font-size: 28px;
	font-weight:bold;
}

.accordion-content {
	display: none;
	padding: 10px;
	overflow: auto;
}

.accordion-content p{
	margin:0;
}

/*.accordion-content img {
	display: block;
	float: left;
	margin: 0 15px 10px 0;
	width: 50%;
	height: auto;
}*/


@media (max-width: 767px) {
	.accordion-content {
		padding: 10px 0;
	}
}

		</style>
<style>
	.css-input { font-size:16px; border-style:solid; border-radius:25px; border-width:3px; border-color:#65adeb; padding:7px;  } 
		 .css-input:focus { outline:none; } 
		</style>
  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
       
       <script>function formulario(form) { 
/*if (form.nombre.value   == '') { alert ('El nombre esta vacío');  
f.nombre.focus(); return false; } */
var txtbuscar = document.getElementById('buscar').value;
if (txtbuscar == null || txtbuscar.length == 0 || /^\s+$/.test(txtbuscar)) { 
	alert ('Campo Vacio y  ingrese partida o Descripcion a consultar !!'); 
form.buscar.focus(); return false; } 
return true; } 
</script>
<script language='JavaScript'>
/*ventana emergente*/
var newwindow;
function popup(url)
{ newwindow=window.open(url,'name','width=750,height =450,left=200,top=90,scrollbars=NO,menubar=NO,titlebar= NO,status=NO,toolbar=NO');
if (window.focus) {newwindow.focus()}
}
</script>
        </head>
        <body >
        <div class="wrapper">
         <?php include("menuizquierdo.php"); ?>


            <div class="main-panel">
                <!-- Navbar -->
<?php include("menusuperior.php"); ?>
<!-- End Navbar -->

                    <div class="content">
                      <div class="container-fluid">
                        <div class="row">
                        	
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Encuentra tu partida por numero ó descripción de producto.</h4>
    </div>
    <form method="post" action="listsearch.php" onsubmit="return formulario(this)">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                               <?php $daa=$_POST['dato']; ?>
                                                <div class="form-group">
                                                    <input type="text" id="buscar" name="buscar" class="form-control css-input" placeholder="Ingrese partida ó descripción" value="<?php echo"$daa";?>" required />
                                                    <input type="hidden" name="btnsearch">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                            <button type="submit" name="btnsearch" class="btn btn-fill btn-success">Consultar <i class="material-icons">search</i></button>
											</div>
                                       
                                        </div>
                                    </div>  
    </div>
    </form>
</div>
    </div>
                       	
  <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title" align="center"><b>Lista de Clasificaciones Arancelarias.</b></h4>
    </div>
    <hr>
    
    
    <div id="container-main">
	
	
	<?php
		// consultamos la seccion
$sqlsec="SELECT CONCAT(idseccion,' :     ',descripcion_seccion) AS seccion, idseccion, descripcion_seccion FROM arancel_part_capitulo GROUP BY idseccion, descripcion_seccion ORDER BY idcapitulo ASC ";
//$sqlsec="SELECT CONCAT(idseccion,' :     ') AS seccion, idseccion FROM capitulo GROUP BY idseccion ORDER BY idcapitulo ASC ";
$querypar=$conexpg->query($sqlsec) or die(mysqli_error($conexpg)); 
if($querypar->num_rows>0){
	while($rowsec=$querypar->fetch_array()){
    $codigo_capi = $rowsec["idcapitulo"];
    $items = $items + 1;
    $nomsec = $rowsec["idseccion"];
    //$desc_sec = $rowsec["descripcion_seccion"];
    $sec_desc = $rowsec["seccion"];
    
    $mostrar= "mostrar".$items;
    $caja= "caja".$items;
    
    //echo "<a href='#' id='$mostrar' style='font-size: 11px;'>$items $sec_desc </a>";
		echo"<div class='accordion-container'>";
		echo "<a href='#' class='accordion-titulo' style='color: #fff;'>$items.- $sec_desc<span class='toggle-icon'></span></a>";
      echo"<div class='accordion-content'>";
    // mostramos caja que contiene capitulo
    //echo "<div id='$caja'>";
//$sqlcapi="SELECT cpai1.idseccion, cpai1.idcapitulo, cpai1.descripcion FROM arancel_part_capitulo AS cpai1 WHERE cpai1.idseccion = '$nomsec' AND cpai1.descripcion_seccion = '$desc_sec' ORDER BY cpai1.idcapitulo ASC ";
$sqlcapi="SELECT cpai1.idseccion, cpai1.idcapitulo, cpai1.descripcion FROM capitulo AS cpai1 WHERE cpai1.idseccion = '$nomsec' ORDER BY cpai1.idcapitulo ASC ";
$querycapi=$conexpg->query($sqlcapi) or die(mysqli_error($conexpg)); 
if($querycapi->num_rows>0){
	while($rowcapi=$querycapi->fetch_array()){
    $cod_capix = $rowcapi["idseccion"];
      $items_w = $items_w + 1;
    $cod_capi = $rowcapi["idcapitulo"];
    $desc_capi = $rowcapi["descripcion"];
 
    echo "&nbsp;&nbsp;<div style='border:0px solid green; font-size: 14px;'><b>$cod_capi.-  $desc_capi </b></div>"; 

// mostramos caja que contiene Subcapitulo
$sqlsubcapi="SELECT subcap.idcodigo, subcap.idsubcapitulo, subcap.descripcion, subcap.idcapitulo FROM subcapitulo AS subcap WHERE subcap.idcapitulo = '$cod_capi' ORDER BY subcap.idsubcapitulo ASC";
$rsnsubcapi=$conexpg->query($sqlsubcapi) or die(mysqli_error($conexpg)); 
if($rsnsubcapi->num_rows>0){
	while($rowsubcapi=$rsnsubcapi->fetch_array()){
    //$itemsx = $itemsx + 1;
    $items_wx = $items_wx + 1;
    
    $desc_subcapi = $rowsubcapi["descripcion"];
    $codigo_subcapi = $rowsubcapi["idsubcapitulo"];
    
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='detalleviuw.php?cod=$codigo_subcapi&$desc_subcapi' title='Ver detalle' onClick=\"popup('detalleviuw.php?cod=$codigo_subcapi&$desc_subcapi'); return false;\"><em style='font-size: 14px;'>$codigo_subcapi.-  $desc_subcapi </a></em><br>";
}
}
// fin mostramos caja que contiene Subcapitulo
    
}
}
    echo"</div>";
		echo"</div>";
    // fin de mostramos caja que contiene capitulo
    }
    }
		?>
		<!--<a href="#" class="accordion-titulo" style="color: #fff;">Messi<span class="toggle-icon"></span></a>-->
		<!--<div class="accordion-content">
			<img src="http://e0.365dm.com/15/05/660x350/champions-league-barcelona-bayern-munich-soccer-messi_3299830.jpg?20150506214236" alt=""/>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.

Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>-->
		
	<!--</div>-->
	
	<!--<div class="accordion-container">
		<a href="#" class="accordion-titulo">Cristiano<span class="toggle-icon"></span></a>
		<div class="accordion-content">
			<img src="http://www.abc.es/Media/201301/10/cristiano-ronaldo--644x362.jpg" alt=""/>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.

Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>-->

</div>
   
    <!--<div class="card">-->
                <!--<div class="card-header">
                  <h4 class="card-title">Collapsible Accordion</h4>
                </div>
                <div class="card-body">
                  <div id="accordion2" role="tablist">
                    <div class="card-collapse">
                      <div class="card-header" role="tab" id="headingOne">
                        <h5 class="mb-0">
                          <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="collapsed">
                            Collapsible Group Item #1
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion2" style="">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>
                    <div class="card-collapse">
                      <div class="card-header" role="tab" id="headingTwo">
                        <h5 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Collapsible Group Item #2
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion2">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>
                    <div class="card-collapse">
                      <div class="card-header" role="tab" id="headingThree">
                        <h5 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Collapsible Group Item #3
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion2">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
<!-- listas -->

    <!-- fin lista -->
</div>
    </div>
                       	
                       	<!-- ********** -->
                       
                       	<!-- ******** -->
                        	
                        </div>


                      </div>
                    </div>
                    <?php include("../footer.php"); ?>
            </div>
        </div>


    </body>


<?php include("js.php"); ?>	

<!-- Sharrre libray -->
<!--<script src="../js/jquery.sharrre.js"></script>-->
<?php
//cerrando conexion
	mysqli_close($conexpg);
?>
<script>
					$(function(){
  $(".accordion-titulo").click(function(e){
           
        e.preventDefault();
    
        var contenido=$(this).next(".accordion-content");

        if(contenido.css("display")=="none"){ //open		
          contenido.slideDown(250);			
          $(this).addClass("open");
        }
        else{ //close		
          contenido.slideUp(250);
          $(this).removeClass("open");	
        }

      });
});
					</script>

</html>
