<?php

function connectionDb() : mysqli {
    // 1. Intentamos leer las variables de entorno (Nube)
    // 2. Si no existen (?:), usamos tus credenciales locales (Localhost)
    
    $host = getenv('DB_HOST') ?: 'localhost';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASSWORD') ?: 'rootroot'; 
    $name = getenv('DB_NAME') ?: 'realstate_crud';
    $port = getenv('DB_PORT') ?: 3306; // El puerto estándar de MySQL

    // Creamos la conexión con las variables dinámicas
    $db =new mysqli($host, $user, $pass, $name, $port);

    if(!$db){
        echo "It cannot connect to the database"; 
        // Tip Pro: Muestra el error real solo si estás debuggeando, 
        // pero cuidado con mostrarlo en producción.
        exit;
    }

    // Tip Extra: Configura utf8 para que se vean bien los acentos y las 'ñ'
    mysqli_set_charset($db, 'utf8');

    return $db;
}