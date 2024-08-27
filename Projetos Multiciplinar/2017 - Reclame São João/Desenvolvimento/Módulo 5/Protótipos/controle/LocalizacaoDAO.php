<?php
	
	require_once 'Conexao.php';
		
	class LocalizacaoDAO {
	
		private $conexao;
		private $sql;
		private $localizacao;
		private $resultado;
		private $tabela;
		
			
		public function __construct()
		{
			$conn = new Conexao();
			$this->conexao = $conn->getConexao();
			$this->tabela = "LOCALIZACOES";
		}
		
		public function editar($localizacao) {
			$this->localizacao = $localizacao;
			$this->sql = "UPDATE $this->tabela SET LOC_RUA=:rua,LOC_BAIRRO=:bairro,LOC_ESTADO=:estado,LOC_CIDADE=:cidade WHERE LOC_ID=:id";
			$this->resultado = $this->conexao->prepare($this->sql);
			$this->resultado->bindParam(':rua',$this->localizacao->getRua());     
			$this->resultado->bindParam(':bairro',$this->localizacao->getBairro());       
			$this->resultado->bindParam(':estado',$this->localizacao->getEstado());     
			$this->resultado->bindParam(':cidade',$this->localizacao->getCidade());
			$this->resultado->bindParam(':id',$this->localizacao->getId()); 
			$this->resultado->execute();
			return $this->resultado;
		}
		
	}
?>