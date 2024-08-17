<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
global $conn;
include_once "conexao.php";

$email = mysqli_real_escape_string($conn, $_POST['email']); # Pegando os dados do campo email
$senha = mysqli_real_escape_string($conn, $_POST['senha']); # Pegando os dados do campo senha

if(!empty($email) && !empty($senha)){ # Verificando se os campos estão vázios

    $sql = mysqli_query($conn, "SELECT * FROM lista WHERE email = '{$email}' AND senha = '{$senha}'");

    if(mysqli_num_rows($sql) > 0){
        $dados = mysqli_fetch_array($sql);
        $_SESSION['usuario_id'] = $dados['usuario_id'];
        echo "sucesso";
    }else {
        echo "E-mail ou Senha Invalidos!";
    }
}else {
    echo "Por favor preencha os campos vázios.";
}