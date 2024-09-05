<?php
class Usuario
{
	
	private $USU_ID;
	private $USU_NOME;
	private $USU_EMAIL; 
	private $USU_PERFIL; 
	private $USU_TELEFONE; 
	private $USU_SENHA; 
	private $USU_SENHA_NOVA; 
	private $USU_FOTO_PERFIL;
	
	
	public function __construct()
    {
        
    }
		
	public function getUSU_ID() {
        return $this->USU_ID;
    }
	
	public function setUSU_ID($USU_ID) {
        $this->USU_ID = $USU_ID;
    }
    
	public function getUSU_NOME() {
        return $this->USU_NOME;
    }
	
	public function setUSU_NOME($USU_NOME) {
        $this->USU_NOME = $USU_NOME;
    }
	
	public function getUSU_EMAIL() {
        return $this->USU_EMAIL;
    }
	
	public function setUSU_EMAIL($USU_EMAIL) {
        $this->USU_EMAIL = $USU_EMAIL;
    }
	
	public function getUSU_FOTO_PERFIL() {
        return $this->USU_FOTO_PERFIL;
    }
	
	public function setUSU_FOTO_PERFIL($USU_FOTO_PERFIL) {
        $this->USU_FOTO_PERFIL = $USU_FOTO_PERFIL;
    }
	
	public function getUSU_TELEFONE () {
        return $this->USU_TELEFONE ;
    }
	
	public function setUSU_TELEFONE ($USU_TELEFONE) {
        $this->USU_TELEFONE  = $USU_TELEFONE ;
    }
	
	public function getUSU_SENHA() {
        return $this->USU_SENHA;
    }
	
	public function setUSU_SENHA($USU_SENHA) {
        $this->USU_SENHA = $USU_SENHA;
    }
	
	public function getUSU_SENHA_NOVA() {
        return $this->USU_SENHA_NOVA;
    }
	
	public function setUSU_SENHA_NOVA($USU_SENHA_NOVA) {
        $this->USU_SENHA_NOVA = $USU_SENHA_NOVA;
    }

}
  
?>

