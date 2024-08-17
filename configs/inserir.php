<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    global $conn;
    include_once "conexao.php";

    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
    $usuario_id = mysqli_real_escape_string($conn, $_POST['usuario_id']);

    if(!empty($nome) && !empty($email) && !empty($telefone)) {
        $data = date("Y-m-d");  // Ajustando o formato da data para Y-m-d
        $sql = "INSERT INTO contactos (usuario_id, nome, email, telefone, data)
                VALUES ('$usuario_id', '$nome', '$email', '$telefone', '$data')";

        if (mysqli_query($conn, $sql)) {
            echo "Contato inserido com sucesso!";
        } else {
            echo "Erro ao inserir os dados: " . mysqli_error($conn);
        }
    } else {
        echo "Por favor, preencha os campos nome e telefone.";
    }
?>
