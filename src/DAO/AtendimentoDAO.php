<?php
include_once 'Persistence/ConnectionDB.php';

class AtendimentoDAO {
	private $connection = null;

	public function __construct() {
		$this->connection = connectionDB::getInstance();
	}

	public function deleteAtendimento($id1) {
		try{
			$status = $this-> connection->prepare("DELETE FROM Atendimento WHERE id = ?");
			$status->bindValue(1,$id1);
			$status->execute();
			
			$array = array();
			$array = $status->fetchAll(PDO::FETCH_OBJ);

			//Encerra a conexão com o banco
			$this->connection = null;

			return $array;
		} catch (PDOException $e) {
			echo "Ocorreram erros ao buscar Atendimentos".$e;
		}
	}


}
