<?php

    namespace App\Model;

    class AdministradoresModel{
        private $ADM_ID;
        private $ADM_NOME;
        private $FK_LOGIN_LGN_ID;
        
        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }