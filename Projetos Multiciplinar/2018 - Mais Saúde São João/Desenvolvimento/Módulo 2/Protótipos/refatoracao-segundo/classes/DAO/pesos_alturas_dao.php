<?php

require_once 'Conexao.php';

class PESOS_ALTURAS_DAO {

    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "PESOS_ALTURAS";
    }

    public function pesquisa_dados_tabela_pesos_alturas($codigo_usuario) {
        $this->sql = "SELECT * FROM 
                      $this->tabela
                      WHERE FK_USUARIOS_USU_CODIGO = '" . $codigo_usuario . "';";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

    public function insere_dados_tabela_pea($pea_model){
        $this->sql = "INSERT INTO $this->tabela "
                . " (PEA_DATA_HORA_CADASTRO, PEA_ALTURA, PEA_PESO, FK_USUARIOS_USU_CODIGO)"
                . " VALUES "
                . " ('" . $pea_model->getPEA_DATA_HORA_CADASTRO() . "', '" . $pea_model->getPEA_ALTURA() . "', '" . $pea_model->getPEA_PESO() . "', '" . $pea_model->getFK_USUARIOS_USU_CODIGO() . "');";
        
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        
    }
   
}

?>
