<?php
	
	require_once 'Conexao.php';
	require_once '../modelo/Post.php';
	
	class PostDAO {
	
	private $conexao;
	private $sql;
	private $post;
	private $resultado;
	private $tabela;
	
		
	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "post";
    }
	
	public function inserirPost($post)
	{
		$this->post = $post;		
		$this->sql="insert into $this->tabela (nome, comentario) values (:nome,:comentario)";		
		$this->resultado = $this->conexao->prepare($this->sql);
		
		$this->resultado->bindParam(':nome',$this->post->getNome());
		$this->resultado->bindParam(':comentario',$this->post->getComentario());

		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function editarPost($post)
	{
		$this->post = $post;		
		$this->sql="update $this->tabela set nome=:nome,comentario=:comentario where idpost=:id";		
		
		$this->resultado = $this->conexao->prepare($this->sql);
		
		$this->resultado->bindParam(':nome',$this->post->getNome());
		$this->resultado->bindParam(':comentario',$this->post->getComentario());
		$this->resultado->bindParam(':id',$this->post->getId());

		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function excluirPost($id)
	{		
		$this->sql="delete from $this->tabela where idpost=:id";		
		
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id',$id);

		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function listarTodos()
	{
		$this->sql="select * from $this->tabela";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();	
	}

	public function pesquisarPorId($id)
	{
		$this->sql="select * from $this->tabela where idpost=$id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();	
	}		


	
	}
	   

  
?>

