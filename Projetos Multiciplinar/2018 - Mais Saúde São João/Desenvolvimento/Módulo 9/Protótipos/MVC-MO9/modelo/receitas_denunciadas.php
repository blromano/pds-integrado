<?php

class receitas_denunciadas {
    private $red_codigo;
    private $red_data_hora_denunciada;
    private $red_motivo;
    private $usu_codigo;
    private $rec_codigo;
    private $adm_codigo;
    
    function __construct() {
        
    }
    function getRed_codigo() {
        return $this->red_codigo;
    }

    function getRed_data_hora_denunciada() {
        return $this->red_data_hora_denunciada;
    }

    function getRed_motivo() {
        return $this->red_motivo;
    }

    function getUsu_codigo() {
        return $this->usu_codigo;
    }

    function getRec_codigo() {
        return $this->rec_codigo;
    }

    function getAdm_codigo() {
        return $this->adm_codigo;
    }

    function setRed_codigo($red_codigo) {
        $this->red_codigo = $red_codigo;
    }

    function setRed_data_hora_denunciada($red_data_hora_denunciada) {
        $this->red_data_hora_denunciada = $red_data_hora_denunciada;
    }

    function setRed_motivo($red_motivo) {
        $this->red_motivo = $red_motivo;
    }

    function setUsu_codigo($usu_codigo) {
        $this->usu_codigo = $usu_codigo;
    }

    function setRec_codigo($rec_codigo) {
        $this->rec_codigo = $rec_codigo;
    }

    function setAdm_codigo($adm_codigo) {
        $this->adm_codigo = $adm_codigo;
    }


    

}
