<?php

class PCD {

    private $PCD_ID;
    private $PCD_DESCRICAO;
    private $PCD_CIDADE;
    private $PCD_ESTADO;
    private $PCD_LATITUDE;
    private $PCD_LONGITUDE;
    private $PCD_STATUS_FUNCIONAMENTO;

    function __construct($PCD_ID, $PCD_DESCRICAO, $PCD_CIDADE, $PCD_ESTADO, $PCD_LATITUDE, $PCD_LONGITUDE, $PCD_STATUS_FUNCIONAMENTO) {
        $this->PCD_ID = $PCD_ID;
        $this->PCD_DESCRICAO = $PCD_DESCRICAO;
        $this->PCD_CIDADE = $PCD_CIDADE;
        $this->PCD_ESTADO = $PCD_ESTADO;
        $this->PCD_LATITUDE = $PCD_LATITUDE;
        $this->PCD_LONGITUDE = $PCD_LONGITUDE;
        $this->PCD_STATUS_FUNCIONAMENTO = $PCD_STATUS_FUNCIONAMENTO;
    }

    function getPCD_ID() {
        return $this->PCD_ID;
    }

    function getPCD_DESCRICAO() {
        return $this->PCD_DESCRICAO;
    }

    function getPCD_CIDADE() {
        return $this->PCD_CIDADE;
    }

    function getPCD_ESTADO() {
        return $this->PCD_ESTADO;
    }

    function getPCD_LATITUDE() {
        return $this->PCD_LATITUDE;
    }

    function getPCD_LONGITUDE() {
        return $this->PCD_LONGITUDE;
    }

    function getPCD_STATUS_FUNCIONAMENTO() {
        return $this->PCD_STATUS_FUNCIONAMENTO;
    }

    function setPCD_ID($PCD_ID) {
        $this->PCD_ID = $PCD_ID;
    }

    function setPCD_DESCRICAO($PCD_DESCRICAO) {
        $this->PCD_DESCRICAO = $PCD_DESCRICAO;
    }

    function setPCD_CIDADE($PCD_CIDADE) {
        $this->PCD_CIDADE = $PCD_CIDADE;
    }

    function setPCD_ESTADO($PCD_ESTADO) {
        $this->PCD_ESTADO = $PCD_ESTADO;
    }

    function setPCD_LATITUDE($PCD_LATITUDE) {
        $this->PCD_LATITUDE = $PCD_LATITUDE;
    }

    function setPCD_LONGITUDE($PCD_LONGITUDE) {
        $this->PCD_LONGITUDE = $PCD_LONGITUDE;
    }

    function setPCD_STATUS_FUNCIONAMENTO($PCD_STATUS_FUNCIONAMENTO) {
        $this->PCD_STATUS_FUNCIONAMENTO = $PCD_STATUS_FUNCIONAMENTO;
    }

}



