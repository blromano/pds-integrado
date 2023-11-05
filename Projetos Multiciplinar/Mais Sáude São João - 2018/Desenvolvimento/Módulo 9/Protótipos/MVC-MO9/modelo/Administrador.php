<?php

class administrador{
    private $adm_codigo;
    private $adm_nome;

    function __construct() {
        
    }
    function getAdm_codigo() {
        return $this->adm_codigo;
    }

    function getAdm_nome() {
        return $this->adm_nome;
    }

    function setAdm_codigo($adm_codigo) {
        $this->adm_codigo = $adm_codigo;
    }

    function setAdm_nome($adm_nome) {
        $this->adm_nome = $adm_nome;
    }



}

?>