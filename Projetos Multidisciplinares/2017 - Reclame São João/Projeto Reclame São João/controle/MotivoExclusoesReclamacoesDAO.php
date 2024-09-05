<?php

	require_once 'Conexao.php';

	require_once($_SERVER['DOCUMENT_ROOT'] . '\RECLAME_SAO_JOAO-INTEGRAR\modelo\MotivoExclusoesReclamacoes.php');

	class MotivoExclusoesReclamacoesDAO 
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
					$this->tabela = "MOTIVO_EXCLUSOES_RECLAMACOES";
				}
	
			public function inserirMotivoExclusao($motivo)
				{
					$this->sql = "INSERT INTO $this->tabela (MER_DATA_HORA, MER_MOTIVO_EXCLUSAO, MER_RECLAMACAO_CONSUMIDOR, CON_ID) values (:MER_DATA_HORA, :MER_MOTIVO_EXCLUSAO, :MER_RECLAMACAO_CONSUMIDOR, :CON_ID)";
					$this->resultado = $this->conexao->prepare($this->sql);
					
					$this->resultado->bindValue(':MER_DATA_HORA',$motivo->getMER_DATA_HORA()); 		
					$this->resultado->bindValue(':MER_MOTIVO_EXCLUSAO',$motivo->getMER_MOTIVO_EXCLUSAO());
					$this->resultado->bindValue(':MER_RECLAMACAO_CONSUMIDOR',$motivo->getMER_RECLAMACAO_CONSUMIDOR());
					$this->resultado->bindValue(':CON_ID',$motivo->getCON_ID()); 		
					
					$this->resultado->execute();
				}
		}
?>