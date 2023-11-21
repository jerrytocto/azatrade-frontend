<?php
session_start();
include ("conection/config.php");
set_time_limit(150);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Partidas azatrade,buscador de partidas arancelarias">
<meta name="author" content="Partidas azatrade">
<meta name="keywords" content="Azatrade">
<title>Azatrade ..::Partidas::..</title>
<link rel="shortcut icon" href="../img/azatrade.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="boostrap/css/bootstrap.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<script src="boostrap/js/jquery.min.js"></script>
<script src="boostrap/js/bootstrap.min.js"></script>

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>

<script language='JavaScript'>
/*ventana emergente*/
var newwindow;
function popup(url)
{ newwindow=window.open(url,'name','width=750,height =450,left=200,top=90,scrollbars=NO,menubar=NO,titlebar= NO,status=NO,toolbar=NO');
if (window.focus) {newwindow.focus()}
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

</head>
<body class="w3-theme-l5">

<!-- Navbar -->
<?php
include("menu.php");
?>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <ul class="w3-navbar w3-left-align w3-large w3-theme">
    <li><a class="w3-padding-large" href="<?php echo $_SERVER['PHP_SELF']; ?>">Inicio</a></li>
    <li><a class="w3-padding-large" href="#"><label class="btn btn-success"><i class="fa fa-lock"></i>     Acceder</label></a></li>
    <!--<li><a class="w3-padding-large" href="#">Link 3</a></li>
    <li><a class="w3-padding-large" href="#">My Profile</a></li>-->
  </ul>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <?php
	/*panel izquierdo*/
	include("lateral_izquierdo.php");
    ?>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
            <p>Encuentra tu partida por numero ó descripción de producto. (Búsqueda en descripción de partida a 10 dígitos)</p>
            <hr>
            <!--<form name="form" method="post" action="listsearch.php" onsubmit="return formulario(this)">-->
            <form name="form" method="post" action="listpartida.php" onsubmit="return formulario(this)">
            <div class="col-md-6">
<input class="form-control" id="buscar" name="buscar" type="text" placeholder="Ingresa Partida  / Descripción"> 
            </div>
            <div class="col-md-6">
            <button class="btn btn-primary col-lg-4">Consultar</button>
            </div>
            </form>
            <br>
            <hr>
              <!--<h6 class="w3-opacity"><?php //echo "$paisx2 $instx2 $idiox2 $taccex2 $alcax2 $sectox2 $temax2 $tdatox2 $incix2"; ?></h6>-->
              <!--<p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p>
              <button type="button" class="w3-btn w3-theme"><i class="fa fa-pencil"></i>  Post</button>-->
              
            </div>
          </div>
        </div>
      </div>

<div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
            <center><p>Partidas Arancelarias.</p></center>
            <hr>
            <img class="img-responsive" src="img/partida_azatrade.jpg"/>
            <hr>
              
            </div>
          </div>
        </div>
      </div>
  
      
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <?php
	/*panel derecho*/
	include("lateral_derecho.php");
      ?>
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<?php
include("modal_acceder.php");
?>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <?php
  include("footer.php");
  ?>
</footer>

 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>
