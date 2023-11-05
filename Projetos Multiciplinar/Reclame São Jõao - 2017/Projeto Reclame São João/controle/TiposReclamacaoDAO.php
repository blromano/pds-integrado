<?php
	
	require_once 'Conexao.php';
	
	class TiposReclamacaoDAO 
		{
			private $conexao;
			private $sql;
			private $tiposReclamacao;
			private $resultado;
			private $tabela;
	
		
			public function __construct()
				{
					$conn = new Conexao();
					$this->conexao = $conn->getConexao();
					$this->tabela = "TIPOS_RECLAMACOES";
				}
	
			public function inserir($tiposReclamacao,$vincular)
				{
					$this->tiposReclamacao = $tiposReclamacao;	
					$this->sql="insert into $this->tabela (TRC_CATEGORIA, TES_ID) values (:categoria, :vincular)";			
					$this->resultado = $this->conexao->prepare($this->sql);
							
					$this->resultado->bindParam(':categoria',$this->tiposReclamacao->getCategoria());
					$this->resultado->bindParam(':vincular',$vincular);

					$this->resultado->execute();
					
					return $this->resultado;
				}
	
			public function editar($tiposReclamacao,$vincular)
				{
					$this->tiposReclamacao = $tiposReclamacao;		
					$this->sql="update $this->tabela set TRC_CATEGORIA=:categoria,TES_ID=:vincular where TRC_ID=:id";		
					
					$this->resultado = $this->conexao->prepare($this->sql);
					
					$this->resultado->bindParam(':categoria',$this->tiposReclamacao->getCategoria());
					$this->resultado->bindParam(':vincular',$vincular);
					$this->resultado->bindParam(':id',$this->tiposReclamacao->getId());

					$this->resultado->execute();
					
					return $this->resultado;
				}
	
			public function excluir($id)
				{		
					$this->sql="delete from $this->tabela where TRC_ID=:id";		
					
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':id',$id);
					try 
						{
							$this->resultado->execute();
							$_SESSION["Modal"] = ["Tipos de Reclamação","Tipo de reclamação deletado com sucesso!"];
							//header("location: ../../../../admin.php?pagina=9");
						} 
					catch(PDOException $e) 
						{
							$_SESSION["Modal"] = ["Tipos de Reclamação","Erro ao deletar. Tipo de reclamação já está em uso!"];
							//header("location: ../../../../admin.php?pagina=9");
						}
					return $this->resultado;
				}
	
			public function listar()
				{
					$this->sql="select * from $this->tabela LEFT JOIN TIPOS_ESTABELECIMENTOS ON $this->tabela.TES_ID = TIPOS_ESTABELECIMENTOS.TES_ID";
					$this->resultado= $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}

			public function pesquisar_igual($categoria, $id)
				{      
					$this->sql="select * from $this->tabela WHERE TRC_CATEGORIA=:categoria AND TES_ID = :id";
					$this->resultado= $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':categoria',$categoria);
					$this->resultado->bindParam(':id',$id);
					$this->resultado->execute();
					if(($this->resultado->rowCount()) > 0)
						{ 
							return 1;
						} 
					else 
						{
							return 0;
						}
				}
				
			public function isAdmin($USU_ID)
				{      
					$this->sql="select * from administradores where USU_ID=:USU_ID and ADM_TIPO_PRIVILEGIO = 1";
					$this->resultado= $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':USU_ID',$USU_ID);
					$this->resultado->execute();
					if(($this->resultado->rowCount()) > 0)
						{ 
							return true;
						} 
					else 
						{
							return false;
						}
				}
		}
?>

