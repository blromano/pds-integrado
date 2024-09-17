<?php

require_once 'Conexao.php';

class ProdutoDAO {

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
        $this->sql = "insert into $this->tabela (PRO_NOME_PRODUTO, PRO_DESCRICAO_PRODUTO, IPO_ID) values (:PRO_NOME_PRODUTO,:PRO_DESCRICAO_PRODUTO, :IPO_ID)";
        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->bindParam(':PRO_NOME_PRODUTO', $this->post->getPRO_NOME_PRODUTO());
        $this->resultado->bindParam(':PRO_DESCRICAO_PRODUTO', $this->post->getPRO_DESCRICAO_PRODUTO());
		$this->resultado->bindParam(':IPO_ID', $this->post->getIPO_ID());

        $this->resultado->execute();

        return $this->resultado;
    }

    public function editarProduto($post) 
	{
        $this->post = $post;
        $this->sql = "update $this->tabela set PRO_NOME_PRODUTO =:PRO_NOME_PRODUTO, PRO_DESCRICAO_PRODUTO=:PRO_DESCRICAO_PRODUTO, IPO_ID=:IPO_ID where PRO_ID =:PRO_ID";

        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->bindParam(':PRO_ID', $this->post->getPRO_ID());
		$this->resultado->bindParam(':PRO_NOME_PRODUTO', $this->post->getPRO_NOME_PRODUTO());
        $this->resultado->bindParam(':PRO_DESCRICAO_PRODUTO', $this->post->getPRO_DESCRICAO_PRODUTO());
		$this->resultado->bindParam(':IPO_ID', $this->post->getIPO_ID());

        $this->resultado->execute();

        return $this->resultado;
    }

    public function excluirProduto($id) {
        $this->sql = "delete from $this->tabela where PRO_ID =:id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $id);

        $this->resultado->execute();

        return $this->resultado;
    }

    public function listarTodos() {
        $this->sql = "select * from $this->tabela";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

    public function pesquisarPorId($id) {
        $this->sql = "select * from $this->tabela where PRO_ID=$id";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

}
?>

