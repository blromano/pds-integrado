<?php
class TiposReclamacao
{
	
	private $id;
	private $categoria;

	public function __construct()
    {
        
    }
		
	public function getId() {
        return $this->id;
    }
	
	public function setId($id) {
        $this->id = $id;
    }
    
	public function getCategoria() {
        return $this->categoria;
    }
	
	public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
	
}
  
?>

