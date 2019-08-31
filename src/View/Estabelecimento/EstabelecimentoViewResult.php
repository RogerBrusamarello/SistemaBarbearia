<?php
	session_start();
?>
<html>
	<head>
		<title>Cadastro de Estabelecimento Efetuado</title>
	</head>
	<body>
		<h1>Resultado</h1>
		<?php
			if (isset($_SESSION['nomeFantasia']) && isset($_SESSION['Cnpj'])) {
				echo '<br>Estabelecimento: '.$_SESSION['nomeFantasia'].'<br>Cnpj: '.$_SESSION['Cnpj'];

				unset($_SESSION['nomeFantasia']);
				unset($_SESSION['Cnpj']);
			}
		?> 
	</body>
</html>
