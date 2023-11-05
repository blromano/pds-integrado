<?php
require_once 'Conexao.php';
	require_once($_SERVER['DOCUMENT_ROOT'] . '\RECLAME_SAO_JOAO-INTEGRAR\modelo\NotificacaoReclamacao.php');

	class NotificacaoReclamacaoDAO 
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
					$this->tabela = "NOTIFICACAO_RECLAMACAO";
				}
	
			public function inserirNotificacaoReclamacao($notificacao)
				{
					$this->sql = "INSERT INTO $this->tabela (NOT_ID_RECLAMACAO, NOT_NOME, NOT_DATA_EVENTO, NOT_STATUS, NOT_TIPO_NOTIFICACAO, CON_ID) 
					values (:NOT_ID_RECLAMACAO, :NOT_NOME, :NOT_DATA_EVENTO, :NOT_STATUS, :NOT_TIPO_NOTIFICACAO, :CON_ID)";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindValue(':NOT_ID_RECLAMACAO',$notificacao->getNOT_ID_RECLAMACAO()); 		
					$this->resultado->bindValue(':NOT_NOME',$notificacao->getNOT_NOME());
					$this->resultado->bindValue(':NOT_DATA_EVENTO',$notificacao->getNOT_DATA_EVENTO());		
					$this->resultado->bindValue(':NOT_STATUS',$notificacao->getNOT_STATUS());	
					$this->resultado->bindValue(':NOT_TIPO_NOTIFICACAO',$notificacao->getNOT_TIPO_NOTIFICACAO());	
					$this->resultado->bindValue(':CON_ID',$notificacao->getCON_ID());	
					$this->resultado->execute();
					return (($this->resultado->rowCount()) > 0) ? true : false;
				}
	
			public function contarNotId($con_id)
				{
					$this->sql="select COUNT(NOT_ID) as cont from $this->tabela WHERE CON_ID =:con_id";
					$this->resultado= $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':con_id',$con_id);
					$this->resultado->execute();
					foreach ($this->resultado->fetchAll() as $linha)
					{
					return $linha['cont'];	
					}
				}
				
			public function contarNotIdNaoVisualizado($con_id)
				{
					$this->sql="select COUNT(NOT_ID) as cont from $this->tabela WHERE CON_ID =:con_id AND NOT_STATUS=0";
					$this->resultado= $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':con_id',$con_id);
					$this->resultado->execute();
					foreach ($this->resultado->fetchAll() as $linha)
					{
					return $linha['cont'];	
					}
				}
	
			public function listarInformacao($con_id)
				{
					$this->sql="SELECT n.NOT_ID_RECLAMACAO as idn, n.NOT_STATUS, n.NOT_NOME, n.NOT_DATA_EVENTO, n.NOT_TIPO_NOTIFICACAO, n.CON_ID FROM notificacao_reclamacao n WHERE n.CON_ID =:con_id ORDER BY n.NOT_STATUS";
					$this->resultado= $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':con_id',$con_id);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}
	
			public function atualizarVisualizado($id)
				{
					$this->sql = "UPDATE notificacao_reclamacao SET NOT_STATUS = 1 WHERE NOT_ID_RECLAMACAO =:id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':id',$id);
					$this->resultado->execute();
					return $this->resultado;
				}
		}
?>

