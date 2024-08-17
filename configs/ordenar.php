<?php

session_start();
global $conn;
include_once "conexao.php";

$sql = mysqli_query($conn, "SELECT * FROM contactos WHERE usuario_id = '{$_SESSION['usuario_id']}' ORDER BY nome ASC");
$mostrar = "";

if(mysqli_num_rows($sql) > 0){
    while ($dados = mysqli_fetch_array($sql)){
        $mostrar .= '
            <tr>
              <td>'.$dados['id'].'</td>
              <td>'.$dados['nome'].'</td>
              <td>'.$dados['email'].'</td>
              <td>+'.$dados['telefone'].'</td>
              <td>'.$dados['data'].'</td>
              <td>
                <button class="action-btn"><i class="bx bx-edit-alt" style="color: #2ecc71;"></i></button>
                <button class="action-btn"><i class="bx bx-trash-alt" style="color: red;"></i></button>
              </td>
            </tr>
        ';
    }
}

echo $mostrar;