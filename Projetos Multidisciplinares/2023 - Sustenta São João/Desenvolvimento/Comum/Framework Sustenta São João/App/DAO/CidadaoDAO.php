<?php

namespace App\DAO;

use App\DAO;
use App\Model\CidadaoModel;

    class CidadaoDAO extends DAO {

        public function inserir($cidadao){

            
            $cpf = $cidadao->__get("USU_CPF");
            $rg = $cidadao->__get("USU_RG");
            $data_nascimento = $cidadao->__get("USU_DATA_NASCIMENTO");
            $email = $cidadao->__get("USU_EMAIL");
            $senha = $cidadao->__get("USU_SENHA");
            $celular = $cidadao->__get("USU_CELULAR");
            $estado = $cidadao->__get("USU_ESTADO");
            $cidade = $cidadao->__get("USU_CIDADE");
            $rua = $cidadao->__get("USU_RUA");
            $numero_residencia = $cidadao->__get("USU_NUMERO_RESIDENCIA");
            $bairro = $cidadao->__get("USU_BAIRRO");
            $cep = $cidadao->__get("USU_CEP");
            $sexo = $cidadao->__get("USU_SEXO");
            $foto_perfil = $cidadao->__get("USU_FOTO_PERFIL");
            $nome = $cidadao->__get("USU_NOME");
            
            $sql = "INSERT INTO CIDADAOS(            
                                                    USU_CPF,
                                                    USU_RG,
                                                    USU_DATA_NASCIMENTO,
                                                    USU_EMAIL,
                                                    USU_SENHA,
                                                    USU_CELULAR,
                                                    USU_ESTADO,
                                                    USU_CIDADE,
                                                    USU_RUA,
                                                    USU_NUMERO_RESIDENCIA,
                                                    USU_BAIRRO,
                                                    USU_CEP,
                                                    USU_SEXO,
                                                    USU_FOTO_PERFIL,
                                                    USU_NOME
                                                ) VALUES (
                                                    
                                                    :cid_USU_CPF,
                                                    :cid_USU_RG,
                                                    :cid_USU_DATA_NASCIMENTO,
                                                    :cid_USU_EMAIL,
                                                    :cid_USU_SENHA,
                                                    :cid_USU_CELULAR,
                                                    :cid_USU_ESTADO,
                                                    :cid_USU_CIDADE,
                                                    :cid_USU_RUA,
                                                    :cid_USU_NUMERO_RESIDENCIA,
                                                    :cid_USU_BAIRRO,
                                                    :cid_USU_CEP,
                                                    :cid_USU_SEXO,
                                                    :cid_USU_FOTO_PERFIL,
                                                    :cid_USU_NOME
                                                )";
            
            $stmt = $this->getConn()->prepare($sql);
            
            $stmt->bindParam(':cid_USU_CPF',$cpf);
            $stmt->bindParam(':cid_USU_RG',$rg);
            $stmt->bindParam(':cid_USU_DATA_NASCIMENTO',$data_nascimento);
            $stmt->bindParam(':cid_USU_EMAIL',$email);
            $stmt->bindParam(':cid_USU_SENHA',$senha);
            $stmt->bindParam(':cid_USU_CELULAR',$celular);
            $stmt->bindParam(':cid_USU_ESTADO',$estado);
            $stmt->bindParam(':cid_USU_CIDADE',$cidade);
            $stmt->bindParam(':cid_USU_RUA',$rua);
            $stmt->bindParam(':cid_USU_NUMERO_RESIDENCIA',$numero_residencia);
            $stmt->bindParam(':cid_USU_BAIRRO',$bairro);
            $stmt->bindParam(':cid_USU_CEP',$cep);
            $stmt->bindParam(':cid_USU_SEXO',$sexo);
            $stmt->bindParam(':cid_USU_FOTO_PERFIL',$foto_perfil);
            $stmt->bindParam(':cid_USU_NOME',$nome);

            $stmt->execute();

        }
        
        public function alterar($cidadao){
            try {
                $sql = "UPDATE CIDADAOS SET USU_EMAIL=:email, USU_CELULAR=:celular, USU_ESTADO=:estado, USU_CIDADE=:cidade, USU_RUA=:rua, USU_NUMERO_RESIDENCIA=:numero_residencia, USU_BAIRRO=:bairro, USU_CEP=:cep
                WHERE USU_ID=:id"; 

                $stmt = $this->getConn()->prepare($sql);

                $id = $cidadao->__get('USU_ID');
                $email = $cidadao->__get('USU_EMAIL');
                $celular = $cidadao->__get('USU_CELULAR');
                $estado = $cidadao->__get('USU_ESTADO');
                $cidade = $cidadao->__get('USU_CIDADE');
                $rua = $cidadao->__get('USU_RUA');
                $residencia = $cidadao->__get('USU_NUMERO_RESIDENCIA');
                $bairro = $cidadao->__get('USU_BAIRRO');
                $cep = $cidadao->__get('USU_CEP');

                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':celular', $celular);
                $stmt->bindParam(':estado', $estado);            
                $stmt->bindParam(':cidade', $cidade);
                $stmt->bindParam(':rua', $rua);
                $stmt->bindParam(':numero_residencia', $residencia);
                $stmt->bindParam(':bairro', $bairro);
                $stmt->bindParam(':cep', $cep);            

                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        public function excluir($id){
            try {
                $sql = "delete from cidadaos where USU_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }

        public function buscarPorID($id){
            try {
                $sql = "SELECT * FROM CIDADAOS WHERE USU_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $cidadao = new CidadaoModel();
                    $cidadao->__set('USU_ID', $result['USU_ID']);
                    $cidadao->__set('USU_CPF', $result['USU_CPF']);
                    $cidadao->__set('USU_RG', $result['USU_RG']);
                    $cidadao->__set('USU_DATA_NASCIMENTO', $result['USU_DATA_NASCIMENTO']); //retorna todos os campos relacionados ao ID selecionado
                    $cidadao->__set('USU_EMAIL', $result['USU_EMAIL']);
                    $cidadao->__set('USU_SENHA', $result['USU_SENHA']);
                    $cidadao->__set('USU_CELULAR', $result['USU_CELULAR']);
                    $cidadao->__set('USU_ESTADO', $result['USU_ESTADO']);
                    $cidadao->__set('USU_CIDADE', $result['USU_CIDADE']);
                    $cidadao->__set('USU_RUA', $result['USU_RUA']);
                    $cidadao->__set('USU_NUMERO_RESIDENCIA', $result['USU_NUMERO_RESIDENCIA']);
                    $cidadao->__set('USU_BAIRRO', $result['USU_BAIRRO']);
                    $cidadao->__set('USU_CEP', $result['USU_CEP']);
                    $cidadao->__set('USU_SEXO', $result['USU_SEXO']);
                    $cidadao->__set('USU_FOTO_PERFIL', $result['USU_FOTO_PERFIL']);
                    $cidadao->__set('USU_NOME', $result['USU_NOME']);
                    
                    return $cidadao;
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
                $cidadaos = array();
                $sql = "SELECT * FROM CIDADAOS";
                
                $stmt = $this->getConn()->prepare($sql);

                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $cidadao = new CidadaoModel();
                    $cidadao->__set('USU_ID', $row['USU_ID']);
                    $cidadao->__set('USU_CPF', $row['USU_CPF']);
                    $cidadao->__set('USU_RG', $row['USU_RG']);
                    $cidadao->__set('USU_DATA_NASCIMENTO', $row['USU_DATA_NASCIMENTO']); //retorna todos os campos relacionados ao ID selecionado
                    $cidadao->__set('USU_EMAIL', $row['USU_EMAIL']);
                    $cidadao->__set('USU_SENHA', $row['USU_SENHA']);
                    $cidadao->__set('USU_CELULAR', $row['USU_CELULAR']);
                    $cidadao->__set('USU_ESTADO', $row['USU_ESTADO']);
                    $cidadao->__set('USU_CIDADE', $row['USU_CIDADE']);
                    $cidadao->__set('USU_RUA', $row['USU_RUA']);
                    $cidadao->__set('USU_NUMERO_RESIDENCIA', $row['USU_NUMERO_RESIDENCIA']);
                    $cidadao->__set('USU_BAIRRO', $row['USU_BAIRRO']);
                    $cidadao->__set('USU_CEP', $row['USU_CEP']);
                    $cidadao->__set('USU_SEXO', $row['USU_SEXO']);
                    $cidadao->__set('USU_FOTO_PERFIL', $row['USU_FOTO_PERFIL']);
                    $cidadao->__set('USU_NOME', $row['USU_NOME']);

                    array_push($cidadaos, $cidadao); //Inserindo os dados persistidos da tabela em um array
                }

                return $cidadaos; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
    }