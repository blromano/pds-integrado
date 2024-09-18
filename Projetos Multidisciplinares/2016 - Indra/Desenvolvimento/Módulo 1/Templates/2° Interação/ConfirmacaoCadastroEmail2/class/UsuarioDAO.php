<?php

include_once "Database.php";

class UsuarioDAO {

    private $id;

    public function getId() {
              
        return $this->id;
    }

    public function criarUsuario($usuario) {
        try {
            $db = Database::conectar();
            $query = "INSERT INTO USUARIOS (USU_NOME, USU_ID, USU_DATA_NASCIMENTO, USU_EMAIL, USU_SENHA, USU_DATA_ATIVACAO, USU_CODIGO_ATIVACAO, USU_RUA, USU_DATA_RECUPERACAO_SENHA, USU_PODERES_ADMINISTRATIVOS, USU_STATUS_ATIVACAO, USU_NUMERO_RESIDENCIA, USU_CEP, USU_COMPLEMENTO) VALUES(:USU_NOME, :USU_ID, :USU_DATA_NASCIMENTO, :USU_EMAIL, :USU_SENHA, :USU_DATA_ATIVACAO, :USU_CODIGO_ATIVACAO, :USU_RUA, :USU_DATA_RECUPERACAO_SENHA, :USU_PODERES_ADMINISTRATIVOS, :USU_STATUS_ATIVACAO, :USU_NUMERO_RESIDENCIA, :USU_CEP, :USU_COMPLEMENTO)";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":USU_NOME", $usuario->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_ID", $usuario->getId(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_DATA_NASCIMENTO", $usuario->getDataNascimento(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_EMAIL", $usuario->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_SENHA", $usuario->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_DATA_ATIVACAO", $usuario->getDataAtivacao(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_CODIGO_ATIVACAO", $usuario->getCodigoAtivacao(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_RUA", $usuario->getRua(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_DATA_RECUPERACAO_SENHA", $usuario->getDataRecuperacaoSenha(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_PODERES_ADMINISTRATIVOS", $usuario->getPoderesAdministradores(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_STATUS_ATIVACAO", $usuario->getStatusAtivacao(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_NUMERO_RESIDENCIA", $usuario->getNumeroResidencia(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_CEP", $usuario->getCep(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_COMPLEMENTO", $usuario->getComplemento(), PDO::PARAM_STR);
           
            $stmt->execute();
            $usuario->setId($db->lastInsertId());
            $this->id = $db->lastInsertId();
           
            
            return $usuario;
        } catch (PDOException $e) {
            echo $e->getMessage();

            exit();
        }
    }

    public function listarUsuario() {
        try {
            $db = Database::conectar();
            $query = "SELECT * FROM usuarios";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function buscarUsuario($USU_ID, $valor) {
        try {
           $db = Database::conectar();
           $query = "SELECT * FROM usuarios WHERE $USU_ID = $valor";
           $stmt = $pdo->prepare($query);
           $stmt->bindValue(":USU_ID", $valor, PDO::PARAM_STR);
           $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $stmt->execute();
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
       } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

public function VerificarEmail($USU_EMAIL) {
    try {
        $db = Database::conectar();
        $query = "SELECT USU_ID FROM usuarios WHERE USU_EMAIL = :USU_EMAIL";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":USU_EMAIL", $USU_EMAIL, PDO::PARAM_STR);
            //$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    } catch (PDOException $e) {
        echo $USU_EMAIL;
        echo $e->getMessage();
        exit();
    }
}

public function AtivarCadastro($USU_CODIGO_ATIVACAO, $USU_DATA_ATIVACAO, $USU_STATUS_ATIVACAO) {
    try {
        $db = Database::conectar();
        $query = "UPDATE USUARIOS SET USU_DATA_ATIVACAO = :USU_DATA_ATIVACAO,
        USU_STATUS_ATIVACAO = :USU_STATUS_ATIVACAO
        WHERE USU_CODIGO_ATIVACAO = :USU_CODIGO_ATIVACAO";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":USU_DATA_ATIVACAO", $USU_DATA_ATIVACAO, PDO::PARAM_STR);
        $stmt->bindValue(":USU_STATUS_ATIVACAO", $USU_STATUS_ATIVACAO, PDO::PARAM_STR);
        $stmt->bindValue(":USU_CODIGO_ATIVACAO", $USU_CODIGO_ATIVACAO, PDO::PARAM_STR);
            //$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt->execute();
         } catch (PDOException $e) {

        echo $e->getMessage();
        exit();
    }
}

public function VerificarCodigo($USU_CODIGO_ATIVACAO) {
    try {
        $db = Database::conectar();
        $query = "SELECT USU_ID FROM usuarios WHERE USU_CODIGO_ATIVACAO = :USU_CODIGO_ATIVACAO";
        
        $stmt = $db->prepare($query);
        $stmt->bindValue(":USU_CODIGO_ATIVACAO", $USU_CODIGO_ATIVACAO, PDO::PARAM_STR);
            //$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
         return false; 
       ;
     }
 } catch (PDOException $e) {
    echo $USU_CODIGO_ATIVACAO;
    echo $e->getMessage();
    exit();
}
}

public function editarUsuario($usuario, $parametro, $valor) {
    try {
        $db = Database::CriarConexao();
        $query = "UPDATE usuarios SET :USU_NOME = $usuario->getNome(), :USU_ID = $usuario->getId(), :USU_DATA_NASCIMENTO = $usuario->getDataNascimento(), :USU_EMAIL = $usuario->getEmail(), :USU_SENHA = $usuario->getSenha(), :USU_DATA_ATIVACAO =  $usuario->getDataAtivacao(), :USU_CODIGO_ATIVACAO = $usuario->getCodigoAtivacao(), :USU_RUA = $usuario->getRua(), :USU_DATA_RECUPERACAO_SENHA = $usuario->getDataRecuperacaoSenha(), :USU_PODERES_ADMINISTRATIVOS = $usuario->getPoderesAdministrativos(), :USU_STATUS_ATIVACAO = $usuario->getStatusAtivacao(), :USU_NUMERO_RESIDENCIA = $usuario->getNumeroResidencia(), :USU_CEP = $usuario->getCep(), :USU_COMPLEMENTO = $usuario->getComplemento() WHERE $parametro = $valor";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":USU_NOME", $usuario->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(":USU_ID", $usuario->getId(), PDO::PARAM_STR);
        $stmt->bindValue(":USU_DATA_NASCIMENTO", $usuario->getDataNascimento(), PDO::PARAM_STR);
        $stmt->bindValue(":USU_EMAIL", $usuario->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(":USU_SENHA", $usuario->getSenha(), PDO::PARAM_STR);
        $stmt->bindValue(":USU_DATA_ATIVACAO", $usuario->getDataAtivacao(), PDO::PARAM_STR);
        $stmt->bindValue(":USU_CODIGO_ATIVACAO", $usuario->getCodigoAtivacao(), PDO::PARAM_STR);
        $stmt->bindValue(":USU_RUA", $usuario->getRua(), PDO::PARAM_STR);
        $stmt->bindValue(":USU_DATA_RECUPERACAO_SENHA", $usuario->getDataRecuperacaoSenha(), PDO::PARAM_STR);
        $stmt->bindValue(":USU_PODERES_ADMINISTRATIVOS", $usuario->getPoderesAdministrativos(), PDO::PARAM_STR);
        $stmt->bindValue(":USU_STATUS_ATIVACAO", $usuario->getStatusAtivacao(), PDO::PARAM_STR);
        $stmt->bindValue(":USU_NUMERO_RESIDENCIA", $usuario->getNumeroResidencia(), PDO::PARAM_STR);
        $stmt->bindValue(":USU_CEP", $usuario->getCep(), PDO::PARAM_STR);
        $stmt->bindValue(":USU_COMPLEMENTO", $usuario->getComplemento(), PDO::PARAM_STR);
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
        $query = "DELETE * FROM usuarios WHERE $USU_ID = :id";
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
