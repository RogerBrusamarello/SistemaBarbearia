<?php
session_start();
include '../Model/ClienteModel.php';
include '../Include/ClienteValidate.php';
include '../DAO/ClienteDAO.php';

if (isset($_GET['operation'])) {
	switch ($_GET['operation']) {
		case 'cadastrar':
			if ((!empty($_POST['txtNome'])) && (!empty($_POST['txtSobrenome'])) && (!empty($_POST['cidades'])) && (!empty($_POST['txtTelefone'])) && (!empty($_POST['txtEmail'])) && (!empty($_POST['txtSenha']))
			) {
				$erros = array();

				if (!ClienteValidate::testarEmail($_POST['txtEmail'])) {
					$erros[] = 'E-mail inválido';
				}

				if (count($erros) == 0) {
					$Cliente = new ClienteModel();


					$Cliente->nome = $_POST['txtNome'];
					$Cliente->sobrenome = $_POST['txtSobrenome'];
					$Cliente->cidade = $_POST['cidades'];
					$Cliente->telefone = $_POST['txtTelefone'];
					$Cliente->email = $_POST['txtEmail'];
					$Cliente->senha = md5(($_POST['txtSenha']));

					$ClienteDAO = new ClienteDAO();
					$ClienteDAO->insertCliente($Cliente);
					header("location:../View/Site/telas/login.php");
				} else {
					$err = serialize($erros);
					$_SESSION['erros'] = $err;
					header("location:../View/Cliente/ClienteViewError.php");
				}
			} else {
				echo "Informe todos campos!";
			}
			break;

		case 'consultar':
			$ClienteDAO = new ClienteDAO();
			$array = array();
			$array = $ClienteDAO->searchCliente();

			$_SESSION['cliente'] = serialize($array);
			header("location:../View/Cliente/ClienteViewConsulta.php");
			break;

		case 'excluir':
			echo "Aqui deve-se excluir o Usuário";
			break;

		case 'administrador':
			$clienteDAO = new ClienteDAO();
			if ($ClienteDAO->searchClienteAdmin($_GET['id']) != 0) {
				$_SESSION['admin'] = true;
				header("location:../View/Site/telas/dashboardAdmin.php");
			} else {
				header("location:../View/Site/telas/dashboardCliente.php");
			}
			break;
	}
}
