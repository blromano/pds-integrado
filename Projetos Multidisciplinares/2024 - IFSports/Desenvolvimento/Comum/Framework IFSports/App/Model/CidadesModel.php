<?php

    namespace App\Model;

    class CidadesModel{
        private $CID_ID;
        private $CID_NOME;
        private $FK_ESTADOS_EST_ID;

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }

    }