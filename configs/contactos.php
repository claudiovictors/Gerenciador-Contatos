<?php

global $sql;
while ($dados = mysqli_fetch_array($sql)){
    $mostrar .= '
        <tr>
          <td>'.$dados['id'].'</td>
          <td>'.$dados['nome'].'</td>
          <td>'.$dados['email'].'</td>
          <td>+'.$dados['telefone'].'</td>
          <td>'.$dados['data'].'</td>
          <td>
            <a href="update.php?id='.$dados['id'].'" class="action-btn"><i class="bx bx-edit-alt" style="color: #2ecc71;"></i></a>
            <a href="configs/deletar.php?id='.$dados['id'].'" class="action-btn"><i class="bx bx-trash-alt" style="color: red;"></i></a>
          </td>
        </tr>
    ';
}