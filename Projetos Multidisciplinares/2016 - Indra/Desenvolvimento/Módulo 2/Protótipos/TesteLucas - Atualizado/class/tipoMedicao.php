<?php 
class tipoMedicao{
	
	private $id;
	private $tipoMedicao;
	
	public function __construct($id, $tipoMedicao)
	{
		$this->id = $id;
		$this->tipoMedicao = $tipoMedicao;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getTipoMedicao(){
		return $this->tipoMedicao;		
	}
	
	public function setTipoMedicao($tipoMedicao){
		$this->tipoMedicao = $tipoMedicao;
	}
}
?>