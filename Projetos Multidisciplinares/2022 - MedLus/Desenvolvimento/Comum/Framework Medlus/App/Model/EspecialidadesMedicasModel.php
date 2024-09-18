<?php

    namespace App\Model;

    class EspecialidadesMedicasModel{

        private $ESP_ID;
        private $ESP_NOME;

        public function __get($name){
            return $this->$name;
        }
        public function __set($name, $value){
            $this->$name = $value;
        }
       
    }