<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Consulta de Funcionarios</title>
</head>
<body>
	<?php 
		if(isset($_SESSION['funcionarios'])){
			include_once '../../Model/FuncionariosModel.php';
			$cliente = array();
			$cliente = unserialize($_SESSION['funcionarios']);

			foreach($funcionarios as $f){
				echo '<tr>';
				echo "<td><a href='../Controller/FuncionariosController.php?operation=excluir&excluir&id=$f->id'>Deletar</a></td> - ";
				echo "$f->nomeFantasia<br>";
				echo '</tr>';
			}

			unset ($_SESSION['funcionarios']);
		}
	?>
</body>
</html>