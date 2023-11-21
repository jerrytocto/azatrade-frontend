<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='login/';</script>";
}
}
include("incBD/inibd.php");
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
<?php include("css.php"); ?>
<style>
/* estilo caja input */
.css-input { font-size:16px; border-style:solid; border-radius:25px; border-width:3px; border-color:#65adeb; padding:7px;  } 
		 .css-input:focus { outline:none; }
</style>
  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
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
    
    <div class="row">
    	<div class="col-md-12">
    		<p align="center" class="card"><?=$rrtt;?></p>
    	</div>
    </div>
    <!--<div class="row">
    	<div class="col-md-6 visible-lg visible-md">
    	<style>
	.contenedord
	{
		width:500px;
		height:300px;
		line-height:300px;
		border:0px solid;
		text-align:center;
	}
	.contenedord>h1 {
		display:inline-block;
		vertical-align:middle;
		line-height:normal;
	}
	</style>
    	<div class="contenedord">
    	<h1>Comienza tu prueba gratis hoy !</h1>
    	</div>
    	</div>
    	
    	<div class="col-md-6 visible-sm visible-xs">
    	<h1 align="center">Comienza tu prueba gratis hoy !</h1>
    	<hr style="border:2px solid; color: #2961C4;">
		</div>
    	
    	<div class="col-md-6">
    		<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://www.youtube.com/embed/tCII1KXmGEw' frameborder='0' allowfullscreen></iframe></div>
    	</div>
    </div>-->
    
    <!--<h2 align="center">Opción buscador de producto</h2>-->
    
    <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Consulta tu producto que estás buscando</h4>
    </div>
    <form method="post" action="producto.php">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                           <div class="col-md-4">
                                                <div class="form-group">
<?php if (isset($_SESSION['login_usuario'])){ //logeado
	if($axepago=="SI" and $axenivel=='BASICO'){//si tiene acceso
	$requiere = "";
	$reselect = "Departamentos Todos";
	}else if($axepago=="NO" and $axenivel=='BASICO'){//si no tiene acceso
	//$requiere = "required";
	$requiere = "";
	$reselect = "Departamentos Todos";
}else if($axenivel=='ADMIN'){//si es administrador
	$requiere = "";
	$reselect = "Departamentos Todos";
	}
}else{//sin logearse
	//$requiere = "required";
	$requiere = "";
	$reselect = "Departamentos Todos";
} ?>

                                                    <select name='depavalue' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='<?=$reselect;?>' <?=$requiere;?> >";
                                                    
                                                    <?php
	echo"<option value=''>$reselect</option>";
	$sqlx = mysqli_query($conexpg,"SELECT iddepartamento, departamento.nombre FROM departamento ORDER BY departamento.nombre ASC");
					while($filax=mysqli_fetch_array($sqlx))
					{ 
						echo "<option value='$filax[0]'>$filax[1]"; 
					}
				?>
                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
<!--<select name='selecyear' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' title='Selecionar Año' required>";-->
<select name='selecyear' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>";
                <option value="2022" <?php if($_POST['selecyear']=="2022"){echo "selected";}?>>2022</option>
                <option value="2021" <?php if($_POST['selecyear']=="2021"){echo "selected";}?>>2021</option>
                <option value="2020" <?php if($_POST['selecyear']=="2020"){echo "selected";}?>>2020</option>
                <option value="2019" <?php if($_POST['selecyear']=="2019"){echo "selected";}?>>2019</option>
                <option value="2018" <?php if($_POST['selecyear']=="2018"){echo "selected";}?>>2018</option>
                <option value="2017" <?php if($_POST['selecyear']=="2017"){echo "selected";}?>>2017</option>
                <option value="2016" <?php if($_POST['selecyear']=="2016"){echo "selected";}?>>2016</option>
                <option value="2015" <?php if($_POST['selecyear']=="2015"){echo "selected";}?>>2015</option>
                <option value="2014" <?php if($_POST['selecyear']=="2014"){echo "selected";}?>>2014</option>
                <option value="2013" <?php if($_POST['selecyear']=="2013"){echo "selected";}?>>2013</option>
                <option value="2012" <?php if($_POST['selecyear']=="2012"){echo "selected";}?>>2012</option>
                    </select>
                   
                                               
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                               <?php $daa=$_POST['dato']; ?>
                                                <div class="form-group">
                                                    <input type="text" name="dato" class="form-control css-input" placeholder="Ingrese Nombre del Producto" value="<?php echo"$daa";?>" required />
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
        <!-- fin form busqueda -->
    
    <!--<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                  <i class="material-icons">work</i>
              </div>
              <p class="card-category">Productos</p>
              <h3 class="card-title">5,840</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-info">
search</i>
                    <a href="producto.php">Encuentra tu producto AQUI</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">spellcheck</i>
              </div>
              <p class="card-category">Partidas</p>
              <h3 class="card-title">4,743</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-info">search</i> <a href="partida.php">Consulta una partida AQUI</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">language</i>
              </div>
              <p class="card-category">Mercados</p>
              <h3 class="card-title">179</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-info">search</i> <a href="mercado.php">Selecciona un mercado AQUI</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">domain</i>
              </div>
              <p class="card-category">Empresas</p>
              <h3 class="card-title">7,663</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-info">search</i> <a href="empresa.php">Encuentra tu empresa AQUI</a>
                </div>
            </div>
        </div>
    </div>
</div>-->



    </div>
</div>

<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
   <div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">euro_symbol</i>
                        </div>
                        <h4 class="card-title" align="center"><b>Aprende y gana con AZATRADE.INFO</b></h4>
    </div>
    
<div class="card-body "> 
                              <div class="col-sm-12">
                              <br>
                              <h4>1. Cómo obtener mi cuenta AZATRADE</h4>
                              <hr>
<div class="row">	  
					  <?php
  //include("data.php");
	/*Array de datos para darle valores dinamicos a nuestro video modal*/
$info[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/fIj88x_U_kw",
	"url_titu"=>"¿Qué es Azatrade?"
	);//Agreglo de datos 1 
	
$info[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/_ljpckWahiE",
	"url_titu"=>"Azatrade: Registro, Cambio de Clave, Recuperación de clave"
	);//Agreglo de datos 2 
	   
	foreach ($info as $key=>$value){
		?>
	     <!-- Grid column -->
	     
		  <div class="col-lg-6">
			<a href="#" data-toggle="modal" data-target="#modal4" data-url="<?=$value['url_video']?>" >
				<!--<img class="img-fluid z-depth-1" src="<?=$value['url_imagen']?>" alt="video">-->
				<p><!--<i class="fa fa-check"></i>--> <i class="material-icons" style="font-size: 24px;">check</i> <i class="material-icons" style="font-size: 34px;">play_circle_outline</i> <?=$value['url_titu']?></p>
			</a>
	</div>
		<!-- Grid column -->	
		<?php
	}
  ?>
   <div class="col-lg-12">
   <br>
   <h4>2. Cómo puedo EXPORTAR con AZATRADE</h4>
   <hr>
   </div>
   <?php
$infod[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/sE5eLgftits",
	"url_titu"=>"¿Cómo saber si un producto se exporta?"
	); //Agreglo de datos 3 
	
	$infod[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/CmQKNXkwlgk",
	"url_titu"=>"¿Cómo saber si un producto es restringido para IMPORTAR o EXPORTAR?"
	); //Agreglo de datos 4
	
	$infod[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/IKFSdm5TgOw",
	"url_titu"=>"Cómo evaluar un producto o un mercado?"
	); //Agreglo de datos 5
	
	$infod[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/pZdTnB0JB_E",
	"url_titu"=>"¿Cómo encontrar una partida arancelaria? FÁCIL y RÁPIDO"
	); //Agreglo de datos 6
	
	$infod[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/HHuq8iG0uzQ",
	"url_titu"=>"Cómo analizar un producto o una partida arancelaria? FACIL y RÁPIDO"
	); //Agreglo de datos 7
	
	$infod[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/M9a3hT7pEqc",
	"url_titu"=>"¿Cómo encontrar un CLIENTE para EXPORTAR? - FÁCIL y GRATIS"
	); //Agreglo de datos 8
	
	$infod[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/1orBqTRe-JI",
	"url_titu"=>"¿Cómo analizar los precios de mi competencia?"
	); //Agreglo de datos 9
	
	$infod[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/ToOT8bX8Deg",
	"url_titu"=>"¿Cómo analizar a un mercado de destino? Partidas exportadas y empresas exportadoras"
	); //Agreglo de datos 10
	
	$infod[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/in6PB4mW-pM",
	"url_titu"=>"¿Cómo analizar a una empresa exportadora?"
	); //Agreglo de datos 11
	
	$infod[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/KX8semGkR68",
	"url_titu"=>"¿Cómo analizar una región exportadora?"
	); //Agreglo de datos 12
	
	$infod[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/xWeQKqKW_iM",
	"url_titu"=>"¿Cómo analizar un sector exportador?"
	); //Agreglo de datos 13
	
	$infod[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/ERTp-cJYG4o",
	"url_titu"=>"Análisis de resúmenes ejecutivos nacionales"
	); //Agreglo de datos 14
	
	$infod[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/zZ9keKp6E3c",
	"url_titu"=>"¿Cómo realizar una consulta detallada en AZATRADE?"
	); //Agreglo de datos 15
	
	foreach ($infod as $keyd=>$valued){
		?>
	     <!-- Grid column -->
	     
		  <div class="col-lg-6">
			<a href="#" data-toggle="modal" data-target="#modal5" data-url="<?=$valued['url_video']?>" >
				<!--<img class="img-fluid z-depth-1" src="<?=$valued['url_imagen']?>" alt="video">-->
				<p><!--<i class="fa fa-check"></i>--> <i class="material-icons" style="font-size: 24px;">check</i> <i class="material-icons" style="font-size: 34px;">play_circle_outline</i> <?=$valued['url_titu']?></p>
			</a>
	</div>
		<!-- Grid column -->	
		<?php
	}
  ?>
   
   <div class="col-lg-12">
   <br>
   <h4>3. Cómo puedo IMPORTAR con AZATRADE</h4>
   <hr>
   </div>
   <?php
	$infoi[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/U6XcFPmyI1I",
	"url_titu"=>"¿Cómo encontrar un PROVEEDOR para IMPORTAR? - FÁCIL y GRATIS"
	); //Agreglo de datos 16
	
	$infoi[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/hUR2WwxlnsE",
	"url_titu"=>"¿Se importa mi producto? FÁCIL y RÁPIDO"
	); //Agreglo de datos 17
	
	$infoi[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/asgr9gz8_54",
	"url_titu"=>"¿Es restringido mi producto para IMPORTAR?"
	); //Agreglo de datos 18
	
	$infoi[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/_AdrBma3vM8",
	"url_titu"=>"¿Qué otras empresas IMPORTAN mi producto?"
	); //Agreglo de datos 19
	
	$infoi[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/HpTbHRK1r0s",
	"url_titu"=>"¿A quién compra mi competencia?"
	); //Agreglo de datos 20
	
	$infoi[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/cE9pbTSp55w",
	"url_titu"=>"¿A qué PRECIO IMPORTA mi COMPETENCIA?"
	); //Agreglo de datos 21
	
	$infoi[]=array(
	"url_imagen"=>"img/azaula.jpg",
	"url_video"=>"https://www.youtube.com/embed/cE9pbTSp55w",
	"url_titu"=>"¿Cómo bajar costos con la liberación del Ad Valorem?"
	); //Agreglo de datos 15

	   
	foreach ($infoi as $keyi=>$valuei){
		?>
	     <!-- Grid column -->
	     
		  <div class="col-lg-6">
			<a href="#" data-toggle="modal" data-target="#modal6" data-url="<?=$valuei['url_video']?>" >
				<!--<img class="img-fluid z-depth-1" src="<?=$valuei['url_imagen']?>" alt="video">-->
				<p><!--<i class="fa fa-check"></i>--> <i class="material-icons" style="font-size: 24px;">check</i> <i class="material-icons" style="font-size: 34px;">play_circle_outline</i> <?=$valuei['url_titu']?></p>
			</a>
	</div>
		<!-- Grid column -->	
		<?php
	}
  ?>
   
   <div class="col-lg-12">
   <br>
   <h4>4. Gu&iacute;as</h4>
   <hr>
   </div>
   
   <div class="col-lg-6">
   <a href="Directorio-videos-azatrade.pdf" target="_blank"><i class="material-icons" style="font-size: 24px;">check</i> <i class="material-icons" style="font-size: 34px;">picture_as_pdf</i> Directorio de videos</a>
   </div>
   <div class="col-lg-6">
   <a href="AZATRADE_GUIA.pdf" target="_blank"><i class="material-icons" style="font-size: 24px;">check</i> <i class="material-icons" style="font-size: 34px;">picture_as_pdf</i> GUÍA TEXTO – MANUAL COMPLETO</a>
	   </div>
   
   
	   </div>
	   </div>
	   </div>
	   
		<!-- modal -->
    <!--Modal: Name-->
    <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
 
        <!--Content-->
        <div class="modal-content">
 
          <!--Body-->
          <div class="modal-body mb-0 p-0">
 
            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
              <iframe class="embed-responsive-item" src=""
                allowfullscreen></iframe>
            </div>
 
          </div>
 
          <!--Footer-->
          <!--<div class="modal-footer justify-content-right">
            
            
 
            <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Cerrar</button>
 
          </div>-->
 
        </div>
        <!--/.Content-->
 
      </div>
    </div>
    <!--Modal: Name-->
	    <!-- fin modal -->
	    
	    
	    <!-- modal -->
    <div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body mb-0 p-0">
            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
              <iframe class="embed-responsive-item" src=""
                allowfullscreen></iframe>
            </div>
          </div>
          <!--Footer-->
          <!--<div class="modal-footer justify-content-right"> 
            <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Cerrar</button>
          </div>-->
        </div>
      </div>
    </div>
	    <!-- fin modal -->
	    
	    <!-- modal -->
    <div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body mb-0 p-0">
            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
              <iframe class="embed-responsive-item" src=""
                allowfullscreen></iframe>
            </div>
          </div>
          <!--Footer-->
          <!--<div class="modal-footer justify-content-right"> 
            <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Cerrar</button>
          </div>-->
        </div>
      </div>
    </div>
	    <!-- fin modal -->
				  
				  </div>
	</div>
					  
						  </div>

<!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
    7 days
</button> -->

<!--<div class="row">
    <div class="col-md-4">
      <div class="card card-chart">
          <div class="card-header card-header-info" data-header-animation="true">
              <div class="ct-chart" id="dailySalesChart"></div>
          </div>
          <div class="card-body">
              <div class="card-actions">
                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                      <i class="material-icons">build</i> Cargar!
                  </button>
              </div>
              <h5 class="card-title">Exportaciones anuales (Mil Mill USD)</h5>
              <p class="card-category">
                  <span class="text-danger"><i class="fa fa-long-arrow-down"></i> -0.78 </span> Crecimiento prom. anual</p>
          </div>
          <div class="card-footer">
             <a href="sectores.php">
              <div class="stats">
                  <i class="material-icons">add_circle_outline</i> Ver más (opción sectores)
              </div>
              </a>
          </div>
      </div>
    </div>

   <div class="col-md-4">
      <div class="card card-chart">
          <div class="card-header card-header-warning" data-header-animation="true">
            <div class="ct-chart" id="websiteViewsChart"></div>
          </div>
          <div class="card-body">
              <div class="card-actions">
                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                      <i class="material-icons">build</i> Cargar!
                  </button>
              </div>
              <h5 class="card-title">Exportaciones mensuales 2018 - USD</h5>
              <p class="card-category">Sector Agropecuario</p>
          </div>
          <div class="card-footer">
             <a href="sectores.php">
              <div class="stats">
                  <i class="material-icons">add_circle_outline</i> Ver más (opción sectores)
              </div>
			  </a>
          </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card card-chart">
          <div class="card-header card-header-danger" data-header-animation="true">
              <div class="ct-chart" id="completedTasksChart"></div>
          </div>
          <div class="card-body">
              <div class="card-actions">
                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                      <i class="material-icons">build</i> Cargar!
                  </button>
              </div>
              <h4 class="card-title">Evolución de precio de la uva</h4>
              <p class="card-category">FOB USD x Kg</p>
          </div>
          <div class="card-footer">
             <a href="producto.php">
              <div class="stats">
                  <i class="material-icons">add_circle_outline</i> Ver más (opción productos)
              </div>
			  </a>
          </div>
      </div>
    </div>
</div>-->

<h3>Nuestros Servicios</h3>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
                <a href="#">
                    <img class="img" src="img/intel-comercial.jpg">
                </a>
            </div>
            <div class="card-body">
                <div class="card-actions text-center">
                    <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Cargar!
                    </button>
                </div>
                <h4 class="card-title">
                    <a href="#">Inteligencia Comercial</a>
                </h4>
                <div class="card-description">
                    Realizamos estudios de mercado PRACTICOS  y SENCILLOS donde puedes contactar directamente con CLIENTES y PROVEEDORES en el EXTERIOR.
                </div>
            </div>
            <div class="card-footer">
                <div class="price">
                    <h4>&nbsp;</h4>
                </div>
                <div class="stats">
                   <p class="card-category">
                    <a href="contactanos.php" class="btn btn-info"> Contactanos </a>
					</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
                <a href="#">
                    <img class="img" src="img/asesor.jpg">
                </a>
            </div>
            <div class="card-body">
                <div class="card-actions text-center">
                    <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Cargar!
                    </button>
                </div>
                <h4 class="card-title">
                    <a href="#pablo">Asesoría Personalizada</a>
                </h4>
                <div class="card-description">
                    Te acompañamos en el proceso de exportación o importación de tu producto. Contacto con clientes, analisis de costos, promoción y venta a travéz de medios virtuales...
                </div>
            </div>
            <div class="card-footer">
                <div class="price">
                    <h4>&nbsp;</h4>
                </div>
                <div class="stats">
                   <p class="card-category">
                    <a href="contactanos.php" class="btn btn-info"> Contactanos </a>
					</p>
                </div>
            </div>
        </div>
    </div>
</div>

                      </div>
                    </div>
                    <?php include("footer.php"); ?>
            </div>
        </div>


    </body>

<?php include("js.php"); ?>
  
  <script>
	$('#modal4').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var video = button.data('url')
   //$("#myFrame").attr('src',video);  
   $('#modal4 iframe').attr("src", video);
})
 
