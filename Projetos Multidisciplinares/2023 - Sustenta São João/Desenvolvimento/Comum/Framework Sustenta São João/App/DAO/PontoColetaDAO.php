<?php

namespace App\DAO;

use App\DAO;
use App\Model\PontoColetaModel;

    class PontoColetaDAO extends DAO {


        public function inserir($pontoColeta){
            
            $nomePro = $pontoColeta->__get("PRO_NOME");
            $cpfPro = $pontoColeta->__get("PRO_CPF");
            $rgPro = $pontoColeta->__get("PRO_RG");
            $ruaPro = $pontoColeta->__get("PRO_RUA");
            $numeroPro = $pontoColeta->__get("PRO_NUMERO");
            $bairroPro = $pontoColeta->__get("PRO_BAIRRO");
            $cepPro = $pontoColeta->__get("PRO_CEP");
            $logradouroPro = $pontoColeta->__get("PRO_LOGRADOURO");
            $telefonePro = $pontoColeta->__get("PRO_TELEFONE");
            $nomePco = $pontoColeta->__get("PCO_NOME");
            $ruaPco = $pontoColeta->__get("PCO_RUA");
            $numeroPco = $pontoColeta->__get("PCO_NUMERO");
            $bairroPco = $pontoColeta->__get("PCO_BAIRRO");
            $cepPco = $pontoColeta->__get("PCO_CEP");
            $logradouroPco = $pontoColeta->__get("PCO_LOGRADOURO");
            $latitudePco = $pontoColeta->__get("PCO_LATITUDE");
            $longitudePco = $pontoColeta->__get("PCO_LONGITUDE");
            $telefonePco = $pontoColeta->__get("PCO_TELEFONE");
            $cnpjPco = $pontoColeta->__get("PCO_CNPJ");
            $sql = "INSERT INTO pontos_coleta_proprietarios(            
                                                PRO_NOME,
                                                PRO_CPF,
                                                PRO_RG,
                                                PRO_RUA,
                                                PRO_NUMERO,
                                                PRO_BAIRRO,
                                                PRO_CEP,
                                                PRO_LOGRADOURO,
                                                PRO_TELEFONE,
                                                PCO_NOME,
                                                PCO_RUA,
                                                PCO_NUMERO,
                                                PCO_BAIRRO,
                                                PCO_CEP,
                                                PCO_LOGRADOURO,
                                                PCO_LATITUDE,
                                                PCO_LONGITUDE,
                                                PCO_TELEFONE,
                                                PCO_CNPJ
                                                ) VALUES (
                                                    :pco_PRO_NOME,
                                                    :pco_PRO_CPF,
                                                    :pco_PRO_RG,
                                                    :pco_PRO_RUA,
                                                    :pco_PRO_NUMERO,
                                                    :pco_PRO_BAIRRO,
                                                    :pco_PRO_CEP,
                                                    :pco_PRO_LOGRADOURO,
                                                    :pco_PRO_TELEFONE,
                                                    :pco_PCO_NOME,
                                                    :pco_PCO_RUA,
                                                    :pco_PCO_NUMERO,
                                                    :pco_PCO_BAIRRO,
                                                    :pco_PCO_CEP,
                                                    :pco_PCO_LOGRADOURO,
                                                    :pco_PCO_LATITUDE,
                                                    :pco_PCO_LONGITUDE,
                                                    :pco_PCO_TELEFONE,
                                                    :pco_PCO_CNPJ
                                                    
                                                )";
            
            $stmt = $this->getConn()->prepare($sql);

            
            
            
            $stmt->bindParam(':pco_PRO_NOME',$nomePro);
            $stmt->bindParam(':pco_PRO_CPF',$cpfPro);
            $stmt->bindParam(':pco_PRO_RG',$rgPro);
            $stmt->bindParam(':pco_PRO_RUA',$ruaPro);
            $stmt->bindParam(':pco_PRO_NUMERO',$numeroPro);
            $stmt->bindParam(':pco_PRO_BAIRRO',$bairroPro);
            $stmt->bindParam(':pco_PRO_CEP',$cepPro);
            $stmt->bindParam(':pco_PRO_LOGRADOURO',$logradouroPro);
            $stmt->bindParam(':pco_PRO_TELEFONE',$telefonePro);
            $stmt->bindParam(':pco_PCO_NOME',$nomePco);
            $stmt->bindParam(':pco_PCO_RUA',$ruaPco);
            $stmt->bindParam(':pco_PCO_NUMERO',$numeroPco);
            $stmt->bindParam(':pco_PCO_BAIRRO',$bairroPco);
            $stmt->bindParam(':pco_PCO_CEP',$cepPco);
            $stmt->bindParam(':pco_PCO_LOGRADOURO',$logradouroPco);
            $stmt->bindParam(':pco_PCO_LATITUDE',$latitudePco);
            $stmt->bindParam(':pco_PCO_LONGITUDE',$longitudePco);
            $stmt->bindParam(':pco_PCO_TELEFONE',$telefonePco);
            $stmt->bindParam(':pco_PCO_CNPJ',$cnpjPco);
           
                                                  



            $stmt->execute();  
            
      
        }

        public function alterar($pontoColeta){
            try {
                $sql = "UPDATE pontos_coleta_proprietarios SET 
                                    PRO_NOME=:nomePro, 
                                    PRO_CPF=:cpfPro, 
                                    PRO_RG=:rgPro, 
                                    PRO_RUA=:ruaPro, 
                                    PRO_NUMERO=:numeroPro, 
                                    PRO_BAIRRO=:bairroPro, 
                                    PRO_CEP=:cepPro, 
                                    PRO_LOGRADOURO=:logradouroPro,
                                    PRO_TELEFONE=:telefonePro, 
                                    PCO_NOME=:nomePco, 
                                    PCO_RUA=:ruaPco, 
                                    PCO_NUMERO=:numeroPco, 
                                    PCO_BAIRRO=:bairroPco, 
                                    PCO_CEP=:cepPco, 
                                    PCO_LOGRADOURO=:logradouroPco, 
                                    PCO_LATITUDE=:latitudePco, 
                                    PCO_LONGITUDE=:longitudePco, 
                                    PCO_TELEFONE=:telefonePco, 
                                    PCO_CNPJ=:cnpjPco  
                 WHERE PCO_ID=:idPco";

                $stmt = $this->getConn()->prepare($sql);
                $idPro = $pontoColeta->__get("PCO_ID");
                $nomePro = $pontoColeta->__get("PRO_NOME");
                $cpfPro = $pontoColeta->__get("PRO_CPF");
                $rgPro = $pontoColeta->__get("PRO_RG");
                $ruaPro = $pontoColeta->__get("PRO_RUA");
                $numeroPro = $pontoColeta->__get("PRO_NUMERO");
                $bairroPro = $pontoColeta->__get("PRO_BAIRRO");
                $cepPro = $pontoColeta->__get("PRO_CEP");
                $logradouroPro = $pontoColeta->__get("PRO_LOGRADOURO");
                $telefonePro = $pontoColeta->__get("PRO_TELEFONE");
                $nomePco = $pontoColeta->__get("PCO_NOME");
                $ruaPco = $pontoColeta->__get("PCO_RUA");
                $numeroPco = $pontoColeta->__get("PCO_NUMERO");
                $bairroPco = $pontoColeta->__get("PCO_BAIRRO");
                $cepPco = $pontoColeta->__get("PCO_CEP");
                $logradouroPco = $pontoColeta->__get("PCO_LOGRADOURO");
                $latitudePco = $pontoColeta->__get("PCO_LATITUDE");
                $longitudePco = $pontoColeta->__get("PCO_LONGITUDE");
                $telefonePco = $pontoColeta->__get("PCO_TELEFONE");
                $cnpjPco = $pontoColeta->__get("PCO_CNPJ");
                
                $stmt->bindParam(':idPco',$idPro);
                $stmt->bindParam(':nomePro',$nomePro);
                $stmt->bindParam(':cpfPro',$cpfPro);
                $stmt->bindParam(':rgPro',$rgPro);
                $stmt->bindParam(':ruaPro',$ruaPro);
                $stmt->bindParam(':numeroPro',$numeroPro);
                $stmt->bindParam(':bairroPro',$bairroPro);
                $stmt->bindParam(':cepPro',$cepPro);
                $stmt->bindParam(':logradouroPro',$logradouroPro);
                $stmt->bindParam(':telefonePro',$telefonePro);
                $stmt->bindParam(':nomePco',$nomePco);
                $stmt->bindParam(':ruaPco',$ruaPco);
                $stmt->bindParam(':numeroPco',$numeroPco);
                $stmt->bindParam(':bairroPco',$bairroPco);
                $stmt->bindParam(':cepPco',$cepPco);
                $stmt->bindParam(':logradouroPco',$logradouroPco);
                $stmt->bindParam(':latitudePco',$latitudePco);
                $stmt->bindParam(':longitudePco',$longitudePco);
                $stmt->bindParam(':telefonePco',$telefonePco);
                $stmt->bindParam(':cnpjPco',$cnpjPco);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        public function excluir($id){
            try {
                $sql = "delete from pontos_coleta_proprietarios where PCO_ID=:idPco";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":idPco", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }

        public function buscarPorID($id){
            try {
                $sql = "SELECT * FROM pontos_coleta_proprietarios WHERE PCO_ID=:idPco";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":idPco", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $pontoColeta = new pontoColetaModel();
                    $pontoColeta->__set('PCO_ID', $result['PCO_ID']);
                    $pontoColeta->__set('PRO_NOME', $result['PRO_NOME']);
                    $pontoColeta->__set('PRO_CPF', $result['PRO_CPF']);
                    $pontoColeta->__set('PRO_RG', $result['PRO_RG']);
                    $pontoColeta->__set('PRO_RUA', $result['PRO_RUA']); 
                    $pontoColeta->__set('PRO_NUMERO', $result['PRO_NUMERO']);
                    $pontoColeta->__set('PRO_BAIRRO', $result['PRO_BAIRRO']);
                    $pontoColeta->__set('PRO_CEP', $result['PRO_CEP']);
                    $pontoColeta->__set('PRO_LOGRADOURO', $result['PRO_LOGRADOURO']);
                    $pontoColeta->__set('PCO_NOME', $result['PCO_NOME']);
                    $pontoColeta->__set('PCO_RUA', $result['PCO_RUA']);
                    $pontoColeta->__set('PCO_NUMERO', $result['PCO_NUMERO']);
                    $pontoColeta->__set('PCO_BAIRRO', $result['PCO_BAIRRO']);
                    $pontoColeta->__set('PCO_CEP', $result['PCO_CEP']);
                    $pontoColeta->__set('PCO_LOGRADOURO', $result['PCO_LOGRADOURO']);
                    $pontoColeta->__set('PCO_LATITUDE', $result['PCO_LATITUDE']);
                    $pontoColeta->__set('PCO_TELEFONE', $result['PCO_TELEFONE']);
                    $pontoColeta->__set('PRO_TELEFONE', $result['PRO_TELEFONE']);
                    $pontoColeta->__set('PCO_LONGITUDE', $result['PCO_LONGITUDE']);
                    $pontoColeta->__set('PCO_CNPJ', $result['PCO_CNPJ']);
                    //retorna todos os campos relacionados ao ID selecionado

                    

                    return $pontoColeta;
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
                $pontoColetas = array();
                $sql = "SELECT * FROM pontos_coleta_proprietarios ORDER BY PCO_ID ASC";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $pontoColeta = new pontoColetaModel();
                    $pontoColeta->__set('PCO_ID', $row['PCO_ID']);
                    $pontoColeta->__set('PRO_NOME', $row['PRO_NOME']);
                    $pontoColeta->__set('PRO_CPF', $row['PRO_CPF']);
                    $pontoColeta->__set('PRO_RG', $row['PRO_RG']);
                    $pontoColeta->__set('PRO_RUA', $row['PRO_RUA']); 
                    $pontoColeta->__set('PRO_NUMERO', $row['PRO_NUMERO']);
                    $pontoColeta->__set('PRO_BAIRRO', $row['PRO_BAIRRO']);
                    $pontoColeta->__set('PRO_CEP', $row['PRO_CEP']);
                    $pontoColeta->__set('PRO_LOGRADOURO', $row['PRO_LOGRADOURO']);
                    $pontoColeta->__set('PRO_TELEFONE', $row['PRO_TELEFONE']);
                    $pontoColeta->__set('PCO_NOME', $row['PCO_NOME']);
                    $pontoColeta->__set('PCO_RUA', $row['PCO_RUA']);
                    $pontoColeta->__set('PCO_NUMERO', $row['PCO_NUMERO']);
                    $pontoColeta->__set('PCO_BAIRRO', $row['PCO_BAIRRO']);
                    $pontoColeta->__set('PCO_CEP', $row['PCO_CEP']);
                    $pontoColeta->__set('PCO_LOGRADOURO', $row['PCO_LOGRADOURO']);
                    $pontoColeta->__set('PCO_LATITUDE', $row['PCO_LATITUDE']);
                    $pontoColeta->__set('PCO_LONGITUDE', $row['PCO_LONGITUDE']);
                    $pontoColeta->__set('PCO_TELEFONE', $row['PCO_TELEFONE']);
                    $pontoColeta->__set('PCO_CNPJ', $row['PCO_CNPJ']);

                    array_push($pontoColetas, $pontoColeta); //Inserindo os dados persistidos da tabela em um array
                }
                
               return $pontoColetas; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        public function populaCombo(){
            try {
                $pontoColetas = array();
                $sql = "SELECT * FROM pontos_coleta_proprietarios ORDER BY PCO_NOME ASC";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $pontoColeta = new pontoColetaModel();
                    $pontoColeta->__set('PCO_ID', $row['PCO_ID']);
                    $pontoColeta->__set('PCO_NOME', $row['PCO_NOME']);
                    $pontoColeta->__set('PCO_BAIRRO', $row['PCO_BAIRRO']);
                    array_push($pontoColetas, $pontoColeta); //Inserindo os dados persistidos da tabela em um array
                }
                
               return $pontoColetas; //retornando o array para mostagem da view

            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        public function Avaliar($pontoColeta){

            try {
                $sql = "UPDATE pontos_coleta_proprietarios SET PCO_AVALIACAO = :pco_PCO_AVALIACAO WHERE PCO_ID=:pco_PCO_ID";
                $stmt = $this->getConn()->prepare($sql);

            $id= $pontoColeta->__get('PCO_ID');
            $avaliacao=$pontoColeta->__get('PCO_AVALIACAO');
            $stmt->bindParam(':pco_PCO_ID', $id);
            $stmt->bindParam(':pco_PCO_AVALIACAO', $avaliacao);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error101');
            die();
        }






            }









            // $avaliacaoPco = $pontoColeta->__get("PCO_AVALIACAO");
            // $sql = "INSERT INTO pontos_coleta_proprietarios(
            //                                                     PCO_AVALIACAO
            //                                                     ) VALUES (
            //                                                                 :pco_PCO_AVALIACAO)";
            //     $stmt = $this->getConn()->prepare($sql);
            //     $stmt->bindParam(':pco_PCO_AVALIACAO', $avaliacaoPco);
            //     $stmt->execute(); 
                                                            

        }

    

    
