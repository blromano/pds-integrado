<?php
	
	require_once 'Conexao.php';

	class PunirUsuarioDAO 
		{
		
			private $conexao;
			private $sql;
			private $resultado;
			private $tabela;
		
			public function __construct()
				{
					$conn = new Conexao();
					$this->conexao = $conn->getConexao();
					$this->tabela = "historicos_bloqueio_estabelecimento";
				}
				
			public function inserirBloqueio($valores)
				{
		
					$this->sql="insert into $this->tabela (HBE_DATA_HORA_DESBLOQUEIO, HBE_DATA_HORA_BLOQUEIO, HBE_MOTIVO, EST_ID) values (:HBE_DATA_HORA_DESBLOQUEIO, :HBE_DATA_HORA_BLOQUEIO, :HBE_MOTIVO, :EST_ID)";
					$this->resultado = $this->conexao->prepare($this->sql);
					
					$this->resultado->bindValue(':HBE_DATA_HORA_DESBLOQUEIO',date("Y-m-d", strtotime("+".$valores['dias']." days")));
					$this->resultado->bindValue(':HBE_DATA_HORA_BLOQUEIO',date("Y-m-d",time()));
					$this->resultado->bindValue(':HBE_MOTIVO',$valores['motivo']);
					$this->resultado->bindValue(':EST_ID',$valores['est_id']);
					
					$this->resultado->execute();
					
					return $this->resultado;
				}
				
			public function alterarStatus($des_id)
				{
					$this->sql="UPDATE denuncias_estabelecimentos SET DES_STATUS_APROVADO =1 WHERE DES_ID = $des_id";
					$this->resultado = $this->conexao->prepare($this->sql);

					$this->resultado->execute();
				}
				
			public function excluir($hbe_id)
				{
					$this->sql = "DELETE FROM $this->tabela where HBE_ID=:id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':id', $hbe_id);
					$this->resultado->execute();
				}
				
			public function alterar($dados,$hbe_id)
				{

					$this->sql = "UPDATE historicos_bloqueio_estabelecimento SET HBE_DATA_HORA_DESBLOQUEIO=:HBE_DATA_HORA_DESBLOQUEIO,HBE_DATA_HORA_BLOQUEIO=:HBE_DATA_HORA_BLOQUEIO,HBE_MOTIVO=:HBE_MOTIVO WHERE HBE_ID=".$hbe_id;
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindValue(':HBE_DATA_HORA_DESBLOQUEIO',$dados['duracaoBanimento']);
					$this->resultado->bindValue(':HBE_DATA_HORA_BLOQUEIO',$dados['dataBanimento']);
					$this->resultado->bindValue(':HBE_MOTIVO',$dados['motivo']);
					$this->resultado->execute();
					return $this->resultado;
					
				}

		}