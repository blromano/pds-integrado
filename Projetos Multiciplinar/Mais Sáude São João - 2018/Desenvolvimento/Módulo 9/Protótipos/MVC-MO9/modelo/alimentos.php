<?php

class alimentos {
    private $ali_codigo;
    private $ali_nome;
    private $ali_calorias;
    private $ali_carboidratos;
    private $ali_proteinas;
    private $ali_porcao;
    private $ali_gordura_total;
    private $ali_gordura_saturada;
    private $ali_gordura_trans;
    private $ali_fibra;
    private $ali_sodio;
    private $nut_codigo;
    private $uni_codigo;
    private $tpa_codigo;
    
    function __construct() {
        
    }

    function getAli_codigo() {
        return $this->ali_codigo;
    }

    function getAli_nome() {
        return $this->ali_nome;
    }

    function getAli_calorias() {
        return $this->ali_calorias;
    }

    function getAli_carboidratos() {
        return $this->ali_carboidratos;
    }

    function getAli_proteinas() {
        return $this->ali_proteinas;
    }

    function getAli_porcao() {
        return $this->ali_porcao;
    }

    function getAli_gordura_total() {
        return $this->ali_gordura_total;
    }

    function getAli_gordura_saturada() {
        return $this->ali_gordura_saturada;
    }

    function getAli_gordura_trans() {
        return $this->ali_gordura_trans;
    }

    function getAli_fibra() {
        return $this->ali_fibra;
    }

    function getAli_sodio() {
        return $this->ali_sodio;
    }

    function getNut_codigo() {
        return $this->nut_codigo;
    }

    function getUni_codigo() {
        return $this->uni_codigo;
    }

    function getTpa_codigo() {
        return $this->tpa_codigo;
    }

    function setAli_codigo($ali_codigo) {
        $this->ali_codigo = $ali_codigo;
    }

    function setAli_nome($ali_nome) {
        $this->ali_nome = $ali_nome;
    }

    function setAli_calorias($ali_calorias) {
        $this->ali_calorias = $ali_calorias;
    }

    function setAli_carboidratos($ali_carboidratos) {
        $this->ali_carboidratos = $ali_carboidratos;
    }

    function setAli_proteinas($ali_proteinas) {
        $this->ali_proteinas = $ali_proteinas;
    }

    function setAli_porcao($ali_porcao) {
        $this->ali_porcao = $ali_porcao;
    }

    function setAli_gordura_total($ali_gordura_total) {
        $this->ali_gordura_total = $ali_gordura_total;
    }

    function setAli_gordura_saturada($ali_gordura_saturada) {
        $this->ali_gordura_saturada = $ali_gordura_saturada;
    }

    function setAli_gordura_trans($ali_gordura_trans) {
        $this->ali_gordura_trans = $ali_gordura_trans;
    }

    function setAli_fibra($ali_fibra) {
        $this->ali_fibra = $ali_fibra;
    }

    function setAli_sodio($ali_sodio) {
        $this->ali_sodio = $ali_sodio;
    }

    function setNut_codigo($nut_codigo) {
        $this->nut_codigo = $nut_codigo;
    }

    function setUni_codigo($uni_codigo) {
        $this->uni_codigo = $uni_codigo;
    }

    function setTpa_codigo($tpa_codigo) {
        $this->tpa_codigo = $tpa_codigo;
    }

   
}
