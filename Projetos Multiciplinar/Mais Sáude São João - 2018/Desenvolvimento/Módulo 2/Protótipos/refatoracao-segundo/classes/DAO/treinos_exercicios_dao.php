<?php

include "Conexao.php";

class treinos_exercicio_dao {

    function __construct() {
        $conn = new Conexao;
        $this->Conexao = $conn->getConexao();
    }

    //selecionar os dados: 
    function selecionar($treinos_exercicios) {
        $sqlUsuario = $conexao->prepare("SELECT * FROM TREINOS_EXERCICIOS");
        $sqlUsuario->execute();
        $resultado = $sqlUsuario->fetchAll();
    }

    //inserir os dados: 
    function inserir($treinos_exercicios) {
        $consulta = $conexao->prepare("INSERT INTO TREINOS_EXERCICIOS(TRE_EXE_CODIGO, TRE_EXE_SERIES, TRE_EXE_REPETICOES, TRE_EXE_CARGA_PESO) " . "VALUES (tre_ex_codigo, tre_ex_series, tre_ex_repeticoes, tre_ex_carga_peso)");
        $consulta->bindParam('$tre_ex_codigo', $tre_exe_codigo);
        $tre_exe_codigo = $treinos_exercicios->tre_ex_codigo();
        $consulta->execute();
        header("location:");
    }

    //atualizar os dados: 
    function atualizar($treinos_exercicios) {
        $sqlUsuario = $conexao->prepare("UPDATE TREINOS_EXERCICIOS SET TRE_EXE_CODIGO = $tre_ex_codigo, TRE_EXE_SERIES = $tre_ex_series, TRE_EXE_REPETICOES = $tre_ex_repeticoes, TRE_EXE_CARGA_PESO = $tre_ex_carga_peso WHERE TRE_EXE_CODIGO = $tre_ex_codigo");
        $sqlUsuario->bindParam("$tre_ex_codigo", $tre_exe_codigo);
        $sqlUsuario->bindParam('$tre_ex_series', $tre_exe_series);
        $sqlUsuario->bindParam('$tre_ex_repeticoes', $tre_exe_repeticoes);
        $sqlUsuario->bindParam('$tre_ex_carga_peso', $tre_exe_carga_peso);
        $tre_exe_codigo = $treinos_exercicios->gettre_ex_codigo();
        $sqlUsuario->execute();
        header("location:");
    }

    //excluir os dados:
    function excluir($treinos_exercicios) {
        $sqlUsuario = $conexao->prepare("DELETE FROM TREINOS_EXERCICIOS WHERE TRE_EXE_CODIGO = $tre_ex_codigo");
        $sqlUsuario->bindParam("$tre_ex_codigo", $_GET["tre_ex_codigo"]);
        $sqlUsuario->execute();
    }

}

?>