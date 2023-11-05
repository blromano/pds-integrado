<?php
class Localizacao
{
	
	private $LOC_ID;
	private $LOC_ESTADO; 
	private $LOC_RUA; 
	private $LOC_BAIRRO; 
	private $LOC_CEP; 
	private $LOC_CIDADE;
	
	
	public function __construct()
    {
        
    }
		
	public function getLOC_ID() {
        return $this->LOC_ID;
    }
	
	public function setLOC_ID($LOC_ID) {
        $this->LOC_ID = $LOC_ID;
	}
	
	public function getLOC_ESTADO() {
        return $this->LOC_ESTADO;
    }
	
	public function setLOC_ESTADO($LOC_ESTADO) {
        $this->LOC_ESTADO = $LOC_ESTADO;
    }
	
	public function getLOC_RUA() {
        return $this->LOC_RUA;
    }
	
	public function setLOC_RUA($LOC_RUA) {
        $this->LOC_RUA = $LOC_RUA;
    }
	
	public function getLOC_BAIRRO() {
        return $this->LOC_BAIRRO;
    }
	
    public function setLOC_BAIRRO($LOC_BAIRRO) {
        $this->LOC_BAIRRO= $LOC_BAIRRO;
    }
	
	public function getLOC_CEP() {
        return $this->LOC_CEP;
    }
	
	public function setLOC_CEP($LOC_CEP) {
        $this->LOC_CEP = $LOC_CEP;
    }
	
	public function getLOC_CIDADE() {
        return $this->LOC_CIDADE;
    }
	
	public function setLOC_CIDADE($LOC_CIDADE) {
        $this->LOC_CIDADE = $LOC_CIDADE;
    }
	   
}
  
?>

