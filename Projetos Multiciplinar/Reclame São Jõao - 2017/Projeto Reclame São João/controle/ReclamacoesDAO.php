<?php

require_once 'Conexao.php';

require_once($_SERVER['DOCUMENT_ROOT'] . '\RECLAME_SAO_JOAO-INTEGRAR\modelo\Reclamacoes.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '\RECLAME_SAO_JOAO-INTEGRAR\modelo\NumReclamacoes.php');


class ReclamacoesDAO 
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
		$this->tabela = "RECLAMACOES";
	}

		//MOD02 - CODIGO COMEÇA AQUI ------------------------------------------------------------------------------------------------------------------------

	public function inserirReclamacao($reclamacao)
	{
		$this->sql="insert into $this->tabela (REC_TITULO_RECLAMACAO, REC_DESCRICAO, REC_DATA_HORA, REC_LINK_IMAGEM, REC_NOTA, REC_APROVADO, CON_ID, EST_ID) values (:REC_TITULO_RECLAMACAO, :REC_DESCRICAO, :REC_DATA_HORA, :REC_LINK_IMAGEM, :REC_NOTA_FORMATADA, :REC_APROVADO, :CON_ID, :EST_ID)";
		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindValue(':REC_TITULO_RECLAMACAO',$reclamacao->getREC_TITULO_RECLAMACAO());  
		$this->resultado->bindValue(':REC_DESCRICAO',$reclamacao->getREC_DESCRICAO()); 
		$this->resultado->bindValue(':REC_DATA_HORA',date("Y-m-d H:i",time())); 
		$this->resultado->bindValue(':REC_LINK_IMAGEM',$reclamacao->getREC_LINK_IMAGEM());
		$this->resultado->bindValue(':REC_NOTA_FORMATADA',$reclamacao->getREC_NOTA_FORMATADA()); 		
		$this->resultado->bindValue(':REC_APROVADO',$reclamacao->getREC_APROVADO());
		$this->resultado->bindValue(':EST_ID',$reclamacao->getEST_ID()); 
		$this->resultado->bindValue(':CON_ID',$reclamacao->getCON_ID()); 
$this->resultado->execute();
		return $this->conexao->lastInsertId();
		
	}

	public function stringTamanho() 
	{
		function limitar($string, $tamanho, $encode = 'UTF-8') 
		{
			if(strlen($string) > $tamanho)
			{
				$string = mb_substr($string, 0, $tamanho - 3, $encode) . '...';
			}
			else
			{
				$string = mb_substr($string, 0, $tamanho, $encode);
			}
			return $string;
		}
	}

	public function reclamacaoCategoria() 
	{
		$this->sql = "SELECT TRC_CATEGORIA FROM TIPOS_RECLAMACOES";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$TRC_CATEGORIA = $this->resultado->fetchAll();
		return $TRC_CATEGORIA;		
	}

	public function reclamacaoID() 
	{
		$ID_CHECKBOX = $_SESSION['ID_CHECKBOX'];
		$this->sql = "SELECT TRC_ID FROM TIPOS_RECLAMACOES WHERE TRC_CATEGORIA = '$ID_CHECKBOX';";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$TRC_ID = $this->resultado->fetchAll();
		return $TRC_ID;				
	}		

	public function TotalNotasReclamacoes($id)
	{
		$this->sql    = "SELECT REC_NOTA FROM RECLAMACOES WHERE EST_ID =:id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id',$id);
		$this->resultado->execute();
		$array = $this->resultado->fetchAll();

		if (count($array)>0) 
		{
			$total_notas = 0;
			$cont=0;
			foreach ($array as $row) 
			{
				$cont++;
				$total_notas = $total_notas + $row["REC_NOTA"];
			}     
		}
		else
		{
			$total_notas = 0;
			$cont=0;
		}

		if($total_notas != 0 && $cont != 0)
		{
			$media_reclamacao = $total_notas / $cont;
		}
		else
		{
			echo "";
			$media_reclamacao = 0;
		}

		$this->sql = "UPDATE estabelecimentos SET EST_MEDIA_RECLAMACAO =".$media_reclamacao." WHERE EST_ID=:id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id',$id);
		$this->resultado->execute();




		$this->sql = "SELECT EST_ID  FROM estabelecimentos ORDER BY EST_MEDIA_RECLAMACAO DESC";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$pontuacao_estabelecimentos = $this->resultado->fetchAll();
		$i=1;
		$posicao;
		foreach ($pontuacao_estabelecimentos as $key) {
			if ($key['EST_ID']==$id) {
				# code...
				$posicao=$i;
			}
			$i++;
			# code...
		}

		


		$this->sql = "INSERT INTO caracteristicas_estabelecimentos (CAR_POSICAO,CAR_PONTUACAO,CAR_DATE,EST_ID) VALUES
		($posicao,$media_reclamacao,NOW(),$id)";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();




		$this->sql = "UPDATE estabelecimentos SET EST_TOTAL_RECLAMACAO = ".$cont." WHERE EST_ID=:id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id',$id);
		$this->resultado->execute();
	}

	public function reclamacaoInformacoes($id) 
	{
		$this->sql = "SELECT REC_ID, REC_TITULO_RECLAMACAO, REC_DESCRICAO, REC_NOTA FROM reclamacoes WHERE EST_ID =:id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id',$id);
		$this->resultado->execute();
		$resultado_reclamacao = $this->resultado->fetchAll();
		return $resultado_reclamacao;				
	}

	public function reclamacaoInformacoesAprovado($id) 
	{
		$this->sql = "SELECT REC_ID, REC_TITULO_RECLAMACAO, REC_DESCRICAO, REC_NOTA FROM reclamacoes WHERE EST_ID =:id AND REC_APROVADO = 1";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id',$id);
		$this->resultado->execute();
		$resultado_reclamacao = $this->resultado->fetchAll();
		return $resultado_reclamacao;				
	}		

	public function informacoesPagina() 
	{
		$nome_estabelecimento = isset($_SESSION["nome"]);
		$nome_estabelecimento_alternativo = isset($_GET["EST_NOME"]);

		if($nome_estabelecimento != null && $nome_estabelecimento_alternativo == 0)
		{
			$nome_estabelecimento = $_SESSION["nome"];
			return $nome_estabelecimento;
		}
		else if($nome_estabelecimento_alternativo == 1)
		{
			$nome_estabelecimento = $_GET["EST_NOME"];
			return $nome_estabelecimento;
		}
		else
		{
			header('Location: index.php');
		}
	}	

	public function mensagemCheckbox() 
	{
		if($_SESSION["QUANT_CHECKBOX"]==0)
		{
			$mensagem = "
			<script>alert('Checkbox nao foi preenchido')</script>
			<script>window.location = 'rec_editar.php';</script>
			"; 
			return $mensagem;
		}
		else
		{
			echo "";
		}
	}	

	public function retornandoTitulo() 
	{
		$REC_TITULO_RECLAMACAO = $_SESSION['REC_TITULO_RECLAMACAO'];
		return $REC_TITULO_RECLAMACAO;
	}	

	public function retornandoDescricao() 
	{
		$REC_DESCRICAO = $_SESSION['REC_DESCRICAO'];
		return $REC_DESCRICAO;
	}

	public function retornandoNome() 
	{
		$USU_NOME = isset($_SESSION["USU_NOME"]);
		return $USU_NOME;
	}	

	public function retornandoId() 
	{
		$EST_ID = isset($_SESSION["EST_ID"]);
		return $EST_ID;
	}	

	public function retornandoEstId() 
	{
		$EST_ID = $_SESSION["EST_ID"];
		return $EST_ID;
	}	

	public function retornandoEmail() 
	{
		$USU_EMAIL = $_SESSION['USU_EMAIL'];
		return $USU_EMAIL;
	}	

	public function obterReclamacaoPorId($rec_id)
	{
		$this->sql = "select * from RECLAMACOES WHERE REC_ID = :rec_id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':rec_id',$rec_id);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}

	public function contarNome($est_nome)
	{
		$i=1;
		$cont=0;
		$contadorarray = count($est_nome);
		while($i <= $contadorarray){
			$est_nome[$cont] = $est_nome[$cont][0];
			$i++;
			$cont++;
		}
		return $est_nome;
	}	

	public function obterReclamacoesPorConID($con_id)
	{
		$this->sql = "SELECT * FROM RECLAMACOES WHERE CON_ID=:con_id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':con_id',$con_id);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}

	public function deletarReclamacao($rec_id)
	{
		$this->sql = "DELETE FROM reclamacoes WHERE REC_ID=:rec_id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':rec_id',$rec_id);
		$this->resultado->execute();
		return (($this->resultado->rowCount()) > 0) ? true : false;
	}

	public function editarReclamacao($rec_id, $rec_titulo, $rec_descricao, $rec_data)
	{
		$this->sql = "UPDATE reclamacoes SET REC_TITULO_RECLAMACAO=:rec_titulo, REC_DESCRICAO =:rec_descricao, REC_DATA_HORA =:rec_data  WHERE REC_ID =:rec_id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':rec_id',$rec_id);
		$this->resultado->bindParam(':rec_titulo',$rec_titulo);
		$this->resultado->bindParam(':rec_descricao',$rec_descricao);
		$this->resultado->bindParam(':rec_data',$rec_data);
		$this->resultado->execute();
		return (($this->resultado->rowCount()) > 0) ? true : false;
	}

	public function contarReclamacoes()
	{
		$this->sql="select COUNT(REC_ID) as qtdReclamacoes from $this->tabela";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();

		foreach ($this->resultado->fetchAll() as $linha)
		{
			return $linha['qtdReclamacoes'];	
		}
	}


	public function primeiroMaiusculo() 
	{
		function ucprimeiro($string) 
		{ 
			$sentences = preg_split('/([.?!]+)/', $string, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE); 
			$new_string = ''; 

			foreach ($sentences as $key => $sentence) 
			{ 
				$new_string .= ($key & 1) == 0? 
				ucfirst(strtolower(trim($sentence))) : 
				$sentence.' '; 
			} 
			return trim($new_string); 
		} 
	}

	public function selecionarRecTitulo($rec_id)
	{
		$this->sql="select REC_TITULO_RECLAMACAO as titulo from $this->tabela WHERE REC_ID =:rec_id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':rec_id',$rec_id);
		$this->resultado->execute();
		foreach ($this->resultado->fetchAll() as $linha)
		{
			return $linha['titulo'];	
		}
	}

	public function contRecIdPublicado() 
	{
		$this->sql = "SELECT REC_ID FROM reclamacoes r WHERE NOT EXISTS (SELECT NOT_ID_RECLAMACAO FROM notificacao_reclamacao n WHERE r.REC_ID = n.NOT_ID_RECLAMACAO) AND r.REC_APROVADO = 1";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$select = $this->resultado->fetchAll();
		return count($select);			
	}	

	public function selecionarInformacaoPublicado() 
	{
		$this->sql = "SELECT REC_ID, CON_ID FROM reclamacoes r WHERE NOT EXISTS (SELECT NOT_ID_RECLAMACAO FROM notificacao_reclamacao n WHERE r.REC_ID = n.NOT_ID_RECLAMACAO) AND r.REC_APROVADO = 1";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();			
	}	

	public function contRecIdSuspensa() 
	{
		$this->sql = "SELECT REC_ID FROM reclamacoes r WHERE NOT EXISTS (SELECT NOT_ID_RECLAMACAO FROM notificacao_reclamacao n WHERE r.REC_ID = n.NOT_ID_RECLAMACAO) AND r.REC_APROVADO = -1";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$select = $this->resultado->fetchAll();
		return count($select);			
	}	

	public function selecionarInformacaoSuspensa() 
	{
		$this->sql = "SELECT REC_ID, CON_ID FROM reclamacoes r WHERE NOT EXISTS (SELECT NOT_ID_RECLAMACAO FROM notificacao_reclamacao n WHERE r.REC_ID = n.NOT_ID_RECLAMACAO) AND r.REC_APROVADO = -1";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();			
	}

	public function contRecIdRespondida() 
	{
		$this->sql = "SELECT REC_ID FROM respostas_reclamacoes r WHERE NOT EXISTS (SELECT NOT_ID_RECLAMACAO FROM notificacao_reclamacao n WHERE r.REC_ID = n.NOT_ID_RECLAMACAO) AND r.RER_STATUS_APROVADO = 1";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$select = $this->resultado->fetchAll();
		return count($select);			
	}	

	public function selecionarInformacaoRespondida() 
	{
		$this->sql = "SELECT REC_ID FROM respostas_reclamacoes r 
		WHERE NOT EXISTS (SELECT NOT_ID_RECLAMACAO FROM notificacao_reclamacao n WHERE r.REC_ID = n.NOT_ID_RECLAMACAO) AND r.RER_STATUS_APROVADO = 1";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();			
	}

	public function selecionarInformacaoRespondidaConId() 
	{
		$this->sql = "SELECT CON_ID FROM reclamacoes r INNER JOIN respostas_reclamacoes rr 
		ON rr.REC_ID = r.REC_ID WHERE NOT EXISTS (SELECT NOT_ID_RECLAMACAO FROM notificacao_reclamacao n WHERE rr.REC_ID = n.NOT_ID_RECLAMACAO) AND rr.RER_STATUS_APROVADO = 1";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();			
	}

		//MOD03 - CODIGO COMEÇA AQUI ------------------------------------------------------------------------------------------------------------------------

	public function pesquisarEstabelecimentoSolucao($id) 
	{
		$this->sql = "select * from reclamacoes join respostas_reclamacoes where respostas_reclamacoes.rec_id= reclamacoes.rec_id and est_id=$id;";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$select = $this->resultado->fetchAll();
		return count($select);
	}

	public function pesquisarReclamacaoNaoSolucionada($id) 
	{
		$this->sql = "select * from reclamacoes join respostas_reclamacoes where respostas_reclamacoes.rec_id= reclamacoes.rec_id and est_id=$id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$select = $this->resultado->fetchAll();
		return count($select);
	}

	public function pesquisarReclamacaoSolucionada($id) 
	{
		$this->sql = "select * from reclamacoes join respostas_reclamacoes where respostas_reclamacoes.rec_id= reclamacoes.rec_id and est_id=$id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$select = $this->resultado->fetchAll();
		return count($select);
	}

	public function pesquisarReclamacoes($idEst)
	{
		$this->sql="select * from $this->tabela join respostas_reclamacoes where respostas_reclamacoes.rec_id= reclamacoes.rec_id and est_id=$idEst ";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();	
	}

	public function pesquisarTodasReclamacoes($idEst)
	{
		$this->sql="select * from $this->tabela where est_id=$idEst;";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();	
	}

	public function pesquisarReclamacoesAtendidas($idEst)
	{
		$this->sql="select * from reclamacoes join respostas_reclamacoes where respostas_reclamacoes.rec_id= reclamacoes.rec_id and est_id=$idEst ";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();	
	}

	public function pesquisarReclamacoesNaoAtendidas($idEst)
	{
		$this->sql="select REC_DESCRICAO, reclamacoes.rec_id as ID, REC_DATA_HORA, REC_TITULO_RECLAMACAO, REC_NOTA, CON_ID from reclamacoes left join respostas_reclamacoes on  respostas_reclamacoes.rec_id = reclamacoes.rec_id  where respostas_reclamacoes.rec_id is null and est_id=$idEst;";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();	
	}

	public function pesquisarNumeroReclamacaoNaoAtendida($id) 
	{

		$this->sql = "select REC_DESCRICAO, reclamacoes.rec_id as ID, REC_DATA_HORA, REC_TITULO_RECLAMACAO, rec_nota, CON_ID from reclamacoes left join respostas_reclamacoes on  respostas_reclamacoes.rec_id = reclamacoes.rec_id  where respostas_reclamacoes.rec_id is null and est_id=$id;";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$select = $this->resultado->fetchAll();
		return count($select);
	}

		//MOD05 - CODIGO COMEÇA AQUI ------------------------------------------------------------------------------------------------------------------------

	public function listarTodos() 
	{
		$this->sql = "select * from $this->tabela limit 50";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}

	public function listarPendencias()
	{
		$this->sql = "select * from $this->tabela where REC_APROVADO = 0";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}

	public function obterNomeConsumidor($con_id) 
	{
		$this->sql = "select USU_NOME from CONSUMIDORES left join USUARIOS on CONSUMIDORES.USU_ID = USUARIOS.USU_ID where CON_ID = $con_id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetch(PDO::FETCH_ASSOC)["USU_NOME"];
	}

	public function obterNomeEmpresa($est_id) 
	{
		$this->sql = "select EST_NOME_FANTASIA from ESTABELECIMENTOS where EST_ID = $est_id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetch(PDO::FETCH_ASSOC)["EST_NOME_FANTASIA"];
	}

	public function obterTiposEstabelecimentoReclamacao($trc_id) 
	{
		$this->sql = "select TRC_CATEGORIA from RECLAMACOES left join TIPOS_RECLAMACOES on RECLAMACOES.TRC_ID = TIPOS_RECLAMACOES.TRC_ID where RECLAMACOES.TRC_ID = $trc_id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetch(PDO::FETCH_ASSOC)["TRC_CATEGORIA"];
	}

	public function obterEmailConsummidorPelaReclamacao($rec_id)
	{
		$this->sql = "select USU_EMAIL from RECLAMACOES
		LEFT JOIN CONSUMIDORES ON RECLAMACOES.CON_ID = CONSUMIDORES.CON_ID
		LEFT JOIN USUARIOS ON CONSUMIDORES.USU_ID = USUARIOS.USU_ID
		WHERE REC_ID = $rec_id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetch(PDO::FETCH_ASSOC)["USU_EMAIL"];
	}

	public function obterDadosReclamacaoParaEmail($rec_id) 
	{
		$this->sql = "select
		REC_TITULO_RECLAMACAO,
		USU_EMAIL,
		EST_NOME_FANTASIA
		from RECLAMACOES
		left join ESTABELECIMENTOS on RECLAMACOES.EST_ID = ESTABELECIMENTOS.EST_ID
		left join USUARIOS on ESTABELECIMENTOS.USU_ID = USUARIOS.USU_ID
		where REC_ID = $rec_id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetch(PDO::FETCH_ASSOC);
	}

	public function alterarStatus($bool,$rec_id) 
	{
		$this->sql = "update RECLAMACOES set REC_APROVADO=:status where REC_ID=:id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':status', $bool);
		$this->resultado->bindParam(':id', $rec_id);
		$this->resultado->execute();
		return $this->resultado;
	}

	public function quantidadeSelect() 
	{
		$valor=$this->listarTodos();
		return count($valor);
	}

	public function pesquisarId($id)
	{
		$this->sql="select * from $this->tabela where REC_ID=$id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();	
	}

	public function pesquisarPorId($id)
	{
		$this->sql = "select * from $this->tabela where REC_ID=$id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$rec = new Reclamacoes();

		foreach ($this->resultado->fetchAll() as $linha)
		{
			$rec->setId($linha['REC_ID']);
			$rec->setDate($linha['REC_DATA_HORA']);
			$rec->setAprovado($linha['REC_APROVADO']);
			$rec->setTitulo($linha['REC_TITULO_RECLAMACAO']);
			$rec->setNota($linha['REC_NOTA']);
		}
		return $rec;
	}

	public function numeroReclamacoesAteData($date, $id)
	{
		$this->sql = "select * from $this->tabela where rec_data_hora<'$date' and EST_ID=$id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$final = $this->resultado->fetchAll();
		return count($final);
	}

	public function pesquisarPorIdSolucionados($id) 
	{
		$this->sql = "select * from $this->tabela join RESPOSTAS_RECLAMACOES where reclamacoes.REC_ID=$id and respostas_reclamacoes.REC_ID=$id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$rec = new Reclamacoes();
		foreach ($this->resultado->fetchAll() as $linha){
						//$rec->setId($linha[REC_ID]);
						//$rec->setDescricao($linha[REC_DESCRICAO]);
			$rec->setDate($linha['REC_DATA_HORA']);
						//$rec->setAprovado($linha[REC_APROVADO]);
						//$rec->setTitulo($linha[REC_TITULO_RECLAMACAO]);
			$rec->setNota($linha['REC_NOTA']);
		}
		return $rec;
	}

	public function pesquisarEstabelecimento($id) 
	{
		$this->sql = "select * from $this->tabela join RESPOSTAS_RECLAMACOES where reclamacoes.EST_ID=$id and respostas_reclamacoes.REC_ID=reclamacoes.REC_ID";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();

		$reclamacoes = array();
		foreach ($this->resultado->fetchAll() as $linha)
		{
			$rec = new Reclamacoes();
						//$rec->setId($linha[REC_ID]);
			$rec->setDescricao($linha[REC_DESCRICAO]);
			$rec->setDate($linha['REC_DATA_HORA']);
						//$rec->setAprovado($linha[REC_APROVADO]);
			$rec->setTitulo($linha[REC_TITULO_RECLAMACAO]);
			$rec->setNota($linha['REC_NOTA']);
			array_push($reclamacoes, $rec);
		}
		return $reclamacoes;
	}
	public function pesqusiarEstabelecimento($id) {
		$this->sql = "select * from $this->tabela join RESPOSTAS_RECLAMACOES where reclamacoes.EST_ID=$id and respostas_reclamacoes.REC_ID=reclamacoes.REC_ID";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		
		$reclamacoes = array();
		foreach ($this->resultado->fetchAll() as $linha){
			$rec = new Reclamacoes();
			//$rec->setId($linha[REC_ID]);
			//$rec->setDescricao($linha[REC_DESCRICAO]);
			$rec->setDate($linha['REC_DATA_HORA']);
			//$rec->setAprovado($linha[REC_APROVADO]);
			//$rec->setTitulo($linha[REC_TITULO_RECLAMACAO]);
			$rec->setNota($linha['REC_NOTA']);
			$rec->setSolucao($linha['RER_STATUS_RESOLVIDO']);
			array_push($reclamacoes, $rec);
		}
		return $reclamacoes;
	}

	public function pesquisarEstabelecimentoFeed($id) 
	{
		$this->sql = "select * from $this->tabela join RESPOSTAS_RECLAMACOES where reclamacoes.EST_ID=$id and respostas_reclamacoes.REC_ID=reclamacoes.REC_ID and RER_STATUS_RESOLVIDO=0";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
		$reclamacoes = array();
		foreach ($this->resultado->fetchAll() as $linha)
		{
			$rec = new Reclamacoes();
			$rec->setId($linha['REC_ID']);
			// $rec->setDescricao($linha[REC_DESCRICAO]);
			// $rec->setDate($linha['REC_DATA_HORA']);
						//$rec->setAprovado($linha[REC_APROVADO]);
			$rec->setTitulo($linha['REC_TITULO_RECLAMACAO']);
			// $rec->setNota($linha['REC_NOTA']);
			array_push($reclamacoes, $rec);
		}
		return $reclamacoes;
	}
// select * from feedbacks_reunioes_agendadas join consumidores, usuarios where EST_ID=8 and REU_HORARIO_INICIO<NOW() and consumidores.CON_ID = feedbacks_reunioes_agendadas.CON_ID and usuarios.USU_ID = consumidores.USU_ID;

	public function pesquisarReunioes($id) 
	{
		$this->sql = "select * from feedbacks_reunioes_agendadas join consumidores, usuarios where EST_ID=$id and REU_HORARIO_INICIO<NOW() and consumidores.CON_ID = feedbacks_reunioes_agendadas.CON_ID and usuarios.USU_ID = consumidores.USU_ID and FEE_STATUS_RESOLVIDO = 0";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
		$reclamacoes = array();
		foreach ($this->resultado->fetchAll() as $linha)
		{
			$rec = new Reclamacoes();
			$rec->setId($linha['REC_ID']);
			// $rec->setDescricao($linha[REC_DESCRICAO]);
			// $rec->setDate($linha['REC_DATA_HORA']);
						//$rec->setAprovado($linha[REC_APROVADO]);
			$rec->setTitulo($linha['REC_TITULO_RECLAMACAO']);
			// $rec->setNota($linha['REC_NOTA']);
			array_push($reclamacoes, $rec);
		}
		return $reclamacoes;
	}


	public function atualizarFeed($id, $assunto, $status, $solucoes)
	{
		$this->sql = "UPDATE feedbacks_reunioes_agendadas SET FEE_DATA_HORA = NOW(), FEE_PROBLEMA = '$assunto', FEE_STATUS_RESOLVIDO = $status, FEE_SOLUCOES_DEFINIDAS = '$solucoes' WHERE REU_ID = $id";
		$a = $this->sql;
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
	}

	public function buscarHistoricoPosicao($id)
	{
		$this->sql = "select * from caracteristicas_estabelecimentos where EST_ID = $id group by CAR_POSICAO order by CAR_DATE";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$final = $this->resultado->fetchAll();
		if (count($final)>2) {
			# code...
		return $final;
		}
		else{
			return false;
		}
	}

	

}
?>