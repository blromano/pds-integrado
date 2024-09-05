<?php

    namespace App\Model;

    class TiposSaneamentosModel{

        private $TSS_ID;
        private $TSS_NOME;
                        
        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }        

    }