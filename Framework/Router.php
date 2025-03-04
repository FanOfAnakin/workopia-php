<?php

namespace Framework;

use App\controllers\ErrorController;

class Router
{
    protected $routes = [];

    public function regRout($method, $uri, $action)
    {
        list($controller, $controllerMethod) = explode('@', $action);
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
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


    public function route($uri)
    {
        $requesMethod = $_SERVER['REQUEST_METHOD'];
        foreach ($this->routes as $route) {

            $uriSegments = explode('/', trim($uri, '/'));

            $routeSegments = explode('/', trim($route['uri'], '/'));

            $match = true;

            if (count($uriSegments) === count($routeSegments) && strtoupper($route['method'] === $requesMethod)) {
                $params = [];

                $match = true;

                for ($i = 0; $i < count($uriSegments); $i++) {
                    if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }

                    if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }

                if ($match) {
                    $controller = 'App\\Controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];

                    $controllerInst = new $controller();
                    $controllerInst->$controllerMethod($params);
                    return;
                }
            }
            // if ($route['uri'] === $uri && $route['method'] === $method) {
            //     $controller = 'App\\Controllers\\' . $route['controller'];
            //     $controllerMethod = $route['controllerMethod'];

            //     $controllerInst = new $controller();
            //     $controllerInst->$controllerMethod();
            //     return;
            // }
        }
        ErrorController::notFound();
    }
}
