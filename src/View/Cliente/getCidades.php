<?php
    include '../../DAO/CidadeDAO.php';
    $estado_id = $_GET['estado'];

    $cidadeDAO = new CidadeDAO();
    $cidades = $cidadeDAO->getCidadePeloEstado($estado_id);                     
    
    foreach ($cidades as $c) {
        echo "<option value=$c->id>$c->nome</option>";
    }
?>