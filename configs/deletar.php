<?php
session_start();
global $conn;
include_once "conexao.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM contactos WHERE id = '{$id}'";

if(mysqli_query($conn,$sql)){
    header("location: ../home.php?sucesso");
}else {
    header("location: ../home.php?Erro");
}