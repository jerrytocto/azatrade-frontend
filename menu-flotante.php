<div class="header-middle text-dark sticky-header">
                <div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
						<a href="./"><img src="assets/images/logoaza.png" alt="AZATRADE"></a>
                    </div>
					
                    <div class="header-right w-lg-max pl-2">
                        <div class="header-search header-icon header-search-inline header-search-category w-lg-max">
                                <div class="header-search-wrapper_x">
                                    <!-- <input type="search" class="form-control" name="q" id="q" placeholder="buscar..." onkeyup="onKeyUp(event)" >
                                    <div class="select-custom">
                                        <select id="cate" name="cate">
                                            <option value="Productos">Productos</option>
                                            <option value="Mercados">Mercados</option>
                                            <option value="Empresas">Empresas</option>
                                            <option value="Regiones">Regiones</option>
                                            <option value="Sectores">Sectores</option>
                                        </select>
                                    </div>
									<div class="select-custom">
                                        <select id="year" name="year">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                        </select>
                                    </div>
                                    <button class="btn icon-magnifier" type="button" id="busca" name="busca"></button> -->
                                </div>
                        </div>
                        <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978037200" class="d-block text-dark ls-10 pt-1">+51 978 037 200</a></h6>
                        </div>
						<?php if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){ ?>
                        <a href="login" class="header-icon header-icon-user"><i class="icon-user-2"></i></a>
						<?php }else{ ?>
						<?php } ?>
                    </div>
                </div>
				
            </div>
            <!-- End .header-middle -->