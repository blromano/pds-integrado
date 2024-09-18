<?php

namespace App\Model;

class ContatosSetoriaisModel {

    private $CTT_ID;
    private $CTT_RESPONSAVEL;
    private $CTT_EMAIL;
    private $CTT_TELEFONE;
    private $CTT_SETOR;
    private $CTT_WHATSAAP;
    private $FK_SECRETARIAS_SEC_ID;

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }        
}
?>