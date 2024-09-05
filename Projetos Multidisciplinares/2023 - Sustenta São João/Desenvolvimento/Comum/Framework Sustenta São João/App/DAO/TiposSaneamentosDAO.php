<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\TiposSaneamentosModel;

    class TiposSaneamentosDAO extends DAO{

        public function inserir($tiposSaneamentos){
            
            $nome = $tiposSaneamentos->__get("TSS_NOME");                        
            $sql = "INSERT INTO tipos_saneamentos(            
                                                    TSS_NOME
                                                                                                        
                                                ) VALUES (
                                                    
                                                    :tss_TSS_NOME                                      
                                                )";
            
            $stmt = $this->getConn()->prepare($sql);
            
            $stmt->bindParam(':tss_TSS_NOME',$nome);                        
            $stmt->execute();                   

        }        
        public function alterar($tiposSaneamentos){
            try {
                $sql = "UPDATE tipos_saneamentos SET TSS_NOME=:nome WHERE TSS_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $tiposSaneamentos->__get('TSS_ID'));
                $stmt->bindParam(':nome', $tiposSaneamentos->__get('TSS_NOME'));

                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        public function excluir($identificador){
            try {
                $sql = "delete from tipos_saneamentos where TSS_ID=:identificador";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":identificador", $identificador);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }
    
        public function buscarPorID($id){
            try {
                $sql = "SELECT * FROM tipos_saneamentos WHERE TSS_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $tiposSaneamentos = new TiposSaneamentosModel();
                    $tiposSaneamentos->__set('TSS_ID', $result['TSS_ID']);
                    $tiposSaneamentos->__set('TSS_NOME', $result['TSS_NOME']);

                    return $tiposSaneamentos;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        public function listar(){
            try {
                $tiposSaneamentos = array();
                $sql = "SELECT * FROM tipos_saneamentos ORDER BY TSS_ID ASC";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $tipoSaneamento = new TiposSaneamentosModel();
                    $tipoSaneamento->__set('TSS_ID', $row['TSS_ID']);
                    $tipoSaneamento->__set('TSS_NOME', $row['TSS_NOME']);
                    
                    array_push($tiposSaneamentos, $tipoSaneamento); //Inserindo os dados persistidos da tabela em um array
                }

                return $tiposSaneamentos; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        
        
    }


?>