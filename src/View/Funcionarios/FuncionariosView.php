<html>
	<head>
		<meta charset="uft-8">
		<title>Cadastro de Funcionarios</title>
	</head>	

	<body>
		<form action="../../Controller/FuncionariosController.php?operation=cadastrar" method="post" name="cadFuncionarios">
			<input type="text" name="txtNome" id="txtNome" placeholder="Nome"/><br>
			<select name="txtEstabelecimento" id="txtEstabelecimento">
            <option value="" disabled selected>Estabelecimento</option>
			<?php
                include_once "../../DAO/EstabelecimentoDAO.php";
                include_once "../../Model/EstabelecimentoModel.php";
                $EstabelecimentoDAO = new EstabelecimentoDAO();
                $estab = $EstabelecimentoDAO->searchEstabelecimentos();
                foreach($estab as $e) {
					echo "<option value='$e->id'>$e->nomeFantasia</option>";
                }
            ?>
        </select><br>		
			<input type="submit" name="btCadastrar" id="btCadastrar" value="Cadastrar"/>
			<input type="reset" name="btLimpar" id="btLimpar" value="Limpar"/>
	</body>
<html>