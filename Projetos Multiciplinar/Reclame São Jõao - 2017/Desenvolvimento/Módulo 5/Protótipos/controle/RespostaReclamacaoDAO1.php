<?php

require_once 'Conexao.php';

class RespostaReclamacaoDAO {

    private $conexao;
    private $sql;
    private $RespostasReclamacoes;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "respostas_reclamacoes";
    }

    public function inserir($RespostasReclamacoes) {
        $this->RespostasReclamacoes = $RespostasReclamacoes;
        $this->sql = "insert into $this->tabela (RER_DESCRICAO, RER_ID) values (:RER_DESCRICAO, :RER_ID)";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':RER_DESCRICAO', $this->RespostasReclamacoes->getRER_DESCRICAO());
        $this->resultado->bindParam(':RER_ID', $this->RespostasReclamacoes->getRER_ID());
        $this->resultado->execute();

        return $this->resultado;
    }

    public function editar($RespostasReclamacoes) {
        $this->RespostasReclamacoes = $RespostasReclamacoes;
        $this->sql = "update $this->tabela set RER_DESCRICAO=:RER_DESCRICAO where RER_ID=:RER_ID";

        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->bindParam(':RER_DESCRICAO', $this->RespostasReclamacoes->getRER_DESCRICAO());
        $this->resultado->bindParam(':RER_ID', $this->RespostasReclamacoes->getRER_ID());

        $this->resultado->execute();

        return $this->resultado;
    }

    public function editarResposta($RespostasReclamacoes) {
        $this->RespostasReclamacoes = $RespostasReclamacoes;
        $this->sql = "update $this->tabela set RER_DESCRICAO=:RER_DESCRICAO where RER_ID =:RER_ID";

        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->bindParam(':RER_DESCRICAO', $this->RespostasReclamacoes->getRER_DESCRICAO());
        $this->resultado->bindParam(':RER_ID', $this->RespostasReclamacoes->getRER_ID());

        $this->resultado->execute();

        echo "ok";
        return $this->resultado;
    }

    public function excluirResposta($RespostasReclamacoes) {
        $this->sql = "delete from $this->tabela where RER_ID =:RER_ID";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':RER_ID', $RespostasReclamacoes);

        $this->resultado->execute();

        return $this->resultado;
    }

    //public function excluir($id)
    //{		
    //$this->sql="delete from $this->tabela where RER_ID=:id";
    //$this->sql="update $this->tabela set RER_STATUS_APROVADO=:RER_STATUS_APROVADO where RER_ID=:RER_ID";
    //$this->resultado = $this->conexao->prepare($this->sql);
    //$this->resultado->bindParam('RER_STATUS_APROVADO',$var);
    //$this->resultado->bindParam(':RER_ID',$var);
    //$this->resultado->execute();
    //return $this->resultado;	
    //}

    public function inserirResposta($RespostasReclamacoes) {
        $this->RespostasReclamacoes = $RespostasReclamacoes;
        $this->sql = "insert into $this->tabela (RER_DESCRICAO, REC_ID, ADM_ID) values (:RER_DESCRICAO, :REC_ID, :ADM_ID)";
        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->bindParam(':RER_DESCRICAO', $this->RespostasReclamacoes->getRER_DESCRICAO());
        $this->resultado->bindParam(':REC_ID', $this->RespostasReclamacoes->getREC_ID());
        $this->resultado->bindParam(':ADM_ID', $this->RespostasReclamacoes->getADM_ID());

        $this->resultado->execute();

        return $this->resultado;
    }

    public function listar() {
        $this->sql = "select * from $this->tabela WHERE RER_STATUS_APROVADO = 1";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

    public function pesquisarPorId($id) {
        $this->sql = "select * from $this->tabela where RER_ID=$id";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

//Resposta de reclamaçao adiministrador mod05

   
    public function listarADM() {
        $this->sql = "
    SELECT 
	rr.RER_ID, 
        rr.REC_ID,
	e.EST_NOME_FANTASIA as Empresa,
	rr.RER_DESCRICAO as RER_resposta_reclamacao, 
	rr.RER_DATA_HORA, 
	u.USU_NOME AS USU_reclamacao,
	rec.REC_DESCRICAO as REC_reclamacao, 
	rr.RER_STATUS_APROVADO, 
	rr.RER_STATUS_RESOLVIDO, 
	rr.ADM_ID as ADM_ID
    FROM
	respostas_reclamacoes rr, 
	reclamacoes rec, 
	usuarios u, 
	administradores a,
	consumidores c,
	estabelecimentos e
    WHERE
	rr.REC_ID = rec.REC_ID AND	
	rec.CON_ID = c.CON_ID AND
	rr.ADM_ID = A.ADM_ID AND
	c.USU_ID = u.USU_ID AND
	rec.EST_ID = e.EST_ID";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
    
    public function buscarNomeAdministrador($idAdm) {
        $this->sql = "select USU_NOME from usuarios where USU_ID=$idAdm";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        $nome = $this->resultado->fetch();
        return $nome["USU_NOME"];
    }

    public function excluirADM($id) {
        $this->sql = "delete from $this->tabela where RER_ID=:id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $id);
        try {
            $this->resultado->execute();
            echo "<script>alert('reclamação deletado com sucesso!')</script><script>window.location='../../../index.php?pagina=3';</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao deletar. reclamação já está em uso!')</script><script>window.location='../../../index.php?pagina=3';</script>";
        }

        return $this->resultado;
    }

    public function editarSuspender_PublicarADM($num, $id) {
        $this->sql = "update $this->tabela set RER_STATUS_APROVADO=? where RER_ID=?";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(2, $id);
        $this->resultado->bindParam(1, $num);
        try {
            $this->resultado->execute();
           // echo "<script>alert('reclamação alterada com sucesso!')</script><script>window.location='../../../index.php?pagina=3';</script>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
           // echo "<script>alert('Erro ao alterada. reclamação!')</script><script>window.location='../../../index.php?pagina=3';</script>";
        }
        return $this->resultado;
    }
//falta fazer 
    public function editarADM($num, $id) {
        $this->sql = "update $this->tabela set RER_STATUS_APROVADO=? where RER_ID=?";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(2, $id);
        $this->resultado->bindParam(1, $num);
        try {
            $this->resultado->execute();
            echo "<script>alert('reclamação alterada com sucesso!')</script><script>window.location='../../../index.php?pagina=3';</script>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            echo "<script>alert('Erro ao alterada. reclamação!')</script><script>window.location='../../../index.php?pagina=3';</script>";
        }
        return $this->resultado;
    }

// envio do email 
    public function obterDadosPelaReclamacaoParaEmail($rec_id) 
	{
		$this->sql = "
                select
                    REC_TITULO_RECLAMACAO,
                    USU_EMAIL,
                    EST_NOME_FANTASIA
                from respostas_reclamacoes
                    left join reclamacoes on respostas_reclamacoes.REC_ID = reclamacoes.rec_ID
                    left join ESTABELECIMENTOS on respostas_reclamacoes.REC_ID = ESTABELECIMENTOS.EST_ID
                    left join USUARIOS on ESTABELECIMENTOS.USU_ID = USUARIOS.USU_ID
		where respostas_reclamacoes.REC_ID = $rec_id";
                    $this->resultado = $this->conexao->prepare($this->sql);
                    $this->resultado->execute();
                    return $this->resultado->fetch(PDO::FETCH_ASSOC);
	}
	
    public function obterEmailConsummidorPelaReclamacao($rec_id)
	{
		$this->sql = "
                select
                    USU_EMAIL 
                from respostas_reclamacoes
                    LEFT JOIN CONSUMIDORES ON respostas_reclamacoes.REC_ID = CONSUMIDORES.CON_ID
                    LEFT JOIN USUARIOS ON CONSUMIDORES.USU_ID = USUARIOS.USU_ID
		WHERE respostas_reclamacoes.REC_ID = $rec_id";
                    $this->resultado = $this->conexao->prepare($this->sql);
                    $this->resultado->execute();
                    return $this->resultado->fetch(PDO::FETCH_ASSOC)["USU_EMAIL"];
	}
    public function obterEmailEstabelecimentoPelaReclamacao($rec_id)
	{
		$this->sql = "
                select 
                    USU_EMAIL 
                from respostas_reclamacoes
                    LEFT JOIN estabelecimentos ON respostas_reclamacoes.REC_ID = estabelecimentos.EST_ID
                    LEFT JOIN USUARIOS ON estabelecimentos.EST_ID = USUARIOS.USU_ID
		WHERE respostas_reclamacoes.REC_ID = $rec_id";
                    $this->resultado = $this->conexao->prepare($this->sql);
                    $this->resultado->execute();
                    return $this->resultado->fetch(PDO::FETCH_ASSOC)["USU_EMAIL"];
	}
}
?>

