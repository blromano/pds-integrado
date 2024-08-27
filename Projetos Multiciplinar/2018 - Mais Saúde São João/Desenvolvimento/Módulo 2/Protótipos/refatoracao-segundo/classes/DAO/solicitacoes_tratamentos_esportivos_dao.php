<?php

include "Conexao";

class Solicitacoes_tratamentos_esportivos {

    function __construct() {
        $conn = new Conexao;
        $this->Conexao = $conn->getConexao();
    }

    //selecionar os dados: 
    function selecionar($solicitacoes_tratamentos_esportivos) {
        $sqlUsuario = $conexao->prepare("SELECT * FROM SOLICITACOES_TRATAMENTOS_ESPORTIVOS");
        $sqlUsuario->execute();
        $resultado = $sqlUsuario->fetchAll();
    }

    //inserir os dados:
    function inserir($solicitacoes_tratamentos_esportivos) {
        $consulta = $conexao->prepare("INSERT INTO SOLICITACOES_TRATAMENTOS_ESPORTIVOS(STE_CODIGO, STE_DATA_SOLICITACAO, STE_DATA_RESPOSTA, STE_STATUS) " . "VALUES (:ste_codigo, ste_data_solicitacao, ste_data_resposta, ste_status;)");
        $consulta->bindParam(':ste_codigo', $ste_codigo);
        $ste_codigo = $solicitacoes_tratamentos_esportivos->ste_codigo();
        $consulta->execute();
        header("location:");
    }

    //atualizar os dados: 
    function atualizar($solicitacoes_tratamentos_esportivos) {
        $sqlUsuario = $conexao->prepare("UPDATE SOLICITACOES_TRATAMENTOS_ESPORTIVOS SET STE_CODIGO = :ste_codigo, STE_DATA_SOLICITACAO = :ste_data_solicitacao, STE_DATA_RESPOSTA = :ste_data_resposta WHERE STE_CODIGO = :ste_codigo");
        $sqlUsuario->bindParam(":ste_codigo", $ste_codigo);
        $sqlUsuario->bindParam(':ste_codigo', ste_codigo);
        $ste_codigo = $solicitacoes_tratamentos_esportivos->getste_codigo();
        $ste_codigo = $solicitacoes_tratamentos_esportivos->getste_codigo();
        $sqlUsuario->execute();
        header("location:");
    }

    //excluir os dados:
    function excluir($solicitacoes_tratamentos_esportivos) {
        $sqlUsuario = $conexao->prepare("DELETE FROM SOLICITACOES_TRATAMENTOS_ESPORTIVOS WHERE STE_CODIGO = :ste_codigo");
        $sqlUsuario->bindParam(":ste_codigo", $_GET["ste_codigo"]);
        $sqlUsuario->execute();
    }

}

?>
