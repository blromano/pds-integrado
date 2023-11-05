<?php
class Usuario
{
	
	private $idUsuario;
	private $nome_completo;
	private $email; 
	private $foto_perfil; 
	private $telefone; 
	private $senha; 
	
	
	public function __construct()
    {
        
    }
		
	public function getIdUsuario() {
        return $this->idUsuario;
    }
	
	public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    
	public function getNome_completo() {
        return $this->nome_completo;
    }
	
	public function setNome_completo($nome_completo) {
        $this->nome_completo = $nome_completo;
    }
	
	public function getEmail() {
        return $this->email;
    }
	
	public function setEmail($email) {
        $this->email = $email;
    }
	
	public function getFoto_Perfil() {
        return $this->foto_perfil;
    }
	
	public function setFoto_Perfil($foto_perfil) {
        $this->foto_perfil = $foto_perfil;
    }
	
	public function getTelefone () {
        return $this->telefone ;
    }
	
	public function setTelefone ($telefone) {
        $this->telefone  = $telefone ;
    }
	
	public function getSenha() {
        return $this->senha;
    }
	
	public function setsenha($senha) {
        $this->senha = $senha;
    }

}
  
?>

