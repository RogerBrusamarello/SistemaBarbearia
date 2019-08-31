<?php
class EstadoModel {
	
	private $id;
	private $uf;
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