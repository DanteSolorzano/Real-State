<?php

function connectionDb() : mysqli{
    $db = mysqli_connect('localhost', 'root', 'rootroot', 'realstate_crud');

    if(!$db){
        echo "It cannot connect to the database"; 
        exit;
    }

    return $db;
}