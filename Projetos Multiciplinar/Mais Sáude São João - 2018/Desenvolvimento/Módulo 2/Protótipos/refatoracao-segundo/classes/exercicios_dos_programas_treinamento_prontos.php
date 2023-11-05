<?php

    class exercicios_dos_programas_treinamento_prontos{
        
        private $ept_codigo;
        private $ept_tempo_repeticao;
        private $ept_qtd_series;
        private $fk_efs_codigo;
        private $fk_ptp_codigo;
        
        function __construct() {
            
        }
        
        function getEpt_codigo() {
            return $this->ept_codigo;
        }

        function getEpt_tempo_repeticao() {
            return $this->ept_tempo_repeticao;
        }

        function getEpt_qtd_series() {
            return $this->ept_qtd_series;
        }

        function getFk_efs_codigo() {
            return $this->fk_efs_codigo;
        }

        function getFk_ptp_codigo() {
            return $this->fk_ptp_codigo;
        }

        function setEpt_codigo($ept_codigo) {
            $this->ept_codigo = $ept_codigo;
        }

        function setEpt_tempo_repeticao($ept_tempo_repeticao) {
            $this->ept_tempo_repeticao = $ept_tempo_repeticao;
        }

        function setEpt_qtd_series($ept_qtd_series) {
            $this->ept_qtd_series = $ept_qtd_series;
        }

        function setFk_efs_codigo($fk_efs_codigo) {
            $this->fk_efs_codigo = $fk_efs_codigo;
        }

        function setFk_ptp_codigo($fk_ptp_codigo) {
            $this->fk_ptp_codigo = $fk_ptp_codigo;
        }



    }
?>