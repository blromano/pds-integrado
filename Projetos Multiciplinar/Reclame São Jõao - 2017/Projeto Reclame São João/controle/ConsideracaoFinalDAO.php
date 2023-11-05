<?php

	require_once($_SERVER['DOCUMENT_ROOT'] . '\RECLAME_SAO_JOAO-INTEGRAR\modelo\ConsideracaoFinal.php');

	require_once 'Conexao.php';

	class ConsideracaoFinalDAO 
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
					$this->tabela = "CONSIDERACAO_FINAL";
				}
	
			public function inserirConsideracaoFinal($consideracao)
				{
					
					$this->sql = "INSERT INTO $this->tabela (COF_DESCRICAO, REC_ID, COF_STATUS_RESOLVIDO) 
					values (:COF_DESCRICAO, :REC_ID, :COF_STATUS_RESOLVIDO)";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindValue(':COF_DESCRICAO',$consideracao->getCOF_DESCRICAO()); 		
					$this->resultado->bindValue(':REC_ID',$consideracao->getREC_ID());
					$this->resultado->bindValue(':COF_STATUS_RESOLVIDO',$consideracao->getCOF_STATUS_RESOLVIDO());		
					$this->resultado->execute();
					return (($this->resultado->rowCount()) > 0) ? true : false;
				}

			public function listarInformacoes($rec_id)
				{
					$this->sql="select * from $this->tabela WHERE REC_ID=:rec_id";
					$this->resultado= $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':rec_id',$rec_id);
					$this->resultado->execute();
					foreach ($this->resultado->fetchAll() as $linha)
					{
						return $linha['REC_ID'];	
					}
				}
	
			public function listarTudo($rec_id)
				{
					$this->sql = "SELECT * FROM $this->tabela WHERE REC_ID=:rec_id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':rec_id',$rec_id);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}
		}
?>

