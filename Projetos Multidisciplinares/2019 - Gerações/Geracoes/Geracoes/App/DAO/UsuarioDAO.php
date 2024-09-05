<?php

    namespace App\DAO;

    use App\DAO\DAO;
    use App\Model\Usuario;
    
    class UsuarioDAO extends DAO{
        
        public function alterar($usuario) {

        }

        public function buscarPorId($usuario) {

        }

        public function excluir($usuario) {

        }

        public function inserir($usuario) {
            $sql = "insert into tbl_usuario (nome, usuario, senha) VALUES (:NAME, :USER, :PASS)";
            $stmt = $this->getConn()->prepare($sql);
            
            $nome = $usuario->getNome();
            $user = $usuario->getUsuario();
            $senha = $usuario->getSenha();

            $stmt->bindParam(":NAME",$nome);
            $stmt->bindParam(":USER",$user);
            $stmt->bindParam(":PASS",$senha);
            $stmt->execute();             
        }

        public function listar() {
            $usuarios = array();

            $sql = "SELECT id, nome, usuario FROM tbl_usuario";
            $stmt = $this->getConn()->prepare($sql);                       
            $stmt->execute();
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($results as $row) {
                $usuario = new Usuario();
                $usuario->setId($row['id']);
                $usuario->setNome($row['nome']);
                $usuario->setUsuario($row['usuario']);

                array_push($usuarios, $usuario);
            }                                   

            return $usuarios; 
        }
        
        public function autenticar($usuario){
            $sql = "SELECT id, nome, usuario FROM tbl_usuario WHERE usuario=:USER AND senha=:PASS";
            $stmt = $this->getConn()->prepare($sql);           

            $user = $usuario->getUsuario();
            $senha = $usuario->getSenha();

            $stmt->bindParam(":USER",$user);
            $stmt->bindParam(":PASS",$senha);
            
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if($result > 0){
                $usuario = new Usuario();
                $usuario->setId($result['id']);
                $usuario->setNome($result['nome']);
                $usuario->setUsuario($result['usuario']);
                
                return $usuario;
            }

            return $usuario;
        }
    }
    
?>