<?php

    namespace App\Model;

    class InternacoesMedicasModel {

        private $INM_TEMPOINTERNACAO;
        private $INM_ACOMPANHAMENTOCLINICO;
        private $INM_NECESSIDADESCLINICAS;
        private $INM_ID;
        private $INM_PRESCRICAOMEDICA;
        private $INM_CAUSAINTERNACAO;
        // $FK_CONSULTAS_PRESENCIAIS_COP_ID;

        public function __get($name) {
            return $this->$name;
        }
    
        public function __set($name, $value) {
            $this->$name = $value;
        }   

    }

?>