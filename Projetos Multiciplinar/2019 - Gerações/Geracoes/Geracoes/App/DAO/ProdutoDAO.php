<?php

    namespace App\DAO;

    use App\DAO\DAO;
    use App\Model\Produto;
    
    class ProdutoDAO extends DAO{
        
    public function alterar($produto) {
        
    }

    public function buscarPorId($produto) {
        
    }

    public function excluir($produto) {
        
    }

    public function inserir($produto) {
        
    }

    public function listar() {
        $produtos = array();
        
        $sql = "SELECT id, descricao, preco FROM tbl_produtos";
        $stmt = $this->getConn()->prepare($sql);                       
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($results as $row) {
            $produto = new Produto();
            $produto->setId($row['id']);
            $produto->setDescricao($row['descricao']);
            $produto->setPreco($row['preco']);

            array_push($produtos, $produto);
        }                                   

        return $produtos; 
    }

}
    
?>