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
	
	<style>
	/*.css-inputxt {
     padding: 6px;
     font-size: 17px;
     border-width: 1px;
     border-color: #CCCCCC;
     background-color: #FFFFFF;
     color: #000000;
     border-style: solid;
     border-radius: 15px;
     box-shadow: 0px 0px 7px rgba(7,47,186,.85);
     text-shadow: -50px 0px 30px rgba(66,66,66,.75);
}
 .css-inputxt:focus {
     outline:none;
} */
	</style>


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
<?php include("menu-superior.php"); ?>
<?php include("menu-flotante.php"); ?>
        </header>

        <main class="main home">
			<h3><center>B&uacute;squeda Avanzada</center></h3>
            <div class="container mb-2">
				
				<form>
				<div class="row">
					<div class="col-lg-3">
      <label for="">Año</label>
      <select id="" class="form-control">
        <option value="2023" selected="selected">2023</option>
	    <option value="2022">2022</option>
		<option value="2021">2021</option>
		<option value="2020">2020</option>
		<option value="2019">2019</option>
	    <option value="2018">2018</option>
      </select>
    </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>First name
                                                    <abbr class="required" title="Campo Obligarotio">*</abbr>
                                                </label>
                                                <input type="text" class="form-control" required />
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Last name
                                                    <abbr class="required" title="Campo Obligarotio">*</abbr></label>
                                                <input type="text" class="form-control" required />
                                            </div>
                                        </div>
					
					<div class="col-md-3">
					<div class="select-custom">
                                        <label>State / County <abbr class="required" title="Campo Obligatorio">*</abbr></label>
                                        <select name="orderby" class="form-control">
                                            <option value="" selected="selected">NY</option>
                                            <option value="1">Brunei</option>
                                            <option value="2">Bulgaria</option>
                                            <option value="3">Burkina Faso</option>
                                            <option value="4">Burundi</option>
                                            <option value="5">Cameroon</option>
                                        </select>
                                    </div>
						</div>
					
                                    </div>
				</form>
				
                <div class="row">
					
					<!-- <div class="col-lg-12"> -->
						
