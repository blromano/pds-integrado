<?php
	require_once 'Conexao.php';
	
	class AdministradoresDAO {
		private $conexao;
		private $sql;
		private $administrador;
		private $resultado;
		private $tabela;
		private $id;
		
		public function __construct() {
			$conn = new Conexao();
			$this->conexao = $conn->getConexao();
			$this->tabela = "ADMINISTRADORES";
		}
		
		public function inserir($privilegio,$usu_id) {
			$this->sql = "INSERT INTO $this->tabela (ADM_TIPO_PRIVILEGIO, USU_ID) values (:privilegio, :usu_id)";
			$this->resultado = $this->conexao->prepare($this->sql);
			
			$this->resultado->bindParam(':privilegio',$privilegio);
			$this->resultado->bindParam(':usu_id',$usu_id);
			
			$this->resultado->execute();
			return $this->resultado;
		}
		
		public function editar($privilegio,$id) {
			$this->sql = "UPDATE $this->tabela SET ADM_TIPO_PRIVILEGIO=:privilegio WHERE USU_ID=:id";
			$this->resultado = $this->conexao->prepare($this->sql);
			
			$this->resultado->bindParam(':privilegio',$privilegio);
			$this->resultado->bindParam(':id',$id);
			
			$this->resultado->execute();
			return $this->resultado;
		}
		
		public function excluir($id) {
			$this->sql = "DELETE FROM $this->tabela WHERE USU_ID=:id";
			$this->resultado = $this->conexao->prepare($this->sql);
			$this->resultado->bindParam(':id',$id);
			$this->resultado->execute();
			return $this->resultado;
		}
		
		public function listar() {
			$this->sql = "SELECT * FROM ADMINISTRADORES LEFT JOIN USUARIOS ON ADMINISTRADORES.USU_ID = USUARIOS.USU_ID ORDER BY ADM_TIPO_PRIVILEGIO DESC";
			$this->resultado= $this->conexao->prepare($this->sql);
			$this->resultado->execute();
			return $this->resultado->fetchAll();
		}
	}

?>