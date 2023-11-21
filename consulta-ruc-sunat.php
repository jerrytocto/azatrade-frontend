<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Azatrade - Extraendo Datos de Sunat</title>
	<link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body style="background-color: #FFFFFF;">
	<center><a href="./"><img src="assets/images/logo_aza.png" width="360px"></a></center> <br><br>
	<div class="row">
	<div class="col-lg-1"></div>
		<div class="col-lg-4">
	<?php
	$dato1 = $_GET["dat"];
// Datos
$token = 'apis-token-3761.Yw35Vs-h-2tho8ldpdiwA-A0Q7DU82xL';
///$ruc = '20605041419';
$ruc = $dato1;

// Iniciar llamada a API
$curl = curl_init();

// Buscar ruc sunat
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.apis.net.pe/v1/ruc?numero=' . $ruc,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Referer: http://apis.net.pe/api-ruc',
    'Authorization: Bearer ' . $token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// Datos de empresas según padron reducido
$empresa = json_decode($response);
//var_dump($empresa);
echo "<p>";
echo "<br><b>Razon Social</b>: ".$empresa->nombre."<br>";
echo "<b>Numero Docuemnto</b>: ".$empresa->numeroDocumento."<br>";
echo "<b>Estado</b>: ".$empresa->estado."<br>";
echo "<b>Condicion</b>: ".$empresa->condicion."<br>";
echo "<b>Direccion</b>: ".$empresa->direccion."<br>";
echo "<b>Ubigeo</b>: ".$empresa->ubigeo."<br>";
echo "<b>Via Tipo:</b>: ".$empresa->viaTipo."<br>";
echo "<b>Via Nombre</b>: ".$empresa->viaNombre."<br>";
echo "<b>Codigo Zona</b>: ".$empresa->zonaCodigo."<br>";
echo "<b>Tipo Zona</b>: ".$empresa->zonaTipo."<br>";
echo "<b>Numero</b>: ".$empresa->numero."<br>";
echo "<b>Interior</b>: ".$empresa->interior."<br>";
echo "<b>Lote</b>: ".$empresa->lote."<br>";
echo "<b>Dpto</b>: ".$empresa->dpto."<br>";
echo "<b>Manzana</b>: ".$empresa->manzana."<br>";
echo "<b>Kilometro</b>: ".$empresa->kilometro."<br>";
echo "<b>Distrito</b>: ".$empresa->distrito."<br>";
echo "<b>Provincia</b>: ".$empresa->provincia."<br>";
echo "<b>Departamento</b>: ".$empresa->departamento."<br>";
echo "</p>";
?>
	</div>
		<div class="col-lg-5">
			<p>Solicite su evaluaci&oacute;n de riesgo <b>USD 20</b>. Consiste en un reporte con la calificaci&oacute;n de la empresa en el sistema financiero peruano, con el detalle de sus deudas. </p>
			<p>
			<!--<iframe src="https://docs.google.com/gview?url=MODELO-REPORTE.pdf&embedded=true" style="width:100%; height:700px;" frameborder="0" ></iframe> -->
		   <embed src="MODELO-REPORTE.pdf" type="application/pdf" style="width:100%; height:700px;" frameborder="0"  /><br>
			</p>
		</div>
		<div class="col-lg-1"></div>
	</div>
</body>
</html>