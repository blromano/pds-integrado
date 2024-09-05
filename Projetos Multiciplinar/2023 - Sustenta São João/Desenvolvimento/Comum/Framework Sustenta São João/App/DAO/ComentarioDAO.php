<?php

namespace App\DAO;

use App\DAO;
use App\Model\ComentarioModel;

class ComentarioDAO extends DAO
{

    public function inserir($comentarios)
    {

        $dataHora = $comentarios->__get("COM_DATA_HORA");
        $texto = $comentarios->__get("COM_TEXTO");
        $fkDenuncias = $comentarios->__get("FK_DENUNCIAS_DEN_ID");
        $fkUsuarios = $comentarios->__get("FK_CIDADAOS_USU_ID");


        $sql = "INSERT INTO comentarios(            
                COM_DATA_HORA,
                COM_TEXTO,
                FK_DENUNCIAS_DEN_ID,
                FK_CIDADAOS_USU_ID

            ) VALUES (
                :com_COM_DATA_HORA,
                :com_COM_TEXTO,
                :com_FK_DENUNCIAS_DEN_ID,
                :com_FK_CIDADAOS_USU_ID

            )";

        $stmt = $this->getConn()->prepare($sql);

        $stmt->bindParam(':com_COM_DATA_HORA', $dataHora);
        $stmt->bindParam(':com_COM_TEXTO', $texto);
        $stmt->bindParam(':com_FK_DENUNCIAS_DEN_ID', $fkDenuncias);
        $stmt->bindParam(':com_FK_CIDADAOS_USU_ID', $fkUsuarios);

        $stmt->execute();
    }

    public function alterar($comentarios)
    {
        try {
            $sql = "UPDATE comentarios SET 
                               COM_DATA_HORA=:dataHora, 
                               COM_TEXTO=:texto
                            WHERE 
                                COM_ID=:id";


            $id = $comentarios->__get('COM_ID');
            $dataHora = $comentarios->__get('COM_DATA_HORA');
            $texto = $comentarios->__get('COM_TEXTO');

            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':id', $comentarios->__get('COM_ID'));
            $stmt->bindParam(':dataHora', $comentarios->__get('COM_DATA_HORA'));
            $stmt->bindParam(':texto', $comentarios->__get('COM_TEXTO'));

            $stmt->execute();
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM comentarios WHERE COM_ID=:id";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function buscarPorID($id)
    {
        try {
            $sql = "SELECT * FROM comentarios WHERE COM_ID=:id";
      
            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result > 0) {
                $comentarios = new ComentarioModel();
                $comentarios->__set('COM_ID', $result['COM_ID']);
                $comentarios->__set('COM_DATA_HORA', $result['COM_DATA_HORA']);
                $comentarios->__set('COM_TEXTO', $result['COM_TEXTO']);
                $comentarios->__set('FK_DENUNCIAS_DEN_ID', $result['FK_DENUNCIAS_DEN_ID']);
           //retorna todos os campos relacionados ao ID selecionado

                return $comentarios;
            } else {
                return null;
            }
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    public function listarPorIdDenuncia($id){
        // Busca todos os comentários onde o id da denúncia é igual ao id da denúncia passado como parâmetro
        try {
            $comentarios = array();
            $sql = "SELECT comentarios.*, cidadaos.USU_NOME
                    FROM comentarios 
                    INNER JOIN cidadaos ON comentarios.FK_CIDADAOS_USU_ID = cidadaos.USU_ID
                    WHERE comentarios.FK_DENUNCIAS_DEN_ID = :id
                    ORDER BY COM_ID ASC";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $comentario = new ComentarioModel();
                $comentario->__set('COM_ID', $row['COM_ID']);
                $comentario->__set('COM_DATA_HORA', $row['COM_DATA_HORA']);
                $comentario->__set('COM_TEXTO', $row['COM_TEXTO']);
                $comentario->__set('FK_DENUNCIAS_DEN_ID', $row['FK_DENUNCIAS_DEN_ID']);
                $comentario->__set('FK_CIDADAOS_USU_ID', $row['FK_CIDADAOS_USU_ID']);
                $comentario->__set('USU_NOME', $row['USU_NOME']);

                array_push($comentarios, $comentario); //Inserindo os dados persistidos da tabela em um array
            }

            return $comentarios; //retornando o array para mostagem da view
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    public function listarPorIdUsuario($id){
        // Busca todos os comentários onde o id do usuário é igual ao id do usuário passado como parâmetro
        try {
            $comentarios = array();
            $sql = "SELECT comentarios.*, cidadaos.USU_NOME
                    FROM comentarios 
                    INNER JOIN cidadaos ON comentarios.FK_CIDADAOS_USU_ID = cidadaos.USU_ID
                    WHERE comentarios.FK_CIDADAOS_USU_ID = :id
                    ORDER BY COM_ID ASC";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $comentario = new ComentarioModel();
                $comentario->__set('COM_ID', $row['COM_ID']);
                $comentario->__set('COM_DATA_HORA', $row['COM_DATA_HORA']);
                $comentario->__set('COM_TEXTO', $row['COM_TEXTO']);
                $comentario->__set('FK_DENUNCIAS_DEN_ID', $row['FK_DENUNCIAS_DEN_ID']);
                $comentario->__set('FK_CIDADAOS_USU_ID', $row['FK_CIDADAOS_USU_ID']);
                $comentario->__set('USU_NOME', $row['USU_NOME']);

                array_push($comentarios, $comentario); //Inserindo os dados persistidos da tabela em um array
            }

            return $comentarios; //retornando o array para mostagem da view
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    public function listar()
    {
        try {
            $comentarios = array();
            $sql = "SELECT comentarios.*, cidadaos.USU_NOME
                    FROM comentarios 
                    INNER JOIN cidadaos ON comentarios.FK_CIDADAOS_USU_ID = cidadaos.USU_ID
                    ORDER BY COM_ID ASC";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $comentario = new ComentarioModel();
                $comentario->__set('COM_ID', $row['COM_ID']);
                $comentario->__set('COM_DATA_HORA', $row['COM_DATA_HORA']);
                $comentario->__set('COM_TEXTO', $row['COM_TEXTO']);
                $comentario->__set('FK_DENUNCIAS_DEN_ID', $row['FK_DENUNCIAS_DEN_ID']);
                $comentario->__set('FK_CIDADAOS_USU_ID', $row['FK_CIDADAOS_USU_ID']);
                $comentario->__set('USU_NOME', $row['USU_NOME']);

                array_push($comentarios, $comentario); //Inserindo os dados persistidos da tabela em um array
            }

            return $comentarios; //retornando o array para mostagem da view
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }
}