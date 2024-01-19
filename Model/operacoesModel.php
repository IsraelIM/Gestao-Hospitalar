<?php
/**
* operações geal
*/
class operacoes{
	public $data;
	public $paciente;
	public $condicao; //Pode se Ugente ou Nao
	public $duracao; //Pode se Ugente ou Nao
	public $estado; //Pode se Bom Regular uim
	public $cirugiao;
	
	function __construct($data,$paciente,$condicao,$duracao,$estado,$cirugiao){
		$this->data=$data;
		$this->paciente=$paciente;
		$this->condicao=$condicao;
		$this->duracao=$duracao;
		$this->estado=$estado;
		$this->cirugiao=$cirugiao;
	}}
?>