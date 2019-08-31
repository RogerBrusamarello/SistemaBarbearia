<?php
include_once 'Persistence/ConnectionDB.php';

class CidadeDAO {

	private $connection = null;

	public function __construct() {
		$this->connection = connectionDB::getInstance();
	}

	public function searchCidades() {
		try{
			$status = $this-> connection->query("Select * From cidade");

			$array = array();
			$array = $status->fetchAll(PDO::FETCH_CLASS,'CidadeModel');

			//Encerra a conexão com o banco
			$this->connection = null;

			return $array;
		} catch (PDOException $e) {
			echo "Ocorreram erros ao buscar usuários".$e;
		}
	}
	public function getCidadePeloEstado($estado_id) {
		try{
			$status = $this->connection->query("Select * From cidade WHERE Estado_id = $estado_id");

			$array = array();
			$array = $status->fetchAll(PDO::FETCH_OBJ);

			//Encerra a conexão com o banco
			$this->connection = null;

			return $array;
		} catch (PDOException $e) {
			echo "Ocorreram erros ao buscar usuários".$e;
		}
	}


}
?>