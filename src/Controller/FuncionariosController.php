<?php
	session_start();
	include '../Model/FuncionariosModel.php';
	include '../DAO/FuncionariosDAO.php';

	if(isset($_GET['operation'])){
		switch($_GET['operation']){
			case 'cadastrar':
                if(	(!empty($_POST['txtNome'])) &&
                (!empty($_POST['txtEstabelecimento'])) )
				{
					$erros = array();

					if(count($erros) == 0){
						$funcionarios = new FuncionariosModel();

						
						$funcionarios->nome = $_POST['txtNome'];
                        $funcionarios->estabelecimento = $_POST['txtEstabelecimento'];

						$funcionariosDAO = new FuncionariosDAO();
						$funcionariosDAO->insertFuncionarios($funcionarios);

						$_SESSION[nome] = $funcionarios->nome;
						header("location:../View/Funcionarios/FuncionariosViewResult.php");
					}
					else{
						$err = serialize($erros);
							$_SESSION['erros'] = $err;
							header("location:../View/Funcionarios/FuncionariosViewError.php");
					}
				}
				else {
					echo "Informe todos campos!";
				}
			break;

			case 'consultar':		
				$funcionariosDAO = new funcionariosDAO();
				$array = array();
				$array = $funcionariosDAO->searchFuncionarios();

				$_SESSION['nome'] = serialize($array);
				header("location:../View/Funcionarios/FuncionariosViewConsulta.php");
			break;

			case 'excluir':
				echo "Aqui deve-se excluir o Funcionário";
		}
	}
?>
