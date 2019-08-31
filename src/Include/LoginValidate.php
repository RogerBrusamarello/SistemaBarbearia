<?php
    session_start();
    include_once '../DAO/Persistence/ConnectionDB2.php';

    if((isset($_POST['email'])) && (isset($_POST['senha'])) ){
        $usuario = mysqli_real_escape_string($conn, $_POST['email']); //Escapar caracteres especiais, como aspas
        // para previnir SQL Injection
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
        $senha = md5($senha);

        $sql = "SELECT * FROM cliente WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);

        //VERIFICA SE TEM O CLIENTE NO BANCO
        if(empty($resultado)){ // se voltar vazio a consulta ele vai para o login com o erro
            $_SESSION['loginErro'] = "E-mail ou Senha inválido";
        header("Location: ../View/Site/telas/Login.php");
        }elseif(isset($resultado)){ // Se existir o Cliente vai para o dashboard
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $usuario; //AQUI É O EMAIL...
            $_SESSION['usrCidade'] = $resultado['cidade'];
            $_SESSION['usrId'] = $resultado['id'];
            $_SESSION['usrTelefone'] = $resultado['telefone'];
            $_SESSION['usridEstabelecimento'] = $resultado['idEstabelecimento'];
            header("Location: ../View/Site/telas/dashboard.php");
        }else{// Se n existir volta para o login
            $_SESSION['loginErro'] = "E-mail ou Senha inválido";
        header("Location: ../View/Site/telas/Login.php");
        }

    }else{
        $_SESSION['loginErro'] = "E-mail ou Senha inválido";
        header("Location: ../View/Site/telas/Login.php");
    }
