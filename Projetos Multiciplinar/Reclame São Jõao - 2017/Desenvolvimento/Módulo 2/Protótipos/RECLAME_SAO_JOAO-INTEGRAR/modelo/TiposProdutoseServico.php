<?php
class TiposProdutoseServico
{
	
	private $id;
	private $Descricao;

	public function __construct()
    {
        
    }
		
	public function getId() {
        return $this->id;
    }
	
	public function setId($id) {
        $this->id = $id;
    }
    
	public function getDescricao() {
        return $this->Descricao;
    }
	
	public function setDescricao($Descricao) {
        $this->Descricao = $Descricao;
    }
	
}
  
?>

