<?php
require '../../class/mod02/unidadeMedida.php';

class unidadeMedidaDAO extends ConectarBD{

    function Criar(){}
    function Atualizar(){}
    function Deletar(){}
    function Editar(){}


    function Listar(){

        try{

            $pdo = parent::CriarConexao();

            $sql = "select umed_id, unidademedida, umed_descricao from unidade_medida";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();

            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $lista = array();

            foreach ($fetch as $linha) {
                $lista[] = new unidadeMedida($linha['umed_id'], $linha['unidademedida'],$linha['umed_descricao']);
                }

            return $lista;

        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }

    }

        function listarDescricaoPorUmed($umed){

        try{

            $pdo = parent::CriarConexao();

            $sql = "select umed_descricao from unidade_medida where unidademedida like '" . $umed . "'";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();

            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $lista = array();

            foreach ($fetch as $linha) {
                $lista[] = new unidadeMedida(null, null,$linha['umed_descricao']);
                }

            return $lista;

        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }

    }
}
?>