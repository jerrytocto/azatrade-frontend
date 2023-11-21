<div class="w3-col m2">
      <!--<div class="w3-card-2 w3-round w3-theme-d4 w3-center">
        <div class="w3-container">
          <p>Si conoces otra p&aacute;gina registralo aqu&iacute;.</p>-->
          <!--<img src="img_forest.jpg" alt="Forest" style="width:100%;">-->
          <!--<p><strong>Comparte Conocimientos</strong></p>
          <p>Aparecer&aacute; tu Autor&iacute;a</p>
          <p><a href="new.php"><button class="w3-btn w3-btn-block" style="background:#18B608">Registra una p&aacute;gina</button></a></p>
        </div>
      </div>
      <br>-->
      
      <?php if(!isset($_SESSION['login_usuario'])) ;
$usu = $_SESSION['login_usuario']; 
if ($usu==''){ 
?>
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>User</p>
          <img src="img/user.png" alt="Avatar" style="width:50%"><br>
          <span>Invitado</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-btn w3-green w3-btn-block w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-btn w3-red w3-btn-block w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <?php } else { ?>
<div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Bienvenido</p>
          <img src="img/user.png" alt="Avatar" style="width:50%"><br>
          <span><?= $_SESSION['nombre'].' '.$_SESSION['apellido']; ?></span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-btn w3-green w3-btn-block w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-btn w3-red w3-btn-block w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      
      <br>
      
      <!--<div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">-->
      <div class="w3-card-2 w3-round w3-white w3-center">
      <!--<p><h3 class="w3-red"><b>Aula Virtual</b></h3></p>-->
      <p class="w3-red"><img class="img-responsive" src="img/log5.png"></p>
      <br>
        <a href="http://www.turioni.com/curso.php?Turioni-cursos-virtuales&cur=11&especializacion-en-inteligencia-comercial" target="_blank"><p><img class="img-responsive" src="img/cur1.jpg"></p></a>
        <center><b><font color="#CF0E11"><a href="http://www.turioni.com/curso.php?Turioni-cursos-virtuales&cur=11&especializacion-en-inteligencia-comercial" target="_blank">Base de Datos SUNAT Aduanas</a></font><b></center>
        <center><a href="http://www.turioni.com/curso.php?Turioni-cursos-virtuales&cur=11&especializacion-en-inteligencia-comercial" target="_blank"><button class="w3-btn w3-red w3-btn-block">Leer M&aacute;s</button></a></center><br>
        <p><a href="http://www.turioni.com/curso.php?Turioni-cursos-virtuales&cur=11&especializacion-en-inteligencia-comercial" target="_blank"><img class="img-responsive" src="img/cur2.jpg"></a></p>
         <center><b><font color="#CF0E11"><a href="http://www.turioni.com/curso.php?Turioni-cursos-virtuales&cur=11&especializacion-en-inteligencia-comercial" target="_blank">Business Intelligence con Excel 2013</a></font><b></center>
        <center><a href="http://www.turioni.com/curso.php?Turioni-cursos-virtuales&cur=11&especializacion-en-inteligencia-comercial" target="_blank"><button class="w3-btn w3-red w3-btn-block">Leer M&aacute;s</button></a></center><br>
      </div>
      
     