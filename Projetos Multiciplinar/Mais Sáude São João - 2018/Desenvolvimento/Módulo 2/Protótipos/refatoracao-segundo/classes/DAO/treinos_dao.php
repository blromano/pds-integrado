<?php

include "Conexao.php";

class treinos_dao {

    function __construct() {
        $conn = new Conexao;
        $this->Conexao = $conn->getConexao();
    }

    //selecionar os dados: 
    function selecionar($treinos) {
        $sqlUsuario = $conexao->prepare("SELECT * FROM TREINOS");
        $sqlUsuario->execute();
        $resultado = $sqlUsuario->fetchAll();
    }

    //inserir os dados:  
    function inserir($treinos) {
        $consulta = $conexao->prepare("INSERT INTO TREINOS(TRE_CODIGO, TRE_SEGUNDA, TRE_TERCA, TRE_QUARTA, TRE_QUINTA, TRE_SEXTA, TRE_SABADO, TRE_DOMINGO) " . "VALUES (:tre_codigo, tre_segunda, tre_terca, tre_quarta, tre_quinta, tre_sexta, tre_sabado, tre_domingo)");
        $consulta->bindParam(':tre_codigo', $tre_codigo);
        $consulta->bindParam(':tre_segunda', $tre_segunda);
        $consulta->bindParam(':tre_terca', $tre_terca);
        $consulta->bindParam(':tre_quarta', $tre_quarta);
        $consulta->bindParam(':tre_quinta', $tre_quinta);
        $consulta->bindParam(':tre_sexta', $tre_sexta);
        $consulta->bindParam(':tre_sabado', $tre_sabado);
        $consulta->bindParam(':tre_domingo', $tre_domingo);
        $tre_codigo = $treinos->tre_codigo();
        $tre_segunda = $treinos->tre_segunda();
        $tre_terca = $treinos->tre_tre_terca();
        $tre_quarta = $treinos->tre_quarta();
        $tre_quinta = $treinos->tre_quinta();
        $tre_sexta = $treinos->tre_sexta();
        $tre_sabado = $treinos->tre_sabado();
        $tre_domingo = $treinos->tre_domingo();

        $consulta->execute();
        header("location:");
    }

    //atualizar os dados: 
    function atualizar($treinos) {
        $sqlUsuario = $conexao->prepare("UPDATE TREINOS SET TRE_CODIGO = :tre_codigo, TRE_SEGUNDA = :tre_segunda, TRE_TERCA = :tre_terca, TRE_QUARTA = :tre_quarta, TRE_QUINTA = :tre_quinta, TRE_SEXTA = :tre_sexta, TRE_SABADO = :tre_sabado, TRE_DOMINGO = :tre_domingo WHERE TRE_CODIGO = :tre_codigo");
        $sqlUsuario->bindParam(":tre_codigo", $tre_codigo);
        $tre_codigo = $treinos->gettre_codigo($tre_codigo);
        $tre_segunda = $treinos->gettre_codigo($tre_segunda);
        $tre_terca = $treinos->gettre_codigo($tre_terca);
        $tre_quarta = $treinos->gettre_codigo($tre_quarta);
        $tre_quinta = $treinos->gettre_codigo($tre_quinta);
        $tre_sexta = $treinos->gettre_codigo($tre_sexta);
        $tre_sabado = $treinos->gettre_codigo($tre_sabado);
        $tre_domingo = $treinos->gettre_codigo($tre_domingo);

        $sqlUsuario->execute();
        header("location:");
    }

    //excluir os dados: 
    function excluir($treinos) {
        $sqlUsuario = $conexao->prepare("DELETE FROM TREINOS WHERE TRE_CODIGO = :tre_codigo");
        $sqlUsuario->bindParam(":tre_codigo", $_GET["tre_codigo"]);
        $sqlUsuario->execute();
    }

}

?>