<?php
require 'conex/inibd.php';

// Número de registros recuperados
$numberofrecords = 5;

if(!isset($_POST['searchTerm'])){

   // Obtener registros a tarves de la consulta SQL
   $stmt = $conexpg->prepare("SELECT CONCAT(dnombre,libr_tribu) as DNOMBRE1, CONCAT(dnombre,' - ',libr_tribu) as DNOMBRE2 FROM GranResumenImport_PowerBI GROUP BY DNOMBRE1, DNOMBRE2 ORDER BY DNOMBRE2 LIMIT :limit");
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   $lista_productos = $stmt->fetchAll();

}else{

   $search = $_POST['searchTerm'];// Search text

   // Mostrar resultados
   $stmt = $conexpg->prepare("SELECT CONCAT(dnombre,libr_tribu) as DNOMBRE1, CONCAT(dnombre,' - ',libr_tribu) as DNOMBRE2 FROM GranResumenImport_PowerBI WHERE concat(dnombre,libr_tribu) like :DNOMBRE1 GROUP BY DNOMBRE1, DNOMBRE2 ORDER BY DNOMBRE2 LIMIT :limit");
   $stmt->bindValue(':DNOMBRE1', '%'.$search.'%', PDO::PARAM_STR);
   $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
   $stmt->execute();
   //Variable en array para ser procesado en el ciclo foreach
   $lista_productos = $stmt->fetchAll();

}

$response = array();

// Leer los datos de MySQL
foreach($lista_productos as $pro){
   $response[] = array(
      "id" => $pro['DNOMBRE1'],
      "text" => $pro['DNOMBRE2']
	   //"text" => $pro['DNOMBRE2'].' - '.$pro['NDOC']
   );
}

echo json_encode($response);
exit();
?>