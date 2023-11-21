<?php
include("conex/inibd.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Azatrade</title>

    <meta name="keywords" content="azatrade, exportacion, importacion, arancel, aduana, dua, comercial, inteligencia comercial" />
    <meta name="" content="Azatrade - Sistema de Inteligencia Comercial">
    <meta name="author" content="AZATRADE">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">


    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Playfair+Display:900', 'Shadows+Into+Light:400']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/demo1.min.css?ter=133">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
	
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
</head>

<body>
    <div class="page-wrapper">
         <!-- <div class="top-notice text-white bg-dark">
            <div class="container text-center">
                <h5 class="d-inline-block mb-0">Get Up to <b>40% OFF</b> New-Season Styles</h5>
                <a href="demo1-shop.html" class="category">MEN</a>
                <a href="demo1-shop.html" class="category">WOMEN</a>
                <small>* Limited time only.</small>
                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
            </div>
        </div> -->

        <header class="header home">
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
                                    <li><a href="#">Importadores</a></li>
                                    <li><a href="#">Reg&iacute;strate</a></li>
                                    <li><a href="#" class="login-link">Ingresar</a></li>
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

            <div class="header-middle text-dark sticky-header">
				<div class="row">
						<div class="col-lg-5"></div>
						<div class="col-lg-1"><h4 align="center"><a href="./" class="text-primary"><u>Exportaciones</u></a></h4></div>
						<div class="col-lg-1"><h4 align="center"><a href="./">Importaciones</a></h4></div>
						<div class="col-lg-5"></div>
					</div>

                <div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <!-- <a href="./" class="logo"><img src="assets/images/logo_aza.png" width="280" height="64" alt="AZATRADE"></a> -->
						<a href="./"><img src="assets/images/logo_aza.png" alt="AZATRADE"></a>
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right w-lg-max pl-2">
                        <div class="header-search header-icon header-search-inline header-search-category w-lg-max">
							<!--<div class="header-search header-icon header-search-category w-lg-max"> -->
                            <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                            <form  method="post">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="buscar...">
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
                                    <!-- End .select-custom -->
                                    <button class="btn icon-magnifier" type="button" id="busca" name="busca"></button>
                                </div>
                                <!-- End .header-search-wrapper -->
                            </form>
                        </div>
                        <!-- End .header-search -->
						
                        <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">LLamanos al<a href="tel:+51978038200" class="d-block text-dark ls-10 pt-1">+51 978 038 200</a></h6>
                        </div>
                        <!-- End .header-contact -->

                        <a href="#" class="header-icon header-icon-user"><i class="icon-user-2"></i></a>

                        <!--<a href="wishlist.html" class="header-icon"><i class="icon-wishlist-2"></i></a> -->

                        <!-- <div class="dropdown cart-dropdown">
                            <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="minicart-icon"></i>
                                <span class="cart-count badge-circle">3</span>
                            </a>

                            <div class="cart-overlay"></div>

                            <div class="dropdown-menu mobile-cart">
                                <a href="#" title="Close (Esc)" class="btn-close">×</a>

                                <div class="dropdownmenu-wrapper custom-scrollbar">
                                    <div class="dropdown-cart-header">Shopping Cart</div>
                                    <div class="dropdown-cart-products">
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="demo1-product.html">Ultimate 3D Bluetooth Speaker</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span> × $99.00
                                                </span>
                                            </div>
                                            <figure class="product-image-container">
                                                <a href="demo1-product.html" class="product-image">
                                                    <img src="assets/images/products/product-1.jpg" alt="product" width="80" height="80">
                                                </a>

                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div>
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="demo1-product.html">Brown Women Casual HandBag</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span> × $35.00
                                                </span>
                                            </div>
                                            <figure class="product-image-container">
                                                <a href="demo1-product.html" class="product-image">
                                                    <img src="assets/images/products/product-2.jpg" alt="product" width="80" height="80">
                                                </a>

                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div>
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="demo1-product.html">Circled Ultimate 3D Speaker</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span> × $35.00
                                                </span>
                                            </div>
                                            <figure class="product-image-container">
                                                <a href="demo1-product.html" class="product-image">
                                                    <img src="assets/images/products/product-3.jpg" alt="product" width="80" height="80">
                                                </a>
                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="dropdown-cart-total">
                                        <span>SUBTOTAL:</span>

                                        <span class="cart-total-price float-right">$134.00</span>
                                    </div>
                                    <div class="dropdown-cart-action">
                                        <a href="cart.html" class="btn btn-gray btn-block view-cart">View
                                            Cart</a>
                                        <a href="checkout.html" class="btn btn-dark btn-block">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- End .dropdown -->
						
                    </div>
                    <!-- End .header-right -->
					
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-middle -->
        </header>
        <!-- End .header -->

        <main class="main home">
			<p><center><a href="#"><b>CONSULTA AVANZADA</b> <i class="icon-search-3"></i> </a></center></p>
            <div class="container mb-2">
                <!-- <div class="info-boxes-container row row-joined mb-2 font2">
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>FREE SHIPPING &amp; RETURN</h4>
                            <p class="text-body">Free shipping on all orders over $99</p>
                        </div>
                    </div>
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-money"></i>

                        <div class="info-box-content">
                            <h4>MONEY BACK GUARANTEE</h4>
                            <p class="text-body">100% money back guarantee</p>
                        </div>
                    </div>
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>ONLINE SUPPORT 24/7</h4>
                            <p class="text-body">Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div> -->
				
                <div class="row">
					
					
                    <div class="col-lg-9">
						<!-- busqueda -->
						<div id="loader" class="text-center"><img src="assets/images/loadingb.gif"></div>

          <!-- AJAX -->
          <div id="outer_div"></div>
          <!-- END AJAX -->
						<!-- fin busqueda -->
						
						<div id="muestra">
                        <div class="home-slider slide-animate owl-carousel owl-theme mb-2" data-owl-options="{
							'loop': false,
							'dots': true,
							'nav': false
						}">
                            <div class="home-slide home-slide1 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                                <img class="slide-bg" style="background-color: #2699D0;" src="assets/images/demoes/demo1/slider/slide-1.png" width="880" height="428" alt="home-slider">
                                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                                    <h4 class="text-white mb-0">Find the Boundaries. Push Through!</h4>
                                    <h2 class="text-white mb-0">Summer Sale</h2>
                                    <h3 class="text-white text-uppercase m-b-3">70% Off</h3>
                                    <h5 class="text-white text-uppercase d-inline-block mb-0 ls-n-20 align-text-bottom">
                                        Starting At <b class="coupon-sale-text bg-secondary text-white d-inline-block">$<em
                                                class="align-text-top">199</em>99</b></h5>
                                    <a href="demo1-shop.html" class="btn btn-dark btn-md ls-10">Shop Now!</a>
                                </div>
                                <!-- End .banner-layer -->
                            </div>
                            <!-- End .home-slide -->

                            <div class="home-slide home-slide2 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                                <img class="slide-bg" style="background-color: #dadada;" src="assets/images/demoes/demo1/slider/slide-2.jpg" width="880" height="428" alt="home-slider">
                                <div class="banner-layer text-uppercase appear-animate" data-animation-name="fadeInUpShorter">
                                    <h4 class="m-b-2">Over 200 products with discounts</h4>
                                    <h2 class="m-b-3">Great Deals</h2>
                                    <h5 class="d-inline-block mb-0 align-top mr-5 mb-2">Starting At
                                        <b>$<em>299</em>99</b>
                                    </h5>
                                    <a href="demo1-shop.html" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                                </div>
                                <!-- End .banner-layer -->
                            </div>
                            <!-- End .home-slide -->

                            <div class="home-slide home-slide3 banner banner-md-vw banner-sm-vw  d-flex align-items-center">
                                <img class="slide-bg" style="background-color: #e5e4e2;" src="assets/images/demoes/demo1/slider/slide-3.jpg" width="880" height="428" alt="home-slider" />
                                <div class="banner-layer text-uppercase appear-animate" data-animation-name="fadeInUpShorter">
                                    <h4 class="m-b-2">Up to 70% off</h4>
                                    <h2 class="m-b-3">New Arrivals</h2>
                                    <h5 class="d-inline-block mb-0 align-top mr-5 mb-2">Starting At
                                        <b>$<em>299</em>99</b>
                                    </h5>
                                    <a href="demo1-shop.html" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                                </div>
                                <!-- End .banner-layer -->
                            </div>
                            <!-- End .home-slide -->
                        </div>
                        <!-- End .home-slider -->

                        <div class="banners-container m-b-2 owl-carousel owl-theme" data-owl-options="{
							'dots': false,
							'margin': 20,
							'loop': false,
							'responsive': {
								'480': {
									'items': 2
								},
								'768': {
									'items': 3
								}
							}
						}">
                            <div class="banner banner1 banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                                <figure class="w-100">
                                    <img src="assets/images/demoes/demo1/banners/banner-1.jpg" style="background-color: #dadada;" alt="banner">
                                </figure>
                                <div class="banner-layer">
                                    <h3 class="m-b-2">Porto Watches</h3>
                                    <h4 class="m-b-4 text-primary"><sup class="text-dark"><del>20%</del></sup>30%<sup>OFF</sup></h4>
                                    <a href="demo1-shop.html" class="text-dark text-uppercase ls-10">Shop Now</a>
                                </div>
                            </div>
                            <!-- End .banner -->
                            <div class="banner banner2 text-uppercase banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                                <figure class="w-100">
                                    <img src="assets/images/demoes/demo1/banners/banner-2.jpg" style="background-color: #dadada;" alt="banner">
                                </figure>
                                <div class="banner-layer text-center">
                                    <h3 class="m-b-1 ls-n-20">Deal Promos</h3>
                                    <h4 class="text-body">Starting at $99</h4>
                                    <a href="demo1-shop.html" class="text-dark text-uppercase ls-10">Shop Now</a>
                                </div>
                            </div>
                            <!-- End .banner -->
                            <div class="banner banner3 banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="500">
                                <figure class="w-100">
                                    <img src="assets/images/demoes/demo1/banners/banner-3.jpg" style="background-color: #dadada;" alt="banner">
                                </figure>
                                <div class="banner-layer text-right">
                                    <h3 class="m-b-2">Handbags</h3>
                                    <h4 class="mb-3 text-secondary text-uppercase">Starting at $99</h4>
                                    <a href="demo1-shop.html" class="text-dark text-uppercase ls-10">Shop Now</a>
                                </div>
                            </div>
                            <!-- End .banner -->
                        </div>

                        <h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Featured Products</h2>

                        <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="demo1-product.html">
                                        <img src="assets/images/demoes/demo1/products/product-1.jpg" width="205" height="205" alt="product">
                                        <img src="assets/images/demoes/demo1/products/product-1-2.jpg" width="205" height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-20%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="demo1-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                    <div class="product-countdown-container">
                                        <span class="product-countdown-title">offer ends in:</span>
                                        <div class="product-countdown countdown-compact" data-until="2021, 10, 5" data-compact="true">
                                        </div>
                                        <!-- End .product-countdown -->
                                    </div>
                                    <!-- End .product-countdown-container -->
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo1-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo1-product.html">Black Grey Headset</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$9.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="demo1-product.html">
                                        <img src="assets/images/demoes/demo1/products/product-2.jpg" width="205" height="205" alt="product" />
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo1-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo1-product.html">Battery Charger</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$9.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="demo1-product.html">
                                        <img src="assets/images/demoes/demo1/products/product-3.jpg" width="205" height="205" alt="product">
                                        <img src="assets/images/demoes/demo1/products/product-3-2.jpg" width="205" height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-30%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>

                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo1-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo1-product.html">Brown Bag</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$9.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="demo1-product.html">
                                        <img src="assets/images/demoes/demo1/products/product-4.jpg" width="205" height="205" alt="product">
                                        <img src="assets/images/demoes/demo1/products/product-4-2.jpg" width="205" height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo1-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo1-product.html">Casual Note Bag</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$9.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="demo1-product.html">
                                        <img src="assets/images/demoes/demo1/products/product-5.jpg" width="205" height="205" alt="product">
                                        <img src="assets/images/demoes/demo1/products/product-5-2.jpg" width="205" height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo1-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="demo1-product.html">Porto Extended Camera</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$9.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <!-- End .featured-proucts -->

                        <div class="brands-slider owl-carousel owl-theme images-center appear-animate" data-animation-name="fadeIn" data-animation-duration="700" data-owl-options="{
                            'margin': 0,
							'responsive': {
								'768': {

									'items': 4
                                },
                                '991': {
									'items': 4
                                },
                                '1200': {
									'items': 5
								}
							}
						}">
                            <img src="assets/images/brands/small/brand1.png" width="140" height="60" alt="brand">
                            <img src="assets/images/brands/small/brand2.png" width="140" height="60" alt="brand">
                            <img src="assets/images/brands/small/brand3.png" width="140" height="60" alt="brand">
                            <img src="assets/images/brands/small/brand4.png" width="140" height="60" alt="brand">
                            <img src="assets/images/brands/small/brand5.png" width="140" height="60" alt="brand">
                            <img src="assets/images/brands/small/brand6.png" width="140" height="60" alt="brand">
                        </div>
                        <!-- End .brands-slider -->

                        <div class="row products-widgets">
                            <div class="col-sm-6 col-md-4 pb-4 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                                <div class="product-column">
                                    <h3 class="section-sub-title ls-n-20">Top Rated Products</h3>

                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="demo1-product.html">
                                                <img src="assets/images/demoes/demo1/products/small/product-4.jpg" width="84" height="84" alt="product">
                                                <img src="assets/images/demoes/demo1/products/small/product-4-2.jpg" width="84" height="84" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="demo1-product.html">Porto Extended
                                                    Camera</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="demo1-product.html">
                                                <img src="assets/images/demoes/demo1/products/small/product-5.jpg" width="84" height="84" alt="product">
                                                <img src="assets/images/demoes/demo1/products/small/product-5-2.jpg" width="84" height="84" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="demo1-product.html">Blue BackPack</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget ">
                                        <figure>
                                            <a href="demo1-product.html">
                                                <img src="assets/images/demoes/demo1/products/small/product-6.jpg" width="84" height="84" alt="product">
                                                <img src="assets/images/demoes/demo1/products/small/product-6-2.jpg" width="84" height="84" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="demo1-product.html">Casual Blue
                                                    Shoes</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .product-column -->
                            </div>
                            <!-- End .col-md-4 -->

                            <div class="col-sm-6 col-md-4 pb-4 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                                <div class="product-column">
                                    <h3 class="section-sub-title ls-n-20">Best Selling Products</h3>

                                    <div class="product-default left-details product-widget ">
                                        <figure>
                                            <a href="demo1-product.html">
                                                <img src="assets/images/demoes/demo1/products/small/product-2.jpg" width="84" height="84" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="demo1-product.html">Battery Charger</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget ">
                                        <figure>
                                            <a href="demo1-product.html">
                                                <img src="assets/images/demoes/demo1/products/small/product-7.jpg" width="84" height="84" alt="product">
                                                <img src="assets/images/demoes/demo1/products/small/product-7-2.jpg" width="84" height="84" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="demo1-product.html">Computer Mouse</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget ">
                                        <figure>
                                            <a href="demo1-product.html">
                                                <img src="assets/images/demoes/demo1/products/small/product-8.jpg" width="84" height="84" alt="product">
                                                <img src="assets/images/demoes/demo1/products/small/product-8-2.jpg" width="84" height="84" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="demo1-product.html">Casual Note Bag</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .product-column -->
                            </div>
                            <!-- End .col-md-4 -->

                            <div class="col-sm-6 col-md-4 pb-4 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="800">
                                <div class="product-column">
                                    <h3 class="section-sub-title ls-n-20">Latest Products</h3>

                                    <div class="product-default left-details product-widget ">
                                        <figure>
                                            <a href="demo1-product.html">
                                                <img src="assets/images/demoes/demo1/products/small/product-9.jpg" width="84" height="84" alt="product">
                                                <img src="assets/images/demoes/demo1/products/small/product-9-2.jpg" width="84" height="84" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="demo1-product.html">Ultimate 3D
                                                    Bluetooth Speaker</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget ">
                                        <figure>
                                            <a href="demo1-product.html">
                                                <img src="assets/images/demoes/demo1/products/small/product-10.jpg" width="84" height="84" alt="product">
                                                <img src="assets/images/demoes/demo1/products/small/product-10-2.jpg" width="84" height="84" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="demo1-product.html">Brown-Black Men
                                                    Casual Glasses</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget ">
                                        <figure>
                                            <a href="demo1-product.html">
                                                <img src="assets/images/demoes/demo1/products/small/product-11.jpg" width="84" height="84" alt="product">
                                                <img src="assets/images/demoes/demo1/products/small/product-11-2.jpg" width="84" height="84" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="demo1-product.html">Brown-Black Men
                                                    Casual Glasses</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .product-column -->
                            </div>
                            <!-- End .col-md-4 -->
                        </div>
                        <!-- End .row -->

                        <hr class="mt-1 mb-3 pb-2">

                        <div class="feature-boxes-container">
                            <div class="row">
                                <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200">
                                    <div class="feature-box  feature-box-simple text-center">
                                        <i class="icon-earphones-alt"></i>

                                        <div class="feature-box-content p-0">
                                            <h3 class="mb-0 pb-1">Customer Support</h3>
                                            <h5 class="mb-1 pb-1">Need Assistance?</h5>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                        </div>
                                        <!-- End .feature-box-content -->
                                    </div>
                                    <!-- End .feature-box -->
                                </div>
                                <!-- End .col-md-4 -->

                                <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="400">
                                    <div class="feature-box feature-box-simple text-center">
                                        <i class="icon-credit-card"></i>

                                        <div class="feature-box-content p-0">
                                            <h3 class="mb-0 pb-1">Secured Payment</h3>
                                            <h5 class="mb-1 pb-1">Safe & Fast</h5>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                        </div>
                                        <!-- End .feature-box-content -->
                                    </div>
                                    <!-- End .feature-box -->
                                </div>
                                <!-- End .col-md-4 -->

                                <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                                    <div class="feature-box feature-box-simple text-center">
                                        <i class="icon-action-undo"></i>

                                        <div class="feature-box-content p-0">
                                            <h3 class="mb-0 pb-1">Returns</h3>
                                            <h5 class="mb-1 pb-1">Easy & Free</h5>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                        </div>
                                        <!-- End .feature-box-content -->
                                    </div>
                                    <!-- End .feature-box -->
                                </div>
                                <!-- End .col-md-4 -->
                            </div>
                            <!-- End .row -->
                        </div>
                        <!-- End .feature-boxes-container -->
							</div>
                    </div>
                    <!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
					
                    <aside class="sidebar-home col-lg-3 order-lg-first mobile-sidebar">
						
						
						<div class="mt-8" id="accordion2">
					<h3>Busquedas por:</h3>
					<div class="card card-accordion accordion-boxed">
						<a class="card-header" href="#" data-toggle="collapse" data-target="#collapse4"
							aria-expanded="true" aria-controls="collapse4"> Departamento </a>
						<div id="collapse4" class="collapse show" data-parent="#accordion2">
							<div style="overflow-y: auto; height:250px;">
							<nav class="side-nav">
                                <ul class="menu menu-vertical sf-arrows">
                                    <li class="active item"><a href="#" class="nombres"><i class="sicon-globe"></i>Todos</a></li>
									<?php
