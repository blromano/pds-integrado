<?php

    namespace App\Model;

    class Campus_CursosModel{
        private $CMC_CUR_ID;
        private $FK_CAMPUS_CAM_ID;
        private $FK_CURSOS_CUR_ID;

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }

    }