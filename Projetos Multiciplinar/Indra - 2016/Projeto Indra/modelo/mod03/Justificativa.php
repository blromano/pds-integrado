<?php

class Justificativa {
    
    private $HmsId;
    private $HmsStatusAlteracao;
    private $HmsMotivoMudancaStatus;
    private $SenId;
    
    function __construct($HmsId, $HmsStatusAlteracao, $HmsMotivoMudancaStatus, $SenId) {
        $this->HmsId = $HmsId;
        $this->HmsStatusAlteracao = $HmsStatusAlteracao;
        $this->HmsMotivoMudancaStatus = $HmsMotivoMudancaStatus;
        $this->SenId = $SenId;
    }

    function getHmsId() {
        return $this->HmsId;
    }

    function getHmsStatusAlteracao() {
        return $this->HmsStatusAlteracao;
    }

    function getHmsMotivoMudancaStatus() {
        return $this->HmsMotivoMudancaStatus;
    }

    function getSenId() {
        return $this->SenId;
    }

    function setHmsId($HmsId) {
        $this->HmsId = $HmsId;
    }

    function setHmsStatusAlteracao($HmsStatusAlteracao) {
        $this->HmsStatusAlteracao = $HmsStatusAlteracao;
    }

    function setHmsMotivoMudancaStatus($HmsMotivoMudancaStatus) {
        $this->HmsMotivoMudancaStatus = $HmsMotivoMudancaStatus;
    }

    function setSenId($SenId) {
        $this->SenId = $SenId;
    }



    
    
}

