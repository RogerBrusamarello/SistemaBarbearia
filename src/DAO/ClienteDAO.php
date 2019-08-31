<?php
	include 'Persistence/ConnectionDB.php';

class ClienteDAO {
	private $connection = null;

	public function __construct() {
		$this->connection = connectionDB::getInstance();
	}

	public function insertCliente($Cliente) {
		try{
			$status = $this-> connection->prepare("Insert into cliente(id,nome,sobrenome,cidade,telefone,email,senha)"
				."values(null,?,?,?,?,?,?)");

			$status->bindValue(1, $Cliente->nome);
			$status->bindValue(2, $Cliente->sobrenome);
			$status->bindValue(3, $Cliente->cidade);
			$status->bindValue(4, $Cliente->telefone);
			$status->bindValue(5, $Cliente->email);
			$status->bindValue(6, $Cliente->senha);
			$status->execute();

			//Encerra a conexão com o banco
			$this->connection = null;
		} catch (PDOException $e) {
			echo "Ocorreram erros ao inserir o novo Cliente!";
		}
	}
	public function searchCliente(){
        try{
            $status = $this->connection->query("Select * From cliente");

            $array = array();
            $array = $status->fetchAll (PDO::FETCH_CLASS, 'ClienteModel');

            $this->connection = null;

            return $array;
        } catch (PDOException $e) {
            echo 'Ocorreram erros ao buscar Clientes'.$e;
        }
    }
	public function searchClienteAdmin($usuario){
        try{
            $status = $this->connection->query("Select * From cliente Where email = '$usuario' and admin = 1");

            $array = array();
            $array = $status->fetchAll(PDO::FETCH_OBJ);

            $this->connection = null;

            return $array;
        } catch (PDOException $e) {
            echo 'Ocorreram erros ao buscar Clientes'.$e;
        }
    }

}
?>