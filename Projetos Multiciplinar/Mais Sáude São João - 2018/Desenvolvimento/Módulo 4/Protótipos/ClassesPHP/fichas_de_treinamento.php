<?php

class FichasDeTreinamento {

    private $fic_codigo, $fic_dia_semana, $fic_quantidade, $fic_series, $fic_repeticoes, $fic_nome_atividades, $fic_data_inicio, $fic_data_termino ;

    function getFic_codigo() {
        return $this->fic_codigo;
    }

    function setFic_codigo($fic_codigo) {
        $this->fic_codigo = $fic_codigo;
    }
    
    function getFic_dia_semana() {
        return $this->fic_dia_semana;
    }

    function getFic_quantidade() {
        return $this->fic_quantidade;
    }

    function getFic_series() {
        return $this->fic_series;
    }

    function getFic_repeticoes() {
        return $this->fic_repeticoes;
    }

    function getFic_nome_atividades() {
        return $this->fic_nome_atividades;
    }

    function getFic_data_inicio() {
        return $this->fic_data_inicio;
    }

    function getFic_data_termino() {
        return $this->fic_data_termino;
    }

    function setFic_dia_semana($fic_dia_semana) {
        $this->fic_dia_semana = $fic_dia_semana;
    }

    function setFic_quantidade($fic_quantidade) {
        $this->fic_quantidade = $fic_quantidade;
    }

    function setFic_series($fic_series) {
        $this->fic_series = $fic_series;
    }

    function setFic_repeticoes($fic_repeticoes) {
        $this->fic_repeticoes = $fic_repeticoes;
    }

    function setFic_nome_atividades($fic_nome_atividades) {
        $this->fic_nome_atividades = $fic_nome_atividades;
    }

    function setFic_data_inicio($fic_data_inicio) {
        $this->fic_data_inicio = $fic_data_inicio;
    }

    function setFic_data_termino($fic_data_termino) {
        $this->fic_data_termino = $fic_data_termino;
    }

    function __contruct() {
        
    }

}

?>