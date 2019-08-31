<?php
class ConnectionDB extends PDO {
	private static $instance = null;

	public function ConnectionDB($dsn, $usuario, $senha) {
		//Construtor da classe pai (parent) -> PDO
		parent::__construct($dsn, $usuario, $senha);
	}

	public static function getInstance(){
		if(!isset(self::$instance)) {
			try {
				//Cria uma conexão e retorna a instância dela
				self::$instance = new ConnectionDB("mysql:dbname=barber_test_db;host=54.39.123.196;charset=utf8","root","casca123@DEVS");
			} catch (Exception $e) {
				echo "$e";
				exit();
			}
		}
		return self::$instance;
	}	
}
?>