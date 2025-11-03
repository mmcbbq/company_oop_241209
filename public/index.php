<?php
include '../config/loader.php';
$kernel = new Kernel();
$kernel->loadApp();

$request =explode('/',$_SERVER['REQUEST_URI']) ;
$entity = $request[1] ?? null;
$method = $request[2] ?? null;
$id = $request[3] ?? null;
$controllerName = ucfirst($entity.'Controller')  ;
if (file_exists("../src/Controller/".$controllerName.".php")){
    $controller = new $controllerName;
    $reflection = new ReflectionClass($controller);
    if ($reflection->hasMethod($method)){
        call_user_func_array([$controller, $method],[$id]);
    }else{
        http_response_code(404);
        echo "Doe methode gibt es nicht";

    }


}else{
    http_response_code(404);
    echo "Das geht nicht";


}



