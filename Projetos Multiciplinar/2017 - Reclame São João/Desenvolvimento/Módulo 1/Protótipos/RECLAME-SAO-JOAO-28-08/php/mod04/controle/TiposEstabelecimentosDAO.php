<?php
	
	require_once 'Conexao.php';
	require_once '../model/TiposEstabelecimentos.php';
	
	class TiposEstabelecimentosDAO{
	
	private $conexao;
	private $sql;
	private $tipos;
	private $resultado;
	private $tabela;
	
		
	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "TIPOS_ESTABELECIMENTOS";
    }
	
	public function inserirTiposEstabelecimentos($tipos)
	{
		$this->tipos = $tipos;		
		$this->sql="insert into $this->tabela (TES_CATEGORIA) values (:Categoria)";		
		$this->resultado = $this->conexao->prepare($this->sql);
		
		$this->resultado->bindParam(':Categoria',$this->tipos->getCategoria());

		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function editarTiposEstabelecimentos($tipos)
	{
		$this->tipos = $tipos;		
		$this->sql="update $this->tabela set TES_CATEGORIA =:Categoria where TES_ID =:id";		
		
		$this->resultado = $this->conexao->prepare($this->sql);
		
		$this->resultado->bindParam(':Categoria',$this->tipos->getCategoria());;
		$this->resultado->bindParam(':id',$this->tipos->getId());

		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function excluirTiposEstabelecimentos($id)
	{		
		$this->sql="delete from $this->tabela where TES_ID=:id";		
		
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
		$this->sql="select * from $this->tabela where TES_ID=$id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();	
	}		


	
	}
	   

  
?>

