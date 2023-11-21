<div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Partidas Arancelarias</h4>
         <!--<p class="w3-center"><img src="img_avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>-->
         <hr>
         <div class="w3-card-2 w3-round">
        <div class="w3-accordion w3-white">
          <p><a href="index.php"><button class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-home fa-fw w3-margin-right"></i> Inicio</button></a></p>
          <p><a href="list.php"><button class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-bars fa-fw w3-margin-right"></i> Lista Arancelarias</button></a></p>
          <p><a href="search.php"><button class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-search fa-fw w3-margin-right"></i> Historial de Partidas</button></a></p>
          <?php
          /*si esta logeado*/
		if(!isset($_SESSION['login_usuario'])) ;
$usu = $_SESSION['login_usuario']; 
if ($usu==''){ ?>
          <p><a data-toggle="modal" data-target="#myModal"><button class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-share-square fa-fw w3-margin-right"></i> Consulta Avanzada</button></a></p>
          <? } else { ?>
         
           <p><a href="http://www.azatrade.info/" ><button class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-share-square fa-fw w3-margin-right"></i> Consulta Avanzada</button></a></p>
          <? } ?>
          </div>
          </div>
          <hr>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
     
      <br>
      
      <!-- Interests -->
      <div class="w3-card-2 w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interes</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">Comestible</span>
            <span class="w3-tag w3-small w3-theme-d4">Minerales</span>
            <span class="w3-tag w3-small w3-theme-d3">Productos</span>
            <span class="w3-tag w3-small w3-theme-d2">Frutas</span>
            <span class="w3-tag w3-small w3-theme-d1">Animales</span>
            <span class="w3-tag w3-small w3-theme">Enbarcaciones</span>
            <span class="w3-tag w3-small w3-theme-l1">Transpporte</span>
            <span class="w3-tag w3-small w3-theme-l2">Economico</span>
            <span class="w3-tag w3-small w3-theme-l3">Publico</span>
            <span class="w3-tag w3-small w3-theme-l4">Privado</span>
            <span class="w3-tag w3-small w3-theme-l5">Varios</span>
          </p>
        </div>
      </div>
      
       <br>
      
      <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
        <p><h3>M&aacute;s Sistemas</h3></p>
        <?php
		/*si esta logeado*/
		if(!isset($_SESSION['login_usuario'])) ;
$usu = $_SESSION['login_usuario']; 
if ($usu==''){
	$enlace="http://www.azatrade.info/"; 
}else{
	//$enlace="../interfaces/principal.php?=AccesoCpanel-Azatrade";
	$enlace="http://www.azatrade.info/";
}
		?>
        <a href="<?php echo "$enlace"; ?>"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeExport</button></a>
        <!--<a href="../Export/systems.php" target="_blank"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeProduce</button></a>-->
        <a href="<?php echo "$enlace"; ?>"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradePartidas</button></a>
        <!--<a href="../Export/systems.php" target="_blank"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeMundi</button></a>
        <a href="../Export/systems.php" target="_blank"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeSelect</button></a>
        <a href="../Export/systems.php" target="_blank"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeCostim</button></a>
        <a href="../Export/systems.php" target="_blank"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeCostex</button></a>-->
        <a href="http://www.azatrade.info/www/"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeWWW</button></a>
        <!--<a href="../Export/systems.php" target="_blank"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeDocs</button></a>-->
      </div>
      
      <!-- Alert Box -->
      <div class="w3-container w3-round w3-border w3-theme-border w3-margin-bottom w3-hide-small" style="background:#FCB107">
        <span onclick="this.parentElement.style.display='none'" class="w3-hover-text-grey w3-closebtn">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>Disfruta de la <b>NUEVA</b> plataforma azatrade <b>PARTIDAS ARANCELARIAS</b>.</p>
      </div>
      
      
      <!-- mensaje flotante Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Accede Ahora !</h4>
      </div>
      <div class="modal-body">
        <p>Si no estas registrado, <a data-toggle="modal" href="#loginModal" title="Registrate" style="color:#06437C;">registrate</a>, caso contrario logeate y accede<a data-toggle="modal" href="#loginModal" title="Logeate y Accede" style="color:#169F2E;"> desde aquí</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
