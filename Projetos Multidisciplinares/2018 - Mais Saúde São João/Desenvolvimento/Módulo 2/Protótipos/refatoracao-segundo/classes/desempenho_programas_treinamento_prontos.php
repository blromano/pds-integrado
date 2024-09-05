<?php

    class desempenho_programas_treinamento_prontos{
        
        private $dpt_codigo;
        private $dpt_dt_atualizacao;
        private $dpt_peso;
        private $fk_ept_codigo;
        
        function __construct() {
            
        }
        
        function getDpt_codigo() {
            return $this->dpt_codigo;
        }

        function getDpt_dt_atualizacao() {
            return $this->dpt_dt_atualizacao;
        }

        function getDpt_peso() {
            return $this->dpt_peso;
        }

        function getFk_ept_codigo() {
            return $this->fk_ept_codigo;
        }

        function setDpt_codigo($dpt_codigo) {
            $this->dpt_codigo = $dpt_codigo;
        }

        function setDpt_dt_atualizacao($dpt_dt_atualizacao) {
            $this->dpt_dt_atualizacao = $dpt_dt_atualizacao;
        }

        function setDpt_peso($dpt_peso) {
            $this->dpt_peso = $dpt_peso;
        }

        function setFk_ept_codigo($fk_ept_codigo) {
            $this->fk_ept_codigo = $fk_ept_codigo;
        }



    }
?>