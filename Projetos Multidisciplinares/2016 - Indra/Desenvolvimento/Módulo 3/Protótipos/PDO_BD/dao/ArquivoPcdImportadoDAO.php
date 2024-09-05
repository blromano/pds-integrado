<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArquivoPcdImportadoDAO
 *
 * @author samuel
 */
class ArquivoPcdImportadoDAO {

    private static $Separador = ';';
    private static $Arquivo = 'arquivo';
    private static $Medicao = 'medicao';

    public static function InserirArquivoMedicao($dataArquivo, $url, $usuId) {
        try {
            $pdo = ConectarBD::CriarConexao();
            $dataLinhas = ArquivoPcdImportadoDAO::GerarDataLinhas($dataArquivo, $url, $usuId);

            if ($dataLinhas instanceof RetornoImportarArquivoMedicao) {
                return $dataLinhas;
            }

            $sql = "INSERT INTO ARQUIVO_PCD_IMPORTADO(API_DATA_HORA_IMPORTACAO, API_URL_ARQUIVO, PCD_ID, USU_ID) VALUES(CURRENT_TIMESTAMP, :url, :pcd, :usu)";

            $prepare = $pdo->prepare($sql);

            $prepare->bindValue(":url", $url, PDO::PARAM_STR);
            $prepare->bindValue(":pcd", $dataLinhas[ArquivoPcdImportadoDAO::$Arquivo]->getPcdId(), PDO::PARAM_INT);
            $prepare->bindValue(":usu", $usuId, PDO::PARAM_INT);

            $execute = $prepare->execute();

            if ($execute) {
                $apiId = $pdo->lastInsertId();
                ArquivoPcdImportadoDAO::GerarMedicoes($apiId, $dataLinhas);
                return new RetornoImportarArquivoMedicao('Arquivo Adicionado', 'Seu arquivo foi adicionado com sucesso à base de dados', 'sucesso');
            }
            
            return new RetornoImportarArquivoMedicao('Arquivo não Adicionado', 'Ocorreram erros ao adicionar o arquivo à base de dados', 'erro');
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    private static function GerarMedicoes($apiId, $dataLinhas) {
        foreach ($dataLinhas[ArquivoPcdImportadoDAO::$Medicao] as $medicao) {
            $medicao->setArquivoPcdImportado($apiId);
            MedicaoDAO::Criar($medicao);
        }
    }

    private static function GerarDataLinhas($dataArquivo, $url, $usuId) {
        $dataLinha = array();

        foreach ($dataArquivo as $data) {

            $linha = explode(ArquivoPcdImportadoDAO::$Separador, $data);

            if (count($linha) < 4) {
                return new RetornoImportarArquivoMedicao("Erro ao Importar Arquivo", "Arquivo não contém somente separador ‘;’", 'erro');
            }

            $dataLinha[ArquivoPcdImportadoDAO::$Medicao][] = new Medicao(0, $linha[1], $linha[3], $linha[2]);

            if (!isset($dataLinha[ArquivoPcdImportadoDAO::$Arquivo])) {
                $dataLinha[ArquivoPcdImportadoDAO::$Arquivo] = new ArquivoPcdImportado(0, NULL, $url, $linha[0], $usuId);
            }
        }

        return $dataLinha;
    }

}
