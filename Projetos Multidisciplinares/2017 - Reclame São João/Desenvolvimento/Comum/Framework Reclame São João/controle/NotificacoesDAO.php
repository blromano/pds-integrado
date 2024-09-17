<?php
	require_once 'Conexao.php';
	require_once($_SERVER['DOCUMENT_ROOT'] . '\RECLAME_SAO_JOAO-INTEGRAR\modelo\Notificacoes.php');

	class NotificacoesDAO 
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
					$this->tabela = "NOTIFICACOES";
				}
	
			
			//Inserir Notificação	
				public function inserirNotificacaoReuniao($notificacao)
					{
						$this->sql = "INSERT INTO $this->tabela ( NOT_NOME, NOT_TIPO_NOTIFICACAO, NOT_VISUALIZADA, NOT_ID_ESTABELECIMENTO, NOT_ID_CONSUMIDORES, NOT_DATA_EVENTO, NOT_ID_REUNIAO_AGENDADA) 
														values (:NOT_NOME, :NOT_TIPO_NOTIFICACAO, :NOT_VISUALIZADA, :NOT_ID_ESTABELECIMENTO, :NOT_ID_CONSUMIDORES, :NOT_DATA_EVENTO, :NOT_ID_REUNIAO_AGENDADA)";
						
						$this->resultado = $this->conexao->prepare($this->sql);
						//$this->resultado->bindValue(':NOT_ID',$notificacao->getNOT_ID()); 		
						$this->resultado->bindValue(':NOT_NOME',$notificacao->getNOT_NOME());
						$this->resultado->bindValue(':NOT_TIPO_NOTIFICACAO',$notificacao->getNOT_TIPO_NOTIFICACAO());	
						$this->resultado->bindValue(':NOT_VISUALIZADA',$notificacao->getNOT_VISUALIZADA());
						$this->resultado->bindValue(':NOT_ID_ESTABELECIMENTO',$notificacao->getNOT_ID_ESTABELECIMENTO());	
						$this->resultado->bindValue(':NOT_ID_CONSUMIDORES',$notificacao->getNOT_ID_CONSUMIDORES());	
						$this->resultado->bindValue(':NOT_DATA_EVENTO',$notificacao->getNOT_DATA_EVENTO());		
						$this->resultado->bindValue(':NOT_ID_REUNIAO_AGENDADA',$notificacao->getNOT_ID_REUNIAO_AGENDADA());		
						$this->resultado->execute();
						return (($this->resultado->rowCount()) > 0) ? true : false;
					}
					
				public function inserirNotificacaoResposta($notificacao)
					{
						$this->sql = "INSERT INTO $this->tabela ( NOT_NOME, NOT_TIPO_NOTIFICACAO, NOT_VISUALIZADA, NOT_DATA_EVENTO, NOT_ID_CONSUMIDORES) 
														values (:NOT_NOME, :NOT_TIPO_NOTIFICACAO, :NOT_VISUALIZADA, :NOT_DATA_EVENTO, :NOT_ID_CONSUMIDORES)";
						
						$this->resultado = $this->conexao->prepare($this->sql);
						//$this->resultado->bindValue(':NOT_ID',$notificacao->getNOT_ID()); 		
						$this->resultado->bindValue(':NOT_NOME',$notificacao->getNOT_NOME());
						$this->resultado->bindValue(':NOT_TIPO_NOTIFICACAO',$notificacao->getNOT_TIPO_NOTIFICACAO());	
						$this->resultado->bindValue(':NOT_VISUALIZADA',$notificacao->getNOT_VISUALIZADA());
						$this->resultado->bindValue(':NOT_ID_CONSUMIDORES',$notificacao->getNOT_ID_CONSUMIDORES());	
						$this->resultado->bindValue(':NOT_DATA_EVENTO',$notificacao->getNOT_DATA_EVENTO());				
						$this->resultado->execute();
						return (($this->resultado->rowCount()) > 0) ? true : false;
					}
					
				public function inserirNotificacaoDenuncia($notificacao)
					{
						$this->sql = "INSERT INTO $this->tabela ( NOT_NOME, NOT_TIPO_NOTIFICACAO, NOT_VISUALIZADA, NOT_ID_CONSUMIDORES, NOT_ID_ESTABELECIMENTO, NOT_DATA_EVENTO) 
														values (:NOT_NOME, :NOT_TIPO_NOTIFICACAO, :NOT_VISUALIZADA, :NOT_ID_CONSUMIDORES, :NOT_ID_ESTABELECIMENTO, :NOT_DATA_EVENTO)";
						
						$this->resultado = $this->conexao->prepare($this->sql);
						//$this->resultado->bindValue(':NOT_ID',$notificacao->getNOT_ID()); 		
						$this->resultado->bindValue(':NOT_NOME','DSDSDS');
						$this->resultado->bindValue(':NOT_TIPO_NOTIFICACAO',$notificacao->getNOT_TIPO_NOTIFICACAO());	
						$this->resultado->bindValue(':NOT_VISUALIZADA',$notificacao->getNOT_VISUALIZADA());
						$this->resultado->bindValue(':NOT_ID_CONSUMIDORES',$notificacao->getNOT_ID_CONSUMIDORES());	
						$this->resultado->bindValue(':NOT_ID_ESTABELECIMENTO',$notificacao->getNOT_ID_ESTABELECIMENTO());	
						$this->resultado->bindValue(':NOT_DATA_EVENTO',$notificacao->getNOT_DATA_EVENTO());				
						$this->resultado->execute();
						return (($this->resultado->rowCount()) > 0) ? true : false;
					}
					
			
				public function inserirNotificacaoReclamacao($notificacao)
					{
						$this->sql = "INSERT INTO $this->tabela (NOT_ID_RECLAMACAO, NOT_NOME, NOT_DATA_EVENTO, NOT_VISUALIZADA, NOT_TIPO_NOTIFICACAO, NOT_ID_CONSUMIDORES) 
						values (:NOT_ID_RECLAMACAO, :NOT_NOME, :NOT_DATA_EVENTO, :NOT_VISUALIZADA, :NOT_TIPO_NOTIFICACAO, :NOT_ID_CONSUMIDORES)";
						$this->resultado = $this->conexao->prepare($this->sql);
						$this->resultado->bindValue(':NOT_ID_RECLAMACAO',$notificacao->getNOT_ID_RECLAMACAO()); 		
						$this->resultado->bindValue(':NOT_NOME',$notificacao->getNOT_NOME());
						$this->resultado->bindValue(':NOT_DATA_EVENTO',$notificacao->getNOT_DATA_EVENTO());		
						$this->resultado->bindValue(':NOT_VISUALIZADA',$notificacao->getNOT_VISUALIZADA());	
						$this->resultado->bindValue(':NOT_TIPO_NOTIFICACAO',$notificacao->getNOT_TIPO_NOTIFICACAO());	
						$this->resultado->bindValue(':NOT_ID_CONSUMIDORES',$notificacao->getNOT_ID_CONSUMIDORES());	
						$this->resultado->execute();
						return (($this->resultado->rowCount()) > 0) ? true : false;
					}
				
				public function inserirNotificacaoNovaReclamacao($notificacao)
					{
						$this->sql = "INSERT INTO $this->tabela (NOT_ID_RECLAMACAO, NOT_NOME, NOT_DATA_EVENTO, NOT_VISUALIZADA, NOT_TIPO_NOTIFICACAO, NOT_ID_CONSUMIDORES) 
						values (:NOT_ID_RECLAMACAO, :NOT_NOME, :NOT_DATA_EVENTO, :NOT_VISUALIZADA, :NOT_TIPO_NOTIFICACAO, :NOT_ID_ESTABELECIMENTO)";
						$this->resultado = $this->conexao->prepare($this->sql);
						$this->resultado->bindValue(':NOT_ID_RECLAMACAO',$notificacao->getNOT_ID_RECLAMACAO()); 		
						$this->resultado->bindValue(':NOT_NOME',$notificacao->getNOT_NOME());
						$this->resultado->bindValue(':NOT_DATA_EVENTO',$notificacao->getNOT_DATA_EVENTO());		
						$this->resultado->bindValue(':NOT_VISUALIZADA',$notificacao->getNOT_VISUALIZADA());	
						$this->resultado->bindValue(':NOT_TIPO_NOTIFICACAO',$notificacao->getNOT_TIPO_NOTIFICACAO());	
						$this->resultado->bindValue(':NOT_ID_ESTABELECIMENTO',$notificacao->getNOT_ID_ESTABELECIMENTO());	
						$this->resultado->execute();
						return (($this->resultado->rowCount()) > 0) ? true : false;
					}
				
			//Notificação Usuário
				
				public function contarNotIdNaoVisualizado($NOT_ID_CONSUMIDORES)
					{
						$this->sql="select COUNT(NOT_ID) as cont from $this->tabela WHERE NOT_ID_CONSUMIDORES =:NOT_ID_CONSUMIDORES AND NOT_VISUALIZADA=0";
						$this->resultado= $this->conexao->prepare($this->sql);
						$this->resultado->bindParam(':NOT_ID_CONSUMIDORES',$NOT_ID_CONSUMIDORES);
						$this->resultado->execute();
						foreach ($this->resultado->fetchAll() as $linha)
						{
						return $linha['cont'];	
						}
					}
	
				public function listarInformacao($NOT_ID_CONSUMIDORES)
					{
						$this->sql="SELECT n.NOT_ID as idn, n.NOT_NOME, n.NOT_DATA_EVENTO,  n.NOT_VISUALIZADA, n.NOT_TIPO_NOTIFICACAO, n.NOT_ID_CONSUMIDORES FROM notificacoes n WHERE n.NOT_ID_CONSUMIDORES =:NOT_ID_CONSUMIDORES ORDER BY NOT_ID DESC";
						$this->resultado= $this->conexao->prepare($this->sql);
						$this->resultado->bindParam(':NOT_ID_CONSUMIDORES',$NOT_ID_CONSUMIDORES);
						$this->resultado->execute();
						return $this->resultado->fetchAll();
					}
				
				
			//Notificação Estabelecimento
			
				public function listarInformacao_est($NOT_ID_ESTABELECIMENTO)
					{
						$this->sql="SELECT n.NOT_ID as idn, n.NOT_NOME, n.NOT_DATA_EVENTO,  n.NOT_VISUALIZADA, n.NOT_TIPO_NOTIFICACAO, n.NOT_ID_ESTABELECIMENTO FROM notificacoes n WHERE n.NOT_ID_ESTABELECIMENTO =:NOT_ID_ESTABELECIMENTO ORDER BY NOT_ID DESC";
						$this->resultado= $this->conexao->prepare($this->sql);
						$this->resultado->bindParam(':NOT_ID_ESTABELECIMENTO',$NOT_ID_ESTABELECIMENTO);
						$this->resultado->execute();
						return $this->resultado->fetchAll();
					}
				
				public function contarNotIdNaoVisualizadoEst($NOT_ID_ESTABELECIMENTO)
					{
						$this->sql="select COUNT(NOT_ID) as cont from $this->tabela WHERE NOT_ID_ESTABELECIMENTO =:NOT_ID_ESTABELECIMENTO AND NOT_VISUALIZADA=0";
						$this->resultado= $this->conexao->prepare($this->sql);
						$this->resultado->bindParam(':NOT_ID_ESTABELECIMENTO',$NOT_ID_ESTABELECIMENTO);
						$this->resultado->execute();
						foreach ($this->resultado->fetchAll() as $linha)
						{
						return $linha['cont'];	
						}
					}
				
			//Comum
			
				public function atualizarVisualizado($id)
					{
						$this->sql = "UPDATE notificacoes SET NOT_VISUALIZADA = 1 WHERE NOT_ID =:id";
						$this->resultado = $this->conexao->prepare($this->sql);
						$this->resultado->bindParam(':id',$id);
						$this->resultado->execute();
						return $this->resultado;
					}
				
				public function contarNotId($con_id)
					{
						$this->sql="select COUNT(NOT_ID) as cont from $this->tabela WHERE NOT_ID_ESTABELECIMENTO =:con_id";
						$this->resultado= $this->conexao->prepare($this->sql);
						$this->resultado->bindParam(':con_id',$con_id);
						$this->resultado->execute();
						foreach ($this->resultado->fetchAll() as $linha)
						{
						return $linha['cont'];	
						}
					}
					
			//Retornar ID Consumidor
				
				public function retornarIDConsumidor($id)
					{
						$this->sql="select CON_ID from consumidores where USU_ID=$id";
						$this->resultado= $this->conexao->prepare($this->sql);
						$this->resultado->execute();
						return count($this->resultado->fetchAll());	
					}
					
			//Retornar ID Estabelecimento
				
				public function retornarIDEstabelecimento($id)
					{
						$this->sql="select EST_ID from estabelecimentos where USU_ID=$id";
						$this->resultado= $this->conexao->prepare($this->sql);
						$this->resultado->execute();
						return count($this->resultado->fetchAll());	
					}
		}
?>

