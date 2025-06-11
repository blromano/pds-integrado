<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\EvertonModel; //Linkando o model ao DAO

    class EvertonDAO extends DAO{
        
        public function listar(){
            try{
                $evertons = array();
                $sql = "SELECT * FROM everton ORDER BY id DESC";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach($result as $row){
                    $everton = new EvertonModel();
                    $everton->__set('id',$row['id']);
                    $everton->__set('nome',$row['nome']);
                    $everton->__set('cpf',$row['cpf']);
                    $everton->__set('email',$row['email']);


                    array_push($evertons,$everton);
                }
                return $evertons;
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }    
        }

        public function inserir($obj){

            $nome = $obj->__get('nome');
            $cpf = $obj->__get('cpf');
            $email = $obj->__get('email');

            $sql = "INSERT INTO everton(
                        nome,
                        cpf,
                        email
                        ) VALUES (
                        :nome,
                        :cpf,
                        :email
                    )";
            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':email', $email);

            $stmt->execute();

        }
        public function excluir($obj){

        }
        public function alterar($obj){
            try{
                $id = $obj->__get('id');
                $nome = $obj->__get('nome');
                $cpf = $obj->__get('cpf');
                $email = $obj->__get('email');

                $sql = "UPDATE everton SET 
                            nome=:nome, 
                            cpf=:cpf,
                            email=:email
                            WHERE
                            id=:id";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':email', $email);

                $stmt->execute();

            }
            catch(\PDOException $ex){
                header('Location: /error101');
                die();
            }
        }
        public function buscarPorId($id){
            try{
                
                $sql = "SELECT * FROM everton WHERE id=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $id);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $everton = new EvertonModel();
                    $everton->__set('id',$result['id']);
                    $everton->__set('nome',$result['nome']);
                    $everton->__set('cpf',$result['cpf']);
                    $everton->__set('email',$result['email']);


                    return $everton;
                } else{
                    return null;
                }
                return $evertons;
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            } 
        }
        
    }