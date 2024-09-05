<?php

namespace App\DAO;

use App\DAO;
use App\Model\Usuario;

class UsuarioDAO extends DAO
{

    public function inserir($usuario)
    {
        try {
            $sql = "insert into usuario (nome, email, senha, nivel) values (:nome,:email, MD5(:senha), :nivel)";
            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':nome',  $usuario->__get('nome'));
            $stmt->bindParam(':email', $usuario->__get('email'));
            $stmt->bindParam(':nivel', $usuario->__get('nivel'));
            $stmt->bindParam(':senha', $usuario->__get('senha'));
            $stmt->execute();
        } catch (\PDOException $ex) {

            header('Location: /error100');
            die();
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "delete from usuario where idusuario=:idusuario";

            $stmt = $this->getConn()->prepare($sql);
            
            $stmt->bindParam(":idusuario", $id);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error102');
            die();
        }
    }
    
    
    public function alterar($usuario)
    {
        try {
            $sql = "update usuario set nome=:nome,email=:email, nivel=:nivel where idusuario=:idusuario";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':nome', $usuario->__get('nome'));
            $stmt->bindParam(':email', $usuario->__get('email'));
            $stmt->bindParam(':nivel', $usuario->__get('nivel'));            
            $stmt->bindParam(':idusuario', $usuario->__get('idusuario'));

            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error101');
            die();
        }
    }

    public function buscarPorId($idu)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE idusuario=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":id", $idu);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result > 0) {
                $usuario = new Usuario();
                $usuario->__set('idusuario', $result['idusuario']);
                $usuario->__set('nome', $result['nome']);
                $usuario->__set('email', $result['email']);
                $usuario->__set('senha', $result['senha']);
                $usuario->__set('nivel', $result['nivel']);

                return $usuario;
            } else {
                return null;
            }
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    public function listar()
    {
        try {
            $usuarios = array();
            $sql = "select * from usuario";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $usuario = new Usuario();
                $usuario->__set('idusuario', $row['idusuario']);
                $usuario->__set('nome', $row['nome']);
                $usuario->__set('email', $row['email']);
                $usuario->__set('senha', $row['senha']);
                $usuario->__set('nivel', $row['nivel']);

                array_push($usuarios, $usuario);
            }

            return $usuarios;
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    
}
?>