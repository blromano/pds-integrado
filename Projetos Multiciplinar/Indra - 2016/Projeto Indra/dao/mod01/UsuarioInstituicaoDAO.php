<?php

include_once "../../modelo/mod01/Database.php";


class UsuarioInstituicaoDAO {


    public function criarUsuario($usuarioInstituicao) {

        try {

            $db = Database::conectar();

            $query = "INSERT INTO INSTITUICOES ( USU_ID, INS_ID, INS_CNPJ, INS_NOME_FANTASIA, INS_RAZAO_SOCIAL)VALUES(:USU_ID, :INS_ID, :INS_CNPJ, :INS_NOME_FANTASIA, :INS_RAZAO_SOCIAL)";           
            $stmt = $db->prepare($query); 
            $stmt->bindValue(":USU_ID", $usuarioInstituicao->getUserId(), PDO::PARAM_STR);
            $stmt->bindValue(":INS_ID", $usuarioInstituicao->getId(), PDO::PARAM_STR);  
            $stmt->bindValue(":INS_CNPJ", $usuarioInstituicao->getCnpj(), PDO::PARAM_STR); 
            $stmt->bindValue(":INS_NOME_FANTASIA",$usuarioInstituicao->getNomeFantasia(), PDO::PARAM_STR);
            $stmt->bindValue(":INS_RAZAO_SOCIAL",$usuarioInstituicao->getRazaoSocial(), PDO::PARAM_STR); 
            echo "<br><br>";
            print_r($usuarioInstituicao);
                      
            //$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $stmt->execute();
             $usuarioInstituicao->setId($db->lastInsertId());
             return $usuarioInstituicao;
             var_dump($usuarioInstituicao);
        } catch (PDOException $e) {
            echo $e->getMessage();
            //print_r($stmt);
            echo "<br><br>";
            
            var_dump($usuarioInstituicao);
            exit();
        }
    }

    public function listarUsuario() {
        try {
            $db = Database::conectar();
            $query = "SELECT * FROM INSTITUICOES ";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function buscarUsuario($parametro, $valor) {
        try {
            $db = Database::CriarConexao();
            $query = "SELECT * FROM INSTITUICOES WHERE $parametro = $valor";
            $stmt = $pdo->prepare($query);
            $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function editarUsuario($usuarioInstituicao, $parametro, $valor) {
        try {
            $db = Database::CriarConexao();
            $query = "UPDATE INSTITUICOES SET :INS_ID = $usuarioInstituicao->getId(), :INS_CNPJ = $usuarioInstituicao->getCnpj(), :INS_NOME_FANTASIA = $usuarioInstituicao->getNome(), :INS_RAZAO_SOCIAL = $usuarioInstituicao->getRazaoSocial() WHERE $parametro = $valor";
            $stmt = $db->prepare($query);  

            $stmt->bindValue(":INS_NOME_FANTASIA", $usuarioInstituicao->getNomeFantasia(), PDO::PARAM_STR);
            $stmt->bindValue(":INS_ID",$usuarioInstituicao->getId() , PDO::PARAM_STR);
            $stmt->bindValue(":INS_CNPJ", $usuarioInstituicao->getCnpj(), PDO::PARAM_STR);
            $stmt->bindValue(":INS_RAZAO_SOCIALS",$usuarioInstituicao->getRazaoSocial() , PDO::PARAM_STR);
            
            // $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function deletarUsuario($id) {
        try {
            $db = Database::CriarConexao();
            $query = "DELETE * FROM INSTITUICOES WHERE $INS_ID = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            //$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

}
