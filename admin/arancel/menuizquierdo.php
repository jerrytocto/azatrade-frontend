<div class="sidebar" data-color="azure" data-background-color="black" data-image="img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->

    <div class="logo">
        <a href="https://www.azatrade.info/" class="simple-text logo-mini">
             <img src="../img/logo.png" width="30px" />
        </a>

        <a href="https://www.azatrade.info/" class="simple-text logo-normal">
             AZATRADE
        </a>
        <font size="2"><font color="#FFFFFF">Arancel</font></font>
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
                <a class="nav-link" href="index.php"><i class="material-icons">dashboard</i><p> Inicio </p></a>
            </li>
            <!--<li class="nav-item <?=$activeprodu;?>">
                <a class="nav-link" href="index.php"><i class="material-icons">search</i><p> Buscar arancel </p></a>
            </li>-->
            <li class="nav-item <?=$activelista;?>">
                <a class="nav-link" href="lista.php"><i class="material-icons">search</i><p> Buscar por secciones </p></a>
            </li>
            <li class="nav-item <?=$activehisto;?>">
                <a class="nav-link" href="listsearch.php"><i class="material-icons">spellcheck</i><p> Historial de partidas </p></a>
            </li>
            <li class="nav-item <?=$activeprodug;?>"><a class="nav-link" href="producto.php"><i class="material-icons">spellcheck</i><p> Buscar por productos </p></a>
            </li>
            
            <!--<li class="nav-item <?=$activebusdeta;?>">
                <a class="nav-link" href="busqueda-detallada.php"><i class="material-icons">search</i><p> Busqueda Detallada </p></a>
            </li>-->

            <li class="nav-item visible-xs visible-sm">
                <a class="nav-link" href="../importacion/"><i class="material-icons">airplanemode_active</i><p> Importaciones </p></a>
            </li>
            <li class="nav-item visible-xs visible-sm">
                <a class="nav-link" href="../planes/"><i class="material-icons">view_week</i><p> Planes </p></a>
            </li>
            <li class="nav-item visible-xs visible-sm <?=$activecontac;?>">
                <a class="nav-link" href="../contactanos.php"><i class="material-icons">contact_mail</i><p> Contactanos </p></a>
            </li>
            <li class="nav-item visible-xs visible-sm">
                <a class="nav-link" href="https://www.azatrade.info/noticias/" target="_blank"><i class="material-icons">receipt</i><p> Blog </p></a>
            </li>
            
            <?php if (isset($_SESSION['login_usuario'])){ ?>
            <li class="nav-item ">
                <a class="nav-link" href="../logout/"><i class="material-icons" style="color: #EF0105">power_settings_new</i><p> Cerrar Sesion </p></a>
            </li>
            <?php } ?>
            
            
            
        </ul>
    </div>
</div>