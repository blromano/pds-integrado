<?php
	require_once 'Conexao.php';

	class UsuariosDAO {
		
		private $conexao;
		private $sql;
		private $usuario;
		private $resultado;
		private $tabela;
		private $id;
		
		public function __construct() {
			$conn = new Conexao();
			$this->conexao = $conn->getConexao();
			$this->tabela = "usuarios";
		}
		
		public function inserir($usuario) {
			$this->usuario = $usuario;		
			$this->sql = "INSERT INTO $this->tabela (USU_NOME, USU_DATA_CADASTRO, USU_EMAIL, USU_TELEFONE, USU_SENHA) values (:USU_NOME, :USU_DATA_CADASTRO, :USU_EMAIL, :USU_TELEFONE, :USU_SENHA)";
			$this->resultado = $this->conexao->prepare($this->sql);
			
			$this->resultado->bindParam(':USU_NOME',$this->usuario->getNome());      
			$this->resultado->bindParam(':USU_DATA_CADASTRO',date("Y-m-d H:i:s",time()));      	
			$this->resultado->bindParam(':USU_EMAIL',$this->usuario->getEmail());
			$this->resultado->bindParam(':USU_TELEFONE',$this->usuario->getTelefone());
			$this->resultado->bindParam(':USU_SENHA',$this->usuario->getSenha());      
					
			$this->resultado->execute();
			return $this->conexao->lastInsertId();
		}
		
		public function editar($usuario) {
			$this->usuario = $usuario;
			$this->sql = "UPDATE $this->tabela SET USU_NOME=:nome,USU_EMAIL=:email,USU_TELEFONE=:telefone WHERE USU_ID=:id";
			$this->resultado = $this->conexao->prepare($this->sql);
			$this->resultado->bindParam(':nome',$this->usuario->getNome());
			$this->resultado->bindParam(':email',$this->usuario->getEmail());
			$this->resultado->bindParam(':telefone',$this->usuario->getTelefone());
			$this->resultado->bindParam(':id',$this->usuario->getId());
			$this->resultado->execute();
			return $this->resultado;
		}
		
		public function excluir($id) {
			$this->sql="DELETE FROM $this->tabela where USU_ID=:id";		
			$this->resultado = $this->conexao->prepare($this->sql);
			$this->resultado->bindParam(':id',$id);
			$this->resultado->execute();
		}
		
		public function listar() {
			$this->sql = "SELECT * FROM $this->tabela";
			$this->resultado= $this->conexao->prepare($this->sql);
			$this->resultado->execute();
			return $this->resultado->fetchAll();
		}
		
		public function emailEmUso($usuario) {
			$this->usuario = $usuario;
			$this->sql = "SELECT * FROM $this->tabela WHERE USU_EMAIL=:email AND USU_ID != :id";
			$this->resultado = $this->conexao->prepare($this->sql);
			$this->resultado->bindParam(':email', $this->usuario->getEmail());
			$this->resultado->bindParam(':id', $this->usuario->getId());
			$this->resultado->execute();
			if (($this->resultado->rowCount()) > 0) {
				return true;
			} else {
				return false;
			}
		}
	}


?>