$ddlt = "SELECT d.iddepartamento, d.nombre FROM departamento AS d ORDER BY d.nombre ASC";
$retdpt = $conexpg -> prepare($ddlt); 
$retdpt -> execute(); 
$tds = $retdpt -> fetchAll(PDO::FETCH_OBJ); 
if($retdpt -> rowCount() > 0) { 
foreach($tds as $dpt) {
	$dpl1 = $dpt -> iddepartamento;
	$dpl2 = $dpt -> nombre;
	
	echo "<li class='item'><a href='#' class='nombres'><i class='sicon-globe'></i>$dpl2</a></li>";
	}
}else{
									?>
									<li><a href="#"><i class="sicon-globe"></i>Sin Datos</a></li>
<?php
	}
	?>
                                </ul>
                            </nav>
								</div>
						</div>
					</div>

					<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse5"
							aria-expanded="true" aria-controls="collapse5"> Sector Econ&oacute;mico </a>
						<div id="collapse5" class="collapse" data-parent="#accordion2">
							<div style="overflow-y: auto; height:250px;">
							<nav class="side-nav">
                                <ul class="menu menu-vertical sf-arrows">
                                    <li class="active item"><a href="#" class="nombres"><i class="sicon-globe"></i>Todos</a></li>
									<?php
$sdlt = "SELECT concat(tipo,sector) as codsec, concat(sector,' - ',tipo) as sector FROM sector GROUP BY tipo, sector ORDER BY sector ASC";
$stdpt = $conexpg -> prepare($sdlt); 
$stdpt -> execute(); 
$sds = $stdpt -> fetchAll(PDO::FETCH_OBJ); 
if($stdpt -> rowCount() > 0) { 
foreach($sds as $spt) {
	$dsl1 = $spt -> codsec;
	$dsl2 = $spt -> sector;
	
	echo "<li class='item'><a href='#' class='nombres'><i class='sicon-globe'></i>$dsl2</a></li>";
	}
}else{
									?>
									<li><a href="#"><i class="sicon-globe"></i>Sin Datos</a></li>
<?php
	}
	?>
                                </ul>
                            </nav>
						</div>
							</div>
					</div>

					<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse6"
							aria-expanded="true" aria-controls="collapse6">Productos</a>
						<div id="collapse6" class="collapse" data-parent="#accordion2">
							<p>Lorem</p>
						</div>
					</div>
							
							<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse7"
							aria-expanded="true" aria-controls="collapse7">Mercado de Destino</a>
						<div id="collapse7" class="collapse" data-parent="#accordion2">
							<div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block" style="overflow-y: auto; height:450px;">
							<p class="buscador"> <br>
        <input id="buscador" class="form-control m-b-3" style="border-radius: 40px;" type="input" value="" placeholder="Buscar Mercado">
    </p>
                            <nav class="side-nav">
                                <ul class="menu menu-vertical sf-arrows">
                                    <li class="active item"><a href="#" class="nombres"><i class="sicon-globe"></i>Todos</a></li>
									<?php
