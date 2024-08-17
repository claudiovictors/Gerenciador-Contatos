<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    global $conn;
    include_once "conexao.php";

    $nome = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = mysqli_query($conn, "SELECT * FROM contactos WHERE usuario_id = '{$_SESSION['usuario_id']}' AND nome LIKE '%{$nome}%'");
    $mostrar = "";

    if(mysqli_num_rows($sql) > 0){
        include_once "contactos.php";
    }else {
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
    }

    echo $mostrar;