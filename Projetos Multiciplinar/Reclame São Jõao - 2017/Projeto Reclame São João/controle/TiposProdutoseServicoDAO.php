<?php

	require_once 'Conexao.php';

	class TiposProdutoseServicoDAO
		{
			private $conexao;
			private $sql;
			private $tiposestabelecimentos;
			private $resultado;
			private $tabela;
			private $id;
			
			public function __construct()
				{
					$conn = new Conexao();
					$this->conexao = $conn->getConexao();
					$this->tabela = "tipos_produtos";
				}

			public function inserir($des)
				{
					$this->tiposestabelecimentos = $des;
					$this->sql = "insert into $this->tabela (TPR_DESCRICAO) values (:des)";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':des', $this->tiposestabelecimentos->getDescricao());
					$this->resultado->execute();
					return $this->resultado;
				}
			
			public function editar($up)
				{
					$this->tiposestabelecimentos = $up;
					$this->sql = "update $this->tabela set TPR_DESCRICAO=:categoria where TPR_ID=:id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':id', $this->tiposestabelecimentos->getId());
					$this->resultado->bindParam(':categoria', $this->tiposestabelecimentos->getDescricao());
					$this->resultado->execute();
					return $this->resultado;
				}
			
			public function excluir($id)
				{
					$this->sql = "DELETE FROM $this->tabela where TPR_ID=:id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':id', $id);
					try 
						{
							$this->resultado->execute();
							$_SESSION["Modal"] = ["Produto/Serviço","Produto/Serviço deletado com sucesso!"];
							header("location: ../../../../admin.php?pagina=11");
						}
					catch(PDOException $e) 
						{
							// mostra o erro gerado
							// echo "Error: " . $e->getMessage();
							$_SESSION["Modal"] = ["Produto/Serviço","Erro ao deletar Produto/Serviço!"];
							header("location: ../../../../admin.php?pagina=11");
						}
					return $this->resultado;
				}
			
			public function pesquisar_igual($nome)
				{
					$this->tiposestabelecimentos = $nome;
					$this->sql = "select * from $this->tabela WHERE TPR_DESCRICAO=:categoria";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':categoria', $this->tiposestabelecimentos);
					$this->resultado->execute();
					if (($this->resultado->rowCount()) > 0) 
						{
							return 1;
						}
					else 
						{
							return 0;
						}
				}
			
			public function listar()
				{
					$this->sql = "select * from $this->tabela";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}
		}
?>