<?php
include "Conexao.php";

class consultas_educador_fisico_dao {

    function __construct() {
        $conn = new Conexao;
        $this->Conexao = $conn->getConexao();
    }

//selecionar os dados:
    function selecionar($consultas_educador_fisico) {
        $sqlUsuario = $conexao->prepare("SELECT * FROM CONSULTAS_EDUCADOR_FISICO");
        $sqlUsuario->execute();
        $resultado = $sqlUsuario->fetchAll();
    }

//deletar os dados:
    function excluir($consultas_educador_fisico) {
        $sqlUsuario = $conexao->prepare("DELETE FROM CONSULTAS_EDUCADOR_FISICO WHERE CEF_CODIGO = :cef_codigo");
        $sqlUsuario->bindParam(":cef_codigo", $_GET["cef_codigo"]);
        $sqlUsuario->bindParam(":cef_local", $_GET["cef_local"]);
        $sqlUsuario->bindParam(":cef_status", $_GET["cef_status"]);
        $sqlUsuario->bindParam(":cef_data", $_GET["cef_data"]);
        $sqlUsuario->bindParam(":cef_link_google_maps", $_GET["cef_link_google_maps"]);
        $sqlUsuario->bindParam(":cef_hora", $_GET["cef_hora"]);
        $sqlUsuario->bindParam(":cef_anotacoes", $_GET["cef_anotacoes"]);
        $sqlUsuario->execute();
    }

//inserir dados:
    function inserir($consultas_educador_fisico) {
        $consulta = $conexao->prepare("INSERT INTO CONSULTAS_EDUCADOR_FISICO, CEF_CODIGO, CEF_LOCAL, CEF_STATUS, CEF_DATA, CEF_LINK_GOOGLE_MAPS, CEF_HORA, CEF_ANOTACOES)" . "VALUES (:cef_codigo, :cef_local, :cef_status, :cef_data, :cef_link_google_maps, :cef_hora, :cef_anotacoes)");
        $consulta->bindParam(':cef_codigo', $cef_codigo);
        $consulta->bindParam(':cef_local', $cef_local);
        $consulta->bindParam(':cef_status', $cef_status);
        $consulta->bindParam(':cef_data', $cef_data);
        $consulta->bindParam(':cef_link_google_maps', $cef_link_googlemaps);
        $consulta->bindParam(':cef_hora', $cef_hora);
        $consulta->execute();
        header("location:");
    }

//update (atualizar):
    function atualizar($consultas_educador_fisico) {
        $sqlUsuario = $conexao->prepare("UPDATE CONSULTAS_EDUCADOR_FISICO SET CEF_LOCAL = :cef_local, CEF_STATUS = :cef_status, CEF_DATA = :cef_data, CEF_LINK_GOOGLEMAPS = :cef_link_google_maps, CEF_HORA = :cef_hora, CEF_ANOTACOES = :cef_anotacoes WHERE CEF_CODIGO = :cef_codigo");
        $sqlUsuario->bindParam(':cef_codigo', $cef_codigo);
        $sqlUsuario->bindParam(':cef_local', $cef_local);
        $sqlUsuario->bindParam(':cef_status', $cef_status);
        $sqlUsuario->bindParam(':cef_data', $cef_data);
        $sqlUsuario->bindParam(':cef_link_google_maps', $cef_link_google_maps);
        $sqlUsuario->bindParam(':cef_hora', $cef_hora);
        $cef_codigo = $consultas_educador_fisico->getCef_codigo();
        $cef_local = $consultas_educador_fisico->getCef_local();
        $cef_status = $consultas_educador_fisico->getCef_status();
        $cef_data = $consultas_educador_fisico->getCef_data();
        $cef_link_google_maps = $consultas_educador_fisico->getCon_link_google_maps();
        $cef_hora = $consultas_educador_fisico->getCef_hora();
        $sqlUsuario->execute();
        header("location:");
    }

}
?>

