<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastre-se</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <link rel="stylesheet" type="text/css" href="../Site/css/estilo.css" />


</head>

<body>
    <nav class="navebar navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Barbearia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="../index.php">Página Inicial<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="">Cadastre-se</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Site/telas/Login.php">Login</a>
                </li>
        </div>
    </nav>

    <div class="modal-dialog text-center">
        <div class="col-sm-9 main-section">
            <div class="modal-content">

                <div class="col-12 user-img">
                    <img src="../Site/img/icon-face.png">
                </div>

                <div class="col-12 form-input">
                    <form action="../../Controller/ClienteController.php?operation=cadastrar" class="inputs" method="post" name="cadCliente">
                        <input type="text" class="form-control" name="txtNome" id="txtNome" placeholder="Nome" /><br>
                        <input type="text" class="form-control" name="txtSobrenome" id="txtSobrenome" placeholder="Sobrenome" /><br>

                        <select id="estados" class="form-control">
                            <option>Selecione um estado...</option>
                            <?php
                            header('Content-type: text/html; charset=UTF-8');
                            include_once '../../DAO/EstadoDAO.php';
                            include_once '../../Model/EstadoModel.php';
                            $estadoDAO = new EstadoDAO();
                            $estados = $estadoDAO->searchEstados();
                            foreach ($estados as $e) {
                                echo "<option value='$e->id'>$e->nome</option>";
                            }
                            ?>
                        </select>
                        <br>

                        <select id="cidades" name="cidades" class="form-control">
                            <option>Selecione uma cidade...</option>
                        </select>
                        <br>
                        <input type="text" class="form-control" name="txtTelefone" id="txtTelefone" placeholder="Telefone" /><br>
                        <input type="text" class="form-control" name="txtEmail" id="txtEmail" placeholder="E-mail" /><br>
                        <input type="password" class="form-control" name="txtSenha" id="txtSenha" placeholder="Senha" /><br>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#estados').change(function() {             
                $('#cidades').load('getCidades.php?estado=' + $('#estados').val());
            });
        });
    </script>

</body>

</html>