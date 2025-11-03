<?php

class Kernel
{

    private array $request;
    private ControllerInterface $controller;
    private string $method;
    private int|null $id;


    private function loadRequest()
    {
        $this->request =explode('/',$_SERVER['REQUEST_URI']) ;
    }

    private function loadController()
    {

        $controllerName = ucfirst($this->request[1].'Controller')  ;
        if (file_exists("../src/Controller/".$controllerName.".php")){
            $this->controller = new $controllerName;

    }else{
            $this->controller = new PageNotFoundController();
        }
    }

    private function loadMethod()
    {
        $reflection = new ReflectionClass($this->controller);
        if ($reflection->hasMethod($this->request[2])){
            $this->method = $this->request[2];
        }else{
            $this->controller = new PageNotFoundController();
            $this->method = 'showall';

        }
        
    }

    private function loadId()
    {
        $this->id = $this->request[3] ?? null;
    }

    public function loadApp()
    {
        $this->loadRequest();
        $this->loadController();
        $this->loadMethod();
        $this->loadId();
        call_user_func_array([$this->controller, $this->method],[$this->id]);
    }

}