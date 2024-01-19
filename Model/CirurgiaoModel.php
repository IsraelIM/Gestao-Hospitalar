<?php
/**
* Cirurgioa
*/
class Cirurgiao{
	public $nome;
	public $idade;
	public $sexo;
	public $especialidade;
	public $experiencia;
	function __construct($nome,$idade,$sexo,$especialidade,$experiencia){
		$this->nome=$nome;
		$this->idade=$idade;
		$this->sexo=$sexo;
		$this->especialidade=$especialidade;
		$this->experiencia=$experiencia;
	}}
?>