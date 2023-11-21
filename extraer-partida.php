<?php
require 'conex/inibd.php';

// Número de registros recuperados
$numberofrecords = 5;

if(!isset($_POST['searchTerm'])){

   // Obtener registros a tarves de la consulta SQL
   //$stmt = $conexpg->prepare("SELECT * FROM productos ORDER BY partida_desc LIMIT :limit");
   $stmt = $conexpg->prepare("SELECT partida_nandi, concat(partida_nandi,' - ',substring(partida_desc,1,50)) as partida_desc FROM productos WHERE origen_expor='SI' ORDER BY partida_desc LIMIT :limit");
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   $lista_productos = $stmt->fetchAll();

}else{

   $search = $_POST['searchTerm'];// Search text

   // Mostrar resultados
   //$stmt = $conexpg->prepare("SELECT * FROM productos WHERE partida_desc like :partida_desc ORDER BY partida_desc LIMIT :limit");
   $stmt = $conexpg->prepare("SELECT partida_nandi, concat(partida_nandi,' - ',substring(partida_desc,1,50)) as partida_desc FROM productos WHERE concat(partida_nandi,' - ',substring(partida_desc,1,50)) like :partida_desc AND origen_expor='SI' ORDER BY partida_desc LIMIT :limit");
   //$stmt->bindValue(':partida_desc', '%'.$search.'%', PDO::PARAM_STR);
   $stmt->bindValue(':partida_desc', '%'.$search.'%', PDO::PARAM_STR);
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   //Variable en array para ser procesado en el ciclo foreach
   $lista_productos = $stmt->fetchAll();

}

$response = array();

// Leer los datos de MySQL
foreach($lista_productos as $pro){
   $response[] = array(
      "id" => $pro['partida_nandi'],
     // "text" => $pro['partida_desc'].' - '.$pro['partida_nandi']
	   "text" => $pro['partida_desc']
   );
}

echo json_encode($response);
exit();
?>