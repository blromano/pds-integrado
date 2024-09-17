<?php

	require_once 'Conexao.php';
	require_once '../model/ReunioesAgendadas.php';

	class ReunioesAgendadasDAO{

	private $conexao;
	private $sql;
	private $tipos;
	private $resultado;
	private $tabela;


	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "REUNIOES_AGENDADAS";
    }

	public function inserirReunioesAgendadas($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="insert into $this->tabela (REU_DATA_HORA, REU_REPRESENTANTES, REU_LOCAL, REU_ASSUNTO_PAUTADO, EST_ID, REC_ID, CON_ID) values (:dataHora, :representantes, :local, :assuntoPautado, :fk1id, :fk2id, :fk3id)";
		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindParam(':dataHora',$this->tipos->getDataHora());
    $this->resultado->bindParam(':representantes',$this->tipos->getRepresentantes());
    $this->resultado->bindParam(':local',$this->tipos->getLocal());
    $this->resultado->bindParam(':assuntoPautado',$this->tipos->getAssuntoPautado());
    $this->resultado->bindParam(':fk1id',$this->tipos->getfk1id());
    $this->resultado->bindParam(':fk2id',$this->tipos->getfk2id());
    $this->resultado->bindParam(':fk3id',$this->tipos->getfk3id());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function editarReunioesAgendadas($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="update $this->tabela set REU_DATA_HORA=: dataHora, REU_REPRESENTANTES=: representantes, REU_LOCAL=: local, REU_ASSUNTO_PAUTADO=: assuntoPautado, EST_ID=: fk1id, REC_ID=: fk2id, CON_ID=:fk3id where REU_ID =:id";

		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id',$this->tipos->getId());
    $this->resultado->bindParam(':fk1id',$this->tipos->getfk1id());
    $this->resultado->bindParam(':fk2id',$this->tipos->getfk2id());
    $this->resultado->bindParam(':fk3id',$this->tipos->getfk3id());
    $this->resultado->bindParam(':dataHora',$this->tipos->getDataHora());
    $this->resultado->bindParam(':representantes',$this->tipos->getRepresentantes());
    $this->resultado->bindParam(':local',$this->tipos->getLocal());
    $this->resultado->bindParam(':assuntoPautado',$this->tipos->getAssuntoPautado());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function excluirReunioesAgendadas($id)
	{
		$this->sql="delete from $this->tabela where REU_ID=:id";

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
		$this->sql="select * from $this->tabela where REU_ID=$id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}



	}



?>
