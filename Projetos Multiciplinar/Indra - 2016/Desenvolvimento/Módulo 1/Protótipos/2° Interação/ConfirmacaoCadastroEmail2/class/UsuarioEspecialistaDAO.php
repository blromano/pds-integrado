<?php

include_once "Database.php";


class UsuarioEspecialistaDAO {

    public function criarUsuario($usuarioEspecialista) {
        try {
            $db = Database::conectar();
            $query = "INSERT INTO ESPECIALISTAS (USU_ID, ESP_RG, ESP_ESPECIALIZACAO, ESP_ID, ESP_CPF) VALUES(:USU_ID, :ESP_RG, :ESP_ESPECIALIZACAO, :ESP_ID, :ESP_CPF)";
            $stmt = $db->prepare($query);           
            $stmt->bindValue(":USU_ID",$usuarioEspecialista->getUserId() , PDO::PARAM_STR);
            $stmt->bindValue(":ESP_ID",$usuarioEspecialista->getId() , PDO::PARAM_STR);
            $stmt->bindValue(":ESP_RG", $usuarioEspecialista->getRg(), PDO::PARAM_STR);
            $stmt->bindValue(":ESP_CPF",$usuarioEspecialista->getCpf() , PDO::PARAM_STR);
            $stmt->bindValue(":ESP_ESPECIALIZACAO",$usuarioEspecialista->getEspecializacao() , PDO::PARAM_STR);
           
            //$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $stmt->execute();
            //$usuario->setId($db->lastInsertId());
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function listarUsuarioEspecialista() {
        try {
            $db = Database::conectar();
            $query = "SELECT * FROM ESPECIALISTAS";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function buscarUsuarioEspecialista($parametro, $valor) {
        try {
            $db = Database::CriarConexao();
            $query = "SELECT * FROM ESPECIALISTAS WHERE $parametro = $valor";
            $stmt = $pdo->prepare($query);
            $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function editarUsuarioEspecialista($usuarioEspecialista, $parametro, $valor) {
        try {
            $db = Database::CriarConexao();
            $query = "UPDATE ESPECIALISTAS SET :ESP_CPF = $usuarioEspecialista->getCpf(), :ESP_ID = $usuarioEspecialista->getId(), :ESP_ESPECIALIZACAO = $usuarioEspecialista->getEspecializacao(), :ESP_RG = $usuarioEspecialista->getRg() WHERE $parametro = $valor";
            $stmt = $db->prepare($query);

            $stmt->bindValue(":ESP_ID",$usuarioEspecialista->getId() , PDO::PARAM_STR);
            $stmt->bindValue(":ESP_RG", $usuarioEspecialista->getRg(), PDO::PARAM_STR);
            $stmt->bindValue(":ESP_CPF",$usuarioEspecialista->getCpf() , PDO::PARAM_STR);
            $stmt->bindValue(":ESP_ESPECIALIZACAO",$usuarioEspecialista->getEspecializacao() , PDO::PARAM_STR);
            
            // $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function deletarUsuarioEspecialista($id) {
        try {
            $db = Database::CriarConexao();
            $query = "DELETE * FROM ESPECIALISTAS WHERE $ESP_ID = :id";
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
