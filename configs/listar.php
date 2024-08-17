<?php

session_start();
global $conn;
include_once "conexao.php";

$sql = mysqli_query($conn,"SELECT * FROM contactos WHERE usuario_id = '{$_SESSION['usuario_id']}'");
$mostrar = "";

if(mysqli_num_rows($sql) < 1){
    $mostrar .= '
        <tr>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
        </tr>
    ';
}elseif(mysqli_num_rows($sql) > 0){
    include "contactos.php";
}

echo $mostrar;