$('#modal4').on('hidden.bs.modal', function (e) {
  // Quitar la reproduccion del video al ocutar el modal
  $('#modal4 iframe').attr("src", $("#modal4 iframe").attr("src"));
});
	</script>
  
  <script>
	$('#modal5').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var video = button.data('url')
   //$("#myFrame").attr('src',video);  
   $('#modal5 iframe').attr("src", video);
})
 
$('#modal5').on('hidden.bs.modal', function (e) {
  // Quitar la reproduccion del video al ocutar el modal
  $('#modal5 iframe').attr("src", $("#modal5 iframe").attr("src"));
});
	</script>
  
  <script>
	$('#modal6').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var video = button.data('url')
   //$("#myFrame").attr('src',video);  
   $('#modal6 iframe').attr("src", video);
})
 
$('#modal6').on('hidden.bs.modal', function (e) {
  // Quitar la reproduccion del video al ocutar el modal
  $('#modal6 iframe').attr("src", $("#modal6 iframe").attr("src"));
});
	</script>

  <script type="text/javascript">

$(document).ready(function(){
  //init wizard
  demo.initMaterialWizard();
  // Javascript method's body can be found in assets/js/demos.js
  demo.initDashboardPageCharts();
  demo.initCharts();
});
</script>

  <script type="text/javascript">
$(document).ready(function(){

  demo.initVectorMap();
});

</script>

	

<!-- Sharrre libray -->
<script src="js/jquery.sharrre.js">
</script>

<?php
//cerrando conexion
	mysqli_close($conexpg);
?>
</html>
