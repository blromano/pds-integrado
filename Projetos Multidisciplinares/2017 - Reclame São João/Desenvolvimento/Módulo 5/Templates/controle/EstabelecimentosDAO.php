<?php
	require_once 'Conexao.php';

	class EstabelecimentosDAO {

		private $conexao;
		private $sql;
		private $estabelecimento;
		private $resultado;
		private $tabela;

		public function __construct() 
		{
			$conn = new Conexao();
			$this->conexao = $conn->getConexao();
			$this->tabela = "ESTABELECIMENTOS";
		}

		public function editarEstabelecimento($estabelecimento,$tes_id) 
		{
			$this->estabelecimento = $estabelecimento;
			$this->sql = "UPDATE $this->tabela SET EST_NOME_FANTASIA=:nome,EST_CNPJ=:cnpj,EST_SITE_EMPRESA=:site,EST_NUMERO_ENDERECO=:numero,EST_PUBLICO_ALVO=:alvo,EST_FACEBOOK_EMPRESA=:facebook,EST_NOME_RESPONSAVEL=:responsavel,EST_COMPLEMENTO=:complemento,TES_ID=:tipo WHERE EST_ID =:id";
			$this->resultado = $this->conexao->prepare($this->sql);
			
			$this->resultado->bindParam(':nome', $this->estabelecimento->getEST_NOME_FANTASIA());
			$this->resultado->bindParam(':cnpj', $this->estabelecimento->getEST_CNPJ());
			$this->resultado->bindParam(':site', $this->estabelecimento->getEST_SITE_EMPRESA());
			$this->resultado->bindParam(':numero', $this->estabelecimento->getEST_NUMERO());
			$this->resultado->bindParam(':alvo', $this->estabelecimento->getEST_PUBLICO_ALVO());
			$this->resultado->bindParam(':facebook', $this->estabelecimento->getEST_FACEBOOK_EMPRESA());
			$this->resultado->bindParam(':responsavel', $this->estabelecimento->getEST_NOME_RESPONSAVEL());
			$this->resultado->bindParam(':complemento', $this->estabelecimento->getEST_COMPLEMENTO());
			$this->resultado->bindParam(':tipo', $tes_id);
			$this->resultado->bindParam(':id', $this->estabelecimento->getEST_ID());

			$this->resultado->execute();

			return $this->resultado;
		}
		
		public function excluir($id) {
			$this->sql = "UPDATE $this->tabela SET EST_STATUS_BLOQUEIO = 1 WHERE EST_ID=:id";
			$this->resultado = $this->conexao->prepare($this->sql);
			$this->resultado->bindParam(':id',$id);
			$this->resultado->execute();
		}
		
		public function listarTodos() 
		{
			$this->sql = "SELECT * FROM ESTABELECIMENTOS LEFT JOIN USUARIOS ON ESTABELECIMENTOS.USU_ID = USUARIOS.USU_ID LEFT JOIN LOCALIZACOES ON ESTABELECIMENTOS.LOC_ID = LOCALIZACOES.LOC_ID LEFT JOIN TIPOS_ESTABELECIMENTOS ON ESTABELECIMENTOS.TES_ID = TIPOS_ESTABELECIMENTOS.TES_ID WHERE ESTABELECIMENTOS.EST_STATUS_BLOQUEIO = 0 LIMIT 10";
			$this->resultado = $this->conexao->prepare($this->sql);
			$this->resultado->execute();
			return $this->resultado->fetchAll();
		}

	}
?>