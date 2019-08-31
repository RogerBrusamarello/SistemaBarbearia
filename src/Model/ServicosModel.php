<?php
class ServicosModel {
	
	private $id;
	private $nome;
	private $descricao;
	private $valor;
	private $duracao;
	private $idEstabelecimento;

	public function __construct(){}

	public function __set($key, $value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
}
?>