<?php

    namespace App\Model;

    class LoginModel{

        private $USU_CPF;
        private $USU_SENHA;
        private $USU_TIPO;

        public function __get($name){
            return $this->$name;
        }
        public function __set($name, $value){
            $this->$name = $value;
        }
       
    }