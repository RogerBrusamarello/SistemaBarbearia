<?php
class CidadeModel {
	private $id;
	private $estado_id;
	private $cod_ibge;
	private $nome;

	public function __construct(){}

	public function __set($key, $value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
}
?>