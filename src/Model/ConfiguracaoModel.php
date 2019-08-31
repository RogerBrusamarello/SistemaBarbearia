<?php
class ConfiguracaoModel {
	
	private $idEstabelecimento;
	private $diaSemana;
	private $horaManhaInicio;
	private $horaManhaFim;
	private $horaTardeInicio;
    private $horaTardeFim;

	public function __construct(){}

	public function __set($key, $value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
}
?>