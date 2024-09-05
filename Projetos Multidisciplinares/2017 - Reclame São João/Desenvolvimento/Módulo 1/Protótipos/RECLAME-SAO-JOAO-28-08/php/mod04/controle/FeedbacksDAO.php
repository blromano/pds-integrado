<?php

	require_once 'Conexao.php';
	require_once '../model/Feeedbacks.php';

	class FeeedbacksDAO{

	private $conexao;
	private $sql;
	private $tipos;
	private $resultado;
	private $tabela;


	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "FEEDBACKS";
    }

	public function inserirFeeedbacks ($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="insert into $this->tabela (FEE_DATA_HORA, FEE_PROBLEMA, FEE_SOLUCOES_DEFEINIDAS, FEE_STATUS_RESOLVIDO, REU_ID) values (:dataHora, :problema, : solucoesDefinidas, :statusResolvido, :fkid)";
		$this->resultado = $this->conexao->prepare($this->sql);

    $this->resultado->bindParam(':dataHora',$this->tipos->getDataHora());
    $this->resultado->bindParam(':problema',$this->tipos->getProblema());
		$this->resultado->bindParam(':solucoesDefinidas',$this->tipos->getSolucoesDefinidas());
		$this->resultado->bindParam(':statusResolvido',$this->tipos->getStatusResolvido());
		$this->resultado->bindParam(':fkid',$this->tipos->getFkid());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function editarFeeedbacks($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="update $this->tabela set FEE_DATA_HORA =: dataHora, FEE_PROBLEMA =: problema, FEE_SOLUCOES_DEFEINIDAS = :solucoesDefinidas, FEE_STATUS_RESOLVIDO =: statusResolvido, REU_ID=: fkid where FEE_ID =:id";

		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindParam(':dataHora',$this->tipos->getDataHora());
    $this->resultado->bindParam(':problema',$this->tipos->getProblema());
		$this->resultado->bindParam(':solucoesDefinidas',$this->tipos->getSolucoesDefinidas());
		$this->resultado->bindParam(':statusResolvido',$this->tipos->getStatusResolvido());
		$this->resultado->bindParam(':fkid',$this->tipos->getFkid());
		$this->resultado->bindParam(':id',$this->tipos->getId());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function excluirFeeedbacks($id)
	{
		$this->sql="delete from $this->tabela where FEE_ID=:id";

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
		$this->sql="select * from $this->tabela where FEE_ID=$id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}



	}



?>
