<?php

class medidas_corporais_dao {
//selecionar os dados:
    
    function selecionar($medidas_corporais) {
        $sqlUsuario = $conexao->prepare("SELECT * FROM MEDIDAS_CORPORAIS");
        $sqlUsuario->execute();
        $resultado = $sqlUsuario->fetchAll();
    }

//deletar os dados:
    
   function excluir($medidas_corporais) {
        $sqlUsuario = $conexao->prepare("DELETE FROM MEDIDAS_CORPORAIS WHERE MEC_CODIGO = :mec_codigo");
        $sqlUsuario->bindParam(":mec_codigo", $_GET["mec_codigo"]);
        $sqlUsuario->execute();
    }

//inserir dados:
    
    function inserir($medidas_corporais) {
        $consulta = $conexao->prepare("INSERT INTO MEDIDAS_CORPORAIS, MEC_CODIGO, MEC_PESO, MEC_ALTURA, MEC_PESCOCO, MEC_BICEPS_ESQUERDO, MEC_BICEPS_DIREITO, MEC_ANTEBRACO_ESQUERDO, MEC_ANTEBRACO_DIREITO, MEC_PEITO, MEC_CINTURA, MEC_QUADRIS, MEC_COXA_ESQUERDA, MEC_COXA_DIREITA, MEC_PANTURRILHA_ESQUERDA, MEC_PANTURRILHA_DIREITA, MEC_DATA)" . "VALUES (:mec_codigo, :mec_peso, :mec_altura, :mec_pescoco, :mec_biceps_esquerdo, :mec_biceps_direito,:mec_antebraco_esquerdo, :mec_antebraco_direito, :mec_peito, :mec_cintura, :mec_quadris, :mec_coxa_esquerda, :mec_coxa_direita, :mec_panturrilha_esquerda, :mec_panturrilha_direita, :mec_data)");
        $consulta->bindParam(':mec_codigo', $mec_codigo);
        $consulta->bindParam(':mec_peso', $mec_peso);
        $consulta->bindParam(':mec_altura', $mec_altura);
        $consulta->bindParam(':mec_pescoco', $mec_pescoco);
        $consulta->bindParam(':mec_biceps_esquerdo', $mec_biceps_esquerdo);
        $consulta->bindParam(':mec_biceps_direito', $mec_biceps_direito);
        $consulta->bindParam(':mec_antebraco_esquerdo', $mec_antebraco_esquerdo);
        $consulta->bindParam(':mec_antebraco_direito', $mec_antebraco_direito);
        $consulta->bindParam(':mec_peito', $mec_peito);
        $consulta->bindParam(':mec_cintura', $mec_cintura);
        $consulta->bindParam(':mec_quadris', $mec_quadris);
        $consulta->bindParam(':mec_coxa_esquerda', $mec_coxa_esquerda);
        $consulta->bindParam(':mec_coxa_direita', $mec_coxa_direita);
        $consulta->bindParam(':mec_panturrilha_esquerda', $mec_panturrilha_esquerda);
        $consulta->bindParam(':mec_panturrilha_direita', $mec_panturrilha_direita);
        $consulta->bindParam(':mec_data', $mec_data);   
        $consulta->execute();
        header("location:");
    }
    
//update
    
   function atualizar($medidas_corporais) {
        $sqlUsuario = $conexao->prepare("UPDATE MEDIDAS_CORPORAIS SET MEC_PESO = :mec_peso, MEC_ALTURA = :mec_altura, MEC_PESCOCO = :mec_pescoco, MEC_BICEPS_ESQUERDO = :mec_biceps_esquerdo, MEC_BICEPS_DIREITO = :mec_biceps_direito, MEC_ANTEBRACO_ESQUERDO = :mec_antebraco_esquerdo, MEC_ANTEBRACO_DIREITO = :mec_antebraco_direito, MEC_PEITO = :mec_peito, MEC_CINTURA = :mec_cintura, MEC_QUADRIS = :mec_quadris, MEC_COXA_ESQUERDA = :mec_coxa_esquerda, MEC_COXA_DIREITA = :mec_coxa_direita, MEC_PANTURRILHA_ESQUERDA = :mec_paturrilha_esquerda, MEC_PANTURRILHA_DIREITA = :mec_panturrilha_direita, MEC_DATA = :mec_data WHERE MEC_CODIGO = :mec_codigo");
        $sqlUsuario->bindParam(':mec_codigo', $mec_codigo);
        $sqlUsuario->bindParam(':mec_peso', $mec_peso);
        $sqlUsuario->bindParam(':mec_altura', $mec_altura);
        $sqlUsuario->bindParam(':mec_pescoco', $mec_pescoco);
        $sqlUsuario->bindParam(':mec_biceps_esquerdo', $mec_biceps_esquerdo);
        $sqlUsuario->bindParam(':mec_biceps_direito', $mec_biceps_direito);
        $sqlUsuario->bindParam(':mec_antebraco_esquerdo', $mec_antebraco_esquerdo);
        $sqlUsuario->bindParam(':mec_antebraco_direito', $mec_antebraco_direito);
        $sqlUsuario->bindParam(':mec_peito', $mec_peito);
        $sqlUsuario->bindParam(':mec_cintura', $mec_cintura);
        $sqlUsuario->bindParam(':mec_quadris', $mec_quadris);
        $sqlUsuario->bindParam(':mec_coxa_esquerda', $mec_coxa_esquerda);
        $sqlUsuario->bindParam(':mec_coxa_direita', $mec_coxa_direita);
        $sqlUsuario->bindParam(':mec_panturrilha_esquerda', $mec_panturrilha_esquerda);
        $sqlUsuario->bindParam(':mec_panturrilha_direita', $mec_panturrilha_direita);
        $sqlUsuario->bindParam(':mec_data', $mec_data);
       
        
        $mec_codigo = $medidas_corporais->getMec_codigo();
        $mec_peso = $medidas_corporais->getMec_peso();
        $mec_altura = $medidas_corporais->getMec_altura();
        $mec_pescoco = $medidas_corporais->getMec_pescoco();
        $mec_biceps_esquerdo = $medidas_corporais->getMec_biceps_esquerdo();
        $mec_biceps_direito = $medidas_corporais->getMec_biceps_direito();
        $mec_antebraco_esquerdo= $medidas_corporais->getMec_antebraco_esquerdo();
        $mec_antebraco_direito= $medidas_corporais->getMec_antebraco_direito();
        $mec_peito = $medidas_corporais->getMec_peito();
        $mec_cintura = $medidas_corporais->getMec_cintura();
        $mec_quadris = $medidas_corporais->getMec_quadris();
        $mec_coxa_esquerda = $medidas_corporais->getMec_coxa_esquerda();
        $mec_coxa_direita = $medidas_corporais->getMec_coxa_direita();
        $mec_panturrilha_esquerda = $medidas_corporais->getMec_panturrilha_esquerda();
        $mec_panturrilha_direita = $medidas_corporais->getMec_panturrilha_direita();
        $mec_data = $medidas_corporais->getMec_data();
        $sqlUsuario->execute();
        header("location:");
    }
 
    }
   ?>
