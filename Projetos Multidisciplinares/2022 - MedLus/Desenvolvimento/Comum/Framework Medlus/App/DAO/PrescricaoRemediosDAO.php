<?php

namespace App\DAO;

use App\DAO;
use App\Model\PrescricaoRemediosModel;
use App\Model\RemediosModel;

    class PrescricaoRemediosDAO extends DAO{
        public function listar(){
            try {
                $remedios_listagem = array();
                $sql = "SELECT 
                            RM.REM_ID as ID_REMEDIO,
                            RM.REM_NOME as NOME_REMEDIO
                        FROM 
                            REMEDIOS AS RM
                        ";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->execute();
        
                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    
                    $listaRemedios = new RemediosModel();
                    $listaRemedios->__set('REM_ID', $row['ID_REMEDIO']);
                    $listaRemedios->__set('REM_NOME', $row['NOME_REMEDIO']);
    
                    array_push($remedios_listagem, $listaRemedios); //Inserindo os dados persistidos da tabela em um array
                }

                return $remedios_listagem; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error110');
                die();
            }
        }

        public function alterar($remedio){

        }

        public function excluir($remedio){

        }

        public function inserir($remedio){

        }

        public function buscarPorId($remedio){

        }
    }

?>