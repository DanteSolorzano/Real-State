<?php 

namespace Controllers;
use MVC\Router;

class PropertyController {

                                //pasa la referencia del router ya creado en index
    public static function index(Router $router) {

        $router->render('properties/admin');
    }

    public static function create() {
        echo "create";
    }

    public static function update() {
        echo "update";
    }


}