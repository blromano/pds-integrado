<?php

	require_once 'Conexao.php';
	require_once '../modelo/Estabelecimentos.php';

	class EstabelecimentosDAO{

	private $conexao;
	private $sql;
	private $estabelecimento;
	private $resultado;
	private $tabela;


	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "ESTABELECIMENTOS";
    }

	public function inserirEstabelecimentos ($estabelecimento)
	{

		$this->estabelecimento = $estabelecimento;
		$this->sql="insert into $this->tabela (EST_NOME_ESTABELECIMENTO, EST_PONTUACAO, TES_ID) values (:NomeEstabelecimento, :Pontuacao, :TES_ID)";
		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindParam(':NomeEstabelecimento',$this->estabelecimento->getNomeEstabelecimento());
    // $this->resultado->bindParam(':DataCadastro',$this->estabelecimento->getDataCadastro());
    $this->resultado->bindParam(':Pontuacao',$this->estabelecimento->getPontuacao());
		$this->resultado->bindParam(':TES_ID',$this->estabelecimento->getTesID());
		$this->resultado->execute();

		return $this->resultado;
	}

	public function editarEstabelecimentos($estabelecimento)
	{
		$this->estabelecimento = $estabelecimento;
		$this->sql="update $this->tabela set EST_NOME_ESTABELECIMENTO=:NomeEstabelecimento, EST_DATA_CADASTRO =:DataCadastro ,EST_PONTUACAO =: Pontuacao  where EST_ID =:id";

		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindParam(':NomeEstabelecimento',$this->estabelecimento->getNomeEstabelecimento());
    $this->resultado->bindParam(':DataCadastro',$this->estabelecimento->getDataCadastro());
    $this->resultado->bindParam(':Pontuacao',$this->estabelecimento->getPontuacao());
		$this->resultado->bindParam(':id',$this->estabelecimento->getId());

		$this->resultado->execute();

		return $this->resultado;
	}

	public function excluirEstabelecimentos($id)
	{
		$this->sql="delete from $this->tabela where EST_ID=:id";

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
		$this->sql="select * from $this->tabela where EST_ID=$id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}



	}



?>
