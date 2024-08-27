<?php


class educadores_fisicos {
    private $EDF_CREF;
    private $EDF_FOCO;
    private $EDF_DESC_PROFISSIONAL;
    private $EDF_STATUS;
    private $USUARIO;
    function __construct() {
        
    }
    
    function getEDF_CREF() {
        return $this->EDF_CREF;
    }

    function getEDF_FOCO() {
        return $this->EDF_FOCO;
    }

    function getEDF_DESC_PROFISSIONAL() {
        return $this->EDF_DESC_PROFISSIONAL;
    }

    function getEDF_STATUS() {
        return $this->EDF_STATUS;
    }

    function getUSUARIO() {
        return $this->USUARIO;
    }

    function setEDF_CREF($EDF_CREF) {
        $this->EDF_CREF = $EDF_CREF;
    }

    function setEDF_FOCO($EDF_FOCO) {
        $this->EDF_FOCO = $EDF_FOCO;
    }

    function setEDF_DESC_PROFISSIONAL($EDF_DESC_PROFISSIONAL) {
        $this->EDF_DESC_PROFISSIONAL = $EDF_DESC_PROFISSIONAL;
    }

    function setEDF_STATUS($EDF_STATUS) {
        $this->EDF_STATUS = $EDF_STATUS;
    }

    function setUSUARIO($USUARIO) {
        $this->USUARIO = $USUARIO;
    }



}
