<?php

namespace App\DAO;

use App\DAO;
use App\Model\TiposRemediosModel;

    class TiposRemediosDAO extends DAO{




        //Listando todos os dados da tabela tipos_remedios em ordem crescente de TIP_ID
        public function listar(){
            try {
                $tipos_remedios = array();
                $sql = "SELECT * FROM tipos_remedios  ORDER BY TIP_ID ASC  ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row){
                    $tiporemedio = new TiposRemediosModel();
                    $tiporemedio->__set('TIP_ID', $row['TIP_ID']);
                    $tiporemedio->__set('TIP_NOME', $row['TIP_NOME']);
                    $tiporemedio->__set('TIP_OBSERVACOES', $row['TIP_OBSERVACOES']);

                    array_push($tipos_remedios, $tiporemedio); //Inserindo os dados persistidos da tabela em um array
                }

                return $tipos_remedios; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

            //Método de alteração de um tipo de remédio (este método recebe o Objeto $tiporemedio vindo do Método Atualizar (linha 93) do TiposRemediosController)
            public function alterar($tiporemedio){
                try {
                    $sql = "UPDATE tipos_remedios 
                    SET 
                    TIP_NOME=:nome, 
                    TIP_OBSERVACOES=:observacoes 
                    WHERE TIP_ID=:id";
    
                    $stmt = $this->getConn()->prepare($sql);
    
                    $stmt->bindParam(':id', $tiporemedio->__get('TIP_ID'));
                    $stmt->bindParam(':nome', $tiporemedio->__get('TIP_NOME'));
                    $stmt->bindParam(':observacoes', $tiporemedio->__get('TIP_OBSERVACOES'));
    
                    $stmt->execute();
                } catch (\PDOException $ex) {
                    header('Location: /error101');
                    die();
                }
            }

        //Método para excluir um tipo de remédio (recebe o $id do Tipo de Remédio a ser excluído)
        public function excluir($id)
        {
            try {
                $sql = "delete from tipos_remedios where TIP_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error502');
                die();
            }
        }

        //Método para inserir um novo tipo de remédio (recebe um Objeto como parâmetro)
        public function inserir($tiporemedio){
            try {
                $sql = "insert into tipos_remedios (
                    TIP_NOME, 
                    TIP_OBSERVACOES
                    ) values (
                    :nome,
                    :observacoes
                    )";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':nome',  $tiporemedio->__get('TIP_NOME'));
                $stmt->bindParam(':observacoes', $tiporemedio->__get('TIP_OBSERVACOES'));
                $stmt->execute();
            } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
            }
        }

        //Método para buscar um registro expecífico no Banco (recebe um $id)
        public function buscarPorId($id){
            try {
                $sql = "SELECT * FROM tipos_remedios WHERE TIP_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $tiporemedio = new TiposRemediosModel();
                    $tiporemedio->__set('TIP_ID', $result['TIP_ID']);
                    $tiporemedio->__set('TIP_NOME', $result['TIP_NOME']);
                    $tiporemedio->__set('TIP_OBSERVACOES', $result['TIP_OBSERVACOES']); //retorna todos os campos relacionados ao ID selecionado
                    

                    return $tiporemedio;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

    }