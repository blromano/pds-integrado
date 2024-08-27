<?php

    class desempenho_programas_treinamento{
        
        private $dpt_codigo;
        private $dpt_dt_atualizacao;
        private $dpt_desempenho;
        
        function __construct() {
            
        }
        
        function getDpt_codigo() {
            return $this->dpt_codigo;
        }

        function getDpt_dt_atualizacao() {
            return $this->dpt_dt_atualizacao;
        }

        function getDpt_desempenho() {
            return $this->dpt_desempenho;
        }

        function setDpt_codigo($dpt_codigo) {
            $this->dpt_codigo = $dpt_codigo;
        }

        function setDpt_dt_atualizacao($dpt_dt_atualizacao) {
            $this->dpt_dt_atualizacao = $dpt_dt_atualizacao;
        }

        function setDpt_desempenho($dpt_desempenho) {
            $this->dpt_desempenho = $dpt_desempenho;
        }
    }
?>