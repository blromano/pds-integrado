<?php

	require_once 'Conexao.php';
	require_once '../model/Reclamacao.php';

	class ReclamacaoDAO{

	private $conexao;
	private $sql;
	private $tipos;
	private $resultado;
	private $tabela;


	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "RECLAMACOES";
    }

	public function inserirReclamacao ($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="insert into $this->tabela (REC_PONTUCAO_RECLAMACAO,REC_DATA_RECLAMACAO,REC_CONTEUDO_RECLAMACAO,CON_ID,EST_ID) values (:PontuacaoReclamacao, :DataReclamacao,:ConteudoReclamacao ,:Fkid1,:Fkid2)";
		$this->resultado = $this->conexao->prepare($this->sql);

    $this->resultado->bindParam(':PontuacaoReclamacao',$this->tipos->getPontuacaoReclamacao());
    $this->resultado->bindParam(':DataReclamacao',$this->tipos->getDataReclamacao());
    $this->resultado->bindParam(':ConteudoReclamacao',$this->tipos->getConteudoReclamacao());
		$this->resultado->bindParam(':Fkid1',$this->tipos->getFkid1());
    $this->resultado->bindParam(':Fkid2',$this->tipos->getFkid2());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function editarReclamacao($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="update $this->tabela set EC_PONTUCAO_RECLAMACAO=:PontuacaoReclamacao,REC_DATA_RECLAMACAO=:DataReclamacao,REC_CONTEUDO_RECLAMACAO=:ConteudoReclamacao,CON_ID=:Fkid1,EST_ID=:Fkid2  where REC_ID =:id";

		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindParam(':PontuacaoReclamacao',$this->tipos->getPontuacaoReclamacao());
    $this->resultado->bindParam(':DataReclamacao',$this->tipos->getDataReclamacao());
    $this->resultado->bindParam(':ConteudoReclamacao',$this->tipos->getConteudoReclamacao());
		$this->resultado->bindParam(':Fkid1',$this->tipos->getFkid1());
    $this->resultado->bindParam(':Fkid2',$this->tipos->getFkid2());
		$this->resultado->bindParam(':id',$this->tipos->getId());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function excluirReclamacao($id)
	{
		$this->sql="delete from $this->tabela where REC_ID=:id";

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
		$this->sql="select * from $this->tabela where REC_ID=$id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}



	}



?>
