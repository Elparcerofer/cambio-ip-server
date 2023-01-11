<?php

include "./conexion.php";
header('Access-Control-Allow-Origin: http://localhost:4200');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$mysql = new connection();
$conexion = $mysql->getConnection();

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$ip = array();

$empresa = $data['EMP'];

// $empresa = 'CISLEMA';


$statement = $conexion->prepare("CALL obtenerIP(?)");
$statement->bind_param("s",$empresa);

$statement->execute(); 

if($resultSet = $statement->get_result()){
    $result = $resultSet->fetch_all(MYSQLI_ASSOC);
    foreach($result as $data){
    foreach($data as $k => $v)
        $datos[$k] = utf8_encode($v);
        array_push($ip, $datos);
    }
}

echo json_encode($ip, JSON_UNESCAPED_UNICODE);
$statement->close();
$conexion->close();
?>