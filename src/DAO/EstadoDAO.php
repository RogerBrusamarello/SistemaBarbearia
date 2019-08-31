<?php
include_once 'Persistence/ConnectionDB.php';

class EstadoDAO {
	private $connection = null;

	public function __construct() {
		$this->connection = connectionDB::getInstance();
	}

	public function searchEstados() {
		try{
			$status = $this-> connection->query("Select * From estado");

			$array = array();
			$array = $status->fetchAll(PDO::FETCH_CLASS,'EstadoModel');

			//Encerra a conexão com o banco
			$this->connection = null;

			return $array;
		} catch (PDOException $e) {
			echo "Ocorreram erros ao buscar usuários".$e;
		}
	}


}
?>