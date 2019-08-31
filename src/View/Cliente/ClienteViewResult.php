<?php
	session_start();
?>
<html>
	<head>
		<title>Cadastro de Clientes Efetuados</title>
	</head>
	<body>
		<h1>Resultado</h1>
		<?php
			if (isset($_SESSION['nome']) && isset($_SESSION['mail'])) {
				echo '<br>Cliente: '.$_SESSION['nome'].'<br>E-mail: '.$_SESSION['mail'];

				unset($_SESSION['nome']);
				unset($_SESSION['mail']);
			}
		?> 
	</body>
</html>
