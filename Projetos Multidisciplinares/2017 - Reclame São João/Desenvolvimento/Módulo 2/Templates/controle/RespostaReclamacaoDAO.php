<?php
	
	require_once 'Conexao.php';

	
	class RespostaReclamacaoDAO {
	
	private $conexao;
	private $sql;
	private $RespostasReclamacoes;
	private $resultado;
	private $tabela;
	
		
	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "respostas_reclamacoes";
    }
	
	public function inserir($RespostasReclamacoes)
	{
		$this->RespostasReclamacoes = $RespostasReclamacoes;		
		$this->sql="insert into $this->tabela (RER_DESCRICAO, RER_ID, RER_STATUS_RESOLVIDO, ADM_ID, REC_ID) values (:RER_DESCRICAO, 1, :RER_ADM, :REC_ID)";	
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':RER_DESCRICAO',$this->RespostasReclamacoes->getRER_DESCRICAO());
		$this->resultado->bindParam(':ADM_ID',$this->RespostasReclamacoes->getADM_ID());
		$this->resultado->bindParam(':REC_ID',$this->RespostasReclamacoes->getREC_ID());
		
		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function editar($RespostasReclamacoes)
	{
		$this->RespostasReclamacoes = $RespostasReclamacoes;		
		$this->sql="update $this->tabela set RER_DESCRICAO=:RER_DESCRICAO where RER_ID=:RER_ID";		
		
		$this->resultado = $this->conexao->prepare($this->sql);
		
		$this->resultado->bindParam(':RER_DESCRICAO',$this->RespostasReclamacoes->getRER_DESCRICAO());
		$this->resultado->bindParam(':RER_ID',$this->RespostasReclamacoes->getRER_ID());

		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function editarResposta($RespostasReclamacoes) 
	{
        $this->RespostasReclamacoes = $RespostasReclamacoes;
        $this->sql = "update $this->tabela set RER_DESCRICAO=:RER_DESCRICAO where RER_ID =:RER_ID";

        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->bindParam(':RER_DESCRICAO', $this->RespostasReclamacoes->getRER_DESCRICAO());
		$this->resultado->bindParam(':RER_ID', $this->RespostasReclamacoes->getRER_ID());

        $this->resultado->execute();

		echo "ok";
        return $this->resultado;
    }
	
	public function excluirResposta($RespostasReclamacoes) {
        $this->sql = "delete from $this->tabela where RER_ID =:RER_ID";

        $this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':RER_ID', $RespostasReclamacoes);

        $this->resultado->execute();

        return $this->resultado;
    }
	
	//public function excluir($id)
	//{		
		//$this->sql="delete from $this->tabela where RER_ID=:id";
		//$this->sql="update $this->tabela set RER_STATUS_APROVADO=:RER_STATUS_APROVADO where RER_ID=:RER_ID";
		//$this->resultado = $this->conexao->prepare($this->sql);
		//$this->resultado->bindParam('RER_STATUS_APROVADO',$var);
		//$this->resultado->bindParam(':RER_ID',$var);
		
		//$this->resultado->execute();
		
		//return $this->resultado;	
	//}
	
	public function inserirResposta($RespostasReclamacoes) 
	{
        $this->RespostasReclamacoes = $RespostasReclamacoes;
        $this->sql = "insert into $this->tabela (RER_DESCRICAO, REC_ID, ADM_ID) values (:RER_DESCRICAO, :REC_ID, :ADM_ID)";
        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->bindParam(':RER_DESCRICAO', $this->RespostasReclamacoes->getRER_DESCRICAO());
		$this->resultado->bindParam(':REC_ID', $this->RespostasReclamacoes->getREC_ID());
		$this->resultado->bindParam(':ADM_ID', $this->RespostasReclamacoes->getADM_ID());

        $this->resultado->execute();

        return $this->resultado;
    }
	
	public function listar()
	{
		$this->sql="select * from $this->tabela WHERE RER_STATUS_APROVADO = 1";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();	
	}
	
	public function pesquisarPorId($id) {
        $this->sql = "select * from $this->tabela where RER_ID=$id";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
	}
	   

  
?>

