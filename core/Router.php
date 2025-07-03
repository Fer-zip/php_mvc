<?php

class Router {
    public function route() {
        $url = isset($_GET['url']) ? explode('/', rtrim($_GET['url'], '/')) : [];

        $controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'HomeController';
        $method = isset($url[1]) ? $url[1] : 'index';
        $params = array_slice($url, 2);

        if (class_exists($controllerName)) {
            $controller = new $controllerName();

            if (method_exists($controller, $method)) {
                call_user_func_array([$controller, $method], $params);
                return;
            }
        }

        // Si no existe, cargar página 404
        require_once 'app/views/404.php';
    }
}
?>