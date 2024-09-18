<?php

    namespace App\Model;

    class PacienteModel{

        private $PAC_PRONTUARIO;
        private $FK_USUARIOS_USU_ID;
        private $FK_PLANOS_PLA_ID;


        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }        

    }


    
