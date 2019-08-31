<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro de serviço</title>
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
        <a class="navbar-brand" href="#">Barbearia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="../Site/telas/dashboard.php">Página Inicial<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Estabelecimento/EstabelecimentoView.php">Cadastro Estabelecimento<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Cadastro Serviço<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../Include/SairLogin.php">Sair</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="modal-dialog text-center">
        <div class="col-sm-9 main-section">
            <div class="modal-content">
                <div class="col-12 form-input">
                    <form action="../../Controller/ServicosController.php?operation=cadastrar" class="inputs" method="post" name="cadCliente" style="padding-top:10%">
                        <input type="text" class="form-control" name="txtNome" id="txtNome" placeholder="Nome" /><br>
                        <input type="text" class="form-control" name="txtDescricao" id="txtDescricao" placeholder="Descrição" /><br>
                        <input type="text" class="form-control" name="txtValor" id="txtValor" placeholder="Valor" /><br>
                        <input type="text" class="form-control" name="txtDuracao" id="txtDuracao" placeholder="Duração em minutos" /><br>
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