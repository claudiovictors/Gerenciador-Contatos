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
      <form id="signup-form" method="post">
        <div class="mensagens_erros"></div>
        <div class="input-group">
          <input type="text" id="email" name="email" required placeholder=" ">
          <label for="password">E-mail</label>
        </div>
        <div class="input-group">
          <i class="bx bx-show-alt"></i>
          <input type="password" id="senha" name="senha" required placeholder=" ">
          <label for="confirm-password">Senha</label>
        </div>
        <button type="submit" class="cadastrar">Cadastrar</button>
      </form>
      <div class="link">Não possui uma conta <a href="index.php">cadastrar?</a></div>
    </div>
    <script src="scripts/login.js"></script>
  </body>
</html>