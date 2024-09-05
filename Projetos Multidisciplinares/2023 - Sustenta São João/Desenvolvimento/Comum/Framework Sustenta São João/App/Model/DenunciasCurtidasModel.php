<?php

namespace App\Model;

class DenunciasCurtidasModel{

    private $FK_DENUNCIAS_DEN_ID;
    private $FK_CIDADAOS_USU_ID;
    private $DEC_ID;

    public function __set($nome, $valor){
        $this->$nome = $valor;
    }

    public function __get($nome){
        return $this->$nome;
    }

}

?>