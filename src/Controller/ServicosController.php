<?php
	session_start();
	include '../Model/ServicosModel.php';
	include '../DAO/ServicosDAO.php';

	if(isset($_GET['operation'])){
		switch($_GET['operation']){
			case 'cadastrar':
				if(	(!empty($_POST['txtNome'])) &&
					(!empty($_POST['txtDescricao'])) &&
					(!empty($_POST['txtValor'])) &&
					(!empty($_POST['txtDuracao'])) )
				{
					$erros = array();

					if(count($erros) == 0){
						$Servicos = new ServicosModel();

						
						$Servicos->nome = $_POST['txtNome'];
						$Servicos->descricao = $_POST['txtDescricao'];
						$Servicos->valor = $_POST['txtValor'];
						$Servicos->duracao = $_POST['txtDuracao'];
						

						$ServicosDAO = new ServicosDAO();
						$ServicosDAO->insertServicos($Servicos);

						$_SESSION[nome] = $Servicos->nome;
						$_SESSION[valor] = $Servicos->valor;
						header("location:../View/Servicos/ServicosViewResult.php");
					}
					else{
						$err = serialize($erros);
							$_SESSION['erros'] = $err;
							header("location:../View/Servicos/ServicosViewError.php");
					}
				}
				else {
					echo "Informe todos campos!";
				}
			break;

			case 'consultar':		
				$ServicosDAO = new ServicosDAO();
				$array = array();
				$array = $ServicosDAO->searchServicos();

				$_SESSION['Servicos'] = serialize($array);
				header("location:../View/Servicos/ServicosViewConsulta.php");
			break;

			case 'excluir':
				echo "Aqui deve-se excluir o Usuário";
		}
	}
?>
