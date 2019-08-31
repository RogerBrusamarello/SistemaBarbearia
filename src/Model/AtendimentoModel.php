<?php
class AtendimentoModel {
	
	private $id;
	private $horarioInicial;
	private $horarioFinal;
	private $compareceu;
	private $idCliente;
	private $valorTotal;

	public function __construct(){}

	public function __set($key, $value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
}
?>