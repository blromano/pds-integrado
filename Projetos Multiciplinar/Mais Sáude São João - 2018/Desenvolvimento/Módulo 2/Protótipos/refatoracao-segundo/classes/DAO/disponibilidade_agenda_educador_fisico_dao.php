<?php

include "Conexao.php";

class disponibilidade_agenda_educador_fisico_dao {

    function __construct() {
        $conn = new Conexao;
        $this->Conexao = $conn->getConexao();
    }

    function selecionar($disponibilidade_agenda_educador_fisico) {
        $sqlUsuario = $conexao->prepare("SELECT * FROM DISPONIBILIDADE_AGENDA_EDUCADOR_FISICO");
        $sqlUsuario->execute();
        $resultado = $sqlUsuario->fetchAll();
    }

    function inserir($disponibilidade_agenda_educador_fisico) {
        $consulta = $conexao->prepare("INSERT INTO DISPONIBILIDADE_AGENDA_EDUCADOR_FISICO(DIS_CODIGO, DIS_HORA, DIS_DIA_SEMANA, DIS_LOCAL) " . "VALUES (:dis_codigo, dis_hora, dis_dia_semana, dis_local)");
        $consulta->bindParam(':dis_codigo', $dis_codigo);
        $dis_codigo = $disponibilidade_agenda_educador_fisico->dis_codigo();
        $consulta->execute();
        header("location:");
    }

    function atualizar($disponibilidade_agenda_educador_fisico) {
        $sqlUsuario = $conexao->prepare("UPDATE DISPONIBILIDADE_AGENDA_EDUCADOR_FISICO SET DIS_CODIGO = :dis_codigo, DIS_HORA = :dis_hora, DIS_DIA_SEMANA = :dis_dia_semana, DIS_LOCAL = :dis_local WHERE DIS_CODIGO = :dis_codigo");
        $sqlUsuario->bindParam(":dis_codigo", $dis_codigo);
        $sqlUsuario->bindParam(':dis_codigo', $dis_codigo);
        $dis_codigo = $fichas_treinamento->getdis_codigo();
        $dis_codigo = $fichas_treinamento->getdis_codigo();
        $sqlUsuario->execute();
        header("location:");
    }

    function excluir($disponibilidade_agenda_educador_fisico) {
        $sqlUsuario = $conexao->prepare("DELETE FROM DISPONIBILIDADE_AGENDA_EDUCADOR_FISICO WHERE DIS_CODIGO = :dis_codigo");
        $sqlUsuario->bindParam(":dis_codigo", $_GET["dis_codigo"]);
        $sqlUsuario->execute();
    }

}

?>
