<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {
    
    public static function login(Router $router) {

        $errors = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new Admin($_POST);
            $errors = $auth->validate();

            if(empty($errors)) {
                $result = $auth->userExist();

                if(!$result) {
                    // Verify user
                    $errors = Admin::getErrors();
                } else {
                    // Verify password (corregido: se quitó la llave extra al final)
                    $authenticated = $auth->verifyPassword($result);

                    if($authenticated) {
                        // Auth user
                        $auth->authenticate();
                    } else {
                        // Password incorrecta
                        $errors = Admin::getErrors();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errors' => $errors
        ]);
    }

    public static function logout() {
        session_start();

        $_SESSION = [];

        header('Location: /');
    }
}