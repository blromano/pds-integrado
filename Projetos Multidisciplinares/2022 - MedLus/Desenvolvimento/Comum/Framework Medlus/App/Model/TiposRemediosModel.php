<?php

namespace App\Model;

class TiposRemediosModel {

    private $TIP_OBSERVACOES;
    private $TIP_ID;
    private $TIP_NOME;

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }        
}
?>