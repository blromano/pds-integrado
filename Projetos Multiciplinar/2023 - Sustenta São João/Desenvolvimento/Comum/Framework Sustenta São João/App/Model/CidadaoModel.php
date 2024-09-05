<?php

    namespace App\Model;

    class CidadaoModel{

        private $USU_ID;
        private $USU_CPF; 
        private $USU_RG; 
        private $USU_DATA_NASCIMENTO;
        private $USU_EMAIL; 
        private $USU_SENHA;
        private $USU_CELULAR; 
        private $USU_ESTADO; 
        private $USU_CIDADE; 
        private $USU_RUA; 
        private $USU_NUMERO_RESIDENCIA; 
        private $USU_BAIRRO; 
        private $USU_CEP; 
        private $USU_SEXO; 
        private $USU_FOTO_PERFIL; 
        private $USU_NOME;

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }
?>