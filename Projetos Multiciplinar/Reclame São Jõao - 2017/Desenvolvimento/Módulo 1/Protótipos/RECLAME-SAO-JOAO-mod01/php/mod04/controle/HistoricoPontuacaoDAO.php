<?php

	require_once 'Conexao.php';
	require_once '../model/HistoricoPontuacao.php';

	class HistoricoPontuacaoDAO{

	private $conexao;
	private $sql;
	private $tipos;
	private $resultado;
	private $tabela;


	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "HISTORICO_PONTUACAO";
    }

	public function inserirHistoricoPontuacao ($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="insert into $this->tabela (HIP_PONTUACAO, HIP_DATA_HORA, EST_ID) values (:Pontuacao, :DataHora, :Fkid)";
		$this->resultado = $this->conexao->prepare($this->sql);

    $this->resultado->bindParam(':Pontuacao',$this->tipos->getPontuacao());
    $this->resultado->bindParam(':DataHora',$this->tipos->getDataHora());
		$this->resultado->bindParam(':Fkid',$this->tipos->getFkid());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function editarHistoricoPontuacao($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="update $this->tabela set HIP_PONTUACAO=:Pontuacao, HIP_DATA_HORA =:DataHora,EST_ID =:Fkid  where HIP_ID =:id";

		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindParam(':Pontuacao',$this->tipos->getPontuacao());
    $this->resultado->bindParam(':DataHora',$this->tipos->getDataHora());
		$this->resultado->bindParam(':Fkid',$this->tipos->getFkid());
		$this->resultado->bindParam(':id',$this->tipos->getId());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function excluirHistoricoPontuacao($id)
	{
		$this->sql="delete from $this->tabela where HIP_ID=:id";

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
		$this->sql="select * from $this->tabela where HIP_ID=$id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}



	}



?>
