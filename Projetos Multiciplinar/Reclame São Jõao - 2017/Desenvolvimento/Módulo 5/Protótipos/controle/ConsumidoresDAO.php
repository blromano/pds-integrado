<?php
	require_once 'Conexao.php';
	
	class ConsumidoresDAO {
		private $conexao;
		private $sql;
		private $consumidor;
		private $resultado;
		private $tabela;
		private $id;
		
		public function __construct() {
			$conn = new Conexao();
			$this->conexao = $conn->getConexao();
			$this->tabela = "CONSUMIDORES";
		}
		
		public function editar($consumidor) {
			$this->consumidor = $consumidor;
			$this->sql = "UPDATE $this->tabela SET CON_NUMERO=:numero,CON_COMPLEMENTO=:complemento,CON_TELEFONE2=:telefone2,CON_DATA_NASCIMENTO=:dataNascimento,CON_CPF=:cpf WHERE CON_ID=:id";
			$this->resultado = $this->conexao->prepare($this->sql);
			
			$this->resultado->bindParam(':numero',$this->consumidor->getNumero());
			$this->resultado->bindParam(':complemento',$this->consumidor->getComplemento());
			$this->resultado->bindParam(':telefone2',$this->consumidor->getTelefone2());
			$this->resultado->bindParam(':dataNascimento',$this->consumidor->getDataNascimento());
			$this->resultado->bindParam(':cpf',$this->consumidor->getCpf());
			$this->resultado->bindParam(':id',$this->consumidor->getId());
			
			$this->resultado->execute();
			return $this->resultado;
		}
		
		public function excluir($id) {
			$this->sql = "UPDATE $this->tabela SET CON_STATUS_BLOQUEIO = 1 WHERE CON_ID=:id";
			$this->resultado = $this->conexao->prepare($this->sql);
			$this->resultado->bindParam(':id',$id);
			$this->resultado->execute();
		}
		
		public function listar() {
			$this->sql = "SELECT * FROM CONSUMIDORES LEFT JOIN USUARIOS ON CONSUMIDORES.USU_ID = USUARIOS.USU_ID LEFT JOIN LOCALIZACOES ON CONSUMIDORES.LOC_ID = LOCALIZACOES.LOC_ID WHERE CONSUMIDORES.CON_STATUS_BLOQUEIO = 0";
			$this->resultado= $this->conexao->prepare($this->sql);
			$this->resultado->execute();
			return $this->resultado->fetchAll();
		}
	}

?>