$dqlt = "SELECT p.idpaises, p.espanol FROM paises AS p ORDER BY p.espanol ASC";
$ret_rpt = $conexpg -> prepare($dqlt); 
$ret_rpt -> execute(); 
$tps = $ret_rpt -> fetchAll(PDO::FETCH_OBJ); 
if($ret_rpt -> rowCount() > 0) { 
foreach($tps as $frpt) {
	$tbl1 = $frpt -> idpaises;
	$tbl2 = $frpt -> espanol;
	
	echo "<li class='item'><a href='#' class='nombres'><i class='sicon-globe'></i>$tbl2</a></li>";
	}
}else{
									?>
									<li><a href="#"><i class="sicon-globe"></i>Sin Datos</a></li>
<?php
	}
	?>
                                </ul>
                            </nav>
								</div>
						</div>
					</div>
							
							<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse8"
							aria-expanded="true" aria-controls="collapse8">Otros Accesos Directos</a>
						<div id="collapse8" class="collapse" data-parent="#accordion2">
							<p>Lorem</p>
						</div>
					</div>
							
				</div>
						
                        <!-- <div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block" style="overflow-y: auto; height:450px;">
                            <h2 class="side-menu-title bg-gray ls-n-25">Mercado de Destino </h2>
							<p class="buscador"> <br>
        <input id="buscador" class="form-control m-b-3" style="border-radius: 40px;" type="input" value="" placeholder="Buscar Mercado">
    </p>
                            <nav class="side-nav">
                                <ul class="menu menu-vertical sf-arrows">
                                    <li class="active item"><a href="#" class="nombres"><i class="sicon-globe"></i>Todos</a></li>
									<?php
