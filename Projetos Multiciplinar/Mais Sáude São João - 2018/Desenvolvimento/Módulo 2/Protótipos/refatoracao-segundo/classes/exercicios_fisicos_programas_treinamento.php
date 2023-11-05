<?php
class  Exercicios_fisicos_programas_treinamento {
        
    private $ept_carga_peso;
    private $ept_pgt_repeticoes;
    private $ept_intervalo;
    private $ept_codigo;
    private $fk_programas_de_treinamento_pgt_codigo;
    private $fk_exercicios_fisicos_exf_codigo;
    
    function __construct() {
        
    }

    
    
    function getEpt_carga_peso() {
        return $this->ept_carga_peso;
    }

    function getEpt_pgt_repeticoes() {
        return $this->ept_pgt_repeticoes;
    }

    function getEpt_intervalo() {
        return $this->ept_intervalo;
    }

    function getEpt_codigo() {
        return $this->ept_codigo;
    }

    function getFk_programas_de_treinamento_pgt_codigo() {
        return $this->fk_programas_de_treinamento_pgt_codigo;
    }

    function getFk_exercicios_fisicos_exf_codigo() {
        return $this->fk_exercicios_fisicos_exf_codigo;
    }

    function setEpt_carga_peso($ept_carga_peso) {
        $this->ept_carga_peso = $ept_carga_peso;
    }

    function setEpt_pgt_repeticoes($ept_pgt_repeticoes) {
        $this->ept_pgt_repeticoes = $ept_pgt_repeticoes;
    }

    function setEpt_intervalo($ept_intervalo) {
        $this->ept_intervalo = $ept_intervalo;
    }

    function setEpt_codigo($ept_codigo) {
        $this->ept_codigo = $ept_codigo;
    }

    function setFk_programas_de_treinamento_pgt_codigo($fk_programas_de_treinamento_pgt_codigo) {
        $this->fk_programas_de_treinamento_pgt_codigo = $fk_programas_de_treinamento_pgt_codigo;
    }

    function setFk_exercicios_fisicos_exf_codigo($fk_exercicios_fisicos_exf_codigo) {
        $this->fk_exercicios_fisicos_exf_codigo = $fk_exercicios_fisicos_exf_codigo;
    }


    
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

