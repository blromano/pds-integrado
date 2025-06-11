<?php

    namespace App\Model;

    class ModalidadesModel{

        private $MDE_ID;
        private $MDE_NOME;
        private $MDE_GENERO;
        private $MDE_TIPO;

        public function __set($name, $value) {

            $this-> $name = $value;
        }

        public function __get($name) {

            return $this-> $name;
        }

    }


?>