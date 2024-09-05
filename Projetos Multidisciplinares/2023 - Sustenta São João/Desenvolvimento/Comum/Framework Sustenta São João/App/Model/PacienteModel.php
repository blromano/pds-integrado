<?php

    namespace App\Model;

    class PacienteModel{

        private $PAC_ID;
        private $PAC_PRONTUARIO;
        private $FK_USUARIOS_USU_ID;
        private $FK_PLANOS_PLA_ID;

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }        

        /* public function getPAC_ID() {
            return $this->PAC_ID;
        }

        public function setPAC_ID($var) {
            $this->PAC_ID = $var;
        }

        public function getPAC_PRONTUARIO() {
            return $this->PAC_PRONTUARIO;
        }

        public function setPAC_PRONTUARIO($var) {
            $this->PAC_PRONTUARIO = $var;
        }

        public function getFK_USUARIOS_USU_ID() {
            return $this->FK_USUARIOS_USU_ID;
        }

        public function setFK_USUARIOS_USU_ID($var) {
            $this->FK_USUARIOS_USU_ID = $var;
        }

        public function getFK_PLANOS_PLA_ID() {
            return $this->FK_PLANOS_PLA_ID;
        }

        public function setFK_PLANOS_PLA_ID($var) {
            $this->FK_PLANOS_PLA_ID = $var;
        }
         */

    }


    
