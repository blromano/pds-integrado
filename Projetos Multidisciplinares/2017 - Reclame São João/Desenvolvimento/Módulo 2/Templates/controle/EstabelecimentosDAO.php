<?php

require_once 'Conexao.php';


class EstabelecimentosDAO 
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
				$this->tabela = "ESTABELECIMENTOS";
			}
		
		public function inserirEstabelecimento($post) 
			{
				$this->post = $post;
				$this->sql = "insert into $this->tabela (  EST_CNPJ,  EST_NOME_FANTASIA,  EST_NUMERO_ENDERECO,  EST_COMPLEMENTO,  EST_NOME_RESPONSAVEL,  EST_PUBLICO_ALVO,  EST_SITE_EMPRESA,  EST_FACEBOOK_EMPRESA,  USU_ID,  TES_ID,  LOC_ID, EST_TOTAL_RECLAMACAO, EST_LATITUDE, EST_STATUS_BLOQUEIO, EST_MEDIA_AVALIACAO_CONSUMIDORES, EST_MEDIA_RECLAMACAO, EST_LONGITUDE) 
												 values ( :EST_CNPJ, :EST_NOME_FANTASIA, :EST_NUMERO_ENDERECO, :EST_COMPLEMENTO, :EST_NOME_RESPONSAVEL, :EST_PUBLICO_ALVO, :EST_SITE_EMPRESA, :EST_FACEBOOK_EMPRESA, :USU_ID, :TES_ID, :LOC_ID, 0, 0, 0, 0, 0, 0)";
				
				$this->resultado = $this->conexao->prepare($this->sql);

				$this->resultado->bindValue(':EST_CNPJ', $this->post->getEST_CNPJ());
				$this->resultado->bindValue(':EST_NOME_FANTASIA', $this->post->getEST_NOME_FANTASIA());
				$this->resultado->bindValue(':EST_NUMERO_ENDERECO', $this->post->getEST_NUMERO_ENDERECO());
				$this->resultado->bindValue(':EST_COMPLEMENTO', $this->post->getEST_COMPLEMENTO());
				$this->resultado->bindValue(':EST_NOME_RESPONSAVEL', $this->post->getEST_NOME_RESPONSAVEL());
				$this->resultado->bindValue(':EST_PUBLICO_ALVO', $this->post->getEST_PUBLICO_ALVO());
				$this->resultado->bindValue(':EST_SITE_EMPRESA', $this->post->getEST_SITE_EMPRESA());
				$this->resultado->bindValue(':EST_FACEBOOK_EMPRESA', $this->post->getEST_FACEBOOK_EMPRESA());
				$this->resultado->bindValue(':USU_ID', $this->post->getUSU_ID());
				$this->resultado->bindValue(':TES_ID', $this->post->getTES_ID());
				$this->resultado->bindValue(':LOC_ID', $this->post->getLOC_ID());
				

				$this->resultado->execute();

				return $this->resultado;
			}

		public function editarEstabelecimento($post) 
			{
				$this->post = $post;
				$this->sql = "update $this->tabela set EST_CNPJ=: EST_CNPJ, :EST_FOTO_PERFIL =:EST_FOTO_PERFIL, EST_NOME_FANTASIA =:EST_NOME_FANTASIA, EST_NUMERO_ENDERECO=:EST_NUMERO_ENDERECO, EST_COMPLEMENTO=:EST_COMPLEMENTO, :EST_NOME_RESPONSAVEL=:EST_NOME_RESPONSAVEL, :EST_NOME_EMPRESA=:EST_NOME_EMPRESA, :EST_PUBLICO_ALVO=:EST_PUBLICO_ALVO, :EST_SITE_EMPRESA=:EST_SITE_EMPRESA, :EST_EMAIL=:EST_EMAIL where EST_ID =:EST_ID";

				$this->resultado = $this->conexao->prepare($this->sql);

				
				$this->resultado->bindValue(':EST_CNPJ', $this->post->getEST_CNPJ());
				$this->resultado->bindValue(':EST_FOTO_PERFIL', $this->post->getEST_FOTO_PERFIL());
				$this->resultado->bindValue(':EST_NOME_FANTASIA', $this->post->getEST_NOME_FANTASIA());
				$this->resultado->bindValue(':EST_NUMERO_ENDERECO', $this->post->getEST_NUMERO_ENDERECO());
				$this->resultado->bindValue(':EST_COMPLEMENTO', $this->post->getEST_COMPLEMENTO());
				$this->resultado->bindValue(':EST_NOME_RESPONSAVEL', $this->post->getEST_NOME_RESPONSAVEL());
				$this->resultado->bindValue(':EST_NOME_EMPRESA', $this->post->getEST_NOME_EMPRESA());
				$this->resultado->bindValue(':EST_PUBLICO_ALVO', $this->post->getEST_PUBLICO_ALVO());
				$this->resultado->bindValue(':EST_SITE_EMPRESA', $this->post->getEST_SITE_EMPRESA());
				$this->resultado->bindValue(':EST_EMAIL', $this->post->getEST_EMAIL());

				$this->resultado->execute();

				return $this->resultado;
			}
		
		public function editarPublicoAlvo($post) 
			{
				$this->post = $post;
				$this->sql = "update $this->tabela set EST_PUBLICO_ALVO=:EST_PUBLICO_ALVO where EST_ID =:EST_ID";

				$this->resultado = $this->conexao->prepare($this->sql);

				$this->resultado->bindValue(':EST_PUBLICO_ALVO', $this->post->getEST_PUBLICO_ALVO());
				$this->resultado->bindValue(':EST_ID', $this->post->getEST_ID());

				$this->resultado->execute();

				return $this->resultado;
			}
		
		public function editarNumero_Complemento($post) 
			{
				$this->post = $post;
				$this->sql = "update $this->tabela set EST_NUMERO_ENDERECO=:EST_NUMERO_ENDERECO, EST_COMPLEMENTO=:EST_COMPLEMENTO where EST_ID =:EST_ID";
				
				$this->resultado = $this->conexao->prepare($this->sql);
				
				$this->resultado->bindValue(':EST_NUMERO_ENDERECO', $this->post->getEST_NUMERO_ENDERECO());
				$this->resultado->bindValue(':EST_COMPLEMENTO', $this->post->getEST_COMPLEMENTO());
				$this->resultado->bindValue(':EST_ID', $this->post->getEST_ID());

				$this->resultado->execute();

				return $this->resultado;
			}
		
		public function editarInformacoesPessoais($post) 
			{
				$this->post = $post;
				$this->sql = "update $this->tabela set EST_NOME_FANTASIA=:EST_NOME_FANTASIA, EST_NOME_RESPONSAVEL=:EST_NOME_RESPONSAVEL, EST_CNPJ=:EST_CNPJ, EST_SITE_EMPRESA=:EST_SITE_EMPRESA, TES_ID=:TES_ID where EST_ID =:EST_ID";
				
				$this->resultado = $this->conexao->prepare($this->sql);
				
				$this->resultado->bindValue(':EST_NOME_FANTASIA', $this->post->getEST_NOME_FANTASIA());
				$this->resultado->bindValue(':EST_NOME_RESPONSAVEL', $this->post->getEST_NOME_RESPONSAVEL());
				$this->resultado->bindValue(':EST_CNPJ', $this->post->getEST_CNPJ());
				$this->resultado->bindValue(':EST_SITE_EMPRESA', $this->post->getEST_SITE_EMPRESA());
				$this->resultado->bindValue(':TES_ID', $this->post->getTES_ID());
				$this->resultado->bindValue(':EST_ID', $this->post->getEST_ID());

				$this->resultado->execute();

				return $this->resultado;
			}

		public function excluirEstabelecimento($id) 
			{
				$this->sql = "delete from $this->tabela where EST_ID =:id";

				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->bindValue(':id', $id);

				$this->resultado->execute();

				return $this->resultado;
			}

		public function pesquisarPorId($id) 
			{
				$this->sql = "select * from $this->tabela where EST_ID=$id";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				return $this->resultado->fetchAll();
			}
		

		public function pesquisarPorIdUsr($id) 
			{
				$this->sql = "select * from $this->tabela where USU_ID=$id";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				return $this->resultado->fetchAll();
			}

			public function idEst($id)
			{
				$this->sql = "select * from $this->tabela where USU_ID=$id";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				$resultado = $this->resultado->fetchAll();
				foreach ($resultado as $linha) 
				{
					return $linha['EST_ID'];
				}
			}


		 public function pesquisarPorCnpj($cnpj) 
			{
				$this->sql = "select * from $this->tabela where EST_CNPJ=:cnpj";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->bindValue(':cnpj', $cnpj);
				$this->resultado->execute();
				return $this->resultado->fetch(PDO::FETCH_ASSOC);
			}
			
		public function listarADM() 
			{
				$this->sql = "SELECT * FROM ESTABELECIMENTOS LEFT JOIN USUARIOS ON ESTABELECIMENTOS.USU_ID = USUARIOS.USU_ID LEFT JOIN LOCALIZACOES ON ESTABELECIMENTOS.LOC_ID = LOCALIZACOES.LOC_ID LEFT JOIN TIPOS_ESTABELECIMENTOS ON ESTABELECIMENTOS.TES_ID = TIPOS_ESTABELECIMENTOS.TES_ID WHERE ESTABELECIMENTOS.EST_STATUS_BLOQUEIO = 0 LIMIT 10";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				return $this->resultado->fetchAll();
			}
		
		public function editarEstabelecimentoADM($estabelecimento,$tes_id) 
			{
				$this->post = $estabelecimento;
				$this->sql = "UPDATE $this->tabela SET EST_NOME_FANTASIA=:nome,EST_CNPJ=:cnpj,EST_SITE_EMPRESA=:site,EST_NUMERO_ENDERECO=:numero,EST_PUBLICO_ALVO=:alvo,EST_FACEBOOK_EMPRESA=:facebook,EST_NOME_RESPONSAVEL=:responsavel,EST_COMPLEMENTO=:complemento,TES_ID=:tipo WHERE EST_ID =:id";
				$this->resultado = $this->conexao->prepare($this->sql);
				
				$this->resultado->bindParam(':nome', $this->post->getEST_NOME_FANTASIA());
				$this->resultado->bindParam(':cnpj', $this->post->getEST_CNPJ());
				$this->resultado->bindParam(':site', $this->post->getEST_SITE_EMPRESA());
				$this->resultado->bindParam(':numero', $this->post->getEST_NUMERO_ENDERECO());
				$this->resultado->bindParam(':alvo', $this->post->getEST_PUBLICO_ALVO());
				$this->resultado->bindParam(':facebook', $this->post->getEST_FACEBOOK_EMPRESA());
				$this->resultado->bindParam(':responsavel', $this->post->getEST_NOME_RESPONSAVEL());
				$this->resultado->bindParam(':complemento', $this->post->getEST_COMPLEMENTO());
				$this->resultado->bindParam(':tipo', $tes_id);
				$this->resultado->bindParam(':id', $this->post->getEST_ID());

				$this->resultado->execute();

				return $this->resultado;
			}
		
		public function excluirADM($id) 
			{
				$this->sql = "UPDATE $this->tabela SET EST_STATUS_BLOQUEIO = 1 WHERE EST_ID=:id";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->bindParam(':id',$id);
				$this->resultado->execute();
			}
		
		public function listarTodos()
			{
				$this->sql = "select * from $this->tabela";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				return $this->resultado->fetchAll();
			}
			
		public function selecionar_localizacao($id)
			{
				$this->sql = "select * from $this->tabela where EST_ID=$id";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				$resultado = $this->resultado->fetchAll();
				foreach ($resultado as $linha) 
					{
						return $linha['LOC_ID'];
					}
			}
			public function todo_estabelecimento($id)
			{
				$this->sql = "select * from $this->tabela where EST_ID=$id";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				$resultado = $this->resultado->fetchAll();
				return $resultado;
			}
			public function estabelecimento_nome($nome)
			{
				$this->sql = "SELECT * FROM estabelecimentos WHERE EST_NOME_FANTASIA = :nome";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->bindParam(':nome',$nome);
				$this->resultado->execute();
				$resultado = $this->resultado->fetchAll();
				return $resultado;
			}
			
			public function verificar_cnpj($cnpjPostado)
			{
				$this->sql="select * from $this->tabela WHERE EST_CNPJ = '$cnpjPostado'";
				$this->resultado= $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				return $this->resultado->rowCount();
			}
			
			public function obterEstabelecimentoPorNome($busca)
			{
				$this->sql = "select * from $this->tabela WHERE EST_NOME_FANTASIA = :busca";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->bindParam(':busca',$busca);
				$this->resultado->execute();
				return $this->resultado->fetchAll();
			}
			
	}
?>

