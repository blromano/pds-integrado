<?php

include "Conexao.php";

class consultas_marcadas_educador_fisico_dao {

    function __construct() {
        $conn = new Conexao;
        $this->Conexao = $conn->getConexao();
    }

//selecionar os dados:
    function selecionar($suplementos) {
        $sqlUsuario = $conexao->prepare("SELECT * FROM SUPLEMENTOS");
        $sqlUsuario->execute();
        $resultado = $sqlUsuario->fetchAll();
    }

//deletar os dados:
    function excluir($suplementos) {
        $sqlUsuario = $conexao->prepare("DELETE FROM SUPLEMENTOS WHERE CON_CODIGO = :sup_codigo");
        $sqlUsuario->bindParam(":sup_codigo", $_GET["sup_codigo"]);
        $sqlUsuario->execute();
    }

//inserir dados:
    function inserir($suplementos) {
        $consulta = $conexao->prepare("INSERT INTO SUPLEMENTOS, SUP_CODIGO, SUP_NOME, SUP_FOTO, SUP_DESCRICAO, SUP_UTILIZACAO, SUP_COMPOSICAO, SUP_TIPO )" . "VALUES (:sup_codigo, :sup_nome, :sup_foto, :sup_descricao, :sup_utilizacao, :sup_composicao, :sup_tipo)");
        $consulta->bindParam(':sup_codigo', $sup_codigo);
        $consulta->bindParam(':sup_nome', $sup_nome);
        $consulta->bindParam(':sup_foto', $sup_foto);
        $consulta->bindParam(':sup_descricao', $sup_descricao);
        $consulta->bindParam(':sup_utilizacao', $sup_utilizacao);
        $consulta->bindParam(':sup_composicao', $sup_composicao);
        $consulta->bindParam(':sup_tipo', $sup_tipo);
        $consulta->execute();
        header("location:");
    }

//update (atualizar):
    function atualizar($suplementos) {
        $sqlUsuario = $conexao->prepare("UPDATE SUPLEMENTOS SET SUP_NOME = :sup_nome, SUP_FOTO = :sup_foto, SUP_DESCRICAO = :sup_descricao, SUP_UTILIZACAO = :sup_utilizacao, SUP_COMPOSICAO = :sup_composicao, SUP_TIPO = :sub_tipo WHERE SUP_CODIGO = :sup_codigo");
        $sqlUsuario->bindParam(':sup_codigo', $sup_codigo);
        $sqlUsuario->bindParam(':sup_nome', $sup_nome);
        $sqlUsuario->bindParam(':sup_foto', $sup_foto);
        $sqlUsuario->bindParam(':sup_descricao', $sup_descricao);
        $sqlUsuario->bindParam(':sup_utilizacao', $sup_utilizacao);
        $sqlUsuario->bindParam(':sup_composicao', $sup_composicao);
        $sqlUsuario->bindParam(':sup_tipo', $sup_tipo);
        $sup_codigo = $suplementos->getSup_codigo();
        $sup_nome = $suplementos->getSup_nome();
        $sup_foto = $suplementos->getSup_foto();
        $sup_descricao = $suplementos->getSup_descricao();
        $sup_utilizacao = $suplementos->getSup_utilizacao();
        $sup_composicao = $suplementos->getSup_composicao();
        $sup_tipo = $suplementos->getSup_tipo();
        $sqlUsuario->execute();
        header("location:");
    }

}

?>
