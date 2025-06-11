<?php

    namespace App\Model;

    class Eventos_SecretariosModel{
        private $EVS_ID;
        private $FK_SECRETARIO_EVENTOS_SCE_ID;
        private $FK_EVENTOS_EVO_ID;

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }