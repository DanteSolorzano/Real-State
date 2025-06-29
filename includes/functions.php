<?php

require 'app.php';

function includeTemplates( string $name, bool $home = false ){
    include TEMPLATES_URL . "/{$name}.php";
}

function isAuthenticated() : bool {
    session_start();

    $auth = $_SESSION['login'];
    if($auth){
        return true;
    }
    return false;

} 