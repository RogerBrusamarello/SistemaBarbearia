<?php
session_start();
include '../DAO/AtendimentoDAO.php';

if (isset($_GET['operation'])) {
	switch ($_GET['operation']) {
        case 'excluir':
        $codigo = $_SESSION['idEstabelecimento'];
        if(isset($_GET['id'])) {
            $id1 = $_GET['id'];
            $atendimentoDAO = new AtendimentoDAO();
            $atendimentoDAO->deleteAtendimento($id1);
            header("Location: ../View/Atendimento/AtendimentoView.php?codigo=$codigo");
        }
			break;
	}
}
