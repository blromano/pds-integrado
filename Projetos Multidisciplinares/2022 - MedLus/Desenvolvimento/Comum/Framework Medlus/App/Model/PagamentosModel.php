<?php

namespace App\Model;

class PagamentosModel {

    private $PAG_ID;
    private $PAG_DATAPAGAMENTO;
    private $PAG_VALORPAGAMENTO;
    private $PAG_DATAVENCIMENTO;
    private $FK_PLANOS_PLA_ID;
    private $FK_PACIENTES_PAC_ID;

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }    
}
?>