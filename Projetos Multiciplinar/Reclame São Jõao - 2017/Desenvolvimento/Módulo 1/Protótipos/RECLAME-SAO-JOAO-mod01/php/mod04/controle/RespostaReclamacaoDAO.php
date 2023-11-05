<?php

	require_once 'Conexao.php';
	require_once '../model/RespostaReclamacao.php';

	class RespostaReclamacaoDAO{

	private $conexao;
	private $sql;
	private $tipos;
	private $resultado;
	private $tabela;


	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "RESPOSTA_RECLAMACAO";
    }

	public function inserirRespostaReclamacao($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="insert into $this->tabela (RER_STATUS_RESOLVIDO,RER_DATA_HORA,REC_ID) values (:StatusResolvido, :DataHora ,:Fkid)";
		$this->resultado = $this->conexao->prepare($this->sql);

    $this->resultado->bindParam(':StatusResolvido',$this->tipos->getStatusResolvido());
    $this->resultado->bindParam(':DataHora',$this->tipos->getDataHora());
		$this->resultado->bindParam(':Fkid',$this->tipos->getFkid());


		$this->resultado->execute();

		return $this->resultado;
	}

	public function editarRespostaReclamacao($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="update $this->tabela set RER_STATUS_RESOLVIDO=: StatusResolvido ,RER_DATA_HORA=: DataHora ,REC_ID=: Fkid  where RER_ID =:id";

		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindParam(':StatusResolvido',$this->tipos->getStatusResolvido());
    $this->resultado->bindParam(':DataHora',$this->tipos->getDataHora());
		$this->resultado->bindParam(':Fkid',$this->tipos->getFkid());
		$this->resultado->bindParam(':id',$this->tipos->getId());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function excluirRespostaReclamacao($id)
	{
		$this->sql="delete from $this->tabela where RER_ID=:id";

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
		$this->sql="select * from $this->tabela where RER_ID=$id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}



	}



?>
