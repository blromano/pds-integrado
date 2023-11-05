<?php

class administradores {
    private $ADM_NOME;
    private $ADM_SENHA;
    private $ADM_ROOT;
    private $ADM_EMAIL;
    private $ADM_CODIGO;
    function __construct() {
        
    }
    function getADM_NOME() {
        return $this->ADM_NOME;
    }

    function getADM_SENHA() {
        return $this->ADM_SENHA;
    }

    function getADM_ROOT() {
        return $this->ADM_ROOT;
    }

    function getADM_EMAIL() {
        return $this->ADM_EMAIL;
    }

    function getADM_CODIGO() {
        return $this->ADM_CODIGO;
    }

    function setADM_NOME($ADM_NOME) {
        $this->ADM_NOME = $ADM_NOME;
    }

    function setADM_SENHA($ADM_SENHA) {
        $this->ADM_SENHA = $ADM_SENHA;
    }

    function setADM_ROOT($ADM_ROOT) {
        $this->ADM_ROOT = $ADM_ROOT;
    }

    function setADM_EMAIL($ADM_EMAIL) {
        $this->ADM_EMAIL = $ADM_EMAIL;
    }

    function setADM_CODIGO($ADM_CODIGO) {
        $this->ADM_CODIGO = $ADM_CODIGO;
    }


}
