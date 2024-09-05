<?php

require_once 'Conexao.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '\RECLAME_SAO_JOAO-INTEGRAR\modelo\Reclamacao.php');

class ReclamacaoDAO {

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

	public function pesquisarPorId($id)
	{
		$this->sql="select * from $this->tabela where REC_ID=$id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();	
	}

	public function numeroReclamacoesAteData($date, $id)
	{
		$this->sql = "select * from $this->tabela where rec_data_hora<'$date' and EST_ID=$id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$final = $this->resultado->fetchAll();
		return count($final);
	}

	public function pesquisarPorIdSolucionados($id) 
	{
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
	

	public function pesquisarEstabelecimento($id) 
	{
		$this->sql = "select * from $this->tabela join RESPOSTAS_RECLAMACOES where reclamacoes.EST_ID=$id and respostas_reclamacoes.REC_ID=reclamacoes.REC_ID";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		
		$reclamacoes = array();
		foreach ($this->resultado->fetchAll() as $linha)
		{
			$rec = new Reclamacoes();
			//$rec->setId($linha[REC_ID]);
			$rec->setDescricao($linha[REC_DESCRICAO]);
			$rec->setDate($linha['REC_DATA_HORA']);
			//$rec->setAprovado($linha[REC_APROVADO]);
			$rec->setTitulo($linha[REC_TITULO_RECLAMACAO]);
			$rec->setNota($linha['REC_NOTA']);
			$rec->setSolucao($linha['RER_STATUS_RESOLVIDO']);
			array_push($reclamacoes, $rec);
		}
		return $reclamacoes;
	}

	public function pesquisarEstabelecimentoSolucao($id) 
	{
		$this->sql = "select * from reclamacoes join respostas_reclamacoes where respostas_reclamacoes.rec_id= reclamacoes.rec_id and est_id=$id and rer_status_resolvido=0;";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$select = $this->resultado->fetchAll();
		return count($select);
	}

	public function pesquisarReclamacaoNaoSolucionada($id) 
		{

			$this->sql = "select * from reclamacoes join respostas_reclamacoes where respostas_reclamacoes.rec_id= reclamacoes.rec_id and est_id=$id and rer_status_resolvido=0;";
			$this->resultado = $this->conexao->prepare($this->sql);
			$this->resultado->execute();
			$select = $this->resultado->fetchAll();
			return count($select);
		}

    public function pequisarReclamacaoSolucionada($id) 
		{
			$this->sql = "select * from reclamacoes join respostas_reclamacoes where respostas_reclamacoes.rec_id= reclamacoes.rec_id and est_id=$id and rer_status_resolvido=1;";
			$this->resultado = $this->conexao->prepare($this->sql);
			$this->resultado->execute();
			$select = $this->resultado->fetchAll();
			return count($select);
		}
		
	public function pesquisarReclamacoes($idEst)
		{
			$this->sql="select * from $this->tabela join respostas_reclamacoes where respostas_reclamacoes.rec_id= reclamacoes.rec_id and est_id=$idEst and rer_status_resolvido=1;";
			$this->resultado= $this->conexao->prepare($this->sql);
			$this->resultado->execute();
			return $this->resultado->fetchAll();	
		}
		
	public function pesquisarTodasReclamacoes($idEst)
		{
			$this->sql="select * from $this->tabela join respostas_reclamacoes where respostas_reclamacoes.rec_id= reclamacoes.rec_id and est_id=$idEst;";
			$this->resultado= $this->conexao->prepare($this->sql);
			$this->resultado->execute();
			return $this->resultado->fetchAll();	
		}
		
	public function pesquisarReclamacoesAtendidas($idEst)
		{
			$this->sql="select * from reclamacoes join respostas_reclamacoes where respostas_reclamacoes.rec_id= reclamacoes.rec_id and est_id=$idEst and rer_status_resolvido=1;";
			$this->resultado= $this->conexao->prepare($this->sql);
			$this->resultado->execute();
			return $this->resultado->fetchAll();	
		}
	
	public function pesquisarReclamacoesNaoAtendidas($idEst)
		{
			$this->sql="select * from reclamacoes left join respostas_reclamacoes on respostas_reclamacoes.rec_id is null where respostas_reclamacoes.rec_id = reclamacoes.rec_id and est_id=$idEst ";
			$this->resultado= $this->conexao->prepare($this->sql);
			$this->resultado->execute();
			return $this->resultado->fetchAll();	
		}
		
		//MOD02 - CODIGO COMEÇA AQUI
		
		public function inserirReclamacao($reclamacao)
	{
		//$this->sql="insert into $this->tabela (REC_TITULO_RECLAMACAO, REC_DESCRICAO, REC_DATA_HORA, REC_LINK_IMAGEM, REC_APROVADO, REC_NOTA, ADM_ID, EST_ID, CON_ID) values (:REC_TITULO_RECLAMACAO, :REC_DESCRICAO, :REC_DATA_HORA, :REC_LINK_IMAGEM, 0, :REC_NOTA, 1, :EST_ID, 7)";
		//$this->resultado = $this->conexao->prepare($this->sql);

		$this->sql="insert into $this->tabela (REC_TITULO_RECLAMACAO, REC_DESCRICAO, REC_DATA_HORA, REC_LINK_IMAGEM, REC_NOTA, 
		REC_APROVADO, CON_ID, ADM_ID, EST_ID) values 
		(:REC_TITULO_RECLAMACAO, :REC_DESCRICAO, :REC_DATA_HORA, :REC_LINK_IMAGEM, :REC_NOTA_FORMATADA, :REC_APROVADO, :CON_ID, :ADM_ID, :EST_ID)";
		$this->resultado = $this->conexao->prepare($this->sql);


		$this->resultado->bindValue(':REC_TITULO_RECLAMACAO',$reclamacao->getREC_TITULO_RECLAMACAO());  
		$this->resultado->bindValue(':REC_DESCRICAO',$reclamacao->getREC_DESCRICAO()); 
		$this->resultado->bindValue(':REC_DATA_HORA',date("Y-m-d H:i",time())); 
		$this->resultado->bindValue(':REC_LINK_IMAGEM',$reclamacao->getREC_LINK_IMAGEM());
		$this->resultado->bindValue(':REC_NOTA_FORMATADA',$reclamacao->getREC_NOTA_FORMATADA()); 		
		$this->resultado->bindValue(':REC_APROVADO',$reclamacao->getREC_APROVADO());
		$this->resultado->bindValue(':ADM_ID',$reclamacao->getADM_ID()); 
		$this->resultado->bindValue(':EST_ID',$reclamacao->getEST_ID()); 
		$this->resultado->bindValue(':CON_ID',$reclamacao->getCON_ID()); 

		$this->resultado->execute();

	}
}
?>