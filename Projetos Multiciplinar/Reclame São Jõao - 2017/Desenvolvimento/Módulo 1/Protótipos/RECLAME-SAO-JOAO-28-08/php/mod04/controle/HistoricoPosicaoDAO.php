<?php

	require_once 'Conexao.php';
	require_once '../model/HistoricoPosicao.php';

	class HistoricoPosicaoDAO{

	private $conexao;
	private $sql;
	private $tipos;
	private $resultado;
	private $tabela;


	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "HISTORICO_POSICAO";
    }

	public function inserirEstabelecimentos ($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="insert into $this->tabela (HIC_COLOCACAO, HIC_DATA_HORA, EST_ID) values (:colocacao, :dataHora, :Fkid)";
		$this->resultado = $this->conexao->prepare($this->sql);

    $this->resultado->bindParam(':colocacao',$this->tipos->getColocacao());
    $this->resultado->bindParam(':dataHora',$this->tipos->getDataHora());
		$this->resultado->bindParam(':Fkid',$this->tipos->getFkid());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function editarEstabelecimentos($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="update $this->tabela set HIC_COLOCACAO=:colocacao, HIC_DATA_HORA =:dataHora,EST_ID =:Fkid  where HIC_ID =:id";

		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindParam(':colocacao',$this->tipos->getColocacao());
    $this->resultado->bindParam(':dataHora',$this->tipos->getDataHora());
		$this->resultado->bindParam(':Fkid',$this->tipos->getFkid());
		$this->resultado->bindParam(':id',$this->tipos->getId());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function excluirEstabelecimentos($id)
	{
		$this->sql="delete from $this->tabela where HIC_ID=:id";

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
		$this->sql="select * from $this->tabela where HIC_ID=$id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}



	}



?>
