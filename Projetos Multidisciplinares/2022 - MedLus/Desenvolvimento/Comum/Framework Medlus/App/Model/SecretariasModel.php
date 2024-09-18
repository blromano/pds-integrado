<?php

    namespace App\Model;

    class SecretariasModel{

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }        


    }
