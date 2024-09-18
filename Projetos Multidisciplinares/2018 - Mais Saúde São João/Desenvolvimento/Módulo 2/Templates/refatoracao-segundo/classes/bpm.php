<?php
class Bpm{
    private $bpm_cod;
    private $pop_cod;
    private $bpm_batimentos;
    private $bpm_data;
    private $bpm_status;
    
    function __construct() {
        
    }

    
    function getBpm_cod() {
        return $this->bpm_cod;
    }

    function getPop_cod() {
        return $this->pop_cod;
    }

    function getBpm_batimentos() {
        return $this->bpm_batimentos;
    }

    function getBpm_data() {
        return $this->bpm_data;
    }

    function getBpm_status() {
        return $this->bpm_status;
    }

    function setBpm_cod($bpm_cod) {
        $this->bpm_cod = $bpm_cod;
    }

    function setPop_cod($pop_cod) {
        $this->pop_cod = $pop_cod;
    }

    function setBpm_batimentos($bpm_batimentos) {
        $this->bpm_batimentos = $bpm_batimentos;
    }

    function setBpm_data($bpm_data) {
        $this->bpm_data = $bpm_data;
    }

    function setBpm_status($bpm_status) {
        $this->bpm_status = $bpm_status;
    }


    
}
