<?php

	require_once 'Conexao.php';

	class AgendarReuniaoDAO 
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
					$this->tabela = "feedbacks_reunioes_agendadas";
				}
																																													
			public function inserirReuniao($post) 
				{
					$this->post = $post;
					$this->sql = "insert into $this->tabela (REU_NOME_EVENTO, REU_REPRESENTANTE, REU_DATA, REU_HORARIO_INICIO, REU_HORARIO_TERMINO, REU_LOCAL, REU_DESCRICAO, EST_ID, CON_ID) values (:REU_NOME_EVENTO,:REU_REPRESENTANTE, :REU_DATA, :REU_HORARIO_INICIO, :REU_HORARIO_TERMINO, :REU_LOCAL, :REU_DESCRICAO, :EST_ID, :CON_ID)";
					$this->resultado = $this->conexao->prepare($this->sql);

					$this->resultado->bindValue(':REU_NOME_EVENTO', $this->post->getREU_NOME_EVENTO());
					$this->resultado->bindValue(':REU_REPRESENTANTE', $this->post->getREU_REPRESENTANTE());
					$this->resultado->bindValue(':REU_DATA', $this->post->getREU_DATA());
					$this->resultado->bindValue(':REU_HORARIO_INICIO', $this->post->getREU_HORARIO_INICIO());
					$this->resultado->bindValue(':REU_HORARIO_TERMINO', $this->post->getREU_HORARIO_TERMINO());
					$this->resultado->bindValue(':REU_LOCAL', $this->post->getREU_LOCAL());
					$this->resultado->bindValue(':REU_DESCRICAO', $this->post->getREU_DESCRICAO());
					$this->resultado->bindValue(':EST_ID', $this->post->getEST_ID());
					$this->resultado->bindValue(':CON_ID', $this->post->getCON_ID());

					$this->resultado->execute();

					return $this->conexao->lastInsertId();
				}
		}
?>

