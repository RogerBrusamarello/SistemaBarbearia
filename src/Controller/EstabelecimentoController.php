<?php
session_start();
include '../Model/EstabelecimentoModel.php';
include '../Include/EstabelecimentoValidate.php';
include '../DAO/EstabelecimentoDAO.php';
$cidade = $_SESSION['usrCidade'];
$idCliente = $_SESSION['usridEstabelecimento'];

if (isset($_GET['operation'])) {
	switch ($_GET['operation']) {
		case 'cadastrar':
			if ((!empty($_POST['txtNomeFantasia'])) && (!empty($_POST['txtRazaoSocial'])) && (!empty($_POST['txtCnpj'])) && (!empty($_POST['cidades']))
			) {
				$erros = array();

				/*if (!EstabelecimentoValidate::validaCNPJ($_POST['txtCnpj'])) {
					$erros[] = 'CNPJ Inválido';
				}*/

				if (count($erros) == 0) {
					$Estabelecimento = new EstabelecimentoModel();


					$Estabelecimento->nomeFantasia = $_POST['txtNomeFantasia'];
					$Estabelecimento->razaoSocial = $_POST['txtRazaoSocial'];
					$Estabelecimento->Cnpj = $_POST['txtCnpj'];
					$Estabelecimento->cidade = $_POST['cidades'];
					$Estabelecimento->horaManhaInicio1 = $_POST['horaManhaInicio1'];
					$Estabelecimento->horaManhaFim1 = $_POST['horaManhaFim1'];
					$Estabelecimento->horaTardeInicio1 = $_POST['horaManhaInicio1'];
					$Estabelecimento->horaManhaInicio1 = $_POST['horaTardeInicio1'];
					$Estabelecimento->horaTardeFim1 = $_POST['horaTardeFim1'];
					$Estabelecimento->horaManhaInicio2 = $_POST['horaManhaInicio2'];
					$Estabelecimento->horaManhaFim2 = $_POST['horaManhaFim2'];
					$Estabelecimento->horaTardeInicio2 = $_POST['horaManhaInicio2'];
					$Estabelecimento->horaManhaInicio2 = $_POST['horaTardeInicio2'];
					$Estabelecimento->horaTardeFim2 = $_POST['horaTardeFim2'];
					$Estabelecimento->horaManhaInicio3 = $_POST['horaManhaInicio3'];
					$Estabelecimento->horaManhaFim3 = $_POST['horaManhaFim3'];
					$Estabelecimento->horaTardeInicio3 = $_POST['horaManhaInicio3'];
					$Estabelecimento->horaManhaInicio3 = $_POST['horaTardeInicio3'];
					$Estabelecimento->horaTardeFim3 = $_POST['horaTardeFim3'];
					$Estabelecimento->horaManhaInicio4 = $_POST['horaManhaInicio4'];
					$Estabelecimento->horaManhaFim4 = $_POST['horaManhaFim4'];
					$Estabelecimento->horaTardeInicio4 = $_POST['horaManhaInicio4'];
					$Estabelecimento->horaManhaInicio4 = $_POST['horaTardeInicio4'];
					$Estabelecimento->horaTardeFim4 = $_POST['horaTardeFim4'];
					$Estabelecimento->horaManhaInicio5 = $_POST['horaManhaInicio5'];
					$Estabelecimento->horaManhaFim5 = $_POST['horaManhaFim5'];
					$Estabelecimento->horaTardeInicio5 = $_POST['horaManhaInicio5'];
					$Estabelecimento->horaManhaInicio5 = $_POST['horaTardeInicio5'];
					$Estabelecimento->horaTardeFim5 = $_POST['horaTardeFim5'];
					$Estabelecimento->horaManhaInicio5 = $_POST['horaManhaInicio5'];
					$Estabelecimento->horaManhaFim5 = $_POST['horaManhaFim5'];
					$Estabelecimento->horaTardeInicio5 = $_POST['horaManhaInicio5'];
					$Estabelecimento->horaManhaInicio5 = $_POST['horaTardeInicio5'];
					$Estabelecimento->horaTardeFim5 = $_POST['horaTardeFim5'];
					$Estabelecimento->horaManhaInicio6 = $_POST['horaManhaInicio6'];
					$Estabelecimento->horaManhaFim6 = $_POST['horaManhaFim6'];
					$Estabelecimento->horaTardeInicio6 = $_POST['horaManhaInicio6'];
					$Estabelecimento->horaManhaInicio6 = $_POST['horaTardeInicio6'];
					$Estabelecimento->horaTardeFim6 = $_POST['horaTardeFim6'];
					$Estabelecimento->horaManhaInicio7 = $_POST['horaManhaInicio7'];
					$Estabelecimento->horaManhaFim7 = $_POST['horaManhaFim7'];
					$Estabelecimento->horaTardeInicio7 = $_POST['horaManhaInicio7'];
					$Estabelecimento->horaManhaInicio7 = $_POST['horaTardeInicio7'];
					$Estabelecimento->horaTardeFim7 = $_POST['horaTardeFim6'];

					$EstabelecimentoDAO = new EstabelecimentoDAO();
					$EstabelecimentoDAO->insertEstabelecimento($Estabelecimento);

					header("location:../View/Servicos/ServicosView.php");
				} else {
					$err = serialize($erros);
					$_SESSION['erros'] = $err;
					header("location:../View/Estabelecimento/EstabelecimentoViewError.php");
				}
			} else {
				echo "Informe todos campos!";
			}
			break;

		case 'consultar':
			$EstabelecimentoDAO = new EstabelecimentoDAO();
			$array = array();
			$array = $EstabelecimentoDAO->searchEstabelecimento($cidade);


			$_SESSION['Estabelecimento'] = serialize($array);
			header("location:../View/Estabelecimento/EstabelecimentoViewConsulta.php");
			break;

		case 'excluir':
			echo "Aqui deve-se excluir o Usuário";
	}
}
