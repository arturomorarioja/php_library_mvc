<?php

namespace Core;

class Router
{
    protected array $routes = [];
    protected array $params = [];

    public function __get(string $property): array|bool
    {
        switch ($property) {
            case 'routes':
            case 'params':
                return $this->$property;
            default:
                return false;
        }
    }

    public function add(string $route, array $params): void
    {
        if (!isset($params['method'])) {
            $params['method'] = 'GET';
        }
        $this->routes[$route] = $params;
    }

    public function match(string $url, string $method): bool
    {
        // If the URL ends in an ID, it is extracted
        $parts = explode('/', $url);
        $lastPart = end($parts);
        if (is_numeric($lastPart)) {
            $id = $lastPart;
            $url = substr($url, 0, strlen($url) - (strlen($lastPart) + 1));
        } else {
            $id = 0;
        }

        // Not only the route, but also the HTTP method, must match
        if (isset($this->routes[$url]) && $this->routes[$url]['method'] === $method) {
            $this->params = $this->routes[$url];
            if ($id !== 0) {
                $this->params['id'] = $id;
            }
            return true;
        }
        return false;
    }

    /**
     * Calls the controller corresponding to the URL it receives 
     * as a parameter to show the corresponding page
     */
    public function dispatch(string $url, string $method): bool|string
    {
        $url = $this->removeQueryStringVariables($url);
        if ($this->match($url, $method)) {
            $controller = $this->params['controller'];
            $controller = "App\Controllers\\$controller";

            if (class_exists($controller)) {
                $controllerInstance = new $controller($this->params);                
                $action = $this->params['action'];

                if (is_callable([$controllerInstance, $action])) {
                    $controllerInstance->$action();
                    return true;
                } else {
                    throw new \Exception("Method $action in controller $controller not found");
                }
            } else {
                throw new \Exception("Controller class $controller not found");
            }
        } else {
            throw new \Exception("URL $url not found", 404);
        }
    }

    protected function removeQueryStringVariables(string $url): string
    {
        // Notice that PHP replaces "?" by "&" 
        // when receiving the URL via $_SERVER['QUERY_STRING'] 
        $parts = explode('&', $url, 2);
        $url = strpos($parts[0], '=') ? '' : $parts[0];
        return $url;
    }
}