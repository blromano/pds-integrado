<?php
class Post
{
	
	private $id;
	private $nome;
	private $comentario;
	
	public function __construct()
    {
        
    }
		
	public function getId() {
        return $this->id;
    }
	
	public function setId($id) {
        $this->id = $id;
    }
    
	public function getNome() {
        return $this->nome;
    }
	
	public function setNome($nome) {
        $this->nome = $nome;
    }
	
	public function getComentario() {
        return $this->comentario;
    }
	
	public function setComentario($comentario) {
        $this->comentario = $comentario;
    }
	   
}
  
?>

