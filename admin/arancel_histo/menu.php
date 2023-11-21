
<!-- bloquea click derecho -->
<script language="Javascript">
document.oncontextmenu = function(){return false}
</script>

<div class="w3-top">
 <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  </li>
  <li><a href="../" class="w3-padding-large w3-theme-d4"><!--<i class="fa fa-home w3-margin-right"></i>--><img src="../img/logo.png" style="height:35px;width:50px"><font size='4'><b>AZATRADE</b></font></a></li>
  <!--<li class="w3-hide-small"><a href="index.php" class="w3-padding-large w3-hover-white" title="Pagina Principal"><i class="fa fa-home"></i> Principal</a></li>-->
  <!--<li class="w3-hide-small"><a href="../interfaces/principal.php?=AccesoCpanel-Azatrade" class="w3-padding-large w3-hover-white" title="Acceder a los sistemas"><i class="fa fa-gears"></i> Sistemas</a></li>-->
  <!--<li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a></li>-->
  
  <!--<li class="w3-hide-small w3-dropdown-hover">
    <a href="vista_active.php" class="w3-padding-large w3-hover-white" title="Notificaciones"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green"><?php echo "$cue"; ?></span></a>
    <div class="w3-dropdown-content w3-white w3-card-4">
      <a href="#">One new friend request</a>
      <a href="#">John Doe posted on your wall</a>
      <a href="#">Jane likes your post</a>
    </div>
  </li>-->
   <li class="w3-padding-large"><center>BUSCADOR DE PARTIDAS ARANCELARIAS</center></li>
  <!--<li class="w3-hide-small w3-right"><a href="#" class="w3-padding-large w3-hover-white" title="My Account"><img src="img/logo.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a></li>-->
<?php if(!isset($_SESSION['login_usuario'])) ;
$usu = $_SESSION['login_usuario']; 
if ($usu==''){ 
?>
  <li class="w3-hide-small w3-right"><a data-toggle="modal" href="#loginModal" class="w3-padding-large w3-hover-white" title="Logeate"><label class="btn btn-success">Acceder</label></a></li>
<?php } else {?>
<li class="w3-hide-small w3-right"><a href="../logout/" class="w3-padding-large w3-hover-white" title="Cerrar Sesion"><label class="btn btn-danger"> <i class="fa fa-power-off"></i>Cerrar Sesion</label></a></li>
<?php } ?>
 </ul>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <ul class="w3-navbar w3-left-align w3-large w3-theme">
    <li><a class="w3-padding-large" href="index.php">Inicio</a></li>
    <!--<li><a class="w3-padding-large" href="#"><label class="btn btn-success"><i class="fa fa-lock"></i>     Acceder</label></a></li>-->
    <!--<li><a class="w3-padding-large" href="#">Link 3</a></li>
    <li><a class="w3-padding-large" href="#">My Profile</a></li>-->
  </ul>
</div>

<!-- google analytics -->
    <?php include_once("../analyticstracking.php") ?>