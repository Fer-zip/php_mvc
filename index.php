<?php

require_once 'config/config.php';
require_once 'core/Router.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';
require_once 'core/Database.php';

// Autocargar controladores y modelos
spl_autoload_register(function ($class) {
    if (file_exists("app/controllers/$class.php")) {
        require_once "app/controllers/$class.php";
    } elseif (file_exists("app/models/$class.php")) {
        require_once "app/models/$class.php";
    }
});

// Ejecutar router
$router = new Router();
$router->route();
