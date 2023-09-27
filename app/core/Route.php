<?php


namespace app\core;


class Route
{
    static public function init()
    {
        $controllerName = 'index';
        $action = 'index';
        $urlPath = $_SERVER['REQUEST_URI'];
        $urlComponents = explode('/', $urlPath);
        array_shift($urlComponents);
        if (count($urlComponents) > 2) {
            //if url have more then 2 components delete redundant
            $urlComponents = array_slice($urlComponents, 0, 2);
            $redirectUrl = '/' . implode('/', $urlComponents);
            self::redirect($redirectUrl);
        }
        if (!empty($urlComponents[0])) {
            $controllerName = strtolower($urlComponents[0]);
        }
        if (!empty($urlComponents[1])) {
            $action = strtolower($urlComponents[1]);
        }
        $controllerClass = '\app\controllers\\' . ucfirst($controllerName) . 'Controller';
        if(!class_exists($controllerClass)){
            Log::info($controllerClass.' not found');
            self::notFound();
        }
        $controller = new $controllerClass();
        if(!method_exists($controller, $action)){
            Log::info($controllerClass.' with action '.$action.' not found');
            self::notFound();
        }
        self::call($controller, $action);
    }

    static public function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }

    static public function notFound(){
        http_response_code(404);
        exit();
    }

    static private function call(controllerable $controller, $action){
        $controller->$action();
    }
}