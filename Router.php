<?php

class Router
{
    protected $routes = [];

    public function regRout($method, $uri, $controller)
    {
        $this->routes []= [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    function get($uri, $controller)
    {
        $this->regRout('GET', $uri, $controller);
    }

    function post($uri, $controller)
    {
        $this->regRout('POST', $uri, $controller);
    }

    function put($uri, $controller)
    {
        $this->regRout('PUT', $uri, $controller);
    }

    function delete($uri, $controller)
    {
        $this->regRout('DELETE', $uri, $controller);
    }

    public function error($httpcode = 404){
        http_response_code($httpcode);
        loadView("error/{$httpcode}");
        exit;
    }

    public function route ($uri, $method) {
        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === $method){
                require basePath($route['controller']);
                return;
            }
        }
        $this->error();
    }

}
