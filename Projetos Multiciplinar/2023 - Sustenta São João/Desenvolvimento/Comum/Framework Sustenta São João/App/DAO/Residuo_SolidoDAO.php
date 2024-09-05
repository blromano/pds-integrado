<?php

namespace App\DAO;

use App\DAO;
use App\Model\Residuo_SolidoModel;

class Residuo_SolidoDAO extends DAO
{

    public function inserir($residuo_solido)
    {

        $nome = $residuo_solido->__get("RES_NOME_RESIDUO");
        $tipo = $residuo_solido->__get("RES_DESCRICAO");
        $sql = "INSERT INTO residuos_solidos (RES_NOME_RESIDUO, RES_DESCRICAO) VALUES (:res_RES_NOME_RESIDUO, :res_RES_DESCRICAO)";

        $stmt = $this->getConn()->prepare($sql);

        $stmt->bindParam(':res_RES_NOME_RESIDUO', $nome);
        $stmt->bindParam(':res_RES_DESCRICAO', $tipo);

        $stmt->execute();
    }

    public function alterar($residuo_solido)
    {
        try {
            $sql = "UPDATE residuos_solidos SET RES_NOME_RESIDUO=:nome, RES_DESCRICAO=:descricao WHERE RES_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':id', $residuo_solido->__get('RES_ID'));
            $stmt->bindParam(':nome', $residuo_solido->__get('RES_NOME_RESIDUO'));
            $stmt->bindParam(':descricao', $residuo_solido->__get('RES_DESCRICAO'));

            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error101');
            die();
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "delete from residuos_solidos where RES_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error102');
            die();
        }
    }

    public function buscarPorID($id)
    {
        try {
            $sql = "SELECT * FROM residuos_solidos WHERE RES_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result > 0) {
                $residuo_solido = new Residuo_SolidoModel();
                $residuo_solido->__set('RES_ID', $result['RES_ID']);
                $residuo_solido->__set('RES_NOME_RESIDUO', $result['RES_NOME_RESIDUO']);
                $residuo_solido->__set('RES_DESCRICAO', $result['RES_DESCRICAO']); //retorna todos os campos relacionados ao ID selecionado

                return $residuo_solido;
            } else {
                return null;
            }
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    public function listar()
    {
        try {
            $residuos_solidos = array();
            $sql = "SELECT * FROM residuos_solidos ORDER BY RES_ID ASC";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $residuo_solido = new Residuo_SolidoModel();
                $residuo_solido->__set('RES_ID', $row['RES_ID']);
                $residuo_solido->__set('RES_NOME_RESIDUO', $row['RES_NOME_RESIDUO']);
                $residuo_solido->__set('RES_DESCRICAO', $row['RES_DESCRICAO']);

                array_push($residuos_solidos, $residuo_solido); //Inserindo os dados persistidos da tabela em um array
            }

            return $residuos_solidos; //retornando o array para mostagem da view
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }
}
