<?php
require '../../class/mod02/alteracaoDeStatus.php';
require_once 'ConectarBD.php';
require_once 'ModeloDAO.php';
require_once 'Erro.php';


class alteracaoDAO extends ConectarBD implements ModeloDAO {

    public function Atualizar($entidade) {}

    public function Criar($entidade) {

      try {

      $pdo = parent::CriarConexao();
      $sql = "INSERT INTO historico_status_funcionamento_pcd (HFP_DATA_HORA_ALTERACAO, HFP_MOTIVO_MUDANCA_STATUS, HFP_STATUS_ALTERADO, PCD_ID, USU_ID) VALUES (:datahoraAlteracao, :justificativa, :statusAlterado, :pcdId, :usuId);";

      $prepare = $pdo->prepare($sql);
      $prepare->bindValue(":datahoraAlteracao", $entidade->getDataHoraAlteracao(), PDO::PARAM_STR);
      $prepare->bindValue(":justificativa", $entidade->getJustificativa(), PDO::PARAM_STR);
			$prepare->bindValue(":statusAlterado", $entidade->getStatusAlterado(), PDO::PARAM_STR);
			$prepare->bindValue(":pcdId", $entidade->getPcdId(), PDO::PARAM_STR);
			$prepare->bindValue(":usuId", $entidade->getUsuarioId(), PDO::PARAM_STR);
			$prepare->execute();

      return true;

    } catch (PDOException $ex) {
                Erro::ErroBD($ex);
            }
    	}

    public function Deletar($entidade) {}

    public function Listar() {

        try{

            $pdo = parent::CriarConexao();

            $sql = "select HFP_ID, HFP_DATA_HORA_ALTERACAO, HFP_MOTIVO_MUDANCA_STATUS, HFP_STATUS_ALTERADO, PCD_ID, USU_ID from historico_status_funcionamento_pcd";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();

            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $lista = array();

            foreach ($fetch as $linha) {
                $lista[] = new alteracaoDeStatus($linha['HFP_ID'], $linha['HFP_DATA_HORA_ALTERACAO'], $linha['HFP_MOTIVO_MUDANCA_STATUS'], $linha['HFP_STATUS_ALTERADO'], $linha['PCD_ID'], $linha['USU_ID']);
            }

            return $lista;

        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }

	}

    public function ProcurarPorID($valordoid){}

    }
