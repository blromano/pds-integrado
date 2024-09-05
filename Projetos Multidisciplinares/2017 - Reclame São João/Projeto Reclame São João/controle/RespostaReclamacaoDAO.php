<?php
	
	require_once 'Conexao.php';

	class RespostaReclamacaoDAO 
		{
			private $conexao;
			private $sql;
			private $RespostasReclamacoes;
			private $resultado;
			private $tabela;
		
			public function __construct()
				{
					$conn = new Conexao();
					$this->conexao = $conn->getConexao();
					$this->tabela = "respostas_reclamacoes";
				}

			public function inserirResposta($RespostasReclamacoes)
				{
					$this->RespostasReclamacoes = $RespostasReclamacoes;		
					$this->sql="insert into $this->tabela (RER_DESCRICAO, RER_DATA_HORA, RER_AVALIACAO, RER_STATUS_APROVADO, REC_ID, RER_STATUS_RESOLVIDO, ADM_ID) values (:RER_DESCRICAO, :RER_DATA_HORA, :RER_AVALIACAO, :RER_STATUS_APROVADO, :REC_ID, :RER_STATUS_RESOLVIDO, 1)";
					$this->resultado = $this->conexao->prepare($this->sql);

					$this->resultado->bindValue(':RER_DESCRICAO',$this->RespostasReclamacoes->getRER_DESCRICAO());
					$this->resultado->bindValue(':RER_DATA_HORA',date("Y-m-d",time()));
					$this->resultado->bindValue(':RER_AVALIACAO',$this->RespostasReclamacoes->getRER_AVALIACAO());
					$this->resultado->bindValue(':RER_STATUS_APROVADO',$this->RespostasReclamacoes->getRER_STATUS_APROVADO());
					$this->resultado->bindValue(':RER_STATUS_RESOLVIDO',$this->RespostasReclamacoes->getRER_STATUS_RESOLVIDO());
					$this->resultado->bindValue(':REC_ID',$this->RespostasReclamacoes->getREC_ID());

					$this->resultado->execute();

					return $this->resultado;
				}
			
			public function listarPendencias() 
				{
					$this->sql = "select * from $this->tabela where RER_STATUS_APROVADO = 0";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}

			public function editarResposta($RespostasReclamacoes) 
				{
					$this->RespostasReclamacoes = $RespostasReclamacoes;
					$this->sql = "update $this->tabela set RER_DESCRICAO=:RER_DESCRICAO where RER_ID =:RER_ID";

					$this->resultado = $this->conexao->prepare($this->sql);

					$this->resultado->bindParam(':RER_DESCRICAO', $this->RespostasReclamacoes->getRER_DESCRICAO());
					$this->resultado->bindParam(':RER_ID', $this->RespostasReclamacoes->getRER_ID());

					$this->resultado->execute();

					return $this->resultado;
				}

			public function excluirResposta($RespostasReclamacoes) 
				{
					$this->sql = "delete from $this->tabela where RER_ID =:RER_ID";

					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':RER_ID', $RespostasReclamacoes);

					$this->resultado->execute();

					return $this->resultado;
				}

			public function listar()
				{
					$this->sql="select * from $this->tabela WHERE RER_STATUS_APROVADO = 1";
					$this->resultado= $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();	
				}

			public function pesquisarPorId($id) 
				{
					$this->sql = "select * from $this->tabela where RER_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}
			
			public function pesquisarPorRecId($id) 
				{
					$this->sql = "select * from $this->tabela where REC_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}
			
			public function selecionarStatus($rec_id) 
				{
					$this->sql = "select RER_STATUS_APROVADO from $this->tabela where REC_ID=:rec_id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':rec_id',$rec_id);
					$this->resultado->execute();
					foreach ($this->resultado->fetchAll() as $linha)
					{
						return $linha['RER_STATUS_APROVADO'];	
					}
				}


       // Admin mod 05

			public function listarADM()
			{
				$this->sql = "
					SELECT
						RESPOSTAS_RECLAMACOES.*,
						RECLAMACOES.*,
						U1.USU_FOTO_PERFIL AS FOTO_CONSUMIDOR,
						U2.USU_FOTO_PERFIL AS FOTO_ESTABELECIMENTO,
						U1.USU_EMAIL AS EMAIL_CONSUMIDOR,
						U2.USU_EMAIL AS EMAIL_ESTABELECIMENTO
					FROM RESPOSTAS_RECLAMACOES
					
					LEFT JOIN RECLAMACOES ON (RESPOSTAS_RECLAMACOES.REC_ID = RECLAMACOES.REC_ID)
					LEFT JOIN CONSUMIDORES ON (RECLAMACOES.CON_ID = CONSUMIDORES.CON_ID)
					LEFT JOIN ESTABELECIMENTOS ON (RECLAMACOES.EST_ID = ESTABELECIMENTOS.EST_ID)
					LEFT JOIN USUARIOS AS U1 ON (CONSUMIDORES.USU_ID = U1.USU_ID)
					LEFT JOIN USUARIOS AS U2 ON (ESTABELECIMENTOS.USU_ID = U2.USU_ID)
					LIMIT 50
					";
					
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				return $this->resultado->fetchAll();
			}
    
			public function obterEmailEstabelecimentoPelaResposta($RER_ID)
				{
					$this->sql = "
						SELECT USU_EMAIL FROM RESPOSTAS_RECLAMACOES
						LEFT JOIN RECLAMACOES ON (RESPOSTAS_RECLAMACOES.REC_ID = RECLAMACOES.REC_ID)
						LEFT JOIN ESTABELECIMENTOS ON (RECLAMACOES.EST_ID = ESTABELECIMENTOS.EST_ID)
						LEFT JOIN USUARIOS ON (ESTABELECIMENTOS.USU_ID = USUARIOS.USU_ID)
						WHERE RER_ID = $RER_ID
					";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetch(PDO::FETCH_ASSOC)["USU_EMAIL"];
				}
				
			public function obterEmailConsumidorPelaResposta($RER_ID)
				{
					$this->sql = "
						SELECT USU_EMAIL FROM RESPOSTAS_RECLAMACOES
						LEFT JOIN RECLAMACOES ON (RESPOSTAS_RECLAMACOES.REC_ID = RECLAMACOES.REC_ID)
						LEFT JOIN CONSUMIDORES ON (RECLAMACOES.CON_ID = CONSUMIDORES.CON_ID)
						LEFT JOIN USUARIOS ON (CONSUMIDORES.USU_ID = USUARIOS.USU_ID)
						WHERE RER_ID = $RER_ID
					";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetch(PDO::FETCH_ASSOC)["USU_EMAIL"];
				}
				
			public function obterDadosRespostaParaEmail($RER_ID)
				{
					$this->sql = "
						SELECT * FROM RESPOSTAS_RECLAMACOES
						LEFT JOIN RECLAMACOES ON (RESPOSTAS_RECLAMACOES.REC_ID = RECLAMACOES.REC_ID)
						LEFT JOIN ESTABELECIMENTOS ON (RECLAMACOES.EST_ID = ESTABELECIMENTOS.EST_ID)
						LEFT JOIN USUARIOS ON (ESTABELECIMENTOS.USU_ID = USUARIOS.USU_ID)
						WHERE RER_ID = $RER_ID
					";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetch(PDO::FETCH_ASSOC);
				}
				
			
	
	
			public function alterarStatus($bool,$RER_ID) 
				{
					$this->sql = "update respostas_reclamacoes set RER_STATUS_APROVADO=:status where RER_ID=:RER_ID";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->bindParam(':status', $bool);
					$this->resultado->bindParam(':RER_ID', $RER_ID);
					$this->resultado->execute();
					return $this->resultado;
				}

		}
		
?>

