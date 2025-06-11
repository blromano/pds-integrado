<?php

namespace App\DAO;

use App\DAO;

use App\Model\DenunciasModel;

class DenunciasDAO extends DAO
{

    public function filtrarDenuncias($dataEnvio = null, $status = null) {
        try {
            $sql = "SELECT * FROM denuncias WHERE 1=1";
            
            if ($dataEnvio) {
                $sql .= " AND DNC_DATA = :dataEnvio";
            }
            
            if ($status) {
                $sql .= " AND DNC_STATUS = :status";
            }
            
            $stmt = $this->getConn()->prepare($sql);
            
            if ($dataEnvio) {
                $stmt->bindParam(':dataEnvio', $dataEnvio);
            }
            
            if ($status) {
                $stmt->bindParam(':status', $status);
            }
            
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
            $denuncias = [];
            foreach ($result as $row) {
                $denuncia = new DenunciasModel();
                $denuncia->__set('DNC_ID', $row['DNC_ID']);
                $denuncia->__set('DNC_TITULO', $row['DNC_TITULO']);
                $denuncia->__set('DNC_DESCRICAO', $row['DNC_DESCRICAO']);
                $denuncia->__set('DNC_DATA', $row['DNC_DATA']);
                $denuncia->__set('DNC_STATUS', $row['DNC_STATUS']);
                array_push($denuncias, $denuncia);
            }
    
            return $denuncias;
        } catch (\PDOException $ex) {
            echo "<p>Erro ao buscar denúncias: " . $ex->getMessage() . "</p>";
            die();
        }
    }
    

    public function listar()
    {

        try {
            $sql = "SELECT * FROM denuncias"; // Corrigido para "denuncias"
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);



            $denuncias = array();
            foreach ($result as $row) {
                $denuncia = new DenunciasModel();
                $denuncia->__set('DNC_ID', $row['DNC_ID']);
                $denuncia->__set('DNC_TITULO', $row['DNC_TITULO']);
                $denuncia->__set('DNC_DESCRICAO', $row['DNC_DESCRICAO']);
                $denuncia->__set('DNC_DATA', $row['DNC_DATA']);
                $denuncia->__set('DNC_STATUS', $row['DNC_STATUS']);
                array_push($denuncias, $denuncia);
            }

            return $denuncias;
        } catch (\PDOException $ex) {
            echo "<p>Erro ao buscar denúncias: " . $ex->getMessage() . "</p>";
            die();
        }
    }




    public function inserir($obj)
    {
        try {
            $dnc_titulo = $obj->__get('DNC_TITULO');
            $dnc_descricao = $obj->__get('DNC_DESCRICAO');
            $dnc_data = $obj->__get('DNC_DATA');
            $dnc_status = $obj->__get('DNC_STATUS');
            $fk_eventos_evo_id = $obj->__get('FK_EVENTOS_EVO_ID');
            $fk_responsaveis_equipe_res_id = $obj->__get('FK_RESPONSAVEIS_EQUIPE_RES_ID');
            
            $sql = "INSERT INTO denuncias (dnc_titulo, dnc_descricao, dnc_data, dnc_status, fk_eventos_evo_id, fk_responsaveis_equipe_res_id)
                    VALUES (:DNC_TITULO, :DNC_DESCRICAO, :DNC_DATA, :DNC_STATUS, :FK_EVENTOS_EVO_ID, :FK_RESPONSAVEIS_EQUIPE_RES_ID)";
            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':DNC_TITULO', $dnc_titulo);
            $stmt->bindParam(':DNC_DESCRICAO', $dnc_descricao);
            $stmt->bindParam(':DNC_DATA', $dnc_data);
            $stmt->bindParam(':DNC_STATUS', $dnc_status);
            $stmt->bindParam(':FK_EVENTOS_EVO_ID', $fk_eventos_evo_id);
            $stmt->bindParam(':FK_RESPONSAVEIS_EQUIPE_RES_ID', $fk_responsaveis_equipe_res_id);
            echo($sql);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location:/error103');
            die();
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM `denuncias` WHERE DNC_ID=:id";
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location:/error103');
        }
    }

    public function alterarStatus($obj) {
        try {
            $dnc_id = $obj->__get('DNC_ID');
            $dnc_status = $obj->__get('DNC_STATUS');
    
            $sql = "UPDATE denuncias SET dnc_status = :dnc_status WHERE dnc_id = :dnc_id";
            $stmt = $this->getConn()->prepare($sql);
    
            $stmt->bindParam(':dnc_id', $dnc_id);
            $stmt->bindParam(':dnc_status', $dnc_status);
    
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location:/error103');
            die();
        }
    }

    public function atualizarTituloDescricao($id, $titulo, $descricao) {
        try {
            $sql = "UPDATE denuncias SET dnc_titulo = :dnc_titulo, dnc_descricao = :dnc_descricao WHERE dnc_id = :dnc_id";
            $stmt = $this->getConn()->prepare($sql);
    
            $stmt->bindParam(':dnc_id', $id);
            $stmt->bindParam(':dnc_titulo', $titulo);
            $stmt->bindParam(':dnc_descricao', $descricao);
    
            $stmt->execute();
        } catch (\PDOException $ex) {
            echo "<p>Erro ao atualizar denúncia: " . $ex->getMessage() . "</p>";
            die();
        }
    }
    

    
    public function alterar($obj) {
        try {
            $dnc_id = $obj->__get('DNC_ID');
            $dnc_titulo = $obj->__get('DNC_TITULO');
            $dnc_descricao = $obj->__get('DNC_DESCRICAO');
    
            $sql = "UPDATE denuncias SET dnc_titulo = :dnc_titulo, dnc_descricao = :dnc_descricao WHERE dnc_id = :dnc_id";
            $stmt = $this->getConn()->prepare($sql);
    
            $stmt->bindParam(':dnc_id', $dnc_id);
            $stmt->bindParam(':dnc_titulo', $dnc_titulo);
            $stmt->bindParam(':dnc_descricao', $dnc_descricao);
    
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location:/error103');
            die();
        }
    }
    
    
    

    public function buscarPorId($dnc_id)
    {
        try {
            $sql = "SELECT * FROM denuncia WHERE dnc_id = :dnc_id";
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':dnc_id', $dnc_id);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            if ($result) {
                $denuncia = new DenunciasModel();
                $denuncia->__set('dnc_id', $result['dnc_id']);
                $denuncia->__set('dnc_titulo', $result['dnc_titulo']);
                $denuncia->__set('dnc_descricao', $result['dnc_descricao']);
                $denuncia->__set('dnc_data', $result['dnc_data']);
                $denuncia->__set('dnc_status', $result['dnc_status']);

                return $denuncia;
            } else {
                return null;
            }
        } catch (\PDOException $ex) {
            header('Location:/error103');
            die();
        }
    }
}
