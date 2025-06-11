<?php

namespace App\DAO;

use App\DAO;
use App\Model\Responsaveis_EquipeModel;
use App\Model\LoginModel;
use App\Model\CampusModel;
use App\Model\EventosModesl;

class Responsaveis_EquipeDAO extends DAO {

    public function listar() {
        try {
            $responsaveis = array();
            $sql = "SELECT 
                        r.*,
                        c.CAM_NOME,
                        l.LGN_EMAIL
                    FROM
                        responsaveis_equipe r,
                        campus c, 
                        login l
                    WHERE
                        r.FK_CAMPUS_CAM_ID = c.CAM_ID
                    AND
                        r.FK_LOGIN_LGN_ID = l.LGN_ID";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
            foreach ($result as $row) {
                $responsavelModel = new Responsaveis_EquipeModel();
                $responsavelModel->__set('RES_ID', $row['RES_ID']);
                $responsavelModel->__set('RES_NOME', $row['RES_NOME']);
                $responsavelModel->__set('RES_PRONTUARIO', $row['RES_PRONTUARIO']);
                $responsavelModel->__set('RES_CPF', $row['RES_CPF']);
                $responsavelModel->__set('FK_LOGIN_LGN_ID', $row['FK_LOGIN_LGN_ID']);
                $responsavelModel->__set('LGN_EMAIL', $row['LGN_EMAIL']);
                $responsavelModel->__set('CAM_NOME', $row['CAM_NOME']);
                $responsavelModel->__set('FK_CAMPUS_CAM_ID', $row['FK_CAMPUS_CAM_ID']);

                array_push($responsaveis, $responsavelModel);
            }
            return $responsaveis;
        } catch (\PDOException $ex) {
            header('Location:/error103');
            die();
        }
    }
    
