<?php

require_once 'Conexao.php';

class exercicios_fisicos_DAO {

    private $conexao;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
    }

    public function inserir($exercicios) {
     try {
            $sql = "INSERT INTO exercicios_fisicos(EXF_DESCRICAO,EXF_NOME,EXF_COMO_EXECUTAR_GIF,EXF_DEMONSTRACAO_YOUTUBE,FK_UNIDADES_MEDIDAS_ESPORTIVAS_UNE_CODIGO,FK_TIPOS_EXECICIOS_FISICOS_TEF_CODIGO) VALUES (:EXF_DESCRICAO , :EXF_NOME,:EXF_COMO_EXECUTAR_GIF, :EXF_DEMONSTRACAO_YOUTUBE, :FK_UNIDADES_MEDIDAS_ESPORTIVAS_UNE_CODIGO, :FK_TIPOS_EXECICIOS_FISICOS_TEF_CODIGO )";
            
            $descricao = $exercicios->getexf_descricao();
            $nome = $exercicios->getexf_nome();
            
            $prep = $this->conexao->prepare($sql);
            $prep->bindParam(':EXF_DESCRICAO', $descricao);
            $prep->bindParam(':EXF_NOME', $nome);
            $prep->bindParam(':EXF_COMO_EXECUTAR_GIF',$gif);
            $prep->bindParam(':EXF_DEMONSTRACAO_YOUTUBE',$dmef);
            $prep->bindParam(':FK_UNIDADES_MEDIDAS_ESPORTIVAS_UNE_CODIGO',$unm);
            $prep->bindParam(':FK_TIPOS_EXECICIOS_FISICOS_TEF_CODIGO',$tef);
            
            $descricao = $exercicios->getexf_descricao();
            $nome = $exercicios->getexf_nome();
            $gif = $exercicios->getexf_como_executar_gif();
            $dmef = $exercicios->getexf_demonstracao_youtube();
            $unm = $exercicios->getfk_unidades_de_medidas_umn_codigo();  
            $tef = $exercicios->getfk_tipos_exercicios_fisicos_tef_codigo();
       

            if ($prep->execute()) {
                echo "ok";
            } else {
                echo "erro ao inserir";
            }
        } catch (PDOException $e) {
          return $e->getMessage();
       }
    }

    public function listarTodos() {
        try {
            $sql = "SELECT EXF_DESCRICAO, EXF_CODIGO, EXF_NOME, EXF_COMO_EXECUTAR_GIF, EXF_DEMONSTRACAO_YOUTUBE, FK_UNIDADES_MEDIDAS_ESPORTIVAS_UNE_CODIGO, FK_TIPOS_EXECICIOS_FISICOS_TEF_CODIGO   FROM exercicios_fisicos ORDER BY EXF_NOME";
            $prep = $this->conexao->prepare($sql);
            
            $prep->execute();
                
            return $prep ->fetchAll();
            
            }   catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function excluir($exercicios) {
        try {
            $sql = "DELETE FROM exercicios_fisicos WHERE EXF_CODIGO = :EXF_CODIGO";
            
            $codigo = $exercicios->getexf_codigo();
            
            $prep = $this->conexao->prepare($sql);
            $prep->bindParam(':EXF_CODIGO', $codigo);


            if ($prep->execute()) {
                return "ok";
            } else {
                return "erro ao inserir";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function alterar($exercicios) {
        try {
            
            if($exercicios->getexf_como_executar_gif()!="0")
                $sql = "UPDATE exercicios_fisicos SET EXF_DESCRICAO = :EXF_DESCRICAO, EXF_NOME = :EXF_NOME, EXF_COMO_EXECUTAR_GIF = :EXF_COMO_EXECUTAR_GIF, EXF_DEMONSTRACAO_YOUTUBE = :EXF_DEMONSTRACAO_YOUTUBE, FK_UNIDADES_MEDIDAS_ESPORTIVAS_UNE_CODIGO = :FK_UNIDADES_MEDIDAS_ESPORTIVAS_UNE_CODIGO, FK_TIPOS_EXECICIOS_FISICOS_TEF_CODIGO = :FK_TIPOS_EXECICIOS_FISICOS_TEF_CODIGO   WHERE EXF_CODIGO = :EXF_CODIGO";
            else{
                $sql = "UPDATE exercicios_fisicos SET EXF_DESCRICAO = :EXF_DESCRICAO, EXF_NOME = :EXF_NOME, EXF_DEMONSTRACAO_YOUTUBE = :EXF_DEMONSTRACAO_YOUTUBE, FK_UNIDADES_MEDIDAS_ESPORTIVAS_UNE_CODIGO = :FK_UNIDADES_MEDIDAS_ESPORTIVAS_UNE_CODIGO, FK_TIPOS_EXECICIOS_FISICOS_TEF_CODIGO = :FK_TIPOS_EXECICIOS_FISICOS_TEF_CODIGO   WHERE EXF_CODIGO = :EXF_CODIGO";
                
            }
            
            $prep = $this->conexao->prepare($sql);
            $prep->bindParam(':EXF_DESCRICAO', $descricao);
            $prep->bindParam(':EXF_NOME', $nome);
            $prep->bindParam(':EXF_CODIGO', $codigo);
            
            $prep->bindParam(':EXF_DEMONSTRACAO_YOUTUBE',$dmef);
            $prep->bindParam(':FK_UNIDADES_MEDIDAS_ESPORTIVAS_UNE_CODIGO',$unm);
            $prep->bindParam(':FK_TIPOS_EXECICIOS_FISICOS_TEF_CODIGO',$tef);

            if ($exercicios->getexf_como_executar_gif()!="0") {
                $prep->bindParam(':EXF_COMO_EXECUTAR_GIF', $gif);
                $gif = $exercicios->getexf_como_executar_gif();
            }
            
            $descricao = $exercicios->getexf_descricao();
            $nome = $exercicios->getexf_nome();
            $codigo = $exercicios->getexf_codigo();
            
            $dmef = $exercicios->getexf_demonstracao_youtube();
            $unm = $exercicios->getfk_unidades_de_medidas_umn_codigo();  
            $tef = $exercicios->getfk_tipos_exercicios_fisicos_tef_codigo();
                               
            if ($prep->execute()) {
                echo "ok";
            } else {
                echo "erro ao alterar";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
