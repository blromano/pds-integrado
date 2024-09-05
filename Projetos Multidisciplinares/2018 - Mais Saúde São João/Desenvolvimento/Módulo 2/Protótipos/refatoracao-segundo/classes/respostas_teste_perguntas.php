<?php
class Respostas_teste_perguntas {
    private $rtr_resposta;
    private $rtp_codigo;
    private $fk_perguntas_teste_psicologico_ptp_codigo;
    private $fk_testes_psicologicos_tps_codigo;
    
    function __construct() {
        
    }

    
    
    function getRtr_resposta() {
        return $this->rtr_resposta;
    }

    function getRtp_codigo() {
        return $this->rtp_codigo;
    }

    function getFk_perguntas_teste_psicologico_ptp_codigo() {
        return $this->fk_perguntas_teste_psicologico_ptp_codigo;
    }

    function getFk_testes_psicologicos_tps_codigo() {
        return $this->fk_testes_psicologicos_tps_codigo;
    }

    function setRtr_resposta($rtr_resposta) {
        $this->rtr_resposta = $rtr_resposta;
    }

    function setRtp_codigo($rtp_codigo) {
        $this->rtp_codigo = $rtp_codigo;
    }

    function setFk_perguntas_teste_psicologico_ptp_codigo($fk_perguntas_teste_psicologico_ptp_codigo) {
        $this->fk_perguntas_teste_psicologico_ptp_codigo = $fk_perguntas_teste_psicologico_ptp_codigo;
    }

    function setFk_testes_psicologicos_tps_codigo($fk_testes_psicologicos_tps_codigo) {
        $this->fk_testes_psicologicos_tps_codigo = $fk_testes_psicologicos_tps_codigo;
    }


}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

