<?php

namespace App\Model;

class PlanosMedicosModel {

    private $PLA_ID;
    private $PLA_AGENCIA;
    private $PLA_CONTATO;
    private $PLA_PRECO;
    private $PLA_QUANTIDADEEXAMES;
    private $PLA_NOME;
    private $PLA_QUANTIDADECONSULTAS;

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }    
}
?>
