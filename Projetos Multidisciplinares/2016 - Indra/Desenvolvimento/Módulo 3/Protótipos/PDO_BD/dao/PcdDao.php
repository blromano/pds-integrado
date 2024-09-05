<?php

include_once "ConectarBD.php";

class PcdDao {

    public function Atualizar($entidade) {
        try {
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public function Criar($entidade) {
        try {
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public function CriarObjeto($data) {
        
    }

    public function Deletar($entidade) {
        try {
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public static function Listar() {
        try {
            
            $pdo = ConectarBD::CriarConexao();

            $sql = "select * from PCDS";

            $prepare = $pdo->prepare($sql);

            $prepare->execute();
            
            return $prepare->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

    public function ProcurarPorID($id) {
        try {
            
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }
    
}