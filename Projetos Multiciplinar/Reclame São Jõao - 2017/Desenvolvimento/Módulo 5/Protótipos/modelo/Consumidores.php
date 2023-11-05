<?php
	class Consumidores {
		private $id;
		private $numero;
		private $dataValidacao;
		private $complemento;
		private $statusBloqueio;
		private $telefone2;
		private $dataNascimento;
		private $cadastroValidado;
		private $cpf;
		private $statusAtividade;
		private $usu_id;
		private $loc_id;
		
		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getNumero(){
			return $this->numero;
		}

		public function setNumero($numero){
			$this->numero = $numero;
		}

		public function getDataValidacao(){
			return $this->dataValidacao;
		}

		public function setDataValidacao($dataValidacao){
			$this->dataValidacao = $dataValidacao;
		}

		public function getComplemento(){
			return $this->complemento;
		}

		public function setComplemento($complemento){
			$this->complemento = $complemento;
		}

		public function getStatusBloqueio(){
			return $this->statusBloqueio;
		}

		public function setStatusBloqueio($statusBloqueio){
			$this->statusBloqueio = $statusBloqueio;
		}

		public function getTelefone2(){
			return $this->telefone2;
		}

		public function setTelefone2($telefone2){
			$this->telefone2 = $telefone2;
		}

		public function getDataNascimento(){
			return $this->dataNascimento;
		}

		public function setDataNascimento($dataNascimento){
			$this->dataNascimento = $dataNascimento;
		}

		public function getCadastroValidado(){
			return $this->cadastroValidado;
		}

		public function setCadastroValidado($cadastroValidado){
			$this->cadastroValidado = $cadastroValidado;
		}

		public function getCpf(){
			return $this->cpf;
		}

		public function setCpf($cpf){
			$this->cpf = $cpf;
		}

		public function getStatusAtividade(){
			return $this->statusAtividade;
		}

		public function setStatusAtividade($statusAtividade){
			$this->statusAtividade = $statusAtividade;
		}

		public function getUsu_id(){
			return $this->usu_id;
		}

		public function setUsu_id($usu_id){
			$this->usu_id = $usu_id;
		}

		public function getLoc_id(){
			return $this->loc_id;
		}

		public function setLoc_id($loc_id){
			$this->loc_id = $loc_id;
		}
		
	}
?>