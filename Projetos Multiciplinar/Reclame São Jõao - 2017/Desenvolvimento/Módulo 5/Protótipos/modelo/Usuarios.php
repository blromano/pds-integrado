<?php
	class Usuarios {
		
		private $id;
		private $nome;
		private $fotoPerfil;
		private $dataCadastro;
		private $email;
		private $telefone;
		private $senha;
		
		public function __construct() {
        
		}
		
		public function getId() {
			return $this->id;
		}
		
		public function setId($id) {
			$this->id = $id;
		}
		
		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getFotoPerfil(){
			return $this->fotoPerfil;
		}

		public function setFotoPerfil($fotoPerfil){
			$this->fotoPerfil = $fotoPerfil;
		}

		public function getDataCadastro(){
			return $this->dataCadastro;
		}

		public function setDataCadastro($dataCadastro){
			$this->dataCadastro = $dataCadastro;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getTelefone(){
			return $this->telefone;
		}

		public function setTelefone($telefone){
			$this->telefone = $telefone;
		}

		public function getSenha(){
			return $this->senha;
		}

		public function setSenha($senha){
			$this->senha = $senha;
		}
	}
?>