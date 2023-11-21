<?php
$axepago = $_SESSION['acceso_pago'];
$axenivel = $_SESSION['rol'];

$mmensa="SELECT alerta FROM mensajes WHERE idme='2'";
	  $rsmen=$conexpg->query($mmensa); 
if($rsmen->num_rows>0){ 
while($filamen=$rsmen->fetch_array()){
			  $rrtt = $filamen['alerta'];
		  }
	  }else{
		  $rrtt="";
	  }

?>
<nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
	<div class="container-fluid">
    <div class="navbar-wrapper">
      <div class="navbar-minimize">
        <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
        </button>
      </div>
			<a class="navbar-brand" href="#Azatrade">Azatrade</a>
			
			
		</div>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
		</button>

	    <div class="collapse navbar-collapse justify-content-end">

			<ul class="navbar-nav">

				<li class="nav-item">
					<a class="nav-link" href="../AZATRADE_GUIA.pdf" target="_blank">
            <i class="material-icons">local_library</i> Guia
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../">
            <i class="material-icons">arrow_upward</i> Exportaciones
					</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="pb">
            <i class="material-icons">format_bold</i> Gráficos Estadísticos
					  <p>
              <span class="d-lg-none d-md-block">Account</span>
            </p>
					</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="https://www.azatrade.info/arancel/" target="_blank">
            <i class="material-icons">brightness_auto</i> Arancel
					  <p>
              <span class="d-lg-none d-md-block">Account</span>
            </p>
					</a>
				</li>
				<!--<li class="nav-item">
					<a class="nav-link" href="https://www.azatrade.info/www/" target="_blank">
            <i class="material-icons">pages</i> WWW
					  <p>
              <span class="d-lg-none d-md-block">Account</span>
            </p>
					</a>
				</li>-->
				<li class="nav-item">
					<a class="nav-link" href="../planes/">
            <i class="material-icons">view_week</i> Planes
					  <p>
              <span class="d-lg-none d-md-block">Account</span>
            </p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contactanos.php">
            <i class="material-icons">contact_mail</i> Contactanos
					  <p>
              <span class="d-lg-none d-md-block">Account</span>
            </p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="https://www.azatrade.info/noticias/" target="_blank">
            <i class="material-icons">receipt</i> Blog
					  <p>
              <span class="d-lg-none d-md-block">Account</span>
            </p>
					</a>
				</li>
				<?php if (isset($_SESSION['login_usuario'])){ ?>
				<?php $uA1f =$_SESSION['nombreaza']; ?>
				<li class="nav-item">
					<a class="nav-link" href="#">
            <i class="material-icons">assignment_ind</i><?=$uA1f;?>
					  <p>
              <span class="d-lg-none d-md-block">Account</span>
            </p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../logout/">
            <i class="material-icons" style="color: #EF0105">power_settings_new</i>Cerrar Sesion
					  <p>
              <span class="d-lg-none d-md-block">Account</span>
            </p>
					</a>
				</li>
				<?php }else{ ?>
				<li class="nav-item">
					<a class="nav-link" href="../login/">
            <i class="material-icons">person</i>Ingresar
					  <p>
              <span class="d-lg-none d-md-block">Account</span>
            </p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../registro/">
            <i class="material-icons">lock</i>Registrate
					  <p>
              <span class="d-lg-none d-md-block">Account</span>
            </p>
					</a>
				</li>
				<?php } ?>
			</ul>
	    </div>
	</div>
</nav>


<!--<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
		<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
		<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />-->
		<script>
function notificacion(){
	            
				alertify.log("<?=$rrtt;?>"); 
				return false;
	alertify.set('notifier','position', 'bottom-left');
	/*alertify.success("Visita nuestro <a href=\"http://blog.reaccionestudio.com/\" style=\"color:white;\" target=\"_blank\"><b>BLOG.</b></a>"); 
				return false;*/
			}
</script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<!--<script> $(document).ready(function(){ 
setTimeout(clickbutton,1000); function clickbutton() { 
$("#botonEnviar").click(); } }); 
</script>

 <input type="hidden" id="botonEnviar" value="Notificacion normal" onClick="notificacion()" /> -->