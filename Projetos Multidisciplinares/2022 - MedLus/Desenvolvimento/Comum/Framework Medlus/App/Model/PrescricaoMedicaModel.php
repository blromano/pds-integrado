<?php
    namespace App\Model;
    
    class PrescricaoMedicaModel{

        private $PM_URL_ARQUIVO_PRESCRICAO_MEDICA;
        private $PM_ID;
        private $FK_CONSULTAS_PRESENCIAIS_COP_ID;
        
        
        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }
    }