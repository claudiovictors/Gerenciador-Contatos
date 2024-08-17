<?php
    session_start();
    global $conn;
    include_once "configs/conexao.php";

    # Pegando ID do usuário $_SESSION['usuario_id']
    if($_GET['id']){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = mysqli_query($conn, "SELECT * FROM contactos WHERE id = '{$id}'");

        $dados = mysqli_fetch_array($sql);
    }
?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciador de Contatos Avançado</title>
  <link rel="stylesheet" href="styles/style.css">
<link rel="stylesheet" href="styles/boxicons.css">
</head>

<body>
  <div class="top-menu">
    <div class="logo">
      <i class="bx bx-book-bookmark"></i>
        <a href=""><h2 class="text">Clev<span style="color: #2ecc71;">Codes</span></h2></a>
    </div>
    <div class="user-info">
      <span id="userName"></span>
      <div class="user-avatar" id="userAvatar"></div>
      <a href="#" class="logout-btn">Terminar Sessão</a>
    </div>
  </div>

  <div class="container">
    <h1>Gerenciador de Contatos</h1>
    <div class="search-filter-container">
      <div class="search-box">
        <i class="bx bx-search"></i>
        <input type="text" id="searchInput" placeholder="Pesquisar contatos..."">
      </div>
      <div class="filter-sort-container">
        <button class="add-contact-btn">
          <i class="bx bx-plus"></i> Adicionar
        </button>
        <button class="sort-btn">
          <i class="bx bx-sort"></i> Ordenar
        </button>
      </div>
    </div>
    <table class="contacts-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Telefone</th>
          <th>Data</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody id="contactList">

      </tbody>
    </table>
  </div>

  <div id="addContactModal" class="modal" style="display: block;">
    <div class="modal-content">
      <header>
        <h2>Actualizar Contactos</h2>
        <a href="home.php" class="bx bx-x close"></a>
      </header>
       
      <form class="modal-form" autocomplete="off" method="post">
      <input type="hidden" name="id" value="<?php echo $dados['id']?>">
        <div class="input-group">
          <input type="text" value="<?php echo $dados['nome'];?>" id="name" name="nome" required placeholder=" ">
          <label for="name">Nome Completo</label>
        </div>
        <div class="input-group">
          <input type="text" id="email" value="<?php echo $dados['email'];?>" name="email" required placeholder=" ">
          <label for="email">E-mail</label>
        </div>
        <div class="input-group">
          <input type="number" id="telefone" value="<?php echo $dados['telefone'];?>" name="telefone" required placeholder=" ">
          <label for="telefone">Telefone</label>
        </div>
        <footer style="display: flex; align-items: center; justify-content: space-between; gap: 10px">
          <button type="submit" class="btn-add">Actualizar</button>
          <p class="erros">Lorem, ipsum dolor consectetur</p>
        </footer>
      </form>
    </div>
  </div>

  <script src="scripts/update.js"></script>
</body>

</html>