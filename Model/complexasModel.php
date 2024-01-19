<?php
require_once path."/pw2/model/operacoesModel.php";
/**
* operacao do tipo Complex
*/
class complexas extends operacoes{
	public $tempo;
	public $sala;
	public $cama;
	function __construct($data,$paciente,$condicao,$duracao,$estado,$cirugiao,$tempo,$sala,$cama){
		parent::__construct($data,$paciente,$condicao,$duracao,$estado,$cirugiao);
		$this->tempo=$tempo;
		$this->sala=$sala;
		$this->cama=$cama;
	}}
?>