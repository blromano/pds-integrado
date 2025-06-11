<?php

    namespace App\Model;

    class ResultadosModel{

        private $RST_ID;
        private $RST_COLOCACAO;
        private $FK_EVENTOS_MODALIDADES_EVM_ID;
        private $FK_CAMPUS_CAM_ID;

        public function __set($name, $value) {

            $this-> $name = $value;
        }

        public function __get($name) {

            return $this-> $name;
        }

    }




?>