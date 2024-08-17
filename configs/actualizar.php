<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    session_start();
    global $conn;
    include_once "conexao.php";

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);


    $sql = mysqli_query($conn, "UPDATE contactos SET nome = '{$nome}', email = '{$email}', telefone = '{$telefone}' WHERE id = '{$id}'");

    if($sql){
        echo "sucesso";
    }else {
        echo "Erro ao inserir os dados!";
    }