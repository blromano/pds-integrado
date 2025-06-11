<?php

    namespace App\Model;

    class EvertonModel{
        private $id;
        private $nome;
        private $cpf;
        private $email;

        /*public function setId($valor){
            $this->id = $valor;
        }*/

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }



    }