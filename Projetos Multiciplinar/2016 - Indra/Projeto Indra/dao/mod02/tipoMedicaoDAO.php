<?php
require_once 'ConectarBD.php';
require '../../class/mod02/tipoMedicao.php';

class tipoMedicaoDAO extends ConectarBD {

    function Criar(){}
    function Atualizar(){}
    function Deletar(){}
    function Editar(){}


    function Listar(){

        try{

            $pdo = parent::CriarConexao();

            $sql = "select TIM_ID, TIM_NOME from tipos_medicoes";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();

            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $lista = array();

            foreach ($fetch as $linha) {
                $lista[] = new tipoMedicao($linha['TIM_ID'], $linha['TIM_NOME']);
                }

            return $lista;

        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }

    }

        function listarPorId($id){

        try{

            $pdo = parent::CriarConexao();

            $sql = "select TIM_ID, TIM_NOME from tipos_medicoes where TIM_ID like '" . $id . "'";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();

            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
                        $lista = array();
                        foreach($fetch as $linha){
                $lista[] = new tipoMedicao($linha['TIM_ID'],$linha['TIM_NOME']);
                            }

            return $lista;

        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }

    }

        function listarPorNome($nome){
            try{
                $pdo = parent::CriarConexao();
                $sql = "select TIM_ID from tipos_medicoes where TIM_NOME = :ab";

                $prepare = $pdo->prepare($sql);

                $prepare->bindValue(":ab", $nome, PDO::PARAM_STR);

                $prepare->execute();

                $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
                $tmed = $fetch[0]['TIM_ID'];
               echo $tmed;
            } catch(PDOException $ex) {
                    Erro::ErroBD($ex);
            }
        }
}
?>