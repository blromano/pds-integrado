<?php
    
    class desempenho_exercicios_fisicos{
        
        private $def_codigo;
        private $def_dt_atualizacao;
        private $def_desempenho;
        
        function __construct() {
            
        }
        
        function getDef_codigo() {
            return $this->def_codigo;
        }

        function getDef_dt_atualizacao() {
            return $this->def_dt_atualizacao;
        }

        function getDef_desempenho() {
            return $this->def_desempenho;
        }

        function setDef_codigo($def_codigo) {
            $this->def_codigo = $def_codigo;
        }

        function setDef_dt_atualizacao($def_dt_atualizacao) {
            $this->def_dt_atualizacao = $def_dt_atualizacao;
        }

        function setDef_desempenho($def_desempenho) {
            $this->def_desempenho = $def_desempenho;
        }

    }
?>
