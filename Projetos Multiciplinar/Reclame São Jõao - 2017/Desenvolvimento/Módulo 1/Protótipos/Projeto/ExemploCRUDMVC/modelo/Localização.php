<?php
class Usuario
{
	
	private $loc_id;
	private $loc_estado; 
	private $loc_rua; 
	private $loc_bairro; 
	private $loc_cep; 
	private $loc_cidade;
	
	
	public function __construct()
    {
        
    }
		
	public function getLoc_Id() {
        return $this->loc_id;
    }
	
	public function setLoc_Id($loc_id) {
        $this->loc_id = $loc_id;
    }
	
	public function getLoc_Estado() {
        return $this->loc_estado;
    }
	
	public function setLoc_Estado($loc_estado) {
        $this->loc_estado = $loc_estado;
    }
	
	public function getLoc_Rua() {
        return $this->loc_rua;
    }
	
	public function setLoc_Rua($loc_rua) {
        $this->loc_rua = $loc_rua;
    }
	
	public function getLoc_Bairro() {
        return $this->loc_bairro;
    }
	
    public function setLoc_Bairro($loc_bairro) {
        $this->loc_bairro= $loc_bairro;
    }
	
	public function getLoc_Cep() {
        return $this->loc_cep;
    }
	
	public function setLoc_Cep($loc_cep) {
        $this->loc_cep = $loc_cep;
    }
	
	public function getLoc_Cidade() {
        return $this->loc_cidade;
    }
	
	public function setLoc_idade($loc_cidade) {
        $this->loc_cidade = $loc_cidade;
    }
	   
}
  
?>

