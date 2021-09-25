<?php


class RokiRouter
{
    public static function run()
    {
        $requestMethod = strtolower($_SERVER['REQUEST_METHOD']); // from GET to get

        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // from /product?test=123 gives /product

        $pathSequences = trim($path, '/'); // getting rid of starting slash from /product to /product
        $pathSequences = explode('/', $pathSequences); // from product/update gives an array ['product', 'update']

        // returns the first item from array and param appears without returned item
        // on given ['product', 'update'], it returns 'product' and the param is ['update']
        $controllerName = array_shift($pathSequences);
        $actionName = array_shift($pathSequences);

        if (!$controllerName) {
            $controllerName = 'index';
        }

        $controllerClassName = ucfirst($controllerName) . 'Controller';
        $controllerPath = __DIR__ . '/Controller/' . $controllerClassName . '.php';

        if (!file_exists($controllerPath)) {
            die('no controller');
        }

        require_once $controllerPath;

        $controller = new $controllerClassName();

        if (!$actionName) {
            $actionName = 'index'; //default method
        } else {
            $actionName = $requestMethod . ucfirst($actionName);
        }

        if (!method_exists($controller, $actionName)) {
            die('no method');
        }

        echo call_user_func_array([$controller, $actionName], $pathSequences);
    }
}
