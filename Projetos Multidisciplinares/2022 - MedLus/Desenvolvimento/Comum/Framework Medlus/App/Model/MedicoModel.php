<?php

    namespace App\Model;

    class MedicoModel{
        private $MED_ID;
        private $MED_CRM ;
        private $MED_TELEFONE_PROFISSIONAL;
        private $MED_EMAIL_PROFISSIONAL;
        private $MED_PRONTUARIO ;
        private $MED_VALOR_CONSULTA;
        private $MED_OBSERVACOES;
        private $MED_FORMACAO;
        private $FK_USUARIOS_USU_ID ;
        
        public function __get($name){
            return $this->$name;
        }
        public function __set($name, $value){
            $this->$name = $value;
        }
       
    }