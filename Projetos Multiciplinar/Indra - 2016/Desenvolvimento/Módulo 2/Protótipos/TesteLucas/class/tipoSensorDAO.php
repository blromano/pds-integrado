<?php
require_once 'ConectarBD.php';
require 'ModeloDAO.php';
require 'Erro.php';
require 'tipoSensor.php';

class tipoSensorDao extends ConectarBD implements ModeloDAO{

	function Criar($entidade){
        try {

		$pdo = parent::CriarConexao();
		$sql = "INSERT INTO tipos_sensores (TSE_UNIDADE_MEDIDA, TSE_TIPO_SENSOR, TIM_ID, TSE_DESCRICAO) VALUES (:unidade_medida, :tipo_sensor, :tim_id, :descricao);";

			$prepare = $pdo->prepare($sql);

			$prepare->bindValue(":unidade_medida", $entidade->getUnidade_medida(), PDO::PARAM_STR);
      $prepare->bindValue(":tipo_sensor", $entidade->getTipo_sensor(), PDO::PARAM_STR);
			$prepare->bindValue(":tim_id", $entidade->getTimid(), PDO::PARAM_STR);
			$prepare->bindValue(":descricao", $entidade->getDescricao(), PDO::PARAM_STR);
			$prepare->execute();

            return $entidade;

	} catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
	}

    function Atualizar($entidade){
			try {
				$pdo = parent::CriarConexao();
				$sql = "UPDATE tipos_sensores SET TSE_UNIDADE_MEDIDA = :unidade_medida, TSE_TIPO_SENSOR = :tipo_sensor, TIM_ID = :tim_id, TSE_DESCRICAO = :descricao WHERE TSE_ID= :id;";
				$prepare = $pdo->prepare($sql);
				$prepare->bindValue(":unidade_medida", $entidade->getUnidade_medida(), PDO::PARAM_STR);
	      $prepare->bindValue(":tipo_sensor", $entidade->getTipo_sensor(), PDO::PARAM_STR);
				$prepare->bindValue(":tim_id", $entidade->getTimid(), PDO::PARAM_STR);
				$prepare->bindValue(":descricao", $entidade->getDescricao(), PDO::PARAM_STR);
				$prepare->bindValue(":id", $entidade->getId(), PDO::PARAM_STR);
				$prepare->execute();
				return "sucesso";
			} catch (PDOException $ex) {
		            Erro::ErroBD($ex);
								return "erro";
		        }

			}

    function Deletar($id){
			try {
				$pdo = parent::CriarConexao();
				$sql = "DELETE FROM tipos_sensores WHERE TSE_ID = :id";
				$prepare = $pdo->prepare($sql);
			 	$prepare->bindValue(":id", $id, PDO::PARAM_STR);
				$prepare->execute();
				return '1';
			} catch (PDOException $ex) {
          Erro::ErroBD($ex);
					return '0';
      }
		}


    function ProcurarPorID($id){
      try{
        $pdo = parent::CriarConexao();
        $sql = "select TSE_ID, TSE_UNIDADE_MEDIDA, TSE_TIPO_SENSOR, TIM_ID, TSE_DESCRICAO from TIPOS_SENSORES where TSE_ID = :id";
        $prepare = $pdo->prepare($sql);
        $prepare->bindValue(":id", $id, PDO::PARAM_STR);
  			$prepare->execute();
        $dados = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $tsensor = new tipoSensor($dados['TSE_ID'], $dados['TSE_UNIDADE_MEDIDA'], $dados['TSE_TIPO_SENSOR'], $dados['TIM_ID'], $dados['TSE_DESCRICAO']);
        return $tsensor;

      } catch (PDOException $ex) {
          Erro::ErroBD($ex);
      }
    }

	function Listar(){}


    public function Listagem_Tipo_Sensor(){

        try{

            $pdo = parent::CriarConexao();

            $sql = "select TSE_ID, TSE_UNIDADE_MEDIDA, TSE_TIPO_SENSOR, TIM_ID, TSE_DESCRICAO from TIPOS_SENSORES";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();

            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $lista = array();

            foreach ($fetch as $linha) {
                $lista[] = new tipoSensor($linha['TSE_ID'], $linha['TSE_UNIDADE_MEDIDA'], $linha['TSE_TIPO_SENSOR'], $linha['TIM_ID'], $linha['TSE_DESCRICAO']);
            }

            return $lista;

        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }

	}

	public function Listagem_Unidades_medida(){

        try{

            $pdo = parent::CriarConexao();

            $sql = "select unidademedida from unidade_medida";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();

            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $lista = array();

            foreach ($fetch as $linha) {
				$string = $linha['unidademedida'];
                $lista[] = $string;
				}

            return $lista;

        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }

	}

}
?>
