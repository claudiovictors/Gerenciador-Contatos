<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
global $conn;
include_once "conexao.php";

$nome = mysqli_real_escape_string($conn, $_POST['nome']); # Pegando os dados do campo Nome
$sobrenome = mysqli_real_escape_string($conn, $_POST['sobrenome']); # Pegando os dados do campo Sobrenome
$email = mysqli_real_escape_string($conn, $_POST['email']); # Pegando os dados do campo email
$senha = mysqli_real_escape_string($conn, $_POST['senha']); # Pegando os dados do campo senha

if(!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($senha)){ # Verificando se os campos estão vázios

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ # Validdar emails válidos
        $sql = mysqli_query($conn, "SELECT email FROM lista WHERE email = '{$email}'"); # Verifiando se o email que usuário inseriu já existe

        if(mysqli_num_rows($sql) > 0){ # fazendo a consulta para poder retorna o email se existe ou não
            echo "{$email} - Este e-mail já está em uso.";
        }else {
            include_once __DIR__."/scripts.php"; # Incluindo o arquivo scripts
            $usuario_id = gerarID(); # Essa função Gerando ids para cada usuario que se cadastrar
            $username = username($nome,$sobrenome); # Essa função gera um nome de usuário
            $imagem_text = gerarImagens($nome,$sobrenome);  # Essa função Gera imagens com inicias dos nomes do usuário
            
            # Inserindo todos os dados na tebela Lista
            $sql1 = mysqli_query($conn, "INSERT INTO lista (usuario_id,nome,apelido,usuario,email,senha,img)
                                 VALUES ('{$usuario_id}', '{$nome}','{$sobrenome}','{$username}','{$email}','{$senha}','{$imagem_text}')");

            if($sql1){ # Verificando se os dados foram inseridos com sucesso. Caso não ele não insere

                $sql2 = mysqli_query($conn, "SELECT * FROM lista WHERE email = '{$email}'"); # Pegando o email que foi inserido na tebala e o seu ID de usuário
                                                                                             # E armazenar uma session onde irá nos permitir
                                                                                             # Pegar todos os dados do usuário como o Nome,email

                if(mysqli_num_rows($sql2) > 0){
                    $dados = mysqli_fetch_array($sql2);
                    $_SESSION['usuario_id'] = $dados['usuario_id'];
                    echo "sucesso";
                }else {
                    echo "Erro tente mais tarde!";
                }
            }else {
                echo "Erro ao inserir os dados tente mais tarde!";
            }
        }
    }else {
        echo "Por favor insira um e-mail válido!";
    }
}else {
    echo "Por favor preencha os campos vázios.";
}