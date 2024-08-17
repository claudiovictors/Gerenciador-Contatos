<?php

# Gerador de IDS de usuarios aleatórios
function gerarID(){
    $carate = "123456789";
    $id_new = "";

    for($i = 0; $i < 14; $i++){
        $gerarSenhas = rand(0, strlen($carate) - 1);
        $id_new .= $carate[$gerarSenhas];
    }

    return $id_new;
}

# Gerador de imagens com nomes

function gerarImagens($nome,$sobrenome){
    $split_nome = str_split($nome);
    $split_sobrenome = str_split($sobrenome);

    $mostrar = $split_nome[0]."".$split_sobrenome[0];
    return strtoupper($mostrar);
}

# Gerador de nomes de usuarios aleatórios
function username($nome, $sobrenome) {
    $carate = "123456789";
    $id_new = "";
    $username = "";

    // Função para remover acentos
    function removerAcentos($texto) {
        // Convertendo caracteres acentuados para ASCII
        $texto = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $texto);
        // Remover caracteres não ASCII (opcional)
        $texto = preg_replace('/[^a-zA-Z0-9]/', '', $texto);
        return $texto;
    }

    // Remover acentos dos nomes e sobrenomes
    $nome = removerAcentos($nome);
    $sobrenome = removerAcentos($sobrenome);

    // Gerar parte numérica do username
    for ($i = 0; $i < 4; $i++) {
        $gerarSenhas = rand(0, strlen($carate) - 1);
        $id_new .= $carate[$gerarSenhas];
    }


    // Concatenar nome, sobrenome e parte numérica
    $username .= "@" . $nome . $sobrenome . $id_new;

    return strtolower($username);
}