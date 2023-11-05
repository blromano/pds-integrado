<?php

require_once '../Conexao.php';
require_once '../../modelo/Tipos_Produtos.php';

class Tipos_ProdutosDAO {

    private $conexao;
    private $sql;
    private $post;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "TIPOS_PRODUTOS";
    }

    public function inserirTiposProdutos($post) 
	{
        $this->post = $post;
        $this->sql = "insert into $this->tabela (IPO_DESCRICAO) values (:IPO_DESCRICAO)";
        $this->resultado = $this->conexao->prepare($this->sql);
        
        $this->resultado->bindParam(':IPO_DESCRICAO', $this->post->getIPO_DESCRICAO());

        $this->resultado->execute();

        return $this->resultado;
    }

    public function editarTiposProdutos($post) 
	{
        $this->post = $post;
        $this->sql = "update $this->tabela set  IPO_DESCRICAO=:IPO_DESCRICAO where IPO_ID =:IPO_ID";

        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->bindParam(':IPO_DESCRICAO', $this->post->getIPO_DESCRICAO());
        $this->resultado->bindParam(':IPO_ID', $this->post->getIPO_ID());

        $this->resultado->execute();

        return $this->resultado;
    }

    public function excluirTiposProdutos($id) 
	{
        $this->sql = "delete from $this->tabela where IPO_ID =:id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $id);

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

    public function pesquisarPorId($id) {
        $this->sql = "select * from $this->tabela where IPO_ID=$id";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

}
?>

