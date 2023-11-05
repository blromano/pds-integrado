<?php
	
	require_once 'Conexao.php';
	//require_once '../modelo/TiposReclamacao.php';
	
	class TiposReclamacaoDAO {
	
	private $conexao;
	private $sql;
	private $tiposReclamacao;
	private $resultado;
	private $tabela;
	
		
	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "TIPOS_RECLAMACOES";
    }
	
	public function inserir($tiposReclamacao)
	{
		$this->tiposReclamacao = $tiposReclamacao;		
		$this->sql="insert into $this->tabela (TPR_CATEGORIA) values (:categoria)";		
		$this->resultado = $this->conexao->prepare($this->sql);
		
		$this->resultado->bindParam(':categoria',$this->tiposReclamacao->getCategoria());

		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function editar($tiposReclamacao)
	{
		$this->tiposReclamacao = $tiposReclamacao;		
		$this->sql="update $this->tabela set TPR_CATEGORIA=:categoria,TPR_ATIVO=:status where TPR_ID=:id";		
		
		$this->resultado = $this->conexao->prepare($this->sql);
		
		$this->resultado->bindParam(':categoria',$this->tiposReclamacao->getCategoria());
		$this->resultado->bindParam(':status',$this->tiposReclamacao->getStatus());
		$this->resultado->bindParam(':id',$this->tiposReclamacao->getId());

		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function excluir($id)
	{		
		$this->sql="delete from $this->tabela where TPR_ID=:id";		
		
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id',$id);

		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function listar()
	{
		$this->sql="select * from $this->tabela";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();	
	}
	
	public function pesquisar_igual($categoria, $id = 0)
	{      
		$this->sql="select * from $this->tabela WHERE TPR_CATEGORIA=:categoria AND TPR_ID != :id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':categoria',$categoria);
		$this->resultado->bindParam(':id',$id);
		$this->resultado->execute();
		if(($this->resultado->rowCount()) > 0){ 
			return 1;
		} else {
			return 0;
		}
	}

	
	}
	   

  
?>

