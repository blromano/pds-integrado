<?php

	require_once 'Conexao.php';

	class ProdutoDAO 
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
					$this->tabela = "PRODUTOS";
				}

			public function inserirProduto($post) 
				{
					$this->post = $post;
					$this->sql = "insert into $this->tabela (PDT_NOME, PDT_DESCRICAO_PRODUTO, EST_ID, TPR_ID) values (:PDT_NOME,:PDT_DESCRICAO_PRODUTO, :EST_ID, :TPR_ID)";
					$this->resultado = $this->conexao->prepare($this->sql);

					$this->resultado->bindParam(':PDT_NOME', $this->post->getPDT_NOME());
					$this->resultado->bindParam(':PDT_DESCRICAO_PRODUTO', $this->post->getPDT_DESCRICAO_PRODUTO());
					$this->resultado->bindParam(':EST_ID', $this->post->getEST_ID());
					$this->resultado->bindParam(':TPR_ID', $this->post->getTPR_ID());

					$this->resultado->execute();

					return $this->resultado;
				}

			public function editarProduto($post) 
				{
					$this->post = $post;
					$this->sql = "update $this->tabela set PDT_NOME =:PDT_NOME, PDT_DESCRICAO_PRODUTO=:PDT_DESCRICAO_PRODUTO, TPR_ID=:TPR_ID where PDT_ID =:PDT_ID";

					$this->resultado = $this->conexao->prepare($this->sql);

					$this->resultado->bindParam(':PDT_ID', $this->post->getPDT_ID());
					$this->resultado->bindParam(':PDT_NOME', $this->post->getPDT_NOME());
					$this->resultado->bindParam(':PDT_DESCRICAO_PRODUTO', $this->post->getPDT_DESCRICAO_PRODUTO());
					$this->resultado->bindParam(':TPR_ID', $this->post->getTPR_ID());

					$this->resultado->execute();

					return $this->resultado;
				}

			public function excluirProduto($PDT_ID) 
				{
					$this->sql = "delete from $this->tabela where PDT_ID =:PDT_ID";

					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':PDT_ID',$PDT_ID);

					$this->resultado->execute();

					return $this->resultado;
				}

			public function listarTodos() 
				{
					$this->sql = "select * from $this->tabela";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}

			public function pesquisarPorId($id) 
				{
					$this->sql = "select * from $this->tabela where EST_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}
	
			public function listarTipoProdutoSelecionado($EST_ID, $PDT_ID)
				{
					$this->sql="select * from $this->tabela WHERE EST_ID =$EST_ID and PDT_ID = $PDT_ID";
					$this->resultado= $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();	
				}
		}
?>

