<?php

namespace App\DAO;

use App\DAO;
use App\Model\ContatosSetoriaisModel;
    
    class ContatosSetoriaisDAO extends DAO{

        //Listando todos os dados da tabela pacientes em ordem crescente de PAC_ID
        public function listar(){
            try {
                $contatos_setoriais = array();
                $sql = "SELECT * FROM contatos_setoriais ORDER BY CTT_ID ASC ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $contatosetorial = new ContatosSetoriaisModel();
                    $contatosetorial->__set('CTT_ID', $row['CTT_ID']);
                    $contatosetorial->__set('CTT_RESPONSAVEL', $row['CTT_RESPONSAVEL']);
                    $contatosetorial->__set('CTT_EMAIL', $row['CTT_EMAIL']);
                    $contatosetorial->__set('CTT_TELEFONE', $row['CTT_TELEFONE']);
                    $contatosetorial->__set('CTT_SETOR', $row['CTT_SETOR']);
                    $contatosetorial->__set('CTT_WHATSAAP', $row['CTT_WHATSAAP']);
                    $contatosetorial->__set('FK_SECRETARIAS_SEC_ID', $row['FK_SECRETARIAS_SEC_ID']);

                    array_push($contatos_setoriais, $contatosetorial); //Inserindo os dados persistidos da tabela em um array
                }

                return $contatos_setoriais; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        //Método de alteração de um paciente (este método recebe o Objeto $paciente vindo do Método Atualizar (linha 93) do PacienteController)
        public function alterar($contatosetorial){
            try {
        
                $sql = "UPDATE contatos_setoriais SET 
                CTT_RESPONSAVEL=:responsavel,  
                CTT_EMAIL=:email,
                CTT_TELEFONE=:telefone,
                CTT_SETOR=:setor,
                CTT_WHATSAAP=:whatsapp, 
                FK_SECRETARIAS_SEC_ID=:secretaria
                WHERE CTT_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $contatosetorial->__get('CTT_ID'));
                $stmt->bindParam(':responsavel', $contatosetorial->__get('CTT_RESPONSAVEL'));
                $stmt->bindParam(':email', $contatosetorial->__get('CTT_EMAIL'));            
                $stmt->bindParam(':telefone', $contatosetorial->__get('CTT_TELEFONE'));
                $stmt->bindParam(':setor', $contatosetorial->__get('CTT_SETOR'));
                $stmt->bindParam(':whatsapp', $contatosetorial->__get('CTT_WHATSAAP'));
                $stmt->bindParam(':secretaria', $contatosetorial->__get('FK_SECRETARIAS_SEC_ID'));

                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }
        
    
        //Método para excluir um paciente (recebe o $id do Paciente a ser excluído)
        public function excluir($id)
        {
            try {
                $sql = "delete from contatos_setoriais where CTT_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }
       

        //Método para inserir um novo paciente (recebe um Objeto como parâmetro)
        public function inserir($contatosetorial){
            try {
                $sql = "insert into contatos_setoriais (
                CTT_RESPONSAVEL,
                CTT_EMAIL,  
                CTT_TELEFONE,
                CTT_SETOR, 
                CTT_WHATSAAP,
                FK_SECRETARIAS_SEC_ID
                ) 
                values (
                :responsavel,
                :email,
                :telefone, 
                :setor, 
                :whatsapp,
                :secretaria
                )";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':responsavel', $contatosetorial->__get('CTT_RESPONSAVEL'));
                $stmt->bindParam(':email', $contatosetorial->__get('CTT_EMAIL'));
                $stmt->bindParam(':telefone', $contatosetorial->__get('CTT_TELEFONE'));            
                $stmt->bindParam(':setor', $contatosetorial->__get('CTT_SETOR'));
                $stmt->bindParam(':whatsapp', $contatosetorial->__get('CTT_WHATSAAP'));
                $stmt->bindParam(':secretaria', $contatosetorial->__get('FK_SECRETARIAS_SEC_ID'));
                $stmt->execute();

            } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
            }
        }

      
        //Método para buscar um registro expecífico no Banco (recebe um $id)
        public function buscarPorId($id){
            try {
                $sql = "SELECT * FROM contatos_setoriais WHERE CTT_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $contatosetorial = new ContatosSetoriaisModel();


                    $contatosetorial->__set('CTT_ID', $result['CTT_ID']);
                    $contatosetorial->__set('CTT_RESPONSAVEL', $result['CTT_RESPONSAVEL']);
                    $contatosetorial->__set('CTT_EMAIL', $result['CTT_EMAIL']);
                    $contatosetorial->__set('CTT_TELEFONE', $result['CTT_TELEFONE']);
                    $contatosetorial->__set('CTT_SETOR', $result['CTT_SETOR']);
                    $contatosetorial->__set('CTT_WHATSAAP', $result['CTT_WHATSAAP']);
                    $contatosetorial->__set('FK_SECRETARIAS_SEC_ID', $result['FK_SECRETARIAS_SEC_ID']);

                    return $contatosetorial;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        
    }