<?php

require_once 'Conexao.php';
// require_once('..\modelo\Avaliacoes.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '\RECLAME_SAO_JOAO-INTEGRAR\modelo\Avaliacoes.php');


class AvaliacoesDAO {

	private $conexao;
	private $sql;
	private $post;
	private $resultado;
	private $tabela;

	public function __construct() 
	{
		$conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "AVALIACOES_ESTABELECIMENTOS";
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
		$this->sql = "select * from $this->tabela where AVA_ID=$id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$ava = new Avaliacoes();
		foreach ($this->resultado->fetchAll() as $linha){
			 $ava->setId($linha['AVA_ID']);
			 $ava->setDate($linha['AVA_DATA_HORA']);
			 $ava->setDescricao($linha['AVA_DESCRICAO']);
			 $ava->setEstId($linha['EST_ID']);
			 $ava->setNota($linha['AVA_NOTA']);
		}
		return $ava;
	}
	public function notas_estabelecimentos($id) {
		$this->sql = "SELECT AVA_NOTA FROM AVALIACOES_ESTABELECIMENTOS WHERE EST_ID =:id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id',$id);
		$this->resultado->execute();
		$resultado = $this->resultado->fetchAll();
		
		return $resultado;
	}
	public function total_notas($id) {
		$this->sql = "SELECT COUNT(AVA_ID) AS qtde FROM AVALIACOES_ESTABELECIMENTOS WHERE EST_ID =:id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id',$id);
		$this->resultado->execute();
		$resultado = $this->resultado->fetchAll();
		
		return $resultado;
	}
	public function descricoes_avaliacoes($id)
			{
				$this->sql = "SELECT AVA_DESCRICAO FROM avaliacoes_estabelecimentos WHERE EST_ID = :id";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->bindParam(':id',$id);
				$this->resultado->execute();
				$resultado = $this->resultado->fetchAll();
				return $resultado;
			}

	// public function numeroReclamacoesAteData($date, $id)
	// {
	// 	$this->sql = "select * from $this->tabela where rec_data_hora<'$date' and EST_ID=$id";
	// 	$this->resultado = $this->conexao->prepare($this->sql);
	// 	$this->resultado->execute();
	// 	$final = $this->resultado->fetchAll();
	// 	return count($final);
	// }

	// public function pesquisarPorIdSolucionados($id) {
	// 	$this->sql = "select * from $this->tabela join RESPOSTAS_RECLAMACOES where reclamacoes.REC_ID=$id and respostas_reclamacoes.REC_ID=$id";
	// 	$this->resultado = $this->conexao->prepare($this->sql);
	// 	$this->resultado->execute();
	// 	$rec = new Reclamacoes();
	// 	foreach ($this->resultado->fetchAll() as $linha){
	// 		//$rec->setId($linha[REC_ID]);
	// 		//$rec->setDescricao($linha[REC_DESCRICAO]);
	// 		$rec->setDate($linha['REC_DATA_HORA']);
	// 		//$rec->setAprovado($linha[REC_APROVADO]);
	// 		//$rec->setTitulo($linha[REC_TITULO_RECLAMACAO]);
	// 		$rec->setNota($linha['REC_NOTA']);
	// 		$rec->setSolucao($linha['RER_STATUS_RESOLVIDO']);
	// 	}
	// 	return $rec;
	// }
	

	// public function pesqusiarEstabelecimento($id) {
	// 	$this->sql = "select * from $this->tabela join RESPOSTAS_RECLAMACOES where reclamacoes.EST_ID=$id and respostas_reclamacoes.REC_ID=reclamacoes.REC_ID";
	// 	$this->resultado = $this->conexao->prepare($this->sql);
	// 	$this->resultado->execute();
		
	// 	$reclamacoes = array();
	// 	foreach ($this->resultado->fetchAll() as $linha){
	// 		$rec = new Reclamacoes();
	// 		//$rec->setId($linha[REC_ID]);
	// 		//$rec->setDescricao($linha[REC_DESCRICAO]);
	// 		$rec->setDate($linha['REC_DATA_HORA']);
	// 		//$rec->setAprovado($linha[REC_APROVADO]);
	// 		//$rec->setTitulo($linha[REC_TITULO_RECLAMACAO]);
	// 		$rec->setNota($linha['REC_NOTA']);
	// 		$rec->setSolucao($linha['RER_STATUS_RESOLVIDO']);
	// 		array_push($reclamacoes, $rec);
	// 	}
	// 	return $reclamacoes;
	// }

}
?>

