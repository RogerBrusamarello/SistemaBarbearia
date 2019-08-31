<?php
session_start();

//Incluir conexao com BD
include_once("../../DAO/Persistence/ConnectionDB2.php");
include_once("../../DAO/ServicosDAO.php");
$start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_STRING);
$end = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);
$valorTotal = filter_input(INPUT_POST, 'txtValorTotal', FILTER_SANITIZE_STRING);
$servico1 = filter_input(INPUT_POST, 'servicos1', FILTER_SANITIZE_STRING);
$servico2 = filter_input(INPUT_POST, 'servicos2', FILTER_SANITIZE_STRING);
$servicosDAO = new ServicosDAO();
$servico = $servicosDAO->searchServicoPeloId($servico1);
foreach ($servico as $s) {
	$nomeServico1 = $s->nome;
}
if (!empty($servico2)) {
	$servicosDAO = new ServicosDAO();
	$servico2 = $servicosDAO->searchServicoPeloId2($servico2);
	foreach ($servico2 as $se) {
		$nomeServico2 = $se->nome;
	}
	$title = $nomeServico1 . " e " . $nomeServico2;
} else {
	$title = $nomeServico1;
}
$idCliente = $_SESSION['usrId'];
$idEstabelecimento = $_SESSION['idEstabelecimento'];


if (!empty($start) && !empty($end) && !empty($valorTotal)) {
	//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
	$data =  explode(" ", $start);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$start_sem_barra = $data_sem_barra . " " . $hora;

	$data = explode(" ", $end);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$end_sem_barra = $data_sem_barra . " " . $hora;

	$result_events = "INSERT INTO atendimento (title, color, start, end, valorTotal, idCliente, idEstabelecimento) VALUES ('$title', '#4169E1','$start_sem_barra', '$end_sem_barra','$valorTotal','$idCliente','$idEstabelecimento')";
	$resultado_events = mysqli_query($conn, $result_events);

	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
	if (mysqli_insert_id($conn)) {
		$idAtendimento = mysqli_insert_id($conn);
		$result_events1 = "INSERT INTO atendimentoservicos (idServicos,idAtendimento) VALUES ('$servico1','$idAtendimento')";
		$resultado_events1 = mysqli_query($conn, $result_events1);
		$result_events2 = "INSERT INTO atendimentoservicos (idServicos,idAtendimento) VALUES ('$servico2','$idAtendimento')";
		$resultado_events2 = mysqli_query($conn, $result_events2);
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>O Evento Cadastrado com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: AtendimentoView.php?codigo=$idEstabelecimento");
	} else {
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao cadastrar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: AtendimentoView.php?codigo=$idEstabelecimento");
	}
} else {
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao cadastrar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	header("Location: AtendimentoView.php?codigo=$idEstabelecimento");
}
