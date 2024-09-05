<?php

    namespace App\DAO;

    use App\DAO\DAO;
    use App\Model\Info;

    class InfoDAO extends DAO{

    public function alterar($info) {
        
    }

    public function buscarPorId($info) {
        
    }

    public function excluir($info) {
        
    }

    public function inserir($info) {
        
    }

    public function listar() {
        $infos = array();
        
        $sql = "SELECT id, titulo, descricao FROM tbl_info";
        $stmt = $this->getConn()->prepare($sql);                       
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($results as $row) {
            $info = new Info();
            $info->setId($row['id']);
            $info->setTitulo($row['titulo']);
            $info->setDescricao($row['descricao']);

            array_push($infos, $info);
        }                                   

        return $infos;         
    }

}
    
?>
