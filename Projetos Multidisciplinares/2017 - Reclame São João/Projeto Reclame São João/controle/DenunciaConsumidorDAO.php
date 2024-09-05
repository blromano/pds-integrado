<?php
	
	require_once 'Conexao.php';

	class DenunciaConsumidorDAO 
		{
		
			private $conexao;
			private $sql;
			private $DenunciaConsumidor;
			private $resultado;
			private $tabela;
		
			public function __construct()
				{
					$conn = new Conexao();
					$this->conexao = $conn->getConexao();
					$this->tabela = "denuncias_consumidores";
				}
				
			public function inserirDenuncia($DenunciaConsumidor)
				{
					$this->DenunciaConsumidor = $DenunciaConsumidor;		
					$this->sql="insert into $this->tabela (DEC_MOTIVO, DEC_DATA_HORA_DENUNCIA, DEC_STATUS_APROVADO, DEC_TIPO_DENUNCIA, EST_ID, ADM_ID, CON_ID) values (:DEC_MOTIVO, :DEC_DATA_HORA_DENUNCIA, :DEC_STATUS_APROVADO, :DEC_TIPO_DENUNCIA, :EST_ID,  :ADM_ID, :CON_ID)";
					$this->resultado = $this->conexao->prepare($this->sql);
					
					$this->resultado->bindValue(':DEC_MOTIVO',$this->DenunciaConsumidor->getDEC_MOTIVO());
					$this->resultado->bindValue(':DEC_DATA_HORA_DENUNCIA',date("Y-m-d",time()));
					$this->resultado->bindValue(':DEC_TIPO_DENUNCIA',$this->DenunciaConsumidor->getDEC_TIPO_DENUNCIA());
					$this->resultado->bindValue(':DEC_STATUS_APROVADO',$this->DenunciaConsumidor->getDEC_STATUS_APROVADO());
					$this->resultado->bindValue(':EST_ID',$this->DenunciaConsumidor->getEST_ID());
					$this->resultado->bindValue(':ADM_ID',$this->DenunciaConsumidor->getADM_ID());
					$this->resultado->bindValue(':CON_ID',$this->DenunciaConsumidor->getCON_ID());
					
					$this->resultado->execute();
					
					return $this->resultado;
				}
				
			public function pesquisarPorId($id) 
				{
					$this->sql = "select * from $this->tabela where DEC_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}
		}