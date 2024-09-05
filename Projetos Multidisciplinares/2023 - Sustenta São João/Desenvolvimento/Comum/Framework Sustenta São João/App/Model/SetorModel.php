<?php

    namespace App\Model;

    class SetorModel{

        private $SET_ID;
        private $SET_NOME;
        private $SET_DATA_CRIACAO;
        private $SET_DESCRICAO_SERVICOS;
        

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }        

    }