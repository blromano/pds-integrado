<?php

require_once 'Conexao.php';


class DB_ALIMENTOS_DAO {

    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "DB_ALIMENTOS";
    }
    public function lista_alimentos_diarios_bordo($escolha_data) {
        $this->sql = "SELECT * 
                      FROM DIARIOS_BORDO 
                      WHERE FK_USUARIOS_USU_CODIGO='1' AND
                      DIB_DIB_DATA_CRIACAO = '" . $escolha_data . "'";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
}

?>
