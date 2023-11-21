<div class="sticky-navbar">
        <div class="sticky-info">
            <a href="./"><i class="icon-home"></i>Inicio</a>
        </div>
        <div class="sticky-info">
            <a href="#" class=""><i class="icon-bars"></i>Productos</a>
        </div>
		<div class="sticky-info">
            <a href="#" class=""><i class="icon-bars"></i>Partidas</a>
        </div>
        <div class="sticky-info">
            <a href="#" class=""><i class="icon-wishlist-2"></i>Mercado</a>
        </div>
	<?php if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){ ?>
        <div class="sticky-info">
            <a href="login" class=""><i class="icon-user-2"></i>Ingresar</a>
        </div>
	<?php }else{ ?>
	<?php } ?>
        <!-- <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">3</span>
                </i>Cart
            </a>
        </div> -->
    </div>