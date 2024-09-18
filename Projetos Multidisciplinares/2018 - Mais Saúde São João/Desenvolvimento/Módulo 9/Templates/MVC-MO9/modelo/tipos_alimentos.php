<?php

class tipos_alimentos {
    private $tpa_codigo;
    private $tpa_nome;
    private $nut_codigo;
    
    function __construct() {
        
    }
    function getTpa_codigo() {
        return $this->tpa_codigo;
    }

    function getTpa_nome() {
        return $this->tpa_nome;
    }

    function getNut_codigo() {
        return $this->nut_codigo;
    }

    function setTpa_codigo($tpa_codigo) {
        $this->tpa_codigo = $tpa_codigo;
    }

    function setTpa_nome($tpa_nome) {
        $this->tpa_nome = $tpa_nome;
    }

    function setNut_codigo($nut_codigo) {
        $this->nut_codigo = $nut_codigo;
    }



}