<div class="form-row">
	<div class="col-lg-1">
      <label for="">Año</label>
      <select id="" class="form-control css-inputxt">
        <option value="2023" selected="selected">2023</option>
	    <option value="2022">2022</option>
		<option value="2021">2021</option>
		<option value="2020">2020</option>
		<option value="2019">2019</option>
	    <option value="2018">2018</option>
      </select>
    </div>
	<div class="col-lg-2">
      <label for="">Mes</label><br>
      <select id="" class="form-control css-inputxt">
        <option value="01" selected="selected">Enero</option>
											<option value="02">Febrero</option>
											<option value="03">Marzo</option>
											<option value="04">Abril</option>
											<option value="05">Mayo</option>
											<option value="06">Junio</option>
											<option value="07">Julio</option>
											<option value="08">Agosto</option>
											<option value="09">Septiembre</option>
											<option value="10">Octubre</option>
											<option value="11">Noviembre</option>
											<option value="12">Diciembre</option>
      </select>
    </div>
	<div class="col-lg-2">
      <label for="">Aduanas</label>
      <select id="" class="form-control css-inputxt">
        <option value="xxxx" selected="selected">xxxxxxxxxx xxxxx</option>
											<option value="xx">xxxxxxxx xxxxx</option>
											<option value="xxx">xxxxxxxx xxxxx</option>
      </select>
    </div>
	<div class="col-lg-2">
      <label for="">Mercado</label>
      <select id="" class="css-inputxt">
        <option value="xxxx" selected="selected">xxxxxxxxxx xxxxx</option>
											<option value="xx">xxxxxxxx xxxxx</option>
											<option value="xxx">xxxxxxxx xxxxx</option>
      </select>
    </div>
	<div class="col-lg-2">
      <label for="">Departamento</label>
      <select id="" class="css-inputxt">
        <option value="xxxx" selected="selected">xxxxxxxxxx xxxxx</option>
											<option value="xx">xxxxxxxx xxxxx</option>
											<option value="xxx">xxxxxxxx xxxxx</option>
      </select>
    </div>
	<div class="col-lg-2">
      <label for="">Provincia</label>
      <select id="" class="css-inputxt">
        <option value="xxxx" selected="selected">xxxxxxxxxx xxxxx</option>
											<option value="xx">xxxxxxxx xxxxx</option>
											<option value="xxx">xxxxxxxx xxxxx</option>
      </select>
    </div>
	</div>
	
	<div class="row">
		<div class="col-lg-12"></div>
	<div class="col-lg-2">
      <label for="">Distrito</label>
      <select id="" class="css-inputxt">
        <option value="xxxx" selected="selected">xxxxxxxxxx xxxxx</option>
											<option value="xx">xxxxxxxx xxxxx</option>
											<option value="xxx">xxxxxxxx xxxxx</option>
      </select>
    </div>
	
  <!--<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>-->
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
						
					<!-- <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="css-inputxt" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="css-inputxt" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="" style="border-radius: 50px/60px;" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="" style="border-radius: 50px/60px;" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="" style="border-radius: 50px/60px;" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="" style="border-radius: 50px/60px;">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="" style="border-radius: 50px/60px;" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button> -->
					
					<!-- </div> -->
					
                    <!-- <div class="col-lg-2">
                                    <label>Año:</label>
                                        <select name="orderby" class="form-control">
											<option value="2023" selected="selected">2023</option>
											<option value="2022">2022</option>
											<option value="2021">2021</option>
											<option value="2020">2020</option>
											<option value="2019">2019</option>
											<option value="2018">2018</option>
										</select>
						</div>
							<div class="col-lg-2">
                                    <label>Mes:</label>
                                        <select name="orderby" class="">
											<option value="01" selected="selected">Enero</option>
											<option value="02">Febrero</option>
											<option value="03">Marzo</option>
											<option value="04">Abril</option>
											<option value="05">Mayo</option>
											<option value="06">Junio</option>
											<option value="07">Julio</option>
											<option value="08">Agosto</option>
											<option value="09">Septiembre</option>
											<option value="10">Octubre</option>
											<option value="11">Noviembre</option>
											<option value="12">Diciembre</option>
										</select>
							</div>
							<div class="col-lg-3">
                                    <label>Aduana:</label>
                                        <select name="orderby" class="">
											<option value="xxxx" selected="selected">xxxxx</option>
											<option value="xx">xxx</option>
											<option value="xxx">xxx</option>
										</select>
							
						
                    </div>
					<div class="col-lg-3">
                                    <label>Mercado:</label>
                                        <select name="orderby" class="">
											<option value="xxxx" selected="selected">xxxxx</option>
											<option value="xx">xxx</option>
											<option value="xxx">xxx</option>
										</select>
							
						
                    </div>
					<div class="col-lg-3">
                                    <label>Departamento:</label>
                                        <select name="orderby" class="">
											<option value="xxxx" selected="selected">xxxxx</option>
											<option value="xx">xxx</option>
											<option value="xxx">xxx</option>
										</select>
							
						
                    </div>
					<div class="col-lg-3">
                                    <label>Provincia:</label>
                                        <select name="orderby" class="">
											<option value="xxxx" selected="selected">xxxxx</option>
											<option value="xx">xxx</option>
											<option value="xxx">xxx</option>
										</select>
							
						
                    </div>
					<div class="col-lg-3">
                                    <label>Distrito:</label>
                                        <select name="orderby" class="">
											<option value="xxxx" selected="selected">xxxxx</option>
											<option value="xx">xxx</option>
											<option value="xxx">xxx</option>
										</select>
							
						
                    </div>
					<div class="col-lg-3">
                                    <label>Empresa:</label>
                                        <select name="orderby" class="">
											<option value="xxxx" selected="selected">xxxxx</option>
											<option value="xx">xxx</option>
											<option value="xxx">xxx</option>
										</select>
							
						
                    </div>
					<div class="col-lg-3">
                                    <label>Tipo Sector:</label>
                                        <select name="orderby" class="">
											<option value="xxxx" selected="selected">xxxxx</option>
											<option value="xx">xxx</option>
											<option value="xxx">xxx</option>
										</select>
							
						
                    </div>
					<div class="col-lg-3">
                                    <label>Sector:</label>
                                        <select name="orderby" class="">
											<option value="xxxx" selected="selected">xxxxx</option>
											<option value="xx">xxx</option>
											<option value="xxx">xxx</option>
										</select>
							
						
                    </div>
					<div class="col-lg-3">
                                    <label>Partida:</label>
                                        <select name="orderby" class="">
											<option value="xxxx" selected="selected">xxxxx</option>
											<option value="xx">xxx</option>
											<option value="xxx">xxx</option>
										</select>
							
						
                    </div>
					<div class="col-lg-3">
                                    <label>Descripci&oacute;n Comercial:</label>
                                        <select name="orderby" class="">
											<option value="xxxx" selected="selected">xxxxx</option>
											<option value="xx">xxx</option>
											<option value="xxx">xxx</option>
										</select>
							
						
                    </div> -->
                    <!-- End .col-lg-9 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->
        </main>
        <!-- End .main -->

        <?php include("footer.php"); ?>
    </div>
    <!-- End .page-wrapper -->

<?php include("menu-movil.php"); ?>
<?php include("menu-pie.php"); ?>

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
	
</body>
</html>