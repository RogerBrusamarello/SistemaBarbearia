<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Consulta de Usuários</title>
</head>
<body>
	<?php 
		if(isset($_SESSION['cliente'])){
			include_once '../../Model/ClienteModel.php';
			$cliente = array();
			$cliente = unserialize($_SESSION['cliente']);

			foreach($cliente as $c){
				echo '<tr>';
				echo "<td><a href='../Controller/ClienteController.php?operation=excluir&excluir&id=$c->id'>Deletar</a></td> - ";
				echo "$c->nome<br>";
				echo '</tr>';
			}

			unset ($_SESSION['cliente']);
		}
	?>
</body>
</html>