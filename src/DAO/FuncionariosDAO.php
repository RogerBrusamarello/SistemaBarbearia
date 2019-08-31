<?php
	include 'Persistence/ConnectionDB.php';

class FuncionariosDAO {
	private $connection = null;

	public function __construct() {
		$this->connection = connectionDB::getInstance();
	}

	public function insertFuncionarios($funcionarios) {
		try{
			$status = $this-> connection->prepare("Insert into funcionarios(id,nome,idestabelecimento)"
				."values(null,?,?)");

			$status->bindValue(1, $funcionarios->nome);
			$status->bindValue(1, $funcionarios->idestabelecimento);

			$status->execute();

			//Encerra a conexão com o banco
			$this->connection = null;
		} catch (PDOException $e) {
			echo "Ocorreram erros ao inserir o novo Funcionario!";
		}
	}


}
?>