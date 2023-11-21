<?php
require 'conex/inibd.php';

// Número de registros recuperados
$numberofrecords = 5;

if(!isset($_POST['searchTerm'])){

   // Obtener registros a tarves de la consulta SQL
   $stmt = $conexpg->prepare("SELECT * FROM paises ORDER BY espanol LIMIT :limit");
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   $lista_productos = $stmt->fetchAll();

}else{

   $search = $_POST['searchTerm'];// Search text

   // Mostrar resultados
   $stmt = $conexpg->prepare("SELECT * FROM paises WHERE espanol like :espanol ORDER BY espanol LIMIT :limit");
   $stmt->bindValue(':espanol', '%'.$search.'%', PDO::PARAM_STR);
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   //Variable en array para ser procesado en el ciclo foreach
   $lista_productos = $stmt->fetchAll();

}

$response = array();

// Leer los datos de MySQL
foreach($lista_productos as $pro){
   $response[] = array(
      "id" => $pro['idpaises'],
      "text" => $pro['espanol']
   );
}

echo json_encode($response);
exit();
?>