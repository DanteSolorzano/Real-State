<!-- <?php

//import the connection
require 'includes/config/database.php';
$db = connectionDb();
//create an email
$email = "correo@correo.com";
$password = "admin";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//query
$query = "INSERT INTO users (email, password) VALUES ( '{$email}', '{$passwordHash}');";

//add to the database
mysqli_query($db, $query);

?> -->