<?php
    
    class exercicios_da_ficha_de_treinamento{
        
        private $eft_codigo;
        private $eft_tempo_repeticao;
        private $eft_qtd_series;
        private $fk_eds_codigo;
        private $fk_ftr_codigo;
        
        function __construct() {
            
        }

        function getEft_codigo() {
            return $this->eft_codigo;
        }

        function getEft_tempo_repeticao() {
            return $this->eft_tempo_repeticao;
        }

        function getEft_qtd_series() {
            return $this->eft_qtd_series;
        }

        function getFk_eds_codigo() {
            return $this->fk_eds_codigo;
        }

        function getFk_ftr_codigo() {
            return $this->fk_ftr_codigo;
        }

        function setEft_codigo($eft_codigo) {
            $this->eft_codigo = $eft_codigo;
        }

        function setEft_tempo_repeticao($eft_tempo_repeticao) {
            $this->eft_tempo_repeticao = $eft_tempo_repeticao;
        }

        function setEft_qtd_series($eft_qtd_series) {
            $this->eft_qtd_series = $eft_qtd_series;
        }

        function setFk_eds_codigo($fk_eds_codigo) {
            $this->fk_eds_codigo = $fk_eds_codigo;
        }

        function setFk_ftr_codigo($fk_ftr_codigo) {
            $this->fk_ftr_codigo = $fk_ftr_codigo;
        }


    }
?>