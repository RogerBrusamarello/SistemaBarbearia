<?php
class ClienteModel {
	
	private $id;
	private $nome;
	private $sobrenome;
	private $cidade;
	private $telefone;
	private $email;
	private $senha;
	private $admin;

	public function __construct(){}

	public function __set($key, $value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
}
?>