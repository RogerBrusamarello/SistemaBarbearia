<html>
	<head>
		<title>Cadastro de Serviços com Erro</title>
	</head>
	<body>
		<h1>Erros!</h1>
		<?php
			if(isset($_GET['erros'])) {
				$erros = array();
				$erros = unserialize($_GET['erros']);
			
				foreach ($erros as $e) {
					echo '<br>'.$erros;
				}
			}
		?>
	</body>
</html>