<?php

namespace App\DAO;

use App\DAO;
use App\Model\Secretarios_EventosModel;

class Secretarios_EventosDAO extends DAO {
    
    public function listar() {
        try {
            $secretarios_eventos = array();
            $sql = "SELECT s.SCE_ID, s.SCE_NOME, s.SCE_CPF, s.SCE_TELEFONE, s.SCE_SEXO, s.SCE_ETNIA, 
                    s.SCE_PRONTUARIO, s.SCE_FOTO, s.SCE_RG, s.SCE_NOME_SOCIAL, s.FK_LOGIN_LGN_ID, s.FK_CAMPUS_CAM_ID, 
                    c.CAM_NOME, l.LGN_ATIVO, l.LGN_JUSTIFICATIVA_RESTRICAO, l.LGN_SENHA
                    FROM secretario_eventos s 
                    JOIN campus c ON s.FK_CAMPUS_CAM_ID = c.CAM_ID
                    JOIN login l ON s.FK_LOGIN_LGN_ID = l.LGN_ID
                    ORDER BY s.SCE_ID DESC";
    
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();
    
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $secretario_eventos = new Secretarios_EventosModel();
    
                $secretario_eventos->__set('SCE_ID', $row['SCE_ID']);
                $secretario_eventos->__set('SCE_CPF', $row['SCE_CPF']);
                $secretario_eventos->__set('SCE_TELEFONE', $row['SCE_TELEFONE']);
                $secretario_eventos->__set('SCE_SEXO', $row['SCE_SEXO']);
                $secretario_eventos->__set('SCE_ETNIA', $row['SCE_ETNIA']);
                $secretario_eventos->__set('SCE_PRONTUARIO', $row['SCE_PRONTUARIO']);
                $secretario_eventos->__set('SCE_NOME', $row['SCE_NOME']);
                $secretario_eventos->__set('SCE_FOTO', $row['SCE_FOTO']);
                $secretario_eventos->__set('SCE_RG', $row['SCE_RG']);
                $secretario_eventos->__set('SCE_NOME_SOCIAL', $row['SCE_NOME_SOCIAL']);
                $secretario_eventos->__set('FK_LOGIN_LGN_ID', $row['FK_LOGIN_LGN_ID']);
                $secretario_eventos->__set('FK_CAMPUS_CAM_ID', $row['FK_CAMPUS_CAM_ID']);
                $secretario_eventos->__set('CAM_NOME', $row['CAM_NOME']);
                $secretario_eventos->__set('LGN_ATIVO', $row['LGN_ATIVO']); 
                $secretario_eventos->__set('LGN_JUSTIFICATIVA_RESTRICAO', $row['LGN_JUSTIFICATIVA_RESTRICAO']);
                $secretario_eventos->__set('LGN_SENHA', $row['LGN_SENHA']); 
                
                array_push($secretarios_eventos, $secretario_eventos);
            }
            return $secretarios_eventos;
        } catch (\PDOException $ex) {
            header('Location:/error103');
            die();
        }
    }

    public function listarCampus() {
        try {
            $sql = "SELECT CAM_ID, CAM_NOME FROM campus";
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
            $campus = [];
            foreach ($result as $row) {
                $campusModel = new Secretarios_EventosModel();
                $campusModel->__set('CAM_ID', $row['CAM_ID']);
                $campusModel->__set('CAM_NOME', $row['CAM_NOME']);
                $campus[] = $campusModel;
            }
            return $campus;
        } catch (\PDOException $ex) {
            return [];
        }
    }

    public function inserir($obj) {
        //try {
            $SCE_NOME               = $obj->__get('SCE_NOME');
            $SCE_NOME_SOCIAL        = $obj->__get('SCE_NOME_SOCIAL');
            $SCE_CPF                = $obj->__get('SCE_CPF');
            $SCE_RG                 = $obj->__get('SCE_RG');
            $SCE_TELEFONE           = $obj->__get('SCE_TELEFONE');
            $SCE_ETNIA              = $obj->__get('SCE_ETNIA');
            $SCE_PRONTUARIO         = $obj->__get('SCE_PRONTUARIO');
            $SCE_SEXO               = $obj->__get('SCE_SEXO');
            $SCE_FOTO               = $obj->__get('SCE_FOTO');
            $SCE_DATA_NASCIMENTO    = $obj->__get('SCE_DATA_NASCIMENTO');
            $SCE_RUA                = $obj->__get('SCE_RUA');
            $SCE_BAIRRO             = $obj->__get('SCE_BAIRRO');
            $SCE_CEP                = $obj->__get('SCE_CEP');
            $SCE_COMPLEMENTO        = $obj->__get('SCE_COMPLEMENTO');

            $FK_LOGIN_LGN_ID        = $obj->__get('FK_LOGIN_LGN_ID')[0];
            $FK_CAMPUS_CAM_ID       = $obj->__get('FK_CAMPUS_CAM_ID');
            $FK_CIDADES_CID_ID  = $obj->__get('FK_CIDADES_CID_ID');
            
           /*  $LGN_EMAIL = $obj->__get('LGN_EMAIL');
            $LGN_SENHA = $obj->__get('LGN_SENHA');
            $LGN_TIPO = $obj->__get('LGN_TIPO'); */
            
            
    
            /* $sqlLogin = "INSERT INTO login (LGN_EMAIL, LGN_SENHA, LGN_ATIVO, LGN_TIPO) 
                        VALUES (:LGN_EMAIL, :LGN_SENHA, 1, :LGN_TIPO)";
            $stmtLogin = $this->getConn()->prepare($sqlLogin);
            $stmtLogin->bindParam(':LGN_EMAIL', $LGN_EMAIL);
            $stmtLogin->bindParam(':LGN_SENHA', $LGN_SENHA);
            $stmtLogin->bindParam(':LGN_TIPO', $LGN_TIPO);
            $stmtLogin->execute();
    
            $FK_LOGIN_LGN_ID = $this->getConn()->lastInsertId(); */
    
            $sql = "INSERT INTO secretario_eventos (
                SCE_NOME, 
                SCE_NOME_SOCIAL, 
                SCE_CPF, 
                SCE_RG, 
                SCE_TELEFONE, 
                SCE_ETNIA, 
                SCE_PRONTUARIO, 
                SCE_SEXO, 
                SCE_FOTO, 
                SCE_DATA_NASCIMENTO,   
                SCE_RUA, 
                SCE_BAIRRO, 
                SCE_CEP, 
                SCE_COMPLEMENTO,
                FK_LOGIN_LGN_ID, 
                FK_CAMPUS_CAM_ID,
                FK_CIDADES_CID_ID 
                )
                    VALUES (
                    :SCE_NOME, 
                    :SCE_NOME_SOCIAL, 
                    :SCE_CPF, 
                    :SCE_RG, 
                    :SCE_TELEFONE, 
                    :SCE_ETNIA, 
                    :SCE_PRONTUARIO, 
                    :SCE_SEXO, 
                    :SCE_FOTO, 
                    :SCE_DATA_NASCIMENTO,   
                    :SCE_RUA, 
                    :SCE_BAIRRO, 
                    :SCE_CEP, 
                    :SCE_COMPLEMENTO,
                    :FK_LOGIN_LGN_ID, 
                    :FK_CAMPUS_CAM_ID,
                    :FK_CIDADES_CID_ID 
                    )";
    
            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':SCE_NOME', $SCE_NOME);
            $stmt->bindParam(':SCE_NOME_SOCIAL', $SCE_NOME_SOCIAL);
            $stmt->bindParam(':SCE_CPF', $SCE_CPF);
            $stmt->bindParam(':SCE_RG', $SCE_RG);
            $stmt->bindParam(':SCE_TELEFONE', $SCE_TELEFONE);
            $stmt->bindParam(':SCE_ETNIA', $SCE_ETNIA);
            $stmt->bindParam(':SCE_PRONTUARIO', $SCE_PRONTUARIO);
            $stmt->bindParam(':SCE_SEXO', $SCE_SEXO);
            $stmt->bindParam(':SCE_FOTO', $SCE_FOTO);
            $stmt->bindParam(':SCE_DATA_NASCIMENTO', $SCE_DATA_NASCIMENTO);     
            $stmt->bindParam(':SCE_RUA', $SCE_RUA);
            $stmt->bindParam(':SCE_BAIRRO', $SCE_BAIRRO);
            $stmt->bindParam(':SCE_CEP', $SCE_CEP);
            $stmt->bindParam(':SCE_COMPLEMENTO', $SCE_COMPLEMENTO);

            $stmt->bindParam(':FK_LOGIN_LGN_ID', $FK_LOGIN_LGN_ID);
            $stmt->bindParam(':FK_CAMPUS_CAM_ID', $FK_CAMPUS_CAM_ID);
            $stmt->bindParam(':FK_CIDADES_CID_ID', $FK_CIDADES_CID_ID);
    
            $stmt->execute();

        /* } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        } */

    }

    public function buscarPorId($SCE_ID) {
        try {

            /* $sql = "SELECT 
                        s.SCE_ID, s.SCE_NOME, s.SCE_NOME_SOCIAL, s.SCE_CPF, s.SCE_RG, s.SCE_TELEFONE, 
                        s.SCE_ETNIA, s.SCE_PRONTUARIO, s.SCE_SEXO, s.SCE_FOTO, s.SCE_DATA_NASCIMENTO,
                        s.FK_CAMPUS_CAM_ID, s.SCE_RUA, s.SCE_BAIRRO, s.SCE_CEP, s.SCE_COMPLEMENTO,
                        l.LGN_EMAIL, c.CAM_NOME, s.FK_LOGIN_LGN_ID
                    FROM secretario_eventos s
                    JOIN login l ON s.FK_LOGIN_LGN_ID = l.LGN_ID
                    JOIN campus c ON s.FK_CAMPUS_CAM_ID = c.CAM_ID
                    WHERE s.SCE_ID = :id"; */

                $sql = "SELECT                      
                            SE.*,
                            CA.CAM_NOME,
                            CD.CID_NOME,
                            LG.*
                        FROM 
                            secretario_eventos SE, 
                            campus CA,
                            cidades CD,
                            login LG
                        WHERE 
                            SE.FK_CAMPUS_CAM_ID = CA.CAM_ID
                        AND
                            SE.FK_CIDADES_CID_ID = CD.CID_ID
                        AND
                            SE.FK_LOGIN_LGN_ID = LG.LGN_ID
                        AND
                            SCE_ID=:SCE_ID";
    
            /* $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
    
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
            if ($result) {
                $secretario_eventosModel = new Secretarios_EventosModel();
                foreach ($result as $key => $value) {
                    $secretario_eventosModel->__set($key, $value);
                }
                return $secretario_eventosModel;
            } else {
                return null;
            }
        } catch (\PDOException $e) {

            header('Location:/error103');
            die();
        } */

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':SCE_ID', $SCE_ID);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $secretario_eventosModel = new Secretarios_EventosModel();
                    
                    $secretario_eventosModel->__set('SCE_ID',$result['SCE_ID']);
                    $secretario_eventosModel->__set('SCE_NOME',$result['SCE_NOME']);
                    $secretario_eventosModel->__set('SCE_NOME_SOCIAL',$result['SCE_NOME_SOCIAL']);
                    $secretario_eventosModel->__set('SCE_CPF',$result['SCE_CPF']);
                    $secretario_eventosModel->__set('SCE_RG',$result['SCE_RG']);
                    $secretario_eventosModel->__set('SCE_TELEFONE',$result['SCE_TELEFONE']);
                    $secretario_eventosModel->__set('SCE_ETNIA',$result['SCE_ETNIA']);
                    $secretario_eventosModel->__set('SCE_PRONTUARIO',$result['SCE_PRONTUARIO']);
                    $secretario_eventosModel->__set('SCE_SEXO',$result['SCE_SEXO']);
                    $secretario_eventosModel->__set('SCE_FOTO',$result['SCE_FOTO']);
                    $secretario_eventosModel->__set('SCE_DATA_NASCIMENTO',$result['SCE_DATA_NASCIMENTO']);
                    $secretario_eventosModel->__set('SCE_RUA',$result['SCE_RUA']);
                    $secretario_eventosModel->__set('SCE_BAIRRO',$result['SCE_BAIRRO']);
                    $secretario_eventosModel->__set('SCE_COMPLEMENTO',$result['SCE_COMPLEMENTO']);
                    $secretario_eventosModel->__set('SCE_CEP',$result['SCE_CEP']);
                    $secretario_eventosModel->__set('FK_LOGIN_LGN_ID',$result['FK_LOGIN_LGN_ID']);
                    $secretario_eventosModel->__set('FK_CAMPUS_CAM_ID',$result['FK_CAMPUS_CAM_ID']);
                    $secretario_eventosModel->__set('FK_CIDADES_CID_ID',$result['FK_CIDADES_CID_ID']);
                    $secretario_eventosModel->__set('CID_NOME',$result['CID_NOME']);
                    $secretario_eventosModel->__set('LGN_EMAIL',$result['LGN_EMAIL']);
                    $secretario_eventosModel->__set('LGN_ATIVO',$result['LGN_ATIVO']);
                    $secretario_eventosModel->__set('LGN_JUSTIFICATIVA_RESTRICAO',$result['LGN_JUSTIFICATIVA_RESTRICAO']);
                    $secretario_eventosModel->__set('LGN_SENHA',$result['LGN_SENHA']);

                    return $secretario_eventosModel;

                } else{
                    return null;
                }
            } catch (\PDOException $e) {
                header('Location:/error103');
                die();
            }
    }    
    
    public function alterar($obj) {
        try {

            $SCE_ID = $obj->__get('SCE_ID');
            $SCE_NOME = $obj->__get('SCE_NOME');
            $SCE_NOME_SOCIAL = $obj->__get('SCE_NOME_SOCIAL');
            $SCE_CPF = $obj->__get('SCE_CPF');
            $SCE_RG = $obj->__get('SCE_RG');
            $SCE_TELEFONE = $obj->__get('SCE_TELEFONE');
            $SCE_ETNIA = $obj->__get('SCE_ETNIA');
            $SCE_PRONTUARIO = $obj->__get('SCE_PRONTUARIO');
            $SCE_SEXO = $obj->__get('SCE_SEXO');
            $SCE_FOTO = $obj->__get('SCE_FOTO');
            $SCE_DATA_NASCIMENTO = $obj->__get('SCE_DATA_NASCIMENTO');
            $FK_CAMPUS_CAM_ID = $obj->__get('FK_CAMPUS_CAM_ID');
            $SCE_RUA = $obj->__get('SCE_RUA');
            $SCE_BAIRRO = $obj->__get('SCE_BAIRRO');
            $SCE_CEP = $obj->__get('SCE_CEP');
            $SCE_COMPLEMENTO = $obj->__get('SCE_COMPLEMENTO');

            $LGN_ID = $obj->__get('LGN_ID');
            $LGN_EMAIL = $obj->__get('LGN_EMAIL');
            $LGN_SENHA = $obj->__get('LGN_SENHA');
            $LGN_TIPO = $obj->__get('LGN_TIPO');
            $FK_LOGIN_LGN_ID = $obj->__get('FK_LOGIN_LGN_ID');

            $sql = "UPDATE secretario_eventos SET 
                        SCE_NOME = :SCE_NOME,
                        SCE_NOME_SOCIAL = :SCE_NOME_SOCIAL,
                        SCE_CPF = :SCE_CPF,
                        SCE_RG = :SCE_RG,
                        SCE_TELEFONE = :SCE_TELEFONE,
                        SCE_ETNIA = :SCE_ETNIA,
                        SCE_PRONTUARIO = :SCE_PRONTUARIO,
                        SCE_SEXO = :SCE_SEXO,
                        SCE_FOTO = :SCE_FOTO,
                        SCE_DATA_NASCIMENTO = :SCE_DATA_NASCIMENTO,
                        FK_CAMPUS_CAM_ID = :FK_CAMPUS_CAM_ID,
                        SCE_RUA = :SCE_RUA,
                        SCE_BAIRRO = :SCE_BAIRRO,
                        SCE_CEP = :SCE_CEP,
                        SCE_COMPLEMENTO = :SCE_COMPLEMENTO
                    WHERE SCE_ID = :SCE_ID;";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':SCE_ID', $SCE_ID);
            $stmt->bindParam(':SCE_NOME', $SCE_NOME);
            $stmt->bindParam(':SCE_NOME_SOCIAL', $SCE_NOME_SOCIAL);
            $stmt->bindParam(':SCE_CPF', $SCE_CPF);
            $stmt->bindParam(':SCE_RG', $SCE_RG);
            $stmt->bindParam(':SCE_TELEFONE', $SCE_TELEFONE);
            $stmt->bindParam(':SCE_ETNIA', $SCE_ETNIA);
            $stmt->bindParam(':SCE_PRONTUARIO', $SCE_PRONTUARIO);
            $stmt->bindParam(':SCE_SEXO', $SCE_SEXO);
            $stmt->bindParam(':SCE_FOTO', $SCE_FOTO);
            $stmt->bindParam(':SCE_DATA_NASCIMENTO', $SCE_DATA_NASCIMENTO);
            $stmt->bindParam(':FK_CAMPUS_CAM_ID', $FK_CAMPUS_CAM_ID);
            $stmt->bindParam(':SCE_RUA', $SCE_RUA);
            $stmt->bindParam(':SCE_BAIRRO', $SCE_BAIRRO);
            $stmt->bindParam(':SCE_CEP', $SCE_CEP);
            $stmt->bindParam(':SCE_COMPLEMENTO', $SCE_COMPLEMENTO);

            $stmt->execute();
           
            $sql_login = "UPDATE login SET 
                LGN_EMAIL = :LGN_EMAIL
            WHERE LGN_ID = :FK_LOGIN_LGN_ID";

            $stmt_login = $this->getConn()->prepare($sql_login);

            $stmt_login->bindParam(':FK_LOGIN_LGN_ID', $FK_LOGIN_LGN_ID);
            $stmt_login->bindParam(':LGN_EMAIL', $LGN_EMAIL);

            $stmt_login->execute();

        } catch (\PDOException $e) {
            header('Location:/error103');
            die();
        }
    }

    
    public function restringir($obj) {
        try {

            $LGN_ID = $obj->__get('LGN_ID');
            $LGN_TIPO = $obj->__get('LGN_ATIVO');
            $LGN_JUSTIFICATIVA_RESTRICAO = $obj->__get('LGN_JUSTIFICATIVA_RESTRICAO');

            $sql = "UPDATE login SET 
                        LGN_ATIVO = :LGN_ATIVO,
                        LGN_JUSTIFICATIVA_RESTRICAO; = :LGN_JUSTIFICATIVA_RESTRICAO
                    WHERE LGN_ID = :LGN_ID;";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':LGN_ID', $LGN_ID);
            $stmt->bindParam(':LGN_ATIVO', $LGN_ATIVO);
            $stmt->bindParam(':LGN_JUSTIFICATIVA_RESTRICAO', $LGN_JUSTIFICATIVA_RESTRICAO);

            $stmt->execute();

        } catch (\PDOException $e) {
            header('Location:/error103');
            die();
        }
    }

    

        public function alterarinfosecretario($obj){
            try{
                $SCE_NOME_SOCIAL = $obj->__get('SCE_NOME_SOCIAL');
                $SCE_DATA_NASCIMENTO = $obj->__get('SCE_DATA_NASCIMENTO');
                $SCE_FOTO = $obj->__get('SCE_FOTO');
                $SCE_TELEFONE = $obj->__get('SCE_TELEFONE');
                $FK_CIDADES_CID_ID = $obj->__get('FK_CIDADES_CID_ID');
                $SCE_BAIRRO = $obj->__get('SCE_BAIRRO');
                $SCE_RUA = $obj->__get('SCE_RUA');
                $SCE_CEP = $obj->__get('SCE_CEP');
                $SCE_COMPLEMENTO = $obj->__get('SCE_COMPLEMENTO');
                $FK_LOGIN_LGN_ID = $obj->__get('FK_LOGIN_LGN_ID');
        
                
                $sql = "UPDATE secretario_eventos SET 
                
                SCE_NOME_SOCIAL = :SCE_NOME_SOCIAL,
                SCE_DATA_NASCIMENTO = :SCE_DATA_NASCIMENTO,
                SCE_FOTO = :SCE_FOTO,
                SCE_TELEFONE = :SCE_TELEFONE,
                FK_CIDADES_CID_ID = :FK_CIDADES_CID_ID,
                SCE_RUA = :SCE_RUA,
                SCE_BAIRRO = :SCE_BAIRRO,
                SCE_CEP = :SCE_CEP,
                SCE_COMPLEMENTO = :SCE_COMPLEMENTO
            WHERE FK_LOGIN_LGN_ID = :FK_LOGIN_LGN_ID";

            
                $stmt = $this->getConn()->prepare($sql);
        
                
                $stmt->bindParam(':SCE_NOME_SOCIAL', $SCE_NOME_SOCIAL);
                $stmt->bindParam(':SCE_DATA_NASCIMENTO', $SCE_DATA_NASCIMENTO);
                $stmt->bindParam(':SCE_FOTO', $SCE_FOTO);
                $stmt->bindParam(':SCE_TELEFONE', $SCE_TELEFONE);
                $stmt->bindParam(':FK_CIDADES_CID_ID', $FK_CIDADES_CID_ID);
                $stmt->bindParam(':SCE_RUA', $SCE_RUA);
                $stmt->bindParam(':SCE_BAIRRO', $SCE_BAIRRO);
                $stmt->bindParam(':SCE_CEP', $SCE_CEP);
                $stmt->bindParam(':SCE_COMPLEMENTO', $SCE_COMPLEMENTO);
                $stmt->bindParam(':FK_LOGIN_LGN_ID', $FK_LOGIN_LGN_ID);
                $stmt->execute();

            }
            catch(\PDOException $ex){
                header('Location: /error101');
                die();
            }
        }

        public function excluir($id){
            
        }

        /* Sou Burro, Fiz sem precisar -> L + RATIO
         public function excluir($id) {
            try {
                $sqlDeleteEvento = "DELETE FROM secretario_eventos WHERE SCE_ID = :SCE_ID";
                $stmtDeleteEvento = $this->getConn()->prepare($sqlDeleteEvento);
                $stmtDeleteEvento->bindParam(':SCE_ID', $id, \PDO::PARAM_INT);
                 $stmtDeleteEvento->execute();
            } catch (\PDOException $e) {
                echo 'Erro ao excluir: ' . $e->getMessage();
            }
         }
        */



        public function mudarsenhasec($obj){
            try{
                $LGN_ID = $obj->__get('LGN_ID');
                $LGN_SENHA = $obj->__get('LGN_SENHA');
        
                $hashedPassword = password_hash($LGN_SENHA, PASSWORD_DEFAULT);
        
                $sql = "UPDATE login SET LGN_SENHA=:LGN_SENHA WHERE LGN_ID=:LGN_ID";
                $stmt = $this->getConn()->prepare($sql);
        
                $stmt->bindParam(':LGN_ID', $LGN_ID);
                $stmt->bindParam(':LGN_SENHA', $hashedPassword);
        
                $stmt->execute();
            }
            catch(\PDOException $ex){
                header('Location: /error102');
                die();
            }
        }
        



        public function BuscarSecretarioEventosLogado($id) {
            try{

                
                $sql = "SELECT 
                s.*,
                l.LGN_EMAIL, 
                c.CAM_NOME,
                ci.CID_NOME,
                ci.CID_ID
                
                FROM 
                secretario_eventos s,
                login l,
                campus c,
                cidades ci
                
                WHERE
                s.FK_LOGIN_LGN_ID=l.LGN_ID AND
                s.FK_CAMPUS_CAM_ID=c.CAM_ID AND
                s.FK_CIDADES_CID_ID=ci.CID_ID AND
                s.FK_LOGIN_LGN_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $id);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $secretario_eventosModel = new Secretarios_EventosModel();
                    $secretario_eventosModel->__set('SCE_ID',$result['SCE_ID']);
                    $secretario_eventosModel->__set('SCE_DATA_NASCIMENTO',$result['SCE_DATA_NASCIMENTO']);
                    $secretario_eventosModel->__set('SCE_NOME',$result['SCE_NOME']);
                    $secretario_eventosModel->__set('SCE_NOME_SOCIAL',$result['SCE_NOME_SOCIAL']);
                    $secretario_eventosModel->__set('SCE_PRONTUARIO',$result['SCE_PRONTUARIO']);
                    $secretario_eventosModel->__set('SCE_COMPLEMENTO',$result['SCE_COMPLEMENTO']);
                    $secretario_eventosModel->__set('SCE_SEXO',$result['SCE_SEXO']);
                    $secretario_eventosModel->__set('SCE_BAIRRO',$result['SCE_BAIRRO']);
                    $secretario_eventosModel->__set('SCE_ETNIA',$result['SCE_ETNIA']);
                    $secretario_eventosModel->__set('SCE_TELEFONE',$result['SCE_TELEFONE']);
                    $secretario_eventosModel->__set('SCE_CPF',$result['SCE_CPF']);
                    $secretario_eventosModel->__set('SCE_RG',$result['SCE_RG']);
                    $secretario_eventosModel->__set('SCE_RUA',$result['SCE_RUA']);
                    $secretario_eventosModel->__set('SCE_CEP',$result['SCE_CEP']);
                    $secretario_eventosModel->__set('FK_CAMPUS_CAM_ID',$result['FK_CAMPUS_CAM_ID']);
                    $secretario_eventosModel->__set('SCE_FOTO',$result['SCE_FOTO']);
                    $secretario_eventosModel->__set('FK_LOGIN_LGN_ID',$result['FK_LOGIN_LGN_ID']);
                    $secretario_eventosModel->__set('CAM_NOME', $result['CAM_NOME']);
                    $secretario_eventosModel->__set('LGN_EMAIL', $result['LGN_EMAIL']);
                    $secretario_eventosModel->__set('CID_NOME', $result['CID_NOME']);
                    $secretario_eventosModel->__set('CID_ID', $result['CID_ID']);

                    
                    return $secretario_eventosModel;
                } else{
                    return null;
                }
                
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }
        }

        public function BuscarSecretarioEventos($id){
            try{
                $sql = "SELECT 
                o.*,
                l.LGN_EMAIL, 
                c.CAM_NOME,
                e.EVO_NOME
                
                FROM 
                secretarios_eventos s,
                login l,
                campus c,
                eventos e
                
                
                WHERE
                o.FK_LOGIN_LGN_ID=l.LGN_ID AND
                o.FK_CAMPUS_CAM_ID=c.CAM_ID AND
                e.FK_SECRETARIOS_EVENTOS_SCE_ID=s.SCE_ID AND
                o.FK_LOGIN_LGN_ID=:id";
                

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $id);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $secretario_eventosModel = new Secretarios_EventosModel();
                    $secretario_eventosModel->__set('SCE_ID',$result['SEC_ID']);
                    $secretario_eventosModel->__set('SCE_DATA_NASCIMENTO',$result['SEC_DATA_NASCIMENTO']);
                    $secretario_eventosModel->__set('SCE_NOME',$result['SEC_NOME']);
                    $secretario_eventosModel->__set('SCE_NOME_SOCIAL',$result['SEC_NOME_SOCIAL']);                  
                    $secretario_eventosModel->__set('SCE_PRONTUARIO',$result['SCE_PRONTUARIO']);
                    $secretario_eventosModel->__set('SCE_COMPLEMENTO',$result['SCE_COMPLEMENTO']);
                    $secretario_eventosModel->__set('SCE_SEXO',$result['SCE_SEXO']);
                    $secretario_eventosModel->__set('SCE_ETNIA',$result['SCE_ETNIA']);
                    $secretario_eventosModel->__set('SCE_CPF',$result['SCE_CPF']);
                    $secretario_eventosModel->__set('SCE_RG',$result['SCE_RG']);
                    $secretario_eventosModel->__set('SCE_RUA',$result['SCE_RUA']);
                    $secretario_eventosModel->__set('FK_CAMPUS_CAM_ID',$result['FK_CAMPUS_CAM_ID']);
                    $secretario_eventosModel->__set('SCE_FOTO',$result['SCE_FOTO']);
                    $secretario_eventosModel->__set('FK_LOGIN_LGN_ID',$result['FK_LOGIN_LGN_ID']);
                    //$secretario_eventosModel->__set('FK_CURSOS_CUR_ID',$result['FK_CURSOS_CUR_ID']);
                    $secretario_eventosModel->__set('CAM_NOME', $result['CAM_NOME']);
                    $secretario_eventosModel->__set('LGN_EMAIL', $result['LGN_EMAIL']);
                    $secretario_eventosModel->__set('EVO_NOME', $result['EVO_NOME']);

                    
                    return $secretario_eventosModel;
                } else{
                    return null;
                }
                
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }

        }
    
    }