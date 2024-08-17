<!DOCTYPE html>
<html lang="pt-AO">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/boxicons.css">
    <title>Oficial ClevCodes</title>
  </head>
  
  <body>
    <div class="container">
      <h1>ClevCodes</h1>
      <form id="signup-form" method="post" action="#" autocomplete="off">
        <div class="mensagens_erros"></div>
        <div class="input-group">
          <input type="text" id="name" name="nome" required placeholder=" ">
          <label for="name">Nome</label>
        </div>
        <div class="input-group">
          <input type="text" id="sobrenome" name="sobrenome" required placeholder=" ">
          <label for="email">Sobrenome</label>
        </div>
        <div class="input-group">
          <input type="text" id="email" name="email" required placeholder=" ">
          <label for="email">E-mail</label>
        </div>
        <div class="input-group">
          <i class="bx bx-show-alt"></i>
          <input type="password" id="senha" name="senha" required placeholder=" ">
          <label for="senha">Senha</label>
        </div>
        <button type="submit" class="cadastrar">Cadastrar</button>
      </form>
      <div class="link">Já possui uma conta <a href="login.php">login?</a></div>
    </div>

  <script src="scripts/cadastro.js"></script>
  </body>
</html>