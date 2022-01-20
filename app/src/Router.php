<?php


class Router
{
    public static function run()
    {
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