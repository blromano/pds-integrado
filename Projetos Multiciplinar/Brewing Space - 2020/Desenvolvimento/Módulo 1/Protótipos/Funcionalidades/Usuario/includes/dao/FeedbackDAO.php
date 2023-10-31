<?php
require_once 'ConexaoDAO.php';

class FeedbackDAO {
    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new ConexaoDAO();
        $this->conexao = $conn->getConexao();
        $this->tabela = "feedbacks";
    }
   
    public function cadastrar($feedbacks) {
        $this->sql = "insert into $this->tabela (FEE_ASSUNTO, FEE_EMAIL, FEE_MENSAGEM) values ('{$feedbacks->getFEE_ASSUNTO()}','{$feedbacks->getFEE_EMAIL()}','{$feedbacks->getFEE_MENSAGEM()}')";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
    }
   
}





