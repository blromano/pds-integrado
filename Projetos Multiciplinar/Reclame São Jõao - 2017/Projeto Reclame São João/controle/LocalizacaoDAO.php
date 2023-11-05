<?php

	require_once 'Conexao.php';

	class LocalizacaoDAO 
		{
			private $conexao;
			private $sql;
			private $localizacao;
			private $resultado;
			private $tabela;

			public function __construct()
				{
					$conn = new Conexao();
					$this->conexao = $conn->getConexao();
					$this->tabela = "localizacoes";
				}
			
			public function inserirLocalizacao($localizacao)
				{
					$this->localizacao = $localizacao;		
					$this->sql="insert into $this->tabela (LOC_RUA, LOC_BAIRRO, LOC_CEP, LOC_ESTADO, LOC_CIDADE) values (:LOC_RUA, :LOC_BAIRRO, :LOC_CEP, :LOC_ESTADO, :LOC_CIDADE)";
					$this->resultado = $this->conexao->prepare($this->sql);


					$this->resultado->bindValue(':LOC_RUA',$this->localizacao->getLOC_RUA());     
					$this->resultado->bindValue(':LOC_BAIRRO',$this->localizacao->getLOC_BAIRRO());     
					$this->resultado->bindValue(':LOC_CEP',$this->localizacao->getLOC_CEP());     
					$this->resultado->bindValue(':LOC_ESTADO',$this->localizacao->getLOC_ESTADO());     
					$this->resultado->bindValue(':LOC_CIDADE',$this->localizacao->getLOC_CIDADE());			
					$this->resultado->execute();


					return $this->conexao->lastInsertId();
				}
			
			public function editarADM($localizacao) 
				{
					$this->localizacao = $localizacao;
					$this->sql = "UPDATE $this->tabela SET LOC_RUA=:rua,LOC_BAIRRO=:bairro,LOC_ESTADO=:estado,LOC_CIDADE=:cidade,LOC_CEP=:cep WHERE LOC_ID=:id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':rua',$this->localizacao->getLOC_RUA());     
					$this->resultado->bindParam(':bairro',$this->localizacao->getLOC_BAIRRO());       
					$this->resultado->bindParam(':estado',$this->localizacao->getLOC_ESTADO());     
					$this->resultado->bindParam(':cidade',$this->localizacao->getLOC_CIDADE());
					$this->resultado->bindParam(':cep',$this->localizacao->getLOC_CEP());
					$this->resultado->bindParam(':id',$this->localizacao->getLOC_ID()); 
					$this->resultado->execute();
					return $this->resultado;
				}

			public function editarEndereco($post) 
				{
					$this->post = $post;
					$this->sql = "update $this->tabela set LOC_RUA=:LOC_RUA, LOC_BAIRRO=:LOC_BAIRRO, LOC_CEP=:LOC_CEP, LOC_CIDADE=:LOC_CIDADE, LOC_ESTADO=:LOC_ESTADO where LOC_ID =:LOC_ID";

					$this->resultado = $this->conexao->prepare($this->sql);

					$this->resultado->bindValue(':LOC_ID', $this->post->getLOC_ID());
					$this->resultado->bindValue(':LOC_RUA', $this->post->getLOC_RUA());
					$this->resultado->bindValue(':LOC_BAIRRO', $this->post->getLOC_BAIRRO());
					$this->resultado->bindValue(':LOC_CEP', $this->post->getLOC_CEP());
					$this->resultado->bindValue(':LOC_CIDADE', $this->post->getLOC_CIDADE());
					$this->resultado->bindValue(':LOC_ESTADO', $this->post->getLOC_ESTADO());
					
					$this->resultado->execute();
					
					return $this->resultado;
				}

			function selectIdLoc($id)
				{
					$this->sql = "select * from estabelecimentos where USU_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					$resultado = $this->resultado->fetchAll();
					
					foreach ($resultado as $linha) 
						{
							return $linha['LOC_ID'];
						}
					return 1;
				}
				
			public function pesquisarPorId($id) 
				{
					$this->sql = "select * from $this->tabela where LOC_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();

				}

			public function idLoc($id)
				{
					$this->sql = "select * from $this->tabela where LOC_ID = :id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':id',$id);
					$this->resultado->execute();
					$resultado = $this->resultado->fetchAll();
					foreach ($resultado as $linha) 
					{
						return $linha['LOC_ID'];
					}
				}

			public function todo_localizacoes($loc_id)
				{
					$this->sql = "select * from localizacoes where LOC_ID = :loc_id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':loc_id',$loc_id);
					$this->resultado->execute();
					$resultado = $this->resultado->fetchAll();
					return $resultado;
				}
			
			public function selecionarLocId($locid)
				{
					$this->sql = "select LOC_BAIRRO from $this->tabela where LOC_ID = :locid";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':locid',$locid);
					$this->resultado->execute();
					$resultado = $this->resultado->fetchAll();
					foreach ($resultado as $linha) 
					{
						return $linha['LOC_BAIRRO'];
					}
				}	
		}
?>