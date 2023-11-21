<div class="header-top bg-primary text-uppercase">
                <div class="container">
                    <!-- <div class="header-left">
                        <div class="header-dropdown mr-auto mr-sm-3 mr-md-0">
                            <a href="#" class="pl-0"><i class="flag-us flag"></i>ENG</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#"><i class="flag-us flag mr-2"></i>ENG</a>
                                    </li>
                                    <li><a href="#"><i class="flag-fr flag mr-2"></i>FRA</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="header-dropdown ml-3 pl-1">
                            <a href="#">USD</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">USD</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <div class="header-right header-dropdowns ml-0 ml-sm-auto">
                        <p class="top-message mb-0 d-none d-sm-block">Bienvenido a Azatrade</p>
                        <div class="header-dropdown dropdown-expanded mr-3">
                            <a href="#">Links</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="./">Exportadores</a></li>
                                    <li><a href="importacion">Importadores</a></li>
									<?php if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){ ?>
                                    <li><a href="registro">Reg&iacute;strate</a></li>
									<li><a href="login" class="">Ingresar</a></li>
										<?php }else{ ?>
										<li><a><?=$_SESSION['nombreaza'];?></a></li>
									<li><a href="salir" class="">Cerrar Sesion</a></li>
										<?php } ?>
                                </ul>
                            </div>
                        </div>
                        <span class="separator"></span>

                        <div class="social-icons">
                            <a href="#" class="social-icon social-facebook icon-facebook ml-0" target="_blank"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter ml-0" target="_blank"></a>
                            <a href="#" class="social-icon social-instagram icon-instagram ml-0" target="_blank"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .header-top -->