<?php

class receita {
    private $rec_codigo;
    private $rec_nome;
    private $rec_foto;
    private $rec_rendimento;
    private $rec_tempo_preparo;
    private $rec_modo_preparo;
    private $rec_ingredientes;
    private $usu_codigo;
    
    function __construct() {
        
    }
    function getRec_codigo() {
        return $this->rec_codigo;
    }

    function getRec_nome() {
        return $this->rec_nome;
    }

    function getRec_foto() {
        return $this->rec_foto;
    }

    function getRec_rendimento() {
        return $this->rec_rendimento;
    }

    function getRec_tempo_preparo() {
        return $this->rec_tempo_preparo;
    }

    function getRec_modo_preparo() {
        return $this->rec_modo_preparo;
    }

    function getRec_ingredientes() {
        return $this->rec_ingredientes;
    }

    function getUsu_codigo() {
        return $this->usu_codigo;
    }

    function setRec_codigo($rec_codigo) {
        $this->rec_codigo = $rec_codigo;
    }

    function setRec_nome($rec_nome) {
        $this->rec_nome = $rec_nome;
    }

    function setRec_foto($rec_foto) {
        $this->rec_foto = $rec_foto;
    }

    function setRec_rendimento($rec_rendimento) {
        $this->rec_rendimento = $rec_rendimento;
    }

    function setRec_tempo_preparo($rec_tempo_preparo) {
        $this->rec_tempo_preparo = $rec_tempo_preparo;
    }

    function setRec_modo_preparo($rec_modo_preparo) {
        $this->rec_modo_preparo = $rec_modo_preparo;
    }

    function setRec_ingredientes($rec_ingredientes) {
        $this->rec_ingredientes = $rec_ingredientes;
    }

    function setUsu_codigo($usu_codigo) {
        $this->usu_codigo = $usu_codigo;
    }



    
    
}
