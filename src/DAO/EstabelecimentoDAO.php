<?php	
session_start();
include 'Persistence/ConnectionDB.php';
class EstabelecimentoDAO
{
	private $connection = null;

	public function __construct()
	{
		$this->connection = connectionDB::getInstance();
	}

	public function insertEstabelecimento($Estabelecimento)
	{
		try {
			$status = $this->connection->prepare("Insert into estabelecimento(id,nomeFanstasia,razaoSocial,cnpj,cidade)"
				. "values(null,?,?,?,?)");

			$status->bindValue(1, $Estabelecimento->nomeFantasia);
			$status->bindValue(2, $Estabelecimento->razaoSocial);
			$status->bindValue(3, $Estabelecimento->Cnpj);
			$status->bindValue(4, $Estabelecimento->cidade);

			$status->execute();
			
			$EstabelecimentoDAO = new EstabelecimentoDAO();
			$idEmpresa = $EstabelecimentoDAO->searchEstabelecimentoPeloNome($Estabelecimento->razaoSocial);
			foreach ($idEmpresa as $id) {
				$empresaID = $id;

			}
			

			$status  = $this->connection->prepare("Insert into configuracao(id,idEstabelecimento,diaSemana,horaManhaInicio,horaManhaFim,horaTardeInicio,horaTardeFim)"
				. "values(null,?,?,?,?,?,?)");

			$status->bindValue(1, $empresaID);
			$status->bindValue(2, 0);
			$status->bindValue(3, $Estabelecimento->horaManhaInicio1);
			$status->bindValue(4, $Estabelecimento->horaManhaFim1);
			$status->bindValue(5, $Estabelecimento->horaTardeInicio1);
			$status->bindValue(6, $Estabelecimento->horaTardeFim1);

			$status->execute();

			$status  = $this->connection->prepare("Insert into configuracao(id,idEstabelecimento,diaSemana,horaManhaInicio,horaManhaFim,horaTardeInicio,horaTardeFim)"
				. "values(null,?,?,?,?,?,?)");

			$status->bindValue(1, $empresaID);
			$status->bindValue(2, 1);
			$status->bindValue(3, $Estabelecimento->horaManhaInicio2);
			$status->bindValue(4, $Estabelecimento->horaManhaFim2);
			$status->bindValue(5, $Estabelecimento->horaTardeInicio2);
			$status->bindValue(6, $Estabelecimento->horaTardeFim2);

			$status->execute();

			$status  = $this->connection->prepare("Insert into configuracao(id,idEstabelecimento,diaSemana,horaManhaInicio,horaManhaFim,horaTardeInicio,horaTardeFim)"
				. "values(null,?,?,?,?,?,?)");

			$status->bindValue(1, $empresaID);
			$status->bindValue(2, 2);
			$status->bindValue(3, $Estabelecimento->horaManhaInicio3);
			$status->bindValue(4, $Estabelecimento->horaManhaFim3);
			$status->bindValue(5, $Estabelecimento->horaTardeInicio3);
			$status->bindValue(6, $Estabelecimento->horaTardeFim3);

			$status->execute();

			$status  = $this->connection->prepare("Insert into configuracao(id,idEstabelecimento,diaSemana,horaManhaInicio,horaManhaFim,horaTardeInicio,horaTardeFim)"
				. "values(null,?,?,?,?,?,?)");

			$status->bindValue(1, $empresaID);
			$status->bindValue(2, 3);
			$status->bindValue(3, $Estabelecimento->horaManhaInicio4);
			$status->bindValue(4, $Estabelecimento->horaManhaFim4);
			$status->bindValue(5, $Estabelecimento->horaTardeInicio4);
			$status->bindValue(6, $Estabelecimento->horaTardeFim4);

			$status->execute();

			$status  = $this->connection->prepare("Insert into configuracao(id,idEstabelecimento,diaSemana,horaManhaInicio,horaManhaFim,horaTardeInicio,horaTardeFim)"
				. "values(null,?,?,?,?,?,?)");

			$status->bindValue(1, $empresaID);
			$status->bindValue(2, 4);
			$status->bindValue(3, $Estabelecimento->horaManhaInicio4);
			$status->bindValue(3, $Estabelecimento->horaManhaInicio5);
			$status->bindValue(4, $Estabelecimento->horaManhaFim5);
			$status->bindValue(5, $Estabelecimento->horaTardeInicio5);
			$status->bindValue(6, $Estabelecimento->horaTardeFim5);

			$status->execute();

			$status  = $this->connection->prepare("Insert into configuracao(id,idEstabelecimento,diaSemana,horaManhaInicio,horaManhaFim,horaTardeInicio,horaTardeFim)"
				. "values(null,?,?,?,?,?,?)");

			$status->bindValue(1, $empresaID);
			$status->bindValue(2, 5);
			$status->bindValue(3, $Estabelecimento->horaManhaInicio6);
			$status->bindValue(4, $Estabelecimento->horaManhaFim6);
			$status->bindValue(5, $Estabelecimento->horaTardeInicio6);
			$status->bindValue(6, $Estabelecimento->horaTardeFim6);

			$status->execute();

			$status  = $this->connection->prepare("Insert into configuracao(id,idEstabelecimento,diaSemana,horaManhaInicio,horaManhaFim,horaTardeInicio,horaTardeFim)"
				. "values(null,?,?,?,?,?,?)");

			$status->bindValue(1, $empresaID);
			$status->bindValue(2, 6);
			$status->bindValue(3, $Estabelecimento->horaManhaInicio7);
			$status->bindValue(4, $Estabelecimento->horaManhaFim7);
			$status->bindValue(5, $Estabelecimento->horaTardeInicio7);
			$status->bindValue(6, $Estabelecimento->horaTardeFim7);

			$status->execute();

			$idCliente = $_SESSION['usrId'];
			$_SESSION['idEstabelecimentoUSR'] = $empresaID;
			$status = $this->connection->prepare("UPDATE CLIENTE SET idEstabelecimento = ? WHERE id = '$idCliente' and admin = 1");

			$status->bindValue(1, $empresaID);

			$status->execute();

			//Encerra a conexão com o banco
			$this->connection = null;
		} catch (PDOException $e) {
			echo "Ocorreram erros ao inserir o novo Estabelecimento!";
		}
	}

	public function searchEstabelecimento($cidade)
	{
		try {
			$status = $this->connection->query("Select * From estabelecimento where cidade = '$cidade'");

			$array = array();
			$array = $status->fetchAll(PDO::FETCH_OBJ);

			//Encerra a conexão com o banco
			$this->connection = null;

			return $array;
		} catch (PDOException $e) {
			echo "Ocorreram erros ao buscar o estabelecimento. " . $e;
		}
	}

	public function searchEstabelecimentoPeloNome($razaoSocial)
	{
		try {
			$status = $this->connection->query("Select id From estabelecimento WHERE razaoSocial = '$razaoSocial'");
			$resultado = $status->fetch(PDO::FETCH_OBJ);

			//Encerra a conexão com o banco
			$this->connection = null;

			return $resultado;
		} catch (PDOException $e) {
			echo "Ocorreram erros ao buscar o estabelecimento pelo nome. " . $e;
		}
	}
}
