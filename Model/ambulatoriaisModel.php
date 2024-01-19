<?php
require_once path."/pw2/model/operacoesModel.php";
/**
* operacao do tipo ambulatoriais
*/
class ambulatoriais extends operacoes{	
	public $dconsult;
	public $policlinica;
	
	function __construct($data,$paciente,$condicao,$duracao,$estado,$cirugiao,$dconsult,$policlinica){
		parent::__construct($data,$paciente,$condicao,$duracao,$estado,$cirugiao);
		$this->dconsult=$dconsult;
		$this->policlinica=$policlinica;
	}}
?>