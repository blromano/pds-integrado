<?php

class unidade_medida {
    private $uni_codigo;
    private $uni_nome;
    private $uni_nome_abreviado;
    private $nut_codigo;
    
    function __construct() {
        
    }
    function getUni_codigo() {
        return $this->uni_codigo;
    }

    function getUni_nome() {
        return $this->uni_nome;
    }

    function getUni_nome_abreviado() {
        return $this->uni_nome_abreviado;
    }

    function getNut_codigo() {
        return $this->nut_codigo;
    }

    function setUni_codigo($uni_codigo) {
        $this->uni_codigo = $uni_codigo;
    }

    function setUni_nome($uni_nome) {
        $this->uni_nome = $uni_nome;
    }

    function setUni_nome_abreviado($uni_nome_abreviado) {
        $this->uni_nome_abreviado = $uni_nome_abreviado;
    }

    function setNut_codigo($nut_codigo) {
        $this->nut_codigo = $nut_codigo;
    }



    
}
