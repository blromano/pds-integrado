<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArquivoPcdImportado
 *
 * @author samuel
 */
class ArquivoPcdImportado {
    
    private $ApiId;
    private $ApiDataHoraImportacao;
    private $ApiUrlArquivo;
    private $PcdId;
    private $UsuId;
    
    function __construct($ApiId, $ApiDataHoraImportacao, $ApiUrlArquivo, $PcdId, $UsuId) {
        $this->ApiId = $ApiId;
        $this->ApiDataHoraImportacao = $ApiDataHoraImportacao;
        $this->ApiUrlArquivo = $ApiUrlArquivo;
        $this->PcdId = $PcdId;
        $this->UsuId = $UsuId;
    }

    function getApiId() {
        return $this->ApiId;
    }

    function getApiDataHoraImportacao() {
        return $this->ApiDataHoraImportacao;
    }

    function getApiUrlArquivo() {
        return $this->ApiUrlArquivo;
    }

    function getPcdId() {
        return $this->PcdId;
    }

    function getUsuId() {
        return $this->UsuId;
    }

    function setApiId($ApiId) {
        $this->ApiId = $ApiId;
    }

    function setApiDataHoraImportacao($ApiDataHoraImportacao) {
        $this->ApiDataHoraImportacao = $ApiDataHoraImportacao;
    }

    function setApiUrlArquivo($ApiUrlArquivo) {
        $this->ApiUrlArquivo = $ApiUrlArquivo;
    }

    function setPcdId($PcdId) {
        $this->PcdId = $PcdId;
    }

    function setUsuId($UsuId) {
        $this->UsuId = $UsuId;
    }
    
}
