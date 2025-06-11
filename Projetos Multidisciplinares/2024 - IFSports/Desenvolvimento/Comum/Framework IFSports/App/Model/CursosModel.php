<?php

    namespace App\Model;

    class CursosModel{
        private $CUR_ID;
        private $CUR_NOME;

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }

    }