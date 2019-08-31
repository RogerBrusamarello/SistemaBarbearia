<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Consulta de Estabelecimentos</title>
</head>
<body>
	<?php 
		if(isset($_SESSION['Estabelecimento'])){
			include_once '../../Model/EstabelecimentoModel.php';
			$cliente = array();
			$cliente = unserialize($_SESSION['Estabelecimento']);

			foreach($estabelecimento as $e){
				echo '<tr>';
				echo "<td><a href='../Controller/EstabelecimentoController.php?operation=excluir&excluir&id=$c->id'>Deletar</a></td> - ";
				echo "$c->nomeFantasia<br>";
				echo '</tr>';
			}

			unset ($_SESSION['Estabelecimento']);
		}
	?>
</body>
</html>