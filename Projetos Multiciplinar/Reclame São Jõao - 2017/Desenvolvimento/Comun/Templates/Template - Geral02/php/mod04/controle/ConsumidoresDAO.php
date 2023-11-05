<?php

	require_once 'Conexao.php';
	require_once '../model/Consumidores.php';

	class ConsumidoresDAO{

	private $conexao;
	private $sql;
	private $tipos;
	private $resultado;
	private $tabela;


	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "CONSUMIDORES";
    }

	public function inserirConsumidores($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="insert into $this->tabela (CON_NOME) values (:Nome)";
		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindParam(':Nome',$this->tipos->getNome());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function editarConsumidores($tipos)
	{
		$this->tipos = $tipos;
		$this->sql="update $this->tabela set CON_NOME =:Nome where CON_ID =:id";

		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindParam(':Nome',$this->tipos->getNome());
		$this->resultado->bindParam(':id',$this->tipos->getId());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function excluirConsumidores($id)
	{
		$this->sql="delete from $this->tabela where CON_ID=:id";

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
		$this->sql="select * from $this->tabela where CON_ID=$id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}



	}



?>
