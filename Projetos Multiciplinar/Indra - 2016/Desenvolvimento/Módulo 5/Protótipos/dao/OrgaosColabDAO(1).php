<?php

include '../../modelo/Database.php';
include '../../modelo/OrgaosColab.php';

class OrgaosColabDAO {

    public function editar($oc) {
        try {
            $db = Database::conectar();
            $query = "UPDATE orgaos_e_colaboradores SET ORC_NOME = :nome, ORC_CONTATO = :contato, ORC_EMAIL = :email WHERE ORC_ID = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":nome", $oc->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":contato", $oc->getContato(), PDO::PARAM_STR);
            $stmt->bindValue(":email", $oc->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":id", $oc->getId(), PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function criar($oc){
        try {
            $db = Database::conectar();
            $query = "INSERT INTO orgaos_e_colaboradores (ORC_NOME, ORC_CONTATO, ORC_EMAIL) VALUES (:nome, :contato, :email)";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":nome", $oc->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":contato", $oc->getContato(), PDO::PARAM_STR);
            $stmt->bindValue(":email", $oc->getEmail(), PDO::PARAM_STR);
            $success = $stmt->execute();
            $oc->setId($db->lastInsertId());
            return $success;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function deletar($id) {
        try{
            $db = Database::conectar();
            $query = "DELETE FROM orgaos_e_colaboradores WHERE ORC_ID = :id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

    }

    public function listar() {
        try {
            $numlinhas;
            $db = Database::conectar();
            $query = "SELECT * FROM orgaos_e_colaboradores";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $orgs = [];
            foreach ($result as $org) {
                $orgColab = new OrgaosColab($org['ORC_ID'], $org['ORC_NOME'], $org['ORC_CONTATO'], $org['ORC_EMAIL']);
                $orgs[] = $orgColab->jsonSerialize();
            }
            return $orgs;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function emailExiste($email) {
        try {
            $numlinhas;
            $db = Database::conectar();
            $query = "SELECT ORC_ID FROM orgaos_e_colaboradores WHERE ORC_EMAIL = :email";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            if($stmt->rowCount() > 0) return true;
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }


    public function jsonSerialize() {
        return array(
                    "id" => "$this->id",
                    "nome" => "$this->nome",
                    "contato" => "$this->contato",
                    "email" => "$this->email"
        );
    }

}
