<?php

require_once 'Conexao.php';


class ALIMENTOS_DIARIOS_BORDO_DAO {

    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "ALIMENTOS_DIARIOS_BORDO";
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
        public function lista_alimentos_tabela($codRefeicao) {
        $this->sql = "SELECT 
                          db.ALI_DIB_TOTAL_CALORICO, 
                          db.ALI_DIB_CODIGO as CODIGO_DBA,
                          db.ALI_DIB_PORCAO_INTEIRA, 
                          db.ALI_DIB_PORCAO_FRACIONADA, 
                          db.FK_ALIMENTOS_ALI_CODIGO as CODIGO_ALIMENTO, 
                          a.ALI_NOME as NOME_ALIMENTO,
                          db.ALI_DIB_CODIGO_REFEICAO,  
                          d.DIB_DIB_DATA_CRIACAO as CRIACAO_DATA
                      FROM $this->tabela db,
                          ALIMENTOS a,
                          DIARIOS_BORDO d                                                    
                      WHERE 
                          db.FK_ALIMENTOS_ALI_CODIGO = a.ALI_CODIGO AND
                          d.DIB_CODIGO = db.FK_DIARIOS_BORDO_DIB_CODIGO AND
                          db.ALI_DIB_CODIGO_REFEICAO = " . $codRefeicao;
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
    public function deletar_alimentos_refeicao($id) {
        $this->sql = "DELETE FROM $this->tabela WHERE ALI_DIB_CODIGO = '$id'";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
    }
    public function inserir_alimento_cardapio() {
        $this->sql = "INSERT INTO $this->tabela "
                . "(ALI_DIB_TOTAL_CALORICO, ALI_DIB_CODIGO, ALI_DIB_CODIGO_REFEICAO, ALI_DIB_PORCAO_INTEIRA, ALI_DIB_PORCAO_FRACIONADA, ALI_DIB_HORARIO, FK_ALIMENTOS_ALI_CODIGO, FK_DIARIOS_BORDO_DIB_CODIGO) "
                . "VALUES ('$tcalorias', '', '$codRefeicao', '$porcao', '$porcao2', '$hora', '$idAlimento', '$id')";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
    }
    public function inserir_alimento_cardapio_dafault() {
        $this->sql = "INSERT INTO $this->tabela "
                . "(ALI_DIB_TOTAL_CALORICO, ALI_DIB_CODIGO, ALI_DIB_CODIGO_REFEICAO, ALI_DIB_PORCAO_INTEIRA, ALI_DIB_PORCAO_FRACIONADA, ALI_DIB_HORARIO, FK_ALIMENTOS_ALI_CODIGO, FK_DIARIOS_BORDO_DIB_CODIGO) "
                . "VALUES ('$tcalorias', '', '$codRefeicao', '$porcao', '$porcao2', '$hora', '$idAlimento', 'DEFAULT')";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
    }
}

?>
