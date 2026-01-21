<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');

function includeTemplates( string $name, bool $home = false ){
    include TEMPLATES_URL . "/{$name}.php";
}

function isAuthenticated() {
    session_start();

    if($_SESSION['login']){
        header('Location: /');
    }

}

function debugger($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}