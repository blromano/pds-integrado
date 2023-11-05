<?php

require_once 'Conexao.php';

class ALIMENTOS_FAVORITOS_DAO {

    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "ALIMENTOS_FAVORITOS";
    }

    public function select_alimentos_favoritos($usuario) {
        $this->sql = "SELECT ali.*, fav.* "
                . "FROM $this->tabela fav, ALIMENTOS ali "
                . "WHERE fav.FK_USUARIOS_USU_CODIGO='" . $usuario . "'"
                . "AND fav.FK_ALIMENTOS_ALI_CODIGO=ali.ALI_CODIGO;";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

    public function inserir_alimento_favorito($ali_fav_model) {
        $this->sql = "INSERT INTO $this->tabela "
                . "(FK_ALIMENTOS_ALI_CODIGO, FK_USUARIOS_USU_CODIGO) "
                . "VALUES ('" . $ali_fav_model->getFK_ALIMENTOS_ALI_CODIGO() . "','" . $ali_fav_model->getFK_USUARIOS_USU_CODIGO() . "');";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
    }

}

?>
