<?php

	require_once 'Conexao.php';

	require_once($_SERVER['DOCUMENT_ROOT'] . '\RECLAME_SAO_JOAO-INTEGRAR\modelo\Avaliacoes.php');

	class AvaliacoesDAO 
		{

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
				
			public function HistoricoAvaliacoes($est_id) 
				{
					$this->sql = "select * from $this->tabela WHERE EST_ID=:est_id ";
					
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindValue(':est_id',$est_id);
					
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
					$this->sql = "select * from $this->tabela where AVA_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					$ava = new Avaliacoes();
					foreach ($this->resultado->fetchAll() as $linha)
						{
							 $ava->setId($linha['AVA_ID']);
							 $ava->setDate($linha['AVA_DATA_HORA']);
							 $ava->setDescricao($linha['AVA_DESCRICAO']);
							 $ava->setEstId($linha['EST_ID']);
							 $ava->setNota($linha['AVA_NOTA']);
						}
					return $ava;
				}
		
			public function nota_estabelecimento($id) 
				{
					$this->sql = "SELECT AVA_NOTA FROM AVALIACOES_ESTABELECIMENTOS WHERE EST_ID =:id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':id',$id);
					$this->resultado->execute();
					$resultado = $this->resultado->fetchAll();
				
					return $resultado;
				}
			
			public function total_notas($id) 
				{
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
				
			public function avaliacoes($id)
				{
					$this->sql = "SELECT * FROM avaliacoes_estabelecimentos WHERE EST_ID= :id ORDER BY AVA_ID DESC LIMIT 3";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':id',$id);
					$this->resultado->execute();
					$resultado = $this->resultado->fetchAll();
					return $resultado;
				}
				
			public function atualizar_avaliacao_estabelecimento($nota,$id)
				{
					$this->sql = "UPDATE estabelecimentos SET EST_MEDIA_AVALIACAO_CONSUMIDORES = :nota WHERE EST_ID = :id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':nota',$nota);
					$this->resultado->bindParam(':id',$id);
					$this->resultado->execute();
					//return $resultado;
				}
				
			public function inserir_avaliacao($ava_descricao,$ava_data_hora,$ava_nota,$est_id,$con_id)
				{
					$this->sql = "INSERT INTO avaliacoes_estabelecimentos (AVA_DESCRICAO, AVA_DATA_HORA, AVA_NOTA, EST_ID, CON_ID)
					VALUES (:ava_descricao,:ava_data_hora,:ava_nota,:est_id,:con_id)";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':ava_nota',$ava_nota);
					$this->resultado->bindParam(':est_id',$est_id);
					$this->resultado->bindParam(':ava_descricao',$ava_descricao);
					$this->resultado->bindParam(':ava_data_hora',$ava_data_hora);
					$this->resultado->bindParam(':con_id',$con_id);
					$this->resultado->execute();
				}
			
			public function avaliacaoInformacoes($id) 
				{
					$this->sql = "SELECT AVA_ID, AVA_DESCRICAO, AVA_NOTA, CON_ID FROM avaliacoes_estabelecimentos WHERE EST_ID=:id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':id',$id);
					$this->resultado->execute();
					$resultado_avaliacao = $this->resultado->fetchAll();
					return $resultado_avaliacao;				
				}

			public function selecionarAvaliacaoAtualizar($id,$con_id) 
				{
					$this->sql = "SELECT EST_ID, CON_ID FROM avaliacoes_estabelecimentos WHERE EST_ID=:id AND CON_ID=:con_id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':id',$id);
					$this->resultado->bindParam(':con_id',$con_id);
					$this->resultado->execute();
					$atualizar = $this->resultado->fetchAll();
					return $atualizar;				
				}	

			public function atualizarAvaliacao($ava_descricao,$ava_data_hora,$ava_nota,$est_id,$con_id)
				{
					$this->sql = "UPDATE avaliacoes_estabelecimentos 
					SET AVA_DESCRICAO = :ava_descricao, AVA_DATA_HORA = :ava_data_hora, AVA_NOTA = :ava_nota, EST_ID = :est_id, CON_ID = :con_id
					WHERE EST_ID = :est_id AND CON_ID = :con_id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':ava_descricao',$ava_descricao);
					$this->resultado->bindParam(':ava_data_hora',$ava_data_hora);
					$this->resultado->bindParam(':ava_nota',$ava_nota);
					$this->resultado->bindParam(':est_id',$est_id);
					$this->resultado->bindParam(':con_id',$con_id);
					$this->resultado->execute();
				}	
				
			public function obterAvaliacoesPorConID($con_id)
				{
					$this->sql = "SELECT * FROM avaliacoes_estabelecimentos WHERE CON_ID=:con_id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':con_id',$con_id);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}
				
			public function contarAvaliacoes()
				{
					$this->sql="select COUNT(AVA_ID) as qtdAvaliacoes from $this->tabela";
					$this->resultado= $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					foreach ($this->resultado->fetchAll() as $linha)
						{
							return $linha['qtdAvaliacoes'];	
						}
				}
				
			public function selecionarEstId()
				{
					$this->sql="select EST_ID as selecionarestid from $this->tabela ORDER BY RAND() LIMIT 1";
					$this->resultado= $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					foreach ($this->resultado->fetchAll() as $linha)
						{
							return $linha['selecionarestid'];	
						}
				}
				
			public function total_avaliacoes($id)
				{
					$this->sql = "SELECT COUNT(AVA_ID) as total_avaliacoes FROM $this->tabela WHERE EST_ID=:id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':id',$id);
					$this->resultado->execute();
					foreach ($this->resultado->fetchAll() as $linha)
						{
							return $linha['total_avaliacoes'];	
						}
				}
	}
?>

