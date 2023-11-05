<?php

class Fichas_Treinamento {

    function __construct() {
        
    }

    private $ftr_codigo, $ftr_data_inicio, $ftr_data_termino, $ftr_data_atualizacao, $ftr_nome;

    function getFtr_codigo() {
        return $this->ftr_codigo;
    }
    function setFtr_codigo($ftr_codigo) {
        $this->ftr_codigo = $ftr_codigo;
    }

    
    function getFtr_data_inicio() {
        return $this->ftr_data_inicio;
    }
    function setFtr_data_inicio($ftr_data_inicio) {
        $this->ftr_data_inicio = $ftr_data_inicio;
    }

    
    function getFtr_data_termino() {
        return $this->ftr_data_termino;
    }
    function setFtr_data_termino($ftr_data_termino) {
        $this->ftr_data_termino = $ftr_data_termino;
    }

    
    function getFtr_data_atualizacao() {
        return $this->ftr_data_atualizacao;
    }
    function setFtr_data_atualizacao($ftr_data_atualizacao) {
        $this->ftr_data_atualizacao = $ftr_data_atualizacao;
    }

    
    function getFtr_nome() {
        return $this->ftr_nome;
    }
    function setFtr_nome($ftr_nome) {
        $this->ftr_nome = $ftr_nome;
    }

}

?>