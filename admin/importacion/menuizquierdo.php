<div class="sidebar" data-color="azure" data-background-color="black" data-image="../img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->

    <div class="logo">
        <a href="./" class="simple-text logo-mini">
             <img src="../img/logo.png" width="30px" />
        </a>

        <a href="./" class="simple-text logo-normal">
             AZATRADE
        </a>
<font size="2"><font color="#FFFFFF">Importaciones</font></font>
    </div>

    <div class="sidebar-wrapper">
     <?php if ($_SESSION['login_usuario']==""){ ?>
      <center>
      <a href="../login/" class="btn btn-success btn-sm visible-sm visible-xs"><font color="#FFFFFF"><i class="material-icons">person</i> Ingresar</font></a>
      <a href="../registro/" class="btn btn-facebook btn-sm visible-sm visible-xs"><font color="#FFFFFF"><i class="material-icons">lock</i> Registrate</font></a>
      </center>
      <?php } ?>
       <?php if (isset($_SESSION['login_usuario'])){ ?>
        <div class="user">
            <div class="photo">
                <img src="../img/faces/user-org.png" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username" <?=$cambiapf;?> >
                    <span>
                      <?php $uA1xx =$_SESSION['nombreaza']; $uA2 = $_SESSION['apellido']; ?>
                      <?php echo"$uA1xx $uA2"; ?>
                      <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse <?=$actibtnpf;?> " id="collapseExample"  >
                    <ul class="nav">
                        <li class="nav-item <?=$activeperfil;?> ">
                            <a class="nav-link" href="../perfil.php">
                              <span class="sidebar-mini"> MP </span>
                              <span class="sidebar-normal"> Mi Perfil </span>
                            </a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> EP </span>
                              <span class="sidebar-normal"> Editar Perfil </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> C </span>
                              <span class="sidebar-normal"> Configurar </span>
                            </a>
                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
        <ul class="nav">

            <li class="nav-item <?=$activehome;?>">
                <a class="nav-link" href="index.php">
                    <i class="material-icons">dashboard</i>
                    <p> Inicio </p>
                </a>
            </li>
            <!--<li class="nav-item <?=$activeprodu;?>">
                <a class="nav-link" href="producto.php">
                    <i class="material-icons">work</i>
                    <p> Productos </p>
                </a>
            </li>
            <li class="nav-item <?=$activeresu;?>">
                <a class="nav-link" href="resumenes.php">
                    <i class="material-icons">cached</i>
                    <p> Resumenes </p>
                </a>
            </li>
            <li class="nav-item <?=$activeparti;?>">
                <a class="nav-link" href="partida.php">
                    <i class="material-icons">spellcheck</i>
                    <p> Partidas </p>
                </a>
            </li>
            <li class="nav-item <?=$activemerca;?>">
                <a class="nav-link" href="mercado.php">
                    <i class="material-icons">language</i>
                    <p> Mercados </p>
                </a>
            </li>
            <li class="nav-item <?=$activeempre;?>">
                <a class="nav-link" href="empresa.php">
                    <i class="material-icons">domain</i>
                    <p> Empresas </p>
                </a>
            </li>
            <li class="nav-item <?=$activeregion;?>">
                <a class="nav-link" href="regiones.php">
                    <i class="material-icons">location_on</i>
                    <p> Regiones </p>
                </a>
            </li>
            <li class="nav-item <?=$activesecto;?>">
                <a class="nav-link" href="sectores.php">
                    <i class="material-icons">pie_chart</i>
                    <p> Sectores </p>
                </a>
            </li>-->
            <li class="nav-item <?=$activebusdeta;?>">
                <a class="nav-link" href="busqueda-detallada.php">
                    <i class="material-icons">search</i>
                    <p> Busqueda Detallada </p>
                </a>
            </li>
            
            <li class="nav-item <?=$activebus;?>">
            <a class="nav-link" data-toggle="collapse" href="#pagesBus">
              <i class="material-icons">find_in_page</i>
              <p> Buscar proveedor
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse <?=$areashow;?>" id="pagesBus">
              <ul class="nav">
                <li class="nav-item  <?=$busarea;?>">
                  <a class="nav-link" href="http://www.aduanet.gob.pe/cl-ad-itconsmanifiesto/manifiestoITS01Alias?accion=cargarFrmConsultaManifiesto&tipo=A" target="_blank">
                    <i class="material-icons"> brightness_auto </i>
                    <span class="sidebar-normal"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Aéra del Callao </span>
                  </a>
                </li>
                <li class="nav-item <?=$maritimaca;?>">
                  <a class="nav-link" href="http://www.aduanet.gob.pe/cl-ad-itconsmanifiesto/manifiestoITS01Alias?accion=cargarFrmConsultaManifiesto&tipo=M" target="_blank">
                    <i class="material-icons"> directions_boat </i>
                    <span class="sidebar-normal"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Marítima del Callao </span>
                  </a>
                </li>
                <li class="nav-item <?=$areaadua;?>">
                  <a class="nav-link" href="http://www.aduanet.gob.pe/servlet/CRManProvinc?xopc=M&xtipo=1&xadu=P" target="_blank">
                    <i class="material-icons"> business </i>
                    <span class="sidebar-normal"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Otras Aduanas </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
            
            <!--<li class="nav-item <?//=$activepregu;?>">
                <a class="nav-link" href="preguntas.php">
                    <i class="material-icons">contact_support</i>
                    <p> Preguntas </p>
                </a>
            </li>-->
            
            <li class="nav-item <?=$activemercapbiimpo;?>">
                <a class="nav-link" href="pb">
                    <i class="material-icons">format_bold</i>
                    <p> Power BI Import </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="../AZATRADE_GUIA.pdf" target="_blank">
                    <i class="material-icons">local_library</i>
                    <p> Guia </p>
                </a>
            </li>
            

            <li class="nav-item visible-xs visible-sm">
					<a class="nav-link" href="../">
            <i class="material-icons">explicit</i> Exportaciones
					</a>
				</li>
               <li class="nav-item visible-xs visible-sm">
                <a class="nav-link" href="https://www.azatrade.info/arancel/" target="_blank">
                    <i class="material-icons">brightness_auto</i>
                    <p> Arancel </p>
                </a>
            </li>
            <li class="nav-item visible-xs visible-sm">
                <a class="nav-link" href="https://www.azatrade.info/www/" target="_blank">
                    <i class="material-icons">brightness_auto</i>
                    <p> WWW </p>
                </a>
            </li>
            <li class="nav-item visible-xs visible-sm">
                <a class="nav-link" href="planes/">
                    <i class="material-icons">view_week</i>
                    <p> Planes </p>
                </a>
            </li>
            <li class="nav-item visible-xs visible-sm <?=$activecontac;?>">
                <a class="nav-link" href="contactanos.php">
                    <i class="material-icons">contact_mail</i>
                    <p> Contactanos </p>
                </a>
            </li>

            
            <!-- ********* -->
            <?php if($_SESSION['rol']=='ADMIN'){ ?>
            <li class="nav-item <?=$activepadm;?>">
                <a class="nav-link" data-toggle="collapse" href="#pagesExamples" <?=$cambiaicons;?> >
                    <i class="material-icons">settings</i>
                    <p> Panel Admin
                       <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse <?=$actibtn;?> " id="pagesExamples">
                    <ul class="nav">
                        <li class="nav-item <?=$activerptadm;?>">
                            <a class="nav-link" href="../rpt-user.php">
                              <i class="material-icons">how_to_reg</i>
                              <span class="sidebar-normal"> Usuarios </span>
                            </a>
                        </li>
                        <li class="nav-item <?=$activerptcon;?>">
                            <a class="nav-link" href="../rpt-conex.php">
                              <i class="material-icons">record_voice_over</i>
                              <span class="sidebar-normal"> Ultimas Conexiones </span>
                            </a>
                        </li>
                        <li class="nav-item <?=$activerptacc;?>">
                            <a class="nav-link" href="../rpt-acceso.php">
                              <i class="material-icons">directions_run</i>
                              <span class="sidebar-normal"> Permisos Accesos </span>
                            </a>
                        </li>
                        
                        
                    </ul>
                </div>
            </li>
            <?php } ?>
            <!-- *********** -->
            
            <?php if (isset($_SESSION['login_usuario'])){ ?>
            <li class="nav-item ">
                <a class="nav-link" href="../logout/">
                    <i class="material-icons" style="color: #EF0105">power_settings_new</i>
                    <p> Cerrar Sesion </p>
                </a>
            </li>
            <?php } ?>
            
            
            
        </ul>
    </div>
</div>