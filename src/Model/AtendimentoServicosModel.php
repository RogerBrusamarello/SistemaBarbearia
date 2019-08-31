<?php
class AtendimentoServicosModel {
	
	private $id;
	private $idAtendimento;
	private $idServicos;

	public function __construct(){}

	public function __set($key, $value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
}
?>