$dqlt = "SELECT p.idpaises, p.espanol FROM paises AS p ORDER BY p.espanol ASC";
$ret_rpt = $conexpg -> prepare($dqlt); 
$ret_rpt -> execute(); 
$tps = $ret_rpt -> fetchAll(PDO::FETCH_OBJ); 
if($ret_rpt -> rowCount() > 0) { 
foreach($tps as $frpt) {
	$tbl1 = $frpt -> idpaises;
	$tbl2 = $frpt -> espanol;
	
	echo "<li class='item'><a href='#' class='nombres'><i class='sicon-globe'></i>$tbl2</a></li>";
	}
}else{
									?>
									<li><a href="#"><i class="sicon-globe"></i>Sin Datos</a></li>
<?php
	}
	?>
                                </ul>
                            </nav>
                        </div> -->
                        <!-- End .side-menu-container -->

                        <div class="widget widget-banners px-3 pb-3 text-center">
                            <div class="owl-carousel owl-theme dots-small">
                                <div class="banner d-flex flex-column align-items-center">
                                    <h3 class="badge-sale bg-primary d-flex flex-column align-items-center justify-content-center text-uppercase">
                                        <em>Sale</em>Many Item
                                    </h3>

                                    <h4 class="sale-text text-uppercase"><small>UP
                                            TO</small>50<sup>%</sup><sub>off</sub></h4>
                                    <p>Bags, Clothing, T-Shirts, Shoes, Watches and much more...</p>
                                    <a href="demo1-shop.html" class="btn btn-dark btn-md">View Sale</a>
                                </div>
                                <!-- End .banner -->

                                <div class="banner banner4">
                                    <figure>
                                        <img src="assets/images/demoes/demo1/banners/banner-7.jpg" alt="banner">
                                    </figure>

                                    <div class="banner-layer">
                                        <div class="coupon-sale-content">
                                            <h4>DRONE + CAMERAS</h4>
                                            <h5 class="coupon-sale-text text-gray ls-n-10 p-0 font1"><i>UP
                                                    TO</i><b class="text-white bg-dark font1">$100</b> OFF</h5>
                                            <p class="ls-0">Top Brands and Models!</p>
                                            <a href="demo1-shop.html" class="btn btn-inline-block btn-dark btn-black ls-0">VIEW
                                                SALE</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End .banner -->

                                <div class="banner banner5">
                                    <h4>HEADPHONES SALE</h4>

                                    <figure class="m-b-3">
                                        <img src="assets/images/demoes/demo1/banners/banner-8.jpg" alt="banner">
                                    </figure>

                                    <div class="banner-layer">
                                        <div class="coupon-sale-content">
                                            <h5 class="coupon-sale-text ls-n-10 p-0 font1"><i>UP
                                                    TO</i><b class="text-white bg-secondary font1">50%</b> OFF</h5>
                                            <a href="demo1-shop.html" class="btn btn-inline-block btn-dark btn-black ls-0">VIEW
                                                SALE</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End .banner -->
                            </div>
                            <!-- End .banner-slider -->
                        </div>
                        <!-- End .widget -->

                        <div class="widget widget-newsletters bg-gray text-center">
                            <h3 class="widget-title text-uppercase m-b-3">Subscribe Newsletter</h3>
                            <p class="mb-2">Get all the latest information on Events, Sales and Offers. </p>
                            <form action="#">
                                <div class="form-group position-relative sicon-envolope-letter">
                                    <input type="email" class="form-control" name="newsletter-email" placeholder="Email address">
                                </div>
                                <!-- Endd .form-group -->
                                <input type="submit" class="btn btn-primary btn-md" value="Subscribe">
                            </form>
                        </div>
                        <!-- End .widget -->

                        <div class="widget widget-testimonials">
                            <div class="owl-carousel owl-theme dots-left dots-small">
                                <div class="testimonial">
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="assets/images/clients/client-1.jpg" alt="client">
                                        </figure>

                                        <div>
                                            <h4 class="testimonial-title">john Smith</h4>
                                            <span>CEO &amp; Founder</span>
                                        </div>
                                    </div>
                                    <!-- End .testimonial-owner -->

                                    <blockquote class="ml-4 pr-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                        </p>
                                    </blockquote>
                                </div>
                                <!-- End .testimonial -->

                                <div class="testimonial">
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="assets/images/clients/client-2.jpg" alt="client">
                                        </figure>

                                        <div>
                                            <h4 class="testimonial-title">Dae Smith</h4>
                                            <span>CEO &amp; Founder</span>
                                        </div>
                                    </div>
                                    <!-- End .testimonial-owner -->

                                    <blockquote class="ml-4 pr-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                        </p>
                                    </blockquote>
                                </div>
                                <!-- End .testimonial -->

                                <div class="testimonial">
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="assets/images/clients/client-3.jpg" alt="client">
                                        </figure>

                                        <div>
                                            <h4 class="testimonial-title">John Doe</h4>
                                            <span>CEO &amp; Founder</span>
                                        </div>
                                    </div>
                                    <!-- End .testimonial-owner -->

                                    <blockquote class="ml-4 pr-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                        </p>
                                    </blockquote>
                                </div>
                                <!-- End .testimonial -->
                            </div>
                            <!-- End .testimonials-slider -->
                        </div>
                        <!-- End .widget -->

                        <div class="widget widget-posts post-date-in-media media-with-zoom mb-0 mb-lg-2 pb-lg-2">
                            <div class="owl-carousel owl-theme dots-left dots-m-0 dots-small" data-owl-options="
                                { 'margin' : 20,
                                  'loop': false }">
                                <article class="post">
                                    <div class="post-media">
                                        <a href="single.html">
                                            <img src="assets/images/blog/home/post-1.jpg" data-zoom-image="assets/images/blog/home/post-1.jpg" width="280" height="209" alt="Post">
                                        </a>
                                        <div class="post-date">
                                            <span class="day">29</span>
                                            <span class="month">Jun</span>
                                        </div>
                                        <!-- End .post-date -->

                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <!-- End .post-media -->

                                    <div class="post-body">
                                        <h2 class="post-title">
                                            <a href="single.html">Post Format Standard</a>
                                        </h2>

                                        <div class="post-content">
                                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                            <a href="single.html" class="read-more">read more <i
                                                    class="icon-right-open"></i></a>
                                        </div>
                                        <!-- End .post-content -->
                                    </div>
                                    <!-- End .post-body -->
                                </article>

                                <article class="post">
                                    <div class="post-media">
                                        <a href="single.html">
                                            <img src="assets/images/blog/home/post-2.jpg" data-zoom-image="assets/images/blog/home/post-2.jpg" width="280" height="209" alt="Post">
                                        </a>
                                        <div class="post-date">
                                            <span class="day">29</span>
                                            <span class="month">Jun</span>
                                        </div>
                                        <!-- End .post-date -->
                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <!-- End .post-media -->

                                    <div class="post-body">
                                        <h2 class="post-title">
                                            <a href="single.html">Fashion Trends</a>
                                        </h2>

                                        <div class="post-content">
                                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                            <a href="single.html" class="read-more">read more <i
                                                    class="icon-right-open"></i></a>
                                        </div>
                                        <!-- End .post-content -->
                                    </div>
                                    <!-- End .post-body -->
                                </article>

                                <article class="post">
                                    <div class="post-media">
                                        <a href="single.html">
                                            <img src="assets/images/blog/home/post-3.jpg" data-zoom-image="assets/images/blog/home/post-3.jpg" width="280" height="209" alt="Post">
                                        </a>
                                        <div class="post-date">
                                            <span class="day">29</span>
                                            <span class="month">Jun</span>
                                        </div>
                                        <!-- End .post-date -->
                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <!-- End .post-media -->

                                    <div class="post-body">
                                        <h2 class="post-title">
                                            <a href="single.html">
                                                Post Format Video</a>
                                        </h2>

                                        <div class="post-content">
                                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                            <a href="single.html" class="read-more">read more <i
                                                    class="icon-right-open"></i></a>
                                        </div>
                                        <!-- End .post-content -->
                                    </div>
                                    <!-- End .post-body -->
                                </article>
                            </div>
                            <!-- End .posts-slider -->
                        </div>
                        <!-- End .widget -->
                    </aside>
                    <!-- End .col-lg-3 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->
        </main>
        <!-- End .main -->

        <footer class="footer bg-dark position-relative">
            <div class="footer-middle">
                <div class="container position-static">
                    <div class="footer-ribbon">Sistema de inteligencia comercial</div>

                    <div class="row">
                        <div class="col-lg-3 col-sm-6 pb-2 pb-sm-0">
                            <div class="widget">
                                <h4 class="widget-title">Nosotros</h4>
                                <a href="demo1.html">
                                    <img src="assets/images/logo-footer.png" alt="Logo" class="logo-footer">
                                </a>
                                <p class="m-b-4">Azatrade es un Sistema que INTEGRA, PROCESA y PRESENTA datos de EXPORTACIONES e IMPORTACIONES peruanas. Es un identificador de oportunidades comerciales de productos de exportación e importación.</p>
                                <a href="#" class="read-more text-white">Leer m&aacute;s...</a>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6 pb-4 pb-sm-0">
                            <div class="widget mb-2">
                                <h4 class="widget-title mb-1 pb-1">Cont&aacute;ctanos</h4>
                                <ul class="contact-info m-b-4">
                                    <li>
                                        <span class="contact-info-label">&Uacute;bicanos:</span> www.azatrade.com
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Celular:</span><a href="tel:+51978038200">+51 978 038 200</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Email:</span> <a href="mailto:informes@azatrade.info">informes@azatrade.info</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Días/Horas Laborables:</span> Lun - Sab / 9:00 AM - 8:00 PM
                                    </li>
                                </ul>
                                <div class="social-icons">
                                    <a href="https://www.facebook.com/AzatradePeru/?_rdc=1&_rdr" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                    <!-- <a href="https://www.youtube.com/channel/UCf7agENOnmrMoPgoNmIJTSQ" class="social-icon social-youtube icon-yuotube" target="_blank" title="Youtube"></a> -->
                                    <a href="https://www.youtube.com/channel/UCf7agENOnmrMoPgoNmIJTSQ" class="social-icon social-gplus fab fa-youtube-square" target="_blank" title="Yuotube"></a>
                                </div>
                                <!-- End .social-icons -->
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6 pb-2 pb-sm-0">
                            <div class="widget">
                                <h4 class="widget-title pb-1">Customer Service</h4>

                                <ul class="links">
                                    <li><a href="./">Inicio</a></li>
                                    <li><a href="#">Nosotros</a></li>
                                    <li><a href="#">Exportaciones</a></li>
                                    <li><a href="#">Importaciones</a></li>
                                    <li><a href="#">Planes</a></li>
                                    <li><a href="#">Contactanos</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Preguntas y respuestas</a></li>
                                    <li><a href="#">Condiciones</a></li>
                                    <li><a href="#">Privacidad</a></li>
                                </ul>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6 pb-0">
                            <div class="widget mb-1 mb-sm-3">
                                <h4 class="widget-title">Busquedas Populares</h4>

                                <div class="tagcloud">
                                    <a href="#">Uva</a>
                                    <a href="#">Arandano</a>
                                    <a href="#">Palta</a>
                                    <a href="#">Cafe</a>
                                    <a href="#">Platano</a>
                                    <a href="#">Celular</a>
                                    <a href="#">Mango</a>
                                    <a href="#">Alcachofa</a>
                                    <a href="#">Tubo cuadrado</a>
                                    <a href="#">Cacao</a>
                                    <a href="#">Banano</a>
                                    <a href="#">Cereza</a>
                                </div>
                            </div>
                        </div>
                        <!-- End .col-lg-3 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .footer-middle -->

            <div class="container">
                <div class="footer-bottom d-sm-flex align-items-center">
                    <div class="footer-left">
                        <span class="footer-copyright">© Azatrade 2023. Todo los derechos reservados.</span>
                    </div>

                    <div class="footer-right ml-auto mt-1 mt-sm-0">
                        <div class="payment-icons">
                            <span class="payment-icon visa" style="background-image: url(assets/images/payments/payment-visa.svg)"></span>
                            <span class="payment-icon paypal" style="background-image: url(assets/images/payments/payment-paypal.svg)"></span>
                            <span class="payment-icon stripe" style="background-image: url(assets/images/payments/payment-stripe.png)"></span>
                            <span class="payment-icon verisign" style="background-image:  url(assets/images/payments/payment-verisign.svg)"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .footer-bottom -->
			<?php $conexpg = null;//cierra conexion  ?>
        </footer>
        <!-- End .footer -->
    </div>
    <!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>
    <!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu menu-with-icon">
                    <li><a href="./"><i class="icon-home"></i>Inicio</a></li>
                    <!-- <li>
                        <a href="demo1-shop.html" class="sf-with-ul"><i class="sicon-badge"></i>Categories</a>
                        <ul>
                            <li><a href="category.html">Full Width Banner</a></li>
                            <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                            <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                            <li><a href="https://www.portotheme.com/html/porto_ecommerce/category-sidebar-left.html">Left Sidebar</a></li>
                            <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                            <li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
                            <li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
                            <li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
                            <li><a href="#">List Types</a></li>
                            <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll<span
                                        class="tip tip-new">New</span></a></li>
                            <li><a href="category.html">3 Columns Products</a></li>
                            <li><a href="category-4col.html">4 Columns Products</a></li>
                            <li><a href="category-5col.html">5 Columns Products</a></li>
                            <li><a href="category-6col.html">6 Columns Products</a></li>
                            <li><a href="category-7col.html">7 Columns Products</a></li>
                            <li><a href="category-8col.html">8 Columns Products</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="demo1-product.html" class="sf-with-ul"><i class="sicon-basket"></i>Products</a>
                        <ul>
                            <li>
                                <a href="#" class="nolink">PRODUCT PAGES</a>
                                <ul>
                                    <li><a href="product.html">SIMPLE PRODUCT</a></li>
                                    <li><a href="product-variable.html">VARIABLE PRODUCT</a></li>
                                    <li><a href="product.html">SALE PRODUCT</a></li>
                                    <li><a href="product.html">FEATURED & ON SALE</a></li>
                                    <li><a href="product-sticky-info.html">WIDTH CUSTOM TAB</a></li>
                                    <li><a href="product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
                                    <li><a href="product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
                                    <li><a href="product-addcart-sticky.html">ADD CART STICKY</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                                <ul>
                                    <li><a href="product-extended-layout.html">EXTENDED LAYOUT</a></li>
                                    <li><a href="product-grid-layout.html">GRID IMAGE</a></li>
                                    <li><a href="product-full-width.html">FULL WIDTH LAYOUT</a></li>
                                    <li><a href="product-sticky-info.html">STICKY INFO</a></li>
                                    <li><a href="product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
                                    <li><a href="product-transparent-image.html">TRANSPARENT IMAGE</a></li>
                                    <li><a href="product-center-vertical.html">CENTER VERTICAL</a></li>
                                    <li><a href="#">BUILD YOUR OWN</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                    <li>
                        <a href="#" class="sf-with-ul"><i class="sicon-envelope"></i>Pages</a>
                        <ul>
                            <li>
                                <a href="wishlist.html">Wishlist</a>
                            </li>
                            <li>
                                <a href="cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="checkout.html">Checkout</a>
                            </li>
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="forgot-password.html">Forgot Password</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="blog.html"><i class="sicon-book-open"></i>Blog</a></li>
                    <li><a href="demo1-about.html"><i class="sicon-users"></i>About Us</a></li>
                </ul>

                <ul class="mobile-menu menu-with-icon mt-2 mb-2">
                    <li class="border-0">
                        <a href="#" target="_blank"><i class="sicon-star"></i>Buy Porto!<span
                                class="tip tip-hot">Hot</span></a>
                    </li>
                </ul>

                <ul class="mobile-menu">
                    <li><a href="login.html">My Account</a></li>
                    <li><a href="demo1-contact.html">Contact Us</a></li>
                    <li><a href="wishlist.html">My Wishlist</a></li>
                    <li><a href="#">Site Map</a></li>
                    <li><a href="#">Reg&iacute;strate</a></li>
                    <li><a href="#" class="login-link">Ingresar</a></li>
                </ul>
            </nav>
            <!-- <form class="search-wrapper mb-2" action="#">
                <input type="text" class="form-control mb-0" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form> -->

            <div class="social-icons">
                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
                </a>
                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
                </a>
                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
                </a>
            </div>
        </div>
    </div>
    <!-- End .mobile-menu-container -->

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
        <div class="sticky-info">
            <a href="#" class=""><i class="icon-user-2"></i>Mi Cuenta</a>
        </div>
        <!-- <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">3</span>
                </i>Cart
            </a>
        </div> -->
    </div>

    <!--<div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url(assets/images/newsletter_popup_bg.jpg)">
        <div class="newsletter-popup-content">
            <img src="assets/images/logo.png" width="111" height="44" alt="Logo" class="logo-newsletter">
            <h2>Subscribe to newsletter</h2>
            <p>Subscribe to the Porto mailing list to receive updates on new arrivals, special offers and our promotions.</p>
            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
            <div class="newsletter-subscribe">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                    <label for="show-again" class="custom-control-label">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div>
        <button title="Close (Esc)" type="button" class="mfp-close">
            ×
        </button>
    </div> -->
    <!-- End .newsletter-popup -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
	
	<script>
	$(document).ready(function(){
  $('#buscador').keyup(function(){
     var nombres = $('.nombres');
     var buscando = $(this).val();
     var item='';
     for( var i = 0; i < nombres.length; i++ ){
         item = $(nombres[i]).html().toLowerCase();
          for(var x = 0; x < item.length; x++ ){
              if( buscando.length == 0 || item.indexOf( buscando ) > -1 ){
                  $(nombres[i]).parents('.item').show(); 
              }else{
                   $(nombres[i]).parents('.item').hide();
              }
          }
     }
  });
});
	</script>
	<?php //if(isset($_POST['busca'])) { 
	//$key1 = $_POST['q'];
	?>
	<script>
		$(function(){
			
			$("#q").keypress(function(e) {
    if(e.which == 13) {
      e.preventDefault();
      load(page)
    }
  });
			
		$("#loader").fadeOut(); //ocultamos div
		$('#busca').on('click', function (T){ 
			$("#outer_div").empty ();//limpiamos div
			//oculta
		divb = document.getElementById('muestra');
        divb.style.display = 'none';
			
		//var anios = 30;
		//alert("hola "+anios+" f");
      $(document).ready(function(){
        load(1);
      });
			
			});
			});
			
      function load(page){
		  product = document.getElementById("q").value;
		  proyear = document.getElementById("year").value;
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
          //url : 'busquedainicial.php?data='+product,
		  url : 'busquedainicial.php?data='+product+'&year='+proyear,
          data : parametros,
          beforeSend:function(objeto){
            $("#loader").fadeIn();
          },
          success:function(data){
            $("#loader").fadeOut();
            $("#outer_div").html(data).fadeIn();
          }
        });
      }
    </script>
<?php //} ?>
</body>
</html>