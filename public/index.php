<?php
include '../config/loader.php';


$request =explode('/',$_SERVER['REQUEST_URI']) ;
$entity = $request[1] ?? null;
$method = $request[2] ?? null;
$id = $request[3] ?? null;
$controller =$entity.'Controller';
if (file_exists("../src/Controller/".$controller.".php")){
    $controller = new ($entity.'Controller');







}else{
    http_response_code(404);
    echo "Das geht nicht";


}



