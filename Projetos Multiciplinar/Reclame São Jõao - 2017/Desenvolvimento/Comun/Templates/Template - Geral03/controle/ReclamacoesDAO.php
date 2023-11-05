<?php

require_once 'Conexao.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '\MVC\modelo\Reclamacoes.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '\MVC\modelo\NumReclamacoes.php');


class ReclamacoesDAO {

	private $conexao;
	private $sql;
	private $post;
	private $resultado;
	private $tabela;

	public function __construct() 
	{
		$conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "RECLAMACOES";
	}



	public function listarTodos() 
	{
		$this->sql = "select * from $this->tabela";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}

	public function quantidadeSelect() 
	{
		$valor=$this->listarTodos();
		return count($valor);
	}


	public function pesquisarPorId($id) {
		$this->sql = "select * from $this->tabela where REC_ID=$id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$rec = new Reclamacoes();
		foreach ($this->resultado->fetchAll() as $linha){
			 $rec->setId($linha['REC_ID']);
			 $rec->setDate($linha['REC_DATA_HORA']);
			 $rec->setAprovado($linha['REC_APROVADO']);
			 $rec->setTitulo($linha['REC_TITULO_RECLAMACAO']);
			 $rec->setNota($linha['REC_NOTA']);
		}
		return $rec;
	}

	 // select * from reclamacoes join respostas_reclamacoes where reclamacoes.rec_id=10 and respostas_reclamacoes.rec_id=10;
	// select * from reclamacoes where rec_data_hora<'2014-02-13';

	public function numeroReclamacoesAteData($date, $id)
	{
		$this->sql = "select * from $this->tabela where rec_data_hora<'$date' and EST_ID=$id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$final = $this->resultado->fetchAll();
		return count($final);
	}




	public function pesquisarPorIdSolucionados($id) {
		$this->sql = "select * from $this->tabela join RESPOSTAS_RECLAMACOES where reclamacoes.REC_ID=$id and respostas_reclamacoes.REC_ID=$id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$rec = new Reclamacoes();
		foreach ($this->resultado->fetchAll() as $linha){
			//$rec->setId($linha[REC_ID]);
			//$rec->setDescricao($linha[REC_DESCRICAO]);
			$rec->setDate($linha['REC_DATA_HORA']);
			//$rec->setAprovado($linha[REC_APROVADO]);
			//$rec->setTitulo($linha[REC_TITULO_RECLAMACAO]);
			$rec->setNota($linha['REC_NOTA']);
			$rec->setSolucao($linha['RER_STATUS_RESOLVIDO']);
		}
		return $rec;
	}
	

	public function pesqusiarEstabelecimento($id) {
		$this->sql = "select * from $this->tabela join RESPOSTAS_RECLAMACOES where reclamacoes.EST_ID=$id and respostas_reclamacoes.REC_ID=reclamacoes.REC_ID";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		
		$reclamacoes = array();
		foreach ($this->resultado->fetchAll() as $linha){
			$rec = new Reclamacoes();
			//$rec->setId($linha[REC_ID]);
			//$rec->setDescricao($linha[REC_DESCRICAO]);
			$rec->setDate($linha['REC_DATA_HORA']);
			//$rec->setAprovado($linha[REC_APROVADO]);
			//$rec->setTitulo($linha[REC_TITULO_RECLAMACAO]);
			$rec->setNota($linha['REC_NOTA']);
			$rec->setSolucao($linha['RER_STATUS_RESOLVIDO']);
			array_push($reclamacoes, $rec);
		}
		return $reclamacoes;
	}

	public function pesquisarEstabelecimentoSolucao($id) {


		$this->sql = "select * from reclamacoes join respostas_reclamacoes where respostas_reclamacoes.rec_id= reclamacoes.rec_id and est_id=$id and rer_status_resolvido=0;";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$select = $this->resultado->fetchAll();
		return count($select);
	}

	// public function pesquisarPorCnpj($cnpj) 
	// {
	// 	$this->sql = "select * from $this->tabela where EST_CNPJ=:cnpj";
	// 	$this->resultado = $this->conexao->prepare($this->sql);
	// 	$this->resultado->bindParam(':cnpj', $cnpj);
	// 	$this->resultado->execute();
	// 	return $this->resultado->fetch(PDO::FETCH_ASSOC);
	// }

}
?>

