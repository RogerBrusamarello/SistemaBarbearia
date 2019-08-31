<?php
class EstabelecimentoModel {
	
	private $id;
	private $nomeFantasia;
	private $razaoSocial;
	private $cnpj;
	private $cidade;
	private $horaManhaIncio1;
	private $horaManhaFim1;
	private $horaTardeIncio1;
	private $horaTardeFim1;
	private $horaManhaIncio2;
	private $horaManhaFim2;
	private $horaTardeIncio2;
	private $horaTardeFim2;
	private $horaManhaIncio3;
	private $horaManhaFim3;
	private $horaTardeIncio3;
	private $horaTardeFim3;
	private $horaManhaIncio4;
	private $horaManhaFim4;
	private $horaTardeIncio4;
	private $horaTardeFim4;
	private $horaManhaIncio5;
	private $horaManhaFim5;
	private $horaTardeIncio5;
	private $horaTardeFim5;
	private $horaManhaIncio6;
	private $horaManhaFim6;
	private $horaTardeIncio6;
	private $horaTardeFim6;
	private $horaManhaIncio7;
	private $horaManhaFim7;
	private $horaTardeIncio7;
	private $horaTardeFim7;
	
	public function __construct(){}

	public function __set($key, $value){
		$this->$key = $value;
	}
	public function __get($key){
		return $this->$key;
	}
}
