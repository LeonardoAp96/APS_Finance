<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../wwwroot/css/loginCss.css">

  <title> Managence Finance - Login</title>

</head>
<body>
  <header style="background-color:rgb(255, 102, 0);color:white;width: 100%; height: 10%;position: relative;">
    <p class="navbar-brand" style="padding: 10px;">Managence Finance</p>
  </header>
  
  <a class="aVoltar" href="../Home/index.php">Voltar</a>
  
  <div id="login">

    <form method="post" class="card" action="../../Controllers/login.php">

      <div class="card-header">
        <h2> Login</h2>
      </div>

      <div class="card-content">
        <div class="card-content-area">
          <label for="usuario"> Usuário</label>
          <input type="text" id="user" name="user" autocomplete="off">
        </div>

        <div class="card-content-area">
          <label for="senha"> Senha</label>
          <input type="password" id="senha" name="senha" autocomplete="off">
        </div>
      </div>

      <div class="card-footer">
        <input type="submit" name="entrar" value="Entrar" class="submit">
        <a href="#" style="font-size: 18px;"> Faça o cadastro</a>
        <a href="#" class="recuperar_senha"> Esqueceu a senha?</a>
      </div>

    </form>

  </div>

  <footer style="background-color:rgb(255, 102, 0);color:white;width: 100%; height: 10%;position: relative;">
    <p class="navbar-brand" style="padding: 10px;">Todos os direitos negociáveis</p>
  </footer>
</body>

</html>