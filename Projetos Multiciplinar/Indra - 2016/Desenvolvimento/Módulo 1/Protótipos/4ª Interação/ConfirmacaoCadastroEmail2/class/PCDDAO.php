<?php
include_once "Database.php";
include_once "PCD.php";

class PCDDAO {

    private $id;

    public function getId() {
        return $this->id;
    }

    public function listarPCD() {
        try {

            $db = Database::conectar();

            $sql = "select * from pcds";

            $prepare = $db->prepare($sql);

            $prepare->execute();

            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);

            $lista = array();


            foreach ($fetch as $linha) {

                $lista[] = new PCD($linha["PCD_ID"], $linha["PCD_STATUS_FUNCIONAMENTO"], $linha["PCD_CIDADE"], $linha["PCD_ESTADO"]);
            }

            return $lista;
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

}
