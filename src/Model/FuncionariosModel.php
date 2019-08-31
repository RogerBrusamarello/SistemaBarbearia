<?php
class FuncionariosModel {
	
	private $id;
	private $nome;	
	private $estabelecimento;


	public function __construct(){}

	public function __set($key, $value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
}
?>