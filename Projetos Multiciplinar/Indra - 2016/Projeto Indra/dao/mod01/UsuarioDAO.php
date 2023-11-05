<?php
include_once '../../modelo/mod01/UsuarioLogin.php';
include_once "../../modelo/mod01/Database.php";

class UsuarioDAO {

    private $id;

    public function getId() {
              
        return $this->id;
    }

    public function criarUsuario($usuario) {
        try {
            $db = Database::conectar();
            $query = "INSERT INTO USUARIOS (USU_NOME, USU_ID, USU_DATA_NASCIMENTO, USU_EMAIL, USU_SENHA, USU_DATA_ATIVACAO, USU_CODIGO_ATIVACAO, USU_RUA, USU_DATA_RECUPERACAO_SENHA, USU_STATUS_ATIVACAO, USU_NUMERO_RESIDENCIA, USU_CEP, USU_COMPLEMENTO, NIV_ID) VALUES(:USU_NOME, :USU_ID, :USU_DATA_NASCIMENTO, :USU_EMAIL, :USU_SENHA, :USU_DATA_ATIVACAO, :USU_CODIGO_ATIVACAO, :USU_RUA, :USU_DATA_RECUPERACAO_SENHA, :USU_STATUS_ATIVACAO, :USU_NUMERO_RESIDENCIA, :USU_CEP, :USU_COMPLEMENTO, :NIV_ID)";
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
            $stmt->bindValue(":USU_STATUS_ATIVACAO", $usuario->getStatusAtivacao(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_NUMERO_RESIDENCIA", $usuario->getNumeroResidencia(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_CEP", $usuario->getCep(), PDO::PARAM_STR);
            $stmt->bindValue(":USU_COMPLEMENTO", $usuario->getComplemento(), PDO::PARAM_STR);
            $stmt->bindValue(":NIV_ID", $usuario->getNivelAcesso(), PDO::PARAM_STR);
           
            $stmt->execute();
            $usuario->setId($db->lastInsertId());
            $this->id = $db->lastInsertId();
           
            
            return $usuario;
        } catch (PDOException $e) {
            echo $e->getMessage();

            exit();
        }
    }

    public function logar($senha, $email){
        try{
            $db = Database::conectar();
            $query = "SELECT * FROM usuarios WHERE USU_EMAIL = :email AND USU_SENHA = :senha";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":email", $email, PDO::PARAM_STR);
            $stmt->bindValue(":senha", $senha, PDO::PARAM_STR);
            //$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$valor = [];
            $stmt->execute();
            $valor[0] = $stmt->rowCount();
            $valor[1] = $stmt->fetch(PDO::FETCH_ASSOC);    
            return $valor;              
        } catch(PDOException $e) {
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

public function EditarUsuario($USU_NOME, $USU_DATA_NASCIMENTO, $USU_SENHA, $USU_CEP, $USU_CIDADE, $USU_COMPLEMENTO, $USU_NUMERO_RESIDENCIA, $USU_RUA, $USU_ID) {
        try {
            $db = Database::conectar();
            $query = "UPDATE USUARIOS SET
                    USU_NOME = :USU_NOME,
                    USU_DATA_NASCIMENTO = :USU_DATA_NASCIMENTO,
                    USU_SENHA = :USU_SENHA, 
                    USU_CEP = :USU_CEP, 
                    USU_CIDADE = :USU_CIDADE, 
                    USU_COMPLEMENTO = :USU_COMPLEMENTO,
                    USU_NUMERO_RESIDENCIA = :USU_NUMERO_RESIDENCIA,
                    USU_RUA = :USU_RUA  
                    WHERE USU_ID = :USU_ID"; 
            $stmt = $db->prepare($query);
            $stmt->bindValue(":USU_NOME", $USU_NOME, PDO::PARAM_STR);
            $stmt->bindValue(":USU_DATA_NASCIMENTO", $USU_DATA_NASCIMENTO, PDO::PARAM_STR);
            $stmt->bindValue(":USU_SENHA", $USU_SENHA, PDO::PARAM_STR);
            $stmt->bindValue(":USU_CEP", $USU_CEP, PDO::PARAM_STR);
            $stmt->bindValue(":USU_CIDADE", $USU_CIDADE, PDO::PARAM_STR);
            $stmt->bindValue(":USU_COMPLEMENTO", $USU_COMPLEMENTO, PDO::PARAM_STR);
            $stmt->bindValue(":USU_NUMERO_RESIDENCIA", $USU_NUMERO_RESIDENCIA, PDO::PARAM_STR);
            $stmt->bindValue(":USU_RUA", $USU_RUA, PDO::PARAM_STR);
            $stmt->bindValue(":USU_ID", $USU_ID, PDO::PARAM_STR);
            // $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Antes de execute ok";
            $stmt->execute();
            echo "pos execute ok";
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

 public function RecuperarSenha($USU_SENHA, $USU_EMAIL) {
        try {
            $db = Database::conectar();
            $query = "UPDATE USUARIOS SET USU_SENHA = :USU_SENHA       
        WHERE USU_EMAIL = :USU_EMAIL";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":USU_SENHA", $USU_SENHA, PDO::PARAM_STR);
            $stmt->bindValue(":USU_EMAIL", $USU_EMAIL, PDO::PARAM_STR);

            //$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt->execute();
        } catch (PDOException $e) {

            echo $e->getMessage();
            exit();
        }
    }

}
