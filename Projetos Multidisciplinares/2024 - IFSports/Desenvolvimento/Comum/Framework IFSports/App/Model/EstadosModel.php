<?php

    namespace App\Model;

    class EstadosModel{
        private $EST_ID;
        private $EST_SIGLA;

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }

    }