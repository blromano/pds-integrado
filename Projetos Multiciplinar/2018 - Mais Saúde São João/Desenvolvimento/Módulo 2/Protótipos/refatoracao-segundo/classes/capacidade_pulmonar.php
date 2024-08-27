<?php
class Capacidade_pulmonar{
    
    private $cpr_cod;
    private $pop_cod;
    private $cpr_status;
    private $cpr_inspiracao;
    private $cpr_expiracao;
    private $cpr_capacidade;
    private $cpr_data;
    
    function __construct() {
        
    }

    
    function getCpr_cod() {
        return $this->cpr_cod;
    }

    function getPop_cod() {
        return $this->pop_cod;
    }

    function getCpr_status() {
        return $this->cpr_status;
    }

    function getCpr_inspiracao() {
        return $this->cpr_inspiracao;
    }

    function getCpr_expiracao() {
        return $this->cpr_expiracao;
    }

    function getCpr_capacidade() {
        return $this->cpr_capacidade;
    }

    function getCpr_data() {
        return $this->cpr_data;
    }

    function setCpr_cod($cpr_cod) {
        $this->cpr_cod = $cpr_cod;
    }

    function setPop_cod($pop_cod) {
        $this->pop_cod = $pop_cod;
    }

    function setCpr_status($cpr_status) {
        $this->cpr_status = $cpr_status;
    }

    function setCpr_inspiracao($cpr_inspiracao) {
        $this->cpr_inspiracao = $cpr_inspiracao;
    }

    function setCpr_expiracao($cpr_expiracao) {
        $this->cpr_expiracao = $cpr_expiracao;
    }

    function setCpr_capacidade($cpr_capacidade) {
        $this->cpr_capacidade = $cpr_capacidade;
    }

    function setCpr_data($cpr_data) {
        $this->cpr_data = $cpr_data;
    }


    
}

