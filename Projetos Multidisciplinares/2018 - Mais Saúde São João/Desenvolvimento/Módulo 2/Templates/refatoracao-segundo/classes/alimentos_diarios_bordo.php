<?php

class DB_ALIMENTOS {

    private $dba_total_caloria;
    private $dba_codigo;
    private $dba_cod_refeicao;
    private $dba_porcao_inteira;
    private $dba_porcao_fracionada;
    private $dba_horario;
    private $ali_codigo;
    private $dib_codigo;
    
    function getDba_total_caloria() {
        return $this->dba_total_caloria;
    }

    function getDba_codigo() {
        return $this->dba_codigo;
    }

    function getDba_cod_refeicao() {
        return $this->dba_cod_refeicao;
    }

    function getDba_porcao_inteira() {
        return $this->dba_porcao_inteira;
    }

    function getDba_porcao_fracionada() {
        return $this->dba_porcao_fracionada;
    }

    function getDba_horario() {
        return $this->dba_horario;
    }

    function getAli_codigo() {
        return $this->ali_codigo;
    }

    function getDib_codigo() {
        return $this->dib_codigo;
    }

    function setDba_total_caloria($dba_total_caloria) {
        $this->dba_total_caloria = $dba_total_caloria;
    }

    function setDba_codigo($dba_codigo) {
        $this->dba_codigo = $dba_codigo;
    }

    function setDba_cod_refeicao($dba_cod_refeicao) {
        $this->dba_cod_refeicao = $dba_cod_refeicao;
    }

    function setDba_porcao_inteira($dba_porcao_inteira) {
        $this->dba_porcao_inteira = $dba_porcao_inteira;
    }

    function setDba_porcao_fracionada($dba_porcao_fracionada) {
        $this->dba_porcao_fracionada = $dba_porcao_fracionada;
    }

    function setDba_horario($dba_horario) {
        $this->dba_horario = $dba_horario;
    }

    function setAli_codigo($ali_codigo) {
        $this->ali_codigo = $ali_codigo;
    }

    function setDib_codigo($dib_codigo) {
        $this->dib_codigo = $dib_codigo;
    }


}

?>