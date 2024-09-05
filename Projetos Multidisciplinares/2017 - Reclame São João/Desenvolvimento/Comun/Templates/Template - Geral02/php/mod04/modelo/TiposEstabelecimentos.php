<?php 
class TiposEstabelecimentos{
	private $id;
	private $Categoria;
	
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
        return $this->Categoria;
    }
	
	public function setCategoria($Categoria) {
        $this->Categoria = $Categoria;
    }
	
}

?>