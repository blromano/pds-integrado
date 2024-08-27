<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NUTRICIONISTA
 *
 * @author jvcco
 */
class nutricionista {
    private $NUT_CRN;
    private $NUT_FOCO;
    private $NUT_DESC_PROFISSIONAL;
    private $NUT_STATUS;
    private $USUARIO;
    function __construct() {
        
    }
    
    

    function getNUT_CRN() {
        return $this->NUT_CRN;
    }

    function getNUT_FOCO() {
        return $this->NUT_FOCO;
    }

    function getNUT_DESC_PROFISSIONAL() {
        return $this->NUT_DESC_PROFISSIONAL;
    }

    function getNUT_STATUS() {
        return $this->NUT_STATUS;
    }

    function getUSUARIO() {
        return $this->USUARIO;
    }

    function setNUT_CRN($NUT_CRN) {
        $this->NUT_CRN = $NUT_CRN;
    }

    function setNUT_FOCO($NUT_FOCO) {
        $this->NUT_FOCO = $NUT_FOCO;
    }

    function setNUT_DESC_PROFISSIONAL($NUT_DESC_PROFISSIONAL) {
        $this->NUT_DESC_PROFISSIONAL = $NUT_DESC_PROFISSIONAL;
    }

    function setNUT_STATUS($NUT_STATUS) {
        $this->NUT_STATUS = $NUT_STATUS;
    }

    function setUSUARIO($USUARIO) {
        $this->USUARIO = $USUARIO;
    }


}
