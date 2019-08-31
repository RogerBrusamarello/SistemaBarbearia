<?php
	session_start();
?>
<html>
	<head>
		<title>Cadastro de Servicos Efetuado</title>
	</head>
	<body>
		<h1>Resultado</h1>
		<?php
			if (isset($_SESSION['nome']) && isset($_SESSION['valor'])) {
				echo '<br>Serviço: '.$_SESSION['nome'].'<br>Valor: '.$_SESSION['valor'];

				unset($_SESSION['nome']);
				unset($_SESSION['valor']);
			}
		?> 
	</body>
</html>
