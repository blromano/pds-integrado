<?php

namespace App\Model;

class TriagemOnlineModel {

    private $TRO_COLESTEROL;
    private $TRO_FALTA_DE_AR;
    private $TRO_PESO;
    private $TRO_DOR_NO_CORPO;
    private $TRO_DOR_DE_GARGANTA;
    private $TRO_VOMITO;
    private $TRO_CORIZA;
    private $TRO_DOR_DE_CABECA;
    private $TRO_DIABETES;
    private $TRO_TOSSE;
    private $TRO_DIARREIA;
    private $TRO_FEBRE;
    private $TRO_LESAO;
    private $TRO_HIPERTENSAO;
    private $TRO_SINTOMAS_ADICIONAIS;
    private $TRO_ID;
    private $FK_CONSULTAS_ONLINE_CTO_ID;

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }     
} ?>

