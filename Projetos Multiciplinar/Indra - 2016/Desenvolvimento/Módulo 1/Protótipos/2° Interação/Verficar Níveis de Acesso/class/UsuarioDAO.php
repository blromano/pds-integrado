<?php

require_once 'Usuario.php';
require_once 'Database.php';

class UsuarioDAO {

    public function criarUsuario($usuario) { 
        try{
            $pdo = Database::CriarConexao();
            $query = "INSERT INTO USUARIO (nome) VALUES(:nome)";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(":nome", $usuario->getNome(), PDO::PARAM_STR);
            $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt->execute();
            
            $usuario->setId($pdo->lastInsertId());            
        } catch(PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function logar($senha, $email){
        try{
            $pdo = Database::CriarConexao();
            $query = "SELECT * FROM usuarios WHERE USU_EMAIL = :email AND USU_SENHA = :senha";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(":email", $email, PDO::PARAM_STR);
            $stmt->bindValue(":senha", $senha, PDO::PARAM_STR);
            //$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $valor = [];
            $stmt->execute();
            $valor[] = $stmt->rowCount();
            $valor[] = $stmt->fetch(PDO::FETCH_ASSOC);    
            return $valor;              
        } catch(PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    
    public function listaUsuario() {
        try{
            $pdo = Database::CriarConexao();
            $query = "SELECT nome FROM usuario";
            $stmt = $pdo->prepare($query);
            $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
        
        public function buscaUsuario($parametro, $valor) {
            try{
				$pdo = Database::CriarConexao();
                $query = "SELECT (:nome, :id, tudo mais) FROM usuario WHERE $parametro = $valor";
				$stmt = $pdo->prepare($query);
				$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt->execute();
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
        }
		
		public function editarUsuario($usuario, $parametro, $valor) {
			try{
				$pdo = Database::CriarConexao();
				$query = "UPDATE usuario SET :nome = $usuario->getNome(), tudo mais WHERE $parametro = %valor";
				$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt->execute();
			} catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
		}
		
		public function deletarUsuario($parametro, $valor) {
			try{
				$pdo = Database::CriarConexao();
				$query = "DELETE FROM usuario WHERE $parametro = $valor";
				$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt->execute();
			} catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
		}
}   