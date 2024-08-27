<?php

	require_once 'Conexao.php';

	class DenunciasDAO
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
					$this->tabela = "DENUNCIAS_CONSUMIDORES";
				}
				
			public function listar()
				{
					$this->sql = "select * from DENUNCIAS_ESTABELECIMENTOS";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}

			public function listarDenunciasConsumidoresPendentes() 
				{
					$this->sql = "select * from DENUNCIAS_CONSUMIDORES where DEC_STATUS_APROVADO = 0";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}
			
			public function listarDenunciasEstabelecimentosPendentes() 
				{
					$this->sql = "select * from DENUNCIAS_ESTABELECIMENTOS where DES_STATUS_APROVADO = 0";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}
				
			public function listarBanidos()
				{
					$this->sql = "select * from USUARIOS left join ESTABELECIMENTOS on USUARIOS.USU_ID = ESTABELECIMENTOS.USU_ID left join HISTORICOS_BLOQUEIO_ESTABELECIMENTO on ESTABELECIMENTOS.EST_ID = HISTORICOS_BLOQUEIO_ESTABELECIMENTO.EST_ID where now() < HBE_DATA_HORA_DESBLOQUEIO"; 
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}

		}
?>

