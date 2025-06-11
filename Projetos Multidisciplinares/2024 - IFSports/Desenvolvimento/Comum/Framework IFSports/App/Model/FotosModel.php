<?php

    namespace App\Model;

    class FotosModel{
        private $FTS_ARQUIVO;
        private $FTS_STATUS;
        private $FTS_ID;
        private $FTS_LEGENDA;
        private $FTS_DATA;
        private $FK_EVENTOS_EVO_ID;
        private $FK_ALUNOS_ALU_ID;

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }