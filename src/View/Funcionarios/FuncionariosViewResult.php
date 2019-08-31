<?php
	session_start();
?>
<html>
	<head>
		<title>Cadastro de Funcionario Efetuado</title>
	</head>
	<body>
		<h1>Resultado</h1>
		<?php
			if (isset($_SESSION['nome'])) {
				echo '<br>Funcionario: '.$_SESSION['nome'];

				unset($_SESSION['nome']);
			}
		?> 
	</body>
</html>
