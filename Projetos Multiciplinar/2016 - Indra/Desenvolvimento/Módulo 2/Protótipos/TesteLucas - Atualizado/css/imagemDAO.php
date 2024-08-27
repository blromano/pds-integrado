<?php
require 'imagemPCD.php';
require_once 'ConectarBD.php';
require_once 'ModeloDAO.php';
require_once 'Erro.php';


class alteracaoDAO extends ConectarBD implements ModeloDAO {

    public function Atualizar($entidade) {}

    public function Criar($entidade) {
    	}

    public function Deletar($entidade) {}

    public function Listar() {

        try{

            $pdo = parent::CriarConexao();

            $sql = "select IMG_ID, IMG_URL_FOTO, IMG_LEGENDA from imagens_pcd";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();

            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $lista = array();

            foreach ($fetch as $linha) {
                $lista[] = new imagemPCD($linha['IMG_ID'], $linha['IMG_URL_FOTO'], $linha['IMG_LEGENDA']);
            }

            return $lista;

        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }

	}

    public function ProcurarPorID($valordoid){}

    }

}?>
