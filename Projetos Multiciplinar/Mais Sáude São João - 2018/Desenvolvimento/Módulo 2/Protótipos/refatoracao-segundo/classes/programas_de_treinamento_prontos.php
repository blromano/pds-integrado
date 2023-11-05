<?php

    class programas_de_treinamentos_prontos{
        private $ptp_codigo;
        private $ptp_dificuldade;
        private $ptp_descricao;
        private $fk_edf_codigo;
        private $ptp_duracao;
        private $ptp_data_criacao;
        
        function __construct() {
            
        }
        
        function getPtp_codigo() {
            return $this->ptp_codigo;
        }

        function getPtp_dificuldade() {
            return $this->ptp_dificuldade;
        }

        function getPtp_descricao() {
            return $this->ptp_descricao;
        }

        function getFk_edf_codigo() {
            return $this->fk_edf_codigo;
        }

        function getPtp_duracao() {
            return $this->ptp_duracao;
        }

        function getPtp_data_criacao() {
            return $this->ptp_data_criacao;
        }

        function setPtp_codigo($ptp_codigo) {
            $this->ptp_codigo = $ptp_codigo;
        }

        function setPtp_dificuldade($ptp_dificuldade) {
            $this->ptp_dificuldade = $ptp_dificuldade;
        }

        function setPtp_descricao($ptp_descricao) {
            $this->ptp_descricao = $ptp_descricao;
        }

        function setFk_edf_codigo($fk_edf_codigo) {
            $this->fk_edf_codigo = $fk_edf_codigo;
        }

        function setPtp_duracao($ptp_duracao) {
            $this->ptp_duracao = $ptp_duracao;
        }

        function setPtp_data_criacao($ptp_data_criacao) {
            $this->ptp_data_criacao = $ptp_data_criacao;
        }



    }
?>
