<?php

    namespace App\Model;

    class CampusModel{
        private $CAM_ID;
        private $CAM_COMPLEMENTO;
        private $CAM_CEP;
        private $CAM_NOME;
        private $CAM_NUMERO;
        private $FK_CIDADES_CID_ID;

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }

    }