<?php session_start() ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../../index.php">Barbearia</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="../../index.php">Página Inicial<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../Cliente/ClienteView.php">Cadastre-se</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="">Login</a>
        </li>
    </div>
  </nav>

  <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content">

        <div class="col-12 user-img">
          <img src="../img/icon-face.png">
        </div>

        <div class="col-12 form-input">
          <form method="POST" action="../../../Include/LoginValidate.php">
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Insira seu E-mail">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="senha" id="senha" placeholder="Insira sua senha">
            </div>
            <button type="submit" class="btn btn-success">Login</button>
          </form>
        </div>

        <div class="col-12 forgot">
          <a href="#">Esqueceu a senha?</a>
        </div>
        <p class="text-center text-danger" style="font-size: 15px"><b>
            <?php if (isset($_SESSION['loginErro'])) {
              echo $_SESSION['loginErro'];
              unset($_SESSION['loginErro']);
            }
            ?>
          </b>
        </p>

      </div>
    </div>
  </div>



</body>

</html>