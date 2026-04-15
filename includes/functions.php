<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('IMAGES_FILE', __DIR__ . '/../images/');

function includeTemplates( string $name, bool $home = false ){
    include TEMPLATES_URL . "/{$name}.php";
}

function isAuthenticated() {
    session_start();

    $auth = $_SESSION['login'] ?? false;

    return $auth;
}

function debugger($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Scape // sanitize html
function s($html) : string{
    $s = htmlspecialchars($html);
    return $s;
}

//validate type of contentc
function validateTypeOfContent($type){
    $types = ['seller', 'propertie'];

    return in_array($type, $types);
}

//show the messages
function showMessage($code){
    $message = '';

    switch($code){
        case 1: 
            $message = 'Created successfully.';
            break;
         case 2: 
            $message = 'Updated successfully.';
            break;
         case 3: 
            $message = 'Deleted successfully.';
            break;
        default:
            $messsage = false;
            break;
    }
    return $message;
}