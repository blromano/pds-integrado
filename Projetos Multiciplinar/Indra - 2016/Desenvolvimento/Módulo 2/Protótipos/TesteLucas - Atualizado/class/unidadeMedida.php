<?php 
class unidadeMedida{
	
	private $id;
	private $unidadeMedida;
	private $descricao;
	
	public function __construct($id, $unidadeMedida, $descricao)
	{
		$this->id = $id;
		$this->unidadeMedida = $unidadeMedida;
		$this->descricao = $descricao;		
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getUnidadeMedida(){
		return $this->unidadeMedida;		
	}
	
	public function setUnidadeMedida($unidadeMedida){
		$this->unidadeMedida = $unidadeMedida;
	}
	
	public function getDescricao(){
		return $this->descricao;
	}
	
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	
	
}
?>