    public function inserir($obj) {

        try{
        
        //print_r($obj);
        //exit();

        $RES_NOME = $obj->__get('RES_NOME');
        $RES_NOME_SOCIAL = $obj->__get('RES_NOME_SOCIAL');
        $RES_DATA_NASCIMENTO = $obj->__get('RES_DATA_NASCIMENTO');
        $RES_SEXO = $obj->__get('RES_SEXO');
        $RES_ETNIA = $obj->__get('RES_ETNIA');
        $RES_CPF = $obj->__get('RES_CPF');
        $RES_RG = $obj->__get('RES_RG');
        $RES_FOTO = $obj->__get('RES_FOTO');
        $RES_TELEFONE = $obj->__get('RES_TELEFONE');
        $RES_RUA = $obj->__get('RES_RUA');
        $RES_BAIRRO = $obj->__get('RES_BAIRRO');
        $RES_CEP = $obj->__get('RES_CEP');
        $RES_COMPLEMENTO = $obj->__get('RES_COMPLEMENTO');
        $RES_PRONTUARIO = $obj->__get('RES_PRONTUARIO');
        $FK_LOGIN_LGN_ID = $obj->__get('FK_LOGIN_LGN_ID')[0];
        $FK_CAMPUS_CAM_ID = $obj->__get('FK_CAMPUS_CAM_ID');
        $FK_CIDADES_CID_ID = $obj->__get('FK_CIDADES_CID_ID');

        $sql = "INSERT INTO responsaveis_equipe (
            RES_NOME,
            RES_NOME_SOCIAL,
            RES_DATA_NASCIMENTO,
            RES_SEXO,
            RES_ETNIA,
            RES_CPF,
            RES_RG,
            RES_FOTO,
            RES_TELEFONE,
            RES_RUA,
            RES_BAIRRO,
            RES_CEP,
            RES_COMPLEMENTO,
            RES_PRONTUARIO,
            FK_LOGIN_LGN_ID,
            FK_CAMPUS_CAM_ID,
            FK_CIDADES_CID_ID
        ) VALUES (
            :RES_NOME,
            :RES_NOME_SOCIAL,
            :RES_DATA_NASCIMENTO,
            :RES_SEXO,
            :RES_ETNIA,
            :RES_CPF,
            :RES_RG,
            :RES_FOTO,
            :RES_TELEFONE,
            :RES_RUA,
            :RES_BAIRRO,
            :RES_CEP,
            :RES_COMPLEMENTO,
            :RES_PRONTUARIO,
            :FK_LOGIN_LGN_ID,
            :FK_CAMPUS_CAM_ID,
            :FK_CIDADES_CID_ID)";
            
        $stmt = $this->getConn()->prepare($sql);
                    
        $stmt->bindParam(':RES_NOME', $RES_NOME);
        $stmt->bindParam(':RES_NOME_SOCIAL', $RES_NOME_SOCIAL);
        $stmt->bindParam(':RES_DATA_NASCIMENTO', $RES_DATA_NASCIMENTO);
        $stmt->bindParam(':RES_SEXO', $RES_SEXO);
        $stmt->bindParam(':RES_ETNIA', $RES_ETNIA);
        $stmt->bindParam(':RES_CPF', $RES_CPF);
        $stmt->bindParam(':RES_RG', $RES_RG);
        $stmt->bindParam(':RES_FOTO', $RES_FOTO);
        $stmt->bindParam(':RES_TELEFONE', $RES_TELEFONE);
        
        $stmt->bindParam(':RES_RUA', $RES_RUA);
        $stmt->bindParam(':RES_BAIRRO', $RES_BAIRRO);
        $stmt->bindParam(':RES_CEP', $RES_CEP);
        $stmt->bindParam(':RES_COMPLEMENTO', $RES_COMPLEMENTO);
        $stmt->bindParam(':RES_PRONTUARIO', $RES_PRONTUARIO);
        //$stmt->bindParam(':FK_CURSOS_CUR_ID', $FK_CURSOS_CUR_ID);
        $stmt->bindParam(':FK_LOGIN_LGN_ID', $FK_LOGIN_LGN_ID);
        $stmt->bindParam(':FK_CAMPUS_CAM_ID', $FK_CAMPUS_CAM_ID);
        $stmt->bindParam(':FK_CIDADES_CID_ID', $FK_CIDADES_CID_ID);

        $stmt->execute();  
    }
    catch(\PDOException $ex) {
        if ($RES_NOME == NULL) {
            header('Location:/cadastrar/responsavel?erro=1');
            die();
        }
    }
    }

    public function excluir($RES_ID) {
        try {
            $sql = "DELETE FROM responsaveis_equipe where RES_ID=:RES_ID";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":RES_ID", $RES_ID);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error102');
            die();
        }
    }

    public function alterar($obj) {
        try{
            $RES_ID = $obj->__get('RES_ID');
            $RES_NOME = $obj->__get('RES_NOME');
            $RES_NOME_SOCIAL = $obj->__get('RES_NOME_SOCIAL');
            $RES_CPF = $obj->__get('RES_CPF');
            $RES_RG = $obj->__get('RES_RG');
            $RES_DATA_NASCIMENTO = $obj->__get('RES_DATA_NASCIMENTO');
            $RES_TELEFONE = $obj->__get('RES_TELEFONE');
            $RES_SEXO = $obj->__get('RES_SEXO');
            $RES_ETNIA = $obj->__get('RES_ETNIA');
            $RES_FOTO = $obj->__get('RES_FOTO');
            $RES_COMPLEMENTO = $obj->__get('RES_COMPLEMENTO');
            $RES_CEP = $obj->__get('RES_CEP');
            $RES_RUA = $obj->__get('RES_RUA');
            $RES_BAIRRO = $obj->__get('RES_BAIRRO');
            $RES_PRONTUARIO = $obj->__get('RES_PRONTUARIO');
            $FK_LOGIN_LGN_ID = $obj->__get('FK_LOGIN_LGN_ID');
            $FK_CAMPUS_CAM_ID = $obj->__get('FK_CAMPUS_CAM_ID');
            $FK_CIDADES_CID_ID = $obj->__get('FK_CIDADES_CID_ID');

            $sql = "UPDATE RESPONSAVEIS_EQUIPE SET 
                RES_NOME=:RES_NOME, 
                RES_NOME_SOCIAL=:RES_NOME_SOCIAL,
                RES_CPF=:RES_CPF,
                RES_RG=:RES_RG,
                RES_DATA_NASCIMENTO=:RES_DATA_NASCIMENTO,
                RES_TELEFONE=:RES_TELEFONE,
                RES_SEXO=:RES_SEXO,
                RES_ETNIA=:RES_ETNIA,
                RES_FOTO=:RES_FOTO,
                RES_COMPLEMENTO=:RES_COMPLEMENTO,
                RES_CEP=:RES_CEP,
                RES_RUA=:RES_RUA,
                RES_BAIRRO=:RES_BAIRRO,
                RES_PRONTUARIO=:RES_PRONTUARIO,
                FK_LOGIN_LGN_ID=:FK_LOGIN_LGN_ID,
                FK_CAMPUS_CAM_ID=:FK_CAMPUS_CAM_ID,
                FK_CIDADES_CID_ID = :FK_CIDADES_CID_ID

                WHERE
                RES_ID=:RES_ID";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':RES_ID', $RES_ID);
                $stmt->bindParam(':RES_NOME', $RES_NOME);
                $stmt->bindParam(':RES_NOME_SOCIAL', $RES_NOME_SOCIAL);
                $stmt->bindParam(':RES_CPF', $RES_CPF);
                $stmt->bindParam(':RES_RG', $RES_RG);
                $stmt->bindParam(':RES_DATA_NASCIMENTO', $RES_DATA_NASCIMENTO);
                $stmt->bindParam(':RES_TELEFONE', $RES_TELEFONE);
                $stmt->bindParam(':RES_SEXO', $RES_SEXO);
                $stmt->bindParam(':RES_ETNIA', $RES_ETNIA);
                $stmt->bindParam(':RES_FOTO', $RES_FOTO);
                $stmt->bindParam(':RES_COMPLEMENTO', $RES_COMPLEMENTO);
                $stmt->bindParam(':RES_CEP', $RES_CEP);
                $stmt->bindParam(':RES_RUA', $RES_RUA);
                $stmt->bindParam(':RES_BAIRRO', $RES_BAIRRO);
                $stmt->bindParam(':RES_PRONTUARIO', $RES_PRONTUARIO);
                $stmt->bindParam(':FK_LOGIN_LGN_ID', $FK_LOGIN_LGN_ID);
                $stmt->bindParam(':FK_CAMPUS_CAM_ID', $FK_CAMPUS_CAM_ID);
                $stmt->bindParam(':FK_CIDADES_CID_ID', $FK_CIDADES_CID_ID);
    
                $stmt->execute();
            }  
            catch(\PDOException $ex){
                header('Location: /error101');
                die();
            }
    }

    public function editar ($id) {
      
    }

    public function buscarPorId($RES_ID) {
        try{
                
            $sql = "SELECT re.*, ev.EVO_ID FROM responsaveis_equipe re, eventos ev WHERE re.RES_ID=:RES_ID AND re.FK_CAMPUS_CAM_ID=ev.FK_CAMPUS_CAM_ID";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':RES_ID', $RES_ID);

            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            if($result > 0) {
                $responsavelModel = new Responsaveis_EquipeModel();
                
                $responsavelModel->__set('RES_ID',$result['RES_ID']);
                $responsavelModel->__set('RES_NOME',$result['RES_NOME']);
                $responsavelModel->__set('RES_NOME_SOCIAL',$result['RES_NOME_SOCIAL']);
                $responsavelModel->__set('RES_CPF',$result['RES_CPF']);
                $responsavelModel->__set('RES_RG',$result['RES_RG']);
                $responsavelModel->__set('RES_DATA_NASCIMENTO',$result['RES_DATA_NASCIMENTO']);
                $responsavelModel->__set('RES_TELEFONE',$result['RES_TELEFONE']);

                $responsavelModel->__set('RES_SEXO',$result['RES_SEXO']);
                $responsavelModel->__set('RES_ETNIA',$result['RES_ETNIA']);
                $responsavelModel->__set('RES_FOTO',$result['RES_FOTO']);
                $responsavelModel->__set('RES_COMPLEMENTO',$result['RES_COMPLEMENTO']);
                $responsavelModel->__set('RES_CEP',$result['RES_CEP']);
                $responsavelModel->__set('RES_RUA',$result['RES_RUA']);
                $responsavelModel->__set('RES_BAIRRO',$result['RES_BAIRRO']);
                $responsavelModel->__set('RES_PRONTUARIO',$result['RES_PRONTUARIO']);
                $responsavelModel->__set('FK_LOGIN_LGN_ID',$result['FK_LOGIN_LGN_ID']);
                $responsavelModel->__set('FK_CAMPUS_CAM_ID',$result['FK_CAMPUS_CAM_ID']);
                $responsavelModel->__set('EVO_ID',$result['EVO_ID']);

                return $responsavelModel;
            } else{
                return null;
            }
        
        } catch(\PDOException $ex){
            header('Location:/error103');
            die();
        } 
    }

    public function buscarPorIdAlterar($RES_ID) {
        try{
                
            $sql = "SELECT 
                        re.*, 
                        c.CAM_ID,
                        l.LGN_EMAIL
                    FROM 
                        responsaveis_equipe re,
                        campus c,
                        login l
                    WHERE 
                    
                        re.FK_LOGIN_LGN_ID = l.LGN_ID AND
                        re.FK_CAMPUS_CAM_ID=c.CAM_ID AND
                        re.RES_ID=:RES_ID";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':RES_ID', $RES_ID);

            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            if($result > 0) {
                $responsavelModel = new Responsaveis_EquipeModel();
                
                $responsavelModel->__set('RES_ID',$result['RES_ID']);
                $responsavelModel->__set('RES_NOME',$result['RES_NOME']);
                $responsavelModel->__set('RES_NOME_SOCIAL',$result['RES_NOME_SOCIAL']);
                $responsavelModel->__set('RES_CPF',$result['RES_CPF']);
                $responsavelModel->__set('RES_RG',$result['RES_RG']);
                $responsavelModel->__set('RES_DATA_NASCIMENTO',$result['RES_DATA_NASCIMENTO']);
                $responsavelModel->__set('RES_TELEFONE',$result['RES_TELEFONE']);
                $responsavelModel->__set('RES_SEXO',$result['RES_SEXO']);
                $responsavelModel->__set('RES_ETNIA',$result['RES_ETNIA']);
                $responsavelModel->__set('RES_FOTO',$result['RES_FOTO']);
                $responsavelModel->__set('RES_COMPLEMENTO',$result['RES_COMPLEMENTO']);
                $responsavelModel->__set('RES_CEP',$result['RES_CEP']);
                $responsavelModel->__set('RES_RUA',$result['RES_RUA']);
                $responsavelModel->__set('RES_BAIRRO',$result['RES_BAIRRO']);
                $responsavelModel->__set('RES_PRONTUARIO',$result['RES_PRONTUARIO']);
                $responsavelModel->__set('FK_LOGIN_LGN_ID',$result['FK_LOGIN_LGN_ID']);
                $responsavelModel->__set('FK_CAMPUS_CAM_ID',$result['FK_CAMPUS_CAM_ID']);
                //$responsavelModel->__set('EVO_ID',$result['EVO_ID']);
                $responsavelModel->__set('LGN_EMAIL',$result['LGN_EMAIL']);

                return $responsavelModel;

            } else{
                return null;
            }
        
        } catch(\PDOException $ex){
            header('Location:/error103');
            die();
        } 
    }

    public function buscarResponsaveisListados($valor) {
        try {
            $responsaveis = array();
            $valor_digitado = $_POST['valor']; 
            $valor_like = '%' . $valor_digitado . '%';

            $sql = "SELECT r.RES_NOME,
                           r.RES_PRONTUARIO,
                           r.RES_CPF,
                           c.CAM_NOME,
                           l.LGN_EMAIL
                    FROM RESPONSAVEIS_EQUIPE r
                    INNER JOIN login on r.FK_LOGIN_LGN_ID = l.LGN_ID
                    INNER JOIN campus on r.FK_CAMPUS_CAM_ID = c.CAM_ID
                    WHERE 
                        RES_NOME LIKE :valor OR 
                        RES_PRONTUARIO LIKE :valor OR 
                        RES_CPF LIKE :valor OR 
                        CAM_NOME LIKE :valor OR 
                        LGN_EMAIL LIKE :valor;";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':valor', $valor_like);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $responsavelModel = new Responsaveis_EquipeModel();
                $responsavelModel->__set('RES_ID', $row['RES_ID']);
                $responsavelModel->__set('RES_NOME', $row['RES_NOME']);
                $responsavelModel->__set('RES_CPF', $row['RES_CPF']);
                $responsavelModel->__set('RES_PRONTUARIO', $row['RES_PRONTUARIO']);
                $responsavelModel->__set('FK_LOGIN_LGN_ID', $row['FK_LOGIN_LGN_ID']);
                $responsavelModel->__set('FK_CAMPUS_CAM_ID', $row['FK_CAMPUS_CAM_ID']);
                
                array_push($responsaveis, $responsavelModel);
            } 
            return !empty($responsaveis) ? $responsaveis : null;
        } catch(\PDOException $ex) {
            header('Location:/error103');
            die();
        }
    }

    public function buscarResponsavelEquipe($id) {
        try {
            $sql = "SELECT 
                        DISTINCT RE.*,
                        C.CAM_NOME AS CAM_NOME,
                        E.EVO_NOME AS EVO_NOME,
                        EM.FK_EVENTOS_EVO_ID AS FK_EVENTOS_EVO_ID
            
                    FROM 
                        responsaveis_equipe RE, 
                        campus C, 
                        responsavel_evento_modalidade REM,
                        eventos_modalidades EM, 
                        eventos E

                    WHERE 
                        RE.FK_LOGIN_LGN_ID = :id AND
                        RE.FK_CAMPUS_CAM_ID = C.CAM_ID AND 
                        REM.FK_RESPONSAVEIS_EQUIPE_RES_ID = RE.RES_ID AND
                        EM.FK_EVENTOS_EVO_ID = REM.FK_EVENTOS_MODALIDADES_EVM_ID AND
                        E.EVO_ID = EM.FK_EVENTOS_EVO_ID AND
                        E.EVO_STATUS = 'EM ANDAMENTO'";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                if (count($result) > 0) {
                    $responsavel_EquipeModel = new Responsaveis_EquipeModel();
                    $responsavel_EquipeModel->__set('RES_ID', $row['RES_ID']);
                    $responsavel_EquipeModel->__set('RES_NOME', $row['RES_NOME']);
                    $responsavel_EquipeModel->__set('RES_CPF', $row['RES_CPF']);
                    $responsavel_EquipeModel->__set('RES_DATA_NASCIMENTO', $row['RES_DATA_NASCIMENTO']);
                    $responsavel_EquipeModel->__set('RES_TELEFONE', $row['RES_TELEFONE']);
                    $responsavel_EquipeModel->__set('RES_PRONTUARIO', $row['RES_PRONTUARIO']);
                    $responsavel_EquipeModel->__set('FK_LOGIN_LGN_ID', $row['FK_LOGIN_LGN_ID']);
                    $responsavel_EquipeModel->__set('FK_CAMPUS_CAM_ID', $row['FK_CAMPUS_CAM_ID']);
                    $responsavel_EquipeModel->__set('FK_EVENTOS_EVO_ID', $row['FK_EVENTOS_EVO_ID']);
                    $responsavel_EquipeModel->__set('CAM_NOME', $row['CAM_NOME']);
                    $responsavel_EquipeModel->__set('EVO_NOME', $row['EVO_NOME']);
                    $responsavel_EquipeModel->__set('RES_FOTO', $row['RES_FOTO']); 
                    
                    // Implementar os campos restantes conforme necessário
                    return $responsavel_EquipeModel;
                } else {
                    return null;
                }
            }
        } catch(\PDOException $ex) {
            header('Location:/error103');
            die();
        }
    }

    public function alterarinforesponsavel($obj){

        try {
           
            $RES_NOME_SOCIAL = $obj->__get('RES_NOME_SOCIAL');
            $RES_DATA_NASCIMENTO = $obj->__get('RES_DATA_NASCIMENTO');
            $RES_FOTO = $obj->__get('RES_FOTO');
            $RES_TELEFONE = $obj->__get('RES_TELEFONE');
            $FK_CIDADES_CID_ID = $obj->__get('FK_CIDADES_CID_ID');
            $RES_BAIRRO = $obj->__get('RES_BAIRRO');
            $RES_RUA = $obj->__get('RES_RUA');
            $RES_CEP = $obj->__get('RES_CEP');
            $RES_COMPLEMENTO = $obj->__get('RES_COMPLEMENTO');
            $FK_LOGIN_LGN_ID = $obj->__get('FK_LOGIN_LGN_ID');
    
            
            $sql = "UPDATE responsaveis_equipe SET 
            
            RES_NOME_SOCIAL = :RES_NOME_SOCIAL,
            RES_DATA_NASCIMENTO = :RES_DATA_NASCIMENTO,
            RES_FOTO = :RES_FOTO,
            RES_TELEFONE = :RES_TELEFONE,
            FK_CIDADES_CID_ID = :FK_CIDADES_CID_ID,
            RES_RUA = :RES_RUA,
            RES_BAIRRO = :RES_BAIRRO,
            RES_CEP = :RES_CEP,
            RES_COMPLEMENTO = :RES_COMPLEMENTO
        WHERE FK_LOGIN_LGN_ID = :FK_LOGIN_LGN_ID";

        
            $stmt = $this->getConn()->prepare($sql);
    
            
            $stmt->bindParam(':RES_NOME_SOCIAL', $RES_NOME_SOCIAL);
            $stmt->bindParam(':RES_DATA_NASCIMENTO', $RES_DATA_NASCIMENTO);
            $stmt->bindParam(':RES_FOTO', $RES_FOTO);
            $stmt->bindParam(':RES_TELEFONE', $RES_TELEFONE);
            $stmt->bindParam(':FK_CIDADES_CID_ID', $FK_CIDADES_CID_ID);
            $stmt->bindParam(':RES_RUA', $RES_RUA);
            $stmt->bindParam(':RES_BAIRRO', $RES_BAIRRO);
            $stmt->bindParam(':RES_CEP', $RES_CEP);
            $stmt->bindParam(':RES_COMPLEMENTO', $RES_COMPLEMENTO);
            $stmt->bindParam(':FK_LOGIN_LGN_ID', $FK_LOGIN_LGN_ID);
            $stmt->execute();
    
        } catch (\PDOException $ex) {
             echo "Erro ao executar a atualização: " . $ex->getMessage();
            die();
        }
    }

    public function BuscarResponsavelEquipeLogado($id){
        try{

            
            $sql = "SELECT 
            r.*,
            l.LGN_EMAIL, 
            c.CAM_NOME,
            ci.CID_NOME
            
            
            FROM 
            responsaveis_equipe r,
            login l,
            campus c,
            cidades ci
            
            WHERE
            r.FK_LOGIN_LGN_ID=l.LGN_ID AND
            r.FK_CAMPUS_CAM_ID=c.CAM_ID AND
            ci.CID_ID=r.FK_CIDADES_CID_ID AND
            r.FK_LOGIN_LGN_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            if($result > 0) {
                $responsavel_EquipeModel = new Responsaveis_EquipeModel();
                $responsavel_EquipeModel->__set('RES_ID',$result['RES_ID']);
                $responsavel_EquipeModel->__set('RES_DATA_NASCIMENTO',$result['RES_DATA_NASCIMENTO']);
                $responsavel_EquipeModel->__set('RES_NOME',$result['RES_NOME']);
                $responsavel_EquipeModel->__set('RES_NOME_SOCIAL',$result['RES_NOME_SOCIAL']);
                $responsavel_EquipeModel->__set('RES_PRONTUARIO',$result['RES_PRONTUARIO']);
                $responsavel_EquipeModel->__set('RES_COMPLEMENTO',$result['RES_COMPLEMENTO']);
                $responsavel_EquipeModel->__set('RES_SEXO',$result['RES_SEXO']);
                $responsavel_EquipeModel->__set('RES_BAIRRO',$result['RES_BAIRRO']);
                $responsavel_EquipeModel->__set('RES_ETNIA',$result['RES_ETNIA']);
                $responsavel_EquipeModel->__set('RES_TELEFONE',$result['RES_TELEFONE']);
                $responsavel_EquipeModel->__set('RES_CPF',$result['RES_CPF']);
                $responsavel_EquipeModel->__set('RES_RG',$result['RES_RG']);
                $responsavel_EquipeModel->__set('RES_RUA',$result['RES_RUA']);
                $responsavel_EquipeModel->__set('RES_CEP',$result['RES_CEP']);
                $responsavel_EquipeModel->__set('FK_CAMPUS_CAM_ID',$result['FK_CAMPUS_CAM_ID']);
                $responsavel_EquipeModel->__set('RES_FOTO',$result['RES_FOTO']);
                $responsavel_EquipeModel->__set('FK_LOGIN_LGN_ID',$result['FK_LOGIN_LGN_ID']);
                $responsavel_EquipeModel->__set('CAM_NOME', $result['CAM_NOME']);
                $responsavel_EquipeModel->__set('LGN_EMAIL', $result['LGN_EMAIL']);
                $responsavel_EquipeModel->__set('CID_NOME', $result['CID_NOME']);

                
                return $responsavel_EquipeModel;
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
