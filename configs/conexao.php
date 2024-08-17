<?php

$server_name = "localhost";
$user_name = "root";
$user_password = "";
$db_name = "contactos";

$conn = mysqli_connect($server_name, $user_name, $user_password, $db_name );

if(mysqli_connect_error()){
    echo "Falha na conexão: " . mysqli_connect_error();
}
