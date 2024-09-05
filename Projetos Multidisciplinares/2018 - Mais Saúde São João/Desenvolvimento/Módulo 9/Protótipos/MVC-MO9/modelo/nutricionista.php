<?php

class nutricionista {
    private $nut_codigo;
    private $nut_nome;
    
    function __construct() {
        
    }
    function getNut_codigo() {
        return $this->nut_codigo;
    }

    function getNut_nome() {
        return $this->nut_nome;
    }

    function setNut_codigo($nut_codigo) {
        $this->nut_codigo = $nut_codigo;
    }

    function setNut_nome($nut_nome) {
        $this->nut_nome = $nut_nome;
    }



}
