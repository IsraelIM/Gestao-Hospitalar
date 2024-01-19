<?php
/**
* Paciente
*/
class Paciente{	
	public $id;
	public $nome;
	public $idade;
	public $sexo;
	public $estado; // Pode ser Grave Crontrolado Saudavel
	function __construct($nome,$idade,$sexo,$estado){
		$this->nome=$nome;
		$this->idade=$idade;
		$this->sexo=$sexo;
		$this->estado=$estado;
	}
}
?>