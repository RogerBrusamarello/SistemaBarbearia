<?php
include 'Persistence/ConnectionDB.php';
class ServicosDAO
{

	private $connection = null;

	public function __construct()
	{
		$this->connection = connectionDB::getInstance();
	}

	public function insertServicos($servicos)
	{
		try {
			if (isset($_SESSION['idEstabelecimentoUSR'])) {
				$idEstabelecimento = $_SESSION['idEstabelecimentoUSR'];
			} else {
				$idEstabelecimento = $_SESSION['usridEstabelecimento'];
			}
			$status = $this->connection->prepare("Insert into servicos(id,nome,descricao,valor,duracao,idEstabelecimento)"
				. "values(null,?,?,?,?,?)");

			$status->bindValue(1, $servicos->nome);
			$status->bindValue(2, $servicos->descricao);
			$status->bindValue(3, $servicos->valor);
			$status->bindValue(4, $servicos->duracao);
			$status->bindValue(5, $idEstabelecimento);

			$status->execute();

			//Encerra a conexão com o banco
			$this->connection = null;
		} catch (PDOException $e) {
			echo "Ocorreram erros ao inserir o novo Servico!";
		}
	}
	public function searchServicos()
	{
		try {
			$codigo = $_GET['codigo'];
			$status = $this->connection->query("Select * From servicos where idEstabelecimento  = '$codigo'");

			$array = array();
			$array = $status->fetchAll(PDO::FETCH_OBJ);

			//Encerra a conexão com o banco
			$this->connection = null;

			return $array;
		} catch (PDOException $e) {
			echo "Ocorreram erros ao buscar Servicos" . $e;
		}
	}
	public function searchServicoPeloId($servico1)
	{
		try {
			$status = $this->connection->query("Select nome From servicos where id = '$servico1'");

			$array = array();
			$array = $status->fetchAll(PDO::FETCH_OBJ);

			//Encerra a conexão com o banco
			$this->connection = null;

			return $array;
		} catch (PDOException $e) {
			echo "Ocorreram erros ao buscar o Serviço" . $e;
		}
	}
	public function searchServicoPeloId2($servico2)
	{
		try {
			$status = $this->connection->query("Select nome From servicos where id = '$servico2'");

			$array = array();
			$array = $status->fetchAll(PDO::FETCH_OBJ);

			//Encerra a conexão com o banco
			$this->connection = null;

			return $array;
		} catch (PDOException $e) {
			echo "Ocorreram erros ao buscar o Serviço" . $e;
		}
	}
}
