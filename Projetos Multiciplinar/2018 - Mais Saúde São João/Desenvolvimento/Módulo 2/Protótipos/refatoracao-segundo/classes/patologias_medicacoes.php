<?php

class patologias_medicacoes {
    private $PAT_NOME;
    private $PAT_MED_NOME;
    private $PAT_DATA_INICIO;
    private $PAT_DATA_FIM;
    private $PAT_CODIGO;
    private $USU_CODIGO;
    function __construct() {
        
    }
    function getPAT_NOME() {
        return $this->PAT_NOME;
    }

    function getPAT_MED_NOME() {
        return $this->PAT_MED_NOME;
    }

    function getPAT_DATA_INICIO() {
        return $this->PAT_DATA_INICIO;
    }

    function getPAT_DATA_FIM() {
        return $this->PAT_DATA_FIM;
    }

    function getPAT_CODIGO() {
        return $this->PAT_CODIGO;
    }

    function getUSU_CODIGO() {
        return $this->USU_CODIGO;
    }

    function setPAT_NOME($PAT_NOME) {
        $this->PAT_NOME = $PAT_NOME;
    }

    function setPAT_MED_NOME($PAT_MED_NOME) {
        $this->PAT_MED_NOME = $PAT_MED_NOME;
    }

    function setPAT_DATA_INICIO($PAT_DATA_INICIO) {
        $this->PAT_DATA_INICIO = $PAT_DATA_INICIO;
    }

    function setPAT_DATA_FIM($PAT_DATA_FIM) {
        $this->PAT_DATA_FIM = $PAT_DATA_FIM;
    }

    function setPAT_CODIGO($PAT_CODIGO) {
        $this->PAT_CODIGO = $PAT_CODIGO;
    }

    function setUSU_CODIGO($USU_CODIGO) {
        $this->USU_CODIGO = $USU_CODIGO;
    }



}
