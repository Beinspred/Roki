<?php


class Router
{
    private static $routeMap = [];

    private static function importHelpers()
    {
        $files = glob(__DIR__ . '/helpers/*');

        foreach ($files as $file) {
            include_once $file;
        }
    }

    public static function run()
    {
        require_once __DIR__ . '/routes.php';

        self::importHelpers();

        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $routes = self::$routeMap[$httpMethod];

        $requestUri = $_SERVER['REQUEST_URI'];

        foreach ($routes as $uriRegex => $routeDefinition) {
            if (!preg_match("/{$uriRegex}/", $requestUri, $matches)) {
                continue;
            }

            $controllerName = $routeDefinition[0];
            $metodName = $routeDefinition[1];

            $paramNames = array_slice($routeDefinition, 2);
            $paramValues = array_slice($matches, 1);

            $params = array_combine($paramNames, $paramValues);

            $controllerFile = "../src/Controller/" . $controllerName . ".php";

            if (!file_exists($controllerFile)) {
                die("Nepostoji file controler");
            }

            require_once($controllerFile);

            $controllerObject = new $controllerName();

            if(!method_exists($controllerObject, $metodName)){
                die("Nepostoji method");
            }

            $reflection = new ReflectionMethod($controllerName, $metodName);

            // dependency injectinon preparation logic
            $parameters = [];

            foreach ($reflection->getParameters() as $parameter) {
                if ($parameter->getType() !== null && class_exists($parameter->getType()->__toString())) {
                    // todo handle dependency injection
                    $parameters[] = null;

                    continue;
                }

                if (!array_key_exists($parameter->getName(), $params)) {
                    if (!$parameter->isOptional()) {
                        die("Nema parametra {$parameter->getName()}");
                    }

                    $parameters[] = $parameter->getDefaultValue();

                    continue;
                }

                $parameters[] = $params[$parameter->getName()];

            }

            echo $controllerObject->$metodName(...$parameters);
            die;
        }

        die('no route found');
    }

    private static function addRoute($httpMethod, $url, $controller, $method)
    {
        list($url, $paramNames) = self::pickUriRegex($url);
        self::$routeMap[$httpMethod][$url] = array_merge([$controller, $method], $paramNames);
    }

    private static function pickUriRegex($uri)
    {
        $uri = preg_quote($uri, '/');
        $uri = str_replace(['\\{', '\\}'], ['{', '}'], $uri);

        if (!preg_match_all('/{([^\/]+)}/', $uri, $matches)) {
            return [
                $uri, []
            ];
        }

        return [
            preg_replace('/{[^\/]+}/', '([^\/]+)', $uri),
            $matches[1]
        ];
    }

    public static function get($url, $controller, $method)
    {
        self::addRoute('GET', $url, $controller, $method);
    }

    public static function post($url, $controller, $method)
    {
        self::addRoute('POST', $url, $controller, $method);
    }

    /**
     * @deprecated
     */
    public static function oldRun()
    {
//    MVC OOP
        //Rasclanivanje URI
        $requestUri = $_SERVER['REQUEST_URI'];
        //reguest uri mogu biti get i post
        $requestUri = trim($requestUri, "/");
//        var_dump($requestUri);

        $explodeUri = explode("/", $requestUri);
//        print_r($explodeUri);

        //Trazimo kontroler u url
        //prvi korak veliko slovo
        $controllerName = ucfirst($explodeUri[0]) ?: 'Index';
//        print_r($controllerName);

        //Dodajemo nastavak controller
        $controllerName .= "Controller";
/*        print_r($controllerName);*/

        //napraviti varijablu controllera
        $controllerFile = "../src/Controller/" . $controllerName . ".php";

        //provjeriti da li postoji u file sistemu

        if (!file_exists($controllerFile)) {

            die("Nepostoji file controler");
        }

        require_once($controllerFile);

        //instaciranje objekta Controller
        $controllerObject = new $controllerName();
//        var_dump($controllerObject);

        //ekstraktovanje metode
        $metodName = ucfirst($explodeUri[1]);

        if (empty($metodName)) {
            $metodName = 'Index';
        }

//        var_dump($metodName); die;

        //Trazimo kljuc pod je HTTP metod *get ili post kita
//        print_r($_SERVER['REQUEST_METHOD']);

        //Http metod stavimo da budu mala slova i ispred metoda
        $httpMetod = strtolower($_SERVER['REQUEST_METHOD']);
//        print_r($httpMetod);

        $metodName = $httpMetod . $metodName;
//        print_r($metodName);

        //Provjera da li metod postoji u Controleru

        if(!method_exists($controllerObject, $metodName)){
            die("Nepostoji method");
        }

        //Pozivamo metodu kontrolera na osnovu zadatog url-a
        echo $controllerObject->$metodName(...array_slice($explodeUri, 2));
    }
}