	<?php
	
	require_once 'Conexao.php';
	
	class ConsumidorDAO 
		{
			private $conexao;
			private $sql;
			private $consumidor;
			private $resultado;
			private $tabela;
			
			public function __construct()
				{
					$conn = new Conexao();
					$this->conexao = $conn->getConexao();
					$this->tabela = "consumidores";
				}
		
			public function inserirConsumidor($consumidor)
				{
					$this->consumidor = $consumidor;		
					$this->sql="insert into $this->tabela 
					(CON_NUMERO, CON_DATA_HORA_EMAIL_VALIDACAO, CON_COMPLEMENTO, CON_STATUS_BLOQUEIO, CON_TELEFONE2, CON_DATA_NASCIMENTO,CON_CPF, CON_STATUS_ATIVIDADE, USU_ID, LOC_ID) values 
					(:CON_NUMERO, :CON_DATA_HORA_EMAIL_VALIDACAO, :CON_COMPLEMENTO, 0, :CON_TELEFONE2, :CON_DATA_NASCIMENTO, :CON_CPF, 1, :USU_ID, :LOC_ID)";
					$this->resultado = $this->conexao->prepare($this->sql);
					
					$this->resultado->bindValue	(':CON_NUMERO',$this->consumidor->getCON_NUMERO());     
					//$this->resultado->bindParam(':CON_CADASTRO_VALIDADO',1);    
					date_default_timezone_set('America/Sao_Paulo');		
					$dataAtual = time();
					$this->resultado->bindValue(':CON_DATA_HORA_EMAIL_VALIDACAO',date("Y-m-d H:i:s",$dataAtual));         
					$this->resultado->bindValue(':CON_COMPLEMENTO',$this->consumidor->getCON_COMPLEMENTO());     
					//$this->resultado->bindParam(':CON_STATUS_BLOQUEIO','0');     
					$this->resultado->bindValue(':CON_TELEFONE2',$this->consumidor->getCON_TELEFONE2());     
					$this->resultado->bindValue(':CON_DATA_NASCIMENTO',$this->consumidor->getCON_DATA_NASCIMENTO());     
					$this->resultado->bindValue(':CON_CPF',$this->consumidor->getCON_CPF());     
					//$this->resultado->bindParam(':CON_STATUS_ATIVIDADE',$this->consumidor->getStatusAtividade()); 
					$this->resultado->bindValue(':USU_ID',$this->consumidor->getUSU_ID());     
					$this->resultado->bindValue(':LOC_ID',$this->consumidor->getLOC_ID());       

				   $this->resultado->execute();
				   return $this->conexao->lastInsertId();
				}
		
			public function editarADM($consumidor) 
				{
					$this->consumidor = $consumidor;
					$this->sql = "UPDATE $this->tabela SET CON_NUMERO=:CON_NUMERO,CON_COMPLEMENTO=:CON_COMPLEMENTO,CON_TELEFONE2=:CON_TELEFONE2,CON_DATA_NASCIMENTO=:CON_DATA_NASCIMENTO,CON_CPF=:CON_CPF WHERE CON_ID=:CON_ID";
					$this->resultado = $this->conexao->prepare($this->sql);

					$this->resultado->bindParam(':CON_NUMERO',$this->consumidor->getCON_NUMERO());
					$this->resultado->bindParam(':CON_COMPLEMENTO',$this->consumidor->getCON_COMPLEMENTO());
					$this->resultado->bindParam(':CON_TELEFONE2',$this->consumidor->getCON_TELEFONE2());
					$this->resultado->bindParam(':CON_DATA_NASCIMENTO',$this->consumidor->getCON_DATA_NASCIMENTO());
					$this->resultado->bindParam(':CON_CPF',$this->consumidor->getCON_CPF());
					$this->resultado->bindParam(':CON_ID',$this->consumidor->getCON_ID());

					$this->resultado->execute();
					return $this->resultado;
				}

			public function excluirADM($CON_ID) 
				{
					$this->sql = "UPDATE $this->tabela SET CON_STATUS_ATIVIDADE = 1 WHERE CON_ID=:CON_ID";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':CON_ID',$CON_ID);
					$this->resultado->execute();
				}

			public function listarADM() 
				{
					$this->sql = "SELECT * FROM CONSUMIDORES LEFT JOIN USUARIOS ON CONSUMIDORES.USU_ID = USUARIOS.USU_ID LEFT JOIN LOCALIZACOES ON CONSUMIDORES.LOC_ID = LOCALIZACOES.LOC_ID WHERE CON_STATUS_ATIVIDADE = 0";
					$this->resultado= $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}

			public function verificar_cpf($cpfPostado)
				{
					$this->sql="select * from $this->tabela WHERE CON_CPF = '$cpfPostado'";
					$this->resultado= $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->rowCount();
				}
			
			public function editarNumero_Complemento($post) 
				{
					$this->post = $post;
					$this->sql = "update $this->tabela set CON_NUMERO=:CON_NUMERO, CON_COMPLEMENTO=:CON_COMPLEMENTO where CON_ID =:CON_ID";
					
					$this->resultado = $this->conexao->prepare($this->sql);
					
					$this->resultado->bindValue(':CON_NUMERO', $this->post->getCON_NUMERO());
					$this->resultado->bindValue(':CON_COMPLEMENTO', $this->post->getCON_COMPLEMENTO());
					$this->resultado->bindValue(':CON_ID', $this->post->getCON_ID());

					$this->resultado->execute();
					
					return $this->resultado;
				}

			public function editarInformacoesPessoais($post) 
				{
					$this->post = $post;
							
					$this->sql = "update $this->tabela set CON_DATA_NASCIMENTO=:CON_DATA_NASCIMENTO, CON_TELEFONE2=:CON_TELEFONE2 where CON_ID =:CON_ID";
					
					$this->resultado = $this->conexao->prepare($this->sql);
					
					//$this->resultado->bindValue(':CON_CPF', $this->post->getCON_CPF());
					$this->resultado->bindValue(':CON_DATA_NASCIMENTO', $this->post->getCON_DATA_NASCIMENTO());
					//$this->resultado->bindValue(':CON_CPF', $this->post->getCON_CPF());
					$this->resultado->bindValue(':CON_TELEFONE2', $this->post->getCON_TELEFONE2());
					$this->resultado->bindValue(':CON_ID', $this->post->getCON_ID());

					var_dump($this->resultado->execute());

					return $this->resultado;
				}

			public function SelecionarPorId($id)
				{

					$this->sql = "select * from $this->tabela where CON_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					foreach ($this->resultado->fetchAll() as $linha_consumidor)
						{
							
						}
					return $linha_consumidor['USU_ID'];
				}

			public function pesquisarPorId($id) 
				{
					$this->sql = "select * from $this->tabela where CON_ID=$id";
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

			public function idCon($id)
				{
					$this->sql = "select * from $this->tabela where USU_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					$resultado = $this->resultado->fetchAll();
					foreach ($resultado as $linha) 
					{
						return $linha['CON_ID'];
					}
				}

			public function idConIsset($id)
				{
					$this->sql = "select * from $this->tabela where USU_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					$resultado = $this->resultado->fetchAll();
					foreach ($resultado as $linha) 
						{
							return isset($linha['CON_ID']);
						}
				}

			public function selecionar_localizacao($id)
				{
					$this->sql = "select * from $this->tabela where CON_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					$resultado = $this->resultado->fetchAll();
					foreach ($resultado as $linha) 
						{
							return $linha['LOC_ID'];
						}
				}
			
			public function retornar_USU_ID($id)
				{

					$this->sql = "select * from $this->tabela where CON_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					foreach ($this->resultado->fetchAll() as $linha)
						{
							
						}
					return $linha['USU_ID'];
				}

			public function contarConsumidores()
			{
				$this->sql="select COUNT(CON_ID) as qtdConsumidores from $this->tabela";
				$this->resultado= $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				foreach ($this->resultado->fetchAll() as $linha)
					{
						return $linha['qtdConsumidores'];	
					}
			}
		}
?>