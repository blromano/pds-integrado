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
	
	public function inserir($tiposReclamacao,$vincular)
	{
		$this->tiposReclamacao = $tiposReclamacao;	
		$this->sql="insert into $this->tabela (TRC_CATEGORIA, TES_ID) values (:categoria, :vincular)";			
		$this->resultado = $this->conexao->prepare($this->sql);
                
		$this->resultado->bindParam(':categoria',$this->tiposReclamacao->getCategoria());
		$this->resultado->bindParam(':vincular',$vincular);

		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function editar($tiposReclamacao,$vincular)
	{
		$this->tiposReclamacao = $tiposReclamacao;		
		$this->sql="update $this->tabela set TRC_CATEGORIA=:categoria,TES_ID=:vincular where TRC_ID=:id";		
		
		$this->resultado = $this->conexao->prepare($this->sql);
		
		$this->resultado->bindParam(':categoria',$this->tiposReclamacao->getCategoria());
		$this->resultado->bindParam(':vincular',$vincular);
		$this->resultado->bindParam(':id',$this->tiposReclamacao->getId());

		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function excluir($id)
	{		
		$this->sql="delete from $this->tabela where TRC_ID=:id";		
		
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id',$id);

		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function listar()
	{
		$this->sql="select * from $this->tabela LEFT JOIN TIPOS_ESTABELECIMENTOS ON $this->tabela.TES_ID = TIPOS_ESTABELECIMENTOS.TES_ID";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}

	public function pesquisar_igual($categoria, $id = 0)
	{      
		$this->sql="select * from $this->tabela WHERE TRC_CATEGORIA=:categoria AND TRC_ID != :id";
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

