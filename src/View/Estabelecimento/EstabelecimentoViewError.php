<?php session_start();?>
<html>
	<head>
		<title>Cadastro de Estabelecimento com Erro</title>
	</head>
	<body>
		<h1>Erros!</h1>
		<?php
			if(isset($_SESSION['erros'])) {
				$erros = array();
				$erros = unserialize($_SESSION['erros']);
			
				foreach ($erros as $e) {
					echo '<br>'.$e;
				}
			}
		?>
	</body>
</html>