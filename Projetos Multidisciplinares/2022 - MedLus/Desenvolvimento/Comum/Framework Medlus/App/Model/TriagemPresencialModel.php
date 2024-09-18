<?php

    namespace App\Model;

    class TriagemPresencialModel {
        private $TRI_ENDERECO_SETOR;
        private $TRI_PRESSAOSISTOLICA;
        private $TRI_ID;
        private $TRI_ALTURA;
        private $TRI_SINTOMAS;
        private $TRI_HORA_TRIAGEM;
        private $TRI_ATENDIMENTOPREFERENCIAL;
        private $TRI_TEMPERATURA;
        private $TRI_PRESSAODIASTOLICA;
        private $TRI_PESO;
        private $TRI_ALERGIAS;
        private $TRI_INFORMACOESADICIONAIS;
        // private $FK_CONSULTAS_PRESENCIAIS_COP_ID;

        public function __get($name) {
            return $this->$name;
        }
    
        public function __set($name, $value) {
            $this->$name = $value;
        }   

    }

?>